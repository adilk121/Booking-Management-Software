// JavaScript Document
 var http_request = false;
 var respunce_caputre_name;
   function makePOSTRequest(url,parameters,caputre_name) {

		if(caputre_name!=undefined && caputre_name!=null){
	  	respunce_caputre_name=caputre_name;
		}
		
			  
	  if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
            http_request.overrideMimeType('text/html');
         }
      } else if (window.ActiveXObject) { // IE
         try {
		    http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }
      
		  
		  http_request.onreadystatechange = alertContents;
		  http_request.open('POST', url, true);
		  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  http_request.setRequestHeader("Content-length", parameters.length);
		  http_request.setRequestHeader("Connection", "close");
		  http_request.send(parameters);
		  return true;
		
   }

    function alertContents() {
  
		
		if (http_request.readyState == 4) {
		
			if (http_request.status == 200) {
				result=http_request.responseText;
		
				if(document.getElementById(respunce_caputre_name)!=null && respunce_caputre_name!=''){
				
				 if(result!=''){
					alert(respunce_caputre_name)
				   document.getElementById(respunce_caputre_name).style.display='none';
				   $('#'+respunce_caputre_name).fadeIn('slow');
				   document.getElementById(respunce_caputre_name).innerHTML=result;
				}
				else{
					 $('#'+respunce_caputre_name).fadeOut('slow');
					  setTimeout("document.getElementById('"+respunce_caputre_name+"').innerHTML=''",500);
					}
			respunce_caputre_name='';		
			return true;
			}
				
		} else {
		alert('There was a problem with the request.');
		}
      }
   }
   
   
  



