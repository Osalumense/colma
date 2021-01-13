<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['individualsavings']))
	{
		$error = '';
		$error .= validatetext($_POST['receiptno'], "Receipt Numbere");
		$error .= validatenumber($_POST['receiptno'], "Receipt Numbere");
		$error .= validatetext($_POST['receiptdate'], "Receipt Date");
		$error .= validatedate($_POST['receiptdate'], "Receipt Date");
		$error .= validatetext($_POST['payerid'], "Payer's Name");
		$error .= validatetext($_POST['amount'], "Amount");
		$error .= validatenumber($_POST['amount'], "Amount");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Bank");
		if($error == ''){
			extract($_POST);
			if(cashflowininsert($conn, 2, $receiptno, $receiptdate, $payerid, $amount, $instrument, $refno, $refdate, $bank) == true && montpayinsert($conn, $receiptdate, $payerid, $amount, 2, $instrument) == true)
			{
				echo "<form method = 'post' action = 'individualsavings.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'postc;' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'individualsavings.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'individualsavings.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>