<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "Brak".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $series
 * @property string|null $number
 * @property string|null $date
 * @property string|null $number_act
 * @property string|null $number_act_date
 * @property string|null $given
 * @property int $created_at
 * @property int $updated_at
 */
class Brak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'created_at', 'updated_at'], 'integer'],
            [['date', 'number_act_date'], 'safe'],
            [['series'], 'string', 'max' => 10],
            [['number'], 'string', 'max' => 20],
            [['number_act', 'given'], 'string', 'max' => 255],
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
            'series' => 'Серия',
            'number' => 'Номер',
            'date' => 'Дата выдаи',
            'number_act' => 'Номер актовой записи',
            'number_act_date' => 'Дата актовой записи',
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

    public function getBrakFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%brak',false]);
    }

    public function getBrakDogovorFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%brak_dogovor%',false]);
    }
}
