<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	//echo "hi";
	if (isset($_POST['cashoutsavingsreg']))
	{
		$error = '';
		$error .= validatetext($_POST['payerid'], "Receiver Name");
		$error .= validatetext($_POST['amount'], "Amount");
		$error .= validateamount(str_replace(',', '', $_POST['amount']), "Amount");
		$error .= validatetext($_POST['receiptno'], "Voucher No");
		$error .= validatetext($_POST['receiptdate'], "Voucher Date");
		$error .= validatedate($_POST['receiptdate'], "Voucher Date");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Ref bank");
		$error .= validatetext($_POST['remark'], "Remark");
		if($error == '')
		{
			extract($_POST);
			if(montpayinsert($conn, $receiptdate, $payerid, "-" . $amount, 5, $instrument, $remark) == true && cashflowoutinsert($conn, 5, $receiptno, $receiptdate, $payerid, $amount, $instrument, $refno, $refdate, $bank, $remark, $purpose = '', $receiver = '') == true)
			{
				echo "<form method = 'post' action = 'cashoutsavings.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
			else{
				echo "<form method = 'post' action = 'facilityreg.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'cashoutsavings.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'cashoutsavings.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>