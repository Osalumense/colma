<?php
	include_once('../include/config.php');
    include_once('../include/portalfunctions.php');
    
    $sql = "SELECT * FROM instruments";
    $result = $conn->query($sql);
    $instruments = '<option value=""></option>';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $instruments .= '<option value="'.$row['instrumentid'].'" class="text-muted">'.$row['instrument'].'</option>';
    }

    $sql2 = "SELECT * FROM banks";
    $result2 = $conn->query($sql2);
    $banks = '<option value=""></option>';
    while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
        $banks .= '<option value="'.$row2['id'].'" class="text-muted">'.$row2['bankname'].'</option>';
    }
?>
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
		<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/> -->
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
				<header>Share Increment Form</header>
			</div>
			<div class="card-body">
				<div id = 'error'>
					<?php
						// if(isset($_POST['comment']) && $_POST['comment'] != ''){
						// 	echo "<script>alert('" . $_POST['comment'] . "');</script>";
						// 	$_POST['comment'] = '';
						// }
						// if(isset($_POST['error']) && $_POST['error'] != ''){
						// 	echo "<p>" . $_POST['error'] . "</p>";
						// 	$_POST['error'] = '';
						// }
					?>
				</div>
				<div id="rootwizard2" class="form-wizard form-wizard-horizontal">
					<form class="form floating-label form-validation" role="form" novalidate="novalidate" method = 'post' id = 'shareincrementform'>
						<div class="form-wizard-nav">
							<div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
							<ul class="nav nav-justified">
								<li class="active"><a href="#step1" data-toggle="tab"><span class="step">1</span> <span class="title">Share Increment</span></a></li>
								<li><a href="#step2" data-toggle="tab"><span class="step">2</span> <span class="title">Fee</span></a></li>
								<!-- <li><a href="#step3" data-toggle="tab"><span class="step">3</span> <span class="title">Upload</span></a></li> -->
							</ul>
						</div>
						<div class="tab-content clearfix">
							<div class="tab-pane active" id="step1">
								<div class="row">
									<div class="col-sm-8">
										<div class="form-group">
											<input type="text" class="form-control form-field" id="accname1" name="accname1" required data-rule-minlength="2">
											<input type = "text" id = "memid1" hidden>
											<label for = "accname1">Name</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" id = 'prsntshramt' name = 'prsntshramt' class="form-control numbers form-field" required data-rule-minlength="2" readonly>
											<label for="prsntshramt">Present Share Amount</label>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" id = 'prpshramt' name = 'prpshramt' class="form-control numbers form-field" required data-rule-minlength="2">
											<label for="prpshramt">Proposed Share Amount</label>
										</div>
										<div id = 'errorprpshramt'></div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="date" id = 'date' name = 'date' class="form-control form-field dates" required>
											<label for="date">Date To Effect Change</label>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="step2">
										<div class="row">
											<div class = "col-sm-4">
                                                <div class = "form-group">
													<select name="bank" id="bank" class = "form-field form-control bank selectbox text-muted" required>
                                                        <?=$banks?>
                                                    </select>
                                                    
													<label for = 'bank'>Bank</label>
												</div>
											</div>
										
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" class = "form-field form-control receiptno" id="receiptno" name="receiptno" placeholder="" required>
													<label for="receiptno">Receipt no</label>
												</div>
												<div id = 'errorreceiptno' class = "text-danger">
												</div>
											</div>
										
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="date" class = "form-field form-control dates" id="receiptdate" name="receiptdate" required data-rule-minlength="2">
													<label for="receiptdate">Receipt Date</label>
												</div>
											</div>
										</div>
								
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<select name="instrument" id="instrument" class = "form-field form-control instrument selectbox text-muted" required>
                                                        <?=$instruments?>
                                                    </select>
                                                    
													<label for = 'instrument'>Instrument</label>
												</div>
											</div>
										
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" class = "form-field form-control refno" id="refno" name="refno" required>
													<label for = 'refno'>Ref Number</label>
												</div>
												<div id = 'errorrefno' class = "text-danger">
												</div>
											</div>

											<div class = "col-sm-4">
												<div class = "form-group">
													<input type = 'date' name = 'refdate' class = 'form-field form-control dates text-muted' id = 'refdate' required />
													<label for="refdate">Ref Date</label>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-8">
											<div class = "form-group">
													<textarea id = 'remark' name = 'remark' class = 'form-field form-control'></textarea>
														<label for="remark">Remarks</label>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-12">
											<button type="submit" id = 'submitreg' name = 'submitreg' class = "btn btn-primary ink-reaction">Submit</button>
											</div>
										</div>
							</div>
							<!-- <div class="tab-pane" id="step3">
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
								<button type="submit" id = 'submitshareincrement' name = 'submitshareincrement' style = 'display:none' class="btn btn-flat btn-default ink-reaction">Submit</button>
							</div> -->
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

			<div class="modal fade" id="formModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
				<div class="modal-dialog card">
					<div class="modal-content">
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
		<script src="../assets/js/shareincrement.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>