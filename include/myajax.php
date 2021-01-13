<?php
	session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
    include_once('../include/portalfunctions.php');

    extract($_POST);

    if($dataname == 'searchmember'){
        $sql = "SELECT *, concat_ws( ' ', sname, fname, mname) as label , fname as first, sname as surn, mname as middle, memid as id, concat_ws( ' ', sname, fname, mname) as value, gender, title FROM memberregister WHERE concat_ws( ' ', sname, fname, mname) LIKE '%$valid%' AND memstatus = '1'";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = array();
        if($stmt->rowCount() > 0){
            foreach($result as $row){
                // $vals .= $row['label'];
                $data[] =  $row['label'];
            }   
        }
        echo json_encode($data);
	}

	if($dataname=='searchmem'){
		$sql = "SELECT *, concat_ws( ' ', sname, fname, mname) as label , fname as first, sname as surn, mname as middle, memid as id, concat_ws( ' ', sname, fname, mname) as value, gender, title FROM memberregister LEFT JOIN groupnames ON memberregister.groupid=groupnames.groupid WHERE concat_ws( ' ', sname, fname, mname) LIKE '%$valid%' AND memstatus = '1'";
        $stmt = $conn->query($sql);
		$data = array();
		
		if($stmt->rowCount() > 0){
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = array(
					'label' => $row['label'],
					'memid' => $row['memid'],
					'acctnumber' => $row['accountnumber'],
					'grpname' => $row['groupname'],
					'monthlysavings'  => number_format($row['monthlysavings']),
					'shareamount' => number_format($row['shareamount']),
				);
			}
		}
		echo json_encode($data);
	}
	
	//Get account number
	if($dataname == 'searchacct'){
        $sql = "SELECT *, concat_ws( ' ', sname, fname, mname) as label , fname as first, sname as surn, mname as middle, memid as id, concat_ws( ' ', sname, fname, mname) as value, gender, title FROM memberregister WHERE concat_ws( ' ', sname, fname, mname) = '$acctname' AND memstatus = '1'";
        $stmt = $conn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
		$data =  $result['accountnumber'];
		//$data['name'] = $row['label']; 
        echo $data;
	}	

    if($dataname=='showdetails'){
        $sql = "SELECT *, concat_ws( ' ', sname, fname, mname) as label , fname as first, sname as surn, mname as middle, memid as id, concat_ws( ' ', sname, fname, mname) as value, gender, title FROM memberregister WHERE memid = '$memid' AND memstatus = '1'";
		$stmt = $conn->query($sql);

		        
        while($reslt = $stmt->fetch(PDO::FETCH_ASSOC)){

		    //Get total savings
			$sql = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
			$stmt2 = $conn->query($sql);
			$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
			$totalsavings = $savings['totalsavings'];
			
			$data['totalsavings'] = (number_format($totalsavings, 2, ".", ","));

			//Get facility balance
			$sql2 = "SELECT SUM(balance) AS facilitybalance FROM `facilityregister` WHERE midno ='$memid'";
			$stmt3 = $conn->query($sql2);
			$getfacbalance = $stmt3->fetch(PDO::FETCH_ASSOC);
			$facbalance = $getfacbalance['facilitybalance'];
			$data['facbalance'] = (number_format($facbalance, 2, ".", ","));

			$currentbalance = (number_format(($totalsavings - $facbalance), 2, ".", ","));
			$data['currentbalance'] = $currentbalance;
			
			//Get share records
			$sharedetails = '';
			$sql4 = "SELECT *, SUM(amount) AS totshares, instruments.instrument AS instr FROM cashflowin
			LEFT JOIN instruments ON cashflowin.instrument=instruments.instrumentid
			LEFT JOIN banks ON cashflowin.docbank=banks.id WHERE incomesource='3' AND payerid='$memid'";
			$stmt4 = $conn->query($sql4);
			$sn = 1;
			while($getshares = $stmt4->fetch(PDO::FETCH_ASSOC)){
				$sharedetails .= '<tr>
										<td>'.$sn.'</td>
										<td>'.$getshares['docdate'].'</td>
										<td class="text-right">'.(number_format($getshares['amount'], 2, ".", ",")).'</td>
										<td>'.$getshares['receiptno'].'</td>
										<td>'.$getshares['receiptdate'].'</td>
										<td>'.$getshares['instr'].'</td>
										<td>'.$getshares['docref'].'</td>
										<td>'.$getshares['bankname'].'</td>
										<td>'.$getshares['purpose'].'</td>
									</tr>';
										$sn++;
					$sharedetailsfooter = '<tr>
											<td colspan="2"><h4>Total Share Amount</h4></td>
											<td style="align-left" class="text-right">'.(number_format($getshares['totshares'], 2, ".", ",")).'</td>
											<td colspan="6">'.''.'</td>
										</tr>';
			}
			$data['sharedetailsfooter'] = $sharedetailsfooter;

			//Get Current facilitytypes
			$currentfac = '';
			$sql5 = "SELECT * FROM facilityregister
			LEFT JOIN facilitytypes ON facilityregister.factypeid=facilitytypes.factypeid
			WHERE balance > 0 AND midno='$memid'  AND (facilitytypes.factypeid NOT IN (1,2,3,5))";
			$stmt5 = $conn->query($sql5);
			$sn = 1;
			while($getcurrfac = $stmt5->fetch(PDO::FETCH_ASSOC)){
				$currentfac .= '<tr>
										<td>'.$sn.'</td>
									<td>'.$getcurrfac['adate'].'</td>
									<td>'.$getcurrfac['approvaldate'].'</td>
									<td>'.$getcurrfac['facility'].'</td>
									<td>'.$getcurrfac['purpose'].'</td>
									<td>'.(number_format($getcurrfac['principal'], 2, ".", ",")).'</td>
									<td>'.$getcurrfac['period'].'</td>
									<td>'.(number_format($getcurrfac['interest'], 2, ".", ",")).'</td>
									<td>'.(number_format($getcurrfac['instalment'], 2, ".", ",")).'</td>
									<td>'.(number_format($getcurrfac['paid'], 2, ".", ",")).'</td>
									<td>'.(number_format($getcurrfac['balance'], 2, ".", ",")).'</td>
									<td>'.membername($conn, $getcurrfac['guaranto1']).'</td>
									<td>'.membername($conn,$getcurrfac['guaranto2']).'</td>
									</tr>';
									$sn++;
			}
			$data['currentfac'] = $currentfac;

			//Get facility history
			$fachistory = '';
			$sql6 = "SELECT * FROM `facilityregister`
			LEFT JOIN facilitytypes ON facilityregister.factypeid=facilitytypes.factypeid
			WHERE midno='$memid'  AND (facilitytypes.factypeid NOT IN (1,2,3,5))";
			$stmt6 = $conn->query($sql6);
			$sn = 1;
			while($getfachistory = $stmt6->fetch(PDO::FETCH_ASSOC)){
				$fachistory .= '<tr>
										<td>'.$sn.'</td>
									<td>'.$getfachistory['adate'].'</td>
									<td>'.$getfachistory['approvaldate'].'</td>
									<td>'.$getfachistory['facility'].'</td>
									<td>'.$getfachistory['purpose'].'</td>
									<td>'.(number_format($getfachistory['principal'], 2, ".", ",")).'</td>
									<td>'.$getfachistory['period'].'</td>
									<td>'.(number_format($getfachistory['interest'], 2, ".", ",")).'</td>
									<td>'.(number_format($getfachistory['instalment'], 2, ".", ",")).'</td>
									<td>'.(number_format($getfachistory['paid'], 2, ".", ",")).'</td>
									<td>'.(number_format($getfachistory['balance'], 2, ".", ",")).'</td>
									<td>'.membername($conn,$getfachistory['guaranto1']).'</td>
									<td>'.membername($conn,$getfachistory['guaranto2']).'</td>
									</tr>';
									$sn++;
			}
			$data['fachistory'] = $fachistory;

			//Get savings and withdrawal details
			$stmtofacct = '';
			
			$sql7 = "SELECT *, facilitytypes.facility AS facilityname FROM `memberpays`
			LEFT JOIN facilitytypes ON memberpays.factypeid=facilitytypes.factypeid
			WHERE memid='$memid' AND (facilitytypes.factypeid = '2' OR facilitytypes.factypeid= '5') ORDER BY id DESC";
			$stmt7 = $conn->query($sql7);
			$numrecs = $stmt7->rowCount(); //get total number of saving/withdrawal records
			$sn = 1;
			while($getstmtofacct = $stmt7->fetch(PDO::FETCH_ASSOC)){
				$stmtofacct .= '<tr>
									<td>'.$sn.'</td>
									<td>'.$getstmtofacct['paydate'].'</td>
									<td>'.(number_format($getstmtofacct['amount'], 2, ".", ",")).'</td>
									<td>'.$getstmtofacct['facilityname'].'</td>									  
									</tr>';
									$sn++;
				}
			$data['stmtofacct'] = $stmtofacct;
			$data['numrecs'] = $numrecs;

			$sql8 = "SELECT *, facilitytypes.facility AS facilityname FROM `memberpays`
			LEFT JOIN facilitytypes ON memberpays.factypeid=facilitytypes.factypeid
			WHERE memid='$memid' ORDER BY id DESC";
			$stmt8 = $conn->query($sql8);
			$numsavingrec = $stmt8->rowCount();
			$sn = 1;
			$montpays = '';
			while($getmontpays = $stmt8->fetch(PDO::FETCH_ASSOC)){
				$montpays .= '<tr>
								<td>'.$sn.'</td>
								<td>'.date('d-M-Y', strtotime($getmontpays['paydate'])).'</td>
								<td>'.(number_format($getmontpays['amount'], 2, ".", ",")).'</td>
								<td>'.$getmontpays['facilityname'].'</td>	
							</tr>';
							$sn++;
			}
			$data['montpays'] = $montpays;
			$data['numsavingrec'] = $numsavingrec;

			$sql9 = "SELECT * FROM `facilityregister` LEFT JOIN facilitytypes ON facilityregister.factypeid=facilitytypes.factypeid WHERE (guaranto1 OR guaranto2='$memid') AND (balance > 0) ORDER BY id DESC";
			$stmt9 = $conn->query($sql9);
			$guarantees = '';
			$totguarantrec = $stmt9->rowCount();
			$sn = 1;
			while($getguarantees = $stmt9->fetch(PDO::FETCH_ASSOC)){
				$guarantees .= '<tr>
									<td>'.$sn.'</td>
									<td>'.membername($conn,$getguarantees['midno']).'</td>
									<td>'.$getguarantees['approvaldate'].'</td>
									<td>'.$getguarantees['facility'].'</td>
									<td>'.(number_format($getguarantees['principal'], 2, ".", ",")).'</td>
									<td>'.(number_format($getguarantees['paid'], 2, ".", ",")).'</td>
									<td>'.(number_format($getguarantees['balance'], 2, ".", ",")).'</td>
									<td>';
									if($getguarantees['guaranto1'] == "$memid"){
										$guaranteedamt = (number_format($getguarantees['gamount1'], 2, ".", ","));
									}
									else if($getguarantees['guaranto2'] == "$memid"){
										$guaranteedamt = (number_format($getguarantees['gamount2'], 2, ".", ","));
									}

				$guarantees .=''.$guaranteedamt.'</td>									
								</tr>';
								$sn++;
			}
			$data['totguarantrec'] = $totguarantrec;
			$data['guarantees'] = $guarantees;

			$data['sharedetails'] = $sharedetails;
			$data['title'] = $reslt['title'];
			$data['surname'] = $reslt['sname'];
			$data['fname'] = $reslt['fname'];
			
			$data['mname'] = $reslt['mname'];
			$data['dob'] = $reslt['dob'];
			$data['gender'] = $reslt['gender'];
			$data['mstat'] = $reslt['mstat'];
			$data['nationality'] = $reslt['nationality'];
			$data['homeadd1'] = $reslt['homeadd1'];
			$data['homeadd2'] = $reslt['homeadd2'];
			$data['homeadd3'] = $reslt['homeadd3'];
			$data['homestate'] = $reslt['state'];
			$data['homecountry'] = $reslt['country'];
			$data['phoneno'] = $reslt['phoneno'];
			$data['email'] = $reslt['email'];
			$data['busnature'] = $reslt['busnature'];
			$data['busadd1'] = $reslt['busadd1'];
			$data['busadd2'] = $reslt['busadd2'];
			$data['busadd3'] = $reslt['busadd3'];
			$data['busstate'] = $reslt['busstate'];
			$data['buscountry'] = $reslt['buscountry'];
			$data['chyr'] = $reslt['chyr'];
			$data['wofbilvl'] = $reslt['wofbilevel'];
			$data['province'] = $reslt['province'];
			$data['district'] = $reslt['district'];
			$data['zone'] = $reslt['zone'];
			$data['wsflocation'] = $reslt['wsflocation'];
			$data['nkintitle'] = $reslt['nkintitle'];
			$data['nkinsname'] = $reslt['nkinsname'];
			$data['nkinfname'] = $reslt['nkinfname'];
			$data['nkinmname'] = $reslt['nkinmname'];
			$data['nkinrel'] = $reslt['nkinrel'];
			$data['nkadd1'] = $reslt['nkadd1'];
			$data['nkadd2'] = $reslt['nkadd2'];
			$data['nkadd3'] = $reslt['nkadd3'];
			$data['nkstate'] = $reslt['nkstate'];
			$data['nkcountry'] = $reslt['nkcountry'];
			$data['nkphoneno'] = $reslt['nkphoneno'];
			$data['nkemail'] = $reslt['nkemail'];
			$data['datejoin'] = $reslt['datejoin'];
			$data['monthlysavings'] = (number_format($reslt['monthlysavings'], 2, ".", ","));
			$data['accountnumber'] = $reslt['accountnumber'];
			$data['groupid'] = $reslt['groupid'];
			$data['shareamount'] = (number_format($reslt['shareamount'], 2, ".", ","));
			echo json_encode($data);
		}
        
	}

	if($dataname=='updatememberrec'){
		$error = '';
		$error .= validatetext($title, "Title");
		$error .= validatetext($sname, "Surname");
		$error .= validatetext($fname, "Firstname");
		$error .= validatetext($dob, "Date of birth");
		$error .= validatetext($gender, "Gender");
		$error .= validatetext($mstat, "Marital Status");
		$error .= validatetext($nationality, "Nationality");
		$error .= validatetext($add1, "Address1");
		$error .= validatetext($add2, "Address2");
		$error .= validatetext($town, "Town");
		$error .= validatetext($state, "State");
		$error .= validatetext($country, "Country");
		$error .= validatenumber($phoneno, "Phone Number");
		$error .= validatetext($email, "Email");
		$error .= validatetext($busnature, "Nature of Business");
		$error .= validatetext($busadd1, "Business Address1");
		$error .= validatetext($busadd2, "Business Address2");
		$error .= validatetext($bustown, "Business Town");
		$error .= validatetext($busstate, "Business State");
		$error .= validatetext($buscountry, "Business Country");
		$error .= validatetext($joinchurch, "Year when you joined the church");
		$error .= validatetext($wofbi, "Wofbi Level");
		$error .= validatetext($province, "Province");
		$error .= validatetext($district, "District");
		$error .= validatetext($zone, "Zone");
		$error .= validatetext($wsflocation, "Wsf Location");
		$error .= validatetext($nktitle, "Next of Kin Title");
		$error .= validatetext($nksname, "Next of Kin Surname");
		$error .= validatetext($nkfname, "Next of Kin Firstname");
		$error .= validatetext($nkrel, "Next of Kin Relation");
		$error .= validatetext($nkadd1, "Next of Kin Address1");
		$error .= validatetext($nkadd2, "Next of Kin Address2");
		$error .= validatetext($nktown, "Next of Kin Town");
		$error .= validatetext($nkstate, "Next of Kin State");
		$error .= validatetext($nkcountry, "Next of Kin Country");
		$error .= validatetext($nkphoneno, "Next of Kin Mobile number");
		$error .= validatetext($nkemail, "Next of Kin Email");
		$error .= validatetext($grpname, "Group Name");

		if($error == ''){
			$sql = "UPDATE memberregister SET `title`='$title',`sname`='$sname',`fname`='$fname',`mname`='$mname',`dob`='$dob',`gender`='$gender',`mstat`='$mstat',`nationality`='$nationality',`homeadd1`='$add1',`homeadd2`='$add2',`homeadd3`='$town',`state`='$state',`country`='$country',`phoneno`='$phoneno',`email`='$email',`busnature`='$busnature',`busadd1`='$busadd1',`busadd2`='$busadd2',`busadd3`='$bustown',`busstate`='$busstate',`buscountry`='$buscountry',`chyr`='$joinchurch',`wofbilevel`='$wofbi',`province`='$province',`district`='$district',`zone`='$zone',`wsflocation`='$wsflocation',`nkintitle`='$nktitle',`nkinsname`='$nksname',`nkinfname`='$nkfname',`nkinmname`='$nkmname',`nkinrel`='$nkrel',`nkadd1`='$nkadd1',`nkadd2`='$nkadd2',`nkadd3`='$nktown',`nkstate`='$nkstate',`nkcountry`='$nkcountry',`nkphoneno`='$nkphoneno',`nkemail`='$nkemail',`groupid`='$grpname' WHERE memid='$memid'";

			$upd = $conn->query($sql);
			if(isset($upd)){
				echo '<div class="alert alert-success">
					<h6>Member record updated successfully</h6>
					</div>';
			}
			else{
				echo '<div class="alert alert-danger">
				<h6>Operation Failed! Please try again</h6>
				</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger">
			<h5>'.$error.'</h5>
			</div>';
		}		
	}
	

	if($dataname=='save_member'){		
		
		$error = '';
		$error .= validatetext($title, "Title");
		$error .= validatetext($sname, "Surname");
		$error .= validatetext($fname, "Firstname");
		$error .= validatetext($dob, "Date of birth");
		$error .= validatetext($gender, "Gender");
		$error .= validatetext($mstat, "Marital Status");
		$error .= validatetext($nationality, "Nationality");
		$error .= validatetext($add1, "Address1");
		$error .= validatetext($add2, "Address2");
		$error .= validatetext($town, "Town");
		$error .= validatetext($state, "State");
		$error .= validatetext($country, "Country");
		$error .= validatenumber($phoneno, "Phone Number");
		$error .= validatetext($email, "Email");
		$error .= validatetext($busnature, "Nature of Business");
		$error .= validatetext($busadd1, "Business Address1");
		$error .= validatetext($busadd2, "Business Address2");
		$error .= validatetext($bustown, "Business Town");
		$error .= validatetext($busstate, "Business State");
		$error .= validatetext($buscountry, "Business Country");
		$error .= validatetext($joinchurch, "Year when you joined the church");
		$error .= validatetext($wofbi, "Wofbi Level");
		$error .= validatetext($province, "Province");
		$error .= validatetext($district, "District");
		$error .= validatetext($zone, "Zone");
		$error .= validatetext($wsf, "Wsf Location");
		$error .= validatetext($nktitle, "Next of Kin Title");
		$error .= validatetext($nksname, "Next of Kin Surname");
		$error .= validatetext($nkfname, "Next of Kin Firstname");
		$error .= validatetext($nkrel, "Next of Kin Relation");
		$error .= validatetext($nkadd1, "Next of Kin Address1");
		$error .= validatetext($nkadd2, "Next of Kin Address2");
		$error .= validatetext($nktown, "Next of Kin Town");
		$error .= validatetext($nkstate, "Next of Kin State");
		$error .= validatetext($nkcountry, "Next of Kin Country");
		$error .= validatetext($nkphoneno, "Next of Kin Mobile number");
		$error .= validatetext($nkemail, "Next of Kin Email");
		$error .= validatetext($datejoin, "Date of Registration");
		$error .= validateamount(str_replace(",","", $monthsave), "Monthly Savings");
		$error .= validatetext($accno, "Account Number");
		$error .= validatetext($grpname, "Group Name");
		$error .= validatetext($receiptno, "Receipt Number");
		$error .= validatetext($receiptdate, "Receipt Date");
		$error .= validatetext($regamount, "Registration Amount");
		$error .= validateamount(str_replace(",", "", $amount), "Registration Amount");
		$error .= validatetext($instrument, "Instrument");
		$error .= validatetext($refno, "Ref Number");
		$error .= validatetext($refdate, "Ref Date");
		$error .= validatetext($bank, "Bank");
		$error .= validatetext($remark, "Remarks");
		$error .= validatetext($receiptno1, "Share Amount Receipt Number");
		$error .= validatetext($receiptdate1, "Share Amount Receipt Date");
		$error .= validatetext($shareamt, "Share Amount");
		$error .= validateamount(str_replace(",", "", $shareamt), "Share Amount");
		$error .= validatetext($instrument1, "Share Amount Instrument");
		$error .= validatetext($refno1, "Share Amount Ref Number");
		$error .= validatetext($refdate1, "Share Amount Ref Date");
		$error .= validatetext($bank1, "Share Amount Ref Bank");
		$error .= validatetext($refremark, "Share Amount Ref Remarks");
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

			$nationality = strtoupper($nationality);
			$buscountry = strtoupper($buscountry);
			$country = strtoupper($country);
			$nkcountry = strtoupper($nkcountry);
			
			$stmt1 = $conn->prepare("INSERT INTO `memberregister`(`memid`, `title`, `sname`, `fname`, `mname`, `dob`, `gender`, `mstat`, `nationality`, `homeadd1`, `homeadd2`, `homeadd3`, `state`, `country`, `phoneno`, `email`, `busnature`, `busadd1`, `busadd2`, `busadd3`, `busstate`, `buscountry`, `chyr`, `wofbilevel`, `province`, `district`, `zone`, `wsflocation`, `nkintitle`, `nkinsname`, `nkinfname`, `nkinmname`, `nkinrel`, `nkadd1`, `nkadd2`, `nkadd3`, `nkstate`, `nkcountry`, `nkphoneno`, `nkemail`, `datejoin`, `monthlysavings`, `accountnumber`, `groupid`, `shareamount`, `memstatus`, `datecreated`, `officer`) VALUES ('$memid', '$title', '$sname', '$fname', '$mname', '". date('Y-m-d', strtotime($dob)) . "', '$gender', '$mstat', '$nationality', '$add1', '$add2', '$town', '$state', '$country', '$phoneno', '$email', '$busnature', '$busadd1', '$busadd2', '$bustown', '$busstate', '$buscountry', '$joinchurch', '$wofbi', '$province', '$district', '$zone', '$wsf', '$nktitle', '$nksname', '$nkfname', '$nkmname', '$nkrel', '$nkadd1', '$nkadd2', '$nktown', '$nkstate', '$nkcountry', '$nkphoneno', '$nkemail', '". date('Y-m-d', strtotime($datejoin)) . "', '" . str_replace(",", "", $monthsave) . "', '$accno', '$grpname', '" . str_replace(",", "", $shareamt) . "', '1', '" . date('Y-m-d H:i:s') . "', '" . $_SESSION['loginid'] . "')");
			//print_r($stmt1);
			$stmt1->execute();
			if($stmt1->rowCount() > 0){
				if(cashflowininsert($conn, 1, $receiptno, $receiptdate, $memid, $regamount, $instrument, $refno, $refdate, $bank) == true &&
				cashflowininsert($conn, 3, $receiptno1, $receiptdate1, $memid, $shareamt, $instrument1, $refno1, $refdate1, $bank1) == true ){
					echo '<div class="alert alert-success">
					<h6>New member added successfully</h6>
					</div>';
				}
				else{
					echo '<div class="alert alert-danger">
					<h6>Operation Failed! Please try again</h6>
					</div>';
				}
			}			
		}
		else{
			echo '<div class="alert alert-danger">
			<h5>'.$error.'</h5>
			</div>';
		}

	}

	//Add new facility
	if($dataname=='addnewfacility'){
		$error = '';
		$error .= validatetext($facilityname, "Facility");
		$error .= validatetext($facilityfee, "Facility Fee");
		$error .= validateamount(str_replace(",","", $facilityfee), "Facility Fee");
		if($error == ''){
			$sql = "SELECT * FROM facilitytypes WHERE facility = '$facilityname'";
			$result = $conn->query($sql);
			$getfacility = $result->fetch(PDO::FETCH_ASSOC);
			if($result->rowCount() > 0){
				if($getfacility['fstatus'] == 0){
					$facilityid = $getfacility['factypeid'];
					$stmt = $conn->prepare("UPDATE facilitytypes SET fstatus = '1' WHERE factypeid = '$facilityid'" );
					$stmt->execute();
					if(isset($stmt)){
						$err = '';
						$msg = '<div class="alert alert-success">
						<h6>Facility added</h6>
						</div>';
					}					
				}
				else{
					$err = 'error';
					$msg = '<div class="alert alert-danger">
					<h6>Facility already exists</h6>
					</div>';
				}
			}
			else{
				$stmt = $conn->prepare("INSERT INTO facilitytypes(facility, facilityfee, fstatus) values('$facilityname','" . str_replace(",","", $facilityfee) . "','1')");
				$stmt->execute();
				if(isset($stmt)){
					$err = '';
					$msg = '<div class="alert alert-success">
					<h6>New facility added successfully</h6>
					</div>';
				}
				else{
					$err = 'error';
					$msg = '<div class="alert alert-danger">
					<h6>Operation Failed! Please try again</h6>
					</div>';
				}
			}			
		}
		else{
			$err = 'error';
			$msg = '<div class="alert alert-danger">
			<h5>'.$error.'</h5>
			</div>';
		}
		$data['err'] = $err;
		$data['msg'] = $msg;
		echo json_encode($data);
	}

	//Update Existing facilities
	if($dataname=='updatefacility'){
		$error = '';
		$error .= validatetext($facilityid, "Facility");
		$error .= validatetext($facility, "Facility");
		$error .= validateamount(str_replace(",","", $facilityfee), "Facility Fee");
		if($error === ''){
			$sql = "SELECT * FROM facilitytypes WHERE facility='$facility'";
			$stmt = $conn->query($sql);
			if($stmt->rowCount() > 0){
				echo 'Facility Name Already Exists';
			}
			else{
				$stmt = $conn->prepare("update facilitytypes set facilityfee = '" . str_replace(',','', $facilityfee) . "', facility = '$facility' where factypeid = '$facilityid'" );
				$stmt->execute();
				if(isset($stmt)){
					echo 'Facility updated successfully';
				}
				else{
					echo 'Operation Failed! Please try again';
				}
			}
			
		}
		else{
			echo "$error";
		}
	}

	//Delete existing facility
	if($dataname=='deletefacility'){
		//Check if facilityid has been used
		$sql = "SELECT * FROM cashflowin WHERE incomesource = '$facilityid'";
		$status = $conn->query($sql);

		$sql2 = "SELECT * FROM cashflowout WHERE facilityno = '$facilityid'";
		$status2 = $conn->query($sql2);

		$sql3 = "SELECT * FROM facilityregister WHERE factypeid = '$facilityid'";
		$status3 = $conn->query($sql3);

		$sql4 = "SELECT * FROM mdeduction1 WHERE facilityid = '$facilityid'";
		$status4 = $conn->query($sql4);

		$checkarr = array(1, 2, 3, 5);

		if(($status->rowCount() > 0) || ($status2->rowCount() > 0) || ($status3->rowCount() > 0) || ($status4->rowCount() > 0) || in_array($facilityid, $checkarr)){
			echo 'This Facility is in use and cannot be deleted';
		}
		else{
			$sql = "DELETE FROM facilitytypes WHERE factypeid='$facilityid'";
			$stmt = $conn->query($sql);
			
			if(isset($stmt)){
				echo 'Facility Deleted Successfully';
			}
			else{
				echo 'Operation Failed! Please try again';
			}
		}
	}

	if($dataname == 'get_facilities' ){
		$sql = "SELECT * FROM facilitytypes WHERE fstatus != 0";
		$stmt = $conn->query($sql);
		$tables = array();

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$tables[] = array(
				'factypeid' => $row['factypeid'],
				'facility' => $row['facility'],
				'facilityfee' => $row['facilityfee'],
			);
		}
		
		echo json_encode($tables);		
	}

	//Run Monthly Deduction
	if($dataname=='getmonthlydeduction'){
		$sql1 = "TRUNCATE TABLE mdeduction1";
		$stmt = $conn->query($sql1);
		$sql = "INSERT INTO mdeduction1(memid,membername,bacctno,amt,factypeid, facno)
		SELECT  memlst.memid AS memid, concat_ws( ' ', sname, fname, mname) AS membername, memlst.accountnumber, memlst.monthlysavings AS mpay, 2 AS factypeid, 0 as facno 
		FROM memlst where memlst.monthlysavings > 0 
		UNION
		SELECT facilityregister.midno AS memid, concat_ws( ' ', sname, fname, mname) AS membername, memberregister.accountnumber,
		if(facilityregister.balance >= facilityregister.instalment, facilityregister.instalment, 
		if(facilityregister.balance < facilityregister.instalment, facilityregister.balance,0)) AS mpay, facilityregister.factypeid,
		facilityregister.facno as facno
		FROM facilityregister  join memberregister
		on memberregister.memid = facilityregister.midno 
		where facilityregister.balance> 0";
		$result = $conn->query($sql);
		
		$sql2 = "SELECT md.memid, md.membername, md.bacctno, fa.factypeid, md.facno, sum(md.amt) as amount FROM mdeduction1 as md
		LEFT JOIN facilitytypes as fa ON md.factypeid=fa.factypeid WHERE fa.factypeid NOT IN (1,3,5)
		GROUP BY md.memid";
		$stmt2 = $conn->query($sql2);
		$totalrecs = $stmt2->rowCount();
		
		$sn = 1;
		$tbl = '<table id="mdeductiontbl" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>S/N</th>
				<th>Member Name</th>
				<th>Account Number</th>
				<th>Total Deductions (Individual)</th>';
				$sq = "SELECT * FROM facilitytypes WHERE factypeid NOT IN (1,3,5)";
				$stmt = $conn->query($sq);
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($results as $cols){
					$tbl .= '<th>'.$cols['facility'].'</th>';
				}
			$tbl .= '</tr>
		</thead>
		<tbody>';
		while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
			$memid = $row['memid'];			
			$tbl .= '<tr>
						<td>'.$sn.'</td>
						<td>'.$row['membername'].'</td>
						<td>'.$row['bacctno'].'</td>
						<td>'.number_format($row['amount'], 2, ".", ",").'</td>';
						foreach($results as $cols){
							$factypeid = $cols['factypeid'];
							$sql3 = "SELECT amt FROM mdeduction1 WHERE memid='$memid' AND ( factypeid='$factypeid' AND factypeid NOT IN (1,3,5))";
							$getamt = $conn->query($sql3);
							$amts = $getamt->fetch(PDO::FETCH_ASSOC);
							$tbl .= '<td>';
							if(!empty($amts['amt'])){
								$tbl .= number_format($amts['amt'], 2, ".", ",");
							}
							$tbl .= '</td>';
						}
					$tbl .= '</tr>';	
					 $sn++;		
		}

		$sql4 = "SELECT SUM(amt) AS total FROM mdeduction1 WHERE factypeid NOT IN (1,3,5)";
		$rest = $conn->query($sql4);
		$gettotal = $rest->fetch(PDO::FETCH_ASSOC);
		$totalamt = $gettotal['total'];

		$tbl .= '</tbody><tfoot><tr class="lead"><td colspan="3" class="text-right"><span >Total Deductions</span></td>
		<td>'.number_format($totalamt, 2, ".", ",").'</td>';
		foreach($results as $cols){
			$factypeid = $cols['factypeid'];
			$sql3 = "SELECT SUM(amt) AS total FROM mdeduction1 WHERE factypeid='$factypeid' AND factypeid NOT IN (1,3,5)";
			$getamt = $conn->query($sql3);
			$amts = $getamt->fetch(PDO::FETCH_ASSOC);
			$tbl .= '<td>';
			if(!empty($amts['total'])){
				$tbl .= number_format($amts['total'], 2, ".", ",");
			}
			$tbl .= '</td>';
		}
		$tbl .= '</tr></tfoot>
				</table>';
		
		$upd = "UPDATE rptmonth SET deductionstatus=1";
		$conn->query($upd);

		$data['tbl'] = $tbl;
		$data['totalrecs'] = $totalrecs;
		$data['totalamt'] = number_format($totalamt, 2, ".", ",");
		echo json_encode($data);
	}
	

	//Edit Monthly Deduction
	if($dataname=='getusermontdeduction'){
		$sql = "SELECT md.memid, md.id, md.membername, md.bacctno, fa.factypeid, md.facno, sum(md.amt) as amount FROM mdeduction1 as md
		LEFT JOIN facilitytypes as fa ON md.factypeid=fa.factypeid WHERE (md.memid='$id' AND fa.factypeid NOT IN (1,3,5))
		GROUP BY md.memid";
		$result = $conn->query($sql);

		$tbl = '<table id="mdeductiontbl" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Member Name</th>
				<th>Account Number</th>
				<th>Total Deduction</th>';
				$sq = "SELECT * FROM facilitytypes WHERE factypeid NOT IN (1,3,5)";
				$stmt = $conn->query($sq);
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($results as $cols){
					$tbl .= '<th>'.$cols['facility'].'</th>';
				}
			$tbl .= '</tr>
		</thead>
		<tbody>';

		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tbl .= '<tr>
						<td>'.$row['membername'].'</td>
						<td>'.$row['bacctno'].'</td>
						<td><input type="text" id="total_deduct" value="'.number_format($row['amount']).'" disabled></td>';
						foreach($results as $cols){
							$factypeid = $cols['factypeid'];
							$sql3 = "SELECT amt,factypeid,id FROM mdeduction1 WHERE memid='$id' AND ( factypeid='$factypeid' AND factypeid NOT IN (1,3,5))";
							$getamt = $conn->query($sql3);
							$amts = $getamt->fetch(PDO::FETCH_ASSOC); 
							$tbl .= '<td>';
							if(!empty($amts['amt'])){
								$tbl .= '<input type="text" value="'.number_format($amts['amt']).'" id="'.$amts['id'].'" class="editamt">';
							}
							$tbl .= '</td>';
						}
					$tbl .= '</tr>';
		}

		$tbl .= '</tbody>
			</table>';
		$data['tbl'] = $tbl;
		echo json_encode($data);

	}

	//Update Individual Monthly Deductions
	if($dataname=='updatememdeduction'){
		$deduct_edit = json_decode($deductedit, true);
		$success = 0;
		foreach($deduct_edit as $vals){
			$id = $vals['col1'];
			$amt = $vals['col2'];
			if(!empty($id) && !empty($amt)){
				// $ans .= 'It exists '.$id.' and '.$amt.'<br>';
				$amount = str_replace(",", "", $amt);
				$sql = "UPDATE mdeduction1 SET amt='$amount' WHERE id='$id'";
				$upd = $conn->query($sql);
				$success++;
			}
		}
		if($success > 0){
			$msg = '<div class="alert alert-success">
			<h6>Record updated successfully</h6>
			</div>';
		}
		else{
			$msg = '<div class="alert alert-danger">
			<h6>Operation Failed! Please try again</h6>
			</div>';
		}
		$data['msg'] = $msg;
		echo json_encode($data);
	}

	//View Monthly Deductions
	if($dataname=='viewmonthdeduction'){
		
		$sql2 = "SELECT md.memid, md.membername, md.bacctno, fa.factypeid, md.facno, sum(md.amt) as amount FROM mdeduction1 as md
		LEFT JOIN facilitytypes as fa ON md.factypeid=fa.factypeid WHERE fa.factypeid NOT IN (1,3,5)
		GROUP BY md.memid";
		$stmt2 = $conn->query($sql2);
		$totalrecs = $stmt2->rowCount();
		
		$sn = 1;
		$tbl = '<table id="mdeductiontbl" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>S/N</th>
				<th>Member Name</th>
				<th>Account Number</th>
				<th>Total Deductions (Individual)</th>';
				$sq = "SELECT * FROM facilitytypes WHERE factypeid NOT IN (1,3,5)";
				$stmt = $conn->query($sq);
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($results as $cols){
					$tbl .= '<th>'.$cols['facility'].'</th>';
				}
			$tbl .= '</tr>
		</thead>
		<tbody>';
		while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
			$memid = $row['memid'];			
			$tbl .= '<tr>
						<td>'.$sn.'</td>
						<td>'.$row['membername'].'</td>
						<td>'.$row['bacctno'].'</td>
						<td>'.number_format($row['amount'], 2, ".", ",").'</td>';
						foreach($results as $cols){
							$factypeid = $cols['factypeid'];
							$sql3 = "SELECT amt FROM mdeduction1 WHERE memid='$memid' AND ( factypeid='$factypeid' AND factypeid NOT IN (1,3,5))";
							$getamt = $conn->query($sql3);
							$amts = $getamt->fetch(PDO::FETCH_ASSOC);
							$tbl .= '<td>';
							if(!empty($amts['amt'])){
								$tbl .= number_format($amts['amt'], 2, ".", ",");
							}
							$tbl .= '</td>';
						}
					$tbl .= '</tr>';	
					 $sn++;		
		}

		$sql4 = "SELECT SUM(amt) AS total FROM mdeduction1 WHERE factypeid NOT IN (1,3,5)";
		$rest = $conn->query($sql4);
		$gettotal = $rest->fetch(PDO::FETCH_ASSOC);
		$totalamt = $gettotal['total'];

		$tbl .= '</tbody><tfoot><tr class="lead"><td colspan="3" class="text-right"><span >Total Deductions</span></td>
		<td>'.number_format($totalamt, 2, ".", ",").'</td>';
		foreach($results as $cols){
			$factypeid = $cols['factypeid'];
			$sql3 = "SELECT SUM(amt) AS total FROM mdeduction1 WHERE factypeid='$factypeid' AND factypeid NOT IN (1,3,5)";
			$getamt = $conn->query($sql3);
			$amts = $getamt->fetch(PDO::FETCH_ASSOC);
			$tbl .= '<td>';
			if(!empty($amts['total'])){
				$tbl .= number_format($amts['total'], 2, ".", ",");
			}
			$tbl .= '</td>';
		}
		$tbl .= '</tr></tfoot>
				</table>';
		

		

		$data['tbl'] = $tbl;
		$data['totalrecs'] = $totalrecs;
		$data['totalamt'] = number_format($totalamt, 2, ".", ",");
		echo json_encode($data);
	}

	//Run Monthly Deductions Distribution
	if($dataname=='runmonthlydistribution'){
		$sql = "INSERT INTO memberpays (memid, amount, factypeid, facno, paydate, year_mont, entrydate, userr) 
		SELECT mdeduction1.memid, mdeduction1.amt as amount, mdeduction1.factypeid, mdeduction1.facno, 
		rptmonth.montend as paydate, rptmonth.year_mont, NOW() as entrydate, '$userid' as userr
		FROM mdeduction1, rptmonth";
		$insert = $conn->query($sql);

		$sql2 = "UPDATE facilityregister INNER JOIN mdeduction1
		ON facilityregister.facno=mdeduction1.facno
		SET facilityregister.paid=facilityregister.paid+mdeduction1.amt, 
		facilityregister.balance=facilityregister.balance-mdeduction1.amt";
		$upd = $conn->query($sql2);

		if(isset($insert) && isset($upd)) {
			$sql3 = "SELECT * FROM rptmonth";
			$result = $conn->query($sql3);
			$row = $result->fetch(PDO::FETCH_ASSOC);
			$montnumber = $row['montnumber'];
			$year = substr($row['year_mont'], 0, 4);
			$newmont = '';

			// $montnumber == 12 ? $newmont = 1 : $newmont += $montnumber;
			if($montnumber == 12) {
				$newmont = '01';
				$year++;
			}
			else {
				$mont = (int)$montnumber;
				$mont++;
				$newmont = sprintf("%02d", $mont);
			}
			
			$new_dt = $year.'-'.$newmont;
			$montstat = date("Y-m-01", strtotime($new_dt));
			$montend = date("Y-m-t", 	strtotime($new_dt));
			
			// Create date object to store the DateTime format 
			$dateObj = DateTime::createFromFormat('!m', $newmont); 
		
			// Store the month name to variable 
			$monthName = $dateObj->format('F');

			$year_mont = $year.'_'.$newmont;

			$sq = "UPDATE rptmonth SET montnumber='$newmont', monthname='$monthName', montstat='$montstat', montend='$montend', year_mont='$year_mont', deductionstatus=0";
			$conn->query($sq);

			echo 'Monthly Deduction Successfully Distributed';
		}
		else {
			echo 'Something went wrong! Please try again';
		}
	}

	if($dataname=='getindividualmontdistribution'){
		$sql = "SELECT md.memid, md.id, md.membername, md.bacctno as acctno, fa.factypeid, md.facno, SUM(md.amt) as amount FROM mdeduction1 as md
		LEFT JOIN facilitytypes as fa ON md.factypeid=fa.factypeid WHERE (md.memid='$id' AND fa.factypeid NOT IN (1,3,5))
		GROUP BY md.memid";
		$result = $conn->query($sql);
		$row = $result->fetch(PDO::FETCH_ASSOC);

		$sq = "SELECT * FROM facilitytypes WHERE factypeid NOT IN (1,3,5)";
		$stmt = $conn->query($sq);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$membername = $row['membername'];
		$acctno = $row['acctno'];

		$tbl = '<table id="mdeductiontbl" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="2"><h4>'.$membername.'</h4></th>
				<th colspan="2"<h4> Account Number: '.$acctno.'</h4></th>
			</tr>
			<tr>
				<th>Facility</th>
				<th>Amount To Be Deducted</th>
				<th>Edit</th>
				<th>Select</th>
			</tr>
		</thead>
		<tbody>';

		

		foreach($results as $cols){		
			$factypeid = $cols['factypeid'];
			$sql3 = "SELECT amt,factypeid,id FROM mdeduction1 WHERE memid='$id' AND ( factypeid='$factypeid' AND factypeid NOT IN (1,3,5))";
			$getamt = $conn->query($sql3);
			$amts = $getamt->fetch(PDO::FETCH_ASSOC); 
						
			if(!empty($amts['amt'])){
				$tbl .= '<tr>
						<td>'.$cols['facility'].'</td>
					 	<td><input type="text" value="'.number_format($amts['amt']).'" id="'.$amts['id'].'" class="amount number" disabled></td>
					 	<td><button id="edit'.$amts['id'].'" class="editamt">Edit</button>
					 	</td>
					 	<td><input type="checkbox" id="check'.$amts['id'].'" class="checkamt">
				        </td>
					</tr>';
			}
		}

		$tbl .= '</tbody>
				<tfoot>
					<tr>
						<td class="text-right"><strong>Total</strong></td>
						<td colspan="3"><input type="text" id="totalamt" value="'.number_format($row['amount']).'" disabled></td>
					</tr>
				</tfoot>
			</table>';
		$data['tbl'] = $tbl;
		echo json_encode($data);
	}

	if($dataname=='updateindividualmdeduction') {
		$count = 0;
		$arr = json_decode($arr, true);
		foreach($arr as $values){
			$id = $values['col1'];
			$amt = str_replace(",", "", $values['col2']);
			$sql = "INSERT INTO mdeduction2 (memid, membername, bacctno, amt, factypeid, facno) SELECT memid, membername, bacctno, '$amt', factypeid, facno FROM mdeduction2 WHERE id='$id'";
			$result = $conn->query($sql);
			$count++;
		}
		if(isset($result)) {
			$sql = "INSERT INTO memberpays (memid, amount, factypeid, facno, paydate, year_mont, entrydate, userr) 
			SELECT mdeduction2.memid, mdeduction2.amt as amount, mdeduction2.factypeid, mdeduction2.facno, 
			rptmonth.montend as paydate, rptmonth.year_mont, NOW() as entrydate, '$userid' as userr
			FROM mdeduction2, rptmonth";
			$insert = $conn->query($sql);

			$sql2 = "UPDATE facilityregister INNER JOIN mdeduction2
			ON facilityregister.facno=mdeduction2.facno
			SET facilityregister.paid=facilityregister.paid+mdeduction2.amt, 
			facilityregister.balance=facilityregister.balance-mdeduction2.amt";
			$upd = $conn->query($sql2);

			if(isset($insert) && isset($upd)) {
				echo "<div class='alert alert-success'>
					</h6>$count records updated</h6>
				</div>";
			}
			else {
				echo "<div class='alert alert-danger'>
						</h6>Error! Please try agaon later</h6>
					</div>";
			}
			
		}
		else {
			echo '<div class="alert alert-danger">
					<h6>Operation Failed! Please try again</h6>
				</div>';
		}
		
	}

	if($dataname=='getinterest') {
		$sql = "SELECT * FROM facilitytypes WHERE factypeid='$facid'";
		$stmt = $conn->query($sql);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
		$data['interest'] = $row['interest_rate'];
		$data['maxperiod'] = $row['max_period'];
		$data['maxamount'] = $row['max_amount'];
		$data['facilityfee'] = $row['facilityfee'];
		echo json_encode($data);
	}

	if($dataname=='savefacilityreg') {		
		$error = '';
		$error .= validatetext($memid, "Member");
		$error .= validatetext($facilitytype, "Facility");
		$error .= validatetext($loanamount, "Loan Amount");
		$error .= validatetext($periodinmnths, "Loan Period");
		$error .= validatetext($purpose, "Reason for loan");
		$error .= validatetext($guarantor1id, "Guarantor 1");
		$error .= validatetext($gamount1, "Guarantor 1 amount");
		$error .= validatetext($guarantor2id, "Guarantor 2");
		$error .= validatetext($gamount2, "Guarantor 2 amount");
		$error .= validatetext($witnessid, "Witness");
		$error .= validatetext($appfee, "Application Fee");
		$error .= validatetext($receiptno, "Receipt Number");
		$error .= validatetext($receiptdate, "Receipt Date");
		$error .= validatetext($instrument, "Instrument");
		$error .= validatetext($refno, "Reference Number");
		$error .= validatetext($refdate, "Reference Date");
		$error .= validatetext($bank, "Bank");
		$error .= validatetext($remark, "Remark");

		if($error == ''){
			$principal = str_replace(",", "", $loanamount);
			//Check if there's an existing facility for the user
			$sql = "SELECT * FROM facilityregister WHERE factypeid='$facilitytype' AND (midno='$memid' AND balance > 0)";
			$result = $conn->query($sql);
			$recordcount = $result->rowCount();
			$row = $result->fetch(PDO::FETCH_ASSOC);
			$approved = $row['approvedby'];

			//Check if there's a facility that's yet to be approved
			// $sq = "SELECT * FROM facilityregister WHERE factypeid='$facilitytype' AND ((midno='$memid') AND (approvedby IN ('pending', '')))";
			// $rest = $conn->query($sq);
			

			//Get user savings 
			$sql2 = "SELECT SUM(amount) AS savings FROM memberpays WHERE memid='$memid'";
			$result2 = $conn->query($sql2);
			$row2 = $result2->fetch(PDO::FETCH_ASSOC);
			$savings = $row2['savings'];


			if ( ($recordcount > 0) && ($approved == '')) {
				$msg = "<div class='alert alert-danger'>
						</h5>You have this same facility that is yet to be approved</h5>
					</div>";
				$err = 'error';
				$data['msg'] = $msg;
				$data['err'] = $err;
				echo json_encode($data);
				exit;
			}
			elseif ($recordcount > 0) {
				$msg = "<div class='alert alert-danger'>
						</h5>You have this same facility running</h5>
					</div>";
				$err = 'error';
				$data['msg'] = $msg;
				$data['err'] = $err;
				echo json_encode($data);
				exit;
			}
			elseif ($principal > ($savings * $max_amount)) {
				$msg = "<div class='alert alert-danger'>
						</h5>The requested amount exceeds your current eligible maximum of ".number_format($savings * $max_amount)." </h5>
					</div>";
				$err = 'error';
				$data['msg'] = $msg;
				$data['err'] = $err;
				echo json_encode($data);
				exit;
			}
			else {				
				$interest = ($interestrate * 0.01) * $principal;
				$instalment = ($principal + $interest) / $periodinmnths;
				$today = date("Y-m-d H:i:s");
				$paid = 0;
				$stmt=$conn->prepare("INSERT INTO facilityregister (factypeid, midno, adate, principal, period, interest, instalment, purpose, paid, balance, guaranto1, gamount1, guaranto2, gamount2, witness) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->bindParam(1, $facilitytype, PDO::PARAM_STR);
				$stmt->bindParam(2, $memid, PDO::PARAM_STR);
				$stmt->bindParam(3, $today, PDO::PARAM_STR);
				$stmt->bindParam(4, $principal, PDO::PARAM_STR);
				$stmt->bindParam(5, $periodinmnths, PDO::PARAM_STR);
				$stmt->bindParam(6, $interest, PDO::PARAM_STR);
				$stmt->bindParam(7, $instalment, PDO::PARAM_STR);
				$stmt->bindParam(8, $purpose, PDO::PARAM_STR);
				$stmt->bindParam(9, $paid, PDO::PARAM_STR);
				$stmt->bindParam(10, $principal, PDO::PARAM_STR);
				$stmt->bindParam(11, $guarantor1id, PDO::PARAM_STR);
				$stmt->bindParam(12, str_replace(",", "", $gamount1), PDO::PARAM_STR);
				$stmt->bindParam(13, $guarantor2id, PDO::PARAM_STR);
				$stmt->bindParam(14, str_replace(",", "", $gamount2), PDO::PARAM_STR);
				$stmt->bindParam(15, $witnessid, PDO::PARAM_STR);
				$stmt->execute();


				$stmt2 = $conn->prepare("INSERT INTO cashflowin (receiptno, receiptdate, payerid, amount, incomesource, instrument, docref, docdate, docbank, purpose, userr, udate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt2->bindParam(1, $receiptno, PDO::PARAM_INT);
				$stmt2->bindParam(2, $receiptdate, PDO::PARAM_STR);
				$stmt2->bindParam(3, $memid, PDO::PARAM_STR);
				$stmt2->bindParam(4, str_replace(",", "", $appfee), PDO::PARAM_STR);
				$stmt2->bindParam(5, $facilitytype, PDO::PARAM_INT);
				$stmt2->bindParam(6, $instrument, PDO::PARAM_INT);
				$stmt2->bindParam(7, $refno, PDO::PARAM_STR);
				$stmt2->bindParam(8, $refdate, PDO::PARAM_STR);
				$stmt2->bindParam(9, $bank, PDO::PARAM_STR);
				$stmt2->bindParam(10, $remark, PDO::PARAM_STR);
				$stmt2->bindParam(11, $userid, PDO::PARAM_STR);
				$stmt2->bindParam(12, $today, PDO::PARAM_STR);
				$stmt2->execute();

			
				if( (isset($stmt)) && (isset($stmt2)) ) {
					$msg = "<div class='alert alert-success'>
							</h5>Facility requested successfully</h5>
						</div>";
					$err = '';
					$data['msg'] = $msg;
					$data['err'] = $err;
					echo json_encode($data);
				}
				else {
					$msg =  "<div class='alert alert-danger'>
						</h5>Operation Failed! Please try again</h5>
					</div>";
					$err = 'error';
					$data['msg'] = $msg;
					$data['err'] = $err;
					echo json_encode($data);
				}
			}
		}
		else {
			$msg = "<div class='alert alert-danger'>
						</h5>".$error."</h5>
					</div>";
			$err = 'error';
			$data['msg'] = $msg;
			$data['err'] = $err;
			echo json_encode($data);
		}
		
	}

	if ($dataname == 'checkrecpno') {
		$sql = "SELECT * FROM cashflowin where receiptno = '$receiptno'";
		$result = $conn->query($sql);
		if($result->rowCount() > 0) {
			echo "This receipt number already exists";
		}
	}

	if($dataname == 'checkrefno') {
		$sql = "SELECT * FROM cashflowin where docref = '$refno'";
		$result = $conn->query($sql);

		$sql2 = "SELECT * FROM cashflowout WHERE docref = '$refno'";
		$result2 = $conn->query($sql2);

		if ( ($result->rowCount() > 0) || ($result2->rowCount() > 0)) {
			echo "This entry already exists";
		}
	}

	if( $dataname == 'updatesavings') {
		$error = '';
		$error .= validatetext($memid, "Name");
		$error .= validatetext($prpsavingsamt, "Proposed Savings Amount");
		$error .= validatetext($commencedate, "Date");
		$error .= validatetext($receiptno, "Receipt No");
		$error .= validatetext($receiptdate, "Receipt Date");
		$error .= validatetext($instrument, "Instrument");
		$error .= validatetext($refno, "Ref Number");
		$error .= validatetext($refdate, "Ref Date");
		$error .= validatetext($bank, "Ref bank");
		$error .= validatetext($remark, "Remarks");
		if($error == '') {
			$today = date('Y-m-d H:i:s');
			$stmt = $conn->prepare("INSERT INTO savingsincrement (memid, presentsavings, proposedsavings, receiptno, instrument, refno, refdate, officer, entrydate) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $memid, PDO::PARAM_STR);
			$stmt->bindParam(2, str_replace(",", "", $prsntsavingsamt), PDO::PARAM_STR);
			$stmt->bindParam(3, str_replace(",", "", $prpsavingsamt), PDO::PARAM_STR);
			$stmt->bindParam(4, $receiptno, PDO::PARAM_STR);
			$stmt->bindParam(5, $instrument, PDO::PARAM_INT);
			$stmt->bindParam(6, $refno, PDO::PARAM_STR);
			$stmt->bindParam(7, $refdate, PDO::PARAM_STR);
			$stmt->bindParam(8, $userid, PDO::PARAM_STR);
			$stmt->bindParam(9, $today, PDO::PARAM_STR);
			$stmt->execute();

			$sql = "SELECT * FROM `facilitytypes` WHERE facility LIKE '%Savings'";
			$reslt = $conn->query($sql);
			$row = $reslt->fetch(PDO::FETCH_ASSOC);
			$appfee = $row['facilityfee'];
			$facilitytype = $row['factypeid'];

			$stmt2 = $conn->prepare("INSERT INTO cashflowin (receiptno, receiptdate, payerid, amount, incomesource, instrument, docref, docdate, docbank, purpose, userr, udate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt2->bindParam(1, $receiptno, PDO::PARAM_INT);
			$stmt2->bindParam(2, $receiptdate, PDO::PARAM_STR);
			$stmt2->bindParam(3, $memid, PDO::PARAM_STR);
			$stmt2->bindParam(4, str_replace(",", "", $appfee), PDO::PARAM_STR);
			$stmt2->bindParam(5, $facilitytype, PDO::PARAM_INT);
			$stmt2->bindParam(6, $instrument, PDO::PARAM_INT);
			$stmt2->bindParam(7, $refno, PDO::PARAM_STR);
			$stmt2->bindParam(8, $refdate, PDO::PARAM_STR);
			$stmt2->bindParam(9, $bank, PDO::PARAM_STR);
			$stmt2->bindParam(10, $remark, PDO::PARAM_STR);
			$stmt2->bindParam(11, $userid, PDO::PARAM_STR);
			$stmt2->bindParam(12, $today, PDO::PARAM_STR);
			$stmt2->execute();

			$newamt = str_replace(",", "",$prpsavingsamt);
			$upd = "UPDATE memberregister SET monthlysavings='$newamt' WHERE memid='$memid'";
			$update = $conn->query($upd);

			if( isset($stmt) && isset($stmt2) && isset($update)) {
				$msg = "<div class='alert alert-success'>
								</h5>Record Updated Successfully</h5>
							</div>";
				$err = '';
				$data['msg'] = $msg;
				$data['err'] = $err;
				echo json_encode($data);
			}
			else {
				$msg = "<div class='alert alert-danger'>
								</h5>Operation Failed Please try again</h5>
							</div>";
				$err = 'error';
				$data['msg'] = $msg;
				$data['err'] = $err;
				echo json_encode($data);
			}
		}
		else{
			$msg = "<div class='alert alert-danger'>
			</h5>".$error."</h5>
			</div>";
			$err = 'error';
			$data['msg'] = $msg;
			$data['err'] = $err;
			echo json_encode($data);	
		}
		
	

	}
	
	if($dataname=='updateshareamt') {
		// print_r($_POST);
		$error = '';
		$error .= validatetext($memid, "Name");
		$error .= validatetext($prsntshramt, "Proposed Share Amount");
		$error .= validatetext($commencedate, "Date");
		$error .= validatetext($receiptno, "Receipt No");
		$error .= validatetext($receiptdate, "Receipt Date");
		$error .= validatetext($instrument, "Instrument");
		$error .= validatetext($refno, "Ref Number");
		$error .= validatetext($refdate, "Ref Date");
		$error .= validatetext($bank, "Ref bank");
		$error .= validatetext($remark, "Remarks");
		if($error == '') {
			$today = date('Y-m-d H:i:s');
			$stmt = $conn->prepare("INSERT INTO shareincrement (memid, presentshare, proposedshare, receiptno, receiptdate, instrument, refno, refdate, officer, entrydate) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $memid, PDO::PARAM_STR);
			$stmt->bindParam(2, str_replace(",", "", $prsntshramt), PDO::PARAM_STR);
			$stmt->bindParam(3, str_replace(",", "", $prpshramt), PDO::PARAM_STR);
			$stmt->bindParam(4, $receiptno, PDO::PARAM_STR);
			$stmt->bindParam(5, $receiptdate, PDO::PARAM_STR);			
			$stmt->bindParam(6, $instrument, PDO::PARAM_INT);
			$stmt->bindParam(7, $refno, PDO::PARAM_STR);
			$stmt->bindParam(8, $refdate, PDO::PARAM_STR);
			$stmt->bindParam(9, $userid, PDO::PARAM_STR);
			$stmt->bindParam(10, $today, PDO::PARAM_STR);
			$stmt->execute();

			$sql = "SELECT * FROM `facilitytypes` WHERE facility LIKE '%Share'";
			$reslt = $conn->query($sql);
			$row = $reslt->fetch(PDO::FETCH_ASSOC);
			$appfee = $row['facilityfee'];
			$facilitytype = $row['factypeid'];

			$stmt2 = $conn->prepare("INSERT INTO cashflowin (receiptno, receiptdate, payerid, amount, incomesource, instrument, docref, docdate, docbank, purpose, userr, udate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt2->bindParam(1, $receiptno, PDO::PARAM_INT);
			$stmt2->bindParam(2, $receiptdate, PDO::PARAM_STR);
			$stmt2->bindParam(3, $memid, PDO::PARAM_STR);
			$stmt2->bindParam(4, str_replace(",", "", $appfee), PDO::PARAM_STR);
			$stmt2->bindParam(5, $facilitytype, PDO::PARAM_INT);
			$stmt2->bindParam(6, $instrument, PDO::PARAM_INT);
			$stmt2->bindParam(7, $refno, PDO::PARAM_STR);
			$stmt2->bindParam(8, $refdate, PDO::PARAM_STR);
			$stmt2->bindParam(9, $bank, PDO::PARAM_STR);
			$stmt2->bindParam(10, $remark, PDO::PARAM_STR);
			$stmt2->bindParam(11, $userid, PDO::PARAM_STR);
			$stmt2->bindParam(12, $today, PDO::PARAM_STR);
			$stmt2->execute();

			$share = (int)str_replace(',', '', $prpshramt) + (int)str_replace(',', '', $prsntshramt);
			$upd = "UPDATE memberregister SET monthlysavings='$share' WHERE memid='$memid'";
			$update = $conn->query($upd);

			if( isset($stmt) && isset($stmt2) && isset($update)) {
				$msg = "<div class='alert alert-success'>
								</h5>Record Updated Successfully</h5>
							</div>";
				$err = '';
				$data['msg'] = $msg;
				$data['err'] = $err;
				echo json_encode($data);
			}
			else {
				$msg = "<div class='alert alert-danger'>
								</h5>Operation Failed Please try again</h5>
							</div>";
				$err = 'error';
				$data['msg'] = $msg;
				$data['err'] = $err;
				echo json_encode($data);
			}
		}
		else{
			$msg = "<div class='alert alert-danger'>
			</h5>".$error."</h5>
			</div>";
			$err = 'error';
			$data['msg'] = $msg;
			$data['err'] = $err;
			echo json_encode($data);	
		}

	}

	if($dataname=='getlists') {
		$sql = "SELECT *, titles.title AS memtitle, gender.full AS gendr, concat_ws( ' ', sname, fname, mname) AS membername FROM memberregister LEFT JOIN titles ON memberregister.title=titles.titleid
		LEFT JOIN gender ON memberregister.gender=gender.id ORDER BY membername ASC";
		$result = $conn->query($sql);
		$sn = 1;
		$sn2 = 1;
		$sn3 = 1;
		
		$allmembertbl = '';
		if($result->rowCount() > 0) {
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$memid = $row['memid'];
				$allmembertbl .= '<tr>
				<td>'.$sn.'</td>
				<td>'.$row['membername'].'</td>
				<td>'.ucwords(strtolower($row['memtitle'])).'</td>
				<td>'.$memid.'</td>
				<td>'.ucwords(strtolower($row['gendr'])).'</td>
				<td>'.$row['accountnumber'].'</td>
				<td>'.$row['phoneno'].'</td>';

				$memstatus = $row['memstatus'];
				if($memstatus == 1) {
					$allmembertbl .= '<td>Active</td>';			
				}
				else {
					$allmembertbl .= '<td>Not Active</td>';	
				}

				$allmembertbl .= '<td>'.number_format($row['shareamount']).'</td>';
				
				//Get total savings
				$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
				$stmt2 = $conn->query($sql2);
				$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
				$totalsavings = $savings['totalsavings'];
				if($totalsavings != 0) {
					$allmembertbl .= '<td>'.number_format($savings['totalsavings']).'</td>';
				}
				else {
					$allmembertbl .= '<td></td>';
				}
				
			
				$sql3 = "SELECT SUM(balance) AS facilitybalance FROM `facilityregister` WHERE midno ='$memid'";
				$stmt3 = $conn->query($sql3);
				$getfacbalance = $stmt3->fetch(PDO::FETCH_ASSOC);
				$facbalance = $getfacbalance['facilitybalance'];

				if($facbalance != 0) {
					$allmembertbl .= '<td>'.number_format($getfacbalance['facilitybalance']).'</td>';
				}
				else {
					$allmembertbl .= '<td></td>';
				}
			
				$currentbalance = number_format(($totalsavings - $facbalance));
			
				$allmembertbl .= '<td>'.$currentbalance.'</td>
				</tr>';		
				$sn++;	
			}
		}
		else {
			$allmembertbl .= '<tr><td colspan="10" class="text-danger">No records found</td></tr>';
		}		
		
		
		$sq2 = "SELECT *, titles.title AS memtitle, gender.full AS gendr, concat_ws( ' ', sname, fname, mname) AS membername FROM memberregister LEFT JOIN titles ON memberregister.title=titles.titleid
		LEFT JOIN gender ON memberregister.gender=gender.id WHERE memstatus=1 ORDER BY membername ASC";
		$reslt2 = $conn->query($sq2);
		
		$currmembertbl = '';
		
		if($reslt2->rowCount() > 0) {
			while($row2 = $reslt2->fetch(PDO::FETCH_ASSOC)) {
				$memid = $row2['memid'];
				$currmembertbl .= '<tr>
				<td>'.$sn2.'</td>
				<td>'.$row2['membername'].'</td>
				<td>'.ucwords(strtolower($row2['memtitle'])).'</td>
				<td>'.$memid.'</td>
				<td>'.ucwords(strtolower($row2['gendr'])).'</td>
				<td>'.$row2['accountnumber'].'</td>
				<td>'.$row2['phoneno'].'</td>
				<td>'.number_format($row2['shareamount']).'</td>';
				
				//Get total savings
				$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
				$stmt2 = $conn->query($sql2);
				$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
				$totalsavings = $savings['totalsavings'];

				if($totalsavings != 0) {
					$currmembertbl .= '<td>'.number_format($savings['totalsavings']).'</td>';
				}
				else {
					$currmembertbl .= '<td></td>';
				}
				
			
				$sql3 = "SELECT SUM(balance) AS facilitybalance FROM `facilityregister` WHERE midno ='$memid'";
				$stmt3 = $conn->query($sql3);
				$getfacbalance = $stmt3->fetch(PDO::FETCH_ASSOC);
				$facbalance = $getfacbalance['facilitybalance'];

				if($facbalance != 0) {
					$currmembertbl .= '<td>'.number_format($getfacbalance['facilitybalance']).'</td>';
				}
				else {
					$currmembertbl .= '<td></td>';
				}
							
				$currentbalance = number_format(($totalsavings - $facbalance));
			
				$currmembertbl .= '<td>'.$currentbalance.'</td>
				</tr>';	
				$sn2++;			
			}
		}
		else {
			$currmembertbl .= '<tr><td colspan="10" class="text-danger">No records found</td></tr>';
		}
		
		
		$sq3 = "SELECT *, titles.title AS memtitle, gender.full AS gendr, concat_ws( ' ', sname, fname, mname) AS membername FROM memberregister LEFT JOIN titles ON memberregister.title=titles.titleid
		LEFT JOIN gender ON memberregister.gender=gender.id WHERE memstatus=0 ORDER BY membername ASC";
		$reslt3 = $conn->query($sq3);
		
		$notcurrmembertbl = '';
		if($reslt3->rowCount() > 0) {
			while($row3 = $reslt3->fetch(PDO::FETCH_ASSOC)) {
				$memid = $row3['memid'];
				$notcurrmembertbl .= '<tr>
				<td>'.$sn3.'</td>
				<td>'.$row3['membername'].'</td>
				<td>'.ucwords(strtolower($row3['memtitle'])).'</td>
				<td>'.$memid.'</td>
				<td>'.ucwords(strtolower($row3['gendr'])).'</td>
				<td>'.$row3['accountnumber'].'</td>
				<td>'.$row3['phoneno'].'</td>
				<td>'.number_format($row3['shareamount']).'</td>';
				
				//Get total savings
				$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
				$stmt2 = $conn->query($sql2);
				$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
				$totalsavings = $savings['totalsavings'];

				if($totalsavings != 0) {
					$notcurrmembertbl .= '<td>'.number_format($savings['totalsavings']).'</td>';
				}
				else {
					$notcurrmembertbl .= '<td></td>';
				}
				
				
			
				$sql3 = "SELECT SUM(balance) AS facilitybalance FROM `facilityregister` WHERE midno ='$memid'";
				$stmt3 = $conn->query($sql3);
				$getfacbalance = $stmt3->fetch(PDO::FETCH_ASSOC);
				$facbalance = $getfacbalance['facilitybalance'];

				if($facbalance != 0) {
					$notcurrmembertbl .= '<td>'.number_format($getfacbalance['facilitybalance']).'</td>';
				}
				else {
					$notcurrmembertbl .= '<td></td>';
				}
				
			
				$currentbalance = number_format(($totalsavings - $facbalance));
			
				$notcurrmembertbl .= '<td>'.$currentbalance.'</td>
				</tr>';
				$sn3++;
			}	
		}
		else {
			$notcurrmembertbl .= '<tr><td colspan="10" class="text-danger">No records found</td></tr>';
		}		

		//Get total savings
		$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
		$stmt2 = $conn->query($sql2);
		$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
		$totalsavings = $savings['totalsavings'];//Get total savings
		$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
		$stmt2 = $conn->query($sql2);
		$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
		$totalsavings = $savings['totalsavings'];
	
		
		$data['allmembertbl'] = $allmembertbl;
		$data['currmembertbl'] = $currmembertbl;
		$data['notcurrmembertbl'] = $notcurrmembertbl;
		echo json_encode($data);

	}
?>