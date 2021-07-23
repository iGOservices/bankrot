<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="login-register-page">
    <!-- Welcome Text -->
    <div class="welcome-text">
        <h3 style="font-size: 26px;">Создание нового аккаунта!</h3>
        <span>У вас уже есть акккаунт? <?= Html::a('Войти', ['site/login']) ?></span>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'register-account-form']); ?>
        <div class="input-with-icon-left">
<!--            <i class="icon-material-outline-lock"></i>-->
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class' => 'input-text with-border'])->label('Имя') ?>
        </div>
        <div class="input-with-icon-left">
<!--            <i class="icon-material-baseline-mail-outline"></i>-->
            <?= $form->field($model, 'phone')->textInput(['autofocus' => true,'class' => 'input-text with-border'])->label('Телефон') ?>                                                                                                                                        
        </div>
        <div class="input-with-icon-left">
            <?= $form->field($model, 'email')->textInput(['autofocus' => true,'class' => 'input-text with-border'])->label('Email') ?>
        </div>
        <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
<!--            <i class="icon-material-outline-lock"></i>-->
            <?= $form->field($model, 'password')->passwordInput(['class' => 'input-text with-border'])->label('Пароль') ?>
        </div>
        <?= Html::submitButton('Создать', ['class' => 'button full-width button-sliding-icon ripple-effect margin-top-10', 'name' => 'signup-button']) ?>

        <?php ActiveForm::end(); ?>
</div>