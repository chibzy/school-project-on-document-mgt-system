<form name="form1" method="post" action="">
<label>
	Only employees of our company is allowed to gain access <br />to our document management system. To access the system provide the information below.
</label>
<table width="100%" border="0">
  <tr>
    <td width="24%">Department:</td>
    <td width="76%"><select name="dept">
      <option value="">Select department</option>
      <option value="Ict">Ict</option>
      <option value="Admin">Admin</option>
      <option value="Accounts">Accounts</option>
    </select></td>
  </tr>
  <tr>
    <td>Employee ID:</td>
    <td><input type="text" name="ID"></td>
  </tr>
  <tr>
    <td>Access Code:</td>
    <td>
      <input type="password" name="psw" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnlogin" type="submit" id="btnlogin" value="Login"></td>
  </tr>
</table>

  <p><a href="#">Recover</a> Employee ID and Password?</p>
  <p>&nbsp;</p>
</form>
