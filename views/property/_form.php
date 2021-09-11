<?php

use app\models\Property;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
?>

<div class="property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'ticket_id')->textInput() ?>

    <?= $form->field($model, 'group')->dropDownList(Property::$group,['onchange' => 'changeAdminPropertyGroup();']) ?>

    <div id="property_type_id">
        <?= $form->field($model, 'property_type')->dropDownList($model->group == 1 ?Property::$property_type : Property::$property_type_dvizh,['maxlength' => true]) ?>
    </div>
    <?= $form->field($model, 'property_view')->dropDownList(Property::$property_view,['onchange' => 'changeAdminPropertyView();']) ?>

    <?= $form->field($model, 'share')->textInput(['maxlength' => true]) ?>

    <div style="display: <?=$model->property_view != 1 ? "block" : "none" ?>" class="other_owners">
        <?= $form->field($model, 'other_owners')->textInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'active_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($uploadForm, "[1]property[]")->fileInput(['multiple' => true])->label('Скан свидетельства о регистрации') ?>

    <?
    $str = "";
    if($files = $model->getPropertyFiles()->all()){
        $str .= "<span>Скан свидетельства о регистрации:</span><ul>";
        foreach ($files as $file){
            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'property',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'property');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
        }
        $str.= "</ul>";
    }
    echo $str;?>

    <?= $form->field($uploadForm, "other_property[]")->fileInput(['multiple' => true])->label('Скан иного документа подтверждающего право собственности') ?>

    <?
    $str = "";
    if($files = $model->getOtherPropertyFiles()->all()){
        $str .= "<span>Скан иного документа подтверждающего право собственности:</span><ul>";
        foreach ($files as $file){
            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'property',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'property');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
        }
        $str.= "</ul>";
    }
    echo $str;?>

    <div style="display: <?=$model->group == 1 || !$model->group ? "block" : "none" ?>" class="no_dvizh_block">
        <?= $form->field($model, 'square')->textInput(['maxlength' => true]) ?>
    </div>
    <div style="display: <?=$model->group == 2 ? "block" : "none" ?>" class="dvizh_block">
        <?= $form->field($model, 'reg_number')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vin_number')->textInput(['maxlength' => true]) ?>
    </div>
    <?= $form->field($model, "date_sved")->widget(DatePicker::classname(), [
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

    <?= $form->field($model, 'num_sved')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coutry')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput() ?>

    <?= $form->field($model, 'corpus')->textInput() ?>

    <?= $form->field($model, 'office')->textInput() ?>

    <?= $form->field($model, 'post_index')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'active_status',['template' => '<div style="overflow: hidden;"><div style="float: left;width: 50px">{input}</div><div style="float: left;"><span>{label}</span></div></div>'])->checkbox([], false)?>

    <?= $form->field($model, 'zalog')->dropDownList(Property::$zalog) ?>

    <?= $form->field($model, 'zalog_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zalog_post_index')->textInput() ?>

    <?= $form->field($model, 'zalog_dogovor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other')->textarea(['maxlength' => true]) ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
