<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	include_once('../include/zz.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel = "stylesheet" href = "../assets/css/select2.css" />
		<link rel = "stylesheet" href = "../assets/css/style.css" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script language="javascript" src="../assets/js/select2.js"></script>
		<script>
			$(document).ready(function(){
				$(".js-example-data-ajax1").select2({
					placeholder: "Select an application",
					allowClear: true
				});
				function loadmen(){
					$.ajax({
						type: 'POST',
						url:  '../include/appajax.php',
						data: {menuview:'menuview'},
						success:function(result){
							$('#addselect').html(result);
						}
					});	
				}
				$('input[type=\'button\']').live('click', function(){
					console.log($(this).attr('id'));
					var b = $(this).attr('id');
					var menuname = $('#menuname').val();
					var submenuname = $('#submenuname').val();
					var filename = $('#filename').val();
					var submenutype = $('#submenutype').val();
					var extensionname = $('#extensionname').val();
					if(b == 'createform')
					{
						if(menuname != '')
							$.ajax({
								type: 'POST',
								url:  '../include/appajax.php',
								data: {menuname:menuname, functions:'go'},
								success:function(result){
									alert(result);
									$('#menuname').val('');
									$('#submenuname').val('');
									$('#filename').val('');
									$('#submenutype').val('');
									$('#extensionname').val('');
								}
							});
						else 
						{
							if(menuname == ''){
								$('#menuname').focus();
								$('#error2').html('Please input the menu name');
							}
						}
					}
					else if(b == 'formcreate'){
						if(menuname != '' && submenuname != '' && filename != '' && submenutype != '' && extensionname != '')
							$.ajax({
								type: 'POST',
								url:  '../include/appajax.php',
								data: {menuname:menuname, submenuname:submenuname, filename:filename, submenutype:submenutype, extensionname:extensionname},
								success:function(result){
									alert(result);
									$('#menuname').val('');
									$('#submenuname').val('');
									$('#filename').val('');
									$('#submenutype').val('');
									$('#extensionname').val('');
								}
							});
						else 
						{
							if(menuname == '' && submenuname !='' && filename !='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename !='' && submenutype != '' && extensionname != '')
							{
								$('#submenuname').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input the Submenu name');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname !='' && filename =='' && submenutype != '' && extensionname != '')
							{
								$('#filename').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('Please input the filename');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname !='' && filename !='' && submenutype == '' && extensionname != '')
							{
								$('#submenutype').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname !='' && filename !='' && submenutype != '' && extensionname == '')
							{
								$('#extensionname').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('Please input the extension name');
							}
							else if(menuname == '' && submenuname !='' && filename !='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename !='' && submenutype != '' && extensionname != ''){
								$('#submenuname').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname !='' && filename =='' && submenutype != '' && extensionname != ''){
								$('#filename').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('Please input the filename');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname !='' && filename !='' && submenutype == '' && extensionname != ''){
								$('#extensionname').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname !='' && filename !='' && submenutype != '' && extensionname == ''){
								$('#extensionname').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename !='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Pleasee input a Submenu name');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename =='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('Pleasee input a filename');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename !='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename !='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname != '' && submenuname =='' && filename =='' && submenutype != '' && extensionname != '')
							{
								$('#submenutype').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input a Submenu name');
								$('#error4').html('Please input a filename');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename !='' && submenutype == '' && extensionname != '')
							{
								$('#submenutype').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input a Submenu name');
								$('#error4').html('');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename !='' && submenutype != '' && extensionname == '')
							{
								$('#submenuname').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input a Submenu name');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('Please input an extension');
							}
							else if(menuname != '' && submenuname !='' && filename =='' && submenutype == '' && extensionname != '')
							{
								$('#submenutype').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('Please input a filename');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname !='' && filename =='' && submenutype != '' && extensionname == '')
							{
								$('#submenutype').focus();
								
								$('#error2').html('');
								$('#error3').html('');
								$('#error4').html('Please input a filename');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename !='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the submenu');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename =='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('Please input a filename');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename !='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename !='' && submenutype != '' && extensionname == ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename =='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the Submenu name');
								$('#error4').html('Please input the filename');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname =='' && filename !='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the Submenu name');
								$('#error4').html('');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname =='' && filename !='' && submenutype != '' && extensionname == ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the Submenu name');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname !='' && filename =='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('Please input the filename');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename =='' && submenutype != '' && extensionname == ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('Please input the filename');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname != '' && submenuname =='' && filename =='' && submenutype == '' && extensionname != '')
							{
								$('#submenutype').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input a filename');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename =='' && submenutype != '' && extensionname == '')
							{
								$('#submenuname').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input a filename');
								$('#error5').html('');
								$('#error6').html('Pleas input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename =='' && submenutype != '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please select menu name');
								$('#error3').html('Please input the Submenu name');
								$('#error4').html('Please input a filename');
								$('#error5').html('');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename =='' && submenutype == '' && extensionname != '')
							{
								$('#submenuname').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input a filename');
								$('#error5').html('Please select an Submenu type');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename =='' && submenutype != '' && extensionname == '')
							{
								$('#menuname').focus();
								
								$('#error2').html('');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input a filename');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname !='' && filename =='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('Please input the filename');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname !='' && filename =='' && submenutype != '' && extensionname == ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('');
								$('#error4').html('Please input the filename');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename !='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menuname');
								$('#error3').html('Please input the Submenu name');
								$('#error4').html('');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname =='' && filename !='' && submenutype != '' && extensionname == ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menuname');
								$('#error3').html('Please input the Submenu name');
								$('#error4').html('');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename =='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input the filename');
								$('#error5').html('Please select a Submenu type');
								$('#error6').html('');
							}
							else if(menuname == '' && submenuname =='' && filename =='' && submenutype != '' && extensionname == ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input the filename');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename =='' && submenutype == '' && extensionname != ''){
								$('#menuname').focus();
								
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input the filename');
								$('#error5').html('Please select a submenu type');
								$('#error6').html('');
							}
							else if(menuname != '' && submenuname =='' && filename =='' && submenutype == '' && extensionname == ''){
								$('#submenutype').focus();								$('#error2').html('');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('Please input the filename');
								$('#error5').html('Please select a submenu type');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname != '' && submenuname !='' && filename =='' && submenutype == '' && extensionname == ''){
								$('#submenutype').focus();
								
								$('#error2').html('Please input a menu name');
								$('#error3').html('');
								$('#error4').html('Please input the filename');
								$('#error5').html('Please select a submenu type');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname != '' && submenuname =='' && filename !='' && submenutype == '' && extensionname == ''){
								$('#submenutype').focus();
								$('#error2').html('Please input a menu name');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('');
								$('#error5').html('Please select a submenu type');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname != '' && submenuname =='' && filename =='' && submenutype != '' && extensionname == ''){
								$('#submenuname').focus();
								$('#error2').html('Please input a menu name');
								$('#error3').html('Please input the submenu name');
								$('#error4').html('please input the filename');
								$('#error5').html('');
								$('#error6').html('Please input an extension name');
							}
							else if(menuname == '' && submenuname =='' && filename =='' && submenutype == '' && extensionname == ''){
								$('#menuname').focus();
								$('#error2').html('Please input the menu name');
								$('#error3').html('Please input the submenu');
								$('#error4').html('Please input the filename');
								$('#error5').html('Please select Submenu type');
								$('#error6').html('Please input an extension name');
							}
						
						}
				//});
					}
				});
				$('#menuname').live('focus', function() {
					$('#error2').html('');
				}).live('blur', function(){
					var menuname = $('#menuname').val();
					if(menuname == '')
					{
						$('#menuname').focus();
						$('#error2').html('Please input the menu name');
					}
				});
				$('#submenuname').live('focus',function() {
					$('#error3').html('');
				}).live('blur',function(){
					var submenuname = $('#submenuname').val();
					if(submenuname == '')
					{
						$('#submenuname').focus();
						$('#error3').html('Please input the submenu name');
					}
				});
				$('#filename').live('focus',function() {
					$('#error4').html('');
				}).live('blur',function(){
					var filename = $('#filename').val();
					if(filename == '')
					{
						$('#filename').focus();
						$('#error4').html('Please input the filename');
					}
				});
				$('#submenutype').live('focus',function() {
					$('#error5').html('');
				}).live('blur',function(){
					var submenutype = $('#submenutype').val();
					if(submenutype == '')
					{
						$('#submenutype').focus();
						$('#error5').html('Please select a Submenu type');
					}
				});
				$('#extensionname').live('focus',function() {
					$('#error6').html('');
				}).live('blur',function(){
					var extensionname = $('#extensionname').val();
					if(extensionname == '')
					{
						$('#extensionname').focus();
						$('#error6').html('Please input the extension name');
					}
				});
				if ($('input[type=\'button\']').attr('id') == 'formcreate')
				{
					loadmen();
					//appname = $('#appname').val();
					//var menuview = 'menuview';
				}
				else $('#addselect').html('');
				
				$('#menuname').keyup(function() {
					$('#error2').html('');
				})
				$('#menuname').live('change',function() {
					$('#error2').html('');
				})
				$('#submenuname').live('keyup',function() {
					$('#error3').html('');
				})
				$('#filename').live('keyup',function() {
					$('#error4').html('');
				})
				$('#submenutype').live('change',function() {
					$('#error5').html('');
				})
				$('#extensionname').live('change',function() {
					$('#error6').html('');
				})
				$('#addsubmenu').live('click', function(e) {
					e.preventDefault();
					document.getElementById('myform').reset();
					$('#menuname').val('');
					$('#submenuname').val('');
					$('#filename').val('');
					$('#submenutype').val('');
					//$('#appname').focus();
					$('#error2').html('');
					$('#error3').html('');
					$('#error4').html('');
					$('#error5').html('');
					$('#error2').attr('id', function(){
						return 'error3';
					});
					loadmen();
					var outputss = "<label id=\"filelabel\" class=\"col-sm-2 control-label\" for=\"extensionname\">Extension Name</label><div class=\"col-sm-6\">"+
								"<input type=\"text\" class=\"form-control\" id=\"extensionname\" placeholder=\"Input an extension name\"/>" +
								"</div><span class=\"col-sm-2\" id=\"error6\" style = \"color: red\"></span>";
					$('#extension').html(outputss);
					var output = "<label id=\"filelabel\" class=\"col-sm-2 control-label\" for=\"filename\">File Name</label><div class=\"col-sm-6\">"+
								"<input type=\"text\" class=\"form-control\" id=\"filename\" placeholder=\"Input a file name\"/>" +
								"</div><span class=\"col-sm-2\" id=\"error4\" style = \"color: red\"></span>";
					$('#file').html(output);
					var outputs = "<label class=\"col-sm-2 control-label \" for=\"submenutype\">Submenu Type</label><div class=\"col-sm-6\">"+
								"<select class=\"form-control js-example-data-ajax3\" id=\"submenutype\" placeholder=\"Select Submenu Type\">" +
								"<option value = \"\">Select Submenu Type</option><option value = \"1\">Main Submenu</option>"+
								"<option value = \"2\">Submenu Link</option></select></div><span class=\"col-sm-2\" id=\"error5\" style = \"color: red\"></span>";
					$('#type').html(outputs);
					$(".js-example-data-ajax3").select2({
						placeholder: "Select a submenu type",
						allowClear: true
					});
					$('#createform').attr('id', function(){
						return 'formcreate'
					});
					$('#addsubmenu').attr('id', function(){
						$('#addsubmenu').html('Click to Add Menu');
						return 'addmenu';
					});
					$('#menulabel').attr('id', function(){
						$('#menulabel').html('Submenu Name');
						return 'submenulabel';
					});
					$('#submenulabel').attr('for', function(){
						return 'submenuname';
					});
					$('#menuname').attr('id', function(){
						return 'submenuname';
					});
					$('#submenuname').attr('placeholder', function(){
						return 'Input Submenu Name';
					});
					
				})
				$('#addmenu').live('click', function(e) {
					e.preventDefault();
					document.getElementById('myform').reset();
					$('#menuname').val('');
					$('#submenuname').val('');
					$('#filename').val('');
					$('#submenutype').val('');
					$('#error2').html('');
					$('#error3').attr('id', function(){
						return 'error2';
					});
					$('#submenulabel').attr('id', function(){
						$('#submenulabel').html('Menu Name');
						return 'menulabel';
					});
					$('#menulabel').attr('for', function(){
						return 'menuname';
					});
					$('#submenuname').attr('id', function(){
						return 'menuname';
					});
					$('#menuname').attr('placeholder', function(){
						return 'Input Menu Name';
					});
					$('#addselect').html('');
					$('#extension').html('');
					$('#file').html('');
					$('#type').html('');
					$('#formcreate').attr('id', function(){
						return 'createform';
					});
					$('#addmenu').attr('id', function(){
						$('#addmenu').html('Click to Add Submenu');
						return 'addsubmenu';
					});
					
				});
				
			});									
		</script>
	</head>
	<body>
		<form class="form-horizontal" id ="myform" action="#" method="post" role="form">
			<div class="form-group">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-2">
					<a id = 'addsubmenu' href = '#'  class="btn btn-default">Click to Add Submenu</a>
				</div>
			</div>
			<div id = 'addselect' class="form-group">
			</div>
			<div id = 'type' class="form-group">
			</div>
			<div class="form-group">
				<label id='menulabel' class="col-sm-2 control-label" for="menuname">Menu Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="menuname" placeholder="Input Menu Name"/>
				</div>
				<span class="col-sm-2" id='error2' style = "color: red"></span>
			</div>
			<div id = 'file' class="form-group">
			
			</div>
			<div id = 'extension' class="form-group">
			
			</div>
			<div class="form-group">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-10">
					<input type="button"  id = "createform" class="btn btn-default" value = "Create"/>
				</div>
			</div>
		</form>
	</body>
</html>