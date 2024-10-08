<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "valuable_property".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int|null $property_type
 * @property string|null $name
 * @property float|null $cost
 * @property int|null $location
 * @property string|null $coutry
 * @property string|null $region
 * @property string|null $district
 * @property string|null $city
 * @property string|null $street
 * @property int|null $house
 * @property int|null $corpus
 * @property int|null $office
 * @property int|null $post_index
 * @property string|null $org_name
 * @property string|null $dogovor_number
 * @property string|null $dogovor_date
 * @property int|null $active_status
 * @property string|null $zalog_name
 * @property int|null $zalog_type
 * @property int|null $zalog_inn
 * @property string|null $zalog_address
 * @property string|null $zalog_dogovor
 * @property string|null $other
 * @property int $created_at
 * @property int $updated_at
 */
class ValuableProperty extends \yii\db\ActiveRecord
{
    public static $property_type = [
        '1' => 'Наличные денежные средства',
        '2' => 'Драгоценности ювелирные украшения и иные предметы роскоши',
        '3' => 'Предметы искусства',
        '4' => 'Имущество необходимое для профессиональных занятий',
        '5' => 'Иное ценное имущество'
    ];

    public static $zalog_type = [
        '1' => 'Физ лицо',
        '2' => 'Организация',
    ];

    public static $location = [
        '1' => 'Адрес',
        '2' => 'Бакновская ячейка',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'valuable_property';
    }

    public function getValuablePropertyFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%valuable_property%',false]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'property_type', 'location', 'house', 'corpus', 'office', 'post_index', 'active_status', 'zalog_type', 'zalog_inn', 'created_at', 'updated_at'], 'integer'],
            [['cost'], 'number'],
            [['dogovor_date'], 'safe'],
            [['name', 'coutry', 'region', 'district', 'city', 'street', 'org_name', 'dogovor_number', 'zalog_name', 'zalog_address', 'zalog_dogovor'], 'string', 'max' => 255],
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
            'property_type' => 'Вид имущества',
            'name' => 'Наименование',
            'cost' => 'Сумма',
            'location' => 'Место нахождения',
            'coutry' => 'Страна',
            'region' => 'Регион',
            'district' => 'Район',
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'corpus' => 'Корпус',
            'office' => 'Офис',
            'post_index' => 'Почтовый индекс',
            'org_name' => 'Наименование организации',
            'dogovor_number' => 'Номер договора',
            'dogovor_date' => 'Дата договора',
            'active_status' => 'Статус актива В залоге',
            'zalog_name' => 'Имя залогодержателя',
            'zalog_type' => 'Залогодержатель',
            'zalog_inn' => 'ИНН залогодержателя',
            'zalog_address' => 'Почтовый адресс ',
            'zalog_dogovor' => 'Договор залога',
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

    public static function saveValuableProperty($ticket_id){
//        $ids = ArrayHelper::getColumn(ValuableProperty::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//
//        $data = Yii::$app->request->post('ValuableProperty');
//        $count = $data ? count($data) : 0;
//        $valuable_property = [];
//
//        for ($i = 0; $i < $count; $i++) {
//            if(isset($ids[$i])){
//                $valuable_property[$i] = ValuableProperty::findOne($ids[$i]);
//            }else{
//                $valuable_property[$i] = new ValuableProperty();
//            }
//
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($valuable_property as $i => $property) {
//            $property->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $property->load($data[$i], '')) {
//                if(!$property->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("valuable_property","[$i]valuable_property",$ticket_id);
//                }
//            }
//        }
//
//        return $result;


        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('ValuableProperty');
        //echo"<pre>";print_r($data);die();
        if($data) {
            foreach ($data as $key => $item) {
                if ($item['id']) {
                    $valuable_property = ValuableProperty::findOne($item['id']);
                } else {
                    $valuable_property = new ValuableProperty();
                    $valuable_property->ticket_id = $ticket_id;
                }
                // echo"<pre>";print_r($data);die();
                if ($valuable_property->load($item, '')) {
                    if ($valuable_property->save()) {
                        $uploadForm->save("valuable_property", "[$key]valuable_property", $valuable_property->id, $ticket_id);
                    } else {
                        $result = false;
                    }
                }
            }
        }


        return $result;
    }


    public static function createPayArray($id){
        $valuable = ValuableProperty::find()->where(['ticket_id' => $id])->all();
        $valuable_arr = [];
        $fund = [];
        $jewelry = [];
        $art = [];
        $professional = [];
        $other = [];
        foreach ($valuable as $key => $item){
            $valuable_arr [] = [
                "id" => $key."value",
                "name" => $item->zalog_name."",
                "type" => $item->zalog_type == 1 ? "physical": "organization",
                "inn" => $item->zalog_inn."",
                "address" => [
                    "Country" => null,
                    "Region" => null,
                    "Area" => null,
                    "City" => null,
                    "Town" => null,
                    "text" => $item->zalog_address."",
                    "Street" => null,
                    "HouseNumber" => null,
                    "KorpusNumber" => null,
                    "FlatNumber" => null
                ],
                "type_contact" => "creditor",
                "agreement" => $item->zalog_dogovor."",
                "text" => $item->zalog_name.""
            ];
            if($item->property_type-1 == 0) {
                $fund [] = [
                    "address" => [
                        "Country" => $item->coutry."",
                         "Region" => $item->region."",
                         "Area" => $item->district."",
                         "City" => $item->city."",
                         "Town" => null,
                         "text" => "".$item->coutry.", Респ ".$item->region.", г ".$item->city.", ул ".$item->street.", дом ".$item->house." , корпус ".$item->corpus.", квартира ".$item->office."",
                         "Street" => $item->street."",
                         "HouseNumber" => $item->house."",
                         "KorpusNumber" => $item->corpus."",
                         "FlatNumber"=> $item->office.""
                    ],
                      "type" => "0",
                      "name" => $item->name."",
                      "cost_sum" => $item->cost."",
                      "location_type" => ($item->location-1)."",
                      "location_credit_institution" => $item->org_name."",
                      "location_agreement" => "",
                      "location_number" => $item->dogovor_number."",
                      "location_date" => date("d.m.Y",strtotime($item->dogovor_date))."",
                      "description" => $item->other."",
                      "mortgageeId" => $key."value",
                      "group" => "5"
                ];
            }elseif($item->property_type-1 == 1) {
                $jewelry [] = [
                    "address" => [
                        "Country" => $item->coutry."",
                        "Region" => $item->region."",
                        "Area" => $item->district."",
                        "City" => $item->city."",
                        "Town" => null,
                        "text" => "".$item->coutry.", Респ ".$item->region.", г ".$item->city.", ул ".$item->street.", дом ".$item->house." , корпус ".$item->corpus.", квартира ".$item->office."",
                        "Street" => $item->street."",
                        "HouseNumber" => $item->house."",
                        "KorpusNumber" => $item->corpus."",
                        "FlatNumber"=> $item->office.""
                    ],
                    "type" => "1",
                    "name" => $item->name."",
                    "cost_sum" => $item->cost."",
                    "location_type" => ($item->location-1)."",
                    "location_credit_institution" => $item->org_name."",
                    "location_agreement" => "",
                    "location_number" => $item->dogovor_number."",
                    "location_date" => date("d.m.Y",strtotime($item->dogovor_date))."",
                    "description" => $item->other."",
                    "mortgageeId" => $key."value",
                    "group" => "5"
                ];
            }elseif($item->property_type-1 == 2) {
                $art [] = [
                    "address" => [
                        "Country" => $item->coutry."",
                        "Region" => $item->region."",
                        "Area" => $item->district."",
                        "City" => $item->city."",
                        "Town" => null,
                        "text" => "".$item->coutry.", Респ ".$item->region.", г ".$item->city.", ул ".$item->street.", дом ".$item->house." , корпус ".$item->corpus.", квартира ".$item->office."",
                        "Street" => $item->street."",
                        "HouseNumber" => $item->house."",
                        "KorpusNumber" => $item->corpus."",
                        "FlatNumber"=> $item->office.""
                    ],
                    "type" => "2",
                    "name" => $item->name."",
                    "cost_sum" => $item->cost."",
                    "location_type" => ($item->location-1)."",
                    "location_credit_institution" => $item->org_name."",
                    "location_agreement" => "",
                    "location_number" => $item->dogovor_number."",
                    "location_date" => date("d.m.Y",strtotime($item->dogovor_date))."",
                    "description" => $item->other."",
                    "mortgageeId" => $key."value",
                    "group" => "5"
                ];
            }elseif($item->property_type-1 == 3) {
                $professional [] = [
                    "address" => [
                        "Country" => $item->coutry."",
                        "Region" => $item->region."",
                        "Area" => $item->district."",
                        "City" => $item->city."",
                        "Town" => null,
                        "text" => "".$item->coutry.", Респ ".$item->region.", г ".$item->city.", ул ".$item->street.", дом ".$item->house." , корпус ".$item->corpus.", квартира ".$item->office."",
                        "Street" => $item->street."",
                        "HouseNumber" => $item->house."",
                        "KorpusNumber" => $item->corpus."",
                        "FlatNumber"=> $item->office.""
                    ],
                    "type" => "3",
                    "name" => $item->name."",
                    "cost_sum" => $item->cost."",
                    "location_type" => ($item->location-1)."",
                    "location_credit_institution" => $item->org_name."",
                    "location_agreement" => "",
                    "location_number" => $item->dogovor_number."",
                    "location_date" => date("d.m.Y",strtotime($item->dogovor_date))."",
                    "description" => $item->other."",
                    "mortgageeId" => $key."value",
                    "group" => "5"
                ];
            }else{
                $other [] = [
                    "address" => [
                        "Country" => $item->coutry."",
                        "Region" => $item->region."",
                        "Area" => $item->district."",
                        "City" => $item->city."",
                        "Town" => null,
                        "text" => "".$item->coutry.", Респ ".$item->region.", г ".$item->city.", ул ".$item->street.", дом ".$item->house." , корпус ".$item->corpus.", квартира ".$item->office."",
                        "Street" => $item->street."",
                        "HouseNumber" => $item->house."",
                        "KorpusNumber" => $item->corpus."",
                        "FlatNumber"=> $item->office.""
                    ],
                    "type" => "4",
                    "name" => $item->name."",
                    "cost_sum" => $item->cost."",
                    "location_type" => ($item->location-1)."",
                    "location_credit_institution" => $item->org_name."",
                    "location_agreement" => "",
                    "location_number" => $item->dogovor_number."",
                    "location_date" => date("d.m.Y",strtotime($item->dogovor_date))."",
                    "description" => $item->other."",
                    "mortgageeId" => $key."value",
                    "group" => "5"
                ];
            }

        }

        $result = [
            'valuable1' => $valuable_arr,
            'valuable2' => [
                "Fund" => $fund,
                "Jewelry" => $jewelry,
                "Art" => $art,
                "Professional" => $professional,
                "Other" => $other
            ]
        ];

        return $result;

    }
}
