<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Staff Info</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="staff_info.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900&display=swap" rel="stylesheet">
  <meta name="google-signin-client_id" content="50193247923-fbgiuu1l1olpvfd6rhujocp0rltra2u8.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '435387847063126');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=435387847063126&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

</head>

<body class="container">

  <div class="g-signin2" data-onsuccess="onSignIn"></div>
  <script src= "../twitter/login_check.js" ></script>

  <header>
    <nav role="navigation">
      <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
      <ul id="mobile-panel">
        <li><a href="../index.html">Home</a></li>
        <li><a href="../twitter/index.html">Twitter</a></li>
        <li><a href="../facebook/index.html">Facebook</a></li>
        <li><a href="../gmail/index.html">Gmail</a></li>
        <li><a href="index.php">Staff</a></li>
      </ul>
    </nav>

    <img src="../images/Citizen-logo.png" id="header-logo">

    <ul id="desktop-panel">
        <li><a href="../index.html">Home</a></li>
        <li><a href="../twitter/index.html">Twitter</a></li>
        <li><a href="../facebook/index.html">Facebook</a></li>
        <li><a href="../gmail/index.html">Gmail</a></li>
        <li><a href="index.php">Staff</a></li>
    </ul>

    <button onclick="signOut()" class="signOutButton"><img src="../images/signOutButton.png" class="signOutPicture"></button>
  </header>

  <div class="content-wrapper">
    <?php
    $dbDir = "staff_info_reg/staff_db/staff_db.txt";
    //checks if database files exists before attempting to pull data
    if(file_exists('staff_info_reg/staff_db')) {
      if(file_exists('staff_info_reg/staff_db/staff_db.txt')) {
        if(file_exists('staff_info_reg/staff_db/staff_picture')) {
          //pulls data if all database files exists
          $myfile = fopen($dbDir, "r") or die("Unable to access database!");
          if(filesize($dbDir)) {
          $file_content = fread($myfile,filesize("staff_info_reg/staff_db/staff_db.txt"));
          //first level of breaking db content
          $breakfirst = explode("-linestop-", $file_content);
          //second level of breaking of db content
          $breaksecond="";
          }
          else {
            $file_content = "";
          }
          fclose($myfile);
        }
        else {
          echo "Database is missing some files!";
        }
      }
      else {
        echo "Database is missing some files!";
      }
    }
    else {  
      echo "Database is missing some files!";
    }
    //Creates Staff Info Card per staff member found
      for($i = 0; $i < count($breakfirst) - 1;$i++) {
        $breaksecond = explode("-divider-", $breakfirst[$i]);
        echo "<div class = 'info_card'>
                <div class = 'profile_img_container'>
                  <img src='staff_info_reg/staff_db/staff_picture/" . $breaksecond[5] . "' id='staff_img'>
                </div>
                <div class='staff data'>
                  <p class='staff_name'>" . $breaksecond[0] . "</p>
                  <p class='staff_position'>" . $breaksecond[1] . "</p>
                  <p class='staff_mobile'>" . $breaksecond[2] . "</p>
                  <p class='staff_email'>" . $breaksecond[3] . "</p>
                  <p class='staff_birthday'>" .$breaksecond[4] . "</p>
                </div>
              </div>";
    }?>
  </div>

  <script src= "../twitter/signout.js" ></script>
</body>
</html>