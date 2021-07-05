<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "client_ticket".
 *
 * @property int $id
 * @property int|null $user_id
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
 * @property string $mail
 * @property int $phone
 * @property int $is_ip
 * @property string|null $changed_fio
 * @property int $facsimile
 * @property int $created_at
 * @property int $updated_at
 */
class ClientTicket extends \yii\db\ActiveRecord
{

    public static $gender = [
        '0' => 'Мужской',
        '1' => 'Женский',
    ];

    public static $is_ip = [
        '0' => 'Нет',
        '1' => 'Да',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gender', 'phone', 'is_ip', 'facsimile', 'created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'gender', 'birthday', 'birth_place', 'inn', 'snils', 'registr_address', 'fact_address', 'mail', 'phone', 'is_ip', 'facsimile'], 'required'],
            [['birthday'], 'safe'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
            [['birth_place', 'registr_address', 'fact_address', 'mail', 'changed_fio'], 'string', 'max' => 255],
            [['inn'], 'string', 'max' => 12],
            [['snils'], 'string', 'max' => 14],
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
            'user_id' => 'Пользователь',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'birthday' => 'День рождения',
            'birth_place' => 'Место рождения',
            'inn' => 'ИНН',
            'snils' => 'Снилс',
            'registr_address' => 'Адресс регистрации',
            'fact_address' => 'Фактический адресс',
            'mail' => 'Email',
            'phone' => 'Телефон',
            'is_ip' => 'ИП',
            'changed_fio' => 'Смени имени',
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
