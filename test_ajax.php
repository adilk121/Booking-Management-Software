<?php require_once("includes/dbsmain.inc.php");  ?>


<?php

$name=$_POST['name'];
$val="";
$sql=db_query("select * from tbl_shipper where shipper_name='$name' ");
while($res=mysqli_fetch_array($sql))
{
    $val.=$res['shipper_name'].",";
}
echo $val;

?>


