<?php

namespace app\models;

use Codeception\Module\Cli;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "client_ticket".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $gender
 * @property string $birthday
 * @property string $birth_place
 * @property string $inn
 * @property string $snils
 * @property string $region
 * @property string $district
 * @property string $city
 * @property string $selo
 * @property string $street
 * @property string $house
 * @property string $corpuse
 * @property string $flat
 * @property string $index
 * @property string $fact_address
 * @property string $mail
 * @property int $phone
 * @property int $is_ip
 * @property int $is_work
 * @property string|null $changed_fio
 * @property int $facsimile
 * @property int $created_at
 * @property int $updated_at
 */
class ClientTicket extends \yii\db\ActiveRecord
{

    public static $gender = [
        '0' => 'Мужской',
        '1' => 'Женский',
    ];

    public static $is_ip = [
        '0' => 'Нет',
        '1' => 'Да',
    ];

    public static $is_work= [
        '0' => 'Нет',
        '1' => 'Да',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gender', 'phone', 'is_ip', 'is_work', 'facsimile', 'created_at', 'updated_at','house','corpuse','flat','index'], 'integer'],
            [['birthday'], 'safe'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
            [['birth_place',  'fact_address', 'mail', 'changed_fio','region','district','city','selo','street'], 'string', 'max' => 255],
            [['inn'], 'string', 'max' => 12],
            [['snils'], 'string', 'max' => 14],
            [['mail'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер тикета',
            'user_id' => 'Пользователь',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'birthday' => 'Дата рождения',
            'birth_place' => 'Место рождения',
            'inn' => 'ИНН',
            'snils' => 'Снилс',
            'fact_address' => 'Фактический адресс',
            'mail' => 'Email',
            'phone' => 'Телефон',
            'is_ip' => 'ИП',
            'is_work' => 'Статус безработного',
            'changed_fio' => 'Предыдущее ФИО',
            'facsimile' => 'Факсимиле',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'region' => 'Регион',
            'district' => 'Район',
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'flat' => 'Квартира',
            'index' => 'Потчовый индекс',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getUserDocs()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'user_docs']);
    }

    public function getExportPay()
    {
        return $this->hasOne(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'export_asb']);
    }

    public function getTicketStatus()
    {
        return $this->hasOne(TicketStatus::className(), ['ticket_id' => 'id']);
    }

    public function getFacsimileFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'facsimile']);
    }

    public function getInnFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'inn']);
    }

    public function getSnilsFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'snils']);
    }

    public function getTrudBookFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'trud_book']);
    }

    public function getIsWorkFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'is_work']);
    }

    public function getIsIpFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'is_ip']);
    }

    public function getChangedFioFile()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'changed_fio']);
    }

    public function getFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => $this->tableName()]);
    }

    public function getPassport()
    {
        return $this->hasOne(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'passport']);
    }

    public function getInn()
    {
        return $this->hasOne(Upload::className(), ['model_id' => 'id'])
            ->where(['model' => 'inn']);
    }

    public function getUploadedFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id']);
    }

    public function getPassportByTicket()
    {
        return $this->hasOne(Passport::className(), ['ticket_id' => 'id']);
    }

    public function getPropertyByTicket()
    {
        return $this->hasMany(Property::className(), ['ticket_id' => 'id']);
    }

    public function getBankByTicket()
    {
        return $this->hasMany(Bank::className(), ['ticket_id' => 'id']);
    }

    public function getSharesByTicket()
    {
        return $this->hasMany(Shares::className(), ['ticket_id' => 'id']);
    }

    public function getOtherSharesByTicket()
    {
        return $this->hasMany(OtherShares::className(), ['ticket_id' => 'id']);
    }

    public function getValuablePropertyByTicket()
    {
        return $this->hasMany(ValuableProperty::className(), ['ticket_id' => 'id']);
    }

    public function getCreditorByTicket()
    {
        return $this->hasMany(Creditor::className(), ['ticket_id' => 'id']);
    }

    public function getDebitorByTicket()
    {
        return $this->hasMany(Debitor::className(), ['ticket_id' => 'id']);
    }

    public static function getUserTickets()
    {
        return ClientTicket::find()->where(['user_id' => Yii::$app->user->id])->orderBy('created_at DESC')->all();
    }

    public static function getActiveTicket(){
        $tickets = ClientTicket::find()->where(['user_id' => Yii::$app->user->id])->all();

        if($tickets){
            foreach ($tickets as $ticket) {
                //тут смотрим тип домена и для конкретного домена
                $ticket_status = $ticket->ticketStatus;
                //Если находим незавершенный тикет то продолжаем его
                if($ticket_status && $ticket_status->status == 0){
                    return $ticket->id;
                }
            }
        }

        return false;

    }

}
