function sameaddress(){
	var doc=document.form1;
	if(doc.same.checked){
		doc.emp_perm_address.value=doc.emp_address.value;
		doc.emp_perm_city.value=doc.emp_city.value;
		doc.emp_perm_state.value=doc.emp_state.value;
		doc.emp_perm_zipcode.value=doc.emp_zipcode.value;
	}
	else{
		doc.emp_perm_address.value="";
		doc.emp_perm_city.value="";
		doc.emp_perm_state.value="";
		doc.emp_perm_zipcode.value="";
	}
	
}
function calculate_salary(){
	var doc=document.salaryfrm;
	var total=0.00;
	if(isNaN(doc.sal_Basic.value)){
		alert('Please Enter Basic Salary in numberic formate');
		doc.sal_Basic.value=0;
		doc.sal_Basic.focus();
		return false;
	}
	else{
		var salbase=Number(doc.sal_Basic.value);
		total=total+salbase;
	}
	if(isNaN(doc.sal_DA.value)){
		alert('Please Enter DA in numberic formate');
		doc.sal_DA.value=0;
		doc.sal_DA.focus();
		return false;
	}
	else{
		var salda=Number(doc.sal_DA.value);
		total=total+salda;
	}
	if(isNaN(doc.sal_HRA.value)){
		alert('Please Enter HRA in numberic formate');
		doc.sal_HRA.value=0;
		doc.sal_HRA.focus();
		return false;
	}
	else{
		var salhra=Number(doc.sal_HRA.value);
		total=total+salhra;
	}
	if(isNaN(doc.sal_Allowance.value)){
		alert('Please Enter HRA in numberic formate');
		doc.sal_Allowance.value=0;
		doc.sal_Allowance.focus();
		return false;
	}
	else{
		var salallo=Number(doc.sal_Allowance.value);
		total=total+salallo;
	}
	if(isNaN(doc.sal_extra.value)){
		alert('Please Enter Extra Salary in numberic formate');
		doc.sal_extra.value=0;
		doc.sal_extra.focus();
		return false;
	}
	else{
		var salextra=Number(doc.sal_extra.value);
		total=total+salextra;
	}
	if(total){
		doc.sal_total.value=total;	
	}
}
function confirm_submit(objForm) {
	return true;
}
/*function AjaxCalling(id,operation_type,showid,addedit){//ajax calling with jquery
	valu =id;
	showid='#'+showid;
	$.get("ajax.php",{elementvalue:valu,operation:operation_type,addedittype:addedit } ,function(data)
	{
	  if(data) //if username not avaiable
	  alert(data);
	  {
		$(showid).fadeTo(200,0.1,function() //start fading the messagebox
		{ 
		  //add message and change the class of the box and start fading
		  $(showid).html(data).fadeTo(900,1);
		});		
	  }
	});
}*/
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
function callAjax(id, showid,operation_type,totalcost){
		if(id=='1'){
		 document.getElementById("totalcostc").style.display='block';
		 document.getElementById("totalcostt").style.display='block';

		}else{
			document.getElementById("totalcost").value='';
			document.getElementById("totalcostc").style.display='none';
			document.getElementById("totalcostt").style.display='none';			
		}
		if(id=='4'){
		 document.getElementById("domainc").style.display='block';
		 document.getElementById("domaint").style.display='block';
		 document.getElementById("totalcost").value='';
		 document.getElementById("totalcostc").style.display='none';
		 document.getElementById("totalcostt").style.display='none';
		}
		else{
			document.getElementById("domainc").style.display='none';
			document.getElementById("totalcost").value='';
			document.getElementById("domaint").style.display='none';
		}		
		new Ajax.Request('ajax.php?elementvalue='+id+'&operation='+operation_type,{ method:'get', onSuccess: function(transport){   var response = transport.responseText;
		document.getElementById(showid).value=response;
		document.getElementById(totalcost).value=response;
	   },onFailure: function(){ alert('Something went wrong...') }});
}
function getemployeesalary(id,operation_type,showid){
	//alert(operation_type);
	new Ajax.Request('ajax.php?elementvalue='+id+'&operation='+operation_type,{ method:'get', onSuccess: function(transport){ var response = transport.responseText;
	document.getElementById(showid).value=response;
	document.getElementById(totalcost).value=response;
},onFailure: function(){ alert('Something went wrong...') }});/**/
}



function callAjax1(id, showid,operation_type,totalcost){

if(id){
document.getElementById("servicecost").style.display='block';
if(id=='1'){
document.getElementById("totalcostc").style.display='block';
document.getElementById("totalcostt").style.display='block';

}else{
document.getElementById("totalcost").value='';
document.getElementById("totalcostc").style.display='none';
document.getElementById("totalcostt").style.display='none';
}
if(id=='4'){
document.getElementById("domainc").style.display='block';
document.getElementById("domaint").style.display='block';
document.getElementById("totalcost").value='';
document.getElementById("totalcostc").style.display='none';
document.getElementById("totalcostt").style.display='none';
}
else{
document.getElementById("domainc").style.display='none';
document.getElementById("totalcost").value='';
document.getElementById("domaint").style.display='none';
}
new Ajax.Request('ajax.php?elementvalue='+id+'&operation='+operation_type,{ method:'get', onSuccess: function(transport){ var response = transport.responseText;
document.getElementById(showid).value=response;
document.getElementById(totalcost).value=response;
},onFailure: function(){ alert('Something went wrong...') }});

}else{
document.getElementById("servicecost").style.display='none';
return false;
}
}

document.write('<script src="datetimepicker_css1.js" type="text/javascript" language="javascript"></script>');