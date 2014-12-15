<?
	$goods_idx	= "4";

	// 설정파일
	include_once "../config.php";
	//include_once "header.php";


	// 최근 본 상품 쿠키 저장   $_COOKIE['goods_view'] =",4";  
	$view_arr = explode(",",$_COOKIE['goods_view']); 


	while(list($key,$val) = each($view_arr)){ 
		if($val==$goods_idx){ 
			$view_flag = "y"; 
		}
	}
	if($view_flag != "y"){ 
		setcookie("goods_view", $_COOKIE['goods_view'].",".$goods_idx, time()+(60*60*120)); 
	}

	$goods_info = OM_GetGoodsInfo($goods_idx);

	$os_style	= "style='-webkit-appearance: none;-webkit-border-radius: 0;border:1px solid #d2d2d2;'";

	$soldout_query 		= "SELECT goods_selcount, goods_total_stock FROM ".$_gl['goods_info_table']." WHERE idx = '".$goods_idx."' ";
	$soldout_result 	= mysqli_query($my_db, $soldout_query);
	$soldout_cnt = mysqli_fetch_array($soldout_result);
	if($soldout_cnt['goods_selcount'] >= $soldout_cnt['goods_total_stock'])	
		$soldout = "Y";
	else
		$soldout = "N";

?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta property="og:title" content="마음을 파는 가게">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://ohuimall.co.kr/MOBILE/goods_detail_4.php">
    <meta property="og:image" content="http://www.ohuimall.co.kr/images/can_img_4.jpg">
    <meta property="og:description" content="어릴 적 당신이 지녔던 '그 마음'을 팝니다">
    <link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
    <title>OHUI MALL</title>
    <!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
    <link href="css/style_m.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../lib/iCheck/skins/all.css">
    <link rel="stylesheet" href="../lib/bxslider/m.jquery.bxslider.css">
    <link rel="stylesheet" href="../lib/Magnific-Popup/magnific-popup.css"> 
    <link href="http://cdn.poesis.kr/post/search.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="../lib/touchTouch/touchTouch.css"> 
    <!-- <link rel="stylesheet" href="../js/jquery.mobile/jquery.mobile-1.4.5.min.css" /> -->
    <script type='text/javascript' src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src="../js/analytics.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script type='text/javascript' src='../js/jquery.animsition.min.js'></script>
    <script type='text/javascript' src='../lib/iCheck/icheck.js'></script>
    <!-- <script type='text/javascript' src='../js/jquery.mobile/jquery.mobile-1.4.5.min.js'></script> -->
    <script type='text/javascript' src='../js/om.js'></script>
    <script type="text/javascript" src="../lib/touchTouch/touchTouch.jquery.js"></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
    <script type='text/javascript' src='../js/kakao.link.js'></script>
    <script type='text/javascript' src="http://cdn.poesis.kr/post/search.min.js"></script>
    <script type="text/javascript" src="../lib/bxslider/plugins/jquery.fitvids.js"></script>
    <script type="text/javascript" src="../lib/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="../lib/Magnific-Popup/jquery.magnific-popup.js"></script>
	<style>
/* Styles for dialog window */
#input_1 {
	background: white;
	position: relative;
}


/**
 * Fade-zoom animation for first dialog
 */

/* start state */
.my-mfp-zoom-in .zoom-anim-dialog {
	opacity: 0;

	-webkit-transition: all 0.2s ease-in-out; 
	-moz-transition: all 0.2s ease-in-out; 
	-o-transition: all 0.2s ease-in-out; 
	transition: all 0.2s ease-in-out; 



	-webkit-transform: scale(0.8); 
	-moz-transform: scale(0.8); 
	-ms-transform: scale(0.8); 
	-o-transform: scale(0.8); 
	transform: scale(0.8); 
}

/* animate in */
.my-mfp-zoom-in.mfp-ready .zoom-anim-dialog {
	opacity: 1;

	-webkit-transform: scale(1); 
	-moz-transform: scale(1); 
	-ms-transform: scale(1); 
	-o-transform: scale(1); 
	transform: scale(1); 
}

/* animate out */
.my-mfp-zoom-in.mfp-removing .zoom-anim-dialog {
	-webkit-transform: scale(0.8); 
	-moz-transform: scale(0.8); 
	-ms-transform: scale(0.8); 
	-o-transform: scale(0.8); 
	transform: scale(0.8); 

	opacity: 0;
}

/* Dark overlay, start state */
.my-mfp-zoom-in.mfp-bg {
	opacity: 0.001; /* Chrome opacity transition bug */
	-webkit-transition: opacity 0.3s ease-out; 
	-moz-transition: opacity 0.3s ease-out; 
	-o-transition: opacity 0.3s ease-out; 
	transition: opacity 0.3s ease-out;
}
/* animate in */
.my-mfp-zoom-in.mfp-ready.mfp-bg {
	opacity: 0.8;
}
/* animate out */
.my-mfp-zoom-in.mfp-removing.mfp-bg {
	opacity: 0;
}



/**
 * Fade-move animation for second dialog
 */

/* at start */
.my-mfp-slide-bottom .zoom-anim-dialog {
	opacity: 0;
	-webkit-transition: all 0.2s ease-out;
	-moz-transition: all 0.2s ease-out;
	-o-transition: all 0.2s ease-out;
	transition: all 0.2s ease-out;

	-webkit-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
	-moz-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
	-ms-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
	-o-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
	transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );

}

/* animate in */
.my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
	opacity: 1;
	-webkit-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
	-moz-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
	-ms-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
	-o-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
	transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
}

/* animate out */
.my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
	opacity: 0;

	-webkit-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
	-moz-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
	-ms-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
	-o-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
	transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
}

/* Dark overlay, start state */
.my-mfp-slide-bottom.mfp-bg {
	opacity: 0.01;

	-webkit-transition: opacity 0.3s ease-out; 
	-moz-transition: opacity 0.3s ease-out; 
	-o-transition: opacity 0.3s ease-out; 
	transition: opacity 0.3s ease-out;
}
/* animate in */
.my-mfp-slide-bottom.mfp-ready.mfp-bg {
	opacity: 0.8;
}
/* animate out */
.my-mfp-slide-bottom.mfp-removing.mfp-bg {
	opacity: 0;
}
	</style>

  </head>
  <body>
    <div class="header">
      <div class="logo_block clearfix">
        <div class="logo"><a href="http://www.ohui.co.kr/" target="_blank"><img src="images/logo.png" width="60" alt="" boder="0"/></a></div>
        <div class="logo_title"><img src="images/logo_title.png" width="120" alt=""/></div>
      </div>
      <div class="title_block"><a href="index.php"><img src="images/title.jpg" width="200" boder="0" /></a></div>
      <div class="menu_block">
        <ul class="clearfix">
<?
	if (strpos($_SERVER["PHP_SELF"],"index.php") !== false)
	{
?>
          <li><a href="index.php"><img src="images/btn_navi_mall_02.jpg" width="40" alt=""/></a></li>
<?
	}else{
?>
          <li><a href="index.php"><img src="images/btn_navi_mall.jpg" width="40" alt=""/></a></li>
<?
	}
?>
          <li><img src="images/navi_bar.jpg" width="1" alt=""/></li>
<?
	if (strpos($_SERVER["PHP_SELF"],"faq.php") !== false)
	{
?>
          <li><a href="faq.php"><img src="images/btn_navi_faq_02.jpg" width="40" alt=""/></a></li>
<?
	}else{
?>
          <li><a href="faq.php"><img src="images/btn_navi_faq.jpg" width="40" alt=""/></a></li>
<?
	}
?>
        </ul>
      </div>
    </div>

    <input type="hidden" name="goods_idx" id="goods_idx" value="<?=$goods_idx?>">
    <div class="content">
      <div class="product_img">
        <!--품절시-->
<?
	if ($soldout == "Y")
	{
?>
        <div class="t_soldout"><img src="images/txt_soldout.png" width="60" alt=""/></div>
        <div class="img"><img src="images/big_product_<?=$goods_idx?>_out.jpg" alt="" border="0"/></div>
<?
	}else{
?>
        <div class="img"><img src="images/big_product_<?=$goods_idx?>.jpg" alt="" border="0"/></div>
<?
	}
?>
        <!-- <div class="img add"><img src="images/big_product_<?=$goods_idx?>_gift.jpg" alt=""/></div> -->
      </div>
      <div class="btn_getit">
        <!-- <a href="#" onclick="javascript:buy_goods('<?=$goods_idx?>')"><img src="images/btn_getit.jpg"/></a> -->
<?
	if ($soldout == "Y")
	{
?>
        <img src="images/btn_getit_out.jpg"/>
<?
	}else{
?>
        <a href="#input_1" class="popup-with-zoom-anim"><img src="images/btn_getit.jpg"/></a>
<?
	}
?>
      </div> 
      <div class="btn_share_inview clearfix">
        <div class="txt">
          <img src="images/txt_desc_share_btn.jpg" width="145" alt=""/>
        </div>
        <div class="btn_fb">
          <a href="#" onclick="javascript:fb_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>','<?=$goods_info['idx']?>');"><img src="images/btn_fb.jpg" width="40" alt=""/></a>
        </div>
        <div class="btn_kt">
          <a href="#" onclick="javascript:kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_kt.jpg" width="40" alt=""/></a>
        </div>
      </div>      
      <div class="product_img">
        <div class="img add2">
<?
	if ($soldout == "Y")
	{
?>
          <img src="images/big_product_<?=$goods_idx?>_gift.jpg" alt=""/>
<?
	}else{
?>
          <img src="images/txt_noti.jpg" alt="" class="secret_noti"/>
<?
	}
?>
          <img src="images/big_product_<?=$goods_idx?>_detail.jpg" alt=""/>
        </div>
      </div>
      <div class="product_view_box">
        <img src="images/view_list.png" alt=""/>
        <a href="http://www.ohui.co.kr/product/line.jsp?cid1=2&cid2=E" target="_blank"><img src="images/view_list_1.png" alt=""/ class="product_view_list"></a>
      </div>
    </div>

<!--  이름, 전화번호 입력 받는 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide" id="input_1">
      <div class="btn_close">
        <a href="#" onclick="javascript:close_div('input_1');"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content">
        <div class="title">
          <img src="images/pop_title_info.jpg" width="243" alt=""/> 
        </div>
        <div class="info_block">
          <div class="input_one name clearfix">
            <div class="label">이름</div>
            <div class="input"><input type="text" name="mb_name" id="mb_name" onblur="only_kor(this)" <?=$os_style?>></div>
          </div>
          <div class="input_one name clearfix">
            <div class="label">휴대폰번호</div>
            <div class="input"><input type="tel" name="mb_phone" id="mb_phone" onkeyup="only_num(this)" <?=$os_style?>></div>
          </div>
          <div class="input_notice"><p>'-'없이 번호만 입력해주세요.</p></div>
        </div>
        <div class="check_block">
          <div class="check_one clearfix">
            <div class="check"><input type="checkbox" name="agree1" id="agree1"></div>
            <div class="label"><a href="#agree1_div" class="popup-with-zoom-anim">개인정보활용 동의</a></div>
          </div>
          <div class="check_one clearfix">
            <div class="check"><input type="checkbox" name="agree2" id="agree2"></div>
            <div class="label"><a href="#agree2_div" class="popup-with-zoom-anim">개인정보취급위탁 동의</a></div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_name('<?=$gubun?>','<?=$_SESSION['ss_media']?>');return false;">
            <img src="images/btn_input_comp_1.jpg" width="170" alt=""/> 
          </a>
        </div>
      </div>
    </div>
<!--  이름, 전화번호 입력 받는 DIV 끝  -->

<!--  미당첨 페이지 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide" id="sorry_div">
      <div class="btn_close">
        <a href="javascript:magnificPopup.close();"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content fail">
      	<div class="title">
     	    <img src="images/pop_title_fail.jpg"/>
        </div>
        <div class="f_img">
     	   	<img src="images/pop_title_fail_img_p_<?=$goods_idx?>.jpg" alt=""/>
        </div>
        <div class="btn_share clearfix">
          <div class="txt">
            <img src="images/share_txt.jpg" width="165" >
          </div>
          <div class="btn_fb">
            <a href="#" onclick="javascript:fb_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>','<?=$goods_info['idx']?>');"><img src="images/btn_fb.jpg" width="38" alt=""/></a>
          </div>
          <div class="btn_kt">
            <a href="#" onclick="javascript:kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_kt.jpg" width="38" alt=""/></a>
          </div>
        </div>
      </div>
    </div>
<!--  미당첨 페이지 DIV 끝  -->

<!--  개인정보 활용동의 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide agree_pop" id="agree1_div">
      <div class="btn_close">
        <a href="#input_1" class="first-popup-link"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content notice">
        <div class="title">
          <img src="images/pop_title_notice_1.jpg" width="145" alt=""/>
        </div>
        <div class="txt_block agree_box">
        <p>(주)엘지생활건강(이하 "엘지생활건강")은 이벤트 참여를 위한 개인정보 수집 이용을 위하여 다음과 같이 귀하의 동의를 받고자 합니다.</p> 
        <p>&nbsp;</p>
        <p>- 구분: 필수항목</p>
        <p>- 개인정보 수집항목: 이름, 휴대폰 번호, 배송받으실 주소, Cookie와 URL 등을 포함하는 Browsing Session 정보</p>
        <p>- 수집목적: 이벤트 참여 및 진행</p>
        <p>- 보유 및 이용기간: 이벤트 종료 후 3개월 간, 3개월 이후 즉시 파기</p>
        <p>&nbsp;</p>
        <p>엘지생활건강은 이벤트 진행을 위하여 개인정보를 수집하고 있습니다. 제공받은 고객의 정보는 이벤트 진행에 한하여 이용되며 이벤트 목적 이외로 이용되지 않습니다. </p>
        </div>
      </div>
    </div>
<!--  개인정보 활용동의 DIV 끝  -->

<!--  개인정보 취급위탁동의 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide agree_pop" id="agree2_div">
      <div class="btn_close">
        <a href="#input_1" class="first-popup-link"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content notice">
        <div class="title">
          <img src="images/pop_title_notice_2.jpg" width="175" alt=""/>
        </div>
        <div class="txt_block agree_box">
        <p>(주)엘지생활건강(이하 "엘지생활건강")은 이벤트 참여를 위한 개인정보 수집 이용을 위하여 다음과 같이 귀하의 동의를 받고자 합니다.</p>         
        <p>&nbsp;</p>        
        <p>- 정보 제공 제휴사: 미니버타이징</p>
        <p>- 개인정보 항목: 이름, 휴대폰 번호, 배송받으실 주소</p>
        <p>- 이용목적: 이벤트 당첨 확인 및 당첨 안내 업무</p>
        <p>- 보유 및 이용기간: 이벤트 종료 후 3개월 간, 3개월 이후 즉시 파기</p>
        <p>&nbsp;</p>
        <p>엘지생활건강은 이벤트 당첨 확인 및 안내 업무를 위하여 고객의 정보를 위탁하고 있으며, 명시된 업무 이외의 내용으로 고객의 정보를 위탁하거나 제공하지 않습니다.</p>
        </div>
      </div>
    </div>
<!--  개인정보 취급위탁동의 DIV 끝  -->


<!--  당첨자 추가 정보입력 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide" id="input_2">
      <input type="hidden" name="winner_phone" id="winner_phone">
      <div class="btn_close">
        <a href="javascript:javascript:close_div('input_2');"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content address">
        <div class="title">
          <img src="images/pop_title_address.jpg" width="240"/>
        </div>
        <div class="sub_title">
          <img src="images/pop_title_address2.jpg" width="215" alt=""/>
        </div>
        <div class="info_block">
          <div class="input_one add_num clearfix">
            <div class="label">우편번호</div>
            <div class="input">
              <div class="inner clearfix">
                <div class="in"><input type="text" id="postcode1" readonly="readonly" size="5" <?=$os_style?>></div>
                <div class="dash">-</div>
                <div class="in"><input type="text" id="postcode2" readonly="readonly" size="5" <?=$os_style?>></div>
                <div class="btn"><a href="#" onclick="show_post();return false;"><img src="images/btn_search.jpg" width="50"/></a></div>
              </div>
            </div>
          </div>
          <div class="input_one detail_num clearfix">
            <div class="label">상세주소</div>
            <div class="input">
              <p class="first"><input type="text" id="addr1" readonly="readonly" <?=$os_style?>></p>
              <p><input type="text" id="addr2" <?=$os_style?>></p>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="input_address();return false;">
            <img src="images/btn_input_comp_1.jpg" width="170" alt=""/> 
          </a>
        </div>
      </div>
    </div>
<!--  당첨자 추가 정보입력 DIV 끝  -->

<!--  주소검색 DIV 시작  -->
    <!-- <div id="post_div" style="display:none;border:5px solid;position:fixed;width:95%;height:430px;margin-left:1%;top:50%;margin-top:-235px;overflow:auto;-webkit-overflow-scrolling:touch;z-index:999999999999">
      <img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px" onclick="closeDaumPostcode()" alt="닫기 버튼">
    </div> -->
    <div id="post_div" style="display:none;position:fixed;width:100%;height:100%;top:0px;overflow:hidden;-webkit-overflow-scrolling:touch;z-index:99998">
      <img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:0px;top:0px;z-index:99999" onclick="closeDaumPostcode()" alt="닫기 버튼">
    </div>
<!--  주소검색 DIV 끝  -->

    <div id="fb-root"></div>
	<script src="http://dmaps.daum.net/map_js_init/postcode.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: true,
				fixedBgPos: false,
				overflowY: 'auto',
				closeBtnInside: true,
				//preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in',
				showCloseBtn : false,
				callbacks: {
					close: function() {
						$("#mb_name").val("");
						$("#mb_phone").val("");
						$('input').iCheck('uncheck');
						$("#postcode1").val("");
						$("#postcode2").val("");
						$("#addr1").val("");
						$("#addr2").val("");
						$("#post_div").hide();
					}
				}

			});

			$('.first-popup-link').magnificPopup({
				closeBtnInside:true
			});

			// 체크박스 스타일 설정
			$('.popup input').on('ifChecked ifUnchecked', function(event){
				//alert(this.id);
			}).iCheck({
				checkboxClass: 'icheckbox_flat-red',
				increaseArea: '0%'
			});


		});
		var magnificPopup = $.magnificPopup.instance;

		function closeDaumPostcode() {
			// iframe을 넣은 element를 안보이게 한다.
			element.style.display = 'none';
		}

			// 우편번호 찾기 iframe을 넣을 element
			var element = document.getElementById('post_div');

			function showDaumPostcode() {
				new daum.Postcode({
					oncomplete: function(data) {
						// 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
						// 우편번호와 주소 및 영문주소 정보를 해당 필드에 넣는다.
						document.getElementById('postcode1').value = data.postcode1;
						document.getElementById('postcode2').value = data.postcode2;
						document.getElementById('addr1').value = data.address;
						document.getElementById('addr2').focus();
						// iframe을 넣은 element를 안보이게 한다.
						element.style.display = 'none';
					},
					width : '100%',
					height : '100%'
				}).embed(element);

				// iframe을 넣은 element를 보이게 한다.
				//element.style.display = 'block';
			}


		function show_post()
		{
			$("#post_div").show();

			showDaumPostcode();
		}

	</script>
<?
	include_once "footer.php";
?>
