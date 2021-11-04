<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $bank app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="bank-".$increment?>">
    <p class="delete_item" onclick='deleteItem(<?=$increment?>,"bank",<?=isset($bank->id) ? $bank->id : null?>);'><span class="icon-feather-trash-2" ></span> Удалить данные</p>

    <div class="accordion__item js-accordion-item">
	<div class="accordion-header js-accordion-header">Данные по банкам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($bank,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">
                <?if($directory[41]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Наименование кредитной организации <?=$directory[41]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[41]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[42]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Почтовый адрес <?=$directory[42]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[42]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]post_address")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[43]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номер счета <?=$directory[43]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[43]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[44]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>БИК <?=$directory[44]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[44]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]bic")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[45]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Вид счета <?=$directory[45]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[45]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]type")->dropDownList(Bank::$type,[ 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[46]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Валюта счета <?=$directory[46]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[46]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]currency")->dropDownList(Bank::$currency,[ 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[47]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Дата открытия счета <?=$directory[47]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[47]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]date_open")->widget(DatePicker::classname(), [
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
                <div class="col-xl-4">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан выписки по операциям счета за 3 года</h5>
                        <?= $form->field($uploadForm, "[$increment]bank[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="bank_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name bank_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "bank_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $bank->getBankFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'bank') ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='bank'?>',<?=$bank->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>
                <?if($directory[48]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Исходящий остаток в рублях <?=$directory[48]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[48]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]balance")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[49]['active'] == 1):?>
                    <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Примечание <?=$directory[49]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[49]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($bank, "[$increment]other")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
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


