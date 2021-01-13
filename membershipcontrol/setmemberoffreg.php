<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	if (isset($_POST['submitsetoff']))
	{
		$error = '';
		$error .= validatetext($_POST['memberid'], "Name");
		$error .= validatetext($_POST['setoffreason'], "Close out reason");
		$error .= validatetext($_POST['setoffdate'], "Close out date");
		$error .= validatedate($_POST['setoffdate'], "Close out date");
		$error .= validatetext($_POST['setoffremark'], "Remark");
		if($error == '')
		{
			extract($_POST);
			//updatememberregister($conn, $memberid, $title = '', $sname = '', $fname = '', $mname = '', $dob = '', $gender = '', $mstat = '', $nationality = '', $homeadd1 = '', $homeadd2 = '', $homeadd3 = '', $state = '', $country = '', $phoneno = '', $email = '', $busnature = '', $busadd1 = '', $busadd2 = '', $busadd2 = '', $busstate = '', $buscountry = '', $chyr = '', $wofbilevel = '', $province = '', $district = '', $zone = '', $wsflocation = '', $nkintitle = '', $nkinsname = '', $nkinfname = '', $nkinmname = '', $nkinrel = '', $nkadd1 = '', $nkadd2 = '', $nkadd3 = '', $nkstate = '', $nkcountry = '', $nkphoneno = '', $nkemail = '', $datejoin = '', $monthlysavings = '', $accountnumber = '', $groupid = '', $shareamount = '', 0, $setoffdate);
			if(updatememberregister($conn, $memberid, $title = '', $sname = '', $fname = '', $mname = '', $dob = '', $gender = '', $mstat = '', $nationality = '', $homeadd1 = '', $homeadd2 = '', $homeadd3 = '', $state = '', $country = '', $phoneno = '', $email = '', $busnature = '', $busadd1 = '', $busadd2 = '', $busadd2 = '', $busstate = '', $buscountry = '', $chyr = '', $wofbilevel = '', $province = '', $district = '', $zone = '', $wsflocation = '', $nkintitle = '', $nkinsname = '', $nkinfname = '', $nkinmname = '', $nkinrel = '', $nkadd1 = '', $nkadd2 = '', $nkadd3 = '', $nkstate = '', $nkcountry = '', $nkphoneno = '', $nkemail = '', $datejoin = '', $monthlysavings = '', $accountnumber = '', $groupid = '', $shareamount = '', 0, $setoffdate) == true)
			{					
				echo "<form method = 'post' action = 'setmemberoff.php' id = 'myForm'><input type = 'hidden' value = 'Successful' name = 'comment' /></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
/* 			else{
				echo "<form method = 'post' action = 'setmemberoff.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
				echo "<script>document.getElementById('myForm').submit();</script>";
			}
 */		}
		else {
			//echo $error;
			echo "<form method = 'post' action = 'setmemberoff.php' id = 'myForm'><textarea name = 'error' >$error</textarea></form>";
			echo "<script>document.getElementById('myForm').submit();</script>";
		}
	}
	else{
		echo "<form method = 'post' action = 'setmemberoff.php' id = 'myForm'><input type = 'hidden' value = 'Not successful' name = 'comment'></form>";
		echo "<script>document.getElementById('myForm').submit();</script>";
	}
?>