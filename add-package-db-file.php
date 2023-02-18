<?php require_once("includes/dbsmain.inc.php");  ?>
<?php  



$docket_number=$_POST['docket_number'];

$shipment_type=$_POST['shipment_type'];

$package_from=$_POST['package_from'];


$other_name=$_POST['other_name'];

$other_street=$_POST['other_street'];

$other_city=$_POST['other_city'];

$other_distict=$_POST['other_distict'];

$other_state=$_POST['other_state'];

$other_email=$_POST['other_email'];

$other_mobile=$_POST['other_mobile'];

$other_pin=$_POST['other_pin'];


$other_gst=$_POST['other_gst'];



$receiver_name=$_POST['receiver_name'];

$receiver_address1=$_POST['receiver_address1'];

$receiver_address2=$_POST['receiver_address2'];

$receiver_pin=$_POST['receiver_pin'];

$receiver_phone=$_POST['receiver_phone'];

$receiver_remark=$_POST['receiver_remark'];


$payment_method=$_POST['payment_method'];


$cod_amount=$_POST['cod_amount'];

$cod_shipper_ac_no=$_POST['cod_shipper_ac_no'];

$direct_credit=$_POST['direct_credit'];


$dod_amount=$_POST['dod_amount'];



$risk_coverage=$_POST['risk_coverage'];

$transport_mode=$_POST['transport_mode'];

$no_of_package=$_POST['no_of_package'];

$contain=$_POST['contain'];

$decleared_value=$_POST['decleared_value'];


$way_bill_no=$_POST['way_bill_no'];

$actual_weight=$_POST['actual_weight'];

$volumetric_weight=$_POST['volumetric_weight'];

$chargeable_weight=$_POST['chargeable_weight'];

$ref_no=$_POST['ref_no'];
$remarks=$_POST['remarks'];



$ship_type="";
$from=$package_from;
if($package_from=="other")
{
	$ship_type="Other";
	$from="";
}else
{
	$ship_type="Client";
}





$weight=$_POST['weight'];

$length=$_POST['le'];

$breadth=$_POST['be'];

$height=$_POST['he'];

$today = date("d/m/Y");

$btn=$_POST['btn'];

$q="";
$up="";

if($btn=="Save")
{
	$q="insert into";
}
else if($btn=="Update")
{
	$q="update";
$up="where docket_number = '$docket_number' ";
}


$sql = "$q tbl_package set 
                docket_number='$docket_number',
                shipper_code='$package_from',
				shipment_type='$shipment_type',
	
				booking_date='$today',
				shipper_type='$ship_type', 	
				payment_mode='$payment_method',
				cod_amount='$cod_amount',
				bank_account_no='$cod_shipper_ac_no',
				direct_credit='$direct_credit',
				dod_amount='$dod_amount',
				risk='$risk_coverage',
				transport_mode='$transport_mode',
				no_of_package='$no_of_package',
				contain='$contain',
				decleared_value='$decleared_value',
				actual_weight='$actual_weight',
				volumetric_weight='$volumetric_weight',
				chargeable_weight='$chargeable_weight',
				reference_no='$ref_no',
				way_bill_no='$way_bill_no',
				remarks='$remarks'
				$up
				    ";
				db_query($sql);

 





if($package_from=="other")
{

$sql_other = "$q tbl_shipper_details set
  				docket_number='$docket_number', 
  				shipper_code='',
                sh_name='$other_name',
				sh_street='$other_street',
				sh_city ='$other_city',
				sh_distict='$other_distict',
				sh_state='$other_state', 	
				sh_email='$other_email',
				sh_mobile='$other_mobile',
				sh_pin='$other_pin',
				sh_gst='$other_gst',
				sh_type='Other'
				$up
				    ";
				db_query($sql_other);

}
else
{


$sql_sh = "select * from tbl_shipper where shipper_code='$package_from'";	
$re = db_query($sql_sh);				  
while ($line_raw = mysql_fetch_array($re)) {

	$sql_client = "$q tbl_shipper_details set
  				docket_number='$docket_number', 
  				shipper_code='$package_from',
                sh_name	='$line_raw[shipper_name]',
				sh_street='$line_raw[shipper_street]',
				sh_city ='$line_raw[shipper_city]',
				sh_distict='$line_raw[shipper_distict]',
				sh_state='$line_raw[shipper_state]', 	
				sh_email='$line_raw[shipper_email]',
				sh_mobile='$line_raw[shipper_mobile]',
				sh_pin='$line_raw[shipper_pin]',
				sh_gst='$line_raw[shipper_gst]',
				sh_type='Client'
				$up
				    ";
				db_query($sql_client);

}
	


}


$sql_receiver = "$q tbl_receiver set 
                docket_number='$docket_number',
				receiver_name='$receiver_name',
				receiver_address1 ='$receiver_address1',
				receiver_address2='$receiver_address2',
				receiver_pin='$receiver_pin', 	
				receiver_phone='$receiver_phone',
				receiver_remark='$receiver_remark' 
				$up 
				    ";
				db_query($sql_receiver);

$i=1;

if($btn=="Update"){

db_query("delete from tbl_package_details where docket_number='$docket_number' ");
}

for($i=1; $i<=$no_of_package; $i++)
{
$sql_weight = "insert into tbl_package_details set 
                docket_number='$docket_number',
				package_weight='$weight[$i]',
				package_length ='$length[$i]',
				package_breadth='$breadth[$i]',
				package_height='$height[$i]' 
				

					";
db_query($sql_weight);
}







?>




