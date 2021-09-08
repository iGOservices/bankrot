<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "proxy".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $cpo_id
 * @property string|null $proxy_number
 * @property string|null $proxy_date_start
 * @property string|null $proxy_date_end
 * @property int $created_at
 * @property int $updated_at
 */
class Proxy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proxy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id', 'cpo_id'], 'required'],
            [['ticket_id', 'cpo_id', 'created_at', 'updated_at'], 'integer'],
            [['proxy_date_start', 'proxy_date_end'], 'safe'],
            [['proxy_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Ticket ID',
            'cpo_id' => 'Cpo ID',
            'proxy_number' => 'Proxy Number',
            'proxy_date_start' => 'Proxy Date Start',
            'proxy_date_end' => 'Proxy Date End',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function saveProxy($ticket_id){
        $result = false;

        $uploadForm = new UploadForm();
        $proxy  = new Proxy();
        if($ticket_id){
            $proxy = Proxy::find()->where(['ticket_id' => $ticket_id])->one();
            if(!$proxy){
                $proxy  = new Proxy();
            }
        }
        $proxy->ticket_id = $ticket_id;
        if ($proxy->load(Yii::$app->request->post()) && $proxy->save()) {
            $uploadForm->save("proxy","proxy",$ticket_id);
            $uploadForm->save("proxy","proxy_publ",$ticket_id);
            $uploadForm->save("proxy","proxy_dep",$ticket_id);
            $result = true;
        }

        return $result;
    }
}
