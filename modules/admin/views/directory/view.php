<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\DetailView;
use app\models\Directory;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */

$this->title = "Поле: ".$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Выбор раздела', 'url' => ['/admin/directory/directory-list']];
$this->params['breadcrumbs'][] = ['label' => 'Справочник', 'url' => ['index','type_id' => $type_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="directory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(' Редактировать', ['update', 'id' => $model->id,'type_id' => $type_id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Удалить', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'type',
            'title',
            [
                'attribute' => 'active',
                'value' => function($model)
                {
                    return Directory::$active[$model->active];
                }
            ],
            [
                'attribute' => 'prompt',
                'value' => function($model)
                {
                    return StringHelper::truncate($model->prompt,20,'...');
                }
            ],
            [
                'attribute' => 'prompt_active',
                'value' => function($model)
                {
                    return Directory::$active[$model->prompt_active];
                }
            ],
        ],
    ]) ?>

</div>
