<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Passport */
/* @var $ticket_status_id app\models\TicketStatus */
/* @var $uploadForm app\models\UploadForm */


$this->title = 'Редактирование паспортных данных';

if($ticket_status_id){
    $this->params['breadcrumbs'][] = ['label' => 'Детали услуги №'.$model->ticket_id, 'url' => ['ticket-status/view', 'id' => $ticket_status_id]];
    $this->params['breadcrumbs'][] = $this->title;
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Passports', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="passport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
        'ticket_status_id' => $ticket_status_id
    ]) ?>

</div>
