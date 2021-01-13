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
		<form class="form form-validate floating-label" method = 'post' action ='rcptfrmothersreg.php' id = 'rcptfrmothers' novalidate="novalidate">
			<div class="card">
				<div class="card-head style-primary">
					<header>Cash-out Others</header>
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
							<div class = "form-group">
								<input type="text" class = "form-field form-control receiptno" id="receiptno" name="receiptno" required data-rule-minlength="2">
								<label for="receiptno">Voucher no</label>
							</div>
						</div>
						<div class = "col-sm-4">
							<div id = 'errorreceiptno' class = "form-group">
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-6">
							<div class = "form-group">
								<input type="text" class = "form-field form-control dates" id="receiptdate" name="receiptdate" required data-rule-minlength="2">
								<label for="receiptdate">Voucher Date</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-4">
							<div class = "form-group">
								<input type="text" name="amount" id="amount" class = "form-field form-control numbers" data-rule-minlength="2" required>
								<label for="shlot" class = "control-label">Amount</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-8">
							<div class = "form-group">
								<input type="text" name="payer" id="payer" class = "form-field form-control" data-rule-minlength="2" required>
								<label for = 'payer'>Payer</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-8">
							<div class = "form-group">
								<select name="purpose" id="purpose" class = "form-field form-control select-box" required>
								</select>
								<label for = 'purpose'>Purpose</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-8">
							<div class = "form-group">
								<select name="instrument" id="instrument" class = "form-field form-control select-box" required>
								</select>
								<label for = 'instrument'>Instrument</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-8">
							<div class = "form-group">
								<input type="text" class = "form-field form-control refno" id="refno" name="refno" required data-rule-minlength="2" />
								<label for = 'refno'>Ref Number</label>
							</div>
						</div>
						<div class = "col-sm-4">
							<div id = 'errorrefno' class = "form-group">
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-6">
							<div class = "form-group">
								<input type = 'text' name = 'refdate' class = 'form-field form-control dates' id = 'refdate' required />
								<label for="refdate">Ref Date</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-sm-8">
							<div class = "form-group">
								<select name="bank" id="bank" class = "form-control bank select-box form-field" required>
								
								</select>
								<label for = 'bank'>Bank</label>
							</div>
						</div>
					</div>
					<div class = "form-group">
						<textarea id = 'remark' name = 'remark' class = 'form-field form-control'></textarea>
						<label for="remark">Remarks</label>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
					<button type="submit" name = 'cashouttoothers' class="btn btn-primary">SAVE</button>
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
		<script src="../assets/js/cashouttoothers.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>	