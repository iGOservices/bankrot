<?php

use app\models\Bank;
use app\models\OtherShares;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $other_shares app\models\OtherShares */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="other_shares-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"other_shares");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по иным ценным бумагам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">


                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Наименование</h4>
                        <?= $form->field($other_shares, "[$increment]creater")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Вид бумаги</h4>
                        <?= $form->field($other_shares, "[$increment]type")->dropDownList(OtherShares::$type,['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Общее кол-во</h4>
                        <?= $form->field($other_shares, "[$increment]total_count")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Номинальная величина</h4>
                        <?= $form->field($other_shares, "[$increment]nominal_cost")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <h4>Скан документа</h4>
                    <?= $form->field($uploadForm, "[$increment]other_shares")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>
                <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                    <h4>Примечание</h4>
                    <?= $form->field($other_shares, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>

			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


