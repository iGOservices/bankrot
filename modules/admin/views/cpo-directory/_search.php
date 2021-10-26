<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CpoDirectorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cpo-directory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'recipient') ?>

    <?= $form->field($model, 'recipient_inn') ?>

    <?= $form->field($model, 'recipient_kpp') ?>

    <?= $form->field($model, 'checking_account') ?>

    <?php // echo $form->field($model, 'bik') ?>

    <?php // echo $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'correspondent account') ?>

    <?php // echo $form->field($model, 'kbk') ?>

    <?php // echo $form->field($model, 'oktmo') ?>

    <?php // echo $form->field($model, 'payment_name') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
