<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $brak app\models\Brak */
/* @var $razvod app\models\Razvod */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="sp-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"sp",<?=isset($brak->id) ? $brak->id : null?>,<?=isset($razvod->id) ? $razvod->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по Семейному положению №<?=$increment+1?>
	</div>

	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-6 col-md-6">
                        <div class="section-headline">
                            <h5> Свидетельство о браке</h5>
                        </div>
                        <!-- Accordion -->
                        <div class="accordion js-accordion">
                            <!-- Accordion Item -->
                            <div class="accordion__item js-accordion-item">
                                <div class="accordion-header js-accordion-header">Данные о браке</div>
                                <!-- Accordtion Body -->
                                <div class="accordion-body js-accordion-body">
                                    <!-- Accordion Content -->
                                    <div class="accordion-body__contents">
                                        <?= $form->field($brak,"[$increment]id")->hiddenInput([])->label(false); ?>
                                        <?= $form->field($razvod,"[$increment]id")->hiddenInput([])->label(false); ?>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h5>Серия</h5>
                                                    <?= $form->field($brak, "[$increment]series")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h5>Номер</h5>
                                                    <?= $form->field($brak, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h5>Кем выдан</h5>
                                                    <?= $form->field($brak, "[$increment]given")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h5>Дата выдачи</h5>
                                                    <?= $form->field($brak, "[$increment]date")->widget(DatePicker::classname(), [
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
                                                    ])->label(false)?>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h5>Дата выдачи актовой записи</h5>
                                                    <?= $form->field($brak, "[$increment]number_act_date")->widget(DatePicker::classname(), [
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
                                                    ])->label(false)?>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h5>Номер актовой записи</h5>
                                                    <?= $form->field($brak, "[$increment]number_act")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>


                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h5>Скан свидетельства о браке</h5>
                                                    <?= $form->field($uploadForm, "[$increment]brak[]", [
                                                        'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="brak_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name brak_upload'.$increment.'">Файл не выбран</span>
										
										        </div>'])->fileInput(['multiple' => true, 'id' => "brak_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                                                    <? if(isset($model) && $files = $brak->getBrakFiles()->all()): ?>

                                                        <ul style="list-style: none;">
                                                            <span>Загруженные файлы</span>
                                                            <?foreach ($files as $file):?>

                                                                <li id="<?=$file->id?>">
                                                                    <a href="<?= $file->getLink(true,'sp',$brak->ticket_id) ?>" target="_blank">
                                                                        <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                                    </a>
                                                                    <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='sp'?>');" ><span class="icon-feather-trash-2"></span></a>
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

                                <!-- Accordion Item / End -->
                            </div>
                            <!-- Accordion / End -->
                        </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="section-headline">
                        <h5> Свидетельство о разводе</h5>
                    </div>
                    <!-- Accordion -->
                    <div class="accordion js-accordion">
                        <!-- Accordion Item -->
                        <div class="accordion__item js-accordion-item">
                            <div class="accordion-header js-accordion-header">Данные о разводе</div>
                            <!-- Accordtion Body -->
                            <div class="accordion-body js-accordion-body">
                                <!-- Accordion Content -->
                                <div class="accordion-body__contents">
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h5>Серия</h5>
                                                <?= $form->field($razvod, "[$increment]series")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h5>Номер</h5>
                                                <?= $form->field($razvod, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h5>Кем выдан</h5>
                                                <?= $form->field($razvod, "[$increment]given")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h5>Дата выдачи</h5>
                                                <?= $form->field($razvod, "[$increment]date")->widget(DatePicker::classname(), [
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
                                                ])->label(false)?>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h5>Дата выдачи актовой записи</h5>
                                                <?= $form->field($razvod, "[$increment]number_act_date")->widget(DatePicker::classname(), [
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
                                                ])->label(false)?>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h5>Номер актовой записи</h5>
                                                <?= $form->field($razvod, "[$increment]number_act")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>


                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h5>Скан свидетельства о разводе </h5>
                                                <?= $form->field($uploadForm, "[$increment]razvod[]", [
                                                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="razvod_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name razvod_upload'.$increment.'">Файл не выбран</span>
										
										    </div>'])->fileInput(['multiple' => true, 'id' => "razvod_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                                                <? if(isset($model) && $files = $razvod->getRazvodFiles()->all()): ?>
                                                    <ul style="list-style: none;">
                                                        <span>Загруженные файлы</span>
                                                        <?foreach ($files as $file):?>
                                                            <li id="<?=$file->id?>">
                                                                <a href="<?= $file->getLink(true,'sp',$razvod->ticket_id) ?>" target="_blank">
                                                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                                </a>
                                                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='sp'?>');" ><span class="icon-feather-trash-2"></span></a>
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

                            <!-- Accordion Item / End -->
                        </div>
                        <!-- Accordion / End -->
                    </div>
                </div>
                <div class="col-xl-12">
                    <hr>
                </div>
                <div class="col-xl-6">
                        <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                            <h5>Брачный договор</h5>
                            <?= $form->field($uploadForm, "[$increment]brak_dogovor[]", [
                                'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="brak_dogovor_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name brak_dogovor_upload'.$increment.'">Файл не выбран</span>
										
										    </div>'])->fileInput(['multiple' => true, 'id' => "brak_dogovor_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                            <? if(isset($model) && $files = $brak->getBrakDogovorFiles()->all()): ?>
                                <ul style="list-style: none;">
                                    <span>Загруженные файлы</span>
                                    <?foreach ($files as $file):?>
                                        <li id="<?=$file->id?>">
                                            <a href="<?= $file->getLink(true,'sp',$brak->ticket_id) ?>" target="_blank">
                                                <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                            </a>
                                            <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='sp'?>');" ><span class="icon-feather-trash-2"></span></a>
                                        </li>
                                    <?endforeach;?>
                                </ul>
                            <? endif; ?>
                        </div>
                </div>

                <div class="col-xl-6">

                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Соглашение о разделе имущества</h5>
                        <?= $form->field($uploadForm, "[$increment]property_division[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="property_division_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name property_division_upload'.$increment.'">Файл не выбран</span>
										
										    </div>'])->fileInput(['multiple' => true, 'id' => "property_division_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $razvod->getPropertyDivisionFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'sp',$razvod->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='sp'?>');" ><span class="icon-feather-trash-2"></span></a>
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


