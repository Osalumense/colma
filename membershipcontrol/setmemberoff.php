<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="../assets/css/select21.css" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
	</head>
	<body>
		<div class="card">
			<div class="card-head style-primary">
				<header>SET MEMBER OFF</header>
				<div class="tools">
					<a class="btn btn-flat hidden-xs" id ='goback' href="#"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back to search</a>
				</div>
			</div>
			<div class="card-body">
				<form class="form form-validate floating-label" id = 'searchform' novalidate="novalidate">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control namesearch" id="memname1" name="memname1" required data-rule-minlength="2" placeholder = 'Type to search for member' readonly />
								<p class="help-block">Click to activate search</p>
								<input type="hidden" id="memid1" name="memid1" />
								
							</div>
						</div>
					</div>
				</form>
				<section class="full-bleed hidesection" style = 'display:none;'>
					<div class="section-body style-primary force-padding">
						<div class="img-backdrop" style="background-image: url('../assets/img/img16.jpg')"></div>
						<div class="overlay stick-top-left height-3"></div>
						<div class="row">
							<div class="col-md-4 col-xs-5">
								<img class="img-circle border-white border-xl img-responsive auto-width" src="../assets/img/avatar1.jpg?1403934956" alt="" />
								<strong class="text-xl" id = 'name'></strong><br/>
									<span class="text-light opacity-75">Name</span>
								<!--end .col -->
								</div>
							<div class="col-md-2 col-xs-3">
								<div class="row">
									<div class="width-3 text-center pull-right">
										<strong class="text-xl" id = 'gender'></strong><br/>
										<span class="text-light opacity-75">Gender</span>
									</div>
								</div>
								<div class="row">
									<div class="width-3 text-center pull-right">
										<strong class="text-xl" id = 'phoneno'></strong><br/>
										<span class="text-light opacity-75">Mobile no</span>
									</div>
								</div>
								<div class="row">
									<div class="width-3 text-center pull-right">
										<strong class="text-xl" id = 'coopno'></strong><br/>
										<span class="text-light opacity-75">Coop no</span>
									</div>
							</div><!--end .col -->
							</div>
							<div class="col-md-6 col-xs-4">
								<div class="row">
									<div class="text-center pull-right">
										<div class="row">
											<strong class="text-xl" id = 'djoin'></strong><br/>
										</div>
										<div class="row">
											<span class="text-light opacity-75">Date Join</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="text-center pull-right">
										<div class="row">
											<strong class="text-xl" id = 'street'></strong><br/>
										</div>
										<div class="row">
											<span class="text-light opacity-75">Street</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="text-center pull-right">
										<div class="row">
											<strong class="text-xl" id = 'city'></strong><br/>
										</div>
										<div class="row">	
											<span class="text-light opacity-75">City/Town</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="text-center pull-right">
										<div class="row">
											<strong class="text-xl" id = 'state'></strong><br/>
										</div>
										<div class="row">
											<span class="text-light opacity-75">State</span>
										</div>
									</div>
								</div>
							</div><!--end .col -->
						</div>
					</div><!--end .section-body -->
				</section>
				<section class = 'hidesection' style = 'display:none;'>
					<div class="section-body no-margin">
						<div class="row">
							<div class="col-md-12">
								<!-- BEGIN ENTER MESSAGE -->
								<form  class="form form-validate floating-label" id = 'setoffform' novalidate="novalidate" method = 'post' action = 'setmemberoffreg.php'>
									<div class="card no-margin">
										<div class="card-body">
											<div class="form-group">
												<?php
													if(isset($_POST['comment']) && $_POST['comment'] != ''){
														echo "<script>alert('" . $_POST['comment'] . "');</script>";
														$_POST['comment'] = '';
													}
													if(isset($_POST['error']) && $_POST['error'] != ''){
														echo "<p>" . $_POST['error'] . "</p>";
														$_POST['error'] = '';
													}
												?>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<select name="setoffreason" id="setoffreason" class="form-control" required>
														</select>
														<label for="setoffreason">Reason</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type = 'text' name = 'setoffdate' class = 'form-control' id = 'setoffdate' required>
														<input type = 'hidden' name = 'memberid' id = 'memberid' required>
														<label for="setoffdate">Close Out Date</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<textarea name="setoffremark" id="setoffremark" class="form-control autosize" rows="1" required data-rule-minlength="2"></textarea>
												<label for="status">Remark</label>
											</div>
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type = 'submit' id = 'submitsetoff' name = 'submitsetoff' class="btn btn-flat btn-accent ink-reaction">Submit</button>
											</div><!--end .card-actionbar-row -->
										</div><!--end .card-actionbar -->
									</div><!--end .card -->
								</form>
							</div><!--end .col -->
						</div>
					</div>
				</SECTION>	
			</div>
		</div>
				<!-- BEGIN JAVASCRIPT -->
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/jquery-ui.js" type="text/javascript"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<script src="../assets/js/setmemberoff.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>