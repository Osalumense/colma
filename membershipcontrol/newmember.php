<!DOCTYPE html>
<html lang="en">
	<head>
		<title>New Member</title>

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
		<link type="text/css" rel="stylesheet" href="../assets/css/select21.css" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
	</head>
	<body>
		<div class = "row">
			<div class = "col-lg-12">
				<div class = "card">
					<div class = "card-head style-primary">
						<header>Add Member</header>
					</div>
					<div class = "card-body">
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

						<div id="msg">
						</div>
						
						<div id="rootwizard2" class = "form-wizard form-wizard-horizontal">
							<form class = "form floating-label form-validation" role="form" novalidate="novalidate" enctype="multipart/form-data" method = 'post'>
								<div class = "form-wizard-nav">
									<div class = "progress"><div class = "progress-bar progress-bar-primary"></div></div>
									<ul class = "nav nav-justified">
										<li class = "active"><a href="#step1" data-toggle="tab"><span class = "step">1</span> <span class = "title">Personal Data</span></a></li>
										<li><a href="#step2" data-toggle="tab"><span class = "step">2</span> <span class = "title">Business Data</span></a></li>
										<li><a href="#step3" data-toggle="tab"><span class = "step">3</span> <span class = "title">Spiritual Data</span></a></li>
										<li><a href="#step4" data-toggle="tab"><span class = "step">4</span> <span class = "title">Next of Kin Data</span></a></li>
										<li><a href="#step5" data-toggle="tab"><span class = "step">5</span> <span class = "title">Membership</span></a></li>
										<li><a href="#step6" data-toggle="tab"><span class = "step">6</span> <span class = "title">Registration Fee</span></a></li>
										<li><a href="#step7" data-toggle="tab"><span class = "step">7</span> <span class = "title">Share Data</span></a></li>
										<li><a href="#step8" data-toggle="tab"><span class = "step">8</span> <span class = "title">Uploads</span></a></li>
									</ul>
								</div>
								<div class = "tab-content clearfix">
									<div class = "tab-pane active" id="step1">
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<select name="title" class = "form-field form-control selectbox" id="title" required>
														<option value = '' selected></option>
													</select>
													<label for="title" class = "control-label">Title</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" name="sname" id="sname" class = "form-field form-control" data-rule-minlength="2" required>
													<label for="sname" class = "control-label">Surname</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" name="fname" id="fname" class = "form-field form-control" data-rule-minlength="2" required>
													<label for="fname" class = "control-label">First name</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" name="mname" id="mname" class = "form-field form-control" data-rule-minlength="2">
													<label for="mname" class = "control-label">Middle Name</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'dob' name = 'dob' class = "form-field form-control dates" required readonly>
													<label for="dob" class = "control-label">Date of birth</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<select id = 'gender' class = 'form-field form-control selectbox' name = 'gender' required>
													</select>
													<label for="gender">Gender</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<select id = 'mstat' class = "form-field form-control selectbox" name = 'mstat' required>
													</select>
													<label for="mstat">Marital status</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<select id = 'nationality' class = 'form-field form-control selectbox countries' name = 'nationality' required>
													</select>
													<label for="nationality">Nationality</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'add1' name = 'add1' class = "form-field form-control" data-rule-minlength="2" required>
													<label for="add1" class = "control-label">Address1</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'add2' name = 'add2' class = "form-field form-control" data-rule-minlength="2" required>
													<label for="add2" class = "control-label">Address2</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'town' name = 'town' class = "form-field form-control" data-rule-minlength="2" required>
													<label for="town" class = "control-label">Town</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-6">
												<div class = "form-group">
													<select id = 'state' name = 'state' class = "form-field form-control selectbox states"  required>
													</select>
													<label for="state">State</label>
												</div>
											</div>
											<div class = "col-sm-6">
												<div class = "form-group">
													<select id = 'country' name = 'country' class = "form-field form-control selectbox countries"  required>
													</select>
													<label for="country">Country</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'phoneno' name = 'phoneno' class = "form-field form-control" data-rule-minlength="2" required>
													<label for="phoneno" class = "control-label">Mobile Number</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="email" name="email" id="email" class = "form-field form-control" data-rule-email="true" required>
													<label for="email" class = "control-label">Email</label>
													</div>
											</div>
										</div>
									</div>
									<div class = "tab-pane" id="step2">
										<div class = "form-group">
											<input type="text" name="busnature" id="busnature" class = "form-field form-control" data-rule-minlength="2" required>
											<label for="busnature" class = "control-label">Nature of Business</label>
										</div>
										<fieldset>
										
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" name="busadd1" id="busadd1" class = "form-field form-control" data-rule-minlength="2" required>
														<label for="busadd1" class = "control-label">Business Address1</label>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" id = 'busadd2' name = 'busadd2' class = "form-field form-control" data-rule-minlength="2" required>
														<label for="busadd2" class = "control-label">Business Address2</label>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" id = 'bustown' name = 'bustown' class = "form-field form-control" data-rule-minlength="2" required>
														<label for="bustown" class = "control-label">Business Town</label>
													</div>
												</div>
											</div>
											<div class = "row">
												<div class = "col-sm-6">
													<div class = "form-group">
														<select id = 'busstate' name = 'busstate' class = "form-field form-control selectbox states" required>
														</select>
														<label for="busstate">Business State</label>
													</div>
												</div>
												<div class = "col-sm-6">
													<div class = "form-group">
														<select id = 'buscountry' name = 'buscountry' class = "form-field form-control countries selectbox" required>
														</select>
														<label for="buscountry">Business Country</label>
													</div>
												</div>
											</div>	
										</fieldset>
									</div><!--end #step1 -->
									<div class = "tab-pane" id="step3">
										<br/><br/>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<select name="joinchurch" id="joinchurch" class = "form-field form-control selectbox" required>
													</select>
													<label for="joinchurch" class = "control-label">Year when you joined the church</label>
												</div>
											</div>
											<div class = "col-sm-6">
												<div class = "form-group">
													<select name="wofbi" id="wofbi" class = "form-field form-control selectbox" required>
													</select>
													<label for="wofbi" class = "control-label">Wofbi Level</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-3">
												<div class = "form-group">
													<input type="text" name="province" id="province" class = "form-field form-control" data-rule-minlength="2" required="">
													<label for="province" class = "control-label">Province</label>
												</div>
											</div>
											<div class = "col-sm-3">
												<div class = "form-group">
													<input type="text" name="district" id="district" class = "form-field form-control" data-rule-minlength="2" required="">
													<label for="district" class = "control-label">District</label>
												</div>
											</div>
											<div class = "col-sm-3">
												<div class = "form-group">
													<input type="text" name="zone" id="zone" class = "form-field form-control" data-rule-minlength="2" required="">
													<label for="zone" class = "control-label">Zone</label>
												</div>
											</div>
											<div class = "col-sm-3">
												<div class = "form-group">
													<input type="text" name="wsf" id="wsf" class = "form-field form-control" data-rule-minlength="2" required="">
													<label for="wsf" class = "control-label">Wsf Location</label>
												</div>
											</div>
										</div>
									</div>
									<div class = "tab-pane" id="step4">
										<br/><br/>
										<fieldset>
											
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<select name="nktitle" class = "form-field form-control selectbox" id="nktitle" required>
															<option value = '' selected></option>
														</select>
														<label for="nktitle">Title</label>
													</div>
												</div>
											</div>
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" name="nksname" id="nksname" class = "form-field form-control" data-rule-minlength="2" required>
														<label for="nksname" class = "control-label">Surname</label>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" name="nkfname" id="nkfname" class = "form-field form-control" data-rule-minlength="2" required>
														<label for="nkfname" class = "control-label">First name</label>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" name="nkmname" id="nkmname" class = "form-field form-control" data-rule-minlength="2">
														<label for="nkmname" class = "control-label">Middle name</label>
													</div>
												</div>
											</div>
											<div class = "form-group">
												<select name="nkrel" id="nkrel" class = "form-field form-control selectbox" required>
												</select>
												<label for="nkrel" class = "control-label">Relationship with you</label>
											</div>
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" name="nkadd1" id="nkadd1" class = "form-field form-control" data-rule-minlength="2" required>
														<label for="nkadd1" class = "control-label">Address1</label>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" id = 'nkadd2' name = 'nkadd2' class = "form-field form-control" data-rule-minlength="2" required>
														<label for="nkadd2" class = "control-label">Address2</label>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" id = 'nktown' name = 'nktown' class = "form-field form-control" data-rule-minlength="2" required>
														<label for="nktown" class = "control-label">Town</label>
													</div>
												</div>
											</div>
											<div class = "row">
												<div class = "col-sm-6">
													<div class = "form-group">
														<select id = 'nkstate' name = 'nkstate' class = "form-field states form-control selectbox" required>
														</select>
														<label for="nkstate">State</label>
													</div>
												</div>
												<div class = "col-sm-6">
													<div class = "form-group">
														<select id = 'nkcountry' name = 'nkcountry' class = "form-field form-control countries selectbox" required>
														</select>
														<label for="nkcountry">Country</label>
													</div>
												</div>
											</div>
											<div class = "row">
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="text" id = 'nkphoneno' name = 'nkphoneno' class = "form-field form-control" data-rule-minlength="2" required>
														<label for="nkphoneno" class = "control-label">Mobile Number</label>
													</div>
												</div>
												<div class = "col-sm-4">
													<div class = "form-group">
														<input type="email" name="nkemail" id="nkemail" class = "form-field form-control" data-rule-email="true" required>
														<label for="nkemail" class = "control-label">Email</label>
													</div>
												</div>
											</div>
										</fieldset>
									</div><!--end #step2 -->
									<div class = "tab-pane" id="step5">
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'datejoin' name = 'datejoin' class = "form-field form-control dates" data-rule-minlength="2" required>
													<label for="datejoin" class = "control-label">Date of Registration</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'monthsave' name = 'monthsave' class = "form-field form-control numbers" data-rule-minlength="2" required>
													<label for="monthsave" class = "control-label">Monthly Savings</label>
												</div>
											</div>
										</div>	
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" id = 'accno' name = 'accno' class = "form-field form-control" data-rule-minlength="2" required>
													<label for="accno" class = "control-label">Account Number</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<select name="grpname" id="grpname" class = "form-field form-control selectbox" required>
													</select>
													<label for="grpname" class = "control-label">Group Name</label>
												</div>
											</div>
										</div><!--end #step3 -->
									</div><!--end #step2 -->
									<div class = "tab-pane" id="step6"><!--end #step3 -->
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
													<input type="text" name="regamount" id="regamount" class = "form-field form-control numbers" data-rule-minlength="2" required>
													<label for="shlot" class = "control-label">RegAmount</label>
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
									</div><!--end #step2 -->
									<div class = "tab-pane" id="step7"><!--end #step3 -->
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" name="receiptno1" id="receiptno1" class = "form-field form-control receiptno" data-rule-minlength="2" required />
													<label for="receiptno1" class = "control-label">Receipt no</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div id = 'errorreceiptno1' class = "form-group">
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" name="receiptdate1" id="receiptdate1" class = "form-field form-control dates" data-rule-minlength="2" required />
													<label for="receiptdate1" class = "control-label">Receipt Date</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<input type="text" name="shareamt" id="shareamt" class = "form-field form-control numbers" data-rule-minlength="2" required>
													<label for="shareamt" class = "control-label">Share Amount</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div class = "form-group">
													<div id = 'errorshareamt'></div>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-4">
												<div class = "form-group">
													<select name = "instrument1" id = "instrument1" class = "form-field form-control selectbox instrument" required>
													</select>
													<label for = "instrument1" class = "control-label">Instrument</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-8">
												<div class = "form-group">
													<input type="text" class = "form-field form-control refno" id="refno1" name="refno1" required data-rule-minlength="2" />
													<label for = 'refno1'>Ref Number</label>
												</div>
											</div>
											<div class = "col-sm-4">
												<div id = 'errorrefno1' class = "form-group">
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-6">
												<div class = "form-group">
													<input type = 'text' name = 'refdate1' class = 'form-field form-control dates' id = 'refdate1' required />
													<label for="refdate1">Date</label>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-sm-8">
												<div class = "form-group">
													<select name="bank1" id="bank1" class = "form-field form-control bank selectbox" required>
													</select>
													<label for = 'bank1'>Bank</label>
												</div>
											</div>
										</div>
										<div class = "form-group">
											<textarea id = 'refremark' name = 'refremark' class = 'form-field form-control'></textarea>
											<label for="refremark">Remarks</label>
										</div>
									</div><!--end #step2 -->
									<div class = "tab-pane" id="step8"><!--end #step3 -->
										<div class = "row">
											<div class = 'col-sm-6'>
												<div class = "form-group">
													<input type = 'file' name = 'passportupload' class = 'form-field fileupload' id = 'passportupload'>
													<label for = 'passportupload'>Passport</label>
												</div>
											</div>
											<div class = 'col-sm-6'>
												<div class = "form-group" id = 'errorpassportupload'>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = 'col-sm-6'>
												<div class = "form-group">
													<input type = 'file' name = 'regreceiptupload' class = 'form-field fileupload' id = 'regreceiptupload'>
													<label for = 'regreceiptupload'>Registration Receipt</label>
												</div>
											</div>
											<div class = 'col-sm-6'>
												<div class = "form-group" id = 'errorregreceiptupload'>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = 'col-sm-6'>
												<div class = "form-group">
													<input type = 'file' name = 'reginstrumentupload' class = 'form-field fileupload' id = 'reginstrumentupload'>
													<label for = 'reginstrumentupload'>Registration Instrument</label>
												</div>
											</div>
											<div class = 'col-sm-6'>
												<div class = "form-group" id = 'errorreginstrumentupload'>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = 'col-sm-6'>
												<div class = "form-group">
													<input type = 'file' name = 'sharelotreceiptupload' class = 'form-field fileupload' id = 'sharelotreceiptupload'>
													<label for = 'sharelotreceiptupload'>Share Lot Receipt</label>
												</div>
											</div>
											<div class = 'col-sm-6'>
												<div class = "form-group" id = 'errorsharelotreceiptupload'>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = 'col-sm-6'>
												<div class = "form-group">
													<input type = 'file' name = 'shareinstrumentupload' class = 'form-field fileupload' id = 'shareinstrumentupload'>
													<label for = 'shareinstrumentupload'>Share Lot Instrument</label>
												</div>
											</div>
											<div class = 'col-sm-6'>
												<div class = "form-group" id = 'errorshareinstrumentupload'>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = 'col-sm-6'>
												<div class = "form-group">
													<input type = 'file' name = 'regformupload' class = 'form-field fileupload' id = 'regformupload'>
													<label for = 'regformupload' class = 'control-label'>Registration Form</label>
												</div>
											</div>
											<div class = 'col-sm-6'>
												<div class = "form-group" id = 'errorregformupload'>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="checkbox checkbox-styled">
												<label>
													<input type="checkbox" name="terms1" id="terms1" required>
													<span>I have filled all the fields.</span>
												</label>
											</div>
										</div>

										<div title="Check the box above to activate button">
											<button id = 'submitreg' name = 'submitreg' class = "btn btn-flat btn-default ink-reaction" disabled>Submit</button>
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

		<!-- Vertically centered modal -->
		
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
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/jquery-ui.js"></script>
		<script src="../assets/js/newmember.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<script src="../assets/js/core/demo/DemoFormWizard.js"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>