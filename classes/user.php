<!--link href="../styles/jquery-ui.css" rel="stylesheet" /-->
<?php
require("table.php");
#require("../forms/loginform.php");

class user extends table{
	
	private $name;
	private $sname;
	private $dept;
	private $ID;
	private $useraccess;
	private $psw;
	
	function setName($name){
		$this->name=$name;
	}
	function setSname($sname){
		$this->sname=$sname;
	}
	function setDept($dept){
		$this->dept=$dept;
	}
	function setID($id){
		$this->ID=$id;
	}
	function setUseraccess($access){
		$this->useraccess=$access;
	}
	function setPsw($psw){
		$this->psw=$psw;
	}
	
	function getName(){
		return $this->name;
	}
	function getSname(){
		return $this->sname;
	}
	function getDept(){
		return $this->dept;
	}
	function getID(){
		return $this->ID;
	}
	function getUseraccess(){
		return $this->useraccess;
	}
	function getpsw(){
		return $this->psw;
	}
	function __construct($id){
		
		if($id!=""){
			$this->retrieve('user','id',$id);
			$detail=$this->getFields();
			
			$this->setID($id);
			$this->setName($detail[0][1]);
			$this->setSname($detail[0][2]);
			$this->setDept($detail[0][3]);
			$this->setUseraccess($detail[0][4]);
			$this->setPsw($detail[0][6]);
		}/*else{
			#signout user.
			#header("");
			$this->checkstatus();#
		}*/
	}
	function docRetrieveForm(){
		$_SESSION['folder']=$_REQUEST['flder'];
		?>
        <h1>Documents in folders</h1>
        <div class="instruction">Below is the list of available document stored in the selected folder, you can create new document, delete existing document protect document from other users or even upload any file using the meduim.</div>
        <p></p>
        <div id="table">
        <form name="form1" method="post" action="">

<table class="table_body" width="100%" border="0">
  <tr class="table_header">
    <td width="7%"></td>
    <td width="33%">Title</td>
    <td width="20%">date</td>
    <td>Document type</td>
    <td>Folder number</td>
    <td width="20%">Access status</td>
  </tr>
</table>
<table width="100%" class="table_body">
<?php
	$c=mysql_escape_string($_REQUEST['flder']);
	$this->retrieve_all_doc($c);
?>
</table>
<table width="60%" border="0" class="table_body">
  <tr>
    <td><input type="submit" name="btncreate" id="" class="btn" value="Create New document"></td>
      <td><input type="button" name="btnDelete" id="del" class="btn" value="Delete document" onclick="removeDoc();"></td>
    <!--td><input type="submit" name="btnprotected" id="btnremoveUser" class="btn" value="Protect document"></td-->
    <td><input type="submit" name="btnupload" id="" value="upload document" class="btn"></td>
  </tr>
</table>

</form>
</div>
        <?php
	}
	function createDocForm(){
	?>
    <h1>New Documents</h1>
        <div class="instruction">Below is the document is the document creation page. it allows the creation of yexy based document with no formatting on it. To create a new document, enter the doucment title as well as other neccessary requirement.</div>
        <p></p>
    <form name="form1" method="post" action="">
<label></label>
<table width="500px" border="0">
  <tr>
    <td><p>Composer</p>
      <p>
        <input class="txt" disabled type="text" name="owner" value="<?php echo $this->getSname()." ".$this->getName();?>">
      </p></td>
    </tr>
  <tr>
    <td><p>Date:</p>
      <p>
        <input type="text" class="txt" name="txtdate" value="<?php echo date('d/m/y');?>">
      </p></td>
    </tr>
  <tr>
    <td><p>Title (Note the message title serves as the Document name.):</p>
      <p>
        <input type="text" name="txttitle" class="txt">
      </p></td>
    </tr>
  <tr>
    <td><p>People eligible to access the document are <select class="txt" name="access">
    <?php
    $this->loadAccessLevel(1);
	?>
    </select></p>
      <p>
        <input name="protectdoc" type="checkbox">Protect Document form others
      </p></td>
    </tr>
  <tr>
    <td><p>Document Body:</p>
    <p>
    <textarea name="bodytext" cols="90" rows="30" class="txt">
    
    </textarea>
    </p><p>
    <input name="btnsavedoc" type="submit" value="Save Document" class="btn">
    <!--input name="btnupdatedoc" type="submit" value="Update Document" class="btn"-->
    <input name="btncancel" type="submit" value="Cancel" class="btn">
    </p>
    </td>
    </tr>
</table>

</form>

    <?php	
	}
	function updateDocForm(){
		$val=$this->getFields();
	?>
    <h1>Edit Documents</h1>
        <div class="instruction">Below is the document edit page. it allows you to edit text based document with no formatting on it. To create a new document, enter the doucment title as well as other neccessary requirement.</div>
        <p></p>
    <form name="form1" method="post" action="">
<label></label>
<table width="500px" border="0">
  <tr>
    <td><p>Composer</p>
      <p>
        <input disabled class="txt" type="text" name="owner" value="<?php echo $this->getSname()." ".$this->getName();?>">
      </p></td>
    </tr>
  <tr>
    <td><p>Date:</p>
      <p>
        <input type="text" class="txt" name="txtdate" value="<?php echo date('d/m/y');?>">
      </p></td>
    </tr>
  <tr>
    <td><p>Title (Note the message title serves as the Document name.):</p>
      <p>
        <input type="text" class="txt" name="txttitle" value="<?php echo "{$val[0][3]}";?>">
      </p></td>
    </tr>
  <tr>
    <td><p>People eligible to access the document are <select name="access" class="txt">
    <?php
    $this->loadAccessLevel($val[0][6]);
	?>
    </select></p>
      <p>
        <input name="protectdoc" type="checkbox" <?php
        if($val[0][7]==1){
			echo"checked=\'checked\'";
		}
		?>>Protect Document form others
      </p></td>
    </tr>
  <tr>
    <td><p>Document Body:</p>
    <p>
    <textarea name="bodytext" cols="90" rows="30" class="txt">
    <?php
    echo $val[0][5];
	?>
    </textarea>
    </p><p>
    <input name="btnsavedoc" type="submit" value="Save Document" class="btn">
    <input name="btnupdatedoc" type="submit" value="Update Document" class="btn">
    <input name="btncancel" type="submit" value="Cancel" class="btn">
    </p>
    </td>
    </tr>
</table>

</form>

    <?php	
	}
	
	function cancel($back){
		if(isset($_POST['btncancel'])){
			header("location:$back");
		}
	}
	function changePswForm(){
	?>
    <form name="form1" method="post" action="">
<label></label>
<table width="500px" border="0">
  <tr>
    <td><p>Enter current password:</p>
      <p>
        <input type="password" name="cpsw" class="txt">
      </p></td>
  </tr>
  <tr>
    <td><p>Enter New password:</p>
      <p>
        <input type="password" name="npsw" id="textfield" class="txt">
      </p></td>
  </tr>
  <tr>
    <td><p>Enter confirm New password:</p>
      <p>
        <input type="password" name="cnpsw" id="textfield" class="txt">
      </p></td>
  </tr>
  <tr>
    <td><p>
        <input type="submit" name="btnchangepsw" value="Change password" class="btn">
      </p>
     </td>
  </tr>
</table>
</form>

    <?php	
	}
	function changepsw(){
		if(isset($_POST['btnchangepsw'])){
			$cpsw=mysql_escape_string($_POST['cpsw']);
			$npsw=mysql_escape_string($_POST['npsw']);
			$cnpsw=mysql_escape_string($_POST['cnpsw']);
			
			if($npsw==$cnpsw){
				if($this->psw==$cpsw){
					
					$array_of_psw=array("$cnpsw");
					$array_of_field=array("psw");
					
					$this->setFields($array_of_psw);
					$id=$this->getID();
					$this->Updatetable('user',$array_of_field,"id=\"$id\"");
					$this->setPsw($cnpsw);
					echo "<p>Changes successfully updated</p>";
				}
			}else{
			echo "<p>New password mismatch</p>";	
			}
		}
	}
	function changeDeptform(){
	?>
    <div id="table"> 
    <form name="form1" method="post" action="">
<label></label>

<table width="500px" border="0" class="table_body">
  <tr class="table_header">
    <td width="10%">&nbsp;</td>
    <td width="33%">Name</td>
    <td width="20%">Access Level</td>
    <td width="20%">ID</td>
    <td>Department</td>
  </tr>
  <?php
  $this->retrieve_user();
  
  $val=$this->getFields();
  $no_of_retrieved=count($val);
  $j=1;
  echo "<input type=\"hidden\" name=\"itemno\" id=\"itemno\" value=\"$no_of_retrieved\">";
  for($i=$no_of_retrieved;$i>=1;$i--){
	  $k=$i-1;
  ?>
  <tr>
    <td><input type="checkbox" name="check<?php echo $j;?>" id="check<?php echo $j;?>"> <?php echo $j;?></td>
    <td><?php echo "{$val[$k][2]} {$val[$k][1]}";?></td>
    <td><select class="txt" name="accesslevel<?php echo $j;?>" id="accesslevel<?php echo $j;?>">
    <?php
	$this->loadAccessLevel($val[$k][4]);
    
	?>
    </select></td>
    <td><?php echo $val[$k][5];?><input type="hidden" value="<?php echo $val[$k][5];?>" name="id<?php echo $j;?>" id="id<?php echo $j;?>"></td>
    <td><select class="txt" name="dept<?php echo $j;?>" id="dept<?php echo $j;?>">
    <?php
	$this->LoadDept($val[$k][3]);
    
	?>
    </select></td>
  </tr>
  <?php
  	$j++;
	}
  ?>
</table>
<table  border="0">
  <tr>
    <td><input type="submit" class="btn" name="btnSaveChanges" id="btnSaveChanges" value="Save Changes "></td>
    <td><input type="button" name="btnRemoveUser" class="btn" id="btnRemoveUser" value="Remove User" onclick="removeUser();"></td>
  </tr>
</table>

</form>
</div>
    <?php	
	}
	function loginform(){
		?>
        <form name="form1" method="post" action="">
<div class="instruction">Only employees of our company is allowed to gain access to our document management system. To access the system provide the information below.
</div>
<table width="100%" border="0">
  <tr>
    <td width="24%">Department:</td>
    <td width="76%"><select name="dept" id="selectmenu" class="txt">
      <option value="">Select department</option>
      <option value="Ict">Ict</option>
      <option value="Admin">Admin</option>
      <option value="Accounts">Accounts</option>
    </select></td>
  </tr>
  <tr>
    <td>Employee ID:</td>
    <td><input type="text" name="ID" class="txt"></td>
  </tr>
  <tr>
    <td>Access Code:</td>
    <td>
      <input type="password" name="psw" class="txt" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><!--input name="btnlogin" type="submit" id="btnlogin" value="Login"-->
    
    <input name="btnlogin" type="submit" class="btn" value="Login">
    </td>
  </tr>
</table>

  <p><a href="#">Recover</a> Employee ID and Password?</p>
  <p>&nbsp;</p>
</form>

        <?php
	}
	function folderRetrieveForm(){
		?>
        <h1>Available folders</h1>
        <div class="instruction">Document manageemnt syste store files in folders. below are the list of available folders create in your account. to access their content, click on the folder, to perform other actions such as deleting or changing the protection status of a folder, select them before clicking on the respective button to perform the action. Note: click on the "addnew folder" button to creat anew folder for storage.</div>
        <p></p>
        <div id="table">
        <form name="folderform" method="post" action="">
        <label></label>
        
        <table width="500px" border="0" class="table_body">
          <tr class="table_header">
            <td width="7%">S/N</td>
            <td width="33%">Folder Name</td>
            <td width="20%">Protection status</td>
            <td width="20%">Date of creation</td>
          </tr>
        </table>
        <table class="table_body">
        <?php
        $this->user_retrieve_folder();
		?>
        </table>
        <table class="table_body" width="60%" border="0">
          <tr>
            <td><input type="submit" class="btn" name="btnaddnewfolder" value="Addnew folder"></td>
              <td><input type="button" class="btn" name="btnDelete" id="del" value="Delete Folder" onclick="removeFolder();"></td>
            <td><input type="submit" name="btnprotected" class="btn" value="Change Protection status"></td>
          </tr>
        </table>
        
        </form>
		</div>
        <?php
	}
	function login(){
		if (isset($_POST['btnlogin'])){
			#collect info. entered by user
			#validate fields
			$dept=$_POST['dept'];
			$id=$_POST['ID'];
			$psw=$_POST['psw'];
			
			if($dept!="" && $id!="" && $psw!=""){
				#hack proof inputs	
					$dept=mysql_escape_string($dept);
					$id=mysql_escape_string($id);
					$psw=mysql_escape_string($psw);
					
				#compare the with existing values
					$fieldname=array("dept","id","psw");
					$value=array($dept,$id,$psw);
					
					#$this->retrieve('user',$fieldname,$value);
					$this->retrieve('user','','');
					$val=$this->getFields();
					
					for($i=0;$i<count($val);$i++){
						if(strtoupper($val[$i][3])==strtoupper($dept) && strtoupper($val[$i][5])==strtoupper($id) && strtoupper($val[$i][6])==strtoupper($psw)){
							
							#set the session variables to extracts
						$_SESSION['userid']=$val[$i][5];
						$_SESSION['dept']=$val[$i][3];
					#move page to desktop.php
						header("location:desktop.php");
						}
						else{
						#echo "<p id=\"err\">Invalid Login Information</p>";
					}
					}
						
			}else{
				echo "<p id=\"err\">Login Fields cannot be empty</p>";
			}
			
			
		}
	}
	function AccessLevel($val){
		$levels=array(1=>"All",
			"Dept memebers",
			"Managerial staff",
			"owner only"
		);
		return $levels[$val];
	}
	function loadAccessLevel($val){
		$levels=array(1=>"All",
			"Dept members",
			"Managerial staff",
			"owner only"
		);
		for($i=1;$i<=count($levels);$i++){
			
			if($val==$i){
				echo "<option selected=\"selected\" value=\"$i\">$levels[$i]</option>";
			}else{
				echo "<option value=\"$i\">{$levels[$i]}</option>";
			}
		}
	}
	function LoadDept($val){
		$dept=array("Admin","ICT","Account");
		
		for($i=0;$i<count($dept);$i++){
			if($val==$dept[$i]){
				echo "<option selected=\"selected\" value=\"$val\">$val</option>";
			}else{
				echo "<option value=\"{$dept[$i]}\">{$dept[$i]}</option>";
			}
		}
	}
	function regform(){
	?>
    	<form action="" method="post">
<table width="500px" border="0">
  <tr>
    <td>First Name : </td>
    <td><input name="fname" type="text" class="txt" /></td>
  </tr>
  <tr>
    <td>Surname : </td>
    <td><input name="sname" type="text" class="txt" /></td>
  </tr>
  <tr>
    <td>Department : </td>
    <td><select name="dept" class="txt">
      <?php
    	$this->LoadDept('');
	?>
    </select></td>
  </tr>
  <tr>
    <td>Access level :</td>
    <td><select name="access" class="txt">
      <?php
    $this->loadAccessLevel('');
	?>
    </select></td>
  </tr>
  <tr>
    <td>User ID <code>In number only</code> : </td>
    <td><input name="ID" type="text" class="txt" /></td>
  </tr>
  <tr>
    <td>Password :</td>
    <td><input name="psw" type="password" class="txt" /></td>
  </tr>
  <tr>
    <td>Confirm Password :</td>
    <td><input name="cpsw" type="password" class="txt" /></td>
  </tr>
  <tr>
  <td>
  <p>
  	<input type="submit" name="btnRegister" value="Register" class="btn" />
  </p>
  </td>
  <td></td>
  </tr>
</table>

</form>
    <?php	
	}
	function registerUser(){
		if(isset($_POST['btnRegister'])){
			$fname=mysql_escape_string($_POST['fname']);
			$sname=mysql_escape_string($_POST['sname']);
			$dept=mysql_escape_string($_POST['dept']);
			$access=mysql_escape_string($_POST['access']);
			$id=mysql_escape_string($_POST['ID']);
			$psw=mysql_escape_string($_POST['psw']);
			$cpsw=mysql_escape_string($_POST['cpsw']);
			
			if ($fname!="" && $sname!=""){
				
				if($id!=""){
					if($psw==$cpsw){
						$fieldv=array($fname,$sname,$dept,$access,$id,$psw);
						$fieldn=array('name','sname','dept','accesslevel','id','psw');
			
						$this->setFields($fieldv);
						$this->save("user",$fieldn);
						echo "<b id=\"alert\">Saved successfully.</b>";
					}else{
						echo "<b id=\"err\">Password mismatch.</b>";
					}
				}else{
					echo "<b id=\"err\">User Id must be stated</b>";
				}
			}else{
				echo "<b id=\"err\">The name's can be empty.</b>";
			}
			
		}
	}
	
	function saveChanges(){
		if(isset($_POST['btnSaveChanges'])){
			#echo "can u see me?";
			
			for($i=1;$i<=$_POST['itemno'];$i++){
			#echo "Identified $i first<br>";
				if(isset($_POST['check'.$i])){
					#echo "Identified $i<br>";
					$user_access=$_POST['accesslevel'.$i];
					$user_dept=$_POST['dept'.$i];
					$user_id=$_POST['id'.$i];
					
					$vals=array("$user_access","$user_dept");
					
					$this->setFields($vals);
					
					$field=array("accesslevel","dept");
					$this->Updatetable('user',$field,"id='$user_id'");
					
				}
			}
			
		}
	}
	
	function changeAccess($protected){
		#if(isset($_POST['btnChangeAccessLevel'])){
		$this->setUseraccess($protected);
		$id=$this->getID();
		
		$val=array($this->getUseraccess());
		$this->setFields($val);
		
		$field=array("accesslevel");
		$this->Updatetable('user',$field,"id=\"$id\"");
		#}
	}
	
	function changedept($newdept){
		$this->setDept($newdept);
		$id=$this->getID();
		
		$val=array($this->getDept());
		$this->setFields($val);
		
		$field=array("dept");
		$this->Updatetable('user',$field,"id=\"$id\"");
	}
	
	function user_retrieve_folder(){
		$id=$this->getID();
		
		$this->retrieve('folder','','');
		$total_rec=array();
		
		$total_rec=$this->getFields();
		
		$rec=count($total_rec);
		echo "<input type=\"hidden\" id=\"itemno\" value=\"$rec\">";
		?>
        <input type="hidden" value="<?php echo $rec;?>" name="total" />
        <?php
		for($i=0;$i<count($total_rec);$i++){
		#for each content of field display their value in table
		$values=$this->getFields();
		$foldername=$values[$i][2];
		$creator=$values[$i][4];
		$cdate=$values[$i][1];
		$protected=$values[$i][3];
		$sn=$values[$i][0];
		$j=$i+1;
		if($creator==$this->getID()){
		?>
		<tr class="table_row">
            <td><input type="checkbox" name="chk<?php echo $j;?>" id="chk<?php echo $j;?>"><input type="hidden" name="n<?php echo $j;?>" value="<?php echo $sn;?>" id="n<?php echo $j;?>">
            <input type="hidden" name="pstatus<?php echo $j;?>" value="<?php echo $protected;?>">
            </td>
            <td><a href="inside_folder.php?flder=<?php echo $sn;?>"><?php echo $foldername;?></a></td>
            <td>Protected : <?php echo $protected;?></td>
            <td><?php echo $cdate;?></td>
</tr>
		  <?php
		}
		}
	}
	function user_retrieve_doc($doc_id){
		#$this->setUseraccess($protected);
		$id=$this->getID();
		
		if($doc_id!=""){
			
		}
		
		$val=array($this->getUseraccess());
		$this->setFields($val);
		
		$field=array("accesslevel");
		$this->Updatetable('user',$field,"id=\"$id\"");
	}
	function loadDocument($id){
		$field="id";
		$val=$id;
		
		$this->retrieve('doc',$field,$val);
	}
	function retrieve_all_doc($criteria){
		$id=$this->getID();
		
		if(isset($criteria)){
			$this->retrieve('doc','folder_name',$criteria);
		}else{
			$this->retrieve('doc','','');
		}
		
		$count=$this->getFields();
		$number=count($count);
		echo "<input type=\"hidden\" id=\"itemno\" value=\"$number\">";
		#echo "<br> the number in the array : ". count($count);
		
		for($i=0;$i<count($count);$i++){
		#for each content of field display their value in table
		$values=$this->getFields();
		if(isset($values[$i][0])){
		
		$ddate=$values[$i][0];
		$composer=$values[$i][1];
		$dept=$values[$i][2];
		$title=$values[$i][3];
		$type=$values[$i][4];
		$content=$values[$i][5];
		$accesslevel=$values[$i][6];
		$protected=$values[$i][7];
		$file_location=$values[$i][8];
		$folder_name=$values[$i][9];
		$doc_id=$values[$i][10];
		$j=$i+1;
		
		?>
		<tr class="table_row">
            <td><input type="checkbox" name="chk<?php echo $j;?>" id="chk<?php echo $j;?>"><input type="hidden" name="n<?php echo $j;?>" id="n<?php echo $j;?>" value="<?php echo $doc_id;?>"></td>
            <td>
            <?php
            if($type=='text'){
				echo "<a target=\"_new\" href=\"updatedocument.php?id=$doc_id\">$title</a>";
           	}elseif($type=='formatted'){
            	echo "<a target=\"_new\" href=\"$content\">$title</a>";
            }
			?>
            </td>
            <td><?php echo $ddate;?></td>
            <td><?php echo $type;?></td>
            <td><?php echo $accesslevel;?></td>
            <td><?php echo $folder_name;?></td>
            <td>Protected : <?php echo $protected;?></td>
</tr>
		  <?php	
		}#close of if statement
		}#close of for statement
	}
	function addfolderform(){
		?>
        <h1>Add New folders</h1>
        <div class="instruction">Enter the folder name and set the protection status to create a new folder for file storage.</div>
        <form action="" method="post">
        <table width="100%" border="0">
          <tr>
            <td width="47%">Folder Name:
            <input name="txtfoldername" type="text" class="txt" /></td>
          </tr>
          <tr>
            <td>Protect access from other users  <input name="folderprotection" type="checkbox" /></td>
          </tr>
          <tr>
            <td><input name="btncreatefolder" class="btn" type="submit" value="Create Folder" />
            <input name="btncancel" type="submit" class="btn" value="Cancel" /></td>
          </tr>
        </table>

        </form>
        <?php
	}
	function addnew_folder(){
		if(isset($_POST["btnaddnewfolder"])){
			header("location:addnewfolder.php");	
		}
	}
	function createfolder(){
		if(isset($_POST["btncreatefolder"])){
			$fname=mysql_escape_string($_POST['txtfoldername']);
			if($_POST['folderprotection']=='on'){
				$protect=1;
			}else{
				$protect=0;	
			}
			
			$cdate=date('d/m/y');
			
			$fieldv=array($cdate,$fname,$protect,$this->getID());
			$fieldn=array('dateofcreation','foldername','protected','creator');
			
			$this->setFields($fieldv);
			
			$this->save('folder',$fieldn);
			header("location:desktop.php");	
		}
	}
	function cancelfolder(){
		if(isset($_POST["btncancel"])){
			header("location:desktop.php");	
		}
	}
	function delete_folder($folder_ids){
		$field=array("sn");
		for($i=0;$i<count($folder_ids);$i++){
			$this->delete('folder',$field,$folder_ids[$i]);
		}
	}
	function protect_folder(){
		if(isset($_POST['btnprotected'])){
			
			$field=array("sn");
			#$num=1;
			
			$total=$_POST['total'];
			
			for($num=1;$num<=$total;$num++){
			
			
			
			if(isset($_POST["chk$num"])){
				#extract id
				#echo "<br>chk:$num ={$_POST['chk'.$num]}--<br>";
				$folder_id=$_POST['n'.$num];
				
				$value=$_POST['pstatus'.$num];
				#initiate an update of folder table
				if($value==1){
					$value=0;
				}elseif($value==0){
					$value=1;
				}
				$fieldn=array('protected');
				$fieldv=array("$value");
				
				$this->setFields($fieldv);
				$this->Updatetable('folder',$fieldn,"sn=\"$folder_id\"");
				
			}#close of if
			}
			
		}
	}
	function user_update_doc(){
		if(isset($_POST['btnupdatedoc'])){
			$owner=$this->getSname()." ".$this->getName();
			
			$cdate=mysql_escape_string($_POST['txtdate']);
			$title=$_POST['txttitle'];
			
			if(isset($_POST['protectdoc'])){
				$protection=1;
			}else{
				$protection=0;
			}
			$doc_access=$_POST['access'];
			$content=mysql_escape_string($_POST['bodytext']);
			
			if($title!=""){
				#use the doc title to comapare if such name exist in the same folder.
				$foldername=$_SESSION['folder'];
				$this->retrieve('doc','folder_name',$foldername);
				$all=$this->getFields();
				
				
				$no=count($all);
				#echo "The number of vertical array is $no<br>";
				
				for($i=0;$i<$no;$i++){
					
					if(isset($all[$i][3])){
					
					$rtitle=$all[$i][3];
					$id=$all[$i][10];
					
						if($rtitle==$title){
							$is_present=true;
							
							$fieldn=array('dDate','composer','dept','title','type','msg','access','protected','folder_name');
					$fieldv=array($cdate,$owner,$this->getDept(),$title,'text',$content,$doc_access,$protection,$foldername);
					$this->setFields($fieldv);
					
					$this->Updatetable('doc',$fieldn,"id=\"$id\"");
					echo "<p id=\"alert\">$title document updated.</p>";
		
					break;
						}
					
					}
				}
				if($is_present!=true){
					echo "<p id=\"err\">New document is required for your new title.</p>";
				}
				#if no alert the user if no save the doc.
				
			
			
			}else{
				echo "<p id=\"err\">Provide the document title to save your document</p>";
			}
			
		}
	}
	function user_save_doc($foldername){
		$is_present=false;
		
		if(isset($_POST['btnsavedoc'])){
			$owner=$this->getSname()." ".$this->getName();
			
			$cdate=mysql_escape_string($_POST['txtdate']);
			$title=$_POST['txttitle'];
			
			if(isset($_POST['protectdoc'])){
				$protection=1;
			}else{
				$protection=0;
			}
			$doc_access=$_POST['access'];
			$content=mysql_escape_string($_POST['bodytext']);
			
			if($title!=""){
				#use the doc title to comapare if such name exist in the same folder.
				
				$this->retrieve('doc','folder_name',$foldername);
				$all=$this->getFields();
				
				
				$no=count($all);
				#echo "The number of vertical array is $no<br>";
				
				for($i=0;$i<$no;$i++){
					
					if(isset($all[$i][3])){# && $all[$i][3]!=""){
					
					$rtitle=$all[$i][3];
					
						if($rtitle==$title){
							$is_present=true;
							echo "<p id=\"err\">Document name already existing in this folder, change the title and try again.</p>";
							break;
						}
					
					}
				}
				if($is_present!=true){
					$fieldn=array('dDate','composer','dept','title','type','msg','access','protected','folder_name');
					$fieldv=array($cdate,$owner,$this->getDept(),$title,'text',$content,$doc_access,$protection,$foldername);
					$this->setFields($fieldv);
					
					$this->save('doc',$fieldn);
					echo "<p id=\"alert\">Document saved.</p>";
				}
				#if no alert the user if no save the doc.
				
			
			
			}else{
				echo "<p id=\"err\">Provide the document title to save your document</p>";
			}
			}
		
	}
	
	function user_cancel_doc(){
		if(isset($_POST['btncancel'])){
			header("location:desktop.php");
		}
	}
	
	function retrieve_user(){
		
		$this->retrieve('user','','');
	}
	function create_doc(){
		if(isset($_POST['btncreate'])){
				$_SESSION['folder']=$_REQUEST['flder'];
				header("location:newdocument.php");
		}
	}

function uploadDocform(){
	?>
      <form method="post" name="Docupload" enctype="multipart/form-data">
       <table>
       <tr><td width="100px">Title:</td><td><input type="text" name="title" class="txt" /></td></tr>
       <tr><td><p>Document type:</p></td><td> 
       <select name="doctype" class="txt">
       <option value="doc">Word 2000</option>
       <option value="docx">Word 2007</option>
       <option value="cdr">Corel Draw</option>
       <option value="pdf">PDF</option>
       <option value="jpg">JPEG Image</option>
       </select></td></tr>
       </table>
       <p><label><input type="checkbox" name="protect" /> Protect Document form others</label></p>
       <p><input type="file" name="file" class="txt" /></p>
       <p>
       <input type="submit" name="uploaddoc" value="Upload Document" class="btn" />
       </p>
      </form> 
	<?php
}
function uploadDoc(){
	if(isset($_POST['uploaddoc'])){
		
		if($_POST['title']!=""){
			$title=mysql_escape_string($_POST['title']);
			$doctype=$_POST['doctype'];
			$cdate=date('d/m/y');
			$owner=$this->getSname()." ".$this->getName();
			$foldername=mysql_escape_string($_REQUEST['flder']);
			
			if(isset($_POST['protect'])){
				$protected=$_POST['protect'];
			}
			
			if(isset($_FILES['file']['name'])){
				$name=$_FILES['file']['name'];
				
				$ext=explode(".",$_FILES['file']['name']);
			
				if($ext[1]==$doctype){#check file format match
					
					
					$dest="uploads/".$title.".$doctype";
					move_uploaded_file($_FILES['file']['tmp_name'],$dest);
					
					$fieldn=array('dDate','composer','dept','title','type','msg','access','protected','folder_name');
					$fieldv=array($cdate,$owner,$this->getDept(),$title,'formatted',$dest,'',$protected,$foldername);
					$this->setFields($fieldv);
					
					$this->save('doc',$fieldn);
					
					echo "<p id=\"alert\">Saved successfully</p>";
					
				}else{
					echo "<p id=\"err\">File type mismatch</p>";
				}
				
			}else{
				echo "<p id=\"err\">Select the document to upload.</p>";
			}
		}else{
			echo "<p id=\"err\">Enter document title</p>";
		}
	}
	
}	
function upload(){
	if(isset($_POST['btnupload'])){
		header("location:fileupload.php?flder={$_REQUEST['flder']}");
	}
}
}
// end of class


?>