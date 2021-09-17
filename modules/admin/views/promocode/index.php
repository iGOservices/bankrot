<?php

use app\models\Promocode;
use app\models\TicketStatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PromocodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Промокоды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocode-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать промокод', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'code',
            [
                'attribute' => 'discount',
                'value' => function($model)
                {
                    return $model->discount."%";
                }
            ],
            [
                'attribute' => 'service_id',
                'filter' => TicketStatus::$type,
                'value' => function($model)
                {
                    return TicketStatus::$type[$model->service_id];
                }
            ],
            [
                'attribute' => 'active',
                'filter' => Promocode::$active,
                'value' => function($model)
                {
                    return Promocode::$active[$model->active];
                }
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
