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
            'bank_name' => 'Bank Name',
            'bank_post_address' => 'Bank Post Address',
            'bank_number' => 'Bank Number',
            'bank_bic' => 'Bank Bic',
            'bank_type' => 'Bank Type',
            'bank_currency' => 'Bank Currency',
            'bank_date_open' => 'Bank Date Open',
            'bank_balance' => 'Bank Balance',
            'bank_other' => 'Bank Other',
            'creditor_group' => 'Creditor Group',
            'creditor_commitment' => 'Creditor Commitment',
            'creditor_is_predprin' => 'Creditor Is Predprin',
            'creditor_statment' => 'Creditor Statment',
            'creditor_name' => 'Creditor Name',
            'creditor_inn' => 'Creditor Inn',
            'creditor_coutry' => 'Creditor Coutry',
            'creditor_region' => 'Creditor Region',
            'creditor_district' => 'Creditor District',
            'creditor_city' => 'Creditor City',
            'creditor_street' => 'Creditor Street',
            'creditor_house' => 'Creditor House',
            'creditor_corpus' => 'Creditor Corpus',
            'creditor_flat' => 'Creditor Flat',
            'creditor_post_index' => 'Creditor Post Index',
            'creditor_sum_statment' => 'Creditor Sum Statment',
            'creditor_sum_dolg' => 'Creditor Sum Dolg',
            'creditor_forfeit' => 'Creditor Forfeit',
            'creditor_base' => 'Creditor Base',
            'creditor_base_date' => 'Creditor Base Date',
            'creditor_base_num' => 'Creditor Base Num',
            'creditor_other' => 'Creditor Other',
            'debitor_group' => 'Debitor Group',
            'debitor_commitment' => 'Debitor Commitment',
            'debitor_is_predprin' => 'Debitor Is Predprin',
            'debitor_statment' => 'Debitor Statment',
            'debitor_name' => 'Debitor Name',
            'debitor_inn' => 'Debitor Inn',
            'debitor_coutry' => 'Debitor Coutry',
            'debitor_region' => 'Debitor Region',
            'debitor_district' => 'Debitor District',
            'debitor_city' => 'Debitor City',
            'debitor_street' => 'Debitor Street',
            'debitor_house' => 'Debitor House',
            'debitor_corpus' => 'Debitor Corpus',
            'debitor_flat' => 'Debitor Flat',
            'debitor_post_index' => 'Debitor Post Index',
            'debitor_sum_statment' => 'Debitor Sum Statment',
            'debitor_sum_dolg' => 'Debitor Sum Dolg',
            'debitor_forfeit' => 'Debitor Forfeit',
            'debitor_base' => 'Debitor Base',
            'debitor_base_date' => 'Debitor Base Date',
            'debitor_base_num' => 'Debitor Base Num',
            'debitor_other' => 'Debitor Other',
            'deal_type' => 'Deal Type',
            'deal_description' => 'Deal Description',
            'deal_date' => 'Deal Date',
            'deal_name' => 'Deal Name',
            'deal_inn' => 'Deal Inn',
            'enforce_number' => 'Enforce Number',
            'enforce_date' => 'Enforce Date',
            'enforce_sum' => 'Enforce Sum',
            'nalog_work' => 'Nalog Work',
            'nalog_year' => 'Nalog Year',
            'nalog_income' => 'Nalog Income',
            'nalog_nalog' => 'Nalog Nalog',
            'other_text' => 'Other Text',
            'other_shares_creater' => 'Other Shares Creater',
            'other_shares_type' => 'Other Shares Type',
            'other_shares_total_count' => 'Other Shares Total Count',
            'other_shares_nominal_cost' => 'Other Shares Nominal Cost',
            'other_shares_other' => 'Other Shares Other',
            'property_group' => 'Property Group',
            'property_property_type' => 'Property Property Type',
            'property_property_view' => 'Property Property View',
            'property_share' => 'Property Share',
            'property_other_owners' => 'Property Other Owners',
            'property_active_name' => 'Property Active Name',
            'property_square' => 'Property Square',
            'property_reg_number' => 'Property Reg Number',
            'property_vin_number' => 'Property Vin Number',
            'property_date_sved' => 'Property Date Sved',
            'property_num_sved' => 'Property Num Sved',
            'property_coutry' => 'Property Coutry',
            'property_region' => 'Property Region',
            'property_district' => 'Property District',
            'property_city' => 'Property City',
            'property_street' => 'Property Street',
            'property_house' => 'Property House',
            'property_corpus' => 'Property Corpus',
            'property_office' => 'Property Office',
            'property_post_index' => 'Property Post Index',
            'property_cost' => 'Property Cost',
            'property_active_status' => 'Property Active Status',
            'property_zalog_name' => 'Property Zalog Name',
            'property_zalog_post_index' => 'Property Zalog Post Index',
            'property_zalog_dogovor' => 'Property Zalog Dogovor',
            'property_other' => 'Property Other',
            'property_own_dogovor' => 'Property Own Dogovor',
            'property_zalog_inn' => 'Property Zalog Inn',
            'property_zalog' => 'Property Zalog',
            'share_name' => 'Share Name',
            'share_location' => 'Share Location',
            'share_inn' => 'Share Inn',
            'share_company_capital' => 'Share Company Capital',
            'share_share' => 'Share Share',
            'share_nominal_cost' => 'Share Nominal Cost',
            'share_shares_count' => 'Share Shares Count',
            'share_total_cost' => 'Share Total Cost',
            'share_dogovor_number' => 'Share Dogovor Number',
            'share_date' => 'Share Date',
            'share_other' => 'Share Other',
            'valuable_property_property_type' => 'Valuable Property Property Type',
            'valuable_property_name' => 'Valuable Property Name',
            'valuable_property_cost' => 'Valuable Property Cost',
            'valuable_property_location' => 'Valuable Property Location',
            'valuable_property_coutry' => 'Valuable Property Coutry',
            'valuable_property_region' => 'Valuable Property Region',
            'valuable_property_district' => 'Valuable Property District',
            'valuable_property_city' => 'Valuable Property City',
            'valuable_property_street' => 'Valuable Property Street',
            'valuable_property_house' => 'Valuable Property House',
            'valuable_property_corpus' => 'Valuable Property Corpus',
            'valuable_property_office' => 'Valuable Property Office',
            'valuable_property_post_index' => 'Valuable Property Post Index',
            'valuable_property_org_name' => 'Valuable Property Org Name',
            'valuable_property_dogovor_number' => 'Valuable Property Dogovor Number',
            'valuable_property_dogovor_date' => 'Valuable Property Dogovor Date',
            'valuable_property_active_status' => 'Valuable Property Active Status',
            'valuable_property_zalog_name' => 'Valuable Property Zalog Name',
            'valuable_property_zalog_type' => 'Valuable Property Zalog Type',
            'valuable_property_zalog_inn' => 'Valuable Property Zalog Inn',
            'valuable_property_zalog_address' => 'Valuable Property Zalog Address',
            'valuable_property_zalog_dogovor' => 'Valuable Property Zalog Dogovor',
            'valuable_property_other' => 'Valuable Property Other',
        ];
    }
}
