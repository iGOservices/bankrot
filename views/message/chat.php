<?php
/* @var $type string */
/* @var $list app\models\Message */
/* @var $dialog app\models\Message */


if($type == "admin"){
    $this->registerCssFile('css/style.css', ['depends' => [yii\web\JqueryAsset::className()]]);
}
$this->registerJsFile('js/chat.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>

        <!-- Dashboard Content
        ================================================== -->

            <div class="dashboard-content-inner" >

                <?if($type != "admin"):?>
                <div class="dashboard-headline">
                    <h3>Чат с администратором</h3>
<!---->
<!---->
<!--                    <nav id="breadcrumbs" class="dark">-->
<!--                        <ul>-->
<!--                            <li><a href="#">Home</a></li>-->
<!--                            <li><a href="#">Dashboard</a></li>-->
<!--                            <li>Messages</li>-->
<!--                        </ul>-->
<!--                    </nav>-->
                </div>
                <?endif?>

                <div class="messages-container margin-top-0">

                    <div class="messages-container-inner">

                        <!-- Messages -->
                    <?if($type == "admin" && $list):?>
                        <div class="messages-inbox">
                            <div class="messages-headline">
                                <p>Список пользователей</p>
<!--                                <div class="input-with-icon">-->
<!--                                    <input id="autocomplete-input" type="text" placeholder="Search">-->
<!--                                    <i class="icon-material-outline-search"></i>-->
<!--                                </div>-->
                            </div>

                            <ul id="user_list">
                                <?= $this->render('_user_list',[
                                    'list' => $list,
                                ]);?>
                            </ul>
                        </div>
                        <!-- Messages / End -->
                    <?endif?>

                        <!-- Message Content -->
                        <div class="message-content" id="dialog_page" style="height: 700px">
                            <?if($type == "user"):?>
                                <?= $this->render('_dialog_page',[
                                        "dialog" => $dialog,
                                        "user" => $user,
                                ]);?>
                            <?endif;?>
                        </div>
                        <!-- Message Content -->

                    </div>
                </div>
                <!-- Messages Container / End -->


            </div>

        <!-- Dashboard Content / End -->
