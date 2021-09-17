<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "family".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int|null $type
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $birthday
 * @property string|null $inn
 * @property int|null $birth_country
 * @property string|null $birth_series
 * @property string|null $birth_number
 * @property string|null $birth_date
 * @property string|null $birth_number_act
 * @property string|null $birth_number_act_date
 * @property string|null $given
 * @property int $created_at
 * @property int $updated_at
 */
class Family extends \yii\db\ActiveRecord
{
    public static $type = [
        1 => 'Муж',
        2 => 'Жена',
        3 => 'Бывший муж',
        4 => 'Бывшая жена',
        5 => 'Сын',
        6 => 'Дочь',
    ];

    public static $birth_country = [
        0 => 'Россия',
        1 => 'СССР',
        2 => 'Другая'
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'family';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id','name'], 'required'],
            [['ticket_id', 'type', 'birth_country', 'created_at', 'updated_at'], 'integer'],
            [['birthday', 'birth_date', 'birth_number_act_date'], 'safe'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
            [['inn'], 'string', 'max' => 12],
            [['birth_series'], 'string', 'max' => 10],
            [['birth_number'], 'string', 'max' => 20],
            [['birth_number_act', 'given'], 'string', 'max' => 255],
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
            'type' => 'Тип родства',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'birthday' => 'Дата рождения',
            'inn' => 'ИНН',
            'birth_country' => 'Страна выдачи',
            'birth_series' => 'Серия',
            'birth_number' => 'Номер',
            'birth_date' => 'Дата выдачи свидетельства',
            'birth_number_act' => 'Номер актовой записи',
            'birth_number_act_date' => 'Дата актовой записи',
            'given' => 'Кем выдан',
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

    public function getBirthFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%birth%',false]);
    }

    public static function saveFamily($ticket_id){
        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Family');
        if($data){
            //echo"<pre>";print_r($data);die();
            foreach ($data as $key => $item){
                if($item['id']){
                    $family = Family::findOne($item['id']);
                }else{
                    $family = new Family();
                    $family->ticket_id = $ticket_id;
                }

                if($family->load($item, '')){
                    if($family->save()){
                        $uploadForm->save("family","[$key]birth",$family->id,$ticket_id);
                    }else{
                        $result = false;
                    }
                }
            }
        }

        //echo"<pre>";print_r($data);die();
//        $count = $data ? count($data) : 0;
//        $family = [];
//
//        for ($i = 0; $i < $count; $i++) {
//            if(isset($ids[$i])){
//                $family[$i] = Family::findOne($ids[$i]);
//            }else{
//                $family[$i] = new Family();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($family as $i => $member) {
//            $member->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $member->load($data[$i], '')) {
//                if(!$member->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("family","[$i]birth",$member->id,$ticket_id);
//                }
//            }
//        }

        return $result;
    }

    public static function saveSp($ticket_id){

        $uploadForm = new UploadForm();
        $result = true;

        $data = Yii::$app->request->post('Razvod');
        if($data) {
            foreach ($data as $key => $item) {
                if ($item['id']) {
                    $razvod = Razvod::findOne($item['id']);
                } else {
                    $razvod = new Razvod();
                    $razvod->ticket_id = $ticket_id;
                }

                if ($razvod->load($item, '')) {
                    if ($razvod->save()) {
                        $uploadForm->save("sp", "[$key]razvod", $razvod->id, $ticket_id);
                        $uploadForm->save("sp", "[$key]property_division", $razvod->id, $ticket_id);
                    } else {
                        $result = false;
                    }
                }
            }
        }
//
//        $ids = ArrayHelper::getColumn(Razvod::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//        $data = Yii::$app->request->post('Razvod');
//        $count = $data ? count($data) : 0;
//        $razvod = [];
//
//        for ($i = 0; $i < $count; $i++) {
//
//            if(isset($ids[$i])){
//                $razvod[$i] = Razvod::findOne($ids[$i]);
//            }else{
//                $razvod[$i] = new Razvod();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($razvod as $i => $let) {
//            $let->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $let->load($data[$i], '')) {
//                if(!$let->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("sp","[$i]razvod",$ticket_id);
//                    $uploadForm->save("sp","[$i]brak_dogovor",$ticket_id);
//                    $uploadForm->save("sp","[$i]property_division",$ticket_id);
//                }
//            }
//        }

        if(!$result) return false;

        $data = Yii::$app->request->post('Brak');
        if($data) {
            foreach ($data as $key => $item) {
                if ($item['id']) {
                    $brak = Brak::findOne($item['id']);
                } else {
                    $brak = new Brak();
                    $brak->ticket_id = $ticket_id;
                }

                if ($brak->load($item, '')) {
                    if ($brak->save()) {
                        $uploadForm->save("sp", "[$key]brak", $brak->id, $ticket_id);
                        $uploadForm->save("sp", "[$key]brak_dogovor", $brak->id, $ticket_id);
                    } else {
                        $result = false;
                    }
                }
            }
        }



//
//        $ids = ArrayHelper::getColumn(Brak::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//
//        $data = Yii::$app->request->post('Brak');
//        $count = $data ? count($data) : 0;
//        $brak = [];
//
//        for ($i = 0; $i < $count; $i++) {
//
//            if(isset($ids[$i])){
//                $brak[$i] = Brak::findOne($ids[$i]);
//            }else{
//                $brak[$i] = new Brak();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($brak as $i => $let) {
//            $let->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $let->load($data[$i], '')) {
//                if(!$let->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("sp","[$i]brak",$ticket_id);
//                }
//            }
//        }

        return $result;

    }
}
