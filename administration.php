<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('include/config.php');
	
	if(isset($_SESSION['loginid']) && isset($_SESSION['usertypeid']))
	{
		//echo $_SESSION['loginid'];
		$stmt = $conn->prepare("select * from usertypes where usertypeid = '" . $_SESSION['usertypeid'] . "'");
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $data['usertypeurl'] . "<br />" . $_SERVER['PHP_SELF'];
		if($data['usertypeurl'] == basename($_SERVER['PHP_SELF']))
		{
			$roles 	  = get_userrole($conn, $_SESSION['loginid']);
			//print_r($roles);
			$_SESSION['roles'] = $roles;
			$role = implode(',', $roles);
			$stmtpage		   = $conn->prepare("select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and menustatus = 1 and submenustatus = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))");
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
				//print_r($stmta);
			}
			
			$loginid = $_SESSION['loginid'];
			$userdetails = get_user($conn, $loginid);
			//print_r($userdetails);
			$sname = ucwords(implode(',', array_map(function($el){ return $el['sname']; }, $userdetails)));
			$fname = ucwords(implode(',', array_map(function($el){ return $el['fname']; }, $userdetails)));
			$titlename = implode(',', array_map(function($el){ return $el['title']; }, $userdetails));
			$title = implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $titlename)));
		
			?>
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="UTF-8">
					<title>COLMA Portal</title>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta name="keywords" content="your,keywords">
					<meta name="description" content="Short explanation about this website">
					<!-- END META -->

					<!-- BEGIN STYLESHEETS -->
					<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/> -->
					<link type="text/css" rel="stylesheet" href="assets/css/theme-default/bootstrap.css?1422792965" />
					<link type="text/css" rel="stylesheet" href="assets/css/theme-default/materialadmin.css?1425466319" />
					<link type="text/css" rel="stylesheet" href="assets/css/theme-default/font-awesome.min.css?1422529194" />
					<link type="text/css" rel="stylesheet" href="assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
					<link type="text/css" rel="stylesheet" href="assets/css/theme-default/libs/wizard/wizard.css?1425466601" />
					<!-- END STYLESHEETS -->

					<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
					<!--[if lt IE 9]>
					<script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
					<script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
					<![endif]-->
					<script src="assets/js/jquery.min.js" type="text/javascript"></script>
					<script>
						$(document).ready(function(){
							$('#loading-image').bind('ajaxStart', function(){
								$(this).show();
							}).bind('ajaxStop', function(){
								$(this).hide();
							});
							//document.addEventListener('contextmenu', event => event.preventDefault());
							var menuload = 'menuload';
							//alert("");
							$.ajax({
								type: "POST",
								url: "include/appajax.php",
								data: {menuload:menuload},
								success: function(result){
									$('#main-menu').append(result);
								}
							});
							//$('#addlink').css("padding", "5px");
							$('#main-menu').on("click", "a.menu" ,function(e){
								e.preventDefault();
								//alert('hi');
								var openmenu = $(this).attr('class');
								var ids = openmenu.replace('menu collapseExample', '');
								subid = $(this).attr('id');
								submenuid = subid.replace('submenu', '');
								console.log(subid);
								$('.menu').removeClass( "active" );
								$('.menu').parent().removeClass( "active" );
								$('.menu').parent().parent().parent().removeClass( "active" );
								$(this).addClass( "active" );
								$(this).parent().addClass( "active" );
								$(this).parent().parent().parent().addClass( "active" );
								//$(this).trigger('click');
								href = $(this).attr('href');
								$.ajax({
									type: 'POST',
									url:  'include/appajax.php',
									data: {openmenu:ids},
									success:function(result){
										//console.log(result);
										$('#frame').attr('src', href);
									}	
								});
							});
						});
					</script>
				</head>
				<body class="menubar-hoverable header-fixed ">
					<!-- header logo: style can be found in header.less -->
					<header id="header" >
						<div class="headerbar">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="headerbar-left">
								<ul class="header-nav header-nav-options">
									<li class="header-nav-brand" >
										<div class="brand-holder">
											<a href="#">
												<img width = '100px' height = '100px' src="assets/img/logo1.jpg" alt="User Image"/>
											</a>
										</div>
									</li>
									<li>
										<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
											<i class="fa fa-bars"></i>
										</a>
									</li>
								</ul>
									<div class="header-nav clearfix">
									<h3>Covenant Liberation Multipurpose Association</h3>
									</div>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="headerbar-right">
								<div class="header-nav clearfix">
								<li class="header-nav-brand" >
									<div class="brand-holder">
										<a href="#">
											<img src="assets/img/logo2.jpg" width= "90px" height = "80px" alt="User Image"/>
										</a>
									</div>
								</li>
								</div>
								<ul class="header-nav header-nav-profile">
									<li class="dropdown">
										<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
											<img src="assets/img/avatar1.jpg?1403934956" alt="" />
											<span class="profile-info">
												<?php echo $sname . " " . $fname;?>
												
											</span>
										</a>
										<ul class="dropdown-menu animation-dock">
											<!--<li class="dropdown-header">Config</li>
											<li><a href="html/pages/profile.html">My profile</a></li>
											<li><a href="html/pages/blog/post.html">My blog <span class="badge style-danger pull-right">16</span></a></li>
											<li><a href="html/pages/calendar.html">My appointments</a></li>
											<li class="divider"></li>-->
											<li><a href="logout.php"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
										</ul><!--end .dropdown-menu -->
									</li><!--end .dropdown -->
								</ul><!--end .header-nav-profile -->
								<ul class="header-nav header-nav-toggle">
									<li>
										<a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
											<i class="fa fa-ellipsis-v"></i>
										</a>
									</li>
								</ul><!--end .header-nav-toggle -->
							</div><!--end #header-navbar-collapse -->
						</div>
					</header>
					<div id="base">

						<!-- BEGIN OFFCANVAS LEFT -->
						<div class="offcanvas">
						</div><!--end .offcanvas-->
						<!-- END OFFCANVAS LEFT -->

						<!-- BEGIN CONTENT-->
						<div id="content">
							<section>
								<div class="section-body">
									<div class="row">
										<iframe id="frame" name="frame" style=" border: 0; width: 100%; height: 590px; margin: 0; padding: 0;" src="staffprofile.php">
										</iframe>
									</div>
								</div>
							</section>
						</div>
						<!-- BEGIN MENUBAR-->
						<div style="background: white;" id="menubar" class="menubar-inverse ">
							
							<div class="menubar-fixed-panel">
								<div>
									<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
										<i class="fa fa-bars"></i>
									</a>
								</div>
								<div class="expanded">
									<a href="html/dashboards/dashboard.html">
										<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
									</a>
								</div>
							</div>
							<div class="menubar-scroll-panel">

								<!-- BEGIN MAIN MENU -->
								<ul id="main-menu" class="gui-controls">
								</ul><!--end .main-menu -->
								<!-- END MAIN MENU -->

								<div class="menubar-foot-panel">
									<small class="no-linebreak hidden-folded">
										<span class="opacity-75">Copyright &copy; <?=date('Y')?></span> <strong>molad eKonsult</strong>
									</small>
								</div>
							</div><!--end .menubar-scroll-panel-->
						</div><!--end #menubar-->
					</div>	
						<!-- END MENUBAR -->
					<script src="assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
					<script src="assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
					<script src="assets/js/libs/bootstrap/bootstrap.min.js"></script>
					<script src="assets/js/libs/spin.js/spin.min.js"></script>
					<script src="assets/js/libs/autosize/jquery.autosize.min.js"></script>
					<script src="assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
					<script src="assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
					<script src="assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
					<script src="assets/js/libs/wizard/jquery.bootstrap.wizard.min.js"></script>
					<script src="assets/js/core/source/App.js"></script>
					<script src="assets/js/core/source/AppNavigation.js"></script>
					<script src="assets/js/core/source/AppOffcanvas.js"></script>
					<script src="assets/js/core/source/AppCard.js"></script>
					<script src="assets/js/core/source/AppForm.js"></script>
					<script src="assets/js/core/source/AppNavSearch.js"></script>
					<script src="assets/js/core/source/AppVendor.js"></script>
					<script src="assets/js/core/demo/Demo.js"></script>
					<script src="assets/js/core/demo/DemoFormWizard.js"></script>
				</body>
			</html>
			<?php 
		}
	}
	else{
		die("<script>window.location.href='logout.php';</script>");
	}
?>