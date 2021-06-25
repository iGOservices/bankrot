<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "directory".
 *
 * @property int $name
 * @property int $surname
 * @property int $patronymic
 * @property int $gender
 * @property int $birthday
 * @property int $birth_place
 * @property int $inn
 * @property int $snils
 * @property int $registr_address
 * @property int $fact_address
 * @property int $passport_id
 * @property int $inter_passsport_id
 * @property int $mail
 * @property int $phone
 * @property int $is_ip
 * @property int $changed_fio
 * @property int $facsimile
 */
class Directory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'gender', 'birthday', 'birth_place', 'inn', 'snils', 'registr_address', 'fact_address', 'passport_id', 'inter_passsport_id', 'mail', 'phone', 'is_ip', 'changed_fio', 'facsimile'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'birthday' => 'Дата рождения',
            'birth_place' => 'Место рождения',
            'inn' => 'ИНН',
            'snils' => 'Снилс',
            'registr_address' => 'Адресс регистрации',
            'fact_address' => 'Адресс проживания',
            'passport_id' => 'Пасспорт',
            'inter_passsport_id' => 'Загранпасспорт',
            'mail' => 'Email',
            'phone' => 'Телефон',
            'is_ip' => 'ИП',
            'changed_fio' => 'Cмена ФИО',
            'facsimile' => 'Факсимиле',
        ];
    }

    
}
