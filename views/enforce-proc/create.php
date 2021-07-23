<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnforceProc */

$this->title = 'Create Enforce Proc';
$this->params['breadcrumbs'][] = ['label' => 'Enforce Procs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enforce-proc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
