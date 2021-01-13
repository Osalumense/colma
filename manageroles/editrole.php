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
		<link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="../assets/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function(){
				function loadrole(){
					$('#mytable').DataTable().clear().destroy();
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data:{editrole:'editrole'},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
						}
					});
				}
				function deleterole(roleid){
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data:{deleterole:'deleterole', roleid:roleid},
						success:function(result){
							alert(result);
							loadrole();
							//roleid = rowid.replace('edit', '');
							$('#createform')[0].reset();
						}
					});
				}
				$('.checkall').live('click', function () {
					$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
				});
				loadrole();
				var roles = [];
				$('.clickhere').live('click', function(){
					$('input[type=\'text\']').remove();
					$('#createform')[0].reset();
					var rowid = $(this).attr('id');
					roleid = rowid.replace('edit', '');
					var rolename = $('#click' + roleid).html();
					prevrolename = rolename;
					//$('#click' + roleid).html(rolename);
					var output = "<input data-toggle=\"tooltip\" title=\"Press Enter to submit or Press ESC to leave textbox\" type = 'text' class = 'form-control' id='rolename" + roleid + "' name='rolename' value='" + rolename + "' />"
					$('#click' + roleid).html(output);
					 $('[data-toggle="tooltip"]').tooltip(); 
					$('#click' + roleid).focus();
					$('.clickhere').attr('disabled', 'disabled')
					//$('#rolename'+ roleid).removeAttr('readonly');
					
					$(document).keyup(function(e) {
						if (e.keyCode == 27) { // escape key maps to keycode `27`
							$('input[type=\'text\']').remove();
							$('#click' + roleid).html(rolename);
							$('.clickhere').removeAttr('disabled')
						}
						
					});
				});
				$('.clikhere').live('click', function(){
					var rowid = $(this).attr('id');
					roleid = rowid.replace('delete', '');
					if(roleid > 0){
						roles = [];
						roles.push(roleid);
						deleterole(roles);
					}
					else if(rowid == 'delete'){
						$('#mytable').dataTable().$('tr').each(function(index,rowhtml){
							var checked= $('input[name=\'roles\']:checked',rowhtml).length;
							if (checked==1){
								roles.push($('input[name=\'roles\']',rowhtml).val());
							}
						});
						if(roles.length === 0)
						{
							alert('You need to select a role');
						}
						else
							deleterole(roles);
						$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
						document.getElementById('createform').reset();
						console.log(roles);
						roles = [];
					}
				});
				$('#createform').submit(function(event){
					event.preventDefault();
				});
				$(document).keyup(function(e) {
					if (e.keyCode == 13) { // enter key maps to keycode `13
					//alert('hi');
						changerole = $('#rolename' + roleid).val();
						if(changerole != '')
							$.ajax({
								type:'post',
								url:'../include/appajax.php',
								data:{changerole:changerole, roleid:roleid},
								success:function(result){
									alert(result);
									loadrole();
									//roleid = rowid.replace('edit', '');
									$('#createform')[0].reset();
								}
							});
					}
				});
				/*$('input[name=\'rolename\']').live('click', function(){
					$(this).removeAttr('readonly');
				});*/
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