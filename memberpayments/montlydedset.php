<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	ini_set('max_execution_time', 300);
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
		
	$yr = date('Y');
	$mnt = date('m');
	$sql = "SELECT * FROM rptmonth";
	$result = $conn->query($sql);
	$val = $result->fetch(PDO::FETCH_ASSOC);
	$rptstatus = $val['deductionstatus'];
	
	$year = substr($val['year_mont'], 0, 4);
	$month = $val['monthname'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Monthly Deduction Setup</title>

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
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
		<link type="text/css" rel="stylesheet" href="../assets/css/jquery-ui.css" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed">

		<div class="card">
			
			<div >
			</div>
			
			<div class="card-head style-primary">
				<header>Setup Monthly Deduction For <?=$month.', '.$year?></header>
			</div>
			<div class="card-body">
				<input type="submit"  name = "setupmonthlyded" id="setupmonthlyded" class="float-center btn btn-primary ink-reaction" value = "Click Here"/>
				<input type="text" value="<?=$rptstatus?>" id="rpstat" hidden>
				
				<br>
				<br>
				<img src="../assets/img/ajax-loader.gif" alt="loading..." class="" id="ajax_loader" hidden>

				<div class="row" id="total_div" style="display: none">
					<form class="form-inline">
						<div class="col-sm-6">
							<label for="totalrecords">Total Records: </label>
							<input type="text" id="totalrecords" class=" form-control text-muted" disabled>
						</div>
						<div class="col-sm-6">
							<label for="totalamt">Total Deductions: </label>
							<input type="text" id="totalamt" class=" form-control text-muted" disabled>
						</div>					
					</form>		
				</div>
				<div class = 'row' id = 'dedtable'>
				</div>
			</div>
			
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					
				</div>				
				<!-- </form> -->
			</div>
				
		</div>
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
		<script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<script src="../assets/js/jquery-ui.js" type="text/javascript"></script>
		<script src="../assets/js/montlydedset.js"></script>
	</body>
</html>