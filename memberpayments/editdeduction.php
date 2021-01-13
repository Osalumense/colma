<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Monthly Deduction</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/wizard/wizard.css?1425466601" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/select21.css" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-head style-primary">
						<header>Edit Monthly Deduction</header>
						
					</div>
					<div class="card-body ">
						<form class="form form-validate floating-label" id = 'searchform' novalidate="novalidate">
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control namesearch" id="memname1" name="memname1" data-rule-minlength="2" placeholder = 'Type to search for member'/>
										<!-- <p class="help-block">Click to activate search</p> -->
										<input type="hidden" id="memid1" name="memid1" />
										<button class="btn btn-secondary" id="searchbtn" name="searchbtn">Search</button>										
									</div>
								</div>
							</div>
						</form>
							<div id="msg"></div>
								<div class="tools" style = "display:none;">
									<a class="btn btn-flat hidden-xs" id ='goback' href="#"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back to search</a>
								</div>
								<div class = 'row' id="displayinfo" style="display:none;">
								<div id = 'table' class="col-sm-12">								
								</div>

								<div class="col-sm-12">
									<button type="submit" id = 'updatememdeduct' name = 'updatememdeduct' class = "btn btn-primary ink-reaction">Update</button>
								</div>
															
							</div>
							
						
					</div>
				</div>
			</div>
		</div>
		<!-- BEGIN JAVASCRIPT -->
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
		<script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/jquery-ui.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<script src="../assets/js/core/demo/DemoFormWizard.js"></script>
		<script src="../assets/js/editdeduction.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>