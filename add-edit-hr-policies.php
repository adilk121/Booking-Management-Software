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
<?php
$img="";

if(!empty($_REQUEST['policy'])){
$sql="select * from tbl_policy where 1 and policy_id='$_REQUEST[policy]'";
$rec_policy=mysql_fetch_array(db_query($sql));
$img=$rec_policy['policy_image'];
}



if(isset($_REQUEST['submit'])){

if($_FILES['policy_image']['name']){
$img=$_FILES['policy_image']['name'];
move_uploaded_file($_FILES['policy_image']['tmp_name'],"Employee_Documents/".$img);
}

$sql="insert into tbl_policy set policy_title='$policy_title',
                                 policy_desc='$policy_desc',
							     policy_date=now(),
							     policy_status='$policy_status'
							   ";
							   
$res=db_query($sql);							   
if($res>0){
$_SESSION['msg']="Policy is added successfully";
header("location:manage-hr-policies.php");
}

}


if(isset($_REQUEST['update'])){


if($_FILES['policy_image']['name']){
$img=$_FILES['policy_image']['name'];
move_uploaded_file($_FILES['policy_image']['tmp_name'],"Employee_Documents/".$img);
}


   $sql="update tbl_policy set policy_title='$policy_title',
                               policy_desc='$policy_desc',
							   policy_date=now(),
							   policy_status='$policy_status'
							   where policy_id='$_REQUEST[policy]'
							   ";
							   
							
							   
$res=db_query($sql);							   
if($res>0){
$_SESSION['msg']="Policy is updated successfully";
header("location:manage-hr-policies.php");
exit;
}

}





?>


  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	
	<?php include('left-menu.php'); ?>
	
	</td>
	
    <td valign="top" width="83%">
	
	
	<p class="b xlarge mt10px ml10px">Manage-Policy
	<span class="fr mr10px b black" style="font-size:12px;"><a href="manage-hr-policies.php">View Policy</a></span>
	</p>
	<p class="bdr0 ml10px  m5px mr30px"></p>
	
	<form action="" method="post" enctype="multipart/form-data">	
	<div style="width:100%;color:#0066FF;font-size:14px;font-weight:700;" align="center">
	<?php
	if(!empty($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);	
	}
	?>
	</div>
	<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center" class="mt20px bdrAll">
	<tr>
	<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Policy Detail</p></td>
	
	</tr>
	
    <tr>
	<td width="27%"><p class="p5px  ml10px">Title</p></td>
	<td width="71%"><p class="p5px ml10px">
	<input type="text" required name="policy_title" value="<?=$rec_policy['policy_title']?>" style="height:25px; width:320px;"  /></p></td>
	</tr>	
	<?php /*?><tr>
	<td width="27%"><p class="p5px  ml10px">Upload Image</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="file" name="policy_image" /></p></td>
	</tr><?php */?>


   <tr>
   <td  valign="top" width="27%"><p class="p5px  ml10px">Details</p></td>
   <td width="71%"><p class="p5px ml10px">
  <textarea class="ckeditor" required name="policy_desc" rows="10" cols="60">
 <?php 
 if(!empty($_REQUEST['policy'])){
 echo $rec_policy['policy_desc'];
 }
 ?>
  </textarea>
	  
	</p></td>
	</tr>


<tr>
	<td  valign="top" width="27%"><p class="p5px  ml10px">Status</p></td>
	<td width="71%"><p class="p5px ml10px">
<select name="policy_status" required style="width:160px;height:25px;" >
<option <?php if($rec_policy['policy_status']=='Active'){?> selected="selected" <?php }?> >Active</option>
<option <?php if($rec_policy['policy_status']=='Inactive'){?> selected="selected" <?php }?> >Inactive</option>
</select>
	  
	</p></td>
	</tr>

	
	<tr>
	<td colspan="3"><p class="ac p5px">
	
	
	<span class="ml10px">
	<input type="hidden" name="policy" value="<?=$rec_policy['policy_id']?>" />

<input type="submit" 
name="<?php if(!empty($_REQUEST['policy'])){?>update<?php }else{?>submit<?php }?>" 
value="<?php if(!empty($_REQUEST['policy'])){?>Update<?php }else{?>Submit<?php }?>" class="btn33" />
	
	
	</span>
	
	<span class="ml10px"><input type="reset" name="submit" value="Reset" class="btn33" /></span>
	</p></td>
	</tr>
	</table>
	
	</form>
	
	</td>
  </tr>
</table>


<?php include 'footer.php'; ?>
</body>
</html>