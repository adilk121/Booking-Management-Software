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
<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">News

<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo News</span>
</p>
	<hr / style="background-color:#999999; width:750px;">


	<?php
	$sql="select * from tbl_news where 1 and news_status='Active' order by news_date desc";
	$data_news_all=db_query($sql);
	while($rec_news_all=mysql_fetch_array($data_news_all)){
	?>
	<div class=""  style="width:92%;height:85px;   border:solid #CCCCCC thin;border-radius:5px;margin-top:10px;margin-left:25px;padding:10px;line-height:2.0em;color:#666666">

<style>
a:hover{
text-decoration:underline;
}
</style>	
	<span class="b xlarge"><a id="title" href="news-page.php?news=<?=$rec_news_all['news_id']?>" style="color:#1155cc;"><?=substr($rec_news_all['news_title'],0,70)?>
	<? if(strlen($rec_news_all['news_title'])>70){?>...<? }?></a></span>



	<img src="Employee_Documents/<?=$rec_news_all['news_image']?>" height="80" width="70" style="float:left;margin-right:10px;margin-top:5px;border:solid thin #FFFFFF;border-radius:4px" />
	
	<br />
	<span style="font-weight:bold;margin-top:25px;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191">	<?=date("d F Y",strtotime($rec_news_all['news_date']))?></span>
	<div style="width:80%;vertical-align:top;margin-top:5px;">
		<?=substr($rec_news_all['news_desc'],0,100)?> ...<a href="news-page.php?news=<?=$rec_news_all['news_id']?>" style="color:#FF9900">Read</a>
	</div>

	 

		
	</div>
	
	<?php 
       }
     ?>
	
	
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