<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['submitmontsav']))
	{
		$error = '';
		$error .= validatetext($_POST['memid1'], "Name");
		$error .= validatetext($_POST['prsntmontcontr'], "Present Monthly Contribution");
		$error .= validateamount(str_replace(',', '', $_POST['prsntmontcontr']), "Present Monthly Contribution");
		$error .= validatetext($_POST['prpmontcontr'], "Propose Monthly Contribution");
		$error .= validateamount(str_replace(',', '', $_POST['prpmontcontr']), "Propose Monthly Contribution");
		$error .= validatetext($_POST['month'], "Month to commence deduction");
		$error .= validatedate($_POST['month'], "Month to commence deduction");
		$error .= validatetext($_POST['date'], "Date");
		$error .= validatedate($_POST['date'], "Date");
		$error .= validatetext($_POST['receiptno'], "Receipt No");
		$error .= validatetext($_POST['receiptdate'], "Receipt Date");
		$error .= validatedate($_POST['receiptdate'], "Receipt Date");
		$error .= validatedate($_POST['savingappamount'], "Fee Amount");
		$error .= validateamount(str_replace(",","", $_POST['amount']), "Fee Amount");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Ref bank");
		$error .= validatetext($_POST['remark'], "REMARKS");
		if($error == '')
		{
			extract($_POST);
			$stmt = $conn->prepare("update memberregister set monthlysavings = '" . str_replace(',', '', $_POST['prpmontcontr']) ."' where memid = '$memid1'");
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				if(savingsreschedulinginsert($conn, $memid1, $prsntmontcontr, $prpmontcontr, $month, '', $date) == true && cashflowininsert($conn, 2, $receiptno, $receiptdate, $memid1, $savingappamount, $instrument, $refno, $refdate, $bank) == true)
				{					
					//$_POST['comment'] = 'Successful';
					echo "<form method = 'post' action = 'montsav.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'montsav.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'montsav.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>