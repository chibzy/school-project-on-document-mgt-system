<?php
require_once("classes/user.php");
if(!isset($_SESSION)){
	session_start();
}
#$_SESSION['name']="";


$user=new user('');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="file.css" rel="stylesheet" />
<link href="styles/jquery-ui.css" rel="stylesheet" />

<script src="styles/external/jquery/jquery.js"></script>
<script src="styles/jquery-ui.js"></script>
<script src="styles/mine.js"></script>
<title>Document Managment System - Welcome</title>
</head>

<body id="body">
<div>
<div id="top_body"><img src="imgs/logo.png" width="180" height="110" id="logoimg"><h1 id="top_msg">Welcome</h1></div>
<div id="page_body">

<div id="top_bar"></div>
<table width="100%" border="0">
  <tr>
    <td width="60%">&nbsp;</td>
    <td>
    <?php
		$user->login();
		$user->loginform();
	?>
    </td>
  </tr>
</table>

</div>
<div id="base_cover">
<div id="base_inner"></div>
</div>
</div>
</body>
</html>