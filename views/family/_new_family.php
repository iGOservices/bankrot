<?php

use app\models\Bank;
use app\models\Family;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $family app\models\Family */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="family-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"family");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по Родственным отношениям №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Тип родства</h4>
                        <?= $form->field($family,"[$increment]type")->dropDownList(Family::$type,[ 'class' => 'with-border'])->label(false)  ?>
                    </div>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Имя</h4>
                        <?= $form->field($family,"[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                    </div>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Фамилия</h4>
                        <?= $form->field($family,"[$increment]surname")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                    </div>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Отчество</h4>
                        <?= $form->field($family,"[$increment]patronymic")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field">
                        <h4>Дата рождения</h4>
                        <?= $form->field($family, "[$increment]birthday")->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                            'class' => 'with-border',
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'todayHighlight' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4">
                        <div class="submit-field">
                            <h4>ИНН</h4>
                            <?= $form->field($family,"[$increment]inn")->textInput(['maxlength' => 12, 'class' => 'with-border'])->label(false) ?>
                        </div>
                </div>

                <div class="col-xl-12" >
                    <h4>Свидетельство о рождении: </h4>
                    <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
                        <div class="row">

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Страна выдачи</h4>
                                    <?= $form->field($family,"[$increment]birth_country")->dropDownList(Family::$birth_country,[ 'class' => 'with-border'])->label(false)  ?>
                                </div>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Серия</h4>
                                    <?= $form->field($family,"[$increment]birth_series")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                </div>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Номер</h4>
                                    <?= $form->field($family,"[$increment]birth_number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                </div>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field">
                                    <h4>Дата выдачи счидетельства</h4>
                                    <?= $form->field($family,"[$increment]birth_date")->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                                        'class' => 'with-border',
                                        'pluginOptions' => [
                                            'autoclose'=>true,
                                            'todayHighlight' => true,
                                            'format' => 'yyyy-mm-dd'
                                        ]
                                    ])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Номер актовой записи</h4>
                                    <?= $form->field($family,"[$increment]birth_number_act")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                </div>
                            </div>
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Дата актовой записи</h4>
                                    <?= $form->field($family,"[$increment]birth_number_act_date")->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                                        'class' => 'with-border',
                                        'pluginOptions' => [
                                            'autoclose'=>true,
                                            'todayHighlight' => true,
                                            'format' => 'yyyy-mm-dd'
                                        ]
                                    ])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Кем выдан</h4>
                                    <?= $form->field($family,"[$increment]given")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false)  ?>
                                </div>
                            </div>

                            <div class="col-xl-2">
                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                    <h4>Скан файл</h4>
                                    <?= $form->field($uploadForm,"[$increment]birth")->fileInput(['multiple' => true])->label(false) ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>






			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


