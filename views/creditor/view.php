<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Creditor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Creditors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="creditor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ticket_id',
            'group',
            'commitment',
            'is_predprin',
            'statment',
            'name',
            'inn',
            'coutry',
            'region',
            'district',
            'city',
            'street',
            'house',
            'corpus',
            'flat',
            'post_index',
            'sum_statment',
            'sum_dolg',
            'forfeit',
            'base',
            'base_date',
            'base_num',
            'other',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
