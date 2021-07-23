<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $shares app\models\Shares */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="shares-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"shares");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по акциям №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">


                <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Наименование</h4>
                        <?= $form->field($shares, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Местонахождение</h4>
                        <?= $form->field($shares, "[$increment]location")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>ИНН</h4>
                        <?= $form->field($shares, "[$increment]inn")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Уставной капитал(руб)</h4>
                        <?= $form->field($shares, "[$increment]company_capital")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Доля участия</h4>
                        <?= $form->field($shares, "[$increment]share")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Номинальная стоимость акции</h4>
                        <?= $form->field($shares, "[$increment]nominal_cost")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Кол-во акций</h4>
                        <?= $form->field($shares, "[$increment]shares_count")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Общая сумма акций</h4>
                        <?= $form->field($shares, "[$increment]total_cost")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Номер договора участия</h4>
                        <?= $form->field($shares, "[$increment]dogovor_number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Дата свид-ва о рег-ии</h4>
                        <?= $form->field($shares, "[$increment]date")->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                            'class' => 'with-border',
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'todayHighlight' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <h4>Скан выписки из реестра акционеров</h4>
                    <?= $form->field($uploadForm, "[$increment]shares")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>
                <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                    <h4>Примечание</h4>
                    <?= $form->field($shares, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>





			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


