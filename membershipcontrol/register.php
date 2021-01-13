<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['submitreg']))
	{
		$error = '';
		$error .= validatetext($_POST['title'], "Title");
		$error .= validatetext($_POST['sname'], "Surname");
		$error .= validatetext($_POST['fname'], "Firstname");
		$error .= validatetext($_POST['mname'], "Middlename");
		$error .= validatetext($_POST['dob'], "Date of birth");
		$error .= validatetext($_POST['gender'], "Gender");
		$error .= validatetext($_POST['mstat'], "Marital Status");
		$error .= validatetext($_POST['nationality'], "Nationality");
		$error .= validatetext($_POST['add1'], "Address1");
		$error .= validatetext($_POST['add2'], "Address2");
		$error .= validatetext($_POST['town'], "Town");
		$error .= validatetext($_POST['state'], "State");
		$error .= validatetext($_POST['country'], "Country");
		$error .= validatenumber($_POST['phoneno'], "Phone Number");
		$error .= validatetext($_POST['email'], "Email");
		$error .= validatetext($_POST['busnature'], "Nature of Business");
		$error .= validatetext($_POST['busadd1'], "Business Address1");
		$error .= validatetext($_POST['busadd2'], "Business Address2");
		$error .= validatetext($_POST['bustown'], "Business Town");
		$error .= validatetext($_POST['busstate'], "Business State");
		$error .= validatetext($_POST['buscountry'], "Business Country");
		$error .= validatetext($_POST['joinchurch'], "Year when you joined the church");
		$error .= validatetext($_POST['wofbi'], "Wofbi Level");
		$error .= validatetext($_POST['province'], "Province");
		$error .= validatetext($_POST['district'], "District");
		$error .= validatetext($_POST['zone'], "Zone");
		$error .= validatetext($_POST['wsf'], "Wsf Location");
		$error .= validatetext($_POST['nktitle'], "Next of Kin Title");
		$error .= validatetext($_POST['nksname'], "Next of Kin Surname");
		$error .= validatetext($_POST['nkfname'], "Next of Kin Firstname");
		$error .= validatetext($_POST['nkmname'], "Next of Kin Middlename");
		$error .= validatetext($_POST['nkrel'], "Next of Kin Relation");
		$error .= validatetext($_POST['nkadd1'], "Next of Kin Address1");
		$error .= validatetext($_POST['nkadd2'], "Next of Kin Address2");
		$error .= validatetext($_POST['nktown'], "Next of Kin Town");
		$error .= validatetext($_POST['nkstate'], "Next of Kin State");
		$error .= validatetext($_POST['nkcountry'], "Next of Kin Country");
		$error .= validatetext($_POST['nkphoneno'], "Next of Kin Mobile number");
		$error .= validatetext($_POST['nkemail'], "Next of Kin Email");
		$error .= validatetext($_POST['datejoin'], "Date of Registration");
		$error .= validateamount(str_replace(",","", $_POST['monthsave']), "Monthly Savings");
		$error .= validatetext($_POST['accno'], "Account Number");
		$error .= validatetext($_POST['grpname'], "Group Name");
		$error .= validatetext($_POST['receiptno'], "Receipt Number");
		$error .= validatetext($_POST['receiptdate'], "Receipt Date");
		$error .= validatetext($_POST['amount'], "Registration Amount");
		$error .= validateamount(str_replace(",", "", $_POST['amount']), "Registration Amount");
		$error .= validatetext($_POST['instrument'], "Instrument");
		$error .= validatetext($_POST['refno'], "Ref Number");
		$error .= validatetext($_POST['refdate'], "Ref Date");
		$error .= validatetext($_POST['bank'], "Bank");
		$error .= validatetext($_POST['remark'], "Remarks");
		$error .= validatetext($_POST['receiptno1'], "Share Amount Receipt Number");
		$error .= validatetext($_POST['receiptdate1'], "Share Amount Receipt Date");
		$error .= validatetext($_POST['shareamt'], "Share Amount");
		$error .= validateamount(str_replace(",", "", $_POST['shareamt']), "Share Amount");
		$error .= validatetext($_POST['instrument1'], "Share Amount Instrument");
		$error .= validatetext($_POST['refno1'], "Share Amount Ref Number");
		$error .= validatetext($_POST['refdate1'], "Share Amount Ref Date");
		$error .= validatetext($_POST['bank1'], "Share Amount Ref Bank");
		$error .= validatetext($_POST['refremark'], "Share Amount Ref Remarks");
		$extensionarray = array('jpeg','jpg','pdf');
		$error .= validatefile($_FILES["passportupload"], 'Passport Upload', 300000, array('jpg','jpeg'));
		$error .= validatefile($_FILES["regreceiptupload"], 'Registration Receipt Upload', 300000, $extensionarray);
		$error .= validatefile($_FILES["sharelotreceiptupload"], 'Sharelot Receipt Upload', 300000, $extensionarray);
		$error .= validatefile($_FILES["reginstrumentupload"], 'Registration Instrument', 300000, $extensionarray);
		$error .= validatefile($_FILES["shareinstrumentupload"], 'Sharelot Instrument', 300000, $extensionarray);
		$error .= validatefile($_FILES["regformupload"], 'Registration Form Upload', 300000, $extensionarray);
		
		$target_dir = "../assets/uploads/";
		$target_dir1 = "passports/";
		$target_dir2 = "receipts/";
		$target_dir3 = "instruments/";
		$target_dir4 = "memberregforms/";
		$temp1 = explode(".", $_FILES["passportupload"]["name"]);
		$temp2 = explode(".", $_FILES["regreceiptupload"]["name"]);
		$temp3 = explode(".", $_FILES["sharelotreceiptupload"]["name"]);
		$temp4 = explode(".", $_FILES["reginstrumentupload"]["name"]);
		$temp5 = explode(".", $_FILES["shareinstrumentupload"]["name"]);
		$temp6 = explode(".", $_FILES["regformupload"]["name"]);
		//$imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);
		if($error == ''){
			extract($_POST);
			do{
				//checks if the staffid exist before assigning
				$memid = newmemberid($conn);
				$stmt = $conn->prepare("select * from memberregister where idno = '$idno'");
				$stmt->execute();
			}
			while($count = $stmt->rowCount() > 0);
			$newfilename1 = $memid . '_passport_' . '.' . end($temp1);
			$newfilename2 = $memid . '_registrationreceipt_' . '.' . end($temp2);
			$newfilename3 = $memid . '_sharereceipt_' . '.' . end($temp3);
			$newfilename4 = $memid . '_registrationinstrument_' . '.' . end($temp4);
			$newfilename5 = $memid . '_shareinstrument_' . '.' . end($temp5);
			$newfilename6 = $memid . '_registrationform_' . '.' . end($temp6);
			$target_file1 = $target_dir . $target_dir1;
			$target_file2 = $target_dir . $target_dir2;
			$target_file3 = $target_dir . $target_dir2;
			$target_file4 = $target_dir . $target_dir3;
			$target_file5 = $target_dir . $target_dir3;
			$target_file6 = $target_dir . $target_dir4;
			move_uploaded_file($_FILES["passportupload"]["tmp_name"], $target_file1 . $newfilename1);
			move_uploaded_file($_FILES["regreceiptupload"]["tmp_name"], $target_file2 . $newfilename2);
			move_uploaded_file($_FILES["sharelotreceiptupload"]["tmp_name"], $target_file3 . $newfilename3);
			move_uploaded_file($_FILES["reginstrumentupload"]["tmp_name"], $target_file4 . $newfilename4);
			move_uploaded_file($_FILES["shareinstrumentupload"]["tmp_name"], $target_file5 . $newfilename5);
			move_uploaded_file($_FILES["regformupload"]["tmp_name"], $target_file6 . $newfilename6);
			
			$stmt1 = $conn->prepare("INSERT INTO `memberregister`(`memid`, `title`, `sname`, `fname`, `mname`, `dob`, `gender`, `mstat`, `nationality`, `homeadd1`, `homeadd2`, `homeadd3`, `state`, `country`, `phoneno`, `email`, `busnature`, `busadd1`, `busadd2`, `busadd3`, `busstate`, `buscountry`, `chyr`, `wofbilevel`, `province`, `district`, `zone`, `wsflocation`, `nkintitle`, `nkinsname`, `nkinfname`, `nkinmname`, `nkinrel`, `nkadd1`, `nkadd2`, `nkadd3`, `nkstate`, `nkcountry`, `nkphoneno`, `nkemail`, `datejoin`, `monthlysavings`, `accountnumber`, `groupid`, `shareamount`, `memstatus`, `datecreated`, `officer`) VALUES ('$memid', '$title', '$sname', '$fname', '$mname', '". date('Y-m-d', strtotime($dob)) . "', '$gender', '$mstat', '$nationality', '$add1', '$add2', '$town', '$state', '$country', '$phoneno', '$email', '$busnature', '$busadd1', '$busadd2', '$bustown', '$busstate', '$buscountry', '$joinchurch', '$wofbi', '$province', '$district', '$zone', '$wsf', '$nktitle', '$nksname', '$nkfname', '$nkmname', '$nkrel', '$nkadd1', '$nkadd2', '$nktown', '$nkstate', '$nkcountry', '$nkphoneno', '$nkemail', '". date('Y-m-d', strtotime($datejoin)) . "', '" . str_replace(",", "", $monthsave) . "', '$accno', '$grpname', '" . str_replace(",", "", $shareamt) . "', '1', '" . date('Y-m-d H:i:s') . "', '" . $_SESSION['loginid'] . "')");
			//print_r($stmt1);
			$stmt1->execute();
			if($stmt1->rowCount() > 0){
				if(cashflowininsert($conn, 1, $receiptno, $receiptdate, $memid, $amount, $instrument, $refno, $refdate, $bank) == true &&
				cashflowininsert($conn, 3, $receiptno1, $receiptdate1, $memid, $shareamt, $instrument1, $refno1, $refdate1, $bank1) == true )
				{
					//$_POST['comment'] = 'Successful';
					echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
				else{
					echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
					echo "<script>document.getElementById('myForm').submit();</script>";
				}
			}
			else{
				//echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				//echo "<script>document.getElementById('myForm').submit();</script>";
			}
		}
		else {
			echo $error;
			//echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			//echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	// elseif(isset($_POST['submitreg'])){
		
	// }
	else{
		//echo "<form method = 'post' action = 'newmember.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		//echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>