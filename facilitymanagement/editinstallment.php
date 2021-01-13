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
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">
		<form class="form form-validate floating-label" method = 'post' action ='editinstallmentreg.php' id = 'editinstallment' novalidate="novalidate">
			<div class="card">
				<div class="card-head style-primary">
					<header>Edit Installment</header>
				</div>
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
					<div class = "row">
						<div class = "col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control namesearch" id="member" name="member" required data-rule-minlength="2" readonly />
								<label for = 'member'>Type to Search Member </label>
							</div>
						</div>
					</div>
					<div class = "row table-responsive" id = 'addtable'>
					</div>
					<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
						<div class="modal-dialog card">
							<div class="modal-content">
								<div class="modal-header card-head style-primary">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<header><h4 class="modal-title" id="formModalLabel">Edit Installment</h4></header>
								</div>
								<div class="card-body" id = 'card-body'>
									<div class="modal-body">
										<div class = "row">
											<div class = "col-sm-6">
												<div class="form-group">
													<input type="text" class="form-control" id="membername" name="membername" required data-rule-minlength="2" readonly />
													<label for = 'membername'>Name </label>
												</div>
											</div>
											<div class = "col-sm-3">
												<div class="form-group">
													<input type="text"id="memberid" class="form-control" name="memberid" required readonly />
													<input type="hidden"id="tno" class="form-control" name="tno" required readonly />
													<label for = 'memberid'>Member Id</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-3">
												<div class="form-group">
													<input type = 'text' class="form-control" id = 'facilityname' name = 'facilityname' readonly />
													<label for = 'facilityname'>Facility</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-3">
												<div class="form-group">
													<input type = 'text' class="form-control" id = 'principal' name = 'principal' readonly />
													<label for = 'principal'>Principal</label>
												</div>
											</div>
											<div class = "col-sm-3">
												<div class="form-group">
													<input type = 'text' class="form-control" id = 'interest' name = 'interest' readonly />
													<label for = 'interest'>Interest</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-3">
												<div class="form-group">
													<input type = 'text' class="form-control" id = 'paid' name = 'paid' readonly />
													<label for = 'installment'>Paid</label>
												</div>
											</div>
											<div class = "col-sm-3">
												<div class="form-group">
													<input type = 'text' class="form-control" id = 'balance' name = 'balance' readonly />
													<label for = 'balance'>Balance</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-3">
												<div class="form-group">
													<input type = 'text' class="form-control numbers" name = 'installment' id = 'installment' required data-rule-minlength="2" readonly />
													<label for = 'installment'>Installment</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class="form-group">
													<input type = 'text' class="form-control" name = 'period' id = 'period' readonly />
													<label for = 'period'>Period(In Months)</label>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer card-actionbar">
										<div class="card-actionbar-row">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										<button type="submit" name = 'editinstallmentreg' class="btn btn-primary">SAVE</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<script src="../assets/js/jquery-ui.js" type="text/javascript"></script>
		<script src="../assets/js/editinstallment.js"></script>
		
	</body>
</html>