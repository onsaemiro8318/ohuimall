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

function fb_share(name,detail,imgurl,gubun,idx)
{
	//var sTop=window.screen.height/2-(280);
	//var sLeft=window.screen.width/2-(310);
	var media = "fb";

	var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.ohuimall.co.kr/?media=fb&goods_idx='+ idx),'sharer','toolbar=0,status=0,width=600,height=325');

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

/*
  var media = "fb";
  FB.ui(
  {
    method: 'feed',
    name: "어려지는 쇼핑몰에서 '최근 본 어린마음'",
    link: 'http://ohuimall.co.kr/?media=fb',
    //picture: imgurl,
    picture: "http://www.tomorrowkids.or.kr/images/fb/jobimg_1.jpg",
    caption: 'www.ohuimall.co.kr',
    //description: job + " - " + job_explain
    description: "지금 오휘의 어려지는 쇼핑몰에서\n오늘을 가장 어리게 하는 마음을 가지세요\n지금 어려지는 쇼핑몰 마음 구매하기"
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
*/
}


function kt_share(name,detail,imgurl,gubun)
{
  var media = "kt";
	Kakao.Link.sendTalkLink({
		//container: '#kakao-link-btn',
		label: "어릴 적 당신을 찾을 수 있도록\n어려지는 마음을 파는 가게를\n잠시 열어두었습니다.\n\n지금 방문해 보세요\n\nhttp://bit.ly/1A65Ikz\n",
		image: {
			src: imgurl,
			width: '300',
			height: '200'
		},
		webButton: {
			text: '마음을 파는 가게',
			url: 'http://ohuimall.co.kr/?media=kt'
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
			location.href = "buy_comp.php?goods_idx=" + goods_idx_val + "&phone=" + winner_phone_val;
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

function input_name(gubun, media)
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
	var phone_len	= phone_val.length;

	if (phone_len < 10 || phone_len > 11)
	{
		alert("전화번호를 정확히 입력해 주세요.");
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
			"buyer_gubun" : buyer_gubun,
			"buyer_media" : media
		},
		url: "../main_exec.php",
		success: function(response){
			//if (response == "Y" || name_val == "테스트")
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
			}else if (response == "W"){
				alert('곧 도착될 선물을 기다려주세요!');
				$.magnificPopup.close();
			}else{
				alert('이미 참여하셨습니다.\n내일 또 참여해주세요!');
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
		$("#post_div").hide();
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