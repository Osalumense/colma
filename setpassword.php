<?php
$timeTarget = 0.05; // 50 milliseconds 
				//$userid = $_POST['userid'];
				//$pword = 'student';
				$cost = 10;
				//do {
					$cost++;
					$start = microtime(true);
					$pword = password_hash('kunlerec', PASSWORD_BCRYPT, ["cost" => $cost]);
					echo $pword . "<br />";
					$end = microtime(true);
				//} while (($end - $start) < $timeTarget);
				//echo "Appropriate Cost Found: " . $cost . "<br />" . password_hash("dev1", PASSWORD_BCRYPT, ["cost" => $cost]) . "<br />";
?>