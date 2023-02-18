<?php include 'header.php'; ?>

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



<script type="text/javascript" language="javascript" src="aj.js"></script>

<script>
function fill_val(ename,id,field,divName,ecode,dept,desination,sal){
//alert(desination);
document.getElementById(field).value=ename;	
document.getElementById("guide_to_emp_h").value=id;	
document.getElementById(divName).style.display='none';
}


function auto_sugg_emp(val,field,divName){
var v=document.getElementById(field).value;	
suggest_emp(v,field,divName);	
}
</script>

<tr>
	

<?php

if(!empty($_REQUEST['dept'])){
$sql="select * from tbl_dept where 1 and dept_id='$_REQUEST[dept]'";
$rec_guide=mysql_fetch_array(db_query($sql));
}


if(isset($_REQUEST['update'])){

$guide_to_person="";

$guide_to_person=$_REQUEST['guide_to_emp'];

if(empty($guide_to_emp_h)){
$guide_to_emp_id=$guide_to_emp_h2;
}else{
$guide_to_emp_id=$guide_to_emp_h;
}


$guide_date=date("Y-m-d",strtotime($guide_date));

$regd_id=db_scalar("select emp_code from tbl_emp where 1 and emp_id='$guide_to_emp_id'");


 $sql="update tbl_dept set dept_name='$dept_name',
                            dept_maped_id='WKN000$regd_id',
							dept_user_name='$guide_to_person'
 						    where dept_id='$_REQUEST[dept]'
							 ";
							 
							 
								
						 
								
								 
$res=db_query($sql);								 

if($res>0){
header("location:map-user.php");
exit;
}

}


if(isset($_REQUEST['submit'])){

$guide_to_person="";

$guide_to_person=$_REQUEST['guide_to_emp'];

if(empty($guide_to_emp_h)){
$guide_to_emp_id=$guide_to_emp_h2;
}else{
$guide_to_emp_id=$guide_to_emp_h;
}

$guide_date=date("Y-m-d",strtotime($guide_date));

$regd_id=db_scalar("select emp_code from tbl_emp where 1 and emp_id='$guide_to_emp_id'");

$sql="insert into tbl_dept set  dept_name='$dept_name',
                                dept_user_name='$guide_to_person',
                                dept_maped_id='WKN000$regd_id'
							 ";
								
						 
								
								 
$res=db_query($sql);								 

if($res>0){
header("location:map-user.php");
exit;
}

}

?>



<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
<?php include 'left-menu.php'; ?>
</td>

<td valign="top" width="83%">
<p class="b xlarge mt10px ml10px">Guidelines
<span class="fr mr10px b blue u" style="font-size:12px;"><a href="manage-guidelines.php">Go Back</a></span>
</p>
<p class="bdr0 ml10px  m5px mr30px"></p>

<form action="" method="post" enctype="multipart/form-data">

<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center" class="mt20px bdrAll">
<tr>
<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Complain ID Detail</p></td>

</tr>

<tr>
<td width="27%"><p class="p5px  ml10px b"> Name</p></td>
<td width="71%"><p class="p5px ml10px"><input type="text" name="dept_name" id="dept_name" style="height:25px; width:220px;" value="<?=$rec_guide['dept_name']?>"  /></p></td>
</tr>

<tr>
<td width="27%"><p class="p5px  ml10px b">ID</p></td>

<td width="71%"><p class="p5px ml10px">

<input type="text" name="guide_to_emp" id="guide_to_emp" style="height:20px; width:120px;text-align:center;"  autocomplete="off" onkeyup="auto_sugg_emp(this.value,'guide_to_emp','myDiv1');"  placeholder="  Employee"

value="" />

<div id="myDiv1" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;">
</div>

<input type="hidden" name="guide_to_emp_h" id="guide_to_emp_h" value="" />

<input type="hidden" name="guide_to_emp_h2" id="guide_to_emp_h2" value="<?=$rec_guide['dept_maped_id']?>" />




</p></td>

</tr>





<tr>
<td colspan="3"><p class="ac p5px"><span class="ml10px">

<input type="submit" name="<?php if(!empty($_REQUEST['dept'])){?>update<?php }else{?>submit<?php }?>" value="<?php if(!empty($_REQUEST['dept'])){?>Update<?php }else{?>Submit<?php }?>" class="bbnt3" />

</span>
<span class="ml10px"><input type="reset" name="reset" value="Reset" class="bbnt3" /></span>
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