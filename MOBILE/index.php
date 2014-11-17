<?php
  	include_once "../config.php";
  	include_once "header.php";

	$view_arr = explode(",",$_COOKIE['goods_view']); 

?>
    <div>
      <h4>어리게 산다는 것</h4>
      <div class="youtubebox">
        <iframe id="ytplayer" width="100%" src="<?=$_gl['youtube_url']?>" frameborder="0" allowfullscreen></iframe>
      </div>
      <div>
        <div class="customNavigation">
          <a class="btn prev" style="float:left; width:5%;"><img src="./images/btn_prev.png" style="width:100%; margin-top:100%;"></a>
        </div>
        <div class="owl-carousel" style="float:left">
<?php
$query 		= "SELECT * FROM ".$_gl['goods_info_table']." ";
$result 	= mysqli_query($my_db, $query);
while($data = mysqli_fetch_array($result))
{
?>
        <div class="item" onclick="javascript:location.href='goods_detail.php?goods_idx=<?=$data['idx']?>'"><img src="<?php echo $data['goods_imgurl']?>" alt="Owl Image"><p><?php echo $data['goods_name']?></p><p><?php echo $data['goods_detail']?></p></div>
<?php
}
?>
        </div>
        <div class="customNavigation">
          <a class="btn next" style="float:right; width:5%;"><img src="./images/btn_next.png" style="width:100%; margin-top:100%; align:right;"></a>
        <div>
      </div>
    </div>
<?
	include_once "footer.php";

?>


    <style>
    .owl-carousel .item{
        margin: 3px;
    }
    
    .owl-carousel {
        width:90%;
    }
    .owl-carousel .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>

    <script type='text/javascript'>
    // 이미지 슬라이드
    $(document).ready(function() {
      var owl = $(".owl-carousel");
      
      $(".owl-carousel").owlCarousel({
        loop : true,
        autoplay: true,
        autoplayTimeout:2000,
        autoplayHoverPause:false,
        responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },            
                960:{
                    items:4
                },
                1200:{
                    items:5
                }
            }
     });	
      
      $(".next").click(function(){
        owl.trigger('next.owl');
      })
      $(".prev").click(function(){
        owl.trigger('prev.owl');
      })
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
