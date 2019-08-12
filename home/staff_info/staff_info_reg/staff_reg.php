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
        <li><a href="staff_update.php">Update</a></li>
        <li><a href="staff_delete.php">Delete</a></li>
  		</ul>
  	</nav>
  </header>

  <div id="wrapper">
    <form id="reg_form" action="dupeCheck.php" method="post" enctype="multipart/form-data">
      Staff Registration Form
      <br /><br />
      Full Name: <br />
      <input type="text" name="full_name" id="full_name" required><br />	
      Position: <br />
      <input type="text" name="staff_position" id="staff_position" required><br />
      Mobile Number: <br />
      <input type="number" name="staff_mobile" id="staff_mobile" required><br />
      Email: <br />
      <input type="email" name="staff_email" id="staff_email" required><br />
      Date of Birth: <br />
      <input type="date" name="staff_birthday" id="staff_birthday" min="1950-01-01" max="2019-12-31" required><br />
      Picture: (please use .png files)<br />
      <input type="file" name="staff_img" id="staff_img" accept="image/x-png" required><br /><br />
      <input type="checkbox" name="agreement" required> By checking this, you acknowledge that the following information will be displayed publicly. This is in compliance with the <a id="dataPriv" href="https://www.privacy.gov.ph/data-privacy-act/">Data Privacy Act 2012</a>.<br /><br />
      <input type="submit" name="submitBtn" id="submitBtn">
      <p id="db_precheck"></p>
    </form>
  </div>
  
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
        document.getElementById("submitBtn").disabled = true;
      }
      else {
        //do nothing
      }
    }


  </script>
</body>
</html>