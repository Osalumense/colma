<?php
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$userid=$_SESSION['loginid'];
	include("../../../include/zz.php");
	include_once('../../../include/config.php');
	include_once("../../../include/portalfunctions.php");
	date_default_timezone_set("Africa/Lagos");
?>
<!doctype html>
<html>
	<head>
		<link rel = "stylesheet" href = "../../../assets/css/bootstrap.css" />
		<link rel = "stylesheet" href = "../../../assets/css/style.css" />
		<link rel = "stylesheet" href = "../../../assets/css/jquery.dataTables.min.css" />
		<link href="../../../assets/css/select2.css" rel="stylesheet" type="text/css" />
		<script src = "../../../assets/js/jquery.js" type = "text/javascript"></script>
		<script src = "../../../assets/js/jquery.dataTables.js" type = "text/javascript"></script>
		<script language="javascript" src="../../../assets/js/select2.js"></script>		
		<script>
			$(document).ready(function(){
				$(".js-example-data-ajax1").select2({
					placeholder: "Select an application",
					allowClear: true
				});
			});
			$('#appid').change(function(){
				$.ajax({
					type:'post',
					url: '../include/appajax.php',
					data: {logappid: $('#appid').val()},
					dataType: 'json',
					success: function(result){
						
					}
				});
			});
			$(document).ready(function(){
				$(".js-example-data-ajax2").select2({
					placeholder: "Select a menu",
					allowClear: true
				});
			});
		</script>
	</head>
	<body>
		<fieldset>
			<legend><?php echo ucwords($_SESSION['appname']) . " > " .ucwords($_SESSION['menuname']) . " > View logs"; ?></legend>
		<form class="form-horizontal" id = "logform" action="#" method="post" role="form">
			<div class = 'form-group'>
				<div class = 'col-sm-2'>
				</div>
				<label for = 'appname' class = "control-label col-sm-2">Application Name: </label>
				<div class = 'col-sm-4'>
					<select class= 'js-example-data-ajax1 form-control' id = 'appid'>
						<option value = '' selected>Select an Application</option>
						<?php 
						$apps = (view_app($conn, 0, 1));
						foreach($apps as $app){
							extract($app);
							?>
								<option value = '<?php echo $appid?>'><?php echo ucwords($appname)?></option>
							<?php
						}
						if(!empty(view_app($conn, 0, 0)))
						{
							$appsdeleted = (view_app($conn, 0, 0));
							foreach($appsdeleted as $app){
								extract($app);
								?>
									<option value = '<?php echo $appid?>'><?php echo ucwords($appname)?></option>
								<?php
							}
						}
					?>
						
					</select>
				</div>
			</div>
			<div class = 'form-group'>
				<div class = 'col-sm-2'>
				</div>
				<div id = 'menulabel'>
				</div>
				<div id = 'selectmenu' class = 'col-sm-4'>
				</div>
			</div>
		</form>
			
		</fieldset>
	</body>
</html>