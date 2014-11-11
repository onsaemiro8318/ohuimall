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
		$mb_name		= $_REQUEST['mb_name'];
		$mb_phone		= $_REQUEST['mb_phone'];
		$mb_zipcode1	= $_REQUEST['zipcode1'];
		$mb_zipcode2	= $_REQUEST['zipcode2'];
		$mb_addr1		= $_REQUEST['addr1'];
		$mb_addr2		= $_REQUEST['addr2'];
		$goods_idx		= $_REQUEST['goods_idx'];

		$query		= "INSERT INTO ".$_gl['winner_info_table']."(winner_name, winner_phone, winner_zipcode1, winner_zipcode2, winner_address1, winner_address2, winner_ipaddr, winner_goods, winner_date) values('".$mb_name."','".$mb_phone."','".$mb_zipcode1."','".$mb_zipcode2."','".$mb_addr1."','".$mb_addr2."','".$_SERVER['REMOTE_ADDR']."','".$goods_idx."',now())";
		$result		= mysqli_query($my_db, $query);

		if ($result)
		{
			if ($gubun == "PC")
				echo "<script>location.href='/PC/complete.php?goods_idx=".$goods_idx."';</script>";
			else
				echo "<script>location.href='/MOBILE/complete.php?goods_idx=".$goods_idx."';</script>";
		}else{
			echo "<script>alert('정보 입력에 실패하였습니다.');</script>";
		}
	break;
  
  case "insert_share_info" :
    $media = $_REQUEST['media'];
    $gubun = $_REQUEST['gubun'];
  	$query		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, sns_date) values('".$media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."',now())";
  	$result		= mysqli_query($my_db, $query);
    
  break;
}

?>