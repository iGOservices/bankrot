<?php

use app\models\Bank;
use app\models\OtherShares;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $other_shares app\models\OtherShares */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="other_shares-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"other_shares",<?=isset($other_shares->id) ? $other_shares->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по иным ценным бумагам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($other_shares,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">

                <?if($directory[107]['active'] == 1):?>
                    <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Лицо выпустившее ценную бумагу <?=$directory[107]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[107]['prompt']."\"></i>" : "" ?> </h5>
                            <?= $form->field($other_shares, "[$increment]creater")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <? endif; ?>
                <?if($directory[108]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Вид ценной бумаги <?=$directory[108]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[108]['prompt']."\"></i>" : "" ?> </h5>
                            <?= $form->field($other_shares, "[$increment]type")->dropDownList(OtherShares::$type,['maxlength' => true, 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    </div>
                <? endif; ?>
                <?if($directory[109]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Общее количество <?=$directory[109]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[109]['prompt']."\"></i>" : "" ?> </h5>
                            <?= $form->field($other_shares, "[$increment]total_count")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <? endif; ?>
                <?if($directory[110]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номинальная величина обязательства руб. <?=$directory[110]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[110]['prompt']."\"></i>" : "" ?> </h5>
                            <?= $form->field($other_shares, "[$increment]nominal_cost")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <? endif; ?>

                <div class="col-xl-6">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан документа подтверждающего обязательство</h5>
                        <?= $form->field($uploadForm, "[$increment]other_shares[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="other_shares_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name other_shares_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "other_shares_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $other_shares->getOtherSharesFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'other_shares',$other_shares->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='other_shares'?>',<?=$other_shares->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <?if($directory[111]['active'] == 1):?>
                    <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Примечание <?=$directory[111]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[111]['prompt']."\"></i>" : "" ?> </h5>
                            <?= $form->field($other_shares, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <? endif; ?>


			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


