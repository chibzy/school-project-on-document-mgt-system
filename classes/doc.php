<?php
require("accesscntrl.php");

class doc extends accessControl {
	private $ndate;
	private $composer;
	private $title;
	private $message;
	private $access_level;
	private $dprotected;	
	private $docid;
	private $type;
	private $folder;
	private $Filelocation;
	
	function setDocid($id){
		$this->docid=$id;	
	}
	function setnDate($date){
		$this->ndate=$date;	
	}
	function setFilelocation($location){
		$this->Filelocation=$location;	
	}
	function setFolder($folder){
		$this->folder=$folder;	
	}
	function setType($type){
		$this->type=$type;	
	}
	
	function setComposer($owner){
		$this->composer=$owner;	
	}
	function setTitle($title){
		$this->title=$title;	
	}
	function setMessage($msg){
		$this->message=$msg;	
	}
	function setAccess_level($access){
		$this->access_level=$access;	
	}
	function setdProtected($protected){
		$this->dprotected=$protected;	
	}
	
	function getDocid(){
		return $this->docid;	
	}
	function getFilelocation(){
		return $this->Filelocation;	
	}
	function getType(){
		return $this->type;	
	}
	function getfolder(){
		return $this->folder;	
	}
	function getnDate(){
		return $this->ndate;	
	}
	function getComposer(){
		return $this->composer;	
	}
	function getTitle(){
		return $this->title;	
	}
	function getMessage(){
		return $this->message;	
	}
	function getaccess_level(){
		return $this->access_level;	
	}
	function getdprotected(){
		return $this->dprotected;	
	}
	function __construct($doc_id){
		$this->setDocid($doc_id);
	}
	
	function createNewDoc(){
	#set a value to all the values of doc.
	$this->setnDate(date('d/m/y'));
	$this->setTitle('Enter Title');
	$this->setMessage('Enter text content');
	$this->setAccess_level(4);
	$this->setdProtected(true);
		
	}
	function saveDoc($user,$dept,$folder){
		$doc=array($this->ndate,$user,$dept,$this->title,'text',$this->message,$this->access_level,$this->dprotected,'',$folder);
		$fields=array("ndate","composer","dept","title","type","msg","Access","protected","file_location","folder","id");
		
		$this->setFields($doc);
		if($this->title!="" || $this->title!="Enter Title"){
			$this->save('doc',$fields);
		}
	}            
	private function retrieveDoc($doc_id){
		#collect all information about the document
		#assign values to the field 
		$this->retrieve('doc','id',$doc_id);
	}
	function protect($user){
		if($user==$this->composer){
			$this->setdProtected(true);
		}
	}
	function unprotect($user){
		if($user==$this->composer){
			$this->setdProtected(false);
		}
	}
	function update_doc($user,$dept,$folder){
		$doc=array($this->ndate,$user,$dept,$this->title,'text',$this->message,$this->access_level,$this->dprotected,'',$folder);
		$fields=array("ndate","composer","dept","title","type","msg","Access","protected","file_location","folder","id");
		
		$this->setFields($doc);
		if($this->title!="" || $this->title!="Enter Title"){
			$this->Updatetable('doc',$fields,"id=\"$this->docid\"");
		}
	}
	function remove_doc($user,$doc_id){
		if($user==$this->composer){
			$this->delete('doc','id',"$doc_id");
			echo "Document delete successfully";
		}
	}
	function doc_print(){
		#triggers new document with javascript
		#and creat provision for print on the page.
	}
	function copy_doc(){
		#declare fresh object with the same doc id,
		#save it in the database with new doc id, and 
		#composer set to the name of the new user id.
		
	}
	function editDoc($doc_id){
		$this->retrieveDoc($doc_id);
		$fields=$this->getFields();
		
		$this->setAccess_level($fields[6]);
		$this->setnDate($fields[0]);
		$this->setComposer($fields[1]);
		$this->setDept($fields[2]);
		$this->setTitle($fields[3]);
		$this->setType($fields[4]);
		$this->setMessage($fields[5]);
		$this->setdProtected($fields[7]);
		$this->setFolder($fields[9]);
		$this->setFileLocation($fields[8]);
		$this->setDocid($fields[10]);
	}
}
?>