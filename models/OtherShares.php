<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "other_shares".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $creater
 * @property int|null $type
 * @property int|null $total_count
 * @property float|null $nominal_cost
 * @property string|null $other
 * @property int $created_at
 * @property int $updated_at
 */
class OtherShares extends \yii\db\ActiveRecord
{
    public static $type = [
        '1' => 'Облигация',
        '2' => 'Вексель'
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'other_shares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'type', 'total_count', 'created_at', 'updated_at'], 'integer'],
            [['nominal_cost'], 'number'],
            [['creater'], 'string', 'max' => 255],
            [['other'], 'string', 'max' => 1000],
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
            'creater' => 'Создатель',
            'type' => 'Вид',
            'total_count' => 'Общее кол-во',
            'nominal_cost' => 'Номинальная величина обязательства(руб)',
            'other' => 'Примечание',
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

    public static function saveOtherShares($ticket_id){
        $data = Yii::$app->request->post('OtherShares');
        $count = $data ? count($data) : 0;
        $other_shares = [];

        for ($i = 0; $i < $count; $i++) {
            $other_shares[$i] = new OtherShares();
        }
        $uploadForm = new UploadForm();

        $result = true;

        foreach ($other_shares as $i => $share) {
            $share->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $share->load($data[$i], '')) {
                if(!$share->save()){
                    $result = false;
                }else{
                    $uploadForm->save("other_shares","[$i]other_shares",$ticket_id);
                }
            }
        }

        return $result;
    }
}
