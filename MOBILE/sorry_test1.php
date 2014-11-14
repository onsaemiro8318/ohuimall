<?
	// 설정파일
	include_once "../config.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
<!doctype html>
  <html lang="en">
    <head>
      <title>오늘을 가장 어리게 - Ohui mind mall</title>
      <!-- <meta property="fb:app_id" content="[744500028976771]" /> -->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0"/>
      <meta property="og:image" content="http://ohuimall.co.kr/images/imgtest.jpg" />
      <meta property="og:title" content="오늘을 가장 어리게 - Ohui mind mall">
      <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
      <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
      <script type='text/javascript' src='../js/om.js'></script>
      
  </head>
  <body>
    <div>
      <h3>당신은 오늘 충분히 어리세요</h3>
      
      <h1>어린 마음이 필요하시다면 내일 도전하세요</h1>
      <h4>'최근 본 마음'을 SNS를 통해 공유해주시면 내일 당첨될 확률이 올라갑니다.</h4>
    </div>
    <h1>--------------------------------</h1>
	<div>
	<img src="<?=$goods_info['goods_imgurl']?>">
	</div>
  <p>공유하기</p>
	<a href="#" onclick="fb_share_test1('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');">facebook</a>
	<a href="#" onclick="kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');">KAKAOTALK</a>
  </body>
</html>

<div id="fb-root"></div>



