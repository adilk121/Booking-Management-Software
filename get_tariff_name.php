<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$sh_code=$_POST['sh_code'];
$sh_res1=mysql_fetch_array(db_query("select * from tbl_shipper where shipper_code='$sh_code' "));
$name=$sh_res1['shipper_name'];
$tax_rate=$sh_res1['shipper_gst_rate'];
$address=$sh_res1['shipper_street'].", ".$sh_res1['shipper_city'].", ".$sh_res1['shipper_state'];


$sh_res22=mysql_fetch_array(db_query("select * from tbl_tariff where tariff_shipper_code='$sh_code' "));
$mode=$sh_res22['tariff_trans_mode'];
$fov=$sh_res22['tariff_fov'];
$fov_min=$sh_res22['tariff_min'];
$volu=$sh_res22['tariff_volumetric'];


$tariff_ship_value->ship_name=$name;
$tariff_ship_value->ship_tax_rate=$tax_rate;
$tariff_ship_value->ship_address=$address;
$tariff_ship_value->ship_mode=$mode;
$tariff_ship_value->ship_fov=$fov;
$tariff_ship_value->ship_fov_min=$fov_min;
$tariff_ship_value->ship_volu=$volu;

echo json_encode($tariff_ship_value);






?>