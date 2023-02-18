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

if(!empty($_REQUEST['news'])){
$sql="select * from tbl_news where 1 and news_id='$_REQUEST[news]'";
$rec_news=mysql_fetch_array(db_query($sql));
}

$img="";

if(isset($_REQUEST['submit'])){

if($_FILES['news_image']['name']){
$_SESSION['img']=$_FILES['news_image']['name'];
$img=$_FILES['news_image']['name'];
move_uploaded_file($_FILES['news_image']['tmp_name'],"Employee_Documents/".$img);
}

$sql="insert into tbl_news set news_title='$news_title',
                               news_image='$img',
							   news_desc='$news_desc',
							   news_date=now(),
							   news_status='$news_status'
							   ";
							   
$res=db_query($sql);							   
if($res>0){
$_SESSION['msg']="News is added successfully";
header("location:manage-news.php");
}

}


if(isset($_REQUEST['update'])){


if($_FILES['news_image']['name']){
$_SESSION['img']=$_FILES['news_image']['name'];
$img=$_FILES['news_image']['name'];
move_uploaded_file($_FILES['news_image']['tmp_name'],"Employee_Documents/".$img);
}else{
$img=db_scalar("select news_image from tbl_news where 1 and news_id='$_REQUEST[news]'");
}


     $sql="update tbl_news set news_title='$news_title',
                               news_image='$img',
							   news_desc='$news_desc',
							   news_date=now(),
							   news_status='$news_status'
							   where news_id='$_REQUEST[news]'
							   ";
							   
							
							   
$res=db_query($sql);							   
if($res>0){
$_SESSION['msg']="News is updated successfully";
header("location:manage-news.php");
exit;
}

}





?>


  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >
	
	<?php include('left-menu.php'); ?>
	
	</td>
	
    <td valign="top" width="83%">
	
	
	<p class="b xlarge mt10px ml10px">Manage News
	<span class="fr mr10px b " style="font-size:12px;"><a href="manage-news.php" style="color:#0033FF;text-decoration:underline">Go Back</a></span>
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
	<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Enter Detail</p></td>
	
	</tr>
	
	
	
	
	
    <tr>
	<td width="27%"><p class="p5px  ml10px">News Title</p></td>
	<td width="71%"><p class="p5px ml10px">
	<input type="text" name="news_title" value="<?=$rec_news['news_title']?>" style="height:25px; width:320px;"  required /></p></td>
	</tr>	
	
	<? 	if(!empty($_REQUEST['news'])){?>	
	<tr>
	<td width="27%"><p class="p5px  ml10px">Current Image</p></td>
	<td width="71%"><p class="p5px ml10px">
	<img src="Employee_Documents/<?=$rec_news['news_image']?>" height="90" width="80" /></p></td>
	</tr>
	<? }?>
	
	<tr>
	<td width="27%"><p class="p5px  ml10px">Upload Image</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="file" name="news_image"  required/></p></td>
	</tr>


   <tr>
   <td  valign="top" width="27%"><p class="p5px  ml10px">News Details</p></td>
   <td width="71%"><p class="p5px ml10px">
  <textarea class="ckeditor" name="news_desc" rows="10" cols="60" required >
 <?php 
 if(!empty($_REQUEST['news'])){
 echo $rec_news['news_desc'];
 }
 ?>
  </textarea>
	  
	</p></td>
	</tr>


<tr>
	<td  valign="top" width="27%"><p class="p5px  ml10px">News Status</p></td>
	<td width="71%"><p class="p5px ml10px">
<select name="news_status" style="width:160px;height:25px;" required>
<option <?php if($rec_news['news_status']=='Active'){?> selected="selected" <?php }?> >Active</option>
<option <?php if($rec_news['news_status']=='Inctive'){?> selected="selected" <?php }?> >Inactive</option>
</select>
	  
	</p></td>
	</tr>

	
	<tr>
	<td colspan="3"><p class="ac p5px">
	
	
	<span class="ml10px">
	<input type="hidden" name="news" value="<?=$rec_news['news_id']?>" />

<input type="submit" 
name="<?php if(!empty($_REQUEST['news'])){?>update<?php }else{?>submit<?php }?>" 
value="<?php if(!empty($_REQUEST['news'])){?>Update<?php }else{?>Submit<?php }?>" class="btn33" />
	
	
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
