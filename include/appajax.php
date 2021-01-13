<?php
	session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("Cache-Control: no-cache, must-revalidate");
	include_once('../include/config.php');
	//include_once('../include/zz.php');
	include_once('../include/portalfunctions.php');
	//echo "hi";
	if(isset($_POST['submenuview']) && isset($_POST['menuid'])){
		if($_POST['submenuview'] != '' && $_POST['menuid'] > 0){
			//$stmt = $conn->prepare("se")
			$submenus = load_submenu($conn, 0, 0, $_POST['menuid'], 1, 1);
			//print_r($submenus);
			$output   = '';
			$output  .= "<table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th>Sn</th><th>Menu</th><th>Submenu</th><th>Submenu Type</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
			$sn 	  = 0;
			foreach($submenus as $submenu)
			{
				++$sn;
				extract($submenu);
				//echo "<br />" . $appname . "<br />"; 
				$menunames = menu_view($conn, $_POST['menuid'],1);
				$menuname  = implode(',', array_map(function($el){ return $el['menuname']; }, $menunames));
				$output   .= "<tr><td>$sn</td><td>" . ucwords($menuname) . "</td><td id='click$submenuid'>" . ucwords($submenuname) . "</td><td id='submenutype$submenuid'>";
				$output   .= $submenutypeid == 1 ? "Main Submenu": "Submenu Link";
				$output   .= "</td><td><a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\" id = 'edit$submenuid'><span class = 'glyphicon glyphicon-edit'></span></a></td><td><a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clikhere\" id = 'delete$submenuid'><span class = 'glyphicon glyphicon-trash'></span></a></td></tr>";
			}
			$output 	  .= "</tbody></table>";
			echo $output;
		}
	}
	else if(isset($_POST['switchsubmenuidact']) && isset($_POST['switchmenuidact']) && isset($_POST['switchsubmenutypeidact'])){
		if($_POST['switchsubmenuidact'] > 0 && $_POST['switchmenuidact'] > 0 && $_POST['switchsubmenutypeidact'] > 0){
			
		}
	}
	else if(isset($_POST['pageload']))
	{
		if($_POST['pageload'] != '')
		{
			//$app = array();
			$pageload 	= test_input($_POST['pageload']);
			$pages 		= strtolower($pageload);
			if($pages == 'pageload')
			{
				$role 		= implode(",",$_SESSION['roles']);
				$apps .= create_app($conn);
				echo $apps;
			}
		}
		exit;
	}
	else if(isset($_POST['switchsubmenuview']) && isset($_POST['switchmenuid'])){
		if($_POST['switchsubmenuview'] != '' && $_POST['switchmenuid'] > 0){
			//$stmt = $conn->prepare("se")
			$submenus = load_submenu($conn, 0, $_POST['switchmenuid'], 0, 1, 1);
			//print_r($submenus);
			$output   = '';
			$output  .= "<table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th>Sn</th><th>Menu</th><th>Submenu</th><th>Submenu Type</th><th>Edit</th></tr></thead><tbody>";
			$sn 	  = 0;
			foreach($submenus as $submenu)
			{
				++$sn;
				extract($submenu);
				$menunames = menu_view($conn, $_POST['switchmenuid'],1);
				$menuname  = implode(',', array_map(function($el){ return $el['menuname']; }, $menunames));
				$output   .= "<tr><td>$sn</td><td id='menu$submenuid'>" . ucwords($menuname) . "</td><td id='submenu$submenuid'>" . ucwords($submenuname) . "</td><td id='submenutype$submenuid'>";
				$output   .= $submenutypeid == 1 ? "Main Submenu": "Submenu Link";
				$output   .= "</td><td><a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\" id = 'edit$submenuid'><span class = 'glyphicon glyphicon-edit'></span></a></td></tr>";
			}
			$output 	  .= "</tbody></table>";
			echo $output;
		}
	}
	
	else if(isset($_POST['switchsubmenudetail']) && $_POST['switchsubmenudetail'] > 0)
	{
		//echo "hi";
		$submenus 	 = load_submenu($conn, 0, $_POST['switchsubmenudetail'], 0, 1, 1);
		$submen 	 = implode(',', array_map(function($el){ return $el['menuid']; }, $submenus));
		$submenutype = implode(',', array_map(function($el){ return $el['submenutypeid']; }, $submenus));
		$submenuname = implode(',', array_map(function($el){ return $el['submenuname']; }, $submenus));
		$submenuid	 = implode(',', array_map(function($el){ return $el['submenuid']; }, $submenus));
		$output = "<script>$(document).ready(function(){";
			$output .=	"$(\"#menuid\").select2({";
			$output .=	"placeholder: \"Select a menu\",";
			$output .=	"allowClear: true";
			$output .=	"});";
			$output .=	"$(\"#submenutypeid\").select2({";
			$output .=	"placeholder: \"Select a submenu type\",";
			$output .=	"allowClear: true";
			$output .=	"});";
			$output .=	"});";
		$output .=	"</script>";
		$menus 		 = menu_view($conn,0,1);
		$output  .= "<div class=\"form-group\" id = 'addmenu'><label for = 'menuid' class= 'control-label col-sm-2'>Menu:</label>";
		$output .= "<div class = 'col-sm-6'><select id = \"menuid\" name = \"menuid\"><option value =\"\">Select menu</option>";
		foreach($menus as $menu){
			extract($menu);
			$output .= "<option value = \"$appmenuid\"";
			$output .=  $submen == $appmenuid ? "selected>":">"; 
			$output .=  ucwords($menuname) . "</option>";
		}
		$output  .= "</select></div></div>";
		$output  .= "<div class=\"form-group\"><label for = 'submenutypeid' class= 'control-label col-sm-2'>Submenutype:</label>";
		$output .= "<div class = 'col-sm-6'><select id = \"submenutypeid\" name = \"submenutypeid\"><option value =\"\">Select submenu type</option>";
		$output .= "<option value = \"1\"";
		$output .= $submenutype == 1 ? "selected>":">"; 
		$output .= "Main Submenu</option>";
		$output .= "<option value = \"2\"";
		$output .= $submenutype == 2 ? "selected>":">"; 
		$output .= "Submenu Link</option>";
		$output .= "</select></div></div>";
		$output	  .= "<div class=\"form-group\"><label for = 'submenu' class= 'control-label col-sm-2'>Submenu</label>";
		$output	 .= "<div class = 'col-sm-8'>";
		$output	 .= "<input type = 'text' class = 'form-control' id = 'submenu' name = 'submenu' value = '$submenuname' readonly />";
		$output	 .= "<input type = 'hidden' id = 'submenuid' name = 'submenuid' value = '$submenuid' />";
		$output	 .= "</div></div>";
		$output  .= "<div class=\"form-group\">";
		$output		 .= "<div class=\"col-sm-offset-2 col-sm-10\">";
		$output		 .="<input type=\"submit\" style=\"background-color:#dcdcdc; color:white;\" id = \"create\" class=\"btn btn-default\" value = \"Create\"/>";
		$output		 .="</div></div>";
		echo $output;
		exit;
	}
	else if(isset($_POST['rolename']))
	{
		if($_POST['rolename'] != '')
		{
			//$id = 0;
			//$app = array();
			$rolename 	= test_input($_POST['rolename']);
			$rolename 	= strtolower($rolename);
			$stmtsel 	= $conn->prepare("select rolename from roles where rolename = '$rolename' and status = 1");
			//echo "select rolename from roles where rolename = '$rolename'";
			$stmtsel->execute();
			$countsel 	= $stmtsel->rowCount();
			$stmtsel1 	= $conn->prepare("select rolename from roles where rolename = '$rolename' and status = 0");
			//echo "select rolename from roles where rolename = '$rolename'";
			$stmtsel1->execute();
			$countsel1 	= $stmtsel1->rowCount();
			if($countsel == 0)
			{
				$stmt = "insert into roles(rolename, status) values('" . strtolower($rolename) . "', 1)";
				//echo $stmt;
				$conn->exec($stmt);
				$id = $conn->lastInsertId();
				if($id > 0){
					echo ucwords($rolename). " added successfully";
				}
				else echo ucwords($rolename). " not successfully added";
			}
			else if($countsel > 0)
			{
				echo ucwords($rolename). " already exists to change change name go to edit role in roles menu";	
			}
			else if($countsel1 > 0)
			{
				echo ucwords($rolename). " already exists and has been deleted re-add from deleted items menu";	
			}
		}
		else echo "Role name fiels is empty please input a role name";
		exit;
	}
	else if(isset($_POST['editrole'])){
		if($_POST['editrole'] != '')
		{
			$output  = '';
			$roles 	 = load_roles($conn, 0);
			$output .="<input type = 'button' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clikhere\" value = 'Delete selected'  id ='delete'/><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th><input type = 'checkbox' class ='checkall' value = 'checkall' id = 'checkall'/><label for = 'checkall'>Select all</label></th><th>Sn</th><th>Roles</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
			$sn = 0;
			foreach($roles as $role)
			{
				++$sn;
				extract($role);
				$output .= "<tr id = 'clickhere$roleid'><td><input type = 'checkbox' value = '$roleid' id = 'check$roleid' name = 'roles'/></td><td>$sn</td><td id = 'click$roleid'>" . ucwords($rolename) . "</td><td><button type  = 'button' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\" id ='edit$roleid'><span class = 'glyphicon glyphicon-edit'></span></button></td><td><button type  = 'button' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clikhere\" id ='delete$roleid'><span class = 'glyphicon glyphicon-trash'></span></button></td></tr>";
			}
			$output .="</tbody></table>";
			echo $output;
		}
		exit;
	}
	else if(isset($_POST['deledmenus'])){
		if($_POST['deledmenus'] != '')
		{
			$output  = '';
			$output .="<input type  = 'button' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default restore\" value = 'Restore selected'  id ='restore'/><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th><input type = 'checkbox' class ='checkall' value = 'checkall' id = 'checkall'/><label for = 'checkall'>Select all</label></th><th>Sn</th><th>Menu</th><th>Restore</th></tr></thead><tbody>";
			$sn 	 = 0;
			$stmt 	 = $conn->prepare("select * from appsmenu where and status = 0");
			$stmt->execute();
			$menus 	 = $stmt->fetchall();
			foreach($menus as $menu)
			{
				++$sn;
				extract($menu);
				$output .= "<tr><td><input type = 'checkbox' value = '$appmenuid' id = 'check$appmenuid' name = 'menus'/></td><td>$sn</td><td>$menuname</td><td><input type  = 'button' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default restore\" value = 'Restore " . ucwords($menuname) . "'  id ='restore$appmenuid'/></td></tr>";	
				
			}
			$output .="</tbody></table>";
			echo $output;
		}
		exit;
	}
	else if(isset($_POST['deledsubmenus'])){
		if($_POST['deledsubmenus'] != '')
		{
			$output 	= '';
			$submenuids = implode(',', array_map(function($el){ return $el['submenuid']; }, load_submenu($conn, 0, 0, 0, 0, 1)));
			$output    .="<input type  = 'button' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default restore\" value = 'Restore selected'  id ='restore'/><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th><input type = 'checkbox' class ='checkall' value = 'checkall' id = 'checkall'/><label for = 'checkall'>Select all</label></th><th>Sn</th><th>Submenu</th><th>Restore</th></tr></thead><tbody>";
			$sn 		= 0;
			$stmt 		= $conn->prepare("select * from appssubmenu where submenuid in ($submenuids) and status = 0 and menustatus = 1");
			$stmt->execute();
			$submenus 	= $stmt->fetchall();
			foreach($submenus as $submenu)
			{
				++$sn;
				extract($submenu);
				$output .= "<tr><td><input type = 'checkbox' value = '$submenuid' id = 'check$submenuid' name = 'submenus'/></td><td>$sn</td><td>" . ucwords($submenuname) . "</td><td><input type  = 'button' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default restore\" value = 'Restore " . ucwords($submenuname) . "'  id ='restore$submenuid'/></td></tr>";
			}
			$output 	.="</tbody></table>";
			echo $output;
		}
		exit;
	}
	else if(isset($_POST['changerole']) && isset($_POST['roleid'])){
		//echo "hi";
		if($_POST['changerole'] != '' && $_POST['roleid'] != '')
		{
			$rolename = strtolower(test_input($_POST['changerole']));
			$roleid   = $_POST['roleid'];
			$stmtsel  = $conn->prepare("select rolename from roles where roleid = $roleid and status = 1");
			$stmtsel->execute();
			$countsel = $stmtsel->rowCount();
			$stmt 	  = $conn->prepare("update roles set rolename = '$rolename' where roleid = $roleid and status = 1");
			//echo "update roles set rolename = '$rolename' and status = 1";
			$stmt->execute();
			$count 	  = $stmt->rowCount();
			if($count > 0 && $countsel > 0)
			{
				$datasel = $stmtsel->fetch(PDO::FETCH_ASSOC);
				$comment = "Role name changed from " . $datasel['rolename'] . " to " . $rolename;
				logguser($conn, '',$comment, $_SESSION['menuid']);
				echo "Role name changed successfully";
			}
		}
		exit;
	}
	else if(isset($_POST['changesubmenu']) && isset($_POST['editmenuid']) && isset($_POST['editsubmenuid'])){
		//echo "hi";
		if($_POST['changesubmenu'] != '' && $_POST['editmenuid'] != '' && $_POST['editsubmenuid'] != '')
		{
			$submenuname 	= strtolower(test_input($_POST['changesubmenu']));
			$menuid 	 	= $_POST['editmenuid'];
			$submenuid 	 	= $_POST['editsubmenuid'];
			$oldsubmenuname = implode(',', array_map(function($el){ return $el['submenuname']; }, load_submenu($conn, 0, $submenuid, $menuid, 1, 1)));
			$stmt = $conn->prepare("update appssubmenu set submenuname = '$submenuname' where menuid = $menuid and submenuid = $submenuid and status = 1");
			//echo "update roles set rolename = '$rolename' and status = 1";
			$stmt->execute();
			$count 			= $stmt->rowCount();
			if($count > 0)
			{
				$comment = "Submenu name changed from " . ucwords($oldsubmenuname) . " to " . ucwords($submenuname);
				echo "Submenu name changed from " . ucwords($oldsubmenuname) . " to " . ucwords($submenuname);
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
		}
		exit;
	}
	else if(isset($_POST['changemenu']) && isset($_POST['editmenuid'])){
		//echo "hi";
		if($_POST['changemenu'] != '' && $_POST['editmenuid'] != '')
		{
			$menuname 	 = strtolower(test_input($_POST['changemenu']));
			$menuid 	 = $_POST['editmenuid'];
			$oldmenuname = implode(',', array_map(function($el){ return $el['menuname']; }, menu_view($conn, $menuid, 1)));
			$stmt 		 = $conn->prepare("update appsmenu set menuname = '$menuname' where appmenuid = $menuid and status = 1");
			//echo "update roles set rolename = '$rolename' and status = 1";
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				rename("../" . str_replace(' ', '', $oldmenuname), "../" . str_replace(' ', '', $menuname));
				echo "Menu name changed from " . ucwords($oldmenuname) . " to " . ucwords($menuname);
				$comment = "Menu name changed from " . ucwords($oldmenuname) . " to " . ucwords($menuname);
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
		}
		exit;
	}
	else if(isset($_POST['deleterole']) && isset($_POST['roleid'])){
		//echo "hi";
		if($_POST['deleterole'] != '' && $_POST['roleid'] != '')
		{
			$roleid = $_POST['roleid'];
			
			$stmt 	= $conn->prepare("update roles set status = 0 where roleid in (". implode(',', $roleid) . ") and status = 1");
			//echo "update roles set rolename = '$rolename' and status = 1";
			$stmt->execute();
			$count 	= $stmt->rowCount();
			if($count > 0)
			{
				$stmt1 	= $conn->prepare("update userroles set rolestatus = 0 where roleid in (". implode(',', $roleid) . ") and (status = 1 or status = 0) and rolestatus = 1");
				$stmt1->execute();
				$count1 = $stmt1->rowCount();
				if($count1 > 0)
				{
					$stmt2 = $conn->prepare("update userrights set status = 0, rolestatus = 0 where roleid in (". implode(',', $roleid) . ") and (status = 1 or status = 0 ) and rolestatus = 1");
					//echo "update roles set rolename = '$rolename' and status = 1";
					$stmt2->execute();
					
					$comment = "$count role";
					if($count > 1)
						$comment .= "s";
					$comment .= " deleted successfully";
					echo $comment;
					logguser($conn, '',$comment, $_SESSION['menuid']);
				}
			}
		}
		exit;
	}
	else if(isset($_POST['deletemenu']) && isset($_POST['menuiddel'])){
		//echo "hi";
		if($_POST['deletemenu'] != '' && $_POST['menuiddel'] != '')
		{
			$menuid		 = $_POST['menuiddel'];
			$oldmenuname = implode(',', array_map(function($el){ return $el['menuname']; }, menu_view($conn, $menuid, 1)));
			$submenuid	 = implode(',', array_map(function($el){ return $el['submenuid']; }, load_submenu($conn, 0, 0, $menuid, 1, 1)));
			$stmt		 = $conn->prepare("update appsmenu set status = 0 where appmenuid = $menuid and status = 1");
			$stmt1		 = $conn->prepare("update appssubmenu set status = 0, menustatus = 3 where menuid = $menuid and status = 1 and menustatus = 1");
			$stmt2		 = $conn->prepare("update userrights set status = 0, menustatus = 3, submenustatus = 3 where appsubmenuid in ($submenuid) and status = 1 and menustatus = 1 and submenustatus = 1");
			//echo "update roles set rolename = '$rolename' and status = 1";
			$stmt->execute();
			$count		 = $stmt->rowCount();
			if($count > 0)
			{
				$stmt1->execute();
				$stmt2->execute();
				echo ucwords($oldmenuname) . " deleted successfully from menu list";
				$comment = ucwords($oldmenuname) . " deleted successfully from menu list";
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
		}
		exit;
	}
	else if(isset($_POST['deletesubmenu']) && isset($_POST['delsubmenuid']) && isset($_POST['delmenuid'])){
		//echo "hi";
		if($_POST['deletesubmenu'] != '' && $_POST['delsubmenuid'] != '' && $_POST['delmenuid'] != '')
		{
			$submenuid 		= $_POST['delsubmenuid'];
			$menuid 		= $_POST['delmenuid'];
			$oldsubmenuname = implode(',', array_map(function($el){ return $el['submenuname']; }, load_submenu($conn, 0, $submenuid, $menuid, 1, 1)));
			$stmt 			= $conn->prepare("update appssubmenu set status = 0 where submenuid = $submenuid and menuid = $menuid and status = 1");
			$stmt1 			= $conn->prepare("update userrights set status = 0, submenustatus = 4 where appsubmenuid = $submenuid and status = 1 and submenustatus = 1");
			//echo "update roles set rolename = '$rolename' and status = 1";
			$stmt->execute();
			$count 			= $stmt->rowCount();
			if($count > 0)
			{
				$stmt1->execute();
				echo ucwords($oldsubmenuname) . " deleted successfully from menu list";
				$comment = ucwords($oldsubmenuname) . " deleted successfully from menu list";
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
		}
		exit;
	}
	else if(isset($_POST['loadmenuedit'])){
		//echo $_POST['openapp'];
		if($_POST['loadmenuedit'] != '')
		{
			$menus	 = menu_view($conn, 0, 1);
			$output  ="";
			$output .="<table id=\"mytable\" class=\"display\" cellspacing=\"0\"><thead><tr><th>Sn</th><th>Menu</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
			$sn		 = 0;
			foreach($menus as $menu)
			{
				++$sn;
				extract($menu);
				$output .= "<tr><td>$sn</td><td  id = 'click$appmenuid' class='increase'>" . ucwords($menuname) . "</td><td><a style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\"  id ='edit$appmenuid'><span class = 'glyphicon glyphicon-edit'></span></a></td><td><a style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clikhere\" id ='delete$appmenuid'><span class = 'glyphicon glyphicon-trash'></span></a></td></tr>";
			}
			$output .="</tbody></table>";
			echo $output;
		}
		exit;
	}
	else if(isset($_POST['loadmenutype']))
	{
		if($_POST['loadmenutype'] != '')
		{
			//$app = array();
			$loadmenutype = test_input($_POST['loadmenutype']);
			$stmt		  = $conn->prepare("select * from menutypes");
			$stmt->execute();
			$count		  = $stmt->rowCount();
			$output		  = "";
			if($count > 0)
			{
				$output = "<option value = \"\" select>Select Menu Type</option>";
				while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
					$output .= "<option value = \"" . $data['mtypid'] . "\">" . $data['mtypname'] . "</option>";
				}
				echo $output;
			}
		}
		exit;
	}
	else if(isset($_POST['menuname']) && isset($_POST['functions']))
	{
		if($_POST['menuname'] != '')
		{
			//echo $_POST['menuadd'];
			//$app = array();
			$menuname  = test_input($_POST['menuname']);
			$menuname  = strtolower($menuname);
			$stmtsel   = $conn->prepare("select * from appsmenu where menuname = '$menuname' and status = 1");
			$stmtsel->execute();
			$countsel  = $stmtsel->rowCount();
			$stmtsel1  = $conn->prepare("select * from appsmenu where menuname = '$menuname' and status = 0");
			$stmtsel1->execute();
			$countsel1 = $stmtsel1->rowCount();
			if($countsel > 0){
				echo "The menu exists in this application";
				$comment = "The menu exists in this application";
				logguser($conn, '',$comment, $_SESSION['menuid']);
				exit;
			}
			else if($countsel1 > 0){
				echo "The menu exists in this application and has been deleted, read from deleted items menu";
				$comment = "The menu exists in this application and has been deleted, read from deleted items menu";
				logguser($conn, '',$comment, $_SESSION['menuid']);
				exit;
			}
			else
			{
					if (!file_exists("../$menuname"))
					{
						mkdir("../" . str_replace(' ', '', $menuname), 0777, true);
						$content = "";
						
						$fp		 = fopen("../" . str_replace(' ', '', $menuname) . "/index.php","wb");
						fwrite($fp,$content);
						fclose($fp);
						$stmt	 = "insert into appsmenu(menuname, status) values('$menuname', 1)";
						$conn->exec($stmt);
						$id		 = $conn->lastInsertId();
						$output	 = "";
						if($id != 0)
						{
							//echo "hi";
							echo ucwords($menuname) . " added as menu to this application";
							$comment = ucwords($menuname) . " added as menu to this application";
							logguser($conn, '',$comment, $_SESSION['menuid']);
						}
					}
					else{
						$fp		 = fopen("../" . str_replace(' ', '', $menuname) . "/index.php","wb");
						fwrite($fp,$content);
						fclose($fp);
						$stmt	 = "insert into appsmenu(menuname, status) values('$menuname', 1)";
						$conn->exec($stmt);
						$id		 = $conn->lastInsertId();
						$output	 = "";
						if($id != 0)
						{
							//echo "hi";
							echo ucwords($menuname) . " added as menu to this application";
							$comment = ucwords($menuname) . " added as menu to this application";
							logguser($conn, '',$comment, $_SESSION['menuid']);
						}
					}
				
			}
		}
		exit;
	}
	else if(isset($_POST['menuname']) && isset($_POST['submenuname']) && isset($_POST['filename']) && isset($_POST['submenutype']) && isset($_POST['extensionname']))
	{		
		if($_POST['menuname'] != '' && $_POST['submenuname'] != '' && $_POST['filename'] != '' && $_POST['submenutype'] != '' && $_POST['extensionname'] != '')
		{
			//echo "hi";
			$submenutype = $_POST['submenutype'];
			$menuid		 = $_POST['menuname'];
			$submenuname = test_input($_POST['submenuname']);
			$filename	 = test_input($_POST['filename']);
			$extension	 = test_input($_POST['extensionname']);
			$submenuname = strtolower($submenuname);
			$extension	 = strtolower($extension);
			$filename	 = strtolower($filename);
			$stmtsel	 = $conn->prepare("select submenuname, filename from appssubmenu where submenuname = '$submenuname' and filename = '$filename'  and status = 1");
			$stmtsel->execute();
			$countsel	 = $stmtsel->rowCount();
			$stmtsel1	 = $conn->prepare("select submenuname from appssubmenu where submenuname = '$submenuname' and status = 1");
			$stmtsel1->execute();
			$countsel1	 = $stmtsel1->rowCount();
			$stmtsel2 	 = $conn->prepare("select filename from appssubmenu where filename = '$filename' and status = 1");
			$stmtsel2->execute();
			$countsel2	 = $stmtsel2->rowCount();
			$stmtsel3	 = $conn->prepare("select submenuname, filename from appssubmenu where submenuname = '$submenuname' and filename = '$filename' and status = 0");
			$stmtsel3->execute();
			$countsel3	 = $stmtsel3->rowCount();
			$stmtsel4	 = $conn->prepare("select submenuname from appssubmenu where submenuname = '$submenuname' and status = 0");
			$stmtsel4->execute();
			$countsel4	 = $stmtsel4->rowCount();
			$stmtsel5	 = $conn->prepare("select filename from appssubmenu where filename = '$filename' and status = 0");
			$stmtsel5->execute();
			$countsel5	 = $stmtsel5->rowCount();
			if($countsel > 0)
			{
				echo "Both Filename and Submenu name exist!";
				exit;
			}
			else if($countsel1 > 0)
			{
				echo "Submenu exists!";
				exit;
			}
			else if($countsel2 > 0)
			{
				echo "Filename exists!";
				exit;
			}
			else if($countsel3 > 0)
			{
				echo "Both Filename and Submenu have been deleted restore from deleted submenu!";
				exit;
			}
			else if($countsel4 > 0)
			{
				echo "Submenu exists, use another name!";
				exit;
			}
			else if($countsel5 > 0)
			{
				echo "Filename exists and has benn deleted, use another name or recover the file!";
				exit;
			}
			else{
				$stmt 	= "insert into appssubmenu(menuid, status, menustatus, submenutypeid, submenuname, filename, extension) values($menuid, 1, 1, $submenutype, '$submenuname', '$filename', '$extension')";
				//echo $stmt;
				$conn->exec($stmt);
				$id	 	= $conn->lastInsertId();
				$output = "";
				if($id != 0)
				{
					//echo "hi";
					$menu	 = menu_view($conn, $menuid, 1);
					$menname = implode(',', array_map(function($el){ return $el['menuname']; }, $menu));
					echo ucwords($submenuname) . " added as submenu to " . ucwords($menname) . " menu in this application";
					$comment = ucwords($submenuname) . " added as submenu to " . ucwords($menname) . " menu in this application";
					logguser($conn, '',$comment, $_SESSION['menuid']);
				}
			}
		}
		exit;
	}
	else if(isset($_POST['menuview']))
	{
		//echo 'hi';
		
		if($_POST['menuview'] != '')
		{
			$menus	 = menu_view($conn, 0, 1);
			$output  = "";
			$output .= "<script>$(document).ready(function(){";
			$output .=	"$(\".js-example-data-ajax2\").select2({";
			$output .=	"placeholder: \"Select a menu\",";
			$output .=	"allowClear: true";
			$output .=	"});";
			$output .=	"});";
			$output .=	"</script>";
			$output .= "<label  class=\"col-sm-2 control-label\" for=\"menuname\">Menu Name</label><div class = \"col-sm-4\"><select class=\"js-example-data-ajax2 form-control\" id=\"menuname\"><option value = \"\">Select a Menu</option>";
			foreach($menus as $menu){
				extract($menu);
				$output .= "<option value = '$appmenuid'>" . ucwords($menuname) . "</option>";
			}
			$output .= "</select></div><span class=\"col-sm-2\" id=\"error2\"></span>";
			echo $output;
		}
		exit;
	}
	else if(isset($_POST['openmenu'])){
		$_SESSION['menuname'] = "";
		$vals				  = str_replace(array('"', 'submenu'), array('', ''), $_POST['openmenu']);
		//echo $vals;
		$stmt 				  = $conn->prepare("select * from appsmenu where status = 1 and appmenuid = $vals");
		$stmt->execute();
		$data 				  = $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION['menuname'] = $data['menuname'];
		$_SESSION['menuid']	  = $vals;
		echo $_SESSION['menuid'];
		exit;
	}
	else if(isset($_POST['menuload']))
	{
		if($_POST['menuload'] != '')
		{
			//$app = array();
			$menuload 	 = test_input($_POST['menuload']);
			$menuload 	 = strtolower($menuload);
			$role	   	 = implode(",",$_SESSION['roles']);
			$stmt	   	 = $conn->prepare("select appsubmenuid from userrights where roleid in ($role) and status = 1 and rolestatus = 1 and menustatus = 1 and submenustatus = 1");
			//echo "select appsubmenuid from userrights where roleid in ($role) and status = 1 and rolestatus = 1 and menustatus = 1 and submenustatus = 1";
			$stmt->execute();
			$view_menu 	 = '';
			$data	  	 = $stmt->fetchall();
			//print_r($data);
			$submenuids	 = implode(',', array_map(function($el){ return $el['appsubmenuid']; }, $data));
			//extract($data);
			//echo $submenuids;
			$stmt1		 = $conn->prepare("select distinct submenuid from appssubmenu where  submenutypeid = 1 and submenuid in ($submenuids) and status = 1");
			//echo "select distinct submenuid from appssubmenu where  submenutypeid = 1 and submenuid in ($submenuids) and status = 1";
			$stmt1->execute();
			$data1		 = $stmt1->fetchall();
			//extract($data1);
			$submenuid	 = implode(',', array_map(function($el){ return $el['submenuid']; }, $data1));
			//echo $submenuid;
			$view_menu	 = view_menu($conn, 0, $submenuid);
			
			//echo "<br />";
			//print($stmt1);
			echo $view_menu;
			//echo "hi";
		}
		exit;
	}
	else if(isset($_POST['loadsubmenu']))
	{
		if($_POST['loadsubmenu'] != '')
		{
			//$app = array();
			$loadsubmenu = test_input($_POST['loadsubmenu']);
			$submenu	 =  load_submenu($conn, $loadsubmenu, 0, 0, 1, 1);
			$rolenames	 = load_roles($conn, $loadsubmenu);
			//print_r($submenu);
			$output		 = "";
			$output 	.= "<input style=\"background-color:#dcdcdc; color:white;\" type = \"submit\" class = \"gosub btn btn-default\" id = \"assign\" value = \"Asign for selected\"><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th><input type = \"checkbox\" class = \"submenu\" id = \"sub\"><label for = \"sub\">Select all<label></th><th>Sn</th><th>Menu Name</th><th>Submenu Name</th><th>Assign</th></tr></thead><tbody>";
			$sn			 = 0;
			foreach($submenu as $submen)
			{
				++$sn;
				extract($submen);
				$stmt  = $conn->prepare("select * from appsmenu where status = 1 and appmenuid = $menuid");
				$stmt->execute();
				$data  = $stmt->fetch(PDO::FETCH_ASSOC);
				$count = $stmt->rowCount();
				if($count > 0)
				{
					foreach($rolenames as $rolname)
					{
						extract($rolname);
						$output .= "<tr><td><input type = \"checkbox\" id = \"submenu$submenuid\" name = \"submenu\" value = \"$submenuid\"></td><td>$sn</td><td>" . ucwords($data['menuname']) . "</td><td>" . ucwords($submenuname) . "</td><td><button style=\"background-color:#dcdcdc; color:white;\" type = \"submit\" class = \"gosub btn btn-default\" id = \"submit$submenuid\"><span class = 'glyphicon glyphicon-check'></span></button></td>";
					}
					
				}
			}
			$output .= "</tbody></table>";
			echo $output;
		}
		exit;
	}
	else if(isset($_POST['loadassignedsubmenu']))
	{
		if($_POST['loadassignedsubmenu'] != '')
		{
			//$app = array();
			$loadassignedsubmenu = test_input($_POST['loadassignedsubmenu']);
			$submenu			 =  load_submenu($conn, $loadassignedsubmenu, 0, 0, 1, 0);
			$rolenames			 = load_roles($conn, $loadassignedsubmenu);
			//print_r($submenu);
			$output				 = "";
			$output 			.= "<input style=\"background-color:#dcdcdc; color:white;\" type = \"submit\" class = \"gosub btn btn-default\" id = \"unassign\" value = \"Unassign for selected\"><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th><input type = \"checkbox\" class = \"submenu\" id = \"sub\"><label for = \"sub\">Select all<label></th><th>Sn</th><th>Menu Name</th><th>Submenu Name</th><th>Unassign</th></tr></thead><tbody>";
			$sn					 = 0;
			foreach($submenu as $submen)
			{
				++$sn;
				extract($submen);
				$stmt 	= $conn->prepare("select * from appsmenu where status = 1 and appmenuid = $menuid");
				$stmt->execute();
				$data 	= $stmt->fetch(PDO::FETCH_ASSOC);
				$count 	= $stmt->rowCount();
				if($count > 0)
				{
					foreach($rolenames as $rolname)
					{
						extract($rolname);
						$output .= "<tr><td><input type = \"checkbox\" id = \"submenu$submenuid\" name = \"submenu\" value = \"$submenuid\"></td><td>$sn</td><td>" . ucwords($data['menuname']) . "</td><td>" . ucwords($submenuname) . "</td><td><button style=\"background-color:#dcdcdc; color:white;\" type = \"submit\" class = \"gosub btn btn-default\" id = \"submit$submenuid\"><span class = 'glyphicon glyphicon-remove'></span></button></td>";
					}
					
				}
			}
			$output .= "</tbody></table>";
			echo $output;
		}
		exit;
	}
	else if(isset($_POST['submenu']) && isset($_POST['roleid'])){
		//echo "Array";
		$success = 0;
		if($_POST['submenu'] != '' && $_POST['roleid'] != 0 ){
			$submen		= $_POST['submenu'];
			$roleid 	= $_POST['roleid'];
			$rolenames 	= load_roles($conn, $roleid);
			$rolename 	= $str = implode(',', array_map(function($el){ return $el['rolename']; }, $rolenames));
			//echo "Array";
			if(is_array($submen) && !empty($submen))
			{
				$arraycount = count($submen);
				$submenu	= implode(",",$submen);
				//echo "Array";
			}
			else if (!is_array($submen) && $submen !=0) 
			{
				$submenu 	= $submen;
				//echo "not array";
				$arraycount = 1;
			}			
			else{
				echo "You haven't select a submenu";
				exit;
			}
			
			$stmt = $conn->prepare("select * from userrights where roleid = $roleid and appsubmenuid in ($submenu) and status = 0 and appstatus = 1 and submenustatus = 1 and menustatus = 1 and rolestatus = 1");
			//echo "select * from userrights where roleid = '$roleid' and appsubmenuid in ($submenu) and status = 0";
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$data 		= $stmt->fetchall();
				$submenuids = $str = implode(',', array_map(function($el){ return $el['appsubmenuid']; }, $data));
				$stmt1 		= $conn->prepare("update userrights set status = 1 where appsubmenuid in ($submenuids) and status = 0 and roleid = '$roleid' and rolestatus = 1");
				$stmt1->execute();
				$count1 	= $stmt1->rowCount();
				if($count1 > 0){
					$success = $count1;
				}
			}
			if($count <= $arraycount){
				$stmt3 	= $conn->prepare("select * from appssubmenu where submenuid not in (select appsubmenuid from userrights where roleid = $roleid and appsubmenuid in ($submenu) and status = 1 and rolestatus = 1) and status = 1 and menustatus = 1 and submenuid in ($submenu)");
				$stmt3->execute();
				$count3 = $stmt3->rowCount();
				if($count3 > 0)
				{
					$data3  = $stmt3->fetchall();
					$sn 	= 0;
					foreach($data3 as $dat3){
						extract($dat3);
						$stmt4 	= "insert into userrights(appsubmenuid, roleid, status, menustatus, submenustatus, rolestatus) values($submenuid, $roleid, 1, 1, 1, 1)";
						$conn->exec($stmt4);
						$id 	= $conn->lastInsertId();
						if($id > 0){
							++$sn;
						}
						
					}
					$success = $success + $sn;
				}
			}
			if($success == $arraycount)
			{
				echo $success . " Submenu assigned to " . ucwords($rolename);
				$comment = $success . " Submenu assigned to " . ucwords($rolename);
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
			else if(($arraycount - $success) <= 0 && ($arraycount - $success) != $arraycount)
			{
				echo $success . " Submenu assigned to " . ucwords($rolename) . " " . ($arraycount - $success) . " Submenu not assigned";
				$comment = $success . " Submenu assigned to " . ucwords($rolename) . " " . ($arraycount - $success) . " Submenu not assigned";
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
			else if($success == 0)
			{
				echo "All Submenu not assigned to " . ucwords($rolename);
				$comment = "All Submenu not assigned to " . ucwords($rolename);
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
			$roles 		       = get_userrole($conn, $_SESSION['loginid']);
			$_SESSION['roles'] = $roles;
			$role = implode(',', $roles);
			$stmtpage		   = $conn->prepare("select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatus = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))");
			//echo "select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatu = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))";
			$stmtpage->execute();
			$countpage		   = $stmtpage->rowCount();
			$_SESSION['pages'] = '';
			if($countpage > 0){
				while($datapage = $stmtpage->fetch())
				{
					extract($datapage);
					$_SESSION['pages'] .= $filename . "." . $extension;
				}
			}
		}
		else{
			echo "You haven't select a submenu and a role";
		}
		exit;
	}
	else if(isset($_POST['unassignsubmenu']) && isset($_POST['unassignroleid'])){
		//echo "Array";
		$success 	= 0;
		if($_POST['unassignsubmenu'] != '' && $_POST['unassignroleid'] != 0 ){
			$submen 	= $_POST['unassignsubmenu'];
			$roleid 	= $_POST['unassignroleid'];
			$rolenames  = load_roles($conn, $roleid);
			$rolename   = implode(',', array_map(function($el){ return $el['rolename']; }, $rolenames));
			//echo "Array";
			if(is_array($submen) && !empty($submen))
			{
				$arraycount = count($submen);
				$submenu 	= implode(",",$submen);
				//echo "Array";
			}
			else if (!is_array($submen) && $submen !=0) 
			{
				$submenu 	= $submen;
				//echo "not array";
				$arraycount = 1;
			}			
			else{
				echo "You haven't select a submenu";
				exit;
			}
			
			$stmt = $conn->prepare("select * from userrights where roleid = $roleid and appsubmenuid in ($submenu) and status = 1 and appstatus = 1 and menustatus = 1 and submenustatus = 1 and rolestatus = 1");
			//echo "select * from userrights where roleid = $roleid and appsubmenuid in ($submenu) and status = 1";
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$data 		= $stmt->fetchall();
				$submenuids = implode(',', array_map(function($el){ return $el['appsubmenuid']; }, $data));
				$stmt1 		= $conn->prepare("update userrights set status = 0 where appsubmenuid in ($submenuids) and status = 1 and roleid = '$roleid'");
				$stmt1->execute();
				$count1 	= $stmt1->rowCount();
				if($count1 > 0){
					$success = $count1;
				}
			}
			if($success == $arraycount)
			{
				echo $success . " Submenu unassigned from " . ucwords($rolename);
				$comment = $success . " Submenu unassigned from " . ucwords($rolename);
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
			else if(($arraycount - $success) <= 0 && ($arraycount - $success) != $arraycount)
			{
				echo $success . " Submenu unassigned from " . ucwords($rolename) . " " . ($arraycount - $success) . " Submenu still assigned";
				$comment = $success . " Submenu unassigned from " . ucwords($rolename) . " " . ($arraycount - $success) . " Submenu still assigned";
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
			else if($success == 0)
			{
				echo "All Submenu still assigned to " . ucwords($rolename);
				$comment = "All Submenu still assigned to " . ucwords($rolename);
				logguser($conn, '',$comment, $_SESSION['menuid']);
			}
			$roles 			   = get_userrole($conn, $_SESSION['loginid']);
			$_SESSION['roles'] = $roles;
			$role = implode(',', $roles);
			$stmtpage		   = $conn->prepare("select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatus = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))");
			//echo "select * from appssubmenu where submenuid in (select appsubmenuid from userrights where status = 1 and appstatus = 1 and menustatus = 1 and submenustatu = 1 and rolestatus = 1 and roleid in (" . implode(',', $_SESSION['roles']) . "))";
			$stmtpage->execute();
			$countpage 		   = $stmtpage->rowCount();
			$_SESSION['pages'] = '';
			if($countpage > 0){
				while($datapage = $stmtpage->fetch())
				{
					extract($datapage);
					$_SESSION['pages'] .= $filename . "." . $extension;
				}
			}
		}
		else{
			echo "You haven't select a submenu and a role";
		}
		exit;
	}
	else if(isset($_POST['restoremenus'])){
		//echo "Array";
		$success = 0;
		if($_POST['restoremenus'] != ''){
			$menus = $_POST['restoremenus'];
			//echo "Array";
			if(is_array($menus) && !empty($menus))
			{
				$arraycount = count($menus);
				$menuids 	= implode(",",$menus);
				//echo "Array";
			}
			else if (!is_array($menus) && $menus !=0) 
			{
				$menuids 	= $menus;
				//echo "not array";
				$arraycount = 1;
			}			
			else{
				echo "You haven't select a menu";
				exit;
			}
			
			$stmt  = $conn->prepare("select * from appsmenu where appmenuid in ($menuids) and status = 0");
			//echo "select * from applications where appid in ($submenu) and status = 0";
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$data	 = $stmt->fetchall();
					$menuidss  	= implode(',', array_map(function($el){ return $el['appmenuid']; }, $data));
					$submenuids = implode(',', array_map(function($el){ return $el['submenuid']; }, load_submenu($conn, 0, 0, $menuidss, 0, 1)));
					$stmt1		= $conn->prepare("update appsmenu set status = 1 where appmenuid in ($menuidss) and appstatus = 1 and status = 0");
					$stmt2 		= $conn->prepare("update appssubmenu set status = 1, menustatus = 1 where menuid in ($menuidss) and status = 0 and menustatus = 3");
					$stmt3 		= $conn->prepare("update userrights set status = 1, menustatus = 1, submenustatus = 1 where appsubmenuid in ($submenuids) and status = 0 and menustatus = 3 and submenustatus = 3");
					$stmt1->execute();
					$count1 	= $stmt1->rowCount();
					if($count1 > 0){
						$stmt2->execute();
						$stmt3->execute();
						$success = $count1;
						if($success == $arraycount)
						{
							$comment = $success . " menu";
							if($success > 1)
								$comment .= "s";
							$comment .="restored";
							echo $comment;
							logguser($conn, '',$comment, $_SESSION['menuid']);
						}
						else if(($arraycount - $success) <= 0 && ($arraycount - $success) != $arraycount)
						{
							$comment = $success . " menu";
							if($success > 1)
								$comment .="s";
							$comment .= " restored " . ($arraycount - $success) . " menu";
							if(($arraycount - $success) > 1)
								$comment .= "s"; 
							$comment .= " not restored";
							echo $comment;
							logguser($conn, '',$comment, $_SESSION['menuid']);
						}
					}
					else if($success == 0)
					{
						echo "No menu was restored";
					}
			}
		}
		else{
			echo "You haven't select a menu";
		}
		exit;
	}
	else if(isset($_POST['restoresubmenus'])){
		//echo "Array";
		$success = 0;
		if($_POST['restoresubmenus'] != ''){
		//print_r($_POST['restoresubmenus']);
			$submenus = $_POST['restoresubmenus'];
			//echo "Array";
			if(is_array($submenus) && !empty($submenus))
			{
				$arraycount = count($submenus);
				$submenuids = implode(",",$submenus);
				//echo "Array";
			}
			else if (!is_array($submenus) && $submenus !=0) 
			{
				$submenuids = $submenus;
				//echo "not array";
				$arraycount = 1;
			}			
			else{
				echo "You haven't select a submenu";
				exit;
			}
			
			$stmt  = $conn->prepare("select * from appssubmenu where submenuid in ($submenuids) and status = 0 and menustatus = 1");
			//echo "select * from applications where appid in ($submenu) and status = 0";
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$data	 = $stmt->fetchall();
				$menuids = implode(',', array_map(function($el){ return $el['menuid']; }, $data));
				$menuid  = implode(',', array_map(function($el){ return $el['appmenuid']; }, menu_view($conn, $menuids, 1)));
				if($menuid != "")
				{
					$submenuidss  = implode(',', array_map(function($el){ return $el['submenuid']; }, $data));
					$stmt1 	= $conn->prepare("update appssubmenu set status = 1 where submenuid in ($submenuidss) and status = 0 and menustatus = 1");
					$stmt2 	= $conn->prepare("update userrights set status = 1, submenustatus = 1 where appsubmenuid in ($submenuidss) and status = 0 and menustatus = 1 and submenustatus = 4");
					$stmt1->execute();
					$count1 = $stmt1->rowCount();
					if($count1 > 0){
						$stmt2->execute();
						$success = $count1;
						if($success == $arraycount)
						{
							//echo $success . " submenus restored";
							$comment = $success . " submenu";
							if($success > 1)
								$comment .="s"; 
							$comment .="restored";
							echo $comment;
							logguser($conn, '',$comment, $_SESSION['menuid']);
						}
						else if(($arraycount - $success) <= 0 && ($arraycount - $success) != $arraycount)
						{
							//echo $success . " submenus restored " . ($arraycount - $success) . " submenus not restored";
							$comment = $success . " submenu";
							if($success > 0)
								$comment .= "s";
							$comment .= " restored " . ($arraycount - $success) . " submenu";
							if(($arraycount - $success) > 1)
								$comment .= "s";
							$comment .= " not restored";
							echo $comment;
							logguser($conn, '',$comment, $_SESSION['menuid']);
						}
					}
					else if($success == 0)
					{
						echo "No submenu was restored";
					}	
				}
				else{
					echo "You need to restore " . implode(',', array_map(function($el){ return $el['menuname']; }, menu_view($conn, $menuids, 0))) . " menus deleted";
					$comment = "You need to restore " . implode(',', array_map(function($el){ return $el['menuname']; }, menu_view($conn, $menuids, 0))) . " menus deleted";
					logguser($conn, '',$comment, $_SESSION['menuid']);
				}
			}
		}
		else{
			echo "You haven't select a submenu";
		}
		exit;
	}
	else if (isset($_GET['term']))
	{ 
		$staffname 	= test_input($_GET['term']);
		$stmt 		= $conn->prepare("select *, concat_ws( ' ', sname, fname, mname) as label , fname as first, sname as surn, mname as middle, memid as id, concat_ws( ' ', sname, fname, mname) as value, gender, title FROM memberregister WHERE concat_ws( ' ', sname, fname, mname) LIKE :staffname1 and memstatus = '1'");
		$stmt->bindparam(':staffname1', $staffname1);
		//print_r($stmt);
		$staffname1 = "%$staffname%";
		$stmt->execute();
		$result = array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$data['ori'] 	= ucwords(strtolower(implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $data['title'])))));
			$data['editori'] = "<option value = ''>Select Title</option>";
			$titles = get_title($conn);
			foreach($titles as $title){
				extract($title);
				$data['editori'] .= "<option value = '$titleid'";
				$data['editori'] .= $data['title'] == $titleid? " selected":"";
				$data['editori'] .= ">" .  ucwords(strtolower($title)) . "</option>";
				$data['editnkintitle'] .= "<option value = '$titleid'";
				$data['editnkintitle'] .= $data['nkintitle'] == $titleid? " selected":"";
				$data['editnkintitle'] .= ">" .  ucwords(strtolower($title)) . "</option>";
			}
			//$data['editori'] 	= ucwords(strtolower(implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $data['title'])))));
			$data['nkintitle'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $data['nkintitle'])))));
			$data['nkinrel'] 	= ucwords(strtolower((implode(',', array_map(function($el){ return $el['relname']; },get_relationship($conn, $data['nkinrel']))))));
			$data['label'] 	= ucwords(strtolower($data['ori'] . " " . $data['label']));
			$data['value'] 	= ucwords(strtolower($data['value']));
			$wofbilevels = get_wofbilevel($conn);
			$data['editwofbilevel'] = "<option value = ''>Select WOFBI Level</option>";
			foreach($wofbilevels as $wofbilevel){
				extract($wofbilevel);
				$data['editwofbilevel'] .= "<option value = '$certid'";
				$data['editwofbilevel'] .= $certid == $data['wofbilevel']? " selected":"";
				$data['editwofbilevel'] .= ">" . ucwords(strtolower($certname)) . "</option>";
			}
			$data['wofbilevel'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['certname']; }, get_wofbilevel($conn, $data['wofbilevel'])))));
			$states = get_state($conn, $data['country']);
			$data['editstate'] = "<option value = ''>Select State</option>";
			$data['editbusstate'] = "<option value = ''>Select State</option>";
			$data['editnkstate'] = "<option value = ''>Select State</option>";
			foreach($states as $state){
				extract($state);
				$data['editstate'] .= "<option value = '$state_id'";
				$data['editstate'] .= $data['state'] == $state_id? " selected":"";
				$data['editstate'] .= ">" . ucwords(strtolower($state_name)) . "</option>";
				$data['editbusstate'] .= "<option value = '$state_id'";
				$data['editbusstate'] .= $data['busstate'] == $state_id? " selected":"";
				$data['editbusstate'] .= ">" . ucwords(strtolower($state_name)) . "</option>";
				$data['editnkstate'] .= "<option value = '$state_id'";
				$data['editnkstate'] .= $data['nkstate'] == $state_id? " selected":"";
				$data['editnkstate'] .= ">" . ucwords(strtolower($state_name)) . "</option>";
			}
			$data['nkstate'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['state_name']; }, get_state($conn, 'ng', '', $data['nkstate'])))));
			$data['state'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['state_name']; }, get_state($conn, $data['country'], '', $data['state'])))));
			$data['busstate'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['state_name']; }, get_state($conn, $data['buscountry'], '', $data['busstate'])))));
			$data['nkadd2'] = ucwords(strtolower($data['nkadd2']));
			$data['homeadd2'] = ucwords(strtolower($data['homeadd2']));
			$data['busadd2'] = ucwords(strtolower($data['busadd2']));
			$data['homeadd3'] = ucwords(strtolower($data['homeadd3']));
			$data['busadd3'] = ucwords(strtolower($data['busadd3']));
			$data['sname'] = ucwords(strtolower($data['sname']));
			$data['fname'] = ucwords(strtolower($data['fname']));
			$data['mname'] = ucwords(strtolower($data['mname']));
			$data['nkinsname'] = ucwords(strtolower($data['nkinsname']));
			$data['nkinfname'] = ucwords(strtolower($data['nkinfname']));
			$data['nkinmname'] = ucwords(strtolower($data['nkinmname']));
			$data['homeadd1'] = ucwords(strtolower($data['homeadd1']));
			$data['busadd1'] = ucwords(strtolower($data['busadd1']));
			$data['nkadd1'] = ucwords(strtolower($data['nkadd1']));
			$data['datejoin'] = date('d-M-Y', strtotime($data['datejoin']));
			$mstats = get_mstat($conn);
			$data['editmstat'] = "<option value = ''>Select Marital Status</option>";
			foreach($mstats as $mstat){
				extract($mstat);
				$data['editmstat'] .= "<option value = '$mstatid'";
				$data['editmstat'] .= $data['mstat'] == $mstatid? "selected": "";
				$data['editmstat'] .= ">" . ucwords(strtolower($maristatus)) . "</option>";
				
			}
			$data['mstat'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['maristatus']; }, get_mstat($conn, $data['mstat'])))));
			$countries = get_nationality($conn);
			$data['editnationality'] = "<option value = ''>Select Nationality</option>";
			$data['editcountry'] = "<option value = ''>Select Country</option>";
			$data['editbuscountry'] = "<option value = ''>Select Country</option>";
			$data['editnkcountry'] = "<option value = ''>Select Country</option>";
			foreach($countries as $country){
				extract($country);
				$data['editnationality'] .= "<option value = '$countrycode'";
				$data['editnationality'] .=  $data['nationality'] == $countrycode? "selected":"";
				$data['editnationality'] .=  ">" . ucwords(strtolower($nationality)) . "</option>";
				$data['editcountry'] .= "<option value = '$countrycode'";
				$data['editcountry'] .=  $data['country'] == $countrycode? "selected":"";
				$data['editcountry'] .=  ">" . ucwords(strtolower($country)) . "</option>";
				$data['editbuscountry'] .= "<option value = '$countrycode'";
				$data['editbuscountry'] .=  $data['buscountry'] == $countrycode? "selected":"";
				$data['editbuscountry'] .=  ">" . ucwords(strtolower($country)) . "</option>";
				$data['editnkcountry'] .= "<option value = '$countrycode'";
				$data['editnkcountry'] .=  $data['nkcountry'] == $countrycode? "selected":"";
				$data['editnkcountry'] .=  ">" . ucwords(strtolower($country)) . "</option>";
			}
			$data['nationality'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['nationality']; }, get_nationality($conn, $data['nationality'])))));
			$data['country'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['country']; }, get_nationality($conn, $data['country'])))));
			$data['buscountry'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['country']; }, get_nationality($conn, $data['buscountry'])))));
			$data['nkcountry'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['country']; }, get_nationality($conn, $data['nkcountry'])))));
			$data['editgender'] = "<option value = ''>Select Gender</option>";
			$genders = get_gender($conn);
			foreach($genders as $gender){
				extract($gender);
				$data['editgender'] .= "<option value = '$id'";
				$data['editgender'] .= (int)$data['gender'] == (int)$id? " selected" :"";
				$data['editgender'] .= ">" . ucwords(strtolower($full)) . "</option>";
			}
			if((int)$data['gender'] > 0){
				$data['gender'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['full']; }, get_gender($conn, $data['gender'])))));
			}
			$data['editchyr'] = "<option value = ''></option>";
			$churchstart = 1983;
			$presentyear = date('Y');
			for($churchstart; $churchstart<=$presentyear; $churchstart++){
				$data['editchyr'] .= "<option value = '$churchstart'";
				$data['editchyr'] .= $data['chyr'] == $churchstart? " selected":"";
				$data['editchyr'] .= ">$churchstart</option>";
			}
			$data['monthlysavings'] = (number_format($data['monthlysavings'], 2, ".", ","));
			$data['currentfacilities'] = getfacilitydetails($conn, $tno = 0, $data['memid'], $facid = 0);
			$groupnames = get_groupname($conn);
			$data['editgroupname'] = "<option value = ''>Select a group name</option>";
			foreach($groupnames as $groupname){
				extract($groupname);
				$data['editgroupname'] .= "<option value = '$groupid'";
				$data['editgroupname'] .= $data['groupid'] == $groupid ? " selected":"";
				$data['editgroupname'] .= ">" . ucwords(strtolower($groupname)) . "</option>";
			}
			$instruments = get_instrument($conn);
			$data['instrument'] = implode(',', array_map(function($el){ return $el['instrument']; }, get_cashflowin($conn, $data['memid'], 1)));
			$data['instrument1'] = implode(',', array_map(function($el){ return $el['instrument']; }, get_cashflowin($conn, $data['memid'], 3)));
			$data['editinstrument'] = "<option value = ''>Select Instrument</option>";
			$data['editinstrument1'] = "<option value = ''>Select Instrument</option>";
			foreach($instruments as $instrument){
				extract($instrument);
				//echo "<br />" . $data['instrument1'] . "<br />";
				$data['editinstrument'] .= "<option value = '$instrumentid'";
				$data['editinstrument'] .= (int)$instrumentid == (int)$data['instrument']? " selected":"";
				$data['editinstrument'] .= ">" . ucwords(strtolower($instrument)) . "</option>";
				$data['editinstrument1'] .= "<option value = '$instrumentid'";
				$data['editinstrument1'] .= (int)$instrumentid == (int)$data['instrument1']? " selected":"";
				$data['editinstrument1'] .= ">" . ucwords(strtolower($instrument)) . "</option>";
			}
			$banks = get_bank($conn);
			$data['editbank'] = "<option value = ''>Select Bank</option>";
			$data['editbank1'] = "<option value = ''>Select Bank</option>";
			$data['bank'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['docbank']; }, get_cashflowin($conn, $data['memid'], 1)))));
			$data['bank1'] = implode(',', array_map(function($el){ return $el['docbank']; }, get_cashflowin($conn, $data['memid'], 3)));
			foreach($banks as $bank){
				extract($bank);
				//echo "<br />" . $data['bank1'] . "<br />";
				$data['editbank'] .= "<option value = '$id'"; 
				$data['editbank'] .= $id == $data['bank'] ? " selected":"";
				$data['editbank'] .= ">". ucwords(strtolower($bankname)) . "</option>";
				$data['editbank1'] .= "<option value = '$id'"; 
				$data['editbank1'] .= $id == $data['bank1'] ? " selected":"";
				$data['editbank1'] .= ">". ucwords(strtolower($bankname)) . "</option>";
			}
			$data['groupname'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['groupname']; }, get_groupname($conn, $data['groupid'])))));
			$data['receiptno'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['receiptno']; }, get_cashflowin($conn, $data['memid'], 1)))));
			$data['receiptdate'] = date('d-M-Y', strtotime(implode(',', array_map(function($el){ return $el['receiptdate']; }, get_cashflowin($conn, $data['memid'], 1)))));
			$data['refno'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['docref']; }, get_cashflowin($conn, $data['memid'], 1)))));
			$data['refdate'] = date('d-M-Y', strtotime(implode(',', array_map(function($el){ return $el['docdate']; }, get_cashflowin($conn, $data['memid'], 1)))));
			$data['amount'] = number_format(implode(',', array_map(function($el){ return $el['amount']; }, get_cashflowin($conn, $data['memid'], 1))), 2, ".", ",");
			$data['instrument'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['instrument']; }, get_instrument($conn, $data['instrument'])))));
			$data['remark'] = implode(',', array_map(function($el){ return $el['remark']; }, get_cashflowin($conn, $data['memid'], 1)));
			$data['bank'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['bankname']; }, get_bank($conn, $data['bank'])))));
			$data['receiptno1'] = ucwords(implode(',', array_map(function($el){ return $el['receiptno']; }, get_cashflowin($conn, $data['memid'], 3))));
			$data['receiptdate1'] = date('d-M-Y', strtotime(implode(',', array_map(function($el){ return $el['receiptdate']; }, get_cashflowin($conn, $data['memid'], 3)))));
			$data['refno1'] = ucwords(implode(',', array_map(function($el){ return $el['docref']; }, get_cashflowin($conn, $data['memid'], 3))));
			$data['refdate1'] = date('d-M-Y', strtotime(implode(',', array_map(function($el){ return $el['docdate']; }, get_cashflowin($conn, $data['memid'], 3)))));
			$data['amount1'] = number_format(implode(',', array_map(function($el){ return $el['amount']; }, get_cashflowin($conn, $data['memid'], 3))), 2, ".", ",");
			$data['instrument1'] = implode(',', array_map(function($el){ return $el['instrument']; }, get_instrument($conn, $data['instrument1'])));
			$data['remark'] = implode(',', array_map(function($el){ return $el['remark']; }, get_cashflowin($conn, $data['memid'], 3)));
			$data['bank1'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['bankname']; }, get_bank($conn, $data['bank1'])))));
			$table = '';
			$table .= "<br /><table id=\"datatable1\" class=\"table table-striped table-hover\"><thead><tr><th>TNO</th><th>Name</th><th>Facility</th><th>App.<br/>Date</th><th>Principal</th><th>Interest</th><th>Period<br/>(Months)</th><th>Paid</th><th>Balance</th><th>Installment</th><th>Guarantor1</th><th>GAmount1</th><th>Guarantor2</th><th>GAmount2</th><th>Witness</th><th>Approved<br/>By</th><th class = 'show'>Edit Installment</th></tr></thead><tbody>";
			$sn = 0;
			if(!empty($data['currentfacilities'])){
				foreach($data['currentfacilities'] as $currentfacility){
					++$sn;
					$table .= "<tr>";
					$table .= "<td>" . $currentfacility['tno'] . "<input type = 'hidden' id = 'formno$sn' name = 'formno$sn' value = '" .$currentfacility['tno'] . "'></td>";
					$table .= "<td id = 'name$sn'>" . $data['sname'] . " " . $data['fname'] . " " . $data['mname'] . "</td>";
					$table .= "<td id = 'facility$sn'>" . $currentfacility['facility'] . "</td>";
					$table .= "<td id = 'adate$n'>" . date('d-M-Y', strtotime($currentfacility['adate'])) . "</td>";
					$table .= "<td id = 'principal$sn'>" .  number_format($currentfacility['principal'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'interest$sn'>" . number_format($currentfacility['interest'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'period$sn'>" . $currentfacility['period'] . "</td>";
					$table .= "<td id = 'paid$sn'>" . number_format($currentfacility['paid'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'balance$sn'>" . number_format($currentfacility['balance'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'installment$sn'>" . number_format($currentfacility['instalment'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'gurantor1$sn'>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$currentfacility['guaranto1']))))) . "</td>";
					$table .= "<td id = 'gamount1$sn'>" . number_format($currentfacility['gamount1'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'gurantor2$sn'>" . ucwords(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$currentfacility['guaranto2'])))) . "</td>";
					$table .= "<td id = 'gamount2$sn'>" . number_format($currentfacility['gamount2'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'witness$sn'>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$currentfacility['witness']))))) . "</td>";
					$table .= "<td id = 'approvedbyid$sn'>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$currentfacility['approvedby']))))) . "</td>";
					$table .= "<td class = 'show'><button type = 'button' class = 'editinstallment' id = 'editinstallment$sn'>Edit Installment</button></td>";
					$table .= "</tr>";
				}
				$table .= "</tbody>";
				$table .= "</table>";
			}
			$data['table'] = $table;
			$data['guaranto1'] = get_firstguarantee($conn, $data['memid']);
			$data['guaranto2'] = get_secondguarantee($conn, $data['memid']);
			$data['witness'] = get_witness($conn, $data['memid']);
			$data['montpays'] = get_montpays($conn, $data['memid'], '2,5');
			$data['montpayss'] = get_montpays($conn, $data['memid']);
			
			$table = '';
			if(!empty($data['guaranto1'])){
				$table .= "<br /><p><h4>Guarantor1</h4></p><table id=\"datatable1\" class=\"table table-striped table-hover\"><thead><tr><th>TNO</th><th>Name</th><th>Principal</th><th>GAmount1</th></tr></thead><tbody>";
				foreach($data['guaranto1'] as $guaranto1){
					$table .= "<tr>";
					$table .= "<td>" . $guaranto1['tno'] . "</td>";
					$table .= "<td>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$guaranto1['midno']))))) . "</td>";
					$table .= "<td id = 'principal$sn'>" .  number_format($guaranto1['principal'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'principal$sn'>" .  number_format($guaranto1['gamount1'], 2, ".", ",") . "</td>";
					$table .= "</tr>";
				}
				$table .= "</tbody>";
				$table .= "</table>";
			}
			$data['guarantotable1'] = $table;
			$table = '';
			if(!empty($data['guaranto2'])){
				$table .= "<br /><p><h4>Guarantor2</h4></p><table id=\"datatable1\" class=\"table table-striped table-hover\"><thead><tr><th>TNO</th><th>Name</th><th>Principal</th><th>GAmount2</th></tr></thead><tbody>";
				foreach($data['guaranto2'] as $guaranto2){
					$table .= "<tr>";
					$table .= "<td>" . $guaranto2['tno'] . "</td>";
					$table .= "<td>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$guaranto2['midno']))))) . "</td>";
					$table .= "<td id = 'principal$sn'>" .  number_format($guaranto2['principal'], 2, ".", ",") . "</td>";
					$table .= "<td id = 'principal$sn'>" .  number_format($guaranto2['gamount2'], 2, ".", ",") . "</td>";
					$table .= "</tr>";
				}
				$table .= "</tbody>";
				$table .= "</table>";
			}
			$data['guarantotable2'] = $table;
			$table = '';
			
			if(!empty($data['witness'])){
				$table .= "<br /><p><h4>Witness</h4></p><table id=\"datatable1\" class=\"table table-striped table-hover\"><thead><tr><th>TNO</th><th>Name</th><th>Principal</th></tr></thead><tbody>";
				foreach($data['witness'] as $witness){
					$table .= "<tr>";
					$table .= "<td>" . $witness['tno'] . "</td>";
					$table .= "<td>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$witness['midno']))))) . "</td>";
					$table .= "<td id = 'principal$sn'>" .  number_format($witness['principal'], 2, ".", ",") . "</td>";
					$table .= "</tr>";
				}
				$table .= "</tbody>";
				$table .= "</table>";
			}
			$data['witnesstable'] = $table;
			$table = '';
			$sn = 0;
			$sn1 = 0;
			if(!empty($data['montpays'])){
				$amount = 0;
				$table .= "<table id=\"datatable1\" class=\"table table-striped table-hover\"><thead><tr><th>Pdate</th><th>Amount</th></tr></thead><tbody>";
				$countmontpays = count($data['montpays']);
				foreach($data['montpays'] as $montpays){
					++$sn1;
					if($montpays['facid'] == 2){
						++$sn;
						if($sn == 1){
							$table .= "<tr>";
							$table .= "<td colsapan = '2'><h4>Savings</h4></td>";
							$table .= "</tr>";
						}
						$table .= "<tr>";
						$table .= "<td>" . date('d-M-Y', $montpays['pdate']) . "</td>";
						$table .= "<td>" . number_format($montpays['amount'], 2, ".", ",") . "</td>";
						$table .= "</tr>"; 
						$amount = $amount + $montpays['amount'];
					}
					if((int)$countmontpays == $sn1 && $amount > 0)
					{
						//echo "hi";
						$table .= "<tr>";
						$table .= "<td><h5>Sub Total</h5></td>";
						$table .= "<td>" . number_format($amount, 2, ".", ",") . "</td>";
						$table .= "</tr>";
					}
				}
				//echo (int)$countmontpays == $sn1;
				$facid = implode(',', array_map(function($el){ return $el['facid']; }, $data['montpays']));
				$sn = 0;
				$sn1 = 0;
				$amount1 = 0;
				foreach($data['montpays'] as $montpays){
						++$sn1;
					if($montpays['facid'] == 5){
						++$sn;
						if($sn == 1){
							$table .= "<tr>";
							$table .= "<td colsapan = '2'><h4>Withdrawals</h4></td>";
							$table .= "</tr>";
						}
						$table .= "<tr>";
						$table .= "<td>" . date('d-M-Y', $montpays['pdate']) . "</td>";
						$table .= "<td>" . str_replace('-','',number_format($montpays['amount'], 2, ".", ",")) . "</td>";
						$table .= "</tr>"; 
						$amount1 = $amount1 + ($montpays['amount'] * -1);
					}
					if( (int)$countmontpays == $sn1 && $amount1 > 0)
					{
						//echo $sn1;
						$table .= "<tr>";
						$table .= "<td><h5>Sub Total</h5></td>";
						$table .= "<td>" . number_format($amount1, 2, ".", ",") . "</td>";
						$table .= "</tr>";
					}
				}
				$table .= "<tr>";
				$table .= "<td><h5>Total</h5></td>";
				$table .= "<td>" . number_format(($amount - $amount1), 2, ".", ",") . "</td>";
				$table .= "</tr>";
				//echo $sn1; 
				$table .= "</tbody>";
				$table .= "</table>";
			}
			$data['montpaystable'] = $table;
			$table = '';
			if(!empty($data['montpayss'])){
				//array_walk_recursive($data['montpayss'],'uppercase');
				$amount = 0;
				$table .= "<table id=\"datatable1\" class=\"table table-striped table-hover\"><thead><tr><th>Pdate</th><th>Facilty</th><th>Amount</th><th>Remark</th></tr></thead><tbody>";
				//$countmontpays = count($data['montpays']);
				foreach($data['montpayss'] as $montpays){
				$table .= "<tr>";
				$table .= "<td>" . date('d-M-Y', $montpays['pdate']) . "</td>";
				$table .= "<td>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['facility']; }, get_facility($conn, $montpays['facid']))))) . "</td>";
				$table .= "<td>" . number_format($montpays['amount'], 2, ".", ",") . "</td>";
				$table .= "<td>" . $montpayss['remark'] . "</td>";
				$table .= "</tr>";
				}
				$table .= "</tbody>";
				$table .= "</table>";
			}
			$data['montpaysstable'] = $table;
			$data['dob'] = date('d-M-Y', strtotime($data['dob']));
			array_push($result, $data);
		}
		//array_walk_recursive($result,'uppercase');
		$output = json_encode($result);
		if ($_GET["callback"]) {
			// Escape special characters to avoid XSS attacks via direct loads of this
			// page with a callback that contains HTML. This is a lot easier than validating
			// the callback name.
			$output = htmlspecialchars($_GET["callback"]) . "($output);";
		}
		echo $output;
		exit;
	}
	else if (isset($_GET['term2']))
	{
		$staffname 	= test_input($_GET['term2']);
		$stmt 		= $conn->prepare("select *, concat_ws( ' ', memberregister.sname, memberregister.fname, memberregister.mname) as label , memberregister.memid as id, concat_ws( ' ', memberregister.sname, memberregister.fname, memberregister.mname) as value FROM memberregister, officers, offices WHERE concat_ws( ' ', memberregister.sname, memberregister.fname, memberregister.mname) LIKE '%$staffname%' and memberregister.memstatus = '1' and officers.memid = memberregister.memid and offices.officeid = officers.office and offices.officestatus = 1");
		//$stmt->bindparam(':staffname1', $staffname1);
		//$staffname1 = "%$staffname%";
		$stmt->execute();
		//print_r($stmt);
		$result 	= array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$data['ori'] 	= ucwords(strtolower(implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $data['title'])))));
			$data['label'] 	= ucwords(strtolower($data['ori'] . " " . $data['label']));
			$data['value'] 	= ucwords(strtolower($data['value']));
			$data['office'] = ucwords(strtolower($data['office']));
			$data['dtin'] = date('d-M-Y', strtotime($data['dtin']));
			array_push($result, $data);
		}
		$output = json_encode($result);
		if ($_GET["callback"]) {
			// Escape special characters to avoid XSS attacks via direct loads of this
			// page with a callback that contains HTML. This is a lot easier than validating
			// the callback name.
			$output = htmlspecialchars($_GET["callback"]) . "($output);";
		}
		echo $output;
		exit;
	}
	else if (isset($_GET['term3'])){
		$staffname 	= test_input($_GET['term3']);
		$stmt 		= $conn->prepare("select *, concat_ws( ' ', memberregister.sname, memberregister.fname, memberregister.mname) as label , memberregister.memid as id, concat_ws( ' ', memberregister.sname, memberregister.fname, memberregister.mname) as value FROM memberregister, facilityregister WHERE concat_ws( ' ', memberregister.sname, memberregister.fname, memberregister.mname) LIKE '%$staffname%' and memberregister.memstatus = '1' and facilityregister.midno = memberregister.memid and facilityregister.printstatus = 0");
		$stmt->execute();
		//print_r($stmt);
		$result 	= array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$data['ori'] 	= ucwords(strtolower(implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $data['title'])))));
			$data['label'] 	= ucwords(strtolower($data['ori'] . " " . $data['label']));
			$data['value'] 	= ucwords(strtolower($data['value']));
			$data['totalrepayment'] 	= number_format(($data['principal'] + $data['interest']), 2, ".", ",");
			$data['interestrate'] = $data['principal'] / $data['interest'];
			$data['principal'] 	= (number_format($data['principal'], 2, ".", ","));
			$data['monthlysavings'] 	= (number_format($data['monthlysavings'], 2, ".", ","));
			$data['instalment'] 	= (number_format($data['instalment'], 2, ".", ","));
			$data['homeadd3'] = ucwords(strtolower($data['homeadd3']));
			$data['state'] = ucwords(strtolower(implode(',', array_map(function($el){ return $el['state_name']; }, get_state($conn, 'ng', '', $data['state'])))));
			$data['homeadd2'] = ucwords(strtolower($data['homeadd2']));
			$data['homeadd1'] = ucwords(strtolower($data['homeadd1']));
			$data['date'] = date('d-M-Y');
			$data['adate'] = date('d-M-Y', strtotime($data['adate']));
			
			$date = date_create(date('d-M-Y', strtotime($data['adate'])));
			date_add($date, date_interval_create_from_date_string($data['period'] . ' months'));
			$data['enddate'] = date_format($date, 'd-M-Y');
			$table = '';
			$month = strtotime(date('d-M-Y', strtotime($data['adate'])));
			$end = strtotime(date('d-M-Y', strtotime($data['enddate'])));
			$sn = 0;
			$principal = (int)str_replace(',','',$data['principal']);
			$paid =  (int)str_replace(',','',$data['instalment']);
			while($month < $end)
			{
				$table .= "<tr><td>" . date('M-Y', $month) . "</td>";
				$table .= "<td>" . ++$sn . "</td><td>" . number_format($principal, 2, ".", ",") . "</td>";
				$table .= "<td>" . ucwords(strtolower($data['instalment'])) . "</td>";
				$table .= "<td>" . number_format((((int)str_replace(',','',$data['interest']))/(int)$data['period']), 2, ".", ",") . "</td>";
				$principal = $principal - ((int)str_replace(',','',$data['instalment']) - ((int)str_replace(',','',$data['interest']))/(int)$data['period']);
				$table .= "<td>" . number_format($principal, 2, ".", ",") . "</td><td>" . number_format($paid, 2, ".", ",") . "</td>";
				$table .= "</tr>";
				$paid = $paid + (int)str_replace(',','',$data['instalment']);;
				$month = strtotime("+1 month", $month);
			}
			$data['table'] = $table;
			array_push($result, $data);
		}
		$output = json_encode($result);
		if ($_GET["callback"]) {
			// Escape special characters to avoid XSS attacks via direct loads of this
			// page with a callback that contains HTML. This is a lot easier than validating
			// the callback name.
			$output = htmlspecialchars($_GET["callback"]) . "($output);";
		}
		echo $output;
		exit;
	}
	else if(isset($_GET['term4'])){
		$names = searchname($conn, $_GET['term4']);
		$result = array();
		foreach($names as $name){
			
			$name['mdeduction'] = get_mdeduction($conn, $name['memid']);
			$table = '';
			$sn = 0;
			//$table = 
			$name['id'] = $name['memid'];
			$name['label'] 	= ucwords(strtolower(implode(',', array_map(function($el){ return $el['title']; }, get_title($conn, $name['title']))) . " " . $name['sname'] . " " . $name['fname'] . " " .$name['mname']));
			$name['value'] 	= ucwords(strtolower($name['sname'] . " " . $name['fname'] . " " .$name['mname']));
			$table .= "<table id = \"datatable1\" class = \"table table-striped table-hover\">
									<thead>
										<tr>
											<th>S/N</th><th>Memberid</th><th>Name</th><th>Facilty</th><th>Amount</th>
										</tr>
									</thead>
									<tbody id = 'tbody'>";
			foreach($name['mdeduction'] as $mdeduction){
				$table .= "<tr><td>" . ++$sn . "</td>";
				$table .= "<td id = 'cid" . $mdeduction['facilityid'] . "'>" .$mdeduction['cid'] . "</td>";
				$table .= "<td>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['sname'] . " " . $el['fname'] . " " .$el['mname']; }, get_user($conn,$mdeduction['cid']))))) . "</td>";
				$table .= "<td>" . ucwords(strtolower(implode(',', array_map(function($el){ return $el['facility']; }, get_facility($conn, $mdeduction['facilityid']))))) . "</td>";
				$table .= "<td><input type = 'text' class = 'form-control numbers' id = 'amount" . $mdeduction['facilityid'] . "' name = 'amount' value = '" . number_format($mdeduction['amt'], 2, ".", ",") . "' /></td></tr>";
			}
			$table . "</tbody></table>";
			$name['table'] = $table;
			array_push($result, $name);
		}
		$output = json_encode($result);
		if ($_GET["callback"]) {
			// Escape special characters to avoid XSS attacks via direct loads of this
			// page with a callback that contains HTML. This is a lot easier than validating
			// the callback name.
			$output = htmlspecialchars($_GET["callback"]) . "($output);";
		}
		echo $output;
		exit;
	}
	else if (isset($_POST['loadrolesforusers']))
	{
		if ($_POST['loadrolesforusers'] != ''){
			$staffid = test_input($_POST['loadrolesforusers']);
			$stmt 	 = $conn->prepare("select * from roles where roleid not in (select roleid from userroles where loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 1 and rolestatus = 1) and status = 1");
			$stmt->execute();
			$count	 = $stmt->rowCount();
			if($count > 0)
			{
				$output	 = '';
				$output .= "<a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\" id ='assign' >Assign for selected</a><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th><input type = 'checkbox' class = 'checkall' id = 'checkall' name = 'checkall' value = 'checkall' /><label for = 'checkall'>Select all</label></th><th>Sn</th><th>Role</th><th>Asign to User</th></tr></thead><tbody>";
				$data	 = $stmt->fetchall();
				$sn		 = 0;
				foreach($data as $dat){
					extract($dat);
					++$sn;
					$output .= "<tr><td><input type = 'checkbox' id = 'check$roleid' name = 'check' value = '$roleid'/><label for = 'check$roleid'></label></td><td>$sn</td><td>" . ucwords(strtolower($rolename)) . "</td><td><a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\" id = 'assign$roleid'><span class = 'glyphicon glyphicon-check'></a></td></tr>";
					
				}
				echo $output;
			}
		}
		exit;
	}
	else if (isset($_POST['loadassignedrolesforusers']))
	{
		if ($_POST['loadassignedrolesforusers'] != ''){
			$staffid = test_input($_POST['loadassignedrolesforusers']);
			$stmt	 = $conn->prepare("select * from roles where roleid in (select roleid from userroles where loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 1 and rolestatus = 1) and status = 1");
			$stmt->execute();
			$count	 = $stmt->rowCount();
			//echo "select * from roles where roleid not in (select roleid from userroles where loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 1 and rolestatus = 1) and status = 1";
			if($count > 0)
			{
				$output	 = '';
				$output .= "<a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\" id ='assign' >Unassign for selected</a><table id=\"mytable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead><tr><th><input type = 'checkbox' class = 'checkall' id = 'checkall' name = 'checkall' value = 'checkall' /><label for = 'checkall'>Select all</label></th><th>Sn</th><th>Role Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th><th id = 'changethis'>Change role</th><th id = 'editmode'>unassign from User</th></tr></thead><tbody>";
				$data	 = $stmt->fetchall();
				$sn		 = 0;
				foreach($data as $dat){
					extract($dat);
					++$sn;
					$output .= "<tr><td><input type = 'checkbox' id = 'check$roleid' name = 'check' value = '$roleid'/><label for = 'check$roleid'></label></td><td>$sn</td><td id = 'select$roleid'>" . ucwords(strtolower($rolename)) . "</td><td><a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clikhere\" id = 'change$roleid'><span class = 'glyphicon glyphicon-edit'></a></td><td><a href='#' style=\"background-color:#dcdcdc; color:white;\" class=\"btn btn-default clickhere\" id = 'assign$roleid'><span class = 'glyphicon glyphicon-remove'></a></td></tr>";
				}
				echo $output;
			}
		}
		exit;
	}
	else if (isset($_POST['user']) && isset($_POST['assignrole']))
	{
		if($_POST['user'] != '' && !empty($_POST['assignrole'])){
			$staffid	= test_input($_POST['user']);
			$arraycount = count($_POST['assignrole']);
			$roles 		= implode(',', $_POST['assignrole']);
			$stmt 		= $conn->prepare("select roleid from userroles where roleid in ($roles) and loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 0 and rolestatus = 1");
			$stmt->execute();
			$count 		= $stmt->rowCount();
			$success 	= 0;
			if($count > 0)
			{
				$stmtupdate  = $conn->prepare("update userroles set status = 1 where roleid in ($roles) and loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 0 and rolestatus = 1");
				$stmtupdate->execute();
				$countupdate = $stmtupdate->rowCount();
				if($countupdate == $arraycount){
					$report = $countupdate. " role";
					if($report > 1)
						$report .= 's';
					$report 	.= ' assigned to user ' . $staffid;
					echo $report;
					logguser($conn, '',$comment, $_SESSION['menuid']);
					exit;
				}
				else{
					$success = $countupdate;
				}
			}
			if($count === 0 || $success != $count)
			{
				$stmtsel	 =  $conn->prepare("select * from roles where roleid in ($roles) and roleid not in (select roleid from userroles where loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 1 and rolestatus = 1) and status = 1");
				$stmtsel->execute();
				//echo "select * from roles where roleid in ($roles) and roleid not in (select roleid from userroles where loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 1 and rolestatus = 1) and status = 1";
				$countsel 	 = $stmtsel->rowCount();
				$stmtloginid = $conn->prepare("select loginid from login where userid = '$staffid' and status = 1");
				$stmtloginid->execute();
				$dataloginid = $stmtloginid->fetch(PDO::FETCH_ASSOC);
				extract($dataloginid);
				if($countsel > 0){
					$datasel = $stmtsel->fetchAll();
					$id		 = implode(',', array_map(function($el){ return $el['roleid']; }, $datasel));
					foreach($datasel as $datsel)
					{
						extract($datsel);
						$stmtinsert = "insert into userroles(loginid, roleid, status, rolestatus) values($loginid, $roleid, 1, 1)";
						$conn->exec($stmtinsert);
					}
					$stmtcheck = $conn->prepare("select * from userroles where loginid = $loginid and roleid in ($id)");
					$stmtcheck->execute();
					$countcheck = $stmtcheck->rowCount();
					if($countcheck == $countsel)
					{
						$success = $success + $countcheck;
						$report	 = $success. " role";
						if($success > 1)
							$report .= 's';
					$report .= ' assigned to user ' . $staffid;
					echo $report;
					logguser($conn, '',$comment, $_SESSION['menuid']);
						
					}
				}
			}
			
		}
		exit;
	}
	else if (isset($_POST['assigneduser']) && isset($_POST['unassignrole']))
	{
		if($_POST['assigneduser'] != '' && !empty($_POST['unassignrole'])){
			$staffid 	= test_input($_POST['assigneduser']);
			$arraycount = count($_POST['unassignrole']);
			$roles 		= implode(',', $_POST['unassignrole']);
			$stmt 		= $conn->prepare("select roleid from userroles where roleid in ($roles) and loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 1 and rolestatus = 1");
			$stmt->execute();
			$count 	 	= $stmt->rowCount();
			//print_r($stmt);
			$success 	= 0;
			//echo "select roleid from userroles where roleid in ($roles) and loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 0 and rolestatus = 1";
			if($count > 0)
			{
				$stmtupdate  = $conn->prepare("update userroles set status = 0 where roleid in ($roles) and loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 1 and rolestatus = 1");
				//echo "update userroles set status = 1 where roleid in ($roles) and loginid in (select loginid from login where userid = '$staffid' and status = 1) and status = 0 and rolestatus = 1";
				$stmtupdate->execute();
				$countupdate = $stmtupdate->rowCount();
				if($countupdate == $arraycount){
					$report = $countupdate. " role";
					if($report > 1)
						$report .= 's';
					$report .= ' unassigned from user ' . $staffid;
					echo $report;
					logguser($conn, '',$comment, $_SESSION['menuid']);
					exit;
				}
				else{
					$success = $countupdate;
				}
			}
			
		}
		exit;
	}
	else if(isset($_POST['getassigneduser'])){
		//echo $_POST['getassigneduser'];
		if($_POST['getassigneduser'] != ''){
			$userid = $_POST['getassigneduser'];
			$stmt 	= $conn->prepare("select * from roles where status = 1 and roleid not in (select roleid from userroles where loginid in (select loginid from login where userid = '$userid' and status = 1) and status = 1 and rolestatus = 1)");
			$stmt->execute();
			$count 	= $stmt->rowCount();
			$output = '';
			if($count > 0){
				$output .= "<script>$(document).ready(function(){";
				$output .= "$(\".js-example-data-ajax1\").select2({";
				$output .= "placeholder: \"Select a role\",";
				$output .= "allowClear: true";
				$output .= "});";
				$output .= "});";
				$output .= "</script>";
				$output .= "<select id = 'roleid' name = 'roleid' class = 'js-example-data-ajax1 form-control'>";
				while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($data);
					$output .= "<option value = '$roleid'>" . ucwords(strtolower($rolename)) . "</option>";
				}
				$output .= '</select>';
				$output .= "<script>$(document).ready(function(){";
				$output .= "$(\"#roleid\").val('');";
				$output .= "});</script>";
				echo $output;
			}
		}
		exit;
	}
	else if(isset($_POST['roleuser']) && isset($_POST['changeroleid']) && isset($_POST['formerroleid'])){
		//echo 'hi';
		if($_POST['roleuser'] != '' && $_POST['changeroleid'] > 0 && $_POST['formerroleid'] > 0){
			$formerroleid = $_POST['formerroleid'];
			$roleid 	  = $_POST['changeroleid'];
			$roleuser 	  = test_input($_POST['roleuser']);
			$stmtcheck    = $conn->prepare("select rolename from roles where roleid = $formerroleid and status = 1");
			$stmtcheck1    = $conn->prepare("select rolename from roles where roleid = $roleid and status = 1");
			$stmt 		  = $conn->prepare("update userroles set roleid = $roleid where roleid = $formerroleid and loginid in (select loginid from login where userid = '$roleuser' and status = 1) and status = 1 and rolestatus = 1");
			//echo "update userroles set roleid = $roleid where roleid = $formerroleid and loginid in (select loginid from login where userid = '$roleuser' and status = 1) and status = 1 and rolestatus = 1";
				$stmt->execute();
			$count		  = $stmt->rowCount();
			if($count > 0 ){
				$stmtcheck->execute();
				$stmtcheck1->execute();
				$countcheck = $stmtcheck->rowCount();
				$countcheck1 = $stmtcheck1->rowCount();
				if($countcheck > 0 && $countcheck1 > 0){
					$datacheck = $stmtcheck->fetch(PDO::FETCH_ASSOC);
					$datacheck1 = $stmtcheck1->fetch(PDO::FETCH_ASSOC);
					$comment = "Role changed for $roleuser from " . ucwords($datacheck['rolename']) . " to " . ucwords($datacheck1['rolename']);
					logguser( $roleuser, $comment, $_SESSION['menuid']);
					echo $comment;
				}
			}
		}
		exit;
	}
	else if(isset($_POST['logappid'])){
		$menus = view_menu();
	}
	else if(isset($_POST['loadmenubyorder'])){
		$menus = view_menu($conn, 0, 0);
		$table = "<table class='display'><thead><tr><th>ORDER</th><th>NAME</th><th>CHANGE ORDER</th></tr></thead><tbody>";
		foreach($menus as $menu){
			extract($menu);
			$table .= "<tr><td>$menuorder</td>$menuname<td></td><td><button></button></td></tr>";
		}
		$table .= "</tbody></table>";
	}
	else if(isset($_POST['loadtitles']) && $_POST['loadtitles'] != '' && is_string($_POST['loadtitles'])){
		$titles = get_title($conn, 0);
		array_walk_recursive($titles,'uppercase');
		echo json_encode($titles);
		exit;
	}
	else if(isset($_POST['loadgender']) && $_POST['loadgender'] != '' && is_string($_POST['loadgender'])){
		$genders = get_gender($conn);
		//print_r($genders);
		array_walk_recursive($genders,'uppercase');

		echo json_encode($genders);
		exit;
	}
	else if(isset($_POST['loadnationality']) && $_POST['loadnationality'] != '' && is_string($_POST['loadnationality'])){
		if(isset($_POST['stateid']) && $_POST['stateid'] > 0){
			$state = get_state($conn, $countrycode = '', $state_code = '', $_POST['stateid']);
			$countrycode  = implode(',', array_map(function($el){ return $el['countrycode']; }, $state));
			$nationality = get_nationality($conn, $countrycode);
		}
		else{
			$nationality = get_nationality($conn);
		}
		array_walk_recursive($nationality,'uppercase');
		echo json_encode($nationality);
		exit;
	}
	else if(isset($_POST['loadstates']) && $_POST['loadstates'] != '' && is_string($_POST['loadstates'])){
		$states = get_allstates($conn);
		array_walk_recursive($states,'uppercase');
		echo json_encode($states);
		exit;
	}
	else if(isset($_POST['loadmstat']) && $_POST['loadmstat'] != '' && is_string($_POST['loadmstat'])){
		$mstat = get_mstat($conn, 0);
		array_walk_recursive($mstat,'uppercase');
		echo json_encode($mstat);
		exit;
	}
	else if(isset($_POST['facilities']) && $_POST['facilities'] != '' && is_string($_POST['facilities'])){
		$facilities = get_facility($conn);
		array_walk_recursive($facilities,'uppercase');
		echo json_encode($facilities);
		exit;
	}
	else if(isset($_POST['expenseheads']) && $_POST['expenseheads'] != '' && is_string($_POST['expenseheads'])){
		$expenseheads = get_expensehead($conn);
		array_walk_recursive($expenseheads,'uppercase');
		echo json_encode($expenseheads);
		exit;
	}
	else if(isset($_POST['viewfacilities']) && $_POST['viewfacilities'] != '' && is_string($_POST['viewfacilities']) && isset($_POST['memid']) && ($_POST['memid']) != ''){
		$stmt = $conn->prepare("select * from facilityregister where cashout = 0 and midno = '" . $_POST['memid'] . "'");
		$stmt->execute();
		$count = $stmt->rowCount();
		//print_r($stmt);
		if($count > 0)
		{
			$data = $stmt->fetchAll();
			$id = implode(',', array_map(function($el){ return $el['facid']; }, $data));
			$facilities = get_facility($conn, $id);
			array_walk_recursive($facilities,'uppercase');
			echo json_encode($facilities);	
		}
		exit;
	}
	else if(isset($_POST['facilityamount']) && $_POST['facilityamount'] != '' && is_numeric($_POST['facilityamount']) && isset($_POST['memid']) && ($_POST['memid']) != ''){
		$stmt = $conn->prepare("select * from facilityregister where cashout = 0 and midno = '" . $_POST['memid'] . "' and facid = " . $_POST['facilityamount']);
		$stmt->execute();
		$count = $stmt->rowCount();
		//print_r($stmt);
		if($count > 0)
		{
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			//$id = implode(',', array_map(function($el){ return $el['facid']; }, $data));
			//$facilities = get_facility($conn, $id);
			echo(number_format($data['principal'], 2, ".", ","));	
		}
		exit;
	}
	else if(isset($_POST['setoffreasons']) && $_POST['setoffreasons'] != '' && is_string($_POST['setoffreasons'])){
		$reasons = get_setoffreason($conn);
		array_walk_recursive($reasons,'uppercase');
		echo json_encode($reasons);
		exit;
	}
	else if(isset($_POST['interestrate']) && $_POST['interestrate'] != '' && is_string($_POST['interestrate'])){
		$stmt = $conn->prepare("select * from interest");
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			echo $data['interest'];
		}
		//echo json_encode($reasons);
		exit;
	}
	else if(isset($_POST['instruments']) && $_POST['instruments'] != '' && is_string($_POST['instruments'])){
		$instruments = get_instrument($conn);
		array_walk_recursive($instruments,'uppercase');
		echo json_encode($instruments);
		exit;
	}
	else if(isset($_POST['relationships']) && $_POST['relationships'] != '' && is_string($_POST['relationships'])){
		$relationships = get_relationship($conn);
		array_walk_recursive($relationships,'uppercase');
		echo json_encode($relationships);
		exit;
	}
	else if(isset($_POST['banks']) && $_POST['banks'] != '' && is_string($_POST['banks'])){
		$banks = get_bank($conn);
		array_walk_recursive($banks,'uppercase');
		echo json_encode($banks);
		exit;
	}
	else if(isset($_POST['posts']) && $_POST['posts'] != '' && is_string($_POST['posts'])){
		$posts = get_office($conn);
		array_walk_recursive($posts,'uppercase');
		echo json_encode($posts);
		exit;
	}
	else if(isset($_POST['wofbilevels']) && $_POST['wofbilevels'] != '' && is_string($_POST['wofbilevels'])){
		$wofbilevels = get_wofbilevel($conn);
		$array = array();
		array_walk_recursive($wofbilevels,'uppercase');
		echo json_encode($wofbilevels);
		exit;
	}
	else if(isset($_POST['loadgroupnames']) && $_POST['loadgroupnames'] != '' && is_string($_POST['loadgroupnames'])){
		$groupnames = get_groupname($conn);
		array_walk_recursive($groupnames,'uppercase');
		echo json_encode($groupnames);
		exit;
	}
	else if(isset($_POST['reasons'])){
		$reasons = get_setoffreason($conn);
		array_walk_recursive($reasons,'uppercase');
		echo json_encode($reasons);
		exit;
	}
	else if(isset($_POST['joinchurch']) && $_POST['joinchurch'] != '' && is_string($_POST['joinchurch'])){
		$churchstart = 1983;
		$presentyear = date('Y');
		$options = "<option value = ''></option>";
		for($churchstart; $churchstart<=$presentyear; $churchstart++){
			$options .= "<option value = '$churchstart'>$churchstart</option>";
		}
		echo $options;
		exit;
	}
	else if(isset($_POST['facilityid']) && isset($_POST['period']) && $_POST['facilityid'] > 0 && $_POST['period'] > 0 ){
		$stmt = $conn->prepare("select * from period where facilityid = '" . $_POST['facilityid'] . "' and period >= '" . $_POST['period'] . "'");
		$stmt->execute();
		$count = $stmt->rowCount();
		//print_r($stmt);
		if($count > 0){
			echo "";
		}
		else{
			$stmt = $conn->prepare("select * from facilitytypes where factypeid = '" . $_POST['facilityid'] . "'");
			$stmt->execute();
			$count = $stmt->rowCount();
			
			if($count > 0)
			{
				$stmt = $conn->prepare("select * from period where facilityid = '" . $_POST['facilityid'] . "'");
				$stmt->execute();
				$count = $stmt->rowCount();
				//print_r($stmt);
				if($count > 0)
				{
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
					echo "Only a maximum of " . $data['period'] . " month is allowed";
				}
			}
		}
	}
	else if(isset($_POST['facilityid']) && isset($_POST['facilityamount']) && $_POST['facilityid'] > 0 && $_POST['facilityamount'] > 0 ){
		$stmt = $conn->prepare("select * from facilities where factypeid = " . $_POST['facilityid']);
		//print_r($stmt);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data['factypeid'] == 3){
				if(fmod(($_POST['facilityamount'] * 1), ($data['facilityfee'] * 1)) == 0)
				{
					exit;
				}	else{
					echo "Wrong amount inputed for " . ucwords(get_input($data['facility']));
					exit;
				}				
			}else{
				if(($data['facilityfee'] * 1) != ($_POST['facilityamount'] * 1))
				{
					echo "Wrong amount inputed for " . ucwords(get_input($data['facility']));
					exit;
				}
			}
			
		}
	}
	else if(isset($_POST['confirmrefno']) && $_POST['confirmrefno'] != ''){
		$error = validatetext($_POST['confirmrefno'], 'Reference Number');
		if($error == ''){
			$confirmrefno = confirmrefno($conn, $_POST['confirmrefno']);
			if( $confirmrefno == false)
			{
				echo "";
				exit;
			}else if($confirmrefno == true){
				echo "This entry already exists check again";
				exit;
			}
		}
		else echo $error;
		exit;
	}
	else if(isset($_POST['confirmreceiptno']) && $_POST['confirmreceiptno'] != ''){
		$error = validatetext($_POST['confirmreceiptno'], 'Receipt Number');
		if($error == ''){
			$confirmreceiptno = confirmreceiptno($conn, $_POST['confirmreceiptno']);
			if( $confirmreceiptno == false)
			{
				echo "";
				exit;
			}else if($confirmreceiptno == true){
				echo "This entry already exists check again";
				exit;
			}
		}
		else echo $error;
		exit;
	}
	else if(isset($_POST['loanregno']) && $_POST['loanregno'] != '')
	{
		$facilities = getfacilitydetails($conn, $_POST['loanregno'], $midno = '', $facid = 0, 1, 1);
		array_walk_recursive($facilities,'uppercase');
		echo json_encode($facilities);
		exit;
	}
	else if(isset($_POST['loancashregno']) && $_POST['loancashregno'] != '')
	{
		$facilities = getfacilitydetails($conn, $_POST['loancashregno']);
		array_walk_recursive($facilities,'uppercase');
		echo json_encode($facilities);
		exit;
	}
	else if(isset($_POST['loadposts']) && $_POST['loadposts'] != '' && is_string($_POST['loadposts'])){
		$posts = get_post($conn);
		array_walk_recursive($posts,'uppercase');
		echo json_encode($posts);
		exit;
	}
	else if(isset($_POST['loadduty']) && $_POST['loadduty'] != '' && is_string($_POST['loadduty'])){
		$duties = get_duty($conn);
		array_walk_recursive($duties,'uppercase');
		echo json_encode($duties);
		exit;
	}
	else if(isset($_POST['arr']) && isset($_POST['facilitydescr']) && isset($_POST['arrbdate'])){
		//echo 'hi';
		if(!empty($_POST['arr']) && $_POST['facilitydescr'] != '' && !empty($_POST['arrbdate'] != '' ))
		{
			if(count($_POST['arr']) > 0)
			{
				$facilitydescr = test_input($_POST['facilitydescr']);
				$arrbdate = $_POST['arrbdate'];
				$comment = array();
				//$idnos = implode(',', $_POST['arr']);
				$found = 0;
				$sn = 0;
				foreach($_POST['arr'] as $index=>$memid)
				{
					++$sn;
					//echo $index;
					$stmt = $conn->prepare("select * from memberregister where memid = '$memid'");
					$stmt->execute();
					$count = $stmt->rowCount();
					if(validatetext($arrbdate[$index], 'bdate')  != ''){
						//$data = $stmt->fetch(PDO::FETCH_ASSOC);
						array_push($comment,  validatetext($arrbdate[$index], "bdate on line $sn"));
						//print_r($comment);
					}
					if(validatedate($arrbdate[$index], 'bdate')  != ''){
						//$data = $stmt->fetch(PDO::FETCH_ASSOC);
						array_push($comment,  validatedate($arrbdate[$index], "bdate on line $sn"));
						//print_r($comment);
					}
					if($count == 0){
						array_push($comment,  $memid);
						//print_r($comment);
					}
					else if($count > 0)
					{
						++$found;
						//exit;
					}
				}
				if(!empty($comment)){
					$memids = implode(',', $comment);
					$report = $memids ." ";
					if(count($comment) > 1 && $count == 0)
					$report .= 'are';
					else if($count == 0) $report .= 'is';
					if($count == 0)$report .= ' incorrect input the correct member id';
					if($count == 0)if(count($comment) > 1)
					$report .= 's';
					if($count == 0)$report .= ' and re-upload the file';
					echo "<div class=\"alert alert-warning\">$report</div>";
					exit;
				}
				else if(count($_POST['arr']) == $found){
					echo "success";
					exit;
				}
			}
		}
	}
	else if(isset($_POST['arrmemid']) && isset($_POST['arramount']) && isset($_POST['arrfacility']) && isset($_POST['arrpaid']) && isset($_POST['arrinstallment']) && isset($_POST['arrbdate'])){
		//echo "hi";
		if( !empty($_POST['arrmemid']) && !empty($_POST['arramount']) && !empty($_POST['arrpaid']) && !empty($_POST['arrinstallment']) && !empty($_POST['arrbdate']) && $_POST['arrfacility'] != '' )
		{
			//$conn = db();
			$comment 	= array();
			$arrmemids 	= $_POST['arrmemid'];
			$arramounts = $_POST['arramount'];
			$arrfacility = $_POST['arrfacility'];
			$arrpaid = $_POST['arrpaid'];
			$arrinstallment = $_POST['arrinstallment'];
			$arrbdate = $_POST['arrbdate'];
			$report = '';
			$r = '';
			$sn = 0;
			$kk = 0;
			foreach($arrmemids as $index=>$memid){
				++$sn;
				if($memid != '' && $arrfacility != '' && validateamount(str_replace(',','',$arramounts[$index]), 'amount') == '' && validateamount(str_replace(',','',$arrpaid[$index]), 'amount') == '' && validateamount(str_replace(',','',$arrinstallment[$index]), 'amount') == '' && validatetext($arrbdate[$index], "bdate") == '' && validatedate($arrbdate[$index], "bdate") == '')
				{
					$stmtdetails = $conn->prepare("select * from memberregister where memid = '$memid'");
					$stmtdetails->execute();
					$countdetails = $stmtdetails->rowCount();
					print_r($stmt);
					if($countdetails > 0){
						$datadetails = $stmtdetails->fetch(PDO::FETCH_ASSOC);
						$balance = (int)str_replace(',','', $arramounts[$index]) - (int)str_replace(',','', $arrpaid[$index]);
						$insert = facilityregisterinsert($conn, $arrfacility, $memid, date('Y-m-d', strtotime($arrbdate[$index])), $arramounts[$index], 0, 0, $arrinstallment[$index], '', '', '', '', '', '','', date('Y-m-d', strtotime($arrbdate[$index])), $arrpaid[$index], $balance);
						//echo "insert into mdeduction(stafno, name, amount, description) values('$idno', '" . $datadetails['sname'] . " " . $datadetails['fname'] . " " . $datadetails['mname'] . "', " . $arramounts[$index] . ", '" . $arrdescrip[$index] . "')";
						//$id    = $conn->lastInsertId();
						//print_r($stmt);
						//$count = $stmt->rowCount();
						//echo $count;
						if($insert == true){
								++$kk;
								//logguser( $idno, "Computed " . $arrdescrip[$index] .  " for $idno", $_SESSION['appid'], $_SESSION['menuid']);
						}
						else{
							$r .= "<div class=\"alert alert-warning\">$memid not done</div>\n";
						}
					}else{
						$r .= "<div class=\"alert alert-warning\">$memid not known</div>\n";
					}
					
				}
				else{
					//++$kk;
					if($memid == '')
						$report .= "<div class=\"alert alert-warning\">The staffid in row " . ($index + 1) . " is empty</div>\n";
					if((int)str_replace(',','',$arrpaid[$index]) <= 0 )
						$report .= "<div class=\"alert alert-warning\">The paid amount in row " . ($index + 1) . " is empty</div>\n";
					if(!is_numeric((int)str_replace(',','',$arrpaid[$index])))
						$report .= "<div class=\"alert alert-warning\">The paid amount in row " . ($index + 1) . " is incorrect</div>\n";
					if((int)str_replace(',','',$arramounts[$index]) <= 0 )
						$report .= "<div class=\"alert alert-warning\">The amount in row " . ($index + 1) . " is empty</div>\n";
					if(!is_numeric((int)str_replace(',','',$arramounts[$index])))
						$report .= "<div class=\"alert alert-warning\">The amount in row " . ($index + 1) . " is incorrect</div>\n";
					if((int)str_replace(',','',$arrinstallment[$index]) <= 0 )
						$report .= "<div class=\"alert alert-warning\">The Installment amount in row " . ($index + 1) . " is empty</div>\n";
					if(!is_numeric((int)str_replace(',','',$arrinstallment[$index])))
						$report .= "<div class=\"alert alert-warning\">The installment amount in row " . ($sn) . " is incorrect</div>\n";
					if(validatetext($arrbdate[$index], "bdate in row " . $sn)  != ''){
						$report .= "<div class=\"alert alert-warning\">" . validatetext($arrbdate[$index], "bdate in row " . $sn) . "</div>\n";
						//print_r($comment);
					}
					if(validatedate($arrbdate[$index], "bdate in row " . $sn)  != ''){
						$report .= "<div class=\"alert alert-warning\">" . validatedate($arrbdate[$index], "bdate in row " .$sn) . "</div>\n";
						//print_r($comment);
					}
				}
			}			
			if($report != ''){
				echo "some errors were found:\n $report \n $r";
				exit;
			}			
			else if($r != ''){
				echo "some errors were found: \n $r";
				exit;
			}
			else if($report == '' && $r == '' && $kk == count($arrmemids)){
				echo "done";
				exit;
			}
			else{
				echo $kk;
				exit;
			}
			exit;
		}
		exit;
	}
	if(isset($_POST['checkmdeduction']) && $_POST['checkmdeduction'] != ''){
		
		$stmtpre = $conn->prepare("select * from mdeduction1");
		$stmtpre->execute();
		$countpre = $stmtpre->rowCount();
		if($countpre > 0){
			echo "Are you sure you want to setup monthly deduction";
		}
	}
	else exit;
	
?>