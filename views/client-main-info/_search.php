<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-main-info-search">

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

    <?php // echo $form->field($model, 'registr_address') ?>

    <?php // echo $form->field($model, 'fact_address') ?>

    <?php // echo $form->field($model, 'passport_id') ?>

    <?php // echo $form->field($model, 'inter_passsport_id') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'is_ip') ?>

    <?php // echo $form->field($model, 'changed_fio') ?>

    <?php // echo $form->field($model, 'facsimile') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
