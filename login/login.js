function onSignIn(googleUser)
        {
          var profile=googleUser.getBasicProfile();
          $(".g-signin2").css("display","none");
          $("header").css("display","block");
          $(".wrapper").css("display","block");
          var vid = document.getElementById("videoPlayer");
          vid.load();
          vid.play();
          setTimeout(function(){ document.getElementById('calendar-frame').location.reload(); }, 3000);
        }