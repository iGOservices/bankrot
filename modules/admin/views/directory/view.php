<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */

if($model->id == 1){
    $this->title = 'Раздел: Заполнение и формирование документов для обращения в суд ';
}elseif($model->id == 2){
    $this->title = 'Банкротство под ключ ';
}else{
    $this->title = 'Услуги арбитражных управляющих';
}
$this->params['breadcrumbs'][] = ['label' => 'Справочник полей ввода', 'url' => ['directory-list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="directory-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'name',
                'value' => function($model){
                    return $model->name == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'surname',
                'value' => function($model){
                    return $model->surname == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'patronymic',
                'value' => function($model){
                    return $model->patronymic == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'gender',
                'value' => function($model){
                    return $model->gender == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'birthday',
                'value' => function($model){
                    return $model->birthday == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'birth_place',
                'value' => function($model){
                    return $model->birth_place == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'inn',
                'value' => function($model){
                    return $model->inn == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'snils',
                'value' => function($model){
                    return $model->snils == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'region',
                'value' => function($model){
                    return $model->region == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'district',
                'value' => function($model){
                    return $model->district == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'city',
                'value' => function($model){
                    return $model->city == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'street',
                'value' => function($model){
                    return $model->street == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'selo',
                'value' => function($model){
                    return $model->selo == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'house',
                'value' => function($model){
                    return $model->house == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'corpus',
                'value' => function($model){
                    return $model->corpus == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'flat',
                'value' => function($model){
                    return $model->flat == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'index',
                'value' => function($model){
                    return $model->index == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'fact_address',
                'value' => function($model){
                    return $model->fact_address == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'passport_id',
                'value' => function($model){
                    return $model->passport_id == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'inter_passsport_id',
                'value' => function($model){
                    return $model->inter_passsport_id == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'mail',
                'value' => function($model){
                    return $model->mail == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'phone',
                'value' => function($model){
                    return $model->phone == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'is_ip',
                'value' => function($model){
                    return $model->is_ip == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'is_work',
                'value' => function($model){
                    return $model->is_work == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'changed_fio',
                'value' => function($model){
                    return $model->changed_fio == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'facsimile',
                'value' => function($model){
                    return $model->is_ip == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_type',
                'value' => function($model){
                    return $model->is_work == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_name',
                'value' => function($model){
                    return $model->changed_fio == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'family_surname',
                'value' => function($model){
                    return $model->family_surname == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_patronymic',
                'value' => function($model){
                    return $model->family_patronymic == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_birthday',
                'value' => function($model){
                    return $model->family_birthday == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'family_inn',
                'value' => function($model){
                    return $model->family_inn == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_birth_country',
                'value' => function($model){
                    return $model->family_birth_country == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_birth_series',
                'value' => function($model){
                    return $model->family_birth_series == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'family_birth_number',
                'value' => function($model){
                    return $model->family_birth_number == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_birth_date',
                'value' => function($model){
                    return $model->family_birth_date == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_birth_number_act',
                'value' => function($model){
                    return $model->family_birth_number_act == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'family_birth_number_act_date',
                'value' => function($model){
                    return $model->family_birth_number_act_date == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'family_given',
                'value' => function($model){
                    return $model->family_given == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'brak',
                'value' => function($model){
                    return $model->brak == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'razvod',
                'value' => function($model){
                    return $model->razvod == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'bank_name',
                'value' => function($model){
                    return $model->bank_name == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'bank_post_address',
                'value' => function($model){
                    return $model->bank_post_address == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'bank_number',
                'value' => function($model){
                    return $model->bank_number == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'bank_bic',
                'value' => function($model){
                    return $model->bank_bic == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'bank_type',
                'value' => function($model){
                    return $model->bank_type == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'bank_currency',
                'value' => function($model){
                    return $model->bank_currency == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'bank_date_open',
                'value' => function($model){
                    return $model->bank_date_open == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'bank_balance',
                'value' => function($model){
                    return $model->bank_balance == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'bank_other',
                'value' => function($model){
                    return $model->bank_other == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_group',
                'value' => function($model){
                    return $model->creditor_group == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_commitment',
                'value' => function($model){
                    return $model->creditor_commitment == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'creditor_is_predprin',
                'value' => function($model){
                    return $model->creditor_is_predprin == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_statment',
                'value' => function($model){
                    return $model->creditor_statment == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_name',
                'value' => function($model){
                    return $model->creditor_name == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'creditor_inn',
                'value' => function($model){
                    return $model->creditor_inn == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_coutry',
                'value' => function($model){
                    return $model->creditor_coutry == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_region',
                'value' => function($model){
                    return $model->creditor_region == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'creditor_district',
                'value' => function($model){
                    return $model->creditor_district == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_city',
                'value' => function($model){
                    return $model->creditor_city == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_street',
                'value' => function($model){
                    return $model->creditor_street == 1 ? "Включено" : "Отключено";
                }
            ],

            [
                'attribute' => 'creditor_house',
                'value' => function($model){
                    return $model->creditor_house == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_corpus',
                'value' => function($model){
                    return $model->creditor_corpus == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_flat',
                'value' => function($model){
                    return $model->creditor_flat == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'creditor_post_index',
                'value' => function($model){
                    return $model->creditor_post_index == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_sum_statment',
                'value' => function($model){
                    return $model->creditor_sum_statment == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_sum_dolg',
                'value' => function($model){
                    return $model->creditor_sum_dolg == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'creditor_forfeit',
                'value' => function($model){
                    return $model->creditor_forfeit == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_base',
                'value' => function($model){
                    return $model->creditor_base == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_base_date',
                'value' => function($model){
                    return $model->creditor_base_date == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'creditor_base_num',
                'value' => function($model){
                    return $model->creditor_base_num == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'creditor_other',
                'value' => function($model){
                    return $model->creditor_other == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_group',
                'value' => function($model){
                    return $model->debitor_group == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'debitor_commitment',
                'value' => function($model){
                    return $model->debitor_commitment == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_is_predprin',
                'value' => function($model){
                    return $model->debitor_is_predprin == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_statment',
                'value' => function($model){
                    return $model->debitor_statment == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'debitor_name',
                'value' => function($model){
                    return $model->debitor_name == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_inn',
                'value' => function($model){
                    return $model->debitor_inn == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_coutry',
                'value' => function($model){
                    return $model->debitor_coutry == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'debitor_region',
                'value' => function($model){
                    return $model->debitor_region == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_district',
                'value' => function($model){
                    return $model->debitor_district == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_city',
                'value' => function($model){
                    return $model->debitor_city == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'debitor_street',
                'value' => function($model){
                    return $model->debitor_street == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_house',
                'value' => function($model){
                    return $model->debitor_house == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_corpus',
                'value' => function($model){
                    return $model->debitor_corpus == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'debitor_flat',
                'value' => function($model){
                    return $model->debitor_flat == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_post_index',
                'value' => function($model){
                    return $model->debitor_post_index == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_sum_statment',
                'value' => function($model){
                    return $model->debitor_sum_statment == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'debitor_sum_dolg',
                'value' => function($model){
                    return $model->debitor_sum_dolg == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_forfeit',
                'value' => function($model){
                    return $model->debitor_forfeit == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_base',
                'value' => function($model){
                    return $model->debitor_base == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'debitor_base_date',
                'value' => function($model){
                    return $model->debitor_base_date == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_base_num',
                'value' => function($model){
                    return $model->debitor_base_num == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'debitor_other',
                'value' => function($model){
                    return $model->debitor_other == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'deal_type',
                'value' => function($model){
                    return $model->deal_type == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'deal_description',
                'value' => function($model){
                    return $model->deal_description == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'deal_date',
                'value' => function($model){
                    return $model->deal_date == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'deal_name',
                'value' => function($model){
                    return $model->deal_name == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'deal_inn',
                'value' => function($model){
                    return $model->deal_inn == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'enforce_number',
                'value' => function($model){
                    return $model->enforce_number == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'enforce_date',
                'value' => function($model){
                    return $model->enforce_date == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'enforce_sum',
                'value' => function($model){
                    return $model->enforce_sum == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'nalog_work',
                'value' => function($model){
                    return $model->nalog_work == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'nalog_year',
                'value' => function($model){
                    return $model->nalog_year == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'nalog_income',
                'value' => function($model){
                    return $model->nalog_income == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'nalog_nalog',
                'value' => function($model){
                    return $model->nalog_nalog == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'other_text',
                'value' => function($model){
                    return $model->other_text == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'other_shares_creater',
                'value' => function($model){
                    return $model->other_shares_creater == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'other_shares_type',
                'value' => function($model){
                    return $model->other_shares_type == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'other_shares_total_count',
                'value' => function($model){
                    return $model->other_shares_total_count == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'other_shares_nominal_cost',
                'value' => function($model){
                    return $model->other_shares_nominal_cost == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'other_shares_other',
                'value' => function($model){
                    return $model->other_shares_other == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'property_group',
                'value' => function($model){
                    return $model->property_group == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_property_type',
                'value' => function($model){
                    return $model->property_property_type == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_property_view',
                'value' => function($model){
                    return $model->property_property_view == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'property_share',
                'value' => function($model){
                    return $model->property_share == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_other_owners',
                'value' => function($model){
                    return $model->property_other_owners == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_active_name',
                'value' => function($model){
                    return $model->property_active_name == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'property_square',
                'value' => function($model){
                    return $model->property_square == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_reg_number',
                'value' => function($model){
                    return $model->property_reg_number == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_vin_number',
                'value' => function($model){
                    return $model->property_vin_number == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'property_date_sved',
                'value' => function($model){
                    return $model->property_date_sved == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_num_sved',
                'value' => function($model){
                    return $model->property_num_sved == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_coutry',
                'value' => function($model){
                    return $model->property_coutry == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'property_region',
                'value' => function($model){
                    return $model->property_region == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_district',
                'value' => function($model){
                    return $model->property_district == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_city',
                'value' => function($model){
                    return $model->property_city == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'property_street',
                'value' => function($model){
                    return $model->property_street == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_house',
                'value' => function($model){
                    return $model->property_house == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_corpus',
                'value' => function($model){
                    return $model->property_corpus == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'property_office',
                'value' => function($model){
                    return $model->property_office == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_post_index',
                'value' => function($model){
                    return $model->property_post_index == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_cost',
                'value' => function($model){
                    return $model->property_cost == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'property_active_status',
                'value' => function($model){
                    return $model->property_active_status == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_zalog_name',
                'value' => function($model){
                    return $model->property_zalog_name == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_zalog_post_index',
                'value' => function($model){
                    return $model->property_zalog_post_index == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'property_zalog_dogovor',
                'value' => function($model){
                    return $model->property_zalog_dogovor == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_other',
                'value' => function($model){
                    return $model->property_other == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_own_dogovor',
                'value' => function($model){
                    return $model->property_own_dogovor == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'property_zalog_inn',
                'value' => function($model){
                    return $model->property_zalog_inn == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'property_zalog',
                'value' => function($model){
                    return $model->property_zalog == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'share_name',
                'value' => function($model){
                    return $model->share_name == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'share_location',
                'value' => function($model){
                    return $model->share_location == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'share_inn',
                'value' => function($model){
                    return $model->share_inn == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'share_company_capital',
                'value' => function($model){
                    return $model->share_company_capital == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'share_share',
                'value' => function($model){
                    return $model->share_share == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'share_nominal_cost',
                'value' => function($model){
                    return $model->share_nominal_cost == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'share_shares_count',
                'value' => function($model){
                    return $model->share_shares_count == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'share_total_cost',
                'value' => function($model){
                    return $model->share_total_cost == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'share_dogovor_number',
                'value' => function($model){
                    return $model->share_dogovor_number == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'share_date',
                'value' => function($model){
                    return $model->share_date == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'share_other',
                'value' => function($model){
                    return $model->share_other == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_property_type',
                'value' => function($model){
                    return $model->valuable_property_property_type == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_name',
                'value' => function($model){
                    return $model->valuable_property_name == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'valuable_property_cost',
                'value' => function($model){
                    return $model->valuable_property_cost == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_location',
                'value' => function($model){
                    return $model->valuable_property_location == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_coutry',
                'value' => function($model){
                    return $model->valuable_property_coutry == 1 ? "Включено" : "Отключено";
                }
            ],




            [
                'attribute' => 'valuable_property_region',
                'value' => function($model){
                    return $model->valuable_property_region == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_district',
                'value' => function($model){
                    return $model->valuable_property_district == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_city',
                'value' => function($model){
                    return $model->valuable_property_city == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'valuable_property_street',
                'value' => function($model){
                    return $model->valuable_property_street == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_house',
                'value' => function($model){
                    return $model->valuable_property_house == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_corpus',
                'value' => function($model){
                    return $model->valuable_property_corpus == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'valuable_property_office',
                'value' => function($model){
                    return $model->valuable_property_office == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_post_index',
                'value' => function($model){
                    return $model->valuable_property_post_index == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_org_name',
                'value' => function($model){
                    return $model->valuable_property_org_name == 1 ? "Включено" : "Отключено";
                }
            ],



            [
                'attribute' => 'valuable_property_dogovor_number',
                'value' => function($model){
                    return $model->valuable_property_dogovor_number == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_dogovor_date',
                'value' => function($model){
                    return $model->valuable_property_dogovor_date == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_active_status',
                'value' => function($model){
                    return $model->valuable_property_active_status == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'valuable_property_zalog_name',
                'value' => function($model){
                    return $model->valuable_property_zalog_name == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_zalog_type',
                'value' => function($model){
                    return $model->valuable_property_zalog_type == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_zalog_inn',
                'value' => function($model){
                    return $model->valuable_property_zalog_inn == 1 ? "Включено" : "Отключено";
                }
            ],


            [
                'attribute' => 'valuable_property_zalog_address',
                'value' => function($model){
                    return $model->valuable_property_zalog_address == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_zalog_dogovor',
                'value' => function($model){
                    return $model->valuable_property_zalog_dogovor == 1 ? "Включено" : "Отключено";
                }
            ],
            [
                'attribute' => 'valuable_property_other',
                'value' => function($model){
                    return $model->valuable_property_other == 1 ? "Включено" : "Отключено";
                }
            ],


        ],
    ]) ?>

</div>
