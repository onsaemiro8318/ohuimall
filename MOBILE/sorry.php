<?
	// 설정파일
	include_once "../config.php";
	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
<?
	// 설정파일
	include_once "../config.php";

	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
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
    <link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
      <title>OHUI MALL</title>
    <!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
    <link href="css/style_m.css" rel="stylesheet" type="text/css">
    <script type='text/javascript' src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script type='text/javascript' src='../js/om.js'></script>
    <script type='text/javascript' src='../js/kakao.link.js'></script>
  </head>


  <body class="pop_bg">
    <div class="popup big">
      <div class="btn_close">
        <a href="index.php"><img src="images/btn_close.jpg" width="26" alt=""/></a>
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
    <div id="fb-root"></div>
  </body>
</html>