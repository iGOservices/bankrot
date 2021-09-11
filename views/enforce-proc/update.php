<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnforceProc */
/* @var $ticket_status_id app\models\TicketStatus */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Редактирование списка выплат по исполнительным производствам';

if($ticket_status_id){
    $this->params['breadcrumbs'][] = ['label' => 'Детали услуги №'.$model->ticket_id, 'url' => ['ticket-status/view', 'id' => $ticket_status_id]];
    $this->params['breadcrumbs'][] = $this->title;
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Enforce Procs', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="enforce-proc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
