<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Update Staff Member</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="staff_update.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

</head>

<body class="container" onload="check_db();">
  <header>
    <img src="../../images/Citizen-logo.png" id="header-logo">
    <hr>
    <nav>
      <ul>
        <li><a href="control_panel.html">Control Panel</a></li>
        <li><a href="staff_reg.html">Register</a></li>
        <li><a href="staff_update.html">Update</a></li>
        <li><a href="staff_delete.html">Delete</a></li>
      </ul>
    </nav>
  </header>
<div id="wrapper">
  <p id="updateStatus"></p>
    <?php
      $valForUpdate="";
      $picForUpdate="";
      $dbDir = "staff_db/staff_db.txt";
      $updateStaff = $_POST['updateStaff'];
      $full_name_new = $_POST['full_name_new'];
      $staff_position_new = $_POST['staff_position_new'];
      $staff_mobile_new = $_POST['staff_mobile_new'];
      $staff_email_new = $_POST['staff_email_new'];
      $staff_birthday_new = $_POST['staff_birthday_new'];
      $filename_new = $_FILES['staff_img_new']['name'];


      $pendingUpdate = $full_name_new . "-divider-" . $staff_position_new . "-divider-" . $staff_mobile_new . "-divider-" . $staff_email_new . "-divider-" . $staff_birthday_new . "-divider-" . $filename_new . "-linestop-";
      
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
          $compare_result = strcmp(strtolower($updateStaff),strtolower($breaksecond[$x]));
          if($compare_result === 0) {
            $checkNum = 0;
            echo "User found: <br />" . $breaksecond[$x] . "<br />";
            $valForUpdate = $breaksecond[$x] . "-divider-" . $breaksecond[$x+1] . "-divider-" . $breaksecond[$x+2] . "-divider-" . $breaksecond[$x+3] . "-divider-" . $breaksecond[$x+4] . "-divider-" . $breaksecond[$x+5] . "-linestop-";
            $picForUpdate = "staff_db/staff_picture/" . $breaksecond[$x+5];
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
      if($checkNum !== 0) {
        echo "No name found.";
      }
      else {
        unlink($picForUpdate) or die("Couldn't delete file");
        dbUpdate($valForUpdate);
        echo "Successfully Updated.";
      }

      function dbUpdate($transferVal) {
        $dbDir = "staff_db/staff_db.txt";
        $updateStaff = $_POST['updateStaff'];
        $full_name_new = $_POST['full_name_new'];
        $staff_position_new = $_POST['staff_position_new'];
        $staff_mobile_new = $_POST['staff_mobile_new'];
        $staff_email_new = $_POST['staff_email_new'];
        $staff_birthday_new = $_POST['staff_birthday_new'];
        $filename_new = $_FILES['staff_img_new']['name'];
        $target_dir = "staff_db/staff_picture/";
        $target_file = $target_dir . basename($_FILES["staff_img_new"]["name"]);
        $uploadOk = 1;
        $pendingUpdate = $full_name_new . "-divider-" . $staff_position_new . "-divider-" . $staff_mobile_new . "-divider-" . $staff_email_new . "-divider-" . $staff_birthday_new . "-divider-" . $filename_new . "-linestop-";
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["staff_img_new"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } 
            else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo " Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file along with other data
        } else {
            if (move_uploaded_file($_FILES["staff_img_new"]["tmp_name"], $target_file)) {
              $contents = file_get_contents($dbDir);
              $contents = str_replace($transferVal, $pendingUpdate, $contents);
              file_put_contents($dbDir, $contents);
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
      }
      ?>
</div>
</body>
</html>