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

select,option{
     text-transform: uppercase; 
}
</style>
  

  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	
	
	<?php include('left-menu.php'); ?>
	
	</td>
<td valign="top" width="83%">

<p class=" xlarge mt10px ml10px">
<span class="b " style="font-size:12px">
<i class="fa fa-list"></i> 
Manage Shipper Tariff &raquo; <span style="color:#999999"><?/* if(!empty($_REQUEST['state'])){?>
<?=ucfirst(strtolower($_REQUEST['state']))?><? }?> Employee</span></span>
*/?>


<p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="manage-shipper-tariff.php" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>


<p class="bdr0 m5px mr30px"></p>

<?php if($_SESSION['msg']!="" || !empty($_SESSION['msg'])) {?>
<div class="col-sm-4 col-sm-offset-3">
<div class="alert alert-success" role="alert" style="font-weight:bold; text-align:center;">
 <?=$_SESSION["msg"]?>
</div>
</div>
<?}
unset($_SESSION['msg']);

?>

<script>
/*$(function() {
    $("#shipper_code").autocomplete({
        source: "manage-shipper-search.php",
        
    });
});

$(function() {
    $("#tariff_client_name").autocomplete({
        source: "tariff_client_name_autocomplete.php",
        
    });
});*/
</script>

	<form id="tariff_form" name="form1" method="post" action="tariff_test_DB.php" enctype="multipart/form-data" onSubmit="return tariffValidation();">
	    <input type="hidden" name="tariff_update_id" id="tariff_update_id" value="<?=$_REQUEST['update_id']?>">
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">
      	    
<?php
$update_id=$_REQUEST['update_id'];
$sql=db_query("select * from tbl_tariff where tariff_id='$update_id' ");

$res=mysql_fetch_array($sql);

?>



<tr>

<!--<td style="width:300px;"><p class="b ml20px blue p5px">Tariff Code * </p></td>
 
<td style="width:400px;">
    <p class="p5px ml10px">
<input type="text" name="tariff_code"  id="tariff_code" value="<?=$res['tariff_code']?>" style="height:23px; width:180px;" />
</p>
</td>-->

<td style="width:300px;"><p class="b ml20px blue p5px">Tariff Type </p></td>
 
<td style="width:400px;" colspan="3">
    <p class="p5px ml10px">
<input type="radio" name="tariff_type" id="tariff_type" value="Client" checked <?php if($res['tariff_type']=="Client"){?>checked<?}?>> Client 
<input type="radio" name="tariff_type" id="tariff_type" value="Forwarder" <?php if($res['tariff_type']=="Forwarder"){?>checked<?}?>> Forwarder  
</p>
</td>


        

       
        
</tr>


<tr>

<!--<td style="width:300px;"><p class="b ml20px blue p5px">Tariff Code * </p></td>
 
<td style="width:400px;">
    <p class="p5px ml10px">
<input type="text" name="tariff_code"  id="tariff_code" value="<?=$res['tariff_code']?>" style="height:23px; width:180px;" />
</p>
</td>-->

<td style="width:300px;"><p class="b ml20px blue p5px">Shipper Code </p></td>
 
<td style="width:400px;">
    <p class="p5px ml10px">

     <select name="tariff_shipper_code" id="tariff_shipper_code" style="height:23px; width:180px;" onchange="get_name(this.value);">
            <option value="">Select Code</option>
            <?php
            $tariff_sh_code_sql=db_query("select * from tbl_shipper WHERE shipper_status = 'Active'");
            while($tariff_sh_code_res=mysql_fetch_array($tariff_sh_code_sql))
            {?>
                 <option value="<?=$tariff_sh_code_res['shipper_code']?>" <?php if($res['tariff_shipper_code']==$tariff_sh_code_res['shipper_code']){?> selected<?}?> ><?=$tariff_sh_code_res['shipper_code']?></option>
            <?}
            ?>
        </select>
</p>
</td>

<td style="width:300px;">
    <p class="b ml20px blue p5px">
        Client Name 
        </p>
        </td> 
        
<td style="width:200px;">
    <p class="p5px ml10px">
<input type="text" name="tariff_client_name" id="tariff_client_name" style="height:23px; width:180px;" value="<?=$res['tariff_client_name']?>" readonly onchange="get_details(this.value);"/>
        </p>
        </td>
       
        
</tr>


<tr id="show_details">


<td>
    <p class="b ml20px blue p5px">
        Service Tax (%) 
        </p>
        </td> 
        
<td>
    <p class="p5px ml10px">
        <input type="text" readonly name="tariff_service_tax" value="<?=$res['tariff_service_tax']?>" id="tariff_service_tax" style="height:23px; width:180px;"    />
        </p>
        </td>
        
        
<td rowspan="2"><p class="b ml20px blue p5px">Address  </p></td>
 
<td rowspan="2">
    <p class="p5px ml10px">
        <textarea name="tariff_address" readonly id="tariff_address" style="height:60px; width:400px; resize: none; text-transform:uppercase;"><?=$res['tariff_address']?></textarea>
<!--<input type="text" name="tariff_address" readonly id="tariff_address" value="<?=$res['tariff_address']?>" style="height:23px; width:400px;" />
--></p>
</td>
</tr>



<style>
 .place_position_change::placeholder { 
text-align: center; 
} 
</style>

<tr>
<!--<td><p class="b  blue ml20px p5px">Basis Rate * <br>( Zone / State / City ) </p></td> 
<td>
<p class="p5px ml10px" >
<input type="number" name="tariff_basis_zone_rate" id="tariff_basis_zone_rate" value="<?=$res['tariff_basis_zone_rate']?>" class="place_position_change" style="height:23px;width:58px;"  placeholder="Zone" onkeydown="return event.keyCode !== 69"/>
<input type="number" name="tariff_basis_state_rate" id="tariff_basis_state_rate" value="<?=$res['tariff_basis_state_rate']?>" class="place_position_change" style="height:23px;width:58px;"  placeholder="State" onkeydown="return event.keyCode !== 69"/>
<input type="number" name="tariff_basis_city_rate" id="tariff_basis_city_rate" value="<?=$res['tariff_basis_city_rate']?>" class="place_position_change" style="height:23px;width:58px;"  placeholder="City" onkeydown="return event.keyCode !== 69"/>

</p></td>-->

<td><p class="b blue p6px ml20px">Mode </p></td> 
<td>
    <p class="p5px ml10px">
<select  style="height:23px; width:180px;" name="tariff_trans_mode" id="tariff_trans_mode"  >
<option value="">Select Mode </option>
<option value="Air" <?php if($res['tariff_trans_mode']=='Air'){ ?> selected="selected" <? } ?> >Air</option>
<option value="Surface" <?php if($res['tariff_trans_mode']=='Surface'){ ?> selected="selected" <? } ?> >Surface</option>
<option value="Cargo" <?php if($res['tariff_trans_mode']=='Cargo'){ ?> selected="selected" <? } ?> >Cargo</option>
<option value="All" <?php if($res['tariff_trans_mode']=='All'){ ?> selected="selected" <? } ?> >All</option>

</select>

	</p></td>
</tr>




<tr>
<td><p class="b  blue ml20px p5px">FOV (%)  </p></td> 
<td><p class="p5px ml10px">
	<input type="number" name="tariff_fov" id="tariff_fov" value="<?=$res['tariff_fov']?>" style="height:23px; width:90px;" onkeydown="return event.keyCode !== 69" />
	OR 
	<input type="number" name="tariff_min" id="tariff_min" placeholder="Min" value="<?=$res['tariff_min']?>" style="height:23px; width:90px;" onkeydown="return event.keyCode !== 69" />
	
</p></td>

<td>
    <p class="b  blue ml20px p5px">Volumetric  </p></td> 
<td>
    <p class="p5px ml10px "><span class="b">(1 CFT=) </span>
<input type="number" name="tariff_volumetric" value="<?=$res['tariff_volumetric']?>" id="tariff_volumetric" style="height:23px; width:180px;"  onkeydown="return event.keyCode !== 69"  />

    </p>
    </td>

</tr>


<script>
$(function() {
    $("#tariff_from").autocomplete({
        source: "tariff_from_autocomplete.php",
        
    });
});



$(function() {
    $("#tariff_to").autocomplete({
        source: "tariff_from_autocomplete.php",
        
    });
});



  
</script>

<tr>
<td><p class="b  blue ml20px p5px">Basis  </p></td> 
<td colspan="3">
    <p class="p5px ml10px b">
        
   Zone rate 
   <span style="color:darkblue;">
       (All <input type="checkbox" name="all_zone" id="all_zone" value="Yes" style="position:relative; top:2px;" <?php if($res['tariff_basis_zone_all']=="Yes"){?>checked<?}?>>)
       </span>
	<input type="number" placeholder="Enter number of row(s)" name="tariff_basis_zone" id="tariff_basis_zone" value="<?=$res['tariff_basis_zone']?>" onkeyup="count_zone(this.value);" style="height:23px; width:160px;" onkeydown="return event.keyCode !== 69" />
	
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State rate 
	   <span style="color:darkblue;">
	       (All <input type="checkbox" name="all_state" id="all_state" value="Yes" style="position:relative; top:2px;" <?php if($res['tariff_basis_state_all']=="Yes"){?>checked<?}?>>)
	       </span>
	<input type="number" placeholder="Enter number of row(s)" name="tariff_basis_state" id="tariff_basis_state" value="<?=$res['tariff_basis_state']?>" onkeyup="count_state(this.value);" style="height:23px; width:160px;" onkeydown="return event.keyCode !== 69" />
	
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City rate
	  <span style="color:darkblue;">
	  (All <input type="checkbox" name="all_city" id="all_city" value="Yes" style="position:relative; top:2px;" <?php if($res['tariff_basis_city_all']=="Yes"){?>checked<?}?>>)
	  </span>
	<input type="number" placeholder="Enter number of row(s)" name="tariff_basis_city" id="tariff_basis_city" value="<?=$res['tariff_basis_city']?>" onkeyup="count_city(this.value);" style="height:23px; width:150px;" onkeydown="return event.keyCode !== 69" />
</p>
</td>
</tr>

<script>

function tariffValidation()
{
    var trf_shpr_code=document.getElementById("tariff_shipper_code").value;
    var trf_trns_mode=document.getElementById("tariff_trans_mode").value;
    var trf_fov=document.getElementById("tariff_fov").value;
    var trf_fov_min=document.getElementById("tariff_min").value;
    var trf_volumetric_cft=document.getElementById("tariff_volumetric").value;
    
if(trf_shpr_code=="")
{
     alert("Please select shipper code !");
       $("#tariff_shipper_code").focus();
     return false;
}
    
    
    if(trf_trns_mode=="")
{
     alert("Please select transport mode !");
       $("#tariff_trans_mode").focus();
     return false;
}

if(trf_fov=="")
{
     alert("Please enter FOV !");
       $("#tariff_fov").focus();
     return false;
}

if(trf_fov_min=="")
{
     alert("Please enter min FOV !");
       $("#tariff_min").focus();
     return false;
}

if(trf_volumetric_cft=="")
{
     alert("Please enter volumetric CFT !");
       $("#tariff_volumetric").focus();
     return false;
}
    

}

$(document).ready(function(){
    <?php
    if($update_id!="")
    { ?>
var get_zone_check = document.querySelector('#all_zone');
var get_state_check = document.querySelector('#all_state');
var get_city_check = document.querySelector('#all_city');
var get_zone_value = document.getElementById("tariff_basis_zone").value;
var get_state_value = document.getElementById("tariff_basis_state").value;
var get_city_value = document.getElementById("tariff_basis_city").value;

///////////////////// FETCH DATA OF ZONE WITH EDIT CONDITION START //////////////////////////////
<?php
if($res['tariff_basis_zone_all']=="Yes")
{?>
if(get_zone_check.checked)
{
 for(var i=1; i<=get_zone_value; i++)
 {
document.getElementById("zone_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("zone_from_"+i+"").style.width = "109px";
document.getElementById("zone_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("zone_to_"+i+"").style.width = "109px";            
 }    
 
}else{
var drop_down_zone_content_to="<option value=''>Select Zone</option>";
var drop_down_zone_content_from="<option value=''>Select Zone</option>";
<?php
$tariff_zone_from_sql=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
while($tariff_zone_from_res=mysql_fetch_array($tariff_zone_from_sql)){
?>
drop_down_zone_content_from+="<option value='<?=$tariff_zone_from_res[zone_name]?>'> <?=$tariff_zone_from_res[zone_name]?> </option>";
<?}?> 

<?php
$tariff_zone_to_sql=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
while($tariff_zone_to_res=mysql_fetch_array($tariff_zone_to_sql)){
?>
drop_down_zone_content_to+="<option value='<?=$tariff_zone_to_res[zone_name]?>'> <?=$tariff_zone_to_res[zone_name]?> </option>";
<?}?>

for(var j=1; j<=zone_value; j++)
{
document.getElementById("zone_from_"+j+"").innerHTML=drop_down_zone_content_from;
document.getElementById("zone_from_"+j+"").style.width = "109px";

document.getElementById("zone_to_"+j+"").innerHTML=drop_down_zone_content_to;
document.getElementById("zone_to_"+j+"").style.width = "109px";            
} 
    
}
<?}?>
///////////////////// FETCH DATA OF ZONE WITH EDIT CONDITION END //////////////////////////////





///////////////////// FETCH DATA OF STATE WITH EDIT CONDITION START //////////////////////////////
<?php
if($res['tariff_basis_state_all']=="Yes")
{?>
if(get_state_check.checked)
{
 for(var i=1; i<=get_state_value; i++)
 {
document.getElementById("state_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("state_from_"+i+"").style.width = "113px";
document.getElementById("state_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("state_to_"+i+"").style.width = "113px";            
 }    
 
}else{
var drop_down_state_content_from="<option value=''>Select State</option>";
var drop_down_state_content_to="<option value=''>Select State</option>";

<?php
$tariff_state_sql=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
while($tariff_state_res=mysql_fetch_array($tariff_state_sql)){
?>
drop_down_state_content_from+="<option value='<?=$tariff_state_res[state_name]?>'> <?=$tariff_state_res[state_name]?> </option>";
<?}?>

            <?php
            $tariff_state_sql=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
            while($tariff_state_res=mysql_fetch_array($tariff_state_sql)){
            ?>
            drop_down_state_content_to+="<option value='<?=$tariff_state_res[state_name]?>'> <?=$tariff_state_res[state_name]?> </option>";
            <?}?>

for(var j=1; j<=get_state_value; j++)
{
document.getElementById("state_from_"+j+"").innerHTML=drop_down_state_content_from;
document.getElementById("state_from_"+j+"").style.width = "113px";

document.getElementById("state_to_"+j+"").innerHTML=drop_down_state_content_to;
document.getElementById("state_to_"+j+"").style.width = "113px";            
} 
    
}
<?}?>
///////////////////// FETCH DATA OF STATE WITH EDIT CONDITION END //////////////////////////////

///////////////////// FETCH DATA OF CITY WITH EDIT CONDITION START //////////////////////////////
<?php
if($res['tariff_basis_city_all']=="Yes")
{?>
if(get_city_check.checked)
{
 for(var i=1; i<=get_city_value; i++)
 {
document.getElementById("city_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("city_from_"+i+"").style.width = "103px";
document.getElementById("city_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("city_to_"+i+"").style.width = "103px";            
 }    
 
}else{
var drop_down_city_content_from="<option value=''>Select City</option>";
var drop_down_city_content_to="<option value=''>Select City</option>";

<?php
$tariff_city_sql=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
while($tariff_city_res=mysql_fetch_array($tariff_city_sql)){
?>
drop_down_city_content_from+="<option value='<?=$tariff_city_res[city_name]?>'> <?=$tariff_city_res[city_name]?> </option>";
<?}?>

	   <?php
	   $tariff_city_sql=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
            while($tariff_city_res=mysql_fetch_array($tariff_city_sql)){
        ?>
        drop_down_city_content_to+="<option value='<?=$tariff_city_res[city_name]?>'> <?=$tariff_city_res[city_name]?> </option>";
        <?}?>

for(var j=1; j<=get_city_value; j++)
{
document.getElementById("city_from_"+j+"").innerHTML=drop_down_city_content_from;
document.getElementById("city_from_"+j+"").style.width = "103px";

document.getElementById("city_to_"+j+"").innerHTML=drop_down_city_content_to;
document.getElementById("city_to_"+j+"").style.width = "103px";            
} 
    
}
<?}?>
///////////////////// FETCH DATA OF CITY WITH EDIT CONDITION END //////////////////////////////



<?}?>
    
///////////////////// ALL ZONE CHECK BOX START //////////////////////////////
        $('#all_zone').click(function () {
            var all_zone_checkbox = document.querySelector('#all_zone');
             var zone_value = document.getElementById("tariff_basis_zone").value;
             
if(all_zone_checkbox.checked)
{//   alert("checked");
 for(var i=1; i<=zone_value; i++)
 {
document.getElementById("zone_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("zone_from_"+i+"").style.width = "109px";
document.getElementById("zone_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("zone_to_"+i+"").style.width = "109px";            
 }    
 
 }else{// alert("unchecked");
 
var drop_down_zone_content_to="<option value=''>Select Zone</option>";
var drop_down_zone_content_from="<option value=''>Select Zone</option>";
<?php
$tariff_zone_from_sql=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
while($tariff_zone_from_res=mysql_fetch_array($tariff_zone_from_sql)){
?>
drop_down_zone_content_from+="<option value='<?=$tariff_zone_from_res[zone_name]?>'> <?=$tariff_zone_from_res[zone_name]?> </option>";
<?}?> 

<?php
$tariff_zone_to_sql=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
while($tariff_zone_to_res=mysql_fetch_array($tariff_zone_to_sql)){
?>
drop_down_zone_content_to+="<option value='<?=$tariff_zone_to_res[zone_name]?>'> <?=$tariff_zone_to_res[zone_name]?> </option>";
<?}?>

for(var j=1; j<=zone_value; j++)
{
document.getElementById("zone_from_"+j+"").innerHTML=drop_down_zone_content_from;
document.getElementById("zone_from_"+j+"").style.width = "109px";

document.getElementById("zone_to_"+j+"").innerHTML=drop_down_zone_content_to;
document.getElementById("zone_to_"+j+"").style.width = "109px";            
} 
}
        });
        
     ///////////////////// ALL ZONE CHECK BOX END //////////////////////////////
        
        
///////////////////// ALL STATE CHECK BOX START //////////////////////////////
        $('#all_state').click(function () {
            var all_state_checkbox = document.querySelector('#all_state');
             var state_value = document.getElementById("tariff_basis_state").value;
             
if(all_state_checkbox.checked)
{//   alert("checked");
 for(var i=1; i<=state_value; i++)
 {
document.getElementById("state_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("state_from_"+i+"").style.width = "113px";
document.getElementById("state_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("state_to_"+i+"").style.width = "113px";            
 }    
 }else{// alert("unchecked");
 
var drop_down_state_content_from="<option value=''>Select State</option>";
var drop_down_state_content_to="<option value=''>Select State</option>";

<?php
$tariff_state_sql=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
while($tariff_state_res=mysql_fetch_array($tariff_state_sql)){
?>
drop_down_state_content_from+="<option value='<?=$tariff_state_res[state_name]?>'> <?=$tariff_state_res[state_name]?> </option>";
<?}?>

            <?php
            $tariff_state_sql=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
            while($tariff_state_res=mysql_fetch_array($tariff_state_sql)){
            ?>
            drop_down_state_content_to+="<option value='<?=$tariff_state_res[state_name]?>'> <?=$tariff_state_res[state_name]?> </option>";
            <?}?>

for(var j=1; j<=state_value; j++)
{
document.getElementById("state_from_"+j+"").innerHTML=drop_down_state_content_from;
document.getElementById("state_from_"+j+"").style.width = "113px";

document.getElementById("state_to_"+j+"").innerHTML=drop_down_state_content_to;
document.getElementById("state_to_"+j+"").style.width = "113px";            
} 
}
        });
        
     ///////////////////// ALL STATE CHECK BOX END //////////////////////////////
     
     ///////////////////// ALL CITY CHECK BOX START //////////////////////////////
        $('#all_city').click(function () {
            var all_city_checkbox = document.querySelector('#all_city');
             var city_value = document.getElementById("tariff_basis_city").value;
             
if(all_city_checkbox.checked)
{//   alert("checked");
 for(var i=1; i<=city_value; i++)
 {
document.getElementById("city_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("city_from_"+i+"").style.width = "103px";
document.getElementById("city_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("city_to_"+i+"").style.width = "103px";            
 }    
 }else{// alert("unchecked");

var drop_down_city_content_from="<option value=''>Select City</option>";
var drop_down_city_content_to="<option value=''>Select City</option>";

<?php
$tariff_city_sql=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
while($tariff_city_res=mysql_fetch_array($tariff_city_sql)){
?>
drop_down_city_content_from+="<option value='<?=$tariff_city_res[city_name]?>'> <?=$tariff_city_res[city_name]?> </option>";
<?}?>

	   <?php
	   $tariff_city_sql=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
            while($tariff_city_res=mysql_fetch_array($tariff_city_sql)){
        ?>
        drop_down_city_content_to+="<option value='<?=$tariff_city_res[city_name]?>'> <?=$tariff_city_res[city_name]?> </option>";
        <?}?>
        

for(var j=1; j<=city_value; j++)
{
document.getElementById("city_from_"+j+"").innerHTML=drop_down_city_content_from;
document.getElementById("city_from_"+j+"").style.width = "103px";

document.getElementById("city_to_"+j+"").innerHTML=drop_down_city_content_to;
document.getElementById("city_to_"+j+"").style.width = "103px";            
} 
}
        });
        
     ///////////////////// ALL CITY CHECK BOX END //////////////////////////////
        
});


</script>
<tr>
    <td>
        <p id="show">
            
        </p>
    </td>
</tr>
<script>

    function count_zone(zone_count)
{
    var zone_all_check= document.querySelector('#all_zone').checked;
   
   	var cou=parseInt(zone_count);
 if(zone_count=="" || zone_count==0){
 document.getElementById("zone_heading").style.display = "none";
 }else{
   document.getElementById("zone_heading").style.display = "block";
 }
  
 if(zone_count=="" || zone_count==0){
 document.getElementById("zone_charges_row").style.display = "none";
 document.getElementById("zone_charges_row1").style.display = "none";
 
 }else{
     document.getElementById("zone_charges_row").style.display = "block";
  document.getElementById("zone_charges_row1").style.display = "block";
  
 }
 
/*   document.getElementById("zone_row_line").style.display = "block";
 if(zone_count==""){
 document.getElementById("zone_row_line").style.display = "none";
 }*/

 


  document.getElementById("show_zone_table").innerHTML="";
 
	for(var i=1; i<=cou; i++)
	{ 
	    var z_from="zone_from_"+i;
	     var z_to="zone_to_"+i;

	    var drop_down_zone_from="<select name='"+z_from+"' id='"+z_from+"'> <option value=''>Select Zone</option>";
	    var drop_down_zone_content_from="";
	   <?php
	   $tariff_zone_from_sql=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
            while($tariff_zone_from_res=mysql_fetch_array($tariff_zone_from_sql)){
        ?>
        drop_down_zone_content_from+="<option value='<?=$tariff_zone_from_res[zone_name]?>'> <?=$tariff_zone_from_res[zone_name]?> </option>";

<?}?>
        
       drop_down_zone_from+=drop_down_zone_content_from+"</select>";
       
       
       var drop_down_zone_to="<select name='"+z_to+"' id='"+z_to+"'> <option value=''>Select Zone</option>";
	    var drop_down_zone_content_to="";
	   <?php
	   $tariff_zone_to_sql=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
            while($tariff_zone_to_res=mysql_fetch_array($tariff_zone_to_sql)){
        ?>
        drop_down_zone_content_to+="<option value='<?=$tariff_zone_to_res[zone_name]?>'> <?=$tariff_zone_to_res[zone_name]?> </option>";

<?}?>
        
       drop_down_zone_to+=drop_down_zone_content_to+"</select>";
       
         
            
          
	   
	    
		document.getElementById("show_zone_table").innerHTML+=' <tr style="border-top-style:solid; border-top-color:#284c93;"><td colspan="5"><b style="color:red;">S.N '+i+'</b></td></tr>  <tr style="border-top-style:solid; border-top-color:#284c93;">  <td><p class="b  blue ml20px p5px">From <br>'+drop_down_zone_from+'</p></td>        <td><p class="b  blue ml20px p5px">To <br>'+drop_down_zone_to+'</p></td>        <td><p class="b  blue ml20px p5px">Weight (In Grams) Upto <br><input type="number" name="zone_weight_'+i+'" id="zone_weight_'+i+'" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>        <td><p class="b  blue ml20px p5px">Rate <br><input type="number" name="zone_rate_'+i+'" id="zone_rate_'+i+'" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>    </tr> ';

if(zone_all_check==true)
{
document.getElementById("zone_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("zone_from_"+i+"").style.width = "109px";
document.getElementById("zone_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("zone_to_"+i+"").style.width = "109px";
}


	}
	




	
}


    function count_state(state_count)
{
	 var state_all_check= document.querySelector('#all_state').checked;
	var cou=parseInt(state_count);
 
 if(state_count=="" || state_count==0){
 document.getElementById("state_heading").style.display = "none";
 }else{
     document.getElementById("state_heading").style.display = "block";
 }

 if(state_count=="" || state_count==0){
 document.getElementById("state_charges_row").style.display = "none";
 document.getElementById("state_charges_row1").style.display = "none";
 
 }else{
       document.getElementById("state_charges_row").style.display = "block";
       document.getElementById("state_charges_row1").style.display = "block";
       
 }
 
/*   document.getElementById("state_row_line").style.display = "block";
 if(state_count==""){
 document.getElementById("state_row_line").style.display = "none";
 }*/


document.getElementById("show_state_table").innerHTML="";
	for(var i=1; i<=cou; i++)
	{
	     var s_from="state_from_"+i;
	     var s_to="state_to_"+i;
	    
  var drop_down_state_from="<select name='"+s_from+"' id='"+s_from+"'> <option value=''>Select State</option>";
	    var drop_down_state_content_from="";
	   <?php
	   $tariff_state_sql=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
            while($tariff_state_res=mysql_fetch_array($tariff_state_sql)){
        ?>
        drop_down_state_content_from+="<option value='<?=$tariff_state_res[state_name]?>'> <?=$tariff_state_res[state_name]?> </option>";

<?}?>
        
       drop_down_state_from+=drop_down_state_content_from+"</select>";
       
       
       
  var drop_down_state_to="<select name='"+s_to+"' id='"+s_to+"'> <option value=''>Select State</option>";
	    var drop_down_state_content_to="";
	   <?php
	   $tariff_state_sql=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
            while($tariff_state_res=mysql_fetch_array($tariff_state_sql)){
        ?>
        drop_down_state_content_to+="<option value='<?=$tariff_state_res[state_name]?>'> <?=$tariff_state_res[state_name]?> </option>";

<?}?>
        
       drop_down_state_to+=drop_down_state_content_to+"</select>";
       
       
       
       
       
		document.getElementById("show_state_table").innerHTML+='    <tr style="border-top-style:solid; border-top-color:#284c93;"><td colspan="5"><b style="color:red;">S.N '+i+'</b></td></tr>  <tr style="border-top-style:solid; border-top-color:#284c93;">  <td><p class="b  blue ml20px p5px">From <br>'+drop_down_state_from+'</p></td>        <td><p class="b  blue ml20px p5px">To <br>'+drop_down_state_to+'</p></td>        <td><p class="b  blue ml20px p5px">Weight (In Grams) Upto <br><input type="number" name="state_weight_'+i+'" id="state_weight_'+i+'" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>        <td><p class="b  blue ml20px p5px">Rate <br><input type="number" name="state_rate_'+i+'" id="state_rate_'+i+'" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>    </tr>';
if(state_all_check==true)
{
document.getElementById("state_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("state_from_"+i+"").style.width = "113px";
document.getElementById("state_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("state_to_"+i+"").style.width = "113px";

}
	    
	}
	
}


    function count_city(city_count)
{
	var city_all_check= document.querySelector('#all_city').checked;
	var cou=parseInt(city_count);
 
 if(city_count=="" || city_count==0){
 document.getElementById("city_heading").style.display = "none";
 }else{
     document.getElementById("city_heading").style.display = "block";
 }
 
 if(city_count=="" || city_count==0){
 document.getElementById("city_charges_row").style.display = "none";
 document.getElementById("city_charges_row1").style.display = "none";
 
 }else{
      document.getElementById("city_charges_row").style.display = "block";
      document.getElementById("city_charges_row1").style.display = "block";
      
 }
 
/*   document.getElementById("city_row_line").style.display = "block";
 if(city_count==""){
 document.getElementById("city_row_line").style.display = "none";
 }*/
 
document.getElementById("show_city_table").innerHTML="";
	for(var i=1; i<=cou; i++)
	{
	     var c_from="city_from_"+i;
	     var c_to="city_to_"+i;
	     
var drop_down_city_from="<select name='"+c_from+"' id='"+c_from+"'> <option value=''>Select City</option>";
	    var drop_down_city_content_from="";
	   <?php
	   $tariff_city_sql=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
            while($tariff_city_res=mysql_fetch_array($tariff_city_sql)){
        ?>
        drop_down_city_content_from+="<option value='<?=$tariff_city_res[city_name]?>'> <?=$tariff_city_res[city_name]?> </option>";

<?}?>
        
       drop_down_city_from+=drop_down_city_content_from+"</select>";
       
       
var drop_down_city_to="<select name='"+c_to+"' id='"+c_to+"'> <option value=''>Select City</option>";
	    var drop_down_city_content_to="";
	   <?php
	   $tariff_city_sql=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
            while($tariff_city_res=mysql_fetch_array($tariff_city_sql)){
        ?>
        drop_down_city_content_to+="<option value='<?=$tariff_city_res[city_name]?>'> <?=$tariff_city_res[city_name]?> </option>";

<?}?>
        
       drop_down_city_to+=drop_down_city_content_to+"</select>";
       
       
	   
		document.getElementById("show_city_table").innerHTML+='  <tr style="border-top-style:solid; border-top-color:#284c93;"><td colspan="5"><b style="color:red;">S.N '+i+'</b></td></tr>  <tr style="border-top-style:solid; border-top-color:#284c93;">  <td><p class="b  blue ml20px p5px">From <br>'+drop_down_city_from+'</p></td>        <td><p class="b  blue ml20px p5px">To <br>'+drop_down_city_to+'</p></td>        <td><p class="b  blue ml20px p5px">Weight (In Grams) Upto <br><input type="number" name="city_weight_'+i+'" id="city_weight_'+i+'" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>        <td><p class="b  blue ml20px p5px">Rate <br><input type="number" name="city_rate_'+i+'" id="city_rate_'+i+'" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>    </tr> '; 
if(city_all_check==true)
{
document.getElementById("city_from_"+i+"").innerHTML="<option>All</option>";
document.getElementById("city_from_"+i+"").style.width = "103px";
document.getElementById("city_to_"+i+"").innerHTML="<option>All</option>";
document.getElementById("city_to_"+i+"").style.width = "103px";

}
		}
	
}
</script>

<!--<tr>
<td colspan="4">
<table width="100%">
    <tr>
        <td><p class="b  blue ml20px p5px">From *<input type="text" name="tariff_from" id="tariff_from" value="<?=$res['tariff_from']?>"></p></td>
        <td><p class="b  blue ml20px p5px">To *<br><input type="text" name="tariff_to" id="tariff_to" value="<?=$res['tariff_to']?>"></p></td>
        <td><p class="b  blue ml20px p5px">Weight (In Grams) Upto <input type="number" name="tariff_weight"  value="<?=$res['tariff_weight']?>" id="tariff_weight" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>
        <td><p class="b  blue ml20px p5px">Rate <input type="number" name="tariff_per_gram"  value="<?=$res['tariff_per_gram']?>" id="tariff_per_gram" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>
</tr>


</table>
</td> 
</tr>-->






<tr>
<td colspan="4">
   
  
  <h3 style="color:black; font-weight:bold; text-align:center;<?php if($update_id!="" && $res['tariff_basis_zone']!=0){?>display:block;<?}else{?>display:none;<?}?>" id="zone_heading">Zone Rate</h3>
<!--<p class="bdr0 m5px mr30px" id="zone_row_line" style="display:none;"></p>-->
  
  <p id="zone_charges_row" class="b  blue  p5px" style="<?php if($update_id!="" && $res['tariff_basis_zone']!=0){?>display:block;<?}else{?>display:none;<?}?>">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Docket Charge <input type="number" name="zone_docket_charge" id="zone_docket_charge" value="<?=$res['zone_docket_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fuel Charge %<input type="number" name="zone_fuel_charge" id="zone_fuel_charge" value="<?=$res['zone_fuel_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Pay Charge <input type="number" name="zone_to_pay_charge" id="zone_to_pay_charge" value="<?=$res['zone_to_pay_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any Other Charge <input type="number" name="zone_other_charge" id="zone_other_charge" value="<?=$res['zone_other_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;">
  
  </p>
  <p id="zone_charges_row1" class="b  blue  p5px" style="<?php if($update_id!="" && $res['tariff_basis_zone']!=0){?>display:block;<?}else{?>display:none;<?}?>">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Handling Charge <input type="number" name="zone_handling_charge" id="zone_handling_charge" value="<?=$res['zone_handling_charge']?>" onkeydown="return event.keyCode !== 69" style="width:129px;"> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Additional Weight <input type="number" name="zone_additional_weight" id="zone_additional_weight" value="<?=$res['zone_additional_weight']?>" onkeydown="return event.keyCode !== 69" style="width:119px;"> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Additional Charge <input type="number" name="zone_additional_charge" id="zone_additional_charge" value="<?=$res['zone_additional_charge']?>" onkeydown="return event.keyCode !== 69" style="width:120px;"> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remarks <input type="text" name="zone_remarks" id="zone_remarks" value="<?=$res['zone_remarks']?>" style="width:190px;"> 
        </p>
        


<table id="show_zone_table" width="100%">
    
    
<?php //for($i=1; $i<=$res['tariff_basis_zone']; $i++){
$zoneSQL=db_query("select * from tbl_tariff_rate where tariff_id='$res[tariff_id]' and rate_type='Zone' ");



$i==0;
while($zoneRES=mysql_fetch_array($zoneSQL))
{
    $i++;
  

$z_from="zone_from_".$i;
$z_to="zone_to_".$i;
	     $select="";
	     
$drop_down_zone_from="<select name='".$z_from."' id='".$z_from."'> <option value=''>Select Zone</option>";
$drop_down_zone_content_from="";

	   $tariff_zone_sql_from=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
            while($tariff_zone_res_from=mysql_fetch_array($tariff_zone_sql_from)){
        
            if($tariff_zone_res_from['zone_name']==$zoneRES['tariff_from'])
        {
           $select="selected"; 
        }else{
            $select="";
        }
        $drop_down_zone_content_from.="<option value='$tariff_zone_res_from[zone_name]' $select> $tariff_zone_res_from[zone_name] </option>";
 

}
        
       $drop_down_zone_from.=$drop_down_zone_content_from."</select>";
    
       
       
          $select="";
$drop_down_zone_to="<select name='".$z_to."' id='".$z_to."'> <option value=''>Select Zone</option>";
$drop_down_zone_content_to="";

	   $tariff_zone_sql_to=db_query("select * from tbl_zone WHERE zone_status = 'Active'");
            while($tariff_zone_res_to=mysql_fetch_array($tariff_zone_sql_to)){
        
          if($tariff_zone_res_to['zone_name']==$zoneRES['tariff_to'])
        {
           $select="selected"; 
        }else{
            $select="";
        }
        
        $drop_down_zone_content_to.="<option value='$tariff_zone_res_to[zone_name]' $select> $tariff_zone_res_to[zone_name] </option>";
    

}
        
       $drop_down_zone_to.=$drop_down_zone_content_to."</select>";
    
   
       
 
       ?>
       


<tr style="border-top-style:solid; border-top-color:#284c93;">
<td colspan="5">
<b style="color:red;">
    S.N <?=$i?>
    </b>
</td>
</tr> 
<tr style="border-top-style:solid; border-top-color:#284c93;">
<td>
<p class="b  blue ml20px p5px">
From 
<br>
<?=$drop_down_zone_from?>
</p>
</td>  
<td>
<p class="b  blue ml20px p5px">
To 
<br>
<?=$drop_down_zone_to?>
</p>
</td>
<td>
<p class="b  blue ml20px p5px">
Weight (In Grams) Upto
<br>
<input type="number" name="zone_weight_<?=$i?>" id="zone_weight_<?=$i?>" value="<?=$zoneRES['weight_upto']?>" onkeydown="return event.keyCode !== 69" style="width:150px;">
</p>
</td> 
<td>
<p class="b  blue ml20px p5px">
Rate
<br>
<input type="number" name="zone_rate_<?=$i?>" id="zone_rate_<?=$i?>" value="<?=$zoneRES['rate']?>" onkeydown="return event.keyCode !== 69" style="width:150px;">
</p>
</td>    
</tr>

<?}?>
    
<!--   
    <tr>
        <td><p class="b  blue ml20px p5px">From *<input type="text"></p></td>
        <td><p class="b  blue ml20px p5px">To *<br><input type="text"></p></td>
        <td><p class="b  blue ml20px p5px">Weight (In Grams) Upto <input type="number" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>
        <td><p class="b  blue ml20px p5px">Rate <input type="number" onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>
        <td><p class="b  blue ml20px p5px">Docket Charge <input type="number"onkeydown="return event.keyCode !== 69" style="width:150px;"></p></td>
</tr>
-->

</table>
</td> 
</tr>

<tr>
<td colspan="4">
    
  <h3 style="color:black; font-weight:bold; text-align:center;<?php if($update_id!="" && $res['tariff_basis_state']!=0){?>display:block;<?}else{?>display:none;<?}?>" id="state_heading">State Rate</h3>
<!--<p class="bdr0 m5px mr30px" id="state_row_line" style="display:none;"></p>-->
  
  <p id="state_charges_row" class="b  blue  p5px" style="<?php if($update_id!="" && $res['tariff_basis_state']!=0){?>display:block;<?}else{?>display:none;<?}?>">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Docket Charge <input type="number" name="state_docket_charge" id="state_docket_charge" value="<?=$res['state_docket_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fuel Charge %<input type="number" name="state_fuel_charge" id="state_fuel_charge" value="<?=$res['state_fuel_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Pay Charge <input type="number" name="state_to_pay_charge" id="state_to_pay_charge" value="<?=$res['state_to_pay_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any Other Charge <input type="number" name="state_other_charge" id="state_other_charge" value="<?=$res['state_other_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;">
        </p>


  <p id="state_charges_row1" class="b  blue  p5px" style="<?php if($update_id!="" && $res['tariff_basis_state']!=0){?>display:block;<?}else{?>display:none;<?}?>">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Handling Charge <input type="number" name="state_handling_charge" id="state_handling_charge" value="<?=$res['state_handling_charge']?>" onkeydown="return event.keyCode !== 69" style="width:129px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Additional Weight <input type="number" name="state_additional_weight" id="state_additional_weight" value="<?=$res['state_additional_weight']?>" onkeydown="return event.keyCode !== 69" style="width:119px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Additional Charge <input type="number" name="state_additional_charge" id="state_additional_charge" value="<?=$res['state_additional_charge']?>" onkeydown="return event.keyCode !== 69" style="width:120px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remarks <input type="text" name="state_remarks" id="state_remarks" value="<?=$res['state_remarks']?>" style="width:190px;"> 
        </p>
      
     
  
<table id="show_state_table" width="100%">
<?php
$stateSQL=db_query("select * from tbl_tariff_rate where tariff_id='$res[tariff_id]' and rate_type='State' ");



$j==0;
while($stateRES=mysql_fetch_array($stateSQL))
{
    $j++;
  

$s_from="state_from_".$j;
$s_to="state_to_".$j;
	    $select="";
	    
$drop_down_state_from="<select name='".$s_from."' id='".$s_from."'> <option value=''>Select State</option>";
$drop_down_state_content_from="";

	   $tariff_state_sql_from=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
            while($tariff_state_res_from=mysql_fetch_array($tariff_state_sql_from)){
          if($tariff_state_res_from['state_name']==$stateRES['tariff_from'])
        {
           $select="selected"; 
        }else{
            $select="";
        }
        
        $drop_down_state_content_from.="<option value='$tariff_state_res_from[state_name]' $select> $tariff_state_res_from[state_name] </option>";
 

}
        
       $drop_down_state_from.=$drop_down_state_content_from."</select>";
    
       
       $select="";
          
$drop_down_state_to="<select name='".$s_to."' id='".$s_to."'> <option value=''>Select State</option>";
$drop_down_state_content_to="";

	   $tariff_state_sql_to=db_query("select * from tbl_state_master WHERE state_status = 'Active'");
            while($tariff_state_res_to=mysql_fetch_array($tariff_state_sql_to)){
         if($tariff_state_res_to['state_name']==$stateRES['tariff_to'])
        {
           $select="selected"; 
        }else{
            $select="";
        }
        
        $drop_down_state_content_to.="<option value='$tariff_state_res_to[state_name]' $select> $tariff_state_res_to[state_name] </option>";
    

}
        
       $drop_down_state_to.=$drop_down_state_content_to."</select>";
    
   
       
 
       ?>
       


<tr style="border-top-style:solid; border-top-color:#284c93;">
<td colspan="5">
<b style="color:red;">
    S.N <?=$j?>
    </b>
</td>
</tr> 
<tr style="border-top-style:solid; border-top-color:#284c93;">
<td>
<p class="b  blue ml20px p5px">
From 
<br>
<?=$drop_down_state_from?>
</p>
</td>  
<td>
<p class="b  blue ml20px p5px">
To 
<br>
<?=$drop_down_state_to?>
</p>
</td>
<td>
<p class="b  blue ml20px p5px">
Weight (In Grams) Upto
<br>
<input type="number" name="state_weight_<?=$j?>" id="state_weight_<?=$j?>" value="<?=$stateRES['weight_upto']?>" onkeydown="return event.keyCode !== 69" style="width:150px;">
</p>
</td> 
<td>
<p class="b  blue ml20px p5px">
Rate
<br>
<input type="number" name="state_rate_<?=$j?>" id="state_rate_<?=$j?>" value="<?=$stateRES['rate']?>" onkeydown="return event.keyCode !== 69" style="width:150px;">
</p>
</td>    
</tr>

<?}?>

</table>
</td> 
</tr>

<tr>
<td colspan="4">
    
  <h3 style="color:black; font-weight:bold; text-align:center;<?php if($update_id!="" && $res['tariff_basis_city']!=0){?>display:block;<?}else{?>display:none;<?}?>" id="city_heading">City Rate</h3>
<!--<p class="bdr0 m5px mr30px" id="city_row_line" style="display:none;"></p>-->
  
  <p id="city_charges_row" class="b  blue  p5px" style="<?php if($update_id!="" && $res['tariff_basis_city']!=0){?>display:block;<?}else{?>display:none;<?}?>">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Docket Charge <input type="number" name="city_docket_charge" id="city_docket_charge" value="<?=$res['city_docket_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fuel Charge %<input type="number" name="city_fuel_charge" id="city_fuel_charge" value="<?=$res['city_fuel_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Pay Charge <input type="number" name="city_to_pay_charge" id="city_to_pay_charge" value="<?=$res['city_to_pay_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any Other Charge <input type="number" name="city_other_charge" id="city_other_charge" value="<?=$res['city_other_charge']?>" onkeydown="return event.keyCode !== 69" style="width:140px;">
    </p>
    
    
      <p id="city_charges_row1" class="b  blue  p5px" style="<?php if($update_id!="" && $res['tariff_basis_city']!=0){?>display:block;<?}else{?>display:none;<?}?>">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Handling Charge <input type="number" name="city_handling_charge" id="city_handling_charge" value="<?=$res['city_handling_charge']?>" onkeydown="return event.keyCode !== 69" style="width:129px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Additional Weight <input type="number" name="city_additional_weight" id="city_additional_weight" value="<?=$res['city_additional_weight']?>" onkeydown="return event.keyCode !== 69" style="width:119px;"> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Additional Charge <input type="number" name="city_additional_charge" id="city_additional_charge" value="<?=$res['city_additional_charge']?>" onkeydown="return event.keyCode !== 69" style="width:120px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remarks <input type="text" name="city_remarks" id="city_remarks" value="<?=$res['city_remarks']?>" style="width:190px;"> 
        </p>
   
   
   
 
<table id="show_city_table" width="100%">
<?php
$citySQL=db_query("select * from tbl_tariff_rate where tariff_id='$res[tariff_id]' and rate_type='City' ");



$k==0;
while($cityRES=mysql_fetch_array($citySQL))
{
    $k++;
  

$c_from="city_from_".$k;
$c_to="city_to_".$k;
	    
	    $select="";
	    
$drop_down_city_from="<select name='".$c_from."' id='".$c_from."'> <option value=''>Select City</option>";
$drop_down_city_content_from="";

	   $tariff_city_sql_from=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
            while($tariff_city_res_from=mysql_fetch_array($tariff_city_sql_from)){
          if($tariff_city_res_from['city_name']==$cityRES['tariff_from'])
        {
           $select="selected"; 
        }else{
            $select="";
        }
        $drop_down_city_content_from.="<option value='$tariff_city_res_from[city_name]' $select> $tariff_city_res_from[city_name] </option>";
 

}
        
       $drop_down_city_from.=$drop_down_city_content_from."</select>";
    
       
       $select="";
          
$drop_down_city_to="<select name='".$c_to."' id='".$c_to."'> <option value=''>Select City</option>";
$drop_down_city_content_to="";

	   $tariff_city_sql_to=db_query("select * from tbl_city_master WHERE city_status = 'Active'");
            while($tariff_city_res_to=mysql_fetch_array($tariff_city_sql_to)){
        if($tariff_city_res_to['city_name']==$cityRES['tariff_to'])
        {
           $select="selected"; 
        }else{
            $select="";
        }
        $drop_down_city_content_to.="<option value='$tariff_city_res_to[city_name]' $select> $tariff_city_res_to[city_name] </option>";
    

}
        
       $drop_down_city_to.=$drop_down_city_content_to."</select>";
    
   
       
 
       ?>
       


<tr style="border-top-style:solid; border-top-color:#284c93;">
<td colspan="5">
<b style="color:red;">
    S.N <?=$k?>
    </b>
</td>
</tr> 
<tr style="border-top-style:solid; border-top-color:#284c93;">
<td>
<p class="b  blue ml20px p5px">
From 
<br>
<?=$drop_down_city_from?>
</p>
</td>  
<td>
<p class="b  blue ml20px p5px">
To 
<br>
<?=$drop_down_city_to?>
</p>
</td>
<td>
<p class="b  blue ml20px p5px">
Weight (In Grams) Upto
<br>
<input type="number" name="city_weight_<?=$k?>" id="city_weight_<?=$k?>" value="<?=$cityRES['weight_upto']?>" onkeydown="return event.keyCode !== 69" style="width:150px;">
</p>
</td> 
<td>
<p class="b  blue ml20px p5px">
Rate
<br>
<input type="number" name="city_rate_<?=$k?>" id="city_rate_<?=$k?>" value="<?=$cityRES['rate']?>" onkeydown="return event.keyCode !== 69" style="width:150px;">
</p>
</td>    
</tr>

<?}?>


</table>
</td> 
</tr>


<script>
    function get_name(sh_code)
{
$.ajax({
type: "POST",
url: "get_tariff_name.php",
data: {sh_code:sh_code},
cache: false,
success: function(result){
if(result!="")
{
document.getElementById('tariff_client_name').value=result;
get_details(result);
}
}
});
}


    function get_details(sh_name)
{
$.ajax({
type: "POST",
url: "get_tariff_details.php",
data: {sh_name:sh_name},
cache: false,
success: function(result){

document.getElementById('show_details').innerHTML=result;

}
});


}
    
    
    

   $(document).ready(function(){
       $('#tariff_shipper_code').change(function(){
        var tariff_shipper_code=$('#tariff_shipper_code').val();
      
    

        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{tariff_shipper_code:tariff_shipper_code, type:"TARIFF"},
            success:function(data){
       
                if(data!=""){
                     var con_value="";
                    con_value=confirm(" This shipper is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="manage-shipper-tariff.php?update_id="+data;
                    }else{
                    $('#tariff_submit').attr("disabled","disabled");
                    $('#tariff_submit').css({"cursor":"no-drop"});
                    }
             
                }else if(data==""){
                     $('#tariff_submit').attr("disabled",false);
                     $('#tariff_submit').css({"cursor":"pointer"});
                    
                }
            }
        });
    });
   });
   
 
</script>


<?/*
<style>
    .td_align{
        text-align:center;
    }
</style>
<tr>
    <td colspan="4">
        <table cellpadding="0" cellspac bing="0" width="100%" >
            <tr>
                <td><p class="b  blue td_align">From</p></td>
                <td><p class="b  blue td_align">To</p></td>
                <td><p class="b  blue td_align">Weight (In Grams)</p></td>
                <td><p class="b  blue td_align">Rate Per 1000 grams</p></td>
                <td><p class="b  blue td_align">Docket Charge</p></td>
                <td><p class="b  blue td_align">Fuel Charge</p></td>
                <td><p class="b  blue td_align">To Pay Charge</p></td>
                <td><p class="b  blue td_align">Any Other Charge</p></td>
                <td><p class="b  blue td_align">Handling Charge</p></td>
                <td><p class="b  blue td_align">Remarks</p></td>
           </tr>
           
<tr>
    
<script>
$(function() {
    $("#tariff_from").autocomplete({
        source: "tariff_from_autocomplete.php",
        
    });
});



$(function() {
    $("#tariff_to").autocomplete({
        source: "tariff_from_autocomplete.php",
        
    });
});

</script>

<td><p class="b td_align">
<input type="text" style="width:120px;" name="tariff_from" id="tariff_from" value="<?=$res['tariff_from']?>">
</p></td>

<td><p class="b td_align">
<input type="text" style="width:120px;" name="tariff_to" id="tariff_to" value="<?=$res['tariff_to']?>">
</p></td>

<td><p class="b td_align">
<input type="number" style="width:80px;" onkeydown="return event.keyCode !== 69">
</p></td>

<td><p class="b td_align">
<input type="number" style="width:80px;" onkeydown="return event.keyCode !== 69">
</p></td>

<td><p class="b td_align">
<input type="number" style="width:80px;" onkeydown="return event.keyCode !== 69">
</p></td>

<td><p class="b td_align">
<input type="number" style="width:80px;" onkeydown="return event.keyCode !== 69">
</p></td>

<td><p class="b td_align">
<input type="number" style="width:80px;" onkeydown="return event.keyCode !== 69">
</p></td>

<td><p class="b td_align">
<input type="number" style="width:80px;" onkeydown="return event.keyCode !== 69">
</p></td>

<td><p class="b td_align">
<input type="number" style="width:80px;" onkeydown="return event.keyCode !== 69">
</p></td>

<td><p class="b td_align">
<input type="text" style="width:100px;">
</p></td>


</tr>
        </table>
        
    </td>
</tr>

*/?>

<tr>

<td colspan="4" style="text-align: center;">
	<p style="box-sizing: border-box; padding:20px;">
<input type="submit" name="tariff_submit" id="tariff_submit" <?if($update_id!=""){?>value="Update"<?}else{?>value="Save"<?}?>  style="padding:5px; font-weight:bold;">
</p>
</td>
</tr>
<tr>

</table>
</form>

<script>
   $(document).ready(function(){
/*$("#tariff_submit").click(function(){
    
var tariff_shipper_code = $("#tariff_shipper_code").val();
var tariff_client_name=$("#tariff_client_name").val();
var tariff_service_tax=$("#tariff_service_tax").val();
var tariff_address=$("#tariff_address").val();
var tariff_basis_zone_rate = $("#tariff_basis_zone_rate").val();
var tariff_basis_state_rate = $("#tariff_basis_state_rate").val();
var tariff_basis_city_rate = $("#tariff_basis_city_rate").val();
var tariff_trans_mode = $("#tariff_trans_mode").val();
var tariff_fov = $("#tariff_fov").val();
var tariff_volumetric = $("#tariff_volumetric").val();
var tariff_from = $("#tariff_from").val();
var tariff_to = $("#tariff_to").val();
var tariff_weight = $("#tariff_weight").val();
var tariff_per_gram = $("#tariff_per_gram").val();
var tariff_docket_charge = $("#tariff_docket_charge").val();
var tariff_fuel_charge = $("#tariff_fuel_charge").val();
var tariff_to_pay_charge = $("#tariff_to_pay_charge").val();
var tariff_other_charge = $("#tariff_other_charge").val();
var tariff_handling_charge = $("#tariff_handling_charge").val();
var tariff_remarks = $("#tariff_remarks").val();
var tariff_submit = $("#tariff_submit").val();




if(tariff_shipper_code==''){		
alert("Select Shipper Code !");
document.getElementById('tariff_shipper_code').focus();
return false;
}	
if(tariff_client_name==''){		
alert("Select Client Name !");
document.getElementById('tariff_client_name').focus();
return false;
}
if(tariff_basis_zone_rate=='' && tariff_basis_state_rate=='' && tariff_basis_city_rate=='' ){		
alert("Enter Any Basis Rate !");
document.getElementById('tariff_basis_zone_rate').focus();
return false;
}	
if(tariff_trans_mode==''){		
alert("Select Mode !");
document.getElementById('tariff_trans_mode').focus();
return false;
}	


if(tariff_fov==''){		
alert("Enter FOV !");
document.getElementById('tariff_fov').focus();
return false;
}	


if(tariff_volumetric==''){		
alert("Enter Volumetric !");
document.getElementById('tariff_volumetric').focus();
return false;
}


if(tariff_from==''){		
alert("Enter Tariff From !");
document.getElementById('tariff_from').focus();
return false;
}	

if(tariff_to==''){		
alert("Enter Tariff To !");
document.getElementById('tariff_to').focus();
return false;
}	


$.ajax({
type: "POST",
url: "shipper_tariff_db_file.php",
data: {tariff_shipper_code:tariff_shipper_code,tariff_client_name:tariff_client_name,tariff_service_tax:tariff_service_tax, tariff_address:tariff_address, tariff_basis_zone_rate:tariff_basis_zone_rate, tariff_basis_state_rate:tariff_basis_state_rate, tariff_basis_city_rate:tariff_basis_city_rate, tariff_trans_mode:tariff_trans_mode, tariff_fov:tariff_fov, tariff_volumetric:tariff_volumetric, tariff_from:tariff_from, tariff_to:tariff_to, tariff_weight:tariff_weight, tariff_per_gram:tariff_per_gram, tariff_docket_charge:tariff_docket_charge, tariff_fuel_charge:tariff_fuel_charge, tariff_to_pay_charge:tariff_to_pay_charge, tariff_other_charge:tariff_other_charge, tariff_handling_charge:tariff_handling_charge, tariff_remarks:tariff_remarks, tariff_submit:tariff_submit, update_id:"<?=$update_id?>"},
cache: false,
success: function(result){
<?php 
$msg="";

if($update_id!="")
{  
$msg="Shipper Tariff Details Updated Successfully";
}
else
{
	$msg="Shipper Tariff Details Submitted Successfully";
}
?>
alert("<?=$msg?>");
window.location.href = "manage-shipper-tariff.php";
}
});


return false;
});*/
});

</script>




<?php
$cond="";

if(isset($_REQUEST['submitFormSearch']))
{
$search_shipper_code=$_REQUEST['search_shipper_code'];

if($search_shipper_code!="")
{
	$cond="and tariff_shipper_code='$search_shipper_code' ";
}

}

?>

<p class="bdr0 m5px mr30px"></p>
<br>

<form method="post" action="">
<center>



<input type="text"  id="search_shipper_code" name="search_shipper_code" placeholder="Enter Shipper Code" style='padding:3px;'/>



<input type="submit" name="submitFormSearch" value="Search" style="padding:3px;">
<br>
<?php if($search_shipper_code!=""){?><a href="manage-shipper-tariff.php" style="color:blue; font-weight:bold;">View All</a><?}?>
</center>
</form>
<br>



<!--<a href="add-shipper.php" class="btn btn-default pull-right mr15px font-black"><i class="fa fa-plus"></i> Add Shipper</a>
-->


<span>
<?/*<input type="submit" value="Search" name="Search" class="bbnt3 vam"  style="height:34px;width:70px;font-size:12px"/>*/?></span>

	  
	  


</p>
<p class="bdr0 m5px mr30px"></p>


	
	
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
			db_query("update tbl_tariff set tariff_status='Active' where tariff_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_deactivate'])) {
			db_query("update tbl_tariff set tariff_status='Inactive' where tariff_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_delete'])) {
			db_query("delete from tbl_tariff where tariff_id in ($str_ids)");
			db_query("delete from tbl_tariff_rate where tariff_id in ($str_ids)");
			
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

<!--<a href="../html-link.htm" target="popup" onclick="window.open('../html-link.htm','name','width=1000,height=800')">
</a>-->

	</p></td>
		<td style="width:9px;"><p class="b p10px blue ac">Tariff Type</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Client Name</p></td>
	<td  style="width:100px;"><p class="b p10px blue ac">FOV (%)</p></td>

	<td  style="width:15px;"><p class="b p10px blue ac">Volumetric</p></td>
		<td  style="width:15px;"><p class="b p10px blue ac">Mode</p></td>
			<td  style="width:15px;"><p class="b p10px blue ac">Tax (%)</p></td>
			
	<td  style="width:15px;"><p class="b p10px blue ac">Tariff Status</p></td>


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
$sql=db_query("select * from tbl_tariff where 1 $cond order by tariff_id asc");

while($res1=mysql_fetch_array($sql))
{

	

?>
<tr>
<!-- 	<a style="text-decoration: none; color: #bf0000;" href='javascript:;' onClick="window.open('document-detail.php?auth_id=<?=$authors_id?>','_blank','toolbar=no,menubar=no,scrollbars=yes,resizable=1,height=400,width=750');"><strong>Document details</strong></a>
	 -->
<?php 
$st_clr="";
if($res1['tariff_status']=="Active")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>



		<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><strong><?=$res1['tariff_shipper_code']?></strong></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res1['tariff_type']?></p></td>
		
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res1['tariff_client_name']?></p></td>
		
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res1['tariff_fov']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res1['tariff_volumetric']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res1['tariff_trans_mode']?></p></td>
		
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res1['tariff_service_tax']?></p></td>
	
		
	<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase; font-weight:bold; color:<?=$st_clr?>"><?=$res1['tariff_status']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac">
<a href="manage-shipper-tariff.php?update_id=<?=$res1['tariff_id']?>" style="color:blue; font-weight:bold; text-transform:uppercase;">Edit</a> 
<!--/ <a href="manage-shipper.php?id=<?=$res1['tariff_id']?>" style="color:red; font-weight:bold;">Delete</a>-->
</p></td>
	<td style="width:100px;"><p class=" p10px  ac">
<input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res1['tariff_id']?>">
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
   <input type="submit" class="func_btn_style" style="background-color:#008CBA;" name="checkbox_deactivate" value="Deactivate" onClick="return select_chk()">
  <input type="submit" class="func_btn_style" style="background-color:#f44336;" name="checkbox_delete" value="Delete">  
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