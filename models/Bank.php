<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bank".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string|null $name
 * @property string|null $post_address
 * @property string|null $number
 * @property string|null $bic
 * @property int|null $type
 * @property int|null $currency
 * @property string|null $date_open
 * @property int|null $balance
 * @property string|null $other
 * @property int $created_at
 * @property int $updated_at
 */
class Bank extends \yii\db\ActiveRecord
{

    public static $type = [
      '1' => 'Депозитный',
      '2' => 'Текущий',
      '3' => 'Расчетный',
      '4' => 'Ссудный'
    ];

    public static $currency = [
        '1' => 'Рубль',
        '2' => 'Доллар',
        '3' => 'Евро',
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'type', 'currency', 'balance', 'created_at', 'updated_at'], 'integer'],
            [['date_open'], 'safe'],
            [['name', 'post_address'], 'string', 'max' => 255],
            [['number'], 'string', 'max' => 100],
            [['bic'], 'string', 'max' => 50],
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
            'name' => 'Наименование кредитной организации',
            'post_address' => 'Почтовый адресс',
            'number' => 'Номер счета',
            'bic' => 'БИК',
            'type' => 'Вид счета',
            'currency' => 'Валюта счета',
            'date_open' => 'Дата открытия счета',
            'balance' => 'Остаток(руб)',
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

    public function getBankFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%bank%',false]);
    }


    public static function saveBank($ticket_id){
//        $ids = ArrayHelper::getColumn(Bank::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//        $data = Yii::$app->request->post('Bank');
//        $count = $data ? count($data) : 0;
//        $banks = [];
//
//        for ($i = 0; $i < $count; $i++) {
//
//            if(isset($ids[$i])){
//                $banks[$i] = Bank::findOne($ids[$i]);
//            }else{
//                $banks[$i] = new Bank();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//
//        foreach ($banks as $i => $bank) {
//            $bank->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $bank->load($data[$i], '')) {
//                if(!$bank->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("bank","[$i]bank",$ticket_id);
//                }
//            }
//        }
//
//        return $result;

        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Bank');
        //echo"<pre>";print_r($data);die();
        if($data) {
            foreach ($data as $key => $item) {
                if ($item['id']) {
                    $bank = Bank::findOne($item['id']);
                } else {
                    $bank = new Bank();
                    $bank->ticket_id = $ticket_id;
                }
                // echo"<pre>";print_r($data);die();
                if ($bank->load($item, '')) {
                    if ($bank->save()) {
                        $uploadForm->save("bank", "[$key]bank", $bank->id, $ticket_id);
                    } else {
                        $result = false;
                    }
                }
            }
        }


        return $result;
    }

    public static function createPayArray($id){
        $bank = Bank::find()->where(['ticket_id' => $id])->all();
        $bank_arr = [];
        foreach ($bank as $key => $item){
            $bank_arr [] = [
                "address" => [
                    "Country" =>null,
                      "Region" =>null,
                      "Area" =>null,
                      "City" => null,
                      "Town"=>null,
                      "text"=>"",
                      "Street"=>null,
                      "HouseNumber"=>"",
                      "KorpusNumber"=>"",
                      "FlatNumber" =>""
                ],
                "name" => $item->name."",
                "description" => $item->other."",
               "type" => Bank::$type[$item->type]."",
               "valuta" =>Bank::$currency[$item->currency]."",
               "date_opening" =>date("d.m.Y",strtotime($item->date_open))."",
               "balance" =>$item->balance."",
               "account_number" =>$item->number."",
               "account_bik" =>$item->bic."",
               "group" => "2"
            ];
        }

        return $bank_arr;
    }

}
