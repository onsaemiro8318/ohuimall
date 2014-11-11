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
				alert(response);
			}
		});

	}
}

function fb_share()
{
	FB.ui(
	{
		method: 'feed',
		name: '마음을 파는 쇼핑몰',
		link: 'http://ohuimall.co.kr',
		picture: 'http://www.tomorrowkids.or.kr/images/fb/jobimg_1.jpg',
		caption: 'ohuimall.co.kr',
		//description: job + " - " + job_explain
		description: "오늘을 가장 어리게"
	},function(response) {
			if (response && response.post_id) {

			}else{
        
      }
		}
	);
}

function kt_share()
{
	Kakao.Link.sendTalkLink({
		//container: '#kakao-link-btn',
		label: "오늘을 가장 어리게",
		image: {
			src: 'http://www.tomorrowkids.or.kr/images/fb/jobimg_1.jpg',
			width: '300',
			height: '200'
		},
		webButton: {
			text: '마음을 파는 쇼핑몰',
			url: 'http://ohuimall.co.kr'
		}
	});
}