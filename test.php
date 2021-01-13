
<?php
header("Cache-Control: no-cache, must-revalidate");
	include_once('include/config.php');
	include_once('include/portalfunctions.php');
    $id=2;
    $_SESSION['loginid']=1;
    $role=get_userrole($conn, $loginid);
    print_r($role);
    print_r(error_get_last());


?>

