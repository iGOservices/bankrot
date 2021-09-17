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
    <?php $form = ActiveForm::begin(['id' => 'register-account-form']); ?>
        <div class="input-with-icon-left">
            <i class="icon-feather-user"></i>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Имя'])->label(false) ?>
        </div>
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
        <div class="input-with-icon-left">
            <i class="icon-material-baseline-mail-outline"></i>
            <?= $form->field($model, 'email')->textInput(['class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Email'])->label(false) ?>
        </div>
        <div class="input-with-icon-left">
            <i class="icon-material-outline-lock"></i>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'input-text with-border','style' => 'padding-left:60px','placeholder' => 'Пароль'])->label(false) ?>
        </div>
        <?= Html::submitButton('Создать', ['class' => 'button full-width button-sliding-icon ripple-effect margin-top-10', 'name' => 'signup-button']) ?>

        <?php ActiveForm::end(); ?>
</div>