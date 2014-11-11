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
  </head>
  <body>
    <h1>'어려지는 마음'을 받기위해</h1>
    <h1>아래와 같이 정보가 필요합니다.</h1>
    이름 <input type="text" name="mb_name"><br />
	휴대폰번호 <input type="text" name="mb_phone"><br />
	우편번호   <input type="text" name="ziipcode1"> - 
	<input type="text" name="ziipcode2">
	<input type="button" value="우편번호 찾기"><br />
	상세주소   <input type="text" name="addr1"><br />
	<input type="text" name="addr2"><br />
	
	rpd;s
  </body>
</html>
