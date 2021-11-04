<?php

use app\models\Bank;
use app\models\Deal;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $deal app\models\Deal */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="deal-".$increment?>">
    <p class="delete_item" onclick='deleteItem(<?=$increment?>,"deal",<?=isset($deal->id) ? $deal->id : null?>);'><span class="icon-feather-trash-2" ></span> Удалить данные</p>

    <div class="accordion__item js-accordion-item">
	<div class="accordion-header js-accordion-header">Данные по совершенным сделкам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($deal,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">
                <?if($directory[94]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Предмет сделки <?=$directory[94]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[94]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($deal, "[$increment]type")->dropDownList(Deal::$type,['maxlength' => true, 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[95]['active'] == 1):?>
                    <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Описание сделки <?=$directory[95]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[95]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($deal, "[$increment]description")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[96]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Дата сделки <?=$directory[96]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[96]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($deal, "[$increment]date")->widget(DatePicker::classname(), [
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
                <?if($directory[97]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Имя контрагента <?=$directory[97]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[97]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($deal, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[98]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>ИНН контрагента <?=$directory[98]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[98]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($deal, "[$increment]inn")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <div class="col-xl-4">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан документа</h5>
                        <?= $form->field($uploadForm, "[$increment]deal[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="deal_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name deal_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "deal_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>
                        <? if(isset($model) && $files = $deal->getDealFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'deal',$deal->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='deal'?>',<?=$deal->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
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


