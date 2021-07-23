<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nalog */

$this->title = 'Create Nalog';
$this->params['breadcrumbs'][] = ['label' => 'Nalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
