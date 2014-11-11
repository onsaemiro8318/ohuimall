<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "winner_draw" :
		$goods_idx = $_REQUEST['idx'];
		$update_rs = InsertBuyerInfo($goods_idx);
		$winner_chk = "N";
		if ($update_rs)
		{
			$winner_chk = OM_WinCheck($goods_idx);
		}

		echo $winner_chk;
	break;

}

?>