<form name="form1" method="post" action="">
<label></label>

<table width="100%" border="0">
  <tr>
    <td width="7%">&nbsp;</td>
    <td width="33%">Name</td>
    <td width="20%">Access Level</td>
    <td width="20%">ID</td>
    <td>Department</td>
  </tr>
  <tr>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>Surname Name</td>
    <td><select name="select" id="select">
    <?php
    /*echo $user->levels;
		<option value="staff">staff</option>
		<option value="Operational Manager">Operational Manager</option>
		<option value="Managing Director">Managing Director</option>
	*/
	?>
    </select></td>
    <td>213344</td>
    <td><select name="select2" id="select2">
    <?php
    /*echo $user->Departments;
		<option value="ICT">ICT</option>
		<option value="Admin">Admin</option>
		<option value="Accounts">Accounts</option>
	*/
	?>
    </select></td>
  </tr>
</table>
<table width="60%" border="0">
  <tr>
    <td><input type="submit" name="btnChangedept" id="btnChangedept" value="Change Department"></td>
      <td><input type="submit" name="btnChangeAccessLevel" id="btnChangeAccessLevel" value="Change Access Level"></td>
    <td><input type="submit" name="btnremoveUser" id="btnremoveUser" value="Remove User"></td>
  </tr>
</table>
</form>

<p>
<form action="" method="post">
<table width="500px" border="0">
  <tr>
    <td>First Name : </td>
    <td><input name="name" type="text" /></td>
  </tr>
  <tr>
    <td>Surname : </td>
    <td><input name="sname" type="text" /></td>
  </tr>
  <tr>
    <td>Department : </td>
    <td><select name="select3" id="select3">
      <?php
    /*echo $user->Departments;
		<option value="ICT">ICT</option>
		<option value="Admin">Admin</option>
		<option value="Accounts">Accounts</option>
	*/
	?>
    </select></td>
  </tr>
  <tr>
    <td>Access level :</td>
    <td><select name="select4" id="select4">
      <?php
    /*echo $user->Departments;
		<option value="ICT">ICT</option>
		<option value="Admin">Admin</option>
		<option value="Accounts">Accounts</option>
	*/
	?>
    </select></td>
  </tr>
  <tr>
    <td>User ID : </td>
    <td><input name="sname2" type="text" /></td>
  </tr>
  <tr>
    <td>Password :</td>
    <td><input name="sname3" type="text" /></td>
  </tr>
  <tr>
  <td>
  <p>
  	<input type="submit" name="btnRegister" value="Register" />
  </p>
  </td>
  <td></td>
  </tr>
</table>

</form>
</p>