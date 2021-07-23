<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ValuablePropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Valuable Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valuable-property-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Valuable Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ticket_id',
            'property_type',
            'name',
            'cost',
            //'location',
            //'coutry',
            //'region',
            //'district',
            //'city',
            //'street',
            //'house',
            //'corpus',
            //'office',
            //'post_index',
            //'org_name',
            //'dogovor_number',
            //'dogovor_date',
            //'active_status',
            //'zalog_name',
            //'zalog_type',
            //'zalog_inn',
            //'zalog_address',
            //'zalog_dogovor',
            //'other',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
