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
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"bank",<?=isset($bank->id) ? $bank->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по банкам №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Наименование кредитной организации</h5>
                            <?= $form->field($bank, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_post_address'] == 1):?>
                        <div class="submit-field ">
                            <h5>Почтовый адрес</h5>
                            <?= $form->field($bank, "[$increment]post_address")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_number'] == 1):?>
                        <div class="submit-field ">
                            <h5>Номер счета</h5>
                            <?= $form->field($bank, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_bic'] == 1):?>
                        <div class="submit-field ">
                            <h5>БИК</h5>
                            <?= $form->field($bank, "[$increment]bic")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_type'] == 1):?>
                        <div class="submit-field ">
                            <h5>Вид счета</h5>
                            <?= $form->field($bank, "[$increment]type")->dropDownList(Bank::$type,[ 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_currency'] == 1):?>
                        <div class="submit-field ">
                            <h5>Валюта счета</h5>
                            <?= $form->field($bank, "[$increment]currency")->dropDownList(Bank::$currency,[ 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_date_open'] == 1):?>
                    <div class="submit-field ">
                        <h5>Дата открытия счета</h5>
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
                    <?endif;?>
                </div>

                <div class="col-xl-4">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан выписки по операциям счета за 3 года</h5>
                        <?= $form->field($uploadForm, "[$increment]bank[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="bank_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name bank_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "bank_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $model->getUploadedFiles("[$increment]bank")->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'bank') ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='bank'?>');" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_balance'] == 1):?>
                        <div class="submit-field ">
                            <h5>Исходящий остаток в рублях</h5>
                            <?= $form->field($bank, "[$increment]balance")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['bank_other'] == 1):?>
                        <div class="submit-field ">
                            <h5>Примечание</h5>
                            <?= $form->field($bank, "[$increment]other")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
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


