<?php
	include_once "../config.php";
	include_once "header.php";
?>
    <div class="content">
      <div class="capture_list">
        <div class="thumbs">
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_1.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_1.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_2.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_2.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_3.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_3.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_4.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_4.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_5.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_5.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_6.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_6.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_7.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_7.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_8.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_8.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_9.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_9.jpg);"></a>
          <a href="http://www.tomorrowkids.or.kr/images/fb/jobimg_10.jpg" style="background-image:url(http://ohuimall.co.kr/images/jobimg_10.jpg);"></a>
        </div>
      </div>
    </div>
<?
	include_once "footer.php";
?>

	<script type='text/javascript'>
$(function(){
	
	// Initialize the gallery
	$('.thumbs a').touchTouch();

});

  </script>

<style>
.thumbs{
	width:100%;
	margin:35px auto 15px;
	text-align:center;
}

.thumbs a{
	width:120px;
	height:120px;
	display:inline-block;
	border:1px solid #303030;
	box-shadow:0 1px 3px rgba(0,0,0,0.5);
	border-radius:4px;
	margin: 3px 3px 3px;
	position:relative;
	text-decoration:none;
	
	background-position:center center;
	background-repeat: no-repeat;
	
	background-size:cover;
	-moz-background-size:cover;
	-webkit-background-size:cover;
}


}
</style>