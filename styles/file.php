<?php
require("../classes/table.php");
$process=new table;
#$cli=new client;

if($_REQUEST['fxn']=='deleteUser'){

	$id=explode("|",$_REQUEST['id']);
	
	for($i=1;$i<=count($id);$i++){
		$criteria=array("id");
		$ok=$id[$i-1];
		#echo "$ok<br> {$_REQUEST['id']}";
		$ok=array("$ok");
		$process->delete('user',$criteria,$ok);
		
	}
	
}elseif($_REQUEST['fxn']=='deleteFolder'){

	$id=explode("|",$_REQUEST['id']);
	
	for($i=1;$i<=count($id);$i++){
		$criteria=array("sn");
		$ok=$id[$i-1];
		#echo "$ok<br> {$_REQUEST['id']}";
		$ok=array("$ok");
		$process->delete('folder',$criteria,$ok);
		
	}
	
}elseif($_REQUEST['fxn']=='deleteDoc'){
#echo "entered</b>";
	$id=explode("|",$_REQUEST['id']);
	
	for($i=1;$i<=count($id);$i++){
		$criteria=array("id");
		$ok=$id[$i-1];
		#echo "$ok<br> {$_REQUEST['id']}";
		$ok=array("$ok");
		$process->delete('doc',$criteria,$ok);
		
	}
	
}


?>