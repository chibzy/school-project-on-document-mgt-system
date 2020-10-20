<?php
#require("table.php"); may cause problem in the future

class accessControl extends table{
	/*Acccess level codes
		1=All
		2=Dept memebers
		3=Managerial staff
		4=owner only.
	*/
	
	private $ID;
	private $dept;
	private $accesslevel;
	
	function __construct($docid){
		#retrieve document details
		$this->retrieve('doc','id',$docid);
		#set to variables
		#get user access level and dept
		$doc=$this->getFields();

		$this->setAccessLevel($doc[0][5]);
		$this->setDept($doc[0][2]);
		$this->setID($doc[0][10]);
	}
	
	function setID($id){
		$this->ID=$id;
	}
	function setDept($dept){
		$this->dept=$dept;
	}
	function setAccessLevel($access){
		$this->accesslevel=$access;
	}
	function getID(){
		return $this->ID;
	}
	function getDept(){
		return $this->dept;
	}
	function getAccessLevel(){
		return $this->accesslevel;
	}
	
	function grantAccess($userlevel,$userdept,$userid){
		#retrieve document details
		$this->retrieve('doc','id',$this->ID);
		#set to variables
		#get user access level and dept
		$doc=$this->getFields();
		
		$doc_access=$doc[0][5];
		$doc_dept=$doc[0][2];
		$doc_owner=$doc[0][1];
		
		if($doc_access==1){
			$response=true;
		}
		elseif($doc_access==2){
			if($userdept==$doc_dept){
				$response=true;
			}else{
				$response=false;
			}
		}
		elseif($doc_access==3){
			if($userlevel==3){
				$response=true;
			}else{
				$response=false;
			}	
		}
		elseif($doc_access==4){
			if($doc_owner==$user_id){
				$response=true;
			}else{
				$response=false;
			}
		}
		#compare the access level values
		#return true or false.
		return $response;
	}
	/*function denyAccess(){
		
	}*/
}
?>