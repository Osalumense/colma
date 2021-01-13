<?php
	include_once('include/config.php');
	include_once("include/portalfunctions.php");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	date_default_timezone_set("Africa/Lagos");
    $userId = $_SESSION['loginid'];
	$loginid = $_SESSION['loginid'];
	$userdetails = get_user($conn, $loginid);
	//print_r($user);
	$sname = implode(',', array_map(function($el){ return $el['sname']; }, $userdetails));
	$fname = implode(',', array_map(function($el){ return $el['fname']; }, $userdetails));
	$mname = implode(',', array_map(function($el){ return $el['mname']; }, $userdetails));
	$titlename = implode(',', array_map(function($el){ return $el['title']; }, $userdetails));
	$title = implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $titlename)));
	$memid = implode(',', array_map(function($el){ return $el['memid']; }, $userdetails));
	//$usergender = get_gender($conn, $usergenderdetail);
	$usercategory = get_category($conn, $usercategorydetail);
	$office = implode(',', array_map(function($el){ return $el['office']; }, get_officer($conn, $memid)));
	//echo $userunitdetail;
	//$userunit = get_unit($conn, $userunitdetail);
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Profile</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/libs/summernote/summernote.css?1425218701" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">
		<div class="card">
			<div class="card-head style-primary">
				<header>PROFILE</header>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="margin-bottom-xxl">
						<div class="pull-left clearfix">
							<img class="img-circle border-white border-xl img-responsive auto-width" src="assets/img/avatar7.jpg?1404026721" alt="" />
						</div>
						<div class="pull-right clearfix">
							<h1 class="text-light no-margin"><?php echo ucwords(strtolower($title)) . " " . ucwords($sname . " " . $fname . " " . $mname)?></h1>
							<h3>
								<?php echo ucwords($office); ?>
							</h3>
						</div>
					</div>
				</div><!--end .tab-content -->
			</div>
		</div><!--end .col -->
		<script src="assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="assets/js/core/source/App.js"></script>
		<script src="assets/js/core/source/AppNavigation.js"></script>
		<script src="assets/js/core/source/AppOffcanvas.js"></script>
		<script src="assets/js/core/source/AppCard.js"></script>
		<script src="assets/js/core/source/AppForm.js"></script>
		<script src="assets/js/core/source/AppVendor.js"></script>
		<script src="assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
