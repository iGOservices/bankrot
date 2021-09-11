<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "property".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int|null $group
 * @property string|null $property_type
 * @property int|null $property_view
 * @property string|null $share
 * @property string|null $other_owners
 * @property string|null $active_name
 * @property string|null $square
 * @property string|null $reg_number
 * @property string|null $vin_number
 * @property string|null $date_sved
 * @property string|null $num_sved
 * @property string|null $coutry
 * @property string|null $region
 * @property string|null $district
 * @property string|null $city
 * @property string|null $street
 * @property int|null $house
 * @property int|null $corpus
 * @property int|null $office
 * @property int|null $post_index
 * @property int|null $cost
 * @property int|null $own_dogovor
 * @property int|null $active_status
 * @property string|null $zalog_name
 * @property int|null $zalog_post_index
 * @property int|null $zalog
 * @property int|null $zalog_inn
 * @property string|null $zalog_dogovor
 * @property string|null $other
 * @property int $created_at
 * @property int $updated_at
 */
class Property extends \yii\db\ActiveRecord
{
    public static $group = [
      '1' => 'Недвижимое имущество',
      '2' => 'Движемое имущество'
    ];

    public static $property_view = [
        '1' => 'Индивидуальная',
        '2' => 'Долевая',
        '3' => 'Общая'
    ];

    public static $zalog = [
        '1' => 'Физ. лицо',
        '2' => 'Организация'
    ];

    public static $property_type = [
        '1' => 'Земельный участок',
        '2' => 'Жилой дом, дача',
        '3' => 'Квартира',
        '4' => 'Гараж',
        '5' => 'Иное недвижимое имущество'
    ];

    public static $property_type_dvizh = [
        '1' => 'Легковой автомобиль',
        '2' => 'Грузовой автомобиль',
        '3' => 'Мототранспортное средство',
        '4' => 'Сельскохозяйственная техника',
        '5' => 'Водный транспорт',
        '6' => 'Воздушный транспорт',
        '7' => 'Иные транспортные средства',

    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'group', 'property_view', 'house', 'corpus', 'office', 'post_index', 'cost', 'active_status', 'zalog_post_index', 'created_at', 'updated_at','zalog_inn','zalog'], 'integer'],
            [['date_sved'], 'safe'],
            [['property_type', 'share', 'other_owners', 'active_name', 'square', 'reg_number', 'num_sved', 'coutry', 'region', 'district', 'city', 'street', 'zalog_name', 'zalog_dogovor','own_dogovor'], 'string', 'max' => 255],
            [['vin_number'], 'string', 'max' => 17],
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
            'group' => 'Группа',
            'property_type' => 'Вид имущества',
            'property_view' => 'Вид собственности',
            'share' => 'Доля владения',
            'other_owners' => 'Иные собственники',
            'active_name' => 'Наименование актива',
            'square' => 'Площадь',
            'reg_number' => 'Регистрационный номер',
            'vin_number' => 'VIN номер',
            'date_sved' => 'Дата свидетельства о регистрации',
            'num_sved' => 'Номер свидетельства о регистрации',
            'coutry' => 'Страна',
            'region' => 'Регион',
            'district' => 'Район',
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'corpus' => 'Корпус',
            'office' => 'Оффис',
            'post_index' => 'Почтовый индекс',
            'cost' => 'Стоимость(руб)',
            'active_status' => 'Статус актива',
            'zalog' => 'Залогодержатель',
            'zalog_inn' => 'ИНН залогодержателя',
            'zalog_name' => 'Имя залогодержателя',
            'zalog_post_index' => 'Почтовый индекс залогодержателя',
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

    public function getPropertyFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%]property%',false]);
    }
    public function getOtherPropertyFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%other_property%',false]);
    }

    public static function saveProperty($ticket_id){
//        $ids = ArrayHelper::getColumn(Property::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//        $data = Yii::$app->request->post('Property');
//
//        $count = $data ? count($data) : 0;
//        $property = [];
//
//        for ($i = 0; $i < $count; $i++) {
//            if(isset($ids[$i])){
//                $property[$i] = Property::findOne($ids[$i]);
//            }else{
//                $property[$i] = new Property();
//            }
//
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($property as $i => $prop) {
//            $prop->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $prop->load($data[$i], '')) {
//                if(!$prop->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("property","[$i]property",$ticket_id);
//                    $uploadForm->save("property","[$i]other_property",$ticket_id);
//                }
//            }
//        }
//        return $result;

        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Property');
        //echo"<pre>";print_r($data);die();
        foreach ($data as $key => $item){
            if($item['id']){
                $property = Property::findOne($item['id']);
            }else{
                $property = new Property();
                $property->ticket_id = $ticket_id;
            }
            // echo"<pre>";print_r($data);die();
            if($property->load($item, '')){
                if($property->save()){
                    $uploadForm->save("property","[$key]property",$property->id,$ticket_id);
                    $uploadForm->save("property","[$key]other_property",$property->id,$ticket_id);
                }else{
                    $result = false;
                }
            }
        }


        return $result;
    }
}
