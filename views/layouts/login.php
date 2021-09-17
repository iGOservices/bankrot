<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
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



        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- Titlebar
        ================================================== -->
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

<!--                        <h2>Название компании*</h2>-->

                    </div>
                </div>
            </div>
        </div>


        <!-- Page Content
        ================================================== -->
        <div class="container">
            <div class="row">
                <div class="col-xl-5 offset-xl-3">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>


            <!-- Spacer -->
            <div class="margin-top-70"></div>
            <!-- Spacer / End-->


        </div>
        <!-- Wrapper / End -->

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
