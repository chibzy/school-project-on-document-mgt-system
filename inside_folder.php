<?php
require_once("classes/user.php");

if(!isset($_SESSION)){
	session_start();
}
$base=new table();#it will be included at runtime
if(isset($_SESSION['userid'])){
	$user=new user($_SESSION['userid']);
}
$base->checkstatus();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="file.css" rel="stylesheet" />
<link href="styles/jquery-ui.css" rel="stylesheet" />
<script src="styles/prototype.js" language="javascript" type="application/javascript"></script>
<script src="styles/mine.js"></script>

<title>Document Managment System - <?php echo $user->getSname()." ".$user->getName()." desk account.";?></title>
</head>

<body id="body">
<div>
<div id="top_body"><img src="imgs/logo.png" width="180" height="110" id="logoimg"/> <h1 id="top_msg">Welcome</h1></div>
<div id="page_body">
<div id="top_bar">
<?php
	echo "You are unto <b> ".$user->getSname() ." ".$user->getName()."</b> account of the department of ".$user->getDept() ."
	: Account access level <b>".$user->getUseraccess()."</b>"; 
	include("forms/menu.php");
?></div>
<table width="100%" border="0">
  <tr>
    <td width="30%">
    
    </td>
    <td>
    <div>
	<?php
		$user->create_doc();
		$user->upload();
		$user->docRetrieveForm();
	?>
    </div>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<div id="base_cover">
<div id="base_inner"></div>
</div>
</div>
</body>
</html>