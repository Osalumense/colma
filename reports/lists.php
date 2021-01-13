<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
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
            <script src="../assets/js/lists.js"></script>
            <script src="../assets/table2excel/dist/jquery.table2excel.js"></script>

            <script>
				$(document).ready(function(){
					$("#tabs").tabs();
				});
			</script>

</head>
<body>

    <div class="row">
	    <div class="col-lg-12">
		    <div class="card">
	    		<div class="card-head style-primary">
                <header>View Lists</header>
                </div>
					<div class="card-body ">
                        <div id="tabs" class="mt-4">
                            <ul>
                                <li><a href="#tabs-1">All Members List</a></li>
                                <li><a href="#tabs-2">Current Members List</a></li>
                                <li><a href="#tabs-3">Not Current Members List</a></li>
                                <li><a href="#tabs-4">Debtors List</a></li>
                                <li><a href="#tabs-5">All Officers</a></li>								
                            </ul>

                            <div id="tabs-1">
                                <div class="row">
					                
				                </div>
                                <div class="row">
                                    <button class="btn btn-default export_tbl" id="">Export to Excel</button>
                                    <table id="allmemberstbl" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <th>S/N</th>
                                            <th>Member Name</th>
                                            <th>Title</th>
                                            <th>Member ID</th>
                                            <th>Sex</th>
                                            <th>Account Number</th> 
                                            <th>Phone Number</th>
                                            <th>Membership Status</th>
                                            <th>Current Share Holdings</th>
                                            <th>Current Savings</th>
                                            <th>Current Facilities</th>
                                            <th>Current Balance</th>
                                        </thead>

                                        <tbody id="allmemberstblbody">
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div id="tabs-2">
                                <div class="row">
					                
				                </div>
                                <div class="row">
                                    <button class="btn btn-default export_tbl" id="">Export to Excel</button>
                                    <table id="currentmemberstbl" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <th>S/N</th>
                                            <th>Member Name</th>
                                            <th>Title</th>
                                            <th>Member ID</th>
                                            <th>Sex</th>
                                            <th>Account Number</th> 
                                            <th>Phone Number</th>                                           
                                            <th>Current Share Holdings</th>
                                            <th>Current Savings</th>
                                            <th>Current Facilities</th>
                                            <th>Current Balance</th>
                                        </thead>

                                        <tbody id="currentmemberstblbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="tabs-3">
                                <div class="row">
					                
				                </div>
                                <div class="row">
                                    <button class="btn btn-default export_tbl" id="">Export to Excel</button>
                                    <table id="notcurrentmemberstbl" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <th>S/N</th>
                                            <th>Member Name</th>
                                            <th>Title</th>
                                            <th>Member ID</th>
                                            <th>Sex</th>
                                            <th>Account Number</th> 
                                            <th>Phone Number</th>
                                            <th>Current Share Holdings</th>
                                            <th>Current Savings</th>
                                            <th>Current Facilities</th>
                                            <th>Current Balance</th>
                                        </thead>

                                        <tbody id="notcurrentmemberstblbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="tabs-4">
                            </div>

                            <div id="tabs-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    
</body>
</html>
		<!-- BEGIN JAVASCRIPT -->
        <!-- <script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
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
		<script src="../assets/js/core/demo/DemoFormWizard.js"></script> -->

		<!-- END JAVASCRIPT -->