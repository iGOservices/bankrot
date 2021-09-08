<?php

/* @var $tickets app\models\ClientTicket */

setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');

?>

        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Мои тикеты</h3>

                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="/main/index">Создать новый тикет</a></li>
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
                                <h3><i class="icon-material-outline-business-center"></i>Мои тикеты</h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    <?if(isset($tickets)):?>
                                        <?foreach ($tickets as $ticket):?>
                                        <li>
                                            <!-- Job Listing -->
                                            <div class="row" style="width:100%;">
                                                <div class="job-listing col-xl-6">

                                                    <!-- Job Listing Details -->
                                                    <div class="job-listing-details">

                                                        <!-- Logo -->
                                                        <!-- 											<a href="#" class="job-listing-company-logo">
                                                                                                        <img src="images/company-logo-05.png" alt="">
                                                                                                    </a> -->

                                                        <!-- Details -->
                                                        <div class="job-listing-description">
                                                            <h3 class="job-listing-title"><a href="#">Тикет №<?=$ticket->id?></a> <span class="dashboard-status-button green">Успешно завершен</span></h3>

                                                            <!-- Job Listing Footer -->
                                                            <div class="job-listing-footer">
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <i class="icon-line-awesome-user"></i><?=$ticket->surname." ".$ticket->name." ".$ticket->patronymic?>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <i class="icon-material-outline-date-range"></i><?=strftime("%d %B %Y", $ticket->created_at)?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="upload-block col-xl-6">
                                                    <div class="submit-field">

                                                        <!-- Attachments -->
                                                        <div class="attachments-container margin-top-0 margin-bottom-0">
                                                            <a href="/upload/<?=$ticket->id?>/pdf/bankrot_blank.pdf">
                                                                <div class="attachment-box ripple-effect" data-tippy-placement="top" title="Заявление о признании гражданина банкротом">
                                                                    <span>bankrot.1</span>
                                                                    <i>PDF</i>
                                                                </div>
                                                            </a>
                                                            <a href="/upload/<?=$ticket->id?>/pdf/creditor.pdf">
                                                                <div class="attachment-box ripple-effect" data-tippy-placement="top" title="Список кредиторов и должников гражданина">
                                                                    <span>bankrot.2</span>
                                                                    <i>PDF</i>
                                                                </div>
                                                            </a>
                                                            <a href="/upload/<?=$ticket->id?>/pdf/property.pdf">
                                                                <div class="attachment-box ripple-effect" data-tippy-placement="top" title="Опись имущества гражданина">
                                                                    <span>bankrot.3</span>
                                                                    <i>PDF</i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="buttons-to-right always-visible">
                                                <a href="/main/ticket-detail?id=<?=$ticket->id?>" class="button ripple-effect"><i class="icon-feather-eye"></i> Посмотреть детали</a>
                                                <a href="#" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                                <a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
                                            </div>
                                        </li>
                                        <?endforeach;?>
                                    <?endif;?>

                                    <li>
                                        <!-- Job Listing -->
                                        <div class="job-listing">

                                            <!-- Job Listing Details -->
                                            <div class="job-listing-details">

                                                <!-- Details -->
                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title"><a href="#">Full Stack PHP Developer</a> <span class="dashboard-status-button yellow">Expiring</span></h3>

                                                    <!-- Job Listing Footer -->
                                                    <div class="job-listing-footer">
                                                        <ul>
                                                            <li><i class="icon-material-outline-date-range"></i> Posted on 28 June, 2018</li>
                                                            <li><i class="icon-material-outline-date-range"></i> Expiring on 28 July, 2018</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="buttons-to-right always-visible">
                                            <a href="dashboard-manage-candidates.html" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">3</span></a>
                                            <a href="#" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                            <a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
                                        </div>
                                    </li>

                                    <li>
                                        <!-- Job Listing -->
                                        <div class="job-listing">

                                            <!-- Job Listing Details -->
                                            <div class="job-listing-details">

                                                <!-- Details -->
                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title"><a href="#">Node.js Developer</a> <span class="dashboard-status-button red">Expired</span></h3>

                                                    <!-- Job Listing Footer -->
                                                    <div class="job-listing-footer">
                                                        <ul>
                                                            <li><i class="icon-material-outline-date-range"></i> Posted on 16 May, 2018</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="buttons-to-right always-visible">
                                            <a href="dashboard-manage-candidates.html" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">7</span></a>
                                            <a href="#" class="button dark ripple-effect"><i class="icon-feather-rotate-ccw"></i> Refresh</a>
                                            <a href="#" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                            <a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
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

