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
a:hover{
text-decoration:underline;
}
</style>	

<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">Offers

<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo Offers</span>
</p>
	<hr / style="background-color:#999999; width:750px;">


	<?php
	if(!empty($_REQUEST['offer'])){
	$sql="select * from  tbl_offer where 1 and offer_id='$_REQUEST[offer]'";
	$rec_offer=mysql_fetch_array(db_query($sql));	
	}
	?>


  <?php if(!empty($_REQUEST['offer'])){?>
	<div class="arif_shadow" style="width:92%;border:solid #CCCCCC thin;border-radius:5px;margin-top:25px;margin-left:25px;padding:10px;line-height:2.0em;color:#000000;background-color:#FBFBFB;height:auto">
	<a href="offer-board.php" style="float:right;padding-bottom:10px;color:#333333;" >X</a>

	<span class="xlarge b"><?=$rec_offer['offer_title']?></span>
	<br />
<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191">	<?=date("d F Y",strtotime($rec_offer['offer_date']))?></span>

	<span class="i"><?=$rec_offer['offer_desc']?></span><?php /*?> ...<a href="notice-page.php?notice=<?=$rec_notice['notice_msg']?>" style="color:#FF9900">Read</a><?php */?>
	
	<span style="font-weight:bold;margin-top:5px;line-height:1.4em">
	Director
	
</span>
		
		<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191;float:left;"> <?=ucfirst($rec_notice['notice_by'])?>	
</span>
<br />

	</div>
	
<?php }?>	
	
	
	
		<div style="width:95%;background-color:#284c93;margin-left:25px;color:#FFFFFF;border-radius:5px" align="center" class="p2px mt20px b xxlarge">Offers</div>
	
	<?php
	$sql="select * from tbl_offer where 1 and offer_to='$empDpt' and offer_status='Active' order by offer_date desc";
	$data_offer_all=db_query($sql);
	while($rec_offer_all=mysql_fetch_array($data_offer_all)){
	?>
	<a id="title" href="offer-board.php?offer=<?=$rec_offer_all['offer_id']?>" style="">
	<div style="width:93%; border:solid #CCCCCC thin;border-radius:5px;margin-top:5px;margin-left:25px;padding:2px 5px 0px 5px;line-height:2.0em;color:#666666">
<span class="b " style="font-size:12px;color:#1155cc;"><?=substr($rec_offer_all['offer_title'],0,100)?>
	<? if(strlen($rec_offer_all['offer_title'])>100){?>...<? }?></span>
	

	
	<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191;float:right"> Director, <?=date("d F Y",strtotime($rec_offer_all['offer_date']))?></span>
	
    
</div></a>


	
	
	
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