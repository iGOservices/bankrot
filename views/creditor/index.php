<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CreditorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Creditors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Creditor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ticket_id',
            'group',
            'commitment',
            'is_predprin',
            //'statment',
            //'name',
            //'inn',
            //'coutry',
            //'region',
            //'district',
            //'city',
            //'street',
            //'house',
            //'corpus',
            //'flat',
            //'post_index',
            //'sum_statment',
            //'sum_dolg',
            //'forfeit',
            //'base',
            //'base_date',
            //'base_num',
            //'other',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
