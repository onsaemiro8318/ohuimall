<?
	$goods_idx	= $_REQUEST['goods_idx'];

	// 최근 본 상품 쿠키 저장   $_COOKIE['goods_view'] =",4";  
	//$view_arr = explode(",",$_COOKIE['goods_view']); 

/*
	while(list($key,$val) = each($view_arr)){ 
		if($val==$goods_idx){ 
			$view_flag = "y"; 
		}
	}
*/
	//if($view_flag != "y"){ 
		setcookie("goods_view", $_COOKIE['goods_view'].",".$goods_idx, time()+(60*60*120)); 
	//}

	// 설정파일
	include_once "../config.php";
  	include_once "header.php";

	$goods_info = OM_GetGoodsInfo($goods_idx);


?>
    <input type="hidden" name="goods_idx" id="goods_idx" value="<?=$goods_idx?>">
	<div class="content g_960">
       <div class="product_img">
<?php
	$soldout_query 		= "SELECT goods_selcount FROM ".$_gl['goods_info_table']." WHERE idx = ".$goods_idx." ";
	$soldout_result 	= mysqli_query($my_db, $soldout_query);
	$soldout_cnt = mysqli_fetch_array($soldout_result);
	if($soldout_cnt[goods_selcount] >= 10)	
	{
?>         
       		<!--품절시-->
         <div class="t_soldout"><img src="images/txt_soldout.png" alt=""/></div>
<?php
	}
?>         
   	   	 <div class="img"><img src="images/big_product_<?=$goods_idx?>.jpg" alt="" border="0"/></div>
       </div>
       <div class="product_detail">
       	   <div class="product_txt">
       	   	<img src="images/big_product_<?=$goods_idx?>_txt.jpg" alt=""/> 
           </div>
           <div class="img add"><img src="images/big_product_<?=$goods_idx?>_gift.jpg" alt=""/></div>
           <div class="btn_block clearfix">
           	   <div class="inner">
                   <div class="btn_getit">
                        <a href="#"><img src="images/btn_buy.jpg"/></a>
                   </div>

                   <div class="btn_share_inview clearfix">
                       <div class="txt">
                         <img src="images/share_txt.jpg" alt=""/> 
                       </div>
                      <div class="btn_kt">
                          <a href="#" onclick="kt_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_kt.jpg" alt=""/></a>
                      </div>
                      <div class="btn_fb">
                          <a href="#" onclick="fb_share('<?=$goods_info['goods_name']?>','<?=$goods_info['goods_detail']?>','<?=$goods_info['goods_imgurl']?>','<?=$gubun?>');"><img src="images/btn_fb.jpg" alt=""/></a>
                      </div>
                   </div> 
               </div>
           </div> 
      </div> 

     <div class="product_detail_img">
        <img src="images/big_product_<?=$goods_idx?>_detail.jpg" width="960" height="608" alt=""/>
     </div>
     
    </div>


    <div id="fb-root"></div>
	<script src="http://dmaps.daum.net/map_js_init/postcode.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: true,
				fixedBgPos: true,
				overflowY: 'hidden',
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
					}
				}

			});

			$('.first-popup-link').magnificPopup({
				closeBtnInside:true
			});

			// 체크박스 스타일 설정
			$('.wrap_pop input').on('ifChecked ifUnchecked', function(event){
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



