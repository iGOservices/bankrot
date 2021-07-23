<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="directory-form">


    <?php $form = ActiveForm::begin(); ?>

    <h4>Личные данные клиента</h4>
    <hr>

    <div class="switches-list">
        <div class="switch-container">

            <label class="switch"><input type="checkbox" checked=""><span class="switch-button"></span> Switch Button</label>
        </div>

        <div class="switch-container">
            <label class="switch"><input type="checkbox"><span class="switch-button"></span> Switch Button</label>
        </div>
    </div>


    <?= $form->field($model, 'name')->checkbox() ?>

    <?= $form->field($model, 'surname')->checkbox() ?>

    <?= $form->field($model, 'patronymic')->checkbox() ?>

    <?= $form->field($model, 'gender')->checkbox() ?>

    <?= $form->field($model, 'birthday')->checkbox() ?>

    <?= $form->field($model, 'birth_place')->checkbox() ?>

    <?= $form->field($model, 'inn')->checkbox() ?>

    <?= $form->field($model, 'snils')->checkbox() ?>

    <?= $form->field($model, 'registr_address')->checkbox() ?>

    <?= $form->field($model, 'fact_address')->checkbox() ?>

    <?= $form->field($model, 'passport_id')->checkbox() ?>

    <?= $form->field($model, 'inter_passsport_id')->checkbox() ?>

    <?= $form->field($model, 'mail')->checkbox() ?>

    <?= $form->field($model, 'phone')->checkbox() ?>

    <?= $form->field($model, 'is_ip')->checkbox() ?>

    <?= $form->field($model, 'changed_fio')->checkbox() ?>

    <?= $form->field($model, 'facsimile')->checkbox() ?>

    <h4>Семья и дети</h4>
    <hr>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
