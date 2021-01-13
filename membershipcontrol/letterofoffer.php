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
		<form class="form form-validate floating-label" novalidate="novalidate">
			<div class="card">
				<div class="card-head style-primary">
					<header>MONTHLY SAVINGS RESCHEDULING FORM</header>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control namesearch" id="accname1" name="accname1" required data-rule-minlength="2">
								<label for = "accname1">Name</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type = "text" class = "form-control" id = "memid1" name = "memid1" required data-rule-minlength="2" />
								<label for="memid1">Member ID</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="text" id = 'amount' name = 'amount' class="form-control numbers" required data-rule-minlength="2">
						<label for="amount">Present Monthly Contribution</label>
					</div>
					<div class="form-group">
						<input type="text" id = 'amount' name = 'amount' class="form-control numbers" required data-rule-minlength="2">
						<label for="amount">Propose Monthly Contribution</label>
					</div>
					<div class="form-group">
						<input type="text" id = 'amount' name = 'amount' class="form-control" required data-rule-minlength="2">
						<label for="amount">Amount</label>
					</div>
					<fieldset>
						<legend>Transfer To</legend>
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<input type="text" class="form-control namesearch" id="accname2" name="accname2" required data-rule-minlength="2">
									<input type="hidden" id="memid2" name="memid2">
									<label for="accname2">Account Name</label>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<input type="text" id = 'accno2' name = 'accno2' class="form-control" required data-rule-minlength="2">
									<label for="accno2">Account No</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<input type="text" id = 'date' name = 'date' class="form-control" required>
									<label for="date">Date</label>
								</div>
							</div>
						</div>
					</fieldset>
				</div><!--end .card-body -->
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<button type="submit" class="btn btn-flat btn-primary ink-reaction">Validate</button>
					</div>
				</div><!--end .card-actionbar -->
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
		<script src="../assets/js/transferform.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>