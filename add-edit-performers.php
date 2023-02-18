<?php include('header.php'); ?>

<style>
    .btn33{
        background-color:white;
        border-radius:6px;
        outline:none;
        padding-top:5px;
        padding-bottom:5px;
        padding-left:15px;
        padding-right:15px;
    }
    .btn33:hover{
        background-color:#00aeef;
    }
</style>

<script language="javascript" type="text/javascript" src="aj.js"></script>

<script>

function fill_val(val,id,field,divName){
document.getElementById(field).value=val;	

if(field=='per_tl_name'){
document.getElementById("per_tl_name_h").value=id;	
hide(divName);
}

if(field=='per_name_f'){
document.getElementById("per_name_f_h").value=id;	
hide(divName);
}

if(field=='per_name_s'){
document.getElementById("per_name_s_h").value=id;	
hide(divName);
}

if(field=='per_name_t'){
document.getElementById("per_name_t_h").value=id;	
hide(divName);
}


}



function hide(divName){
document.getElementById(divName).style.display='none';
}

function auto_sugg(val,field,divName){


var v=document.getElementById(field).value;	
suggest(v,field,divName);	
}
</script>  



<?php
if($_REQUEST['per_month']!=""){
$curr_month=$_REQUEST['per_month'];
}else{
$curr_month=date("m",mktime());
}


if($_REQUEST['per_year']!=""){
$curr_year=$_REQUEST['per_year'];
}else{
$curr_year=date("Y",mktime());
}





if(!empty($_REQUEST['perid'])){
$sql="select * from tbl_performer where 1 and per_id='$_REQUEST[perid]'";
$rec_per=mysql_fetch_array(db_query($sql));
}
?>



<?php



if(isset($_REQUEST['update'])){


 echo   $sql="update  tbl_performer set per_tl_name='$per_tl_name_h',
                                    per_name_f='$per_name_f_h',
									per_name_s='$per_name_s_h',
									per_name_t='$per_name_t_h',
									per_month='$curr_month',
									per_year='$curr_year'
									where per_id='$perid'
";




$res=db_query($sql);									
if($res>0){
$_SESSION['msg']="Performence detail is updated";
header("location:manage-performers.php");
exit;
}


}





if(isset($_REQUEST['submit'])){

$month=db_scalar("select count(*) from tbl_performer where per_month='$per_month'");

if($month>0){
$_SESSION['msg']="Please enter for any other month";
}else{


$sql="insert into tbl_performer set per_tl_name='$per_tl_name_h',
                                    per_name_f='$per_name_f_h',
									per_name_s='$per_name_s_h',
									per_name_t='$per_name_t_h',
									per_month='$curr_month',
									per_year='$curr_year'
";


$res=db_query($sql);									
if($res>0){
$_SESSION['msg']="Performence detail is added";
header("location:manage-performers.php");
exit;

}

}

}
?>



  
  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >
	<?php include 'left-menu.php'; ?>
	
	</td>
	
    <td valign="top" width="83%">
	
	
	<p class="b xlarge mt10px ml10px">Manage Performers
	<span class="fr mr10px b blue u" style="font-size:12px;"><a href="manage-performers.php">Go Back</a></span>
	</p>
	<p class="bdr0 ml10px  m5px mr30px"></p>
	
	<form action="" method="post" enctype="multipart/form-data">
	<div style="color:#0033FF;font-size:14px;" align="center">
	<?php
	if(!empty($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
	}
	?>	
	
	</div>
	<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center" class="mt20px bdrAll">	
	<tr>
	<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Enter Detail</p></td>
	
	</tr>
	
	<tr>
	<td width="30%"><p class=" p5px ml10px b" >Enter Month : </p></td>
	<td width="66%"><p class="b p5px"> 
	<select name="per_month" id="per_month" required style="width:150px;height:22px;">
	   
	<option disabled> Select Month</option>
	
	<?php foreach($month as $key=>$m){?>
	<option value="<?=$m?>" <? if($rec_per['per_month']!="" and $m==$rec_per['per_month']){?> selected="selected" <? }else if($m==$curr_month){?> selected="selected"<? }?>> <?=$key?></option>
	<?php }?>
	


	</select>	 
	
	
	
	<select name="per_year" id="per_year" required style="width:150px;height:22px;">
	   
	<option disabled> Select Year</option>
	
	<?php for($y=2010;$y<=2025;$y++){?>
	<option value="<?=$y?>" <? if($y==$rec_per['per_year'] ){?> selected="selected" <? }else if($rec_per['per_year']=="" and $y==$curr_year){?> selected="selected"<? }?>> <?=$y?> </option>
	<?php }?>
	


	</select>
	
	</p></td>		
	</tr>
	

	<tr style="background-color:#284c93;">
	<td colspan="3"><p class="b white p5px"> Team Manager</p></td>
	</tr>
	

<tr style="background-color:#CCCCCC;">
	<td width="30%"><p class=" p5px ml10px b" >Name </p></td>
	<td width="66%"><p class="b p5px">


<input type="text" name="per_tl_name" id="per_tl_name" required value="" placeholder="<?=db_scalar("select emp_name from tbl_emp where emp_id='$rec_per[per_tl_name]'")?>" style="height:23px; width:220px;color:#000000;font-weight:bold;background-color:#FFFFFF;" autocomplete="off"  onkeyup="auto_sugg(this.value,'per_tl_name','myDiv1');" />


<div id="myDiv1" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;" >
</div>

<?php if(!empty($_REQUEST['perid'])){?>
<input type="hidden" name="per_tl_name_h" id="per_tl_name_h" required value="<?=$rec_per['per_tl_name']?>" />
<?php }else{?>
<input type="hidden" name="per_tl_name_h" id="per_tl_name_h" required value="" />
<?PHP }?>
</p>
</td></tr>

	
<tr>
<td colspan="3"><p class="b blue p5px"> First Performer</p></td>
</tr>

<tr>
	<td width="30%"><p class=" p5px ml10px">Name </p></td>
	<td width="66%" ><p class="b p5px">
	<input type="text" required name="per_name_f" id="per_name_f" value="" style="height:23px; width:220px;color:#000000;font-weight:bold;background-color:#FFFFFF;" autocomplete="off"  onkeyup="auto_sugg(this.value,'per_name_f','myDiv2');" placeholder="<?=db_scalar("select emp_name from tbl_emp where emp_id='$rec_per[per_name_f]'")?>" />


<div id="myDiv2" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;" >
</div>

<?php if(!empty($_REQUEST['perid'])){?>
<input type="hidden" name="per_name_f_h" id="per_name_f_h" required value="<?=$rec_per['per_name_f']?>" />
<?php }else{?>
<input type="hidden" name="per_name_f_h" id="per_name_f_h" required value="" />
<?PHP }?>




	
</p>

	
	</td>
	</tr>
	
	
	
	
	
	<tr>
	<td colspan="3" ><p class="b blue p5px"> Second Performer</p></td>
	</tr>
	
	<tr>
	<td width="30%"><p class=" p5px ml10px">Name </p></td>
	<td width="66%" id="emp_list2"><p class="b p5px">
	<input type="text" required name="per_name_s" id="per_name_s" required value="" placeholder="<?=db_scalar("select emp_name from tbl_emp where emp_id='$rec_per[per_name_s]'")?>" style="height:23px; width:220px;color:#000000;font-weight:bold;background-color:#FFFFFF;" autocomplete="off"  onkeyup="auto_sugg(this.value,'per_name_s','myDiv3');" />


<div id="myDiv3" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;" >
</div>

<?php if(!empty($_REQUEST['perid'])){?>
<input type="hidden" name="per_name_s_h" id="per_name_s_h" required value="<?=$rec_per['per_name_s']?>" />
<?php }else{?>
<input type="hidden" name="per_name_s_h" id="per_name_s_h" required value="" />
<?PHP }?>

</p></td></tr>
	
<tr>
	<td colspan="3"><p class="b blue p5px"> Third Performer</p></td>
	</tr>
	
	<tr>
	<td width="30%"><p class=" p5px ml10px">Name </p></td>
	<td width="66%" >
	<p class="b p5px">
	<input type="text" required name="per_name_t" id="per_name_t" required value="" placeholder="<?=db_scalar("select emp_name from tbl_emp where emp_id='$rec_per[per_name_t]'")?>" style="height:23px; width:220px;color:#000000;font-weight:bold;background-color:#FFFFFF;" autocomplete="off"  onkeyup="auto_sugg(this.value,'per_name_t','myDiv4');" />


<div id="myDiv4" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;" >
</div>



<?php if(!empty($_REQUEST['perid'])){?>
<input type="hidden" name="per_name_t_h" id="per_name_t_h" required value="<?=$rec_per['per_name_t']?>" />
<?php }else{?>
<input type="hidden" name="per_name_t_h" id="per_name_t_h" required value="" />
<?PHP }?>




	
</p></td>
	</tr>
	
	
	
	
	
	<tr>
	<td colspan="3"><p class="ac p5px"><span class="ml10px">
	
	<?php if(!empty($_REQUEST['perid'])){?>
	<input type="hidden" name="perid" value="<?=$_REQUEST['perid']?>" />
	<input type="submit" name="update" class="btn33" value="Update"  />
	<?php }else{?>
		<input type="submit" name="submit" class="btn33" value="Submit"  />
 <?php }?>		
	
	
	</span>
	<span class="ml10px"><input type="reset" name="submit" class="btn33" value="Reset"  /></span>
	</p>
	
	</td>
	
	</tr>

	</table>
	
	</form>
	
	<p>&nbsp;</p>
	
	
	
	</td>
  </tr>
</table>


<?php include 'footer.php'; ?>
</body>
</html>

