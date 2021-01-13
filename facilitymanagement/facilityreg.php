<?php
	include_once('../include/config.php');
	//include_once('../include/zz.php');
	include_once('../include/portalfunctions.php');
	$sql = "SELECT * FROM facilitytypes WHERE fstatus != '0' AND factypeid NOT IN (1,2,3,5)";
	$result = $conn->query($sql);
	$facility = '<option value=""></option>';
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$facility .= '<option value="'.$row['factypeid'].'" class="text-muted">'.$row['facility'].'</option>';
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Facility Application</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/wizard/wizard.css?1425466601" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/select21.css" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-head style-primary">
						<header>Apply For A Facility - Admin</header>
						
					</div>
					<div class="card-body ">
						<div id = 'error'>
						</div>

						<div id="rootwizard1" class="form-wizard form-wizard-horizontal">
							<form class="form floating-label" id="application-form">
								<div class = "form-wizard-nav">
									<div class = "progress"><div class = "progress-bar progress-bar-primary"></div></div>
									<ul class = "nav nav-justified">
										<li class = "active"><a href="#step1" data-toggle="tab"><span class = "step">1</span> <span class = "title">Facility Application</span></a></li>
										<li><a href="#step2" data-toggle="tab"><span class = "step">2</span> <span class = "title">Application Fee</span></a></li>
									</ul>
								</div>
							   <br>
							   <div class = "tab-content clearfix">
							   		<div class = "tab-pane active" id="step1">
                                        <div class="row">
											<div class = "col-sm-5">
												<div class = "form-group">
													<input id = 'membername' class = 'form-field form-control' name = 'membername' required>
													<label for="membername">Member Name</label>
													<input type="text" id="memid" hidden>
												</div>
										    </div>
                                            <div class = "col-sm-3">
												<div class = "form-group">
													<select id = 'facilitytype' class = 'form-field form-control selectbox text-muted' name = 'facilitytype' required>
													<?=$facility?>												
													</select>
													<label for="facilitytype">Facility Type</label>
												</div>
										    </div>

											<div class = "col-sm-2">
												<div class = "form-group">
													<input id = 'interest' class = 'form-field form-control text-muted' name = 'interest' disabled required>
													<label for="interest">Interest Rate</label>
												</div>
										    </div>

											<div class = "col-sm-2">
												<div class = "form-group">
													<input id = 'maxperiod' class = 'form-field form-control text-muted' name = 'maxperiod' disabled required>
													<label for="maxperiod">Maximum Period</label>
												</div>
										    </div>			
										</div>

										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
                                                    <input type="text" id = 'loanamount' name = 'loanamount' class = "form-field form-control number" required>
													<label for="loanamount" class = "control-label">Loan Amount</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
                                                    <input type="number" id = 'periodinmnths' name = 'periodinmnths' class = "form-field form-control" required>
													<input type="text" id="maxamount" hidden>
													<label for="periodinmnths" class = "control-label">Period in Months</label>
												</div>
											</div>

											<div id="instalmentrow">
												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" id = 'interestamt' name = 'interestamt' class = "form-field form-control " required disabled>
														<label for="interestamt" class = "control-label">Interest Amount</label>
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" id = 'instalment' name = 'instalment' class = "form-field form-control number" required disabled>
														<label for="instalment" class = "control-label">Monthly Instalment Amount</label>
													</div>
												</div>
											</div>
														
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" id = 'purpose' name = 'purpose' class="form-control" required>
                                                    <label for="purpose" class="control-label">Reason For Loan</label>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-5">
												<div class="form-group">
                                                    <input type="text" id = 'guarantor1' name = 'guarantor1'class="form-control" required>
                                                    <label for="guarantor1" class="control-label">Enter Guarantor 1</label>
													<input type="text" id="guarantor1id" hidden>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
                                                    <input type="text" id = 'gamount1' name = 'gamount1' class="form-control number" required>
                                                    <label for="gamount1" class="control-label">Guarantor 1 Amount</label>
												</div>
											</div>
											
										</div>

										<div class = "row">
										    <div class="col-sm-5">
												<div class="form-group">
                                                    <input type="text" id = 'guarantor2' name = 'guarantor2'class="form-control" required>
                                                    <label for="guarantor2" class="control-label">Enter Guarantor 2</label>
													<input type="text" id="guarantor2id" hidden>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
                                                    <input type="text" id = 'gamount2' name = 'gamount2' class="form-control number" required>
                                                    <label for="gamount2" class="control-label">Guarantor 2 Amount</label>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-5">
												<div class="form-group">
                                                    <input type="text" id = 'witness' name = 'witness'class="form-control" required>
                                                    <label for="witness" class="control-label">Enter Witness</label>
													<input type="text" id="witnessid" hidden>
												</div>
											</div>											
										</div>
									</div>										

									<div class = "tab-pane" id="step2">

										<div class="row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" name="appfee" id="appfee" class = " form-control number" disabled>
													<label for="appfee" class = "control-label">Application Fee</label>
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

										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<select name="bank" id="bank" class = "form-field form-control bank selectbox text-muted" required>
													</select>
													<label for = 'bank'>Bank</label>
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
								</div><!--end .tab-content -->

								<ul class = "pager wizard">
									<li class = "previous first"><a class = "btn-raised" href="javascript:void(0);">First</a></li>
									<li class = "previous"><a class = "btn-raised" href="javascript:void(0);">Previous</a></li>
									<li class = "next last"><a class = "btn-raised" href="javascript:void(0);">Last</a></li>
									<li class="next"><a class="btn-raised" href="javascript:void(0);">Next</a></li>
								</ul>
								
							</form>
						</div><!--end #rootwizard -->

					</div><!--end .card-body -->
				</div><!--end .card -->
			</div><!--end .col -->
		</div>

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
		<script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/jquery-ui.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<script src="../assets/js/core/demo/DemoFormWizard.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/facilityreg.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>