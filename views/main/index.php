
<?php

use app\models\ClientTicket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfo */
/* @var $passport_model app\models\Passport */
/* @var $inter_passport_model app\models\Passport */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
?>

<div class="dashboard-content-inner" >
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3>Post a Job</h3>

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Dashboard</a></li>
				<li>Post a Job</li>
			</ul>
		</nav>
	</div>
	
	<!-- Row -->
	<div class="row">

		<!-- Dashboard Box -->
		<div class="col-xl-12">
			<div class="dashboard-box margin-top-0">

				<!-- Headline -->
				<div class="headline">
					<h3>
						<i class="icon-feather-folder-plus"></i>
						Заполнение формы
					</h3>
              		<!-- Circles which indicates the steps of the form: -->
              		<div style="text-align:center">
                    	<span class="step"></span>
                    	<span class="step"></span>
                    	<span class="step"></span>
                    	<span class="step"></span>
                  	</div>
				</div>

				<div class="content with-padding padding-bottom-10">
                <?php $form = ActiveForm::begin(); ?>
 

				<div class="tab">
					<input id="creditor-point" hidden value="1">
					<!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->
					
					<a href="#" id="add_creditor" class="button ripple-effect">
						<i class="icon-material-outline-add-circle-outline"></i>Добавить кредитора
					</a>
					<!-- Accordion -->
					<div class="accordion js-accordion" id="creditor-accordion">
								
					</div>
							<!-- Accordion / End -->
                </div>

                <!-- One "tab" for each step in the form: -->
				<div class="tab">
					<div class="row">
						<div class="col-xl-3">
							<div class="submit-field">
								<h4>Имя</h4>
								<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="submit-field">
								<h4>Фамилия</h4>
								<?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="submit-field">
								<h4>Отчество</h4>
								<?= $form->field($model, 'patronymic')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
						</div>

						<div class="col-xl-3">
							<div class="submit-field">
						
								<h4>
									Факсимиле
									<i class="help-icon" data-tippy-placement="top" title="Скан вашей личной подписи."></i>
								</h4>
								<?= $form->field($uploadForm, 'facsimile')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
								
							</div>
						</div>
						

						<div class="col-xl-2">
							<div class="submit-field ">
								<h4>Пол</h4>
								<?= $form->field($model, 'gender')->dropDownList(ClientTicket::$gender,[ 'class' => 'with-border'])->label(false)  ?>
							</div>
						</div>

						<div class="col-xl-3">
							<div class="submit-field">
								<h4>Дата рождения</h4>
								<?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
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

						<div class="col-xl-4">
							<div class="submit-field">
								<h4>Место рождения</h4>
								<?= $form->field($model, 'birth_place')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
						</div>

						<div class="col-xl-3">
							<div class="submit-field">
								<h4>Телефон</h4>
								<?= $form->field($model, 'phone',[
									'enableClientValidation' => false,
								])->widget(MaskedInput::className(), [
									'mask' => '+7 (999) 999-99-99',
									'options' => [
										'class' => 'form-control placeholder-style with-border',
										'id' => 'phone2',
										'placeholder' => ('Телефон')
									],
									'clientOptions' => [
										'greedy' => false,
										'clearIncomplete' => true
									]
								])->label(false) ?>
							</div>
						</div>

						<div class="col-xl-3">
							<div class="submit-field">
								<h4>ИНН</h4>
								<?= $form->field($model, 'inn')->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false) ?>
								
								<?= $form->field($uploadForm, 'inn')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
									
							</div>
						</div>

						<div class="col-xl-3">
							<div class="submit-field">
								<h4>Снилс</h4>
								<?= $form->field($model, 'snils',[
									'enableClientValidation' => false,
									])->widget(MaskedInput::className(), [
										'mask' => '999-999-999 99',
										'options' => [
											'class' => 'form-control placeholder-style with-border',
											'id' => 'snils',
											'placeholder' => ('')
										],
										'clientOptions' => [
											'greedy' => false,
											'clearIncomplete' => true
										]
									])->label(false) ?>
							
								<?= $form->field($uploadForm, 'snils')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
									
							</div>
						</div>

						<div class="col-xl-4">
							<div class="submit-field">
								<h4>
									Прошлое ФИО
									<i class="help-icon" data-tippy-placement="top" title="Если вы меняли ФИО, то заполните поле прошлое ФИО и прикрепите Скан «Свидетельство о перемене имени» <br> Иначе оставьте пустым."></i>
								</h4>
								<?= $form->field($model, 'changed_fio')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							
								<?= $form->field($uploadForm, 'changed_fio')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
									
							</div>
						</div>

					
						<div class="col-xl-2">
							<div class="submit-field">
								<h4>
									ИП
									<i class="help-icon" data-tippy-placement="top" title="Поле выбора «Индивидуальный предприниматель».<br> «Да» Скан выписки о статусе ИП c egrul.ru.<br> «Нет» Скан выписки о статусе физ.лица c gosuslugi.ru. "></i>
								</h4>
								<?= $form->field($model, 'is_ip')->dropDownList(ClientTicket::$is_ip,[ 'class' => 'with-border'])->label(false)  ?>
								
								<?= $form->field($uploadForm, 'is_ip')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
								
							</div>
						</div>

						<div class="col-xl-4">
							<div class="submit-field">
								<h4>Адресс регистрации</h4>
								<?= $form->field($model, 'registr_address')->textInput(['maxlength' => true , 'class' => 'with-border'])->label(false) ?>	
							</div>
						</div>

						<div class="col-xl-4">
							<div class="submit-field">
								<h4>Фактический адресс</h4>
								<?= $form->field($model, 'fact_address')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
						</div>

						<div class="col-xl-4">
							<div class="submit-field">
								<h4>Email</h4>
								<?= $form->field($model, 'mail')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
						</div>

						<div class="col-xl-6 col-md-6">
							<div class="section-headline">
								<h4>Пасспорт</h4>
							</div>
							<!-- Accordion -->
							<div class="accordion js-accordion">
								<!-- Accordion Item -->
								<div class="accordion__item js-accordion-item">
									<div class="accordion-header js-accordion-header">Пасспортные данные</div> 
										<!-- Accordtion Body -->
										<div class="accordion-body js-accordion-body">
											<!-- Accordion Content -->
											<div class="accordion-body__contents">
												<div class="row">

													<div class="col-xl-6">
														<div class="submit-field">
															<h4>Серия</h4>
															<?= $form->field($passport_model, 'series')->textInput(['maxlength' => 4, 'class' => 'with-border'])->label(false) ?>
														</div>
													</div>

													<div class="col-xl-6">
														<div class="submit-field">
															<h4>Номер</h4>
															<?= $form->field($passport_model, 'number')->textInput(['maxlength' => 6, 'class' => 'with-border'])->label(false) ?>
														</div>
													</div>

													<div class="col-xl-12">
														<div class="submit-field">
															<h4>Кем выдан</h4>
															<?= $form->field($passport_model, 'given')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
														</div>
													</div>

													<div class="col-xl-6">
														<div class="submit-field">
															<h4>Дата выдачи</h4>
															<?= $form->field($passport_model, 'date_given')->widget(DatePicker::classname(), [
																'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
																'class' => 'with-border',
																'pluginOptions' => [
																	'autoclose'=>true,
																	'todayHighlight' => true,
																	'format' => 'yyyy-mm-dd'
																]
															])->label(false)?>
														</div>
													</div>

													<div class="col-xl-6">
														<div class="submit-field">
															<h4>Код подразделения</h4>
															<?= $form->field($passport_model, 'code',[
														'enableClientValidation' => false,
															])->widget(MaskedInput::className(), [
																'mask' => '999-999',
																'options' => [
																	'class' => 'form-control placeholder-style with-border',
																	'id' => 'code',
																	'placeholder' => ('')
																],
																'clientOptions' => [
																	'greedy' => false,
																	'clearIncomplete' => true
																]
														])->label(false) ?>
														</div>
													</div>

													<div class="col-xl-12">
														
																<?= $form->field($uploadForm, 'passport')->fileInput(['multiple' => true])->label(false) ?>
															
													
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
								<h4>Загран-пасспорт</h4>
							</div>
							<!-- Accordion -->
							<div class="accordion js-accordion">
								<!-- Accordion Item -->
								<div class="accordion__item js-accordion-item">
									<div class="accordion-header js-accordion-header">Данные загран-пасспорта</div> 
									<!-- Accordtion Body -->
									<div class="accordion-body js-accordion-body">
										<!-- Accordion Content -->
										<div class="accordion-body__contents">

											<div class="row">

												<div class="col-xl-6">
													<div class="submit-field">
														<h4>Серия</h4>
														<?= $form->field($inter_passport_model, 'series')->textInput(['maxlength' => 2, 'class' => 'with-border'])->label(false) ?>
													</div>
												</div>

												<div class="col-xl-6">
													<div class="submit-field">
														<h4>Номер</h4>
														<?= $form->field($inter_passport_model, 'number')->textInput(['maxlength' => 7, 'class' => 'with-border'])->label(false) ?>
													</div>
												</div>

												<div class="col-xl-12">
													<div class="submit-field">
														<h4>Кем выдан</h4>
														<?= $form->field($inter_passport_model, 'given')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
													</div>
												</div>

												<div class="col-xl-6">
													<div class="submit-field">
														<h4>Дата выдачи</h4>
														<?= $form->field($inter_passport_model, 'date_given')->widget(DatePicker::classname(), [
															'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
															'class' => 'with-border',
															'pluginOptions' => [
																'autoclose'=>true,
																'todayHighlight' => true,
																'format' => 'yyyy-mm-dd'
															]
														])->label(false)?>
													</div>
												</div>

												<div class="col-xl-6">
													<div class="submit-field">
														<h4>Действителен до</h4>
														<?= $form->field($inter_passport_model, 'period')->widget(DatePicker::classname(), [
															'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
															'class' => 'with-border',
															'pluginOptions' => [
																'autoclose'=>true,
																'todayHighlight' => true,
																'format' => 'yyyy-mm-dd'
															]
														])->label(false)?>
													</div>
												</div>

												<div class="col-xl-12">
												
															<?= $form->field($uploadForm, 'inter_passport')->fileInput(['multiple' => true, 'id' => 'upload_inter_passport', 'class' => "uploadButton-input"])->label(false) ?>
												
												</div>
											</div>
										</div>
									</div>
									<!-- Accordion Body / End -->
								</div>
								<!-- Accordion Item / End -->
							</div>
							<!-- Accordion / End -->
						</div>
					</div>
				</div>

				

                  <div class="tab">Birthday:
                    <p><input placeholder="dd" oninput="this.className = ''"></p>
                    <p><input placeholder="mm" oninput="this.className = ''"></p>
                    <p><input placeholder="yyyy" oninput="this.className = ''"></p>
                  </div>

                  <div class="tab">Login Info:
                    <p><input placeholder="Username..." oninput="this.className = ''"></p>
                    <p><input placeholder="Password..." oninput="this.className = ''"></p>
                  </div>

		
				<div class="row" style="margin-top:30px;">
					<div class="center-block">	
						<div class="row" >										
							<a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
							<a href="#" class="button ripple-effect" id="nextBtn" onclick="nextPrev(1)"><span class="icon-material-outline-keyboard-arrow-right"></span></a>
						</div>	
					</div>										
				</div>

				  <div class="form-group">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>

                  <?php ActiveForm::end(); ?>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<a href="#" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a Job</a>
					
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					© 2018 <strong>Hireo</strong>. All Rights Reserved.
				</div>
				<ul class="footer-social-links">
					<li>
						<a href="#" title="Facebook" data-tippy-placement="top">
							<i class="icon-brand-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="#" title="Twitter" data-tippy-placement="top">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#" title="Google Plus" data-tippy-placement="top">
							<i class="icon-brand-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a href="#" title="LinkedIn" data-tippy-placement="top">
							<i class="icon-brand-linkedin-in"></i>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- Footer / End -->

		</div>