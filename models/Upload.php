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
 * @property string $folder
 * @property string $ext
 * @property string $user_id
 * @property string $created_at
 */
class Upload extends \yii\db\ActiveRecord
{
    public static $folder = [
        'main_info' => "Личные данные клиента",
        'family' => "Семья и дети",
        'sp' => "Список родственных отношений",
        'creditor' => "Кредиторы",
        'debitor' => "Дебиторы",
        'property' => "Информация по имуществу и сделок за последние 3 года",
        'bank' => "Сведения о счетах в банках и иных кредитных организациях",
        'shares' => "Акции, ценные бумаги",
        'other_shares' => "Иные ценные бумаги",
        'valuable_property' => "Наличные денежные средства и иное ценное имущество",
        'deal' => "Совершенные сделки за последние 3 года",
        'nalog' => "Доходы и Налоги",
        'other' => "Иные документы",
        'proxy' => "Блок оплаты и получения услуг",
    ];
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
            [['origin','folder'], 'string', 'max' => 255],
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
            'folder' => 'Folder',
            'ext' => 'Ext',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function saveFile($model, $model_id, $file, $folder = null)
    {
        $upload = new Upload();
        $upload->model = $model;
        $upload->model_id = $model_id;
        $upload->origin = $file['origin'];
        $upload->name = $file['name'];
        $upload->folder = $folder;
        $upload->ext = $file['ext'];
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        return $upload->save() ? $upload : $upload->errors;
    }

    public function deleteFile($model)
    {
        if(file_exists($this->getLink(false,$model)))
        {
            unlink($this->getLink(false,$model));
        }
        if(file_exists($this->getThumbnail(false,$model)))
        {
            unlink($this->getThumbnail(false,$model));
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

    public function getLink($absolute = true, $model, $ticketId = null)
    {
        return ($absolute ? '/' : '') . $this->tableName() .'/'. $ticketId .'/'. $model .'/'. $this->name . '.' . $this->ext;
    }

    public function getThumbnail($absolute = true,$model)
    {
        if(file_exists($this->tableName() .'/thumbnail/' . $this->name . '.' . $this->ext))
            return ($absolute ? '/' : '') . $this->tableName() .'/thumbnail/' . $this->name . '.' . $this->ext;
        else
            return $this->getLink($absolute,$model);
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
