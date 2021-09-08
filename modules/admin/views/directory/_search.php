<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DirectorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="directory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'birth_place') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'snils') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'selo') ?>

    <?php // echo $form->field($model, 'house') ?>

    <?php // echo $form->field($model, 'corpus') ?>

    <?php // echo $form->field($model, 'flat') ?>

    <?php // echo $form->field($model, 'index') ?>

    <?php // echo $form->field($model, 'fact_address') ?>

    <?php // echo $form->field($model, 'passport_id') ?>

    <?php // echo $form->field($model, 'inter_passsport_id') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'is_ip') ?>

    <?php // echo $form->field($model, 'is_work') ?>

    <?php // echo $form->field($model, 'changed_fio') ?>

    <?php // echo $form->field($model, 'facsimile') ?>

    <?php // echo $form->field($model, 'family_type') ?>

    <?php // echo $form->field($model, 'family_name') ?>

    <?php // echo $form->field($model, 'family_surname') ?>

    <?php // echo $form->field($model, 'family_patronymic') ?>

    <?php // echo $form->field($model, 'family_birthday') ?>

    <?php // echo $form->field($model, 'family_inn') ?>

    <?php // echo $form->field($model, 'family_birth_country') ?>

    <?php // echo $form->field($model, 'family_birth_series') ?>

    <?php // echo $form->field($model, 'family_birth_number') ?>

    <?php // echo $form->field($model, 'family_birth_date') ?>

    <?php // echo $form->field($model, 'family_birth_number_act') ?>

    <?php // echo $form->field($model, 'family_birth_number_act_date') ?>

    <?php // echo $form->field($model, 'family_given') ?>

    <?php // echo $form->field($model, 'brak') ?>

    <?php // echo $form->field($model, 'razvod') ?>

    <?php // echo $form->field($model, 'bank_name') ?>

    <?php // echo $form->field($model, 'bank_post_address') ?>

    <?php // echo $form->field($model, 'bank_number') ?>

    <?php // echo $form->field($model, 'bank_bic') ?>

    <?php // echo $form->field($model, 'bank_type') ?>

    <?php // echo $form->field($model, 'bank_currency') ?>

    <?php // echo $form->field($model, 'bank_date_open') ?>

    <?php // echo $form->field($model, 'bank_balance') ?>

    <?php // echo $form->field($model, 'bank_other') ?>

    <?php // echo $form->field($model, 'creditor_group') ?>

    <?php // echo $form->field($model, 'creditor_commitment') ?>

    <?php // echo $form->field($model, 'creditor_is_predprin') ?>

    <?php // echo $form->field($model, 'creditor_statment') ?>

    <?php // echo $form->field($model, 'creditor_name') ?>

    <?php // echo $form->field($model, 'creditor_inn') ?>

    <?php // echo $form->field($model, 'creditor_coutry') ?>

    <?php // echo $form->field($model, 'creditor_region') ?>

    <?php // echo $form->field($model, 'creditor_district') ?>

    <?php // echo $form->field($model, 'creditor_city') ?>

    <?php // echo $form->field($model, 'creditor_street') ?>

    <?php // echo $form->field($model, 'creditor_house') ?>

    <?php // echo $form->field($model, 'creditor_corpus') ?>

    <?php // echo $form->field($model, 'creditor_flat') ?>

    <?php // echo $form->field($model, 'creditor_post_index') ?>

    <?php // echo $form->field($model, 'creditor_sum_statment') ?>

    <?php // echo $form->field($model, 'creditor_sum_dolg') ?>

    <?php // echo $form->field($model, 'creditor_forfeit') ?>

    <?php // echo $form->field($model, 'creditor_base') ?>

    <?php // echo $form->field($model, 'creditor_base_date') ?>

    <?php // echo $form->field($model, 'creditor_base_num') ?>

    <?php // echo $form->field($model, 'creditor_other') ?>

    <?php // echo $form->field($model, 'debitor_group') ?>

    <?php // echo $form->field($model, 'debitor_commitment') ?>

    <?php // echo $form->field($model, 'debitor_is_predprin') ?>

    <?php // echo $form->field($model, 'debitor_statment') ?>

    <?php // echo $form->field($model, 'debitor_name') ?>

    <?php // echo $form->field($model, 'debitor_inn') ?>

    <?php // echo $form->field($model, 'debitor_coutry') ?>

    <?php // echo $form->field($model, 'debitor_region') ?>

    <?php // echo $form->field($model, 'debitor_district') ?>

    <?php // echo $form->field($model, 'debitor_city') ?>

    <?php // echo $form->field($model, 'debitor_street') ?>

    <?php // echo $form->field($model, 'debitor_house') ?>

    <?php // echo $form->field($model, 'debitor_corpus') ?>

    <?php // echo $form->field($model, 'debitor_flat') ?>

    <?php // echo $form->field($model, 'debitor_post_index') ?>

    <?php // echo $form->field($model, 'debitor_sum_statment') ?>

    <?php // echo $form->field($model, 'debitor_sum_dolg') ?>

    <?php // echo $form->field($model, 'debitor_forfeit') ?>

    <?php // echo $form->field($model, 'debitor_base') ?>

    <?php // echo $form->field($model, 'debitor_base_date') ?>

    <?php // echo $form->field($model, 'debitor_base_num') ?>

    <?php // echo $form->field($model, 'debitor_other') ?>

    <?php // echo $form->field($model, 'deal_type') ?>

    <?php // echo $form->field($model, 'deal_description') ?>

    <?php // echo $form->field($model, 'deal_date') ?>

    <?php // echo $form->field($model, 'deal_name') ?>

    <?php // echo $form->field($model, 'deal_inn') ?>

    <?php // echo $form->field($model, 'enforce_number') ?>

    <?php // echo $form->field($model, 'enforce_date') ?>

    <?php // echo $form->field($model, 'enforce_sum') ?>

    <?php // echo $form->field($model, 'nalog_work') ?>

    <?php // echo $form->field($model, 'nalog_year') ?>

    <?php // echo $form->field($model, 'nalog_income') ?>

    <?php // echo $form->field($model, 'nalog_nalog') ?>

    <?php // echo $form->field($model, 'other_text') ?>

    <?php // echo $form->field($model, 'other_shares_creater') ?>

    <?php // echo $form->field($model, 'other_shares_type') ?>

    <?php // echo $form->field($model, 'other_shares_total_count') ?>

    <?php // echo $form->field($model, 'other_shares_nominal_cost') ?>

    <?php // echo $form->field($model, 'other_shares_other') ?>

    <?php // echo $form->field($model, 'property_group') ?>

    <?php // echo $form->field($model, 'property_property_type') ?>

    <?php // echo $form->field($model, 'property_property_view') ?>

    <?php // echo $form->field($model, 'property_share') ?>

    <?php // echo $form->field($model, 'property_other_owners') ?>

    <?php // echo $form->field($model, 'property_active_name') ?>

    <?php // echo $form->field($model, 'property_square') ?>

    <?php // echo $form->field($model, 'property_reg_number') ?>

    <?php // echo $form->field($model, 'property_vin_number') ?>

    <?php // echo $form->field($model, 'property_date_sved') ?>

    <?php // echo $form->field($model, 'property_num_sved') ?>

    <?php // echo $form->field($model, 'property_coutry') ?>

    <?php // echo $form->field($model, 'property_region') ?>

    <?php // echo $form->field($model, 'property_district') ?>

    <?php // echo $form->field($model, 'property_city') ?>

    <?php // echo $form->field($model, 'property_street') ?>

    <?php // echo $form->field($model, 'property_house') ?>

    <?php // echo $form->field($model, 'property_corpus') ?>

    <?php // echo $form->field($model, 'property_office') ?>

    <?php // echo $form->field($model, 'property_post_index') ?>

    <?php // echo $form->field($model, 'property_cost') ?>

    <?php // echo $form->field($model, 'property_active_status') ?>

    <?php // echo $form->field($model, 'property_zalog_name') ?>

    <?php // echo $form->field($model, 'property_zalog_post_index') ?>

    <?php // echo $form->field($model, 'property_zalog_dogovor') ?>

    <?php // echo $form->field($model, 'property_other') ?>

    <?php // echo $form->field($model, 'property_own_dogovor') ?>

    <?php // echo $form->field($model, 'property_zalog_inn') ?>

    <?php // echo $form->field($model, 'property_zalog') ?>

    <?php // echo $form->field($model, 'share_name') ?>

    <?php // echo $form->field($model, 'share_location') ?>

    <?php // echo $form->field($model, 'share_inn') ?>

    <?php // echo $form->field($model, 'share_company_capital') ?>

    <?php // echo $form->field($model, 'share_share') ?>

    <?php // echo $form->field($model, 'share_nominal_cost') ?>

    <?php // echo $form->field($model, 'share_shares_count') ?>

    <?php // echo $form->field($model, 'share_total_cost') ?>

    <?php // echo $form->field($model, 'share_dogovor_number') ?>

    <?php // echo $form->field($model, 'share_date') ?>

    <?php // echo $form->field($model, 'share_other') ?>

    <?php // echo $form->field($model, 'valuable_property_property_type') ?>

    <?php // echo $form->field($model, 'valuable_property_name') ?>

    <?php // echo $form->field($model, 'valuable_property_cost') ?>

    <?php // echo $form->field($model, 'valuable_property_location') ?>

    <?php // echo $form->field($model, 'valuable_property_coutry') ?>

    <?php // echo $form->field($model, 'valuable_property_region') ?>

    <?php // echo $form->field($model, 'valuable_property_district') ?>

    <?php // echo $form->field($model, 'valuable_property_city') ?>

    <?php // echo $form->field($model, 'valuable_property_street') ?>

    <?php // echo $form->field($model, 'valuable_property_house') ?>

    <?php // echo $form->field($model, 'valuable_property_corpus') ?>

    <?php // echo $form->field($model, 'valuable_property_office') ?>

    <?php // echo $form->field($model, 'valuable_property_post_index') ?>

    <?php // echo $form->field($model, 'valuable_property_org_name') ?>

    <?php // echo $form->field($model, 'valuable_property_dogovor_number') ?>

    <?php // echo $form->field($model, 'valuable_property_dogovor_date') ?>

    <?php // echo $form->field($model, 'valuable_property_active_status') ?>

    <?php // echo $form->field($model, 'valuable_property_zalog_name') ?>

    <?php // echo $form->field($model, 'valuable_property_zalog_type') ?>

    <?php // echo $form->field($model, 'valuable_property_zalog_inn') ?>

    <?php // echo $form->field($model, 'valuable_property_zalog_address') ?>

    <?php // echo $form->field($model, 'valuable_property_zalog_dogovor') ?>

    <?php // echo $form->field($model, 'valuable_property_other') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
