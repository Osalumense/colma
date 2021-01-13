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
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="../assets/css/select21.css" />
	</head>
	<body>
		<form class="form form-validate floating-label" action="facilityregisteruploads.php" method="post" enctype="multipart/form-data" onsubmit="AJAXSubmit(this); return false;" novalidate="novalidate">
			<div class="card">
				<div class="card-head style-primary">
					<header>Imprest Expense</header>
				</div>
				<div class="card-body">		
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<a href="facilitybulkupload.csv"  class = "btn btn-default">Download Sample CSV</a>
							</div>
						</div>	
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<select name = 'facility' id = 'facility' class = 'form-control select-box'>
								</select>
								<label for = 'facility'>Facility</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label btn btn-default btn-file" for = 'csv'>Click to select csv file :
									<input type="file" name="csv" id = 'csv' hidden>
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<button class="btn btn-default" type="submit" >Submit</button>
							</div>
						</div>
					</div>
					<div class = 'form-group'>
						<img id = 'loading-image' style = 'display:none' src="../assets/images/ui-anim_basic_16x16.gif" alt="load Icon">
					</div>
					<div class="row">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div style = 'display: none;' id="error">
								</div>
							</div>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-sm-6" id = 'display'>
							<div class="form-group">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<div id = 'hidden' style = "display: none;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
				<!-- BEGIN JAVASCRIPT -->
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
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
		<script src="../assets/js/facilityregister.js"></script>			
	</body>
</html>						