<?
	// 설정파일
	include_once "../config.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
<!doctype html>
  <html lang="en">
    <head>
      <title>Document</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0"/>
      <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
  </head>
  <body>
    <h2>마음을 파는 쇼핑몰</h2>
    <h1>오늘을 가장 어리게</h1>
	<img src="<?=$goods_info[goods_imgurl]?>">
	<div>
	<?=$goods_info[goods_detail]?>
	</div>
	<a href="#" onclick="buy_goods('<?=$goods_idx?>')">Get It!!</a>
	<a href="#">facebook</a>
	<a href="#">KAKAOTALK</a>

  </body>
</html>



