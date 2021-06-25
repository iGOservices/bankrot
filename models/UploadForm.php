<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $files;
    public $passport;
    public $inn;
    public $snils;

    public $fileNames;

    public $uploadPath = 'upload/';
    public $thumbnailPath = 'upload/thumbnail/';

    public function rules()
    {
        return [
            [['files','passport','inn','snils'], 'file', 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg, jpeg, gif', 'wrongExtension' => 'разрешенные форматы файлов: {extensions}', 'maxFiles' => 10, 'maxSize' => 50 * 1024 * 1024, 'tooBig' => 'Максимальный размер файла 50MB'],
            [['files','passport','inn','snils'], 'file', 'skipOnEmpty' => false, 'on' => 'hasNotSkip']//если поле обязательное ставим $model->setScenario('hasNotSkip');
        ];
    }

    public function upload($model = null, $modelId = null)
    {
        if ($this->validate()) {
            foreach ($this->files as $file) {
                do{
                    $filename = Yii::$app->getSecurity()->generateRandomString(15);
                }while ($this->checkExist($filename . '.' . $file->extension, $model, $modelId));
                $file->saveAs($this->uploadPath . ($modelId ? $modelId . '/' : '') . $filename . '.' . $file->extension);
                /*if(in_array($file->extension,['jpg','png','jpeg']))
                {
                    //$path = $this->uploadPath . ($model ? $model . '/' : '') . $filename . '.' . $file->extension;
                    $path = 'C:\Users\s-alm\Downloads\OpenServer\domains\localhost\igo\web\\' .$this->uploadPath . ($model ? $model . '/' : '') . $filename . '.' . $file->extension;
                    $image = Yii::getAlias($path);
                    Image::resize($image, 1080, 1080)->save(Yii::getAlias($path), ['quality' => 90]);
                }*/
                $this->addFileNames($filename,$file->baseName,$file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'files' => 'Файлы',
            'passport' => 'Пасспорт'
        ];
    }

    public function addFileNames($name,$origin,$ext)
    {
        $files = $this->fileNames;
        $files[] = [
            'name' => $name,
            'origin' => $origin,
            'ext' => $ext,
        ];
        $this->fileNames = $files;
    }

    public function getFileNames()
    {
        return $this->fileNames;
    }

    public function checkExist($filename,$model = null , $modelId = null)
    {
        $dir = $this->uploadPath;
        if($modelId)
        {
            $dir = $this->uploadPath . $modelId . '/';
            if(!is_dir($dir)) mkdir($dir);
            if(!is_dir($this->thumbnailPath)) mkdir($this->thumbnailPath);
        }
        return file_exists($dir . $filename) ? true : false;
    }

    /**
     * @param $model
     * @param $modelId
     * @param null $deleteModel
     * @param boolean $key - в случае нескольких форм передаем true? для использования модели как ключа
     * @return array
     */
    public function save($model,$modelId,$deleteModel = null, $key = false)
    {
        $files = [];
        $this->files = UploadedFile::getInstances($this, $model);
        if(count($this->files))
        {
            if($deleteModel) $deleteModel->deleteFile();

            if ($this->upload($model,$modelId)) {
                if($this->getFileNames()){
                    foreach ($this->getFileNames() as $file)
                    {
                        if($upload = Upload::saveFile($model,$modelId,$file))
                        {
                            $files[] = $upload;
                            $this->fileNames = [];
                        }
                    }
                }
            }
        }

        return $files;
    }
}