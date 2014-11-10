<?
	// 상품정보 (idx)
	function OM_GetGoodsInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl['goods_info_table']." WHERE idx='".$idx."'";
		$result 	= mysqli_query($my_db, $query);
		$info		= mysqli_fetch_array($result);

		return $info;
	}

	// 상품 선택 갯수 업데이트
	function UpdateGoodsInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 		= "UPDATE ".$_gl['goods_info_table']." SET goods_buycnt = goods_buycnt + 1 WHERE idx='".$idx."'";
		$result 	= mysqli_query($my_db, $query);

		return $result;
	}

	// 유입매체 정보 입력
	function OM_InsertTrackingInfo($media, $gubun)
	{
		global $_gl;
		global $my_db;

		$query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$result		= mysqli_query($my_db, $query);
	}

?>