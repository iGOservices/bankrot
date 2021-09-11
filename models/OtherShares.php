<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "other_shares".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $creater
 * @property int|null $type
 * @property int|null $total_count
 * @property float|null $nominal_cost
 * @property string|null $other
 * @property int $created_at
 * @property int $updated_at
 */
class OtherShares extends \yii\db\ActiveRecord
{
    public static $type = [
        '1' => 'Облигация',
        '2' => 'Вексель'
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'other_shares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'type', 'total_count', 'created_at', 'updated_at'], 'integer'],
            [['nominal_cost'], 'number'],
            [['creater'], 'string', 'max' => 255],
            [['other'], 'string', 'max' => 1000],
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
            'creater' => 'Лицо выпустившее ценную буману',
            'type' => 'Вид ценной бумаги',
            'total_count' => 'Общее количество',
            'nominal_cost' => 'Номинальная величина обязательства(руб)',
            'other' => 'Примечание',
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

    public function getOtherSharesFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%other_shares%',false]);
    }

    public static function saveOtherShares($ticket_id){
//        $ids = ArrayHelper::getColumn(OtherShares::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//
//        $data = Yii::$app->request->post('OtherShares');
//        $count = $data ? count($data) : 0;
//        $other_shares = [];
//
//        for ($i = 0; $i < $count; $i++) {
//
//            if(isset($ids[$i])){
//                $other_shares[$i] = OtherShares::findOne($ids[$i]);
//            }else{
//                $other_shares[$i] = new OtherShares();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($other_shares as $i => $share) {
//            $share->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $share->load($data[$i], '')) {
//                if(!$share->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("other_shares","[$i]other_shares",$ticket_id);
//                }
//            }
//        }
//
//        return $result;

        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('OtherShares');
        //echo"<pre>";print_r($data);die();
        foreach ($data as $key => $item){
            if($item['id']){
            $other_shares = OtherShares::findOne($item['id']);
            }else{
                $other_shares = new OtherShares();
                $other_shares->ticket_id = $ticket_id;
            }
            // echo"<pre>";print_r($data);die();
            if($other_shares->load($item, '')){
                if($other_shares->save()){
                    $uploadForm->save("other_shares","[$key]other_shares",$other_shares->id,$ticket_id);
                }else{
                    $result = false;
                }
            }
        }


        return $result;
    }
}
