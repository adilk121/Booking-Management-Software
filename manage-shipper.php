<?php include('header.php'); ?>
<!--<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="date/jquery-ui.css">
<script src="date/jquery-1.9.1.js"></script>
<script src="date/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#0000CC;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFFFF;
}
#country{
	padding:3px;
	border:1px #CCC solid;
	font-size:17px;
}
.suggestionsBox {
	position: absolute;
	left: 575px;
	top:140px;
	margin: 26px 0px 0px 0px;
	width: 355px;
	padding:0px;
	background-color: #EBEBEB;
	border-top: 3px solid #0099FF;
	color: #000033;
	z-index:902;
	border-radius:8px;
	padding-left:3px;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.uls{
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
	color:#333333;	
	font-weight:500;
	font-size:14px;
}

.lis {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
	color:#333333;	
	font-weight:500;
	font-size:14px;
}

.uls :hover {
    list-style:none;
	background-color: #0099FF;
	color:#000;
}
.lis:hover {
    list-style:none;
	background-color: #0099FF;
	color:#000;
}

uls {
     list-style:none;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(images/loader.gif);
background-position:right;
background-repeat:no-repeat;
}

.suggest {
	position:relative;
}





.show_info{
    position: absolute;
	margin: 0px 10px 0px 0px;
	right:200px;
	width: 220px;
	height:100px;
	padding:5px;
	padding-top:15px;
	background-color: #CCCCCC;
	color: #FFFFFF;
	border:ridge;
	border-color:#FFFFFF;
	border-radius:5px;
	
}


</style>










<!-- TO SELECT MULTIPLE CHECKBOX -->



  
  
<style>
 input:not([type]), input[type="text"]
{
  text-transform: uppercase; 
}
</style>
  

  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	
	
	<?php include('left-menu.php'); ?>
	
	</td>
<form name="frm_sr" action="" enctype="multipart/form-data" method="post">
<td valign="top" width="83%">

<p class=" xlarge mt10px ml10px">
<span class="b " style="font-size:12px">
<i class="fa fa-list"></i> 
Manage Shipper &raquo; <span style="color:#999999"><?/* if(!empty($_REQUEST['state'])){?>
<?=ucfirst(strtolower($_REQUEST['state']))?><? }?> Employee</span></span>
*/?>
<p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="manage-shipper.php" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>


<p class="bdr0 m5px mr30px"></p>

<script>
$(function() {
    $("#shipper_code").autocomplete({
        source: "manage-shipper-search.php",
        
    });
});
</script>

	<form id="shipper_form" name="form1" method="post" action="">
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">
<?php
$update_id=$_REQUEST['update_id'];
$sql=db_query("select * from tbl_shipper where shipper_id='$update_id' ");

$res=mysql_fetch_array($sql);

?>



<tr>

<td  style="width:180px;"><p class="b ml20px blue p5px">Shipper Code * </p></td>
 
<td colspan="3" style="width:190px;"><p class="p5px ml10px">
<input type="text" name="shipper_code" id="shipper_code" value="<?=$res['shipper_code']?>" <?php if($res['shipper_code']!=""){?> readonly <?}?>  style="height:23px; width:180px;"    /></p></td>

</tr>



<tr>

<td  style="width:180px;"><p class="b ml20px blue p5px">Company Name * </p></td>
 
<td style="width:190px;">
    <p class="p5px ml10px">
<input type="text" name="shipper_company_name"  id="shipper_company_name" value="<?=$res['shipper_company_name']?>" style="height:23px; width:180px;" />
</p>
</td>

<td width="150" style="width:180px;">
    <p class="b ml20px blue p5px">
        Contact Person Name *  
        </p>
        </td> 
        
<td style="width:190px;">
    <p class="p5px ml10px">
        <input type="text" name="shipper_name" value="<?=$res['shipper_name']?>" id="shipper_name" style="height:23px; width:180px;"    />
        </p>
        </td>
</tr>


<tr>
<td style="width:340px;" ><p class="b  blue ml20px p5px">Street * </p></td> 
<td style="width:190px;">
<p class="p5px ml10px" >
<input type="text" name="shipper_street" id="shipper_street" value="<?=$res['shipper_street']?>" style="height:23px;width:180px;"  /></p></td>

<td width="148"><p class="b blue p6px ml20px">City * </p></td> 
<td width="739"><p class="p5px ml10px">
<!--	<input type="text" name="shipper_city" id="shipper_city" value="<?=$res['shipper_city']?>" style="height:23px; width:180px;"  />-->
	<select style="height:23px; width:180px; " name="select_city" id="select_city" onchange="GetState(this.value)" >
	    <option value="">Select City</option>
	          <?php
        $sql_city=db_query("select * from tbl_city_master where 1 and city_status='Active' order by city_id");
        while($city_res=mysql_fetch_array($sql_city))
        {
       ?>
     
	    <option style="text-transform:uppercase;" value="<?=$city_res['city_name']?>" <?php if($res['shipper_city']==$city_res['city_name']){?>selected<?}?>><?=$city_res['city_name']?></option>
	    <?}?>
</select>
	
	</p></td>
</tr>


<tr>
<td  style="width:300px;"><p class="b  blue ml20px p5px">Distict </p></td> 
<td style="width:190px;"><p class="p5px ml10px">
	<input type="text" name="shipper_distict" id="shipper_distict" value="<?=$res['shipper_distict']?>" style="height:23px; width:180px;"  />
</p></td>
<td style="width:400px;"><p class="b  blue ml20px p5px">State * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
   <!-- <input type="text" readonly name="shipper_state" value="<?=$res['shipper_state']?>" id="shipper_state" style="height:23px; width:180px;"    />-->
    
    <span id="showing_state">
    <select style="height:23px; width:180px; " name="shipper_state" id="shipper_state">
	    <option value="">Select State</option>
	          <?php
        $sql_state=db_query("select * from tbl_state_master where 1 and state_status='Active' order by state_id");
        while($state_res=mysql_fetch_array($sql_state))
        {
       ?>
	    <option style="text-transform:uppercase;" value="<?=$state_res['state_name']?>" <?php if($res['shipper_state']==$state_res['state_name']){?>selected<?}?>><?=$state_res['state_name']?></option>
	    <?}?>
</select>
</span>
    </p>
    </td>

</tr>

<tr>
<td width="148"><p class="b blue p6px ml20px">Email * </p></td> 
<td width="739"><p class="p5px ml10px"><input type="text" name="shipper_email" id="shipper_email" value="<?=$res['shipper_email']?>" style="height:23px; width:180px;" /></p></td>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Mobile No. *  </p></td> 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" maxlength="10" name="shipper_mobile" value="<?=$res['shipper_mobile']?>" id="shipper_mobile" style="height:23px; width:180px;"    /></p></td>
</tr>
<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">PIN * </p></td> 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="shipper_pin" id="shipper_pin" value="<?=$res['shipper_pin']?>" style="height:23px; width:180px;"  /></p></td>
<td width="148"><p class="b blue p6px ml20px">GST Applicable <br>
<?php if($res['shipper_gst_applicable']=="Yes"){?>
( Yes <input type="radio" name="gst_applicable" id="gst_applicable" value="Yes"checked onclick="checkGSTapplicable();">
No <input type="radio" name="gst_applicable" id="gst_applicable" value="No" onclick="checkGSTapplicable();"> ) 
<?}else if($res['shipper_gst_applicable']=="No"){?>
( Yes <input type="radio" name="gst_applicable" id="gst_applicable" value="Yes" onclick="checkGSTapplicable();">
No <input type="radio" name="gst_applicable" id="gst_applicable" value="No" checked onclick="checkGSTapplicable();"> ) 
<?}else{?>
( Yes <input type="radio" name="gst_applicable" id="gst_applicable" value="Yes" checked onclick="checkGSTapplicable();">
No <input type="radio" name="gst_applicable" id="gst_applicable" value="No"  onclick="checkGSTapplicable();"> ) 
<?}?>

</p></td>
<td width="739">
    <p class="p5px ml10px">
<?php if($res['shipper_gst_applicable']=="Yes"){?>
<input type="text" name="shipper_gst" id="shipper_gst" placeholder="GST Number" value="<?=$res['shipper_gst']?>"   style="height:23px; width:180px;"  />
<input type="text" name="shipper_gst_rate" id="shipper_gst_rate" placeholder="GST Rate %" value="<?=$res['shipper_gst_rate']?>"  style="height:23px; width:180px;"  />
<?}else if($res['shipper_gst_applicable']=="No"){?>
<input type="text" name="shipper_gst" id="shipper_gst" placeholder="GST Number" value="<?=$res['shipper_gst']?>" disabled  style="height:23px; width:180px;"  />
<input type="text" name="shipper_gst_rate" id="shipper_gst_rate" placeholder="GST Rate %" value="<?=$res['shipper_gst_rate']?>" disabled style="height:23px; width:180px;"  />
<?}else{?>
        <input type="text" name="shipper_gst" id="shipper_gst" placeholder="GST Number"  value="<?=$res['shipper_gst']?>"   style="height:23px; width:180px;"  />
        <input type="text" name="shipper_gst_rate" id="shipper_gst_rate" placeholder="GST Rate %"  value="<?=$res['shipper_gst_rate']?>"  style="height:23px; width:180px;"  />
<?}?>
        </p>
        </td>
</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Contract Period From  </p></td> 
<td style="width:190px;"><p class="p5px ml10px">
    <input type="date" name="contract_from_date" id="contract_from_date" value="<?=$res['contract_from_date']?>" style="height:23px; width:180px;"  />
    </p></td>
<td width="148"><p class="b blue p6px ml20px">Contract Period To  </p></td>
<td width="739"><p class="p5px ml10px">
    <input type="date" name="contract_to_date" id="contract_to_date" value="<?=$res['contract_to_date']?>"  style="height:23px; width:180px;"  />
    </p></td>
</tr>


<td colspan="4" style="text-align: center;">
	<p style="box-sizing: border-box; padding:20px;">
<input type="submit" name="shipper_submit" id="shipper_submit" <?if($update_id!=""){?>value="Update"<?}else{?>value="Save"<?}?>  style="padding:5px; font-weight:bold;">
</p>
</td>
<tr>

</table>
</form>


<script>
function GetState(c_namee)
{
  
$.ajax({
type: "POST",
url: "get_state_in_manage_shipper.php",
data: {c_namee:c_namee},
cache: false,
success: function(result){
    //alert(result);
    document.getElementById('showing_state').innerHTML=result;
  

}
});


    
}


var gst_hide="false";
var gst_appli="Yes";

function checkGSTapplicable()
{
    var show=document.getElementById('gst_applicable');
    //alert(show.checked);
    if(show.checked)
    {
       // alert("show shipper_gst_applicable");
         $('#shipper_gst').attr("disabled",false);
         $('#shipper_gst_rate').attr("disabled",false);
         
       
         gst_hide="false";
         gst_appli="Yes";
    }
    else
    {
       // alert("hide");
        gst_hide="true";
     gst_appli="No";
          $('#shipper_gst').attr("disabled","disabled");
          $('#shipper_gst_rate').attr("disabled","disabled");
        $('#shipper_gst').val("");
         $('#shipper_gst_rate').val("");
         
         
    }
}

   $(document).ready(function(){
       $('#shipper_code').change(function(){
        var shipper_code=$('#shipper_code').val();
      
    

        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{shipper_code:shipper_code, type:"SHIPPER"},
            success:function(data){
           
                if(data!=""){
                     var con_value="";
                    con_value=confirm(" Shipper is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="manage-shipper.php?update_id="+data;
                    }else{
                    $('#shipper_submit').attr("disabled","disabled");
                    $('#shipper_submit').css({"cursor":"no-drop"});
                    }
                    
                /*    alert("Shipper Code is already exist !");
                    
                    $('#shipper_submit').attr("disabled","disabled");
                    $('#shipper_submit').css({"cursor":"no-drop"});
                }else{
                    $('#shipper_submit').attr("disabled",false);
                    $('#shipper_submit').css({"cursor":"pointer"});*/
                }else if(data=="")
                {
                    $('#shipper_submit').attr("disabled",false);
                    $('#shipper_submit').css({"cursor":"pointer"});
                }
            }
        });
    });
   });
</script>

<script>
/*   $(document).ready(function(){
$("#select_city").change(function(){
var city_value = $("#select_city").val();
var type="Shipper";


// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "select-city-ajax.php",
data: {city_id:city_value,type:type},
cache: false,
success: function(result){
  //  alert(result);
   $('#shipper_state').val(result);

}
});

});

});*/
    
</script>

<script>
$(document).ready(function(){
$("#shipper_submit").click(function(){
var name = $("#shipper_name").val();
var company_name=$("#shipper_company_name").val();
var code = $("#shipper_code").val();
var street = $("#shipper_street").val();
var city = $("#select_city").val();
var distict = $("#shipper_distict").val();
var state = $("#shipper_state").val();
var email = $("#shipper_email").val();
var mobile = $("#shipper_mobile").val();
var pin = $("#shipper_pin").val();
var gst = $("#shipper_gst").val();
var gst_rate = $("#shipper_gst_rate").val();

var from_date = $("#contract_from_date").val();
var to_date = $("#contract_to_date").val();
var sub = $("#shipper_submit").val();
var gst_applicable = gst_appli;




if(code==''){		
alert("Enter Shipper Code !");
document.getElementById('shipper_code').focus();
return false;
}	

if(company_name==''){		
alert("Enter Company Name !");
document.getElementById('shipper_company_name').focus();
return false;
}

        

if(name==''){		
alert("Enter Name !");
document.getElementById('shipper_name').focus();
return false;
}	
if (!name.match(/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/)){
alert("Please enter only alphabets !");
document.getElementById('shipper_name').value='';
document.getElementById('shipper_name').focus();
return false;
}



if(street==''){		
alert("Enter Street !");
document.getElementById('shipper_street').focus();
return false;
}	


if(city==''){		
alert("Select City !");
document.getElementById('select_city').focus();
return false;
}	

/*if(distict==''){		
alert("Enter Distict !");
document.getElementById('shipper_distict').focus();
return false;
}*/	
if(state==''){		
alert("Select State !");
document.getElementById('shipper_state').focus();
return false;
}	


var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email=='')
  {
	  alert('Enter Email Id');
	  document.getElementById('shipper_email').focus();
	  return false;
  }else if(!email.match(mailformat)){
alert("You have entered an invalid email address!");
document.getElementById('shipper_email').focus();
return false;
}



var mobno=document.getElementById('shipper_mobile').value;
if(document.getElementById('shipper_mobile').value==0){
	alert("Enter your mobile no.!");
	document.getElementById('shipper_mobile').focus();
	return false;
}
if(isNaN(document.getElementById('shipper_mobile').value)){
	alert("Mobile no. should be no.!");
	document.getElementById('shipper_mobile').focus();
	return false;
}
if(mobno.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('shipper_mobile').focus();
	return false;
}

if(pin==''){		
alert("Enter PIN code !");
document.getElementById('shipper_pin').focus();
return false;
}	
if(gst_hide=="false" && gst_appli=="Yes")
{
if(gst==''){		
alert("Enter GST Number !");
document.getElementById('shipper_gst').focus();
return false;
}

if(gst_rate==''){		
alert("Enter GST Rate !");
document.getElementById('shipper_gst_rate').focus();
return false;
}


}
/*if(from_date==''){		
alert("Please select contract date !");
document.getElementById('contract_from_date').focus();
return false;
}*/

/*if(to_date==''){		
alert("Please select contract expiry date !");
document.getElementById('contract_to_date').focus();
return false;
}*/




// Returns successful data submission message when the entered information is stored in database.
//var dataString = '&code1='+ code + 'name1='+ name + '&street1='+ street + '&city1='+ city+ '&distict1='+ distict + '&state1='+ state + '&email1='+ email + '&mobile1='+ mobile+ '&pin1='+ pin + '&gst1='+ gst + '&contract_from_date='+ gst + '&gst1='+ gst;
 



if(name==''||code==''||street==''||city=='' ||state==''||email==''||mobile==''||pin=='' || company_name=='')
{
alert("Please Fill All Fields");
}
else
{

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "shipper_db_file.php",
data: {name:name, company_name:company_name, code:code,street:street,city:city, distict:distict, state:state, email:email, mobile:mobile,pin:pin, gst:gst, gst_rate:gst_rate, from_date:from_date, to_date:to_date, gst_applicable:gst_applicable, sub:sub},
cache: false,
success: function(result){
<?php 
$msg="";

if($update_id!="")
{  
$msg="Shipper Details Updated Successfully";
?>
alert("<?=$msg?>");
window.location.href = "manage-shipper.php?update_id=<?=$update_id?>";
<?}
else
{
	$msg="Shipper Details Submitted Successfully";
	?>
alert("<?=$msg?>");
window.location.href = "manage-shipper.php";	
<?}
?>



}
});
}
return false;
});



});





</script>




<?php
$cond="";

if(isset($_REQUEST['submitForm']))
{
$shi_code=$_REQUEST['ship_code'];
$shi_gst=$_REQUEST['ship_gst'];
$shi_name=$_REQUEST['ship_name'];
$shi_pin=$_REQUEST['ship_pin'];

if($shi_code!="")
{
	$cond="and shipper_code='$shi_code' ";
}


if($shi_gst!="")
{
	$cond="and shipper_gst='$shi_gst' ";

}

if($shi_name!="")
{
	$cond="and shipper_name='$shi_name' ";
}

if($shi_pin!="")
{
	$cond="and shipper_pin='$shi_pin' ";
}



}

?>

<p class="bdr0 m5px mr30px"></p>
<br>

<form method="post" action="">
<center>
 <select name="search_by" onchange='CheckSearch(this.value);' style="padding:5px;"> 
    <option>Search By</option>  
<option value="shipper_code">Shipper Code</option>
<option value="shipper_gst">GSTIN</option>
<option value="shipper_name">Name</option>
<option value="shipper_pin">PIN</option>

  </select>



<input type="text"  id="ship_code" name="ship_code" placeholder="Enter Shipper Code" style='display:none; padding:3px;'/>

<input type="text"  id="ship_gst" name="ship_gst" placeholder="Enter GST Number" style='display:none; padding:3px;'/>
<input type="text"  id="ship_name" name="ship_name" placeholder="Enter Shipper Name" style='display:none; padding:3px;'/>
<input type="text"  id="ship_pin" name="ship_pin" placeholder="Enter PIN Code" style='display:none; padding:3px;'/>





<script type="text/javascript">
function CheckSearch(val){
 var ship=document.getElementById('ship_code');
 if(val=='shipper_code')
 {
   ship.style.display='inline';
 }else  
  { ship.style.display='none';}

 var gst=document.getElementById('ship_gst');
 if(val=='shipper_gst')
 {
   gst.style.display='inline';
 }else  
  { gst.style.display='none';}




 var name=document.getElementById('ship_name');
 if(val=='shipper_name')
 {
   name.style.display='inline';
 }else  
  { name.style.display='none';}

 var pin=document.getElementById('ship_pin');
 if(val=='shipper_pin')
 {
   pin.style.display='inline';
 }else  
  { pin.style.display='none';}




}


</script> 


<input type="submit" name="submitForm" value="Search" style="padding:3px;">
</center>
</form>
<br>



<!--<a href="add-shipper.php" class="btn btn-default pull-right mr15px font-black"><i class="fa fa-plus"></i> Add Shipper</a>
-->


<span>
<?/*<input type="submit" value="Search" name="Search" class="bbnt3 vam"  style="height:34px;width:70px;font-size:12px"/>*/?></span>

	  
	  


</p>
<p class="bdr0 m5px mr30px"></p>

</form>
	
	
<?php
/*
if(!empty($_REQUEST['dept'])){
$cond1="and emp_dpt='$_REQUEST[dept]'";
}


if(isset($_REQUEST['Search'])){

if(stripos($keyword,"WKN000") !== false){
$keyword=substr($keyword,6,strlen($keyword)-1);
$cond2="and emp_code='$keyword'";
}else{
$cond3="and emp_name like '%$keyword%'";
}

}*/



 	$arr_ids = $_REQUEST['select_checkbox'];
	if(is_array($arr_ids)) {
		$str_ids = implode(',', $arr_ids); 
       }
            if(isset($_REQUEST['checkbox_activate'])) {
			db_query("update tbl_shipper set shipper_status='Active' where shipper_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_deactivate'])) {
			db_query("update tbl_shipper set shipper_status='Inactive' where shipper_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_delete'])) {
			db_query("delete from tbl_shipper where shipper_id in ($str_ids)");
		}







/*$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'emp_code' : true;
$order_by2 == '' ? $order_by2 = '' : true;									  

$sql .= " order by $order_by $order_by2 ";

if(empty($cond3)){
$sql .= " limit $start, $pagesize ";
}

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}
*/


?>	
	

<? /*if($pager->total_records==0) {?>
<div class="msg" align="center" style="padding:10px;">Sorry, no records found.</div>
<? } else { ?>
<div style="padding-top:20px;">


<span style="float:left;font-weight:bold;">
<? $pager->show_displaying()?>
</span>



<span style="float:right;font-weight:bold;">Records Per Page:
<?=pagesize_dropdown('pagesize', $pagesize);?></span>

</div>
*/?>
	
<form action="" method="post" enctype="multipart/form-data" >
	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
	
	
	
	<td style="width:70px;"><p class="b p10px blue ac">Shipper Code

<a href="../html-link.htm" target="popup" onclick="window.open('../html-link.htm','name','width=1000,height=800')">
</a>

	</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">GST IN</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Name</p></td>
	<td  style="width:100px;"><p class="b p10px blue ac">Mobile / Email</p></td>

	<td  style="width:15px;"><p class="b p10px blue ac">State / PIN</p></td>
		<td  style="width:15px;"><p class="b p10px blue ac">Contract Date</p></td>
			<td  style="width:15px;"><p class="b p10px blue ac">Expiry Date</p></td>
	<td  style="width:15px;"><p class="b p10px blue ac">Shipper Status</p></td>


<td  style="width:30px;"><p class="b p10px blue ac">
Action
<!-- <input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
 --></p></td>
	<td style="width:9px;"><p class="b p10px blue ac"><input type="checkbox" name="all_check" id="all_check"></p></td>

</tr>

	 <?php


/*$id=$_REQUEST['id'];

db_query("delete from tbl_shipper where shipper_id='$id' and shipper_type='Client' ");
*/ $i = 0; 
$sql=db_query("select * from tbl_shipper where 1 and shipper_type='Client' $cond order by shipper_id desc");

while($res=mysql_fetch_array($sql))
{

	

?>
<tr>
<!-- 	<a style="text-decoration: none; color: #bf0000;" href='javascript:;' onClick="window.open('document-detail.php?auth_id=<?=$authors_id?>','_blank','toolbar=no,menubar=no,scrollbars=yes,resizable=1,height=400,width=750');"><strong>Document details</strong></a>
	 -->
<?php 
$st_clr="";
if($res['shipper_status']=="Active")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>



		<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><a style="text-decoration: none; color: #bf0000;" href='javascript:;' onClick="window.open('view-shipper-detail.php?id=<?=$res['shipper_id']?>','_blank','toolbar=no,menubar=no,scrollbars=yes,resizable=1,height=400,width=750');"><strong><?=$res['shipper_code']?></strong></a></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?php if($res['shipper_gst']==""){echo 'NA';}else{echo $res['shipper_gst'];}?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res['shipper_name']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res['shipper_mobile']?> / <?=$res['shipper_email']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res['shipper_state']?> / <?=$res['shipper_pin']?></p></td>
		
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=date("d-M-Y", strtotime($res['contract_from_date']))?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=date("d-M-Y", strtotime($res['contract_to_date']))?></p></td>
		 
	<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase; font-weight:bold; color:<?=$st_clr?>"><?=$res['shipper_status']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac">
<a href="manage-shipper.php?update_id=<?=$res['shipper_id']?>" style="color:blue; font-weight:bold; text-transform:uppercase;">Edit</a> 
<!--/ <a href="manage-shipper.php?id=<?=$res['shipper_id']?>" style="color:red; font-weight:bold;">Delete</a>-->
</p></td>
	<td style="width:100px;"><p class=" p10px  ac">
<input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['shipper_id']?>">
</p></td>
	<!-- 	<td style="width:100px;"><p class=" p10px  ac">Receiver Code & Name</p></td>
		<td style="width:100px;"><p class=" p10px  ac">Receiver Code & Name</p></td> -->

</tr>
	
<?}?>
<tr>
  <style>
        .func_btn_style{
            outline:none;
            text-align:center;
            border-radius:5px; 
            font-weight:bold; 
            width: 80px; 
            height: 40px; 
            padding: 10px; 
            box-sizing: border-box;
        }
    </style>


  <td colspan="11" align="right">
        <input type="submit" class="func_btn_style" style="background-color:#4CAF50;" name="checkbox_activate" value="Activate" onClick="return select_chk()">
   <input type="submit" class="func_btn_style" style="background-color:#f44336;" name="checkbox_deactivate" value="Deactivate" onClick="return select_chk()">
  <input type="submit" class="func_btn_style" style="background-color:#008CBA;" name="checkbox_delete" value="Delete" onClick="return select_chk()">  
    </td>

</tr>

<script>
$(document).ready(function(){
        $('#all_check').click(function () {
            $(this).parents('tr:eq(1)').find('.ck_all').attr('checked', this.checked);
        });
});
</script>

<script language="javascript">
function select_chk(){
var chks = document.getElementsByName('select_checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++){
if (chks[i].checked){
  hasChecked = true;
  break;
  }
}
if (hasChecked == false){
alert("Please Select At Least One.");
return false;
}
}
</script> 




</form>			




</table>
<?php// $pager->show_pager(); ?>	
	
	
	
	
	</td>
  </tr>
</table>

<?php include('footer.php'); ?>
</body>
</html>