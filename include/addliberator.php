<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Material Admin - Form Wizard</title>

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
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/wizard/wizard.css?1425466601" />
		<link type="text/css" rel="stylesheet" href="../assets/css/select21.css" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
	</head>
	<body>
		<div class="card">
			<div class="card-head style-primary">
				<header>Add Liberator</header>
			</div>
			<div class="card-body">
				<div id = 'error'></div>
				<div id="rootwizard2" class="form-wizard form-wizard-horizontal">
					<form class="form floating-label form-validation" role="form" novalidate="novalidate" method = 'post' action = 'montsavreg.php'>
						<div class="form-wizard-nav">
							<div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
							<ul class="nav nav-justified">
								<li class="active"><a href="#step1" data-toggle="tab"><span class="step">1</span> <span class="title">Montly Saving Rescheduling</span></a></li>
							</ul>
						</div>
						<div class="tab-content clearfix">
							<div class="tab-pane active" id="step1">
								<div class = "row">
									<div class = "col-sm-4">
										<div class = "form-group">
											<select name="title" id="title" class = "form-field form-control selectbox" required>
											</select>
											<label for = 'title'>Title</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" class="form-control form-field" id="sname" name="sname" required data-rule-minlength="2">
											<label for = "sname">Surname</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<input type = "text" class = "form-control form-field" id = "fname" name = "fname" required data-rule-minlength="2" />
											<label for="fname">Firstname</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<input type = "text" class = "form-control form-field" id = "mname" name = "mname" required data-rule-minlength="2" />
											<label for="mname">Middlename</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type = "text" class = "form-control form-field" id = "mname" name = "mname" required data-rule-minlength="2" />
											<label for="mname">Staff ID</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" id = 'date' name = 'date' class="form-control form-field dates" required>
											<label for="date">Date</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<ul class="pager wizard">
							<li class="previous first"><a class="btn-raised" href="javascript:void(0);">First</a></li>
							<li class="previous"><a class="btn-raised" href="javascript:void(0);">Previous</a></li>
							<li class="next last"><a class="btn-raised" href="javascript:void(0);">Last</a></li>
							<li class="next"><a class="btn-raised" href="javascript:void(0);">Next</a></li>
						</ul><!--end .card-body -->
						
					<!--end .card-actionbar -->
				</div>
			</div>
		</div><!--end .card -->
		</form>
				<!-- BEGIN JAVASCRIPT -->
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../assets/js/libs/wizard/jquery.bootstrap.wizard.min.js"></script>
		<script src="../assets/js/jquery-ui.js" type="text/javascript"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<script src="../assets/js/core/demo/DemoFormWizard.js"></script>
		<script src="../assets/js/addlierator.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>