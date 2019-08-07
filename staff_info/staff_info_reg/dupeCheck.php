<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$dbDir = "staff_db/staff_db.txt";
	$full_name = $_POST['full_name'];
	$staff_position = $_POST['staff_position'];
	$staff_mobile = $_POST['staff_mobile'];
	$staff_email = $_POST['staff_email'];
	$staff_birthday = $_POST['staff_birthday'];
	$filename = $_FILES['staff_img']['name'];
	$checkNum = '';

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
			$compare_result = strcmp(strtolower($full_name),strtolower($breaksecond[$x]));
			
			if($compare_result === 0) {
				$checkNum = 0;
				break;
			}
			else {
				$checkNum = 1;
			}
		}
	}
	if($checkNum !== 0) {
		dbAdd();
	}
	else {
		echo "Name already exists in database!";
	}

	function dbAdd() {
		$dbDir = "staff_db/staff_db.txt";
		$full_name = $_POST['full_name'];
		$staff_position = $_POST['staff_position'];
		$staff_mobile = $_POST['staff_mobile'];
		$staff_email = $_POST['staff_email'];
		$staff_birthday = $_POST['staff_birthday'];
		$filename = $_FILES['staff_img']['name'];
		
		//replaces the @ sign to combat search bots
		$staff_email_replace = str_replace("@", "(at)", $staff_email);

		$mergedData = $full_name . "-divider-" . $staff_position . "-divider-" . $staff_mobile . "-divider-" . $staff_email_replace . "-divider-" . $staff_birthday . "-divider-" . $filename . "-linestop-";
		$target_dir = "staff_db/staff_picture/";
		$target_file = $target_dir . basename($_FILES["staff_img"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["staff_img"]["tmp_name"]);
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
		    if (move_uploaded_file($_FILES["staff_img"]["tmp_name"], $target_file)) {
		    	file_put_contents($dbDir, $mergedData, FILE_APPEND | LOCK_EX);
		    	echo "Data has been added successfully!";
		    } 
		    else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
?>
</body>
</html>