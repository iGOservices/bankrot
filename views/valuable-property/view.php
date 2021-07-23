<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ValuableProperty */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Valuable Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="valuable-property-view">

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
            'property_type',
            'name',
            'cost',
            'location',
            'coutry',
            'region',
            'district',
            'city',
            'street',
            'house',
            'corpus',
            'office',
            'post_index',
            'org_name',
            'dogovor_number',
            'dogovor_date',
            'active_status',
            'zalog_name',
            'zalog_type',
            'zalog_inn',
            'zalog_address',
            'zalog_dogovor',
            'other',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
