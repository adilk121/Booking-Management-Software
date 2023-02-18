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
	
<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">Offers

<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo Offers</span>
</p>
	<hr / style="background-color:#999999; width:750px;">
	<?php
	if(!empty($_REQUEST['offer'])){
	$sql="select * from tbl_offer where 1 and offer_id='$_REQUEST[offer]' ";
	$rec_offer=mysql_fetch_array(db_query($sql));	
	}
	?>
	
  <?php if(!empty($_REQUEST['offer'])){?>
	<div class="shedow" style="width:92%; border:solid #CCCCCC thin;border-radius:5px;margin-top:25px;margin-left:25px;padding:10px;line-height:2.0em;color:#000000;background-color:#FBFBFB">

	<strong><?=$rec_offer['offer_title']?></strong>
	<br />

	<?="<strong>For</strong> - ".$rec_offer['offer_to']?>
	<br />
	

	<?=$rec_offer['offer_desc']?>
	<span style="font-weight:bold;margin-top:5px;line-height:1.4em">
	<?=date("d-M-Y",strtotime($rec_offer['offer_date']))?>
</span>
		
	</div>
	
<?php }?>	
	
	
	<?php
	if(!empty($_REQUEST['type'])){
	$type=$_REQUEST['type'];
	}else if(!empty($rec_offer['offer_type'])){
	$type=$rec_offer['offer_type'];	
	}	
	?>
	
		<div style="width:95%;background-color:#284c93;margin-left:25px;color:#FFFFFF;border-radius:5px" align="center" class="p2px mt20px b xxlarge">Offers</div>
	
	<div style="width:92%; border:solid #CCCCCC thin;border-radius:5px;margin-top:25px;margin-left:25px;padding:10px;line-height:2.0em;color:#666666">
	<?php
	if($type=='emp'){
	$sql="select * from tbl_offer where 1 and offer_type='$type' and offer_to_id='$regd_id'  and offer_status='Active'";
	}else{
	$sql="select * from tbl_offer where 1 and offer_type='$type' and offer_status='Active'";
	}
	

	$data_offer_all=db_query($sql);
	while($rec_offer_all=mysql_fetch_array($data_offer_all)){
	?>
	<strong><?=$rec_offer_all['offer_title']?></strong>
	<br />

	<?="<strong>For</strong> - ".$rec_offer_all['offer_to']?>
	<br />
	
	<?=$rec_offer_all['offer_desc']?>
	<span style="font-weight:bold;margin-top:5px;line-height:1.4em">
	<?=date("d-M-Y",strtotime($rec_offer_all['offer_date']))?>
    </span>
    
		<hr / style="background-color:#CCCCCC; width:740px;margin-top:20px;">

    <?php 
       }
     ?>
	 

		
	</div>
	
	
	
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