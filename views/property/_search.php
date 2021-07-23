<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'group') ?>

    <?= $form->field($model, 'property_type') ?>

    <?= $form->field($model, 'property_view') ?>

    <?php // echo $form->field($model, 'share') ?>

    <?php // echo $form->field($model, 'other_owners') ?>

    <?php // echo $form->field($model, 'active_name') ?>

    <?php // echo $form->field($model, 'square') ?>

    <?php // echo $form->field($model, 'reg_number') ?>

    <?php // echo $form->field($model, 'vin_number') ?>

    <?php // echo $form->field($model, 'date_sved') ?>

    <?php // echo $form->field($model, 'num_sved') ?>

    <?php // echo $form->field($model, 'coutry') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'house') ?>

    <?php // echo $form->field($model, 'corpus') ?>

    <?php // echo $form->field($model, 'office') ?>

    <?php // echo $form->field($model, 'post_index') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'active_status') ?>

    <?php // echo $form->field($model, 'zalog_name') ?>

    <?php // echo $form->field($model, 'zalog_post_index') ?>

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
