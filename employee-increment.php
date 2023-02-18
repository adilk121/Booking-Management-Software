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
	
	
	
<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">Increment

<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo Increment</span>
</p>
	<hr / style="background-color:#999999; width:750px;">
	

<? if($_REQUEST['incre_id']!=""){
$sql="select * from  tbl_emp_increment where 1 and emp_in_id='$_REQUEST[incre_id]' and emp_in_status='Active'";
$data_in_detail=db_query($sql);
$rec_in_detail=mysql_fetch_array($data_in_detail);
?>	
	
	
<div class="bdr0" style="width:550px;margin-left:130px;margin-top:40px;border-radius:5px;margin-bottom:20px;">
<table style="width:100%;" align="center"  >
<tr>
<td align="center" colspan="2" ><div style="font-size:17px;background-color:#284c93;color:#FFFFFF;border-radius:5px;padding:3px;">Increment Detail
<a href="employee-increment.php" style="color:#FFFFFF;font-weight:bold;float:right;margin:3px; font-size:12px">X</a>
</div></td>
</tr>

<tr>
<td width="30%" >&nbsp; </td><td width="40%">&nbsp;</td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > 
<div style="background-color:#c7d7f7;margin-left:20px;padding:3px;padding-left:45px" align="left">Name</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;" align="left"><?=$rec_in_detail['emp_in_name']?></div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" ><div style="background-color:#c7d7f7;margin-left:20px;padding:3px;padding-left:45px" align="left">Employee Code</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;width:250px;" align="left"><?=$rec_in_detail['emp_in_emp_code']?></div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > <div style="background-color:#c7d7f7;margin-left:20px;padding:3px;padding-left:45px" align="left">Old Salary</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;width:250px;" align="left">
<?=$rec_in_detail['emp_in_old_sal']?>
</div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > <div style="background-color:#c7d7f7;margin-left:20px;padding:3px;padding-left:45px" align="left">Increment</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;width:250px;" align="left"><?=$rec_in_detail['emp_in_in_amnt']?></div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > <div style="background-color:#c7d7f7;margin-left:20px;padding:3px;padding-left:45px" align="left">Increased Salary</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;width:250px;" align="left"><?=$rec_in_detail['emp_in_new_sal']?></div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > <div style="background-color:#c7d7f7;margin-left:20px;padding:3px;padding-left:45px" align="left">Increment Date 	</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;width:250px;" align="left">
<?=date("d F Y",strtotime($rec_in_detail['emp_in_in_date']))?></div></td>
</tr>

<tr>
<td width="30%" style="font-size:12px;font-weight:bold;" > <div style="background-color:#c7d7f7;margin-left:20px;padding:3px;padding-left:45px" align="left">Applicable Date</div>&nbsp;</td><td width="40%" style="padding-left:30px;"><div style="padding:3px;padding-left:10px;margin-bottom:12px;background-color:#F3F3F3;width:250px;width:250px;" align="left">

<?=date("d F Y",strtotime($rec_in_detail['emp_in_in_app_date']))?>
</div></td>

</tr>





</table></div>

<? }?>



<?php
$sql="select * from  tbl_emp_increment where 1 and emp_in_reg_id='$_SESSION[UID_EMS]' and emp_in_status='Active' order by emp_in_id desc";
$data_in=db_query($sql);
$count_in=mysql_num_rows($data_in);
if($count_in>0){
?>

<?
$i=0;
while($rec_in=mysql_fetch_array($data_in)){
$i++;
?>

<a id="title" href="employee-increment.php?incre_id=<?=$rec_in['emp_in_id']?>" style="">
<div style="width:93%; border:solid #CCCCCC thin;border-radius:5px;margin-top:5px;margin-left:25px;padding:2px 5px 0px 5px;line-height:1.5em;color:#666666">

<? if($i==1){?>
<img src="images/RedArrowRight.gif" height="10" width="18" />
<? }?>
<span class="b " style="font-size:12px;color:#1155cc;<? if($i>1){?>margin-left:22px<? }?>">Rs. <?=$rec_in['emp_in_in_amnt']?>
	</span>
	

	
	<p style="width:200px;float:right"><span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191;float:left"> <?=date("d F Y",strtotime($rec_in['emp_in_in_date']))?></span>
	
	<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191;float:right;text-align:left" > <?=date("d F Y",strtotime($rec_in['emp_in_in_app_date']))?></span></p>
    
</div>	</a>


<? 
}
}else{?>
<div style="width:93%; border:solid #CCCCCC thin;border-radius:5px;margin-top:5px;margin-left:25px;padding:2px 5px 0px 5px;line-height:2.0em;color:#FF0000" align="center">
No record(s) found.
</div>
<? }?>







	
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