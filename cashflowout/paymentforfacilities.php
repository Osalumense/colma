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
				<header>Cash-out: Loans</header>
			</div>
			<div class="card-body">
				<form class="form form-validate floating-label" method = 'post' action ='paymentforfacilitiesreg.php' id = 'cashinrepayment' novalidate="novalidate">
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
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="loanregno" name="loanregno" required data-rule-minlength="1" />
								<label for = 'loanregno'>Type Loan Number</label>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="payer" name="payer" required data-rule-minlength="2" readonly />
								<input type="hidden"id="payerid" name="payerid" required data-rule-minlength="2" />
								<label for = 'payer'>Payer </label>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="receiptno" name="receiptno" required data-rule-minlength="2" />
								<label for = 'receiptno'>Voucher Number</label>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="repaymentfor" name="repaymentfor" required data-rule-minlength="2" />
								<input type="hidden" id="repaymentforid" name="repaymentforid" required />
								<label for = 'repaymentfor'>Repayment for</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type = 'text' name = 'receiptdate' class = 'form-control dates' id = 'receiptdate' required>
								<label for="receiptdate">Voucher Date</label>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control numbers" id="amount" name="amount" required data-rule-minlength="2" readonly />
								<label for = 'amount'>Amount</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<select name="instrument" id="instrument" class="select-box form-control" required>
								</select>
								<label for = 'instrument'>Instrument</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="refno" name="refno" required data-rule-minlength="2" />
								<label for = 'refno'>Ref Number</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type = 'text' name = 'refdate' class = 'form-control dates' id = 'refdate' required />
								<label for="refdate">Date</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<select name="bank" id="bank" class="form-control select-box" required>
								</select>
								<label for = 'bank'>BANK</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<textarea name = 'remark' class = 'form-control' id = 'remark' required></textarea>
								<label for = 'remark'>Remark</label>
							</div>
						</div>
					</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<button type="submit" name = 'paymentforfacilities' id = "createform" class="btn btn-flat btn-default ink-reaction">Save</button>
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
		<script src="../assets/js/paymentforfacilities.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>