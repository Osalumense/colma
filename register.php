<?php
	session_start();
	if($_SERVER['HTTP_HOST'] != 'covenantportal.covenantuniversity.edu.ng'){
		include_once('include/covenantportalconfig.php');
		//echo "no ";
		//echo $conn;
	}
	else if($_SERVER['HTTP_HOST'] == 'covenantportal.covenantuniversity.edu.ng') 
		include_once("../../include/config.php");
	//print_r()
	//print_r($_SESSION);
	//echo "<br />";
	//$_SESSION['loginid'] = '';
	if(isset($_GET['kjk']) && $_GET['kjk'] != ''){
		$sesid = $_GET['kjk'];
		//echo "<br />".$sesid."<br />";
		
		//echo "help<br />";
		//$con = db();
		//echo "select * from sessions where sessionname = 'loginid' and sessionstatus = 1";
		$stmt = $conn->prepare("select * from sessions where sessionname = 'loginid' and sessionstatus = 1");
		$stmt->execute();
		//print_r($stmt);
		while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
			//echo "<br />";
			//echo $data['sessionvalue'];
			if (password_verify($data['loginid'], $sesid)){
				//extract($data);
				//echo $data['loginid']."<br/>";
				//print_r($stmt);
				$stmt1 = $conn->prepare("select * from sessions where loginid = '" . $data['loginid'] . "' and sessionstatus = 1");
				$stmt1->execute();
				
				while($data1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
					$_SESSION[$data1['sessionname']] = $data1['sessionvalue'];
					if($data1['sessionname'] == 'loginid')
						$_SESSION['loginid'] = $data['loginid'];
					if($data1['sessionname'] == 'roles')
						$_SESSION['roles'] = explode(',', $data1['sessionvalue']);
				}
				//print_r($_SESSION['roles']);
				//echo "<br/>";
				//echo $_SESSION['loginid']." try <br/>";
					//header('location: ../../administration.php');
					die("<script>window.top.location.href = 'http://covenantportal.covenantuniversity.edu.ng/administration.php';</script>");
					//header('location: covenantportal.covenantuniversity.edu.ng/administration.php');
					break;
				//die("hi");
			}
			else{
				echo "wrong";
			}
		}
	}
?>