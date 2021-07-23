<?php

use app\models\Debitor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $debitor app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */

?>
<!-- Accordion Item -->
<div id="<?="debitor-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"debitor");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по дебитору №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Группа задолженности</h4>
						<?= $form->field($debitor, "[$increment]group")->dropDownList(Debitor::$group,[ 'class' => 'with-border '])->label(false)  ?>
					</div>
				</div>

				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Содержание обязательства</h4>
						<?= $form->field($debitor, "[$increment]commitment")->dropDownList(Debitor::$group,[ 'class' => 'with-border'])->label(false)  ?>
					</div>
				</div>

				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Физ лицо/орг.</h4>
						<?= $form->field($debitor, "[$increment]statment")->dropDownList(Debitor::$statment,[ 'class' => 'with-border'])->label(false)  ?>
					</div>
				</div>

				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
				<!--<div class="checkbox">
					<input type="checkbox" id="chekcbox1" checked="">
					<label for="chekcbox1"><span class="checkbox-icon"></span> Checkbox</label>
				</div>-->
					<?= $form->field($debitor, "[$increment]is_predprin")->checkbox() ?>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Наименование дебитора</h4>
						<?= $form->field($debitor, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
					</div>
				</div>
				
				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Инн</h4>
						<?= $form->field($debitor, "[$increment]inn")->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false); ?>
					</div>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Основание задолженности</h4>
						<?= $form->field($debitor, "[$increment]base")->dropDownList(Debitor::$base,[ 'class' => 'with-border'])->label(false); ?>
					</div>
				</div>

			
				<div class="col-xl-12" >
				<h4>Местонахождение: </h4>
					<div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
						<div class="row">
							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Страна</h4>
									<?= $form->field($debitor, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>		

							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Регион</h4>
									<?= $form->field($debitor, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>

							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Район</h4>
									<?= $form->field($debitor, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>

							<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Город</h4>
									<?= $form->field($debitor, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>

							<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Улица</h4>
									<?= $form->field($debitor, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Дом</h4>
									<?= $form->field($debitor, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Корпус</h4>
									<?= $form->field($debitor, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Квартира</h4>
									<?= $form->field($debitor, "[$increment]flat")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>

							<div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
								<div class="submit-field ">
									<h4>Почтовый индекс</h4>
									<?= $form->field($debitor, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Сумма обязательства Всего(руб.)</h4>
						<?= $form->field($debitor, "[$increment]sum_statment")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
					</div>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Сумма обязательства Задолженность(руб.)</h4>
						<?= $form->field($debitor, "[$increment]sum_dolg")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
					</div>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Штрафы,пени,иные санкции (руб.)</h4>
						<?= $form->field($debitor, "[$increment]forfeit")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
					</div>
				</div>
		
				<div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field">
						<h4>Дата документа</h4>
						<?= $form->field($debitor, "[$increment]base_date")->widget(DatePicker::classname(), [
									'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
									'class' => 'with-border',
									'pluginOptions' => [
										'autoclose'=>true,
										'todayHighlight' => true,
										'format' => 'yyyy-mm-dd'
									]
						])->label(false) ?>
					</div>
				</div>

				<div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
					<div class="submit-field ">
						<h4>Номер документа</h4>
						<?= $form->field($debitor, "[$increment]base_num")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
					</div>
				</div>

				<div class="col-xl-4">									
					<?= $form->field($uploadForm, "[$increment]debitor")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
				</div>

				<div class="col-xl-12">	
					<h4>Примечание</h4>								
					<?= $form->field($debitor, "[$increment]other")->textArea(['maxlength' => true])->label(false); ?>
				</div>
				

			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


