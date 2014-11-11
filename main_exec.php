<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "winner_draw" :
		$goods_idx = $_REQUEST['idx'];
		$update_rs = InsertBuyerInfo($goods_idx);
		
		if ($update_rs)
		{
			$goods_info = OM_WinCheck($goods_idx);
		}
	break;

}

?>