<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SharesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'company_capital') ?>

    <?php // echo $form->field($model, 'share') ?>

    <?php // echo $form->field($model, 'nominal_cost') ?>

    <?php // echo $form->field($model, 'shares_count') ?>

    <?php // echo $form->field($model, 'total_cost') ?>

    <?php // echo $form->field($model, 'dogovor_number') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
