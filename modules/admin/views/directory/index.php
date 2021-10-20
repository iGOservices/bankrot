<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Directory;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DirectorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if($type = 1){
    $title = "Заполнение и формирование документов для обращения в суд";
}elseif($type == 2){
    $title = "Банкротство под ключ";
}else{
    $title = "Услуги арбитражных управляющих";
}

$this->title = 'Справочник по сайту: '.$title;
$this->params['breadcrumbs'][] = ['label' => 'Выбор раздела', 'url' => ['/admin/directory/directory-list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directory-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Directory', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'type',
            'title',
            [
                'attribute' => 'active',
                'filter' => Directory::$active,
                'value' => function($model)
                {
                    return Directory::$active[$model->active];
                }
            ],
            [
                'attribute' => 'prompt',
                'value' => function($model)
                {
                    return StringHelper::truncate($model->prompt,20,'...');
                }
            ],
            [
                'attribute' => 'prompt_active',
                'filter' => Directory::$active,
                'value' => function($model)
                {
                    return Directory::$active[$model->prompt_active];
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url,$model) use ($type){
                        return Html::a(
                            '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z"></path></svg>',
                            "/admin/directory/view?id=".$model->id."&type_id=".$type);
                    },
                    'update' => function ($url,$model) use ($type){
                        return Html::a(
                            '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>',
                            "/admin/directory/update?id=".$model->id."&type_id=".$type);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
