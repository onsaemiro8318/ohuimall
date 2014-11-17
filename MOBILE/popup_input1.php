<?
	// 설정파일
	include_once "../config.php";
  	include_once "header_pop.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
    <div class="popup big">
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
  </body>
</html>
