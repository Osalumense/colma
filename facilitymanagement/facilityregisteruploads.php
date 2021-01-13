<?php
	//echo $_SESSION['loginid'].'ty <br/>';
	//include_once('../include/zz.php');
	include_once('../include/config.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	date_default_timezone_set("Africa/Lagos");
	$userid = $_SESSION['loginid'];
	/* register.php */

	//header("Content-type: text/plain");

	$output .= "<a href='#'  class=\"btn btn-primary clickhere\" id ='upload' >Final Upload</a><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\">\n\n";
	//$output .= "hi";
	$f = fopen($_FILES['csv']['tmp_name'], "r");
	$sn = 0;
	$allowed = array('csv');
	$filename = $_FILES['csv']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
		echo 'error';
		exit;
	}

	while (($line = fgetcsv($f, 1000, ",")) !== FALSE){
		++$sn;
		if($sn == 1){
			$output .= "<thead><tr>";
			foreach ($line as $cell) {
					$output .=  "<th>" . htmlspecialchars($cell) . "</th>";
					continue;
			}
			$output .=  "</tr></thead><tbody>";
		}
		else{
			$output .= "<tr>";
			foreach ($line as $cell) {
					$output .=  "<td>" . htmlspecialchars($cell) . "</td>";
			}
			$output .=  "</tr>";	
		}
	}
	fclose($f);
	$output .= "</tbody></table>";
	echo $output;
	//echo "ggggggggg";
?>