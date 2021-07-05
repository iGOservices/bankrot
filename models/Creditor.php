<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;

use Yii;

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
        '2' => 'Обязательный платежы',
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
            [['ticket_id', 'group', 'commitment', 'is_predprin', 'statment', 'house', 'corpus', 'flat', 'post_index', 'sum_statment', 'sum_dolg', 'base', 'base_num', 'created_at', 'updated_at'], 'integer'],
            [['base_date'], 'safe'],
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

}
