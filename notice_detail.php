<?php 
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
ob_start();
$sql="select * from tbl_notice where 1 and notice_id='$_REQUEST[notice]'";
$record_dis=mysql_fetch_array(db_query($sql));
@extract($record_dis);
?>


<link href="style.css" type="text/css" rel="stylesheet" />


<table border="1" cellpadding="2" cellspacing="0" width="100%" align="center" class="mt20px large" style="background-color:#284c93;margin-top:60px;" >
<tr>
<td colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;padding-top:5px;padding-bottom:5px;">Notice Detail</td></tr>

<tr>
<td width="30%" style="background-color:#284c93; color:#FFFFFF;font-weight:bold;" ><p class="p5px  ml10px">Notice By</p></td>
	<td width="70%" ><p class="p5px ml10px" style="background-color:#FFFFFF;">	<?=$notice_by?></p></td>
	</tr>	

<tr>
<td width="30%" style="background-color:#284c93; color:#FFFFFF;font-weight:bold;" ><p class="p5px  ml10px">Notice To</p></td>
	<td width="70%" ><p class="p5px ml10px" style="background-color:#FFFFFF;">	<?=$notice_to?></p></td>
	</tr>	



<tr>
	<td  valign="top"  width="27%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;vertical-align:middle;"><p class="p5px  ml10px" >Notice Details</p></td>
	<td width="71%">
	<div class="p5px ml10px" style="height:120px; background-color:#FFFFFF;overflow:scroll;">
<?=$notice_msg?>
	  
	</div></td>
	</tr>


<tr>
	<td  valign="top" width="27%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;"><p class="p5px  ml10px">Notice Date</p></td>
	<td width="71%"><p class="p5px ml10px" style="background-color:#FFFFFF;">
<?=$notice_date?>
	  
	</p></td>
	</tr>



<tr>
	<td  valign="top" width="27%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;"><p class="p5px  ml10px">Notice Status</p></td>
	<td width="71%"><p class="p5px ml10px" style="background-color:#FFFFFF;">
<?=$notice_status?>
	  
	</p></td>
	</tr>

	
	
	</table>