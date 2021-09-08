<?php

/* @var $ticket app\models\ClientTicket */
/* @var $upload app\models\Upload */

use app\models\Upload;

?>
        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Детали тикета №<?=$ticket->id?></h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="/main/tickets">Мои тикеты</a></li>
                            <li>Детали тикета</li>
                        </ul>
                    </nav>
                </div>

                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">
                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-library-books"></i> Информация по конкретному тикету</h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    <li>
                                        <!-- Overview -->
                                        <div class="freelancer-overview manage-candidates">
                                            <div class="freelancer-overview-inner">


                                                <!-- Name -->
                                                <div class="freelancer-name">
                                                    <h5><a href="#"><?=$ticket->surname." ".$ticket->name." ".$ticket->patronymic?></a></h5>

                                                    <!-- Details -->
                                                    <span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i><?=$ticket->mail?></a></span>
                                                    <span class="freelancer-detail-item"><i class="icon-feather-phone"></i><?=$ticket->phone?></span>

                                                    <!-- Buttons -->
<!--                                                    <div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">-->
<!--                                                        <a href="#" class="button ripple-effect"><i class="icon-feather-file-text"></i> Download CV</a>-->
<!--                                                        <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a>-->
<!--                                                        <a href="#" class="button gray ripple-effect ico" title="Remove Candidate" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>-->
<!--                                                    </div>-->

                                                    <br>Здесь можно вывести информацию по тикету!
                                                </div>
                                            </div>
                                        </div>


                                    </li>
                                    <li>
                                        <div class="freelancer-name">
                                        <h5>Файлы,загружаемые пользователем:</h5>
                                            <!-- Attachments -->
                                            <?if(isset($upload) && isset($ticket)):?>
                                                <?$pointer = 0;?>
                                                <?$folder = null;?>
                                                <?foreach ($upload as $key => $file):?>
                                                    <?if($folder != $file->folder):?>
                                                        <h5><i class="icon-material-outline-folder"></i> <?=Upload::$folder[$file->folder]?>:</h5>
                                                        <div class="attachments-container margin-top-0 margin-bottom-0">
                                                    <?endif;?>
                                                        <a href="<?="/upload/".$ticket->id."/".$file->folder."/".$file->name.".".$file->ext?>">
                                                            <div class="attachment-box ripple-effect">
                                                                <span><?=$file->origin?></span>
                                                                <i><?=$file->ext?></i>
                                                            </div>
                                                        </a>
                                                    <?if(isset($upload[$key+1]->folder)):?>
                                                        <?if($upload[$key+1]->folder!= $upload[$key]->folder):?>
                                                            </div>
                                                        <?endif;?>
                                                    <?endif;?>
                                                    <?$folder = $file->folder?>
                                                <?endforeach;?>
                                            <?endif;?>
                                        </div>
                                    </li>


                                </ul>


                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row / End -->



            </div>
        </div>
        <!-- Dashboard Content / End -->