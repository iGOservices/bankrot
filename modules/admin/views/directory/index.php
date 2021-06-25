<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DirectorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Directories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Directory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'id',
            'surname',
            'patronymic',
            'gender',
            //'birthday',
            //'birth_place',
            //'inn',
            //'snils',
            //'registr_address',
            //'fact_address',
            //'passport_id',
            //'inter_passsport_id',
            //'mail',
            //'phone',
            //'is_ip',
            //'changed_fio',
            //'facsimile',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
