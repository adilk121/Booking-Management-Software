<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td>


<? if($_REQUEST['pgid']=="mi"){?>
<div  style="border:1px #CCCCCC solid; margin-top:3px; margin-left:5px;height:<? if($user_exist!=""){?>128px;<? }else{?>100px<? }?>"  > 
<p class="xxlarge p5px" align="center" style="background-color:#284c93; color:#FFFFFF;">
Member Section
</p>


<ul style="list-style:none;font-size:13px;margin-left:20px;">
<li style="width:220px;" ><img src="images/ar.jpg" height="12" width="12"  />&nbsp;<a href="guideline-board-member.php?pgid=mi&mty=in" style="color:#000000;font-family:Verdana, Arial, Helvetica, sans-serif">My Guidelines</a> <span style="float:right; font-weight:bold;margin-right:90px;font-size:13px">
<? if($count_guide_unread>0){?>(<?=$count_guide_unread?>)<? }?></span></li>
<li style="width:220px;"><img src="images/ar.jpg" height="12" width="12"  />&nbsp;<a href="notice-board-member.php?pgid=mi&mty=in" style="color:#000000;font-family:Verdana, Arial, Helvetica, sans-serif">My Notices </a><span style="float:right; font-weight:bold;margin-right:90px;font-size:13px">
<? if($count_notice_unread>0){?>(<?=$count_notice_unread?>)<? }?> </span></li>
<li style="width:220px;"><img src="images/ar.jpg" height="12" width="12"  />&nbsp;<a href="offer-board-member.php?pgid=mi&mty=in" style="color:#000000;font-family:Verdana, Arial, Helvetica, sans-serif">My Offers </a><span style="float:right; font-weight:bold;margin-right:90px;font-size:13px">
<? if($count_offer_unread>0){?>(<?=$count_offer_unread?>)<? }?> </span></li>

<? if($user_exist!=""){?>
<li style="width:220px;"><img src="images/ar.jpg" height="12" width="12"  />&nbsp;<a href="complain-board-member.php?pgid=mi&mty=in" style="color:#000000;font-family:Verdana, Arial, Helvetica, sans-serif">My Complains </a><span style="float:right; font-weight:bold;margin-right:90px;font-size:13px">
<? if($com_count>0){?>(<?=$com_count?>)<? }?> </span></li>
<? }?>

</ul>


</div>
<? }?>


<script language="JavaScript" src="leeds/template_homepage.js"></script>
<div  style="border:1px #CCCCCC solid; margin-top:3px; margin-left:5px;height:280px;" class=""> 
<p class="xxlarge p5px" align="center" style="background-color:#284c93; color:#FFFFFF;">
<a href="notice-board.php?type=dept" style="color:#FFFFFF" title="Click here to see all notice" >Notice</a></p>
<div class="sahilkhan pl10px " >
<ul id="sell_leads_container_div" style="height:240px;line-height:2.0em" class="latest_container">

<?php
$curr_month=date("m",mktime());

//$sql="select * from tbl_notice where 1 and MONTH(notice_date)='$curr_month' and notice_type='dept' and notice_status='Active'";
$sql="select * from tbl_notice where 1 and notice_type='dept' and notice_to ='$empDpt' and notice_status='Active' order by notice_id desc limit 0,15";
$data_notice=db_query($sql);
while($rec_notice=mysql_fetch_array($data_notice)){
?>
<li class="" > <span style="color:#284c93">&raquo;</span> <a href="notice-board.php?notice=<?=$rec_notice['notice_id']?>" style="color:#666666" ><?=strip_tags(substr(html_entity_decode(trim($rec_notice['notice_msg'])),0,30))?><span style="margin-left:6px;<?php if($rec_notice['notice_by']=='HR'){?>color:#000000;<?php }else{?>color:#990000;<?php }?>font-weight:bold;float:right;margin-right:5px;font-size:10px;">(<?=strip_tags($rec_notice['notice_by'])?>)</a></span></li>
<?php
}
?>

</ul>
</div></div>
<script>var handle_latest_sell_div = TK.widget.SimpleScroll.decorate('sell_leads_container_div', {lineHeight: 20, startDelay: 2});</script>
</td>
</tr>

<tr>
<td>
<div  style="border:1px #CCCCCC solid; margin-top:10px; margin-left:5px;height:280px;" class="">
<p class="xxlarge p5px" align="center" style="background-color:#284c93; color:#FFFFFF;"><a href="hr-policies-board.php?type=dept" style="color:#FFFFFF" title="Click here to see all HR policies">HR Policies</a></p>
<div class="sahilkhan pl10px">
<ul id="sell_leads_container_div1" style="height:240px;line-height:2.0em" class="latest_container">
<?php
//$sql="select * from tbl_policy where 1 and MONTH(policy_date)='$curr_month' and policy_status='Active'";
$sql="select * from tbl_policy where 1  and policy_status='Active'  order by policy_id desc limit 0,15";
$data_hr=db_query($sql);
while($rec_hr=mysql_fetch_array($data_hr)){
?>
			  
<li class="" style="color:#666666"><span style="color:#284c93">&raquo;</span> <a href="hr-policies-board.php?policy=<?=$rec_hr['policy_id']?>" style="color:#666666" >
<?php
$strPolicy=strip_tags(html_entity_decode(trim($rec_hr['policy_desc'])));
$strPolicy=substr($strPolicy,0,35);
echo $strPolicy;
?>
</a></li>
			
<?php }?>
</ul>
</div>
</div>
<script>var handle_latest_sell_div = TK.widget.SimpleScroll.decorate('sell_leads_container_div1', {lineHeight: 20, startDelay: 2});</script>
</td>
</tr>
</table>