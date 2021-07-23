<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $nalog app\models\Nalog */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="nalog-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"nalog");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по доходам и налогам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Место работы</h4>
                        <?= $form->field($nalog, "[$increment]work")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Год периода</h4>
                        <?= $form->field($nalog, "[$increment]year")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Сумма дохода</h4>
                        <?= $form->field($nalog, "[$increment]income")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Сумма налога</h4>
                        <?= $form->field($nalog, "[$increment]nalog")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <h4>Скан  справки 2 НДФЛ</h4>
                    <?= $form->field($uploadForm, "[$increment]ndfl")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>



            </div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


