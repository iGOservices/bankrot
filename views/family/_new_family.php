<?php

use app\models\Bank;
use app\models\Family;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $family app\models\Family */
/* @var $directory app\models\Directory */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */


?>
<!-- Accordion Item -->
<div id="<?="family-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"family",<?=isset($family->id) ? $family->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по Родственным отношениям №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <? if($directory[26]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Тип родства <?=$directory[26]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[26]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($family,"[$increment]type")->dropDownList(Family::$type, [ 'class' => 'with-border select_list'])->label(false)  ?>
                        </div>
                    </div>
                <?endif;?>
                <? if($directory[27]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Имя <?=$directory[27]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[27]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($family,"[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                        </div>
                    </div>
                <?endif;?>
                <? if($directory[28]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Фамилия <?=$directory[28]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[28]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($family,"[$increment]surname")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                        </div>
                    </div>
                <?endif;?>
                <? if($directory[29]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Отчество <?=$directory[29]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[29]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($family,"[$increment]patronymic")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                        </div>
                    </div>
                <?endif;?>
                <? if($directory[31]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field">
                            <h5>ИНН <?=$directory[31]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[31]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($family,"[$increment]inn")->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <? if($directory[30]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field">
                            <h5>Дата рождения <?=$directory[30]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[30]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($family, "[$increment]birthday")->widget(DatePicker::classname(), [
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

                <div class="col-xl-6">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан свидетельства о рождении</h5>
                        <?= $form->field($uploadForm, "[$increment]birth[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="birth_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name inn_upload birth_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "birth_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>
                        <? if(isset($model) && $files = $family->getBirthFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'family',$family->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='family'?>',<?=$family->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <?= $form->field($family,"[$increment]id")->hiddenInput([])->label(false); ?>

                <div class="col-xl-12" >
                    <h5>Свидетельство о рождении: </h5>
                    <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
                        <div class="row">
                            <? if($directory[32]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Страна выдачи <?=$directory[32]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[32]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($family,"[$increment]birth_country")->dropDownList(Family::$birth_country,[ 'class' => 'with-border select_list'])->label(false)  ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <? if($directory[33]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Серия <?=$directory[33]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[33]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($family,"[$increment]birth_series")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <? if($directory[34]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Номер <?=$directory[34]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[34]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($family,"[$increment]birth_number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <? if($directory[35]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field">
                                        <h5>Дата выдачи счидетельства <?=$directory[35]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[35]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($family,"[$increment]birth_date")->widget(DatePicker::classname(), [
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
                            <? if($directory[36]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Номер актовой записи <?=$directory[36]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[36]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($family,"[$increment]birth_number_act")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <? if($directory[37]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Дата актовой записи <?=$directory[37]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[37]['prompt']."\"></i>" : "" ?></h5>

                                        <?= $form->field($family,"[$increment]birth_number_act_date")->widget(DatePicker::classname(), [
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
                            <? if($directory[38]['active'] == 1):?>
                                <div class="col-xl-6" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Кем выдан <?=$directory[38]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[38]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($family,"[$increment]given")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                    </div>
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                </div>






			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


