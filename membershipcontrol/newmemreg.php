<?php
 //    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	// header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	//include_once('../include/portalfunctions.php');
     extract($_POST);
	if ($dataname=='savememberregister'){     
	     print_r($_POST);
		$officer=$userid;
		$datecreated=(new \DateTime())->format('Y-m-d H:i:s');
	    $sql = "INSERT into memberregisters(title,sname,fname,mname,dob,gender,mstat,nationality,homeadd1,homeadd2,homeadd3,state,country,phoneno,email,busnature,busadd1,busadd2,busadd3,busstate,buscountry,chyr,wofbilevel,province,district,zone,wsflocation,nkintitle,nkinsname,nkinfname,nkinmname,
	    nkinrel,nkadd1,nkadd2,nkadd3,nkstate,nkcountry,nkphoneno,nkemail,datejoin,accountnumber,groupid,shareamount,datecreated,officer,memstatus)VALUES('$title','$sname','$fname','$mname','$dob','$gender','$mstat','$nationality','$add1','$add2','$town','$state','$country','$phoneno','$email','$busnature','$busadd1','$busadd2','$bustown','$busstate','$buscountry','$joinchurch','$wofbi','$province','$district','$zone','$wsf','$nktitle','$nksname','$nkfname','$nkmname','$nkrel','$nkadd1','$nkadd2','$nktown','$nkstate','$nkcountry','$nkphoneno','$nkemail','$datejoin','$accno','$grpname','$shareamt','$datecreated','$officer','1')";
        $stmt = $conn->prepare($sql);
        $result= $stmt->execute();
		if($result){
			echo "yes";
		}else{
			echo "no";
		}
	 }
	
//}
		
?>