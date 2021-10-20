<?php

use app\models\Promocode;
use app\models\TicketStatus;
use app\models\User;
use kartik\date\DatePicker;
use kartik\select2\Select2;
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
                'attribute' => 'period',
                'format' => 'raw',
                'filter' =>
                DatePicker::widget([
                    'model' => $searchModel,
                    'name' => 'PromocodeSearch[period]',
                    'language' => 'ru',
                    'size' => 'ms',
                ]),
                'value' => function($model)
                {
                    return $model->period;
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
                'attribute' => 'is_use',
                'filter' => Promocode::$is_use,
                'value' => function($model)
                {
                    return Promocode::$is_use[$model->is_use];
                }
            ],
            [
                'attribute' => 'user_activate',
                'filter' =>  Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'user_activate',
                    'data' => User::activeList(),
                    'value' => $searchModel->user_activate,
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Выберите'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'selectOnClose' => true,
                    ]
                ]),
                'value' => function($model)
                {
                    if($user = User::findOne($model->user_activate)){
                        return $user->username ;
                    }else
                        return "";

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
