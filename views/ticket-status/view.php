<?php

use app\models\Bank;
use app\models\ClientTicket;
use app\models\Creditor;
use app\models\Deal;
use app\models\Debitor;
use app\models\Family;
use app\models\OtherShares;
use app\models\Property;
use app\models\TicketStatus;
use app\models\User;
use app\models\ValuableProperty;
use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $uploadForm app\models\UploadForm */
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
    <p>
        <?= Html::a('Сформировать комлект документов', ['pdf/create-user-documents','id' => $client_ticket->id,'ticket_status_id' => $model->id], ['class' => 'btn btn-warning edit_button']) ?>
    </p>

    <p>
        <?= Html::a('Сформировать документ для экспорта в ПАУ', ['pdf/create-export-pay-document','id' => $client_ticket->id,'ticket_status_id' => $model->id], ['class' => 'btn btn-success edit_button']) ?>
    </p>
    <?$doc = $client_ticket->getExportPay()->one();?>
    <?if($doc):?>

        <ul><li id="<?=$doc->id?>">
                    <a href="<?= $doc->getLink(true,'export_asb',$client_ticket->id) ?>" download>
                        <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($doc->origin,100,'...');?>
                        <a href='#' onclick="deleteImg(<?=$doc->id?>,'export_asb',<?=$client_ticket->id?>);" ><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg></a>
                    </a>
            </li></ul>
    <?else:?>
        <span style="color: red;">Файл для экспорта в ПАУ еще не сформирован</span>
    <?endif;?>

    <hr>

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

    <h4>Список сформированных документов по услуге:</h4>

    <?php $form = ActiveForm::begin([
            'id' => 'main',
            'action' => '/ticket-status/upload-user-docs',
            'enableClientValidation' => false,
            'enableAjaxValidation' => false,
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($client_ticket, 'id')->hiddenInput()->label(false) ?>

    <?= $form->field($uploadForm, "user_docs")->fileInput(['multiple' => false])->label( "Добавление файлов клиента")?>


    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?$docs = $client_ticket->getUserDocs()->all();?>
    <?if($docs):?>
    <ul>
        <?foreach ($docs as $doc):?>
            <li id="<?=$doc->id?>">
                <a href="<?= $doc->getLink(true,'user_docs',$client_ticket->id) ?>" target="_blank" >
                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($doc->origin,100,'...');?>
                    <a href='#' onclick="deleteImg(<?=$doc->id?>,'user_docs',<?=$client_ticket->id?>);" ><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg></a>
                </a>
            </li>
        <?endforeach;?>
    </ul>
    <?else:?>
        <span style="color: red;">По услуге еще нет сформированных документов</span>
    <?endif;?>
    <hr>

    <h1>Основная информация</h1>

    <p>
        <?= Html::a('Редактировать', ['client-ticket/update', 'id' => $model->ticket_id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button']) ?>
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
                                <a href=\"".$file->getLink(true,'main_info',$model->id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
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
                                <a href=\"".$file->getLink(true,'main_info',$model->id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
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
                                <a href=\"".$file->getLink(true,'main_info',$model->id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
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
                                <a href=\"".$file->getLink(true,'main_info',$model->id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
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
                                <a href=\"".$file->getLink(true,'main_info',$model->id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }



            ],
            [
                'label' => 'Скан трудовой книжки',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = "";
                    if($files = $model->trudBookFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info',$model->id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],

            [
                'attribute' => 'is_work',
                'value' => function($model)
                {
                    return ClientTicket::$is_work[$model->is_work];
                }
            ],
            [
                'label' => 'Cкан файл безработности',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = "";
                    if($files = $model->isWorkFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info',$model->id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],

        ],
    ]) ?>


    <h1>Паспорт</h1>

    <p>
        <?= Html::a('Редактировать', ['passport/update', 'id' => $passport_model->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $passport_model,
        'attributes' => [
            //'id',
            //'ticket_id',
            'series',
            'number',
            'given',
            'date_given',
            'code',
            [
                'label' => 'Скан паспорта',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = "";
                    if($files = $model->passportFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

    <h1>Загранпаспорт</h1>

    <p>
        <?= Html::a('Редактировать', ['inter-passport/update', 'id' => $inter_passport_model->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $inter_passport_model,
        'attributes' => [
            //'id',
            //'ticket_id',
            'series',
            'number',
            'given',
            'date_given',
            'period',
            [
                'label' => 'Скан загранпаспортa',
                'format' => 'raw',
                'value' => function($model)
                {
                    $str = "";
                    if($files = $model->interPassportFile){
                        $str .= "<span>Файлы:</span><ul>";
                        foreach ($files as $file){
                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'main_info',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'main_info',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                        }
                        $str.= "</ul>";
                    }
                    return $str;
                }
            ],
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

    <h1>Семья и дети</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($family as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                    Html::a('Редактировать', ['family/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                'model' => $item,
                'attributes' => [
                    //'id',
                    //'ticket_id',
                    [
                        'attribute' => 'type',
                        'value' => function($model)
                        {
                            return Family::$type[$model->type];
                        }
                    ],
                    'name',
                    'surname',
                    'patronymic',
                    'birthday',
                    'inn',

                    //'created_at',
                    //'updated_at',
                ]]).
                    "<h4>Свидетельство о рождении</h6>".
                    DetailView::widget([
                        'model' => $item,
                        'attributes' => [
                            [
                                'attribute' => 'birth_country',
                                'value' => function($model)
                                {
                                    return Family::$birth_country[$model->birth_country];
                                }
                            ],
                            'birth_series',
                            'birth_number',
                            'birth_date',
                            'birth_number_act',
                            'birth_number_act_date',
                            'given',
                            [
                                'label' => 'Скан свидетельства',
                                'format' => 'raw',
                                'value' => function($model)
                                {
                                    $str = "";
                                    if($files = $model->getBirthFiles()->all()){
                                        $str .= "<span>Файлы:</span><ul>";
                                        foreach ($files as $file){
                                            $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'family',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'family',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                        }
                                        $str.= "</ul>";
                                    }
                                    return $str;
                                }
                            ],
                            //'created_at',
                            //'updated_at',
                        ],
                    ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


    <h1>Список родственных отношений</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($brak as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['brak/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                "<h4>Свидетельство о браке с разбивкой по полям</h4>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                       // 'id',
                        //'ticket_id',
                        'series',
                        'number',
                        'date',
                        'number_act',
                        'number_act_date',
                        'given',
                        [
                            'label' => 'Скан свидетельства',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getBrakFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'sp',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'sp',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'label' => 'Брачный договор',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getBrakDogovorFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'sp',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'sp',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]) ,

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>
    <?
    $i = 1;
    $items = [];
    foreach ($razvod as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['razvod/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                "<h4>Свидетельство о разводе с разбивкой по полям</h4>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        // 'id',
                        //'ticket_id',
                        'series',
                        'number',
                        'date',
                        'number_act',
                        'number_act_date',
                        'given',
                        [
                            'label' => 'Скан свидетельства',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getRazvodFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'sp',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'sp',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'label' => 'Брачный договор',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getPropertyDivisionFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'sp',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'sp',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]) ,

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


    <!--    <h1>Список родственных отношений</h1>-->
<!---->
<!--    <p>-->
<!--        --><?//= Html::a('Редактировать', ['client-ticket/update', 'id' => $model->ticket_id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--    </p>-->

    <h1>Список кредиторов</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($creditor as $key => $item){
        $group = $item->group;
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['creditor/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        [
                            'attribute' => 'group',
                            'value' => function($model)
                            {
                                return Creditor::$group[$model->group];
                            }
                        ],
                        [
                            'attribute' => 'commitment',
                            'value' => function($model)
                            {
                                if($model->group == 1){
                                    return Creditor::$commitment[$model->commitment];
                                }elseif ($model->group == 2){
                                    return Creditor::$commitment_ob[$model->commitment];
                                }else{
                                    return $model->commitment;
                                }

                            }
                        ],
                        [
                            'attribute' => 'statment',
                            'value' => function($model)
                            {
                                return Creditor::$statment[$model->statment];
                            }
                        ],
                        [
                            'attribute' => 'is_predprin',
                            'value' => function($model)
                            {
                                return $model->is_predprin == 0 ? "Нет" : "Да";
                            }
                        ],
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
                        [
                            'attribute' => 'sum_statment',
                            'visible' => $group == 1 || $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->sum_statment;
                            }
                        ],
                        [
                            'attribute' => 'sum_dolg',
                            'visible' => $group == 1 || $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->sum_dolg;
                            }
                        ],
                        [
                            'attribute' => 'forfeit',
                            'visible' => $group == 1 || $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->forfeit;
                            }
                        ],
                        [
                            'attribute' => 'base',
                            'value' => function($model)
                            {
                                return Creditor::$base[$model->base];
                            }
                        ],
                        'base_date',
                        'base_num',
                        [
                            'label' => 'Скан документа',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getCreditorFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'creditor',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'creditor',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'format'=>'html',
                            'contentOptions' => [
                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
                            ],
                            'attribute' => 'other',
                            'value' => function($model)
                            {
                                return $model->other;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>

    <h1>Список дебиторов</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($debitor as $key => $item){
        $group = $item->group;
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['debitor/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        [
                            'attribute' => 'group',
                            'value' => function($model)
                            {
                                return Debitor::$group[$model->group];
                            }
                        ],
                        [
                            'attribute' => 'commitment',
                            'value' => function($model)
                            {
                                if($model->group == 1){
                                    return Debitor::$commitment[$model->commitment];
                                }else{
                                    return $model->commitment;
                                }

                            }
                        ],
                        [
                            'attribute' => 'statment',
                            'value' => function($model)
                            {
                                return Debitor::$statment[$model->statment];
                            }
                        ],
                        [
                            'attribute' => 'is_predprin',
                            'value' => function($model)
                            {
                                return $model->is_predprin == 0 ? "Нет" : "Да";
                            }
                        ],
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
                        [
                            'attribute' => 'sum_statment',
                            'visible' => $group == 1 || $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->sum_statment;
                            }
                        ],
                        [
                            'attribute' => 'sum_dolg',
                            'visible' => $group == 1 || $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->sum_dolg;
                            }
                        ],
                        [
                            'attribute' => 'forfeit',
                            'visible' => $group == 1 || $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->forfeit;
                            }
                        ],
                        [
                            'attribute' => 'base',
                            'value' => function($model)
                            {
                                return Debitor::$base[$model->base];
                            }
                        ],
                        'base_date',
                        'base_num',
                        [
                            'label' => 'Скан документа',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getDebitorFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'debitor',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'debitor',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'format'=>'html',
                            'contentOptions' => [
                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
                            ],
                            'attribute' => 'other',
                            'value' => function($model)
                            {
                                return $model->other;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


    <h1>Информация по имуществу и сделкам за последние 3 года</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($property as $key => $item){
        $property_view = $item->property_view;
        $group = $item->group;
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['property/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        [
                            'attribute' => 'group',
                            'value' => function($model)
                            {
                                return Property::$group[$model->group];
                            }
                        ],
                        [
                            'attribute' => 'property_type',
                            'value' => function($model)
                            {
                                return $model->group == 1 ? Property::$property_type[$model->property_type] : Property::$property_type_dvizh[$model->property_type];
                            }
                        ],
                        [
                            'attribute' => 'property_view',
                            'value' => function($model)
                            {
                                return Property::$property_view[$model->property_view];
                            }
                        ],

                        'share',
                        [
                            'attribute' => 'other_owners',
                            'visible' => $property_view == 3 ? true : false,
                            'value' => function($model)
                            {
                                return $model->other_owners;
                            }
                        ],
                        'active_name',
                        [
                            'attribute' => 'square',
                            'visible' => $group == 1 || !$group ? true : false,
                            'value' => function($model)
                            {
                                return $model->square;
                            }
                        ],
                        [
                            'attribute' => 'reg_number',
                            'visible' => $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->reg_number;
                            }
                        ],
                        [
                            'attribute' => 'vin_number',
                            'visible' => $group == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->reg_number;
                            }
                        ],
                        'date_sved',
                        'num_sved',
                        [
                            'label' => 'Скан свидетельства о регистрации',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getPropertyFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'property',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'property',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'label' => 'Скан иного документа подтверждающего право собственности',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getOtherPropertyFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'property',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'property',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        'coutry',
                        'region',
                        'district',
                        'city',
                        'street',
                        'house',
                        'corpus',
                        'office',
                        'post_index',
                        'cost',
                        [
                            'attribute' => 'active_status',
                            'value' => function($model)
                            {
                                return $model->active_status == 1 ? "Да" : "Нет";
                            }
                        ],
                        'zalog_name',
                        [
                            'attribute' => 'zalog',
                            'value' => function($model)
                            {
                                return Property::$zalog[$model->zalog];
                            }
                        ],
                        'zalog_post_index',
                        'zalog_dogovor',

                        [
                            'class' => 'kartik\grid\DataColumn',
                            'format'=>'html',
                            'contentOptions' => [
                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
                            ],
                            'attribute' => 'other',
                            'value' => function($model)
                            {
                                return $model->other;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


    <h1>Сведения о счтеха в банках и иных кредитных организациях</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($bank as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['bank/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        'name',
                        'post_address',
                        'number',
                        'bic',
                        [
                            'attribute' => 'type',
                            'value' => function($model)
                            {
                                return Bank::$type[$model->type];
                            }
                        ],
                        [
                            'attribute' => 'currency',
                            'value' => function($model)
                            {
                                return Bank::$currency[$model->currency];
                            }
                        ],
                        'date_open',
                        'balance',
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'format'=>'html',
                            'contentOptions' => [
                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
                            ],
                            'attribute' => 'other',
                            'value' => function($model)
                            {
                                return $model->other;
                            }
                        ],
                        [
                            'label' => 'Скан выписки по операциям счета за 3 года',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getBankFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'bank',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'bank',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


<!--    <h1>Сведения о счетха в банках и иных кредитных организациях</h1>-->
<!---->
<!--    --><?//
//    $i = 1;
//    $items = [];
//    foreach ($bank as $key => $item){
//        $items [] = [
//            'label' => "№ ".$i,
//            'content' =>
//                "<br><p>".
//                Html::a('Редактировать', ['bank/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
//                </p>".
//                DetailView::widget([
//                    'model' => $item,
//                    'attributes' => [
//                        //'id',
//                        //'ticket_id',
//                        'name',
//                        'post_address',
//                        'number',
//                        'bic',
//                        [
//                            'attribute' => 'type',
//                            'value' => function($model)
//                            {
//                                return Bank::$type[$model->type];
//                            }
//                        ],
//                        [
//                            'attribute' => 'currency',
//                            'value' => function($model)
//                            {
//                                return Bank::$currency[$model->currency];
//                            }
//                        ],
//                        'date_open',
//                        'balance',
//                        [
//                            'class' => 'kartik\grid\DataColumn',
//                            'format'=>'html',
//                            'contentOptions' => [
//                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
//                            ],
//                            'attribute' => 'other',
//                            'value' => function($model)
//                            {
//                                return $model->other;
//                            }
//                        ],
//                        [
//                            'label' => 'Скан выписки по операциям счета за 3 года',
//                            'format' => 'raw',
//                            'value' => function($model)
//                            {
//                                $str = "";
//                                if($files = $model->getBankFiles()->all()){
//                                    $str .= "<span>Файлы:</span><ul>";
//                                    foreach ($files as $file){
//                                        $str.= "<li id=\"".$file->id."\">
//                                <a href=\"".$file->getLink(true,'bank',$model->ticket_id)."\" target=\"_blank\">
//                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
//                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'bank',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
//                                    }
//                                    $str.= "</ul>";
//                                }
//                                return $str;
//                            }
//                        ],
//                        //'created_at',
//                        //'updated_at',
//                    ],
//                ]),
//
//            'active' => $i == 1 ?true : false
//        ];
//        $i++;
//    }
//    echo Tabs::widget([
//        'items' => $items,
//    ]);
//    ?>

    <h1>Сведения о акциях и ценных бумагах</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($shares as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['shares/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        'name',
                        'location',
                        'inn',
                        'company_capital',
                        'share',
                        'nominal_cost',
                        'shares_count',
                        'total_cost',
                        'dogovor_number',
                        'date',
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'format'=>'html',
                            'contentOptions' => [
                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
                            ],
                            'attribute' => 'other',
                            'value' => function($model)
                            {
                                return $model->other;
                            }
                        ],
                        [
                            'label' => 'Скан выписки из реестра акционеров',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getSharesFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'shares',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'shares',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                       // 'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>



    <h1>Инные ценные бумаги</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($other_shares as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['other-shares/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        'creater',
                        [
                            'attribute' => 'type',
                            'value' => function($model)
                            {
                                return OtherShares::$type[$model->type];
                            }
                        ],
                        'total_count',
                        'nominal_cost',
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'format'=>'html',
                            'contentOptions' => [
                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
                            ],
                            'attribute' => 'other',
                            'value' => function($model)
                            {
                                return $model->other;
                            }
                        ],
                        [
                            'label' => 'Скан документа подтверждающего обязательство',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getOtherSharesFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'other_shares',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'other_shares',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


    <h1>Наличные денежные средства и иное ценное имущество</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($valuable_property as $key => $item){
        $location = $item->location;
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['valuable-property/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        [
                            'attribute' => 'property_type',
                            'value' => function($model)
                            {
                                return ValuableProperty::$property_type[$model->property_type];
                            }
                        ],
                        'name',
                        'cost',
                        [
                            'attribute' => 'location',
                            'value' => function($model)
                            {
                                return ValuableProperty::$location[$model->location];
                            }
                        ],
                        'coutry',
                        'region',
                        'district',
                        'city',
                        'street',
                        'house',
                        'corpus',
                        'office',
                        'post_index',
                        [
                            'attribute' => 'org_name',
                            'visible' => $location  == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->org_name;
                            }
                        ],
                        [
                            'attribute' => 'dogovor_number',
                            'visible' => $location  == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->dogovor_number;
                            }
                        ],
                        [
                            'attribute' => 'dogovor_date',
                            'visible' => $location  == 2 ? true : false,
                            'value' => function($model)
                            {
                                return $model->dogovor_date;
                            }
                        ],
                        [
                            'label' => 'Скан договора',
                            'visible' => $location  == 2 ? true : false,
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getValuablePropertyFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'valuable_property',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'valuable_property',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'attribute' => 'active_status',
                            'value' => function($model)
                            {
                                return $model->active_status == 1 ? "Да" : "Нет";
                            }
                        ],
                        [
                            'attribute' => 'zalog_type',
                            'value' => function($model)
                            {
                                return ValuableProperty::$zalog_type[$model->zalog_type];
                            }
                        ],
                        'zalog_name',
                        'zalog_inn',
                        'zalog_address',
                        'zalog_dogovor',
                        [
                            'class' => 'kartik\grid\DataColumn',
                            'format'=>'html',
                            'contentOptions' => [
                                'style'=>'max-width:200px; overflow: auto; white-space: normal; word-wrap: break-word;'
                            ],
                            'attribute' => 'other',
                            'value' => function($model)
                            {
                                return $model->other;
                            }
                        ],
                       // 'created_at',
                       // 'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>

    <h1>Совершенные сделки за последние 3 года</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($deal as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['deal/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        [
                            'attribute' => 'type',
                            'value' => function($model)
                            {
                                return Deal::$type[$model->type];
                            }
                        ],
                        'description',
                        'date',
                        'name',
                        'inn',
                        [
                            'label' => 'Скан договора',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getDealFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'deal',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'deal',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


    <h1>Доходы и налоги</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($nalog as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['nalog/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        'work',
                        'year',
                        'income',
                        'nalog',
                        [
                            'label' => 'Скан справки 2 НДФЛ',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getNalogFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'nalog',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'nalog',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>


    <h1>Выплаты по исполнительным производствам</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($enforce_proc as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['enforce-proc/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        'number',
                        'date',
                        'sum',
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>

    <h1>Дополнительная информация</h1>

    <?
    $i = 1;
    $items = [];
    foreach ($other as $key => $item){
        $items [] = [
            'label' => "№ ".$i,
            'content' =>
                "<br><p>".
                Html::a('Редактировать', ['other/update', 'id' => $item->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $item,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        'text:ntext',
                        [
                            'label' => 'Скан файл',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getOtherFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'other',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'other',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]),

            'active' => $i == 1 ?true : false
        ];
        $i++;
    }
    echo Tabs::widget([
        'items' => $items,
    ]);
    ?>



    <h1>Информация об оплате</h1>
    <?if($proxy):?>
    <?=
                "<br><p>".
                Html::a('Редактировать', ['proxy/update', 'id' => $proxy->id ,'ticket_status_id' => $model->id], ['class' => 'btn btn-primary edit_button'])."
                </p>".
                DetailView::widget([
                    'model' => $proxy,
                    'attributes' => [
                        //'id',
                        //'ticket_id',
                        'cpo_id',
                        'proxy_number',
                        'proxy_date_start',
                        'proxy_date_end',
                        [
                            'label' => 'Скан файл доверенности',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getProxyFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'proxy',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'proxy',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'label' => 'Скан файл оплаты суммы на публикации',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getProxyPublFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'proxy',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'proxy');\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        [
                            'label' => 'Скан файл оплаты суммы депозита арбитражного суда',
                            'format' => 'raw',
                            'value' => function($model)
                            {
                                $str = "";
                                if($files = $model->getProxyDepFiles()->all()){
                                    $str .= "<span>Файлы:</span><ul>";
                                    foreach ($files as $file){
                                        $str.= "<li id=\"".$file->id."\">
                                <a href=\"".$file->getLink(true,'proxy',$model->ticket_id)."\" target=\"_blank\">
                                    ".StringHelper::truncate($file->origin,30,'...').".".$file->ext."
                                </a><a href='#' onclick=\"deleteImg(".$file->id.",'proxy',".$model->ticket_id.");\" ><svg aria-hidden=\"true\" style=\"display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z\"></path></svg></a></li>";
                                    }
                                    $str.= "</ul>";
                                }
                                return $str;
                            }
                        ],
                        //'created_at',
                        //'updated_at',
                    ],
                ]);?>

    <?endif;?>


</div>




