<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CpoDirectory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cpo-directory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient_inn')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'recipient_kpp')->textInput(['maxlength' => 9]) ?>

    <?= $form->field($model, 'checking_account')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'bik')->textInput(['maxlength' => 9]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondent_account')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'kbk')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'oktmo')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'payment_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
