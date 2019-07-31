<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$my_file = 'staff_db/staff_db.txt';
		mkdir("staff_db");
		if (file_exists('staff_db/staff_db.txt')) {
			//do not create. prevents staff_db.txt overwrites
		}
		else {
			$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		}
		mkdir("staff_db/staff_picture");
	?>
<script type="text/javascript">
	 window.location.href = "control_panel.html";
</script>
</body>
</html>