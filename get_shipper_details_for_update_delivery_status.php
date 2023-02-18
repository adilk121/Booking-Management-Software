<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$airway_bill_no=$_POST['airway_bill_no'];

$sql=db_query("select * from tbl_package where airway_bill_no='$airway_bill_no'");
$res=mysql_fetch_array($sql);

$shipper_data->ship_id=$res['shipper_id'];
$shipper_data->ship_name=$res['shipper_name'];

$shipper_data->ship_mobile=$res['shipper_mobile'];
$shipper_data->ship_address=$res['shipper_address'];
$shipper_data->ship_pickup_city=$res['pickup_city'];
$shipper_data->ship_destination_city=$res['destination_city'];
$shipper_data->ship_booking_date=$res['booking_date'];
$shipper_data->forwarder_user_id=$res['forwarder_user_id'];

echo json_encode($shipper_data);

?>