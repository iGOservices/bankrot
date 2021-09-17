<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ticket_status".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int|null $status
 * @property int $type
 * @property int $created_at
 * @property int $updated_at
 */
class TicketStatus extends \yii\db\ActiveRecord
{
    public static $status = [
        0 => 'В процессе',
        1 => 'Завершен',
        2 => 'Отменен',
        3 => 'В работе'
    ];

    public static $type = [
        1 => 'Заполнение документов',
        2 => 'Банкротство под ключ',
        3 => 'Услуги арбитражных управляющих',
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'status', 'created_at', 'updated_at','type'], 'integer'],
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
            'status' => 'Status',
            'type' => 'Тип',
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

    public function getClientTicket()
    {
        return $this->hasOne(ClientTicket::className(), ['id' => 'ticket_id']);
    }

    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'type']);
    }
}
