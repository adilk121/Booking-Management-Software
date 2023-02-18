<?php
ob_start();
require_once("includes/dbsmain.inc.php"); 
$shipper_code=$_POST['shipper_code'];

$zone_code=$_POST['zone_code'];
$state_code=$_POST['state_code'];

$city_code=$_POST['city_code'];
$user_code=$_POST['user_code'];
$airway_bill_no=$_POST['airway_bill_no'];
$tariff_shipper_code=$_POST['tariff_shipper_code'];
$basis_value=$_POST['basis_area_name'];



$type=$_POST['type'];

if($type=="ZONE")
{
$check=db_scalar("select zone_id from tbl_zone where zone_code='$zone_code'");
if($check!=""){
   echo $check;
}  
}

if($type=="STATE")
{
$check=db_scalar("select state_id from tbl_state_master where state_code='$state_code'");
if($check!=""){
   echo $check;
}  
}


if($type=="CITY")
{
$check=db_scalar("select city_id from tbl_city_master where city_code='$city_code'");
if($check!=""){
   echo $check;
}  
}

if($type=="SHIPPER")
{
$check_scode=db_scalar("select shipper_id from tbl_shipper where shipper_code='$shipper_code'");
if($check_scode!=""){
   echo $check_scode;
}
}

if($type=="USER_CODE")
{
$check_code=db_scalar("select user_id from tbl_parcel_user where user_code='$user_code'");
if($check_code!=""){
   echo $check_code;
}
}

if($type=="PACKAGE")
{
$check_code=db_scalar("select package_id from tbl_package where airway_bill_no='$airway_bill_no'");
if($check_code!=""){
   echo $check_code;
}
}



if($type=="TARIFF")
{
$trf_id=db_scalar("select tariff_id from tbl_tariff where tariff_shipper_code='$tariff_shipper_code'");
$trf_zone=db_scalar("select distinct(rate_type) from tbl_tariff_rate where tariff_id='$trf_id' and rate_type='Zone'");
$trf_state=db_scalar("select distinct(rate_type) from tbl_tariff_rate where tariff_id='$trf_id' and rate_type='State'");
$trf_city=db_scalar("select distinct(rate_type) from tbl_tariff_rate where tariff_id='$trf_id' and rate_type='City'");

if($basis_value=="Zone")
{
    if($trf_zone==$basis_value)
    {
        $check_code="?update_id=$trf_id&edit_type=Zone";
    }
 
}

if($basis_value=="State")
{
    if($trf_state==$basis_value)
    {
        $check_code="?update_id=$trf_id&edit_type=State";
    }
 
}

if($basis_value=="City")
{
    if($trf_city==$basis_value)
    {
        $check_code="?update_id=$trf_id&edit_type=City";
    }
 
}



if($check_code!=""){
   echo $check_code;
}
}


?>