<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CreditorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="creditor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'group') ?>

    <?= $form->field($model, 'commitment') ?>

    <?= $form->field($model, 'is_predprin') ?>

    <?php // echo $form->field($model, 'statment') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'coutry') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'house') ?>

    <?php // echo $form->field($model, 'corpus') ?>

    <?php // echo $form->field($model, 'flat') ?>

    <?php // echo $form->field($model, 'post_index') ?>

    <?php // echo $form->field($model, 'sum_statment') ?>

    <?php // echo $form->field($model, 'sum_dolg') ?>

    <?php // echo $form->field($model, 'forfeit') ?>

    <?php // echo $form->field($model, 'base') ?>

    <?php // echo $form->field($model, 'base_date') ?>

    <?php // echo $form->field($model, 'base_num') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
