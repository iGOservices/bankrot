<?php

/* @var $proxy app\models\Proxy */
/* @var $uploadForm app\models\UploadForm */
/* @var $directory app\models\Directory */

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;

?>

<div class="proxy-form">

    <?php $form = ActiveForm::begin([
        'id' => 'proxy',
        'action' => '/proxy/save-model',
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?//= $form->field($proxy, 'ticket_id')->textInput() ?>
    <div class="row">
        <div class="col-xl-12">
                <div class="submit-field ">
                    <h5>Поле выбора СПО(саморегулируемая организация)</h5>
                    <?= $form->field($proxy, 'cpo_id')->dropDownList([1,2],[ 'class' => 'with-border select_list' ])->label(false)  ?>
                </div>
        </div>
    </div>
    <div class="accordion js-accordion">
        <!-- Accordion Item -->
        <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Доверенность</div>
            <!-- Accordtion Body -->
            <div class="accordion-body js-accordion-body" style="display: none;">
                <div class="accordion-body__contents">
                    <div class="row">
                        <?= $form->field($proxy,"id")->hiddenInput([])->label(false); ?>
                        <div class="col-xl-3">

                                <div class="submit-field">
                                    <h5>Номер доверенности</h5>
                                    <?= $form->field($proxy, 'proxy_number')->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                </div>

                        </div>
                        <div class="col-xl-3">

                                <div class="submit-field">
                                    <h5>Дата выдачи</h5>
                                    <?= $form->field($proxy, 'proxy_date_start')->widget(DatePicker::classname(), [
                                        'options' => [
                                            'placeholder' => 'Введите дату',
                                            'autocomplete' => 'off',
                                            'class' => 'with-border',
                                        ],
                                        'pluginOptions' => [
                                            'autoclose'=>true,
                                            'todayHighlight' => true,
                                            'format' => 'yyyy-mm-dd'
                                        ]
                                    ])->label(false) ?>
                                </div>

                        </div>
                        <div class="col-xl-3">

                            <div class="submit-field">
                                <h5>Дата окончания</h5>
                                <?= $form->field($proxy, 'proxy_date_end')->widget(DatePicker::classname(), [
                                    'options' => [
                                        'placeholder' => 'Введите дату',
                                        'autocomplete' => 'off',
                                        'class' => 'with-border',
                                    ],
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'todayHighlight' => true,
                                        'format' => 'yyyy-mm-dd'
                                    ]
                                ])->label(false) ?>
                            </div>

                        </div>
                        <div class="col-xl-3">

                                <div class="submit-field">
                                    <h5>Скан файл доверенности</h5>

                                    <?= $form->field($uploadForm, "proxy[]", [
                                        'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="proxy_upload">Загрузить файл</label>
											<span class="uploadButton-file-name proxy_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => 'proxy_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                                    <? if(isset($model) && $files = $proxy->getProxyFiles()->all()): ?>
                                        <ul style="list-style: none;">
                                            <span>Загруженные файлы</span>
                                            <?foreach ($files as $file):?>
                                                <li id="<?=$file->id?>">
                                                    <a href="<?= $file->getLink(true,'proxy',$proxy->ticket_id) ?>" target="_blank">
                                                        <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                                    </a>
                                                    <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='proxy'?>',<?=$proxy->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                                                </li>
                                            <?endforeach;?>
                                        </ul>
                                    <? endif; ?>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Body / End -->
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-6">

            <div class="submit-field">
                <h5>Скан файл оплаты суммы на публикации</h5>

                <?= $form->field($uploadForm, "proxy_publ[]", [
                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="proxy_publ_upload">Загрузить файл</label>
											<span class="uploadButton-file-name proxy_publ_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => 'proxy_publ_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                <? if(isset($model) && $files = $proxy->getProxyPublFiles()->all()): ?>
                    <ul style="list-style: none;">
                        <span>Загруженные файлы</span>
                        <?foreach ($files as $file):?>
                            <li id="<?=$file->id?>">
                                <a href="<?= $file->getLink(true,'proxy') ?>" target="_blank">
                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                </a>
                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='proxy'?>'<?=$proxy->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                            </li>
                        <?endforeach;?>
                    </ul>
                <? endif; ?>
            </div>

        </div>
        <div class="col-xl-6">

            <div class="submit-field">
                <h5>Скан файл оплаты суммы депозита арбитражного суда</h5>

                <?= $form->field($uploadForm, "proxy_dep[]", [
                    'template' => '<div class="uploadButton">{input}
											<label class="uploadButton-button ripple-effect" for="proxy_dep_upload">Загрузить файл</label>
											<span class="uploadButton-file-name proxy_dep_upload">Файл не выбран</span>
										
										 </div>'])->fileInput(['multiple' => true, 'id' => 'proxy_dep_upload', 'class' => 'uploadButton-input'], false)->label(false)?>

                <? if(isset($model) && $files = $proxy->getProxyDepFiles()->all()): ?>
                    <ul style="list-style: none;">
                        <span>Загруженные файлы</span>
                        <?foreach ($files as $file):?>
                            <li id="<?=$file->id?>">
                                <a href="<?= $file->getLink(true,'proxy') ?>" target="_blank">
                                    <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,10,'...');?>
                                </a>
                                <a href='#' onclick="deleteImg(<?=$file->id?>,'<?='proxy'?>'<?=$proxy->ticket_id?>);" ><span class="icon-feather-trash-2"></span></a>
                            </li>
                        <?endforeach;?>
                    </ul>
                <? endif; ?>
            </div>

        </div>
    </div>
    <div class="row" style="margin-top:30px;">
        <div class="center-block">
            <div class="row" >
                <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>





</div>
