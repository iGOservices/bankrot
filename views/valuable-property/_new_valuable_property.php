<?php

use app\models\Property;
use app\models\ValuableProperty;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Creditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $valuable_property app\models\Creditor */
/* @var $uploadForm app\models\UploadForm*/
/* @var $form yii\widgets\ActiveForm */
/* @var $increment */
?>
<!-- Accordion Item -->
<div id="<?="valuable_property-".$increment?>">
    <div class="del_icon">
        <span class="icon-feather-trash-2" onclick='deleteItem(<?=$increment?>,"valuable_property");'></span>
    </div>
    <div class="accordion__item js-accordion-item" style="float:left;width:98%">
	<div class="accordion-header js-accordion-header">№<?=$increment+1?>
	</div> 
	<!-- Accordtion Body -->
	<div class="accordion-body js-accordion-body">
		<!-- Accordion Content -->
		<div class="accordion-body__contents">
			<div class="row">
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Вид имущества</h4>
                        <?= $form->field($valuable_property, "[$increment]property_type")->dropDownList(ValuableProperty::$property_type,[ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Наименование</h4>
                        <?= $form->field($valuable_property, "[$increment]name")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Сумма(руб)</h4>
                        <?= $form->field($valuable_property, "[$increment]cost")->textInput(['maxlength' => true, 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Место нахождения</h4>
                        <?= $form->field($valuable_property, "[$increment]location")->dropDownList(ValuableProperty::$location, [ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>

                <div class="col-xl-12" >
                    <h4>Местонахождение: </h4>
                    <div style="border-top: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;padding:10px;margin:10px;">
                        <div class="row">
                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Страна</h4>
                                    <?= $form->field($valuable_property, "[$increment]coutry")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Регион</h4>
                                    <?= $form->field($valuable_property, "[$increment]region")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Район</h4>
                                    <?= $form->field($valuable_property, "[$increment]district")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Город</h4>
                                    <?= $form->field($valuable_property, "[$increment]city")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Улица</h4>
                                    <?= $form->field($valuable_property, "[$increment]street")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Дом</h4>
                                    <?= $form->field($valuable_property, "[$increment]house")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Корпус</h4>
                                    <?= $form->field($valuable_property, "[$increment]corpus")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Офис</h4>
                                    <?= $form->field($valuable_property, "[$increment]office")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-xl-2" style="padding-left:30px;padding-right:30px;">
                                <div class="submit-field ">
                                    <h4>Почт. индекс</h4>
                                    <?= $form->field($valuable_property, "[$increment]post_index")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Наименование организации</h4>
                        <?= $form->field($valuable_property, "[$increment]org_name")->textInput([ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Договор</h4>
                        <?= $form->field($uploadForm, "[$increment]valuable_property")->fileInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Номер договора</h4>
                        <?= $form->field($valuable_property, "[$increment]dogovor_number")->textInput([ 'class' => 'with-border '])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Дата договора</h4>
                        <?= $form->field($valuable_property, "[$increment]dogovor_date")->widget(DatePicker::classname(), [
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
                        <h4>Имя залогодержателя</h4>
                        <?= $form->field($valuable_property, "[$increment]zalog_name")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-3" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Залогодержатель</h4>
                        <?= $form->field($valuable_property, "[$increment]zalog_type")->dropDownList(ValuableProperty::$zalog_type,['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>ИНН залогодержателя</h4>
                        <?= $form->field($valuable_property, "[$increment]zalog_inn")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xl-1" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Статус</h4>
                        <?= $form->field($valuable_property, "[$increment]active_status")->checkbox(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>


                <div class="col-xl-4" style="padding-left:30px;padding-right:30px;">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="submit-field ">
                                <h4>Договор залога</h4>
                                <?= $form->field($valuable_property, "[$increment]zalog_dogovor")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-xl-12" >
                            <div class="submit-field ">
                                <h4>Почтовый адресс залогодержателя</h4>
                                <?= $form->field($valuable_property, "[$increment]zalog_address")->textInput(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8" style="padding-left:30px;padding-right:30px;">
                    <div class="submit-field ">
                        <h4>Примечание</h4>
                        <?= $form->field($valuable_property, "[$increment]other")->textArea(['maxlength' => true, 'class' => 'with-border'])->label(false) ?>
                    </div>
                </div>


			</div>
		</div>
	</div>
	<!-- Accordion Body / End -->
</div>
<!-- Accordion Item / End -->
</div>


