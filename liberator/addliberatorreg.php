<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['addliberatorreg']))
	{
		$error = '';
		$error .= validatetext($_POST['title'], "Title");
		$error .= validatetext($_POST['sname'], "Surname");
		$error .= validatetext($_POST['fname'], "Firstname");
		$error .= validatetext($_POST['mname'], "Middlename");
		$error .= validatetext($_POST['gender'], "Gender");
		$error .= validatetext($_POST['staffid'], "Staff ID");
		$error .= validatetext($_POST['post'], "Post");
		$error .= validatetext($_POST['duty'], "Duty");
		$error .= validatetext($_POST['date'], "Address2");
		if($error == ''){
			if(liberatorinsert($conn, $staffid, $title, $sname, $fname, $mname, $post, $duty, $liberatorstatus) == true);
			{
				echo "<form method = 'post' action = 'addliberator.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else{
			echo "<form method = 'post' action = 'addliberator.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'addliberator.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>