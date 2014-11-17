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
        <!-- <a href="#" onclick="javascript:buy_goods('<?=$goods_idx?>')"><img src="images/btn_getit.jpg"/></a> -->
        <a href="#input_1" class="open-popup-link"><img src="images/btn_getit.jpg"/></a>
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

    <div class="popup big white-popup" id="input_1" style="display:none !important">
      <div class="btn_close">
        <a href="javascript:history.back();" ><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content">
        <div class="title">
          <img src="images/pop_title_info.jpg" width="243" alt=""/> 
        </div>
        <div class="info_block">
          <div class="input_one name clearfix">
            <div class="label">이름</div>
            <div class="input"><input type="text" name="mb_name"></div>
          </div>
          <div class="input_one name clearfix">
            <div class="label">휴대폰번호</div>
            <div class="input"><input type="text" name="mb_phone" onkeyup="only_num(this)"></div>
          </div>
        </div>
        <div class="check_block">
          <div class="check_one clearfix">
            <div class="check"><input type="checkbox"></div>
            <div class="label"><a href="#">개인정보활용 동의</a></div>
          </div>
          <div class="check_one clearfix">
            <div class="check"><input type="checkbox"></div>
            <div class="label"><a href="#">개인정보취급위탁 동의</a></div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#">
            <img src="images/btn_input_comp_1.jpg" width="170" alt=""/> 
          </a>
        </div>
      </div>
    </div>

    <div id="fb-root"></div>
	<style>
	.white-popup {
		position: relative;
		background: #FFF;
		padding: 20px;
		width: auto;
		max-width: 500px;
		margin: 20px auto;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.open-popup-link').magnificPopup({
			type:'inline',
			midClick: true
		});
	});
	</script>
<?
	include_once "footer.php";

?>




