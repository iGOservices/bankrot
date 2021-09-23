<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Message;
use app\models\User;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

$user = User::findOne(Yii::$app->user->id);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body class="gray">
    <?php $this->beginBody() ?>

    <!-- Wrapper -->
    <div id="wrapper">



        <!-- Dashboard Container -->
        <div class="dashboard-container">


            <!-- Dashboard Content
            ================================================== -->
            <div class="dashboard-content-container" data-simplebar>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
                <!-- Footer -->
                <!--        <div class="dashboard-footer-spacer"></div>-->

                <!-- Footer / End -->
            </div>
            <!-- Dashboard Content / End -->


        </div>
        <!-- Dashboard Container / End -->

    </div>



    <!-- Edit Review Popup
    ================================================== -->
    <div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab1">



                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="change-review-form">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>

                </div>

            </div>
        </div>
    </div>
    <!-- Edit Review Popup / End -->


    <!-- Wrapper / End -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>