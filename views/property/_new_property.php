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
    <p class="delete_item" onclick='deleteItem(<?=$increment?>,"property",<?=isset($property->id) ? $property->id : null?>);'><span class="icon-feather-trash-2" ></span> Удалить данные</p>

    <div class="accordion__item js-accordion-item">
	<div class="accordion-header js-accordion-header">№<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
            <?= $form->field($property,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">
                <?if($directory[112]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Группа  <?=$directory[112]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[112]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]group")->dropDownList(Property::$group,[ 'class' => 'with-border select_list ', 'onchange' => 'changePropertyStatment('.$increment.');'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[113]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Вид имущества <?=$directory[113]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[113]['prompt']."\"></i>" : "" ?></h5>
                            <div id="property<?=$increment?>">
                                <?= $form->field($property, "[$increment]property_type")->dropDownList($property->group == 2 ? Property::$property_type_dvizh : Property::$property_type,['class' => 'with-border select_list'])->label(false) ?>
                            </div>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[114]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Вид собственности <?=$directory[114]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[114]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]property_view")->dropDownList(Property::$property_view,[ 'class' => 'with-border select_list','onchange' => 'changePropertyView('.$increment.');'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[115]['active'] == 1):?>
                    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Доля владения <?=$directory[115]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[115]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]share")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[116]['active'] == 1):?>
                    <?$display = ($property->property_view == 3) ?  "block" : "none"?>
                    <div class="col-xl-12 other_owners" style="padding-left:30px;padding-right:30px;display: <?=$display?>;">
                            <div class="submit-field ">
                                <h5>Иные собственники <?=$directory[116]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[116]['prompt']."\"></i>" : "" ?></h5>
                                <?= $form->field($property, "[$increment]other_owners")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                            </div>

                    </div>
                <?endif;?>
                <?if($directory[117]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Наименование актива <?=$directory[117]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[117]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]active_name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?$display = ($property->group == 2) ?  "block" : "none"?>
                <?if($directory[120]['active'] == 1):?>
                        <div class="col-xl-2 dvizh_block" style="padding-left:30px;padding-right:30px; display: <?=$display?>;">
                            <div class="submit-field ">
                                <h5>VIN номер <?=$directory[120]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[120]['prompt']."\"></i>" : "" ?></h5>
                                <?= $form->field($property, "[$increment]vin_number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                            </div>
                        </div>
                <?endif;?>
                <?if($directory[119]['active'] == 1):?>
                    <div class="col-xl-3 dvizh_block" style="padding-left:30px;padding-right:30px; display:<?=$display?>;">
                            <div class="submit-field ">
                                <h5>Регистрационный номер актива <?=$directory[119]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[119]['prompt']."\"></i>" : "" ?></h5>
                                <?= $form->field($property, "[$increment]reg_number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                            </div>

                    </div>
                <?endif;?>
                <?$display = ($property->group == 1 || !$property->group) ?  "block" : "none"?>
                <?if($directory[118]['active'] == 1):?>
                    <div class="col-xl-4 no_dvizh_block" style="padding-left:30px;padding-right:30px;display: <?=$display?>;">
                        <div class="submit-field ">
                            <h5>Площадь <?=$directory[118]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[118]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]square")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[121]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Дата свидетельства о регистрации <?=$directory[121]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[121]['prompt']."\"></i>" : "" ?></h5>
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
                    </div>
                <?endif;?>
                <?if($directory[122]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номер свидетельства о регистрации <?=$directory[122]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[122]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]num_sved")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[132]['active'] == 1):?>
                    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Стоимость руб. <?=$directory[132]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[132]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]cost")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
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
                            <?if($directory[123]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Страна <?=$directory[123]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[123]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[124]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Регион <?=$directory[124]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[124]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[125]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Район <?=$directory[125]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[125]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[126]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Город <?=$directory[126]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[126]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[127]['active'] == 1):?>
                                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Улица <?=$directory[127]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[127]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[128]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Дом <?=$directory[128]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[128]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[129]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Корпус <?=$directory[129]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[129]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[130]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Оффис <?=$directory[130]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[130]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]office")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <?if($directory[131]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Почт. индекс <?=$directory[131]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[131]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($property, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>

                <?if($directory[134]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Имя залогодержателя <?=$directory[134]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[134]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]zalog_name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <? endif; ?>
                <?if($directory[139]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Залогодержатель <?=$directory[139]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[139]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]zalog")->dropDownList(Property::$zalog, ['maxlength' => true, 'class' => 'with-border select_list'])->label(false) ?>
                        </div>

                    </div>
                <? endif; ?>
                <?if($directory[133]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Статус актива В залоге. <?=$directory[133]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[133]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]active_status", [
                                'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label>'])->checkbox([], false)?>
                        </div>

                    </div>
                <? endif; ?>
                <?if($directory[138]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>ИНН залогодержателя <?=$directory[138]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[138]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]zalog_inn")->textInput(['maxlength' => 12, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <? endif; ?>
                <?if($directory[135]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Почтовый адрес залогодержателя <?=$directory[135]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[135]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]zalog_post_index")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>

                    </div>
                <? endif; ?>
                <?if($directory[136]['active'] == 1):?>
                    <div class="col-xl-5" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Договор залога или иная сделка <?=$directory[136]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[136]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]zalog_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>

                    </div>
                <? endif; ?>

<!--                <div class="col-xl-9" style="padding-left:30px;padding-right:30px;">-->
<!--                    <div class="submit-field ">-->
<!--                        <h5>Основание приобретения</h5>-->
<!--                        --><?//= $form->field($property, "[$increment]own_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
<!--                    </div>-->
<!--                </div>-->

                <?if($directory[137]['active'] == 1):?>
                    <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Примечание <?=$directory[137]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[137]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($property, "[$increment]other")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
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


