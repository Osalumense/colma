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
				function loaddeledmenus(){
					$('#mytable').DataTable().clear().destroy();
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data:{deledmenus:'deledmenus'},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
							$('#createform')[0].reset();
						}
					});
				}
				function loaddeledsubmenus(){
					$('#mytable').DataTable().clear().destroy();
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data:{deledsubmenus:'deledsubmenus'},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
							$('#createform')[0].reset();
						}
					});
				}
				function assign(menus){
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data: {restoremenus:menus},
						success:function(result){
							alert(result);
							//console.log(result);
							menus = [];
							$('#mytable').DataTable().clear().destroy();
							$('#addtable').html('');
							loaddeledmenus();
							$('#createform')[0].reset();
						}
					});
				}
				function subassign(submenus){
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data: {restoresubmenus:submenus},
						success:function(result){
							alert(result);
							//console.log(result);
							submenus = [];
							$('#mytable').DataTable().clear().destroy();
							$('#addtable').html('');
							loaddeledsubmenus();
							$('#createform')[0].reset();
						}
					});
				}
				
				$('.checkall').live('click', function () {
					$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
				});
				loaddeledmenus();
				var menus = [];
				var submenus = [];
				$('.restore').live('click',function(){
					var btnid = $(this).attr('id');
					var click = $('.clickhere').attr('id');
					if(btnid == 'restore')
					{
						menus = [];
						submenus = [];
						//console.log('hi');
						if(click == 'viewsubmenu'){
							//console('hi');
							$('#mytable').dataTable().$('tr').each(function(index,rowhtml){
								var checked= $('input[name=\'menus\']:checked',rowhtml).length;
								if (checked==1){
									menus.push($('input[name=\'menus\']',rowhtml).val());
								}
							});
							if(menus.length === 0)
							{
								alert('You need to select a menu');
							}
							else
								assign(menus);	
						}
						else if(click == 'viewmenu'){
							
							menus = [];
							submenus = [];
							$('#mytable').dataTable().$('tr').each(function(index,rowhtml){
								var checked= $('input[name=\'submenus\']:checked',rowhtml).length;
								if (checked==1){
									submenus.push($('input[name=\'submenus\']',rowhtml).val());
								}
							});
							if(submenus.length === 0)
							{
								console.log('You need to select a submenu!');
								console.log(submenus);
							}
							else{
								
								console.log(submenus);
								subassign(submenus);
								$('#createform')[0].reset();
							}
						}
						$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
						document.getElementById('createform').reset();
						console.log(menus);
						console.log(submenus);
						menus = [];
						submenus = [];
					}
					else{
						if(click == 'viewsubmenu'){
							menus = [];
							menu = btnid.replace('restore','');
							menus.push(menu);
							assign(menus);
						}
						else if(click == 'viewmenu'){
							submenus = [];
							submenu = btnid.replace('restore','');
							submenus.push(submenu);
							subassign(submenus);
						}
						//console.log(submenu);
					}
				});
				$('.clickhere').live('click', function(e){
					e.preventDefault();
					$('#createform')[0].reset();
					id = $(this).attr('id');
					if( id == 'viewmenu'){
						menus = [];
						loaddeledmenus();
						$(this).attr('id', function(){
							$(this).html('View deleted submenu');
							return 'viewsubmenu';
						});
					}
					else if( id == 'viewsubmenu'){
						submenus = [];
						loaddeledsubmenus();
						$('#createform')[0].reset();
						$(this).attr('id', function(){
							$(this).html('View deleted menu');
							return 'viewmenu';
						});
					}
				});
			});
		</script>
	</head>
	<body>
		<form class="form-horizontal" id = "createform" action="#" method="post" role="form">
			<div class="form-group">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-2">
					<a href='#' id='viewsubmenu'  class="btn btn-default clickhere">View deleted submenu</a>
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