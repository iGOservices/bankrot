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
    public $changed_fio;
    public $is_ip;
    public $facsimile;
    public $inter_passport;
    public $creditor;
    public $debitor;
    public $property;
    public $other_property;
    public $bank;
    public $shares;
    public $other_shares;
    public $valuable_property;
    public $deal;
    public $ndfl;
    public $brak;
    public $razvod;
    public $property_division;
    public $brak_dogovor;
    public $birth;
    public $trud_book;
    public $is_work;
    public $other;
    public $proxy;
    public $proxy_publ;
    public $proxy_dep;

    public $fileNames;

    public $uploadPath = 'upload/';
    public $thumbnailPath = 'upload/thumbnail/';

    public function rules()
    {
        return [
            [['files','passport','inn','snils','changed_fio','is_ip','facsimile','inter_passport','creditor','debitor','other_property','property','bank','shares','other_shares','valuable_property','deal','ndfl','brak','razvod','property_division','brak_dogovor','birth','trud_book','is_work','other','proxy','proxy_publ','proxy_dep'], 'file', 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg, jpeg, pdf', 'wrongExtension' => 'разрешенные форматы файлов: {extensions}', 'maxFiles' => 3, 'maxSize' => 50 * 1024 * 1024, 'tooBig' => 'Максимальный размер файла 50MB'],
            [['files','passport','inn','snils','changed_fio','is_ip','facsimile','inter_passport','creditor','debitor','other_property','property','bank','shares','other_shares','valuable_property','deal','ndfl','brak','razvod','property_division','brak_dogovor','birth','is_work','trud_book','other','proxy','proxy_publ','proxy_dep'], 'file', 'skipOnEmpty' => false, 'on' => 'hasNotSkip']//если поле обязательное ставим $model->setScenario('hasNotSkip');
        ];
    }

    public function upload($folder = null,$model = null, $ticketId = null)
    {
        if ($this->validate()) {
            foreach ($this->files as $file) {
                do{
                    $filename = Yii::$app->getSecurity()->generateRandomString(15);
                }while ($this->checkExist($filename . '.' . $file->extension, $model, $ticketId,$folder));
                $file->saveAs($this->uploadPath . ($ticketId ? $ticketId . '/' : '') . ($folder ? $folder . '/' : '') . $filename . '.' . $file->extension);
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

    public function checkExist($filename,$model = null , $ticketId = null,$folder = null)
    {
        $dir = $this->uploadPath;
        if($ticketId && $folder)
        {
            $dir = $this->uploadPath . $ticketId . '/'. $folder . '/';
            if(!is_dir($dir)) mkdir($dir, 0777, true);
            if(!is_dir($this->thumbnailPath)) mkdir($this->thumbnailPath, 0777, true);
        }
        return file_exists($dir . $filename) ? true : false;
    }

    /**
     * @param $folder
     * @param $model
     * @param $modelId
     * @param $ticketId
     * @param null $deleteModel
     * @param boolean $key - в случае нескольких форм передаем true? для использования модели как ключа
     * @return array
     */
    public function save($folder,$model,$modelId,$ticketId,$deleteModel = null, $key = false)
    {
        $files = [];
        $this->files = UploadedFile::getInstances($this, $model);
        if(count($this->files))
        {
            if($deleteModel) $deleteModel->deleteFile();

            if ($this->upload($folder,$model,$ticketId)) {
                if($this->getFileNames()){
                    foreach ($this->getFileNames() as $file)
                    {
                        if($upload = Upload::saveFile($model,$modelId,$file,$folder))
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