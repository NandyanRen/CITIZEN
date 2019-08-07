      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '360',
          width: '640',
          videoId: 'yWV7sHNIh58',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }

      function signOut()
      {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function(){
        });
        window.location.href='../index.html';
      }

      function showFloorImage()
      {
        $(".ciitVideo").css("display","none");
        $(".floor-image").css("display","inherit");
        stopVideo();
      }

      function hideThumbnails()
      {
        $(".firstFloor-lobby-thumbnail").css("display","none");
        $(".secondFloor-left_wing-thumbnail").css("display","none");
        $(".secondFloor-right_wing-thumbnail").css("display","none");
        $(".secondFloor-reception-thumbnail").css("display","none");
        $(".secondFloor-sc_corner-thumbnail").css("display","none");
        $(".thirdFloor-cashier-thumbnail").css("display","none");
        $(".fourthFloor-faculty-thumbnail").css("display","none");
        $(".fifthFloor-gallery-thumbnail").css("display","none");
        $(".sixthFloor-sixth_floor-thumbnail").css("display","none");
        $(".seventhFloor-gym-thumbnail").css("display","none");
      }

      function first_floor_image()
      {
        showFloorImage();
        document.getElementById('floor-layout-image').src="assets/first_floor_directory.png";
        hideThumbnails();
        $(".firstFloor-lobby-thumbnail").css("display","block");
      }

      function second_floor_image()
      {
        showFloorImage();
        document.getElementById('floor-layout-image').src="assets/second_floor_directory.png";
        hideThumbnails();
        $(".secondFloor-left_wing-thumbnail").css("display","block");
        $(".secondFloor-right_wing-thumbnail").css("display","block");
        $(".secondFloor-reception-thumbnail").css("display","block");
        $(".secondFloor-sc_corner-thumbnail").css("display","block");
      }

      function third_floor_image()
      {
        showFloorImage();
        document.getElementById('floor-layout-image').src="assets/third_floor_directory.png";
        hideThumbnails();
        $(".thirdFloor-cashier-thumbnail").css("display","block");
      }

      function fourth_floor_image()
      {
        showFloorImage();
        document.getElementById('floor-layout-image').src="assets/fourth_floor_directory.png";
        hideThumbnails();
        $(".fourthFloor-faculty-thumbnail").css("display","block");
      }

      function fifth_floor_image()
      {
        showFloorImage();
        document.getElementById('floor-layout-image').src="assets/fifth_floor_directory.png";
        hideThumbnails();
        $(".fifthFloor-gallery-thumbnail").css("display","block");
      }

      function sixth_floor_image()
      {
        showFloorImage();
        document.getElementById('floor-layout-image').src="assets/sixth_floor_directory.png";
        hideThumbnails();
        $(".sixthFloor-sixth_floor-thumbnail").css("display","block");
      }

      function seventh_floor_image()
      {
        showFloorImage();
        document.getElementById('floor-layout-image').src="assets/seventh_floor_directory.png";
        hideThumbnails();
        $(".seventhFloor-gym-thumbnail").css("display","block");
      }