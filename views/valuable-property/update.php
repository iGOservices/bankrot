<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ValuableProperty */

$this->title = 'Update Valuable Property: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Valuable Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="valuable-property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
