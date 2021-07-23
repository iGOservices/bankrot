<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ValuableProperty */

$this->title = 'Create Valuable Property';
$this->params['breadcrumbs'][] = ['label' => 'Valuable Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valuable-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
