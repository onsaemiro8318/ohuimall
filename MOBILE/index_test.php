<?php
  	include_once "../config.php";
  	include_once "header.php";

	$view_arr = explode(",",$_COOKIE['goods_view']); 

?>
    <div class="content" id="main_page">
      <div class="slide_block">
        <div class="youtubebox">
          <ul class="bxslider">
<?php
	$query 		= "SELECT * FROM ".$_gl['banner_info_table']." ";
	$result 	= mysqli_query($my_db, $query);
	while($data = mysqli_fetch_array($result))
	{
?>
            <li style="top:-20px">
              <?=$data['banner_url']?>
            </li>
<?php
	}
?>
          </ul>
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
		$soldout_query 		= "SELECT goods_selcount FROM ".$_gl['goods_info_table']." WHERE idx = ".$goods_data['idx']." ";
		$soldout_result 	= mysqli_query($my_db, $soldout_query);
		$soldout_cnt = mysqli_fetch_array($soldout_result);
		if($soldout_cnt[goods_selcount] >= 10)
		{
?>
            <div class="t_soldout"><img src="images/txt_soldout.png" width="60" alt=""/></div>
<?php
		}
?>
            <div class="list">
              <a href="goods_detail.php?goods_idx=<?=$goods_data['idx']?>"><img src="images/thumb_product_1.jpg" alt=""/></a>
            </div>
          </li>
<?
	}
?>
        </ul>
      </div>
    </div>

    <div class="content" id="movie_page" style="display:none">
      <div class="capture_list">
        <div>
          <img src="images/movie_capture.jpg" alt=""/>
        </div>
      </div>
    </div>

    <div class="content" id="faq_page" style="display:none">
      <div class="faq">
<?php
	$query 		= "SELECT * FROM ".$_gl['faq_info_table']." ";
	$result 	= mysqli_query($my_db, $query);
	while($faq_info = mysqli_fetch_array($result))
	{
?>
        <div class="one_q" id="<?php echo $faq_info['idx']?>">
          <h2>
            <a href="#" class="clearfix">
              <span id="faq_sub<?php echo $faq_info['idx']?>" onclick="faq_toggle('<?php echo $faq_info['idx']?>');"><?php echo $faq_info['faq_subject']?></span>
              <span id="faq_sub<?php echo $faq_info['idx']?>" onclick="faq_toggle('<?php echo $faq_info['idx']?>');" class="arrow"><img src="images/arrow_faq.jpg" width="20" alt="" id="arrow_faq<?php echo $faq_info['idx']?>"/></span>
            </a>
          </h2>
          <p id="faq_con<?php echo $faq_info['idx']?>" style="display:none;"><?php echo $faq_info['faq_content']?></p>
        </div>
<?
	}
?>
      </div>
    </div>


<?
	include_once "footer.php";

?>

	<script type='text/javascript'>
	var toggle_flag = 0;

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
		$("#faq_box dd").hide();
	});

	function faq_toggle(idx){
		var faq_con = "#faq_con" + idx;
		$(faq_con).slideToggle( "normal", function(){
			if (toggle_flag == 0)
			{
				$("#arrow_faq" + idx).attr("src","images/arrow_faq2.jpg");
				toggle_flag = 1;
			}else{
				$("#arrow_faq" + idx).attr("src","images/arrow_faq.jpg");
				toggle_flag = 0;
			}
		});
	}

    </script>
