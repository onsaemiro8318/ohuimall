<?
	$goods_idx	= $_REQUEST['goods_idx'];

	// 설정파일
	include_once "../config.php";
	include_once "header.php";

	$goods_info = OM_GetGoodsInfo($goods_idx);


?>
    
	<div class="content g_960">
       <div class="product_img">
       		<!--품절시-->
         <div class="t_soldout"><img src="images/txt_soldout.png" alt=""/></div>
   	   	 <div class="img"><img src="images/big_product_<?=$goods_idx?>.jpg" alt="" border="0"/></div>
       </div>
       <div class="product_detail">
       	   <div class="product_txt">
       	   	<img src="images/big_product_<?=$goods_idx?>_txt.jpg" alt=""/> 
           </div>
           
      </div> 

     <div class="product_detail_img">
        <img src="images/big_product_<?=$goods_idx?>_detail.jpg" alt=""/>
     </div>
     <div class="product_view_box">
       <img src="images/view_list.jpg" alt=""/>
       <a href="http://www.ohui.co.kr/product/line.jsp?cid1=2&cid2=E" target="_blank"><img src="images/view_list_1.jpg" alt=""/ class="product_view_list"></a>
     </div>
     
    </div>


<?
	include_once "footer.php";

?>