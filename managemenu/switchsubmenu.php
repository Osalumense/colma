<?php
	session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	include_once('../include/zz.php');
	
	$stmt = $conn->prepare("select * from appssubmenu");
?>
<!doctype html>
<html>
	<head>
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel = "stylesheet" href = "../assets/css/style.css" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="../assets/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="../assets/js/select2.js"></script>
		<script language="javascript" src="../assets/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function(){
				//$('#myModalHorizontal').modal('toggle');
				function loadmen(){
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {menuview:'menuview'},
						success:function(result){
							$('#addselect').html(result);
							$('#addmenu').html(result);
						}
					});	
				}
				loadmen();
				$('#createform')[0].reset();
				$('#menuname').live('change', function(){
					$('#createform')[0].reset();
					loadsubmenu($(this).val());
					//console.log($('#appid').val() + " " + $('#menuname').val());
				});
				$('.clickhere').live('click', function(){
					$('#createform')[0].reset();
					$('#myModalHorizontal').modal('toggle');
					btnid = $(this).attr('id');
					id = btnid.replace('edit', '');
					//console.log(id);
					$.ajax({
						type: 'post',
						url: '../include/appajax.php',
						data:{switchsubmenudetail:id},
						success: function(result){
							$("#createform").html(result);
						}
					});
				});
				function loadsubmenu(menuid){
					$('#mytable').DataTable().clear().destroy();
					$('#addtable').html('');
					//alert(appid);
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {switchsubmenuview:'submenuview', switchmenuid:menuid},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
						}
					});
				}
				$('#createform').live('submit', function(e){
		 			e.preventDefault();
					console.log($(this).serialize());
					console.log($('#menuid').val());
					console.log($('#submenutypeid').val());
					console.log($('#submenuid').val());
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {switchsubmenuidact:$('#submenuid').val(), switchmenuidact:$('#menuid').val(), switchsubmenutypeidact:$('#submenutypeid').val()},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<div class = 'row'>
			<div class = 'col-sm-2'>
			</div>
			<div class = 'col-sm-10'>
				<div id = 'addselect' class="row">
				</div>
				<div  class="row">
					<div id = 'addtable' class="col-sm-7">
					</div>
				</div>
				<div id = 'hidemodal' class="row">
					<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<button type="button" id = 'closemodal' class="close" data-dismiss="modal">
										   <span aria-hidden="true">&times;</span>
										   <span class="sr-only">Close</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">Edit Submenu</h4>
								</div>				
								<!-- Modal Body -->
								<div class="modal-body">
									<form class="form-horizontal" id = "createform" action="#" method="post" role="form">
									</form>										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>