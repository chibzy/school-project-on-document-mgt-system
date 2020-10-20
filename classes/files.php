<?php
require("accesscntrl.php");

class files extends accessControl{
	private $filename;
	private $no_of_doc;
	private $folderprotection;
	
	function setFilename($filename,$foldername,$userid){
		#check thru the database for similiar file and folder name of the same owner.
		#if they exist, generate error, else, use name.
	}
	function setProtection($state){
		if($state==1){
			#protect folder
			#display folder set password form
			#and apply cahanges to database
		}elseif($state==0){
			#unprotect folder
			#apply changes to database
			#display message.
		}
	}
	function openfile(){
		
	}
	function read_doc(){
		
	}
	function delete_folder(){
		
	}
	function add_doc(){
		
	}
	function remove_doc_from_folder(){
		
	}
}
?>