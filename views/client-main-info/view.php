<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientMainInfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Client Main Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-main-info-view">

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
            'passport_id',
            'inter_passsport_id',
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
