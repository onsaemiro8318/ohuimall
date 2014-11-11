<?
	// 설정파일
	include_once "../config.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
<html>
  <head>
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0"/>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/om.js'></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://cdn.poesis.kr/post/search.min.js"></script>
    <link href="http://cdn.poesis.kr/post/search.css" rel="stylesheet" media="all" />
  </head>
  <body>
    <input type="text" id="postcode6" value="" />
    <input type="text" id="address" value="" />
    <input type="text" id="details" value="" />
    <input type="text" id="extra_info" value="" />
    <h1>'어려지는 마음'을 받기위해</h1>
    <h1>아래와 같이 정보가 필요합니다.</h1>
    이름 <input type="text" name="mb_name"><br />
	휴대폰번호 <input type="text" name="mb_phone"><br />
	우편번호   <input type="text" name="ziipcode1" readonly> - 
	<input type="text" name="ziipcode2" readonly>
	<input type="button" value="우편번호 찾기" onclick="popupzipcode()"><br />
	상세주소   <input type="text" name="addr1"><br />
	<input type="text" name="addr2"><br />
	
	개인정보활용 동의 <input type="check" name="privacychk1" id="privacychk1"><br />
	개인정보활용 동의 <input type="check" name="privacychk2" id="privacychk2">
	<input type="button" value="자세히보기"><br />
	<input type="button" value="입력완료">
	<div id="input_zipcode" style="width:100%;height:100%;display:none">
	11
	</div>
  </body>
</html>
<script>
    $(function() { $("#input_zipcode").postcodify({
        insertPostcode6 : "#postcode6",
        insertAddress : "#address",
        insertDetails : "#details",
        insertExtraInfo : "#extra_info",
        afterSelect: function(){
			$("#input_zipcode").hide();
		}
    }); });
</script>