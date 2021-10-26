<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CpoDirectory */

$this->title = $model->recipient;
$this->params['breadcrumbs'][] = ['label' => 'Справочник СПО', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cpo-directory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'recipient',
            'recipient_inn',
            'recipient_kpp',
            'checking_account',
            'bik',
            'bank',
            'correspondent account',
            'kbk',
            'oktmo',
            'payment_name',
            //'updated_at',
            //'created_at',
        ],
    ]) ?>

</div>
