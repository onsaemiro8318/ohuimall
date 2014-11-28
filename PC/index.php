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
		$goods_array[$i]['goods_name']		= $data['goods_name'];
		$i++;
	}

	if ($end_view)
	{
		$recent_image	= "images/banner_recent_".$end_view.".jpg";
		$recent_link	= "http://ohuimall.co.kr/PC/goods_detail".$end_view.".php";
	}else{
		$recent_image = "images/banner_recent_no.jpg";
		$recent_link	= "#";
	}
?>
    <div class="content">
      <div class="slide_block g_960">
        <div class="youtubebox">
          <ul style="margin-top:0px">
            <li>
<iframe width="960" height="540" id="ytplayer" src="https://www.youtube.com/embed/tbfEw8Qxa_w?controls=0&loop=1&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0" frameborder="0" allowfullscreen></iframe>
            </li>
          </ul>
        </div>
        <div class="banner_block">
          <div class="one_banner">
            <a href="http://www.ohui.co.kr/product/detail.jsp?pid=ACM06720&cid1=2&cid2=E" target="_blank"><img src="images/banner_ohui.jpg" alt=""/></a>
          </div>
          <div class="one_banner">
            <a href="http://www.youtube.com/watch?v=m5afhT4OakA" target="_blank"><img src="images/banner_go_tvcf.jpg" alt="TVCF 보러가기" title="TVCF 보러가기"/></a>
          </div>
          <div class="one_banner">
            <img src="images/list_title.jpg" alt=""/>
            <a href="<?=$recent_link?>"><img src="<?=$recent_image?>" alt="<?=$goods_array[$end_view]['goods_name']?>" title="<?=$goods_array[$end_view]['goods_name']?>" class="recent_goods_image"/></a>
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
		$soldout_query 		= "SELECT goods_selcount, goods_total_stock FROM ".$_gl['goods_info_table']." WHERE idx = ".$val['goods_idx']." ";
		$soldout_result 	= mysqli_query($my_db, $soldout_query);
		$soldout_cnt = mysqli_fetch_array($soldout_result);
		if($soldout_cnt['goods_selcount'] >= $soldout_cnt['goods_total_stock'])	
		{
?>
            <div class="t_soldout"><img src="images/txt_soldout.png" width="91" height="24" alt=""/></div>
<?php
			if(in_array($val['goods_idx'], $_gl['hot_data'][date(Ymd)]))
			{
?>
            <div class="t_hot"><img src="images/tag_hot.jpg" width="37" height="19" alt=""/></div>
<?php
			}
?>
            <div class="list">
              <p><a href="soldout.php?goods_idx=<?=$val['goods_idx']?>"><img src="images/thumb_product_<?=$val['goods_idx']?>.jpg" alt=""/></a></p>
              <p class="txt_name"><a href="soldout.php?goods_idx=<?=$val['goods_idx']?>"><img src="images/txt_product_name_<?=$val['goods_idx']?>.jpg" height="57" alt=""/></a></p>
              <p class="btn_block"><a href="soldout.php?goods_idx=<?=$val['goods_idx']?>"><img src="images/btn_buy_at_list_out.jpg" width="290" height="59" alt=""/></a></p>
            </div>
<?
		}else{
?>
<?php
			if(in_array($val['goods_idx'], $_gl['hot_data'][date(Ymd)]))
			{
?>
            <div class="t_hot"><img src="images/tag_hot.jpg" width="37" height="19" alt=""/></div>
<?php
			}
?>
            <div class="list">
              <p><a href="goods_detail<?=$val['goods_idx']?>.php"><img src="images/thumb_product_<?=$val['goods_idx']?>.jpg" alt=""/></a></p>
              <p class="txt_name"><a href="goods_detail<?=$val['goods_idx']?>.php"><img src="images/txt_product_name_<?=$val['goods_idx']?>.jpg" height="57" alt=""/></a></p>
              <p class="btn_block"><a href="goods_detail<?=$val['goods_idx']?>.php"><img src="images/btn_buy_at_list.jpg" width="290" height="59" alt=""/></a></p>
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
  //   responsive: false,
  //   auto: true,
  //   speed: 300
  // });
	//slider = $('.bxslider').bxSlider();

    // 유튜브 반복 재생
    var controllable_player,start, 
    statechange = function(e){
    	if(e.data === 0){controllable_player.seekTo(0); controllable_player.playVideo(); }
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