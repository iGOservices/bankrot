<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $nalog app\models\Nalog */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="nalog-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"nalog",<?=isset($nalog->id) ? $nalog->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по доходам и налогам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($nalog,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">

                <?if($directory[102]['active'] == 1):?>
                    <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Наименование налогового агента (место работы) <?=$directory[102]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[102]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($nalog, "[$increment]work")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[103]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Год отчетного периода <?=$directory[103]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[103]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($nalog, "[$increment]year")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <div class="col-xl-4">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан  справки 2-НДФЛ</h5>
                        <?= $form->field($uploadForm, "[$increment]ndfl[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="ndfl_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name ndfl_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "ndfl_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>
                        <? if(isset($model) && $files = $nalog->getNalogFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'nalog',$nalog->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='nalog'?>',<?=$nalog->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <?if($directory[104]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Сумма дохода <?=$directory[104]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[104]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($nalog, "[$increment]income")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[105]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Сумма налога <?=$directory[105]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[105]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($nalog, "[$increment]nalog")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
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


