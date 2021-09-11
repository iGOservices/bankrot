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
            'name' => 'Наименование организации',
            'location' => 'Местонахождение организации',
            'inn' => 'ИНН',
            'company_capital' => 'Уставной капитал общества',
            'share' => 'Доля участия',
            'nominal_cost' => 'Номинальная стоимость акции',
            'shares_count' => 'Количество  акций',
            'total_cost' => 'Общая сумма акций',
            'dogovor_number' => 'Номер договора участия',
            'date' => 'Дата договора',
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

    public function getSharesFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%]shares%',false]);
    }

    public static function saveShares($ticket_id){
//        $ids = ArrayHelper::getColumn(Shares::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//
//        $data = Yii::$app->request->post('Shares');
//        $count = $data ? count($data) : 0;
//        $shares = [];
//
//        for ($i = 0; $i < $count; $i++) {
//            if(isset($ids[$i])){
//                $shares[$i] = Shares::findOne($ids[$i]);
//            }else{
//                $shares[$i] = new Shares();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($shares as $i => $share) {
//            $share->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $share->load($data[$i], '')) {
//                if(!$share->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("shares","[$i]shares",$ticket_id);
//                }
//            }
//        }
//
//        return $result;

        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Shares');
        //echo"<pre>";print_r($data);die();
        foreach ($data as $key => $item){
            if($item['id']){
                $shares = Shares::findOne($item['id']);
            }else{
                $shares = new Shares();
                $shares->ticket_id = $ticket_id;
            }
            // echo"<pre>";print_r($data);die();
            if($shares->load($item, '')){
                if($shares->save()){
                    $uploadForm->save("shares","[$key]shares",$shares->id,$ticket_id);
                }else{
                    $result = false;
                }
            }
        }


        return $result;
    }
}
