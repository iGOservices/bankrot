<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;

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
            [['ticket_id'], 'required'],
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
            'type' => 'Type',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'birthday' => 'Birthday',
            'inn' => 'Inn',
            'birth_country' => 'Birth Country',
            'birth_series' => 'Birth Series',
            'birth_number' => 'Birth Number',
            'birth_date' => 'Birth Date',
            'birth_number_act' => 'Birth Number Act',
            'birth_number_act_date' => 'Birth Number Act Date',
            'given' => 'Given',
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

    public static function saveFamily($ticket_id){
        $data = Yii::$app->request->post('Family');
        $count = $data ? count($data) : 0;
        $family = [];

        for ($i = 0; $i < $count; $i++) {
            $family[$i] = new Family();
        }
        $uploadForm = new UploadForm();

        $result = true;

        foreach ($family as $i => $member) {
            $member->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $member->load($data[$i], '')) {
                if(!$member->save()){
                    $result = false;
                }else{
                    $uploadForm->save("family","[$i]birth",$ticket_id);
                }
            }
        }

        return $result;
    }

    public static function saveSp($ticket_id){
        $data = Yii::$app->request->post('Razvod');
        $count = $data ? count($data) : 0;
        $razvod = [];

        for ($i = 0; $i < $count; $i++) {
            $razvod[$i] = new Razvod();
        }
        $uploadForm = new UploadForm();

        $result = true;

        foreach ($razvod as $i => $let) {
            $let->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $let->load($data[$i], '')) {
                if(!$let->save()){
                    $result = false;
                }else{
                    $uploadForm->save("sp","[$i]razvod",$ticket_id);
                    $uploadForm->save("sp","[$i]brak_dogovor",$ticket_id);
                    $uploadForm->save("sp","[$i]property_division",$ticket_id);
                }
            }
        }

        if(!$result) return false;

        $data = Yii::$app->request->post('Brak');
        $count = $data ? count($data) : 0;
        $brak = [];

        for ($i = 0; $i < $count; $i++) {
            $brak[$i] = new Brak();
        }
        $uploadForm = new UploadForm();

        $result = true;

        foreach ($brak as $i => $let) {
            $let->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $let->load($data[$i], '')) {
                if(!$let->save()){
                    $result = false;
                }else{
                    $uploadForm->save("sp","[$i]brak",$ticket_id);
                }
            }
        }

        return $result;

    }
}
