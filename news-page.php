<?php include("header-home.php")?>
<?php 
$sql="select * from tbl_news where 1 and news_id='$_REQUEST[news]'";
$record_dis=mysql_fetch_array(db_query($sql));
@extract($record_dis);
?>


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
	
<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">News Detail

<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo <a href="news-board.php" style="color:#999999">News</a> &raquo News Detail</span>
</p>
	<hr / style="background-color:#999999; width:750px;">

	
<table width="100%" style="margin-top:10px;">
<tr>
<td width="30%" valign="top">

<img src="Employee_Documents/<?=$news_image?>" height="220" width="200" style="margin:10px 20px 10px 20px;border-radius:5px; " />
<br />



</td>
	

<td valign="top" width="70%">
<br />
<span style="font-size:18px;font-weight:bold;color:#1155cc;" class="maroon-dark"><?=$news_title?></span>
<br />
<span style="font-weight:bold;line-height:1.4em;font-size:12px;font-family:Arial, Helvetica, sans-serif; color:#919191">	<?=date("d F Y",strtotime($news_date))?></span>
<div  style="line-height:2.5em;height:auto;padding-top:10px;font-size:13px" class="black i" >	
<?=$news_desc?> 
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
