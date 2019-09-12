<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $model app\models\ResetPasswordForm */

$this->title = 'Сброс пароля';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'reset-password-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>
    <h4 class="ks-header">Сброс пароля</h4>

<?= $form->field($model, 'password', ['template' => '<div class="input-icon icon-left icon-lg icon-color-primary">{input}<span class="icon-addon"><span class="fa fa-key"></span>
        </span></div>'])->passwordInput(['placeholder' => 'Password','autofocus' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
    </div>
    <div class="ks-text-center">
        Пожалуйста, измените ваш пароль.
    </div>
<?php ActiveForm::end(); ?>