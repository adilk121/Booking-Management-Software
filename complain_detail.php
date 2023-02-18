<?php 
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
ob_start();
$sql="select * from tbl_complain where 1 and com_id='$_REQUEST[dis_id]'";
$record_dis=mysql_fetch_array(db_query($sql));

db_query("update tbl_complain set com_status='Read' where 1 and com_id='$_REQUEST[dis_id]'");

@extract($record_dis);
?>


<link href="style.css" type="text/css" rel="stylesheet" />


<table border="1" cellpadding="2" cellspacing="0" width="100%" align="center" class="mt20px large" style="background-color:#284c93;" >
<tr><td colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;padding-top:5px;padding-bottom:5px;">Complain Detail</td></tr>

	<tr>
	<td colspan="2" align="center"><p class="p5px ml10px">
	<img src="Employee_Documents/<?=$com_snap?>" height="180" width="400" /></p></td>
	</tr>

<tr>
	<td width="31%" style="background-color:#284c93; color:#FFFFFF;font-weight:bold;" ><p class="p5px  ml10px"> Name & Code</p></td>
	<td width="69%" ><p class="p5px ml10px" style="background-color:#FFFFFF;">	<?=db_scalar("select emp_name from tbl_emp where 1 and emp_reg_id=$record_dis[com_emp_id]")?>
	
	&nbsp;
	<span style="color:#000000;font-weight:bold;">
	[ <?="WKN000".db_scalar("select emp_code from tbl_emp where 1 and emp_reg_id=$record_dis[com_emp_id]")?> ]
	</span>
	</p></td>
	</tr>
    <tr>
	<td width="31%" style="background-color:#284c93; color:#FFFFFF;font-weight:bold;" ><p class="p5px  ml10px"> Subject</p></td>
	<td width="69%" ><p class="p5px ml10px" style="background-color:#FFFFFF;">	<?=$com_sub?></p></td>
	</tr>	


<tr>
	<td  valign="top"  width="31%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;vertical-align:middle;"><p class="p5px  ml10px" >Details</p></td>
	<td width="69%">
	<div class="p5px ml10px" style="height:120px; background-color:#FFFFFF;overflow:scroll;">
<?=$com_desc?>
	  
	</div></td>
  </tr>


<tr>
	<td  valign="top" width="31%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;"><p class="p5px  ml10px">Date & Status</p></td>
	<td width="69%"><p class="p5px ml10px" style="background-color:#FFFFFF;">
<?=date("d-M-y",strtotime($com_date))?>&nbsp;&nbsp; <span style="color:#000000;font-weight:bold;">[ <?=$com_status?> ]</span>
	  
	</p></td>
  </tr>


  
  <tr>
  <td colspan="2" height="25px;" align="center">
  <a href="mailto:<?=db_scalar("select emp_office_email from tbl_emp where 1 and emp_id=$record_dis[com_emp_id]")?>" style="color:#000099;font-size:12px;font-weight:bold;text-decoration:underline;">Reply Now</a></td>
  </tr>
  
  
	
	</table>