<?php

use app\models\Upload;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTicket */
/* @var $upload app\models\Upload */

//echo"<pre>";print_r($upload);die();

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Client Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-ticket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <h3>Основная информация</h3>
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

        ],
    ]) ?>

    <h3>Пасспортные данные</h3>
    <?= DetailView::widget([
        'model' => $passport,
        'attributes' => [
            'id',
            'ticket_id',
            'series',
            'number',
            'given',
            'date_given',
            'code',

        ],
    ]) ?>

    <div class="freelancer-name">
        <h5>Файлы,загружаемые пользователем:</h5>
        <!-- Attachments -->
        <?if(isset($upload)):?>
            <?$pointer = 0;?>
            <?$folder = null;?>
            <?foreach ($upload as $key => $file):?>
                <?if($folder != $file->folder):?>
                    <h5><i class="icon-material-outline-folder"></i> <?=Upload::$folder[$file->folder]?>:</h5>
                    <div class="attachments-container margin-top-0 margin-bottom-0">
                <?endif;?>
                <a href="<?="/upload/".$model->id."/".$file->folder."/".$file->name.".".$file->ext?>">
                    <div class="attachment-box ripple-effect">
                        <span><?=$file->origin?></span>
                        <i><?=$file->ext?></i>
                    </div>
                </a>
                <?if(isset($upload[$key+1]->folder)):?>
                    <?if($upload[$key+1]->folder!= $upload[$key]->folder):?>
                        </div>
                    <?endif;?>
                <?endif;?>
                <?$folder = $file->folder?>
            <?endforeach;?>
        <?endif;?>
    </div>

</div>
