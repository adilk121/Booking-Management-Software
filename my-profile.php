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
if(isset($_REQUEST['update'])){

if($_FILES['profile_pic']['name']){
$img=$_FILES['profile_pic']['name'];
move_uploaded_file($_FILES['profile_pic']['tmp_name'],"Employee_Documents/".$img);
}else{
$img=db_scalar("select emp_profile_pic from  tbl_emp where 1 and emp_reg_id='$_SESSION[UID_EMS]'");
}


db_query("update tbl_emp set emp_profile_msg='$emp_profile_msg',emp_profile_pic='$img',emp_hobbies='$emp_hobbies' where 1 and emp_reg_id='$_SESSION[UID_EMS]'");
}
?>	

	
<?php
if(!empty($_REQUEST['emp_id'])){
$sql="select emp_name,emp_photo,emp_dpt,emp_dob,emp_qualification,emp_profile_msg,emp_profile_pic,emp_hobbies from tbl_emp where emp_id='$_REQUEST[emp_id]'";
}else{
$sql="select emp_name,emp_photo,emp_dpt,emp_dob,emp_qualification,emp_profile_msg,emp_profile_pic,emp_hobbies from tbl_emp where emp_reg_id='$_SESSION[UID_EMS]'";
}

$rec_profile=mysql_fetch_array(db_query($sql));
@extract($rec_profile);
?>	
	
<table width="100%">
<tr>
<td width="30%">

<?
if($emp_profile_pic!=""){
$photo=$emp_profile_pic;
}else{
$photo=$emp_photo;
}
?>

<? if($photo!=""){?>
<img src="Employee_Documents/<?=$photo?>" height="160" width="140" style="margin:10px 20px 10px 20px;border-radius:5px; " />
<? }else{?>
<img src="images/noimage.jpg" height="160" width="140" style="margin:10px 20px 10px 20px;border-radius:5px; " />
<? }?>

<br />
<span style="font-size:14px;font-weight:bold;margin-left:45px;" class="maroon-dark"><?=$emp_name?></span>
</td>
	

<td valign="top" width="70%">
	
<table style="width:100%;margin-top:30px;line-height:2.0em" >
<tr>
<td class="maroon-dark large b" width="20%" >Name</td><td width="5%" class="b">:</td><td width="75%" style="color:#666666"><?=ucfirst($emp_name)?></td>
</tr>
	
<tr>
<td class="maroon-dark large b" width="20%" >Department</td><td width="5%" class="b">:</td><td width="75%" style="color:#666666"><?=$emp_dpt?></td>
</tr>

<tr>
<td class="maroon-dark large b" width="20%" >Birthday</td><td width="5%" class="b">:</td><td width="75%" style="color:#666666"><?=date("d",strtotime($emp_dob))?>&nbsp;<?=date("F",strtotime($emp_dob))?></td>
</tr>

<tr>
<td class="maroon-dark large b" width="20%" >Qualification</td><td width="5%" class="b">:</td><td width="75%" style="color:#666666"><?=$emp_qualification?></td>
</tr>

<tr>
<td class="maroon-dark large b" width="20%" >Hobbies</td><td width="5%" class="b">:</td><td width="75%" style="color:#666666"><?=$emp_hobbies?></td>
</tr>



</table>
	
	
	
	
	
	</td>	
	</tr>
	
	<tr>
	<td colspan="2">
	<div style="width:750px;margin:20px 10px 10px 10px;" class="aj">
<?php if(empty($_REQUEST['emp_id'])){	?>
<a href="javascript:void(0)" onclick="document.getElementById('show').style.display='block';document.getElementById('hide').style.display='none'" title="Click here to edit profile message" >	<img src="images/edit.png" height="20" width="20" style="float:right" /></a>
<?php }?>

	<P class="xlarge" style="color:#999999">Profile Message	</P>
	<hr / style="background-color:#999999; width:750px;">
	

	
<div id="hide" style="line-height:2.5em;height:240px;overflow:auto" class="black i" >	<?=$emp_profile_msg?> </div>
	
<div id="show" style="display:none;">
<form action="" method="post" enctype="multipart/form-data">
<p style="margin-top:20px;margin-bottom:20px;"><span style="float:left;font-weight:bold">Change Image :  </span><input type="file" name="profile_pic" style="margin-left:10px;" /></p>

<p style="margin-top:20px;margin-bottom:20px;"><span style="float:left;font-weight:bold;vertical-align:middle">Enter Hobbies :  </span>
<br />

<textarea name="emp_hobbies" style="height:90px;width:600px;"><?=$emp_hobbies?> </textarea>
</p>

<p style="margin-top:20px;margin-bottom:20px;"><span style="float:left;font-weight:bold;vertical-align:middle">Enter Message :  </span>
<br />
<textarea name="emp_profile_msg" style="height:150px;width:600px;">
<?=$emp_profile_msg?> 
</textarea>
</p>
<br />
<input type="submit" name="update" value="Update" class="fl" style="background-color:#284c93;font-size:14px;font-weight:bold;height:30px;width:110px;color:#FFFFFF;border:#006699;border-radius:3px; margin-top:20px;" />

</form>	
</div>
	

</div>
</td>
</tr>
</table>
	

	
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
