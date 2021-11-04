<?php

use app\models\Debitor;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $debitor app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory *
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */

?>
<!-- Accordion Item -->
<div id="<?="debitor-".$increment?>">
    <p class="delete_item" onclick='deleteItem(<?=$increment?>,"debitor",<?=isset($debitor->id) ? $debitor->id : null?>);'><span class="icon-feather-trash-2" ></span> Удалить данные</p>

    <div class="accordion__item js-accordion-item">
	<div class="accordion-header js-accordion-header">Данные по дебитору №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <? if($directory[72]['active'] == 1):?>
				    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Группа задолженности <?=$directory[72]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[72]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]group")->dropDownList(Debitor::$group,[ 'class' => 'with-border select_list' ,'onchange' => 'changeDebitorStatment('.$increment.');'])->label(false)  ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[73]['active'] == 1):?>
				    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <?if($debitor->group == 1 || !$debitor->group):?>
                        <div class="submit-field ">
                            <h5>Содержание обязательства <?=$directory[73]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[73]['prompt']."\"></i>" : "" ?></h5>
                            <div id="debitor<?=$increment?>">
                                <?= $form->field($debitor, "[$increment]commitment")->dropDownList(Debitor::$commitment,[ 'class' => 'with-border select_list'])->label(false)  ?>
                            </div>
                        </div>
                        <?else:?>
                        <div class="submit-field ">
                            <h5>Содержание обязательства <?=$directory[73]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[73]['prompt']."\"></i>" : "" ?></h5>
                            <div id="creditor<?=$increment?>">
                                <?= $form->field($debitor, "[$increment]commitment")->textInput([ 'class' => 'with-border'])->label(false)  ?>
                            </div>
                        </div>
                        <?endif;?>
				    </div>
                <?endif;?>
                <? if($directory[75]['active'] == 1):?>
				    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Физ лицо/орг. <?=$directory[75]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[75]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]statment")->dropDownList(Debitor::$statment,[ 'class' => 'with-border select_list'])->label(false)  ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[74]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Обязательство возникло в результате предпринимательской деятельсноти <?=$directory[74]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[74]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]is_predprin", [
                                'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label>'])->checkbox([], false)?>
                        </div>
                    </div>
                <?endif;?>
                <? if($directory[76]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Наименование дебитора <?=$directory[76]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[76]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[77]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>ИНН дебитора <?=$directory[77]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[77]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]inn")->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[90]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Тип подтверждающего документа <?=$directory[90]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[90]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]base")->dropDownList(Debitor::$base,[ 'class' => 'with-border select_list'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>

				<div class="col-xl-12" >
				<h5>Место нахождения дебитора: </h5>
					<div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
						<div class="row">
                            <? if($directory[78]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Страна <?=$directory[78]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[78]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[79]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Регион <?=$directory[79]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[79]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[80]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Район <?=$directory[80]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[80]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[81]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Город <?=$directory[81]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[81]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[82]['active'] == 1):?>
							    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Улица <?=$directory[82]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[82]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[83]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Дом <?=$directory[83]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[83]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[84]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Корпус <?=$directory[84]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[84]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[85]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Квартира <?=$directory[85]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[85]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]flat")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <? if($directory[86]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Почтовый индекс <?=$directory[86]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[86]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($debitor, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
						</div>
					</div>
				</div>
                <? if($directory[87]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Сумма обязательства Всего(руб.) <?=$directory[87]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[87]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]sum_statment")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[88]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Сумма обязательства Задолженность(руб.) <?=$directory[88]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[88]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]sum_dolg")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[89]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Штрафы,пени,иные санкции (руб.) <?=$directory[89]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[89]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]forfeit")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[91]['active'] == 1):?>
				    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field">
                            <h5>Дата документа <?=$directory[91]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[91]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]base_date")->widget(DatePicker::classname(), [
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
                <? if($directory[92]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номер документа <?=$directory[92]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[92]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]base_num")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
                <div class="col-xl-4">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан документа</h5>
                        <?= $form->field($uploadForm, "[$increment]debitor[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="debitor_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name debitor_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "debitor_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>
                        <? if(isset($model) && $files = $debitor->getDebitorFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'debitor',$debitor->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='debitor'?>',<?=$debitor->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>
                <?= $form->field($debitor,"[$increment]id")->hiddenInput([])->label(false); ?>

                <? if($directory[93]['active'] == 1):?>
                    <div class="col-xl-12">
                        <div class="submit-field" >
                            <h5>Примечание <?=$directory[93]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[93]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($debitor, "[$increment]other")->textArea(['maxlength' => true])->label(false); ?>
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


