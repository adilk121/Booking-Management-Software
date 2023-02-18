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

<link rel="stylesheet" href="date/jquery-ui.css">
<script src="date/jquery-1.9.1.js"></script>
<script src="date/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

<script>
  $(function() {
    $( "#datepicker1" ).datepicker();
	$( "#datepicker2" ).datepicker();
  });
  </script>
  
<script language="javascript" type="text/javascript" src="aj.js"></script>



<script>

function add_sal(in_sal){
old_sal=document.getElementById('emp_salary').value;
nsal=+old_sal + +in_sal;	
document.getElementById('emp_new_sal').value=nsal;
}


function hide(divName){
document.getElementById(divName).style.display='none';
}


function fill_val(ename,id,field,divName,ecode,dept,desination,sal){
document.getElementById(field).value=ename;	
document.getElementById('emp_code').value="WKN000"+ecode;	
document.getElementById('emp_dpt').value=dept;	
document.getElementById('emp_desination').value=desination;	
document.getElementById('emp_salary').value=sal;	

if(field=='emp_name'){
document.getElementById("emp_id_h").value=id;	
hide(divName);
}



}




function auto_sugg_emp(val,field,divName){


var v=document.getElementById(field).value;	
suggest_emp(v,field,divName);	
}
</script>    
  


<?php
if(isset($_REQUEST['submit'])){

$emp_sal_add_date=date("Y-m-d",strtotime($emp_sal_add_date));
$emp_new_sal_apply_date=date("Y-m-d",strtotime($emp_new_sal_apply_date));

//$sql="update tbl_emp set emp_old_salary='$emp_salary',
//                         emp_salary='$emp_new_sal',
//						 emp_add_salary='$emp_add_salary',
//						 emp_sal_add_date='$emp_sal_add_date',
//						 emp_new_sal_apply_date='$emp_new_sal_apply_date',
//						 emp_is_increment='Yes'
//						 where emp_id='$emp_id_h'";


$emp_regid=db_scalar("select emp_reg_id from tbl_emp where 1 and emp_id='$emp_id_h'");




if($_REQUEST['empid']!=""){

echo $sql="update tbl_emp_increment set emp_in_reg_id='$emp_in_reg_id_h',
                                   emp_in_name='$emp_name',
								   emp_in_emp_code='$emp_code',
								   emp_in_dept='$emp_dpt',
								   emp_in_desig='$emp_desination',
								   emp_in_old_sal='$emp_salary',
								   emp_in_in_amnt='$emp_add_salary',
								   emp_in_new_sal='$emp_new_sal',
								   emp_in_in_date='$emp_sal_add_date',
								   emp_in_in_app_date='$emp_new_sal_apply_date'
				 			       where emp_in_id='$_REQUEST[empid]'";
								   
						

}else{

echo $sql="insert into tbl_emp_increment set emp_in_reg_id='$emp_regid',
                                   emp_in_name='$emp_name',
								   emp_in_emp_code='$emp_code',
								   emp_in_dept='$emp_dpt',
								   emp_in_desig='$emp_desination',
								   emp_in_old_sal='$emp_salary',
								   emp_in_in_amnt='$emp_add_salary',
								   emp_in_new_sal='$emp_new_sal',
								   emp_in_in_date='$emp_sal_add_date',
								   emp_in_in_app_date='$emp_new_sal_apply_date'
				 			       ";


}


$res=db_query($sql);
if($res>0){

if($emp_in_reg_id_h!=""){
db_query("update tbl_emp set emp_salary='$emp_new_sal' where 1 and  emp_reg_id='$emp_in_reg_id_h'");
}else{
db_query("update tbl_emp set emp_salary='$emp_new_sal' where 1 and  emp_reg_id='$emp_regid'");
}


header("location:manage-increments.php");
exit;
}

}
?>

<?php


if(empty($_REQUEST['empid'])){
$sql="select * from tbl_emp where 1 and emp_reg_id='$_REQUEST[empid]'";

$data=db_query($sql);
$rec=mysql_fetch_array($data);
@extract($rec);
}else{

echo $sql="select * from  tbl_emp_increment where 1 and emp_in_id='$_REQUEST[empid]'";

$data=db_query($sql);
$rec=mysql_fetch_array($data);
@extract($rec);

}
?>


   <tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	<?php include('left-menu.php'); ?>
	</td>
	
    <td valign="top" width="83%">
	
	
	<p class="b xlarge mt10px ml10px">Add Increments
	<span class="fr mr10px b blue u" style="font-size:12px;"><a href="manage-increments.php">Go Back</a></span>
	
	
	</p>
	<p class="bdr0 ml10px  m5px mr30px"></p>
	
<form action="" enctype="multipart/form-data" method="post">
	<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center" class="mt20px bdrAll">
<tr>
	<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Increment Detail</p></td>
	
	</tr>
	
	
    <tr>
	<td width="27%"><p class="p5px  ml10px b">Employee Name</p></td>
	<td width="71%"><p class="p5px ml10px">
	
<input type="text" required name="emp_name" id="emp_name" style="height:25px; width:220px;" autocomplete="off" onkeyup="auto_sugg_emp(this.value,'emp_name','myDiv1');" value="<?=$emp_in_name?>"  />
	
<div id="myDiv1" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;" >
</div>

<input type="hidden" name="emp_id_h" id="emp_id_h" value="<?=$emp_in_id	?>" />

<input type="hidden" name="emp_in_reg_id_h" id="emp_in_reg_id_h" value="<?=$emp_in_reg_id	?>" />

	</p></td>
	
	</tr>


	
	<tr>
	<td width="27%"><p class="p5px  ml10px b">Employee Id</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="text" required name="emp_code" id="emp_code" style="height:25px; width:220px;" value="<? if($emp_in_emp_code!=""){echo $emp_in_emp_code;}?>"  /></p></td>
	
	</tr>
	
	    <tr>
	<td width="27%"><p class="p5px  ml10px b">Department</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="text" required name="emp_dpt" id="emp_dpt" style="height:25px; width:220px;" value="<?=$emp_in_dept?>"  /></p></td>
	
	</tr>


	    <tr>
	<td width="27%"><p class="p5px  ml10px b">Designation</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="text" required name="emp_desination" id="emp_desination" style="height:25px; width:220px;" value="<?=$emp_in_desig?>"  /></p></td>
	
	</tr>



<tr>
	<td width="27%"><p class="p5px  ml10px b">Previous Salary</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="text" required name="emp_salary" id="emp_salary" style="height:25px; width:220px;" value="<?=$emp_in_old_sal?>"  /></p></td>
	
	</tr>
	
	<tr>
	<td width="27%"><p class="p5px  ml10px b">Incresed Amount</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="text" required name="emp_add_salary" id="emp_add_salary" onblur="add_sal(this.value)" value="<?=$emp_in_in_amnt?>" style="height:25px; width:220px;"  /></p></td>
	
	</tr>
	
	<tr>
	<td width="27%"><p class="p5px  ml10px b">Incresed Salary</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="text" required name="emp_new_sal" id="emp_new_sal" value="<?=$emp_in_new_sal?>" style="height:25px; width:220px;"  /></p></td>
	
	</tr>
	
	<tr>
	<td width="27%"><p class="p5px  ml10px b">Increament Date</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="date" required name="emp_sal_add_date" id="" value="<?=$emp_in_in_date?>" style="height:25px; width:220px;"  /></p></td>
	
	</tr>
	
	<tr>
	<td width="27%"><p class="p5px  ml10px b">Applicable From</p></td>
	<td width="71%"><p class="p5px ml10px"><input type="date" required name="emp_new_sal_apply_date" value="<?=$emp_in_in_app_date?>" id="" style="height:25px; width:220px;"  /></p></td>
	
	</tr>
	
	
	<tr>
	<td colspan="3"><p class="ac p5px"><span class="ml10px">
	<input type="submit" name="submit" value="Submit" class="btn33" /></span>
	<span class="ml10px"><input type="reset" name="submit" value="Reset" class="btn33" /></span>
	</p></td>
	
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
