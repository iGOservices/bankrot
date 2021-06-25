<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "client_main_info".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $gender
 * @property string $birthday
 * @property string $birth_place
 * @property string $inn
 * @property string $snils
 * @property string $registr_address
 * @property string $fact_address
 * @property int $passport_id
 * @property int $inter_passsport_id
 * @property string $mail
 * @property int $phone
 * @property int $is_ip
 * @property string $changed_fio
 * @property int $facsimile
 * @property int $created_at
 * @property int $updated_at
 */
class ClientMainInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_main_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'gender', 'birthday', 'birth_place', 'inn', 'snils', 'registr_address', 'fact_address', 'passport_id', 'inter_passsport_id', 'mail', 'phone', 'is_ip', 'changed_fio', 'facsimile'], 'required'],
            [['gender', 'passport_id', 'inter_passsport_id', 'phone', 'is_ip', 'facsimile', 'created_at', 'updated_at'], 'integer'],
            [['birthday'], 'safe'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
            [['birth_place', 'registr_address', 'fact_address', 'mail', 'changed_fio'], 'string', 'max' => 255],
            [['inn'], 'string', 'max' => 12],
            [['snils'], 'string', 'max' => 14],
            [['passport_id'], 'unique'],
            [['inter_passsport_id'], 'unique'],
            [['mail'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'birthday' => 'Дата рождения',
            'birth_place' => 'Место рождения',
            'inn' => 'ИНН',
            'snils' => 'Снилс',
            'registr_address' => 'Адресс регистрации',
            'fact_address' => 'Адресс проижвания',
            'passport_id' => 'Пасспорт',
            'inter_passsport_id' => 'Загранпасспорт',
            'mail' => 'Email',
            'phone' => 'Телефон',
            'is_ip' => 'ИП',
            'changed_fio' => 'Смена имени',
            'facsimile' => 'Факсимиле',
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

    public function getFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => $this->tableName()]);
    }

    public function getPassport()
    {
        return $this->hasOne(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'passport']);
    }

    public function getInn()
    {
        return $this->hasOne(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'inn']);
    }

}
