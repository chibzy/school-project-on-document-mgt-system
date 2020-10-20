<?php
require("table.php");

class regForm extends table{
	private $name;
	private $sname;
	private $Dept;
	private $accessLevel;
	private $ID;
	private $psw;

	function getName(){
		return $this->name;
		}
	function getSname(){
		return $this->sname;
		} 
	function getDept(){
		return $this->Dept;
		}
	function getAccessLevel(){
		return $this->accessLevel;
		}
	function getID(){
		return $this->psw;
		}
	
	function setName($name){
		$this->name=$name;
		}
	function setSname($sname){
		$this->sname=$sname;
		}
	function setDept($Dept){
		$this->Dept=$Dept;
		}
	function setAccessLevel($accesslevel){
		$this->accessLevel=$accesslevel;
		}
	function setID($id){
		$this->ID=$id;
		}
	function setPsw($psw){
		$this->psw=$psw;
		}
		
	function __construct($name,$sname,$dept,$accesslevel,$id,$psw){
		$this->setDept($dept);
		$this->setname($name);
		$this->setSname($sname);
		$this->setAccessLevel($accesslevel);
		$this->setID($id);
		$this->setPsw($psw);
	}
	function getUser($id){
		$table="user";
		$this->retrieve($table,'ID',$id);
		$fields=$this->getFields();
		
		$i=count($fields);
		echo $i."<br> {$fields[0][1]}";
		
		for($j=0;$j<$i;$j++){
			$this->setName($fields[$j][1]);
			$this->setSname($fields[$j][2]);
			$this->setDept($fields[$j][3]);
			$this->setAccessLevel($fields[$j][4]);
			$this->setID($fields[$j][5]);
			$this->setPsw($fields[$j][6]);
		}
		
	}
	
	function AddNew(){
			#$allname=." ".$this->name;
			$detail=array($this->name,$this->sname,$this->Dept,$this->accessLevel,$this->ID,$this->psw);
			
			$fields=array('name','sname','dept','accesslevel','id','psw');
			
			$table="user";
			$this->setFields($detail);
			
			$this->save($table,$fields);
	}
	function update($id){
			
			$detail=array($this->name,$this->sname,$this->Dept,$this->accessLevel,$this->ID,$this->psw);
			
			$fields=array('name','sname','dept','accesslevel','id','psw');
			
			$table="user";
			$this->setFields($detail);
			
		
		$this->Updatetable($table,$fields,"ID=\"$id\"");
	}
	
}
?>