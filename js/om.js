Kakao.init('c5556af7d14dd4e6e4f22a3b954a57bd');

window.fbAsyncInit = function() {
  FB.init({
    appId      : '744500028976771',
    xfbml      : true,
    version    : 'v2.2'
  });
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

function buy_goods(idx)
{
	if (confirm('마음을 구매하시겠습니까?'))
	{
		$.ajax({
			type:"POST",
			data:{
				"exec" : "winner_draw",
				"idx" : idx
			},
			url: "../main_exec.php",
			success: function(response){
				if (response == "Y")
					location.href = "winner_input.php?goods_idx=" + idx;
				else
					location.href = "sorry.php?goods_idx=" + idx;
			}
		});
	}
}

function fb_share(name,detail,imgurl)
{
	FB.ui(
	{
		method: 'feed',
		name: '오늘을 가장 어리게',
		link: 'http://ohuimall.co.kr',
		picture: imgurl,
		caption: 'ohuimall.co.kr',
		//description: job + " - " + job_explain
		description: detail
	},function(response) {
			if (response && response.post_id) {

			}else{
        
      }
		}
	);
}

function kt_share(name,detail,imgurl)
{
	Kakao.Link.sendTalkLink({
		//container: '#kakao-link-btn',
		label: detail,
		image: {
			src: imgurl,
			width: '300',
			height: '200'
		},
		webButton: {
			text: '오늘을 가장 어리게',
			url: 'http://ohuimall.co.kr'
		}
	});
}

function popupzipcode()
{
	$('#input_zipcode').show();
}

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

function chkwinnerfrm()
{
	var frm = document.addrfrm;

	if (frm.mb_name.value == "")
	{
		alert("이름을 입력해 주세요.");
		frm.mb_name.focus();
		return false;
	}

	if (frm.mb_phone.value == "")
	{
		alert("전화번호를 입력해 주세요.");
		frm.mb_phone.focus();
		return false;
	}

	if (frm.zipcode1.value == "" || frm.zipcode2.value == "")
	{
		alert("우편번호 찾기를 해주세요.");
		return false;
	}

	if (frm.addr2.value == "")
	{
		alert("상세주소를 입력해 주세요.");
		frm.addr2.focus();
		return false;
	}

	if ($('#privacychk1').is(":checked") == false)
	{
		alert("개인정보활용 동의에 체크해 주세요.");
		return false;
	}

	if ($('#privacychk2').is(":checked") == false)
	{
		alert("개인정보취급위탁 동의에 체크해 주세요.");
		return false;
	}
}

function only_num(obj)
{
	var inText = obj.value;
	var outText = "";
	var flag = true;
	var ret;
	for(var i = 0; i < inText.length; i++)
	{
		ret = inText.charCodeAt(i);
		if((ret < 48) || (ret > 57))
		{
			flag = false;
		}
		else
		{
			outText += inText.charAt(i);
		}
	}

	if(flag == false)
	{
		alert("숫자만 입력하세요");
		obj.value = outText;
		obj.focus();
		return false;
	}

	return true;
}
