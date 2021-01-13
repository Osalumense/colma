<?php
	session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	include_once('../include/zz.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel = "stylesheet" href = "../assets/css/style.css" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script>
			$(document).ready(function(){
				$('#myModalHorizontal').modal('toggle');
				$('#info').hide();
				$('#createform').submit(function(e){
					e.preventDefault();
					var rolename = $('#rolename').val();
					document.getElementById('createform').reset();
					//alert('hi');
					//console.log(appname);
					if(rolename != '')
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {rolename:rolename},
						success:function(result){
							$('#myModalHorizontal').modal('toggle');
							$('#info').show();
							$('#report').html(result);
						}
					});
					else 
					{
						$('#rolename').focus();
						$('#error1').html('Please input the role name');
					}
				});
				$('#rolename').focus(function() {
					$('#error1').html('');
				}).blur(function(){
					var rolename = $('#rolename').val();
					if(rolename == '')
					{
						$('#rolename').focus();
						$('#error1').html('Please input the role name');
					}
				});
				$('#rolename').keyup(function() {
					$('#error1').html('');
				})
				$('#addmore').click(function(e) {
					e.preventDefault();
					$('#myModalHorizontal').modal('toggle');
					$('#info').hide();
				});
				$('#addrole').click(function(e){
					e.preventDefault();
					$('#myModalHorizontal').modal('toggle');
					$('#addrole').hide();
				});
				$('#closemodal').click(function(){
					$('#addrole').show();
				});
				$('#addrole').hide();
				$(document).keyup(function(e) {
					if (e.keyCode == 27) { // escape key maps to keycode `27`
						$('#addrole').show();
					}
				});
				$('#myModalHorizontal').on('hidden.bs.modal', function () {
				  $('#addrole').show();
				})
				
			});									
		</script>
	</head>
	<body>
		<div class = "row">
			<div class="col-sm-1">
			</div>
			<div class="col-sm-2">
			</div>
		</div>
		<div class = "row">
			<div class="col-sm-1">
			</div>
			<div class="col-sm-2">
				<a id = 'addrole' href = '#' style="background-color:#800080; color:white;" class="btn btn-primary btn-default">Click to Add Role</a>
			</div>
		</div>
		<div id = 'info'>
		<div class="alert alert-info">
			<strong>Info!</strong><span id ='report'></span>.
		</div>
		<a href='#' id = 'addmore' style="background-color:#800080; color:white;" class="btn btn-primary btn-default">Click here to add more</a>
		</div>
		<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
						<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							   <span aria-hidden="true">&times;</span>
							   <span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Add New Role</h4>
					</div>				
					<!-- Modal Body -->
					<div class="modal-body">
						<form class="form-horizontal" id = "createform" action="#" method="post" role="form">
							<div class="form-group">
								<label  class="col-sm-2 control-label" for="rolename">Role Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="rolename" placeholder="Input Role Name"/>
								</div>
								<span class="col-sm-2" id='error1' style = "color: red"></span>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" style="background-color:#800080; color:white;" id = "create" class="btn btn-primary btn-default" value = "Create"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>