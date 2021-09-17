<?php

/* @var $list \app\models\Message */

use app\models\Message;
use app\models\User;
use yii\helpers\StringHelper;

?>
    <?foreach ($list as $user):
        $message = Message::find()->where(['chat_id' => $user['chat_id']])->andWHere(['<>','user_id',Yii::$app->user->id])->orderBy('created_at DESC')->limit(1)->one();
        $user = User::findOne($user['chat_id']);
        ?>
        <li>
            <a href="#" onclick="selectChat(<?=$message->chat_id?>);" <?=$message->see == 0 ? "style=\"background-color: #ccccff\"" : ""  ?>>
                <div class="message-avatar"><img src="/images/user-avatar-small-03.jpg" alt="" /></div>

                <div class="message-by">
                    <div class="message-by-headline">
                        <h5><?=$user->username?></h5>
                        <span><?=$message->see == 0 ? "Новое сообщение!" : ""  ?></span>
                    </div>
                    <p><?=StringHelper::truncate($message->text,20,'...');?></p>
                </div>
            </a>
        </li>
    <?endforeach;?>

