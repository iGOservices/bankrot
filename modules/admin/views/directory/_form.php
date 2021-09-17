<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="directory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'surname',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'patronymic',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'gender',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'birthday',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'birth_place',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'snils',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'region',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'district',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'city',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'street',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'selo',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'house',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'corpus',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'flat',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'index',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'fact_address',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'passport_id',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'inter_passsport_id',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'mail',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'phone',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'is_ip',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'is_work',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'changed_fio',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'facsimile',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>


    <?= $form->field($model, 'family_type',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_surname',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_patronymic',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birthday',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_country',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_series',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_number',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_number_act',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_birth_number_act_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'family_given',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'brak',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'razvod',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'bank_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_post_address',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_number',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_bic',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_type',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_currency',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_date_open',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_balance',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'bank_other',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_group',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_commitment',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_is_predprin',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_statment',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_coutry',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_region',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_district',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_city',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_street',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_house',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_corpus',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_flat',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_post_index',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_sum_statment',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_sum_dolg',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_forfeit',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_base',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_base_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_base_num',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'creditor_other',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_group',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_commitment',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_is_predprin',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_statment',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_coutry',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_region',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_district',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_city',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_street',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_house',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_corpus',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_flat',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_post_index',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_sum_statment',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_sum_dolg',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_forfeit',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_base',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_base_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_base_num',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'debitor_other',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'deal_type',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'deal_description',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'deal_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'deal_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'deal_inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'enforce_number',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'enforce_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'enforce_sum',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'nalog_work',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'nalog_year',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'nalog_income',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'nalog_nalog',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'other_text',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'other_shares_creater',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'other_shares_type',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'other_shares_total_count',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'other_shares_nominal_cost',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'other_shares_other',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_group',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_property_type',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_property_view',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_share',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_other_owners',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_active_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_square',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_reg_number',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_vin_number',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_date_sved',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_num_sved',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_coutry',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_region',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_district',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_city',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_street',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_house',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_corpus',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_office',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_post_index',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_cost',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_active_status',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_zalog_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_zalog_post_index',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_zalog_dogovor',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_other',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?//= $form->field($model, 'property_own_dogovor',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_zalog_inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'property_zalog',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_location',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_company_capital',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_share',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_nominal_cost',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_shares_count',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_total_cost',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_dogovor_number',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'share_other',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_property_type',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_cost',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_location',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_coutry',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_region',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_district',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_city',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_street',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_house',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_corpus',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_office',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_post_index',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_org_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_dogovor_number',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_dogovor_date',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_active_status',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_zalog_name',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_zalog_type',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_zalog_inn',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_zalog_address',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_zalog_dogovor',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <?= $form->field($model, 'valuable_property_other',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
