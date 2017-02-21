	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="yandex-verification" content="9bec35d20251bac9" />
		<title><?php echo $title; ?></title>
		<base href="<?=$base; ?>" />
		<?php if ($description) : ?>
			<meta name="description" content="<?=$description; ?>" />
		<?php endif; ?>
		<?php if ($keywords) : ?>
			<meta name="keywords" content="<?=$keywords; ?>" />
		<?php endif; ?>
		<?php if ($icon) : ?>
			<link href="<?=$icon; ?>" rel="icon" />
		<?php endif; ?>
		<?php foreach ($links as $link): ?>
			<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
		<?php endforeach; ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/iwtech/stylesheet/stylesheet.css" />
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/iwtech/stylesheet/n-box.css" />
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/iwtech/stylesheet/zoomove.min.css" />
		<?php foreach ($styles as $style): ?>
			<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
		<?php endforeach ?>
		<link href="catalog/view/theme/iwtech/stylesheet/font-awesome.min.css" rel="stylesheet">
		
		<!--<link type="text/css" rel="StyleSheet" href="catalog/view/theme/iwtech/stylesheet/styles.css" />-->
		<link type="text/css" rel="StyleSheet" href="catalog/view/theme/iwtech/stylesheet/n-corr.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="catalog/view/theme/iwtech/js/zoomove.min.js"></script>
		<script type='text/javascript'>   
			var $jq2 = jQuery.noConflict(true);  
		</script>
		<!-- // <script src="catalog/view/javascript/jquery-1.8.3.min.js"></script> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

		<!--<script type="text/javascript" src="catalog/view/javascript/iwt-cabinet.js"></script>-->
		<script type="text/javascript" src="catalog/view/javascript/datepicker/jquery.datepick.min.js"/></script>
		<script type="text/javascript" src="catalog/view/javascript/datepicker/jquery.datepick-ru.js"/></script>
		<!--<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>-->
		<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
		<!--<script type="text/javascript" src="catalog/view/javascript/jquery/ui/external/jquery.cookie.js"></script>-->
		<script type="text/javascript" src="catalog/view/javascript/jquery/colorbox/jquery.colorbox.js"></script>
		<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/colorbox/colorbox.css" media="screen" />
		<script type="text/javascript" src="catalog/view/javascript/jquery/tabs.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/jquery/scrolltopcontrol.js"></script>
		<!--<script type="text/javascript" src="catalog/view/javascript/jquery.measurer.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/jquery.gradienttext.js"></script>-->
		<script type="text/javascript" src="catalog/view/javascript/fancyBox/jquery.fancybox.pack.js"></script>
		<link rel="stylesheet" href="catalog/view/javascript/fancyBox/jquery.fancybox.css" type="text/css" media="screen" />
		<style type="text/css">
		span.ruble { text-transform:uppercase; }
		span.rel { position: relative; }
		span.dborder { top: -0.9ex; left: 0; width:.9ex; border-bottom: 0.16ex solid #000000; // top: -1.3ex; }
		span.dot { position:absolute; text-indent: -1000em; }
		</style>

		<link type="text/css" rel="StyleSheet" href="catalog/view/theme/iwtech/stylesheet/ws.css" />

		<?php foreach ($scripts as $script) : ?>
			<script type="text/javascript" src="<?php echo $script; ?>"></script>
		<?php endforeach; ?>
		<script type="text/javascript">

		function cssmenuhover()
		{
		if(!document.getElementById("menu"))
		return;
		var lis = document.getElementById("menu").getElementsByTagName("LI");
		for (var i=0;i<lis.length;i++)
		{
		lis[i].onmouseover=function(){this.className+=" iehover";}
		lis[i].onmouseout=function() {this.className=this.className.replace(new RegExp(" iehover\\b"), "");}
		}
		}
		if (window.attachEvent)
		window.attachEvent("onload", cssmenuhover);
		</script>
		<?php //echo $google_analytics; ?>

  <meta name='yandex-verification' content='6c75b8fe36e743a8' />
  
	</head>
<body class="bg">
  <div id="header">
    <a href="<?php echo $home;?>" class="logo" title="<?php echo $name; ?>"></a>
    <div class="contacts">
      <p><?php echo $this->config->get('config_telephone'); ?></p>
      <p>697-687-396</p>
      <p>dariyut</p>
    </div>
    <div id="cart">
      <?php if (!$logged) { ?>
      <span id="notloggedin"><?php echo $text_welcome; ?></span>

      <form action="<?php echo $action; ?>" id="login_form" enctype="multipart/form-data" method="post">
        <input name="email" id="login" value="e-mail" onBlur="if(this.value=='') this.value='e-mail';" onFocus="if(this.value=='e-mail') this.value='';" onmousedown="searchfield_click( this );" value="" class="inp" maxlength="32" />
        <input name="password" id="password" value="пароль" onBlur="if(this.value=='') this.value='пароль';" onFocus="if(this.value=='пароль') this.value='';" onmousedown="searchfield_click( this );" type="password" class="inp" maxlength="32" />
        <div class="clear"></div>
        <a href="<?php echo $this->url->link('account/register');?>" class="registerlink">регистрация</a>
        <a class="forgotten n-box-url" href="<?php echo $forgotten; ?>">забыли?</a>
        <button type="submit" class="loginsubmit">войти</button>
      </form>
      <?php } else { ?>
      <div id="private_account" style="">
        <u style="cursor:pointer" onclick="window.location='<?php echo $cabinet;?>'">Личный кабинет</u>
        <a href="<?php echo $logout;?>">выйти</a> <?php echo $customer_name;?>
      </div>
      <?php // echo $text_logged; ?>

      <?php } ?>
      <?php echo $cart; ?>
    </div>
    <div class="menu_line">
      <div id="search">
        <div class="button-search search_button"></div>
        <?php if ($filter_name) { ?>
        <input type="text" name="filter_name" value="<?php echo $filter_name; ?>" class="search_text"/>
        <?php } else { ?>
        <input type="text" name="filter_name" value="<?php echo $text_search; ?>" onclick="this.value = '';" onkeydown="this.style.color = '#000000';"  class="search_text"/>
        <?php } ?>
      </div>
      <?php echo $information;
      ?>
    </div>
  </div>
  <?php
  if(isset($modules)){
    foreach ($modules as $module) { ?>
    <?php echo $module; ?>
    <?php }
  } ?>