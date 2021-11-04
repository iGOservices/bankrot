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
    <p class="delete_item" onclick='deleteItem(<?=$increment?>,"enforce",<?=isset($enforce->id) ? $enforce->id : null?>);'><span class="icon-feather-trash-2" ></span> Удалить данные</p>

    <div class="accordion__item js-accordion-item">
	<div class="accordion-header js-accordion-header">Данные по исполнительному производству №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($enforce,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">
                <?if($directory[99]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номер исполнительного производства <?=$directory[99]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[99]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($enforce, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[100]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field">
                            <h5>Дата исполнительного производства <?=$directory[100]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[100]['prompt']."\"></i>" : "" ?></h5>
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
                        </div>
                <?endif;?>
                <?if($directory[101]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Сумма непогашенной задолженности <?=$directory[101]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[101]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($enforce, "[$increment]sum")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
                    </div>
                <?endif;?>
			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


