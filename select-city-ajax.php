<?php require_once("includes/dbsmain.inc.php");  ?>
<?php

$city_id=$_POST['city_id'];
$type=$_POST['type'];

if($type=="Shipper")
{
  $shipper_state=db_scalar("select state_name from tbl_state_city_master where id='$city_id' ");
 echo $shipper_state;
}


if($type!="Shipper")
{
$state_code=db_scalar("select state_code from all_cities where city_id='$city_id' ");
$state_name=db_scalar("select state_name from all_states where state_code='$state_code' ");
echo $state_name;
}

?>

