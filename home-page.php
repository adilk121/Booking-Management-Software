<?php include("header-home.php")?>
<style>
.arif_shadow_red{;
box-shadow: 4px 0px 15px 4px #FF2D2D;
-o-box-shadow: 4px 4px 15px #FF2D2D;
-webkit-box-shadow: 4px 4px 15px #FF2D2D;
-moz-box-shadow: 4px 4px 15px #FF2D2D;
}

</style>


<tr>
<td valign="top" width="20%" >
<?php include("left-home.php")?>	
</td>
<td valign="top" width="60%">
<table cellpadding="0" cellspacing="0" border="0" width="96%" align="center" style="margin-top:2px;">
<tr>
<?php include("quote.php")?>	
</tr>
<tr>
<td class="xxlarge ac maroon "  style="padding-top:10px;vertical-align:top;" colspan="5" align="center" >
<div class=" " style="width:350px;margin-left:230px;border-radius:5px;"   ><marquee scrollamount="5" width="40" >&laquo;&laquo;&laquo;</marquee>&nbsp;&nbsp;Performer Of The Month&nbsp;&nbsp;<marquee scrollamount="5" direction="right" width="40">&raquo;&raquo;&raquo;</marquee></div></td>
</tr>
<tr>

<?php
$sql="select * from tbl_performer where 1 and per_month='$curr_month'";
$data_performer=db_query($sql);
$rec_performer=mysql_fetch_array($data_performer);

$f=db_scalar("select emp_name from tbl_emp where emp_id='$rec_performer[per_name_f]'");
$s=db_scalar("select emp_name from tbl_emp where emp_id='$rec_performer[per_name_s]'");
$t=db_scalar("select emp_name from tbl_emp where emp_id='$rec_performer[per_name_t]'");
?>


<td width="34%" class="p10px" align="center" >
<img src="images/1st.jpg" height="45" width="45" style="margin-left:25px;"  />
<ul style="list-style:none" >
<li>
<div class="arif_shadow" style="border:solid #284c93 2px;border-radius:6px;width:100px">
<a href="my-profile.php?emp_id=<?=$rec_performer['per_name_f']?>" style="color:#333333" title="Click here to know <?=ucfirst($f)?>"  >
<img src="Employee_Documents/<?=db_scalar("select emp_photo from tbl_emp where emp_id='$rec_performer[per_name_f]'")?>" id="f"  width="90" height="100" vspace="5"/>
</a>
</div>
</li>
<p style="font-size:13px;font-weight:bold">
<a href="my-profile.php?emp_id=<?=$rec_performer['per_name_f']?>" style="color:#333333" title="Click here to know <?=ucfirst($f)?>">
<?=ucfirst($f)?>
</a></p>
</td>

<td width="33%" align="center"><img src="images/2nd.jpg" height="45" width="45" style="margin-left:25px;"	 />
<ul  style="list-style:none">
<li>
<div class="arif_shadow" style="border:solid #284c93 2px;border-radius:6px;width:100px">
<a href="my-profile.php?emp_id=<?=$rec_performer['per_name_s']?>" style="color:#333333" title="Click here to know <?=ucfirst($s)?>">
<img src="Employee_Documents/<?=db_scalar("select emp_photo from tbl_emp where emp_id='$rec_performer[per_name_s]'")?>" width="90" height="100" vspace="5"/>
</a>
</div></li>
<p style="font-size:13px;font-weight:bold">
<a href="my-profile.php?emp_id=<?=$rec_performer['per_name_s']?>" style="color:#333333" title="Click here to know <?=ucfirst($s)?>">
<?=ucfirst($s)?>
</a>
</p>
</td>

<td width="33%" align="center"><img src="images/3rd.jpg" height="45" width="45" style="margin-left:25px;"	 />
<ul style="list-style:none"><li><div class="arif_shadow" style="border:solid #284c93 2px;border-radius:6px;width:100px">
<a href="my-profile.php?emp_id=<?=$rec_performer['per_name_t']?>" style="color:#333333" title="Click here to know <?=$t?>" >
<img src="Employee_Documents/<?=db_scalar("select emp_photo from tbl_emp where emp_id='$rec_performer[per_name_t]'")?>" width="90" height="100" vspace="5" />
</a>
</div></li>
<p style="font-size:13px;font-weight:bold">
<a href="my-profile.php?emp_id=<?=$rec_performer['per_name_t']?>" style="color:#333333" title="Click here to know <?=$t?>" >
<?=ucfirst(db_scalar("select emp_name from tbl_emp where emp_id='$rec_performer[per_name_t]'"))?>
</a>
</p>
</td>

</tr>
</table>

<div style="width:750px; margin:0 auto;margin-top:10px;line-height:1.5em;" class="aj">
<P class="xlarge" style="color:#999999"><img src="images/offer.gif" height="42" width="170" />  </p>
<hr / style="background-color:#999999; width:750px;">
<div  style=" margin-top:3px; margin-left:5px;height:50px;" class=""> 
<div class="sahilkhan pl10px " >
<ul id="sell_leads_container_div7" style="height:50px;line-height:1.0em;width:500px;" class="latest_container">

<?php
$sql="select * from tbl_offer where 1  and offer_type='dept' and offer_to='$empDpt'	and  offer_status='Active' order by offer_id desc limit 0,3";
$data_sp_offer_emp=db_query($sql);
while($rec_sp_offer_emp=mysql_fetch_array($data_sp_offer_emp)){
?>
<li class="" > <img src="images/AnimatedStar.gif" height="17" width="17" /> <a href="offer-board.php?offer=<?=$rec_sp_offer_emp['offer_id']?>" style="color:#000000;font-style:italic" ><?=strip_tags(substr(html_entity_decode(trim($rec_sp_offer_emp['offer_desc'])),0,80))?></li>
<?php
}
?>

</ul>
</div></div>
<script>var handle_latest_sell_div = TK.widget.SimpleScroll.decorate('sell_leads_container_div7', {lineHeight: 10, startDelay: 2});</script>

</p>


</div>




<div style="width:750px; margin:0 auto;margin-top:10px;line-height:1.5em;" class="aj">
<P class="xlarge" style="color:#999999">Notices For Me</P>
<hr / style="background-color:#999999; width:750px;">
<ul style="list-style:none;margin-left:10px;">
<li>

<?php
//$notice_count=db_scalar("select count(*) from tbl_notice where 1 and MONTH(notice_date)='$curr_month' and notice_type='emp' and notice_to_id='$regd_id' and notice_status='Active'");


$notice_count=db_scalar("select count(*) from tbl_notice where 1 and notice_type='emp' and notice_to_id='$regd_id' and notice_status='Active'");


//$sql="select * from tbl_notice where 1 and MONTH(notice_date)='$curr_month' and notice_type='emp' and notice_to_id='$regd_id' and notice_status='Active' order by notice_id desc limit 0,4";

$sql="select * from tbl_notice where 1  and notice_type='emp' and notice_to_id='$regd_id' and notice_status='Active' order by notice_id desc limit 0,3";

$data_notice_emp=db_query($sql);
while($rec_notice_emp=mysql_fetch_array($data_notice_emp)){

//$date_for_notice_new = date('Y-m-d',strtotime($rec_notice_emp['notice_date']."+3 days"));
?>

<p style="" class="maroon-dark i mb5px <? if($rec_notice_emp['notice_msg_status']=="Unread"){?>b<? }?>" ><span style="font-style:normal;color:#000000">&raquo;</span>&nbsp;<a href="notice-board-member.php?pgid=mi&mty=in&noticeid=<?=$rec_notice_emp['notice_id']?>&rd_st=R" style="color:#333333;" ><?=strip_tags(substr($rec_notice_emp['notice_msg'],0,110))?>  
</a>

<?php
}
?>

</li>
</ul>
<?php if($notice_count>3){?><a href="notice-board-member.php?pgid=mi&mty=in" style="color:#990000" class="fr  i small" title="Click here to read more" >Read More</a><?php }?>
</p>


</div>


<div style="width:750px; margin:0 auto;margin-top:10px;" class="aj">
<P class="xlarge" style="color:#999999" >Guidelines For Me</P>
<hr / style="background-color:#999999; width:750px;">
<ul style="list-style:none;margin-left:10px;">
<li>



<?php
//$guide_count=db_scalar("select count(guide_id) from tbl_guideline where 1 and MONTH(guide_date)='$curr_month' and guide_type='emp' and guide_to_id='$regd_id' and guide_status='Active'");
$guide_count=db_scalar("select count(guide_id) from tbl_guideline where 1 and guide_type='emp' and guide_to_id='$regd_id' and guide_status='Active'");

//$sql="select * from tbl_guideline where 1 and MONTH(guide_date)='$curr_month' and guide_type='emp' and guide_to_id='$regd_id' and guide_status='Active' order by guide_id desc limit 0,4";

$sql="select * from tbl_guideline where 1  and guide_type='emp' and guide_to_id='$regd_id' and guide_status='Active' order by guide_date desc limit 0,3";

$data_guide_emp=db_query($sql);
while($rec_guide_emp=mysql_fetch_array($data_guide_emp)){

$date_for_guide_new = date('Y-m-d',strtotime($rec_guide_emp['guide_date']."+2 days"));
?>
<p style="" class="maroon-dark i mb5px <? if($rec_guide_emp['guide_msg_status']=="Unread"){?>b<? }?>"><span style="font-style:normal;color:#000000">&raquo;</span>&nbsp;<a href="guideline-board-member.php?pgid=mi&mty=in&guideid=<?=$rec_guide_emp['guide_id']?>&rd_st=R" style="color:#333333;"><?=strip_tags(substr($rec_guide_emp['guide_msg'],0,110))?>  

<?php if(date("Y-m-d",mktime())<=$date_for_guide_new ){?>
<img src="images/new.gif" height="12" width="22" />
<?php }?>
</a>
<?php }?>
</li>
</ul>
<?php if($guide_count>3){?><a href="guideline-board-member.php?pgid=mi&mty=in" style="color:#990000" class="fr  i small" title="Click here to read more" >Read More</a><?php }?>

</p>
</div>


<div style="width:750px; margin:0 auto;" class="aj">
<P class="xlarge" style="color:#999999">Offers For Me</P>
<hr / style="background-color:#999999; width:750px;">
<ul style="list-style:none;margin-left:10px;">
<li>
<?php
//$offer_count=db_scalar("select count(offer_id) from tbl_offer where 1 and MONTH(offer_date)='$curr_month' and offer_type='emp' and offer_to_id='$regd_id'	and  offer_status='Active'");

$offer_count=db_scalar("select count(offer_id) from tbl_offer where 1  and offer_type='emp' and offer_to_id='$regd_id'	and  offer_status='Active'");


//$sql="select * from tbl_offer where 1 and MONTH(offer_date)='$curr_month' and offer_type='emp' and offer_to_id='$regd_id'	and  offer_status='Active' order by offer_id desc limit 0,4";

$sql="select * from tbl_offer where 1  and offer_type='emp' and offer_to_id='$regd_id'	and  offer_status='Active' order by offer_id desc limit 0,3";

$dd='2014-08-06';
$yy = date('Y-m-d',strtotime($dd,mktime()).'+3 days');

$data_offer_emp=db_query($sql);
while($rec_offer_emp=mysql_fetch_array($data_offer_emp)){

$date_for_offer_new = date('Y-m-d',strtotime($rec_offer_emp['offer_date']."+2 days"));
?>

<p style="" class="maroon-dark i mb5px <? if($rec_offer_emp['offer_msg_status']=="Unread"){?>b<? }?>">
<a href="offer-board-member.php?pgid=mi&mty=in&offerid=<?=$rec_offer_emp['offer_id']?>&rd_st=R" style="color:#333333;">
<span style="font-style:normal;color:#000000">&raquo;</span>&nbsp;	
<?=strip_tags(substr($rec_offer_emp['offer_desc'],0,110))?></a> 

<?php if(date("Y-m-d",mktime())<=$date_for_offer_new ){?>
<img src="images/new.gif" height="12" width="22" />
<?php }?>

<?php 
}?>
</li>
</ul>
<?php if($offer_count>3){?><a href="offer-board-member.php?pgid=mi&mty=in" style="color:#990000" class="fr  i small" title="Click here to read more" >Read More</a><?php }?>
</p>
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