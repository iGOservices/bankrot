<?php

/* @var $dialog app\models\Message */
/* @var $user app\models\User */

?>

<div class="messages-headline">
    <?if(Yii::$app->user->can('adminAccess')):?>
    <input hidden value="<?=$user->id?>" id="chat_id">

    <h4><?=$user->username?></h4>
    <a href="/user/view?id=<?=$user->id?>" class="message-action"> Список услуг пользователя</a>
    <?else:?>
        <input hidden value="<?=Yii::$app->user->id?>" id="chat_id">
        <h4>Администратор</h4>
<!--        <a href="#" class="message-action"><i class="icon-feather-trash-2"></i> Delete Conversation</a>-->
    <?endif?>
</div>

<!-- Message Content Inner -->
<div class="message-content-inner" id="scroll">

    <?foreach ($dialog as $message):?>
<!--        <div class="message-time-sign">-->
<!--            <span>28 June, 2018</span>-->
<!--        </div>-->

        <?if($message->user_id == Yii::$app->user->id): ?>
            <div class="message-bubble me">
                <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="/images/user-avatar-small-03.jpg" alt="" /></div>
                    <div class="message-text"><p><?=$message->text?></p></div>
                </div>
                <div class="clearfix"></div>
            </div>
        <?else:?>

            <div class="message-bubble">
                <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="/images/user-avatar-small-03.jpg" alt="" /></div>
                    <div class="message-text"><p><?=$message->text?></p></div>
                </div>
                <div class="clearfix"></div>
            </div>
        <?endif;?>

    <?endforeach;?>

</div>
<!-- Message Content Inner / End -->

<!-- Reply Area -->
<div class="message-reply">

    <textarea cols="1" rows="1" placeholder="Ваше сообщение" data-autoresize id="message_area"></textarea>
    <button class="button ripple-effect" onclick="sendMessage(<?=$user->id?>);">Отправить</button>
</div>
