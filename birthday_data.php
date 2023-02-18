<?php 
require_once("includes/dbsmain.inc.php"); 
?>  


<?php
$curr_month_test=date("m",mktime());
$curr_day_test=date("d",mktime());
$last_day_test=date('t',strtotime('today'));


$count_test=db_scalar("select count(*) from tbl_emp where 1 and DAY(emp_dob)='$curr_day_test' and MONTH(emp_dob)='$curr_month_test' ");

$next_test=$last_day_test;
$count_test_week=db_scalar("select * from tbl_emp where 1 and DAY(emp_dob) BETWEEN $curr_day_test and  $next_test and MONTH(emp_dob)='$curr_month_test'");





if($count_test>0){
$sql="select * from tbl_emp where 1 and DAY(emp_dob)='$curr_day_test' and MONTH(emp_dob)='$curr_month_test' order by rand() limit 0,1";
}else if($count_test_week>0 and $count_test<=0){
$sql="select * from tbl_emp where 1 and DAY(emp_dob) BETWEEN '$curr_day_test' and  '$next_test' and MONTH(emp_dob)='$curr_month_test' order by rand() limit 0,1";
}else{
$sql="select * from tbl_emp where 1 and   MONTH(emp_dob) BETWEEN $curr_month_test and 12 order by rand() limit 0,1";
}

//$sql="select * from tbl_emp where 1 and DAY(emp_dob)='$curr_day_test' and MONTH(emp_dob)='$curr_month_test' order by rand() limit 0,1";
$data_birthday_test=db_query($sql);
$rec_birthday_test=mysql_fetch_array($data_birthday_test);
?>	


		   <p class="xxlarge p5px " align="center" style="background-color:#284c93; color:#FFFFFF;">
		  <span class=""><?php if($count_test<=0){echo "Coming ";}?>Birthday</span>
		  </p>
		  <div align="center" class="mt10px " style="width:100%; height:100px;" id="sahilk">
<table width="100%">
<tr>
<td width="40%">
<?php if(empty($rec_birthday_test['emp_photo'])){?>
<a href="my-profile.php?emp_id=<?=$rec_birthday_test['emp_id']?>" title="Click here to know <?=ucfirst($rec_birthday_test['emp_name'])?>">
<img src="images/noimage.jpg"  height="100" width="110" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;"  />
</a>
<?php }else{?>
<a href="my-profile.php?emp_id=<?=$rec_birthday_test['emp_id']?>" title="Click here to know <?=ucfirst($rec_birthday_test['emp_name'])?>">
<img src="Employee_Documents/<?=$rec_birthday_test['emp_photo']?>"  height="100" width="90" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;"  />
</a>
<?php }?>


</td>

<td width="60%" style="vertical-align:top	">


<table>
<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:8px;" >Name&nbsp;:&nbsp;<span style="font-weight:100;"><?=ucfirst($rec_birthday_test['emp_name'])?></span></td>
</tr>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:8px;" >Department&nbsp;:&nbsp;<span style="font-weight:100;"><?=$rec_birthday_test['emp_dpt']?></span></td>
</tr>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:8px;" width="20%">Birthday&nbsp;:&nbsp;<span style="font-weight:100;"><?=date("d",strtotime($rec_birthday_test['emp_dob']))?>&nbsp;<?=date("F",strtotime($rec_birthday_test['emp_dob']))?></span>
</td>
</tr>

</table>

</td>

</tr>

<tr>
<td colspan="2">
<?php if($count_test>0){?>
<table style="width:100%">
<tr>

<td width="90%" style="font-size:19px;color:#990033;font-weight:bold;vertical-align:middle;font-family:Gabriola">
Wish you a very "Happy Birthday"
</td>

<td width="10%">
<img src="images/cake.png" height="35" width="35"  />
</td>


</td>
</tr>
</table>
<?php }?>

</td>
</tr>
</table>
		  </div>

		  

		
			