 // validation for e-mail
function check_validchar(pattern,str)
{
  var re = new RegExp(pattern,"g");
  var arr = re.exec(str);
  return arr;
}

function isEmailAddr(email)
{
  var regExp	=	/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
  return regExp.test(email);
}

// this function used to check valid chars
function check_validchar(pattern,str)
{
  var re = new RegExp(pattern,"g");
  var arr = re.test(str);
  return arr;
}  

function check_confirm(type){
	if(!confirm("Are you sure you want to delete this "+type+".")){
			   return false;
	 }else{
				return true;
	 }
}


function Trim(s) 
{
  // Remove leading spaces and carriage returns
  
  while ((s.substring(0,1) == ' ') || (s.substring(0,1) == '\n') || (s.substring(0,1) == '\r'))
  {
    s = s.substring(1,s.length);
  }

  // Remove trailing spaces and carriage returns

  while ((s.substring(s.length-1,s.length) == ' ') || (s.substring(s.length-1,s.length) == '\n') || (s.substring(s.length-1,s.length) == '\r'))
  {
    s = s.substring(0,s.length-1);
  }
  return s;
}


// get element value after removing leading and trailing spaces
function RemoveLTSpace(elemval)
{
     var val=elemval.replace(/\s*/,"")
     var val=val.replace(/\s*$/,"")
     return val;
}
function JSvalid_form(formnm)
{
formnm=eval(formnm);
for(var i=0;i<formnm.elements.length;i++)
     {
if(formnm.elements[i].alt){
// START CHECK FOR BLANK
var altval=formnm.elements[i].alt;
var altval1=altval.split("~DM~");
if(altval1[0]=="BC" && RemoveLTSpace(formnm.elements[i].value)=="")
          {
          formnm.elements[i].value=RemoveLTSpace(formnm.elements[i].value);
          alert("Please enter "+altval1[1]);
          formnm.elements[i].focus();
          return false;
          }
// END CHECK FOR BLANK
// VALID CHAR CHECK
if(altval1[2]!="" && formnm.elements[i].value!="")
     {
var re1 = new RegExp ('&q', 'g') ;
var pattern_val = altval1[2].replace(re1,'"') ;
var pattern="["+pattern_val+"]";
var re = new RegExp(pattern,"g");
if(re.test(formnm.elements[i].value)==true)
          {
          alert("Please avoid to enter \""+pattern_val+"\" in "+altval1[1]);
          formnm.elements[i].focus();
          formnm.elements[i].select();
          return false;
          }
     }
//START EMAIL CHECK
if(altval1[0]=="EMC")
{
if(altval1[3]!="NBC")
{
  if (formnm.elements[i].value == "")
  {
    alert("Please enter a valid email id for \"email\" field.");
    formnm.elements[i].focus();
    return (false);
  }
}
if (formnm.elements[i].value != "")
{
  if (!isEmailAddr(formnm.elements[i].value))
  {
    alert("Please enter a complete email address in the form: yourname@yourdomain.com");
    formnm.elements[i].focus();
     formnm.elements[i].select();
    return (false);
  }
  if (formnm.elements[i].value.length < 3)
  {
    alert("Please enter at least 3 characters in the \"email\" field.");
    formnm.elements[i].focus();
     formnm.elements[i].select();
    return (false);
  }
}
}
// END EMAIL CHECK
     }
}
return true;
}

// function for password match
function password_match(pass1,pass2)
{
pass1=eval(pass1);
pass2=eval(pass2);
     if(pass1.value!=pass2.value)
     {
          return false;
     }
return true;
}

// function for email match
function email_match(pass1,pass2)
{
pass1=eval(pass1);
pass2=eval(pass2);
     if(pass1.value!=pass2.value)
     {
          return false;
     }
return true;
}

// function used pop up a window

function window_popup(filename,attr1,winname)
{
     if(winname=="")
     winname="openwin";
     var popupwin=window.open(filename,winname,attr1);
}

// compare date
function date_compare(start_date,end_date)
{
//	alert(start_date);
     var stdate=start_date.split("-");
     var enddate=end_date.split("-");
     if(parseInt(stdate[0],10)>parseInt(enddate[0],10)) return false;
     if(parseInt(stdate[0],10)==parseInt(enddate[0],10) && parseInt(stdate[1],10)>parseInt(enddate[1],10)) return false;
     if(parseInt(stdate[0],10)==parseInt(enddate[0],10) && parseInt(stdate[1],10)==parseInt(enddate[1],10) && parseInt(stdate[2],10)>parseInt(enddate[2],10)) return false;

     return true;
          }
function changeBg(name){
     document.getElementById(name).style.background = '#A5A7FC';
}

function changeBg(name){
     document.getElementById(name).style.background = '#A5A7FC';
}


function NormalBg(name){
     document.getElementById(name).style.background = '#ffffff';
}
function overEffect(obj){
     obj.bgcolor = '#ffffff';
}
function validFloatDigit(key, fieldValue){
     if(key<48 || key>57){
          if(key==46)
               return fieldValue.indexOf('.')== -1 ? key : 0 ;
          else
               return 0;
     }
     else
          return key;
}

function validIntDigit(key, fieldValue){
     return  key<48 || key>57 ? 0 : key;
}

function valid_date(dd,mm,yyyy)
{
     
        if(mm==1 || mm==3 || mm==5 || mm==7 ||  mm==8 || mm==10 || mm==12)
        {
                return true;
        }
        else if((mm==4 || mm==6 || mm==9 || mm==11) && dd>30)
        {
                return false
        }
        else if(mm==2)
        {
        if(yyyy%4==0 && dd>29){return false}
        else if(yyyy%4 !=0 && dd>28){return false}
        }
        return true
}
          //function to check valid date
function check_date(from,to)
{
     var err1;
     var err2;

frmarry =     from.split('-');
toarry =     to.split('-');


HoldDate=new Date();
currdate =  (HoldDate.getMonth()+1)+ "-" + HoldDate.getDate() + "-" + HoldDate.getYear();

if (Date.parse(from) > Date.parse(currdate)) {
alert("From date must be current date or previous date !");
return false;
}

if (Date.parse(to) > Date.parse(currdate)) {
alert("To date must be current date or previous date !");
return false;
}


if(frmarry[0] == "" || frmarry[1] == "" || frmarry[2] == "")
{
     if(frmarry[0] == "") err1 = 1;
     if(frmarry[1] == "") err1 = 1;
     if(frmarry[2] == "") err1 = 1;
     if(frmarry[0] == "" && frmarry[1] == "" && frmarry[2] == "") err1 = 2;
}
else
err1 =0;

if(toarry[0] == "" || toarry[1] == "" || toarry[2] == "")
{
     if(toarry[0] == "") err2 = 3;
     if(toarry[1] == "") err2 = 3;
     if(toarry[2] == "") err2 = 3;
     if(toarry[0] == "" && toarry[1] == "" && toarry[2] == "") err2 = 4;
}
else
err2 =0;

if((err1 == 1 && err2 == 4) || (err1 == 2 && err2 == 3)||(err1 == 0 && err2 == 4) ||(err1 == 1 && err2 == 0))
{
     alert("Both dates must be entered.")
     return false;
}
else if(err1 == 1 || err2 == 3)
{
     alert ("Please select date properly");
     return false;
}

     if( err1 == '2') 
     {
          alert("Please Select From Date");
          return false;
     }

var monthval1 = month_validate(frmarry[0],frmarry[1],frmarry[2]);
if(monthval1 == '0')
return false;

var monthval2 = month_validate(toarry[0],toarry[1],toarry[2]);
if(monthval2 == '0')
return false;

if (Date.parse(from) > Date.parse(to))
{
     alert("To date must occur after the from date.");
     return false;
}
else
{
     return true;
}
}
//please do not write code in this block
// java-script Validation function ver 1.0 
     
function validateForm(formnm){     
     formnm=eval(formnm);
     for(var i=0;i<formnm.elements.length;i++){
          if(formnm.elements[i].alt){
               // START CHECK FOR BLANK
               var altval=formnm.elements[i].alt;
               var altArray=altval.split("~DM~");
               for(j=0;j<altArray.length;j++){
                    altInnerArray=altArray[j].split("~");
					switch(altInnerArray[0]){
                         case "NOJUNK" :                     // REQUEST TO CHECK JUNK CHARACTER
                                   if(junkValue(formnm.elements[i].value)){
                                        alert("Please avoid to enter \\\"<>~`!#%^*/][{}() in " + altInnerArray[1] + " field");
                                        formnm.elements[i].focus();
                                        formnm.elements[i].select();
                                        return false;
                                   }
                                   break;
                         case "NOJUNKDESC" :                     // REQUEST TO CHECK JUNK CHARACTER
                                   if(junkValueForDesc(formnm.elements[i].value)){
                                        alert("Please avoid to enter \\~`$^']<>[{} in " + altInnerArray[1] + " field");
                                        formnm.elements[i].focus();
                                        formnm.elements[i].select();
                                        return false;
                                   }
                                   break;
                         case "NOJUNKURL" :                     // REQUEST TO CHECK JUNK CHARACTER
                                   if(junkValueForURL(formnm.elements[i].value)){
                                        alert("Please avoid to enter ~`^][{}<> in " + altInnerArray[1] + " field");
                                        formnm.elements[i].focus();
                                        formnm.elements[i].select();
                                        return false;
                                   }
                                   break;          
                         case "VALIDFILE" :                     // REQUEST TO CHECK VALID FLLE NAME
                                   if(fileJunkValue(formnm.elements[i].value)){
                                        alert("File name cannot contain any of these \\\"<>'~`!@#$%^&*/ characters in" + altInnerArray[1] + " field");
                                        formnm.elements[i].focus();
                                        formnm.elements[i].select();
                                        return false;
                                   }
                                   break;
                         case "NOBLANK" :
                              if(RemoveLTSpace(formnm.elements[i].value)=="")     {
                                   //formnm.elements[i].value=RemoveLTSpace(formnm.elements[i].value);
                                   if(formnm.elements[i].type=="select-one"){
								   alert("Please select " + altInnerArray[1]);
								   }else{
								   alert("Please enter " + altInnerArray[1]);
                                   }
								   formnm.elements[i].focus();
                                   return false;
                              }
                              break;
                         case "EMAIL" :
	                        if(formnm.elements[i].value!=""){					 
                              if(!isEmailAddr(formnm.elements[i].value))     {
                                   alert("Please enter valid email in " + altInnerArray[1] + " field");
                                   formnm.elements[i].focus();
                                   return false;
                              }
							}
                              break;
                         case "MAXLENGTH" :
                              var len;
                              if(altInnerArray[2]){
                                   len=parseInt(altInnerArray[2]);
                                   if(formnm.elements[i].value.length > len && len > 0)     {
                                        alert(altInnerArray[1] + " field exceeded max limit of " + len + " letters.");
                                        formnm.elements[i].focus();
                                        return false;
                                   }
                              }
                              break;
                         case "FMAXLENGTH" :          //check file name does not exceeded max limit 
                              if(fileNameLength(formnm.elements[i].value) > parseInt(altInnerArray[2]))     {
                                   alert("File name is too big to be uploaded in " + altInnerArray[1] + " field");
                                   formnm.elements[i].focus();
                                   return false;
                              }
                              break;
                              
                         case "ONLYALPHA" :
						 if(formnm.elements[i].value!=""){	
                              if(formnm.elements[i].value.search(/\b[A-Za-z0-9-_.\s]+\b$/)==-1){
                                   alert("Please enter only  A - Z, a - z , 0 - 9, _,space,.,- characters in " + altInnerArray[1] + " field");
                                   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
                              }
						 }
                         break;
						
						 case "ALPHA" :
						 if(formnm.elements[i].value!=""){	
                              if(formnm.elements[i].value.search(/\b[A-Za-z\s]+\b$/)){
                                   alert("Please enter only  alphabatical  value in " + altInnerArray[1] + " field");
                                   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
                              }
						 }
                              break;
							  
						 case "PHONE" : 
						   if(formnm.elements[i].value!=""){
								var re2 = /^[0-9 _-]+$/;
								if (!re2.test(formnm.elements[i].value)) {
								   alert("Phone no. can be numeric or - only");
								   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
								}
						   }
                             /* if(formnm.elements[i].value.search(/\(?([0-9]{5})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)==-1)
							//   if(!format1(formnm.elements[i].value))
							   {
                                   alert("Please enter correct phone number  in" + altInnerArray[1] + " field");
                                   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
                              }
						   }*/
                              break;	  
                              
                         case "LOGINID" :
                              if(!loginid(formnm.elements[i].value)){
                                   alert("Please enter only  A - Z, a - z , 0 - 9, _ without space in " + altInnerArray[1] + " field");
                                   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
                              }
                              break;     
                              
                         case "FORMAT":
						 if(formnm.elements[i].value!=""){	
                              if(!format(formnm.elements[i].value)){
                                alert("Please enter "+ altInnerArray[1] +" with the format xxx-xx-xxxx.");
                                     formnm.elements[i].focus();
                                     formnm.elements[i].select();
                                     return false;
                              }
						 }
                              break;     
                              
                         case "OTHERFORMAT" :
						  if(formnm.elements[i].value!=""){	
                              if(!format1(formnm.elements[i].value)){
                                alert("Please enter "+ altInnerArray[1] +" with the format xxx- xxx-xxxx.");
                                     formnm.elements[i].focus();
                                     formnm.elements[i].select();
                                     return false;
                              }
						  }
                              break;     
                              
                              case "LENGTH1" :
                              if(!length1(formnm.elements[i].value)){
                                alert("Please enter 3 characters in "+ altInnerArray[1] +".");
                                     formnm.elements[i].focus();
                                     formnm.elements[i].select();
                                     return false;
                              }
                              break;     
                              
                              case "FLOAT" :
                              if(formnm.elements[i].value!=""){
								  if(!floatvalue(formnm.elements[i].value)){
									alert("Please enter a numeric value in "+ altInnerArray[1] +".");
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
                              break;
							  
							  case "AMOUNT" :
                              if(formnm.elements[i].value!=""){
								  if(!validamount(formnm.elements[i].value)){
									alert("Please enter an amount value up to 2 decimal places in "+ altInnerArray[1] +".");
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
                              break;
							  
							  case "URL":
							   if(formnm.elements[i].value!=""){
								   if(!checkValidURL1(formnm.elements[i].value)){
									alert("Please enter a valid Url in "+altInnerArray[1] +".");
									 formnm.elements[i].focus();
									 formnm.elements[i].select();
									 return false;
								   }							  
							   }
							  break;
							  
							  case "INTEGER" :
							  if(formnm.elements[i].value!=""){
								  if(formnm.elements[i].value.search(/\b\d+\b$/)==-1){
									alert("Please enter a numeric value in "+ altInnerArray[1] +".");
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
                              break;
							  
							  case "CHECKSTARTENDATE":
							    var dt_idarr		=	new Array();

								dt_idarr		=	altInnerArray[1].split("*");
								  if(formnm.elements[i-1].value>formnm.elements[i].value){
									alert("End date is not less than start date");
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
                              break;
							  
							  
							case "IMAGE":
							if(formnm.elements[i].value!=""){
								  if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[jJ][pP][gG]|.[gG][iI][fF]|.[jJ][pP][eE][gG]|.[pP][nN][gG]|.[bB][mM][pP])$/)==-1){
									alert("Please upload an image of jpg or jpeg or png \n or bmp or gif format of 60X60 in "+ altInnerArray[1] +".");
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
                              break;
							  case "CONFIRMPASSWORD":
								  if(!password_match(formnm.elements[i],formnm.elements[i-1])){
									alert("Please enter the same password in "+altInnerArray[1] +".");
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
                              break;
							  
                              
                    }
               }
          }
     }
     return true;
}

function junkValue(fieldValue){
     //return true if any junk character found in given value otherwise false
     if(fieldValue!=""){
     junkChar="\\\"<>~`!#%^*/][{}()";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}
function junkValueForDesc(fieldValue){
     //return true if any junk character found in given value otherwise false
     if(fieldValue!=""){
     junkChar="\\~`^][{}<>";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}
function junkValueForURL(fieldValue){
     //return true if any junk character found in given value otherwise false
     if(fieldValue!=""){
     junkChar="~`^][{}<>";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}

function alphaNumeric(str){
     // return false if given string does not follow variable naming scheme
     for (i=0;i<str.length;i++){
          ascCode=str.charCodeAt(i);
         if(     (ascCode>=65 && ascCode<=90) || 
               (ascCode>=97 && ascCode<=122) || 
               (ascCode>=48 && ascCode<=57) || 
               (ascCode==95) || (ascCode==32)
            );
          else{
               //alert(ascCode);
               //alert("alphe numeric returning false");
               return false;
          }
     }
     //alert("alphe numeric returning true");
     return true;
}
function loginid(str){
     // return false if given string does not follow variable naming scheme
     for (i=0;i<str.length;i++){
          ascCode=str.charCodeAt(i);
         if(     (ascCode>=65 && ascCode<=90) || 
               (ascCode>=97 && ascCode<=122) || 
               (ascCode>=48 && ascCode<=57) || 
               (ascCode==95) 
            );
          else{
               //alert("alphe numeric returning false");
               return false;
          }
     }
     //alert("alphe numeric returning true");
     return true;
}
               

function digit(fieldValue){
     //return true if any digit found in given value otherwise false
     if(fieldValue!=""){
     junkChar="1234567890";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}

function fileNameLength(filePath){
     //return the length of file name from given path
     fPath= new String(filePath);
     fileName= fPath.substring(fPath.lastIndexOf('\\')+1);
     fileName=new String(fileName);
     return fileName.length;
}

function getFileName(filePath){
     //return the length of file name from given path
     fPath= new String(filePath);
     fileName= fPath.substring(fPath.lastIndexOf('\\')+1);
     return fileName;
}

function fileJunkValue(fieldValue){
     //return true if any junk character found in given file
     //get file name from path
     fileName=getFileName(fieldValue);
     if(fileName!=""){
     junkChar="\\\"<>'~`!@#$%^&*/";
     for(i=0;i<junkChar.length;i++)
          if(fileName.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function multisub()
{
     if(document.frmCat.chkconfrm.value=="")
     {
          if(validateForm(frmCat))
               return true;
          else
               return false;     
     }
     else
     {
          if(confirm("Are you sure to delete this category"))
               return true;
          else
               return false;     
     }
}
function chkdel()
{
     document.frmCat.chkconfrm.value="xyz";
}
function chkmod()
{
     document.frmCat.chkconfrm.value="";
}

function ResetForm(objForm)
{
     for(var intCounter=0;intCounter<objForm.elements.length;intCounter++)
     {
          if(objForm.elements[intCounter].type!=null)
          {
               if(objForm.elements[intCounter].type=="text")
               {
                   if(!objForm.elements[intCounter].readOnly){
						objForm.elements[intCounter].value="";
					}
               }
               else if(objForm.elements[intCounter].type=="select-one")
               {
                    objForm.elements[intCounter].selectedIndex=0;     
               }
               else if(objForm.elements[intCounter].type=="file")
               {
                    var oObject=objForm.elements[intCounter];
                    var strValue=oObject.outerHTML;     
                    var strFieldValue=oObject.value;
                    strValue=strValue.replace(strFieldValue,"");
                    oObject.outerHTML=strValue;
               }
               else if(objForm.elements[intCounter].type=="textarea")
               {
                    objForm.elements[intCounter].value="";
               }
               else if(objForm.elements[intCounter].type=="password")
               {
                    objForm.elements[intCounter].value="";
               }
            else if(objForm.elements[intCounter].type=="checkbox")
               {
                    objForm.elements[intCounter].checked=false;
               }
            else if(objForm.elements[intCounter].type=="radio")
               {
                    objForm.elements[intCounter].checked=false;
               }  
          }
     }
}

function format(txt)
{
     if(txt.search(/\d{3}\-\d{2}\-\d{4}/)==-1)
      {
        return false;
      }
      else{
          return true;
      }
}


function format1(phone1)
{
            if(phone1.search(/\d{3}\-\d{3}\-\d{4}/)==-1)
            {
              return false;
            }
            else
            {
                  return true;
            }
     
}

function length1(phone)
{
     if(phone.search(/\d{3}/)==-1)
                              {
                                return false;
                              }
                                   else{
                                   return true;
                                   }
}

function floatvalue(txt){
 //if(txt.search(/((\d+(\.\d*)?)|((\d*\.)?\d+))$/)==-1){
  if(txt.search(/\b[0-9]*\.?([0-9]+)\b$/)==-1){	 	 
	  return false;
  }else{
	  return true;
  }
}

function validamount(txt){
 //if(txt.search(/((\d+(\.\d*)?)|((\d*\.)?\d+))$/)==-1){
	 
  if(txt.search(/\d+\.\d{2}$/)==-1){	 	 
	  return false;
  }else{
	  return true;
  }
}

function intvalue(txt,field){
 //if(txt.search(/((\d+(\.\d*)?)|((\d*\.)?\d+))$/)==-1){
  if(txt.search(/\b\d+\b$/)==-1){	 	 
	  alert("Please enter a number");
      document.getElementById(field).focus();
	  return false;
  }else{
	  return true;
  }
}


function validcheck(name,action,text)
{
	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
	
		if(chObj[i].checked){
		  result=true;
		  break;
		}
	}

	if(!result){
		 alert("Please select atleast one "+text+" to "+action+".");
		 return false;
	}else if(action=='delete'){
			 if(!confirm("Are you sure you want to delete this.")){
			   return false;
			 }else{
				document.form1.submit();
			 }
	}else{
		 document.form1.submit();
	}
}


function radioButtonValue(name){

	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
		if(chObj[i].checked){
		  txt2	=	chObj[i].value;
		  break;
		}
	}
	return txt2;
}

function checkall(objForm){
	len = objForm.elements.length;
	var i=0;
	for( i=0 ; i<len ; i++) {
		if (objForm.elements[i].type=='checkbox') {
			objForm.elements[i].checked=objForm.check_all.checked;
		}
	}
}

function cardval(s) {
// remove non-numerics
var v = "0123456789";
var w = "";
for (i=0; i < s.length; i++) {
	x = s.charAt(i);
	if (v.indexOf(x,0) != -1)
	w += x;
}
// validate number
j = w.length / 2;
if (j < 6.5 || j > 8 || j == 7) return false;
k = Math.floor(j);
m = Math.ceil(j) - k;
c = 0;
for (i=0; i<k; i++) {
a = w.charAt(i*2+m) * 2;
c += a > 9 ? Math.floor(a/10 + a%10) : a;
}
for (i=0; i<k+m; i++) c += w.charAt(i*2+1-m) * 1;
return (c%10 == 0);
}

function checkcard(card,field,payment){
	var result	=	true;
if(payment=="Visa")	{
	 if(card.length==16 && card.charAt(0)==4){
		 if(!cardval(card))
			{
			 result=false;
		  }
	 }else{
		 result=false;
	 }	 
}else if(payment=="Amex"){
	 if(card.length==15 && card.charAt(0)==3){
		 if(!cardval(card))
		  {
			 result=false;
		  }
	 }else{
		 result=false;
	 }
}else if(payment=="Discover"){
	 if(card.length==16 && card.charAt(0)==6){
		 if(!cardval(card))
		  {
			 result=false;
		  }
	 }else{
		 result= false;
	 }
}else if(payment=="MasterCard"){
	  if(card.length==16 && card.charAt(0)==5){
		 if(!cardval(card))
			{
			 result= false;
		  }
	 }else{
		 result= false;
	 }
}

	if(!result){
		 alert("Please enter the valid card number");
		 document.getElementById(field).focus();
		 return false;
	}

}

function formatNumber(num,dec,thou,pnt,curr1,curr2,n1,n2) 
{
var x = Math.round(num * Math.pow(10,dec));if (x >= 0) n1=n2='';var y = (''+Math.abs(x)).split('');var z = y.length - dec; if (z<0) z--; for(var i = z; i < 0; i++) y.unshift('0');y.splice(z, 0, pnt); while (z > 3) {z-=3; y.splice(z,0,thou);}var r = curr1+n1+y.join('')+n2+curr2;
return r;
}

function validate(frm){
	if(!validateForm(frm)){
      return false;
	}else{
         return true;	 
  	}
}

function checkValidURL1(url){
	//alert('hjdfdd');
 var expression1 = new RegExp("^(((ht|f)tp(s?))\://)?(www.|[a-zA-Z].)[a-zA-Z0-9\-\.]+\.(com|edu|gov|mil|net|org|biz|info|name|museum|us|ca|uk)(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\;\?\'\\\+&%\$#\=~_\-]+))*$", "i");
 if (!expression1.test(url)) 
  return false;
 else 
  return true;
  
}
function checkModeOfPayment(frm1){
	if(frm1.mode[0].checked==false && frm1.mode[1].checked==false && frm1.mode[2].checked==false) {
		alert("Please select Mode of Payment..");	
		frm1.mode[0].focus();
		return false;
	}

}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  return false;
}