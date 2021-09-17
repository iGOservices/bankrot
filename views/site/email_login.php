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
        <h3>Мы рады видеть вас снова!</h3>
        <span>Еще нет аккаунта? <?= Html::a('Зарегистрироваться', ['site/signup']) ?></span>
    </div>

    <!-- Form -->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form'
    ]); ?>
    <div class="input-with-icon-left">
        <i class="icon-material-baseline-mail-outline"></i>
        <?= $form->field($model, 'email')->textInput(['class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Email'])->label(false) ?>
    </div>

    <div class="input-with-icon-left">
        <i class="icon-material-outline-lock"></i>
        <?= $form->field($model, 'password')->passwordInput(['class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Пароль'])->label(false) ?>
    </div>
    <span style="font-size: 14px">Указывая Email, вы принимаете условия<a href="#" style="text-decoration: underline"><br>пользовательского соглашения</a></span>
<!--    <a href="#" class="forgot-password">Забыли пароль?</a>-->
    <div class="row">
        <div class="col-md-6">
            <?= Html::submitButton('Войти  по Email', ['class' => 'button full-width button-sliding-icon ripple-effect margin-top-10', 'name' => 'login-button']) ?>
        </div>

        <div class="col-md-6">
            <?= Html::a('Войти по телефону', ['site/login'], ['class' => 'button full-width button-sliding-icon ripple-effect margin-top-10', 'name' => 'login-button']) ?>
        </div>

    </div>
    <!---->
    <!--        <div class="ks-text-center">-->
    <!--            Нет аккаунта? --><?//= Html::a('Зарегистрироваться', ['site/signup']) ?>
    <!--        </div>-->
    <!--        <div class="ks-text-center">-->
    <!--            --><?//= Html::a('Забыл пароль?', ['site/request-password-reset']) ?>
    <!--        </div>-->

    <?php ActiveForm::end(); ?>
</div>
