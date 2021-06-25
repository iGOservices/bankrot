<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */

$this->title = 'Справочник активных полей ввода.';
?>

<div class="directory-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
