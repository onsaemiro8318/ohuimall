<?
	include_once "config.php";


	unset($media);
	$media		= $_REQUEST['media'];
	$goods_idx	= $_REQUEST['goods_idx'];

	OM_InsertTrackingInfo($media, $gubun);

	if($check_mobile)
	{
		Header("Location:http://www.ohuimall.co.kr/MOBILE/index_".$goods_idx.".php");
		exit;
	}else{
		Header("Location:http://www.ohuimall.co.kr/PC/index_".$goods_idx.".php");
		exit;
	}

?>
