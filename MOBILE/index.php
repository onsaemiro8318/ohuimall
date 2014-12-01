<?php
  	include_once "../config.php";
  	include_once "header.php";

	$view_arr = explode(",",$_COOKIE['goods_view']); 

?>
    <div class="content">
      <div class="slide_block">
        <div class="youtubebox">
              <iframe id="ytplayer" width="100%" src="https://www.youtube.com/embed/U8Bj3dL-hQI?controls=0&loop=1&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="list_block">
        <ul>
<?php
	$query 		= "SELECT * FROM ".$_gl['goods_info_table']." ";
	$result 	= mysqli_query($my_db, $query);
	$j = 0;
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
			$hot_style = "";
			if ($goods_data['idx'] == "2" || $goods_data['idx'] == "3" || $goods_data['idx'] == "5")
				$hot_style = "style='top:14%'";

			if ($j == 2)
			{
?>
            <div class="t_hot" <?=$hot_style?>><img src="images/tag_new.jpg" alt=""/></div>

<?
			}else{
?>
            <div class="t_hot" <?=$hot_style?>><img src="images/tag_hot.jpg" alt=""/></div>
<?php
			}
			$j++;
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
              <a href="goods_detail_<?=$goods_data['idx']?>.php"><img src="images/thumb_product_<?=$goods_data['idx']?>.jpg" alt=""/></a>
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
