<?
	// 설정파일
	include_once "../config.php";
  	include_once "header.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
	<img src="<?=$goods_info['goods_imgurl']?>">
	<div>
	<?=$goods_info['goods_detail']?>
	</div>
	<a href="#" onclick="buy_goods('<?=$goods_idx?>')">Get It!!</a>
	<a href="#" onclick="fb_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');">facebook</a>
	<a href="#" onclick="kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');">KAKAOTALK</a>
  </body>
</html>

<div id="fb-root"></div>



