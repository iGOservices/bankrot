<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ValuableProperty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="valuable-property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_id')->textInput() ?>

    <?= $form->field($model, 'property_type')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'location')->textInput() ?>

    <?= $form->field($model, 'coutry')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput() ?>

    <?= $form->field($model, 'corpus')->textInput() ?>

    <?= $form->field($model, 'office')->textInput() ?>

    <?= $form->field($model, 'post_index')->textInput() ?>

    <?= $form->field($model, 'org_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dogovor_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dogovor_date')->textInput() ?>

    <?= $form->field($model, 'active_status')->textInput() ?>

    <?= $form->field($model, 'zalog_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zalog_type')->textInput() ?>

    <?= $form->field($model, 'zalog_inn')->textInput() ?>

    <?= $form->field($model, 'zalog_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zalog_dogovor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
