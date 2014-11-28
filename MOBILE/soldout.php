<?
	$goods_idx	= $_REQUEST['goods_idx'];

	// 설정파일
	include_once "../config.php";
	include_once "header.php";

	$goods_info = OM_GetGoodsInfo($goods_idx);


?>    
    <div class="content">
       <div class="product_img">
       		<!--품절시-->
         <div class="t_soldout"><img src="images/txt_soldout.png" width="60" alt=""/></div>
   	   	 <div class="img"><img src="images/big_product_<?=$goods_idx?>.jpg" alt="" border="0"/></div>
            <div class="img add"><img src="images/big_product_<?=$goods_idx?>_gift.jpg" alt=""/></div>
            
      </div>
      <div class="product_img">
        <div class="img add2"><img src="images/big_product_<?=$goods_idx?>_detail.jpg" alt=""/></div>
      </div>
      <div class="product_view_box">
        <img src="images/view_list.png" alt=""/>
        <a href="http://www.ohui.co.kr/product/line.jsp?cid1=2&cid2=E" target="_blank"><img src="images/view_list_1.png" alt=""/ class="product_view_list"></a>
      </div> 
    </div>
    


<?
	include_once "footer.php";

?>