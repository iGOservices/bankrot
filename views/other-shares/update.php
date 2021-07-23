<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OtherShares */

$this->title = 'Update Other Shares: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Other Shares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="other-shares-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
