
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfo */
/* @var $passport_model app\models\Passport */
/* @var $inter_passport_model app\models\Passport */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
/* @var $directory app\models\Directory */
?>

<div class="dashboard-content-inner" >
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3>Post a Job</h3>
        <p>
            <?= Html::a('export pdf', ['/pdf/bankrot-blank'], ['class' => 'btn btn-success']) ?>
        </p>

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
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>

                  	</div>
				</div>

				<div class="content with-padding padding-bottom-10">
                <?php $form = ActiveForm::begin(); ?>








                    <div class="tab">
                        <?= $this->render('_client_main_info',[
                            'passport_model' => $passport_model,
                            'inter_passport_model' => $inter_passport_model,
                            'model' => $model,
                            'uploadForm' => $uploadForm,
                            'directory' => $directory,
                            'form' => $form,
                        ]);?>
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="saveSession();nextPrev(1)">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>

                     </div>

                    <div class="tab">
                        <input id="family-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_family" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Родственника
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="family-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="checkSum();">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <input id="sp-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_sp" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Семейное положение
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="sp-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="checkSum();">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- One "tab" for each step in the form: -->
				<div class="tab">
                    <input id="creditor-point" hidden value="0">
                    <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                    <a href="#" id="add_creditor" class="button ripple-effect">
                        <i class="icon-material-outline-add-circle-outline"></i>Добавить кредитора
                    </a>
                    <!-- Accordion -->
                    <div class="accordion js-accordion" id="creditor-accordion">

                    </div>
                    <!-- Accordion / End -->
                    <div class="row" style="margin-top:30px;">
                        <div class="center-block">
                            <div class="row" >
                                <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                <a href="#" class="button ripple-effect" id="nextBtn" onclick="checkSum();">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
				</div>

				

                  <div class="tab">
                      <input id="debitor-point" hidden value="0">
                      <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                      <a href="#" id="add_debitor" class="button ripple-effect">
                          <i class="icon-material-outline-add-circle-outline"></i>Добавить дебитора
                      </a>
                      <!-- Accordion -->
                      <div class="accordion js-accordion" id="debitor-accordion">

                      </div>
                      <!-- Accordion / End -->
                      <div class="row" style="margin-top:30px;">
                          <div class="center-block">
                              <div class="row" >
                                  <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                  <a href="#" class="button ripple-effect" id="nextBtn" onclick="nextPrev(1)">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                              </div>
                          </div>
                      </div>
                  </div>

                    <div class="tab">
                        <input id="property-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_property" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить имущество
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="property-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="nextPrev(1)">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <input id="bank-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_bank" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить банк
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="bank-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="nextPrev(1)">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <input id="shares-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_shares" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить акции
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="shares-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="nextPrev(1)">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="tab">
                        <input id="other_shares-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_other_shares" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить иные ценные бумаги
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="other_shares-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="nextPrev(1)">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <input id="valuable-property-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_valuable-property" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить наличные денежные средства и иное ценное имущество
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="valuable-property-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="checkSum();">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <input id="deal-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_deal" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить «Совершенные сделки за последние 3 года»
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="deal-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="checkSum();">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <input id="nalog-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_nalog" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Доходы и Налоги
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="nalog-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="checkSum();">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <input id="enforce-proc-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_enforce-proc" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Исполнительные произвосдства
                        </a>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="enforce-proc-accordion">

                        </div>
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="nextBtn" onclick="checkSum();">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        конец
                    </div>


		


				  <div class="form-group">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                      <a onclick="bindInputValue();">Заполнить</a>
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