<?
	// 설정파일
	include_once "../config.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
<!doctype html>
  <html lang="en">
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
    <div style="float:right;">
      <a href="index.php">처음으로</a>
    </div>
    <div>
      <h1>마음이 배송중 입니다!</h1>
      <h3>주문하신 어려지는 마음은</h3>
      <h3>[<?=$goods_info[goods_name]?>]입니다.</h3>
    </div>
    <h1>--------------------------------</h1>
	<div>
    <div style="float:left;">
      <img src="<?=$goods_info[goods_imgurl]?>">
    </div>
    <div>
      <p>당신을 가장 어리게 하는 것은</p>
      <p>화장품 등 가꿀 수 있는 물건일 수도 있지만</p>
      <p>설레었던 마음,</p>
      <p>첫 연애편지를 받았을 때가 아닐까요?</p>
      <p></p>
      <p>오늘, 당신에게 그때의 마음을 드립니다.</p>
      <p></p>
      <p>오늘 가장 어려지세요.</p>
    </div>
  </div>
  <div>
  <p>배송은 0월 0일 이후 일괄 발송되며</p>
  <p>문의는 abcd@abcd.com 070-1234-5678 로 문의 바랍니다.</p>
  </div>
	<a href="index.php">확인</a>
  </body>
</html>

<div id="fb-root"></div>



