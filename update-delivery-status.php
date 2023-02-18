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

<?php

$filter_value=$_REQUEST['list_filter'];

$update_id=$_REQUEST['update_id'];


if(isset($_REQUEST['delivery_submit']))
{
    
    if($update_id!="")
    {
if($_FILES['delivery_pod']['name']!="")
{
$DelImg=db_scalar("select delivery_pod from tbl_delivery where 1 and delivery_id='$update_id'");
@unlink("delivery_pod_images/$DelImg");
$rand=rand(100,10000);
$delivery_pod_image=$rand.$_FILES['delivery_pod']['name'];
move_uploaded_file($_FILES['delivery_pod']['tmp_name'],"delivery_pod_images/$delivery_pod_image");        
$sql_im = "update tbl_delivery set delivery_pod='$delivery_pod_image'  where delivery_id='$update_id'  ";
db_query($sql_im);
}

    
    $sql = "update tbl_delivery set        
			    delivery_date='$_POST[delivery_date]',
				delivery_time='$_POST[delivery_time]',
				delivery_receiver_name='$_POST[delivery_receiver_name]',
				delivery_receiver_phone_no='$_POST[delivery_receiver_phone_no]',
				forwarder_user_id='$_POST[forwarder_user_id]',
				delivery_reason='$_POST[delivery_reason]',
				delivery_attempt_date='$_POST[delivery_attempt_date]',
				delivery_remarks='$_POST[delivery_remarks]',
				delivery_update_date='$CURR_date' where delivery_id='$update_id'";
db_query($sql);
    ?>
    <script>
        alert("Delivery status updated successfully.");
        window.location.href="update-delivery-status.php?update_id=<?=$update_id?>&list_filter=<?=$filter_value?>";
    </script>
    <?php
        
        
    }else{
    

/*
    
  echo "<br> airway_bill_no ".$_POST['delivery_airway_bill_no'];
  echo "<br> delivery_status ".$_POST['delivery_status'];
  echo "<br> delivery_date ".$_POST['delivery_date'];
  echo "<br> delivery_time ".$_POST['delivery_time'];
  echo "<br> receiver_name ".$_POST['delivery_receiver_name'];
  echo "<br> receiver_phone_no ".$_POST['delivery_receiver_phone_no'];
//  echo "<br> POD ".$_POST['delivery_pod'];
 echo "<br> POD ". $delivery_pod;
  echo "<br> delivery_reason ".$_POST['delivery_reason'];
  echo "<br> delivery_attempt_date ".$_POST['delivery_attempt_date'];
  echo "<br> forwarder_user_id ".$_POST['forwarder_user_id'];
  echo "<br> delivery_remarks ".$_POST['delivery_remarks'];
  
  echo "<br> delivery_shipper_id ".$_POST['delivery_shipper_id'];
  echo "<br> delivery_shipper_name ".$_POST['delivery_shipper_name'];
  echo "<br> delivery_shipper_mobile ".$_POST['delivery_shipper_mobile'];
  echo "<br> delivery_shipper_address ".$_POST['delivery_shipper_address'];
  echo "<br> delivery_shipper_from ".$_POST['delivery_shipper_from'];
  echo "<br> delivery_shipper_to ".$_POST['delivery_shipper_to'];
  echo "<br> delivery_airway_bill_date ".$_POST['delivery_airway_bill_date'];*/
  
      if(!empty($_FILES["delivery_pod"]["name"]))
{
 $rand=rand(100,10000);
  $delivery_pod=$rand.$_FILES['delivery_pod']['name'];
  move_uploaded_file($_FILES['delivery_pod']['tmp_name'],"delivery_pod_images/$delivery_pod");     
}

    
    $sql = "insert into tbl_delivery set        
				delivery_airway_bill_no='$_POST[delivery_airway_bill_no]',
				delivery_shipper_id='$_POST[delivery_shipper_id]',
				delivery_shipper_name='$_POST[delivery_shipper_name]',
				delivery_shipper_mobile='$_POST[delivery_shipper_mobile]',
				delivery_shipper_address='$_POST[delivery_shipper_address]',
				delivery_shipper_from='$_POST[delivery_shipper_from]',
				delivery_shipper_to='$_POST[delivery_shipper_to]',
				delivery_airway_bill_date='$_POST[delivery_airway_bill_date]',
				delivery_status='$_POST[delivery_status]',
				delivery_date='$_POST[delivery_date]',
				delivery_time='$_POST[delivery_time]',
				delivery_receiver_name='$_POST[delivery_receiver_name]',
				delivery_receiver_phone_no='$_POST[delivery_receiver_phone_no]',
				delivery_pod='$delivery_pod',
				forwarder_user_id='$_POST[forwarder_user_id]',
				delivery_reason='$_POST[delivery_reason]',
				delivery_attempt_date='$_POST[delivery_attempt_date]',
				delivery_remarks='$_POST[delivery_remarks]',
				delivery_add_date='$CURR_date'";
db_query($sql);
    ?>
    <script>
        alert("Delivery status added successfully.");
        window.location.href="update-delivery-status.php";
    </script>
    <?php
    }
}
?>


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
<form name="frm_sr" action="" enctype="multipart/form-data" method="post"  onsubmit="return delivery_form_validation();">
<td valign="top" width="83%">

<p class=" xlarge mt10px ml10px">
<span class="b " style="font-size:12px">
<i class="fa fa-list"></i> 
Manage Status &raquo; <span style="color:#999999"><?/* if(!empty($_REQUEST['state'])){?>
<?=ucfirst(strtolower($_REQUEST['state']))?><? }?> Employee</span></span>
*/?>
<p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="update-delivery-status.php" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>


<p class="bdr0 m5px mr30px"></p>


	<form id="update_delivery_form" name="form1" method="post" action="">
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">
<?php

$sql=db_query("select * from tbl_delivery where delivery_id='$update_id' ");

$res=mysql_fetch_array($sql);

?>



<tr>

<td  style="width:19%;"><p class="b ml20px blue p5px">Airway Bill No. * </p></td>
 
<td  style="width:35%;"><p class="p5px ml10px">
    &nbsp;&nbsp;
<input type="text" name="delivery_airway_bill_no" id="delivery_airway_bill_no" value="<?=$res['delivery_airway_bill_no']?>" <?php if($res['delivery_airway_bill_no']!=""){?> readonly <?}?>  style="height:23px; width:200px;"  onchange="get_shipper_details(this.value)"  /></p></td>

<td width="150" colspan="2" style="width:50%; text-align:center;"><p class="b ml20px blue p5px">Customer Details  </p></td> 


</tr>



<tr>

<td  style="width:50%;" colspan="2">
    
   <table class="bdrAll" width="100%">
    <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Delivery Status (D/U) * <i class="fa fa-question-circle" style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="(D for Delivered and U for Undelivered)"></i>
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
    <!-- <input type="text" maxlength="1" name="delivery_status" id="delivery_status" value="D" onkeyup="show_more_details(this.value)" style="height:23px; width:200px;" />-->
<select name="delivery_status" id="delivery_status" onchange="show_more_details(this.value)" style="height:23px; width:200px; " <?php if($update_id!=""){?> disabled<?}?>>
    <option value="D" <?php if($res['delivery_status']=="D"){?> selected <?}?>>D</option>
    <option value="U" <?php if($res['delivery_status']=="U"){?> selected <?}?>>U</option>
</select>


             </p>
        </td>
    </tr>
    
  
      <tr class="hide_when_U">
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Delivery Date & Time *
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
 <input type="text" placeholder="Date" name="delivery_date"  id="delivery_date" value="<?=$res['delivery_date']?>" style="height:23px; width:200px;" />
     <input type="time" placeholder="Time" name="delivery_time"  id="delivery_time" value="<?=$res['delivery_time']?>" style="height:23px; width:150px;" />
                 </p>
        </td>
    </tr>
    
     <tr class="hide_when_U">
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Receive Name/Phone No. *
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="text" placeholder="Name" name="delivery_receiver_name"  id="delivery_receiver_name" value="<?=$res['delivery_receiver_name']?>" style="height:23px; width:200px;" />
     <input type="number" placeholder="Phone No." name="delivery_receiver_phone_no"  id="delivery_receiver_phone_no" value="<?=$res['delivery_receiver_phone_no']?>" style="height:23px; width:150px;" />
     
             </p>
        </td>
    </tr>
        <tr class="hide_when_U">
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            POD (Proof of delivery)
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
<?php if($res['delivery_pod']!=""){?> 
<img src="delivery_pod_images/<?=$res['delivery_pod']?>" style="width:100px; height:100px;"> 
<?}?>  
     <input type="file" name="delivery_pod"  id="delivery_pod" value="<?=$res['delivery_pod']?>" style="height:23px; width:200px;" />
             </p>
        </td>
    </tr>
    
    
     <tr class="show_when_U" style="display:none;">
        <td style="width:35;" >
            <p class="b ml20px blue p5px">
            Reason *
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
<p class="b ml20px blue p5px">
<select name="delivery_reason" id="delivery_reason" style="padding:5px; width:350px;">

<option value="">--- Choose Reason ---</option>
<?php
$reason_sql=db_query("select * from tbl_reason where reason_status='Active'");
while($reason_res=mysql_fetch_array($reason_sql))
{
?>
<option value="<?=$reason_res['reason_description']?>" <?php if($reason_res['reason_description']==$res['delivery_reason']){?> selected <?}?> ><?=$reason_res['reason_description']?></option>

<?}?>

</select>
</p>
             
             
             </p>
             
             
        </td>
    </tr>
    
     <tr class="show_when_U" style="display:none;">
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Attempt Date *
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
 <input type="text" name="delivery_attempt_date"  id="delivery_attempt_date" value="<?=$res['delivery_attempt_date']?>" style="height:23px; width:200px;" />
                 </p>
        </td>
    </tr>
    
    
    
    <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Forwarder *
             </p>
        </td>
          <td style="width:65%;">
            <p class="b ml20px blue p5px">
            <select name="forwarder_user_id" id="forwarder_user_id" style="padding:5px;">

                <option value="">--- Choose Forwarder ---</option>
                <?php                                                       // and user_type='Branch' 
$sql_forw=db_query("select * from tbl_parcel_user where 1 and type='Forwarder'order by user_id desc");
while($res_forw=mysql_fetch_array($sql_forw))
{
?>
                <option value="<?=$res_forw['user_id']?>" <?php if($res['forwarder_user_id']==$res_forw['user_id']){?> selected <?}?>><?=$res_forw['user_name']?></option>
<?}?>
            </select>
        </p>
        </td>
    </tr>
    
    <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Remarks 
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="text" name="delivery_remarks"  id="delivery_remarks" value="<?=$res['delivery_remarks']?>" style="height:23px; width:200px;" />
             </p>
        </td>
    </tr>
    
</table>

</td>
 


<td colspan="2" style="width:50%;">
    
<table class="bdrAll" width="100%">
    <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Name *
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="hidden" name="delivery_shipper_id" id="delivery_shipper_id">                  
     <input type="text" name="delivery_shipper_name"  id="delivery_shipper_name" value="<?=$res['delivery_shipper_name']?>" style="height:23px; width:180px;" readonly tabindex=-1/>
             </p>
        </td>
    </tr>
    
   
      <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Mobile
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="number" name="delivery_shipper_mobile"  id="delivery_shipper_mobile" value="<?=$res['delivery_shipper_mobile']?>" style="height:23px; width:180px;"  tabindex=-1/>
             </p>
        </td>
    </tr>
    
     <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Address
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="text" name="delivery_shipper_address"  id="delivery_shipper_address" value="<?=$res['delivery_shipper_address']?>" style="height:23px; width:300px;"  tabindex=-1 />
             </p>
        </td>
    </tr>
        <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            From
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="text" name="delivery_shipper_from"  id="delivery_shipper_from" value="<?=$res['delivery_shipper_from']?>" style="height:23px; width:180px;"  tabindex=-1/>
             </p>
        </td>
    </tr>
    
    <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            To
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="text" name="delivery_shipper_to"  id="delivery_shipper_to" value="<?=$res['delivery_shipper_to']?>" style="height:23px; width:180px;"  tabindex=-1/>
             </p>
        </td>
    </tr>
    
    <tr>
        <td style="width:35;">
            <p class="b ml20px blue p5px">
            Airway Bill Date
             </p>
        </td>
          <td style="width:65%;">
              <p class="b ml20px blue p5px">
     <input type="text" name="delivery_airway_bill_date"  id="delivery_airway_bill_date" value="<?=$res['delivery_airway_bill_date']?>" style="height:23px; width:180px;"  tabindex=-1/>
             </p>
        </td>
    </tr>
    
</table>


        </td> 
        

</tr>

<tr>
<td colspan="4" style="text-align: center;">
	<p style="box-sizing: border-box; padding:20px;">
<input type="submit" name="delivery_submit" id="delivery_submit" <?if($update_id!=""){?>value="Update"<?}else{?>value="Save"<?}?>  style="padding:5px; font-weight:bold;">
</p>
</td>
</tr>


</table>
</form>


    

<script>
    
    function get_shipper_details(airway_bill_no)
{


 $.ajax({
            url:"get_shipper_details_for_update_delivery_status.php",
            type:"POST",
            data:{airway_bill_no:airway_bill_no},
            success:function(data){
         
           var fetch_shipper_data=JSON.parse(data);
           
           document.getElementById('delivery_shipper_id').value=fetch_shipper_data.ship_id;
           document.getElementById('delivery_shipper_name').value=fetch_shipper_data.ship_name;
           
            document.getElementById('delivery_receiver_name').value=fetch_shipper_data.ship_name;
            
           
           document.getElementById('delivery_shipper_mobile').value=fetch_shipper_data.ship_mobile;
           document.getElementById('delivery_shipper_address').value=fetch_shipper_data.ship_address;
           
           document.getElementById('delivery_shipper_from').value=fetch_shipper_data.ship_pickup_city;
           document.getElementById('delivery_shipper_to').value=fetch_shipper_data.ship_destination_city;
           document.getElementById('delivery_airway_bill_date').value=fetch_shipper_data.ship_booking_date;
           
              $('#forwarder_user_id').val(fetch_shipper_data.forwarder_user_id);
      
           
            }
        });
}
</script>


  <script>
  
  <?php if($res['delivery_status']=="U"){?> 

  show_more_details("U");
<?}?>


        function show_more_details(del_status)
        {
            if(del_status!="" && del_status=="d"|| del_status=="D" || del_status=="u" || del_status=="U")
        {
          if(del_status=="U" || del_status=="u")
          {
             $(".hide_when_U").hide();
             $(".show_when_U").show();
             
              
          }else{
               $(".hide_when_U").show();
             $(".show_when_U").hide();
          }
        }
            
        }
        
        
          $( function() {

    $( "#delivery_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
    $( "#delivery_attempt_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });


  } );
    </script>
    
    
    <script>
/********************* Form Validation ****************************/
function delivery_form_validation(){
    
var delivery_airway_bill_no=$('#delivery_airway_bill_no').val();
var delivery_status=$('#delivery_status').val();
var delivery_date=$('#delivery_date').val();
//var delivery_time=$('#delivery_time').val();
var delivery_receiver_name=$('#delivery_receiver_name').val();
var delivery_receiver_phone_no=$('#delivery_receiver_phone_no').val();
//var delivery_pod=$('#delivery_pod').val();
var delivery_reason=$('#delivery_reason').val();
var delivery_attempt_date=$('#delivery_attempt_date').val();
var forwarder_user_id=$('#forwarder_user_id').val();





if(delivery_airway_bill_no==''){		
alert("Enter Airway Bill No. !");
document.getElementById('delivery_airway_bill_no').focus();
return false;
}


if(delivery_status==''){		
alert("Enter Delivery Status !");
document.getElementById('delivery_status').focus();
return false;
}

if(delivery_status=='D' || delivery_status=='d'){
    
if(delivery_date==''){		
alert("Enter Delivery Date !");
document.getElementById('delivery_date').focus();
return false;
}

/*if(delivery_time==''){		
alert("Enter Delivery Time !");
document.getElementById('delivery_time').focus();
return false;
}*/

if(delivery_receiver_name==''){		
alert("Enter Receiver Name !");
document.getElementById('delivery_receiver_name').focus();
return false;
}


if(delivery_receiver_phone_no==''){		
alert("Enter Receiver Phone No. !");
document.getElementById('delivery_receiver_phone_no').focus();
return false;
}

<?php /*if($res['delivery_pod']==""){?> 
if(delivery_pod==''){		
alert("Upload POD !");
document.getElementById('delivery_pod').focus();
return false;
}
<?}*/?>

}

if(delivery_status=='U' || delivery_status=='u'){
    
if(delivery_reason==''){		
alert("Select Reason !");
document.getElementById('delivery_reason').focus();
return false;
}
    
if(delivery_attempt_date==''){		
alert("Enter Attempt Date !");
document.getElementById('delivery_attempt_date').focus();
return false;
}
}


if(forwarder_user_id==''){		
alert("Select Forwarder !");
document.getElementById('forwarder_user_id').focus();
return false;
}
    






}

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
<?/*
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
<span></span>

	  
	  


</p>
</form>

*/?>


<select onchange="filter_fun(this.value)" style="margin-left:10px;">
<option value="D" <?php if($_REQUEST['list_filter']=="D"){?> selected <?}?>>Show Delivered</option>
<option value="U" <?php if($_REQUEST['list_filter']=="U"){?> selected <?}?>>Show Undelivered</option>
</select>
<script type="text/javascript">
 function filter_fun(filter_value)
 {
  window.location.href="update-delivery-status.php?list_filter="+filter_value;
 }



</script>
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

<?php

if($filter_value=="")
{
    $filter_value="D";
}

if($filter_value=="D"){ ?>


	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
	<td style="width:70px;"><p class="b p10px blue ac">Airway Bill No.

	</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">Delivery Status</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Delivery Date & Time</p></td>
	<td  style="width:100px;"><p class="b p10px blue ac">Receiver Details</p></td>
    <td  style="width:15px;"><p class="b p10px blue ac">Proof of Delivery</p></td>
    	<td  style="width:100px;"><p class="b p10px blue ac">Forwarder</p></td>
    <td  style="width:15px;"><p class="b p10px blue ac">Remarks</p></td>
    
    <td  style="width:30px;"><p class="b p10px blue ac">
Action
</p></td>
<!--		<td  style="width:15px;"><p class="b p10px blue ac">Contract Date</p></td>
			<td  style="width:15px;"><p class="b p10px blue ac">Expiry Date</p></td>
	<td  style="width:15px;"><p class="b p10px blue ac">Shipper Status</p></td>



<td style="width:9px;"><p class="b p10px blue ac"><input type="checkbox" name="all_check" id="all_check"></p></td>
-->	
</tr>
<?}else{?>


	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
	<td style="width:70px;"><p class="b p10px blue ac">Airway Bill No.

	</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">Delivery Status</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Reason</p></td>
	<td  style="width:100px;"><p class="b p10px blue ac">Attempt Date</p></td>
	<td  style="width:100px;"><p class="b p10px blue ac">Forwarder</p></td>
	
    <td  style="width:15px;"><p class="b p10px blue ac">Remarks</p></td>
    <td  style="width:30px;"><p class="b p10px blue ac">
Action
</p></td>
<!--		<td  style="width:15px;"><p class="b p10px blue ac">Contract Date</p></td>
			<td  style="width:15px;"><p class="b p10px blue ac">Expiry Date</p></td>
	<td  style="width:15px;"><p class="b p10px blue ac">Shipper Status</p></td>



<td style="width:9px;"><p class="b p10px blue ac"><input type="checkbox" name="all_check" id="all_check"></p></td>
-->	
</tr>

<?}?>


     <?php


/*$id=$_REQUEST['id'];

db_query("delete from tbl_shipper where shipper_id='$id' and shipper_type='Client' ");
*/ $i = 0; 
$sql=db_query("select * from tbl_delivery where delivery_status='$filter_value' order by delivery_id desc");

while($res=mysql_fetch_array($sql))
{
    
    $st_clr="";
if($res['delivery_status']=="D")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>

<?php

if($filter_value=="D"){
?>
<tr>

<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
<td style="width:100px;">
    <p class=" p10px  ac" style="text-transform:uppercase;">
 <strong><?=$res['delivery_airway_bill_no']?></strong>
    
    </p>
    </td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase; font-weight:bold; color:<?=$st_clr?>"><?php if($res['delivery_status']=="D"){echo 'Delivered';}else{echo 'Undelivered';}?></p></td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=date("d-M-Y", strtotime($res['delivery_date']))?> / <?=date("h:i A", strtotime($res['delivery_time']))?></p></td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res['delivery_receiver_name']?> / <?=$res['delivery_receiver_phone_no']?></p></td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;">
<a style="text-decoration: none; color: #bf0000;" href='javascript:;' onClick="window.open('delivery_pod_images/<?=$res['delivery_pod']?>','_blank','toolbar=no,menubar=no,scrollbars=yes,resizable=1,height=400,width=750');">
    <strong>Show POD</strong>
    </a>
</p></td>

<td style="width:100px;"><p class=" p10px  ac">
<?=db_scalar("select user_name from tbl_parcel_user where user_id='$res[forwarder_user_id]'")?>
</p></td>

<td style="width:100px;"><p class=" p10px  ac">
<?=$res['delivery_remarks']?>
</p></td>


<td style="width:100px;"><p class=" p10px  ac">
<a href="update-delivery-status.php?update_id=<?=$res['delivery_id']?>&list_filter=<?=$filter_value?>" style="color:blue; font-weight:bold; text-transform:uppercase;">Edit</a> 
</p></td>

<!--<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=date("d-M-Y", strtotime($res['contract_from_date']))?></p></td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=date("d-M-Y", strtotime($res['contract_to_date']))?></p></td>
		 
	<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase; font-weight:bold; color:<?=$st_clr?>"><?=$res['shipper_status']?></p></td>
		
	<td style="width:100px;"><p class=" p10px  ac">
<input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['shipper_id']?>">
</p></td>-->

</tr>
<?}else{?>
<tr>

<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
<td style="width:100px;">
    <p class=" p10px  ac" style="text-transform:uppercase;">
 <strong><?=$res['delivery_airway_bill_no']?></strong>
    
    </p>
    </td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase; font-weight:bold; color:<?=$st_clr?>"><?php if($res['delivery_status']=="D"){echo 'Delivered';}else{echo 'Undelivered';}?></p></td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res['delivery_reason']?></p></td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=$res['delivery_attempt_date']?></p></td>

<td style="width:100px;"><p class=" p10px  ac">
<?=db_scalar("select user_name from tbl_parcel_user where user_id='$res[forwarder_user_id]'")?>
</p></td>

<td style="width:100px;"><p class=" p10px  ac">
<?=$res['delivery_remarks']?>
</p></td>


<td style="width:100px;"><p class=" p10px  ac">
<a href="update-delivery-status.php?update_id=<?=$res['delivery_id']?>&list_filter=<?=$filter_value?>" style="color:blue; font-weight:bold; text-transform:uppercase;">Edit</a> 
</p></td>

<!--<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=date("d-M-Y", strtotime($res['contract_from_date']))?></p></td>
<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase;"><?=date("d-M-Y", strtotime($res['contract_to_date']))?></p></td>
		 
	<td style="width:100px;"><p class=" p10px  ac" style="text-transform:uppercase; font-weight:bold; color:<?=$st_clr?>"><?=$res['shipper_status']?></p></td>
		
	<td style="width:100px;"><p class=" p10px  ac">
<input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['shipper_id']?>">
</p></td>-->

</tr>

<?}?>
	
<?}?>
<!--<tr>
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

</tr>-->

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