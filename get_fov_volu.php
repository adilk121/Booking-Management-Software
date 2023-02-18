<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

$sh_code=$_POST['shiip_code'];
$sh_res1_fov=mysql_fetch_array(db_query("select * from tbl_tariff where tariff_shipper_code='$sh_code' "));
?>


<td><p class="b  blue ml20px p5px">FOV (%)  </p></td> 
<td><p class="p5px ml10px">
<input type="number" name="tariff_fov" id="tariff_fov" <?php if($sh_res1_fov['tariff_fov']!=""){?>value="<?=$sh_res1_fov['tariff_fov']?>"<?}else{?> value="<?=$res['tariff_fov']?>"<?}?> style="height:23px; width:90px;" onkeydown="return event.keyCode !== 69" />
OR 
<input type="number" name="tariff_min" id="tariff_min" placeholder="Min" <?php if($sh_res1_fov['tariff_min']!=""){?>value="<?=$sh_res1_fov['tariff_min']?>"<?}else{?> value="<?=$res['tariff_min']?>"<?}?> style="height:23px; width:90px;" onkeydown="return event.keyCode !== 69" />

</p></td>

<td>
<p class="b  blue ml20px p5px">Volumetric  </p></td> 
<td>
<p class="p5px ml10px "><span class="b">(1 CFT=) </span>
<input type="number" name="tariff_volumetric" <?php if($sh_res1_fov['tariff_volumetric']!=""){?>value="<?=$sh_res1_fov['tariff_volumetric']?>"<?}else{?> value="<?=$res['tariff_volumetric']?>"<?}?> id="tariff_volumetric" style="height:23px; width:180px;"  onkeydown="return event.keyCode !== 69"  />

</p>
</td>