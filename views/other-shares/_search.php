<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OtherSharesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="other-shares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'creater') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'total_count') ?>

    <?php // echo $form->field($model, 'nominal_cost') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
