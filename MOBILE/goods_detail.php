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

    <div class="content">
      <div class="product_img">
        <!--품절시-->
        <div class="t_soldout"><img src="images/txt_soldout.png" width="60" alt=""/></div>
        <div class="img"><img src="images/big_product_1.jpg" alt="" border="0"/></div>
        <div class="img add"><img src="images/big_product_1_gift.jpg" alt=""/></div>
      </div>
      <div class="btn_getit">
        <!-- <a href="#" onclick="javascript:buy_goods('<?=$goods_idx?>')"><img src="images/btn_getit.jpg"/></a> -->
        <a href="#input_1" class="popup-with-zoom-anim"><img src="images/btn_getit.jpg"/></a>
      </div> 
      <div class="btn_share_inview clearfix">
        <div class="txt">
          <img src="images/txt_desc_share_btn.jpg" width="145" alt=""/>
        </div>
        <div class="btn_fb">
          <a href="#" onclick="javascript:fb_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_fb.jpg" width="40" alt=""/></a>
        </div>
        <div class="btn_kt">
          <a href="#" onclick="javascript:kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_kt.jpg" width="40" alt=""/></a>
        </div>
      </div>      
    </div>

<!--  이름, 전화번호 입력 받는 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide" id="input_1">
      <div class="btn_close">
        <a href="#" onclick="javascript:magnificPopup.close();"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content">
        <div class="title">
          <img src="images/pop_title_info.jpg" width="243" alt=""/> 
        </div>
        <div class="info_block">
          <div class="input_one name clearfix">
            <div class="label">이름</div>
            <div class="input"><input type="text" name="mb_name" id="mb_name"></div>
          </div>
          <div class="input_one name clearfix">
            <div class="label">휴대폰번호</div>
            <div class="input"><input type="text" name="mb_phone" id="mb_phone" onkeyup="only_num(this)"></div>
          </div>
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
          <a href="#" onclick="input_name();return false;">
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
          <img src="images/pop_title_fail_img_p_01.jpg" alt=""/>
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
<!--  미당첨 페이지 DIV 끝  -->

<!--  개인정보 활용동의 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide" id="agree1_div">
      <div class="btn_close">
        <a href="#input_1" class="first-popup-link"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content notice">
        <div class="title">
          <img src="images/pop_title_notice_1.jpg" width="145" alt=""/>
        </div>
        <div class="txt_block">
        txt
        </div>
      </div>
    </div>
<!--  개인정보 활용동의 DIV 끝  -->

<!--  개인정보 취급위탁동의 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide" id="agree2_div">
      <div class="btn_close">
        <a href="#input_1" class="first-popup-link"><img src="images/btn_close.jpg" width="26" alt=""/></a>
      </div>
      <div class="content notice">
        <div class="title">
          <img src="images/pop_title_notice_2.jpg" width="175" alt=""/>
        </div>
        <div class="txt_block">
        txt
        </div>
      </div>
    </div>
<!--  개인정보 취급위탁동의 DIV 끝  -->


<!--  당첨자 추가 정보입력 DIV 시작  -->
    <div class="popup big zoom-anim-dialog mfp-hide" id="input_2">
      <div class="btn_close">
        <a href="javascript:magnificPopup.close();"><img src="images/btn_close.jpg" width="26" alt=""/></a>
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
                <div class="in"><input type="text" id="postcode1" readonly="readonly" size="5"></div>
                <div class="dash">-</div>
                <div class="in"><input type="text" id="postcode2" readonly="readonly" size="5"></div>
                <div class="btn"><a href="#" onclick="show_post();return false;"><img src="images/btn_search.jpg" width="50"/></a></div>
              </div>
            </div>
          </div>
          <div class="input_one detail_num clearfix">
            <div class="label">상세주소</div>
            <div class="input">
              <p class="first"><input type="text" id="addr1" readonly="readonly"></p>
              <p><input type="text" id="addr2"></p>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#">
            <img src="images/btn_input_comp_1.jpg" width="170" alt=""/> 
          </a>
        </div>
      </div>
    </div>
<!--  당첨자 추가 정보입력 DIV 끝  -->

<!--  주소검색 DIV 시작  -->
<div id="post_div" style="display:none;border:5px solid;position:fixed;width:95%;height:500px;margin-left:1%;top:50%;margin-top:-235px;overflow:hidden;-webkit-overflow-scrolling:touch;z-index:999999999999">
<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px" onclick="closeDaumPostcode()" alt="닫기 버튼">
</div>
<!--  주소검색 DIV 끝  -->



    <div id="fb-root"></div>
	<script src="http://dmaps.daum.net/map_js_init/postcode.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in',
				showCloseBtn : false

			});

			$('.popup-with-zoom-anim2').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in',
				showCloseBtn : false,
				callbacks: {
					open: function() {
						alert('135');
						showDaumPostcode();
					}
				}
			});


			$('.first-popup-link').magnificPopup({
				closeBtnInside:true
			});
			/*
			if ($('#post_div').css('display') == 'block') {
				alert('1111111111');
				showDaumPostcode();
			}
			*/

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