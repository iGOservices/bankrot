<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $bank app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="bank-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"bank");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по банкам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Наименование кредитной орг-ии</h4>
                        <?= $form->field($bank, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Почтовый адресс</h4>
                        <?= $form->field($bank, "[$increment]post_address")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Номер счета</h4>
                        <?= $form->field($bank, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>БИК</h4>
                        <?= $form->field($bank, "[$increment]bic")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Вид счета</h4>
                        <?= $form->field($bank, "[$increment]type")->dropDownList(Bank::$type,[ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Валюта счета</h4>
                        <?= $form->field($bank, "[$increment]currency")->dropDownList(Bank::$currency,[ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Дата открытия счета</h4>
                        <?= $form->field($bank, "[$increment]date_open")->widget(DatePicker::classname(), [
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
                    <div class="row">

                        <div class="col-xl-12">
                            <?= $form->field($uploadForm, "[$increment]bank")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Примечание</h4>
                        <?= $form->field($bank, "[$increment]other")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>



			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


