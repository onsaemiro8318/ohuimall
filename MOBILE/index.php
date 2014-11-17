<?php
  	include_once "../config.php";
  	include_once "header.php";

	$view_arr = explode(",",$_COOKIE['goods_view']); 

?>
    <div class="content">
      <!-- <div class="youtubebox">
        <iframe id="ytplayer" width="100%" src="<?=$_gl['youtube_url']?>" frameborder="0" allowfullscreen></iframe>
      </div> -->
      <!-- <div style="width:100%;position:relative;height:400px;background:red;overflow-x:hidden;overflow-y:hidden">
        <div class="owl-carousel" style="float:left"> -->
      <ul class="bxslider">
<?php
$query 		= "SELECT * FROM ".$_gl['banner_info_table']." ";
$result 	= mysqli_query($my_db, $query);
while($data = mysqli_fetch_array($result))
{
?>
        <li>
          <?= $data[banner_url]?>
        </li>
<?php
}
?>
      </ul>
    </div>
<?
	include_once "footer.php";

?>

	<script type='text/javascript'>
	// 메인 배너 slider
	$('.bxslider').bxSlider({
	  video: true,
	  useCSS: false
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
    </script>
