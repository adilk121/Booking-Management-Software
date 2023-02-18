<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$zone_id=$_REQUEST['zone_id'];


?>

  <select class="p5px" name="select_state" id="select_state" style="width:180px;" >
        <option value="">Select State</option>
        <?php
        $sql_state=db_query("select * from tbl_state_master where 1 and state_status='Active' and zone_id='$zone_id' order by state_id");
        while($state_res=mysql_fetch_array($sql_state))
        {
       ?>
        <option style="text-transform:uppercase;" value="<?=$state_res['state_id']?>"><?=$state_res['state_name']?></option>
    <?}?>
    </select>