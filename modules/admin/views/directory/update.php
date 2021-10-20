<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */

$this->title = 'Редактирование поля: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Справочник полей', 'url' => ['index','type_id' => $type_id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id,'type_id' => $type_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="directory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
