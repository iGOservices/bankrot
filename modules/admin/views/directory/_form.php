<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="directory-form">

    <?php $form = ActiveForm::begin(); ?>

    <table border="1px solid black">
        <thead>
        <tr>
            <td style="padding: 5px;font-weight: bold;font-size: 15px;">Личные данные</td>
            <td style="padding: 5px;font-weight: bold;font-size: 15px;">Семья и дети</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="vertical-align: top;">

                <?= $form->field($model, 'name', [
                    'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>


    <?= $form->field($model, 'surname', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'patronymic', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'gender', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'birthday', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'birth_place', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'inn', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'snils', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'region', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'district', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'city', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'street', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'selo', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'house', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'corpus', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'flat', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'index', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'fact_address', [
                    'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'passport_id', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'inter_passsport_id', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'mail', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'phone', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'is_ip', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'is_work', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'changed_fio', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'facsimile', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

            </td>
            <td style="vertical-align: top;">
    <?= $form->field($model, 'family_type', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_name', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_surname', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_patronymic', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birthday', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_inn', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_country', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_series', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_number', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_date', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_number_act', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_number_act_date', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_given', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'brak', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

    <?= $form->field($model, 'razvod', [
        'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label><span>{label}</span>'])->checkbox([], false)?>

            </td>

        </tr>
        </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?= $form->field($model, 'bank_name')->textInput() ?>

    <?= $form->field($model, 'bank_post_address')->textInput() ?>

    <?= $form->field($model, 'bank_number')->textInput() ?>

    <?= $form->field($model, 'bank_bic')->textInput() ?>

    <?= $form->field($model, 'bank_type')->textInput() ?>

    <?= $form->field($model, 'bank_currency')->textInput() ?>

    <?= $form->field($model, 'bank_date_open')->textInput() ?>

    <?= $form->field($model, 'bank_balance')->textInput() ?>

    <?= $form->field($model, 'bank_other')->textInput() ?>

    <?= $form->field($model, 'creditor_group')->textInput() ?>

    <?= $form->field($model, 'creditor_commitment')->textInput() ?>

    <?= $form->field($model, 'creditor_is_predprin')->textInput() ?>

    <?= $form->field($model, 'creditor_statment')->textInput() ?>

    <?= $form->field($model, 'creditor_name')->textInput() ?>

    <?= $form->field($model, 'creditor_inn')->textInput() ?>

    <?= $form->field($model, 'creditor_coutry')->textInput() ?>

    <?= $form->field($model, 'creditor_region')->textInput() ?>

    <?= $form->field($model, 'creditor_district')->textInput() ?>

    <?= $form->field($model, 'creditor_city')->textInput() ?>

    <?= $form->field($model, 'creditor_street')->textInput() ?>

    <?= $form->field($model, 'creditor_house')->textInput() ?>

    <?= $form->field($model, 'creditor_corpus')->textInput() ?>

    <?= $form->field($model, 'creditor_flat')->textInput() ?>

    <?= $form->field($model, 'creditor_post_index')->textInput() ?>

    <?= $form->field($model, 'creditor_sum_statment')->textInput() ?>

    <?= $form->field($model, 'creditor_sum_dolg')->textInput() ?>

    <?= $form->field($model, 'creditor_forfeit')->textInput() ?>

    <?= $form->field($model, 'creditor_base')->textInput() ?>

    <?= $form->field($model, 'creditor_base_date')->textInput() ?>

    <?= $form->field($model, 'creditor_base_num')->textInput() ?>

    <?= $form->field($model, 'creditor_other')->textInput() ?>

    <?= $form->field($model, 'debitor_group')->textInput() ?>

    <?= $form->field($model, 'debitor_commitment')->textInput() ?>

    <?= $form->field($model, 'debitor_is_predprin')->textInput() ?>

    <?= $form->field($model, 'debitor_statment')->textInput() ?>

    <?= $form->field($model, 'debitor_name')->textInput() ?>

    <?= $form->field($model, 'debitor_inn')->textInput() ?>

    <?= $form->field($model, 'debitor_coutry')->textInput() ?>

    <?= $form->field($model, 'debitor_region')->textInput() ?>

    <?= $form->field($model, 'debitor_district')->textInput() ?>

    <?= $form->field($model, 'debitor_city')->textInput() ?>

    <?= $form->field($model, 'debitor_street')->textInput() ?>

    <?= $form->field($model, 'debitor_house')->textInput() ?>

    <?= $form->field($model, 'debitor_corpus')->textInput() ?>

    <?= $form->field($model, 'debitor_flat')->textInput() ?>

    <?= $form->field($model, 'debitor_post_index')->textInput() ?>

    <?= $form->field($model, 'debitor_sum_statment')->textInput() ?>

    <?= $form->field($model, 'debitor_sum_dolg')->textInput() ?>

    <?= $form->field($model, 'debitor_forfeit')->textInput() ?>

    <?= $form->field($model, 'debitor_base')->textInput() ?>

    <?= $form->field($model, 'debitor_base_date')->textInput() ?>

    <?= $form->field($model, 'debitor_base_num')->textInput() ?>

    <?= $form->field($model, 'debitor_other')->textInput() ?>

    <?= $form->field($model, 'deal_type')->textInput() ?>

    <?= $form->field($model, 'deal_description')->textInput() ?>

    <?= $form->field($model, 'deal_date')->textInput() ?>

    <?= $form->field($model, 'deal_name')->textInput() ?>

    <?= $form->field($model, 'deal_inn')->textInput() ?>

    <?= $form->field($model, 'enforce_number')->textInput() ?>

    <?= $form->field($model, 'enforce_date')->textInput() ?>

    <?= $form->field($model, 'enforce_sum')->textInput() ?>

    <?= $form->field($model, 'nalog_work')->textInput() ?>

    <?= $form->field($model, 'nalog_year')->textInput() ?>

    <?= $form->field($model, 'nalog_income')->textInput() ?>

    <?= $form->field($model, 'nalog_nalog')->textInput() ?>

    <?= $form->field($model, 'other_text')->textInput() ?>

    <?= $form->field($model, 'other_shares_creater')->textInput() ?>

    <?= $form->field($model, 'other_shares_type')->textInput() ?>

    <?= $form->field($model, 'other_shares_total_count')->textInput() ?>

    <?= $form->field($model, 'other_shares_nominal_cost')->textInput() ?>

    <?= $form->field($model, 'other_shares_other')->textInput() ?>

    <?= $form->field($model, 'property_group')->textInput() ?>

    <?= $form->field($model, 'property_property_type')->textInput() ?>

    <?= $form->field($model, 'property_property_view')->textInput() ?>

    <?= $form->field($model, 'property_share')->textInput() ?>

    <?= $form->field($model, 'property_other_owners')->textInput() ?>

    <?= $form->field($model, 'property_active_name')->textInput() ?>

    <?= $form->field($model, 'property_square')->textInput() ?>

    <?= $form->field($model, 'property_reg_number')->textInput() ?>

    <?= $form->field($model, 'property_vin_number')->textInput() ?>

    <?= $form->field($model, 'property_date_sved')->textInput() ?>

    <?= $form->field($model, 'property_num_sved')->textInput() ?>

    <?= $form->field($model, 'property_coutry')->textInput() ?>

    <?= $form->field($model, 'property_region')->textInput() ?>

    <?= $form->field($model, 'property_district')->textInput() ?>

    <?= $form->field($model, 'property_city')->textInput() ?>

    <?= $form->field($model, 'property_street')->textInput() ?>

    <?= $form->field($model, 'property_house')->textInput() ?>

    <?= $form->field($model, 'property_corpus')->textInput() ?>

    <?= $form->field($model, 'property_office')->textInput() ?>

    <?= $form->field($model, 'property_post_index')->textInput() ?>

    <?= $form->field($model, 'property_cost')->textInput() ?>

    <?= $form->field($model, 'property_active_status')->textInput() ?>

    <?= $form->field($model, 'property_zalog_name')->textInput() ?>

    <?= $form->field($model, 'property_zalog_post_index')->textInput() ?>

    <?= $form->field($model, 'property_zalog_dogovor')->textInput() ?>

    <?= $form->field($model, 'property_other')->textInput() ?>

    <?= $form->field($model, 'property_own_dogovor')->textInput() ?>

    <?= $form->field($model, 'property_zalog_inn')->textInput() ?>

    <?= $form->field($model, 'property_zalog')->textInput() ?>

    <?= $form->field($model, 'share_name')->textInput() ?>

    <?= $form->field($model, 'share_location')->textInput() ?>

    <?= $form->field($model, 'share_inn')->textInput() ?>

    <?= $form->field($model, 'share_company_capital')->textInput() ?>

    <?= $form->field($model, 'share_share')->textInput() ?>

    <?= $form->field($model, 'share_nominal_cost')->textInput() ?>

    <?= $form->field($model, 'share_shares_count')->textInput() ?>

    <?= $form->field($model, 'share_total_cost')->textInput() ?>

    <?= $form->field($model, 'share_dogovor_number')->textInput() ?>

    <?= $form->field($model, 'share_date')->textInput() ?>

    <?= $form->field($model, 'share_other')->textInput() ?>

    <?= $form->field($model, 'valuable_property_property_type')->textInput() ?>

    <?= $form->field($model, 'valuable_property_name')->textInput() ?>

    <?= $form->field($model, 'valuable_property_cost')->textInput() ?>

    <?= $form->field($model, 'valuable_property_location')->textInput() ?>

    <?= $form->field($model, 'valuable_property_coutry')->textInput() ?>

    <?= $form->field($model, 'valuable_property_region')->textInput() ?>

    <?= $form->field($model, 'valuable_property_district')->textInput() ?>

    <?= $form->field($model, 'valuable_property_city')->textInput() ?>

    <?= $form->field($model, 'valuable_property_street')->textInput() ?>

    <?= $form->field($model, 'valuable_property_house')->textInput() ?>

    <?= $form->field($model, 'valuable_property_corpus')->textInput() ?>

    <?= $form->field($model, 'valuable_property_office')->textInput() ?>

    <?= $form->field($model, 'valuable_property_post_index')->textInput() ?>

    <?= $form->field($model, 'valuable_property_org_name')->textInput() ?>

    <?= $form->field($model, 'valuable_property_dogovor_number')->textInput() ?>

    <?= $form->field($model, 'valuable_property_dogovor_date')->textInput() ?>

    <?= $form->field($model, 'valuable_property_active_status')->textInput() ?>

    <?= $form->field($model, 'valuable_property_zalog_name')->textInput() ?>

    <?= $form->field($model, 'valuable_property_zalog_type')->textInput() ?>

    <?= $form->field($model, 'valuable_property_zalog_inn')->textInput() ?>

    <?= $form->field($model, 'valuable_property_zalog_address')->textInput() ?>

    <?= $form->field($model, 'valuable_property_zalog_dogovor')->textInput() ?>

    <?= $form->field($model, 'valuable_property_other')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
