<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/*
$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<!--<div class="user-update">

    <h1><?php /*Html::encode($this->title) */?></h1>

    <?php /*$this->render('_form', [
        'model' => $model,
    ]) */?>

</div> -->

<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Личный кабинет пользоваеля</h3>

				<!-- Breadcrumbs -->
<!--				<nav id="breadcrumbs" class="dark">-->
<!--					<ul>-->
<!--						<li><a href="#">Home</a></li>-->
<!--						<li><a href="#">Dashboard</a></li>-->
<!--						<li>Settings</li>-->
<!--					</ul>-->
<!--				</nav>-->
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i>Редактирование информации профиля</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

                        <?php $form = ActiveForm::begin(); ?>
							<div class="row">
<!--								<div class="col-auto">-->
<!--									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Изменить аватар">-->
<!--										<img class="profile-pic" src="images/user-avatar-placeholder.png" alt="" />-->
<!--										<div class="upload-button"></div>-->
<!--										<input class="file-upload" type="file" accept="image/*"/>-->
<!--									</div>-->
<!--								</div>-->

								<div class="col">
									<div class="row">

										<div class="col-xl-4">
                                            <span>Имя</span>
                                            <div class="input-with-icon-left">
                                                <i class="icon-feather-user"></i>
                                                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'with-border','style' => 'padding-left:60px'])->label(false) ?>
											</div>
										</div>

										<div class="col-xl-4">
                                            <span>Телефон</span>
                                            <div class="input-with-icon-left">
                                                <i class="icon-feather-phone"></i>
                                                <?= $form->field($model, 'phone',[
                                                    'enableClientValidation' => false,
                                                ])->widget(MaskedInput::className(), [
                                                    'mask' => '+9 (999) 999-99-99',
                                                    'options' => [
                                                        'class' => 'input-text with-border',
                                                        'id' => 'phone2',
                                                        'placeholder' => ('Телефон'),
                                                        'style' => 'padding-left:60px'
                                                    ],
                                                    'clientOptions' => [
                                                        'greedy' => false,
                                                        'clearIncomplete' => true
                                                    ]
                                                ])->label(false) ?>
                                            </div>
										</div>

                                        <div class="col-xl-4">
                                            <span>Email</span>
                                            <div class="input-with-icon-left">
                                                <i class="icon-feather-mail"></i>
                                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'with-border','style' => 'padding-left:60px'])->label(false) ?>
                                            </div>
                                        </div>

										<div class="col-xl-6">
											<!-- Account Type -->
											<div class="submit-field">
                                                <?= Html::submitButton('Сохранить', ['class' => 'button ripple-effect','style' => 'margin-top:30px']) ?>
											</div>
										</div>

										

									</div>
								</div>
							</div>
                        <?php ActiveForm::end(); ?>
						</div>
					</div>
				</div>


			</div>
			<!-- Row / End -->



		</div>