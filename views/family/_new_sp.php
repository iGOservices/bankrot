<?php

use app\models\Bank;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $brak app\models\Brak */
/* @var $razvod app\models\Razvod */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="sp-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"sp");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">Данные по Семейному положению №<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-6 col-md-6">
                        <div class="section-headline">
                            <h4> Свидетельство о браке</h4>
                        </div>
                        <!-- Accordion -->
                        <div class="accordion js-accordion">
                            <!-- Accordion Item -->
                            <div class="accordion__item js-accordion-item">
                                <div class="accordion-header js-accordion-header">Данные о браке</div>
                                <!-- Accordtion Body -->
                                <div class="accordion-body js-accordion-body">
                                    <!-- Accordion Content -->
                                    <div class="accordion-body__contents">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h4>Серия</h4>
                                                    <?= $form->field($brak, "[$increment]series")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h4>Номер</h4>
                                                    <?= $form->field($brak, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h4>Кем выдан</h4>
                                                    <?= $form->field($brak, "[$increment]given")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h4>Дата выдачи</h4>
                                                    <?= $form->field($brak, "[$increment]date")->widget(DatePicker::classname(), [
                                                        'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                                                        'class' => 'with-border',
                                                        'pluginOptions' => [
                                                            'autoclose'=>true,
                                                            'todayHighlight' => true,
                                                            'format' => 'yyyy-mm-dd'
                                                        ]
                                                    ])->label(false)?>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h4>Дата выдачи актовой записи</h4>
                                                    <?= $form->field($brak, "[$increment]number_act_date")->widget(DatePicker::classname(), [
                                                        'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                                                        'class' => 'with-border',
                                                        'pluginOptions' => [
                                                            'autoclose'=>true,
                                                            'todayHighlight' => true,
                                                            'format' => 'yyyy-mm-dd'
                                                        ]
                                                    ])->label(false)?>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <h4>Номер актовой записи</h4>
                                                    <?= $form->field($brak, "[$increment]number_act")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                    <?= $form->field($uploadForm,"[$increment]brak")->fileInput(['multiple' => true])->label(false) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion Body / End -->

                                <!-- Accordion Item / End -->
                            </div>
                            <!-- Accordion / End -->
                        </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="section-headline">
                        <h4> Свидетельство о разводе</h4>
                    </div>
                    <!-- Accordion -->
                    <div class="accordion js-accordion">
                        <!-- Accordion Item -->
                        <div class="accordion__item js-accordion-item">
                            <div class="accordion-header js-accordion-header">Данные о разводе</div>
                            <!-- Accordtion Body -->
                            <div class="accordion-body js-accordion-body">
                                <!-- Accordion Content -->
                                <div class="accordion-body__contents">
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h4>Серия</h4>
                                                <?= $form->field($razvod, "[$increment]series")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h4>Номер</h4>
                                                <?= $form->field($razvod, "[$increment]number")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h4>Кем выдан</h4>
                                                <?= $form->field($razvod, "[$increment]given")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h4>Дата выдачи</h4>
                                                <?= $form->field($razvod, "[$increment]date")->widget(DatePicker::classname(), [
                                                    'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                                                    'class' => 'with-border',
                                                    'pluginOptions' => [
                                                        'autoclose'=>true,
                                                        'todayHighlight' => true,
                                                        'format' => 'yyyy-mm-dd'
                                                    ]
                                                ])->label(false)?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h4>Дата выдачи актовой записи</h4>
                                                <?= $form->field($razvod, "[$increment]number_act_date")->widget(DatePicker::classname(), [
                                                    'options' => ['placeholder' => 'Введите дату', 'autocomplete' => 'off'],
                                                    'class' => 'with-border',
                                                    'pluginOptions' => [
                                                        'autoclose'=>true,
                                                        'todayHighlight' => true,
                                                        'format' => 'yyyy-mm-dd'
                                                    ]
                                                ])->label(false)?>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <h4>Номер актовой записи</h4>
                                                <?= $form->field($razvod, "[$increment]number_act")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                                                <?= $form->field($uploadForm,"[$increment]razvod")->fileInput(['multiple' => true])->label(false) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion Body / End -->

                            <!-- Accordion Item / End -->
                        </div>
                        <!-- Accordion / End -->
                    </div>
                </div>
                <div class="col-xl-12">
                    <hr>
                </div>
                <div class="col-xl-6">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h4>Брачный договор</h4>
                        <?= $form->field($uploadForm,"[$increment]brak_dogovor")->fileInput(['multiple' => true])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="submit-field" style="padding-left:30px;padding-right:30px;">
                        <h4>Соглашение о разделе имущества</h4>
                        <?= $form->field($uploadForm,"[$increment]property_division")->fileInput(['multiple' => true])->label(false) ?>
                    </div>
                </div>

			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


