<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['facilities']))
	{
		$error = '';
		$error .= validatetext($_POST['facilityname'], "Facility");
		$error .= validatetext($_POST['facilityfee'], "Facility Fee");
		$error .= validateamount(str_replace(",","", $_POST['facilityfee']), "Facility Fee");
		if($error == ''){
			extract($_POST);
			$stmt = $conn->prepare("insert into facilities(facility, facilityfee, fstatus) values('$facilityname','" . str_replace(",","", $_POST['facilityfee']) . "','1')");
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}