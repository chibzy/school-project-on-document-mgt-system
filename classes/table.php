<?php
class table{
	private $fields=array();
	
	
	function retrieve($name,$field,$val){
		$this->connectdb();
		$this->setFields('');
		
		if($field!=""){
			$sql="select * from $name where $field ='".$val."'";
		}else{
			$sql="select * from $name";
		}
		
		$exec=mysql_query($sql);
		$i=0;
		while($values=mysql_fetch_row($exec)){#retrieve table content and save in filed list.
				$total=count($values);
				
				$this->fields[$i]=$values;
				$i++;
		}
			
	}
	
	function save($name,$fieldname){
		$this->connectdb();
		
		$values=$this->fields;
		
		$fname=$this->serialize_list($fieldname);
		
		
		for($i=0;$i<count($values);$i++){
			#$j=0;
			$cont=$values;
			
			$fieldval=$this->serialize_value($cont);
		}	
			$sql="insert into $name($fname) values($fieldval)";
		#	echo "<br>".$sql;
			$exec=mysql_query($sql);
		
		
	}
	
	function Updatetable($name,$fieldname,$criteria){
		$this->connectdb();
		
		$values=$this->fields;
		$fname=$this->serialize_list($fieldname);
		$val=$this->setvalue($fieldname,$values);
			
			$sql="update $name set $val where $criteria";
			$exec=mysql_query($sql);
		
	}
	private function setvalue($list1,$list2){
		$val="";
		$terminus=count($list1);
			
			for($j=0;$j<$terminus;$j++){
				
				if(($terminus-$j)!=1){
					$val.="$list1[$j]=\"$list2[$j]\",";
				}else{
					$val.="$list1[$j]=\"$list2[$j]\"";
				}
			}
			return $val;
	}
		
	function serialize_list($list){
		$fname="";
		$terminus=count($list);
		
		for($j=0;$j<$terminus;$j++){#serialize list.
				
				$no=count($list);

				
				if(($terminus-$j)!=1){
					$fname.=$list[$j].",";	
				
				}else{
					
					$fname.=$list[$j];
				}
		}
		
		return $fname;
	}
	function serialize_value($list){
		$fname="";
		$terminus=count($list);
		
		for($j=0;$j<$terminus;$j++){#serialize value.
				
				if(($terminus-$j)!=1){
					
					$fname.="'".$list[$j]."',";	
				
				}else{
					
					$fname.="'".$list[$j]."'";
				}
		}
		
		return $fname;
	}
	private function setForDelete($list,$vallist){
		$terminus=count($list);
		$criteria="";
		
		
		for ($i=0;$i<$terminus;$i++) {
			
			if(($terminus-$i)!=1){
				$criteria.=$list[$i]."='".$vallist[$i]."' and";
			}else{
				$criteria.=$list[$i]."='".$vallist[$i]."'";
			}
		}
		
		return $criteria;	
		
	}
	
	function delete($name,$criteriaList,$valList){
		$this->connectdb();
			
			$criteria=$this->setForDelete($criteriaList,$valList);
			$sql="delete from $name where $criteria";
			
#			echo "<br>".$sql;
			
			$exec=mysql_query($sql);
		
	}
	
	function setFields($field){
		$this->fields=$field;
	}
	
	function getFields(){
		return $this->fields;
	}
	private function connectdb(){
		$hostname_school = "localhost";
		$database_school = "DMS";
		$username_school = "root";
		$password_school = "";
		
		$conn=mysql_connect($hostname_school,$username_school,$password_school);
		$db=mysql_select_db($database_school);
		
	}

function checkstatus()
{
if (!$_SESSION){
	header("Location:index.php");
	/*echo"<script type=\"text/javascript\"> window.open('index.php','_self');</script>";*/
	exit();
	#echo "time to redirect!!";
}
}
}
?>