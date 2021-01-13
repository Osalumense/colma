<?php
    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('include/config.php');
	if(isset($_SESSION['loginid']) && isset($_SESSION['usertypeid'])){
		$stmt = $conn->prepare("select * from usertypes where usertypeid = '" . $_SESSION['usertypeid'] . "'");
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $data['usertypeurl'] . "<br />" . $_SERVER['PHP_SELF'];
		if($data['usertypeurl'] == basename($_SERVER['PHP_SELF']))
		{
			$stmtuser = $conn->prepare("select * from pdata where idno in (select userid from login where loginid = " . $_SESSION['loginid'] . ")");
			$stmtuser->execute();
			$datauser = $stmtuser->fetch(PDO::FETCH_ASSOC);
			//print_r($stmtuser);
			$roles 	  = get_userrole($conn, $_SESSION['loginid']);
			$_SESSION['roles'] = $roles;
			$role = implode(',', $roles);
			//echo $role;
			$stmtsessionchk    = $conn->prepare("select * from  sessions where loginid = '" . $_SESSION['loginid'] . "' and sessionname = 'roles'");
			$stmtsessionchk->execute();
			$countsessionchk   = $stmtsessionchk->rowCount();
			if($countsessionchk > 0){
				$stmtsessupd   = $conn->prepare("update sessions set sessionstatus = 1, sessionvalue = '$role' where loginid = '" . $_SESSION['loginid'] . "' and sessionname = 'roles'");
			}
			else 
				$stmtsessupd   = $conn->prepare("insert into sessions(sessionstatus, sessionname, sessionvalue, loginid) values(1, 'roles', '$role', " . $_SESSION['loginid'] . ")");
			$stmtsessupd->execute();
			//print_r($stmtsessupd);
			$stmtpage		   = $conn->prepare("select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatus = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))");
			//echo "select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatu = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))";
			$stmtpage->execute();
			$countpage 		   = $stmtpage->rowCount();
			$_SESSION['pages'] = '';
			if($countpage > 0){
				while($datapage = $stmtpage->fetch())
				{
					extract($datapage);
					$_SESSION['pages'] .= $filename . "." . $extension;
				}
				$stmtupdate = $conn->prepare("select * from  sessions where loginid = " .  $_SESSION['loginid'] . " and sessionname = 'pages'");
				$stmtupdate->execute();
				$countupdate = $stmtupdate->rowCount();
				if($countupdate > 0 ){
					$stmta = $conn->prepare("update sessions set sessionvalue = '" . $_SESSION['pages'] . "', sessionstatus = 1 where sessionname = 'pages' and loginid = " . $_SESSION['loginid']);
				}
				else{
					$stmta = $conn->prepare("insert into sessions(sessionvalue, sessionstatus, sessionname, loginid) values('" . $_SESSION['pages'] . "', 1, 'pages', " . $_SESSION['loginid'] . ")");
				}
				$stmta->execute();
				//print_r($stmta);
			}
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="UTF-8">
					<title>Covenant Portal</title>
					<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
					<!-- bootstrap 3.0.2 -->
					<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
					<!-- font Awesome -->
					<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
					<!-- Ionicons -->
					<link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
					<!-- Morris chart -->
					<link href="assets/css/morris/morris.css" rel="stylesheet" type="text/css" />
					<!-- jvectormap -->
					<link href="assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
					<!-- Date Picker -->
					<link href="assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
					<!-- fullCalendar -->
					<!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
					<!-- Daterange picker -->
					<link href="assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
					<!-- iCheck for checkboxes and radio inputs -->
					<link href="assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />
					<!-- bootstrap wysihtml5 - text editor -->
					<!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
					<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
					<!-- Theme style -->
					<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
					<!--Brendan's Style sheet-->
					<link href="assets/css/mystyle.css" rel="stylesheet" type="text/css" />


					<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
					<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
						<!--[if lt IE 9]>
						  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
						  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
						  <![endif]-->

				</head>
				<body class="skin-black">
					<!-- header logo: style can be found in header.less -->
					<header class="header headerstaff" style="background: white;">
						<a href="staffdashboard.php" class="logo" >
							<img src="assets/img/logo.png" width=50px; alt="User Image"/><img width=100px; src="assets/img/cov.uni.txt.png" alt="User Image"/>
						</a>
						<!-- Header Navbar: style can be found in header.less -->
						<nav class="navbar navbarstaff navbar-static-top" role="navigation">
							<!-- Sidebar toggle button-->
							<a style="background-color: white;" href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<div class="navbar-right">
								<ul class="nav navbar-nav">
									<!-- Messages: style can be found in dropdown.less-->
									
									<!-- User Account: style can be found in dropdown.less -->
									<li class="dropdown user user-menu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-user"></i>
											<?php
												$stmttitle = $conn->prepare("select title from titles where title = " . $datauser['title']);
												$stmttitle->execute();
												$datatitle = $stmttitle->fetch(PDO::FETCH_ASSOC);
											
											?>
											<span><?php echo ucwords($datauser['title']) . " " . ucwords($datauser['sname']);?> <i class="caret"></i></span>
										</a>
										<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
											<li class="dropdown-header text-center">Account</li>
											<li>
												<a href="#">
													<i class="fa fa-user fa-fw pull-right"></i>
													Profile
												</a>
												<a data-toggle="modal" href="#modal-user-settings">
													<i class="fa fa-cog fa-fw pull-right"></i>
													Settings
												</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</nav>
					</header>
					<div class="wrapper row-offcanvas row-offcanvas-left">
						<!-- Left side column. contains the logo and sidebar -->
						<aside class="left-side sidebar-offcanvas" >
						<!-- sidebar: style can be found in sidebar.less -->
							<section class="sidebar">
								<!-- Sidebar user panel -->
								<div class="user-panel">
									<div>
										<img src="assets/img/avatar.png" class="img-circle staffimage" alt="User Image" />
									</div>
								</div>
								<ul class="sidebar-menu">
									<li class="side-piece" >
										<a>
											<i class="fa fa-book"></i> <span><?php echo ucwords($datauser['title']) . " " . ucwords($datauser['sname']). " " .  ucwords($datauser['fname']). " " .  ucwords($datauser['mname']);?></span>
										</a>
									</li>
									<li class="side-piece">
										<a >
											<?php 
												$stmtgender = $conn->prepare("select full from gender where gender = '" . $datauser['gender'] . "'");
												$stmtgender->execute();
												$datagender = $stmtgender->fetch(PDO::FETCH_ASSOC);
											?>
											<i class="fa fa-male" aria-hidden="true"></i><span><?php echo $datagender['full'];?></span>
										</a>
									</li>
									<li>
										<a>
											<i class="fa fa-address-card" aria-hidden="true"></i> <span><?php echo $datauser['idno'];?></span>
										</a>
									</li>
									<!--<li>
										<a href="mailto:<?php //echo $datauser['emailadd'];?>" >
											<i class="fa fa-envelope-o" aria-hidden="true"></i> <span><?php //echo ucwords($datatitle['title']) . " " . ucwords($datauser['sname']) . "'s ";?>Email</span>
										</a>
									</li>-->
									<!--<li>
										<a >
											<i class="fa fa-phone"></i> <span>+2348191234567</span>
										</a>
									</li>-->
									<?php 
										$stmtunit = $conn->prepare("(select departments.department AS location from departments where dpid = '" . $datauser['unit'] . "') 
										union (select programs.program as location from programs where prgid = '" . $datauser['unit'] . "') 
										union (select unit as location FROM units where unitid = '" . $datauser['unit'] . "')
										union (select college as location from colleges where colid = '" . $datauser['unit'] . "')");
										$stmtunit->execute();
										/*echo "(select departments.department AS location from departments where dpid = '" . $datauser['unit'] . "') 
										union (select programs.program as location from programs where prgid = '" . $datauser['unit'] . "') 
										union (select unit as location FROM units where unitid = '" . $datauser['unit'] . "')
										union (select college as location from colleges where colid = '" . $datauser['unit'] . "')";*/
										$dataunit = $stmtunit->fetch(PDO::FETCH_ASSOC); 
										//print_r($dataunit);?>
									<li>
										<a >
											<i class="fa fa-building"></i> <span>Unit - <?php echo ucwords($dataunit['location']); ?></span>
										</a>
									</li>
									<!--<li>
										<a >
											<i class="fa fa-briefcase"></i> <span>Designation - </span>
										</a>
									</li> -->
									<li>
										<a >
											<i class="fa fa-vcard"></i> <span><?php echo ucwords($datauser['post']); ?></span>
										</a>
									</li>
									<!--<li>
										<a >
											<i class="fa fa-birthday-cake" aria-hidden="true"></i> <span>Birthday - 18 March</span>
										</a>
									</li>-->
								</ul>
							</section>
							<!-- /.sidebar -->
						</aside>
						<aside class="right-side">
							<!-- Main content -->
							<section class="content"   >
							  <div class="row">
							  
								<img id = 'loading-image' src="assets/images/ui-anim_basic_16x16.gif" alt="load Icon">
								<?php
									$roles = get_userrole($conn, $_SESSION['loginid']);
									$_SESSION['roles'] = $roles;
									$stmtpage = $conn->prepare("select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatus = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))");
									//echo "select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatu = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))";
									$stmtpage->execute();
									$countpage = $stmtpage->rowCount();
									$_SESSION['pages'] = '';
									if($countpage > 0){
										while($datapage = $stmtpage->fetch())
										{
											extract($datapage);
											$_SESSION['pages'] .= $filename . "." . $extension;
										}
									}
									//print_r($roles);
								?>
								<script src="assets/js/jquery.min.js" type="text/javascript"></script>
									<script>
										$(document).ready(function(){
											$('#loading-image').bind('ajaxStart', function(){
												$(this).show();
											}).bind('ajaxStop', function(){
												$(this).hide();
											});
											function load_page(){
												var pageload = "pageload";
												$.ajax({
													type: 'POST',
													url:  'applications/admin/include/appajax.php',
													data: {pageload:pageload},
													success:function(result){
														$(".row").append(result);
													}
												});
											}
											load_page();
											$('.clickapp').live('click', function(e){
												//e.preventDefault();
												var openapp = $(this).attr('id');
												var href = $(this).attr('href');
													
												$.ajax({
													type: 'POST',
													url:  'applications/admin/include/appajax.php',
													data: {openapp:openapp},
													success:function(result){
														
													}
												});
											});
										});
									</script>
								</div>
							</section>
							</aside>
						</div><!--end col-6 -->
						  <!-- row end -->
						<div class="footer-main">
							Copyright Covenant University, 2017
						</div>
					<!-- /.right-side -->
					<!-- jQuery 2.0.2 -->
					<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
					<script src="assets/js/jquery.min.js" type="text/javascript"></script>

					<!-- jQuery UI 1.10.3 -->
					<script src="assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
					<!-- Bootstrap -->
					<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
					<!-- daterangepicker -->
					<script src="assets/js/Director/app.js" type="text/javascript"></script>
					<!-- Director dashboard demo (This is only for demo purposes) -->
					<!-- Director for demo purposes -->
					
				</body>
			</html>
		
		<?php	
		}
		else{
			echo "<script>window.locaton.href = location: logout.php</script>";
		}
	}
	else{
		echo "<script>alert('You need to Login First');";
		echo "window.location.href = 'logout.php';</script>";
	}
?>