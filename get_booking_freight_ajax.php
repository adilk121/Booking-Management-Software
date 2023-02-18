<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$from_city=$_POST['from_city'];
$destination_city=$_POST['destination_city'];
$tariff_id=$_POST['tariff_id'];



$tariff_sql=db_query("select * from tbl_tariff where tariff_id='$tariff_id' ");
$tariff_res=mysql_fetch_array($tariff_sql);

$city_rate_rows=$tariff_res['tariff_basis_city'];
$state_rate_rows=$tariff_res['tariff_basis_state'];
$zone_rate_rows=$tariff_res['tariff_basis_zone'];

$freight="";
$weight_upto="";
$additional_weight="";
$additional_charge="";
$service_tax="";


$city_flag="";
$state_flag="";
$zone_flag="";


 $service_tax=db_scalar("select tariff_service_tax from tbl_tariff where tariff_id='$tariff_res[tariff_id]' ");

if($city_rate_rows>0)
{
$tariff_city_rate_sql=db_query("select * from tbl_tariff_rate where tariff_id='$tariff_res[tariff_id]' and rate_type='City' and rate_is_normal='Normal' ");
while($tariff_city_rate_res=mysql_fetch_array($tariff_city_rate_sql))
{
 if($tariff_city_rate_res['tariff_from']==$from_city && $tariff_city_rate_res['tariff_to']==$destination_city)  
 {
     $freight=$tariff_city_rate_res['rate'];
     $weight_upto=$tariff_city_rate_res['weight_upto'];
     $additional_weight=$tariff_city_rate_res['tariff_additional_weight'];
    $additional_charge=$tariff_city_rate_res['tariff_additional_charge'];
   
    
     $city_flag=0;
 }else{
     $city_flag++;
 }
}   
}else{
  $city_flag=1;  
}

if($city_flag>0)
{
$from_state_id=db_scalar("select state_id from tbl_city_master where city_name='$from_city' ");    
$destination_state_id=db_scalar("select state_id from tbl_city_master where city_name='$destination_city' ");    

$from_state_name=db_scalar("select state_name from tbl_state_master where state_id='$from_state_id' ");    
$destination_state_name=db_scalar("select state_name from tbl_state_master where state_id='$destination_state_id' ");    

$tariff_state_rate_sql=db_query("select * from tbl_tariff_rate where tariff_id='$tariff_res[tariff_id]' and rate_type='State' and rate_is_normal='Normal' ");
while($tariff_state_rate_res=mysql_fetch_array($tariff_state_rate_sql))
{
if($tariff_state_rate_res['tariff_from']==$from_state_name && $tariff_state_rate_res['tariff_to']==$destination_state_name)  
{
$freight=$tariff_state_rate_res['rate'];
$weight_upto=$tariff_state_rate_res['weight_upto'];
$additional_weight=$tariff_state_rate_res['tariff_additional_weight'];
    $additional_charge=$tariff_state_rate_res['tariff_additional_charge'];
$state_flag=0;
}else{
    $state_flag++;
}

} 
}else{ $state_flag=1; }



if($state_flag>0)
{
$from_zone_id=db_scalar("select zone_id from tbl_city_master where city_name='$from_city' ");    
$destination_zone_id=db_scalar("select zone_id from tbl_city_master where city_name='$destination_city' ");    

$from_zone_name=db_scalar("select zone_name from tbl_zone where zone_id='$from_zone_id' ");    
$destination_zone_name=db_scalar("select zone_name from tbl_zone where zone_id='$destination_zone_id' ");    

$tariff_zone_rate_sql=db_query("select * from tbl_tariff_rate where tariff_id='$tariff_res[tariff_id]' and rate_type='Zone' and rate_is_normal='Normal' ");
while($tariff_zone_rate_res=mysql_fetch_array($tariff_zone_rate_sql))
{
if($tariff_zone_rate_res['tariff_from']==$from_zone_name && $tariff_zone_rate_res['tariff_to']==$destination_zone_name)  
{
$freight=$tariff_zone_rate_res['rate'];
$weight_upto=$tariff_zone_rate_res['weight_upto'];
$additional_weight=$tariff_zone_rate_res['tariff_additional_weight'];
    $additional_charge=$tariff_zone_rate_res['tariff_additional_charge'];
$zone_flag=0;
}else{
    $zone_flag++;
}
}
}else{
    $zone_flag=1;
}


$step1_data->freight_rate=$freight;
$step1_data->weight_upto=$weight_upto;
$step1_data->additional_weight=$additional_weight;
$step1_data->additional_charge=$additional_charge;
$step1_data->service_tax=$service_tax;




echo json_encode($step1_data);



?>