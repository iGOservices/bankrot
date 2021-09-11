<?php

use app\models\TicketStatus;
use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;



/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список услуг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Список услуг', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'ticket_id',
                'label' => 'Номер услуги',
                'options' => ['style' => 'width: 50px; max-width: 50px;'],
                'value' => function($model)
                {
                    return $model->ticket_id;
                }
            ],
            [
                'attribute' => 'user_id',
                'filter' =>  Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'user_id',
                    'data' => User::activeList(),
                    'value' => $searchModel->user_id,
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Выберите'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'selectOnClose' => true,
                    ]
                ]),
                'label' => 'Пользователь',
                'value' => function($model)
                {
                    if($ticket = $model->clientTicket){
                        return User::findOne($ticket->user_id)->username ;
                    }else
                        return "";

                }
            ],
            [
                'attribute' => 'status',
                'label' => 'Статус',
                'filter' => TicketStatus::$status,
                'value' => function($model)
                {
                    return TicketStatus::$status[$model->status];
                }
            ],
            [
                'attribute' => 'type',
                'label' => 'Тип услуги',
                'filter' => TicketStatus::$type,
                'value' => function($model)
                {
                    return TicketStatus::$type[$model->type];
                }
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Дата создания',
                'filter' => false,
                'value' => function($model)
                {
                    return date("Y-m-d H:i:s",$model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Дата редактирования',
                'filter' => false,
                'value' => function($model)
                {
                    return date("Y-m-d H:i:s",$model->updated_at);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [

                ],
            ],
        ],
    ]); ?>


</div>
