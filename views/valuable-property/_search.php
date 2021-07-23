<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ValuablePropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="valuable-property-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'property_type') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'coutry') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'house') ?>

    <?php // echo $form->field($model, 'corpus') ?>

    <?php // echo $form->field($model, 'office') ?>

    <?php // echo $form->field($model, 'post_index') ?>

    <?php // echo $form->field($model, 'org_name') ?>

    <?php // echo $form->field($model, 'dogovor_number') ?>

    <?php // echo $form->field($model, 'dogovor_date') ?>

    <?php // echo $form->field($model, 'active_status') ?>

    <?php // echo $form->field($model, 'zalog_name') ?>

    <?php // echo $form->field($model, 'zalog_type') ?>

    <?php // echo $form->field($model, 'zalog_inn') ?>

    <?php // echo $form->field($model, 'zalog_address') ?>

    <?php // echo $form->field($model, 'zalog_dogovor') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
