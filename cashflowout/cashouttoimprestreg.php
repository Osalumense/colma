<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['cashouttoimprest']))
	{
		$error = '';
		$error .= validatetext($_POST['receiptno'], "voucher Numbere");
		$error .= validatenumber($_POST['receiptno'], "voucher Numbere");
		$error .= validatetext($_POST['receiptdate'], "voucher Date");
		$error .= validatedate($_POST['receiptdate'], "voucher Date");
		$error .= validatetext($_POST['payer'], "Payer's Name");
		$error .= validatetext($_POST['amount'], "Amount");
		$error .= validatenumber($_POST['amount'], "Amount");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Bank");
		$error .= validatetext($_POST['remark'], "Remark");
		if($error == ''){
			extract($_POST);
			if(cashflowoutinsert($conn, 0, $receiptno, $receiptdate, '', $amount, $instrument, $refno, $refdate, $bank, $remark, 0, $payer, 'imprest') == true)
			{
				echo "<form method = 'post' action = 'cashouttoimprest.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'post' action = 'cashouttoimprest.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'cashouttoimprest.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'cashouttoimprest.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>