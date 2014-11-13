<?php
	include_once "../config.php";
	include_once "header.php";
?>
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
      $(faq_con).slideToggle( "slow" );
    }
    
    </script>
