<?php include('header.php'); ?>
<link rel="stylesheet" href="date/jquery-ui.css">
<script src="date/jquery-1.9.1.js"></script>
<script src="date/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
    $( "#datepicker1" ).datepicker({
        changeYear: true,
        maxDate: '-1D'
    });
	$( "#datepicker2" ).datepicker();
  });
  $(document).ready(function(){
      $('.date1').change(function(){
         
          var today = new Date();
          var birthDate = new Date($(this).val());
          var age = today.getFullYear() - birthDate.getFullYear();
          var m = today.getMonth() - birthDate.getMonth();
           if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
          }
             $('.age1').val(age);
      });
  });
</script>
<?php
if($_REQUEST['deletekaro']!=""){
$sql="delete from tbl_emp_doc where 1 and doc_id='$_REQUEST[deletekaro]'";
$res=db_query($sql);

if($res>0){
header("location:edit-employe.php?empid=$_REQUEST[empid]");
exit;
}

}


$img="";

if(!empty($_REQUEST['empid'])){
$sql="select * from tbl_emp where 1 and  emp_reg_id='$_REQUEST[empid]'";
$record_edit=mysql_fetch_array(db_query($sql));
$img=$record_edit['emp_photo'];
}



$ref_count=db_scalar("select COUNT(*) from tbl_emp_ref  where ref_emp_id='$_REQUEST[empid]'");

if(isset($_REQUEST['edit_emp'])){



if($_FILES['emp_photo']['name']){
$img=$_FILES['emp_photo']['name'];
move_uploaded_file($_FILES['emp_photo']['tmp_name'],"Employee_Documents/".$img);
}


$emp_dob=date("Y-m-d",strtotime($emp_dob));

 $sql="update  tbl_emp set      emp_name='$emp_name',
								emp_age='$emp_age',
								emp_gender='$emp_gender',
								emp_b_group='$emp_b_group',
								emp_father_name='$emp_father_name',
								emp_mother_name='$emp_mother_name',
								emp_dob='$emp_dob',
								emp_photo='$img',
								emp_personal_c_no='$emp_personal_c_no',
								emp_residence_c_no='$emp_residence_c_no',
								emp_emergency_c_no='$emp_emergency_c_no',
								emp_office_email='$emp_office_email',
								emp_personal_email='$emp_personal_email',
								emp_desination='$emp_desination',
								emp_salary='$emp_salary',
								emp_dpt='$emp_dpt',
								emp_under='$emp_under',
								emp_bank_name='$emp_bank_name',
								emp_bank='$emp_bank',
								emp_ac_no='$emp_ac_no',
								emp_bank_branch='$emp_bank_branch',
								emp_bank_neft_rtgs_code='$emp_bank_neft_rtgs_code',
								emp_pan_no='$emp_pan_no',
								emp_adhaar_no='$emp_adhaar_no',
								emp_qualification='$emp_qualification',
								emp_param_adrs='$emp_param_adrs',
								emp_res_adrs='$emp_res_adrs',
								emp_join_date='$emp_join_date',
								emp_exp='$emp_exp'
     							where emp_reg_id='$_REQUEST[empid]'
							";
							

								
$res=db_query($sql);

db_query("update tbl_registration set reg_uname='$reg_uname',reg_pass='$reg_pass' where reg_id='$_REQUEST[empid]'");

if($ref_count>0){

$arr_ids=$_REQUEST['refids'];
$arr_names=$_REQUEST['ref_name'];
$arr_contacts=$_REQUEST['ref_contact_no'];
$arr_relations=$_REQUEST['ref_relation'];


if(is_array($_REQUEST['ref_name'])) {
	
	for($i=0;$i<=count($_REQUEST['ref_name'])-1;$i++){
 	$sql="update  tbl_emp_ref set ref_name = '$arr_names[$i]',
	                              ref_contact_no='$arr_contacts[$i]',
								  ref_relation='$arr_relations[$i]'
								  where ref_id='$arr_ids[$i]'";
    $res=db_query($sql);			
	}	
}


}else{
$arr_ids=$_REQUEST['refids'];
$arr_names=$_REQUEST['ref_name'];
$arr_contacts=$_REQUEST['ref_contact_no'];
$arr_relations=$_REQUEST['ref_relation'];


if(is_array($_REQUEST['ref_name'])) {
	
	for($i=0;$i<=count($_REQUEST['ref_name'])-1;$i++){
	$sql="insert into  tbl_emp_ref set ref_name = '$arr_names[$i]',
	                                   ref_contact_no='$arr_contacts[$i]',
                                       ref_relation='$arr_relations[$i]',
									   ref_emp_id='$_REQUEST[emp_rid]'";
    $res=db_query($sql);			
	}	
}



}


//
//$emp_doc="";
//
//
//if($_FILES['doc_url']['name']){
//$emp_doc=$_FILES['doc_url']['name'];
//move_uploaded_file($_FILES['doc_url']['tmp_name'],"Employee_Documents/".$emp_doc);
//}
//
//
//$sql="update tbl_emp_doc set      doc_title ='$doc_title',
//                                  doc_url='$emp_doc'
//								  where doc_emp_id='$_REQUEST[emp_rid]'
//								  ";
//								  
//						  
//db_query($sql);

if($res>0){
header("location:manage-employe.php");
$_SESSION['msg']="Updated successfully";
}
	
	
	
}									
								
?>
  
  <tr>
    
	
<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >
<?php include('left-menu.php'); ?>
	</td>
	
    <td valign="top" width="83%">
	
	
	<p class="b xlarge mt10px ml10px"><i class="fa fa-edit"></i> Edit-Employee <a href="manage-employe.php" class="mr20px  fr " style="color:#0033CC;font-size:14px"><i class="fa fa-arrow-circle-left"></i> Go back</a>	</p>
	
	
	<p class="bdr0 m5px mr30px"></p>
<form name="form1" action="" method="post" enctype="multipart/form-data">
<div style="color:#009900;font-size:14px;font-weight:700;" align="center">
<?php
if(!empty($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
</div>




<table border="0" cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt10px  ml10px">

<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">PERSONAL INFORMATION</td></tr>

















<tr>
<td colspan="4">


<table style="width:100%">
<tr>
<td style="width:16%" align="center" >
<img src="<?php if(!empty($record_edit['emp_photo'])){echo "Employee_Documents/".$record_edit['emp_photo'];}else{ echo "images/noimage.jpg";}?>" height="110" width="90" style="padding:10px 10px 10px 15px;" />
</td>



<td style="width:84%">



<table style="width:100%">
<tr>

<td style="width:340px;" ><p class="b  blue ml20px p5px">Name </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_name" value="<?=$record_edit['emp_name']?>" id="emp_name" title="Enter employee name" style="height:23px; width:180px;"    /></p></td>


<td width="148"><p class="b blue p6px ml20px">Date of birth</p></td>
<td width="739"><p class="p5px ml10px">
<input type="text" id="datepicker1" class="date1" autocomplete="off" name="emp_dob" value="<?=$record_edit['emp_dob']?>" title="Enter employee date of birth" style="height:23px; width:180px;"    /></p></td>

</tr>
<tr>

<td  style="width:300px;"><p class="b  blue ml20px p5px">Gender</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="radio" name="emp_gender" value="MALE" <?php if($record_edit['emp_gender']=='MALE'){?> checked="checked" <?php }?> > Male
<input type="radio" name="emp_gender" value="FEMALE" <?php if($record_edit['emp_gender']=='FEMALE'){?> checked="checked" <?php }?>> Female
</p></td>

<td style="width:300px;"><p class="b  blue ml20px p5px">Age </p></td>
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_age" class="age1" readonly value="<?=$record_edit['emp_age']?>" title="Enter employee age" style="height:23px; width:180px;"    /></p></td>

</tr>

<tr>
<td width="148"><p class="b blue p6px ml20px">Father's Name </p></td>
 
<td width="739"><p class="p5px ml10px"><input type="text" name="emp_father_name"  value="<?=$record_edit['emp_father_name']?>" id="emp_father_name" title="Enter employee father name" style="height:23px; width:180px;"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Mother's Name </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_mother_name" value="<?=$record_edit['emp_mother_name']?>" title="Enter employee mother name" style="height:23px; width:180px;"    /></p></td>

</tr>

</table>


</td>

</tr>
</table></td></tr>




<tr>
<td style="width:14%" ><p class="b blue p6px ml20px">Blood Group</p></td>
 
<td style="width:26%"><p class="p5px ml10px"><input type="text" name="emp_b_group" value="<?=$record_edit['emp_b_group']?>" id="emp_b_group" title="Enter employee blood group" style="height:23px; width:180px;"    /></p></td>

<td style="width:20%" ><p class="b blue p5px ml20px">Experience </p></td>
 
<td style="width:25%"><p class="p5px ml10px"><input type="text" name="emp_exp" value="<?=$record_edit['emp_exp']?>" title="Enter employee total work experience" style="height:23px; width:180px;"    /></p></td>

</tr>
<tr>

<td style="width:180px;"><p class="b ml20px blue p5px">Permanent Address </p></td>
 
<td ><p class="p5px ml10px"><textarea name="emp_param_adrs"  title="Enter employee paramanent address" rows="3" cols="32"  >
<?=$record_edit['emp_param_adrs']?>
</textarea></p></td>
<td ><p class="b blue p6px ml20px">Resident Address </p></td>

<td ><p class="p5px ml10px"><textarea name="emp_res_adrs" title="Enter employee resident address"  rows="3" cols="32"  >
<?=$record_edit['emp_res_adrs']?>
</textarea></p></td>
</tr>


<tr>
<td width="148"><p class="b blue p6px ml20px">Personal Contact No.</p></td>
<td width="739"><p class="p5px ml10px"><input type="text" name="emp_personal_c_no" value="<?=$record_edit['emp_personal_c_no']?>" title="Enter employee personal mobile no." style="height:23px; width:180px;"    /></p></td>

<td width="148"><p class="b blue p6px ml20px">Residence Contact No.</p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_residence_c_no" value="<?=$record_edit['emp_residence_c_no']?>" title="Enter employee residence mobile no." style="height:23px; width:180px;"    /></p></td>
</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Email </p></td> 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_personal_email" id="emp_personal_email" value="<?=$record_edit['emp_personal_email']?>" title="Enter employee personal email id" style="height:23px; width:180px;"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">PAN No. </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_pan_no" value="<?=$record_edit['emp_pan_no']?>"  title="Enter employee pan card no" style="height:23px; width:180px;"  /></p></td>

</tr>


<tr>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Emergency Contact No.</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_emergency_c_no" value="<?=$record_edit['emp_emergency_c_no']?>"   id="emp_emergency_c_no" title="Enter employee emergency contac bt no" style="height:23px; width:180px;"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Adhaar No.</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_adhaar_no" value="<?=$record_edit['emp_adhaar_no']?>" id="emp_adhaar_no" title="Enter employee adhaar no" style="height:23px; width:180px;"    /></p></td>


</tr>

<tr>

<td  style="width:180px;"><p class="b ml20px blue p5px">Highest Qualification</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_qualification" id="emp_qualification" value="<?=$record_edit['emp_qualification']?>" title="Enter employee highest qualification" style="height:23px; width:180px;"  required=""  /></p></td>

</tr>

<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">REFERENCE DETAIL</td></tr>

<?php
if($ref_count<=0){
?>

<tr id="hide_ref">
<td colspan="4" align="center">
<span style="color:#0033CC;font-size:16px;">No reference is added yet. </span>
<input type="button" value="Click to add" name="" onclick="document.getElementById('show_ref').style.display='block';document.getElementById('hide_ref').style.display='none'" style="margin-left:20px;font-size:14px;color:#666666;border-radius:5px;height:30px;width:120px;margin-top:10px;margin-bottom:10px;"/>
</td>

</tr>

<?php }else{

$c=0;
$sql="select * from tbl_emp_ref where 1 and ref_emp_id='$_REQUEST[empid]'";
$data_ref=db_query($sql);
$i=0;
if(mysql_num_rows($data_ref)>0){
while($record_ref=mysql_fetch_array($data_ref)){
$c=1;
$i++;
?>

<tr >
<td colspan="4" style="width:100%;">
<table style="width:100%;" >
<tr>
<td style="width:16%;"><p class="b ml20px blue p5px">Name</p></td>
<td  style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_name[]" value="<?=$record_ref['ref_name']?>" id="" title="Enter employee reference" style="height:23px;width:180px;"/><select name="ref_relation[]" style="margin-left:20px;width:150px;height:30px;">
<option>CHOOSE RELATION</option>
<?php if(!empty($record_ref['ref_relation'])){?>
<option value="<?=$record_ref['ref_relation']?>" selected="selected"><?=$record_ref['ref_relation']?></option>
<?php }?>
<option>father</option>
<option>Mother</option>
<option>Brother</option>
<option>Sister</option>
</select></p></td>
<td style="width:14%;" ><p class="b blue p5px ml20px">Mobile No </p></td>
<td style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_contact_no[]" value="<?=$record_ref['ref_contact_no']?>"  id="" title="Enter employee reference contac bt no" style="height:23px;width:180px;"    /></p>
<input type="hidden" name="empid" value="<?=$record_edit['emp_id']?>" />
</td>
</tr></table>

<div id="moreDiv" ></div>

</td>

<input type="hidden" name="valuelen" value="1" />
<input type="hidden" id="hid"  name="len" value="1" />
<input type="hidden" name="refids[]" value="<?=$record_ref['ref_id']?>" />


</tr>



<?php 
}
}

}
?>






<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">OFFICIAL INFORMATION</td></tr>
<tr>

<td width="148"><p class="b blue p5px ml20px">Employee Code </p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_code" value="<?=$record_edit['emp_code']?>" readonly="" title="Enter employee code" style="height:23px; width:180px;"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Department </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">

<select name="emp_dpt"  title="Choose employee department" style="height:23px; width:180px;"    >
<option>Select Department</option>

<option value="Marketing" <?php if($record_edit['emp_dpt']=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option value="Back Office" <?php if($record_edit['emp_dpt']=='Back Office'){?> selected="selected" <?php }?>>Back Office</option>
<option value="H.R." <?php if($record_edit['emp_dpt']=='H.R.'){?> selected="selected" <?php }?>>H.R.</option>
<option value="Accounts" <?php if($record_edit['emp_dpt']=='Accounts'){?> selected="selected" <?php }?>>Accounts</option>
<option value="Admin" <?php if($record_edit['emp_dpt']=='Admin'){?> selected="selected" <?php }?>>Admin</option>

</select>

</p></td>

</tr>



<tr>

<td width="148"><p class="b blue p6px ml20px">Degination </p></td>

<td width="739"><p class="p5px ml10px">
<select  name="emp_desination" title="Choose employee desination" style="width:183px;padding:3px;"   >
<option disabled>Select One</option>

<option value="Team Leader" <?php if($record_edit['emp_desination']=='Team Leader'){?> selected="selected" <?php }?>>Team Leader</option>
<option value="Executive" <?php if($record_edit['emp_desination']=='Executive'){?> selected="selected" <?php }?>>Executive</option>
<option value="Programmer" <?php if($record_edit['emp_desination']=='Programmer'){?> selected="selected" <?php }?>>Programmer</option>
<option value="Designer" <?php if($record_edit['emp_desination']=='Designer'){?> selected="selected" <?php }?>>Designer</option>
<option value="SEO" <?php if($record_edit['emp_desination']=='SEO'){?> selected="selected" <?php }?>>SEO</option>
<option value="Project Coordinator" <?php if($record_edit['emp_desination']=='Project Coordinator'){?> selected="selected" <?php }?>>Project Coordinator</option>
<option value="Others" <?php if($record_edit['emp_desination']=='Others'){?> selected="selected" <?php }?>  >Others</option>

</select>

</p></td>


<td width="148"><p class="b blue p6px ml20px">Under </p></td>

<td width="739"><p class="p5px ml10px"><select  name="emp_under" title="Choose employee TL/Department" style="width:183px;padding:3px;"   >
<option>Select Department</option>
<option value="<?=$record_edit['emp_under']?>" <?php if(!empty($record_edit['emp_under'])){?> selected="selected" <?php }?>><?=$record_edit['emp_under']?></option>
<option>Marketing</option>
<option>Back Office</option>
<option>H.R</option>
<option>ac bcounts</option>
<option>Admin</option>
</select></p></td>




</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Offical Email </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_office_email" value="<?=$record_edit['emp_office_email']?>"  title="Enter employee office email id" style="height:23px; width:180px;"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Join Date </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" id="datepicker2" autocomplete="off"  name="emp_join_date" value="<?=$record_edit['emp_join_date']?>"   title="Enter employee joining date"  style="height:23px; width:180px;"    /></p></td>



</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Salary</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_salary"  value="<?=$record_edit['emp_salary']?>"  id="emp_salary"  title="Enter employee Salary" style="height:23px; width:180px;"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Upload Photo</p></td>
 
<td style="width:190px;">
<form action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td style="border:none;"><input type="file" name="emp_photo" /></td>
<!--<td style="border:none;"><input type="submit" name="emp_photo_upload" value="Upload" style="color:#000000;border-radius:4px;font-weight:700;" /></td>-->
</tr>
</table>
</form>

</td>



</tr>

<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">BANK DETAIL</td></tr>
<tr>
<td width="148"><p class="b blue p5px ml20px">Name(As in account) </p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_bank_name" value="<?=$record_edit['emp_bank_name']?>"  id="emp_bank_name" title="Enter employee name as in ac bcount" style="height:23px; width:180px;"  /></p></td>


<td width="148"><p class="b blue p5px ml20px">Bank Name </p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_bank" value="<?=$record_edit['emp_bank']?>" title="Enter employee bank name" style="height:23px; width:180px;"  /></p></td>


</tr>

<tr>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">A/c No. </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_ac_no" value="<?=$record_edit['emp_ac_no']?>" id="emp_ac_no" title="Enter employee bank a/c no" style="height:23px; width:180px;"  /></p></td>


<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Branch </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_bank_branch" value="<?=$record_edit['emp_bank_branch']?>" id="emp_bank_branch" title="Enter employee bank branch" style="height:23px; width:180px;"  /></p></td>

</tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">NEFT/RTGS Code </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_bank_neft_rtgs_code" value="<?=$record_edit['emp_bank_neft_rtgs_code']?>" id="emp_bank_neft_rtgs_code" title="Enter employee bank NEFT/RTGS Code" style="height:23px; width:180px;"  /></p></td>


<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Upload Document</p></td>
 
 
 
<td style="width:190px;padding-left:20px;padding-bottom:10px;border:none;"><p class="p5px ml10px">

<table>
<tr>
<td style="border:none;">
<table>
<tr>
<td style="border:none;">


</td>

</tr>


<tr>
<td style="border:none;">

<ul style="list-style:decimal;">

<?php
$sql="select * from tbl_emp_doc where 1 and doc_emp_id='$_REQUEST[empid]'";
$data=db_query($sql);
while($rec=mysql_fetch_array($data)){
?>
<li><span style="font-size:14px; "><?=$rec['doc_title']?></span>
<a onclick="return confirm('Are you sure ?')"  href="edit-employe.php?deletekaro=<?=$rec['doc_id']?>&empid=<?=$_REQUEST['empid']?>" style="color:#FF0000;font-weight:bold;font-size:12px;text-decoration:underline;float:right;margin-left:10px;">Delete</a>
<a  href="javascript:void(0)" onclick="window.open('edit-doc.php?doc_id=<?=$rec['doc_id']?>','editdoc','resizable=yes,width=500,height=300,left=200,top=200')" style="color:#0066CC;font-weight:bold;font-size:12px;text-decoration:underline;float:right;margin-left:10px;">Edit</a>&nbsp;</li>
<?php
}
?>
</ul>
</p>


</td>


</tr>



</table>


</td>

</tr>

<tr>
<td style="border:none;vertical-align:bottom" >

 <a href="javascript:void(0)" onclick="window.open('edit-doc.php?emp_id=<?=$_REQUEST['empid']?>','editdoc','resizable=yes,width=500,height=300,left=200,top=200')" style="color:#006633;font-weight:bold;font-size:12px;text-decoration:none;margin-left:10px;margin-top:10px;float:right;padding:2px 8px 2px 8px;border:#006633 solid thin;border-radius:4px;float:left">Add More</a></td>

</tr>


</table>
</p>
</td>

</tr>

 <tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">Account Login Detail</td></tr>
  
  <tr>
<td width="148"><p class="b blue p5px ml20px">User Name</p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="reg_uname" value="<?=db_scalar("select reg_uname from tbl_registration where reg_id='$record_edit[emp_reg_id]'")?>"  id="emp_bank_name" title="Enter employee name as in ac bcount" style="height:23px; width:180px;"  /></p></td>


<td width="148"><p class="b blue p5px ml20px">Password</p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="reg_pass" value="<?=db_scalar("select reg_pass from tbl_registration where reg_id='$record_edit[emp_reg_id]'")?>" title="Enter employee bank name" style="height:23px; width:180px;"  /></p></td>


</tr>

<tr>
<td colspan="8"><p class="p5px ac b"><span class="ml10px">

<input type="hidden" name="empid" value="<?=$record_edit['emp_reg_id']?>" />
<input type="hidden" name="emp_rid" value="<?=$record_edit['emp_reg_id']?>" />


<button type="submit" class="btn btn default" title="Click here to edit employee"  name="edit_emp" ><i class="fa fa-edit"></i> Update</button>

</span>


</p></td>

</tr>



</table>










</form>
	
	
	
	
	
	</td>
  </tr>
 
  
</table>


<script >
function getless(id)
{
  var myNode = document.getElementById("moreDiv");
   myNode.removeChild(myNode.firstChild);
}

c=0;

function getmore(DivId)
{
c=c+1;

if(c<=3){

	ctrl = document.form1.valuelen;
	len = parseInt(ctrl.value);
	//alert(ctrl.value);
	ctrl.value = parseInt(len) + parseInt(1);
	
	var indx = ctrl.value + 1;
		
var content = '<table style="width:100%;" ><tr><td style="width:16%;"><p class="b ml20px blue p5px">Name</p></td><td  style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_name[]" id="" title="Enter employee reference" style="height:23px;width:180px;"/><select name="ref_relation[]" style="margin-left:20px;width:150px;height:30px;"><option>CHOOSE RELATION</option><option>father</option><option>Mother</option><option>Brother</option><option>Sister</option></select></p></td><td style="width:14%;" ><p class="b blue p5px ml20px">Mobile No </p></td><td style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_contact_no[]" id="" title="Enter employee reference contac bt no" style="height:23px;width:180px;"    /><input type="button"  style="font-weight:700;color:#666666;border:inset;border-radius:4px;" onClick="getmore(\'moreDiv\')" value="+"	 /><input type="button" style="font-weight:700;color:#666666;border:inset;border-radius:4px;"  onClick="getless(\'moreDiv\')" value="-"	 /></p></td></tr></table>';	
	
	document.getElementById('hid').value=ctrl.value;
	var bodyRef = document.getElementById(DivId);
	var newdiv = document.createElement('div');
	newdiv.setAttribute('class', 'margin clearboth');
	newdiv.innerHTML = content;
	bodyRef.appendChild(newdiv);
	//document.getElementById('css_common_height_control').style.overflow="auto";
	
	}
}
</script>

<?php include 'footer.php'; ?>
</body>
</html>
