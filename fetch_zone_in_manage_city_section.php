<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$s_id=$_REQUEST['s_id'];

$zone_id=db_scalar("select zone_id from tbl_state_master where 1 and state_id='$s_id' ")
?>

  <select class="p5px" name="select_zone" id="select_zone" style="width:180px;" <?/*onchange="selectCountryShip(this.value);"*/?>>
      <!--  <option value="">Select Zone</option>-->
        <?php
        $sql_zone=db_query("select * from tbl_zone where 1 and zone_status='Active'  and  zone_id='$zone_id' ");
        while($zone_res=mysql_fetch_array($sql_zone))
        {
       ?>
<option style="text-transform:uppercase;" value="<?=$zone_res['zone_id']?>" <?php if($edit_data['zone_id']==$zone_res['zone_id']){?>selected<?}?>>
<?=$zone_res['zone_name']?>
</option>
    <?}?>
    </select>