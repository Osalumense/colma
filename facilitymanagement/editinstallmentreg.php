<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['editinstallmentreg']))
	{
		$error = '';
		$error .= validatetext($_POST['tno'], "Transaction Number");
		$error .= validatetext($_POST['memberid'], "Member ID");
		$error .= validatetext($_POST['facilityname'], "Facility");
		$error .= validatetext($_POST['principal'], "Princpal Applied for");
		$error .= validateamount(str_replace(",","", $_POST['principal']), "Princpal Applied for");
		$error .= validatetext($_POST['interest'], "Interest");
		$error .= validateamount(str_replace(",","", $_POST['interest']), "Interest");
		$error .= validatetext($_POST['period'], "Period");
		$error .= validateamount(str_replace(",","", $_POST['period']), "Period");
		$error .= validatetext($_POST['installment'], "Installment");
		$error .= validateamount(str_replace(",","", $_POST['installment']), "Installment");
		$error .= validatetext($_POST['paid'], "Paid");
		$error .= validateamount(str_replace(",","", $_POST['paid']), "Paid");
		$error .= validatetext($_POST['balance'], "Balancd");
		$error .= validateamount(str_replace(",","", $_POST['balance']), "Balancd");
		$error .= validatetext($_POST['period'], "Period");
		$error .= validatenumber($_POST['period'], "Period");
		if($error == ''){
			extract($_POST);
			$stmt = facilityregisterupdate($conn, $tno, '', '', '', '', $period, '', $installment, '', '', '', '', '', '', '', '', '', '', '', '');
			if($stmt == true)
			{
				echo "<form method = 'post' action = 'editinstallment.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'editinstallment.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'editinstallment.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>