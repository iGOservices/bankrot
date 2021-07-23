<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
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
            'property_type',
            'property_view',
            //'share',
            //'other_owners',
            //'active_name',
            //'square',
            //'reg_number',
            //'vin_number',
            //'date_sved',
            //'num_sved',
            //'coutry',
            //'region',
            //'district',
            //'city',
            //'street',
            //'house',
            //'corpus',
            //'office',
            //'post_index',
            //'cost',
            //'active_status',
            //'zalog_name',
            //'zalog_post_index',
            //'zalog_dogovor',
            //'other',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
