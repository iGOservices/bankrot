<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

?>
<div class="login-register-page">
    <!-- Welcome Text -->
    <div class="welcome-text">
        <h3 style="font-size: 26px;">Создание нового аккаунта!</h3>
        <span>У вас уже есть акккаунт? <?= Html::a('Войти', ['site/login']) ?></span>
    </div>
    <?php $form = ActiveForm::begin([
                    'id' => 'register-account-form',
//                    'enableAjaxValidation' => true,
            ]); ?>
        <div class="input-with-icon-left">
            <i class="icon-feather-user"></i>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Имя'])->label(false) ?>
        </div>
        <p class="help-block help-block-error" id="help_username"></p>
        <div class="input-with-icon-left">
            <i class="icon-feather-phone"></i>
            <?= $form->field($model, 'phone',[
                'enableClientValidation' => false,
            ])->widget(MaskedInput::className(), [
                'mask' => '+7 (999) 999-99-99',
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
        <p class="help-block help-block-error" id="help_phone"></p>
        <div class="input-with-icon-left">
            <i class="icon-material-baseline-mail-outline"></i>
            <?= $form->field($model, 'email')->textInput(['class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Email'])->label(false) ?>
        </div>
        <p class="help-block help-block-error" id="help_email"></p>
        <div class="input-with-icon-left">
            <i class="icon-material-outline-lock"></i>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Пароль'])->label(false) ?>
        </div>
        <?//= Html::submitButton('Создать', ['class' => 'button full-width button-sliding-icon ripple-effect margin-top-10', 'name' => 'signup-button']) ?>



         <?//= Html::Button('Создать', ['class' => 'button full-width button-sliding-icon ripple-effect margin-top-10', 'name' => 'signup-button' ,'onclick' => 'sendCallRequest();']) ?>


    <?php ActiveForm::end(); ?>

    <a href="#"  class="button full-width button-sliding-icon ripple-effect margin-top-10" onclick="sendCallRequest();">Создать </a>

        <div class="call_block" style="display: none">
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <span style="display: block;text-align: center;">Введите последние 4 цифры номера, с которого вам поступил звонок</span>
                </div>
                <div class="col-md-6">
                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-fingerprint"></i>
                        <input id="call_code" class="input-text with-border" maxlength="4"  style="padding-left:60px">
                     </div>
                </div>
                <div class="col-md-6">
                    <?= Html::Button('Подтвердить', ['class' => 'button dark ripple-effect', 'name' => 'signup-button' ,'onclick' => 'sendCallAnswer();' , 'style' => 'width:100%']) ?>
                </div>
                <div class="col-md-12">
                    <span style="display: block;text-align: center;"><a href="#" onclick="sendCallRequest(1);" id="recall">Отправить заново запрос?</a></span>
                </div>
            </div>
        </div>
</div>