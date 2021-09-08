<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterPassport */

$this->title = 'Update Inter Passport: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inter Passports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inter-passport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
