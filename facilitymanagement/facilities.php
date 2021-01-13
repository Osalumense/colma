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
		<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/> -->
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="../assets/css/select21.css" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
	</head>
	<body>
		<div class="card">
			
			<div >
			</div>
			
			<div class="card-head style-primary">
				<header>Add New Facility</header>
			</div>
			<div class="card-body">
				<form class="form form-validate floating-label" id = 'addfacility' novalidate="novalidate">
					<div class="row mx-3">
						<div class="col-sm-5">
							<div class="form-group">
								<input type="text" class="form-control" id="facilityname" name="facilityname" required data-rule-minlength="2" />
								<label for = 'facilityname'>FACILITY NAME</label>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="form-group">
								<input type="text" class="form-control numbers" id="facilityfee" name="facilityfee" required data-rule-minlength="2" />
								<label for = 'facilityfee'>FACILITY FEE</label>
							</div>
						</div>
					</div>
			</div>
			
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<input type="submit"  name = "facilities" id="save_facility" class="btn btn-flat btn-default ink-reaction" value = "Save"/>
				</div>				
				</form>
			</div>

			<div class="modal fade" id="formModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
				<div class="modal-dialog card">
					<div class="modal-content">
						<div class="modal-header card-head style-primary">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<!-- <header><h4 class="modal-title" id="formModalLabel">Edit Facility</h4></header> -->
						</div>
						<div class="card-body" id = 'card-body'>
							<div class="modal-body" id="msg"></div>
							<div class="modal-footer card-actionbar">
								<div class="card-actionbar-row">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
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
		<script src="../assets/js/facilities.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>