<?php 
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
ob_start();
$sql="select * from tbl_news where 1 and news_id='$_REQUEST[news]'";
$record_dis=mysql_fetch_array(db_query($sql));
@extract($record_dis);
?>


<link href="style.css" type="text/css" rel="stylesheet" />


<table border="1" cellpadding="2" cellspacing="0" width="100%" align="center" class="mt20px large" style="background-color:#284c93;" >
<tr><td colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;padding-top:5px;padding-bottom:5px;">News Detail</td></tr>
<tr><td colspan="2" style="height:20px;"> </td></tr>

	<tr>
	<td colspan="2" align="center"><p class="p5px ml10px"><img src="Employee_Documents/<?=$news_image?>" height="160" width="120" /></p></td>
	</tr>


    <tr>
	<td width="30%" style="background-color:#284c93; color:#FFFFFF;font-weight:bold;" ><p class="p5px  ml10px">News Title</p></td>
	<td width="70%" ><p class="p5px ml10px" style="background-color:#FFFFFF;">	<?=$news_title?></p></td>
	</tr>	


<tr>
	<td  valign="top"  width="27%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;vertical-align:middle;"><p class="p5px  ml10px" >News Details</p></td>
	<td width="71%">
	<div class="p5px ml10px" style="height:120px; background-color:#FFFFFF;overflow:scroll;">
<?=$news_desc?>
	  
	</div></td>
	</tr>


<tr>
	<td  valign="top" width="27%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;"><p class="p5px  ml10px">News Date</p></td>
	<td width="71%"><p class="p5px ml10px" style="background-color:#FFFFFF;">
<?=date("d-M-y",strtotime($news_date))?>
	  
	</p></td>
	</tr>



<tr>
	<td  valign="top" width="27%" style="background-color:#284c93;color:#FFFFFF;font-weight:bold;"><p class="p5px  ml10px">News Status</p></td>
	<td width="71%"><p class="p5px ml10px" style="background-color:#FFFFFF;">
<?=$news_status?>
	  
	</p></td>
	</tr>

	
	
	</table>