<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Delete Staff Member</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="staff_delete.css">
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
    <form id="search_user" action="search_user.php" method="post">
    Enter Staff Name to Delete: <br />
    <input type="text" name="searchStaff" id="searchStaff" required>
    <input type="submit" name="searchUser" id="searchUser" value="Search User">
    </form>
  
  <p id="db_precheck"></p>
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
        document.getElementById("searchUser").disabled = true;
      }
      else {
        //do nothing
      }
    }
</script>
</body>
</html>