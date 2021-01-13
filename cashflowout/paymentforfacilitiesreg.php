<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['paymentforfacilities']))
	{
		$error = '';
		$error .= validatetext($_POST['loanregno'], "Loan Numbere");
		$error .= validatenumber($_POST['loanregno'], "Loan Numbere");
		$error .= validatetext($_POST['receiptno'], "Voucher Numbere");
		$error .= validatenumber($_POST['receiptno'], "Voucher Numbere");
		$error .= validatetext($_POST['receiptdate'], "Voucher Date");
		$error .= validatedate($_POST['receiptdate'], "Voucher Date");
		$error .= validatetext($_POST['payerid'], "Payer's Name");
		$error .= validatetext($_POST['amount'], "Amount");
		$error .= validatenumber($_POST['amount'], "Amount");
		$error .= validatetext($_POST['repaymentforid'], "Repayment for");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Bank");
		$error .= validatetext($_POST['remark'], "Remark");
		if($error == ''){
			extract($_POST);
			if(cashflowoutinsert($conn, $facility, $receiptno, $receiptdate, $payerid, $feeamount, $instrument, $refno, $refdate, $bank, $remark, $purpose = '', $receiver = '') == true)
			{
				echo "<form method = 'post' action = 'paymentforfacilities.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'paymentforfacilities.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'paymentforfacilities.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>