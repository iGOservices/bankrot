<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientTicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Client Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'name',
            'surname',
            'patronymic',
            //'gender',
            //'birthday',
            //'birth_place',
            //'inn',
            //'snils',
            //'registr_address',
            //'fact_address',
            //'mail',
            //'phone',
            //'is_ip',
            //'changed_fio',
            //'facsimile',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
