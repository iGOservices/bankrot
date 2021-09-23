<?php
use app\models\ClientTicket;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTicket */
/* @var $passport_model app\models\Passport */
/* @var $inter_passport_model app\models\Passport */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
/* @var $directory app\models\Directory */


?>
<?php $form = ActiveForm::begin([
        'id' => 'main',
        'action' => '/main/save-model',
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'options' => ['enctype' => 'multipart/form-data']
]); ?>
<div class="row" id="client_main_info">
						<div class="col-xl-3">
                            <? if($directory['name'] == 1):?>
                                <div class="submit-field">
                                    <h5>Имя</h5>
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                </div>
                            <?endif;?>
						</div>
						<div class="col-xl-3">
                            <? if($directory['surname'] == 1):?>
							<div class="submit-field">
								<h5>Фамилия</h5>
								<?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>
						<div class="col-xl-3">
                            <? if($directory['patronymic'] == 1):?>
							<div class="submit-field">
								<h5>Отчество</h5>
								<?= $form->field($model, 'patronymic')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['facsimile'] == 1):?>
							<div class="submit-field">
                                <h5 >Факсимиле<i style="margin-top: -10px;"class="help-icon" data-tippy-placement="top" title="Скан вашей личной подписи."></i></h5>

                                    <?= $form->field($uploadForm, "facsimile", [
                                        'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="facsimile_upload">Загрузить файл</label>
											<span class="uploadButton-file-name facsimile_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => false, 'id' => 'facsimile_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                <? if($files = $model->facsimileFile): ?>
                                <ul style="list-style: none;">
                                    <span>Загруженные файлы</span>
                                    <?foreach ($files as $file):?>
                                    <li id="<?=$file->id?>">
                                        <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                        </a>
                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                    </li>
                                    <?endforeach;?>
                                </ul>
                                <? endif; ?>
							</div>
                            <?endif;?>
						</div>


						<div class="col-xl-2">
                            <? if($directory['gender'] == 1):?>
							<div class="submit-field ">
								<h5>Пол</h5>
								<?= $form->field($model, 'gender')->dropDownList(ClientTicket::$gender,[ 'class' => 'with-border select_list', ])->label(false)  ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['birthday'] == 1):?>
							<div class="submit-field">
								<h5>Дата рождения</h5>
								<?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
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

						<div class="col-xl-4">
                            <? if($directory['birth_place'] == 1):?>
							<div class="submit-field">
								<h5>Место рождения</h5>
								<?= $form->field($model, 'birth_place')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['phone'] == 1):?>
							<div class="submit-field">
								<h5>Телефон</h5>
								<?= $form->field($model, 'phone',[
									'enableClientValidation' => false,
								])->widget(MaskedInput::className(), [
									'mask' => $model->phone ? '+9 (999) 999-99-99' : '+7 (999) 999-99-99',
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
								<h5>ИНН</h5>
								<?= $form->field($model, 'inn')->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false) ?>

                                <?= $form->field($uploadForm, "inn[]", [
                                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="inn_upload">Загрузить файл</label>
											<span class="uploadButton-file-name inn_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => 'inn_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                <? if($files = $model->innFile): ?>
                                    <ul style="list-style: none;">
                                        <span>Загруженные файлы</span>
                                        <?foreach ($files as $file):?>
                                            <li id="<?=$file->id?>">
                                                <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                </a>
                                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                                <? endif; ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['snils'] == 1):?>
							<div class="submit-field">
								<h5>Снилс</h5>
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

                                <?= $form->field($uploadForm, "snils[]", [
                                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="snils_upload">Загрузить файл</label>
											<span class="uploadButton-file-name snils_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => 'snils_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                <? if($files = $model->snilsFile): ?>
                                    <ul style="list-style: none;">
                                        <span>Загруженные файлы</span>
                                        <?foreach ($files as $file):?>
                                            <li id="<?=$file->id?>">
                                                <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                </a>
                                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                                <? endif; ?>

							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-3">
                            <? if($directory['changed_fio'] == 1):?>
							<div class="submit-field">
								<h5>
									Прошлое ФИО
									<i class="help-icon" data-tippy-placement="top" title="Если вы меняли ФИО, то заполните поле прошлое ФИО и прикрепите Скан «Свидетельство о перемене имени» <br> Иначе оставьте пустым."></i>
								</h5>
								<?= $form->field($model, 'changed_fio')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                <?= $form->field($uploadForm, "changed_fio", [
                                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="changed_fio_upload">Загрузить файл</label>
											<span class="uploadButton-file-name changed_fio_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => false, 'id' => 'changed_fio_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                <? if($files = $model->changedFioFile): ?>
                                    <ul style="list-style: none;">
                                        <span>Загруженные файлы</span>
                                        <?foreach ($files as $file):?>
                                            <li id="<?=$file->id?>">
                                                <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                </a>
                                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                                <? endif; ?>
							</div>



                            <?endif;?>
						</div>


						<div class="col-xl-3">
                            <? if($directory['is_ip'] == 1):?>
							<div class="submit-field">
								<h5>
									ИП
									<i class="help-icon" data-tippy-placement="top" title="Поле выбора «Индивидуальный предприниматель».<br> «Да» Скан выписки о статусе ИП c egrul.ru.<br> «Нет» Скан выписки о статусе физ.лица c gosuslugi.ru. "></i>
								</h5>
								<?= $form->field($model, 'is_ip')->dropDownList(ClientTicket::$is_ip,[ 'class' => 'with-border select_list'])->label(false)  ?>

                                <?= $form->field($uploadForm, "is_ip[]", [
                                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="is_ip_upload">Загрузить файл</label>
											<span class="uploadButton-file-name is_ip_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => false, 'id' => 'is_ip_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                <? if($files = $model->isIpFile): ?>
                                    <ul style="list-style: none;">
                                        <span>Загруженные файлы</span>
                                        <?foreach ($files as $file):?>
                                            <li id="<?=$file->id?>">
                                                <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                </a>
                                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                                <? endif; ?>
							</div>
                            <?endif;?>
						</div>

    <div class="col-xl-12" >
        <h5>Адресс регистрации: </h5>
        <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
            <div class="row">
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Регион</h5>
                        <?= $form->field($model , "region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>


                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Район</h5>
                        <?= $form->field($model, "district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Город</h5>
                        <?= $form->field($model, "city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Населенный пункт</h5>
                        <?= $form->field($model, "selo")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Улица</h5>
                        <?= $form->field($model, "street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Дом</h5>
                        <?= $form->field($model, "house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Корпус</h5>
                        <?= $form->field($model, "corpuse")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Квартира</h5>
                        <?= $form->field($model, "flat")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h5>Почт. индекс</h5>
                        <?= $form->field($model, "index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

						<div class="col-xl-7">
                            <? if($directory['fact_address'] == 1):?>
							<div class="submit-field">
								<h5>Фактический адресс</h5>
								<?= $form->field($model, 'fact_address')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

						<div class="col-xl-5">
                            <? if($directory['mail'] == 1):?>
							<div class="submit-field">
								<h5>Email</h5>
								<?= $form->field($model, 'mail')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
							</div>
                            <?endif;?>
						</div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Скан трудовой книжки</h5>
                                <?= $form->field($uploadForm, "trud_book[]", [
                                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="trud_book_upload">Загрузить файл</label>
											<span class="uploadButton-file-name trud_book_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => false, 'id' => 'trud_book_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                <? if($files = $model->trudBookFile): ?>
                                    <ul style="list-style: none;">
                                        <span>Загруженные файлы</span>
                                        <?foreach ($files as $file):?>
                                            <li id="<?=$file->id?>">
                                                <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                </a>
                                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                                <? endif; ?>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <? if($directory['is_work'] == 1):?>
                            <div class="submit-field">
                                <h5>Статус безработного</h5>
                                <?= $form->field($model, 'is_work')->dropDownList(ClientTicket::$is_work,[ 'class' => 'with-border select_list'])->label(false)  ?>
                            </div>
                            <?endif;?>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5 id="is_work_file">Скан выписки о состоянии индивидуального лицевого счета ПФР</h5>
                                <?= $form->field($uploadForm, "is_work[]", [
                                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="is_work_upload">Загрузить файл</label>
											<span class="uploadButton-file-name is_work_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => false, 'id' => 'is_work_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                <? if($files = $model->isWorkFile): ?>
                                    <ul style="list-style: none;">
                                        <span>Загруженные файлы</span>

                                        <?foreach ($files as $file):?>

                                            <li id="<?=$file->id?>">
                                                <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                </a>
                                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                                <? endif; ?>
                            </div>
                        </div>

						<div class="col-xl-6 col-md-6">
                            <? if($directory['passport_id'] == 1):?>
							<div class="section-headline">
								<h5>Пасспорт</h5>
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
															<h5>Серия</h5>
															<?= $form->field($passport_model, 'series')->textInput(['maxlength' => 4, 'class' => 'with-border'])->label(false) ?>
														</div>
													</div>

													<div class="col-xl-6">
														<div class="submit-field">
															<h5>Номер</h5>
															<?= $form->field($passport_model, 'number')->textInput(['maxlength' => 6, 'class' => 'with-border'])->label(false) ?>
														</div>
													</div>

													<div class="col-xl-12">
														<div class="submit-field">
															<h5>Кем выдан</h5>
															<?= $form->field($passport_model, 'given')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
														</div>
													</div>

													<div class="col-xl-6">
														<div class="submit-field">
															<h5>Дата выдачи</h5>
															<?= $form->field($passport_model, 'date_given')->widget(DatePicker::classname(), [
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
															])->label(false)?>
														</div>
													</div>

													<div class="col-xl-6">
														<div class="submit-field">
															<h5>Код подразделения</h5>
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
                                                        <div class="submit-field">
                                                        <h5>Скан пасспорта</h5>
                                                            <?= $form->field($uploadForm, "passport[]", [
                                                                'template' => '<div class="uploadButton">{input}
                                                                <label class="uploadButton-button ripple-effect" for="passport_upload">Загрузить файл</label>
                                                                <span class="uploadButton-file-name passport_upload">Файл не выбран</span>
                                                             </div>'])->fileInput(['multiple' => true, 'id' => 'passport_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                                            <? if($files = $passport_model->passportFile): ?>
                                                            <ul style="list-style: none;">
                                                                <span>Загруженные файлы</span>
                                                                <?foreach ($files as $file):?>
                                                                    <li id="<?=$file->id?>">
                                                                        <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                                        </a>
                                                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                                                    </li>
                                                                <?endforeach;?>
                                                            </ul>
                                                        <? endif; ?>
                                                        </div>
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
								<h5>Загран-пасспорт</h5>
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
														<h5>Серия</h5>
														<?= $form->field($inter_passport_model, 'series')->textInput(['maxlength' => 2, 'class' => 'with-border'])->label(false) ?>
													</div>
												</div>

												<div class="col-xl-6">
													<div class="submit-field">
														<h5>Номер</h5>
														<?= $form->field($inter_passport_model, 'number')->textInput(['maxlength' => 7, 'class' => 'with-border'])->label(false) ?>
													</div>
												</div>

												<div class="col-xl-12">
													<div class="submit-field">
														<h5>Кем выдан</h5>
														<?= $form->field($inter_passport_model, 'given')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
													</div>
												</div>

												<div class="col-xl-6">
													<div class="submit-field">
														<h5>Дата выдачи</h5>
														<?= $form->field($inter_passport_model, 'date_given')->widget(DatePicker::classname(), [
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
														])->label(false)?>
													</div>
												</div>

												<div class="col-xl-6">
													<div class="submit-field">
														<h5>Действителен до</h5>
														<?= $form->field($inter_passport_model, 'period')->widget(DatePicker::classname(), [
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
														])->label(false)?>
													</div>
												</div>

												<div class="col-xl-12">
                                                    <div class="submit-field">
                                                        <h5>Скан загранпаспорта</h5>
                                                        <?= $form->field($uploadForm, "inter_passport[]", [
                                                            'template' => '<div class="uploadButton">{input}
                                                                <label class="uploadButton-button ripple-effect" for="inter_passport_upload">Загрузить файл</label>
                                                                <span class="uploadButton-file-name inter_passport_upload">Файл не выбран</span>
                                                             </div>'])->fileInput(['multiple' => true, 'id' => 'inter_passport_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                                        <? if($files = $inter_passport_model->interPassportFile): ?>
                                                            <ul style="list-style: none;">
                                                                <span>Загруженные файлы</span>
                                                                <?foreach ($files as $file):?>
                                                                    <li id="<?=$file->id?>">
                                                                        <a href="<?= $file->getLink(true,'main_info',$model->id) ?>" target="_blank">
                                                                            <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                                        </a>
                                                                        <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='main_info'?>',<?=$model->id?>);" ><span class="icon-feather-trash-2"></span></a>
                                                                    </li>
                                                                <?endforeach;?>
                                                            </ul>
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
							<!-- Accordion / End -->
                            <?endif;?>
						</div>
					</div>
            <div class="row" style="margin-top:30px;">
                <div class="center-block">
                    <div class="row" >
                        <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                        <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                    </div>
                </div>
            </div>

<?php ActiveForm::end(); ?>

