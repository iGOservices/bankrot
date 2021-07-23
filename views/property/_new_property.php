<?php

use app\models\Property;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $property app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="property-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"property");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">№<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Группа</h4>
                        <?= $form->field($property, "[$increment]group")->dropDownList(Property::$group,[ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Вид имущества</h4>
                        <?= $form->field($property, "[$increment]property_type")->dropDownList(Property::$property_type,['class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Вид собственности</h4>
                        <?= $form->field($property, "[$increment]property_view")->dropDownList(Property::$property_view,[ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Доля владения</h4>
                        <?= $form->field($property, "[$increment]share")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Наименование актива</h4>
                        <?= $form->field($property, "[$increment]active_name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Иные собственники</h4>
                        <?= $form->field($property, "[$increment]other_owners")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>VIN номер</h4>
                        <?= $form->field($property, "[$increment]vin_number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Рег-ый номер</h4>
                        <?= $form->field($property, "[$increment]reg_number")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Дата свид-ва о рег-ии</h4>
                            <?= $form->field($property, "[$increment]date_sved")->widget(DatePicker::classname(), [
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
                        <h4>Номер св-ва о рег-ии</h4>
                        <?= $form->field($property, "[$increment]num_sved")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-1" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Площадь</h4>
                        <?= $form->field($property, "[$increment]square")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Стоимость</h4>
                        <?= $form->field($property, "[$increment]cost")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-2">
                    <?= $form->field($uploadForm, "[$increment]property")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>

                <div class="col-xl-12" >
                    <h4>Местонахождение: </h4>
                    <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
                        <div class="row">
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Страна</h4>
                                    <?= $form->field($property, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Регион</h4>
                                    <?= $form->field($property, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Район</h4>
                                    <?= $form->field($property, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Город</h4>
                                    <?= $form->field($property, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Улица</h4>
                                    <?= $form->field($property, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Дом</h4>
                                    <?= $form->field($property, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Корпус</h4>
                                    <?= $form->field($property, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Оффис</h4>
                                    <?= $form->field($property, "[$increment]office")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Почт. индекс</h4>
                                    <?= $form->field($property, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Статус актива</h4>
                        <?= $form->field($property, "[$increment]active_status")->checkbox()->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Имя залогодержателя</h4>
                        <?= $form->field($property, "[$increment]zalog_name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Залогодержатель</h4>
                        <?= $form->field($property, "[$increment]zalog")->dropDownList(Property::$zalog, ['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>ИНН залогодержателя</h4>
                        <?= $form->field($property, "[$increment]zalog_inn")->textInput(['maxlength' => 12, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Поч-ый адресс залогодержателя</h4>
                        <?= $form->field($property, "[$increment]zalog_post_index")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Договор залога</h4>
                        <?= $form->field($property, "[$increment]zalog_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-9" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Основание приобретения</h4>
                        <?= $form->field($property, "[$increment]own_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <?= $form->field($uploadForm, "[$increment]other_property")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                </div>

                <div class="col-xl-12" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Договор залога</h4>
                        <?= $form->field($property, "[$increment]other")->textarea(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>


			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


