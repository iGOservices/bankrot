<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */

$this->title = 'Справочник полей ввода. ';

$this->params['breadcrumbs'][] = 'Справочник полей ввода';
?>
<div class="directory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
