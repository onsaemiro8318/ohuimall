<?php
  	include_once "../config.php";
?>
<html>
  <head>
    <title>내일을부탁해 - 드림풀 매칭그랜트 캠페인</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0"/>
    <link href="../lib/owl/owl.carousel.css" rel="stylesheet">
    <link href="../lib/owl/owl.theme.css" rel="stylesheet">
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
    <script src="../lib/owl/owl.carousel.js"></script>
  </head>
  <body>
    <div>
      <h3>마음을 파는 쇼핑몰</h3>
      <h1>오늘을 가장 어리게</h1>
      <h4>Introduce / Mall / FAQ</h4>
    </div>
    <h1>--------------------------------</h1>
    <div>
      <div id="faq_box">
<?php
$query 		= "SELECT * FROM ".$_gl['faq_info_table']." ";
$result 	= mysqli_query($my_db, $query);
while($faq_info = mysqli_fetch_array($result))
{
?>        
        <dl id="<?php echo $faq_info['idx']?>">
          <dt class="faq_sub" id="faq_sub<?php echo $faq_info['idx']?>" onclick="faq_toggle('<?php echo $faq_info['idx']?>');"><p><?php echo $faq_info['faq_subject']?></p></dt>
          <dd class="faq_con" id="faq_con<?php echo $faq_info['idx']?>"><?php echo $faq_info['faq_content']?></dd>
        </dl>
<?php
}
?>        
      </div>
    </div>
  </body>
  </html>

    <style>

    </style>

    <script type='text/javascript'>
    $(document).ready(function() {
      $("#faq_box dd").hide();      
    });    
    
    function faq_toggle(idx){      
      var faq_con = "#faq_con" + idx
      $(faq_con).toggle();
    }
    
    </script>
