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

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['family_type'] == 1):?>
                        <div class="submit-field ">
                            <h5>Тип родства</h5>
                            <?= $form->field($family,"[$increment]type")->dropDownList(Family::$type, [ 'class' => 'with-border select_list'])->label(false)  ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['family_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Имя</h5>
                            <?= $form->field($family,"[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['family_surname'] == 1):?>
                        <div class="submit-field ">
                            <h5>Фамилия</h5>
                            <?= $form->field($family,"[$increment]surname")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['family_patronymic'] == 1):?>
                    <div class="submit-field ">
                        <h5>Отчество</h5>
                        <?= $form->field($family,"[$increment]patronymic")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                    </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['family_inn'] == 1):?>
                        <div class="submit-field">
                            <h5>ИНН</h5>
                            <?= $form->field($family,"[$increment]inn")->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['family_birthday'] == 1):?>
                        <div class="submit-field">
                            <h5>Дата рождения</h5>
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
                    <?endif;?>
                </div>

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

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['family_birth_country'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Страна выдачи</h5>
                                        <?= $form->field($family,"[$increment]birth_country")->dropDownList(Family::$birth_country,[ 'class' => 'with-border select_list'])->label(false)  ?>
                                    </div>
                                <?endif;?>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['family_birth_series'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Серия</h5>
                                        <?= $form->field($family,"[$increment]birth_series")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                    </div>
                                <?endif;?>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['family_birth_number'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Номер</h5>
                                        <?= $form->field($family,"[$increment]birth_number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                    </div>
                                <?endif;?>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['family_birth_date'] == 1):?>
                                    <div class="submit-field">
                                        <h5>Дата выдачи счидетельства</h5>
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
                                <?endif;?>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['family_birth_number_act'] == 1):?>
                                <div class="submit-field ">
                                    <h5>Номер актовой записи</h5>
                                    <?= $form->field($family,"[$increment]birth_number_act")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                </div>
                                <?endif;?>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['family_birth_number_act_date'] == 1):?>
                                <div class="submit-field ">
                                    <h5>Дата актовой записи</h5>
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
                                <?endif;?>
                            </div>
                            <div class="col-xl-6" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['family_given'] == 1):?>
                                <div class="submit-field ">
                                    <h5>Кем выдан</h5>
                                    <?= $form->field($family,"[$increment]given")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                </div>
                                <?endif;?>
                            </div>



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


