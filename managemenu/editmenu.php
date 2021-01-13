<?php
	session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
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
				function loadmenuedit(){
					$('#mytable').DataTable().clear().destroy();
					$.ajax({
						type:'post',
						url:'../include/appajax.php',
						data:{loadmenuedit:'loadmenuedit'},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
						}
					});
				}
				function loadmenuselect(){
					$('#mytable').DataTable().clear().destroy();
					//alert(appid);
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {menuview:'menuview'},
						success:function(result){
							$('#addsubmenu').html(result);
						}
					});
				}
				function loadsubmenu (menuid){
					$('#mytable').DataTable().clear().destroy();
					$('#addtable').html('');
					//alert(appid);
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {submenuview:'submenuview', menuid:menuid},
						success:function(result){
							$('#addtable').html(result);
							$('#mytable').DataTable();
						}
					});
				}
				//loadmenuedit();
				function loadall(){
					if($.trim($('a').attr('id')) == 'viewsubmenu'){
							loadmenuedit();
					}
					else if($.trim($('a').attr('id')) == 'viewmenu'){
						//alert('hi');
						$('#mytable').DataTable().clear().destroy();
						$('#addtable').html('');
						loadmenuselect();
					}
				}
				loadall();
					//appname = $('#appname').val();
					//var menuview = 'menuview';
				$('#viewsubmenu').live('click', function(){
					$('#mytable').DataTable().clear().destroy();
					$('#addtable').html('');
					//loadall();
					$('#viewsubmenu').attr('id', function(){
						$('#viewsubmenu').html('Click to view menu');
						return 'viewmenu';
					});
					loadall();
				});
				$('#viewmenu').live('click', function(){
					$('#mytable').DataTable().clear().destroy();
					$('#addsubmenu').html('');
					$('#addtable').html('');
					$('#viewmenu').attr('id', function(){
						$('#viewmenu').html('Click to view Submenu');
						return 'viewsubmenu';
					});
					loadall();
				});
				$('#menuname').live('change', function(){
					menuid = $('#menuname').val();
					loadsubmenu(menuid)
					//alert('hi');
				});
				$('.clickhere').live('click', function(event){
					event.preventDefault();
					$('input[type=\'text\']').remove();
					//$('#createform')[0].reset();
					var rowid = $(this).attr('id');
					if($('a').attr('id') == 'viewmenu')
					{
						submenuid = rowid.replace('edit', '');
						var submenuname = $('#click' + submenuid).html();
						//$('#click' + roleid).html(rolename);
						var output = "<input data-toggle=\"tooltip\" title=\"Press Enter to submit or Press ESC to leave textbox\" type = 'text' class = 'form-control' id='submenuname" + submenuid + "' name='submenuname' value='" + submenuname + "' />"
						$('#click' + submenuid).html(output);
						$('#mytable').css('margin: 0 auto');
						$('#mytable').css('width: 100%');
						$('#mytable').css('clear: both');
						$('#mytable').css('border-collapse:collapse');
						$('#mytable').css('table-layout:fixed');
						$('#mytable').css('word-wrap:break-word');
						 $('[data-toggle="tooltip"]').tooltip(); 
						$('#click' + submenuid).focus();
						//$('#rolename'+ roleid).removeAttr('readonly');
					}
					else if($('a').attr('id') == 'viewsubmenu')
					{
						menuid = rowid.replace('edit', '');
						var menuname = $('#click' + menuid).html();
						//$('#click' + roleid).html(rolename);
						var output = "<input data-toggle=\"tooltip\" title=\"Press Enter to submit or Press ESC to leave textbox\" type = 'text' class = 'form-control' id='menuname" + menuid + "' name='menuname' value='" + menuname + "' />"
						$('#click' + menuid).html(output);
						$('#mytable').css('margin: 0 auto');
						$('#mytable').css('width: 100%');
						$('#mytable').css('clear: both');
						$('#mytable').css('border-collapse:collapse');
						$('#mytable').css('table-layout:fixed');
						$('#mytable').css('word-wrap:break-word');
						 $('[data-toggle="tooltip"]').tooltip(); 
						$('#click' + menuid).focus();
						//$('.clickhere').attr('disabled', 'disabled')
						//$('#rolename'+ roleid).removeAttr('readonly');
					}
					$('.clickhere').attr('disabled', 'disabled');
					$('.clikhere').attr('disabled', 'disabled');
					$(document).keyup(function(e) {
						if (e.keyCode == 27) { // escape key maps to keycode `27`
							if($('a').attr('id') == 'viewmenu')
							{	$('input[type=\'text\']').remove();
								$('#click' + submenuid).html(submenuname);
							}
							else if($('a').attr('id') == 'viewsubmenu')
							{	$('input[type=\'text\']').remove();
								$('#click' + menuid).html(menuname);
							}
							$('.clickhere').removeAttr('disabled')
							$('.clikhere').removeAttr('disabled')
						}
						
					});
				});
				$('.clikhere').live('click', function(event){
					event.preventDefault();
					var rowid = $(this).attr('id');
					if($('a').attr('id') == 'viewmenu'){
						submenuid = rowid.replace('delete', '');
						menuid = $('#menuname').val();
						console.log(submenuid);
						console.log(menuid);
						$.ajax({
							type:'post',
							url:'../include/appajax.php',
							data:{deletesubmenu:'deletesubmenu', delsubmenuid:submenuid, delmenuid:menuid},
							success:function(result){
								alert(result);
								$('#createform')[0].reset();
								loadsubmenu(menuid);
								//roleid = rowid.replace('edit', '');
							}
						});
					}
					else if($('a').attr('id') == 'viewsubmenu'){
						menuid = rowid.replace('delete', '');
						$.ajax({
							type:'post',
							url:'../include/appajax.php',
							data:{deletemenu:'deletemenu', menuiddel:menuid},
							success:function(result){
								alert(result);
								console.log(menuid);
								$('#createform')[0].reset();
								loadmenuedit();
								//roleid = rowid.replace('edit', '');
							}
						});
					}
				});
				$(document).keyup(function(e) {
					if (e.keyCode == 13) { // enter key maps to keycode `13
					//alert('hi');
						if($('a').attr('id') == 'viewmenu'){
							changesubmenu = $('#submenuname' + submenuid).val();
							menuid = $('#menuname').val();
							console.log(changesubmenu);
							console.log(menuid);
							console.log(submenuid);
							if(changesubmenu != '')
								$.ajax({
									type:'post',
									url:'../include/appajax.php',
									data:{changesubmenu:changesubmenu, editmenuid:menuid, editsubmenuid:submenuid},
									success:function(result){
										alert(result);
										$('#createform')[0].reset();
										loadsubmenu(menuid);
										//roleid = rowid.replace('edit', '');
									}
								});
							else $('#submenuname' + submenuid).focus();
						}
						else if($('a').attr('id') == 'viewsubmenu'){
							changemenu = $('#menuname' + menuid).val();
							console.log(changemenu);
							console.log(menuid);
							//menuid = $('#menuname').val();
							if(changemenu != '')
								$.ajax({
									type:'post',
									url:'../include/appajax.php',
									data:{changemenu:changemenu, editmenuid:menuid},
									success:function(result){
										alert(result);
										$('#createform')[0].reset();
										loadmenuedit();
										//roleid = rowid.replace('edit', '');
									}
								});
							else $('#menuname' + submenuid).focus();
							
						}
					}
				});
				$('#createform').submit(function(e){
					e.preventDefault();
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
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-2">
					<a href = '#' id = 'viewsubmenu' style="background-color:#800080; color:white;" class="btn btn-primary btn-default">Click to view Submenu</a>
				</div>
			</div>
			<div id = "addsubmenu" class="form-group">
			</div>;
			<div class="form-group">
				<div class="col-sm-1">
				</div>
				<div id = 'addtable' class="col-sm-7">
				</div>
			</div>
		</form>
	</body>
</html>