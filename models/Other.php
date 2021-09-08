<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "other".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $text
 * @property int $created_at
 * @property int $updated_at
 */
class Other extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'other';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
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
            'text' => 'Text',
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

    public static function saveOther($ticket_id){
        $ids = ArrayHelper::getColumn(Other::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Other');
        $count = $data ? count($data) : 0;
        $other = [];

        for ($i = 0; $i < $count; $i++) {

            if(isset($ids[$i])){
                $other[$i] = Other::findOne($ids[$i]);
            }else{
                $other[$i] = new Other();
            }
        }
        $uploadForm = new UploadForm();

        $result = true;

        foreach ($other as $i => $let) {
            $let->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $let->load($data[$i], '')) {
                if(!$let->save()){
                    $result = false;
                }else{
                    $uploadForm->save("other","[$i]other",$ticket_id);
                }
            }
        }

        return $result;
    }
}
