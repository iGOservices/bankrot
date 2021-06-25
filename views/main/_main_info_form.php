<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfo */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
?>

<div class="client-main-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($uploadForm, 'passport')->fileInput(['multiple' => true])->label('Пасспорт') ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($uploadForm, 'inn')->fileInput(['multiple' => true])->label('ИНН') ?>

    <?= $form->field($model, 'snils')->textInput(['maxlength' => true]) ?>

    <?= $form->field($uploadForm, 'snils')->fileInput(['multiple' => true])->label('Cнилс') ?>

    <?= $form->field($model, 'registr_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fact_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_id')->textInput() ?>

    <?= $form->field($model, 'inter_passsport_id')->textInput() ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'is_ip')->textInput() ?>

    <?= $form->field($model, 'changed_fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facsimile')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Далее', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>