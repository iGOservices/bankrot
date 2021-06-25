
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfo */
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
							<h3><i class="icon-feather-folder-plus"></i>Заполнение формы</h3>
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

                  
                  <!-- One "tab" for each step in the form: -->
                  <div class="tab">
                      <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'gender')->textInput() ?>

                      <?= $form->field($model, 'birthday')->textInput() ?>

                      <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($uploadForm, 'inn')->fileInput(['multiple' => true])->label('ИНН') ?>

                      <?= $form->field($model, 'snils')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($uploadForm, 'snils')->fileInput(['multiple' => true])->label('Cнилс') ?>

                      <?= $form->field($model, 'registr_address')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'fact_address')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'passport_id')->textInput() ?>

                      <div class="uploadButton margin-top-30">
                        <?= $form->field($uploadForm, 'passport')->fileInput(['multiple' => true, 'id' => 'upload', 'class' => "uploadButton-input"])->label(false) ?>
											  <label class="uploadButton-button ripple-effect" for="upload">Пасспорт</label>
											  <span class="uploadButton-file-name">Поле для загрузки скан-файлов пасспорта.</span>
										  </div>

                      <?= $form->field($model, 'inter_passsport_id')->textInput() ?>

                      <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'phone')->textInput() ?>

                      <?= $form->field($model, 'is_ip')->textInput() ?>

                      <?= $form->field($model, 'changed_fio')->textInput(['maxlength' => true]) ?>

                      <?= $form->field($model, 'facsimile')->textInput() ?>
                  </div>

                  <div class="tab">Birthday:
                    <p><input placeholder="dd" oninput="this.className = ''"></p>
                    <p><input placeholder="mm" oninput="this.className = ''"></p>
                    <p><input placeholder="yyyy" oninput="this.className = ''"></p>
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

                  <div style="overflow:auto;">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
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