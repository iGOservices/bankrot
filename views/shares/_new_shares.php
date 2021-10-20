<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $shares app\models\Shares */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="shares-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"shares",<?=isset($shares->id) ? $shares->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Выписка из реестра акционеров №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($shares,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">

                <?if($directory[140]['active'] == 1):?>
                    <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Наименование организации <?=$directory[140]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[140]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[141]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Местонахождение организации <?=$directory[141]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[141]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]location")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[142]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>ИНН общества <?=$directory[142]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[142]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]inn")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[143]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Уставной капитал общества руб. <?=$directory[143]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[143]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]company_capital")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[144]['active'] == 1):?>
                    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Доля участия <?=$directory[144]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[144]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]share")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[145]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номинальная стоимость акции <?=$directory[145]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[145]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]nominal_cost")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[146]['active'] == 1):?>
                    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Количество акций <?=$directory[146]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[146]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]shares_count")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[147]['active'] == 1):?>
                    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Общая сумма акций <?=$directory[147]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[147]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]total_cost")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[148]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номер договора участия <?=$directory[148]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[148]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]dogovor_number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[149]['active'] == 1):?>
                    <div class="col-xl-" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Дата договора <?=$directory[149]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[149]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]date")->widget(DatePicker::classname(), [
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

                <div class="col-xl-5">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан выписки из реестра акицонеров</h5>
                        <?= $form->field($uploadForm, "[$increment]shares[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="shares_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name shares_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "shares_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $shares->getSharesFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'shares',$shares->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='shares'?>'<?=$shares->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <?if($directory[150]['active'] == 1):?>
                    <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field" >
                            <h5>Примечание <?=$directory[150]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[150]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($shares, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
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


