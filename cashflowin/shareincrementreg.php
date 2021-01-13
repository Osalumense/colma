<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	//echo "hi";
	if (isset($_POST['submitshareincrement']))
	{
		$error = '';
		$error .= validatetext($_POST['memid1'], "Name");
		$error .= validatetext($_POST['prsntshramt'], "Present Share Amount");
		$error .= validateamount(str_replace(',', '', $_POST['prsntshramt']), "Propose Share Amount");
		$error .= validatetext($_POST['prpshramt'], "Propose Monthly Contribution");
		$error .= validateamount(str_replace(',', '', $_POST['prpshramt']), "Propose Monthly Contribution");
		$error .= validatetext($_POST['date'], "Date");
		$error .= validatedate($_POST['date'], "Date");
		$error .= validatetext($_POST['receiptno'], "Receipt No");
		$error .= validatetext($_POST['receiptdate'], "Receipt Date");
		$error .= validatedate($_POST['receiptdate'], "Receipt Date");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatedate($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Ref bank");
		$error .= validatetext($_POST['remark'], "Remarks");
		if($error == '')
		{
			extract($_POST);
			$share = (int)str_replace(',', '', $_POST['prpshramt']) + (int)str_replace(',', '', $_POST['prsntshramt']);
			$stmt = $conn->prepare("update memberregister set shareamount = '" . $share ."' where memid = '$memid1'");
			$stmt->execute();
			$count = $stmt->rowCount();
			print_r($stmt);
			if($count > 0)
			{
				if(shareincrementinsert($conn, $memid1, $prsntshramt, $prpshramt, $receiptno, $receiptdate, $instrument, $formdate, $refno, $refdate) == true && cashflowininsert($conn, 3, $receiptno, $receiptdate, $memid1, $prpshramt, $instrument, $refno, $refdate, $bank) == true)
				{					
					//$_POST['comment'] = 'Successful';
					echo "<form method = 'post' action = 'shareincrement.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
				else{
					echo "<form method = 'post' action = 'shareincrement.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
			}
			else{
				echo "<form method = 'post' action = 'shareincrement.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'shareincrement.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'shareincrement.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>