<?php
	include_once('include/config.php');
	include_once('include/portalfunctions.php');
	if(isset($_SESSION['loginid']) && $_SESSION['loginid'] > 0){
		$comment =  $userid . " logged out";
		logguser($conn, $userid, $comment, 0);
	}
	if(isset($_SESSION['loginid']))
		$_SESSION['loginid'] = '';
	if(isset($_SESSION['appid']))
		$_SESSION['appid'] = '';
	if(isset($_SESSION['menuid']))
		$_SESSION['menuid'] = '';
	if(isset($_SESSION['menuname']))
		$_SESSION['menuname'] = '';
	if(isset($_SESSION['appname']))
		$_SESSION['appname'] = '';
	if(isset($_SESSION['roles']))
		$_SESSION['roles'] = '';
	if(isset($_SESSION['usertypeid']))
		$_SESSION['usertypeid'] = '';
	if(isset($_SESSION['pages']))
		$_SESSION['pages'] = '';
	session_destroy();
	echo"<script>window.location = 'index.php';</script>";
?>

