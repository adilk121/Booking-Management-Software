<?php include('header.php'); ?>
<style>
    .btn33{
        background-color:white;
        border-radius:6px;
        outline:none;
        padding-top:5px;
        padding-bottom:5px;
        padding-left:15px;
        padding-right:15px;
    }
    .btn33:hover{
        background-color:#00aeef;
    }
</style>
<script>
checked=false;
function checkall(frm_user){
var aa= frm_user;
if(checked == false){
checked = true
}
else{
checked = false
}
for (var i =0; i < aa.elements.length; i++){
aa.elements[i].checked = checked;
}
}
</script>



<?php

if(!empty($_REQUEST['subuser'])){
$record_edit=mysql_fetch_array(db_query("select * from tbl_registration where 1 and reg_id='$_REQUEST[subuser]'"));

}

if(!empty($_REQUEST['emp_regid'])){
$record_edit=mysql_fetch_array(db_query("select * from tbl_registration where 1 and reg_id='$_REQUEST[emp_regid]'"));

}


if(isset($_REQUEST['Update'])){
$arr_ids = $_REQUEST['chk'];
	if(is_array($arr_ids)) {
    $str_ids = implode(',', $arr_ids); 
	}else{
	$str_ids=$arr_ids;
	}
 
		$res=db_query("update tbl_registration set reg_uname='$reg_uname',
                                            	   reg_name='$reg_name',
		                                           reg_pass='$reg_pass',
		                                           reg_access ='$str_ids',
												   reg_date=now(),
												   reg_status='Active'
												   where reg_id='$_REQUEST[subid]'
												   "
												   
				);
				
				
if($res>0){

$_SESSION['msg_adduser']="User is updated successfully";
header("location:add-subuser.php?subuser=$record_edit[reg_id]");
exit;

}

}

if(isset($_REQUEST['Create'])){
$arr_ids = $_REQUEST['chk'];
	if(is_array($arr_ids)) {
      $str_ids = implode(',', $arr_ids); 
 
		$res=db_query("insert into tbl_registration set reg_uname='$reg_uname',
                                            	   reg_name='$reg_name',
		                                           reg_pass='$reg_pass',
									    		   reg_type='SUBADMIN',
		                                           reg_access ='$str_ids',
												   reg_date=now(),
												   reg_status='Active'"
				);
				
				
if($res>0){
$_SESSION['msg_adduser']="User is added successfully";
}
				
	
}

}
?>

  
<tr>
<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >
<?php include('left-menu.php'); ?>
</td>
	
    <td valign="top" width="83%">
	
	
<p class="b xlarge mt10px ml10px">Add Subuser</p>		
<p class="b blue u large mr20px mt15px ml20px fr"><a href="manage-subuser.php">Go back</a></p> 

	<p class="bdr0 m5px mr30px"></p>
<form name="frm_user" action="" method="post" enctype="multipart/form-data">

<div style="color:#0033FF;font-size:14px;font-weight:700;margin-top:20px;margin-left:260px;" >
<?php
if(!empty($_SESSION['msg_adduser']) ){
echo $_SESSION['msg_adduser'];
unset($_SESSION['msg_adduser']);
}
?>
</div>

<table border="0" cellpadding="0" cellspacing="0" width="70%"  class="bdrAll mt20px  ml10px">

<tr>

<td ><p class="b  blue ml40px p5px">User Type</p></td>
<td ><p class="ac b">:</p></td>
<td ><p class="p5px ml10px">


<span style="color:#000000;font-weight:bold;font-size:13px;">Subadmin</span>


</p></td>


<tr>

<td ><p class="b  blue ml40px p5px">User Name </p></td>
<td ><p class="ac b">:</p></td>
<td ><p class="p5px ml10px">
<input type="text" name="reg_uname" id="reg_uname" title="Enter employee name" style="height:23px; width:180px;" value="<?=$record_edit['reg_uname']?>" required  />
</p></td>


</tr>

<!--<tr>

<td ><p class="b  blue ml40px p5px">Name </p></td>
<td ><p class="ac b">:</p></td>
<td ><p class="p5px ml10px"><input type="text" name="reg_name" id="reg_name" title="Enter employee name" style="height:23px; width:180px;" required  /></p></td>


</tr>-->



<tr>

<td width="159" style="width:150px;"><p class="b  blue ml40px p5px">Password </p></td>
<td width="18"><p class="ac b">:</p></td>
<td width="599"><p class="p5px ml10px">
<input type="text" name="reg_pass" id="reg_pass" title="Enter password" style="height:23px; width:180px;" value="<?=$record_edit['reg_pass']?>" required  /></p></td>


</tr>

<tr>

<td width="159" style="width:150px;"><p class="b  blue ml40px p5px">Access Level </p></td>
<td width="18"><p class="ac b">:</p></td>
<td width="599">
<p class="p5px b ml10px black" style="padding-right:2px;padding-left:2px;margin-bottom:5px;line-height:20px;">

<?php 
$str_access = explode(',', $record_edit['reg_access']); 

foreach($str_access as $a){
?>

<?php if($a=='reg_manage_emp'){ ?>
<span style="background-color:#3399FF;">Manage Employee</span>
<?php }?>

<?php if($a=='reg_manage_news'){ ?>
<span style="background-color:#3399FF;" align="center">Manage News</span>
<?php }?>

<?php if($a=='reg_manage_performer'){ ?>
<span style="background-color:#3399FF;">Manage Performers</span>
<?php }?>

<?php if($a=='reg_manage_increment'){ ?>
<span style="background-color:#3399FF;">Manage Increment</span>

<?php }?>

<?php if($a=='reg_manage_complain_bugs'){ ?>
<span style="background-color:#3399FF;">Manage Complains & Bugs</span>
<?php }?>

<?php if($a=='reg_manage_salaries'){ ?>
<span style="background-color:#3399FF;">Manage Salaries</span>
<?php }?>

<?php if($a=='reg_manage_guidelines'){ ?>
<span style="background-color:#3399FF;padding-right:4px;padding-left:4px;">Manage Guidelines</span>
<?php }?>

<?php if($a=='reg_manage_notice'){ ?>
<span style="background-color:#3399FF;">Manage Notice Board</span>
<?php }?>

<?php if($a=='reg_manage_hr_policy'){ ?>
<span style="background-color:#3399FF;">Manage H R Policies</span>
<?php }?>

<?php if($a=='reg_edit'){ ?>
<span style="background-color:#3399FF;">Edit User</span>
<?php }?>

<?php if($a=='reg_action'){ ?>
<span style="background-color:#3399FF;">Action</span>
<?php }?>

<?php if($a=='reg_manage_quote'){ ?>
<span style="background-color:#3399FF;">Quote</span>
<?php }?>

<?php if($a=='reg_get_excel'){ ?>
<span style="background-color:#3399FF;">Get Excel</span>
<?php }?>



<?php /*?><?php if($a=='reg_working'){ ?>
<span style="background-color:#3399FF;">Working User</span>
<?php }?>
<?php */?>



<?php
}
?>




</p></td>


</tr>

<tr>

<td width="159" style="width:150px;"><p class="b  blue ml40px p5px">Choose Access</p></td>
<td width="18"><p class="ac b">:</p></td>
<td width="599" >
<p class="p5px ml10px">
<table  style="width:95%;margin-left:12px;margin-bottom:20px;border-color:#FFFFFF;">

<tr>
<td colspan="3" style="border:none;background-color:#CCCCCC;"   >
<input style="width:22px;height:22px;" type="checkbox"  value="" onclick="checkall(this.form)" /> 
<span style="color:#333333;font-weight:700;vertical-align:super;">Select All </span>
</td>
</tr>

<tr>
<td colspan="3" style="border:none;height:15px;"   >
</td>
</tr>


<tr >

<style>
.cbox{
width:18px;
height:18px;
}
</style>
<td style="border:none;">
<?php
$str_accessbox = explode(',', $record_edit['reg_access']); 
?>

<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_emp" <?php if(in_array('reg_manage_emp',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Employee</span>
</td>

<td style="border:none;">
<input class="cbox"  type="checkbox" name="chk[]" value="reg_manage_news" <?php if(in_array('reg_manage_news',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage News</span>

</td>

<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_performer" <?php if(in_array('reg_manage_performer',$str_accessbox)){?> checked="checked" <?php }?>/>
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Performers</span>
</td>
</tr>

<tr>
<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_increment" <?php if(in_array('reg_manage_increment',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Increment</span>
</td>

<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_complain_bugs" <?php if(in_array('reg_manage_complain_bugs',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Complains & Bugs</span>
</td>

<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_salaries" <?php if(in_array('reg_manage_salaries',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Salaries</span>
</td>

</tr>

<tr>
<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_guidelines" <?php if(in_array('reg_manage_guidelines',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Guidelines</span>

</td>

<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_notice" <?php if(in_array('reg_manage_notice',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Notice Board</span>

</td>

<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_hr_policy" <?php if(in_array('reg_manage_hr_policy',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage H R Policies</span>

</td>
</tr>
<tr>
<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_offer" <?php if(in_array('reg_manage_offer',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Offers</span>

</td>


<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_edit" <?php if(in_array('reg_edit',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Edit User</span>

</td>
<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_action" <?php if(in_array('reg_action',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Action</span>

</td>
</tr>
<tr>
<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_manage_quote" <?php if(in_array('reg_manage_quote',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Manage Quotes</span>

</td>

<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_get_excel" <?php if(in_array('reg_get_excel',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Get Excel</span>

</td>


</tr>

<?php /*?><tr>
<td style="border:none;">
<input class="cbox" type="checkbox" name="chk[]" value="reg_working" <?php if(in_array('reg_working',$str_accessbox)){?> checked="checked" <?php }?> />
<span style="color:#333333;font-weight:700;vertical-align:super;">Working User</span>

</td>
</tr>
<?php */?>
</table>

</p></td>
</tr>

<tr>
<td colspan="8"><p class="p5px ac"><span class="ml10px">
<?php
if(!empty($_REQUEST['subuser']) || !empty($_REQUEST['emp_regid']) ){?>

<input type="hidden" name="subid" value="<?=$record_edit['reg_id']?>" />
<input type="submit" name="Update" title="Click here to create user" value="Update" class="btn33" />
<?php }else{?>
<input type="submit" name="Create" title="Click here to create user" value="Create" class="btn33" />
<?php }?>
</span>
<span class="ml10px"><input type="reset" value="Reset" title="Click here to clear" class="btn33" /></span>

</p></td></tr>
</table>
</form>
	
	</td>
  </tr>
</table>


<?php include('footer.php'); ?>
</body>
</html>