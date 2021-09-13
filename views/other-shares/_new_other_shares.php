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


                <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['other_shares_creater'] == 1):?>
                        <div class="submit-field ">
                            <h5>Лицо выпустившее ценную бумагу</h5>
                            <?= $form->field($other_shares, "[$increment]creater")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['other_shares_type'] == 1):?>
                        <div class="submit-field ">
                            <h5>Вид ценной бумаги</h5>
                            <?= $form->field($other_shares, "[$increment]type")->dropDownList(OtherShares::$type,['maxlength' => true, 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['other_shares_total_count'] == 1):?>
                        <div class="submit-field ">
                            <h5>Общее количество</h5>
                            <?= $form->field($other_shares, "[$increment]total_count")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['other_shares_nominal_cost'] == 1):?>
                        <div class="submit-field ">
                            <h5>Номинальная величина обязательства руб.</h5>
                            <?= $form->field($other_shares, "[$increment]nominal_cost")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>
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
                <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['other_shares_other'] == 1):?>
                        <div class="submit-field ">
                            <h5>Примечание</h5>
                            <?= $form->field($other_shares, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>

			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


