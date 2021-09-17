<?php

use app\models\Property;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $property app\models\Property */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $directory app\models\Directory */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="property-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"property",<?=isset($property->id) ? $property->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">№<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($property,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_group'] == 1):?>
                        <div class="submit-field ">
                            <h5>Группа</h5>
                            <?= $form->field($property, "[$increment]group")->dropDownList(Property::$group,[ 'class' => 'with-border select_list ', 'onchange' => 'changePropertyStatment('.$increment.');'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_property_type'] == 1):?>
                        <div class="submit-field ">
                            <h5>Вид имущества</h5>
                            <div id="property<?=$increment?>">
                                <?= $form->field($property, "[$increment]property_type")->dropDownList($property->group == 2 ? Property::$property_type_dvizh : Property::$property_type,['class' => 'with-border select_list'])->label(false) ?>
                            </div>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_property_view'] == 1):?>
                        <div class="submit-field ">
                            <h5>Вид собственности</h5>
                            <?= $form->field($property, "[$increment]property_view")->dropDownList(Property::$property_view,[ 'class' => 'with-border select_list','onchange' => 'changePropertyView('.$increment.');'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_share'] == 1):?>
                        <div class="submit-field ">
                            <h5>Доля владения</h5>
                            <?= $form->field($property, "[$increment]share")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <?$display = ($property->property_view == 3) ?  "block" : "none"?>
                <div class="col-xl-12 other_owners" style="padding-left:30px;padding-right:30px;display: <?=$display?>;">
                    <? if($directory['property_other_owners'] == 1):?>
                        <div class="submit-field ">
                            <h5>Иные собственники</h5>
                            <?= $form->field($property, "[$increment]other_owners")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_active_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Наименование актива</h5>
                            <?= $form->field($property, "[$increment]active_name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>


                <?$display = ($property->group == 2) ?  "block" : "none"?>
                <div class="col-xl-2 dvizh_block" style="padding-left:30px;padding-right:30px; display: <?=$display?>;">
                    <? if($directory['property_vin_number'] == 1):?>
                        <div class="submit-field ">
                            <h5>VIN номер</h5>
                            <?= $form->field($property, "[$increment]vin_number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3 dvizh_block" style="padding-left:30px;padding-right:30px; display:<?=$display?>;">
                    <? if($directory['property_reg_number'] == 1):?>
                        <div class="submit-field ">
                            <h5>Регистрационный номер актива</h5>
                            <?= $form->field($property, "[$increment]reg_number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <?$display = ($property->group == 1 || !$property->group) ?  "block" : "none"?>
                <div class="col-xl-4 no_dvizh_block" style="padding-left:30px;padding-right:30px;display: <?=$display?>;">
                    <? if($directory['property_square'] == 1):?>
                        <div class="submit-field ">
                            <h5>Площадь</h5>
                            <?= $form->field($property, "[$increment]square")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_date_sved'] == 1):?>
                        <div class="submit-field ">
                            <h5>Дата свидетельства о регистрации</h5>
                                <?= $form->field($property, "[$increment]date_sved")->widget(DatePicker::classname(), [
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
                    <? if($directory['property_num_sved'] == 1):?>
                        <div class="submit-field ">
                            <h5>Номер свидетельства о регистрации</h5>
                            <?= $form->field($property, "[$increment]num_sved")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_cost'] == 1):?>
                        <div class="submit-field ">
                            <h5>Стоимость руб. </h5>
                            <?= $form->field($property, "[$increment]cost")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-3">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан свидетельства о регистрации</h5>
                        <?= $form->field($uploadForm, "[$increment]property[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="property_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name property_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "property_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $property->getPropertyFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'property',$property->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='property'?>',<?=$property->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан иного документа подтверждающего право собственности</h5>
                        <?= $form->field($uploadForm, "[$increment]other_property[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="other_property_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name other_property_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "other_property_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>
                        <? if(isset($model) && $files = $property->getOtherPropertyFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'property',$property->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='property'?>',<?=$property->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <div class="col-xl-12" >
                    <h5>Местонахождение актива: </h5>
                    <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
                        <div class="row">
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_coutry'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Страна</h5>
                                        <?= $form->field($property, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_region'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Регион</h5>
                                        <?= $form->field($property, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_district'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Район</h5>
                                        <?= $form->field($property, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_city'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Город</h5>
                                        <?= $form->field($property, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_street'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Улица</h5>
                                        <?= $form->field($property, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_house'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Дом</h5>
                                        <?= $form->field($property, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_corpus'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Корпус</h5>
                                        <?= $form->field($property, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_office'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Оффис</h5>
                                        <?= $form->field($property, "[$increment]office")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['property_post_index'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Почт. индекс</h5>
                                        <?= $form->field($property, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_zalog_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Имя залогодержателя</h5>
                            <?= $form->field($property, "[$increment]zalog_name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_zalog'] == 1):?>
                        <div class="submit-field ">
                            <h5>Залогодержатель</h5>
                            <?= $form->field($property, "[$increment]zalog")->dropDownList(Property::$zalog, ['maxlength' => true, 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_active_status'] == 1):?>
                        <div class="submit-field ">
                            <h5>Статус актива В залоге.</h5>
                            <?= $form->field($property, "[$increment]active_status", [
                                'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label>'])->checkbox([], false)?>
                        </div>
                    <? endif; ?>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_zalog_inn'] == 1):?>
                        <div class="submit-field ">
                            <h5>ИНН залогодержателя</h5>
                            <?= $form->field($property, "[$increment]zalog_inn")->textInput(['maxlength' => 12, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_zalog_post_index'] == 1):?>
                        <div class="submit-field ">
                            <h5>Почтовый адрес залогодержателя</h5>
                            <?= $form->field($property, "[$increment]zalog_post_index")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>

                <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_zalog_dogovor'] == 1):?>
                        <div class="submit-field ">
                            <h5>Договор залога или иная сделка</h5>
                            <?= $form->field($property, "[$increment]zalog_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <? endif; ?>
                </div>

<!--                <div class="col-xl-9" style="padding-left:30px;padding-right:30px;">-->
<!--                    <div class="submit-field ">-->
<!--                        <h5>Основание приобретения</h5>-->
<!--                        --><?//= $form->field($property, "[$increment]own_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
<!--                    </div>-->
<!--                </div>-->



                <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['property_other'] == 1):?>
                        <div class="submit-field ">
                            <h5>Примечание</h5>
                            <?= $form->field($property, "[$increment]other")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
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


