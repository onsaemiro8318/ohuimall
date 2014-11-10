<?
	include_once "config.php";


	unset($media);
	$media = $_REQUEST[media];

	OM_InsertTrackingInfo($media, $gubun);

	if($check_mobile)
	{
		Header("Location:http://www.ohuimall.co.kr/MOBILE/");
		exit;
	}else{
		Header("Location:http://www.ohuimall.co.kr/PC/");
		exit;
	}

?>
