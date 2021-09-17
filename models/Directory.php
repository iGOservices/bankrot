<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "directory".
 *
 * @property int $id
 * @property int $name
 * @property int $surname
 * @property int $patronymic
 * @property int $gender
 * @property int $birthday
 * @property int $birth_place
 * @property int $inn
 * @property int $snils
 * @property int $region
 * @property int $district
 * @property int $city
 * @property int $street
 * @property int $selo
 * @property int $house
 * @property int $corpus
 * @property int $flat
 * @property int|null $index
 * @property int $fact_address
 * @property int $passport_id
 * @property int $inter_passsport_id
 * @property int $mail
 * @property int $phone
 * @property int $is_ip
 * @property int $is_work
 * @property int $changed_fio
 * @property int $facsimile
 * @property int $family_type
 * @property int $family_name
 * @property int $family_surname
 * @property int $family_patronymic
 * @property int $family_birthday
 * @property int $family_inn
 * @property int $family_birth_country
 * @property int $family_birth_series
 * @property int $family_birth_number
 * @property int $family_birth_date
 * @property int $family_birth_number_act
 * @property int $family_birth_number_act_date
 * @property int $family_given
 * @property int $brak
 * @property int $razvod
 * @property int $bank_name
 * @property int $bank_post_address
 * @property int $bank_number
 * @property int $bank_bic
 * @property int $bank_type
 * @property int $bank_currency
 * @property int $bank_date_open
 * @property int $bank_balance
 * @property int $bank_other
 * @property int $creditor_group
 * @property int $creditor_commitment
 * @property int $creditor_is_predprin
 * @property int $creditor_statment
 * @property int $creditor_name
 * @property int $creditor_inn
 * @property int $creditor_coutry
 * @property int $creditor_region
 * @property int $creditor_district
 * @property int $creditor_city
 * @property int $creditor_street
 * @property int $creditor_house
 * @property int $creditor_corpus
 * @property int $creditor_flat
 * @property int $creditor_post_index
 * @property int $creditor_sum_statment
 * @property int $creditor_sum_dolg
 * @property int $creditor_forfeit
 * @property int $creditor_base
 * @property int $creditor_base_date
 * @property int $creditor_base_num
 * @property int $creditor_other
 * @property int $debitor_group
 * @property int $debitor_commitment
 * @property int $debitor_is_predprin
 * @property int $debitor_statment
 * @property int $debitor_name
 * @property int $debitor_inn
 * @property int $debitor_coutry
 * @property int $debitor_region
 * @property int $debitor_district
 * @property int $debitor_city
 * @property int $debitor_street
 * @property int $debitor_house
 * @property int $debitor_corpus
 * @property int $debitor_flat
 * @property int $debitor_post_index
 * @property int $debitor_sum_statment
 * @property int $debitor_sum_dolg
 * @property int $debitor_forfeit
 * @property int $debitor_base
 * @property int $debitor_base_date
 * @property int $debitor_base_num
 * @property int $debitor_other
 * @property int $deal_type
 * @property int $deal_description
 * @property int $deal_date
 * @property int $deal_name
 * @property int $deal_inn
 * @property int $enforce_number
 * @property int $enforce_date
 * @property int $enforce_sum
 * @property int $nalog_work
 * @property int $nalog_year
 * @property int $nalog_income
 * @property int $nalog_nalog
 * @property int $other_text
 * @property int $other_shares_creater
 * @property int $other_shares_type
 * @property int $other_shares_total_count
 * @property int $other_shares_nominal_cost
 * @property int $other_shares_other
 * @property int $property_group
 * @property int $property_property_type
 * @property int $property_property_view
 * @property int $property_share
 * @property int $property_other_owners
 * @property int $property_active_name
 * @property int $property_square
 * @property int $property_reg_number
 * @property int $property_vin_number
 * @property int $property_date_sved
 * @property int $property_num_sved
 * @property int $property_coutry
 * @property int $property_region
 * @property int $property_district
 * @property int $property_city
 * @property int $property_street
 * @property int $property_house
 * @property int $property_corpus
 * @property int $property_office
 * @property int $property_post_index
 * @property int $property_cost
 * @property int $property_active_status
 * @property int $property_zalog_name
 * @property int $property_zalog_post_index
 * @property int $property_zalog_dogovor
 * @property int $property_other
 * @property int $property_own_dogovor
 * @property int $property_zalog_inn
 * @property int $property_zalog
 * @property int $share_name
 * @property int $share_location
 * @property int $share_inn
 * @property int $share_company_capital
 * @property int $share_share
 * @property int $share_nominal_cost
 * @property int $share_shares_count
 * @property int $share_total_cost
 * @property int $share_dogovor_number
 * @property int $share_date
 * @property int $share_other
 * @property int $valuable_property_property_type
 * @property int $valuable_property_name
 * @property int $valuable_property_cost
 * @property int $valuable_property_location
 * @property int $valuable_property_coutry
 * @property int $valuable_property_region
 * @property int $valuable_property_district
 * @property int $valuable_property_city
 * @property int $valuable_property_street
 * @property int $valuable_property_house
 * @property int $valuable_property_corpus
 * @property int $valuable_property_office
 * @property int $valuable_property_post_index
 * @property int $valuable_property_org_name
 * @property int $valuable_property_dogovor_number
 * @property int $valuable_property_dogovor_date
 * @property int $valuable_property_active_status
 * @property int $valuable_property_zalog_name
 * @property int $valuable_property_zalog_type
 * @property int $valuable_property_zalog_inn
 * @property int $valuable_property_zalog_address
 * @property int $valuable_property_zalog_dogovor
 * @property int $valuable_property_other
 */
class Directory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'gender', 'birthday', 'birth_place', 'inn', 'snils', 'region', 'district', 'city', 'street', 'selo', 'house', 'corpus', 'flat', 'index', 'fact_address', 'passport_id', 'inter_passsport_id', 'mail', 'phone', 'is_ip', 'is_work', 'changed_fio', 'facsimile', 'family_type', 'family_name', 'family_surname', 'family_patronymic', 'family_birthday', 'family_inn', 'family_birth_country', 'family_birth_series', 'family_birth_number', 'family_birth_date', 'family_birth_number_act', 'family_birth_number_act_date', 'family_given', 'brak', 'razvod', 'bank_name', 'bank_post_address', 'bank_number', 'bank_bic', 'bank_type', 'bank_currency', 'bank_date_open', 'bank_balance', 'bank_other', 'creditor_group', 'creditor_commitment', 'creditor_is_predprin', 'creditor_statment', 'creditor_name', 'creditor_inn', 'creditor_coutry', 'creditor_region', 'creditor_district', 'creditor_city', 'creditor_street', 'creditor_house', 'creditor_corpus', 'creditor_flat', 'creditor_post_index', 'creditor_sum_statment', 'creditor_sum_dolg', 'creditor_forfeit', 'creditor_base', 'creditor_base_date', 'creditor_base_num', 'creditor_other', 'debitor_group', 'debitor_commitment', 'debitor_is_predprin', 'debitor_statment', 'debitor_name', 'debitor_inn', 'debitor_coutry', 'debitor_region', 'debitor_district', 'debitor_city', 'debitor_street', 'debitor_house', 'debitor_corpus', 'debitor_flat', 'debitor_post_index', 'debitor_sum_statment', 'debitor_sum_dolg', 'debitor_forfeit', 'debitor_base', 'debitor_base_date', 'debitor_base_num', 'debitor_other', 'deal_type', 'deal_description', 'deal_date', 'deal_name', 'deal_inn', 'enforce_number', 'enforce_date', 'enforce_sum', 'nalog_work', 'nalog_year', 'nalog_income', 'nalog_nalog', 'other_text', 'other_shares_creater', 'other_shares_type', 'other_shares_total_count', 'other_shares_nominal_cost', 'other_shares_other', 'property_group', 'property_property_type', 'property_property_view', 'property_share', 'property_other_owners', 'property_active_name', 'property_square', 'property_reg_number', 'property_vin_number', 'property_date_sved', 'property_num_sved', 'property_coutry', 'property_region', 'property_district', 'property_city', 'property_street', 'property_house', 'property_corpus', 'property_office', 'property_post_index', 'property_cost', 'property_active_status', 'property_zalog_name', 'property_zalog_post_index', 'property_zalog_dogovor', 'property_other', 'property_own_dogovor', 'property_zalog_inn', 'property_zalog', 'share_name', 'share_location', 'share_inn', 'share_company_capital', 'share_share', 'share_nominal_cost', 'share_shares_count', 'share_total_cost', 'share_dogovor_number', 'share_date', 'share_other', 'valuable_property_property_type', 'valuable_property_name', 'valuable_property_cost', 'valuable_property_location', 'valuable_property_coutry', 'valuable_property_region', 'valuable_property_district', 'valuable_property_city', 'valuable_property_street', 'valuable_property_house', 'valuable_property_corpus', 'valuable_property_office', 'valuable_property_post_index', 'valuable_property_org_name', 'valuable_property_dogovor_number', 'valuable_property_dogovor_date', 'valuable_property_active_status', 'valuable_property_zalog_name', 'valuable_property_zalog_type', 'valuable_property_zalog_inn', 'valuable_property_zalog_address', 'valuable_property_zalog_dogovor', 'valuable_property_other'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'birthday' => 'Дата рождения',
            'birth_place' => 'Место рождения',
            'inn' => 'ИНН',
            'snils' => 'Снилс',
            'region' => 'Регион',
            'district' => 'Район',
            'city' => 'Город',
            'street' => 'Улица',
            'selo' => 'Поселок',
            'house' => 'Дом',
            'corpus' => 'Корпус',
            'flat' => 'Квартира',
            'index' => 'Почтовый индекс',
            'fact_address' => 'Фактический адресс',
            'passport_id' => 'Пасспорт',
            'inter_passsport_id' => 'Загран пасспорт',
            'mail' => 'Mail',
            'phone' => 'Телефон',
            'is_ip' => 'ИП',
            'is_work' => 'Статус безработного',
            'changed_fio' => 'Смена ФИО',
            'facsimile' => 'Факсимиле',
            'family_type' => 'Тип родства',
            'family_name' => 'Имя',
            'family_surname' => 'Фамилия',
            'family_patronymic' => 'Отчество',
            'family_birthday' => 'Дата рождения',
            'family_inn' => 'ИНН',
            'family_birth_country' => 'Страна рождения',
            'family_birth_series' => 'Серия',
            'family_birth_number' => 'Номер',
            'family_birth_date' => 'Дата рождения',
            'family_birth_number_act' => 'Номер акта',
            'family_birth_number_act_date' => 'Дата акта',
            'family_given' => 'Кем выдан',
            'brak' => 'Брачный договор',
            'razvod' => 'Договор о разводе',
            'bank_name' => 'Наименование кредитной организации',
            'bank_post_address' => 'Потовый адресс',
            'bank_number' => 'Номер счета',
            'bank_bic' => 'БИК',
            'bank_type' => 'Вид счета',
            'bank_currency' => 'Валюта счета',
            'bank_date_open' => 'Дата открытия счета',
            'bank_balance' => 'Исходящий остаток в рублях',
            'bank_other' => 'Примечание(Сведения о счетах в банках)',
            'creditor_group' => 'Группа(Кредиторы)',
            'creditor_commitment' => 'Содержание обязательства(Кредиторы)',
            'creditor_is_predprin' => 'Обязательство возникло в результате предпринимательской деятельности(Кредиторы)',
            'creditor_statment' => 'Физ.лицо/Организация(Кредиторы)',
            'creditor_name' => 'Наименование кредитора',
            'creditor_inn' => 'ИНН кредитора',
            'creditor_coutry' => 'Страна(Кредиторы)',
            'creditor_region' => 'Регион(Кредиторы)',
            'creditor_district' => 'Район(Кредиторы)',
            'creditor_city' => 'Город(Кредиторы)',
            'creditor_street' => 'Улица(Кредиторы)',
            'creditor_house' => 'Дом(Кредиторы)',
            'creditor_corpus' => 'Корпус(Кредиторы)',
            'creditor_flat' => 'Квартира(Кредиторы)',
            'creditor_post_index' => 'Почтовый индекс(Кредиторы)',
            'creditor_sum_statment' => 'Сумма обязательства всего(Кредиторы)',
            'creditor_sum_dolg' => 'Сумма обязательства задолженность(Кредиторы)',
            'creditor_forfeit' => 'Штрафы, пени, иные санкции(Кредиторы)',
            'creditor_base' => 'Основание возникновения задолженности(Кредиторы)',
            'creditor_base_date' => 'Дата документа(Кредиторы)',
            'creditor_base_num' => 'Номер документа(Кредиторы)',
            'creditor_other' => 'Примечание(Кредиторы)',
            'debitor_group' => 'Группа(Дебиторы)',
            'debitor_commitment' => 'Содержание обзательства(Дебиторы)',
            'debitor_is_predprin' => 'Обязательство возникло в результате предпринимательской деятельности(Дебиторы)',
            'debitor_statment' => 'Физ.лицо/Организация(Дебиторы)',
            'debitor_name' => 'Наименование дебитора',
            'debitor_inn' => 'ИНН дебитора',
            'debitor_coutry' => 'Страна(Дебиторы)',
            'debitor_region' => 'Регион(Дебиторы)',
            'debitor_district' => 'Район(Дебиторы)',
            'debitor_city' => 'Город(Дебиторы)',
            'debitor_street' => 'Улица(Дебиторы)',
            'debitor_house' => 'Дом(Дебиторы)',
            'debitor_corpus' => 'Корпус(Дебиторы)',
            'debitor_flat' => 'Квартира(Дебиторы)',
            'debitor_post_index' => 'Почтовый индекс(Дебиторы)',
            'debitor_sum_statment' => 'Сумма обязательства всего(Дебиторы)',
            'debitor_sum_dolg' => 'Сумма обязательства задолженность(Дебиторы)',
            'debitor_forfeit' => 'Штрафы, пени, иные санкции(Дебиторы)',
            'debitor_base' => 'Тип подтверждающего документа(Дебиторы)',
            'debitor_base_date' => 'Дата документа(Дебиторы)',
            'debitor_base_num' => 'Номер документа(Дебиторы)',
            'debitor_other' => 'Примечание(Дебиторы)',
            'deal_type' => 'Предмет сделки',
            'deal_description' => 'Описание сделки',
            'deal_date' => 'Дата сделки',
            'deal_name' => 'Имя контрагента',
            'deal_inn' => 'ИНН контрагента',
            'enforce_number' => 'Номер исполнительного производства',
            'enforce_date' => 'Дата исполнительного производства',
            'enforce_sum' => 'Сумма непогашенной задолженности',
            'nalog_work' => 'Наименование налогового агента',
            'nalog_year' => 'Год отчетного периода',
            'nalog_income' => 'Сумма дохода',
            'nalog_nalog' => 'Сумма налога',
            'other_text' => 'Примечание',
            'other_shares_creater' => 'Лицо выпустившее ценную бумагу',
            'other_shares_type' => 'Вид ценной бумаги',
            'other_shares_total_count' => 'Общее количество',
            'other_shares_nominal_cost' => 'Номинальная величина обязательства',
            'other_shares_other' => 'Примечание(иные ценные бумаги)',
            'property_group' => 'Группа(Имущество)',
            'property_property_type' => 'Вид имущества',
            'property_property_view' => 'Вид собственности',
            'property_share' => 'Доля владения',
            'property_other_owners' => 'Иные собственники',
            'property_active_name' => 'Наименование актива',
            'property_square' => 'Площадь',
            'property_reg_number' => 'Регистрационный номер актива',
            'property_vin_number' => 'VIN номер',
            'property_date_sved' => 'Дата свидетельства о регистрации',
            'property_num_sved' => 'Номер свидетельства о регистрации',
            'property_coutry' => 'Property Coutry',
            'property_region' => 'Property Region',
            'property_district' => 'Страна(Имущество)',
            'property_city' => 'Город(Имущество)',
            'property_street' => 'Улица(Имущество)',
            'property_house' => 'Дом(Имущество)',
            'property_corpus' => 'Корпус(Имущество)',
            'property_office' => 'Оффис(Имущество)',
            'property_post_index' => 'Почтовый индекс(Имущество)',
            'property_cost' => 'Стоимость',
            'property_active_status' => 'Статус актива(Имущество)',
            'property_zalog_name' => 'Имя залогодержателя(Имущество)',
            'property_zalog_post_index' => 'Почтовый адресс залогодержателя(Имущество)',
            'property_zalog_dogovor' => 'Договор залога или иная сделка(Имущество)',
            'property_other' => 'Примечание(Имущество)',
            //'property_own_dogovor' => 'Договор залога или иная сделка(Имущество)',
            'property_zalog_inn' => 'ИНН залогодержателя(Имущество)',
            'property_zalog' => 'Залогодержатель(Имущество)',
            'share_name' => 'Наименование организации(Акции)',
            'share_location' => 'Местонахождение организации(Акции)',
            'share_inn' => 'ИНН общества(Акции)',
            'share_company_capital' => 'Уставной капитал общества(Акции)',
            'share_share' => 'Доля участия(Акции)',
            'share_nominal_cost' => 'Номинальная стоимость акции(Акции)',
            'share_shares_count' => 'Количество акций',
            'share_total_cost' => 'Общая сумма акция',
            'share_dogovor_number' => 'Номер договора участия(Акции)',
            'share_date' => 'Дата договора(Акции)',
            'share_other' => 'Примечание(Акции)',
            'valuable_property_property_type' => 'Вид имущества',
            'valuable_property_name' => 'Наименование(Имущество)',
            'valuable_property_cost' => 'Сумма(Имущество)',
            'valuable_property_location' => 'Место нахождения или хранения(Имущество)',
            'valuable_property_coutry' => 'Страна(Имущество)',
            'valuable_property_region' => 'Регион(Имущество)',
            'valuable_property_district' => 'Район(Имущество)',
            'valuable_property_city' => 'Город(Имущество)',
            'valuable_property_street' => 'Улица(Имущество)',
            'valuable_property_house' => 'Дом(Имущество)',
            'valuable_property_corpus' => 'Корпус(Имущество)',
            'valuable_property_office' => 'Оффис(Имущество)',
            'valuable_property_post_index' => 'Почтовый индекс(Имущество)',
            'valuable_property_org_name' => 'Наименование кредитной организации(Имущество)',
            'valuable_property_dogovor_number' => 'Номер договора(Имущество)',
            'valuable_property_dogovor_date' => 'Дата догвоора(Имущество)',
            'valuable_property_active_status' => 'Статус актива(Имущество)',
            'valuable_property_zalog_name' => 'Имя залогодержателя(Имущество)',
            'valuable_property_zalog_type' => 'Залогодержатель(Имущество)',
            'valuable_property_zalog_inn' => 'ИНН залогодержателя(Имущество)',
            'valuable_property_zalog_address' => 'Почтовый адресс залогодержателя(Имущество)',
            'valuable_property_zalog_dogovor' => 'Договор залога(Имущество)',
            'valuable_property_other' => 'Примечание(Имущество)',
        ];
    }
}
