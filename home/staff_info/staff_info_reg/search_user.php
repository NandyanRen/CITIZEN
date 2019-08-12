<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Delete Staff Member</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="search_user.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>

<script type="text/javascript">
  function check_db() {
      var file_check = <?php 
        if(file_exists('staff_db')) {
          if(file_exists('staff_db/staff_db.txt')) {
            if(file_exists('staff_db/staff_picture')) {
              echo 1;
            }
            else {
              echo 4;
            }
          }
          else {
            echo 3;
          }
        }
        else {  
          echo 2;
        }
      ?>;

      if (file_check !== 1) {
        document.getElementById("db_precheck").innerHTML = "Files/folders are missing!";
        document.getElementById("db_precheck").style.color = "red";
        document.getElementById("submitDelete").disabled = true;
      }
      else {
        //do nothing
      }
    }

  function confirmDelete() {
    return confirm('are you sure you want to delete this data?');
  }
</script>

<body class="container" onload="check_db();">
  <header>
    <img src="../../images/Citizen-logo.png" id="header-logo">
    <hr>
  	<nav>
  		<ul>
        <li><a href="control_panel.php">Control Panel</a></li>
        <li><a href="staff_reg.php">Register</a></li>
        <li><a href="staff_update.php">Update</a></li>
        <li><a href="staff_delete.php">Delete</a></li>
  		</ul>
  	</nav>
  </header>

<div id="wrapper">
  <form id="search_user" action="search_user.php" method="post">
    Enter Staff Name to Delete: <br />
    <input type="text" name="searchStaff" id="searchStaff" required>
    <input type="submit" name="searchUser" id="searchUser" value="Search User">
    </form>
  <p id="db_precheck"></p>
</div>

 <?php 
  $dbDir = "staff_db/staff_db.txt";
  $searchStaff=$_POST['searchStaff'];
  $merger = "";
  $myfile = fopen($dbDir, "r") or die("Unable to access database!");
  if(filesize($dbDir)) {
    $file_content = fread($myfile,filesize("staff_db/staff_db.txt"));
  }
  else {
    $file_content = "";
  }
  fclose($myfile);

  //first level of breaking db content
  $breakfirst = explode("-linestop-", $file_content);
  //second level of breaking of db content
  for($i = 0; $i < count($breakfirst) - 1; $i++) {
    $breaksecond = explode("-divider-", $breakfirst[$i]);

    for($x = 0; $x < sizeof($breaksecond) - 1; $x++) {
      $compare_result = strcmp(strtolower($searchStaff),strtolower($breaksecond[$x]));
      if($compare_result === 0) {
        $checkNum = 0;
        foreach ($breaksecond as $valuetake) {
          $merger = $merger . "<br />" . $valuetake;
        }
        echo"<div class = 'info_card' id='info_card_container'>
              <div class = 'profile_img_container'>
                <img src='staff_db/staff_picture/" . $breaksecond[$x+5] . "' id='staff_img'>
              </div>
              <div class='staff data'>
                <p class='staff_name'>". $breaksecond[$x] ."</p>
                <p class='staff_position'>" . $breaksecond[$x+1] . "</p>
                <p class='staff_mobile'>" . $breaksecond[$x+2] . "</p>
                <p class='staff_email'>" . $breaksecond[$x+3] . "</p>
                <p class='staff_birthday'>" .$breaksecond[$x+4] . "</p>
              </div>  
              <form class='deleteform' id='delete_form' action='deleter.php' method='post' onsubmit='return confirmDelete();'>
                <input type='hidden' name='deleteStaff' id='deleteStaff' value='$searchStaff'/>
                <input type='submit' name='submitDelete' id='submitDelete' value='Delete'>
              </form>
            </div>";
      break;
      }
      else {
        $checkNum = 1;  
      }
    }
    if ($checkNum === 0) {
      break;
    }
  }
  if($checkNum === 1) {
    echo "No name found.";
  }
  else {
  } 
?>
    
</body>
</html>