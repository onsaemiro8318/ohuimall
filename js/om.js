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

function fb_share(name,detail,imgurl,gubun)
{
  var media = "fb";
  FB.ui(
  {
    method: 'feed',
    name: '오늘을 가장 어리게',
    link: 'http://ohuimall.co.kr/',
    picture: imgurl,
    caption: 'ohuimall.co.kr',
    //description: job + " - " + job_explain
    description: detail
  },
    function(response) {
      if (response && response.post_id) {
        $.ajax({
          type   : "POST",
          async  : false,
          url    : "../main_exec.php",
          data:{
            "exec" : "insert_share_info",
            "media" : media,
            "gubun" : gubun
          }
        });
      }
    }
  );
}


function kt_share(name,detail,imgurl,gubun)
{
  var media = "kt";
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
	$.ajax({
		type:"POST",
		data:{
			"exec" : "insert_share_info",
			"media" : media,
			"gubun" : gubun
		},
		url: "../main_exec.php"
	});
}

function popupzipcode()
{
	$('#input_zipcode').show();
}


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

	frm.submit();
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

function input_address()
{
	var zipcode1_val	= $("#postcode1").val();
	var zipcode2_val	= $("#postcode2").val();
	var addr1_val		= $("#addr1").val();
	var addr2_val		= $("#addr2").val();
	var goods_idx_val	= $("#goods_idx").val();
	var winner_phone_val	= $("#winner_phone").val();

	if (zipcode1_val == "" || zipcode2_val == "")
	{
		alert("우편번호 찾기를 해주세요.");
		return false;
	}

	if (addr2_val == "")
	{
		alert("상세주소를 입력해 주세요.");
		frm.addr2.focus();
		return false;
	}

	$.ajax({
		type:"POST",
		data:{
			"exec" : "insert_winner",
			"goods_idx"    : goods_idx_val,
			"zipcode1"     : zipcode1_val,
			"zipcode2"     : zipcode2_val,
			"addr1"        : addr1_val,
			"addr2"        : addr2_val,
			"winner_phone" : winner_phone_val
		},
		url: "../main_exec.php",
		success: function(response){
			location.href = "buy_comp.php?goods_idx=" + goods_idx_val;
		}
	});

}

function only_kor(obj)
{
	var inText = obj.value;
	if (inText != ""){
		var pattern = /^[가-힣]+$/; 
		if (pattern.test(inText)){
			return true;
		}else{
			alert("한글만 입력하세요");
			obj.value="";
			obj.focus();
			return false;
		}	
	}
}

function input_name(gubun)
{
	var name_val		= $("#mb_name").val();
	var phone_val		= $("#mb_phone").val();
	var goods_idx_val	= $("#goods_idx").val();
	var buyer_gubun		= gubun;
	if (name_val == "" )
	{
		alert("이름을 입력해 주세요.");
		$("#mb_name").focus();
		return false;
	}

	if (phone_val == "" )
	{
		alert("전화번호를 입력해 주세요.");
		$("#mb_phone").focus();
		return false;
	}

	if ($("input:checkbox[id='agree1']").is(":checked") == false)
	{
		alert("개인정보활용 동의에 체크해 주세요.");
		return false;
	}

	if ($("input:checkbox[id='agree2']").is(":checked") == false)
	{
		alert("개인정보취급위탁 동의에 체크해 주세요.");
		return false;
	}

	$("#mb_name").val("");
	$("#mb_phone").val("");
	//$("input:checkbox[id='agree1']").attr("checked", false);
	//$("input:checkbox[id='agree2']").attr("checked", false);
	$('input').iCheck('uncheck');


	$.ajax({
		type:"POST",
		data:{
			"exec" : "insert_name_phone",
			"goods_idx"   : goods_idx_val,
			"mb_name"     : name_val,
			"mb_phone"    : phone_val,
			"buyer_gubun" : buyer_gubun
		},
		url: "../main_exec.php",
		success: function(response){
			if (response == "Y")
			{
				$("#winner_phone").val(phone_val);
				$.magnificPopup.open({
					items: {
						src: '#input_2'
					},
					type: 'inline'
				}, 0);
			}else if (response == "N"){
				$.magnificPopup.open({
					items: {
						src: '#sorry_div'
					},
					type: 'inline'
				}, 0);
			}else{
				alert('이미 이벤트에 참여하셨습니다.');
				$.magnificPopup.close();
			}
		}
	});

}

function close_div(popup)
{
	if (popup == "input_1")
	{
		$("#mb_name").val("");
		$("#mb_phone").val("");
		//$("input:checkbox[id='agree1']").attr("checked", false);
		//$("input:checkbox[id='agree2']").attr("checked", false);
		$('input').iCheck('uncheck');
		magnificPopup.close();
	}else if (popup == "input_2")
	{
		$("#postcode1").val("");
		$("#postcode2").val("");
		$("#addr1").val("");
		$("#addr2").val("");
		magnificPopup.close();
	}
}

function move_page(param)
{
	if (param == "1")
	{
		$('#main_page').show();
		$('#movie_page').hide();
		$('#faq_page').hide();
	}else if (param == "2"){
// $('#movie_page').slideDown('slow');
		$('#main_page').hide();
		$('#movie_page').show();
		$('#faq_page').hide();
	}else{
		$('#main_page').hide();
		$('#movie_page').hide();
		$('#faq_page').show();
	}
}