<?php

include_once('../include/config.php');
include_once('../include/portalfunctions.php');

$sql = "SELECT *, titles.title AS memtitle, gender.full AS gendr, concat_ws( ' ', sname, fname, mname) AS membername FROM memberregister LEFT JOIN titles ON memberregister.title=titles.titleid
LEFT JOIN gender ON memberregister.gender=gender.id";
$result = $conn->query($sql);

$allmembertbl = '';
if($result->rowCount() > 0) {
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$memid = $row['memid'];
		$allmembertbl .= '<tr>
		<td>'.$memid.'</td>
		<td>'.$row['memtitle'].'</td>
		<td>'.$row['membername'].'</td>
		<td>'.$row['phoneno'].'</td>
		<td>'.$row['gendr'].'</td>
		<td>'.number_format($row['shareamount']).'</td>';
		
		//Get total savings
		$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
		$stmt2 = $conn->query($sql2);
		$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
		$totalsavings = $savings['totalsavings'];
		$allmembertbl .= '<td>'.number_format($savings['totalsavings']).'</td>';
	
		$sql3 = "SELECT SUM(balance) AS facilitybalance FROM `facilityregister` WHERE midno ='$memid'";
		$stmt3 = $conn->query($sql3);
		$getfacbalance = $stmt3->fetch(PDO::FETCH_ASSOC);
		$facbalance = $getfacbalance['facilitybalance'];
	
		$allmembertbl .= '<td>'.number_format($getfacbalance['facilitybalance']).'</td>';
	
		$currentbalance = number_format(($totalsavings - $facbalance));
	
		$allmembertbl .= '<td>'.$currentbalance.'</td>
		</tr>';			
	}
}
else {
	$allmembertbl .= '<tr><td colspan="9" class="text-danger">No records found</td></tr>';
}		


$sq2 = "SELECT *, titles.title AS memtitle, gender.full AS gendr, concat_ws( ' ', sname, fname, mname) AS membername FROM memberregister LEFT JOIN titles ON memberregister.title=titles.titleid
LEFT JOIN gender ON memberregister.gender=gender.id WHERE memstatus=1";
$reslt2 = $conn->query($sq2);

$currmembertbl = '';

if($reslt2->rowCount() > 0) {
	while($row2 = $reslt2->fetch(PDO::FETCH_ASSOC)) {
		$memid = $row2['memid'];
		$currmembertbl .= '<tr>
		<td>'.$memid.'</td>
		<td>'.$row2['memtitle'].'</td>
		<td>'.$row2['membername'].'</td>
		<td>'.$row2['phoneno'].'</td>
		<td>'.$row2['gendr'].'</td>
		<td>'.number_format($row2['shareamount']).'</td>';
		
		//Get total savings
		$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
		$stmt2 = $conn->query($sql2);
		$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
		$totalsavings = $savings['totalsavings'];
		$currmembertbl .= '<td>'.number_format($savings['totalsavings']).'</td>';
	
		$sql3 = "SELECT SUM(balance) AS facilitybalance FROM `facilityregister` WHERE midno ='$memid'";
		$stmt3 = $conn->query($sql3);
		$getfacbalance = $stmt3->fetch(PDO::FETCH_ASSOC);
		$facbalance = $getfacbalance['facilitybalance'];
	
		$currmembertbl .= '<td>'.number_format($getfacbalance['facilitybalance']).'</td>';
	
		$currentbalance = number_format(($totalsavings - $facbalance));
	
		$currmembertbl .= '<td>'.$currentbalance.'</td>
		</tr>';				
	}
}
else {
	$currmembertbl .= '<tr><td colspan="9" class="text-danger">No records found</td></tr>';
}


$sq3 = "SELECT *, titles.title AS memtitle, gender.full AS gendr, concat_ws( ' ', sname, fname, mname) AS membername FROM memberregister LEFT JOIN titles ON memberregister.title=titles.titleid
LEFT JOIN gender ON memberregister.gender=gender.id WHERE memstatus=0";
$reslt3 = $conn->query($sq3);

$notcurrmembertbl = '';
if($reslt3->rowCount() > 0) {
	while($row3 = $reslt3->fetch(PDO::FETCH_ASSOC)) {
		$memid = $row3['memid'];
		$notcurrmembertbl .= '<tr>
		<td>'.$memid.'</td>
		<td>'.$row3['memtitle'].'</td>
		<td>'.$row3['membername'].'</td>
		<td>'.$row3['phoneno'].'</td>
		<td>'.$row3['gendr'].'</td>
		<td>'.number_format($row3['shareamount']).'</td>';
		
		//Get total savings
		$sql2 = "SELECT SUM(amount) AS totalsavings FROM `memberpays` WHERE memid = '$memid'";
		$stmt2 = $conn->query($sql2);
		$savings = $stmt2->fetch(PDO::FETCH_ASSOC); 
		$totalsavings = $savings['totalsavings'];
		$notcurrmembertbl .= '<td>'.number_format($savings['totalsavings']).'</td>';
	
		$sql3 = "SELECT SUM(balance) AS facilitybalance FROM `facilityregister` WHERE midno ='$memid'";
		$stmt3 = $conn->query($sql3);
		$getfacbalance = $stmt3->fetch(PDO::FETCH_ASSOC);
		$facbalance = $getfacbalance['facilitybalance'];
	
		$notcurrmembertbl .= '<td>'.number_format($getfacbalance['facilitybalance']).'</td>';
	
		$currentbalance = number_format(($totalsavings - $facbalance));
	
		$notcurrmembertbl .= '<td>'.$currentbalance.'</td>
		</tr>';
	}	
}
else {
	$notcurrmembertbl .= '<tr><td colspan="9" class="text-danger">No records found</td></tr>';
}		


$data['allmembertbl'] = $allmembertbl;
$data['currmembertbl'] = $currmembertbl;
$data['notcurrmembertbl'] = $notcurrmembertbl;
echo json_encode($data);

?>

