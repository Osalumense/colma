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
				<header>CLOSE OUT AN OFFICER</header>
			</div>
			<div class="card-body">
				<form class="form form-validate floating-label" method = 'post' action ='#' id = 'cashinrepayment' novalidate="novalidate">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type = 'text' name = 'payer' class = 'form-control' id = 'payer' required data-rule-minlength="2" required>
								<label for="payer">NAME</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control numbers" id="payerid" name="payerid" required data-rule-minlength="2" readonly />
								<label for = 'payerid'>COOP NO</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type = 'text' class="form-control dates" id="datein" name="datein" required data-rule-minlength="2" readonly />
								<label for = 'datein'>DATE IN</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type = 'text' class="form-control" id="post" name="post" required data-rule-minlength="2" readonly />
								<label for = 'post'>POST</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type = 'text' class="form-control dates" id="dateout" name="dateout" required data-rule-minlength="2" readonly />
								<label for = 'dateout'>DATE OUT</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<textarea name = 'remarks' class = 'form-control dates' id = 'remarks' data-rule-minlength="2" required ></textarea>
								<label for="remarks">REMARKS</label>
							</div>
						</div>
					</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<button type="submit"  id = "createform" class="btn btn-flat btn-default ink-reaction">SAVE</button>
				</div>
				
				</form>
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
		<script src="../assets/js/officerclose.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>