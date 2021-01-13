<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['submitfacilityreg']))
	{
		$error = '';
		$error .= validatetext($_POST['title'], "Title");
		$error .= validatetext($_POST['memid'], "Member ID");
		$error .= validatetext($_POST['facility'], "Facility");
		$error .= validatetext($_POST['principal'], "Princpal Applied for");
		$error .= validateamount(str_replace(",","", $_POST['principal']), "Princpal Applied for");
		$error .= validatetext($_POST['interest'], "Interest");
		$error .= validateamount(str_replace(",","", $_POST['interest']), "Interest");
		$error .= validatetext($_POST['period'], "Period");
		$error .= validateamount(str_replace(",","", $_POST['period']), "Period");
		$error .= validatetext($_POST['installment'], "Installment");
		$error .= validateamount(str_replace(",","", $_POST['installment']), "Installment");
		$error .= validatetext($_POST['date'], "Repayment Date");
		$error .= validatedate($_POST['date'], "Repayment Date");
		$error .= validatetext($_POST['gmemid1'], "Guarantor1 Name");
		$error .= validatetext($_POST['gamount1'], "Guarantor1 Amount");
		$error .= validateamount(str_replace(",","", $_POST['gamount1']), "Guarantor1 Amount");
		$error .= validatetext($_POST['gmemid2'], "Guarantor2 Name");
		$error .= validatetext($_POST['gamount2'], "Guarantor2 Amount");
		$error .= validateamount(str_replace(",","", $_POST['gamount2']), "Guarantor2 Amount");
		$error .= validatetext($_POST['witness'], "Witness");
		$error .= validatetext($_POST['approvedbyid'], "Approved By");
		$error .= validatetext($_POST['approveddate'], "Approval Date");
		$error .= validatedate($_POST['approveddate'], "Approval Date");
		$error .= validatetext($_POST['receiptno'], "Receipt No");
		$error .= validatetext($_POST['receiptdate'], "Receipt Date");
		$error .= validatedate($_POST['receiptdate'], "Receipt Date");
		$error .= validatedate($_POST['feeamount'], "Fee Amount");
		$error .= validateamount(str_replace(",","", $_POST['feeamount']), "Fee Amount");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Ref bank");
		$error .= validatetext($_POST['remark'], "REMARKS");
		if($error != ''){
			extract($_POST);
				if(facilityregisterinsert($conn, $facility, $memid, $date, $principal, $period, $interest, $installment, $purpose, $gmemid1, $gamount1, $gmemid2, $gamount2, $witnessid,$approvedbyid, $date) == true && cashflowininsert($conn, $facility, $receiptno, $receiptdate, $memid, $feeamount, $instrument, $refno, $refdate, $bank) == true)
				{
					echo "<form method = 'post' action = 'facilityreg' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
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
?>