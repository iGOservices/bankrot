<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Directory;

/**
 * DirectorySearch represents the model behind the search form of `app\models\Directory`.
 */
class DirectorySearch extends Directory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'surname', 'patronymic', 'gender', 'birthday', 'birth_place', 'inn', 'snils', 'region', 'district', 'city', 'street', 'selo', 'house', 'corpus', 'flat', 'index', 'fact_address', 'passport_id', 'inter_passsport_id', 'mail', 'phone', 'is_ip', 'is_work', 'changed_fio', 'facsimile', 'family_type', 'family_name', 'family_surname', 'family_patronymic', 'family_birthday', 'family_inn', 'family_birth_country', 'family_birth_series', 'family_birth_number', 'family_birth_date', 'family_birth_number_act', 'family_birth_number_act_date', 'family_given', 'brak', 'razvod', 'bank_name', 'bank_post_address', 'bank_number', 'bank_bic', 'bank_type', 'bank_currency', 'bank_date_open', 'bank_balance', 'bank_other', 'creditor_group', 'creditor_commitment', 'creditor_is_predprin', 'creditor_statment', 'creditor_name', 'creditor_inn', 'creditor_coutry', 'creditor_region', 'creditor_district', 'creditor_city', 'creditor_street', 'creditor_house', 'creditor_corpus', 'creditor_flat', 'creditor_post_index', 'creditor_sum_statment', 'creditor_sum_dolg', 'creditor_forfeit', 'creditor_base', 'creditor_base_date', 'creditor_base_num', 'creditor_other', 'debitor_group', 'debitor_commitment', 'debitor_is_predprin', 'debitor_statment', 'debitor_name', 'debitor_inn', 'debitor_coutry', 'debitor_region', 'debitor_district', 'debitor_city', 'debitor_street', 'debitor_house', 'debitor_corpus', 'debitor_flat', 'debitor_post_index', 'debitor_sum_statment', 'debitor_sum_dolg', 'debitor_forfeit', 'debitor_base', 'debitor_base_date', 'debitor_base_num', 'debitor_other', 'deal_type', 'deal_description', 'deal_date', 'deal_name', 'deal_inn', 'enforce_number', 'enforce_date', 'enforce_sum', 'nalog_work', 'nalog_year', 'nalog_income', 'nalog_nalog', 'other_text', 'other_shares_creater', 'other_shares_type', 'other_shares_total_count', 'other_shares_nominal_cost', 'other_shares_other', 'property_group', 'property_property_type', 'property_property_view', 'property_share', 'property_other_owners', 'property_active_name', 'property_square', 'property_reg_number', 'property_vin_number', 'property_date_sved', 'property_num_sved', 'property_coutry', 'property_region', 'property_district', 'property_city', 'property_street', 'property_house', 'property_corpus', 'property_office', 'property_post_index', 'property_cost', 'property_active_status', 'property_zalog_name', 'property_zalog_post_index', 'property_zalog_dogovor', 'property_other', 'property_own_dogovor', 'property_zalog_inn', 'property_zalog', 'share_name', 'share_location', 'share_inn', 'share_company_capital', 'share_share', 'share_nominal_cost', 'share_shares_count', 'share_total_cost', 'share_dogovor_number', 'share_date', 'share_other', 'valuable_property_property_type', 'valuable_property_name', 'valuable_property_cost', 'valuable_property_location', 'valuable_property_coutry', 'valuable_property_region', 'valuable_property_district', 'valuable_property_city', 'valuable_property_street', 'valuable_property_house', 'valuable_property_corpus', 'valuable_property_office', 'valuable_property_post_index', 'valuable_property_org_name', 'valuable_property_dogovor_number', 'valuable_property_dogovor_date', 'valuable_property_active_status', 'valuable_property_zalog_name', 'valuable_property_zalog_type', 'valuable_property_zalog_inn', 'valuable_property_zalog_address', 'valuable_property_zalog_dogovor', 'valuable_property_other'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Directory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'birth_place' => $this->birth_place,
            'inn' => $this->inn,
            'snils' => $this->snils,
            'region' => $this->region,
            'district' => $this->district,
            'city' => $this->city,
            'street' => $this->street,
            'selo' => $this->selo,
            'house' => $this->house,
            'corpus' => $this->corpus,
            'flat' => $this->flat,
            'index' => $this->index,
            'fact_address' => $this->fact_address,
            'passport_id' => $this->passport_id,
            'inter_passsport_id' => $this->inter_passsport_id,
            'mail' => $this->mail,
            'phone' => $this->phone,
            'is_ip' => $this->is_ip,
            'is_work' => $this->is_work,
            'changed_fio' => $this->changed_fio,
            'facsimile' => $this->facsimile,
            'family_type' => $this->family_type,
            'family_name' => $this->family_name,
            'family_surname' => $this->family_surname,
            'family_patronymic' => $this->family_patronymic,
            'family_birthday' => $this->family_birthday,
            'family_inn' => $this->family_inn,
            'family_birth_country' => $this->family_birth_country,
            'family_birth_series' => $this->family_birth_series,
            'family_birth_number' => $this->family_birth_number,
            'family_birth_date' => $this->family_birth_date,
            'family_birth_number_act' => $this->family_birth_number_act,
            'family_birth_number_act_date' => $this->family_birth_number_act_date,
            'family_given' => $this->family_given,
            'brak' => $this->brak,
            'razvod' => $this->razvod,
            'bank_name' => $this->bank_name,
            'bank_post_address' => $this->bank_post_address,
            'bank_number' => $this->bank_number,
            'bank_bic' => $this->bank_bic,
            'bank_type' => $this->bank_type,
            'bank_currency' => $this->bank_currency,
            'bank_date_open' => $this->bank_date_open,
            'bank_balance' => $this->bank_balance,
            'bank_other' => $this->bank_other,
            'creditor_group' => $this->creditor_group,
            'creditor_commitment' => $this->creditor_commitment,
            'creditor_is_predprin' => $this->creditor_is_predprin,
            'creditor_statment' => $this->creditor_statment,
            'creditor_name' => $this->creditor_name,
            'creditor_inn' => $this->creditor_inn,
            'creditor_coutry' => $this->creditor_coutry,
            'creditor_region' => $this->creditor_region,
            'creditor_district' => $this->creditor_district,
            'creditor_city' => $this->creditor_city,
            'creditor_street' => $this->creditor_street,
            'creditor_house' => $this->creditor_house,
            'creditor_corpus' => $this->creditor_corpus,
            'creditor_flat' => $this->creditor_flat,
            'creditor_post_index' => $this->creditor_post_index,
            'creditor_sum_statment' => $this->creditor_sum_statment,
            'creditor_sum_dolg' => $this->creditor_sum_dolg,
            'creditor_forfeit' => $this->creditor_forfeit,
            'creditor_base' => $this->creditor_base,
            'creditor_base_date' => $this->creditor_base_date,
            'creditor_base_num' => $this->creditor_base_num,
            'creditor_other' => $this->creditor_other,
            'debitor_group' => $this->debitor_group,
            'debitor_commitment' => $this->debitor_commitment,
            'debitor_is_predprin' => $this->debitor_is_predprin,
            'debitor_statment' => $this->debitor_statment,
            'debitor_name' => $this->debitor_name,
            'debitor_inn' => $this->debitor_inn,
            'debitor_coutry' => $this->debitor_coutry,
            'debitor_region' => $this->debitor_region,
            'debitor_district' => $this->debitor_district,
            'debitor_city' => $this->debitor_city,
            'debitor_street' => $this->debitor_street,
            'debitor_house' => $this->debitor_house,
            'debitor_corpus' => $this->debitor_corpus,
            'debitor_flat' => $this->debitor_flat,
            'debitor_post_index' => $this->debitor_post_index,
            'debitor_sum_statment' => $this->debitor_sum_statment,
            'debitor_sum_dolg' => $this->debitor_sum_dolg,
            'debitor_forfeit' => $this->debitor_forfeit,
            'debitor_base' => $this->debitor_base,
            'debitor_base_date' => $this->debitor_base_date,
            'debitor_base_num' => $this->debitor_base_num,
            'debitor_other' => $this->debitor_other,
            'deal_type' => $this->deal_type,
            'deal_description' => $this->deal_description,
            'deal_date' => $this->deal_date,
            'deal_name' => $this->deal_name,
            'deal_inn' => $this->deal_inn,
            'enforce_number' => $this->enforce_number,
            'enforce_date' => $this->enforce_date,
            'enforce_sum' => $this->enforce_sum,
            'nalog_work' => $this->nalog_work,
            'nalog_year' => $this->nalog_year,
            'nalog_income' => $this->nalog_income,
            'nalog_nalog' => $this->nalog_nalog,
            'other_text' => $this->other_text,
            'other_shares_creater' => $this->other_shares_creater,
            'other_shares_type' => $this->other_shares_type,
            'other_shares_total_count' => $this->other_shares_total_count,
            'other_shares_nominal_cost' => $this->other_shares_nominal_cost,
            'other_shares_other' => $this->other_shares_other,
            'property_group' => $this->property_group,
            'property_property_type' => $this->property_property_type,
            'property_property_view' => $this->property_property_view,
            'property_share' => $this->property_share,
            'property_other_owners' => $this->property_other_owners,
            'property_active_name' => $this->property_active_name,
            'property_square' => $this->property_square,
            'property_reg_number' => $this->property_reg_number,
            'property_vin_number' => $this->property_vin_number,
            'property_date_sved' => $this->property_date_sved,
            'property_num_sved' => $this->property_num_sved,
            'property_coutry' => $this->property_coutry,
            'property_region' => $this->property_region,
            'property_district' => $this->property_district,
            'property_city' => $this->property_city,
            'property_street' => $this->property_street,
            'property_house' => $this->property_house,
            'property_corpus' => $this->property_corpus,
            'property_office' => $this->property_office,
            'property_post_index' => $this->property_post_index,
            'property_cost' => $this->property_cost,
            'property_active_status' => $this->property_active_status,
            'property_zalog_name' => $this->property_zalog_name,
            'property_zalog_post_index' => $this->property_zalog_post_index,
            'property_zalog_dogovor' => $this->property_zalog_dogovor,
            'property_other' => $this->property_other,
            'property_own_dogovor' => $this->property_own_dogovor,
            'property_zalog_inn' => $this->property_zalog_inn,
            'property_zalog' => $this->property_zalog,
            'share_name' => $this->share_name,
            'share_location' => $this->share_location,
            'share_inn' => $this->share_inn,
            'share_company_capital' => $this->share_company_capital,
            'share_share' => $this->share_share,
            'share_nominal_cost' => $this->share_nominal_cost,
            'share_shares_count' => $this->share_shares_count,
            'share_total_cost' => $this->share_total_cost,
            'share_dogovor_number' => $this->share_dogovor_number,
            'share_date' => $this->share_date,
            'share_other' => $this->share_other,
            'valuable_property_property_type' => $this->valuable_property_property_type,
            'valuable_property_name' => $this->valuable_property_name,
            'valuable_property_cost' => $this->valuable_property_cost,
            'valuable_property_location' => $this->valuable_property_location,
            'valuable_property_coutry' => $this->valuable_property_coutry,
            'valuable_property_region' => $this->valuable_property_region,
            'valuable_property_district' => $this->valuable_property_district,
            'valuable_property_city' => $this->valuable_property_city,
            'valuable_property_street' => $this->valuable_property_street,
            'valuable_property_house' => $this->valuable_property_house,
            'valuable_property_corpus' => $this->valuable_property_corpus,
            'valuable_property_office' => $this->valuable_property_office,
            'valuable_property_post_index' => $this->valuable_property_post_index,
            'valuable_property_org_name' => $this->valuable_property_org_name,
            'valuable_property_dogovor_number' => $this->valuable_property_dogovor_number,
            'valuable_property_dogovor_date' => $this->valuable_property_dogovor_date,
            'valuable_property_active_status' => $this->valuable_property_active_status,
            'valuable_property_zalog_name' => $this->valuable_property_zalog_name,
            'valuable_property_zalog_type' => $this->valuable_property_zalog_type,
            'valuable_property_zalog_inn' => $this->valuable_property_zalog_inn,
            'valuable_property_zalog_address' => $this->valuable_property_zalog_address,
            'valuable_property_zalog_dogovor' => $this->valuable_property_zalog_dogovor,
            'valuable_property_other' => $this->valuable_property_other,
        ]);

        return $dataProvider;
    }
}
