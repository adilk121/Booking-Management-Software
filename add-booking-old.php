<?php include('header.php');  ?>
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


  
  <tr>
    
	
<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >	
<?php include('left-menu.php'); ?>
</td>
	
<td valign="top" width="83%"><p class="b xlarge mt10px ml10px"><i class="fa fa-truck"></i> Add Booking 
<a href="manage-booking.php" class="mr20px  fr " style="color:#0033CC;font-size:14px"><i class="fa fa-arrow-circle-left"></i> Go back</a>	</p>
<p class="bdr0 m5px mr30px"></p>


<script>
$(function() {
    $("#docket_number").autocomplete({
        source: "manage-booking-autocomplete.php",
        
    });
});
</script>

<form method="post" action="add-package-db-file.php" id="myform">
<?php
$dock=$_REQUEST['dock_no'];
$sql_dock=db_query("select * from tbl_package where docket_number='$dock' ");

$res_dock=mysql_fetch_array($sql_dock);

?>
<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">
<tr>
	<th>
<p class="b ml20px blue p5px">Docket Number * 
<input type="text" name="docket_number" value="<?=$res_dock['docket_number']?>" <?php if($res_dock['docket_number']!="") {?> readonly <?}?> id="docket_number" >
</p>
	</th>



<td ><p class="p5px b blue ml10px"> Type Of Shipment *
<select name="shipment_type" id="shipment_type" style="height:23px;width:180px;"  >
<option value="">Select Shipment Type * </option>
<option value="document" <?php if($res_dock['shipment_type']=='document'){ ?> selected="selected" <? } ?>  >Document</option>
<option value="non_document" <?php if($res_dock['shipment_type']=='non_document'){ ?> selected="selected" <? }  ?> >Non Document</option>


</select>
</p></td>
</tr>



<tr style="text-align: center;">

<td  ><p class="b ml20px blue p5px">Shipment From * </p></td>
 
<td ><p class="b ml20px blue p5px">Receive To *</p></td>



</tr>



<tr style="text-align: center;">

<td  >
<p class="p5px ml10px">


<select name="package_from" id="package_from" style="height:23px;width:180px;"  onchange='CheckOther(this.value);'>
	<option value="">Select Origin *</option>

<?php
 
$sql=db_query("select * from tbl_shipper where shipper_type='Client'");

while($res=mysql_fetch_array($sql))
{

?>
	<option value="<?=$res['shipper_code']?>" <?php if($res_dock['shipper_code']==$res['shipper_code']){ ?> selected="selected" <? } ?>   ><?=$res['shipper_name']?> (<?=$res['shipper_code']?>)</option>

<?}?>

	<option value="other" id="other"  <?php if($res_dock['shipper_type']=='Other'){ ?> selected="selected" <? } ?> >Other</option>

</select>
</p>

<span id="show_other" <?php  if($res_dock['shipper_type']=='Other') { ?>style="display: inline;"<?} else {?>     style="display: none;" <?}?>   > 
<p style="padding:10px;">
<?php
$sql_oth=db_query("select * from tbl_shipper_details where docket_number='$dock' and sh_type='Other' ");
$res_oth=mysql_fetch_array($sql_oth);
?>
<input type="text" placeholder="Name *" name="other_name" id="other_name" value="<?=$res_oth['sh_name']?>"  >
<input type="text" placeholder="Street *" name="other_street" id="other_street"  value="<?=$res_oth['sh_street']?>" >
<input type="text" placeholder="City" name="other_city"  id="other_city" value="<?=$res_oth['sh_city']?>"  >

</p>

<p style="padding:10px;">
<input type="text" placeholder="Distict *" name="other_distict" id="other_distict"  value="<?=$res_oth['sh_distict']?>"   >
<input type="text" placeholder="State *" name="other_state" id="other_state"  value="<?=$res_oth['sh_state']?>"  >
<input type="text" placeholder="Email *" name="other_email" id="other_email"  value="<?=$res_oth['sh_email']?>" > 
</p>
<p style="padding:10px;">
<input type="text" placeholder="Mobile No. *" name="other_mobile" id="other_mobile" maxlength="10"  value="<?=$res_oth['sh_mobile']?>"  >
<input type="text" placeholder="PIN *" name="other_pin" id="other_pin"  value="<?=$res_oth['sh_pin']?>"  >
<input type="text" placeholder="GST IN" name="other_gst" id="other_gst" value="<?=$res_oth['sh_gst']?>"  > 
</p>

</span>


</td>
 
<td >
<p style="padding:10px;">

<?php
/*
 $r_name=db_scalar("select receiver_name from tbl_receiver where docket_number='$res_dock[docket_number]' ");
$r_address1=db_scalar("select receiver_address1 from tbl_receiver where docket_number='$res_dock[docket_number]' ");
$r_address2=db_scalar("select receiver_address2 from tbl_receiver where docket_number='$res_dock[docket_number]' ");
$r_pin=db_scalar("select receiver_pin from tbl_receiver where docket_number='$res_dock[docket_number]' ");
$r_phone=db_scalar("select receiver_phone from tbl_receiver where docket_number='$res_dock[docket_number]' ");
$r_remark=db_scalar("select receiver_remark from tbl_receiver where docket_number='$res_dock[docket_number]' ");

*/

 ?>
<?php
$sql_rec=db_query("select * from tbl_receiver where docket_number='$dock' ");
$res_rec=mysql_fetch_array($sql_rec);
?>

<input type="text" placeholder="Name *" name="receiver_name" id="receiver_name" value="<?=$res_rec['receiver_name']?>" >
<input type="text" placeholder="address 1 *" name="receiver_address1" id="receiver_address1" value="<?=$res_rec['receiver_address1']?>" >
<input type="text" placeholder="address 2" name="receiver_address2"  id="receiver_address2" value="<?=$res_rec['receiver_address2']?>" >
</p>

<p style="padding:10px;">
<input type="text" placeholder="pin *" name="receiver_pin" id="receiver_pin" value="<?=$res_rec['receiver_pin']?>" >
<input type="text" placeholder="phone *" name="receiver_phone" id="receiver_phone" maxlength="10" value="<?=$res_rec['receiver_phone']?>"  >
<input type="text" placeholder="remark" name="receiver_remark" id="receiver_remark" value="<?=$res_rec['receiver_remark']?>" >
</p>


</td>


 


</tr>

</table>


<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">


<tr>
<td colspan="4" style="width:100%;">

<table style="width:100%;" >


<tr>
<td style="width:25%;">
	<p class="b ml20px blue p5px">
COD (Cash On Delivery)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required checked id="myCheck" class="cod" value="cod" name="COD" <?php if($res_dock['payment_mode']=='cod'){ ?>checked <?}?> onclick="myFunction()">
<br>
DOD (Draft On Delivery)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required id="myCheck" name="COD" class="dod" value="dod" <?php if($res_dock['payment_mode']=='dod'){ ?>checked <?}?> onclick="myFunction()">

</p></td>
<!-- <td>   
	<p>	 &nbsp;&nbsp;<input type="checkbox" name="above_100" id="above_100" onclick="show_above100()">
</p>
</td> -->

<td  >


<div  id="cod"  <?php if($res_dock['payment_mode']=='cod') {?> style="display: inline;" <?} else if($res_dock['payment_mode']=='dod') {?> style="display: none;" <?}?>   >
	<p class=" ml20px  p5px">
COD Amount * <input type="text"  name="cod_amount" id="cod_amount" placeholder=""  value="<?=$res_dock['cod_amount']?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shipper Bank Account No. * <input name="cod_shipper_ac_no" id="cod_shipper_ac_no" value="<?=$res_dock['bank_account_no']?>" type="text"> 
for Direct Credit * <input name="direct_credit" id="direct_credit" value="yes" type="checkbox" <?php if($res_dock['direct_credit']=="yes"){ ?>checked<?}?> >
</p>
</div>


<div id="dod" <?php if($res_dock['payment_mode']=='cod') {?> style="display: none;" <?} else if($res_dock['payment_mode']=='dod') {?> style="display: inline;" <?} else {?>style="display:none;" <?}?>  >
	<p class=" ml20px  p5px">
DOD Amount * <input type="text"  name="dod_amount" id="dod_amount" value="<?=$res_dock['dod_amount']?>"  placeholder="">
</p>
</div>


</td>
</tr>



</table>

</td>

</tr>







<tr>
<td colspan="4" style="width:100%;">

<table style="width:100%;" >

<tr>
	
<td width="275"><p class="b ml20px blue p5px">Risk Coverage * </p></td>

<td>

	<p class="ml20px  p5px">

<select  style="padding:5px;" name="risk_coverage" id="risk_coverage" >
		<option value="">Select Risk *</option>
<option value="owner_risk" <?php if($res_dock['risk']=='owner_risk'){ ?> selected="selected" <? } ?> >Owner's Risk</option>
<option value="carrier_risk"  <?php if($res_dock['risk']=='carrier_risk'){ ?> selected="selected" <? } ?>  >Carrier's Risk</option>
<option value="no_risk" <?php if($res_dock['risk']=='no_risk'){ ?> selected="selected" <? } ?> >No Risk</option>

</select>
</p></td>

	
</tr>

<tr>
	
<td width="257"><p class="b ml20px blue p5px">Transport Mode *</p></td>
<td>

	<p class="ml20px  p5px">

<select  style="padding:5px;" name="transport_mode" id="transport_mode"  >
	<option value="">Select Mode *</option>
<option value="air"  <?php if($res_dock['transport_mode']=='air'){ ?> selected="selected" <? } ?> >Air</option>
<option value="surface"  <?php if($res_dock['transport_mode']=='surface'){ ?> selected="selected" <? } ?> >Surface</option>
<option value="cargo"     <?php if($res_dock['transport_mode']=='cargo'){ ?> selected="selected" <? } ?> >Cargo</option>

</select>
</p></td>

</tr>


</table>
</td>
</tr>






</table>





<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">


<tr>
<td colspan="4" style="width:100%;">

<table style="width:100%;" >
<tr>



<td >
	<p class="b ml20px blue p5px">
Total Number Of Package *<input type="text" id="count_pcs" name="no_of_package" value="<?=$res_dock['no_of_package']?>"  onkeyup="count();" > 

</p>
</td>

<td ><p class="b ml20px blue p5px">Said to Contain * <input name="contain" id="contain" type="text" value="<?=$res_dock['contain']?>"></p></td>
<td><p class="b ml20px blue p5px">Decleared value * <input type="text" id="decleared_value" name="decleared_value" value="<?=$res_dock['decleared_value']?>" onkeyup="getVal();" ></p></td>
</tr>
<!-- 

<input type="text" id="show_l" placeholder="L">
<input type="text" id="show_b" placeholder="B">
<input type="text" id="show_h" placeholder="H">
 -->


</table>
		<table id="show" width="100%">


		</table>


<table width="100%">
	<tr>

		<td>
			<p class='b ml20px blue p5px'>Actual Weight <input type="text" placeholder=" (kg)" id="actu" name="actual_weight"  value="<?=$res_dock['actual_weight']?>"></p>
		</td>
	<td>
			<p class='b ml20px blue p5px'>Volumetric Weight <input type="text" placeholder=" (kg)" id="volu" name="volumetric_weight" value="<?=$res_dock['volumetric_weight']?>"></p>
		</td>
		<td>
			<p class='b ml20px blue p5px'>Chargeable Weight <input type="text" placeholder=" (kg)" id="chrg_wt" name="chargeable_weight" value="<?=$res_dock['chargeable_weight']?>"></p>
		</td>
	</tr>

</table>


<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">






<tr style="text-align: center;">

<td  ><p class="b ml20px blue p5px">Customer Reference Number </p></td>
 
<td colspan="3"><p class="b ml20px blue p5px"><input type="text" name="cus_ref_no" id="cus_ref_no" value="<?=$res_dock['reference_no']?>" ></p></td>


</tr>
<tr style="text-align: center;">

<td  ><p class="b ml20px blue p5px">Remarks </p></td>
 
<td colspan="3"><p class="b ml20px blue p5px"><input type="text" name="remarks" id="remarks" value="<?=$res_dock['remarks']?>" ></p></td>


</tr>

</table>


<table width="99%">
	

<tr id="waybill_show" <?php  if($res_dock['way_bill_no']!="") {?> style="display: inline; text-align: center;"<?} else{ ?> style="text-align: center; display: none;"  <?}?> >
	
<td style="width: 600px;"><p class='b ml20px blue p5px'> Way Bill Number * </p></td>             
       <td style="width: 600px;"><p class='b ml20px blue p5px'>
       	<input type='text' name='way_bill_no' id='way_bill_no' value="<?=$res_dock['way_bill_no']?>" ></td>   
</tr>
</table>


<table width="99%">	
<tr style="text-align: center;" >

<td ><p class="b ml20px blue p5px">
	<input type="submit" id="submit" name="submit" <?php if($_REQUEST['dock_no']!=""){  ?>  value="Update"<?}?> value="Save">
	</p></td>
 

</tr>





</table>


</td></tr></table>



  </form>

<script>

  $(document).ready(function(){
       $('#docket_number').change(function(){
        var docket_number1=$('#docket_number').val();
       
        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{docket_number:docket_number1, type:"DOCKET"},
            success:function(data){
           
                if(data!=""){
                     var con_value="";
                     con_value=confirm(" Docket is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="add-booking.php?dock_no="+data;
                    }else{
                    $('#submit').attr("disabled","disabled");
                    $('#submit').css({"cursor":"no-drop"});
                    }
                    
                    
                    
                 /*   alert("Docket Number is already exist !");
                    $('#submit').attr("disabled","disabled");
                    $('#submit').css({"cursor":"no-drop"});
                }else{
                    $('#submit').attr("disabled",false);
                    $('#submit').css({"cursor":"pointer"});*/
                }else if(data=="")
                {
     $('#submit').attr("disabled",false);
      $('#submit').css({"cursor":"pointer"});
                }
            }
        });
    });
   });
</script>


<script>
$(document).ready(function(){
$("#submit").click(function(){

var docket_number = $("#docket_number").val();


var shipment_type = $("#shipment_type").val();
var btn = $("#submit").val();



var package_from = $("#package_from").val();


var other_name = $("#other_name").val();

var other_street = $("#other_street").val();
var other_city = $("#other_city").val();
var other_distict = $("#other_distict").val();
var other_state = $("#other_state").val();
var other_email = $("#other_email").val();

var other_mobile = $("#other_mobile").val();
var other_pin = $("#other_pin").val();
var other_gst = $("#other_gst").val();


var receiver_name = $("#receiver_name").val();
var receiver_address1 = $("#receiver_address1").val();
var receiver_address2 = $("#receiver_address2").val();
var receiver_pin = $("#receiver_pin").val();
var receiver_phone = $("#receiver_phone").val();
var receiver_remark = $("#receiver_remark").val();



var cod_amount = $("#cod_amount").val();

var cod_shipper_ac_no = $("#cod_shipper_ac_no").val();
var direct_credit = $("input[name='direct_credit']:checked").val();


var dod_amount = $("#dod_amount").val();
var risk_coverage = $("#risk_coverage").val();
var transport_mode = $("#transport_mode").val();
var no_of_package = $("#count_pcs").val();


var contain = $("#contain").val();
var decleared_value = $("#decleared_value").val();

var way_bill_no= $("#way_bill_no").val();

var actual_weight = $("#actu").val();
var volumetric_weight = $("#volu").val();
var chargeable_weight = $("#chrg_wt").val();

var ref_no = $("#cus_ref_no").val();
var remarks = $("#remarks").val();




if(docket_number==''){		
alert("Enter Docket Number !");
document.getElementById('docket_number').focus();
return false;
}	

if(shipment_type==''){		
alert("Please Select Shipment Type !");
document.getElementById('shipment_type').focus();
return false;
}	



if(package_from==''){	
alert("Please Select Origin !");
document.getElementById('package_from').focus();
return false;
} 

if(package_from=='other')
{

if(other_name==''){		
alert("Enter Shipper Name !");
document.getElementById('other_name').focus();
return false;
}	
if (!other_name.match(/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/)){
alert("Please enter only alphabets !");
document.getElementById('other_name').value='';
document.getElementById('other_name').focus();
return false;
}



if(other_street==''){		
alert("Enter Shipper Street !");
document.getElementById('other_street').focus();
return false;
}	


if(other_city==''){		
alert("Enter Shipper City !");
document.getElementById('other_city').focus();
return false;
}	

if(other_distict==''){		
alert("Enter Shipper Distict !");
document.getElementById('other_distict').focus();
return false;
}	
if(other_state==''){		
alert("Enter Shipper State !");
document.getElementById('other_state').focus();
return false;
}	


var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(other_email=='')
  {
	  alert('Enter Shipper Email Id');
	  document.getElementById('other_email').focus();
	  return false;
  }else if(!other_email.match(mailformat)){
alert("You have entered an invalid email address!");
document.getElementById('other_email').focus();
return false;
}



var mobno=document.getElementById('other_mobile').value;
if(document.getElementById('other_mobile').value==0){
	alert("Enter shipper mobile no.!");
	document.getElementById('other_mobile').focus();
	return false;
}
if(isNaN(document.getElementById('other_mobile').value)){
	alert("Mobile no. should be no.!");
	document.getElementById('other_mobile').focus();
	return false;
}
if(mobno.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('other_mobile').focus();
	return false;
}

if(other_pin==''){		
alert("Enter shipper PIN code !");
document.getElementById('other_pin').focus();
return false;
}	
/*
if(gst==''){		
alert("Enter GST Number !");
document.getElementById('shipper_gst').focus();
return false;
}	
*/

}




if(receiver_name==''){	
alert("Enter Receiver Name !");
document.getElementById('receiver_name').focus();
return false;
} 

if (!receiver_name.match(/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/)){
alert("Please enter only alphabets !");
document.getElementById('receiver_name').value='';
document.getElementById('receiver_name').focus();
return false;
}

if(receiver_address1==''){	
alert("Enter Receiver Address !");
document.getElementById('receiver_address1').focus();
return false;
} 

if(receiver_pin==''){	
alert("Enter Receiver Pin !");
document.getElementById('receiver_pin').focus();
return false;
} 

if(receiver_phone==''){	
alert("Enter Receiver Phone Number !");
document.getElementById('receiver_phone').focus();
return false;
} 




var mobno=document.getElementById('receiver_phone').value;
if(document.getElementById('receiver_phone').value==0){
	alert("Enter your mobile no.!");
	document.getElementById('receiver_phone').focus();
	return false;
}
if(isNaN(document.getElementById('receiver_phone').value)){
	alert("Mobile no. should be no.!");
	document.getElementById('receiver_phone').focus();
	return false;
}
if(mobno.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('receiver_phone').focus();
	return false;
}


//var cod = $(".cod").val();




var payment_method = $("input[name='COD']:checked").val();

if(payment_method=="cod")
{


if(cod_amount==''){	
alert("Enter COD Amount !");
document.getElementById('cod_amount').focus();
return false;
} 

if(isNaN(document.getElementById('cod_amount').value)){
	alert("COD Amount should be no.!");
	document.getElementById('cod_amount').focus();
	return false;
}


if(cod_shipper_ac_no==''){	
alert("Enter Bank Account Number !");
document.getElementById('cod_shipper_ac_no').focus();
return false;
}


}

if(payment_method=="dod")
{



if(dod_amount==''){	
alert("Enter DOD Amount !");
document.getElementById('dod_amount').focus();
return false;
} 

if(isNaN(document.getElementById('dod_amount').value)){
	alert("DOD Amount should be no.!");
	document.getElementById('dod_amount').focus();
	return false;
}


}

if(risk_coverage==''){	
alert("Please Select Risk Coverage !");
document.getElementById('risk_coverage').focus();
return false;
} 

if(transport_mode==''){	
alert("Please Select Transport Mode !");
document.getElementById('transport_mode').focus();
return false;
}

 
if(no_of_package==''){	
alert("Enter Number Of Package !");
document.getElementById('count_pcs').focus();
return false;
} 


if(isNaN(document.getElementById('count_pcs').value)){
	alert("Enter Numeric Value Only!");
	document.getElementById('count_pcs').focus();
	return false;
}


 
if(contain==''){	
alert("Enter Contain Type !");
document.getElementById('contain').focus();
return false;
} 
 
if(decleared_value==''){	
alert("Enter Decleared Value !");
document.getElementById('decleared_value').focus();
return false;
}

if(isNaN(document.getElementById('decleared_value').value)){
	alert("Enter Numeric Value Only!");
	document.getElementById('decleared_value').focus();
	return false;
} 


if(decleared_value>=50000)
{
if(way_bill_no=='')
{
alert("Enter Way Bill Number !");
document.getElementById('way_bill_no').focus();
return false;

}
	
}


var i=1;
var weight=[];
var le=[];
var be=[];
var he=[];

for(i=1; i<=no_of_package; i++)
{
weight[i]=document.getElementById('weight'+i).value;
le[i]=document.getElementById('l'+i).value;
be[i]=document.getElementById('b'+i).value;
he[i]=document.getElementById('h'+i).value;

}



// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "add-package-db-file.php",
/*data: {docket_number:docket_number, shipment_type:shipment_type, package_from:package_from, other_name:other_name, other_address1:other_address1, other_address2:other_address2, other_pin:other_pin, other_phone:other_phone, other_remark:other_remark, ,receiver_name:receiver_name, receiver_address1:receiver_address1, receiver_address2:receiver_address2, receiver_pin:receiver_pin, receiver_phone:receiver_phone, receiver_remark:receiver_remark, cod_amount:cod_amount, cod_shipper_ac_no:cod_shipper_ac_no, direct_credit:direct_credit, dod_amount:dod_amount, risk_coverage:risk_coverage, transport_mode:transport_mode, no_of_package:no_of_package, contain:contain, decleared_value:decleared_value, way_bill_no:way_bill_no, actual_weight:actual_weight,volumetric_weight:volumetric_weight, chargeable_weight:chargeable_weight, ref_no:ref_no},*/

data: {docket_number:docket_number, shipment_type:shipment_type, package_from:package_from, other_name:other_name, other_street:other_street, other_city:other_city, other_distict:other_distict,other_state:other_state,other_email:other_email,other_mobile:other_mobile,other_pin:other_pin,other_gst:other_gst, receiver_name:receiver_name, receiver_address1:receiver_address1, receiver_address2:receiver_address2, receiver_pin:receiver_pin, receiver_phone:receiver_phone, receiver_remark:receiver_remark,payment_method:payment_method, cod_amount:cod_amount, cod_shipper_ac_no:cod_shipper_ac_no, direct_credit:direct_credit, dod_amount:dod_amount, risk_coverage:risk_coverage, transport_mode:transport_mode, no_of_package:no_of_package, contain:contain, decleared_value:decleared_value, way_bill_no:way_bill_no, actual_weight:actual_weight,volumetric_weight:volumetric_weight, chargeable_weight:chargeable_weight, ref_no:ref_no, weight:weight, le:le, be:be, he:he, remarks:remarks, btn:btn},

cache: false,
success: function(result){
<?php 

$msg="";

if($res_dock['docket_number']!="")
{  
$msg="Package Details Updated Successfully";
}
else
{
	$msg="Package Details Submitted Successfully";
}
?>
alert("<?=$msg?>");
window.location.href = "manage-booking.php";
//alert("Data Submitted successfully");
//window.location.href = "manage-shipper.php";
}
});

return false;
});





});





</script>




<script type="text/javascript">



function CheckOther(val){
 var show=document.getElementById('show_other');


 if(val=='other')
 {


   show.style.display='inline';
 }else  
  { show.style.display='none';}




}
<?php if($res_dock['no_of_package']!=""){
$sql_weight=db_query("select * from tbl_package_details where docket_number='$res_dock[docket_number]' ");
$num=mysql_num_rows($sql_weight);
$i=0; 
while($res_weight=mysql_fetch_array($sql_weight))
{ 
$i++;

	?>


document.getElementById("show").innerHTML+="<tr><td rowspan=2><p class='b ml20px blue p5px'> S.N <?=$i?></p></td>     <td rowspan=2><p class='b ml20px blue p5px'><input type='text' placeholder='Weight In Kg' id='weight<?=$i?>' value='<?=$res_weight[package_weight]?>' name='weight<?=$i?>'  onchange='weightFun()'></td>    <td><p class='b ml20px blue p5px'><input type='text'  placeholder=' Length (In cm) ' id='l<?=$i?>' name='l<?=$i?>' value='<?=$res_weight[package_length]?>' onchange='weightFun()'> </p></td>     <td><p class='b ml20px blue p5px'> <input type='text' placeholder=' Breadth (In cm)' id='b<?=$i?>'  name='b<?=$i?>' value='<?=$res_weight[package_breadth]?>' onchange='weightFun()'> </p></td>   <td><p class='b ml20px blue p5px'><input type='text' placeholder=' Height (In cm)' id='h<?=$i?>' name='h<?=$i?>' value='<?=$res_weight[package_height]?>' onchange='weightFun()'> </p></td>   </tr>";


 



<?}?>


<?}?>


function getVal()
{
	 d_value=document.getElementById("decleared_value").value;
var s=document.getElementById("waybill_show");
	 if(d_value>=50000)
{
s.style.display='inline';      

}else {
s.style.display='none';
}	
	
}


<?php if($res_dock['no_of_package']!=""){?>

var count_pcs="<?php echo $num ?>"; 

<?}?>
var count_pcs;


function count()
{
	 count_pcs=document.getElementById("count_pcs").value;
	var cou=parseInt(count_pcs);
document.getElementById("show").innerHTML="";
	for(var i=1; i<=cou; i++)
	{
		document.getElementById("show").innerHTML+="<tr><td rowspan=2><p class='b ml20px blue p5px'> S.N "+i+"</p></td>                    <td rowspan=2><p class='b ml20px blue p5px'><input type='text' placeholder='Weight In Kg' id='weight"+i+"' name='weight"+i+"'  onchange='weightFun()'></td>         <td><p class='b ml20px blue p5px'><input type='text'  placeholder=' Length (In cm) ' id='l"+i+"' name='l"+i+"' onchange='weightFun()'> </p></td>          <td><p class='b ml20px blue p5px'> <input type='text' placeholder=' Breadth (In cm)' id='b"+i+"'  name='b"+i+"' onchange='weightFun()'> </p></td>              <td><p class='b ml20px blue p5px'><input type='text' placeholder=' Height (In cm)' id='h"+i+"' name='h"+i+"'onchange='weightFun()'> </p></td>  </tr>               ";
		
	}
	
}



function weightFun() {

var cou=parseInt(count_pcs);
var a=0;
var ll=0;
var bb=0;
var hh=0;


for(var j=1; j<=cou; j++)
{

var w = parseInt(document.getElementById("weight"+j+"").value || 0);
a=w+parseInt(a);

  document.getElementById("actu"). value=a; 

var x = parseInt(document.getElementById("l"+j+"").value || 0);
var y = parseInt(document.getElementById("b"+j+"").value || 0);
var z = parseInt(document.getElementById("h"+j+"").value || 0);

ll=x+parseInt(ll);
bb=y+parseInt(bb);
hh=z+parseInt(hh);





  
  }


var vol=parseInt((ll*bb*hh)*cou/5000);


 document.getElementById("volu"). value=vol; 

if(a>vol)
{
	 document.getElementById("chrg_wt"). value=a; 

	}
		else
	{
 document.getElementById("chrg_wt"). value=vol; 

	}


}



function myFunction() {

  var x = document.getElementById("myCheck");


if(x.checked)
{
document.getElementById("cod").style.display = "block";
document.getElementById("dod").style.display = "none";

document.getElementById('dod_amount').value="";


}
else
{

document.getElementById("dod").style.display = "block";
document.getElementById("cod").style.display = "none";

document.getElementById('cod_amount').value="";
document.getElementById('cod_shipper_ac_no').value="";
        $("#direct_credit").prop("checked", false);

}


}


</script> 


<!-- 

////////////////////////////////
<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">

<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">OFFICIAL INFORMATION</td></tr>
<tr>

<td width="148"><p class="b blue p5px ml20px">Employee Code </p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_code" value="<?=$employee_code?>" readonly="" title="Enter employee code" style="height:23px; width:180px;font-weight:bold;color:#666666"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Department </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">

<select name="emp_dpt"  title="Choose employee department" style="height:23px; width:180px;"   required="" onchange="fetch_emp(this.value)" >
<option value="">Select Department</option>

<option value="Marketing" <?php if($emp_dpt=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option value="Back Office" <?php if($emp_dpt=='Back Office'){?> selected="selected" <?php }?>>Back Office</option>
<option value="H.R." <?php if($emp_dpt=='H.R.'){?> selected="selected" <?php }?>>H.R.</option>
<option value="Accounts" <?php if($emp_dpt=='Accounts'){?> selected="selected" <?php }?>>Accounts</option>
<option value="Admin" <?php if($emp_dpt=='Admin'){?> selected="selected" <?php }?>>Admin</option>

</select>

</p></td>

</tr>



<tr>

<td width="148"><p class="b blue p6px ml20px">Designation </p></td>

<td width="739"><p class="p5px ml10px">


<?php /*?><input type="text" name="emp_desination" value="<?=$emp_desination?>" title="Enter employee desination" style="height:23px; width:180px;"    /></p><?php */?>

<select  name="emp_desination" id="emp_desination" title="Choose employee desination" style="width:183px;padding:3px;" required=""  onchange="show_desig(this.value)"  >
<option value="" >Select One</option>
<option value="Team Leader" <?php if($emp_desination=='Team Leader'){?> selected="selected" <?php }?>>Team Leader</option>
<option value="Executive" <?php if($emp_desination=='Executive'){?> selected="selected" <?php }?>>Executive</option>
<option value="Programmer" <?php if($emp_desination=='Programmer'){?> selected="selected" <?php }?>>Programmer</option>
<option value="Designer" <?php if($emp_desination=='Designer'){?> selected="selected" <?php }?>>Designer</option>
<option value="SEO" <?php if($emp_desination=='SEO'){?> selected="selected" <?php }?>>SEO</option>
<option value="Project Coordinator" <?php if($emp_desination=='Project Coordinator'){?> selected="selected" <?php }?>>Project Coordinator</option>
<option value="Others" <?php if($emp_desination=='Others'){?> selected="selected" <?php }?>  >Others</option>
</select>


<input type="text" name="emp_desination_others" id="emp_desination_others" value="<?=$emp_desination_others?>" title="Enter employee designation" style="height:18px; width:125px;margin-right:10px;display:none;float:right"  placeholder="    Enter Designation"   />

</td>

<td width="148"><p class="b blue p6px ml20px">Under </p></td>

<td width="739">

<div id="show_emp" class="p5px ml10px"  >
<select  name="emp_under" title="Choose employee TL/Department" style="width:183px;padding:3px;"  required="" >
<option value="">Select One</option>
<?php /*?>
<option value="Marketing" <?php if($emp_under=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option value="Back Office" <?php if($emp_under=='Back Office'){?> selected="selected" <?php }?>>Back Office</option>
<option value="H.R." <?php if($emp_under=='H.R.'){?> selected="selected" <?php }?>>H.R.</option>
<option value="Accounts" <?php if($emp_under=='Accounts'){?> selected="selected" <?php }?>>Accounts</option>
<option value="Admin" <?php if($emp_under=='Admin'){?> selected="selected" <?php }?>>Admin</option>
<?php */?>
</select>
</div>

</td>




</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Offical Email </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_office_email" value="<?=$emp_office_email?>" title="Enter employee office email id" style="height:23px; width:180px;"   required="" /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Join Date </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" id="datepicker2" autocomplete="off"  name="emp_join_date" value="<?=$emp_join_date?>" title="Enter employee joining date"  style="height:23px; width:180px;"  required=""  /></p></td>



</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Salary</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_salary" value="<?=$emp_salary?>" id="emp_salary"  title="Enter employee Salary" style="height:23px; width:180px;"  required=""  /></p></td>


<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Upload Photo</p></td>
 
<td style="width:190px;">
<form name="frm_img" action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td style="border:none;"><input type="file" name="emp_photo" id="emp_photo" value="<?=$emp_photo?>"  /></td>
<?php /*?><td style="border:none;"><input type="submit" name="emp_photo_upload" value="Upload"  style="color:#000000;border-radius:4px;font-weight:700;" /></td>
<?php */?></tr>
</table>
</form>

</td>

</tr>

<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">BANK DETAIL</td></tr>
<tr>
<td width="148"><p class="b blue p5px ml20px">Name(As in account) </p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_bank_name" id="emp_bank_name" value="<?=$emp_bank_name?>" title="Enter employee name as in ac bcount" style="height:23px; width:180px;" required="" /></p></td>


<td width="148"><p class="b blue p5px ml20px">Bank Name </p></td>

<td width="739"><p class="p5px ml10px">
<input type="text" name="emp_bank" value="<?=$emp_bank?>" title="Enter employee bank name" style="height:23px; width:180px;"  /></p></td>


</tr>

<tr>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">A/c No. </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_ac_no" id="emp_ac_no" value="<?=$emp_ac_no?>" title="Enter employee bank a/c no" style="height:23px; width:180px;"  /></p></td>


<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Branch </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_bank_branch" id="emp_bank_branch" value="<?=$emp_bank_branch?>" title="Enter employee bank branch" style="height:23px; width:180px;" /></p></td>

</tr>
<td  style="width:180px;"><p class="b ml20px blue p5px">NEFT/RTGS Code </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_bank_neft_rtgs_code" id="emp_bank_neft_rtgs_code" 
value="<?=$emp_bank_neft_rtgs_code?>" title="Enter employee bank NEFT/RTGS Code" style="height:23px; width:180px;"   /></p></td>


<td  style="width:180px;"><p class="b ml20px blue p5px">Upload Document</p></td>
 
 
 
<td style="width:190px;padding-left:20px;padding-bottom:10px;border:none;"><p class="p5px ml10px">


<table>
<tr>
<td style="border:none;">
<select  name="doc_title" id="doc_title" title="Choose employee document" style="width:183px;padding:3px;" >
<option>Select</option>
<option <?php if($doc_title=='High School Marksheet'){?> selected="selected" <?php }?> >High School Marksheet</option>
<option <?php if($doc_title=='Last Highest Qualification'){?> selected="selected" <?php }?> >Last Highest Qualification</option>
<option <?php if($doc_title=='PAN card'){?> selected="selected" <?php }?>>PAN card</option>
<option <?php if($doc_title=='Voter ID Card'){?> selected="selected" <?php }?>>Voter ID Card</option>
<option <?php if($doc_title=='Others'){?> selected="selected" <?php }?>>Others</option>
</select>
</td>
<td align="right" style="border:none">
<a href="javascript:void(0)" id="more" onclick="document.getElementById('extra_doc').style.display='block';document.getElementById('more').style.display='none'" style="color:#0066CC;font-weight:bold;margin-left:15px;text-decoration:underline" >More</a>
</td>
</tr>


<tr>
<td style="border:none;">

<input type="file" name="doc_url" id="doc_url" title="Upload supporting documents" style="height:23px; width:180px;"  /></p>

</td>

</tr>



</table>



</p>
</td>


</tr>

<tr>
<td colspan="4" >

<div id="extra_doc" style="display:none">

<table >

<tr>
<td style="width:165px;"><p class="b blue p5px ml20px">Upload Document 1 </p></td>

<td style="width:335px;padding:15px">

<table>
<tr>
<td style="border:none;">
<select  name="doc_title1" id="doc_title1" title="Choose employee document" style="width:183px;padding:3px;" >
<option>Select</option>
<option <?php if($doc_title1=='High School Marksheet'){?> selected="selected" <?php }?> >High School Marksheet</option>
<option <?php if($doc_title1=='Last Highest Qualification'){?> selected="selected" <?php }?> >Last Highest Qualification</option>
<option <?php if($doc_title1=='PAN card'){?> selected="selected" <?php }?>>PAN card</option>
<option <?php if($doc_title1=='Voter ID Card'){?> selected="selected" <?php }?>>Voter ID Card</option>
<option <?php if($doc_title1=='Others'){?> selected="selected" <?php }?>>Others</option>
</select>
</td>

</tr>


<tr>
<td style="border:none;">

<input type="file" name="doc_url1" id="doc_url1" title="Upload supporting documents" style="height:23px; width:180px;"  /></p>

</td>

</tr>



</table></td>


<td style="width:195px;"><p class="b blue p5px ml20px">Upload Document 2 </p></td>

<td style="width:335px;padding:15px">
<table>
<tr>
<td style="border:none;">
<select  name="doc_title2" id="doc_title2" title="Choose employee document" style="width:183px;padding:3px;" >
<option>Select</option>
<option <?php if($doc_title2=='High School Marksheet'){?> selected="selected" <?php }?> >High School Marksheet</option>
<option <?php if($doc_title2=='Last Highest Qualification'){?> selected="selected" <?php }?> >Last Highest Qualification</option>
<option <?php if($doc_title2=='PAN card'){?> selected="selected" <?php }?>>PAN card</option>
<option <?php if($doc_title2=='Voter ID Card'){?> selected="selected" <?php }?>>Voter ID Card</option>
<option <?php if($doc_title2=='Others'){?> selected="selected" <?php }?>>Others</option>
</select>
</td>
<td align="right" style="border:none">
<a href="javascript:void(0)" id="more" onclick="document.getElementById('extra_doc').style.display='none';document.getElementById('more').style.display='block'" style="color:#0066CC;font-weight:bold;margin-left:15px;text-decoration:underline" >Remove</a>
</td>

</tr>


<tr>
<td style="border:none;">

<input type="file" name="doc_url2" id="doc_url2" title="Upload supporting documents" style="height:23px; width:180px;"  />

</td>

</tr>



</table></p></td>


</tr>
</table></div>


</td>
</tr>

<tr>
<td colspan="4"  style="padding-top:10px;padding-bottom:10px;"><p class="p5px ac b">
<input type="submit" name="add_emp" title="Click here to add employee" value="Submit" class="btn33" style="width:100px;height:30px;font-size:13px;" />


<span class="ml10px"><input type="reset" value="Reset" title="Click here to clear" class="btn33" style="width:100px;height:30px;font-size:13px" /></span>

</p></td>

</tr>
</table>

</form>
	
	
	
	
	
	</td>
  </tr>
</table> -->






<script >
function getless(id)
{
  var myNode = document.getElementById("moreDiv");
   myNode.removeChild(myNode.firstChild);
}

c=0;

function getmore(DivId)
{
c=c+1;

if(c<=3){

	ctrl = document.form1.valuelen;
	len = parseInt(ctrl.value);
	//alert(ctrl.value);
	ctrl.value = parseInt(len) + parseInt(1);
	
	var indx = ctrl.value + 1;
		
var content = '<table style="width:100%;" ><tr><td style="width:16%;"><p class="b ml20px blue p5px">Name</p></td><td  style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_name[]" id="" title="Enter employee reference" style="height:23px;width:180px;"/><select name="ref_relation[]" style="margin-left:20px;width:150px;height:30px;"><option value="0">CHOOSE RELATION</option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option><option>Others</option></select></p></td><td style="width:14%;" ><p class="b blue p5px ml20px">Mobile No </p></td><td style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_contact_no[]" id="" title="Enter employee reference contac bt no" style="height:23px;width:180px;"    />&nbsp;<input type="button"  style="font-weight:700;color:#666666;border:inset;border-radius:4px;" onClick="getmore(\'moreDiv\')" value="+"	 /><input type="button" style="font-weight:700;color:#666666;border:inset;border-radius:4px;"  onClick="getless(\'moreDiv\')" value="-"	 /></p></td></tr></table>';	
	
	document.getElementById('hid').value=ctrl.value;
	var bodyRef = document.getElementById(DivId);
	var newdiv = document.createElement('div');
	newdiv.setAttribute('class', 'margin clearboth');
	newdiv.innerHTML = content;
	bodyRef.appendChild(newdiv);
	//document.getElementById('css_common_height_control').style.overflow="auto";
	
	}
}
</script>

<script>
function show_desig(desig){
  if(desig=='Others'){
  document.getElementById('emp_desination_others').style.display='block'
  }else{
  document.getElementById('emp_desination_others').style.display='none'  
  }
}





var xmlhttp="";

if(window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();	
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



function fetch_emp(emp_dept){

   
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {		
		document.getElementById('show_emp').innerHTML=xmlhttp.responseText;
		setTimeout(10000);
    }
  }
xmlhttp.open("GET","call.php?emp_dept="+emp_dept,true);
xmlhttp.send();
	
	
}



</script>


<?php include 'footer.php'; ?>


</body>
</html>
