<?php
  	include_once "../config.php";
  	//include_once "header.php";

	$view_arr = explode(",",$_COOKIE['goods_view']); 

?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta property="og:title" content="The Delightful Change OHUI">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://ohuimall.co.kr/MOBILE/index3.php">
    <meta property="og:image" content="http://ohuimall.co.kr/images/can_img_3.jpg">
    <meta property="og:description" content="마음을 파는 가게">
    <link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
    <title>OHUI MALL</title>
    <!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
    <link href="css/style_m.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../lib/iCheck/skins/all.css">
    <link rel="stylesheet" href="../lib/bxslider/m.jquery.bxslider.css">
    <link rel="stylesheet" href="../lib/Magnific-Popup/magnific-popup.css"> 
    <link href="http://cdn.poesis.kr/post/search.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="../lib/touchTouch/touchTouch.css"> 
    <!-- <link rel="stylesheet" href="../js/jquery.mobile/jquery.mobile-1.4.5.min.css" /> -->
    <script type='text/javascript' src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src="../js/analytics.js"></script>
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
      <div class="logo_block clearfix">
        <div class="logo"><a href="http://www.ohui.co.kr/" target="_blank"><img src="images/logo.png" width="60" alt="" boder="0"/></a></div>
        <div class="logo_title"><img src="images/logo_title.png" width="120" alt=""/></div>
      </div>
      <div class="title_block"><a href="index.php"><img src="images/title.jpg" width="200" boder="0" /></a></div>
      <div class="menu_block">
        <ul class="clearfix">
<?
	if (strpos($_SERVER["PHP_SELF"],"index") !== false)
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

    <div class="content">
      <div class="slide_block">
        <div class="youtubebox">
              <iframe id="ytplayer" width="100%" src="https://www.youtube.com/embed/tbfEw8Qxa_w?controls=0&loop=1&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="list_block">
        <ul>
<?php
	$query 		= "SELECT * FROM ".$_gl['goods_info_table']." ";
	$result 	= mysqli_query($my_db, $query);
	while($goods_data = mysqli_fetch_array($result))
	{
?>

          <li>
<?php
		$soldout_query 		= "SELECT goods_selcount, goods_total_stock FROM ".$_gl['goods_info_table']." WHERE idx = ".$goods_data['idx']." ";
		$soldout_result 	= mysqli_query($my_db, $soldout_query);
		$soldout_cnt = mysqli_fetch_array($soldout_result);
		if($soldout_cnt['goods_selcount'] >= $soldout_cnt['goods_total_stock'])	
		{
?>
            <div class="t_soldout"><img src="images/txt_soldout.png" width="60" alt=""/></div>
<?php
		}

		if(in_array($goods_data['idx'], $_gl['hot_data'][date("Ymd")]))
		{
?>
            <div class="t_hot"><img src="images/tag_hot.jpg" alt=""/></div>
<?php
		}
		if($soldout_cnt['goods_selcount'] >= $soldout_cnt['goods_total_stock'])	
		{
?>
            <div class="list">
              <a href="soldout.php?goods_idx=<?=$goods_data['idx']?>"><img src="images/thumb_product_<?=$goods_data['idx']?>_soldout.jpg" alt=""/></a>
            </div>
<?
		}else{
?>
            <div class="list">
              <a href="goods_detail<?=$goods_data['idx']?>.php"><img src="images/thumb_product_<?=$goods_data['idx']?>.jpg" alt=""/></a>
            </div>
<?
		}
?>
          </li>
<?
	}
?>
        </ul>
      </div>
    </div>




<?
	include_once "footer.php";

?>

	<script type='text/javascript'>
	// 메인 배너 slider
  // var slider = $('.bxslider').bxSlider({
  //   video: true,
  //   useCSS: false,
  //   reponsive: false,
  //   auto: true,
  //   speed: 300
  // });

    // 유튜브 반복 재생
    var controllable_player,start, 
    statechange = function(e){
    	if(e.data === 0){controllable_player.seekTo(0); controllable_player.playVideo()}
		slider.stopAuto();

    };
    function onYouTubeIframeAPIReady() {
    controllable_player = new YT.Player('ytplayer', {events: {'onStateChange': statechange}}); 
    }

    if(window.opera){
    addEventListener('load', onYouTubeIframeAPIReady, false);
    }
    setTimeout(function(){
    	if (typeof(controllable_player) == 'undefined'){
    		onYouTubeIframeAPIReady();
    	}
    }, 3000)

    $(window).resize(function(){
    	var width = $(window).width();
    	//var height = $(window).height();

    	var youtube_height = (width / 16) * 9;
    	$("#ytplayer").height(youtube_height);
    });

	$(document).ready(function() {
		$(".clone").css("margin-top","-15px");
	});
    </script>
