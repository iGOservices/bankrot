<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CpoDirectory */

$this->title = 'Добавить новую запись';
$this->params['breadcrumbs'][] = ['label' => 'Справочник СПО', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cpo-directory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
