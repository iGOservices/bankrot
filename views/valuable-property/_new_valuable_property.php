<?php

use app\models\Property;
use app\models\ValuableProperty;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $valuable_property app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="valuable_property-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"valuable_property",<?=isset($valuable_property->id) ? $valuable_property->id : null?>);'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">№<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_property_type'] == 1):?>
                        <div class="submit-field ">
                            <h5>Вид имущества</h5>
                            <?= $form->field($valuable_property, "[$increment]property_type")->dropDownList(ValuableProperty::$property_type,[ 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Наименование</h5>
                            <?= $form->field($valuable_property, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_cost'] == 1):?>
                        <div class="submit-field ">
                            <h5>Сумма руб.</h5>
                            <?= $form->field($valuable_property, "[$increment]cost")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_location'] == 1):?>
                        <div class="submit-field ">
                            <h5>Место нахождения или хранения</h5>
                            <?= $form->field($valuable_property, "[$increment]location")->dropDownList(ValuableProperty::$location, [ 'class' => 'with-border select_list','onchange' => 'changeSocketView('.$increment.');'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>

                <div class="col-xl-12" >
                    <h5>Местонахождение хранения: </h5>
                    <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
                        <div class="row">
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_coutry'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Страна</h5>
                                        <?= $form->field($valuable_property, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_region'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Субьект федерации</h5>
                                        <?= $form->field($valuable_property, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_district'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Район</h5>
                                        <?= $form->field($valuable_property, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_city'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Город</h5>
                                        <?= $form->field($valuable_property, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_street'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Улица</h5>
                                        <?= $form->field($valuable_property, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_house'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Дом</h5>
                                        <?= $form->field($valuable_property, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_corpus'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Корпус</h5>
                                        <?= $form->field($valuable_property, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_office'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Офис</h5>
                                        <?= $form->field($valuable_property, "[$increment]office")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['valuable_property_post_index'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Почтовый индекс</h5>
                                        <?= $form->field($valuable_property, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
                            </div>
                        </div>
                    </div>
                </div>

                <?$display = ($valuable_property->location == 1 || !$valuable_property->location) ? "none" : "block"?>

                <div class="col-xl-4 socket" style="padding-left:30px;padding-right:30px;display:<?=$display?>;">
                    <? if($directory['valuable_property_org_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Наименование кредитной организации</h5>
                            <?= $form->field($valuable_property, "[$increment]org_name")->textInput([ 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3 socket" style="padding-left:30px;padding-right:30px;;display:<?=$display?>;">
                    <div class="submit-field" >
                        <h5>Договор</h5>
                        <?= $form->field($uploadForm, "[$increment]valuable_property[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="valuable_property_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name valuable_property_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "valuable_property_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $model->getUploadedFiles("[$increment]valuable_property")->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'valuable_property') ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='valuable_property'?>');" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>
                <div class="col-xl-2 socket" style="padding-left:30px;padding-right:30px;display:<?=$display?>;">
                    <? if($directory['valuable_property_dogovor_number'] == 1):?>
                        <div class="submit-field ">
                            <h5>Номер договора</h5>
                            <?= $form->field($valuable_property, "[$increment]dogovor_number")->textInput([ 'class' => 'with-border '])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3 socket" style="padding-left:30px;padding-right:30px;display:<?=$display?>;">
                    <? if($directory['valuable_property_dogovor_date'] == 1):?>
                        <div class="submit-field ">
                            <h5>Дата договора</h5>
                            <?= $form->field($valuable_property, "[$increment]dogovor_date")->widget(DatePicker::classname(), [
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

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_zalog_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Имя залогодержателя</h5>
                            <?= $form->field($valuable_property, "[$increment]zalog_name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_zalog_type'] == 1):?>
                         <div class="submit-field ">
                            <h5>Залогодержатель</h5>
                            <?= $form->field($valuable_property, "[$increment]zalog_type")->dropDownList(ValuableProperty::$zalog_type,['maxlength' => true, 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_zalog_inn'] == 1):?>
                        <div class="submit-field ">
                            <h5>ИНН залогодержателя</h5>
                            <?= $form->field($valuable_property, "[$increment]zalog_inn")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    <?endif;?>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_active_status'] == 1):?>
                        <div class="submit-field ">
                            <h5>Статус актива В залоге</h5>
                            <?= $form->field($valuable_property, "[$increment]active_status", [
                                'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label>'])->checkbox([], false)?>
                        </div>
                    <?endif;?>
                </div>


                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">

                    <div class="row">
                        <div class="col-xl-12">
                            <? if($directory['valuable_property_zalog_dogovor'] == 1):?>
                                <div class="submit-field ">
                                    <h5>Договор залога или иная сделка</h5>
                                    <?= $form->field($valuable_property, "[$increment]zalog_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                </div>
                            <?endif;?>
                        </div>
                        <div class="col-xl-12" >
                            <? if($directory['valuable_property_zalog_address'] == 1):?>
                                <div class="submit-field ">
                                    <h5>Почтовый адресс залогодержателя</h5>
                                    <?= $form->field($valuable_property, "[$increment]zalog_address")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['valuable_property_other'] == 1):?>
                        <div class="submit-field ">
                            <h5>Примечание</h5>
                            <?= $form->field($valuable_property, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
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


