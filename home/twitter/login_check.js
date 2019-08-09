function onSignIn(googleUser) 
{
  var profile = googleUser.getBasicProfile();
}

function checkSession(){
	if(sessionStorage.getItem("email") != null){
	}
	else {
    	window.location.href='../../index.html';
    }
}

checkSession();