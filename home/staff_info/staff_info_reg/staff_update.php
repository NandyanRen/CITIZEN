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
        <li><a href="control_panel.php">Control Panel</a></li>
        <li><a href="staff_reg.php">Register</a></li>
        <li><a href="staff_updateOrDelete.php">Update or Delete</a></li>
      </ul>
    </nav>
  </header>
<div id="wrapper">
  <form action="update_step.php" method="post" enctype="multipart/form-data" onsubmit="return confirmUpdate();">
    <?php
      $updateStaff = $_POST['updateStaff'];
      echo "User being updated: " . $updateStaff . "<br />"; 
    ?>
    <input type="hidden" name="updateStaff" id="updateStaff" value="<?php echo $updateStaff; ?>"><br />
    New Full Name: <br />
    <input type="text" name="full_name_new" id="full_name_new" required><br />
    New Position: <br />
    <input type="text" name="staff_position_new" id="staff_position_new" required><br />
    New Mobile Number: <br />
    <input type="number" name="staff_mobile_new" id="staff_mobile_new" required><br />
    New Email: <br />
    <input type="email" name="staff_email_new" id="staff_email_new" required><br />
    New Date of Birth: <br />
    <input type="date" name="staff_birthday_new" id="staff_birthday_new" min="1950-01-01" max="2019-12-31" required><br />
    New Picture: (please use .png files)<br />
    <input type="file" name="staff_img_new" id="staff_img_new" accept="image/x-png" required><br /><br />
    <input type="submit" name="updateBtn" id ="updateBtn">
  </form>
  <p id="db_precheck"></p>
</div>
<script type="text/javascript">
  function confirmUpdate() {
    return confirm('Are you sure about the information you are about to update?');
  }
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
        document.getElementById("updateBtn").disabled = true;
      }
      else {
        //do nothing
      }
    }
</script>
</body>
</html>