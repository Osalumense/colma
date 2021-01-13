<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['officerreg']))
	{
		$error = '';
		$error .= validatetext($_POST['payer'], "Name");
		$error .= validatetext($_POST['payerid'], "Coop no");;
		$error .= validatetext($_POST['datein'], "Date-in");
		$error .= validatedate($_POST['datein'], "Date-in");
		$error .= validatetext($_POST['post'], "Post");
		$error .= validatetext($_POST['remarks'], "Remark");
		if($error == ''){
			extract($_POST);
			$stmt1 = $conn->prepare("INSERT INTO `officers`(`office`, `memid`, `dtin`, `remarks`) VALUES ('$post', '$payerid', '$datein', '$remarks')");
			//print_r($stmt1);
			$stmt1->execute();
			if($stmt1->rowCount() > 0){
				echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><input type = 'hidden' value = 'New Officer added' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>