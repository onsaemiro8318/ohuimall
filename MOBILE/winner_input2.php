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
  우편번호 <input type="text" id="postcode1" readonly="readonly" size="5"> - <input type="text" id="postcode2" readonly="readonly" size="5">
  <input type="button" onclick="showDaumPostcode()" value="검색"><br />
  주소 <input type="text" id="addr1" readonly="readonly" size="50"><br />
  상세주소 <input type="text" id="addr2" size="50">
<div id="layer" style="display:none;border:5px solid;position:fixed;width:300px;height:460px;left:50%;margin-left:-155px;top:50%;margin-top:-235px;overflow:hidden;-webkit-overflow-scrolling:touch;">
<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px" onclick="closeDaumPostcode()" alt="닫기 버튼">
</div>
  <br />
	개인정보활용 동의 <input type="checkbox" name="privacychk1" id="privacychk1"><br />
	개인정보취급위탁 동의 <input type="checkbox" name="privacychk2" id="privacychk2">
	<input type="button" value="자세히보기"><br />
	<input type="button" value="입력완료" onclick="chkwinnerfrm()">
	</form>
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
<script src="http://dmaps.daum.net/map_js_init/postcode.js"></script>
<script>
    // 우편번호 찾기 iframe을 넣을 element
    var element = document.getElementById('layer');

    function closeDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element.style.display = 'none';
    }

    function showDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
                // 우편번호와 주소 및 영문주소 정보를 해당 필드에 넣는다.
                document.getElementById('postcode1').value = data.postcode1;
                document.getElementById('postcode2').value = data.postcode2;
                document.getElementById('addr1').value = data.address;
                document.getElementById('addr2').focus();
                // iframe을 넣은 element를 안보이게 한다.
                element.style.display = 'none';
            },
            width : '100%',
            height : '100%'
        }).embed(element);

        // iframe을 넣은 element를 보이게 한다.
        element.style.display = 'block';
    }
</script>