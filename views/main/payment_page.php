<?php ?>


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Оплата предоставленной услуги</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="/main/index">Заполнение услуги</a></li>
                        <li>Оплата услуги</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 content-right-offset">


            <!-- Hedaline -->
            <p><span style="font-size: 20px;color: black;">Услуга: </span><?=$service->title?></p>

            <p><span style="font-size: 20px;color: black;">Описание услуги: </span><?=$service->description?></p>



                        <div class="row">
                            <div class="col-xl-4 col-md-4">
                                <div class="section-headline margin-bottom-12">
                                    <h5>Промокод</h5>
                                </div>
                                <input class="with-border" placeholder="" id="promocode">
                            </div>
                            <div class="col-xl-4 col-md-4" style="margin-top: 42px">
                                <a href="#"  onclick="activatePromocode(<?=$service->id?>,<?=$service->price?>);" class=" button full-width button-sliding-icon">Применить <i class="icon-material-outline-arrow-right-alt"></i></a>
                            </div>
                    </div>

                        <a href="/main/save-payment" onclick="setCookie('tab', 0);" class="button big ripple-effect margin-top-40 margin-bottom-65">Оплатить услугу</a>
            </div>


        <!-- Summary -->
        <div class="col-xl-4 col-lg-4 margin-top-0 margin-bottom-60">

            <!-- Summary -->
            <div class="boxed-widget summary margin-top-0">
                <div class="boxed-widget-headline">
                    <h3>К оплате</h3>
                </div>
                <div class="boxed-widget-inner">
                    <ul>
                        <li>Стоимость услуги <span><?=$service->price?> рублей</span></li>
                        <li id="discount"></li>
                        <li class="total-costs" id="total">Всего к оплате <span><?=$service->price?> рублей</span></li>
                    </ul>
                </div>
            </div>
            <!-- Summary / End -->

            <!-- Checkbox -->
            <div class="checkbox margin-top-30">
                <input type="checkbox" id="two-step">
                <label for="two-step"><span class="checkbox-icon"></span>Я согласен с условиями <a href="#">оплаты</a></label>
            </div>
        </div>

    </div>
</div>
<div class="dashboard-footer-spacer"></div>