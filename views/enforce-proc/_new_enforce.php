<?php

use app\models\Debitor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $enforce app\models\EnforceProc */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */

?>
<!-- Accordion Item -->
<div id="<?="enforce-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"enforce",<?=isset($enforce->id) ? $enforce->id : null?>);'></span>
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
                    <? if($directory['enforce_number'] == 1):?>
                        <div class="submit-field ">
                            <h5>Номер исполнительного производства</h5>
                            <?= $form->field($enforce, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['enforce_date'] == 1):?>
                        <div class="submit-field">
                            <h5>Дата исполнительного производства</h5>
                            <?= $form->field($enforce, "[$increment]date")->widget(DatePicker::classname(), [
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
                            ])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['enforce_sum'] == 1):?>
                        <div class="submit-field ">
                            <h5>Сумма непогашенной задолженности</h5>
                            <?= $form->field($enforce, "[$increment]sum")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
                    <?endif;?>
                </div>
			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


