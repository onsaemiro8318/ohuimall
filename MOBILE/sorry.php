<?
	// 설정파일
	include_once "../config.php";
  	include_once "header_pop.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
    <div class="popup big">
      <div class="btn_close">
        <a href="index.php"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content fail">
        <div class="title">
          <img src="images/pop_title_fail.jpg"/>
        </div>
        <div class="f_img">
          <img src="images/pop_title_fail_img_p_<?=$goods_idx?>.jpg" alt=""/>
        </div>
        <div class="btn_share clearfix">
          <div class="btn_fb">
            <a href="#" onclick="javascript:fb_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_fb.jpg" width="40" alt=""/></a>
          </div>
          <div class="btn_kt">
            <a href="#" onclick="javascript:kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_kt.jpg" width="40" alt=""/></a>
          </div>
        </div>
      </div>
    </div>
    <div id="fb-root"></div>
  </body>
</html>