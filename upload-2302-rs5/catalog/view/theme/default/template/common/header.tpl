<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>


<!--  --------------------------------- -->
        <link href="catalog/view/theme/dariyut/stylesheet/fonts/stylesheet.css" type="text/css"  rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"  rel="stylesheet" />
        <link href="catalog/view/theme/dariyut/stylesheet/bootstrap/css/bootstrap.min.css" type="text/css"  rel="stylesheet" />
        <link href="catalog/view/theme/dariyut/stylesheet/css/slick.css" type="text/css"  rel="stylesheet" />

        <link href="catalog/view/theme/dariyut/stylesheet/css/style.css" type="text/css"  rel="stylesheet" />
        <link href="catalog/view/theme/dariyut/stylesheet/css/media.css" type="text/css"  rel="stylesheet" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="catalog/view/theme/dariyut/stylesheet/js/slick.min.js"></script>
        <script src="catalog/view/theme/dariyut/stylesheet/bootstrap/js/bootstrap.min.js"></script>
        <script src="catalog/view/theme/dariyut/stylesheet/js/script.js"></script>
<!--  --------------------------------- -->



<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
<link href="catalog/view/theme/dariyut/stylesheet/stylesheet.css" rel="stylesheet">
<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script src="catalog/view/javascript/common.js" type="text/javascript"></script>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php foreach ($analytics as $analytic) { ?>
<?php echo $analytic; ?>
<?php } ?>
</head>


<body>
        <header>
            <div class="container">
                <div class="header">
                    <a  class="header-logo" href="/" ><img src="catalog/view/theme/dariyut/image/logo.png"></a>
                    <form class="top-search">
                        <input type="text" placeholder="Поиск по каталогу">
                        <button type="submit"></button>
                    </form>
                    <ul class="header-menu">
                        <li><a href="/" >оплата и доставка</a></li>
                        <li><a href="/" >отзывы</a></li>
                        <li><a href="/" >о нас</a></li>
                        <li><a href="/" >помощь</a></li>
                    </ul>
                    <div class="header-callback">
                        <a href="#">заказать звонок</a><br>
                        <span class="phone"><img src="catalog/view/theme/dariyut/images/ico-top-phone.png"> 8 (499) 340 31 22</span>
                    </div>
                </div>
            </div>
        </header>
        <div class="top">
            <a class="hidden-md hidden-lg" href="/"><img class="mini-logo" src="catalog/view/theme/dariyut/image/logo.png"></a>
            <a href="tel:84993403122" class="phone hidden-md hidden-lg"><img src="catalog/view/theme/dariyut/image/ico-footer-phone.png"></a>
            <a href="#" class="btn-mmenu fa-stack hidden-md hidden-lg" onclick="$('body').toggleClass('open-menu'); return false;"><i class="fa fa-bars fa-stack-1x foropen" aria-hidden="true"></i><i class="fa fa-times fa-stack-1x forclose" aria-hidden="true"></i></a>

            <div id="main-menu">
                <ul class="top-menu container">
                    <li class="top-menu-item top-menu-item-1">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-1.png"><br>
                            распродажа
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-2">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-2.png"><br>
                            столовая
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-3">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-3.png"><br>
                            кухня
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-4">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-4.png"><br>
                            ванная
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-5">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-5.png"><br>
                            спальня
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-6">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-6.png"><br>
                            детская
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-7">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-7.png"><br>
                            декор
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-8">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-8.png"><br>
                            подарки
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-9">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-menu-9.png"><br>
                            коллекции
                        </a>
                    </li>
                    <li class="top-menu-item top-menu-item-10 top-menu-item-cart">
                        <a href="#">
                            <img src="catalog/view/theme/dariyut/image/ico-top-cart.png"><br>
                            моя корзина
                        </a>
                        <span class="top-cart-cntr">3</span>
                    </li>

                </ul>

                <div class="visible-xs visible-sm">
                    <ul class="header-menu">
                        <li><a href="/" >оплата и доставка</a></li>
                        <li><a href="/" >отзывы</a></li>
                        <li><a href="/" >о нас</a></li>
                        <li><a href="/" >помощь</a></li>
                    </ul>
                    <br>
                    <form class="top-search">
                        <input type="text" placeholder="Поиск по каталогу">
                        <button type="submit"></button>
                    </form>
                    <br>
                </div>
            </div>
        </div>



<!-- 
<body class="<?php echo $class; ?>">
<nav id="top">
  <div class="container">
    <?php echo $currency; ?>
    <?php echo $language; ?>
    <div id="top-links" class="nav pull-right">
      <ul class="list-inline">
        <li><a href="<?php echo $contact; ?>"><i class="fa fa-phone"></i></a> <span class="hidden-xs hidden-sm hidden-md"><?php echo $telephone; ?></span></li>
        <li class="dropdown"><a href="<?php echo $account; ?>" title="<?php echo $text_account; ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_account; ?></span> <span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <?php if ($logged) { ?>
            <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
            <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
            <li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
            <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
            <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
            <?php } else { ?>
            <li><a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
            <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="<?php echo $wishlist; ?>" id="wishlist-total" title="<?php echo $text_wishlist; ?>"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_wishlist; ?></span></a></li>
        <li><a href="<?php echo $shopping_cart; ?>" title="<?php echo $text_shopping_cart; ?>"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_shopping_cart; ?></span></a></li>
        <li><a href="<?php echo $checkout; ?>" title="<?php echo $text_checkout; ?>"><i class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_checkout; ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div id="logo">
          <?php if ($logo) { ?>
          <a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" /></a>
          <?php } else { ?>
          <h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1>
          <?php } ?>
        </div>
      </div>
      <div class="col-sm-5"><?php echo $search; ?>
      </div>
      <div class="col-sm-3"><?php echo $cart; ?></div>
    </div>
  </div>
</header>
<?php if ($categories) { ?>
<div class="container">
  <nav id="menu" class="navbar">
    <div class="navbar-header"><span id="category" class="visible-xs"><?php echo $text_category; ?></span>
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <?php foreach ($categories as $category) { ?>
        <?php if ($category['children']) { ?>
        <li class="dropdown"><a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?></a>
          <div class="dropdown-menu">
            <div class="dropdown-inner">
              <?php foreach (array_chunk($category['children'], ceil(count($category['children']) / $category['column'])) as $children) { ?>
              <ul class="list-unstyled">
                <?php foreach ($children as $child) { ?>
                <li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
                <?php } ?>
              </ul>
              <?php } ?>
            </div>
            <a href="<?php echo $category['href']; ?>" class="see-all"><?php echo $text_all; ?> <?php echo $category['name']; ?></a> </div>
        </li>
        <?php } else { ?>
        <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </nav>
</div>
<?php } ?>
-->