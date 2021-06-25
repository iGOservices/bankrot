<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "upload".
 *
 * @property int $id
 * @property string $model
 * @property int $model_id
 * @property string $origin
 * @property string $name
 * @property string $ext
 * @property string $user_id
 * @property string $created_at
 */
class Upload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'model_id', 'origin', 'name', 'ext'], 'required'],
            [['model_id', 'user_id', 'created_at'], 'integer'],
            [['model'], 'string', 'max' => 100],
            [['origin'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
            [['ext'], 'string', 'max' => 20],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => [],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'model_id' => 'Model ID',
            'origin' => 'Origin',
            'name' => 'Name',
            'ext' => 'Ext',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function saveFile($model, $model_id, $file)
    {
        $upload = new Upload();
        $upload->model = $model;
        $upload->model_id = $model_id;
        $upload->origin = $file['origin'];
        $upload->name = $file['name'];
        $upload->ext = $file['ext'];
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        return $upload->save() ? $upload : $upload->errors;
    }

    public function deleteFile()
    {
        if(file_exists($this->getLink(false)))
        {
            unlink($this->getLink(false));
        }
        if(file_exists($this->getThumbnail(false)))
        {
            unlink($this->getThumbnail(false));
        }
        return $this->delete();
    }

    public function getRealName()
    {
        return $this->origin . '.' . $this->ext;
    }

    public function copy($model, $model_id)
    {
        //возможно сделать не копирование, а ссылаться на тот же файл, но нужно будет сделать проверку при удалении
        do{
            $filename = Yii::$app->getSecurity()->generateRandomString(15);
        }while (self::checkExist($filename . '.' . $this->ext, $model));
        if (!copy($this->getLink(false), $this->tableName() .'/' . $model . '/' . $filename . '.' . $this->ext)) {
            return null;
        }

        $file = [
            'origin' => $this->origin,
            'name' => $filename,
            'ext' => $this->ext,
        ];
        return self::saveFile($model, $model_id, $file);
    }

    public function getLink($absolute = true)
    {
        return ($absolute ? '/' : '') . $this->tableName() .'/'. $this->model_id .'/' . $this->name . '.' . $this->ext;
    }

    public function getThumbnail($absolute = true)
    {
        if(file_exists($this->tableName() .'/thumbnail/' . $this->name . '.' . $this->ext))
            return ($absolute ? '/' : '') . $this->tableName() .'/thumbnail/' . $this->name . '.' . $this->ext;
        else
            return $this->getLink($absolute);
    }

    public function getPreview()
    {
        $type = 'file';
        if($this->ext == 'pdf') $type = 'file-pdf-o';
        if($this->ext == 'doc') $type = 'file-word-o';
        if($this->ext == 'docx') $type = 'file-word-o';
        if($this->ext == 'xls') $type = 'file-excel-o';
        if($this->ext == 'xlsx') $type = 'file-excel-o';
        if($this->ext == 'zip') $type = 'file-zip-o';
        if($this->ext == 'rar') $type = 'file-zip-o';
        if(in_array($this->ext,['jpg','png']))
        {
            return '<img src="'.$this->getThumbnail().'" width="100" height="100">';
        }else
            return '<i class="ks-icon la la-'.$type.' ks-color-danger" style="font-size: 100px;"></i>';
    }

    public static function checkExist($filename,$model = null)
    {
        $uploadPath = 'upload/';
        $thumbnailPath = 'upload/thumbnail/';
        if($model)
        {
            $uploadPath = $uploadPath . $model . '/';
            if(!is_dir($uploadPath)) mkdir($uploadPath);
            if(!is_dir($thumbnailPath)) mkdir($thumbnailPath);
        }
        return file_exists($uploadPath . $filename) ? true : false;
    }
}
