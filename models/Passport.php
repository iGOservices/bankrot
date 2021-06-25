<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "passport".
 *
 * @property int $id
 * @property string $series
 * @property string $number
 * @property string $given
 * @property string $code
 * @property int $created_at
 * @property int $updated_at
 */
class Passport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['series', 'number', 'given', 'code'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['series'], 'string', 'max' => 4],
            [['number', 'code'], 'string', 'max' => 6],
            [['given'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'series' => 'Серия',
            'number' => 'Номер',
            'given' => 'Кем выдан',
            'code' => 'Код подразделения',
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
