<?php

use app\models\Bank;
use app\models\Deal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $deal app\models\Deal */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="deal-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"deal");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по совершенным сделкам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Предмет сделки</h4>
                        <?= $form->field($deal, "[$increment]type")->dropDownList(Deal::$type,['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Описание сделки</h4>
                        <?= $form->field($deal, "[$increment]description")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Дата сделки</h4>
                        <?= $form->field($deal, "[$increment]date")->widget(DatePicker::classname(), [
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

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Имя контрагента</h4>
                        <?= $form->field($deal, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>ИНН контрагента</h4>
                        <?= $form->field($deal, "[$increment]inn")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-4">
                    <h4>Скан документа</h4>
                    <?= $form->field($uploadForm, "[$increment]deal")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>

			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


