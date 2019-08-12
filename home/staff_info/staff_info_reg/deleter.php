<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Register Staff Member</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="staff_reg.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

</head>

<body class="container" onload="check_db();">
  <header>
    <img src="../../images/Citizen-logo.png" id="header-logo">
    <hr>
    <nav>
      <ul>
        <li><a href="control_panel.php">Control Panel</a></li>
        <li><a href="staff_reg.php">Register</a></li>
        <li><a href="staff_updateOrDelete.php">Update or Delete</a></li>
      </ul>
    </nav>
  </header>
<div id="wrapper">
<?php
  $dbDir = "staff_db/staff_db.txt";
  $deleteStaff = $_POST['deleteStaff'];
  $merger = "";
  $valForDeletion = "";
  $picForDeletion = "";
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
      $compare_result = strcmp(strtolower($deleteStaff),strtolower($breaksecond[$x]));
      if($compare_result === 0) {
        $checkNum = 0;
        echo "User found: <br />";
        foreach ($breaksecond as $valuetake) {
          $merger = $merger . "<br />" . $valuetake;
        }
        $valForDeletion = $breaksecond[$x] . "-divider-" . $breaksecond[$x+1] . "-divider-" . $breaksecond[$x+2] . "-divider-" . $breaksecond[$x+3] . "-divider-" . $breaksecond[$x+4] . "-divider-" . $breaksecond[$x+5] . "-linestop-";
        $picForDeletion = "staff_db/staff_picture/" . $breaksecond[$x+5];
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
    $contents = file_get_contents($dbDir);
    $contents = str_replace($valForDeletion, '', $contents);
    file_put_contents($dbDir, $contents);
    unlink($picForDeletion) or die("Couldn't delete file");
    echo "Successfully Deleted.";
  }
?>
<br /><br /><br />

</div>
</body>
</html>