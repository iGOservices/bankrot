<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "inter_passport".
 *
 * @property int $id
 * @property string $series
 * @property string $number
 * @property string $given
 * @property string $date_given
 * @property string $period
 * @property int $created_at
 * @property int $updated_at
 */
class InterPassport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inter_passport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['series', 'number', 'given', 'date_given', 'period'], 'required'],
            [['date_given', 'period'], 'safe'],
            [['created_at', 'updated_at'], 'integer'],
            [['series'], 'string', 'max' => 2],
            [['number'], 'string', 'max' => 7],
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
            'date_given' => 'Дата выдачи',
            'period' => 'Действителен до',
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


    public function getInterPassportFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'inter_passport']);
    }
}
