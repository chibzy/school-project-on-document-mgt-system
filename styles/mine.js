// JavaScript Document
function removeUser(){
	var no_of_item=document.getElementById('itemno').value;
	var i;
	var item_id="";
	for(i=1;i<=no_of_item;i++){
		
		if(document.getElementById('check'+i).checked==true){
			item_id=item_id+document.getElementById('id'+i).value+'|';
		}
	}
	
	var val=confirm("Do you really want to remove selected items?");
	
	if(val==true){
		var bals=new Ajax.Updater('table','styles/file.php?id='+item_id+'&fxn=deleteUser', {method:'',parameters:''});
	}
}

function removeFolder(){
	var no_of_item=document.getElementById('itemno').value;
	var i;
	var item_id="";
	for(i=1;i<=no_of_item;i++){
		
		if(document.getElementById('chk'+i).checked==true){
			item_id=item_id+document.getElementById('n'+i).value+'|';
		}
	}
	
	var val=confirm("Do you really want to remove selected item");
	
	if(val==true){
		var bals=new Ajax.Updater('table','styles/file.php?id='+item_id+'&fxn=deleteFolder', {method:'',parameters:''});
	}
}
function removeDoc(){
	var no_of_item=document.getElementById('itemno').value;
	var i;
	var item_id="";
	for(i=1;i<=no_of_item;i++){
		
		if(document.getElementById('chk'+i).checked==true){
			item_id=item_id+document.getElementById('n'+i).value+'|';
		}
	}
	
	var val=confirm("Do you really want to remove selected document"+item_id);
	
	if(val==true){
		var bals=new Ajax.Updater('table','styles/file.php?id='+item_id+'&fxn=deleteDoc', {method:'',parameters:''});
	}
}