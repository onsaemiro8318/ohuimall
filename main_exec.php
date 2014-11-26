<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "winner_draw" :
		$goods_idx = $_REQUEST['idx'];
		$insert_rs = InsertBuyerInfo($goods_idx);
		$winner_chk = "N";
		if ($insert_rs)
		{
			$winner_chk = OM_WinCheck($goods_idx);
		}

		echo $winner_chk;
	break;

	case "insert_winner" :
		$mb_zipcode1	= $_REQUEST['zipcode1'];
		$mb_zipcode2	= $_REQUEST['zipcode2'];
		$mb_addr1		= $_REQUEST['addr1'];
		$mb_addr2		= $_REQUEST['addr2'];
		$goods_idx		= $_REQUEST['goods_idx'];
		$winner_phone	= $_REQUEST['winner_phone'];

		$query		= "INSERT INTO ".$_gl['winner_info_table']."(winner_phone, winner_zipcode1, winner_zipcode2, winner_address1, winner_address2, winner_ipaddr, winner_goods, winner_date) values('".$winner_phone."','".$mb_zipcode1."','".$mb_zipcode2."','".$mb_addr1."','".$mb_addr2."','".$_SERVER['REMOTE_ADDR']."','".$goods_idx."',now())";
		$result		= mysqli_query($my_db, $query);

		echo $result;
	break;
  
	case "insert_share_info" :
		$media = $_REQUEST['media'];
		$gubun = $_REQUEST['gubun'];
		$query		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, sns_date) values('".$media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."',now())";
		$result		= mysqli_query($my_db, $query);
	break;

	case "insert_name_phone" :
		$mb_name		= $_REQUEST['mb_name'];
		$mb_phone		= $_REQUEST['mb_phone'];
		$goods_idx		= $_REQUEST['goods_idx'];
		$buyer_gubun	= $_REQUEST['buyer_gubun'];

		$buyer_info = OM_GetBuyerInfoByPhone($mb_phone);

		$winner_chk = "N";

		if ($buyer_info > 0)
		{
			$winner_chk = "F";
			
			$userWinnerYN = OM_WinnerByPhone($mb_phone);

			if ($userWinnerYN > 0)
			{
				$winner_chk = "W";
			}

		}else{
			$insert_rs = InsertBuyerInfo($mb_name, $mb_phone, $goods_idx, $buyer_gubun);
			if ($insert_rs)
			{
				$winner_chk = OM_WinCheck($goods_idx);
			}
		}
		echo $winner_chk;

	break;
}

?>