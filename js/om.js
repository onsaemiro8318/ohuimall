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