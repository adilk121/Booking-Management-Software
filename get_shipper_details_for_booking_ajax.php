<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');


$shipper_id=$_POST['shipper_id'];

$sql=db_query("select * from tbl_shipper where shipper_id='$shipper_id' ");
$res=mysql_fetch_array($sql);
$address=$res['shipper_street'].", ".$res['shipper_city']." ".$res['shipper_distict'].", ".$res['shipper_state']." - ".$res['shipper_pin'];

$tariff_sql=db_query("select * from tbl_tariff where tariff_shipper_code='$res[shipper_code]' ");
$tariff_res=mysql_fetch_array($tariff_sql);

$fov="";
$docket_charge="";
$handling_charge="";
$other_charge="";
$transit_mode=$tariff_res['tariff_trans_mode'];




/*if($tariff_res['tariff_fov']=="" || $tariff_res['tariff_fov']==0)
{
  $fov=$tariff_res['tariff_min'];  
}else{
    $fov=$tariff_res['tariff_fov'];  
}
*/

if($tariff_res['city_docket_charge']>0)
{
$docket_charge=$tariff_res['city_docket_charge'];

}else if($tariff_res['state_docket_charge']>0)
{
  $docket_charge=$tariff_res['state_docket_charge'];  
}else{
    $docket_charge=$tariff_res['zone_docket_charge'];  
}


if($tariff_res['city_handling_charge']>0)
{
$handling_charge=$tariff_res['city_handling_charge'];

}else if($tariff_res['state_handling_charge']>0)
{
  $handling_charge=$tariff_res['state_handling_charge'];  
}else{
    $handling_charge=$tariff_res['zone_handling_charge'];  
}


if($tariff_res['city_other_charge']>0)
{
$other_charge=$tariff_res['city_other_charge'];

}else if($tariff_res['state_other_charge']>0)
{
  $other_charge=$tariff_res['state_other_charge'];  
}else{
    $other_charge=$tariff_res['zone_other_charge'];  
}



$shipper_data->ship_name=$res['shipper_name'];
$shipper_data->ship_mobile=$res['shipper_mobile'];
$shipper_data->ship_gst=$res['shipper_gst'];
$shipper_data->ship_gst_rate=$res['shipper_gst_rate'];


$shipper_data->ship_address=$address;
$shipper_data->ship_docket_charge=$docket_charge;
$shipper_data->ship_fov=$tariff_res['tariff_fov'];
$shipper_data->ship_fov_min=$tariff_res['tariff_min'];

$shipper_data->ship_handling_charge=$handling_charge;
$shipper_data->ship_other_charge=$other_charge;
$shipper_data->ship_city=$res['shipper_city'];
$shipper_data->tariff_id=$tariff_res['tariff_id'];
$shipper_data->transit_mode=$transit_mode;
$shipper_data->tariff_volumetric=$tariff_res['tariff_volumetric'];



echo json_encode($shipper_data);



?>