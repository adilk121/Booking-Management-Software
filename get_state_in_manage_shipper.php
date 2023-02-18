<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$c_name=$_POST['c_namee'];
?>

    <select style="height:23px; width:180px; " name="shipper_state" id="shipper_state">
<!--	    <option value="">Select State</option>-->
	          <?php
        $sql_state=db_query("select state_id from tbl_city_master where 1 and city_name='$c_name' ");
       // db_query("select * from tbl_state_master where 1 and state_status='Active' order by state_id");
        while($state_res=mysql_fetch_array($sql_state))
        {
            $state_name=db_scalar("select state_name from tbl_state_master where 1 and state_status='Active' and state_id='$state_res[state_id]' ");
       ?>
	    <option style="text-transform:uppercase;" value="<?=$state_name?>" <?php if($res['shipper_state']==$state_name){?>selected<?}?>><?=$state_name?></option>
	    <?}?>
</select>