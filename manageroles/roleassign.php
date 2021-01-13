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
		<link href="../assets/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="../assets/js/select2.js"></script>
		<script language="javascript" src="../assets/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function(){
				$(".js-example-data-ajax1").select2({
					placeholder: "Select a role",
					allowClear: true
				});
				function loadsubmenu(roleid){
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {loadsubmenu:roleid},
						success:function(result){
							$('#addtable').html(result);	
							 $('#mytable').DataTable();
						}
					});
				}
				var roleid = 0;
				$('#rolename').change(function(){
					$('#mytable').DataTable().clear().destroy();
					$('#addtable').html('');
					roleid = $('#rolename').val();
					console.log(roleid);
					if( roleid != 0)
						loadsubmenu(roleid);
					else alert('You need to select a role');
				});
				$('.submenu').live('click', function () {
					$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
				});
				$('#createform').submit(function(e){
					
					e.preventDefault();
					//document.getElementById('createform').reset();
				});
				var submenu = [];
				$('.gosub').live('click',function(){
					var btnid = $(this).attr('id');
					if(btnid == 'assign')
					{
						$('#mytable').dataTable().$('tr').each(function(index,rowhtml){
							var checked= $('input[name=\'submenu\']:checked',rowhtml).length;
							if (checked==1){
								submenu.push($('input[name=\'submenu\']',rowhtml).val());
							}
						});
						if(submenu.length === 0)
						{
							if(roleid == 0)
								alert('You need to select a submenu and a role');
							else alert('You need to select a submenu');
						}
						else if(roleid == 0)
						{
							if(submenu.length === 0)
								alert('You need to select a role and a submenu');
							else alert('You need to select a role');
						}
						else
						assign(submenu);
						$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
						document.getElementById('createform').reset();
						submenu = [];
						console.log(submenu);
					}
					else{
						submenu = [];
						submen = btnid.replace('submit','');
						submenu.push(submen);
						assign(submenu);
						//console.log(submenu);
					}
					function assign(submenu){
						$.ajax({
							type:'post',
							url:'../include/appajax.php',
							data: {submenu:submenu, roleid:$('#rolename').val()},
							success:function(result){
								alert(result);
								//console.log(result);
								submenu = [];
								$('#mytable').DataTable().clear().destroy();
								$('#addtable').html('');
								loadsubmenu($('#rolename').val());
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
				<label  class="col-sm-2 control-label" for="rolename">Role Name</label>
				<div class="col-sm-5">
					<select class="js-example-data-ajax1 form-control" id="rolename" placeholder="Select Role" >
						<option value = ''>...</option>
						<?php
							$roles = array();
							$roles = load_roles($conn, 0);
							foreach($roles as $role)
							{
								extract($role);
								?>
									<option value = '<?php echo $roleid; ?>'><?php echo ucwords($rolename); ?></option>
								<?php
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2">
				</div>
				<div id = 'addtable' class="col-sm-7">
				</div>
			</div>
		</form>
	</body>
</html>