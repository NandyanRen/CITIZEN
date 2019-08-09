function onSignIn(googleUser)
        {
          var profile=googleUser.getBasicProfile();
          window.location.href='home/index.html';

          var emailString = profile.getEmail();

          sessionStorage.setItem("email", profile.getEmail());
        }