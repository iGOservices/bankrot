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
                <?= $form->field($creditor,"[$increment]id")->hiddenInput([])->label(false); ?>
				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['creditor_group'] == 1):?>
                        <div class="submit-field ">
                            <h5>Группа задолженности</h5>
                            <?= $form->field($creditor, "[$increment]group")->dropDownList(Creditor::$group,[ 'class' => 'with-border select_list ','onchange' => 'changeCreditorStatment('.$increment.');'])->label(false)  ?>
                        </div>
                    <?endif;?>
				</div>


				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <?if($creditor->group == 1 || !$creditor->group):?>
                        <? if($directory['creditor_commitment'] == 1):?>
                            <div class="submit-field ">
                                <h5>Содержание обязательства</h5>
                                <div id="creditor<?=$increment?>">
                                    <?= $form->field($creditor, "[$increment]commitment")->dropDownList(Creditor::$commitment,[ 'class' => 'with-border select_list'])->label(false)  ?>
                                </div>
                            </div>
                        <?endif;?>
                    <? elseif($creditor->group == 2):?>
                        <? if($directory['creditor_commitment'] == 1):?>
                            <div class="submit-field ">
                                <h5>Содержание обязательства</h5>
                                <div id="creditor<?=$increment?>">
                                    <?= $form->field($creditor, "[$increment]commitment")->dropDownList(Creditor::$commitment_ob,[ 'class' => 'with-border select_list'])->label(false)  ?>
                                </div>
                            </div>
                        <?endif;?>
                    <?else:?>
                        <div class="submit-field ">
                            <h5>Содержание обязательства</h5>
                            <div id="creditor<?=$increment?>">
                                <?= $form->field($creditor, "[$increment]commitment")->textInput([ 'class' => 'with-border'])->label(false)  ?>
                            </div>
                        </div>
                    <?endif;?>
				</div>

				<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['creditor_statment'] == 1):?>
                        <div class="submit-field ">
                            <h5>Физ лицо/орг.</h5>
                            <?= $form->field($creditor, "[$increment]statment")->dropDownList(Creditor::$statment,[ 'class' => 'with-border select_list'])->label(false)  ?>
                        </div>
                    <?endif;?>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
				<!--<div class="checkbox">
					<input type="checkbox" id="chekcbox1" checked="">
					<label for="chekcbox1"><span class="checkbox-icon"></span> Checkbox</label>
				</div>-->
                    <? if($directory['creditor_is_predprin'] == 1):?>
                    <div class="submit-field ">
                        <h5>Обязательство возникло в результате предпринимательской деятельсноти</h5>
                        <?= $form->field($creditor, "[$increment]is_predprin", [
                            'template' => '<label class="switch" style="padding-bottom: 30px">{input}<span class="switch-button"></span></label>'])->checkbox([], false)?>
                    </div>
                    <?endif;?>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['creditor_name'] == 1):?>
                        <div class="submit-field ">
                            <h5>Наименование кредитора</h5>
                            <?= $form->field($creditor, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false); ?>
                        </div>
                    <?endif;?>
				</div>
				
				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['creditor_inn'] == 1):?>
                        <div class="submit-field ">
                            <h5>ИНН кредитора</h5>
                            <?= $form->field($creditor, "[$increment]inn")->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false); ?>
                        </div>
                    <?endif;?>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['creditor_base'] == 1):?>
                        <div class="submit-field ">
                            <h5>Основание задолженности</h5>
                            <?= $form->field($creditor, "[$increment]base")->dropDownList(Creditor::$base,[ 'class' => 'with-border select_list'])->label(false); ?>
                        </div>
                    <?endif;?>
				</div>

			
				<div class="col-xl-12" >
				<h5>Место нахождения кредитора: </h5>
					<div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
						<div class="row">
							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_coutry'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Страна</h5>
                                        <?= $form->field($creditor, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>		

							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_region'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Регион</h5>
                                        <?= $form->field($creditor, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>

							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_district'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Район</h5>
                                        <?= $form->field($creditor, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>

							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_city'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Город</h5>
                                        <?= $form->field($creditor, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>

							<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_street'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Улица</h5>
                                        <?= $form->field($creditor, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_house'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Дом</h5>
                                        <?= $form->field($creditor, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_corpus'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Корпус</h5>
                                        <?= $form->field($creditor, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_flat'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Квартира</h5>
                                        <?= $form->field($creditor, "[$increment]flat")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <? if($directory['creditor_post_index'] == 1):?>
                                    <div class="submit-field ">
                                        <h5>Почтовый индекс</h5>
                                        <?= $form->field($creditor, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                    </div>
                                <?endif;?>
							</div>
						</div>
					</div>
				</div>

                <?$display = ($creditor->group == 1 || $creditor->group == 2 || !$creditor->group) ?  "block" : "none"?>
                    <div class="col-xl-4 pay_block" style="padding-left:30px;padding-right:30px;display: <?=$display?> " >
                        <? if($directory['creditor_sum_statment'] == 1):?>
                        <div class="submit-field ">
                            <h5>Сумма обязательства Всего(руб.)</h5>
                            <?= $form->field($creditor, "[$increment]sum_statment")->textInput(['maxlength' => true, 'class' => 'with-border check_sum'])->label(false); ?>
                        </div>
                        <? endif; ?>
                    </div>

                    <div class="col-xl-4 pay_block" style="padding-left:30px;padding-right:30px;display: <?=$display?>" >
                        <? if($directory['creditor_sum_dolg'] == 1):?>
                        <div class="submit-field ">
                            <h5>Сумма обязательства Задолженность(руб.)</h5>
                            <?= $form->field($creditor, "[$increment]sum_dolg")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
                        <? endif; ?>
                    </div>

                    <div class="col-xl-4 pay_block" style="padding-left:30px;padding-right:30px;display: <?=$display?>">
                        <? if($directory['creditor_forfeit'] == 1):?>
                        <div class="submit-field ">
                            <h5>Штрафы,пени,иные санкции (руб.)</h5>
                            <?= $form->field($creditor, "[$increment]forfeit")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                        </div>
                        <? endif; ?>
                    </div>


		
				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['creditor_base_date'] == 1):?>
					<div class="submit-field">
						<h5>Дата документа</h5>
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
                    <? endif; ?>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <? if($directory['creditor_base_num'] == 1):?>
					<div class="submit-field ">
						<h5>Номер документа</h5>
						<?= $form->field($creditor, "[$increment]base_num")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
					</div>
                    <? endif; ?>
				</div>

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


				<div class="col-xl-12">
                    <div class="submit-field" style="padding-right:30px;">
                        <? if($directory['creditor_other'] == 1):?>
                            <h5>Примечание</h5>
                            <?= $form->field($creditor, "[$increment]other")->textArea(['maxlength' => true])->label(false); ?>
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

