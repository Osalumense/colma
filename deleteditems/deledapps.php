<?php
	session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/portalfunctions.php');
	include_once('../include/zz.php');
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
				function loaddeledapps(){
					$('#mytable').DataTable().clear().destroy();
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data:{deledapps:'deledapps'},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
						}
					});
				}
				$('.checkall').live('click', function () {
					$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
				});
				loaddeledapps();
				var apps = [];
				$('.restore').live('click',function(){
					var btnid = $(this).attr('id');
					if(btnid == 'restore')
					{
						$('#mytable').dataTable().$('tr').each(function(index,rowhtml){
							var checked= $('input[name=\'apps\']:checked',rowhtml).length;
							if (checked==1){
								apps.push($('input[name=\'apps\']',rowhtml).val());
							}
						});
						if(apps.length === 0)
						{
							alert('You need to select an application');
						}
						else
							assign(apps);
						$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
						document.getElementById('createform').reset();
						console.log(apps);
						apps = [];
					}
					else{
						apps = [];
						app = btnid.replace('restore','');
						apps.push(app);
						assign(apps);
						//console.log(submenu);
					}
					function assign(apps){
						$.ajax({
							type:'post',
							url:'../include/appajax.php',
							data: {restoreapps:apps},
							success:function(result){
								alert(result);
								//console.log(result);
								apps = [];
								$('#mytable').DataTable().clear().destroy();
								$('#addtable').html('');
								loaddeledapps();
							}
						});
					}
				});
				
			});
		</script>
	</head>
	<body>
		<form class="form-horizontal" id = "createform" action="#" method="post" role="form">
			<div class="form-group">
				<div class="col-sm-2">
				</div>
				<div id = 'addtable' class="col-sm-7">
				</div>
			</div>
		</form>
	</body>
</html>