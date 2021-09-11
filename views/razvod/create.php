<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Razvod */

$this->title = 'Create Razvod';
$this->params['breadcrumbs'][] = ['label' => 'Razvods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="razvod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
