<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['cashoutrefundloans']))
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
			$facilitydetails = getfacilitydetails($conn, $loanregno, $payerid, $repaymentforid, $chequeissued = 0);
			$paid =implode(',', array_map(function($el){ return $el['paid']; }, $facilitydetails));
			$balance =implode(',', array_map(function($el){ return $el['balance']; }, $facilitydetails));
			$paid = (float)$paid - (float)str_replace(',','', $amount);
			$balance = (float)$balance + (float)str_replace(',','', $amount);
			if(updatefacility($conn, $loanregno, $paid, $balance, $principal = '', $period = '', $interest = '', $instalment = '', $purpose = '', $guaranto1 = '', $guaranto2 = '', $gamount1 = '', $gamount2 = '', $approvedby = '', $witness = '', $printstatus = '', $approvaldate = '', $chequeissued = '', $remarks = '', $cdate = '') == true){
				if(cashflowoutinsert($conn, $facility, $receiptno, $receiptdate, $payerid, $feeamount, $instrument, $refno, $refdate, $bank, $remark, $purpose = '', $receiver = '') == true)
				{					
					//$_POST['comment'] = 'Successful';
					echo "<form method = 'post' action = 'cashoutrefundloans.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
				else{
					echo "<form method = 'post' action = 'cashoutrefundloans.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
			}
			else{
				echo "<form method = 'post' action = 'cashoutrefundloans.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'cashoutrefundloans.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'cashoutrefundloans.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>