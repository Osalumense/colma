<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['cashinrepayment']))
	{
		$error = '';
		$error .= validatetext($_POST['loanregno'], "Loan Numbere");
		$error .= validatenumber($_POST['loanregno'], "Loan Numbere");
		$error .= validatetext($_POST['receiptno'], "Receipt Numbere");
		$error .= validatenumber($_POST['receiptno'], "Receipt Numbere");
		$error .= validatetext($_POST['receiptdate'], "Receipt Date");
		$error .= validatedate($_POST['receiptdate'], "Receipt Date");
		$error .= validatetext($_POST['payerid'], "Payer's Name");
		$error .= validatetext($_POST['amount'], "Amount");
		$error .= validatenumber($_POST['amount'], "Amount");
		$error .= validatetext($_POST['repaymentforid'], "Repayment for");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Bank");
		if($error == ''){
			extract($_POST);
			$facilitydetail = getfacilitydetails($conn, $loanregno);
			$paid = implode(',', array_map(function($el){ return $el['paid']; }, $facilitydetail));
			$balance = implode(',', array_map(function($el){ return $el['balance']; }, $facilitydetail));
			echo $paid . "<br />";
			echo $balance . "<br />";
			$paid = (int)$paid + (int)str_replace(',', '', $amount);
			$balance = (int)$balance - (int)str_replace(',', '', $amount);
			
			echo $paid . "<br />";
			echo $balance . "<br />";
			$stmt = $conn->prepare("update facilityregister set paid = '$paid', balance = '$balance' where tno = '$loanregno'");
			//$stmt = $conn->prepare("update facilityregister set paid = '$paid', balance = '$balance' where tno = '$loanregno'");
			//print_r($stmt);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				if(cashflowininsert($conn, $repaymentforid, $receiptno, $receiptdate, $memid, $amount, $instrument, $refno, $refdate, $bank, 'Repayment') == true && montpayinsert($conn, $receiptdate, $memid, $amount, $repaymentforid, $instrument) == true)
				{
					
					echo "<form method = 'post' action = 'cashinrepayment.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
					
				}
				else{
					echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
			}
			else{
				echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'cashinrepayment.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'cashinrepayment.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>