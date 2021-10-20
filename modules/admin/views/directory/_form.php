<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Directory;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="directory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(Directory::$active) ?>

    <?= $form->field($model, 'prompt')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'prompt_active')->dropDownList(Directory::$active) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
