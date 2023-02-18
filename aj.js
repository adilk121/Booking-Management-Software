// JavaScript Document

var xmlhttp="";

if(window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();	
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
  
  
  
function suggest(str,field,divName)
{
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		document.getElementById(divName).style.display='block';
		document.getElementById(divName).innerHTML=xmlhttp.responseText;
		setTimeout(10000);
    }
  }
xmlhttp.open("GET","call.php?q="+str+"&f="+field+"&dn="+divName,true);
xmlhttp.send();
	
	
}



  
function suggest_emp(str,field,divName)
{
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		document.getElementById(divName).style.display='block';
		document.getElementById(divName).innerHTML=xmlhttp.responseText;
		setTimeout(10000);
    }
  }
xmlhttp.open("GET","call.php?emp_q="+str+"&f="+field+"&dn="+divName,true);
xmlhttp.send();
	
	
}



