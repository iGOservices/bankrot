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
            <?= $form->field($valuable_property,"[$increment]id")->hiddenInput([])->label(false); ?>
			<div class="row">
                <?if($directory[151]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Вид имущества <?=$directory[151]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[151]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]property_type")->dropDownList(ValuableProperty::$property_type,[ 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[152]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Наименование <?=$directory[152]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[152]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[153]['active'] == 1):?>
                    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Сумма руб. <?=$directory[153]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[153]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]cost")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[154]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Место нахождения или хранения <?=$directory[154]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[154]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]location")->dropDownList(ValuableProperty::$location, [ 'class' => 'with-border select_list','onchange' => 'changeSocketView('.$increment.');'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>


                <div class="col-xl-12" >
                    <h5>Местонахождение хранения: </h5>
                    <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
                        <div class="row">

                            <?if($directory[155]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Страна <?=$directory[155]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[155]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[156]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Субьект федерации <?=$directory[156]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[156]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[157]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Район <?=$directory[157]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[157]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[158]['active'] == 1):?>
                                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Город <?=$directory[158]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[158]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[159]['active'] == 1):?>
                                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Улица <?=$directory[159]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[159]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[160]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Дом <?=$directory[160]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[160]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[161]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Корпус <?=$directory[161]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[161]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[162]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Офис <?=$directory[162]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[162]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]office")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>
                            <?if($directory[163]['active'] == 1):?>
                                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Почтовый индекс <?=$directory[163]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[163]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($valuable_property, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                </div>
                            <?endif;?>

                        </div>
                    </div>
                </div>

                <?$display = ($valuable_property->location == 1 || !$valuable_property->location) ? "none" : "block"?>

                <?if($directory[164]['active'] == 1):?>
                    <div class="col-xl-4 socket" style="padding-left:30px;padding-right:30px;display:<?=$display?>;">
                        <div class="submit-field ">
                            <h5>Наименование кредитной организации <?=$directory[164]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[164]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]org_name")->textInput([ 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <div class="col-xl-3 socket" style="padding-left:30px;padding-right:30px;;display:<?=$display?>;">
                    <div class="submit-field" >
                        <h5>Договор </h5>
                        <?= $form->field($uploadForm, "[$increment]valuable_property[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="valuable_property_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name valuable_property_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "valuable_property_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $valuable_property->getValuablePropertyFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'valuable_property',$valuable_property->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='valuable_property'?>'<?=$valuable_property->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <?if($directory[165]['active'] == 1):?>
                    <div class="col-xl-2 socket" style="padding-left:30px;padding-right:30px;display:<?=$display?>;">
                        <div class="submit-field ">
                            <h5>Номер договора <?=$directory[165]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[165]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]dogovor_number")->textInput([ 'class' => 'with-border '])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[166]['active'] == 1):?>
                    <div class="col-xl-3 socket" style="padding-left:30px;padding-right:30px;display:<?=$display?>;">
                            <div class="submit-field ">
                                <h5>Дата договора <?=$directory[166]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[166]['prompt']."\"></i>" : "" ?></h5>
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
                    </div>
                <?endif;?>
                <?if($directory[168]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Имя залогодержателя <?=$directory[168]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[168]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]zalog_name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[169]['active'] == 1):?>
                    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                         <div class="submit-field ">
                            <h5>Залогодержатель <?=$directory[169]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[169]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]zalog_type")->dropDownList(ValuableProperty::$zalog_type,['maxlength' => true, 'class' => 'with-border select_list'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[170]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>ИНН залогодержателя <?=$directory[170]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[170]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]zalog_inn")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                        </div>
                    </div>
                <?endif;?>
                <?if($directory[167]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Статус актива В залоге <?=$directory[167]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[167]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]active_status", [
                                'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label>'])->checkbox([], false)?>
                        </div>
                    </div>
                <?endif;?>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">

                    <div class="row">

                        <?if($directory[172]['active'] == 1):?>
                            <div class="col-xl-12">
                                <div class="submit-field ">
                                    <h5>Договор залога или иная сделка <?=$directory[172]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[172]['prompt']."\"></i>" : "" ?></h5>
                                    <?= $form->field($valuable_property, "[$increment]zalog_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                </div>
                            </div>
                        <?endif;?>
                        <?if($directory[171]['active'] == 1):?>
                            <div class="col-xl-12" >
                                <div class="submit-field ">
                                    <h5>Почтовый адресс залогодержателя <?=$directory[171]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[171]['prompt']."\"></i>" : "" ?></h5>
                                    <?= $form->field($valuable_property, "[$increment]zalog_address")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                </div>
                            </div>
                        <?endif;?>
                    </div>
                </div>

                <?if($directory[173]['active'] == 1):?>
                    <div class="col-xl-8" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Примечание <?=$directory[173]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[173]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($valuable_property, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
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


