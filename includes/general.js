
function AjaxCalling(id,operation_type,showid,addedit){//ajax calling with prototype
	try{
		ob1=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e){
		try{
			ob1=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e2){
			ob1=false;
		}
	}
	if(!ob1 && typeof XMLHttpRequest!='undefined'){
		ob1=new XMLHttpRequest();
	}
	var url1='ajax.php?elementvalue='+id+'&operation='+operation_type+'&addedittype='+addedit;
	//alert(url1);	
	ob1.open("POST",url1,true);
	if(showid=='showdesig'){
		ob1.onreadystatechange=show_form;
	}
	else{
		ob1.onreadystatechange=show_form1;	
	}
	ob1.send(null);
}


function show_form(){
	document.getElementById('showdesig').innerHTML='Loading....';
	if(ob1.readyState==4){
		var resp=ob1.responseText;
		//alert(resp);
		document.getElementById('showdesig').innerHTML=resp;
	}
}
function show_form1(){
	document.getElementById('showdiv').innerHTML='Loading....';
	if(ob1.readyState==4){
		var resp=ob1.responseText;
		//alert(resp);
		document.getElementById('showdiv').innerHTML=resp;
	}
}
checked=false;
function checkall(frm1){
	var aa= frm1;
	if(checked == false){
		checked = true
	}
	else{
		checked = false
	}
	for (var i =0; i < aa.elements.length; i++){
		aa.elements[i].checked = checked;
	}
}


document.write('<script src="datetimepicker_css1.js" type="text/javascript" language="javascript"></script>');