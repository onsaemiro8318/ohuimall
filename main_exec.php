<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "winner_draw" :
		$goods_idx		= $_REQUEST['idx'];
		$goods_info = OM_GetGoodsInfo($goods_idx);

	break;

}

?>