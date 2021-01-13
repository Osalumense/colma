<?php
	session_start();
	$conn = new PDO('mysql:host=localhost;dbname=colma;charset=utf8mb4', 'root', '');
	include_once('portalfunctions.php');
	if(isset($_SESSION['loginid'])){
		$userid =implode(',', array_map(function($el){ return $el['memid']; }, get_user($conn, $_SESSION['loginid'])));
		//echo $_SESSION['loginid'];
	}
	date_default_timezone_set("Africa/Lagos");
?>