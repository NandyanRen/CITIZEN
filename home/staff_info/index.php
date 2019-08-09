<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Staff Info</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="staff_info.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900&display=swap" rel="stylesheet">

</head>

<body class="container">
  <header>
    <nav role="navigation">
      <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
      <ul>
        <li><a href="../index.html">Home</a></li>
        <li><a href="../twitter/index.html">Twitter</a></li>
        <li><a href="../facebook/index.html">Facebook</a></li>
        <li><a href="../gmail/readEmail.py">Gmail</a></li>
        <li><a href="index.php">Staff</a></li>
      </ul>
    </nav>

    <img src="../images/Citizen-logo.png" id="header-logo">

    <button onclick="signOut()" class="signOutButton">Sign Out</button>
  </header>

  <div class="wrapper">
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
                <div class = 'staff_header_box'>
                  <span id='staff_header'>STAFF INFO</span>
                  <div class = 'profile_selector_container'>
                    <img src='staff_info_reg/staff_db/staff_picture/" . $breaksecond[5] . "' id='staff_img'>
                    <p class='staff_name'>" . $breaksecond[0] . "</p>
                    <br />
                    <p class='staff_position'>" . $breaksecond[1] . "</p>
                    <br />
                    <p class='staff_mobile'>" . $breaksecond[2] . "</p>
                    <br />
                    <p class='staff_email'>" . $breaksecond[3] . "</p>
                    <br />
                    <p class='staff_birthday'>" .$breaksecond[4] . "</p>
                  </div>
                </div>
              </div>";
    }?>
  </div>
</body>
</html>