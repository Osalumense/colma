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
				<header>MONTHLY SAVINGS RESCHEDULING FORM</header>
			</div>
			<div class="card-body">
				<div id = 'error'>
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
				<div id="rootwizard2" class="form-wizard form-wizard-horizontal">
					<form class="form floating-label form-validation" role="form" novalidate="novalidate" method = 'post' action = 'montsavreg.php'>
						<div class="form-wizard-nav">
							<div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
							<ul class="nav nav-justified">
								<li class="active"><a href="#step1" data-toggle="tab"><span class="step">1</span> <span class="title">Montly Saving Rescheduling</span></a></li>
								<li><a href="#step2" data-toggle="tab"><span class="step">2</span> <span class="title">Fee</span></a></li>
								<li><a href="#step3" data-toggle="tab"><span class="step">3</span> <span class="title">Upload</span></a></li>
							</ul>
						</div>
						<div class="tab-content clearfix">
							<div class="tab-pane active" id="step1">
								<div class="row">
									<div class="col-sm-8">
										<div class="form-group">
											<input type="text" class="form-control namesearch form-field" id="accname1" name="accname1" required data-rule-minlength="2">
											<label for = "accname1">Name</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<input type = "text" class = "form-control form-field" id = "memid1" name = "memid1" required data-rule-minlength="2" />
											<label for="memid1">Member ID</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="text" id = 'prsntmontcontr' name = 'prsntmontcontr' class="form-control numbers form-field" required data-rule-minlength="2" readonly>
									<label for="prsntmontcontr">Present Monthly Contribution</label>
								</div>
								<div class="form-group">
									<input type="text" id = 'prpmontcontr' name = 'prpmontcontr' class="form-control numbers form-field" required data-rule-minlength="2">
									<label for="prpmontcontr">Propose Monthly Contribution</label>
								</div>
								<div class="form-group">
									<input type="text" id = 'month' name = 'month' class="form-control form-field dates" required>
									<label for="month">Month to commence deduction</label>
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
							<div class="tab-pane" id="step2">
								<div class = "row">
									<div class = "col-sm-6">
										<div class = "form-group">
											<input type="text" class = "form-field form-control receiptno" id="receiptno" name="receiptno" required data-rule-minlength="2">
											<label for="receiptno">Receipt no</label>
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
											<label for="receiptdate">Receipt Date</label>
										</div>
									</div>
								</div>
								<div class = "row">
									<div class = "col-sm-4">
										<div class = "form-group">
											<input type="text" name="savingappamount" id="savingappamount" class = "form-field form-control numbers" data-rule-minlength="2" required>
											<label for="shlot" class = "control-label">SavingsApplicationAmount</label>
										</div>
									</div>
									<div class = "col-sm-4">
										<div class = "form-group">
											<div id = 'erroramount'></div>
										</div>
									</div>
								</div>
								<div class = "row">
									<div class = "col-sm-8">
										<div class = "form-group">
											<select name="instrument" id="instrument" class = "form-field form-control instrument selectbox" required>
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
											<select name="bank" id="bank" class = "form-field form-control bank selectbox" required>
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
							<div class="tab-pane" id="step3">
								<div class = "row">
									<div class = 'col-sm-6'>
										<div class = "form-group">
											<input type = 'file' name = 'frontform' class = 'form-field' id = 'frontform'>
											<label for = 'frontform'>Form Upload</label>
										</div>
									</div>
								</div>
								<div class = "row">
									<div class = 'col-sm-6'>
										<div class = "form-group">
											<input type = 'file' name = 'receiptupload' class = 'form-field' id = 'receiptupload'>
											<label for = 'receiptupload'>Receipt</label>
										</div>
									</div>
								</div>
								<div class = "row">
									<div class = 'col-sm-6'>
										<div class = "form-group">
											<input type = 'file' name = 'instrumentupload' class = 'form-field' id = 'instrumentupload'>
											<label for = 'instrumentupload'>Instrument</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="checkbox checkbox-styled">
										<label>
											<input type="checkbox" name="terms1" id="terms1" required />
											<span>I have filled the form.</span>
										</label>
									</div>
								</div>
								<button type="submit" id = 'submitmontsav' name = 'submitmontsav' style = 'display:none' class="btn btn-flat btn-default ink-reaction">Submit</button>
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
		<script src="../assets/js/montsav.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>