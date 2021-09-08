<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "debitor".
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
class Debitor extends \yii\db\ActiveRecord
{

    public static $group = [
        '1' => 'Денежные обязательства',
        '2' => 'Обязательные платежи',
        '3' => 'Не денежные обязательства',
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

    public static $commitment = [
        '1' => 'Заем',
        '2' => 'Аренда',
        '3' => 'Алименты',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'debitor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id',], 'required'],
            [['ticket_id', 'group', 'is_predprin', 'statment', 'house', 'corpus', 'flat', 'post_index', 'sum_statment', 'sum_dolg', 'base', 'base_num', 'created_at', 'updated_at'], 'integer'],
            [['base_date', 'commitment'], 'safe'],
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
            'is_predprin' => 'Обязательство взоникло в результате предприн деятельсноти',
            'statment' => 'Statment',
            'name' => 'Наименование кредитора',
            'inn' => 'Inn',
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


    public static function saveDebitor($ticket_id){
        $ids = ArrayHelper::getColumn(Debitor::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Debitor');
        $count = $data ? count($data) : 0;
        $debitors = [];

        for ($i = 0; $i < $count; $i++) {

            if(isset($ids[$i])){
                $debitors[$i] = Debitor::findOne($ids[$i]);
            }else{
                $debitors[$i] = new Debitor();
            }
        }
        $uploadForm = new UploadForm();

        $result = true;

        foreach ($debitors as $i => $debitor) {
            $debitor->ticket_id = $ticket_id;
            if (!empty($data[$i]) && $debitor->load($data[$i], '')) {
                if(!$debitor->save()){
                    $result = false;
                }else{
                    $uploadForm->save("debitor","[$i]debitor",$ticket_id);
                }
            }
        }
        return $result;
    }

}
