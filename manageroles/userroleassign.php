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
		<script src="../assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="../assets/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="../assets/js/select2.js"></script>
		<script language="javascript" src="../assets/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function(){
				$( "#staffname" ).autocomplete({
					source: function( request, response ) {
						$.ajax( {
							url: "../include/appajax.php",
							dataType: "jsonp",
							data: {
								term: request.term
							},
							success: function( data ) {
								if(data != '' && $('#staffname').val() != '')
								{
									response( data );
								}
								else
								{
									//$("#staffname").val('');
									//$('#staffname').attr('disabled','disabled');
								}
							}
						} );
					},
					minLength: 2,
					select: function( event, ui ) {
						var titlelabel = "<label class=\"col-sm-2 control-label\" for = 'title'>Title<label>";
						$('#titlelabel').html(titlelabel);
						var titleinput = "<input type = 'text' name = 'title' id = 'title' class = 'form-control'/>";
						$('#titleinput').html(titleinput);
						var staffidlabel = "<label class=\"col-sm-2 control-label\" for = 'staffid'>Staffid<label>";
						$('#staffidlabel').html(staffidlabel);
						var staffidinput = "<input type = 'text' name = 'staffid' id = 'staffid' class = 'form-control'/>";
						$('#staffidinput').html(staffidinput);
						$('#title').val((ui.item.ori));
						$('#staffid').val((ui.item.id));
						$('#staffid').attr('disabled','disabled');
						$('#staffname').attr('disabled','disabled');
						$('#staffname').attr('data-toggle', 'tooltip');
						$('#staffname').attr('title', 'Click the label name to change name');
						$('#title').attr('disabled','disabled');
						loadroles(ui.item.id);
					}
				});
				$( "#staff" ).on('click', function(){
					$('#titlelabel').html('');
					$('#titleinput').html('');
					$('#staffidlabel').html('');
					$('#staffidinput').html('');
					$('#addtable').html('');
					$('#staffname').removeAttr('disabled');
					$('#staffname').val('');
					$('#staffname').removeAttr('data-toggle');
					$('#staffname').removeAttr('title');
				});
				$( ".checkall" ).live('change', function(){
					if($('.checkall').is(":checked")){
						//alert('his');
						$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
					}
					else{
						$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
					}
				});
				var check = [];
				$('.clickhere').live('click', function(e){
					e.preventDefault();
					btnid = $(this).attr('id');
					id = btnid.replace('assign', '');
					if(btnid=='assign'){
						$('#mytable').dataTable().$('tr').each(function(index,rowhtml){
							var checked= $('input[name=\'check\']:checked',rowhtml).length;
							if (checked==1){
								check.push($('input[name=\'check\']',rowhtml).val());
							}
						});
						if(check.length === 0)
						{
							alert('You need to select a role');
						}
						else
							assign($('#staffid').val(), check)
						$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
						//document.getElementById('createform').reset();
						//console.log(submenu);
						check = [];
						//loadassignedsubmenu($('#rolename').val())
					}
					else if(id > 0){
						check.push(id);
						assign($('#staffid').val(), check);
						check = [];
					}
				});
				function loadroles(userid){
					$.ajax({
						type: 'post',
						url: '../include/appajax.php',
						data: {loadrolesforusers:userid},
						success: function(result){
							$('#addtable').html('');
							$('#addtable').html(result);
							$('#mytable').dataTable();
						}
					});
				}
				function assign(userid, roleid){
					$.ajax({
						type: 'post',
						url: '../include/appajax.php',
						data: {user:userid, assignrole:roleid},
						success: function(result){
							loadroles(userid);
							alert(result);
						}
					});
				}
				function toTitleCase(str)
				{
					return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
				}
			});
		</script>
	</head>
	<body>
		<form class="form-horizontal" id = "createform" action="#" method="post" role="form">
			<div class="form-group">
				<div class = "col-sm-2">
				</div>
				<div id = 'titlelabel'>
				</div>
				<div id = 'titleinput' class = "col-sm-2">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2">
				</div>
				<label id = 'staff' class="col-sm-2 control-label" for="staffname">User Name</label>
				<div class="col-sm-5">
					<input type = 'text' id = 'staffname' name = 'staffname' class = 'form-control'>
				</div>
				
			</div>
			<div class="form-group">
				<div class = "col-sm-2">
				</div>
				<div id = 'staffidlabel' >
				</div>
				<div id = 'staffidinput' class = "col-sm-4">
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