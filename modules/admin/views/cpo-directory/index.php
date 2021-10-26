<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CpoDirectorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Справочник СПО';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cpo-directory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'recipient',
                'value' => function($model)
                {
                    return $model->recipient;
                }
            ],
            'recipient_inn',
            'recipient_kpp',
            'checking_account',
            'bik',
            //'bank',
            //'correspondent account',
            'kbk',
            'oktmo',
            //'payment_name',
            //'updated_at',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
