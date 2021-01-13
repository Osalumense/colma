<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('include/config.php');
	include_once('include/portalfunctions.php');
 	if(isset($_SESSION['loginid']) && isset($_SESSION['usertypeid'])){
		if($_SESSION['loginid'] != '' && $_SESSION['usertypeid'] != '')
		{
			$stmtrdir = $conn->prepare("select * from usertypes where usertypeid = '" . $_SESSION['usertypeid'] ."'");
			$stmtrdir->execute();
			$datardir = $stmtrdir->fetch(PDO::FETCH_ASSOC);
			$_SESSION['loginid'] = $loginid;
			die("<script>window.location.href= '" . $datardir['usertypeurl'] . "'</script>");
		}
	}
	else if(isset($_POST['signin'])){
		if(isset($_POST['userid']) && isset($_POST['inputpassword1'])){
			if($_POST['userid'] != '' && $_POST['inputpassword1'] != ''){
				//$timeTarget = 0.05; // 50 milliseconds 
				$userid = $_POST['userid'];
				$pword = $_POST['inputpassword1'];
				$stmt = $conn->prepare("select * from login where userid = '$userid'");
				$stmt->execute();
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				$pword1 = $data['kokoro'];
				if (password_verify($pword, $pword1)){
					//session_destroy();
					$loginid = $data['loginid'];
					$_SESSION['loginid'] = "";
					$_SESSION['usertypeid'] = "";
					$_SESSION['usertypeid'] = $data['usertypeid'];
					$roles = array();
					$roles = get_userrole($conn, $loginid);
					if(empty($roles))
					{
						$_SESSION['loginid'] = $loginid;
						$output = "<script>alert('role has been deleted for user with login id '+" . $loginid . ");";
						$output .= "window.location.href ='index.php';</script>";
						logguser('','role has been deleted for user with login id ' . $loginid , '', '');
						$_SESSION['loginid'] = "";
						$_SESSION['usertypeid'] = "";
						session_destroy();
						die ($output);
					}
					$_SESSION['loginid'] = $loginid;
					$cost = 11;
					$hashloginid = password_hash($loginid, PASSWORD_BCRYPT, ["cost" => $cost]);
					$stmtrdir = $conn->prepare("select * from usertypes where usertypeid = '" . $_SESSION['usertypeid'] ."'");
					$stmtrdir->execute();
					$datardir = $stmtrdir->fetch(PDO::FETCH_ASSOC);
					//echo "hi";
					$incorrectLogin = "";
					$userdetails = get_user($conn, $_SESSION['loginid']);
					//print_r($userdetails);
					$userid =implode(',', array_map(function($el){ return $el['userid']; }, $userdetails));
					$comment =  $userid . " logged in";
					logguser($conn, '',$comment, '');
					//print_r($_SESSION);
					echo"<script> window.location.href = '" . $datardir['usertypeurl'] . "'</script>";
					
				} else {
					$incorrectLogin = 'Username or Password Incorrect';
					session_destroy();
				}	
			}
		}	
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>COLMA Portal || Login</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<!-- bootstrap 3.0.2 -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- font Awesome -->
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> -->
		<!-- Theme style -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]-->
		<!--[endif]-->
	   <!-- body {
		background-image: url("paper.gif");
		background-color: #cccccc;
		}-->
		<style>
			html, body{
				
				padding-top: 0;
				height: 100%;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		</style>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<script src="assets/js/jquery.js"></script>
	</head>
	<body class="skin-black" style="margin: auto; ">
		<div class="row" style="padding-bottom: 10.5%; height:100%; background-color:rgba(131, 132, 136, 0.68);">
			<div  class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 " style="  height:50%; margin-top: 10%; margin-bottom: auto;">
				<div>
					<section class="panel">
						<header class="panel-heading" style="text-align: center; background-color: white;">
						<img width = '100px' height = '80px' src="assets/img/logo1.jpg" alt="User Image"/><h3>Covenant Liberation Multipurpose Association</h3>
						</header>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method='post' id = 'login'>
								<?php if(isset($incorrectLogin)): ?>
								<div class='error'>
									<p style = "color: red"><?php echo $incorrectLogin;?></p>
								</div>
								<?php endif; ?>
								<div class="form-group">
									<!-- <label for="userid" class="col-lg-2 col-sm-2 control-label">Mat No</label>-->
									<div class="col-lg-12">
										<input type="text" class="form-control" id="userid" name="userid" placeholder="User Name" required />
										<p class="help-block" style="text-align: center;">USER  :  Input Username</p>
									</div>
								</div>
								<div class="form-group">
									<!--<label for="inputpassword1" class="col-lg-2 col-sm-2 control-label">Password</label>-->
									<div class="col-lg-12">
										<input type="password" class="form-control" id="inputpassword1" name="inputpassword1" placeholder="Password" required />
										<p class="help-block" style="text-align: center;">Remember  :  Passwords are CASE SENSITIVE</p>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12">
										<input type = "submit" style="width: 100%; background-color:#d5d5d5; color:#808080" class="btn btn-danger" value = "SIGN IN" name = "signin" id = "signin" />
									</div>
								</div>
							</form>
						</div>
					</section>
				</div>
			</div>
		</div> 
	</body>
</html>