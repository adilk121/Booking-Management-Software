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
document.getElementById("notice_to_emp_h").value=id;	
document.getElementById(divName).style.display='none';
}


function auto_sugg_emp(val,field,divName){
var v=document.getElementById(field).value;	
suggest_emp(v,field,divName);	
}
</script>

<tr>
	

<?php

if(!empty($_REQUEST['notice'])){
$sql="select * from tbl_notice where 1 and notice_id='$_REQUEST[notice]'";
$rec_notice=mysql_fetch_array(db_query($sql));
}


if(isset($_REQUEST['update'])){

$notice_to_emp_id="";
$notice_to_person="";

if($_REQUEST['notice_to']=='dept'){
$notice_to_person=$_REQUEST['notice_to_dpt'];
}else if($_REQUEST['notice_to']=='emp'){
$notice_to_person=$_REQUEST['notice_to_emp'];
}

if(empty($notice_to_emp_h)){
$notice_to_emp_id=$notice_to_emp_h2;
}else{
$notice_to_emp_id=$notice_to_emp_h;
}

$notice_date=date("Y-m-d",strtotime($notice_date));

$sql="update tbl_notice set notice_title='$notice_title',
                            notice_by='$notice_by',
						    notice_to='$notice_to_person',
						    notice_to_id='$notice_to_emp_id',
						    notice_date='$notice_date',
						    notice_msg='$notice_msg'
						    where notice_id='$_REQUEST[notice]'
						 ";
								 

								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-notice.php");
exit;
}

}



if(isset($_REQUEST['submit'])){


$notice_to_person="";

if($_REQUEST['notice_to']=='dept'){
$notice_to_person=$_REQUEST['notice_to_dpt'];
$notice_type="dept";
}else if($_REQUEST['notice_to']=='emp'){
$notice_to_person=$_REQUEST['notice_to_emp'];
$notice_type="emp";
}

if(empty($notice_to_emp_h)){
$notice_to_emp_id=$notice_to_emp_h2;
}else{
$notice_to_emp_id=$notice_to_emp_h;
}

$notice_date=date("Y-m-d",strtotime($notice_date));

$sql="insert into tbl_notice set notice_title='$notice_title',
                                 notice_by='$notice_by',
                                 notice_to='$notice_to_person',
								 notice_to_id='$notice_to_emp_id',
								 notice_date='$notice_date',
								 notice_type='$notice_type',
								 notice_msg='$notice_msg'
								
								 ";
								
								 
								
								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-notice.php");
exit;
}

}

?>



<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
<?php include 'left-menu.php'; ?>
</td>

<td valign="top" width="83%">
<p class="b xlarge mt10px ml10px">Notice-Board
<span class="fr mr10px b blue u" style="font-size:12px;"><a href="manage-notice.php">Go Back</a></span>
</p>
<p class="bdr0 ml10px  m5px mr30px"></p>

<form action="" method="post" enctype="multipart/form-data">

<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center" class="mt20px bdrAll">
<tr>
<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Notice Detail</p></td>

</tr>

<tr>
<td width="27%"><p class="p5px  ml10px b"> Title</p></td>
<td width="71%"><p class="p5px ml35px"><input type="text" required name="notice_title" id="notice_title" style="height:25px; width:220px;" value="<?=$rec_notice['notice_title']?>"  /></p></td>
</tr>



<tr>
<td width="27%"><p class="p5px  ml10px b">Notice By</p></td>

<td width="71%"><p class="p5px ml35px">
<select name="notice_by" id="notice_by" style="padding:4px; width:124px;" required>

<option <?php if($rec_notice['notice_by']=='HR'){?> selected="selected" <?php }?> value="HR">H.R</option>
<option <?php if($rec_notice['notice_by']=='Director'){?> selected="selected" <?php }?>>Director</option>


</select></p></td>

</tr>


<tr>
<td width="27%"><p class="p5px  ml10px b">Notice To</p></td>

<td width="71%"><p class="p5px ml10px">


<input type="radio" required name="notice_to" onclick="notcheck();" id="notice_to" <?php if(empty($rec_notice['notice_to_id'])){?> checked="checked" <?php }?> value="dept" />
<select name="notice_to_dpt" id="notice_to_dpt"  title="Choose employee department" style="padding:4px; width:124px;"  >

<option <?php if($rec_notice['notice_to']=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option <?php if($rec_notice['notice_to']=='Back Office'){?> selected="selected" <?php }?> >Back Office</option>
<option <?php if($rec_notice['notice_to']=='HR'){?> selected="selected" <?php }?> value="HR">H.R.</option>
<option <?php if($rec_notice['notice_to']=='Accounts'){?> selected="selected" <?php }?> >Accounts</option>
</select>

<input type="radio" required name="notice_to" onclick="check();" id="notice_to" <?php if(!empty($rec_notice['notice_to_id'])){?> checked="checked" <?php }?> value="emp" />

<input type="text" name="notice_to_emp" id="notice_to_emp" style="height:20px; width:120px;text-align:center;"  autocomplete="off" onkeyup="auto_sugg_emp(this.value,'notice_to_emp','myDiv1');"  placeholder="  Employee"

value="<?php if(!empty($rec_notice['notice_to_id'])){echo $rec_notice['notice_to'];}?>" />

<div id="myDiv1" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;">
</div>

<input type="hidden" name="notice_to_emp_h" id="notice_to_emp_h" value="" />

<input type="hidden" name="notice_to_emp_h2" id="notice_to_emp_h2" value="<?=$rec_notice['notice_to_id']?>" />




</p></td>

</tr>


<tr>
<td width="27%"><p class="p5px  ml10px b">Notice Date</p></td>
<td width="71%"><p class="p5px ml35px"><input type="text" required name="notice_date" id="datepicker1" style="height:25px; width:220px;" value="<?=$rec_notice['notice_date']?>"  /></p></td>
</tr>

<tr>
<td width="36%"><p class="p5px ml10px b">Message</p></td>
<td width="62%"><p class="p5px  ml35px">
<textarea class="" name="notice_msg" required id="notice_msg" rows="10" cols="40"><?=$rec_notice['notice_msg']?></textarea></p></td>
</tr>


<tr>
<td colspan="3"><p class="ac p5px"><span class="ml10px">

<?php if(!empty($_REQUEST['notice'])){ ?>
<input type="submit" name="update" value="Update" class="btn33" />
<?php }else{?>
<input type="submit" name="submit" value="Submit" class="btn33" />
<?php }?>
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
        document.getElementById("notice_to_emp").setAttribute("required", "required");
    }
    function notcheck(){
        document.getElementById("notice_to_emp").removeAttribute("required");
    }
</script>

<?php include 'footer.php'; ?>
</body>
</html>
