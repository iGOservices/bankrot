<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Debitor */

$this->title = 'Update Debitor: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Debitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="debitor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
