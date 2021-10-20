<?php

use app\models\Promocode;
use app\models\TicketStatus;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Promocode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promocode-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'service_id')->dropDownList(TicketStatus::$type) ?>

    <?= $form->field($model, 'is_use')->dropDownList(Promocode::$is_use) ?>

    <?= $form->field($model, 'period')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Введите дату ...', 'autocomplete' => 'off'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'active')->dropDownList(Promocode::$active) ?>


    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
