<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$sh_name=$_POST['sh_name'];
$sh_res=mysql_fetch_array(db_query("select * from tbl_shipper where shipper_name='$sh_name' "));

$address=$sh_res['shipper_street'].", ".$sh_res['shipper_city'].", ".$sh_res['shipper_state'];


?>

<td>
    <p class="b ml20px blue p5px">
        Service Tax  (%)
        </p>
        </td> 
        
<td>
    <p class="p5px ml10px">
        <input type="text" readonly name="tariff_service_tax" value="<?=$sh_res['shipper_gst_rate']?>" id="tariff_service_tax" style="height:23px; width:180px;"/>
        </p>
        </td>
        
        
<td rowspan="2"><p class="b ml20px blue p5px">Address  </p></td>
 
<td rowspan="2">
    <p class="p5px ml10px">
<!--<input type="text" readonly name="tariff_address"  id="tariff_address" value="<?=$address?>" style="height:23px; width:400px;" />-->
  <textarea name="tariff_address" readonly id="tariff_address" style="height:60px; width:400px; resize: none; text-transform:uppercase;"><?=$address?></textarea>
</p>
</td>