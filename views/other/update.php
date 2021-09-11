<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Other */
/* @var $ticket_status_id app\models\TicketStatus */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Дополнительная информация';

if($ticket_status_id){
    $this->params['breadcrumbs'][] = ['label' => 'Детали услуги №'.$model->ticket_id, 'url' => ['ticket-status/view', 'id' => $ticket_status_id]];
    $this->params['breadcrumbs'][] = $this->title;
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Others', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="other-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
