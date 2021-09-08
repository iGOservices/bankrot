<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "shares".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $name
 * @property string|null $location
 * @property string|null $inn
 * @property int|null $company_capital
 * @property string|null $share
 * @property float|null $nominal_cost
 * @property int|null $shares_count
 * @property float|null $total_cost
 * @property string|null $dogovor_number
 * @property string|null $date
 * @property string|null $other
 * @property int $created_at
 * @property int $updated_at
 */
class Shares extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'company_capital', 'shares_count', 'created_at', 'updated_at'], 'integer'],
            [['nominal_cost', 'total_cost'], 'number'],
            [['date'], 'safe'],
            [['name', 'location', 'share', 'dogovor_number'], 'string', 'max' => 255],
            [['inn'], 'string', 'max' => 12],
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
            'name' => 'Name',
            'location' => 'Location',
            'inn' => 'Inn',
            'company_capital' => 'Company Capital',
            'share' => 'Share',
            'nominal_cost' => 'Nominal Cost',
            'shares_count' => 'Shares Count',
            'total_cost' => 'Total Cost',
            'dogovor_number' => 'Dogovor Number',
            'date' => 'Date',
            'other' => 'Other',
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

    public static function saveShares($ticket_id){
        $ids = ArrayHelper::getColumn(Shares::find()->where(['ticket_id' => $ticket_id])->all(), 'id');


        $data = Yii::$app->request->post('Shares');
        $count = $data ? count($data) : 0;
        $shares = [];

        for ($i = 0; $i < $count; $i++) {
            if(isset($ids[$i])){
                $shares[$i] = Shares::findOne($ids[$i]);
            }else{
                $shares[$i] = new Shares();
            }
        }
        $uploadForm = new UploadForm();

        $result = true;

        foreach ($shares as $i => $share) {
            $share->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $share->load($data[$i], '')) {
                if(!$share->save()){
                    $result = false;
                }else{
                    $uploadForm->save("shares","[$i]shares",$ticket_id);
                }
            }
        }

        return $result;
    }
}
