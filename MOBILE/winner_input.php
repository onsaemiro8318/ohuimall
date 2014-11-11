<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";

	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);
?>
    <form name="addrfrm" method="post" action="../main_exec.php">
    <input type="hidden" name="exec" value="insert_winner" />
    <input type="hidden" id="postcode6" value="" />
    <input type="hidden" id="address" value="" />
    <input type="hidden" id="details" value="" />
    <input type="hidden" id="goods_idx" name="goods_idx" value="<?=$goods_idx?>" />
    <h1>'어려지는 마음'을 받기위해</h1>
    <h1>아래와 같이 정보가 필요합니다.</h1>
    이름 <input type="text" name="mb_name"><br />
	휴대폰번호 <input type="tel" name="mb_phone" onkeyup="only_num(this)"><br />
	우편번호   <input type="text" name="zipcode1" id="zipcode1" readonly> - 
	<input type="text" name="zipcode2" id="zipcode2" readonly>
	<input type="button" value="우편번호 찾기" onclick="popupzipcode()"><br />
	상세주소   <input type="text" name="addr1" id="addr1"><br />
	<input type="text" name="addr2" id="addr2"><br />

	개인정보활용 동의 <input type="checkbox" name="privacychk1" id="privacychk1"><br />
	개인정보취급위탁 동의 <input type="checkbox" name="privacychk2" id="privacychk2">
	<input type="button" value="자세히보기"><br />
	<input type="button" value="입력완료" onclick="chkwinnerfrm()">
	</form>
	<div id="input_zipcode" style="width:100%;height:100%;position:absolute;top:0px;left:0px;display:none;background:gray">
	</div>
  </body>
</html>
<script type="text/javascript">
$(function() {	
	$("#input_zipcode").postcodify({
		insertPostcode6 : "#postcode6",
		insertAddress : "#addr1",
		insertDetails : "#addr2",
		afterSelect: function(){
			var zipcode_str	= $("#postcode6").val();
			var zipcode_arr	= zipcode_str.split("-");
			$("#zipcode1").val(zipcode_arr[0]);
			$("#zipcode2").val(zipcode_arr[1]);
			$("#input_zipcode").hide();
		}
	}); 
});

</script>