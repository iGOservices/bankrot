<?php

use app\models\Bank;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
?>

<div class="bank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'ticket_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(Bank::$type) ?>

    <?= $form->field($model, 'currency')->dropDownList(Bank::$currency) ?>

    <?= $form->field($model, 'date_open')->widget(DatePicker::classname(), [
        'options' => [
            'placeholder' => 'Введите дату',
            'autocomplete' => 'off',
            'class' => 'with-border',
        ],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'balance')->textInput() ?>

    <?= $form->field($model, 'other')->textarea(['maxlength' => true]) ?>

    <?= $form->field($uploadForm, "bank[]")->fileInput(['multiple' => true])->label('Скан документа') ?>

    <?
    $str = "";
    if($files = $model->getBankFiles()->all()){
        $str .= "<span>Скан файл документа:</span><ul>";
        foreach ($files as $file){
            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'bank',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'bank');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
        }
        $str.= "</ul>";
    }
    echo $str;?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
