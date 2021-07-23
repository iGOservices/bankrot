<?php

use app\models\Debitor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $enforce app\models\EnforceProc */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */

?>
<!-- Accordion Item -->
<div id="<?="enforce-proc-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"enforce-proc");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по исполнительному производству №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Номер исп. произсовдства</h4>
                        <?= $form->field($enforce, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field">
                        <h4>Дата исп. производства</h4>
                        <?= $form->field($enforce, "[$increment]date")->widget(DatePicker::classname(), [
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
                        <h4>Сумма непогашенной задолженности</h4>
                        <?= $form->field($enforce, "[$increment]sum")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


