<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$sh_code=$_POST['shii_code'];
$sh_res1_mode=mysql_fetch_array(db_query("select * from tbl_tariff where tariff_shipper_code='$sh_code' "));
?>


<td><p class="b blue p6px ml20px">Mode</p></td> 
<td>
<p class="p5px ml10px">
<select  style="height:23px; width:180px;" name="tariff_trans_mode" id="tariff_trans_mode"  >
<option value="">Select Mode </option>
<option value="Air" <?php if($res['tariff_trans_mode']=='Air' || $sh_res1_mode['tariff_trans_mode']=='Air'){ ?> selected="selected" <? } ?> >Air</option>
<option value="Surface" <?php if($res['tariff_trans_mode']=='Surface' || $sh_res1_mode['tariff_trans_mode']=='Surface'){ ?> selected="selected" <? } ?> >Surface</option>
<option value="Cargo" <?php if($res['tariff_trans_mode']=='Cargo' || $sh_res1_mode['tariff_trans_mode']=='Cargo'){ ?> selected="selected" <? } ?> >Cargo</option>
<option value="All" <?php if($res['tariff_trans_mode']=='All' || $sh_res1_mode['tariff_trans_mode']=='All'){ ?> selected="selected" <? } ?> >All</option>
</select>
</p>
</td>