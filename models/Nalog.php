<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "nalog".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $work
 * @property int|null $year
 * @property float|null $income
 * @property float|null $nalog
 * @property int $created_at
 * @property int $updated_at
 */
class Nalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'year', 'created_at', 'updated_at'], 'integer'],
            [['income', 'nalog'], 'number'],
            [['work'], 'string', 'max' => 255],
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
            'work' => 'Место работы',
            'year' => 'Год отчетного периода',
            'income' => 'Сумма дохода',
            'nalog' => 'Сумма налога',
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

    public function getNalogFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%ndfl%',false]);
    }

    public static function saveNalog($ticket_id){
//        $ids = ArrayHelper::getColumn(Nalog::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//        $data = Yii::$app->request->post('Nalog');
//        $count = $data ? count($data) : 0;
//        $nalog = [];
//
//        for ($i = 0; $i < $count; $i++) {
//
//            if(isset($ids[$i])){
//                $nalog[$i] = Nalog::findOne($ids[$i]);
//            }else{
//                $nalog[$i] = new Nalog();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($nalog as $i => $let) {
//            $let->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $let->load($data[$i], '')) {
//                if(!$let->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("nalog","[$i]ndfl",$ticket_id);
//                }
//            }
//        }
//
//        return $result;
        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Nalog');
        //echo"<pre>";print_r($data);die();
        foreach ($data as $key => $item){
            if($item['id']){
                $nalog = Nalog::findOne($item['id']);
            }else{
                $nalog = new Nalog();
                $nalog->ticket_id = $ticket_id;
            }

            if($nalog->load($item, '')){
                if($nalog->save()){
                    $uploadForm->save("nalog","[$key]ndfl",$nalog->id,$ticket_id);
                }else{
                    $result = false;
                }
            }
        }

        return $result;

    }
}
