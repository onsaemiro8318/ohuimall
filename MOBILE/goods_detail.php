<?
	$goods_idx	= $_REQUEST['goods_idx'];

	if($view_flag != "y"){ 
		setcookie("goods_view", $_COOKIE['goods_view'].",".$goods_idx, time()+(60*60*120)); 
	}
	// 설정파일
	include_once "../config.php";
  	include_once "header.php";


	// 최근 본 상품 쿠키 저장   $_COOKIE['goods_view'] =",4";  
	$view_arr = explode(",",$_COOKIE['goods_view']); 


	while(list($key,$val) = each($view_arr)){ 
		if($val==$goods_idx){ 
			$view_flag = "y"; 
		}
	}

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
    <div class="content">
      <div class="product_img">
        <!--품절시-->
        <div class="t_soldout"><img src="images/txt_soldout.png" width="60" alt=""/></div>
        <div class="img"><img src="images/big_product_1.jpg" alt="" border="0"/></div>
        <div class="img add"><img src="images/big_product_1_gift.jpg" alt=""/></div>
      </div>
      <div class="btn_getit">
        <a href="#" onclick="javascript:buy_goods('<?=$goods_idx?>')"><img src="images/btn_getit.jpg"/></a>
      </div> 
      <div class="btn_share_inview clearfix">
        <div class="txt">
          <img src="images/txt_desc_share_btn.jpg" width="145" alt=""/>
        </div>
        <div class="btn_fb">
          <a href="#" onclick="javascript:kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_fb.jpg" width="40" alt=""/></a>
        </div>
        <div class="btn_kt">
          <a href="#" onclick="javascript:fb_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_kt.jpg" width="40" alt=""/></a>
        </div>
      </div>      
    </div>
    <div id="fb-root"></div>
<?
	include_once "footer.php";

?>




