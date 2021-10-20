<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $other app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="other-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"other",<?=isset($other->id) ? $other->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Иные данные №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($other,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">

                <?if($directory[106]['active'] == 1):?>
                    <div class="col-xl-9" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Примечание <?=$directory[106]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[106]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($other, "[$increment]text")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>


                <div class="col-xl-3">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан документа</h5>
                        <?= $form->field($uploadForm, "[$increment]other[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="other_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name other_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "other_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>
                        <? if(isset($model) && $files = $other->getOtherFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'other',$other->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='other'?>',<?=$other->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


