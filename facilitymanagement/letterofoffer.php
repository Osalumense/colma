<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>COLMA Portal</title>
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
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
		
	</head>
	<body class="menubar-hoverable header-fixed">
		<div class="card">
			<div class="card-head style-primary">
				<header>LETTER OF OFFER</header>
				<div class="tools" style = "display:none;">
					<a class="btn btn-flat hidden-xs" id ='goback' href="#"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;BACK TO SEARCH</a>
					<a class="btn btn-flat hidden-xs" id ='print' href="#"><span class="glyphicon glyphicon-print"></span> &nbsp;PRINT</a>
				</div>
			</div>
			<div class="card-body">
				<div id = 'searchform'class = 'row floating-label'>
					<label for="receiver">NAME</label>
					<input type = 'text' name = 'receiver' class = 'form-control namesearch' id = 'receiver' required data-rule-minlength="2" required>
					
				</div>
				<div id = 'printdiv' class = 'row' style = 'display:none;'>
					<div class = 'row'>
						<div class = 'col-sm-2'>
							<img width = '100px' src="../assets/img/logo_co-operative.jpg" alt="User Image"/>
						</div>
						<div class = 'col-sm-8 text-center'>
							<h3 class = ''>COVENANT LIBERATION MULTI-PURPOSE ASSOCIATION</h3>
							<h4>KM 10, IDIROKO ROAD, CANAANLAND, OTA, OGUN STATE</h4>
							<h4>PHONE NO: 09082486735  EMAIL: colma.cmfb@yahoo.com</h4>
						</div>
						<div class = 'col-sm-2'>
							<img src="../assets/img/culma.png" width= "90px" height = "80px" alt="User Image"/>
						</div>
					</div>
					<br /><br />
					<div class = 'row'>
						<div class = 'col-sm-4 text-left'>
							<div class = 'row address'>
								22, OGOJA CRESCENT AGBARA ESTATE,
							</div>
							<div class = 'row city'>
								AGBARA,
							</div>
							<div class = 'row state'>
								OGUN STATE.
							</div>
						</div>
						<div class = 'col-sm-4'>
						</div>
						<div id = 'date' class = 'col-sm-4 text-right'>
							Date: 1-sept-2017.
						</div>
					</div>
					<br /><br />
					<div class = 'row'>
						DEAR <span class = 'membername'></span>,
					</div>
					<div id = 'letterheading' class = 'row text-center'>
						<h2>LETTER OF OFFER</h2>
					</div>
					<br />
					<div class = 'row text-justify'>
						<p>In the view of your application for loan in Covenant Liberation Multipurpose Association, We are pleased to offer you a loan of N<span class = 'amount'></span> Repayable over a peiord of <span class = 'period'></span> months.</p>
						<p>Your Repayment shall be N<span id = 'installment'></span> monthly in addition to your monthly savings of N<span id = 'monthlysavings'></span></p>
						<p>Failure to repay as at when due attracts penalty of <span id = 'percentagefailure'></span>% on amount due</p>
						<p>Please sign the attached copy if you are in agreement with the terms of this offer</p>
					</div>
					<br /> <br /> <br />
					<div class = 'row text-justify'>
						<p><h4>FOR COVENANT LIBERATION MULTIPURPOSE ASSOCIATION</h4></p>
					</div>
					<br /> <br /> <br /> <br />
					<div id = 'officer' class = 'row text-left'>
						<p><h4>TRIUMPHANT FAVOUR AMARACHI</h4></p>
					</div>
					<div id = 'office' class = 'row text-left'>
						<p><h4>FINANCIAL OFFICER</h4></p>
					</div>
					<br /><br /><br /><br /><br />
					<div class="table-responsive row">
						&nbsp;&nbsp;&nbsp;<div class = 'row'>COLMA LOAN AMORTIZATION TABLE</div>
						&nbsp;&nbsp;&nbsp;<div class = 'row'>BENEFICIARY NAME: <span class = 'membername'></span></div>
						&nbsp;&nbsp;&nbsp;<div class = 'row'>&nbsp;&nbsp;&nbsp;ADDRESS: <span class = 'address'></span> <span class = 'city'></span> <span class = 'state'></span></div>
						<div class="col-sm-8">
							<table class="table no-margin">
								<thead>
									<tr>
										<th colspan = '2'>LOAN INFORMATION TABLE</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>LOAN PRINCIPAL AMOUNT</td>
										<td class = 'amount'></td>
									</tr>
									<tr>
										<td>LOAN PERIOD (IN MONTHS)</td>
										<td class = 'period'></td>
									</tr>
									<tr>
										<td>INSTEREST RATE(%)</td>
										<td id = 'interest'></td>
									</tr>
									<tr>
										<td>TOTAL REPAYMENT AMOUNT</td>
										<td id = 'repayment'></td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
					<div class="table-responsive row">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>MONTH</th>
									<th>REPAYMENT NUMBER</th>
									<th>OPENING BALANCE</th>
									<th>LOAN REPAYMENT</th>
									<th>INTEREST CHARGED</th>
									<th>CLOSING BALANCE</th>
									<th>TOTAL REPAYMENT</th>
								</tr>
							</thead>
							<tbody id = 'tbody'>
								
							</tbody>
						</table>
					</div>
					<div class="table-responsive row">
						<table class="table no-margin">
							<tbody>
								<tr>
									<th>LOAN REPAYMENT START DATE</th>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					
				</div>
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
		<script src="../assets/js/letterofoffer.js"></script>
	</body>
</html>