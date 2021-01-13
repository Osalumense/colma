<?php 
	//session_start();
		$segments = explode('/', $_SERVER['PHP_SELF']);
			//print_r($segments);
		//count($segments);
		$url = '';
		$val = count($segments) - 4;
	if(!isset($_SESSION['loginid']))
	{
		for($i = 0; $i <= $val; $i++ ){
				$url .= '../';
		}
		$rl = $url . 'logout.php';
		die("<script>alert('You are not logged in!!');window.location.href='" . $rl . "';</script>");
		
				}//getting the current page name into a variable
	else if(isset($_SESSION['loginid'])){
		$current_file_name="";
		$current_file_name = basename($_SERVER['REQUEST_URI']); //echo $current_file_name;
		$mystring = $_SESSION['pages'];
		$findme = "";
		$others="";
			//echo $_SERVER['PHP_SELF'];
		$filename = explode("?", $current_file_name);
		$findme=$filename[0];
		if (strpos($mystring, $findme) === false) {
			for($i = 0; $i <= $val; $i++ ){
				$url .= '../';
			}
			$rl = $url . 'right.php';
			//header("location:" . $rl);
			die( "<script>window.location.href = '" . $rl . "'</script>");
		}
		else {
			//echo $_SERVER['self'];
		}
	}
 ?>