<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
    <title>OHUI MALL</title>
    <!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
    <link href="css/style_m.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../lib/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="../lib/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="../lib/iCheck/skins/all.css">
    <link rel="stylesheet" href="../lib/bxslider/jquery.bxslider.css">
	<link rel="stylesheet" href="../lib/Magnific-Popup/magnific-popup.css"> 
    <link href="http://cdn.poesis.kr/post/search.css" rel="stylesheet" media="all" />
    <!-- <link rel="stylesheet" href="../js/jquery.mobile/jquery.mobile-1.4.5.min.css" /> -->
    <script type='text/javascript' src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script type='text/javascript' src='../js/jquery.animsition.min.js'></script>
    <script type='text/javascript' src='../lib/iCheck/icheck.js'></script>
    <!-- <script type='text/javascript' src='../js/jquery.mobile/jquery.mobile-1.4.5.min.js'></script> -->
    <script type='text/javascript' src='../js/om.js'></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
    <script type='text/javascript' src="../lib/owl/owl.carousel.min.js"></script>
    <script type='text/javascript' src='../js/kakao.link.js'></script>
    <script type='text/javascript' src="http://cdn.poesis.kr/post/search.min.js"></script>
    <script type="text/javascript" src="../lib/bxslider/plugins/jquery.fitvids.js"></script>
    <script type="text/javascript" src="../lib/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="../lib/Magnific-Popup/jquery.magnific-popup.js"></script>
	<style>
	.your-special-css-class {
		max-width: 320px !important;
		height: 85%;
		margin: auto;
		max-height: 780px;
		padding: 140% 16px 0 13px !important;
	}
	</style>
  </head>
  <body>
  <a href="#f_div" class="iframe-link">111</a>
<div id="layer" style="display:none;border:5px solid;position:fixed;width:300px;height:460px;left:50%;margin-left:-155px;top:50%;margin-top:-235px;overflow:hidden;-webkit-overflow-scrolling:touch;z-index:9999999999">
<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px" onclick="closeDaumPostcode()" alt="닫기 버튼">
</div>
<div id="f_div" class="mfp-hide" style="width:200px;height:200px;background:green">
<a href="#layer" onclick="show_div()">2222</a>
</div>
  </body>
</html>
<script type="text/javascript">
    // 우편번호 찾기 iframe을 넣을 element
    var element = document.getElementById('layer');

	$(document).ready(function() {
		$('.iframe-link').magnificPopup({
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
		});

		$('.iframe-link2').magnificPopup({
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
					alert('111');
					showDaumPostcode();
				}
			}
		});


	});

	function show_div()
	{
		alert('111');
		showDaumPostcode();
		$("#layer").show();
	}
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
    }

</script>
<script src="http://dmaps.daum.net/map_js_init/postcode.js"></script>
<script>

    function closeDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element.style.display = 'none';
    }


  $(document).ready(function(){
	$('.chk_div input').on('ifChecked ifUnchecked', function(event){
		alert(this.id);
	}).iCheck({
		checkboxClass: 'icheckbox_square-red',
		increaseArea: '20%'
	});

  });
