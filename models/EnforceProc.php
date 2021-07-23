<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "enforce_proc".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $number
 * @property string|null $date
 * @property float|null $sum
 * @property int $created_at
 * @property int $updated_at
 */
class EnforceProc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enforce_proc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'created_at', 'updated_at'], 'integer'],
            [['date'], 'safe'],
            [['sum'], 'number'],
            [['number'], 'string', 'max' => 255],
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
            'number' => 'Number',
            'date' => 'Date',
            'sum' => 'Sum',
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

    public static function saveEnforceProc($ticket_id){
        $data = Yii::$app->request->post('EnforceProc');
        $count = $data ? count($data) : 0;
        $enforce = [];

        for ($i = 0; $i < $count; $i++) {
            $enforce[$i] = new EnforceProc();
        }

        $result = true;

        foreach ($enforce as $i => $let) {
            $let->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $let->load($data[$i], '')) {
                if(!$let->save()){
                    $result = false;
                }
            }
        }

        return $result;
    }
}
