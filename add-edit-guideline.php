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

if(!empty($_REQUEST['guide'])){
$sql="select * from tbl_guideline where 1 and guide_id='$_REQUEST[guide]'";
$rec_guide=mysql_fetch_array(db_query($sql));
}


if(isset($_REQUEST['update'])){

$guide_to_person="";

if($_REQUEST['guide_to']=='dept'){
$guide_to_person=$_REQUEST['guide_to_dpt'];
$guide_type="dept";
}else if($_REQUEST['guide_to']=='emp'){
$guide_to_person=$_REQUEST['guide_to_emp'];
$guide_type="emp";
}

if(empty($guide_to_emp_h)){
$guide_to_emp_id=$guide_to_emp_h2;
}else{
$guide_to_emp_id=$guide_to_emp_h;
}

$guide_date=date("Y-m-d",strtotime($guide_date));


  $sql="update tbl_guideline set guide_title='$guide_title',
                                 guide_from='$guide_from',
                                 guide_to='$guide_to_person',
   						         guide_to_id='$guide_to_emp_id',
								 guide_type='$guide_type',								 
								 guide_msg='$guide_msg',
								 guide_date=now()
								 where guide_id='$_REQUEST[guide]'
							 ";
								
						 
								
								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-guidelines.php");
exit;
}

}


if(isset($_REQUEST['submit'])){

$guide_to_person="";

if($_REQUEST['guide_to']=='dept'){
$guide_to_person=$_REQUEST['guide_to_dpt'];
$guide_type="dept";
}else if($_REQUEST['guide_to']=='emp'){
$guide_to_person=$_REQUEST['guide_to_emp'];
$guide_type="emp";
}

if(empty($guide_to_emp_h)){
$guide_to_emp_id=$guide_to_emp_h2;
}else{
$guide_to_emp_id=$guide_to_emp_h;
}

$guide_date=date("Y-m-d",strtotime($guide_date));


$sql="insert into tbl_guideline set guide_title='$guide_title',
                                    guide_from='$guide_from',
                                    guide_to='$guide_to_person',
   						            guide_to_id='$guide_to_emp_id',
								    guide_type='$guide_type',								 
								    guide_msg='$guide_msg',
								    guide_date=now()
							 ";
								
						 
								
								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-guidelines.php");
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
<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Guideline Detail</p></td>

</tr>

<tr>
<td width="27%"><p class="p5px  ml10px b"> Title</p></td>
<td width="71%"><p class="p5px ml10px"><input type="text" required name="guide_title" id="guide_title" style="height:25px; width:220px;" value="<?=$rec_guide['guide_title']?>"  /></p></td>
</tr>



<tr>
<td width="27%"><p class="p5px  ml10px b">From</p></td>
<td width="71%"><p class="p5px ml10px">

<?
$type=db_scalar("select reg_type from tbl_registration where reg_id='$_SESSION[UID_EMS]'");
if($type=="ADMIN" ){
?>
<select name="guide_from" id="guide_from" style="width:160px;" required>
<?
$sql="select * from tbl_registration where 1 and (reg_type='ADMIN' || reg_type='SUBADMIN')";
$data=db_query($sql);
while($rec=mysql_fetch_array($data)){
?>
<option <? if($rec_guide['guide_from']==$rec['reg_uname']){?> selected="selected"<? }?>><?=$rec['reg_uname']?></option>
<? }?>
</select>

<? }else if($_REQUEST['guide']!=""){?>

<?=$rec_guide['guide_from']?>

<input type="hidden" name="guide_from" value="<?=$rec_guide['guide_from']?>" />


<? }else{?>
<input type="text" required name="guide_from_place" id="guide_from_place" style="height:20px; width:120px;text-align:center;"  autocomplete="off"  
value="<?=ucfirst(db_scalar("select reg_uname from tbl_registration where reg_id='$_SESSION[UID_EMS]'"))?>" disabled="disabled" />
<input type="hidden" name="guide_from" value="<?=db_scalar("select reg_uname from tbl_registration where reg_id='$_SESSION[UID_EMS]'")?>" />
<? }?>

</p></td>
</tr>


<tr>
<td width="27%"><p class="p5px  ml10px b">Guideline To</p></td>

<td width="71%"><p class="p5px ml10px">


<input type="radio" required name="guide_to" onclick="notcheck();" id="guide_to" <?php if(empty($rec_guide['guide_to_id'])){?> checked="checked" <?php }?> value="dept" />
<select name="guide_to_dpt" id="guide_to_dpt"  title="Choose employee department" style="padding:4px; width:124px;"  >

<option <?php if($rec_guide['guide_to']=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option <?php if($rec_guide['guide_to']=='Back Office'){?> selected="selected" <?php }?> >Back Office</option>
<option <?php if($rec_guide['guide_to']=='HR'){?> selected="selected" <?php }?> value="HR">H.R.</option>
<option <?php if($rec_guide['guide_to']=='Accounts'){?> selected="selected" <?php }?> >Accounts</option>
</select>

<input type="radio" required onclick="check();" name="guide_to" id="guide_to" <?php if(!empty($rec_guide['guide_to_id'])){?> checked="checked" <?php }?> value="emp" />

<input type="text" name="guide_to_emp" id="guide_to_emp" style="height:20px; width:120px;text-align:center;"  autocomplete="off" onkeyup="auto_sugg_emp(this.value,'guide_to_emp','myDiv1');"  placeholder="  Employee"

value="<?php if(!empty($rec_guide['guide_to_id'])){echo $rec_guide['guide_to'];}?>" />

<div id="myDiv1" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;">
</div>

<input type="hidden" name="guide_to_emp_h" id="guide_to_emp_h" value="" />

<input type="hidden" name="guide_to_emp_h2" id="guide_to_emp_h2" value="<?=$rec_guide['guide_to_id']?>" />




</p></td>

</tr>



<tr>
<td width="36%"><p class="p5px ml10px b">Guideline</p></td>
<td width="62%"><p class="p5px  ml10px">
<textarea class="" required name="guide_msg" id="guide_msg" rows="10" cols="40"><?=$rec_guide['guide_msg']?></textarea></p></td>
</tr>


<tr>
<td colspan="3"><p class="ac p5px"><span class="ml10px">

<input type="submit" name="<?php if(!empty($_REQUEST['guide'])){?>update<?php }else{?>submit<?php }?>" value="<?php if(!empty($_REQUEST['guide'])){?>Update<?php }else{?>Submit<?php }?>" class="btn33" />

</span>
<span class="ml10px"><input type="reset" name="reset" value="Reset" class="btn33" /></span>
</p></td>
</tr>
</table>

</form>

<p>&nbsp;</p>



</td>
</tr>
</table>

<script>
    function check(){
        document.getElementById("guide_to_emp").setAttribute("required", "required");
    }
      function notcheck(){
        document.getElementById("guide_to_emp").removeAttribute("required");
    }
</script>

<?php include 'footer.php'; ?>
</body>
</html>
