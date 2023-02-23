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


<script>
  $( function() {

    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
    // $("#datepicker").datepicker().datepicker("setDate", new Date());
  } );
  
    $( function() {

    $( "#invoice_datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
    // $("#datepicker").datepicker().datepicker("setDate", new Date());
  } );
  
  $( function() {

    $( "#forwarder_airway_bill_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
    // $("#datepicker").datepicker().datepicker("setDate", new Date());
  } );
  </script>
  


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
// new id
 
 
 if(isset($_POST['final_submit'])){
     if($package_id!="")
     {
         
         $final_total=$_POST['grand_total']+$_POST['service_tax'];
  
  
  
         $query=db_query("update tbl_package set 
   booking_date='$_POST[booking_date]',
   origin_city_name='$_POST[origin_city_name]',
   shipper_id='$_POST[customer_code_shipper_id]',
   shipper_name='$_POST[shipper_name]',
   shipper_mobile='$_POST[shipper_mobile]',
   shipper_address='$_POST[shipper_address]',
   shipper_gst='$_POST[shipper_gst]',
   shipper_gst_rate='$_POST[shipper_gst_rate]',
   shipper_docket_charge='$_POST[shipper_docket_charge]',
   shipper_handling_charge='$_POST[shipper_handling_charge]',
   shipper_other_charge='$_POST[shipper_other_charge]',
   shipper_fov='$_POST[shipper_fov]',
   shipper_fov_min='$_POST[shipper_fov_min]',
   shipper_fov_amount='$_POST[shipper_fov_amount]',
   pickup_city='$_POST[pickup_city]',
   destination_city='$_POST[destination_city]',
   delivery_city='$_POST[delivery_city]',
   payment_mode='$_POST[payment_mode]',
   transit_mode='$_POST[transit_mode]',
   invoice_no='$_POST[invoice_no]',
   invoice_date='$_POST[invoice_date]',
   invoice_value='$_POST[invoice_value]',
   consignee_name='$_POST[consignee_name]',
   consignee_mobile='$_POST[consignee_mobile]',
   consignee_gst='$_POST[consignee_gst]',
   consignee_address='$_POST[consignee_address]',
   said_to_contain='$_POST[said_to_contain]',
   no_of_package='$_POST[no_of_package]',
   type_nv='$_POST[type_nv]',
   total_cft='$_POST[total_cft]',
   one_cft_weight='$_POST[one_cft_weight]',
   actual_weight='$_POST[actual_weight]',
   changeable_weight='$_POST[changeable_weight]',
   forwarder_user_id='$_POST[forwarder_user_id]',
   forwarder_airway_bill_no='$_POST[forwarder_airway_bill_no]',
   forwarder_airway_bill_date='$_POST[forwarder_airway_bill_date]',
   freight='$_POST[freight]',
   service_tax='$_POST[service_tax]',
   grand_total='$_POST[grand_total]',
   final_total='$final_total',
   package_update_date='$CURR_date' where package_id='$package_id' ");
   if($query)
   {?>
   
     <script>
         alert("Package Updated Successfully !");
         window.location.href="add-booking.php?pack_id=<?=$package_id?>";
     </script>  
   <?}
         
     }else{
         
          $final_total=$_POST['grand_total']+$_POST['service_tax'];
          $_SESSION['last_awb_no']=$_POST['airway_bill_no']+1;
          $_SESSION['last_shipper_id']=$_POST['customer_code_shipper_id'];
          
          
  $query=db_query("insert into tbl_package set 
   airway_bill_no='$_POST[airway_bill_no]',
   booking_date='$_POST[booking_date]',
   origin_city_name='$_POST[origin_city_name]',
   shipper_id='$_POST[customer_code_shipper_id]',
   shipper_name='$_POST[shipper_name]',
   shipper_mobile='$_POST[shipper_mobile]',
   shipper_address='$_POST[shipper_address]',
   shipper_gst='$_POST[shipper_gst]',
   shipper_gst_rate='$_POST[shipper_gst_rate]',
   shipper_docket_charge='$_POST[shipper_docket_charge]',
   shipper_handling_charge='$_POST[shipper_handling_charge]',
   shipper_other_charge='$_POST[shipper_other_charge]',
   shipper_fov='$_POST[shipper_fov]',
   shipper_fov_min='$_POST[shipper_fov_min]',
   shipper_fov_amount='$_POST[shipper_fov_amount]',
   pickup_city='$_POST[pickup_city]',
   destination_city='$_POST[destination_city]',
   delivery_city='$_POST[delivery_city]',
   payment_mode='$_POST[payment_mode]',
   transit_mode='$_POST[transit_mode]',
   invoice_no='$_POST[invoice_no]',
   invoice_date='$_POST[invoice_date]',
   invoice_value='$_POST[invoice_value]',
   consignee_name='$_POST[consignee_name]',
   consignee_mobile='$_POST[consignee_mobile]',
   consignee_gst='$_POST[consignee_gst]',
   consignee_address='$_POST[consignee_address]',
   said_to_contain='$_POST[said_to_contain]',
   no_of_package='$_POST[no_of_package]',
   type_nv='$_POST[type_nv]',
   total_cft='$_POST[total_cft]',
   one_cft_weight='$_POST[one_cft_weight]',
   actual_weight='$_POST[actual_weight]',
   changeable_weight='$_POST[changeable_weight]',
   forwarder_user_id='$_POST[forwarder_user_id]',
   forwarder_airway_bill_no='$_POST[forwarder_airway_bill_no]',
   forwarder_airway_bill_date='$_POST[forwarder_airway_bill_date]',
   freight='$_POST[freight]',
   service_tax='$_POST[service_tax]',
   grand_total='$_POST[grand_total]',
   final_total='$final_total',
   package_add_date='$CURR_date'");
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

<input type="text" name="airway_bill_no" id="airway_bill_no" placeholder="Enter Airway Bill No. " <?php if($package_id!=""){?> value="<?=$pack_res['airway_bill_no']?>"  readonly <?}else if(!empty($_SESSION['last_awb_no'])){?> value="<?=$_SESSION['last_awb_no']?>" <?}?> >
</p>
    </th>
  
    
	<th>
<p class="b ml20px blue p5px">Booking Date * 
<input type="text" name="booking_date" id="datepicker"  onchange="setNextTab()" <?php if($package_id!=""){?>autofocus<?}?>  <?php if($pack_res['booking_date']!=""){?>value="<?=$pack_res['booking_date']?>"<?}else{?>value="<?=date('Y-m-d')?>"<?}?> >
</p>
	</th>

</tr>


<!--
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
</tr>-->


<tr style="text-align: center;">

<td  ><p class="b ml20px blue p5px">Customer Code * </p></td>
 
<td ><p class="b ml20px blue p5px">Origin *</p></td>

</tr>


<tr style="text-align: center;">
<td>

<?php
$SHIPPER_SQL=db_query("select * from tbl_shipper where 1  and shipper_status='Active' order by shipper_id asc");
?>
<center style=" margin:10px;">
<select style="width:200px;" name="customer_code_shipper_id" id="customer_code_shipper_id" onchange="getShipperDetails(this.value)" class="dropdown_list" placeholder="Select Customer Code *">
  
  	<option value="">Select Customer Code *</option>
  	<?php
while($SHIPPER_RES=mysql_fetch_array($SHIPPER_SQL))
{?>
	<option value="<?=$SHIPPER_RES['shipper_id']?>" <?php if($pack_res['shipper_id']==$SHIPPER_RES['shipper_id'] || $_SESSION['last_shipper_id']==$SHIPPER_RES['shipper_id']){?>selected<?}?>><?=$SHIPPER_RES['shipper_code']?></option>
<?}?>
  
  </select>
  </center>

</td>

<td  rowspan="2" width="34%">
<center>
     <p class="b ml20px blue p5px" >
<select name="origin_city_name" id="origin_city_name" onchange="setPickUpCity(this.value)" style="width:220px; padding:10px; border-radius:5px;" tabindex=-1>
	<option value="">Select Origin *</option>
<?php
$origin_city_sql=db_query("select * from tbl_city_master where city_status='Active'");
        while($origin_city_res=mysql_fetch_array($origin_city_sql))
        {?>
	<option value="<?=$origin_city_res['city_name']?>" <?php if($pack_res['origin_city_name']==$origin_city_res['city_name']){?>selected<?}?> ><?=$origin_city_res['city_name']?></option>
<?}?>
</select>
</p>
</center>

</td>


</tr>

<tr style="text-align: left; text">
    
    <td style="padding-left:50px;">
      <p class="b  blue p5px">
         Name * &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="" name="shipper_name" id="shipper_name" readonly tabindex=-1 value="<?=$pack_res['shipper_name']?>"/>
          
          
          &nbsp;&nbsp; Mobile *<input type="number" name="shipper_mobile" id="shipper_mobile" readonly tabindex=-1 value="<?=$pack_res['shipper_mobile']?>"/>
       </p>
       
       <p class="b  blue p5px">
         Address * <input type="text" name="shipper_address" id="shipper_address" readonly tabindex=-1 value="<?=$pack_res['shipper_address']?>"/>
          
          
           GST No. *<input type="text" name="shipper_gst" id="shipper_gst" readonly tabindex=-1 value="<?=$pack_res['shipper_gst']?>" style="width:140px;"/>
        <input type="text" name="shipper_gst_rate" id="shipper_gst_rate" readonly tabindex=-1 value="<?=$pack_res['shipper_gst_rate']?>" style="width:40px;"/>
           
       </p>
       
       <p class="b  blue p5px">
         Docket Charge &nbsp;&nbsp;&nbsp;<input type="number" style="width:50px;" name="shipper_docket_charge" id="shipper_docket_charge" value="<?=$pack_res['shipper_docket_charge']?>"/>
          
          
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   Handling charge <input type="number" style="width:50px;"  name="shipper_handling_charge" id="shipper_handling_charge" value="<?=$pack_res['shipper_handling_charge']?>"/>
       </p>

<p class="b  blue p5px">
           Other Charges/Fuel Charges <input type="number" style="width:50px;" name="shipper_other_charge" id="shipper_other_charge" value="<?=$pack_res['shipper_other_charge']?>"/>
          
     
           FOV (%) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="number" style="width:50px;" name="shipper_fov" id="shipper_fov" value="<?=$pack_res['shipper_fov']?>"/>
          Min <input type="number" style="width:50px;" name="shipper_fov_min" id="shipper_fov_min" value="<?=$pack_res['shipper_fov_min']?>"/>
          <input type="number" style="width:50px;" name="shipper_fov_amount" id="shipper_fov_amount" value="<?=$pack_res['shipper_fov_amount']?>" readonly tabindex=-1/>
           
       </p>


          
          
          <!-- <p class="b ml20px blue p5px">
          Address *<input type="text" placeholder="Enter Address" style="width:489px;" name="shipper_address" id="shipper_address" readonly value="<?=$pack_res['shipper_address']?>"/>
         </p>
           <p class="b ml20px blue p5px">
                Docket Charge &nbsp;&nbsp;<input type="number" placeholder="Enter Docket Charge" name="shipper_docket_charge" id="shipper_docket_charge" value="<?=$pack_res['shipper_docket_charge']?>"/>
          &nbsp;&nbsp;&nbsp;&nbsp; Other Charges<input type="number" placeholder="Enter Other Charges" name="shipper_other_charge" id="shipper_other_charge" value="<?=$pack_res['shipper_other_charge']?>"/>
        </p>
        
           <p class="b ml20px blue p5px">
          Handling charge <input type="number" placeholder="Enter Handling charge" name="shipper_handling_charge" id="shipper_handling_charge" value="<?=$pack_res['shipper_handling_charge']?>"/>
          
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOV (%) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" placeholder="Enter FOV" name="shipper_fov" id="shipper_fov" value="<?=$pack_res['shipper_fov']?>"/>
        </p>
         -->
         
    </td>
</tr>


<tr>
    <td colspan="2">
       
        <table cellpadding="0" cellspacing="0" width="100%"  class="bdrAll">
<tr style="text-align: center;">
    <td width="34%">   <p class="b ml20px blue p5px">
<!--   Pick Up City * <input type="text" placeholder="Pick Up City *" name="shipper_pickup_city" id="shipper_pickup_city" value="<?=$pack_res['pickup_city']?>"/>
 -->
Pick Up City * <select name="pickup_city" id="pickup_city"> 
<option value="">Select City *</option>
<?php
$pick_city_sql=db_query("select * from tbl_city_master where city_status='Active'");
while($pick_city_res=mysql_fetch_array($pick_city_sql))
{?>
<option value="<?=$pick_city_res['city_name']?>" <?php if($pack_res['pickup_city']==$pick_city_res['city_name']){?>selected<?}?> ><?=$pick_city_res['city_name']?></option>
<?}?>
</select>
    </p>
    </td>
    <td>  
     <p class="b ml20px blue p5px">
         Destination City * 
         <select name="destination_city" id="destination_city" onchange="setDeliveryBranchCity(this.value)"> 
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
                     <select name="payment_mode" id="payment_mode" style="padding:5px;">
                         <option value="">Choose Payment Mode</option>
                         <option value="Cash" <?php if($pack_res['payment_mode']=="Cash"){?>selected<?}?>>Cash</option>
                         <option value="Credit" <?php if($pack_res['payment_mode']=="Credit" || $pack_res['payment_mode']==""){?>selected<?}?>>Credit</option>
                         <option value="To Pay" <?php if($pack_res['payment_mode']=="To Pay"){?>selected<?}?>>To Pay</option>
                      </select>
                     
                    <!-- Cash <input type="radio" name="payment_mode" value="Cash" <?php if($pack_res['payment_mode']=="Cash"){?>checked<?}?>>
                     Cheque <input type="radio" name="payment_mode" value="Cheque" <?php if($pack_res['payment_mode']=="Cheque" || $pack_res['payment_mode']==""){?>checked<?}?> >
                     To Pay <input type="radio" name="payment_mode" value="To Pay" <?php if($pack_res['payment_mode']=="To Pay"){?>checked<?}?>>-->
                     
<!--<input type="text" placeholder="Cheque Number" name="cheque_number" id="cheque_number" value="<?=$pack_res['cheque_number']?>" <?php if($pack_res['payment_mode']=="Cheque" || $pack_res['payment_mode']==""){?><?}else{?>style="display:none;"<?}?> />
-->                    
                     </p> 
              </td>
              
    </tr>
    
    <tr>
	
<td style="text-align: center;"><p class="b ml20px blue p5px">Transit Mode *</p></td>
<td colspan="2">

	<p class="ml20px  p5px">
<select  style="padding:5px; width:185px;" name="transit_mode" id="transit_mode"  >
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
    <input type="text" name="invoice_date" id="invoice_datepicker" value="<?=$pack_res['invoice_date']?>">
    
   <!--  <input type="date" name="invoice_date" id="invoice_date" value="<?=$pack_res['invoice_date']?>">-->
    </p>
</td>

<td style="text-align: center;">
<p class="b ml20px blue p5px">
    Invoice Value 
 <input type="number" name="invoice_value" id="invoice_value" value="<?=$pack_res['invoice_value']?>" onkeyup="cal_FOV(this.value)">
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



<table cellpadding="0" cellspacing="0" width="99%"  class="bdrAll mt20px  ml10px step2_form" style="display:none;" >

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
      Consignee Name
       </p>
    </td>
    
     <td colspan="3">
         <p class="ml20px p5px">
        <input type="text" placeholder="Enter Consignee Name" style="width:290px;" name="consignee_name" id="consignee_name" value="<?=$pack_res['consignee_name']?>" >
         </p>
    </td>
</tr>

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
    <!--  Name/-->Mobile/GST
       </p>
    </td>
    
     <td colspan="3">
         <p class="ml20px p5px">
    <!--    <input type="text" placeholder="Name" name="name" id="name" value="<?=$pack_res['name']?>"> -->
        <input type="number" placeholder="Mobile No." name="consignee_mobile" id="consignee_mobile" style="width:143px;" maxlength="10" value="<?=$pack_res['consignee_mobile']?>">
        <input type="text" placeholder="GST" name="consignee_gst" id="consignee_gst" style="width:143px;" value="<?=$pack_res['consignee_gst']?>">
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
             <textarea name="consignee_address" id="consignee_address" style="width:290px; height:70px; resize:none;"><?=$pack_res['consignee_address']?></textarea>
   <!--     <input type="text" placeholder="Address" name="address" id="address" style="width:470px;" value="<?=$pack_res['address']?>">-->
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
        <input type="text" placeholder="Said to Contain" name="said_to_contain" id="said_to_contain" value="<?=$pack_res['said_to_contain']?>" >
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
             
          <!--   <select name="type_nv" id="type_nv" style="width:154px; padding:4px;" onchange="show_hide_total_cft_field(this.value)">
                 <option value="">Select Type</option>
                 <option value="Normal" <?php if($pack_res['type_nv']=="Normal"){?>selected<?}?> >Normal</option>
                 <option value="Volumetric" <?php if($pack_res['type_nv']=="Volumetric"){?>selected<?}?> >Volumetric</option>
                 
             </select>-->
             
             Normal <input type="radio" name="type_nv" value="Normal" <?php if($pack_res['type_nv']=="Normal" || $pack_res['type_nv']==""){?>checked<?}?> onclick="show_hide_total_cft_field(this.value)">
             Volumetric <input type="radio" name="type_nv" value="Volumetric" <?php if($pack_res['type_nv']=="Volumetric"){?>checked<?}?> onclick="show_hide_total_cft_field(this.value)">
             
     <!--   <input type="text" placeholder="Enter Type *" name="type_nv" id="type_nv" value="<?=$pack_res['type_nv']?>">-->
         </p>
    </td>
    
     <td style="text-align: center;">
        <p class="b ml20px blue p5px">
   Total CFT *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter Total CFT *" name="total_cft" id="total_cft" value="<?=$pack_res['total_cft']?>" disabled onkeyup="calculate_cft(this.value)">
   
       <?php $sh_code=db_scalar("select shipper_code from tbl_shipper where shipper_id='$pack_res[shipper_id]' "); ?>
      <!-- <input type="hidden" name="one_cft_weight" id="one_cft_weight" value="<?=$pack_res['one_cft_weight']?>">-->
        <input type="hidden" name="one_cft_weight" id="one_cft_weight" value="<?=db_scalar("select tariff_volumetric from tbl_tariff where tariff_shipper_code='$sh_code' ")?>">
         </p>
    </td>
</tr>

<tr>
    <td style="text-align: center;">
        <p class="b ml20px blue p5px">
    Actual Weight (In Grams) *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter Actual Weight *" name="actual_weight" id="actual_weight" value="<?=$pack_res['actual_weight']?>" onchange="setChangeableWeight(this.value)">
         </p>
    </td>
    
     <td style="text-align: center;">
        <p class="b ml20px blue p5px">
    Chargeable Weight (In Grams) *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Chargeable Weight *" name="changeable_weight" id="changeable_weight" value="<?=$pack_res['changeable_weight']?>" onkeyup="calculate_total()">
         </p>
    </td>
</tr>


<tr>
    <td colspan="4">
        
<table cellpadding="0" cellspacing="0" width="100%"  class="bdrAll" >
    <tr>
        <td><p class="b ml20px blue p5px">Forwarder *</p></td>
        <td style="text-align: left;"><p class="b ml20px blue p5px">
            <select name="forwarder_user_id" id="forwarder_user_id" style="padding:5px;">

                <option value="">--- Choose Forwarder ---</option>
                <?php                                                       //and user_type='Branch'    
$sql_forw=db_query("select * from tbl_parcel_user where 1 and type='Forwarder'  order by user_id desc");
while($res_forw=mysql_fetch_array($sql_forw))
{
?>
                <option value="<?=$res_forw['user_id']?>" <?php if($pack_res['forwarder_user_id']==$res_forw['user_id']){?> selected <?}?>><?=$res_forw['user_name']?></option>
<?}?>
            </select>
        </p></td>
        
        <td><p class="b ml20px blue p5px">Airway Bill No.</p></td>
            <td style="text-align: left;">
            <p class="b ml20px blue p5px">
            <input type="text" name="forwarder_airway_bill_no" id="forwarder_airway_bill_no" value="<?=$pack_res['forwarder_airway_bill_no']?>"/>
            </p>
            </td>
        
        <td><p class="b ml20px blue p5px">Airway Bill Date</p></td>
          
            <td style="text-align: left;">
            <p class="b ml20px blue p5px">
            <input type="text" name="forwarder_airway_bill_date" id="forwarder_airway_bill_date" value="<?=$pack_res['forwarder_airway_bill_date']?>"/>
            </p>
            </td>
        
    </tr>
</table>    
      
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
        <input type="text" placeholder="Enter Freight" name="freight" id="freight" value="<?=$pack_res['freight']?>" onkeyup="calculate_total()">
         </p>
         
         
      
       <input type="hidden"  name="weight_upto" id="weight_upto" >
         <input type="hidden"  name="freight_rate" id="freight_rate" >
        <input type="hidden"  name="additional_weight" id="additional_weight" >
        <input type="hidden"  name="additional_charge" id="additional_charge" >
        
       <!-- <input type="text"  name="tariff_service_tax" id="tariff_service_tax" >        -->
         
         
    </td>
  
    
     <td style="text-align: center;">
        <p class="b ml20px blue p5px">
     Service Tax *
       </p>
    </td>
    
     <td >
         <p class="ml20px p5px">
        <input type="number" placeholder="Enter Service Tax *"  name="service_tax" id="service_tax" value="<?=$pack_res['service_tax']?>">
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
function setNextTab()
{
  document.getElementById('datepicker').focus();  
}


<?php
if(!empty($_SESSION['last_shipper_id']))
{?>
getShipperDetails(<?=$_SESSION['last_shipper_id']?>);
<?}?>

<?php
if($package_id!="")
{?>
   // getShipperDetails(<?=$pack_res['shipper_id']?>);
    cal_FOV(<?=$pack_res['invoice_value']?>);
    show_hide_total_cft_field("<?=$pack_res['type_nv']?>");
    calculate_cft(<?=$pack_res['total_cft']?>);
      $("#changeable_weight").val('<?=$pack_res[changeable_weight]?>');
      $("#service_tax").val('<?=$pack_res[service_tax]?>');
      $("#grand_total").val('<?=$pack_res[grand_total]?>');
     calculate_total(); 
      
    
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
           document.getElementById('shipper_gst').value=fetch_shipper_data.ship_gst;
           document.getElementById('shipper_gst_rate').value=fetch_shipper_data.ship_gst_rate;
           
           
           document.getElementById('shipper_address').value=fetch_shipper_data.ship_address;
           document.getElementById('shipper_docket_charge').value=fetch_shipper_data.ship_docket_charge;
           document.getElementById('shipper_fov').value=fetch_shipper_data.ship_fov;
           document.getElementById('shipper_fov_min').value=fetch_shipper_data.ship_fov_min;
           
           document.getElementById('shipper_handling_charge').value=fetch_shipper_data.ship_handling_charge;
           document.getElementById('shipper_other_charge').value=fetch_shipper_data.ship_other_charge;
          // document.getElementById('shipper_pickup_city').value=fetch_shipper_data.ship_city;
            document.getElementById("origin_city_name").value = fetch_shipper_data.ship_city;
            
            if(fetch_shipper_data.transit_mode!=null)
            {
            document.getElementById("transit_mode").value = fetch_shipper_data.transit_mode;
            }else{
                document.getElementById("transit_mode").value = "Surface";
            }
            document.getElementById("one_cft_weight").value = fetch_shipper_data.tariff_volumetric;
            
            
            
           setPickUpCity(fetch_shipper_data.ship_city);
            
           tariff_id=fetch_shipper_data.tariff_id;
           
            }
        });
}


function setPickUpCity(origin_cityName)
{
 document.getElementById('pickup_city').value=origin_cityName;
}


function setDeliveryBranchCity(delivery_branchCityName)
{
    document.getElementById('delivery_city').value=delivery_branchCityName; 
}



function cal_FOV(inv_value)
{
   var shipper_fov_percentage=$('#shipper_fov').val();
   var shipper_fov_min=$('#shipper_fov_min').val();
   var percentage_amount=(shipper_fov_percentage / 100) * inv_value;    
    
    
    if(inv_value!="" || inv_value>0)
    {
        
if(shipper_fov_percentage!="" || shipper_fov_percentage>0 || shipper_fov_min!="" || shipper_fov_min>0)
{
    if(percentage_amount>shipper_fov_min)
    {
        $('#shipper_fov_amount').val(percentage_amount);
        $("#shipper_fov_amount").attr("readonly", false); 
    }else if(shipper_fov_min>percentage_amount){
      $('#shipper_fov_amount').val(shipper_fov_min);  
        $("#shipper_fov_amount").attr("readonly", true); 
      
    }

}
    
   
  
    }
    
<?php/*
if($package_id!="")
{?>
calculate_total();
<?}*/?>
        
}


function show_hide_total_cft_field(typeNV)
{
if(typeNV=="Normal")
{
  $('#total_cft').attr("disabled", true);   
  $('#total_cft').val("");   
  
}else{
     $('#total_cft').attr("disabled", false);    
}

}


function calculate_cft(total_cft)
{
    
var one_cft_weight=$("#one_cft_weight").val();
var total_cft_weight=one_cft_weight*total_cft;    
  //  $("#actual_weight").val(total_cft_weight);
    $("#changeable_weight").val(total_cft_weight);
     calculate_total();
}


   function SetServiceTax(freight_amount)
        {
            //alert(freight_amount);
           // percent=document.getElementById("tariff_service_tax").value;
            percent=document.getElementById("shipper_gst_rate").value;
            price=freight_amount;
price = parseFloat(price);
percent = parseFloat(percent);
 
  var tax = (price / 100) * percent,
      grand = price * ((100 + percent) / 100);
 
 //alert(tax);
 //alert(grand);
 
  document.getElementById("service_tax").value = Math.round(tax);
// document.getElementById("grand_total").value = Math.round(grand);
//document.getElementById("grand_total").setAttribute("min", Math.round(grand)); 
  
 document.getElementById("grand_total").value = Math.round(freight_amount);
 document.getElementById("grand_total").setAttribute("min", Math.round(freight_amount));
        }
        

function calculate_total()
{
var total=0;

if($("#shipper_docket_charge").val()!="")
{
var docket_chrg=parseInt($("#shipper_docket_charge").val());
}else{
var docket_chrg=0;
}

if($("#shipper_handling_charge").val()!="")
{
var handling_chrg=parseInt($("#shipper_handling_charge").val());
}else{
var handling_chrg=0;
}
    

if($("#shipper_other_charge").val()!="")
{
var other_chrg=parseInt($("#shipper_other_charge").val());
}else{
var other_chrg=0;
}

if($("#shipper_fov_amount").val()!="")
{
var fov_amnt=parseInt($("#shipper_fov_amount").val());   
}else{
var fov_amnt=0;
}


var chargeableWeight=parseInt($("#changeable_weight").val());

if($("#freight").val()!="")
{
var freight_amnt=parseInt($("#freight").val());   
}else{
var freight_amnt=0;
}


if($("#weight_upto").val()!="")
{
var tarif_weight=parseInt($("#weight_upto").val());
}else{
var tarif_weight=0;
}

if($("#freight_rate").val()!="")
{
var tarif_rate=parseInt($("#freight_rate").val());
}else{
var tarif_rate=0;
}

if($("#additional_weight").val()!="")
{
var tarif_additional_weight=parseInt($("#additional_weight").val());
}else{
var tarif_additional_weight=1;
}

if($("#additional_charge").val()!="")
{
var tarif_additional_chrg=parseInt($("#additional_charge").val());
}else{
var tarif_additional_chrg=1;
}






total=docket_chrg+handling_chrg+other_chrg+fov_amnt;

if(chargeableWeight<=tarif_weight)
{
    total=total+tarif_rate;
   
}else{

var remaining_addi_weight=chargeableWeight-tarif_weight;

var remaining_addi_weight_cal=remaining_addi_weight/tarif_additional_weight;
    total_additional=Math.ceil(remaining_addi_weight_cal)*tarif_additional_chrg;
    


total=total+total_additional+tarif_rate;
}
total=total+freight_amnt;

//alert(total);
SetServiceTax(total);

}



function setChangeableWeight(actual_weight)
{
    
if(($("input[name=type_nv]:checked").val())=="Normal")
{
   $("#changeable_weight").val(actual_weight); 
}
 calculate_total();
    
}


$(document).ready(function(){
var airway_bill_no="";   
var booking_date="";
var customer_code_shipper_id="";
var origin_city_name="";
var shipper_docket_charge="";
var shipper_handling_charge="";
var shipper_other_charge="";
var shipper_fov="";
var shipper_fov_min="";
var pickup_city="";
var destination_city="";
var delivery_city="";
var payment_mode="";
var transit_mode="";











$("#next_btn").click(function(){
   
      
airway_bill_no=$('#airway_bill_no').val();
booking_date=$('#datepicker').val();
customer_code_shipper_id=$('#customer_code_shipper_id').val();
origin_city_name=$('#origin_city_name').val();
shipper_docket_charge=$('#shipper_docket_charge').val();
shipper_handling_charge=$('#shipper_handling_charge').val();
shipper_other_charge=$('#shipper_other_charge').val();
shipper_fov=$('#shipper_fov').val();
shipper_fov_min=$('#shipper_fov_min').val();
pickup_city=$('#pickup_city').val();
destination_city=$('#destination_city').val();
delivery_city=$('#delivery_city').val();
payment_mode=$('#payment_mode').val();
transit_mode=$('#transit_mode').val();



if(airway_bill_no==''){		
alert("Enter Airway Bill No. !");
document.getElementById('airway_bill_no').focus();
return false;
}


if(booking_date==''){		
alert("Select Booking Date !");
document.getElementById('datepicker').focus();
return false;
}


if(customer_code_shipper_id==''){		
alert("Select Customer Code !");
document.getElementById('customer_code_shipper_id').focus();
return false;
}

/*if(shipper_docket_charge==''){		
alert("Enter Docket Charge !");
document.getElementById('shipper_docket_charge').focus();
return false;
}*/

/*if(shipper_handling_charge==''){		
alert("Enter Handling Charge !");
document.getElementById('shipper_handling_charge').focus();
return false;
}*/
/*if(shipper_other_charge==''){		
alert("Enter Other Charge !");
document.getElementById('shipper_other_charge').focus();
return false;
}


if(shipper_fov==''){		
alert("Enter FOV % !");
document.getElementById('shipper_fov').focus();
return false;
}

if(shipper_fov_min==''){		
alert("Enter FOV Minimum !");
document.getElementById('shipper_fov_min').focus();
return false;
}*/

if(origin_city_name==''){		
alert("Select Origin !");
document.getElementById('origin_city_name').focus();
return false;
}

if(pickup_city==''){		
alert("Select Pick Up City !");
document.getElementById('pickup_city').focus();
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

if(payment_mode==''){		
alert("Select Payment Mode !");
document.getElementById('payment_mode').focus();
return false;
}

if(transit_mode==''){		
alert("Select Transit Mode !");
document.getElementById('transit_mode').focus();
return false;
}





$.ajax({
url:"get_booking_freight_ajax.php",
type:"POST",
data:{from_city:pickup_city,destination_city:destination_city,tariff_id:tariff_id},
success:function(data){

var fetch_tariff_data=JSON.parse(data);
document.getElementById('freight_rate').value=fetch_tariff_data.freight_rate;
document.getElementById('weight_upto').value=fetch_tariff_data.weight_upto;
document.getElementById('additional_weight').value=fetch_tariff_data.additional_weight;
document.getElementById('additional_charge').value=fetch_tariff_data.additional_charge;
//document.getElementById('tariff_service_tax').value=fetch_tariff_data.service_tax;

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
  
var no_of_package="";
var type_nv="";
var total_cft="";
var actual_weight="";
var changeable_weight="";
var forwarder_user_id="";
var service_tax="";
var grand_total="";

no_of_package=$('#no_of_package').val();
type_nv=$("input[name='type_nv']:checked").val();
total_cft=$('#total_cft').val();
actual_weight=$('#actual_weight').val();
changeable_weight=$('#changeable_weight').val();
forwarder_user_id=$('#forwarder_user_id').val();
service_tax=$('#service_tax').val();
grand_total=$('#grand_total').val();





/*if(mobile!="")
{
    if(mobile.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('mobile').focus();
	return false;
}
}*/



if(no_of_package=="")
{
alert("Enter No. Of Package !");
document.getElementById('no_of_package').focus();
return false; 
}

/*if(isNaN(no_of_package)){
	alert("Enter Numeric Value Only !");
	document.getElementById('no_of_package').focus();
	return false;
}*/

if(type_nv=="")
{
alert("Select Type !");
document.getElementById('type_nv').focus();
return false; 
}

if(type_nv=="Volumetric")
{
if(total_cft=="")
{
alert("Enter Total CFT !");
document.getElementById('total_cft').focus();
return false; 
}
}


if(actual_weight=="")
{
alert("Enter Actual Weight !");
document.getElementById('actual_weight').focus();
return false; 
}


if(changeable_weight=="")
{
alert("Enter Changeable Weight !");
document.getElementById('changeable_weight').focus();
return false; 
}

if(forwarder_user_id=="")
{
alert("Select Forwarder !");
document.getElementById('forwarder_user_id').focus();
return false; 
}



if(service_tax=="")
{
alert("Enter Service Tax !");
document.getElementById('service_tax').focus();
return false; 
}



if(grand_total=="")
{
alert("Enter Grand Total !");
document.getElementById('grand_total').focus();
return false; 
}



}
</script>
  <script>
    
/*function show_cheque_number_field() {

var checked_payment_mode = document.querySelector('input[name = "payment_mode"]:checked');

if(checked_payment_mode != null){ 
if(checked_payment_mode.value=="Cheque")
{
  document.getElementById("cheque_number").style.display = "block";     
}else{
  document.getElementById("cheque_number").style.display = "none";  
}


} 

}*/

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
