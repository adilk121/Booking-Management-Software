<?php
$c=0;
$curr_month=date("m",mktime());
$curr_day=date("d",mktime());
$last_day=date('t',strtotime('today'));

$count=db_scalar("select count(*) from tbl_emp where 1 and DAY(emp_dob)='$curr_day' and MONTH(emp_dob)='$curr_month' and emp_status='WORKING'");


if($count>0){
$sql="select * from tbl_emp where 1 and DAY(emp_dob)='$curr_day' and MONTH(emp_dob)='$curr_month' and emp_status='WORKING' order by rand() limit 0,1";
}else{
$sql="select * from tbl_emp where 1 and  emp_status='WORKING'  order by rand() limit 0,1";
}


$data_birthday=db_query($sql);
$rec_birthday=mysql_fetch_array($data_birthday);
?>	

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td>
<div id=""  style="border:1px #CCCCCC solid; margin-top:3px; margin-right:10px; height:auto;width:280px;" class="" >
<p class="xxlarge p5px " align="center" style="background-color:#284c93; color:#FFFFFF;">
<span class="">Birthday</span>
</p>

<?php if($count<=0){?>
<span style="font-size:18px;color:#999999;vertical-align:middle;font-family:Gabriola;font-weight:bold;margin-left:80px">Coming Birthday</span>
<? }else{
$c=1;
}
?>

<div align="center" class="mt10px  " style="width:100%; height:auto;padding-bottom:10px;" id="sahilk">

<table width="100%">
<tr>
<td width="40%" align="center">


<?php if(empty($rec_birthday['emp_photo'])){?>
<a href="my-profile.php?emp_id=<?=$rec_birthday['emp_id']?>" title="Click here to know <?=ucfirst($rec_birthday['emp_name'])?>">
<img src="images/noimage.jpg"  height="70" width="60" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;" title="<?=ucfirst($rec_birthday['emp_name'])?>"  />
</a>
<?php }else{?>
<a href="my-profile.php?emp_id=<?=$rec_birthday['emp_id']?>" title="Click here to know <?=ucfirst($rec_birthday['emp_name'])?>">
<img src="Employee_Documents/<?=$rec_birthday['emp_photo']?>"  height="70" width="60" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;"  />
</a>
<?php }?>
</td>

<td width="60%" style="vertical-align:top	">
<?php if($count>0){?>
<span style="font-size:15px;color:#333333;vertical-align:middle;font-family:Gabriola;font-weight:bold">Today is <?=$rec_birthday['emp_name']?> birthday</span>
<? }?>

<table>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:2px;" ><?=ucfirst($rec_birthday['emp_name'])?></span></td>
</tr>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:4px;" ><span style="font-weight:100;"><?=$rec_birthday['emp_dpt']?></span></td>
</tr>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:4px;" width="20%"><span style="font-weight:100;"><?=$rec_birthday['emp_dob']?></span>
</td>
</tr>

</table>

</td>
</tr>

<tr>
<td colspan="2">
<?php if($count>0){?>

<table style="width:100%">
<tr>
<td width="80%" style="font-size:17px;color:#990033;font-weight:bold;vertical-align:top;font-family:Gabriola;padding-left:25px">
Wish you a very "Happy Birthday"</td>
<td width="10%"><img src="images/cake.png" height="35" width="35"  /></td>

</td>
</tr>
</table>
<?php }?>

</td>
</tr>
</table>		  
</div>

<p style="width:250px;margin-left:15px; <?php if($count>0 and $c>0){?>border-bottom:solid thin #CCCCCC<? }?> "></p>

<?php if($count>0 and $c>0){?>
<span style="font-size:18px;color:#999999;vertical-align:middle;font-family:Gabriola;font-weight:bold;margin-left:80px;">Coming Birthday</span>

<? }?>


<?
$sql="select * from tbl_emp where 1 and  emp_status='WORKING' order by rand() limit 0,2";
$data_birthday2=db_query($sql);
while($rec_birthday2=mysql_fetch_array($data_birthday2)){
?>


<div align="center" class="mt10px  " style="width:100%; height:auto;padding-bottom:10px" id="sahilk">
<table width="100%">
<tr>
<td width="40%" align="center">
<?php if(empty($rec_birthday2['emp_photo'])){?>
<a href="my-profile.php?emp_id=<?=$rec_birthday2['emp_id']?>" title="Click here to know <?=ucfirst($rec_birthday2['emp_name'])?>">
<img src="images/noimage.jpg"  height="70" width="60" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;" title="<?=ucfirst($rec_birthday2['emp_name'])?>"  />
</a>
<?php }else{?>
<a href="my-profile.php?emp_id=<?=$rec_birthday2['emp_id']?>" title="Click here to know <?=ucfirst($rec_birthday2['emp_name'])?>">
<img src="Employee_Documents/<?=$rec_birthday2['emp_photo']?>"  height="70" width="60" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;"  />
</a>
<?php }?>
</td>

<td width="60%" style="vertical-align:top	">


<table>
<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:2px;" ><?=ucfirst($rec_birthday2['emp_name'])?></span></td>
</tr>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:4px;" ><span style="font-weight:100;"><?=$rec_birthday2['emp_dpt']?></span></td>
</tr>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:4px;" width="20%"><span style="font-weight:100;"><?=$rec_birthday2['emp_dob']?></span>
</td>
</tr>

</table>

</td>
</tr>


</table>		  
</div>

<? 
}
?>








</div>
		  
</td>
</tr>


		
<tr>
<td>
<div  style="border:1px #CCCCCC solid; margin-top:10px; margin-right:10px;" >
<p class="xxlarge p5px" align="center" style="background-color:#284c93; color:#FFFFFF;">
<a href="guideline-board.php?type=dept" style="color:#FFFFFF" title="Click here to see all guidelines">Guidelines</a>
</p>
<div class="sahilkhan ml10px" style="height:155px;">
<ul id="sell_leads_container_div3" style="height:150px;line-height:2.0em" class="latest_container">
			  
<?php
//$sql="select * from tbl_guideline where 1 and MONTH(guide_date)='$curr_month' and guide_type='dept' and guide_status='Active' ";
$sql="select * from tbl_guideline where 1 and guide_type='dept' and guide_to ='$empDpt' and guide_status='Active' ";
$data_guide_emp=db_query($sql);
while($rec_guide_emp=mysql_fetch_array($data_guide_emp)){
?>
<li class="" style="color:#666666"><span style="color:#284c93">&raquo;</span> <a href="guideline-board.php?guide=<?=$rec_guide_emp['guide_id']?>" style="color:#666666" >
<?=strip_tags(substr(html_entity_decode(trim($rec_guide_emp['guide_msg'])),0,40))?>
&nbsp;<span style="float:right;margin-right:4px;color:#000000;font-weight:bold;font-size:10px">(<?=ucfirst($rec_guide_emp['guide_from'])?>)</span></a>
</li>
<?php }?>

</ul>
</div>
</div>
<script>var handle_latest_sell_div = TK.widget.SimpleScroll.decorate('sell_leads_container_div3', {lineHeight: 20, startDelay: 2});</script>
</td>
</tr>
		
</table>
	  
<script type="text/javascript" src="engine1/jquery.js"></script>
<script>
    $(document).ready(function(){
        setInterval(function() {
           $("#birthday").load("birthday_data.php");
		    // $("#gallery").load("image_gallery.php");
        }, 4000);
    });

</script>