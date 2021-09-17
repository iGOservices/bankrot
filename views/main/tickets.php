<?php

/* @var $tickets app\models\ClientTicket */

use app\models\ClientTicket;
use app\models\TicketStatus;
use app\models\Upload;
use yii\helpers\StringHelper;

setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');

$ticket_id = ClientTicket::getActiveTicket();

?>

        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Список моих услуг</h3>

                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <?if(!$ticket_id):?>
                                <li><a href="/main/index">Создать новую услугу</a></li>
                            <?else:?>
                                <li><a href="/main/index">Продолжить заполнение услуги</a></li>
                            <?endif;?>
                        </ul>
                    </nav>
                </div>
<!--                <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a>-->

                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-business-center"></i>Мои  услуги</h3>
                            </div>

                            <div class="content">
                                <?if($tickets):?>
                                    <ul class="dashboard-box-list">

                                        <?foreach ($tickets as $ticket):?>
                                        <? $let = TicketStatus::find()->where(['ticket_id'=> $ticket->id])->one();
                                            //echo"<pre>"; print_r($let['status']);die();
                                            if($let['status'] == 0){
                                                $span = "<span class=\"dashboard-status-button yellow\">В процессе</span>";
                                            }elseif($let['status']  == 1){
                                                $span = "<span class=\"dashboard-status-button green\">Завершена</span>";
                                            }elseif($let['status']  == 3){
                                                $span = "<span class=\"dashboard-status-button green\">В работе у администратора</span>";
                                            }else{
                                                $span = "<span class=\"dashboard-status-button red\">Отменен</span>";
                                            }
                                        ?>
                                        <li>
                                            <!-- Job Listing -->
                                            <div class="row" style="width:100%;margin-left: 10px">
                                                <div class="job-listing col-xl-6">

                                                    <!-- Job Listing Details -->
                                                    <div class="job-listing-details">

                                                        <!-- Logo -->
                                                        <!-- 											<a href="#" class="job-listing-company-logo">
                                                                                                        <img src="images/company-logo-05.png" alt="">
                                                                                                    </a> -->

                                                        <!-- Details -->
                                                        <div class="job-listing-description">
                                                            <h3 class="job-listing-title"><a href="#">Услуга №<?=$ticket->id?></a><?=$span?></h3>

                                                            <!-- Job Listing Footer -->
                                                            <div class="job-listing-footer">
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <i class="icon-line-awesome-user"></i><?=$ticket->surname." ".$ticket->name." ".$ticket->patronymic?>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <i class="icon-material-outline-date-range"></i><?=strftime("%d %B %Y", $ticket->updated_at)?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="upload-block col-xl-6">
                                                    <div class="submit-field">
                                                        <?$files = Upload::find()->where(['model_id' => $ticket->id])->andWhere(['model' => 'user_docs'])->all();?>
                                                        <?if($files):?>
                                                        <p>Список сформированных документов:</p>
                                                            <ul class="list-1">
                                                            <?foreach ($files as $file):?>
                                                                <li id="<?=$file->id?>">
                                                                    <a href="<?= $file->getLink(true,'user_docs',$ticket->id) ?>" target="_blank">
                                                                        <span class="icon-line-awesome-file"></span> <?=StringHelper::truncate($file->origin,100,'...');?>
                                                                     </a>
                                                                </li>
                                                            <?endforeach;?>
                                                            </ul>
<!---->

<!--                                                        <div class="attachments-container margin-top-0 margin-bottom-0">-->
<!--                                                            <a href="/upload/--><?//=$ticket->id?><!--/user_docs/bankrot_blank.pdf">-->
<!--                                                                <div class="attachment-box ripple-effect" data-tippy-placement="top" title="Заявление о признании гражданина банкротом">-->
<!--                                                                    <span>bankrot.1</span>-->
<!--                                                                    <i>PDF</i>-->
<!--                                                                </div>-->
<!--                                                            </a>-->
<!--                                                            <a href="/upload/--><?//=$ticket->id?><!--/user_docs/creditor.pdf">-->
<!--                                                                <div class="attachment-box ripple-effect" data-tippy-placement="top" title="Список кредиторов и должников гражданина">-->
<!--                                                                    <span>bankrot.2</span>-->
<!--                                                                    <i>PDF</i>-->
<!--                                                                </div>-->
<!--                                                            </a>-->
<!--                                                            <a href="/upload/--><?//=$ticket->id?><!--/user_docs/property.pdf">-->
<!--                                                                <div class="attachment-box ripple-effect" data-tippy-placement="top" title="Опись имущества гражданина">-->
<!--                                                                    <span>bankrot.3</span>-->
<!--                                                                    <i>PDF</i>-->
<!--                                                                </div>-->
<!--                                                            </a>-->
<!--                                                        </div>-->
                                                        <?else:?>
                                                            <p>Список сформированных документов пуст!<br> Сначала заполните форму и оплатите услугу.</p>
                                                        <?endif;?>
                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="buttons-to-right always-visible">
                                                <?if($let['status'] == 0):?>
                                                    <a href="/main/index" class="button ripple-effect">Продолжить заполнение</a>
                                                <?else:?>
                                                    <a href="/main/ticket-detail?id=<?=$ticket->id?>" class="button ripple-effect"><i class="icon-feather-eye"></i> Посмотреть загруженые файлы</a>
                                                <?endif;?>


                                                <a href="/message/chat?type=user" class="button gray ripple-effect ico" title="Связаться с администратором" data-tippy-placement="top"><i class="icon-feather-message-circle"></i></a>
                                                </div>
                                        </li>
                                        <?endforeach;?>


<!--                                    <li>-->

<!--                                        <div class="job-listing">-->
<!---->

<!--                                            <div class="job-listing-details">-->
<!---->

<!--                                                <div class="job-listing-description">-->
<!--                                                    <h3 class="job-listing-title"><a href="#">Full Stack PHP Developer</a> <span class="dashboard-status-button yellow">Expiring</span></h3>-->
<!---->

<!--                                                    <div class="job-listing-footer">-->
<!--                                                        <ul>-->
<!--                                                            <li><i class="icon-material-outline-date-range"></i> Posted on 28 June, 2018</li>-->
<!--                                                            <li><i class="icon-material-outline-date-range"></i> Expiring on 28 July, 2018</li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->

<!--                                        <div class="buttons-to-right always-visible">-->
<!--                                            <a href="dashboard-manage-candidates.html" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">3</span></a>-->
<!--                                            <a href="#" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>-->
<!--                                            <a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!---->
<!--                                    <li>-->

<!--                                        <div class="job-listing">-->
<!---->

<!--                                            <div class="job-listing-details">-->
<!---->

<!--                                                <div class="job-listing-description">-->
<!--                                                    <h3 class="job-listing-title"><a href="#">Node.js Developer</a> <span class="dashboard-status-button red">Expired</span></h3>-->
<!---->

<!--                                                    <div class="job-listing-footer">-->
<!--                                                        <ul>-->
<!--                                                            <li><i class="icon-material-outline-date-range"></i> Posted on 16 May, 2018</li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->

<!--                                        <div class="buttons-to-right always-visible">-->
<!--                                            <a href="dashboard-manage-candidates.html" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">7</span></a>-->
<!--                                            <a href="#" class="button dark ripple-effect"><i class="icon-feather-rotate-ccw"></i> Refresh</a>-->
<!--                                            <a href="#" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>-->
<!--                                            <a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>-->
<!--                                        </div>-->
<!--                                    </li>-->

                                </ul>
                                <?else:?>
                                    <ul class="dashboard-box-list">
                                        <li>
                                            <p>У вас еще нет оплаченных услуг</p>
                                        </li>
                                    </ul>
                                <?endif;?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row / End -->



            </div>
        </div>

