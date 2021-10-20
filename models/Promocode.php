<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "promocode".
 *
 * @property int $id
 * @property string $code
 * @property int $discount
 * @property int|null $service_id
 * @property int|null is_use
 * @property int|null user_activate
 * @property string period
 * @property int|null $active
 * @property int $created_at
 * @property int $updated_at
 */
class Promocode extends \yii\db\ActiveRecord
{

    public static $active = [
        1 => 'Активен',
        0 => 'Отключен'
    ];

    public static $is_use = [
        0 => 'Не применен',
        1 => 'Применен',

    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promocode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'discount'], 'required'],
            [['discount', 'service_id', 'active', 'created_at', 'updated_at','is_use','user_activate'], 'integer'],
            [['period'],'safe'],
            [['code'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'discount' => 'Процент скидки',
            'service_id' => 'Тип услуги',
            'is_use' => 'Применен',
            'user_activate' => 'Кем применен',
            'period' => 'Действителен до',
            'active' => 'Активность',
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
}
