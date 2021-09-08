<?php

use app\models\ClientTicket;
use app\models\TicketStatus;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\StringHelper;use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TicketStatus */
/* @var $client_ticket app\models\ClientTicket */
/* @var $passport_model app\models\Passport */
/* @var $inter_passport_model app\models\Passport */
/* @var $family app\models\Family */
/* @var $creditor app\models\Creditor */
/* @var $debitor app\models\Debitor */
/* @var $property app\models\Property */
/* @var $bank app\models\Bank */
/* @var $shares app\models\Shares */
/* @var $other_shares app\models\OtherShares */
/* @var $valuable_property app\models\ValuableProperty */
/* @var $deal app\models\Deal */
/* @var $nalog app\models\Nalog */
/* @var $enforce_proc app\models\EnforceProc */
/* @var $other app\models\Other */

/* @var $brak app\models\Brak */
/* @var $razvod app\models\Razvod */

/* @var $proxy app\models\Proxy */

$this->title = "Услуга № ". $model->ticket_id;
$this->params['breadcrumbs'][] = ['label' => 'Список услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

//echo"<pre>";print_r($family);die();
?>
<div class="ticket-status-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'ticket_id',
                'label' => 'Номер услуги',
                'options' => ['style' => 'width: 50px; max-width: 50px;'],
                'value' => function($model)
                {
                    return $model->ticket_id;
                }
            ],
            [
                'label' => 'Пользователь',
                'value' => function($model)
                {
                    if($ticket = $model->clientTicket){
                        return User::findOne($ticket->user_id)->username ;
                    }else
                        return "";

                }
            ],
            [
                'attribute' => 'status',
                'label' => 'Статус',
                'value' => function($model)
                {
                    return TicketStatus::$status[$model->status];
                }
            ],
            [
                'attribute' => 'type',
                'label' => 'Тип услуги',
                'value' => function($model)
                {
                    return TicketStatus::$type[$model->type];
                }
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Дата создания',

                'value' => function($model)
                {
                    return date("Y-m-d H:i:s",$model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Дата редактирования',

                'value' => function($model)
                {
                    return date("Y-m-d H:i:s",$model->updated_at);
                }
            ],
        ],
    ]) ?>

    <h1>Основная информация</h1>

    <p>
        <?= Html::a('Редактировать', ['client-ticket/update', 'id' => $model->ticket_id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $client_ticket,
        'attributes' => [
            //'id',
            //'user_id',
            'name',
            'surname',
            'patronymic',
            [
                'attribute' => 'gender',
                'value' => function($model)
                {
                    return ClientTicket::$gender[$model->gender];
                }
            ],
            'birthday',
            'birth_place',
            [
                'label' => 'ИНН',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = $model->inn."<br>";
                    if($files = $model->innFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info')."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],
            [
                'label' => 'Снилс',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = $model->snils."<br>";
                    if($files = $model->snilsFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info')."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],
            [
                'attribute' => 'Адресс регистрации',
                'value' => function($model)
                {
                    return "Регион: ".$model->region." , район: ".$model->district." , город: ".$model->city." , улица: ".$model->street . " , дом: ".$model->house. " , корпус: ". $model->corpuse . " , квартира: ". $model->flat . " , почтовый индекс: ". $model->index;
                }
            ],
            'fact_address',
            'mail',
            [
                'attribute' => 'phone',
                'value' => function($model)
                {
                    return "+".$model->phone;
                }
            ],
            [
                'label' => 'ИП',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = ClientTicket::$is_ip[$model->is_ip]."<br>";
                    if($files = $model->isIpFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info')."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],
            [
                'label' => 'Предыдущее ФИО',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = $model->changed_fio."<br>";
                    if($files = $model->changedFioFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info')."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],
            [
                'label' => 'Факсимиле',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = "";
                    if($files = $model->facsimileFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info')."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }



            ],

        ],
    ]) ?>


    <h1>Пасспорт</h1>

    <p>
        <?= Html::a('Редактировать', ['client-ticket/update', 'id' => $model->ticket_id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $passport_model,
        'attributes' => [
            'id',
            'ticket_id',
            'series',
            'number',
            'given',
            'date_given',
            'code',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <h1>Загранпасспорт</h1>

    <p>
        <?= Html::a('Редактировать', ['client-ticket/update', 'id' => $model->ticket_id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $inter_passport_model,
        'attributes' => [
            'id',
            'ticket_id',
            'series',
            'number',
            'given',
            'date_given',
            'period',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <h1>Семья и дети</h1>

    <?foreach ($family as $item):?>
        <p>
            <?= Html::a('Редактировать', ['client-ticket/update', 'id' => $model->ticket_id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </p>
        <?= DetailView::widget([
            'model' => $item,
            'attributes' => [
                'id',
                'ticket_id',
                'type',
                'name',
                'surname',
                'patronymic',
                'birthday',
                'inn',
                'birth_country',
                'birth_series',
                'birth_number',
                'birth_date',
                'birth_number_act',
                'birth_number_act_date',
                'given',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    <?endforeach;?>

    <h1>Список родственных отношений</h1>

    <p>
        <?= Html::a('Редактировать', ['client-ticket/update', 'id' => $model->ticket_id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>




