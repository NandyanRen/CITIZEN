var loginChecker;

function onSignIn(googleUser) 
{
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); 
  console.log('Name: ' + profile.getName());
  console.log('Email: ' + profile.getEmail());
  
    loginChecker = true;
}

function checkSession(){
    if(loginChecker == true){
    //User already logged in
  } else {
    window.location.href='../index.html';
  }
}
setTimeout(function(){ checkSession(); }, 1200);

