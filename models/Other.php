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
            'text' => 'Текст',
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

    public function getOtherFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%other%',false]);
    }

    public static function saveOther($ticket_id){
//        $ids = ArrayHelper::getColumn(Other::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//        $data = Yii::$app->request->post('Other');
//        $count = $data ? count($data) : 0;
//        $other = [];
//
//        for ($i = 0; $i < $count; $i++) {
//
//            if(isset($ids[$i])){
//                $other[$i] = Other::findOne($ids[$i]);
//            }else{
//                $other[$i] = new Other();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($other as $i => $let) {
//            $let->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $let->load($data[$i], '')) {
//                if(!$let->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("other","[$i]other",$ticket_id);
//                }
//            }
//        }
//
//        return $result;

        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Other');
        //echo"<pre>";print_r($data);die();
        if($data) {
            foreach ($data as $key => $item) {
                if ($item['id']) {
                    $other = Other::findOne($item['id']);
                } else {
                    $other = new Other();
                    $other->ticket_id = $ticket_id;
                }

                if ($other->load($item, '')) {
                    if ($other->save()) {
                        $uploadForm->save("other", "[$key]other", $other->id, $ticket_id);
                    } else {
                        $result = false;
                    }
                }
            }
        }

        return $result;



    }
}
