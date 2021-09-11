<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Brak */

$this->title = 'Create Brak';
$this->params['breadcrumbs'][] = ['label' => 'Braks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
