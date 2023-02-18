<?php
$curr_day=date("d",mktime());
$sql="select * from tbl_emp where 1 and DAY(emp_dob)='$curr_day' and MONTH(emp_dob)='$curr_month' order by rand()";
$data_birthday=db_query($sql);
$rec_birthday=mysql_fetch_array($data_birthday);
?>	
<script type="text/javascript" src="engine1/jquery.js"></script>
<script>
    $(document).ready(function(){
        setInterval(function() {
           $("#birthday").load("birthday_data.php");
		    // $("#gallery").load("image_gallery.php");
        }, 4000);
    });

</script>		  

<table cellpadding="0" cellspacing="0" border="0" width="100%">


        <tr>


<td>
		   <div id="birthday"  style="border:1px #CCCCCC solid; margin-top:3px; margin-right:10px; height:180px;width:280px;" class="" >
		   <p class="xxlarge p5px " align="center" style="background-color:#284c93; color:#FFFFFF;">
		  <span class="">Birthday</span>
		  </p>
		  <div align="center" class="mt10px " style="width:100%; height:100px;" id="sahilk">
<table width="100%">
<tr>
<td width="40%">
<?php if(empty($rec_birthday['emp_photo'])){?>
<img src="images/noimage.jpg"  height="100" width="110" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;"  />
<?php }else{?>
<img src="Employee_Documents/<?=$rec_birthday['emp_photo']?>"  height="100" width="110" hspace="3" style="border:#CCCCCC ridge thin;border-radius:5px;"  />
<?php }?>
</td>

<td width="60%" style="vertical-align:top	">


<table>
<tr><td style="vertical-align:top;font-weight:bold;padding-top:8px;" width="20%">
Name 
</td>

<td style="vertical-align:top;font-weight:bold;padding-top:8px;" width="5%">
:
</td>

<td style="vertical-align:top;padding-top:8px; " width="35%" align="left">
<?=$rec_birthday['emp_name']?>
</td>
</tr>

<tr>
<td style="vertical-align:top;font-weight:bold;padding-top:8px;" width="20%">
Department 
</td>

<td style="vertical-align:top;font-weight:bold;padding-top:8px;" width="5%">
:
</td>

<td style="vertical-align:top;padding-top:8px; " width="35%" align="left">
<?=$rec_birthday['emp_dpt']?>
</td>
</tr>



<tr><td style="vertical-align:top;font-weight:bold;padding-top:8px;" width="20%">
Birthday
</td>

<td style="vertical-align:top;font-weight:bold;padding-top:8px;" width="5%">
:
</td>

<td style="vertical-align:top;padding-top:8px; " width="35%" align="left">
<?=date("d",strtotime($rec_birthday['emp_dob']))?>&nbsp;<?=date("F",strtotime($rec_birthday['emp_dob']))?>
</td>
</tr>




</table>

</td>

</tr>

<tr>
<td colspan="2">

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


</td>
</tr>
</table>