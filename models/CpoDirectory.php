<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cpo_directory".
 *
 * @property int $id
 * @property string $recipient
 * @property int $recipient_inn
 * @property int $recipient_kpp
 * @property string $checking_account
 * @property int $bik
 * @property string $bank
 * @property string $correspondent_account
 * @property string $kbk
 * @property int $oktmo
 * @property string|null $payment_name
 * @property int $updated_at
 * @property int $created_at
 */
class CpoDirectory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cpo_directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipient', 'recipient_inn', 'recipient_kpp', 'checking_account', 'bik', 'bank', 'correspondent_account', 'kbk', 'oktmo'], 'required'],
            [['recipient_inn', 'recipient_kpp', 'bik', 'oktmo', 'updated_at', 'created_at'], 'integer'],
            [['recipient', 'bank', 'payment_name'], 'string', 'max' => 500],
            [['checking_account', 'correspondent_account', 'kbk'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipient' => 'Получатель платежа',
            'recipient_inn' => 'ИНН получателя платежа',
            'recipient_kpp' => 'КПП получателя платежа',
            'checking_account' => 'Расчетный счет',
            'bik' => 'БИК',
            'bank' => 'Банк получателя платежа',
            'correspondent_account' => 'Корреспондентский счет',
            'kbk' => 'Код бюджетной классификации (КБК)',
            'oktmo' => 'ОКТMО',
            'payment_name' => 'Наименование  платежа',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
