<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $creditor app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $directory app\models\Directory */
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="creditor-".$increment?>">
<div class="del_icon">
    <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"creditor",<?=isset($creditor->id) ? $creditor->id : null?>);'></span>
</div>
<div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">
        Данные по кредитору №<?=$increment+1?>
	</div>

	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <? if($directory[50]['active'] == 1):?>
				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Группа задолженности  <?=$directory[50]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[50]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]group")->dropDownList(Creditor::$group,[ 'class' => 'with-border select_list ','onchange' => 'changeCreditorStatment('.$increment.');'])->label(false)  ?>
                        </div>
				</div>
                <?endif;?>

                <? if($directory[51]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <?if($creditor->group == 1 || !$creditor->group):?>
                                <div class="submit-field ">
                                    <h5>Содержание обязательства  <?=$directory[51]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[51]['prompt']."\"></i>" : "" ?></h5>
                                    <div id="creditor<?=$increment?>">
                                        <?= $form->field($creditor, "[$increment]commitment")->dropDownList(Creditor::$commitment,[ 'class' => 'with-border select_list'])->label(false)  ?>
                                    </div>
                                </div>
                        <? elseif($creditor->group == 2):?>
                                <div class="submit-field ">
                                    <h5>Содержание обязательства  <?=$directory[51]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[51]['prompt']."\"></i>" : "" ?></h5>
                                    <div id="creditor<?=$increment?>">
                                        <?= $form->field($creditor, "[$increment]commitment")->dropDownList(Creditor::$commitment_ob,[ 'class' => 'with-border select_list'])->label(false)  ?>
                                    </div>
                                </div>
                        <?else:?>
                            <div class="submit-field ">
                                <h5>Содержание обязательства  <?=$directory[51]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[51]['prompt']."\"></i>" : "" ?></h5>
                                <div id="creditor<?=$increment?>">
                                    <?= $form->field($creditor, "[$increment]commitment")->textInput([ 'class' => 'with-border'])->label(false)  ?>
                                </div>
                            </div>
                        <?endif;?>
                    </div>
                <?endif;?>
                <? if($directory[53]['active'] == 1):?>
				    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Физ лицо/орг.  <?=$directory[53]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[53]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]statment")->dropDownList(Creditor::$statment,[ 'class' => 'with-border select_list'])->label(false)  ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[52]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Обязательство возникло в результате предпринимательской деятельсноти  <?=$directory[52]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[52]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]is_predprin", [
                                'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label>'])->checkbox([], false)?>
                        </div>
                    </div>
                <?endif;?>
                <? if($directory[54]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Наименование кредитора <?=$directory[54]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[54]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
                <? if($directory[55]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>ИНН кредитора <?=$directory[55]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[55]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]inn")->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false); ?>
                        </div>

				    </div>
                <?endif;?>
                <? if($directory[68]['active'] == 1):?>
				    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Основание задолженности <?=$directory[68]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[68]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]base")->dropDownList(Creditor::$base,[ 'class' => 'with-border select_list'])->label(false); ?>
                        </div>
				    </div>
                <?endif;?>
			
				<div class="col-xl-12" >
				<h5>Место нахождения кредитора: </h5>
					<div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
						<div class="row">
                            <?if($directory[56]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Страна <?=$directory[56]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[56]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[57]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Регион <?=$directory[57]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[57]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[58]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Район <?=$directory[58]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[58]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[59]['active'] == 1):?>
							    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Город <?=$directory[59]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[59]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[60]['active'] == 1):?>
							    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Улица <?=$directory[60]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[60]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[61]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Дом <?=$directory[61]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[61]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[62]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Корпус <?=$directory[62]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[62]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[63]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Квартира <?=$directory[63]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[63]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]flat")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
                            <?if($directory[64]['active'] == 1):?>
							    <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                    <div class="submit-field ">
                                        <h5>Почтовый индекс <?=$directory[64]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[64]['prompt']."\"></i>" : "" ?></h5>
                                        <?= $form->field($creditor, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
							    </div>
                            <?endif;?>
						</div>
					</div>
				</div>

                <?$display = ($creditor->group == 1 || $creditor->group == 2 || !$creditor->group) ?  "block" : "none"?>
                    <?if($directory[65]['active'] == 1):?>
                        <div class="col-xl-4 pay_block" style="padding-left:30px;padding-right:30px;display: <?=$display?> " >
                            <div class="submit-field ">
                                <h5>Сумма обязательства Всего(руб.) <?=$directory[65]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[65]['prompt']."\"></i>" : "" ?></h5>
                                <?= $form->field($creditor, "[$increment]sum_statment")->textInput(['maxlength' => true, 'class' => 'with-border check_sum'])->label(false); ?>
                            </div>
                        </div>
                    <? endif; ?>
                    <?if($directory[66]['active'] == 1):?>
                        <div class="col-xl-4 pay_block" style="padding-left:30px;padding-right:30px;display: <?=$display?>" >
                            <div class="submit-field ">
                                <h5>Сумма обязательства Задолженность(руб.) <?=$directory[66]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[66]['prompt']."\"></i>" : "" ?></h5>
                                <?= $form->field($creditor, "[$increment]sum_dolg")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                            </div>
                        </div>
                    <? endif; ?>
                    <?if($directory[67]['active'] == 1):?>
                        <div class="col-xl-4 pay_block" style="padding-left:30px;padding-right:30px;display: <?=$display?>">
                            <div class="submit-field ">
                                <h5>Штрафы,пени,иные санкции (руб.) <?=$directory[67]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[67]['prompt']."\"></i>" : "" ?></h5>
                                <?= $form->field($creditor, "[$increment]forfeit")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                            </div>
                        </div>
                    <? endif; ?>


                <?if($directory[69]['active'] == 1):?>
                    <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field">
                            <h5>Дата документа <?=$directory[69]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[69]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]base_date")->widget(DatePicker::classname(), [
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
                <? endif; ?>
                <?if($directory[70]['active'] == 1):?>
                    <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                        <div class="submit-field ">
                            <h5>Номер документа <?=$directory[70]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[70]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]base_num")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>

                    </div>
                <? endif; ?>
                <div class="col-xl-4">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h5>Скан документа</h5>
                        <?= $form->field($uploadForm, "[$increment]creditor[]", [
                            'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="creditor_upload'.$increment.'">Загрузить файл</label>
											<span class="uploadButton-file-name creditor_upload'.$increment.'">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => "creditor_upload{$increment}", 'class' => 'uploadButton-input'], false)->label(false)?>

                        <? if(isset($model) && $files = $creditor->getCreditorFiles()->all()): ?>
                            <ul style="list-style: none;">
                                <span>Загруженные файлы</span>
                                <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'creditor',$creditor->ticket_id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='creditor'?>'<?=$creditor->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>

                <?= $form->field($creditor,"[$increment]id")->hiddenInput([])->label(false); ?>

                <?if($directory[71]['active'] == 1):?>
				<div class="col-xl-12">
                    <div class="submit-field" style="padding-right:30px;">
                            <h5>Примечание <?=$directory[71]['prompt_active'] == 1 ? "<i style=\"margin-top: -10px;\"class=\"help-icon\" data-tippy-placement=\"top\" title=\"".$directory[71]['prompt']."\"></i>" : "" ?></h5>
                            <?= $form->field($creditor, "[$increment]other")->textArea(['maxlength' => true])->label(false); ?>

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

