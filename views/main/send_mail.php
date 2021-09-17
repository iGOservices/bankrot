<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="dashboard-content-container" data-simplebar>
    <div class="dashboard-content-inner" >

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3>Оставить заявку</h3>

            <!-- Breadcrumbs -->
            <!--            <nav id="breadcrumbs" class="dark">-->
            <!--                <ul>-->
            <!--                    <li><a href="#">Home</a></li>-->
            <!--                    <li><a href="#">Dashboard</a></li>-->
            <!--                    <li>Post a Task</li>-->
            <!--                </ul>-->
            <!--            </nav>-->
        </div>
        <?
        $form = ActiveForm::begin([
            'id' => 'send-mail',
            'action' => '/main/send-mail',
            'enableClientValidation' => false,
            'enableAjaxValidation' => false,
            'options' => ['enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                'options' => [
                    'class' => 'form-group row'
                ]]]);?>
        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-xl-12">

                <div class="dashboard-box margin-top-0">

                    <!-- Headline -->
                    <div class="headline">
                        <h3><i class="icon-material-baseline-mail-outline"></i> Отправить Email администратору</h3>
                    </div>

                    <div class="content with-padding padding-bottom-10">
                        <div class="row">


                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Текст письма</h5>
                                    <textarea cols="30" rows="5" class="with-border" name="ClientTicket[text]"></textarea>
                                    <div class="uploadButton margin-top-30">
                                        <input class="uploadButton-input" type="file" name="UploadForm[mail][]" accept="image/*, application/pdf" id="send_mail" multiple/>
                                        <label class="uploadButton-button ripple-effect" for="send_mail">Прикрепить файлы</label>
                                        <span class="uploadButton-file-name send_mail">Не выбрано</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <?= Html::submitButton(" Отправить <i class=\"icon-material-baseline-mail-outline\"></i>", ['class' => 'button ripple-effect big margin-top-30']) ?>
            </div>


        </div>
        <!-- Row / End -->
        <?php ActiveForm::end(); ?>


    </div>
</div>

