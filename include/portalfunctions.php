<?php
	date_default_timezone_set("Africa/Lagos");
	//turn strings in the array to camel casing
	function uppercase(&$item, $key){
		$item = ucwords(strtolower($item));
	}
	//turn strings in the array to lower case
	function lowercase(&$item, $key){
		$item = strtolower($item);
	}
	function get_mdeduction($conn, $cid = '', $tno = '', $facilityid = 0, $accountnumber = '', $return = 'fetchAll'){
		$get_mdeduction = selectquery ($conn, 'mdeduction1', $return, "where if('$cid' <> '', cid in ('$cid'), cid not in ('$cid')) and if('$tno' <> '', tno in ('$tno'), tno not in ('-1')) and if($facilityid > 0, facilityid in ($facilityid), facilityid not in (0))");
		return $get_mdeduction;
	}
	//function to write a select query
	function selectquery ($conn, $table, $return = 'fetchAll', $condition = '', $selectables = ' * '){
		ini_set('memory_limit', '-1');
		$conditions = $condition;
		if(is_array($condition)){
			$sn = 0;
			$conditions = '';
			$countcondition = count($condition);
			foreach ($condition as $key => $value) {
				++$sn;
				if($sn == 1)
					$conditions .= "where ";
				$conditions .= "$key = '$value'";
				/* if($sn == 1 || $sn == $countcondition){
					$conditions .= "$key = '$value'";
				}
				else if($sn > 0){
					$conditions .= ", $key = '$value'";
				} */
			}
		}
		
		$stmt = $conn->prepare("(select".$selectables . " from " . $table ." ".$conditions . ")");
		$stmt->execute();
		$count = $stmt->rowCount();
		if($table == 'msalary'){
		//echo "hi3";
		//echo $count;
		//print_r($stmt);
		//echo "hi4";
		}
		if($count > 0 && ($return == 'fetchAll' || $return == 'fetchall')){
			$data = $stmt->fetchAll();
			return $data;
		}
		else if($count > 0 && ($return == 'fetchsingle' || $return == 'singlefetch')){
			//echo $return;
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			//if($table == 'auditquery'){
			//echo "hi3";
			//echo $count;
			//print_r($data);
			//echo "hi4";
			//}
			return $data;
		}
		else if($count > 0 && $return != ''){
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			//if($table == 'pdata'){
			//echo "hi3";
			//echo $return;
			//print_r($stmt);
			//echo "hi4";
			//}
			return $data["$return"];
		}
	}
	function searchname($conn, $name){
		$searchname = selectquery ($conn, 'memberregister', $return = 'fetchAll', "where concat_ws(' ', sname, fname, mname) like '%$name%' and memstatus = '1'");
		return $searchname;
	}
	function getfacilitydetails($conn, $tno = 0, $midno = '', $facid = 0, $chequeissued = 0, $return = 'fetchAll', $guaranto1 = '', $guaranto2 = '', $witness = ''){
		$getfacilitydetails = selectquery ($conn, 'facilityregister, facilitytypes, memberregister', $return, "where if('$witness' <> '', facilityregister.witness in ('$witness'), facilityregister.witness not in ('$witness')) and if('$guaranto2' <> '', facilityregister.guaranto2 in ('$guaranto2'), facilityregister.guaranto2 not in ('$guaranto2')) and if('$guaranto1' <> '', facilityregister.guaranto1 in ('$guaranto1'), facilityregister.guaranto1 not in ('$guaranto1')) and if($tno > 0, facilityregister.tno in ($tno), facilityregister.tno not in ($tno)) and if ('$midno' <> '', facilityregister.midno in ('$midno'), facilityregister.midno not in ('$midno')) and if($facid > 0, facilityregister.facid in ($facid), facilityregister.facid not in ($facid)) and facilityregister.facid = facilitytypes.factypeid and facilityregister.midno = memberregister.memid and if($chequeissued > 0, facilityregister.chequeissued in ($chequeissued), facilityregister.chequeissued in ($chequeissued))");
		return $getfacilitydetails;
	}
	function facilityregisterupdate($conn, $tno, $midno, $facid, $adate, $principal, $period, $interest, $instalment, $purpose, $paid, $balance, $gmemid1, $gamount1, $gmemid2, $gamount2, $witness, $approvedby, $printstatus, $chequeissued, $remarks){
		$data1 = getfacilitydetails($conn, $tno, $midno = '', $facid = 0, $chequeissued = 0, $return = 'fetchsingle');
		if(!empty($data1)){
			if($principal != '' && $interest != '' && $paid != '')
				$balance = ((int)str_replace(",", "", $principal)+(int)str_replace(",", "", $interest)) - (int)str_replace(",", "", $paid);
			if($facid == '')
				$facid = $data1['facid'];
			if($midno == '')
				$midno = $data1['midno'];
			if($adate == '')
				$adate = $data1['adate'];
			if($principal == '')
				$principal = $data1['principal'];
			if($period == '')
				$period = $data1['period'];
			if($interest == '')
				$interest = $data1['interest'];
			if($instalment == '')
				$instalment = $data1['instalment'];
			if($purpose == '')
				$purpose = $data1['purpose'];
			if($paid == '')
				$paid = $data1['paid'];
			if($balance == '')
				$balance = $data1['balance'];
			if($gmemid1 == '')
				$gmemid1 = $data1['gmemid1'];
			if($gamount1 == '')
				$gamount1 = $data1['gamount1'];
			if($gmemid2 == '')
				$gmemid2 = $data1['gmemid2'];
			if($gamount1 == '')
				$gamount2 = $data1['gamount2'];
			if($witness == '')
				$witness = $data1['witness'];
			if($approvedby == '')
				$approvedby = $data1['approvedby'];
			if($approvaldate == '')
				$approvaldate = $data1['approvaldate'];
			if($printstatus == '')
				$printstatus = $data1['printstatus'];
			if($chequeissued == '')
				$chequeissued = $data1['chequeissued'];
			if($remarks == '')
				$remarks = $data1['remarks'];
			$stmt = $conn->prepare("UPDATE `facilityregister` SET `facid`='$facid',`midno`='$midno',`adate`='" . date('Y-m-d', strtotime($adate)) . "',`principal`='" . str_replace(',','', $principal) ."',`period`='$period',`interest`='" . str_replace(',','', $interest) . "',`instalment`='" . str_replace(',','', $instalment) . "',`purpose`='$purpose',`paid`='" . str_replace(',','', $paid) . "',`balance`='" . str_replace(',','', $balance) . "',`guaranto1`='$guaranto1',`gamount1`='" . str_replace(',','', $gamount1) . "',`guaranto2`='$guaranto2',`gamount2`='" . str_replace(',','', $gamount2) . "',`witness`='$witness',`approvedby`='$approvedby',`approvaldate`= '" . date('Y-m-d', strtotime($approvaldate)) . "',`printstatus`='$printstatus',`chequeissued`='$chequeissued',`remarks`='$remarks' WHERE tno = '$tno'" );
			$stmt->execute();
			$count = $stmt->rowCount();
			print_r($stmt);
			if($count > 0){
				return true;
			}else return false;
		}else return false;
	}
	function facilityregisterinsert($conn, $facility, $memid, $date, $principal, $period, $interest, $installment, $remarks, $gmemid1, $gamount1, $gmemid2, $gamount2, $witnessid,$approvedbyid, $date1, $paid = 0, $balance = 0){
		$formno = formno($conn, 'facilityregister', 'tno');
		//echo "INSERT INTO `facilityregister`(`tno`, `facid`, `midno`, `adate`, `principal`, `period`, `interest`, `instalment`, `purpose`, `Balance`, `guaranto1`, `gamount1`, `guaranto2`, `gamount2`, `witness`, `approvedby`, `approvaldate`, `userr`, `udate`) VALUES ('$formno', '$facility', '$memid', '" . date('Y-m-d', strtotime($date)) . "', '" . str_replace(",", "", $principal) . "', '$period', '" . str_replace(",", "", $interest) . "', '" . str_replace(",", "", $installment) . "', '$purpose', '" . (int)str_replace(",", "", $principal) + (int)str_replace(",", "", $interest) . "', '$gmemid1', '" . str_replace(",", "", $gamount1) . "', '$gmemid2', '" . str_replace(",", "", $gamount2) . "', '$witnessid', '$approvedbyid', '" . date('Y-m-d', strtotime($date)) . "', '10', '" . date('Y-m-d H:i:s') . "')";
		if($balance == 0 && $principal != '' && $interest != '')
		$balance = (int)str_replace(",", "", $principal) + (int)str_replace(",", "", $interest);
		$stmt2 = $conn->prepare("INSERT INTO `facilityregister`(`tno`, `facid`, `midno`, `adate`, `principal`, `period`, `interest`, `instalment`, `remarks`, `balance`, `guaranto1`, `gamount1`, `guaranto2`, `gamount2`, `witness`, `approvedby`, `approvaldate`, `userr`, `udate`, `paid`) VALUES ('$formno', '$facility', '$memid', '" . date('Y-m-d', strtotime($date)) . "', '" . str_replace(",", "", $principal) . "', '$period', '" . str_replace(",", "", $interest) . "', '" . str_replace(",", "", $installment) . "', '$remarks', '" . str_replace(",", "", $balance) . "', '$gmemid1', '" . str_replace(",", "", $gamount1) . "', '$gmemid2', '" . str_replace(",", "", $gamount2) . "', '$witnessid', '$approvedbyid', '" . date('Y-m-d', strtotime($date1)) . "', '10', '" . date('Y-m-d H:i:s') . "', '" . str_replace(",", "", $paid) . "')");
		//print_r($stmt2);
		$stmt2->execute();
		$count2 = $stmt2->rowCount();
		if($count2 > 0 ){
			return true;
		}
		else return false;
	}
	function imprestexpenseinsert($conn, $vdate, $vno, $amount, $purpose, $remark){
		$userr = 10;
		$formno = formno($conn, 'imprestexpenses', 'impno');
		$stmt = $conn->prepare("INSERT INTO `imprestexpenses`(`impno`, `vdate`, `vno`, `amount`, `purpose`, `remark`, `userr`, `udate`) VALUES ('" . date('Y-m-d', $vdate) . "', '$vno', '" . str_replace(',','', $amount). "', '$purpose', '$remark', '$userr', '" . date('Y-m-d H:i:s') . "')");
		$stmt->execute();
		//print_r($stmt);
		$count = $stmt->rowCount();
		if($count > 0)
		{
			return true;
		}
		else return false;
	}
	function get_expensehead($conn, $expenseno = 0, $return = 'fetchAll'){
		$get_expensehead = selectquery($conn, 'expenseheads', $return, "where if('$expensenoexpno' <> 0, expno in ('$expenseno'),expno not in (0))");
		return $get_expensehead;
	}
	function get_montpays($conn, $idn = '', $facid = '', $return = 'fetchAll'){
		$get_montpays = selectquery($conn, 'memberpays', $return, "where idn = '$idn' and if('$facid' <> '', facid in(" . "'" . str_replace(array("'", ","), array("\\'", "','"), $facid) . "'" . "), facid not in (0))");
		return $get_montpays;
	}
	function get_firstguarantee($conn, $guaranto1, $return = 'fetchAll'){
		$get_firstguarantee = getfacilitydetails($conn, $tno = 0, $midno = '', $facid = 0, $chequeissued = 0, $return = 'fetchAll', $guaranto1);
		return $get_firstguarantee;
	}
	function get_secondguarantee($conn, $guaranto2, $return = 'fetchAll'){
		$get_secondguarantee = getfacilitydetails($conn, $tno = 0, $midno = '', $facid = 0, $chequeissued = 0, $return = 'fetchAll', '' , $guaranto2);
		return $get_secondguarantee;
	}
	function get_witness($conn, $witness, $return = 'fetchAll'){
		$get_witness = getfacilitydetails($conn, $tno = 0, $midno = '', $facid = 0, $chequeissued = 0, $return = 'fetchAll', '' , '', $witness);
		return $get_witness;
	}
	function updatememberregister($conn, $memid, $title = '', $sname = '', $fname = '', $mname = '', $dob = '', $gender = '', $mstat = '', $nationality = '', $homeadd1 = '', $homeadd2 = '', $homeadd3 = '', $state = '', $country = '', $phoneno = '', $email = '', $busnature = '', $busadd1 = '', $busadd2 = '', $busadd3 = '', $busstate = '', $buscountry = '', $chyr = '', $wofbilevel = '', $province = '', $district = '', $zone = '', $wsflocation = '', $nkintitle = '', $nkinsname = '', $nkinfname = '', $nkinmname = '', $nkinrel = '', $nkadd1 = '', $nkadd2 = '', $nkadd3 = '', $nkstate = '', $nkcountry = '', $nkphoneno = '', $nkemail = '', $datejoin = '', $monthlysavings = '', $accountnumber = '', $groupid = '', $shareamount = '', $memstatus = '', $dateout = ''){
		$data = get_user($conn, $memid, 'fetchsingle');
		if(!empty($data)){
			//$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($title == '' )
				$title = $data['title'];
			if($sname == '' )
				$sname = $data['sname'];
			if($fname == '' )
				$fname = $data['fname']; 
			if($mname == '' )
				$mname = $data['mname']; 
			if($dob == '' )
				$dob = $data['dob']; 
			if($gender == '' )
				$gender = $data['gender']; 
			if($mstat == '' )
				$mstat = $data['mstat']; 
			if($nationality == '' )
				$nationality = $data['nationality']; 
			if($homeadd1 == '' )
				$homeadd1 = $data['homeadd1']; 
			if($homeadd2 == '' )
				$homeadd2 = $data['homeadd2']; 
			if($homeadd3 == '' )
				$homeadd3 = $data['homeadd3']; 
			if($state == '' )
				$state = $data['state']; 
			if($country == '' )
				$country = $data['country']; 
			if($phoneno == '' )
				$phoneno = $data['phoneno'];
			if($email == '' )
				$email = $data['email']; 
			if($busnature == '' )
				$busnature = $data['busnature']; 
			if($busadd1 == '' )
				$busadd1 = $data['busadd1']; 
			if($busadd2 == '' )
				$busadd2 = $data['busadd2']; 
			if($busadd3 == '' )
				$busadd3 = $data['busadd3']; 
			if($busstate == '' )
				$busstate = $data['busstate']; 
			if($buscountry == '' )
				$buscountry = $data['buscountry']; 
			if($chyr == '' )
				$chyr = $data['chyr']; 
			if($wofbilevel == '' )
				$wofbilevel = $data['wofbilevel']; 
			if($province == '' )
				$province = $data['province']; 
			if($district == '' )
				$district = $data['district']; 
			if($zone == '' )
				$zone = $data['zone']; 
			if($wsflocation == '' )
				$wsflocation = $data['wsflocation']; 
			if($nkintitle == '' )
				$nkintitle = $data['nkintitle']; 
			if($nkinsname == '' )
				$nkinsname = $data['nkinsname']; 
			if($nkinfname == '' )
				$nkinfname = $data['nkinfname']; 
			if($nkinmname == '' )
				$nkinmname = $data['nkinmname']; 
			if($nkinrel == '' )
				$nkinrel = $data['nkinrel']; 
			if($nkadd1 == '' )
				$nkadd1 = $data['nkadd1']; 
			if($nkadd2 == '' )
				$nkadd2 = $data['nkadd2']; 
			if($nkadd3 == '' )
				$nkadd3 = $data['nkadd3']; 
			if($nkstate == '' )
				$nkstate = $data['nkstate'];
			if($nkcountry == '' )
				$nkcountry = $data['nkcountry'];
			if($nkemail == '' )
				$nkemail = $data['nkemail'];
			if($datejoin == '' )
				$datejoin = $data['datejoin'];
			if($monthlysavings == '' )
				$monthlysavings = $data['monthlysavings'];
			if($accountnumber == '' )
				$accountnumber = $data['accountnumber'];
			if($groupid == '' )
				$groupid = $data['groupid'];
			if($shareamount == '' )
				$shareamount = $data['shareamount'];
			if($memstatus == '' && $memstatus < 0 )
				$memstatus = $data['memstatus'];
			if($dateout == '' )
				$dateout = $data['dateout'];
			$stmt1 = $conn->prepare("UPDATE `memberregister` SET `title`='$title',`sname`='$sname',`fname`='$fname',`mname`='$mname',`dob`='$dob',`gender`='$gender',`mstat`='$mstat',`nationality`='$nationality',`homeadd1`='$homeadd1',`homeadd2`='$homeadd2',`homeadd3`='homeadd3',`state`='$state',`country`='$country',`phoneno`='$phoneno',`email`='$email',`busnature`='$busnature',`busadd1`='$busadd1',`busadd2`='$busadd2',`busadd3`='$busadd3',`busstate`='$busstate',`buscountry`='$buscountry',`chyr`='$chyr',`wofbilevel`='$wofbilevel',`province`='$province',`district`='$district',`zone`='$zone',`wsflocation`='$wsflocation',`nkintitle`='$nkintitle',`nkinsname`='$nkinsname',`nkinfname`='$nkinfname',`nkinmname`='$nkinmname',`nkinrel`='$nkinrel',`nkadd1`='$nkadd1',`nkadd2`='$nkadd2',`nkadd3`='$nkadd3',`nkstate`='$nkstate',`nkcountry`='$nkcountry',`nkphoneno`='$nkphoneno',`nkemail`='$nkemail',`datejoin`='$datejoin',`monthlysavings`='$monthlysavings',`accountnumber`='$accountnumber',`groupid`='$groupid',`shareamount`='$shareamount',`memstatus`='$memstatus',`dateout`='$dateout' WHERE memid = '$memid'");
			$stmt1->execute();
			print_r($stmt1);
			$count1 = $stmt1->rowCount();
			if($count1 > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	function get_duty($conn, $dutyid = 0, $return = 'fetchAll'){
		$get_duty = selectquery($conn, 'duties', $return, "where if($dutyid > 0, dutyid in ($dutyid), dutyid not in ($dutyid))");
		return $get_duty;
	}
	function get_post($conn, $postid = 0, $return = 'fetchAll'){
		$get_post = selectquery($conn, 'posts', $return, "where if($postid > 0, postid in ($postid), postid not in ($postid))");
		return $get_post; 
	}
	function liberatorinsert($conn, $staffid, $title, $sname, $fname, $mname, $post, $duty, $liberatorstatus){
		$formno = 0;
		$user = 10;
		$stmt = $conn->prepare("INSERT INTO `liberators`(`staffid`, `title`, `sname`, `fname`, `mname`, `post`, `duty`, `liberatorstatus`) VALUES ('$staffid', '$title', '$sname', )");
		//print_r($stmt3);
		$stmt->execute();
		$count = $stmt->rowCount();
		
		//print_r($stmt);
		if($count > 0){
			//$formno = 0;
			return true;
		}else return false;
	}
	function montpayinsert($conn, $receiptdate, $memid, $amount, $facid, $instrument, $remark = ''){
		$formno = 0;
		$user = 10;
		$stmt = $conn->prepare("INSERT INTO `memberpays`(`pdate`, `idn`, `amount`, `facid`, `remark`, `userr`, `udate`, `paymode`) VALUES ('" . date('Y-m-d', $receiptdate) . "', '$memid', '" . str_replace(',', '', $amount) . "', '$facid', '$remark', '$user', '" . date('Y-m-d H:i:s') . "', '$instrument')");
		//print_r($stmt3);
		$stmt->execute();
		$count = $stmt->rowCount();
		
		//print_r($stmt);
		if($count > 0){
			//$formno = 0;
			return true;
		}
	}
	function updatefacility($conn, $tno, $paid = '', $balance = '', $principal = '', $period = '', $interest = '', $instalment = '', $purpose = '', $guaranto1 = '', $guaranto2 = '', $gamount1 = '', $gamount2 = '', $approvedby = '', $witness = '', $printstatus = '', $approvaldate = '', $chequeissued = '', $remarks = '', $cdate = ''){
		$data = getfacilitydetails($conn, $tno, '', 0, 0, 'fetchsingle');
		if(!empty($data)){
			if($paid == '')
				$paid = $data['paid'];
			if($balance == '')
				$balance = $data['balance'];
			if($principal == '')
				$principal = $data['principal'];
			if($period == '')
				$period = $data['period'];
			if($interest == '')
				$interest = $data['interest'];
			if($instalment == '')
				$instalment = $data['instalment'];
			if($purpose == '')
				$purpose = $data['purpose'];
			if($guaranto1 == '')
				$guaranto1 = $data['guaranto1'];
			if($guaranto2 == '')
				$guaranto2 = $data['guaranto2'];
			if($gamount1 == '')
				$gamount1 = $data['gamount1'];
			if($gamount2 == '')
				$gamount2 = $data['gamount2'];
			if($approvedby == '')
				$approvedby = $data['approvedby'];
			if($witness == '')
				$witness = $data['witness'];
			if($printstatus == '')
				$printstatus = $data['printstatus'];
			if($approvaldate == '')
				$approvaldate = $data['approvaldate'];
			if($chequeissued == '')
				$chequeissued = $data['chequeissued'];
			if($remarks == '')
				$remarks = $data['remarks'];
			$stmt1 = $conn->prepare("UPDATE `facilityregister` SET `principal`='$principal',`period`= '$period',`interest`='$interest',`instalment`='$instalment',`purpose`='$purpose',`paid`='$paid',`balance`='$balance',`guaranto1`='$guaranto1',`gamount1`='$gamount1',`guaranto2`='$guaranto2',`gamount2`='$gamount2',`witness`='$witness',`approvedby`='$approvedby',`approvaldate`='$approvaldate',`printstatus`='$printstatus',`chequeissued`='$chequeissued',`remarks`='$remarks',`cdate`='" . date('Y-m-d H:i:s') . "' WHERE tno = '$tno'");
			$stmt1->execute();
			//print_r($stmt1);
			$count1 = $stmt1->rowCount();
			if($count1 > 0){
				return true;
			}
			else return false;
		}
	}
	function formno($conn, $table, $tno, $return = 'fetchsingle'){
		$formno = 0;
		$user = 10;
		do{
			$selectquery = selectquery ($conn, $table, $return = 'fetchAll', '', 'max($tno)');
			if(!empty($selectquery)){
				$formno = $selectquery['tno'] + 1;//checks if the staffid exist before assigning
				$selectquery1 = selectquery ($conn, $table, $return = 'fetchAll', "where $tno = '$formno'");
			}else{
				$formno = 1;
			}
		}
		while(!empty($selectquery1));
		return $formno;
	}
	function shareincrementinsert($conn, $memid, $presentshare, $proposedshare, $receiptno, $receiptdate, $instrument, $formdate, $refno, $refdate){
		$formno = formno($conn, 'shareincrement', 'tno');
		$stmt3 = $conn->prepare("INSERT INTO `shareincrement`(`tno`, `formdate`, `memid`, `presentshare`, `proposedshare`, `receiptno`, `receiptdate`, `instrument`, `refno`, `refdate`, `officer`, `entrydate`) VALUES ('$formno', '" . date('Y-m-d', strtotime($formdate)) . "', '$memid', '" . str_replace(',', '', $presentshare) . "','" . str_replace(',', '', $proposedshare) . "', '$receiptno','" . date('Y-m-d', strtotime($receiptdate)) . "','$instrument', '$refno','" . date('Y-m-d', strtotime($refdate)) . "', '$user', '" . date('Y-m-d H:i:s') . "')");
		$stmt3->execute();
		$count3 = $stmt3->rowCount();
		return $count3 > 0;
	}
	function savingsreschedulinginsert($conn, $memid, $presentsavings, $proposedsavings, $startdate, $reason, $formdate){
		$formno =  formno($conn, 'savingsreschudling', 'tno');
		$stmt3 = $conn->prepare("INSERT INTO `savingsreschudling`(`tno`, `memid`, `presentsavings`, `proposedsavings`, `startdate`, `reason`, `formdate`, `officer`, `entrydate`) VALUES ('$formno','$memid','" . str_replace(',', '', $presentsavings) . "','" . str_replace(',', '', $proposedsavings) . "','" . date('Y-m-t', strtotime($startdate)) . "','$reason','" . date('Y-m-d', strtotime($formdate)) . "','$user','" . date('Y-m-d H:i:s') . "')");
		$stmt3->execute();
		$count3 = $stmt3->rowCount();
		return $count3 > 0;
	}
	function cashflowoutinsert($conn, $facility, $receiptno, $receiptdate, $memid, $feeamount, $instrument, $refno, $refdate, $bank, $remark, $expense = 0, $receiver = '', $purpose = ''){
		$formno = formno($conn, 'cashflowout', 'oino');
		$get_facility = get_facility($conn, $facility, '', 'facility');
		$data6 = $get_facility != ''? $data6 : "";
		$data6 = $expense > 0 ? selectquery($conn, 'expenseheads', 'exphead', "where expno = '$expense'") : $data6;
		$data6 = $get_facility == '' && $expense == 0? $purpose:$data6;
		$stmt3 = $conn->prepare("INSERT INTO `cashflowout`(`oino`, `vno`, `vdate`, `receiver`, `receiverid`, `amount`, `purpose`, `instrument`, `docref`, `docdate`, `docbank`, `facilityno`, `facility`, `remark`, `userr`, `udate`, `expenseid`) VALUES ('$formno', '$receiptno', '" . date('Y-m-d', strtotime($receiptdate)) . "', '$receiver', '$memid', '" . str_replace(",","", $feeamount) . "', '" . $data6 . "', '$instrument', '$refno', '" . date('Y-m-d', strtotime($refdate)) . "', '$bank', '$loanregno', '$facility', '$remark', '$user', '" . date('Y-m-d H:i:s') . "', '$expense')");
		$stmt3->execute();
		$count3 = $stmt3->rowCount();
		return $count3 > 0;
	}
	function cashflowininsert($conn, $facility, $receiptno, $receiptdate, $memid, $feeamount, $instrument, $refno, $refdate, $bank, $purpose = '', $payer = ''){
		$formno = formno($conn, 'cashflowin', 'incomeidno');
		$get_facility = get_facility($conn, $facility, '', 'fetchsingle');
		$data6 = !empty($get_facility)? $get_facility['facility']:"";
		if($purpose == '')
			$reason = $get_facility['factypeid'] == 3? ' Increment':' Application Fee';
		else if($purpose != '')
			$reason = $get_facility['factypeid'] == 3? ' Increment':" $purpose";
		$stmt3 = $conn->prepare("INSERT INTO `cashflowin`(`incomeidno`, `receiptno`, `receiptdate`, `payerid`, `amount`, `incomesource`, `instrument`, `docref`, `docdate`, `docbank`, `purpose`, `userr`, `udate`, `payer`) VALUES('$formno', '$receiptno', '" . date('Y-m-d', strtotime($receiptdate)) . "', '$memid', '" . str_replace(",","", $feeamount) . "', '$facility', '$instrument', '$refno', '" . date('Y-m-d', strtotime($refdate)) . "', '$bank','" . $data6 . " $reason ', '$user', '" . date('Y-m-d H:i:s') . "', '$payer')");
		$stmt3->execute();
		$count3 = $stmt3->rowCount();
		return $count3 > 0;
	}
	function get_cashflowin($conn, $payerid = 0, $incomesource = 0, $return = 'fetchAll'){
		$get_cashflowin = selectquery($conn, 'cashflowin', $return, "where if('$payerid' <> '', cashflowin.payerid in ('$payerid'), cashflowin.payerid not in ('$payerid')) and if ($incomesource > 0, cashflowin.incomesource in ('$incomesource'), cashflowin.incomesource not in ('$incomesource'))");
		return $get_cashflowin;
	}
	function confirmreceiptno($conn, $receiptno){
		$confirmreceiptno = selectquery($conn, 'cashflowin', 'fetchsingle', "where cashflowin.receiptno = '$receiptno'");
		return !empty($confirmreceiptno);
	}
	function confirmrefno($conn, $refno){
		$confirmrefno = selectquery($conn, 'cashflowin,cashflowout', 'fetchAll', "where cashflowin.docref = '$refno' or cashflowout.docref = '$refno'");
		return !empty($confirmrefno);
	}
	function newmemberid($conn){
		date_default_timezone_set("Africa/Lagos");
		$year = date ('y');
		// $yearno = selectquery($conn, 'memberregister', 'yearno', "where memid like '_____".$year."___'", 'max(substring(memid, 8,3)) as yearno, memid');
		//$yearno = $yearno > 0?$yearno + 1:'001';
		$sql = "SELECT * FROM memberregister ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);
        $reslt = $result->fetch();
		$idcount=$result->rowCount();
		// (substring($reslt['memid']))
		$lastinsertid = $reslt['memid'];
		if($idcount > 0){
			if($year > substr($lastinsertid, 5, 2)){
				$yearno = '001';
			}
			else{
				$yearno = sprintf("%03d",substr($lastinsertid, 7, 3) + 1);
			}
		}else{
			$yearno = '001';
		}
		
		$regnoprefix = selectquery($conn, 'society', 'regnoprefix');
		$memid = $regnoprefix.$year.$yearno;		
		return $memid;
	}
	function get_office($conn, $officeid = 0, $return = 'fetchAll'){
		$get_office = selectquery($conn, 'offices', $return, "where if($officeid > 0, officeid in ($officeid), officeid not in ($officeid))");
		return $get_office;
	}
	function get_bank($conn, $id = 0, $return = 'fetchAll'){
		
		$stmt = $conn->prepare("select * from banks where if($id > 0, id in ($id), id not in ($id))");
		$stmt->execute();
		//print_r($stmt);
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else{
			return "";
		}
	}
	function get_instrument($conn, $instrumentid = 0){
		$stmt = $conn->prepare("select * from instruments where if($instrumentid > 0, instrumentid in ($instrumentid), instrumentid not in ($instrumentid))");
		$stmt->execute();
		//print_r($stmt);
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else{
			return "";
		}
	}
	function get_relationship($conn, $relid = 0){
		$stmt = $conn->prepare("select * from relationships where if($relid > 0, relid in ($relid), relid not in ($relid))");
		$stmt->execute();
		//print_r($stmt);
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else{
			return array();
		}
	}
	function get_wofbilevel($conn, $certid = 0,$certabbr = ''){
		$stmt = $conn->prepare("select * from wofbilevel where if($certid > 0, certid in ($certid), certid not in ($certid)) and if('$certabbr' <> '', certabbr in ('$certabbr'), certabbr not in ('$certabbr'))");
		$stmt->execute();
		//print_r($stmt);
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else{
			return "";
		}
	}
	function get_setoffreason($conn, $id=0){
		$stmt = $conn->prepare("select * from setoffreasons where if($id > 0, reasonid in ($id), reasonid not in ($id))");
		//print_r($stmt);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else{
			return "";
		}
	}
	function get_officer($conn, $memid){
		$stmtofficer = $conn->prepare("select * from officers, offices where memid in (select memid from memberregister where memid = '$memid' and memstatus = 1) and officers.office = offices.officeid");
		//print_r($stmtofficer);
		$stmtofficer->execute();
		$countofficer = $stmtofficer->rowCount();
		if($countofficer > 0){
			$dataofficer = $stmtofficer->fetchAll();
			return $dataofficer;
		}
		else{
			return "";
		}
	}
	function get_nationality($conn, $countrycode = '', $countryid = 0){
		$stmt = $conn->prepare("select * from countries where if('$countrycode' <> '', countrycode in ('$countrycode'), countrycode not in ('$countrycode')) and if($countryid > 0, countryid in ($countryid), countryid not in ($countryid))");
		//print_r($stmt);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else array();
	}
	function get_facility($conn, $facilityid=0, $facilitystatus = '', $return = 'fetchAll'){
		$get_facility = selectquery($conn, 'facilitytypes', $return, "where if($facilityid > 0, factypeid in ($get_facility), factypeid not in ($facilityid)) and if('$facilitystatus' <> '' and ('$facilitystatus' = '0' or '$facilitystatus' = '1') , fstatus in ('$facilitystatus'), fstatus <> 0)");
		return $get_facility;
	}
	function get_state($conn, $countrycode = '', $state_code = '', $state_id = ''){
		$stmt = $conn->prepare("select * from states where if('$countrycode' <> '', countrycode in ('$countrycode'), countrycode not in ('$countrycode')) and if('$state_code' <> '', state_code in ('$state_code'), state_code not in ('$state_code')) and if('$state_id' <> '', state_id in ('$state_id'), state_id not in ('$state_id'))");
		$stmt->execute();
		//print_r($stmt);
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
	}
	function get_allstates($conn){
		$stmt = $conn->prepare("select * from states");
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
	}
	function get_category($conn, $category){
		$stmt = $conn->prepare("select * from category where ct = '$category'");
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
	}
	function get_currentfacility($conn, $memid = ''){
		$stmt = $conn->prepare("select * from facilityregister where (principal + interest) <> paid and if('$memid' <> '', midno in ('$memid'), midno not in ('$memid'))");
		$stmt->execute();
		$count = $stmt->rowCount();
		//print_r($stmt);
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else return "";
	}
	function get_gender($conn, $gender = 0, $abbr = ''){
		$stmt = $conn->prepare("select * from gender where if($gender <> 0, id in ($gender), id not in ($gender)) and if('$abbr' <> '', gender in ('$abbr'), gender not in ('$abbr'))");
		//print_r($stmt);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
	}
	function get_groupname($conn, $groupid = 0, $groupname = ''){
		$stmt = $conn->prepare("select * from groupnames where if($groupid <> 0, groupid in ($groupid), groupid not in ($groupid)) and if('$groupname' <> '', groupname in ('$groupname'), groupname not in ('$groupname'))");
		//print_r($stmt);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
	}
	function get_mstat($conn, $mstat = 0){
		$stmt = $conn->prepare("select * from mstat where if($mstat > 0, mstatid in ($mstat), mstatid not in ($mstat))");
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}else return array();
	}
	function get_title($conn, $title = ''){
		if(is_numeric($title))
			$stmt = $conn->prepare("select * from titles where if($title > 0, titleid in ($title), titleid not in ($title))");
		else if(is_string($title))
			$stmt = $conn->prepare("select * from titles where if('$title' <> '', title in ('$title'), title not in ('$title'))");
		$stmt->execute();
		//print_r($stmt);
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetchAll();
			return $data;
		}
		else array();
	}
	function get_user($conn, $loginid = '', $return = 'fetchAll'){
		if(is_numeric($loginid))
			$get_user = selectquery($conn, 'memberregister', $return, "where memid in (select userid from login where loginid in ($loginid)) and memstatus = 1");
		else if(is_string($loginid))
			$get_user = selectquery($conn, 'memberregister', $return, "where memid in ('$loginid') and memstatus = 1");
		return $get_user;
	}
	function logguser($conn, $staffid,$comment, $menuid)
	{
		$userid =implode(',', array_map(function($el){ return $el['memid']; }, get_user($conn, $_SESSION['loginid'])));
		$response = "";
		$date = date("Y-m-d H:i:s");
		try{
			$strSQL1="insert into portallog (username,staffid,comments,date, menuid) values('$staffid','$userid','$comment','$date', '$menuid')";
			//echo $strSQL1;
			$conn->exec($strSQL1);
			$last_id = $conn->lastInsertId();
			if($last_id > 0){
				$response ='done';	
			}
			else $response ='not done';
		}		
		catch(PDOException $e) {
			echo "Error: Loging Portal ";
		}		
		return $response;
	}
	function test_input($data) {
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);
		$data = filter_var($data, FILTER_SANITIZE_STRING);
		return $data;
	}
	function get_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = filter_var($data, FILTER_SANITIZE_STRING);
		return $data;
	}
	function view_menu($conn, $menid, $submenid){		
		//echo "hi";
		$stmt = $conn->prepare("select distinct appsmenu.appmenuid, appsmenu.menuname from appsmenu inner join appssubmenu on appsmenu.appmenuid = appssubmenu.menuid where appssubmenu.status = 1 and appssubmenu.submenutypeid = 1 and appsmenu.status=1 and appssubmenu.submenuid in ($submenid) and if ($menid=0, appmenuid <> 0, appmenuid in ($menid)) and appssubmenu.menustatus = 1 order by menuorder");
		$stmt->execute();
		$output ="";
		//echo "select distinct appsmenu.appmenuid, appsmenu.menuname from appsmenu inner join appssubmenu on appsmenu.appmenuid = appssubmenu.menuid where appssubmenu.status = 1 and appssubmenu.submenutypeid = 1 and appsmenu.status=1 and appssubmenu.submenuid in ($submenid) and if ($menid=0, appmenuid <> 0, appmenuid in ($menid)) and appssubmenu.appstatus = 1 and appssubmenu.menustatus = 1 order by menuorder";
		//$data = $stmt->fetchall();
		//print_r($data);
		
		while($data = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$output .= "<li class = \"gui-folder\"><a>";
			$output .= "<div class = \"gui-icon\"><span class=\"glyphicon glyphicon-list-alt\"></span></div>";
			$output .= "<span class = \"title\">" . ucwords($data['menuname']) . "</span></a><!--start submenu --><ul>";
			$stmt1 = $conn->prepare("select * from appssubmenu where submenutypeid = 1 and status=1 and menustatus = 1 and menuid = " . $data['appmenuid'] . " and submenuid in ($submenid) order by submenuorder");
			//echo "select * from appssubmenu where submenutypeid = 1 and status=1 and menustatus = 1and menuid = " . $data['appmenuid'] . " and submenuid in ($submenid) order by submenuorder";
			$stmt1->execute();
			while($data1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
				$output .= "<li><a class= \"menu collapseExample" . $data['appmenuid'] . "\" href=\"" . str_replace(' ', '', $data['menuname']) . "/" . $data1['filename']. "." . $data1['extension'] . "\" id = \"submenu" . $data1['submenuid'] . "\" target=\"frame\" ><span class=\"title\">" . ucwords($data1['submenuname']) . "</span></a></li>";
				//$output .= "<a class= \"dropdown-content menu collapseExample" . $data['appmenuid'] . "\" href=\"" . str_replace(' ', '', $data['menuname']) . "/" . $data1['filename']. "." . $data1['extension'] . "\" id = \"submenu" . $data1['submenuid'] . "\" style=\"color: #808080; background-color:#f5f5f5;\" target=\"frame\">" . ucwords($data1['submenuname']) . "</a>";
			}
			$output .= "</ul><!--end /submenu --></li>";
		}
		//echo $output;
		$output .= "</div>";
		return $output;
	}
	function menu_view($conn, $menuid, $status){
		$stmt = $conn->prepare("select * from appsmenu where if($status <> 0, status=$status, status=$status) and if ($menuid=0, appmenuid <> 0, appmenuid= $menuid) order by menuname");
		$stmt->execute();
		//echo "select * from appsmenu where if($status <> 0, status=$status, status=$status) and if($appid<>0, appid in ($appid),appid not in ($appid)) and if ($menuid=0, appmenuid <> 0, appmenuid= $menuid) order by menuname";
		$data = $stmt->fetchall();
		return $data;
	}
	function get_userrole($conn, $id){
		$stmt = $conn-> prepare("select roleid from roles where status = 1 and roleid in (select roleid from userroles where loginid = $id and rolestatus = 1 and status = 1)");
		//$stmt = $conn->prepare("SELECT roleid FROM userroles where status = 1 and loginid=$id");
		//echo "select roleid from roles where status = 1 and roleid in (select roleid from userroles where loginid = $id and rolestatus = 1 and status = 1)"; 
		$stmt->execute();
		$roles = array();
		while($data = $stmt->fetch()){
			array_push($roles, $data['roleid']);
		}
		return $roles;
	}
	function load_roles($conn, $id){
		$stmt = $conn->prepare("SELECT * FROM roles where status = 1 and if($id <> 0, roleid in ($id),roleid not in ($id))");
		//echo "SELECT * FROM roles where status = 1 and if($id <> 0, roleid in ($id),roleid not in ($id))";
		$stmt->execute();
		$data = $stmt->fetchall();
		return $data;
	}
	function load_submenu($conn, $roleid, $submenuid, $menuid, $status, $st){
		if(($roleid != 0 && $submenuid == 0 && $menuid == 0 && $st == 0))
			$prestmt = "select * from appssubmenu where if($status <> 0, status = $status, status = $status) and if($menuid<>0, menuid in ($menuid), menuid not in ($menuid)) and if($roleid <> 0, submenuid in (SELECT appsubmenuid from userrights where if($st <> 0, status = $st, status = 1) and if($roleid <> 0, roleid = $roleid, roleid <> $roleid)), submenuid not in ($submenuid))";
		else if(($roleid != 0 && $submenuid == 0 && $menuid == 0 && $st != 0))
			$prestmt = "select * from appssubmenu where if($status <> 0, status = $status, status = $status) and if($menuid<>0, menuid in ($menuid), menuid not in ($menuid)) and if($roleid <> 0, submenuid not in (SELECT appsubmenuid from userrights where if($st <> 0, status = $st, status = $st) and if($roleid <> 0, roleid = $roleid, roleid <> $roleid)), submenuid not in ($submenuid))";
		else
			$prestmt = "select * from appssubmenu where if($status <> 0, status = $status, status = $status) and if($menuid<>0, menuid in ($menuid), menuid not in ($menuid)) and if($roleid <> 0, submenuid not in (SELECT appsubmenuid from userrights where status = 1 and if($roleid <> 0, roleid = $roleid, roleid <> $roleid)), submenuid in ($submenuid))";
		//echo $prestmt;
		$stmt = $conn->prepare($prestmt);
		$stmt->execute();
		//$roles = array();
		$data = $stmt->fetchall();
		return $data;
	}
	function validatetext($value, $fieldname){
		$value = test_input($value);
		if($value == '')
		{
			return ucwords($fieldname) . " is empty<br />";
		}
		else return "";
	}
	function validatenumber($value, $fieldname){
		$value = (int)test_input($value);
		if(!is_numeric($value))
		{
			return ucwords($fieldname) . " is not a number<br />";
		}
		else return "";
	}
	function validateamount($value, $fieldname){
		$value = (float)test_input($value);
		if(!is_numeric($value))
		{
			return ucwords($fieldname) . " is not a number<br />";
		}
		else return "";
	}
	function validatesingledate($date, $fieldname){
		$comment = '';
		if(!is_array($date)){
			$date = date('Y-m-d', strtotime($date));
			if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)){
				$comment = '';
			}else{
				$comment = "$fieldname is not well formatted<br />";
			}
		}
		return $comment;
	}
	function validatedate($dates, $fieldnames){
		$comment = validatesingledate($dates, $fieldnames);
		if(is_array($dates) && is_array($fieldnames) && !empty($dates)){
			$comment = '';
			$sn = 0;
			foreach($dates as $date){
				$sn++;
				$comment = validatesingledate($date, $fieldnames[$sn]);
			}
		}
		return $comment;
	}
	function validatesingleemail($email, $fieldname){
		$comment = '';
		if(!is_array($email)){
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$comment = "Invalid email format<br />"; 
			}
		}
		return $comment;
	}
	function validateemail($emails, $fieldnames){
		$comment = validatesingleemail($emails, $fieldnames);
		if(!is_array($emails) && is_array($fieldnames) && !empty($emails)){
			$comment = '';
			$sn = 0;
			foreach($emails as $email){
				$sn++;
				$comment = validatesingleemail($email, $fieldnames[$sn]);
			}
		}
		return $comment;
	}
	function validatefile($array, $fieldname, $size, $extensionarray){
		$comment = '';
		array_walk_recursive($extensionarray,'lowercase');
		//print_r($array);
		if((int)$array['error'] > 0){
			$comment .= "$fieldname is empty<br />";
			return $comment;
		}
		if(!in_array(strtolower(end(explode(".", $array["name"]))), $extensionarray)){
			$comment .= "Allowable formats for $fieldname are " . implode(', ', $extensionarray) . ".<br />";
		}
		if ($array["size"] > $size) {
			$comment .= "$fieldname file is larger than " . (int)$size / 1064 . "kb<br />";
		}
		return $comment;
	}

	function membername($conn, $memid){
		if($memid !== ''){
			$sql = "SELECT concat_ws( ' ', sname, fname, mname) as membername FROM memberregister WHERE memid='$memid'";
			$stmt = $conn->query($sql);
			$getname = $stmt->fetch(PDO::FETCH_ASSOC);
			$member = $getname['membername'];
		}
		else{
			$member = '';
		}
		return $member;
				
	}	

	
?>			