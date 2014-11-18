<?
	$goods_idx	= $_REQUEST['goods_idx'];

	// 설정파일
	include_once "../config.php";
  	include_once "header.php";

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
    <div class="content buy_comp">
      <div class="title">
        <h2><img src="images/pop_title_ship.jpg" width="180"alt=""/></h2>
        <p class="sub">주문하신 어려지는 마음은<br>
        [첫 연애편지를 받은 마음] 입니다.</p>
      </div> 
      <div class="product_img">
        <img src="images/buy_comp_product_1.jpg" alt="" border="0"/> 
      </div>
      <div class="info_detail d1">
        <h3><img src="images/title_buy_comp_detail.jpg" width="94" /></h3>
        <ul>
          <li>주문일자 :  2014년 12월 1일</li>
          <li>유효기간 :  2015년 3월 1일</li>
          <li>가      격 :  0 원 </li>
        </ul>
      </div>
      <div class="info_detail d2">
        배송은 12월 20일 이후 일괄 발송되며 문의는<br>  
        ju.lee@minivertising.kr 또는 070-4888-3580로 해주세요!
      </div>
      <div class="btn_block">
        <a href="index.php"><img src="images/btn_go_main.jpg" width="115" alt=""/></a>
      </div>
    </div>
<?
	include_once "footer.php";
?>