<?php
	include_once('../include/config.php');
	//include_once('../include/zz.php');
	include_once('../include/portalfunctions.php');
	
	//Get titles from title table
	$titles = '';
	$sq = "SELECT * FROM titles WHERE titlestatus='1'";
	$result = $conn->query($sq);
	$titles .= '<option value="" class="text-muted"></option>';
	
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$titles .= '<option class="text-muted" value="'.$row['titleid'].'">'.ucfirst(strtolower($row['title'])).'</option>';
	}

	//Get genders from gender table
	$gender = '';
	$sql = "SELECT * FROM gender";
	$result = $conn->query($sql);
	$gender .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$gender .= '<option value="'.$row['id'].'">'.ucfirst(strtolower($row['full'])).'</option>';
	}

	//Get marital status from marital status table
	$mstat = '';
	$sql = "SELECT * FROM mstat";
	$result = $conn->query($sql);
	$mstat .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$mstat .= '<option value="'.$row['mstatid'].'">'.ucfirst(strtolower($row['maristatus'])).'</option>';
	}

	//Get states from States table
	$states = '';
	$sql = "SELECT * FROM states";
	$result = $conn->query($sql);
	$states .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$states .= '<option value="'.$row['state_id'].'">'.ucfirst(strtolower($row['state_name'])).'</option>';
	}

	//Get countries from country table
	$country = '';
	$sql = "SELECT * FROM countries";
	$result = $conn->query($sql);
	$country .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$country .= '<option value="'.$row['countrycode'].'">'.ucfirst(strtolower($row['country'])).'</option>';
	}

	//Get wofbi levels from wofbilevel table
	$wofbilvl = '';
	$sql = "SELECT * FROM wofbilevel";
	$result = $conn->query($sql);
	$wofbilvl .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$wofbilvl .= '<option value="'.$row['certid'].'">'.ucwords(strtolower($row['certname'])).'</option>';
	}

	//Get relationships from relationship table
	$relationships = '';
	$sql = "SELECT * FROM relationships";
	$result = $conn->query($sql);
	$relationships .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$relationships .= '<option value="'.$row['relid'].'">'.ucfirst(strtolower($row['relname'])).'</option>';
	}

	//Get group names from groups table
	$groups = '';
	$sql = "SELECT * FROM groupnames";
	$result = $conn->query($sql);
	$groups .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$groups .= '<option value="'.$row['groupid'].'">'.ucfirst(strtolower($row['groupname'])).'</option>';
	}

	//Get group names from groups table
	$instruments = '';
	$sql = "SELECT * FROM instruments";
	$result = $conn->query($sql);
	$instruments .= '<option value=""></option>';
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$instruments .= '<option value="'.$row['instrumentid'].'">'.ucfirst(strtolower($row['instrument'])).'</option>';
	}

	//Get date join church
	$churchstart = 1983;
	$presentyear = date('Y');
	$options = "<option value = ''></option>";
	for($churchstart; $churchstart<=$presentyear; $churchstart++){
		$options .= "<option value = '$churchstart'>$churchstart</option>";
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>View Member</title>

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
						<header>Edit Member</header>
						
					</div>
					<div class="card-body ">
						<div id = 'msg'>
						</div>
						<form class="form form-validate floating-label" id = 'searchform' novalidate="novalidate">
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control namesearch" id="memname1" name="memname1" data-rule-minlength="2" placeholder = 'Type a name to search for member'/>
										<input type="hidden" id="memid1" name="memid1" />
										<button class="btn btn-secondary" id="searchbtn" name="searchbtn">Search</button>	
									</div>
								</div>
							</div>
						</form>
						<div class="tools" style = "display:none;">
							<a class="btn btn-flat hidden-xs" id ='goback' href="#"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back to search</a>
						</div>
						<div id="rootwizard1" class="form-wizard form-wizard-horizontal" style = "display:none;">
							<form class="form floating-label" id="editmemberform">
								<div class="form-wizard-nav">
									<div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
									<ul class="nav nav-justified">
										<li class = "active"><a href="#step1" data-toggle="tab"><span class = "step">1</span> <span class = "title">BioData</span></a></li>
										<li><a href="#step2" data-toggle="tab"><span class = "step">2</span> <span class = "title">Business</span></a></li>
										<li><a href="#step3" data-toggle="tab"><span class = "step">3</span> <span class = "title">Spiritual</span></a></li>
										<li><a href="#step4" data-toggle="tab"><span class = "step">4</span> <span class = "title">Next of Kin</span></a></li>
										<li><a href="#step5" data-toggle="tab"><span class = "step">5</span> <span class = "title">Membership</span></a></li>
										<!-- <li><a href="#step6" data-toggle="tab"><span class = "step">6</span> <span class = "title">Shares</span></a></li>
										<li><a href="#step7" data-toggle="tab"><span class = "step">7</span> <span class = "title">Current Facilities</span></a></li>
										<li><a href="#step8" data-toggle="tab"><span class = "step">8</span> <span class = "title">Facilities History</span></a></li> -->
									</ul>
								</div><!--end .form-wizard-nav -->
								<div class="tab-content clearfix">

									<!-- Beginning of tab1 -->
									<div class="tab-pane active" id="step1">
										<div class="row">
											<input type="text" id="memid" hidden>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="title" 	class="control-label">Title</label>
													<select id="title" class="text-muted form-field form-control">
													<?=$titles?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="sname" class="control-label">Surname</label>
													<input type="text" name="sname" id="sname" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="fname" class="control-label">First name</label>
													<input type="text" name="fname" id="fname" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="mname" class="control-label">Middle name</label>
													<input type="text" name="mname" id="mname" class="form-control">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="dob" class="control-label">Date of birth</label>
													<input type="date" id = 'dob' name = 'dob' class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="gender" class="control-label">Gender</label>
													<select id = 'gender' name = 'gender' class="form-control">
													<?=$gender?>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="mstat">Marital Status</label>
													<select type="text" id = 'mstat' name = 'mstat' class="form-control">
													<?=$mstat?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="nationality">Nationality</label>
													<select type="text" id = 'nationality' name = 'nationality' class="form-control">
													<?=$country?>
													</select>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<label for="add1" class = "control-label">Address1</label>
													<input type="text" id = 'add1' name = 'add1' class = "form-control">
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<label for="add2" class = "control-label">Address2</label>
													<input type="text" id = 'add2' name = 'add2' class = "form-control">
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<label for="town" class = "control-label">Town</label>
													<input type="text" id = 'town' name = 'town' class = "form-control">
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<label for="state">State</label>
													<select type="text" id = 'state' name = 'state' class = "form-control">
													<?=$states?>
													</select>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<label for="country">Country</label>
													<select type="text" id = 'country' name = 'country' class = "form-control">
													<?=$country?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="phoneno" class="control-label">Mobile Number</label>
													<input type="text" id = 'phoneno' name = 'phoneno' class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="email" class="control-label">Email</label>
													<input type="email" name="email" id="email" class="form-control" data-rule-email="true">
													</div>
											</div>
										</div>
									</div>
									<!-- End of tab 1 -->
									
									<!-- Beginning of tab 2 -->
									<div class="tab-pane" id="step2">
										<div class="form-group">
											<label for="busnature" class="control-label">Nature of Business</label>
											<input type="text" name="busnature" id="busnature" class="form-control">
										</div>
										<fieldset>
											
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="busadd1" class = "control-label">Business Address1</label>
														<input type="text" name="busadd1" id="busadd1" class = "form-control">
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="busadd2" class = "control-label">Business Address2</label>
														<input type="text" id = 'busadd2' name = 'busadd2' class = "form-control">
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="bustown" class = "control-label">Business Town</label>
														<input type="text" id = 'bustown' name = 'bustown' class = "form-control">
													</div>
												</div>
											</div>
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="busstate">Business State</label>
														<select type="text" id = 'busstate' name = 'busstate' class = "form-control">
														<?=$states?>
														</select>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="buscountry">Business Country</label>
														<select type="text" id = 'buscountry' name = 'buscountry' class = "form-control">
														<?=$country?>
														</select>
													</div>
												</div>
											</div>		
										</fieldset>
									</div><!--end #step1 -->
									<!-- End of tab 2 -->

									<!-- Beginning of tab 3 -->
									<div class="tab-pane" id="step3">
										<br/><br/>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="joinchurch" class="control-label">Year when you joined the church</label>
													<select name="joinchurch" id="joinchurch" class = "form-field form-control" required>
													<?=$options?>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="wofbi" class="control-label">WOFBI Level</label>
													<select type="text" name="wofbi" id="wofbi" class="form-control">
													<?=$wofbilvl?>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="wsflocation" class="control-label">WSF Location</label>
													<input type="text" name="wsflocation" id="wsflocation" class="form-control" readonly />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="province" class="control-label">Province</label>
													<input type="text" name="province" id="province" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="district" class="control-label">District</label>
													<input type="text" name="district" id="district" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label for="zone" class="control-label">Zone</label>
													<input type="text" name="zone" id="zone" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<!-- End of tab 3 -->

									<!-- Beginning of tab 4 -->
									<div class="tab-pane" id="step4">
										<br/><br/>
										<fieldset>
								
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label for="nktitle">Title</label>
														<select name="nktitle" id="nktitle" class="form-control">
														<?=$titles?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label for="nksname" class="control-label">Surname</label>
														<input type="text" name="nksname" id="nksname" class="form-control">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label for="nkfname" class="control-label">First name</label>
														<input type="text" name="nkfname" id="nkfname" class="form-control">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label for="nkmname" class="control-label">Middle name</label>
														<input type="text" name="nkmname" id="nkmname" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="nkrel" class="control-label">Relationship with you</label>
												<select type="text" name="nkrel" id="nkrel" class="form-control">
												<?=$relationships?>
												</select>
											</div>
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="nkadd1" class = "control-label">Address1</label>
														<input type="text" name="nkadd1" id="nkadd1" class = "form-control">
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="nkadd2" class = "control-label">Address2</label>
														<input type="text" id = 'nkadd2' name = 'nkadd2' class = "form-control">
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="nktown" class = "control-label">Town</label>
														<input type="text" id = 'nktown' name = 'nktown' class = "form-control">
													</div>
												</div>
											</div>
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="nkstate">State</label>
														<select type="text" id = 'nkstate' name = 'nkstate' class = "form-control">
														<?=$states?>
														</select>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<label for="nkcountry">Country</label>
														<select type = 'text' id = 'nkcountry' name = 'nkcountry' class = "form-control countries">
														<?=$country?>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id = 'nkphoneno' name = 'nkphoneno' class="form-control textbox">
															<label for="nkphoneno" class="control-label">Mobile Number</label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<input type="email" name="nkemail" id="nkemail" class="form-control textbox" data-rule-email="true">
															<label for="nkemail" class="control-label">Email</label>
														</div>
													</div>
												</div>
											</div>
										</fieldset>
									</div><!--end #step2 -->
									<div class="tab-pane" id="step5">
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<label for="datejoin" class = "control-label">Date of Registration</label>
													<input type="text" id = 'datejoin' name = 'datejoin' class = "form-control" disabled/>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
													<label for="grpname" class="control-label">Group Name</label>
													<select name="grpname" id="grpname" class="form-control">
														<?=$groups?>
													</select>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
													<label for="grpname" class="control-label">Office</label>
													<input type="text" name="office" id="office" class="form-control" disabled>
													
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="monthsave" class="control-label">Monthly Savings</label>
													<input type="text" id = 'monthsave' name = 'monthsave' class="form-control" readonly>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
													<label for="shares" class="control-label">Current Share Holdings</label>
													<input type="text" id = 'shares' name = 'shares' class="form-control" readonly />
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
													<label for="accno" class="control-label">Account Number</label>
													<input type="text" id = 'accno' name = 'accno' class="form-control" readonly />
												</div>
											</div>
										</div>	
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="totsavings" class="control-label">Total Savings</label>
													<input type="text" id = 'totsavings' name = 'totsavings' class="form-control" readonly/>
												</div>
											</div>	

											<div class="col-sm-4">
												<div class="form-group">
													<label for="debts" class="control-label">Total Facility Balance</label>
													<input type="text" id = 'debts' name = 'debts' class="form-control" readonly />
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
													<label for="curr_balance" class="control-label">Current Balance</label>
													<input type="text" id = 'curr_balance' name = 'curr_balance' class="form-control" readonly />
												</div>
											</div>									
										</div>

										<div class="row">
											<div class="col-sm-4">
												<br><button type="submit" id = 'submitreg' name = 'submitreg' class = "btn btn-primary ink-reaction">Update</button>
											</div>
										</div>
									</div>

									<!-- <div class = "tab-pane" id="step6">
										<h3>SHARES HISTORY</h3>
										<table id="share_table" class="display table-striped table table-sm ">
											<thead>
												<tr>
													<th>S/N</th>
													<th>Date</th>
													<th>Share Amount</th>
													<th>Receipt Number</th>
													<th>Receipt Date</th>
													<th>Instrument</th>
													<th>Ref Number</th>
													<th>Bank</th>
													<th>Remarks</th>
												</tr>
											</thead>
											<tbody id="share_tbl_body">
											</tbody>
											<tfoot id="share_tbl_footer"></tfoot>
										</table>
									</div>

									<div class = "tab-pane" id="step7">
										<h3>CURRENT FACILITIES</h3>
										<table id="currfacilities_table" class="col-sm-8 display table-striped table table-sm ">
											<thead>
												<tr>
													<th>S/N</th>
													<th>Date Requested</th>
													<th>Date Approved</th>
													<th>Facility</th>
													<th>Purpose</th>
													<th>Principal</th>
													<th>Period</th>
													<th>Interest</th>
													<th>Instalment</th>
													<th>Amount Paid</th>
													<th>Balance</th>
													<th>Guarantor 1</th>
													<th>Guarantor 2</th>
												</tr>
											</thead>
											<tbody id="currfacilities_table_body">
											</tbody>
										</table>										
									</div> 
									
									<div class = "tab-pane" id="step8">
																			
									</div> -->

								</div>
								<ul class="pager wizard">
									<li class="previous first"><a class="btn-raised" href="javascript:void(0);">First</a></li>
									<li class="previous"><a class="btn-raised" href="javascript:void(0);">Previous</a></li>
									<li class="next last"><a class="btn-raised" href="javascript:void(0);">Last</a></li>
									<li class="next"><a class="btn-raised" href="javascript:void(0);">Next</a></li>
								</ul>
							</form>
						</div><!--end #rootwizard -->
					</div><!--end .card-body -->
				</div><!--end .card -->
			</div><!--end .col -->
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
		<script src="../assets/js/editmemberrecord.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>