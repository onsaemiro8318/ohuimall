<?php
  	include_once "../config.php";
  	include_once "header.php";

	$view_arr	= explode(",",$_COOKIE['goods_view']); 
	$end_view	= end($view_arr);
	// 상품 목록 쿼리
	$query 		= "SELECT * FROM ".$_gl['goods_info_table']." ";
	$result 	= mysqli_query($my_db, $query);

	$i = 1;
	while($data = @mysqli_fetch_array($result))
	{
		$goods_array[$i]['goods_idx']		= $data['idx'];
		$i++;
	}
?>
    <div class="content">
      <div class="slide_block g_960">
        <div class="youtubebox">
          <ul class="bxslider">
<?php
  $query 		= "SELECT * FROM ".$_gl['banner_info_table']." ";
  $result 	= mysqli_query($my_db, $query);
  while($data = mysqli_fetch_array($result))
  {
?>
            <li>
            <?=$data['banner_url']?>
            </li>
<?php
  }
?>
          </ul>
        </div>
        <div class="banner_block">
          <div class="one_banner">
            <a href="#"><img src="images/banner_recent.jpg" alt=""/></a>
          </div>
          <div class="one_banner">
            <a href="#"><img src="images/banner_ohui.jpg" alt=""/></a>
          </div>
        </div>
      </div>
      <div class="list_block g_984">
        <ul class="clearfix">
<?php

	foreach ($goods_array as $key => $val)
	{
?>
          <li>
<?php
		$soldout_query 		= "SELECT goods_selcount FROM ".$_gl['goods_info_table']." WHERE idx = ".$val['goods_idx']." ";
		$soldout_result 	= mysqli_query($my_db, $soldout_query);
		$soldout_cnt = mysqli_fetch_array($soldout_result);
		if($soldout_cnt[goods_selcount] >= 10)	
		{
?>
            <div class="t_soldout"><img src="images/txt_soldout.png" width="91" height="24" alt=""/></div>
<?php
		}
    if(in_array($val['goods_idx'], $_gl['hot_data'][date(Ymd)]))
    {
?>
            <div class="t_hot"><img src="images/tag_hot.jpg" width="37" height="19" alt=""/></div>
<?php
		}
?>
            <div class="list">
              <p><a href="goods_detail.php?goods_idx=<?=$val['goods_idx']?>"><img src="images/thumb_product_1.jpg" alt=""/></a></p>
              <p class="txt_name"><img src="images/txt_product_name_1.jpg" width="213" height="57" alt=""/></p>
              <p class="btn_block"><a href="#"><img src="images/btn_buy_at_list.jpg" width="290" height="59" alt=""/></a></p>
            </div>
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
	$('.bxslider').bxSlider({
		video: true,
		useCSS: false,
		reponsive: false,
		auto: true,
		speed: 300
	});

    // 유튜브 반복 재생
    var controllable_player,start, 
    statechange = function(e){
    	if(e.data === 0){controllable_player.seekTo(0); controllable_player.playVideo()}

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