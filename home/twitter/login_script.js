function onSignIn(googleUser)
{
	var profile=googleUser.getBasicProfile();
	$(".g-signin2").css("display","none");
	$(".ciitVideo").css("display","block");
	var vid = document.getElementById("videoPlayer");
	vid.play();
	vid.load();

}

function signOut()
{
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function(){

		$(".g-signin2").css("display","block");
		$(".ciitVideo").css("display","none");
		var vid = document.getElementById("videoPlayer");
		vid.pause();
	});
}