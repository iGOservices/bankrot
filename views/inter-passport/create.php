<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterPassport */

$this->title = 'Create Inter Passport';
$this->params['breadcrumbs'][] = ['label' => 'Inter Passports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inter-passport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
