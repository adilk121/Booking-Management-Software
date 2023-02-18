<?php include("header-home.php")?>
  <tr>
    <td valign="top" width="20%" >
		<?php include("left-home.php")?>
    </td>
    <td valign="top" width="60%">
	<table cellpadding="0" cellspacing="0" border="0" width="96%" align="center" style="margin-top:2px;">
	<tr>
	<?php include("quote.php")?>
	</tr>
	
	
	</table>
	
	
	
	
<?php
$uname=db_scalar("select reg_uname from tbl_registration where reg_id='$_SESSION[UID_EMS]'");

if(isset($_REQUEST['update'])){
echo $count=db_scalar("select count(reg_id) from tbl_registration where reg_pass='$old_pass' and reg_uname='$uname'");

if($count>0){
$rec_reg=mysql_fetch_array(db_query("select * from tbl_registration where reg_pass='$old_pass' and reg_uname='$uname'"));

if($new_pass==$re_new_pass){
$sql="update tbl_registration set reg_pass='$new_pass' where  reg_id='$rec_reg[reg_id]' ";
$res=db_query($sql);
if($res>0){
$_SESSION['msg']="<span style='color:green'>Password is updated successfully.</span>";
}

}else{
$_SESSION['msg']="<span style='color:red'>Please enter same password</span>";
}



}else{
$_SESSION['msg']="<span style='color:red'>Entered old password is not correct</span>";
}


}
?>	
	
	
	
<p style="font-size:14px;padding:5px;margin-top:10px;font-weight:bold" align="center">
<?php
if(!empty($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
</p>
<div  style="background-color:#E6F2FF;border:solid thin #c7d7f7;border-radius:10px;width:80%;margin-left:80px;margin-top:30px;" align="center">
<p style="font-size:16px;font-weight:bold;padding:5px;background:#284c93;color:#FFFFFF; border-radius:4px;" align="center">Change Password</p>

<form action="" method="post">
<table style="width:80%;margin-top:10px;line-height:2.0em;margin-left:100px;margin-bottom:10px;" >
	
	<tr>
	<td class="b" width="30%">User Name</td><td width="50%" style="color:#666666;font-weight:bold"><?=$uname?></td>
	
	</tr>


	<tr>
	<td  class="b">Old Password</td><td width="75%" style="color:#666666">
	<input type="password" name="old_pass" style="width:180px;border-radius:4px;" required="" title="Enter old password"  /></td>
	
	</tr>

	<tr>
	<td class="b">New Password</td><td width="75%" style="color:#666666">
	<input type="password" name="new_pass" style="width:180px;border-radius:4px;" required="" title="Enter new password" /></td>
	</tr>

	<tr>
	<td class="b">Re Enter New Password</td><td width="75%" style="color:#666666">
	<input type="password" name="re_new_pass" style="width:180px;border-radius:4px;"  required="" title="Enter re-enter new password" /></td>
	</tr>
	
	<tr>
	<td colspan="2" >
<input type="submit" name="update" class="b" value="Update" style="background-color:#284c93;border:solid #284c93;border-radius:4px;color:#FFFFFF;width:100px;margin-left:155px;margin-top:10px;" title="Click here to update password" /></td>
	</tr>
	
	</table>
</form></div>

	
	
	
	
	
	
	
	
	
	
	
	
	</td>
    <td valign="top" width="20%" >
		<?php include("right-home.php")?>
	</td>
  </tr>
</table> 
<div style="background:#284c93;height:33px;" class="mt10px">
  <p style="padding:10px;color:#FFFFFF;text-align:right;" >Copyright Reseverd @ Web Key Network Pvt Ltd</p>
</div>
</body></html>
