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

<style>
.ari_comp_btn{
background-color:#284c93;
border:#284c93;
border-radius:5px; 
color:#FFFFFF;
height:25px;
width:100px; 
font-size:12px ;
font-weight:bold;
}
</style>	
	
<?php
if($_FILES['com_snap']['name']){

            $file_name=$_FILES['com_snap']['name'];
			$file_name=get_unique_file_name($_FILES['com_snap']['name']);
			move_uploaded_file($_FILES['com_snap']['tmp_name'],"Employee_Documents/".$file_name);        
}





if(isset($_REQUEST['submit'])){

$sql="insert into tbl_complain set com_emp_id='$_SESSION[UID_EMS]', 
                                   com_sub='$com_sub',
								   com_dept_mapped_id='$com_dept_mapped_id',
								   com_desc='$com_desc',
								   com_snap='$file_name', 
								   com_date=now() 
								   ";
								   
$res=db_query($sql);

$comp_insert_id=mysql_insert_id();								   

$com_trackid="COMP".$comp_insert_id;

$sql="update tbl_complain set com_track_id='$com_trackid' where com_id='$comp_insert_id'";
db_query($sql);

if($res>0){
$_SESSION['msg']="Your complain is submitted successfully. The Complain track id is <span style='color:black'>\" $com_trackid \"</span>";
}

}
?>	


	
<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">Complain

<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo Complain</span>
</p>
	<hr / style="background-color:#999999; width:750px;">


<?php
	if(!empty($_REQUEST['comp']) and empty($_REQUEST['keyword'])){
	$sql="select * from   tbl_complain where 1 and com_id='$_REQUEST[comp]'";
	}else if(!empty($_REQUEST['keyword'])){
	$sql="select * from   tbl_complain where 1 and com_track_id='$_REQUEST[keyword]'";
	}
    
	$data_comp_detail=db_query($sql);
	$rec_comp_detail=mysql_fetch_array($data_comp_detail);
	$num_comp_detail=mysql_num_rows($data_comp_detail);	
	?>


  <?php if(!empty($_REQUEST['comp']) || !empty($_REQUEST['keyword']) and $num_comp_detail>0){?>
	<div class="arif_shadow" style="width:92%;border:solid #CCCCCC thin;border-radius:5px;margin-top:25px;margin-left:25px;padding:10px;line-height:2.0em;color:#000000;background-color:#FBFBFB;height:auto;margin-bottom:10px;">
		<a href="employee-complain.php" style="float:right;padding-bottom:10px;color:#333333;" >X</a>
	

	<span class="xlarge b"><?=$rec_comp_detail['com_sub']?></span>
<br />

<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191">	<?=date("d F Y",strtotime($rec_comp_detail['com_date']))?></span>
<br />


	<span class="i"><?=$rec_comp_detail['com_desc']?></span>
	
	<br />
	
	<? if($rec_comp_detail['com_reply_text']!=""){?>
	<p style="border:dotted thin #993300;height:auto;border-radius:4px;padding:4px;margin-top:10px;"><span style="color:#009933;font-weight:bold">Reply :</span> <?=$rec_comp_detail['com_reply_text']?>
	
	</p>
	
	<br />		
	<? }?>

<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191;float:left;margin-top:10px;"> 
<?="Complain ID : <span style=color:black;>".$rec_comp_detail['com_track_id']."</span>"?>
<br />

<?="Status : <span style=color:black;>".$rec_comp_detail['com_reply_status']."</span>"?>
</span>

<br />
<br />

	</div>
	
<?php }else if(!empty($_REQUEST['comp']) || !empty($_REQUEST['keyword'] ) and $num_comp_detail<=0){?>	
<div class="arif_shadow" style="width:92%;border:solid #CCCCCC thin;border-radius:5px;margin-top:25px;margin-left:25px;padding:10px;line-height:2.0em;color:#FF0000;background-color:#FBFBFB;height:auto;margin-bottom:10px;font-weight:bold" align="center">

No record(s) found.
</div>

<? }?>


<? if($com_count>0){?>
<div align="left" class="arif_shadow"  style="width:85%;padding:5px;margin-top:10px;color:#006633;font-size:13px;font-weight:bold;margin-left:50px;border-radius:4px;margin-bottom:20px;">
<img src="images/RedArrowRight.gif" height="14" width="20" style="vertical-align:inherit" />You have <span style="color:#000000">(<?=$com_count?>)</span> unread complain <span ><a href="complain-board-member.php?pgid=mi&mty=in" style="color:#0000CC;text-decoration:underline">read now</a></span> . 
</div>
<? }?>


<?php if(!empty($_SESSION['msg'])){?>
<div align="center" class="arif_shadow"  style="width:85%;padding:5px;margin-top:10px;color:#006633;font-size:14px;font-weight:bold;margin-left:50px;border-radius:4px;margin-bottom:20px;">
<?
echo $_SESSION['msg'];
unset($_SESSION['msg']);
?>
</div>
<? }?>




<div id="history" style="display:none">
<p style="background-color:#284c93;width:93%;margin-left:25px;height:20px;border-radius:5px;padding-right:10px;padding-top:5px;font-weight:bold; "><a href="javasdript:void(0)" style="float:right;padding-bottom:10px;color:#FFFFFF" onclick="document.getElementById('history').style.display='none';">X</a> </p>
<?
$sql="select * from  tbl_complain where 1 and com_emp_id='$_SESSION[UID_EMS]'";
$data_comp=db_query($sql);
while($rec_comp=mysql_fetch_array($data_comp)){
?>
<a id="title" href="employee-complain.php?comp=<?=$rec_comp['com_id']?>" >
<div id="history" style="width:93%; border:solid #CCCCCC thin;border-radius:5px;margin-top:5px;margin-left:25px;padding:0px 5px 0px 5px;line-height:2.0em;color:#666666;">
<span class="b " style="font-size:11px;color:#1155cc;"><?=substr($rec_comp['com_sub'],0,70)?>
	<? if(strlen($rec_comp['com_desc'])>70){?>...<? }?></span>
	

	
	<p style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191;float:right;margin-top:4px; width:290px"> 
	 <span style="color:#666666" class="fl"><?=ucfirst($rec_comp['com_track_id'])?></span> 	, <?=date("d F Y",strtotime($rec_comp['com_date']))?> <span style="color:#666666">, <span style="color:#333333"><?=db_scalar("select dept_name from tbl_dept where dept_maped_id='$rec_comp[com_dept_mapped_id]'")?></span>  &nbsp;&nbsp;
	 <span class="fr">
	 
	 
(  <span style="color:<? if($rec_comp['com_reply_status']=='Pending'){?>#990000<? }else if($rec_comp['com_reply_status']=='Processing'){?>#FF9900<? }else if($rec_comp['com_reply_status']=='Solved'){?>#006633<? }?>"><?=ucfirst($rec_comp['com_reply_status'])?></span> )</span></span></p>



	
</div></a>

<?
}
?>
</div>




<form action="" method="post">
<p style="margin-left:240px;margin-top:50px;"><input type="text" name="keyword" placeholder="  Enter complain id to track" required=""  style="width:220px;height:20px;border-radius:3px;border:solid thin #CCCCCC" /><input type="submit" name="track_comp" class="ari_comp_btn" value="TRACK COMPLAIN" style="margin-left:2px;width:130px" /></p>
</form>

<p style="margin-top:50px;margin-bottom:100px;margin-left:270px">
<input type="button" class="ari_comp_btn arif_shadow" name="add_comp" value="NEW COMPLAIN" style="width:130px;float:left;height:38px;font-size:12px" onclick="document.getElementById('comp_box').style.display='block';document.getElementById('get_focus').focus()" />



<input type="button" id="show" class="ari_comp_btn arif_shadow" name="view_history" value="COMPLAIN HISTORY" style="width:140px;float:left;margin-left:10px;height:38px;font-size:12px" onclick="document.getElementById('history').style.display='block';" />




</p>


<div id="comp_box" class="bdr0" style="width:600px;margin-left:110px;margin-top:40px;border-radius:5px;display:none">
<form action="" method="post" enctype="multipart/form-data">
<table style="width:100%;" align="center"  >
<tr>
<td align="center" colspan="2" ><div style="font-size:17px;background-color:#284c93;color:#FFFFFF;border-radius:5px;padding:3px;">Complain Detail<a href="javascript:void(0);" onclick="document.getElementById('comp_box').style.display='none';" style="float:right; font-size:12px;margin-right:5px;">X</a></div></td>
</tr>

<tr>
<td width="30%" >&nbsp;</td><td width="40%">
</td>
</tr>


<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > 
<div style="margin-left:20px;padding:3px;padding-left:45px" align="left">Department</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:310px;" align="left">

<select name="com_dept_mapped_id" id="com_dept_mapped_id" required title="Choose department" style="padding:4px; width:170px;"  >
<option selected disabled>-- Select Department --</option>
<option value="Marketing">Marketing</option>
<option value="Back Office">Back Office</option>
<option value="H.R.">H.R.</option>
<option value="Accounts">Accounts</option>
</select>

</div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > 
<div style="margin-left:20px;padding:3px;padding-left:45px" align="left">Subject</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:310px;" align="left">
<input type="text" name="com_sub" style="width:300px"  value="<?=$com_sub?>" required="" title="Enter subject of complain"  /></div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" valign="top" ><div style="margin-left:20px;padding:3px;padding-left:45px" align="left">Description</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:8px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:310px;" align="left">
<textarea style="height:100px;width:300px;" name="com_desc" required  title="Enter description of complain"><?=$com_desc?></textarea>
</div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > <div style="margin-left:20px;padding:3px;padding-left:45px" align="left">Upload Problem Snap</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;width:250px;" align="left">
<input type="file" name="com_snap" required title="Upload snap shot of complain." /></div></td>
</tr>


<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" colspan="2" 	 > 
<span style="color:#990000;font-size:10px;margin-left:120px;">Note : Please take print screen of the issue and past on paint to upload.</span><br />
<br />

<input type="submit" name="submit" id="get_focus" style="background-color:#284c93;border:#284c93;border-radius:5px; color:#FFFFFF;height:25px;width:100px; font-size:12px ;font-weight:bold;margin-left:240px;margin-bottom:15px;" title="Click here to submit your complain" /></td>
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