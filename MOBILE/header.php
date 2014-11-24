<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
    <title>OHUI MALL</title>
    <!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
    <link href="css/style_m.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../lib/iCheck/skins/all.css">
    <link rel="stylesheet" href="../lib/bxslider/jquery.bxslider.css">
    <link rel="stylesheet" href="../lib/Magnific-Popup/magnific-popup.css"> 
    <link href="http://cdn.poesis.kr/post/search.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="../lib/touchTouch/touchTouch.css"> 
    <!-- <link rel="stylesheet" href="../js/jquery.mobile/jquery.mobile-1.4.5.min.css" /> -->
    <script type='text/javascript' src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script type='text/javascript' src='../js/jquery.animsition.min.js'></script>
    <script type='text/javascript' src='../lib/iCheck/icheck.js'></script>
    <!-- <script type='text/javascript' src='../js/jquery.mobile/jquery.mobile-1.4.5.min.js'></script> -->
    <script type='text/javascript' src='../js/om.js'></script>
    <script type="text/javascript" src="../lib/touchTouch/touchTouch.jquery.js"></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
    <script type='text/javascript' src='../js/kakao.link.js'></script>
    <script type='text/javascript' src="http://cdn.poesis.kr/post/search.min.js"></script>
    <script type="text/javascript" src="../lib/bxslider/plugins/jquery.fitvids.js"></script>
    <script type="text/javascript" src="../lib/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="../lib/Magnific-Popup/jquery.magnific-popup.js"></script>
  </head>
  <body>
    <div class="header">
      <div class="logo_block"><a href="http://www.ohui.co.kr/" target="_blank"><img src="images/logo.png" width="60" alt="" boder="0"/></a></div>
      <div class="title_block"><a href="index.php"><img src="images/title.jpg" width="200" boder="0" /></a></div>
      <div class="menu_block">
        <ul class="clearfix">
<?
	if (strpos($_SERVER["PHP_SELF"],"index.php") !== false)
	{
?>
          <li><a href="index.php"><img src="images/btn_navi_mall_02.jpg" width="40" alt=""/></a></li>
<?
	}else{
?>
          <li><a href="index.php"><img src="images/btn_navi_mall.jpg" width="40" alt=""/></a></li>
<?
	}
?>
          <li><img src="images/navi_bar.jpg" width="1" alt=""/></li>
<?
	if (strpos($_SERVER["PHP_SELF"],"movie.php") !== false)
	{
?>
          <li><a href="movie.php"><img src="images/btn_navi_movie_02.jpg" width="40" alt=""/></a></li>
<?
	}else{
?>
          <li><a href="movie.php"><img src="images/btn_navi_movie.jpg" width="40" alt=""/></a></li>
<?
	}
?>
          <li><img src="images/navi_bar.jpg" width="1" alt=""/></li>
<?
	if (strpos($_SERVER["PHP_SELF"],"faq.php") !== false)
	{
?>
          <li><a href="faq.php"><img src="images/btn_navi_faq_02.jpg" width="40" alt=""/></a></li>
<?
	}else{
?>
          <li><a href="faq.php"><img src="images/btn_navi_faq.jpg" width="40" alt=""/></a></li>
<?
	}
?>
        </ul>
      </div>
    </div>
