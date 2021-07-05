<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTicket */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Client Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-ticket-view">

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
            'user_id',
            'name',
            'surname',
            'patronymic',
            'gender',
            'birthday',
            'birth_place',
            'inn',
            'snils',
            'registr_address',
            'fact_address',
            'mail',
            'phone',
            'is_ip',
            'changed_fio',
            'facsimile',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
