<?php
use app\models\ClientTicket;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfo */
/* @var $passport_model app\models\Passport */
/* @var $inter_passport_model app\models\Passport */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
/* @var $directory app\models\Directory */


?>
<div class="row" id="client_main_info">
						<div class="col-xl-3">
                            <? if($directory['name'] == 1):?>
							<div class="submit-field">
								<h4>Имя</h4>
								<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>
						<div class="col-xl-3">
                            <? if($directory['surname'] == 1):?>
							<div class="submit-field">
								<h4>Фамилия</h4>
								<?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>
						<div class="col-xl-3">
                            <? if($directory['patronymic'] == 1):?>
							<div class="submit-field">
								<h4>Отчество</h4>
								<?= $form->field($model, 'patronymic')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['facsimile'] == 1):?>
							<div class="submit-field">
								<h4>
									Факсимиле
									<i class="help-icon" data-tippy-placement="top" title="Скан вашей личной подписи."></i>
								</h4>
								<?= $form->field($uploadForm, 'facsimile')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>

							</div>
                            <?endif;?>
						</div>


						<div class="col-xl-2">
                            <? if($directory['gender'] == 1):?>
							<div class="submit-field ">
								<h4>Пол</h4>
								<?= $form->field($model, 'gender')->dropDownList(ClientTicket::$gender,[ 'class' => 'with-border'])->label(false)  ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['birthday'] == 1):?>
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
                            <?endif;?>
						</div>

						<div class="col-xl-4">
                            <? if($directory['birth_place'] == 1):?>
							<div class="submit-field">
								<h4>Место рождения</h4>
								<?= $form->field($model, 'birth_place')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['phone'] == 1):?>
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
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['inn'] == 1):?>
							<div class="submit-field">
								<h4>ИНН</h4>
								<?= $form->field($model, 'inn')->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false) ?>

								<?= $form->field($uploadForm, 'inn')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>

							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['snils'] == 1):?>
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
                            <?endif;?>
						</div>

						<div class="col-xl-4">
                            <? if($directory['changed_fio'] == 1):?>
							<div class="submit-field">
								<h4>
									Прошлое ФИО
									<i class="help-icon" data-tippy-placement="top" title="Если вы меняли ФИО, то заполните поле прошлое ФИО и прикрепите Скан «Свидетельство о перемене имени» <br> Иначе оставьте пустым."></i>
								</h4>
								<?= $form->field($model, 'changed_fio')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>

								<?= $form->field($uploadForm, 'changed_fio')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>

							</div>
                            <?endif;?>
						</div>


						<div class="col-xl-2">
                            <? if($directory['is_ip'] == 1):?>
							<div class="submit-field">
								<h4>
									ИП
									<i class="help-icon" data-tippy-placement="top" title="Поле выбора «Индивидуальный предприниматель».<br> «Да» Скан выписки о статусе ИП c egrul.ru.<br> «Нет» Скан выписки о статусе физ.лица c gosuslugi.ru. "></i>
								</h4>
								<?= $form->field($model, 'is_ip')->dropDownList(ClientTicket::$is_ip,[ 'class' => 'with-border'])->label(false)  ?>

								<?= $form->field($uploadForm, 'is_ip')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>

							</div>
                            <?endif;?>
						</div>

    <div class="col-xl-12" >
        <h4>Местонахождение: </h4>
        <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
            <div class="row">
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Регион</h4>
                        <?= $form->field($model , "region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>


                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Район</h4>
                        <?= $form->field($model, "district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Город</h4>
                        <?= $form->field($model, "city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Населенный пункт</h4>
                        <?= $form->field($model, "selo")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Улица</h4>
                        <?= $form->field($model, "street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Дом</h4>
                        <?= $form->field($model, "house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Корпус</h4>
                        <?= $form->field($model, "corpuse")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Квартира</h4>
                        <?= $form->field($model, "flat")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Почт. индекс</h4>
                        <?= $form->field($model, "index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

						<div class="col-xl-7">
                            <? if($directory['fact_address'] == 1):?>
							<div class="submit-field">
								<h4>Фактический адресс</h4>
								<?= $form->field($model, 'fact_address')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-4">
                            <? if($directory['mail'] == 1):?>
							<div class="submit-field">
								<h4>Email</h4>
								<?= $form->field($model, 'mail')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h4>Скан трудовой книжки</h4>
                                <?= $form->field($uploadForm, 'trud_book')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h4>Статус безработного</h4>
                                <?= $form->field($model, 'is_ip')->dropDownList(ClientTicket::$is_work,[ 'class' => 'with-border'])->label(false)  ?>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <?= $form->field($uploadForm, 'is_work')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
                            </div>
                        </div>

						<div class="col-xl-6 col-md-6">
                            <? if($directory['passport_id'] == 1):?>
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
                            <?endif;?>
						</div>

						<div class="col-xl-6 col-md-6">
                            <? if($directory['inter_passsport_id'] == 1):?>
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
                            <?endif;?>
						</div>
					</div>
