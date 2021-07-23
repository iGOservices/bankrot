<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Debitor */

$this->title = 'Create Debitor';
$this->params['breadcrumbs'][] = ['label' => 'Debitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
