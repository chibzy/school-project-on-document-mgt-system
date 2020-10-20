<div>
<table width="100%" border="0">
<?php if($_SESSION['dept']=='Admin'){?>
  <tr>
    <td width="70%">&nbsp;</td>
    <td><span><a href="registration.php">Staff registration</a></span>|<span><a href="desktop.php">Desktop</a></span>|<span><a href="settings.php">Account Settings</a></span>|<span><a href="signout.php">Signout</a></span></td>
  </tr>
<?php }else{?>
	<tr>
    <td width="70%">&nbsp;</td>
    <td><span><a href="desktop.php">Desktop</a></span>|<span><a href="settings.php">Account Settings</a></span>|<span><a href="signout.php">Signout</a></span></td>
  </tr>
<?php } ?>
</table>

</div>
