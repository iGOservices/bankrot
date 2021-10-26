<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CpoDirectory */

$this->title = 'Редактирование : ' . $model->recipient;
$this->params['breadcrumbs'][] = ['label' => 'Справочник СПО', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recipient, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="cpo-directory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
