<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfo */

$this->title = 'Create Client Main Info';
$this->params['breadcrumbs'][] = ['label' => 'Client Main Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-main-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
