<?php
	include_once "../config.php";
	include_once "header.php";
?>
    <div class="content">
      <div class="txt_faq">
        <p>여성들의 피부 변화를 위해 17년간 노력해온 O HUI가</p>
        <p>이제, 피부를 넘어 삶 자체에 기분 좋은 변화를 선물하는 제품과</p>
        <p>캠페인들을 이어가려 합니다.</p>
        <p>그 첫 번째 캠페인으로 '마음을 파는 가게'를 시작합니다.</p>                                    
        <p></p>            
        <p class="title1">The Delightful Change</p>
        <p class="title2">O HUI</p>
        <p></p>            
      </div>
      
      <div class="faq">
<?php
	$query 		= "SELECT * FROM ".$_gl['faq_info_table']." ";
	$result 	= mysqli_query($my_db, $query);
	while($faq_info = mysqli_fetch_array($result))
	{
?>
        <div class="one_q" id="<?php echo $faq_info['idx']?>">
          <h2>
            <a href="#" class="clearfix">
              <span id="faq_sub<?php echo $faq_info['idx']?>" onclick="faq_toggle('<?php echo $faq_info['idx']?>');"><?php echo $faq_info['faq_subject']?></span>
              <span id="faq_sub<?php echo $faq_info['idx']?>" onclick="faq_toggle('<?php echo $faq_info['idx']?>');" class="arrow"><img src="images/arrow_faq.jpg" width="20" alt="" id="arrow_faq<?php echo $faq_info['idx']?>"/></span>
            </a>
          </h2>
          <p id="faq_con<?php echo $faq_info['idx']?>" style="display:none;"><?php echo $faq_info['faq_content']?></p>
        </div>
<?
	}
?>
      </div>
    </div>
<?
	include_once "footer.php";

?>

<script type='text/javascript'>
	var toggle_flag1 = 0;
	var toggle_flag2 = 0;
	var toggle_flag3 = 0;

	$(document).ready(function() {
		$("#faq_box dd").hide();
	});

	function faq_toggle(idx){
		var faq_con = "#faq_con" + idx;
		$(faq_con).slideToggle( "normal", function(){
			if (idx == 1)
			{
				if (toggle_flag1 == 0)
				{
					$("#arrow_faq" + idx).attr("src","images/arrow_faq2.jpg");
					toggle_flag1 = 1;
				}else{
					$("#arrow_faq" + idx).attr("src","images/arrow_faq.jpg");
					toggle_flag1 = 0;
				}
			}else if (idx == 2){
				if (toggle_flag2 == 0)
				{
					$("#arrow_faq" + idx).attr("src","images/arrow_faq2.jpg");
					toggle_flag2 = 1;
				}else{
					$("#arrow_faq" + idx).attr("src","images/arrow_faq.jpg");
					toggle_flag2 = 0;
				}
			}else{
				if (toggle_flag3 == 0)
				{
					$("#arrow_faq" + idx).attr("src","images/arrow_faq2.jpg");
					toggle_flag3 = 1;
				}else{
					$("#arrow_faq" + idx).attr("src","images/arrow_faq.jpg");
					toggle_flag3 = 0;
				}
			}
		});
	}
</script>
