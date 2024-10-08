<?php

namespace app\models;

use yii\base\BaseObject;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "creditor".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int|null $group
 * @property int|null $commitment
 * @property int|null $is_predprin
 * @property int|null $statment
 * @property string|null $name
 * @property string|null $inn
 * @property string|null $coutry
 * @property string|null $region
 * @property string|null $district
 * @property string|null $city
 * @property string|null $street
 * @property int|null $house
 * @property int|null $corpus
 * @property int|null $flat
 * @property int|null $post_index
 * @property int|null $sum_statment
 * @property int|null $sum_dolg
 * @property string|null $forfeit
 * @property int|null $base
 * @property string|null $base_date
 * @property int|null $base_num
 * @property string|null $other
 * @property int $created_at
 * @property int $updated_at
 */
class Creditor extends \yii\db\ActiveRecord
{

    public static $group = [
        '1' => 'Денежные обязательства',
        '2' => 'Обязательные платежи',
        '3' => 'Не денежные обязательства',
    ];

    public static $commitment = [
        '1' => 'Заем',
        '2' => 'Аренда',
        '3' => 'Кредит',
        '4' => 'Алименты',
        '5' => 'Коммунальные платежи'
    ];

    public static $commitment_ob = [
        '1' => 'Налог на имущество физических лиц',
        '2' => 'Земельный налог',
        '3' => 'Транспортный налог',
        '4' => 'Налог на доходы физических лиц',
    ];

    public static $statment = [
        '1' => 'Физ. лицо',
        '2' => 'Организация',
    ];

    public static $base = [
        '1' => 'Договор',
        '2' => 'Акт',
        '3' => 'Накладная',
        '4' => 'Счет-фактура',
        '5' => 'Доверенность',
        '6' => 'Расписка',
        '7' => 'Справка',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'creditor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'group',  'is_predprin', 'statment', 'house', 'corpus', 'flat', 'post_index', 'sum_statment', 'sum_dolg', 'base', 'base_num', 'created_at', 'updated_at'], 'integer'],
            [['base_date','commitment'], 'safe'],
            [['name', 'coutry', 'region', 'district', 'city', 'street', 'forfeit'], 'string', 'max' => 255],
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
            'group' => 'Группа',
            'commitment' => 'Содержание обязательства',
            'is_predprin' => 'Обязательство возникло в результате предпринимательской деятельсноти',
            'statment' => 'Физ лицо/орг.',
            'name' => 'Наименование кредитора',
            'inn' => 'ИНН',
            'coutry' => 'Страна',
            'region' => 'Регион',
            'district' => 'Район',
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'corpus' => 'Корпус',
            'flat' => 'Квартира',
            'post_index' => 'Потчовый индекс',
            'sum_statment' => 'Сумма обязательства Всего',
            'sum_dolg' => 'Сумма обязательства Задолженность',
            'forfeit' => 'Санкции',
            'base' => 'Основание возникновени задолженности',
            'base_date' => 'Дата документа',
            'base_num' => 'Номер документа',
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

    public function getCreditorFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%creditor%',false]);
    }

    public static function saveCreditor($ticket_id){

//        $ids = ArrayHelper::getColumn(Creditor::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//        $data = Yii::$app->request->post('Creditor');
//        $count = $data ? count($data) : 0;
//        $creditors = [];
//
//        for ($i = 0; $i < $count; $i++) {
//            if(isset($ids[$i])){
//                $creditors[$i] = Creditor::findOne($ids[$i]);
//            }else{
//                $creditors[$i] = new Creditor();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($creditors as $i => $creditor) {
//            $creditor->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $creditor->load($data[$i], '')) {
//                if(!$creditor->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("creditor","[$i]creditor",$ticket_id);
//                }
//            }
//        }

        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Creditor');
        //echo"<pre>";print_r($data);die();
        if($data) {
            foreach ($data as $key => $item) {
                if ($item['id']) {
                    $creditor = Creditor::findOne($item['id']);
                } else {
                    $creditor = new Creditor();
                    $creditor->ticket_id = $ticket_id;
                }

                if ($creditor->load($item, '')) {
                    if ($creditor->save()) {
                        $uploadForm->save("creditor", "[$key]creditor", $creditor->id, $ticket_id);
                    } else {
                        $result = false;
                    }
                }
            }
        }

        return $result;
    }

    public static function getTotalSumStatment($ticket_id){
       return Creditor::find()->where(['ticket_id' => $ticket_id])->sum('sum_statment');
    }

    public static function getTotalSumDolg($ticket_id){
        return Creditor::find()->where(['ticket_id' => $ticket_id])->sum('sum_dolg');
    }

    /**
     * Возвращает сумму прописью
     *
     * @author runcore
     * @uses morph(...)
     * @param $num
     * @return string
     */
    public static function num2str($num)
    {
        $nul = 'ноль';
        $ten = [
            ['', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
            ['', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
        ];
        $a20 = ['десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'];
        $tens = [2 => 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'];
        $hundred = ['', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'];
        $unit = [ // Units
            ['копейка', 'копейки', 'копеек', 1],
            ['рубль', 'рубля', 'рублей', 0],
            ['тысяча', 'тысячи', 'тысяч', 1],
            ['миллион', 'миллиона', 'миллионов', 0],
            ['миллиард', 'милиарда', 'миллиардов', 0],
        ];

        list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
        $out = [];
        if (intval($rub) > 0) {
            foreach (str_split($rub, 3) as $uk => $v) { // by 3 symbols
                if (!intval($v)) continue;
                $uk = sizeof($unit) - $uk - 1; // unit key
                $gender = $unit[$uk][3];
                list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
                // mega-logic
                $out[] = $hundred[$i1]; # 1xx-9xx
                if ($i2 > 1) $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3]; # 20-99
                else $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
                // units without rub & kop
                if ($uk > 1) $out[] = self::morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
            } //foreach
        } else $out[] = $nul;
        $out[] = self::morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // rub
        $out[] = $kop . ' ' . self::morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // kop
        return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
    }

    /**
     * Склоняем словоформу
     * @ author runcore
     */
    protected static function morph($n, $f1, $f2, $f5)
    {
        $n = abs(intval($n)) % 100;
        if ($n > 10 && $n < 20) return $f5;
        $n = $n % 10;
        if ($n > 1 && $n < 5) return $f2;
        if ($n == 1) return $f1;
        return $f5;
    }

    public static function createPayArray($id){
        $creditor = Creditor::find()->where(['ticket_id' => $id])->all();
        $creditor_arr1 = [];
        $monetary = [];
        $non_monetary = [];
        $payments = [];
        foreach ($creditor as $key => $item){
            $creditor_arr1 [] = [
                "id" => $key."creditor",
                "name" => $item->name."",
                "type" => $item->statment == 1 ? "physical": "organization",
                "inn" => $item->inn."",
                "address" => [
                    "Country" => [
                        "id" => $item->coutry,
                        "text" => $item->coutry
                    ],
                    "Region" => [
                        "id" => $item->region,
                        "text" => $item->region
                    ],
                    "Area" => [
                        "id" => $item->district,
                        "text" => $item->district
                    ],
                    "City" => [
                        "id" => $item->city,
                        "text" => $item->city
                    ],
                    "Town" => [
                        "id"=> "",
                        "text"  => ""
                    ],
                    "text" => "".$item->coutry.", Респ ".$item->region.", г ".$item->city.", ул ".$item->street.", дом ".$item->house." , корпус ".$item->corpus.", квартира ".$item->flat."",
                    "Street" => [
                        "id" => $item->street,
                        "text" => $item->street
                    ],
                    "HouseNumber" => $item->house,
                    "KorpusNumber" => $item->corpus,
                    "FlatNumber" => $item->flat
                ],
                "type_contact" => "creditor",
                "text" => $item->name.""
            ];
            if($item->group == 1){
                $monetary [] = [
                        "group" => ($item->group-1)."",
                        "creditor_id" => $key."creditor",
                        "content_obligation" => Creditor::$commitment[$item->commitment]."",
                        "business" => $item->is_predprin  == 1 ? true : false,
                        "occurrence_agreement" => Creditor::$base[$item->base],
                        "occurrence_date" => date("d.m.Y",strtotime($item->base_date))."",
                        "occurrence_number" => $item->base_num."",
                        "liabilities_total" => $item->sum_statment."",
                        "liabilities_debt" => $item->sum_dolg."",
                        "fines" => $item->forfeit."",
                        "description" => $item->other,


                ];
            }elseif($item->group == 2){
                $payments [] = [
                        "group" => ($item->group-1)."",
                        "creditor_id" => $key."creditor",
                        "content_obligation" => Creditor::$commitment_ob[$item->commitment]."",
                        "name_tax" => Creditor::$commitment_ob[$item->commitment]."",
                        "business" => $item->is_predprin  == 1 ? true : false,
                        "occurrence_agreement" => Creditor::$base[$item->base],
                        "occurrence_date" =>  date("d.m.Y",strtotime($item->base_date))."",
                        "occurrence_number" => $item->base_num."",
                        "liabilities_total" => $item->sum_statment."",
                        "liabilities_debt" => $item->sum_dolg."",
                        "fines" => $item->forfeit."",
                        "description" => $item->other."",

                ];
            }else{
                $non_monetary [] = [
                        "group" => ($item->group-1)."",
                        "creditor_id" => $key."creditor",
                        "content_obligation" => $item->commitment."",
                        "name_tax" => $item->commitment."",
                        "business" => $item->is_predprin  == 1 ? true : false,
                        "occurrence_agreement" => Creditor::$base[$item->base],
                        "occurrence_date" =>  date("d.m.Y",strtotime($item->base_date))."",
                        "occurrence_number" => $item->base_num."",
                        "liabilities_total" => $item->sum_statment."",
                        "liabilities_debt" => $item->sum_dolg."",
                        "fines" => $item->forfeit."",
                        "description" => $item->other."",

                ];
            }
        }

        $result = [
            'creditor1' => $creditor_arr1,
            'creditor2' => [
                "Data" => [
                    "Monetary" => $monetary,
                    "Payments" => $payments,
                    "NonMonetary" => $non_monetary,
                ]
            ]
        ];

        return $result;
    }

}
