<?php

use app\models\Promocode;
use app\models\TicketStatus;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Promocode */

$this->title = "Промокод: ".$model->code;
$this->params['breadcrumbs'][] = ['label' => 'Промокоды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="promocode-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить промокод?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'code',
            'discount',
            [
                'attribute' => 'service_id',
                'value' => function($model)
                {
                    return TicketStatus::$type[$model->service_id];
                }
            ],
            [
                'attribute' => 'active',
                'value' => function($model)
                {
                    return Promocode::$active[$model->active];
                }
            ],
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
