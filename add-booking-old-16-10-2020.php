<?php include('header.php'); ?>
<!--
<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"  />


<style>

    .btn33{
        background-color:white;
        border-radius:6px;
        outline:none;
        padding-top:5px;
        padding-bottom:5px;
        padding-left:15px;
        padding-right:15px;
    }
    .btn33:hover{
        background-color:#00aeef;
    }
</style>
<script>
      $(document).ready(function () {
      $('.dropdown_list').selectize({
          sortField: 'text'
      });
  });
</script>



<?php

 $package_id=$_REQUEST['pack_id'];
 
 if(isset($_POST['final_submit'])){
     if($package_id!="")
     {
         $query=db_query("update tbl_package set 
   airway_bill_no='$_POST[airway_bill_no]',
   booking_date='$_POST[booking_date]',
   user_id='$_POST[customer_code]',
   shipper_id='$_POST[origin_shipper_id]',
   shipper_name='$_POST[shipper_name]',
   shipper_mobile='$_POST[shipper_mobile]',
   shipper_address='$_POST[shipper_address]',
   shipper_docket_charge='$_POST[shipper_docket_charge]',
   shipper_fov='$_POST[shipper_fov]',
   shipper_handling_charge='$_POST[shipper_handling_charge]',
   shipper_other_charge='$_POST[shipper_other_charge]',
   pickup_city='$_POST[shipper_pickup_city]',
   destination_city='$_POST[destination_city]',
   delivery_city='$_POST[delivery_city]',
   payment_mode='$_POST[payment_mode]',
   cheque_number='$_POST[cheque_number]',
   transit_mode='$_POST[transit_mode]',
   invoice_no='$_POST[invoice_no]',
   invoice_date='$_POST[invoice_date]',
   invoice_value='$_POST[invoice_value]',
   consignee='$_POST[consignee]',
   name='$_POST[name]',
   mobile='$_POST[mobile]',
   gst='$_POST[gst]',
   address='$_POST[address]',
   said_to_contain='$_POST[said_to_contain]',
   no_of_package='$_POST[no_of_package]',
   type_nv='$_POST[type_nv]',
   total_cft='$_POST[total_cft]',
   actual_weight='$_POST[actual_weight]',
   changeable_weight='$_POST[changeable_weight]',
   freight='$_POST[freight]',
   service_tax='$_POST[service_tax]',
   grand_total='$_POST[grand_total]' where package_id='$package_id' ");
   if($query)
   {?>
   
     <script>
         alert("Package Updated Successfully !");
         window.location.href="add-booking.php?pack_id=<?=$package_id?>";
     </script>  
   <?}
         
     }else{
         
  $query=db_query("insert into tbl_package set 
   airway_bill_no='$_POST[airway_bill_no]',
   booking_date='$_POST[booking_date]',
   user_id='$_POST[customer_code]',
   shipper_id='$_POST[origin_shipper_id]',
   shipper_name='$_POST[shipper_name]',
   shipper_mobile='$_POST[shipper_mobile]',
   shipper_address='$_POST[shipper_address]',
   shipper_docket_charge='$_POST[shipper_docket_charge]',
   shipper_fov='$_POST[shipper_fov]',
   shipper_handling_charge='$_POST[shipper_handling_charge]',
   shipper_other_charge='$_POST[shipper_other_charge]',
   pickup_city='$_POST[shipper_pickup_city]',
   destination_city='$_POST[destination_city]',
   delivery_city='$_POST[delivery_city]',
   payment_mode='$_POST[payment_mode]',
   cheque_number='$_POST[cheque_number]',
   transit_mode='$_POST[transit_mode]',
   invoice_no='$_POST[invoice_no]',
   invoice_date='$_POST[invoice_date]',
   invoice_value='$_POST[invoice_value]',
   consignee='$_POST[consignee]',
   name='$_POST[name]',
   mobile='$_POST[mobile]',
   gst='$_POST[gst]',
   address='$_POST[address]',
   said_to_contain='$_POST[said_to_contain]',
   no_of_package='$_POST[no_of_package]',
   type_nv='$_POST[type_nv]',
   total_cft='$_POST[total_cft]',
   actual_weight='$_POST[actual_weight]',
   changeable_weight='$_POST[changeable_weight]',
   freight='$_POST[freight]',
   service_tax='$_POST[service_tax]',
   grand_total='$_POST[grand_total]'");
   if($query)
   {?>
   
     <script>
         alert("Package Added Successfully !");
         window.location.href="add-booking.php";
     </script>  
   <?}
 }
   
 }
 ?>
 
 
 <?php
 

 if($package_id!='')
 {
     $pack_sql=db_query("select * from tbl_package where package_id='$package_id' ");
     $pack_res=mysql_fetch_array($pack_sql);
 }
 
 
 ?>

  
  <tr>
    
	
<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >	
<?php include('left-menu.php'); ?>
</td>
	
<td valign="top" width="83%"><p class="b xlarge mt10px ml10px"><i class="fa fa-truck"></i> Add Booking 

<a href="add-booking.php" class="mr20px  fr " style="color:#0033CC;font-size:14px"><i class="fa fa-refresh"></i> Refresh</a>
|
<a href="manage-booking.php" class="mr20px  fr " style="color:#0033CC;font-size:14px"><i class="fa fa-arrow-circle-left"></i> Go back |</a>



</p>
<p class="bdr0 m5px mr30px"></p>


<form method="post" action="" id="myform" enctype="multipart/form-data" onsubmit="return step2_form_validation();">

<table cellpadding="0" cellspacing="0" width="99%"  class="bdrAll mt20px  ml10px step1_form">
<tr>
    <th style="text-align: center;" width="34%">
        <p class="b ml20px blue p5px">
       Airway Bill No. *
       <input type="text" name="airway_bill_no" id="airway_bill_no" placeholder="Enter Airway Bill No. " value="<?=$pack_res['airway_bill_no']?>" <?php if($package_id!=""){?> readonly <?}?>>
       </p>
    </th>
  
    
	<th>
<p class="b ml20px blue p5px">Booking Date * 
<input type="date" name="booking_date" id="booking_date"   <?php if($pack_res['booking_date']!=""){?>value="<?=$pack_res['booking_date']?>"<?}else{?>value="<?=date('Y-m-d')?>"<?}?> >
</p>
	</th>

</tr>



<tr style="text-align: center;">

<td  ><p class="b ml20px blue p5px">Customer/User Code * </p></td>
 
<td ><p class="b ml20px blue p5px">Origin *</p></td>



</tr>



<tr style="text-align: center;">

<td  rowspan="2" width="34%">
<center>
<select name="customer_code" id="customer_code" style="width:220px;" class="dropdown_list" placeholder="Select Customer/User *">
	<option value="">Select Customer/User *</option>
<?php
$customer_sql=db_query("select * from tbl_parcel_user where user_status='Active'");
while($customer_res=mysql_fetch_array($customer_sql))
{?>
	<option value="<?=$customer_res['user_id']?>" <?php if($pack_res['user_id']==$customer_res['user_id']){?>selected<?}?> ><?=$customer_res['user_code']?></option>
<?}?>
</select>
</center>

</td>
 
<td >

<?php
$SHIPPER_SQL=db_query("select * from tbl_shipper where 1  and shipper_status='Active' order by shipper_id asc");
?>
<center>
<select style="width:200px;" name="origin_shipper_id" id="origin_shipper_id" onchange="getShipperDetails(this.value)" class="dropdown_list" placeholder="Select Origin *">
  
  	<option value="">Select Origin *</option>
  	<?php
while($SHIPPER_RES=mysql_fetch_array($SHIPPER_SQL))
{?>
	<option value="<?=$SHIPPER_RES['shipper_id']?>" <?php if($pack_res['shipper_id']==$SHIPPER_RES['shipper_id']){?>selected<?}?>><?=$SHIPPER_RES['shipper_code']?></option>
<?}?>
  
  </select>
  </center>

</td>
</tr>

<tr style="text-align: left;">
    
    <td style="padding-left:70px;">
      <p class="b ml20px blue p5px">
         Name * &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Name" style="width:210px;" name="shipper_name" id="shipper_name" readonly value="<?=$pack_res['shipper_name']?>"/>
          
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Mobile *<input type="number" placeholder="Enter Mobile No." name="shipper_mobile" id="shipper_mobile" readonly value="<?=$pack_res['shipper_mobile']?>"/>
       
          </p>
           <p class="b ml20px blue p5px">
          Address *<input type="text" placeholder="Enter Address" style="width:489px;" name="shipper_address" id="shipper_address" readonly value="<?=$pack_res['shipper_address']?>"/>
         </p>
           <p class="b ml20px blue p5px">
                Docket Charge &nbsp;&nbsp;<input type="number" placeholder="Enter Docket Charge"name="shipper_docket_charge" id="shipper_docket_charge" value="<?=$pack_res['shipper_docket_charge']?>"/>
          &nbsp;&nbsp;&nbsp;&nbsp; Other Charges<input type="number" placeholder="Enter Other Charges" name="shipper_other_charge" id="shipper_other_charge" value="<?=$pack_res['shipper_other_charge']?>"/>
        
          </p>
           <p class="b ml20px blue p5px">
          Handling charge <input type="number" placeholder="Enter Handling charge" name="shipper_handling_charge" id="shipper_handling_charge" value="<?=$pack_res['shipper_handling_charge']?>"/>
          
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOV (%) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" placeholder="Enter FOV" name="shipper_fov" id="shipper_fov" value="<?=$pack_res['shipper_fov']?>"/>
        
         </p>
    </td>
</tr>

<tr>
    <td colspan="2">
       
        <table cellpadding="0" cellspacing="0" width="100%"  class="bdrAll">
<tr style="text-align: center;">
    <td width="34%">   <p class="b ml20px blue p5px">
   Pick Up City * <input type="text" placeholder="Pick Up City *" name="shipper_pickup_city" id="shipper_pickup_city" value="<?=$pack_res['pickup_city']?>"/>
    </p>
    </td>
    <td>  
     <p class="b ml20px blue p5px">
         Destination City * 
         <select name="destination_city" id="destination_city"> 
        <option value="">Select City *</option>
        <?php
        $des_city_sql=db_query("select * from tbl_city_master where city_status='Active'");
        while($des_city_res=mysql_fetch_array($des_city_sql))
        {?>
        <option value="<?=$des_city_res['city_name']?>" <?php if($pack_res['destination_city']==$des_city_res['city_name']){?>selected<?}?> ><?=$des_city_res['city_name']?></option>
        <?}?>
    </select>
    </p>
    </td>
    <td>  
     <p class="b ml20px blue p5px">
         Delivery Branch *
    <select name="delivery_city" id="delivery_city">
        <option value="">Select City *</option>
       <?php
        $del_city_sql=db_query("select * from tbl_city_master where city_status='Active'");
        while($del_city_res=mysql_fetch_array($del_city_sql))
        {?>
        <option value="<?=$del_city_res['city_name']?>" <?php if($pack_res['delivery_city']==$del_city_res['city_name']){?>selected<?}?> ><?=$del_city_res['city_name']?></option>
        <?}?>
    </select>
    </p>
    </td>
    
</tr>
<tr>
    <td style="text-align: center;">
          <p class="b ml20px blue p5px">
              Payment Mode *
              </p>
              </td>
              <td colspan="2" style="text-align: left;">
                 <p class="ml20px  p5px">
                     Cash <input type="radio" name="payment_mode" value="Cash" onclick="show_cheque_number_field()" <?php if($pack_res['payment_mode']=="Cash"){?>checked<?}?>>
                     Cheque <input type="radio" name="payment_mode" value="Cheque" onclick="show_cheque_number_field()" <?php if($pack_res['payment_mode']=="Cheque" || $pack_res['payment_mode']==""){?>checked<?}?> >
                     To Pay <input type="radio" name="payment_mode" value="To Pay" onclick="show_cheque_number_field()" <?php if($pack_res['payment_mode']=="To Pay"){?>checked<?}?>>
                     
                      <input type="text" placeholder="Cheque Number" name="cheque_number" id="cheque_number" value="<?=$pack_res['cheque_number']?>" <?php if($pack_res['payment_mode']=="Cheque" || $pack_res['payment_mode']==""){?><?}else{?>style="display:none;"<?}?> />
                    
                     </p> 
              </td>
              
    </tr>
    
    <tr>
	
<td style="text-align: center;"><p class="b ml20px blue p5px">Transit Mode *</p></td>
<td colspan="2">

	<p class="ml20px  p5px">
<select  style="padding:5px;" name="transit_mode" id="transit_mode"  >
<option value="">Select Mode *</option>
<option value="Air" <?php if($pack_res['transit_mode']=="Air"){?>selected<?}?>>Air</option>
<option value="Surface" <?php if($pack_res['transit_mode']=="Surface" || $pack_res['transit_mode']==""){?>selected<?}?>>Surface</option>
<option value="Cargo" <?php if($pack_res['transit_mode']=="Cargo"){?>selected<?}?>>Cargo</option>
</select>
</p></td>

</tr>


<tr>
	
<td style="text-align: center;">
<p class="b ml20px blue p5px">
    Invoice No. 
    <input type="text" name="invoice_no" id="invoice_no" value="<?=$pack_res['invoice_no']?>">
    </p>
</td>

<td style="text-align: center;">
<p class="b ml20px blue p5px">
    Invoice Date 
     <input type="date" name="invoice_date" id="invoice_date" value="<?=$pack_res['invoice_date']?>">
    </p>
</td>

<td style="text-align: center;">
<p class="b ml20px blue p5px">
    Invoice Value 
 <input type="number" name="invoice_value" id="invoice_value" value="<?=$pack_res['invoice_value']?>">
</p>
</td>

</tr>

</table>

    </td>
    
</tr>

<tr>
<td colspan="3" style="text-align: center;">  
<p class="b ml20px blue p5px">
<button type="button" name="next_btn" id="next_btn">Next</button>
</p>
</td>
</tr>
</table>

<p class="b ml20px blue p5px back_btn_display" style="display:none;">
<button type="button" name="back_btn" id="back_btn">Back</button>
</p>



<table cellpadding="0" cellspacing="0" width="99%"  class="bdrAll mt20px  ml10px step2_form" style="display:none;">

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
      Consignee
       </p>
    </td>
    
     <td colspan="3">
         <p class="ml20px p5px">
        <input type="text" placeholder="Enter Consignee" name="consignee" id="consignee" value="<?=$pack_res['consignee']?>" >
         </p>
    </td>
</tr>

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
      Name/Mobile/GST
       </p>
    </td>
    
     <td colspan="3">
         <p class="ml20px p5px">
        <input type="text" placeholder="Name" name="name" id="name" value="<?=$pack_res['name']?>"> 
        <input type="number" placeholder="Mobile No." name="mobile" id="mobile" maxlength="10" value="<?=$pack_res['mobile']?>">
        <input type="text" placeholder="GST" name="gst" id="gst" value="<?=$pack_res['gst']?>">
         </p>
    </td>
</tr>


<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
      Address
       </p>
    </td>
    
     <td colspan="3">
         <p class="ml20px p5px">
        <input type="text" placeholder="Address" name="address" id="address" style="width:470px;" value="<?=$pack_res['address']?>">
         </p>
    </td>
</tr>


<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
     Said to Contain
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="text" placeholder="Said to Contain *" name="said_to_contain" id="said_to_contain" value="<?=$pack_res['said_to_contain']?>" >
         </p>
    </td>
    
     <td style="text-align: center;">
        <p class="b ml20px blue p5px">
     No. of Package *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter No. of Package *" name="no_of_package" id="no_of_package" value="<?=$pack_res['no_of_package']?>">
         </p>
    </td>
</tr>

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
   Type N/V * <i class="fa fa-question-circle" style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="(N for Normal and V for Volumetric)"></i>
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="text" placeholder="Enter Type *" name="type_nv" id="type_nv" value="<?=$pack_res['type_nv']?>">
         </p>
    </td>
    
     <td style="text-align: center;">
        <p class="b ml20px blue p5px">
   Total CFT *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter Total CFT *" name="total_cft" id="total_cft" value="<?=$pack_res['total_cft']?>">
         </p>
    </td>
</tr>

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
    Actual Weight *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter Actual Weight *" name="actual_weight" id="actual_weight" value="<?=$pack_res['actual_weight']?>">
         </p>
    </td>
    
     <td style="text-align: center;">
        <p class="b ml20px blue p5px">
    Chargeable Weight *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Chargeable Weight *" name="changeable_weight" id="changeable_weight" value="<?=$pack_res['changeable_weight']?>">
         </p>
    </td>
</tr>

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
    Freight
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="text" placeholder="Enter Freight" name="freight" id="freight" value="<?=$pack_res['freight']?>">
         </p>
    </td>
    
     <td style="text-align: center;">
        <p class="b ml20px blue p5px">
     Service Tax *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter Service Tax *" name="service_tax" id="service_tax" value="<?=$pack_res['service_tax']?>">
         </p>
    </td>
</tr>

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
    Grand Total *
       </p>
    </td>
    
     <td colspan="3">
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter Grand Total *" style="width:100%" name="grand_total" id="grand_total" value="<?=$pack_res['grand_total']?>">
         </p>
    </td>
    
   
</tr>





<tr>
    <td colspan="4" style="text-align: center;">
<table width="100%">	
<tr style="text-align: center;" >

<td ><p class="b ml20px blue p5px">
	<input type="submit" id="final_submit" name="final_submit" value="Save">
	</p></td>
 

</tr>
</table>
 </td>
    
   
</tr>

</table>
</form>
  
  
  
<script>
<?php
if($package_id!="")
{?>
    getShipperDetails(<?=$pack_res['shipper_id']?>);
<?}?>

var tariff_id="";

function getShipperDetails(shipper_id)
{
  $.ajax({
            url:"get_shipper_details_for_booking_ajax.php",
            type:"POST",
            data:{shipper_id:shipper_id},
            success:function(data){
           var fetch_shipper_data=JSON.parse(data);
           
           document.getElementById('shipper_name').value=fetch_shipper_data.ship_name;
           document.getElementById('shipper_mobile').value=fetch_shipper_data.ship_mobile;
           document.getElementById('shipper_address').value=fetch_shipper_data.ship_address;
           document.getElementById('shipper_docket_charge').value=fetch_shipper_data.ship_docket_charge;
           document.getElementById('shipper_fov').value=fetch_shipper_data.ship_fov;
           document.getElementById('shipper_handling_charge').value=fetch_shipper_data.ship_handling_charge;
           document.getElementById('shipper_other_charge').value=fetch_shipper_data.ship_other_charge;
           document.getElementById('shipper_pickup_city').value=fetch_shipper_data.ship_city;
           
           tariff_id=fetch_shipper_data.tariff_id;
           
            }
        });
}


$(document).ready(function(){
var airway_bill_no="";   
var booking_date="";
var customer_code="";
var origin_shipper_id="";
var shipper_name="";
var shipper_mobile="";
var shipper_address="";
var shipper_docket_charge="";
var shipper_fov="";
var shipper_handling_charge="";
var shipper_other_charge="";
var shipper_pickup_city="";
var destination_city="";
var delivery_city="";
var payment_mode="";
var cheque_number="";
var transit_mode="";
var invoice_no="";
var invoice_date="";
var invoice_value="";







$("#next_btn").click(function(){
      
airway_bill_no=$('#airway_bill_no').val();
booking_date=$('#booking_date').val();
customer_code=$('#customer_code').val();
origin_shipper_id=$('#origin_shipper_id').val();
shipper_name=$('#shipper_name').val();
shipper_mobile=$('#shipper_mobile').val();
shipper_address=$('#shipper_address').val();
shipper_docket_charge=$('#shipper_docket_charge').val();
shipper_fov=$('#shipper_fov').val();
shipper_handling_charge=$('#shipper_handling_charge').val();
shipper_other_charge=$('#shipper_other_charge').val();
shipper_pickup_city=$('#shipper_pickup_city').val();
destination_city=$('#destination_city').val();
delivery_city=$('#delivery_city').val();
payment_mode=$('input[name="payment_mode"]:checked').val();
   
if(payment_mode=="Cheque")
{
cheque_number=$('#cheque_number').val();
}
transit_mode=$('#transit_mode').val();
invoice_no=$('#invoice_no').val();
invoice_date=$('#invoice_date').val();
invoice_value=$('#invoice_value').val();




if(airway_bill_no==''){		
alert("Enter Airway Bill No. !");
document.getElementById('airway_bill_no').focus();
return false;
}

if(customer_code==''){		
alert("Select Customer Code !");
document.getElementById('customer_code').focus();
return false;
}

if(origin_shipper_id==''){		
alert("Select Origin !");
document.getElementById('origin_shipper_id').focus();
return false;
}

if(shipper_name==''){		
alert("Enter Origin Name !");
document.getElementById('shipper_name').focus();
return false;
}

if(shipper_mobile==''){		
alert("Enter Origin Mobile No. !");
document.getElementById('shipper_mobile').focus();
return false;
}



if(shipper_address==''){		
alert("Enter Origin Address !");
document.getElementById('shipper_address').focus();
return false;
}

if(shipper_docket_charge!="")
{
if(isNaN(shipper_docket_charge)){
	alert("Enter Numeric Value Only !");
	document.getElementById('shipper_docket_charge').focus();
	return false;
}
}


if(shipper_other_charge!="")
{
if(isNaN(shipper_other_charge)){
	alert("Enter Numeric Value Only !");
	document.getElementById('shipper_other_charge').focus();
	return false;
}
}


if(shipper_handling_charge!="")
{
if(isNaN(shipper_handling_charge)){
	alert("Enter Numeric Value Only !");
	document.getElementById('shipper_handling_charge').focus();
	return false;
}
}
if(shipper_fov!="")
{
if(isNaN(shipper_fov)){
	alert("Enter Numeric Value Only !");
	document.getElementById('shipper_fov').focus();
	return false;
}
}




if(shipper_pickup_city==''){		
alert("Enter Pick up City !");
document.getElementById('shipper_pickup_city').focus();
return false;
}

if(destination_city==''){		
alert("Select Destination City !");
document.getElementById('destination_city').focus();
return false;
}

if(delivery_city==''){		
alert("Select Delivery City !");
document.getElementById('delivery_city').focus();
return false;
}

if( !$('input[name="payment_mode"]').is(":checked") )
{
alert("Select Payment Mode !");
document.getElementById('payment_mode').focus();
return false; 
}


/*if(payment_mode=="Cheque" && cheque_number=="")
{
alert("Enter Cheque Number !");
document.getElementById('cheque_number').focus();
return false; 
}*/


if(transit_mode=="")
{
alert("Select Transit Mode !");
document.getElementById('transit_mode').focus();
return false; 
}

/*if(invoice_no=="")
{
alert("Enter Invoice Number !");
document.getElementById('invoice_no').focus();
return false; 
}

if(invoice_date=="")
{
alert("Select Invoice Date !");
document.getElementById('invoice_date').focus();
return false; 
}

if(invoice_value=="")
{
alert("Enter Invoice Value !");
document.getElementById('invoice_value').focus();
return false; 
}

if(isNaN(invoice_value)){
	alert("Enter Numeric Value Only !");
	document.getElementById('invoice_value').focus();
	return false;
}
*/

$.ajax({
url:"get_booking_freight_ajax.php",
type:"POST",
data:{from_city:shipper_pickup_city,destination_city:destination_city,tariff_id:tariff_id},
success:function(data){

var fetch_tariff_data=JSON.parse(data);
document.getElementById('freight').value=fetch_tariff_data.freight;

}
});

$('.step1_form').hide();
$('.back_btn_display').show();
$('.step2_form').show();






 
  });




  $("#back_btn").click(function(){
$('.step1_form').show();
$('.back_btn_display').hide();
$('.step2_form').hide();

  });


});


function step2_form_validation(){
    
var consignee="";
var name="";
var mobile="";
var gst="";
var address="";
var said_to_contain="";
var no_of_package="";
var type_nv="";
var total_cft="";
var actual_weight="";
var changeable_weight="";
var freight="";
var service_tax="";
var grand_total="";

consignee=$('#consignee').val();
name=$('#name').val();
mobile=$('#mobile').val();
gst=$('#gst').val();
address=$('#address').val();
said_to_contain=$('#said_to_contain').val();
no_of_package=$('#no_of_package').val();
type_nv=$('#type_nv').val();
total_cft=$('#total_cft').val();
actual_weight=$('#actual_weight').val();
changeable_weight=$('#changeable_weight').val();
service_tax=$('#service_tax').val();
grand_total=$('#grand_total').val();



/*if(consignee=="")
{
alert("Enter Consignee !");
document.getElementById('consignee').focus();
return false; 
}

if(name=="")
{
alert("Enter Name !");
document.getElementById('name').focus();
return false; 
}

if(mobile=="")
{
alert("Enter Mobile No. !");
document.getElementById('mobile').focus();
return false; 
}

if(isNaN(mobile)){
	alert("Mobile no. should be no. !");
	document.getElementById('mobile').focus();
	return false;
}*/



if(mobile!="")
{
    if(mobile.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('mobile').focus();
	return false;
}
}

/*if(gst=="")
{
alert("Enter GST No. !");
document.getElementById('gst').focus();
return false; 
}

if(address=="")
{
alert("Enter Address !");
document.getElementById('address').focus();
return false; 
}

if(said_to_contain=="")
{
alert("Enter Said To Contain !");
document.getElementById('said_to_contain').focus();
return false; 
}*/

if(no_of_package=="")
{
alert("Enter No. Of Package !");
document.getElementById('no_of_package').focus();
return false; 
}

if(isNaN(no_of_package)){
	alert("Enter Numeric Value Only !");
	document.getElementById('no_of_package').focus();
	return false;
}

if(type_nv=="")
{
alert("Enter Type N/V !");
document.getElementById('type_nv').focus();
return false; 
}

if(total_cft=="")
{
alert("Enter Total CFT !");
document.getElementById('total_cft').focus();
return false; 
}

if(isNaN(total_cft)){
	alert("Enter Numeric Value Only !");
	document.getElementById('total_cft').focus();
	return false;
}


if(actual_weight=="")
{
alert("Enter Actual Weight !");
document.getElementById('actual_weight').focus();
return false; 
}

if(isNaN(actual_weight)){
	alert("Enter Numeric Value Only !");
	document.getElementById('actual_weight').focus();
	return false;
}

if(changeable_weight=="")
{
alert("Enter Changeable Weight !");
document.getElementById('changeable_weight').focus();
return false; 
}

if(isNaN(changeable_weight)){
	alert("Enter Numeric Value Only !");
	document.getElementById('changeable_weight').focus();
	return false;
}


if(service_tax=="")
{
alert("Enter Service Tax !");
document.getElementById('service_tax').focus();
return false; 
}

if(isNaN(service_tax)){
	alert("Enter Numeric Value Only !");
	document.getElementById('service_tax').focus();
	return false;
}

if(grand_total=="")
{
alert("Enter Grand Total !");
document.getElementById('grand_total').focus();
return false; 
}

if(isNaN(grand_total)){
	alert("Enter Numeric Value Only !");
	document.getElementById('grand_total').focus();
	return false;
}



}
</script>
  <script>
    
function show_cheque_number_field() {

var checked_payment_mode = document.querySelector('input[name = "payment_mode"]:checked');

if(checked_payment_mode != null){ 
if(checked_payment_mode.value=="Cheque")
{
  document.getElementById("cheque_number").style.display = "block";     
}else{
  document.getElementById("cheque_number").style.display = "none";  
}


} 

}

</script>

<script>

  $(document).ready(function(){
       $('#airway_bill_no').change(function(){
        var airway_bill_no=$('#airway_bill_no').val();
              $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{airway_bill_no:airway_bill_no, type:"PACKAGE"},
            success:function(data){
           
                if(data!=""){
                     var con_value="";
                     con_value=confirm(" Airway bill no. is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="add-booking.php?pack_id="+data;
                    }else{
                    $('#final_submit').attr("disabled","disabled");
                    $('#final_submit').css({"cursor":"no-drop"});
                     $('#next_btn').attr("disabled","disabled");
                    $('#next_btn').css({"cursor":"no-drop"});
                    }
                  
                }else if(data=="")
                {
     $('#final_submit').attr("disabled",false);
      $('#final_submit').css({"cursor":"pointer"});
      $('#next_btn').attr("disabled",false);
      $('#next_btn').css({"cursor":"pointer"});
      
                }
            }
        });
    });
   });
</script>







<?php include 'footer.php'; ?>


</body>
</html>