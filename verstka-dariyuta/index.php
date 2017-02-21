<? include 'include/header.php'; ?>
<div class="content">
    <div class="index-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9 index-top-center">
                    <div class="index-top-left"></div>
                    <img src="/images/index-top.jpg" class="inset text-right">
                    <div class="index-top-promo">
                        <div>
                            <b>Скидка <span class="index-top-promo-perc">40%</span></b><br>
                            на коллекцию<br>
                            On&nbsp;The&nbsp;Line
                        </div>
                        <div class="index-top-promo-price">
                            <span class="strike">3 344</span> - <span class="strong">2 690 ₶</span> <a href="#" class="index-top-promo-btn">подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="hidden-xs hidden-sm col-md-3 index-top-right">
                    <div class="index-product-week">
                        <div class="index-product-week-title">Товар недели</div>
                        <div class="index-product-week-img"><img src="/images/index-product-week.png"></div>
                        <div class="index-product-week-name">Mountain Peaks Pillow</div>
                        <div class="index-product-week-price">2 690 ₶</div>
                        <div class="index-product-week-descr">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                            caecati cupiditate</div>
                        <a class="btn btn-yellow btn-block" href="#">купить</a>
                    </div>
                </div>
            </div>
            <div class="index-top-right-right"></div>
        </div>
    </div>

    <div class="lilac-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="row index-prop">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="index-prop-item ">
                                <div class="index-prop-item-img "><img src="/images/ico-index-prop-1.png"></div>
                                <div class="index-prop-item-title ">Доставка</div>
                                <div class="index-prop-item-desc ">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="index-prop-item ">
                                <div class="index-prop-item-img "><img src="/images/ico-index-prop-2.png"></div>
                                <div class="index-prop-item-title ">Скидки</div>
                                <div class="index-prop-item-desc ">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="index-prop-item ">
                                <div class="index-prop-item-img "><img src="/images/ico-index-prop-3.png"></div>
                                <div class="index-prop-item-title ">Возврат</div>
                                <div class="index-prop-item-desc ">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="index-prop-item ">
                                <div class="index-prop-item-img "><img src="/images/ico-index-prop-4.png"></div>
                                <div class="index-prop-item-title ">Помощь</div>
                                <div class="index-prop-item-desc ">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-list">
                <div class="row">
                    <div class="col-xs-12 col-sm-6"><h2>Специальные предложения</h2></div>
                    <div class="col-xs-12 col-sm-6"><a href="#" class="title-label">Новинки</a></div>
                </div>
                <div class="row">
                    <? $arName = array('', '1-1/2-Liter Kettle Teapot', 'Gray Cement Modern Circular ', 'Pavina Double-Wall Thermo', 'AquaFarm', 'Lipper Large Wavy Bowl', 'Gray Cement Modern Circular ', 'JIA Inc, Purple Clay Coffee Pot', ) ?>
                    <? for ($key=1; $key<8; $key++) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="section-list-item">
                                <a href="#" class="section-list-item-img"><img src="/images/section-item-<?=$key?>.png"></a>
                                <a href="#" class="section-list-item-name"><?=$arName[$key]?></a>
                                <div class="section-list-item-bottom">
                                    <span class="section-list-item-price"><b>1 120 ₶</b></span>
                                    <a class="btn-buy" href="#"></a>
                                </div>
                            </div>
                        </div>
                        <? if ($key%2 == 0) echo '<div class="clearfix visible-sm"></div>'; ?>
                        <? if ($key%3 == 0) echo '<div class="clearfix visible-md"></div>'; ?>
                        <? if ($key%4 == 0) echo '<div class="clearfix visible-lg"></div>'; ?>
                    <? } ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="section-list-item section-list-item-sale">
                            <div class="section-list-item-salelabel">-10%</div>
                            <a href="#" class="section-list-item-img"><img src="/images/section-item-8.png"></a>
                            <a href="#" class="section-list-item-name">V60 Buono Coffee Drip Kettle</a>
                            <div class="section-list-item-bottom">
                                <span class="section-list-item-price"><span class="strike">840</span> - <b>690 ₶</b></span>
                                <a class="btn-buy" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div >
        <div class="container hidden-xs">
            <div class="index-5block">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-lg-9">
                        <div class="row">
                            <div class="hidden-xs col-sm-12 col-md-12 col-lg-8 ">
                                <div class="index-5block-item index-5block-item-1">
                                    <div>
                                        Лучшее 50 товаров для бара<br>
                                        <a class="btn btn-yellow" href="#">подробнее</a>
                                    </div>
                                </div>
                            </div>

                            <div class="visible-xs visible-sm col-xs-12 col-sm-6"><!-- index-5block-item-3 этот блок в двух копиях -->
                                <div class="index-5block-item index-5block-item-3">
                                    <div>
                                        Топ 5 посуды для дома<br>
                                        <a class="btn btn-yellow" href="#">подробнее</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <a href="#" class="index-5block-item index-5block-item-2">
                                    <span>
                                        все по
                                        <span class="index-5block-item-2-price">250₶</span>
                                    </span>
                                </a>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <a href="#" class="index-5block-item index-5block-item-4">
                                    <div>Новые коллекции месяца</div>
                                </a>
                            </div>

                            <div class="col-xs-12 col-md-12 col-lg-8">
                                <div class="index-5block-item index-5block-item-5">
                                    <div>
                                        <span class="strong">20 гениальных</span>
                                        товара из Германии<br>
                                        <a class="btn btn-yellow" href="#">подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-sm hidden-xs col-xs-6 col-md-4 col-lg-3"><!-- index-5block-item-3 этот блок в двух копиях -->
                        <div class="index-5block-item index-5block-item-3">
                            <div>
                                Топ 5 посуды для дома<br>
                                <a class="btn btn-yellow" href="#">подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row index-deli hidden-xs">
                    <div class="col-xs-12 col-md-6">
                        <a href="#" class="index-deli-item">
                            <img src="/images/index-deli-img-1.png">
                            <div class="font-22 gray">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi</div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <a href="#" class="index-deli-item">
                            <img src="/images/index-deli-img-2.png">
                            <div class="font-22 gray">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lilac-bg index-timer-area">
        <div class="container">
            <div class="section-list">

                <h2 class="pull-left">Последний шанс купить!</h2>
                <div class="pull-right index-timer">
                    <span class="index-timer-title">до конца акции:</span>
                    <span class="timer" data-sec="98556">
                        <span>
                            <span class="timer-digits">
                                <span class="timer-digit timer-day-tens">0</span>
                                <span class="timer-digit timer-day-unit">0</span>
                            </span>
                            <span class="timer-digit-label">дни</span>
                        </span>
                        <span class="timer-separator">:</span>
                        <span>
                            <span class="timer-digits">
                                <span class="timer-digit timer-hour-tens">0</span>
                                <span class="timer-digit timer-hour-unit">0</span>
                            </span>
                            <span class="timer-digit-label">часы</span>
                        </span>
                        <span class="timer-separator">:</span>
                        <span>
                            <span class="timer-digits">
                                <span class="timer-digit timer-min-tens">0</span>
                                <span class="timer-digit timer-min-unit">0</span>
                            </span>
                            <span class="timer-digit-label">минуты</span>
                        </span>
                        <span class="timer-separator">:</span>
                        <span>
                            <span class="timer-digits">
                                <span class="timer-digit timer-sec-tens">0</span>
                                <span class="timer-digit timer-sec-unit">0</span>
                            </span>
                            <span class="timer-digit-label">секунды</span>
                        </span>
                    </span>
                </div>
                <div class="clearfix"></div>
                <br><br><br>
                <div class="row">
                    <? $arName = array('', '1-1/2-Liter Kettle Teapot', 'Gray Cement Modern Circular ', 'Pavina Double-Wall Thermo', 'AquaFarm', 'Lipper Large Wavy Bowl', 'Gray Cement Modern Circular ', 'JIA Inc, Purple Clay Coffee Pot', ) ?>
                    <? for ($key=1; $key<4; $key++) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="section-list-item">
                                <a href="#" class="section-list-item-img"><img src="/images/section-item-<?=$key?>.png"></a>
                                <a href="#" class="section-list-item-name"><?=$arName[$key]?></a>
                                <div class="section-list-item-bottom">
                                    <span class="section-list-item-price"><b>1 120 ₶</b></span>
                                    <a class="btn-buy" href="#"></a>
                                </div>
                            </div>
                        </div>
                        <? if ($key%2 == 0) echo '<div class="clearfix visible-sm"></div>'; ?>
                        <? if ($key%3 == 0) echo '<div class="clearfix visible-md"></div>'; ?>
                        <? if ($key%4 == 0) echo '<div class="clearfix visible-lg"></div>'; ?>
                    <? } ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="section-list-item section-list-item-sale">
                            <div class="section-list-item-salelabel">-10%</div>
                            <a href="#" class="section-list-item-img"><img src="/images/section-item-8.png"></a>
                            <a href="#" class="section-list-item-name">V60 Buono Coffee Drip Kettle</a>
                            <div class="section-list-item-bottom">
                                <span class="section-list-item-price"><span class="strike">840</span> - <b>690 ₶</b></span>
                                <a class="btn-buy" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<? include 'include/footer.php'; ?>