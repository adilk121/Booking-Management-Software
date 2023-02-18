<?php
$curr_day=date("d",mktime());
//$today_quote=db_scalar("select quote_msg from tbl_quote where DAY(quote_date)='$curr_day' and MONTH(quote_date)='$curr_month'");
$today_quote=db_scalar("select quote_msg from tbl_quote where 1 and quote_status='Active' order by rand() limit 0,1");
?>

<td class="xxlarge" colspan="5" >
<marquee behavior="scroll" scrollamount="3" class="p2px" style="color:#FFFF00; margin-top:2px;padding-bottom:2px; background-color:#284c93;font-family:Georgia;font-size:16px;font-style:italic;border-radius:6px;padding-left:0px;margin-left:0px;width:800px" onmouseover="this.stop();" onmouseout="this.start();">
<?php if(!empty($today_quote)){?>
<img src="images/quote_left.png" height="12" width="12" vspace="4"  /> <?=strip_tags($today_quote)?> <img src="images/quote_right.png" height="12" width="12" vspace="4"  />
<?php }?>
</marquee>

</td>