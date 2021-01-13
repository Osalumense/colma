<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Material Admin - Responsive tables</title>

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
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">
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
		<div class="card">
			<div class="card-head style-primary">
				<header>VIEW FACILITIES</header>
			</div>
			<div class="card-body" id = 'card-body'>
			</div>
		</div>
		<div class="modal fade" id="formModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog card">
				<div class="modal-content">
					<div class="modal-header card-head style-primary">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<header><h4 class="modal-title" id="formModalLabel">Edit Facility</h4></header>
					</div>
					<div class="card-body" id = 'card-body'>
						<form class="form-horizontal form form-validate" role="form" method = 'post' action ='editfacilitiesreg.php' novalidate="novalidate">
							<div class="modal-body">
								<div class="form-group">
									<div class="col-sm-3">
										<label for="facility" class="control-label">Facility</label>
									</div>
									<div class="col-sm-9">
										<input type="text" name="facility" id="facility" class="form-control" placeholder="Facility" required data-rule-minlength="2">
										<input type="hidden" name="facilityid" id="facilityid" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label for="facilityfee" class="control-label numbers">Facility Fee</label>
									</div>
									<div class="col-sm-9">
										<input type="text" name="facilityfee" id="facilityfee" class="form-control numbers" placeholder="Facility Fee" required data-rule-minlength="2" />
									</div>
								</div>
							</div>
							<div class="modal-footer card-actionbar">
								<div class="card-actionbar-row">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" name = 'editfacilities' class="btn btn-primary" id='editfacilities'>SAVE</button>
								</div>
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
		</div>
		</div>
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../assets/js/editfacilities.js"></script>
		
	</body>
</html>