<?php require_once("includes/dbsmain.inc.php");  ?>
<?php //header?>
<?php include('header.php'); ?>

<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>

<link rel="stylesheet" href="date/jquery-ui.css">
<script src="date/jquery-1.9.1.js"></script>
<script src="date/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

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

$rid="";

$sql="select * from tbl_emp where 1 order by emp_code desc limit 0,1";
$rec=mysql_fetch_array(db_query($sql));

$emp=$rec['emp_code']+1;
$employee_code="AMPL".$emp;

if(isset($_REQUEST['add_emp'])){

$sql="insert into tbl_registration set reg_type='EMPLOYEE',
                                       reg_uname='$employee_code',
                                       reg_pass='$employee_code',									   
									   reg_status='Active',
									   reg_date=now()
									   ";
									   
$res=db_query($sql);
if($res>0){
$rid=mysql_insert_id();
}
									   

/////////////  ADDING IMAGE ///////////////////////

$img="";


if($_FILES['emp_photo']['name']){
//$_SESSION['img']=$_FILES['emp_photo']['name'];
$img=$_FILES['emp_photo']['name'];

move_uploaded_file($_FILES['emp_photo']['tmp_name'],"Employee_Documents/".$img);
}


/////////////////////////////////////////////////


$emp_dob=date("Y-m-d",strtotime($emp_dob));


if(!empty($emp_desination_others)){
$emp_desination=$emp_desination_others;
}


$sql="insert into  tbl_emp set  emp_reg_id='$rid',
								emp_name='$emp_name',
								emp_age='$emp_age',
								emp_gender='$emp_gender',
								emp_b_group='$emp_b_group',
								emp_father_name='$emp_father_name',
								emp_mother_name='$emp_mother_name',
								emp_dob='$emp_dob',
								emp_personal_c_no='$emp_personal_c_no',
								emp_residence_c_no='$emp_residence_c_no',
								emp_emergency_c_no='$emp_emergency_c_no',
								emp_office_email='$emp_office_email',
								emp_personal_email='$emp_personal_email',
								emp_desination='$emp_desination',
								emp_salary='$emp_salary',
								emp_photo='$img',
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
								emp_code='$emp',
								emp_param_adrs='$emp_param_adrs',
								emp_res_adrs='$emp_res_adrs',
								emp_join_date='$emp_join_date',
								emp_exp='$emp_exp',
								emp_status='WORKING'
								";
								
								
								
	
								
//unset($_SESSION['img']);																
								
$res=db_query($sql);

$arr_ids=$_REQUEST['refids'];
$arr_names=$_REQUEST['ref_name'];
$arr_contacts=$_REQUEST['ref_contact_no'];
$arr_relations=$_REQUEST['ref_relation'];


if(is_array($_REQUEST['ref_name'])) {
	
	for($i=0;$i<=count($_REQUEST['ref_name'])-1;$i++){
	$sql="insert into  tbl_emp_ref set ref_name = '$arr_names[$i]',ref_contact_no='$arr_contacts[$i]',ref_relation='$arr_relations[$i]',ref_emp_id='$rid'";
    $res=db_query($sql);			
	}	
}


$emp_doc="";


if($_FILES['doc_url']['name']){
$emp_doc=$_FILES['doc_url']['name'];
move_uploaded_file($_FILES['doc_url']['tmp_name'],"Employee_Documents/".$emp_doc);

$sql="insert into tbl_emp_doc set doc_title ='$doc_title',
                                  doc_url='$emp_doc',
								  doc_emp_id='$rid'
								  ";
								  
						  
db_query($sql);
}


if($_FILES['doc_url1']['name']){
$emp_doc1=$_FILES['doc_url1']['name'];
move_uploaded_file($_FILES['doc_url1']['tmp_name'],"Employee_Documents/".$emp_doc1);

$sql="insert into tbl_emp_doc set doc_title ='$doc_title1',
                                  doc_url='$emp_doc1',
								  doc_emp_id='$rid'
								  ";
								  
						  
db_query($sql);
}


if($_FILES['doc_url2']['name']){
$emp_doc2=$_FILES['doc_url2']['name'];
move_uploaded_file($_FILES['doc_url2']['tmp_name'],"Employee_Documents/".$emp_doc2);

$sql="insert into tbl_emp_doc set doc_title ='$doc_title2',
                                  doc_url='$emp_doc2',
								  doc_emp_id='$rid'
								  ";
								  
						  
db_query($sql);
}





if($res>0){
//$_SESSION['msg']="Employee is added";
header("location:manage-employe.php");
exit;
}
	
	
	
}									
								
?>
  
  <tr>
    
	
<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >	
<?php include('left-menu.php'); ?>
</td>
	
<td valign="top" width="83%"><p class="b xlarge mt10px ml10px"><i class="fa fa-user-plus"></i> Add Employee <a href="manage-employe.php" class="mr20px  fr " style="color:#0033CC;font-size:14px"><i class="fa fa-arrow-circle-left"></i> Go back</a>	</p>
<p class="bdr0 m5px mr30px"></p>

<form name="form1" action="" method="post" enctype="multipart/form-data">

<div style="color:#0066FF;font-size:14px;font-weight:700;margin-left:250px;">
<?php 
//if(!empty($_SESSION['msg'])){
//echo $_SESSION['msg'];
//unset($_SESSION['msg']);
//}
?>
</div>	



<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">

<tr><td colspan="6" style="color:#666666;font-weight:700;" >
<?php /*?><p class="fr mr15px">




<img src="<?php if(!empty($_SESSION['img'])){echo "Employee_Documents/".$_SESSION['img'];}else{ echo "images/noimage.jpg";}?>" height="100" width="70" style="padding:10px 10px 10px 15px;" /></p>
<?php */?>
<p style="margin-left:10px;margin-top:20px;margin-bottom:20px;">PERSONAL INFORMATION</p>

</td></tr>

<tr>
<td style="width:340px;" ><p class="b  blue ml20px p5px">Name </p></td> 
<td style="width:190px;">
<p class="p5px ml10px" >
<input type="text" name="emp_name" id="emp_name" title="Enter employee name" value="<?=$emp_name?>" style="height:23px;width:180px;" required="" /></p></td>
<td width="148"><p class="b blue p6px ml20px">Date of birth</p></td> 
<td width="739"><p class="p5px ml10px"><input type="text" class="date1" id="datepicker1" autocomplete="off" name="emp_dob" value="<?=$emp_dob?>" title="Enter employee date of birth" style="height:23px; width:180px;"  required=""/></p></td>
</tr>

<tr>
<td  style="width:300px;"><p class="b  blue ml20px p5px">Gender</p></td> 
<td style="width:190px;"><p class="p5px ml10px">
<input type="radio" name="emp_gender" value="MALE" <?php if($emp_gender=='MALE'){?> checked="checked" <?php }?>  required="" > Male
<input type="radio" name="emp_gender" value="FEMALE" <?php if($emp_gender=='FEMALE'){?> checked="checked" <?php }?> required="" > Female
</p></td>
<td style="width:400px;"><p class="b  blue ml20px p5px">Age </p></td> 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_age" readonly class="age1" value="<?=$emp_age?>" required=""  title="Enter employee age" style="height:23px; width:180px;"    /></p></td>

</tr>

<tr>
<td width="148"><p class="b blue p6px ml20px">Father's Name </p></td> 
<td width="739"><p class="p5px ml10px"><input type="text" name="emp_father_name" id="emp_father_name" value="<?=$emp_father_name?>" title="Enter employee father name" style="height:23px; width:180px;" required="" /></p></td>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Mother's Name </p></td> 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_mother_name" value="<?=$emp_mother_name?>" title="Enter employee mother name" style="height:23px; width:180px;"   /></p></td>
</tr>

<tr>
<td width="148"><p class="b blue p6px ml20px">Blood Group</p></td> 
<td width="739"><p class="p5px ml10px"><input type="text" name="emp_b_group" id="emp_b_group" value="<?=$emp_b_group?>" title="Enter employee blood group" style="height:23px; width:180px;"    /></p></td>
<td width="148"><p class="b blue p5px ml20px">Experience </p></td> 
<td width="739"><p class="p5px ml10px"><input type="text" name="emp_exp" value="<?=$emp_exp?>" title="Enter employee total work experience" style="height:23px; width:180px;"  required=""  /></p></td>
</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Permanent Address </p></td> 
<td style="width:190px;"><p class="p5px ml10px"><textarea name="emp_param_adrs"  title="Enter employee paramanent address" rows="3" cols="32" required="" >
<?=$emp_param_adrs?>
</textarea></p></td><td width="148"><p class="b blue p6px ml20px">Resident Address </p></td>
<td width="739"><p class="p5px ml10px"><textarea name="emp_res_adrs" title="Enter employee resident address"  rows="3" cols="32" required=""  >
<?=$emp_res_adrs?></textarea></p></td>
</tr>


<tr>
<td width="148"><p class="b blue p6px ml20px">Personal Contact No.</p></td>
<td width="739"><p class="p5px ml10px"><input type="text" name="emp_personal_c_no" value="<?=$emp_personal_c_no?>" title="Enter employee personal mobile no." style="height:23px; width:180px;" required=""  /></p></td>

<td width="160"><p class="b blue p6px ml20px">Residence Contact No.</p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_residence_c_no" value="<?=$emp_residence_c_no?>" title="Enter employee residence mobile no." style="height:23px; width:180px;"  required=""  /></p></td>

</tr>

<tr>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Personal Email </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_personal_email" id="emp_personal_email" value="<?=$emp_personal_email?>" title="Enter employee personal email id" style="height:23px; width:180px;"   required="" /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">PAN No. </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_pan_no" value="<?=$emp_pan_no?>" title="Enter employee pan card no" style="height:23px; width:180px;"  /></p></td>

</tr>


<tr>

<td  style="width:180px;"><p class="b ml20px blue p5px">Emergency Contact No.</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_emergency_c_no" id="emp_emergency_c_no" value="<?=$emp_emergency_c_no?>" title="Enter employee emergency contac bt no" style="height:23px; width:180px;"  required=""  /></p></td>

<td style="width:180px;"><p class="b ml20px blue p5px">Adhaar No.</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_adhaar_no" id="emp_adhaar_no" value="<?=$emp_adhaar_no?>" title="Enter employee adhaar no" style="height:23px;width:180px;"   /></p></td>


</tr>
<tr>

<td  style="width:180px;"><p class="b ml20px blue p5px">Highest Qualification</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_qualification" id="emp_qualification" value="<?=$emp_qualification?>" title="Enter employee highest qualification" style="height:23px; width:180px;"  required=""  /></p></td>

</tr>

<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">REFERENCE DETAIL</td></tr>
<tr>
<td colspan="4" style="width:100%;">

<table style="width:100%;" >
<tr>
<td style="width:16%;"><p class="b ml20px blue p5px">Name</p></td>
<td  style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_name[]" id=""  title="Enter employee reference" style="height:23px;width:180px;"/>

<select name="ref_relation[]" style="margin-left:20px;width:150px;height:30px;" >
<option value="0">CHOOSE RELATION</option>
<option>Father</option>
<option>Mother</option>
<option>Brother</option>
<option>Sister</option>
<option>Others</option>
</select></p></td>
<td style="width:14%;" ><p class="b blue p5px ml20px">Mobile No </p></td>
<td style="width:35%;"><p class="p5px ml10px">
<input type="text" name="ref_contact_no[]" id="" title="Enter employee reference contac bt no" style="height:23px;width:180px;"   />
<input type="button"  style="font-weight:700;color:#666666;border:inset;border-radius:4px;" onClick="getmore('moreDiv')" value="+"	 />
<input type="button" style="font-weight:700;color:#666666;border:inset;border-radius:4px;"  onClick="getless('moreDiv')" value="-"	 /></p></td>
</tr></table>

<div id="moreDiv" ></div>

</td>

<input type="hidden" name="valuelen" value="1" />
<input type="hidden" id="hid"  name="len" value="1" />
<input type="hidden" name="refids[]" value="<?=$rid?>" />

<div style="font-size:36px;"><?=$rid?></div>
</tr>







<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">OFFICIAL INFORMATION</td></tr>
<tr>

<td width="148"><p class="b blue p5px ml20px">Employee Code </p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_code" value="<?=$employee_code?>" readonly="" title="Enter employee code" style="height:23px; width:180px;font-weight:bold;color:#666666"    /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Department </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">

<select name="emp_dpt"  title="Choose employee department" style="height:23px; width:180px;"   required="" onchange="fetch_emp(this.value)" >
<option value="">Select Department</option>

<option value="Marketing" <?php if($emp_dpt=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option value="Back Office" <?php if($emp_dpt=='Back Office'){?> selected="selected" <?php }?>>Back Office</option>
<option value="H.R." <?php if($emp_dpt=='H.R.'){?> selected="selected" <?php }?>>H.R.</option>
<option value="Accounts" <?php if($emp_dpt=='Accounts'){?> selected="selected" <?php }?>>Accounts</option>
<option value="Admin" <?php if($emp_dpt=='Admin'){?> selected="selected" <?php }?>>Admin</option>

</select>

</p></td>

</tr>



<tr>

<td width="148"><p class="b blue p6px ml20px">Designation </p></td>

<td width="739"><p class="p5px ml10px">


<?php /*?><input type="text" name="emp_desination" value="<?=$emp_desination?>" title="Enter employee desination" style="height:23px; width:180px;"    /></p><?php */?>

<select  name="emp_desination" id="emp_desination" title="Choose employee desination" style="width:183px;padding:3px;" required=""  onchange="show_desig(this.value)"  >
<option value="" >Select One</option>
<option value="Team Leader" <?php if($emp_desination=='Team Leader'){?> selected="selected" <?php }?>>Team Leader</option>
<option value="Executive" <?php if($emp_desination=='Executive'){?> selected="selected" <?php }?>>Executive</option>
<option value="Programmer" <?php if($emp_desination=='Programmer'){?> selected="selected" <?php }?>>Programmer</option>
<option value="Designer" <?php if($emp_desination=='Designer'){?> selected="selected" <?php }?>>Designer</option>
<option value="SEO" <?php if($emp_desination=='SEO'){?> selected="selected" <?php }?>>SEO</option>
<option value="Project Coordinator" <?php if($emp_desination=='Project Coordinator'){?> selected="selected" <?php }?>>Project Coordinator</option>
<option value="Others" <?php if($emp_desination=='Others'){?> selected="selected" <?php }?>  >Others</option>
</select>


<input type="text" name="emp_desination_others" id="emp_desination_others" value="<?=$emp_desination_others?>" title="Enter employee designation" style="height:18px; width:125px;margin-right:10px;display:none;float:right"  placeholder="    Enter Designation"   />

</td>

<td width="148"><p class="b blue p6px ml20px">Under </p></td>

<td width="739">

<div id="show_emp" class="p5px ml10px"  >
<select  name="emp_under" title="Choose employee TL/Department" style="width:183px;padding:3px;"  required="" >
<option value="">Select One</option>
<?php /*?>
<option value="Marketing" <?php if($emp_under=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option value="Back Office" <?php if($emp_under=='Back Office'){?> selected="selected" <?php }?>>Back Office</option>
<option value="H.R." <?php if($emp_under=='H.R.'){?> selected="selected" <?php }?>>H.R.</option>
<option value="Accounts" <?php if($emp_under=='Accounts'){?> selected="selected" <?php }?>>Accounts</option>
<option value="Admin" <?php if($emp_under=='Admin'){?> selected="selected" <?php }?>>Admin</option>
<?php */?>
</select>
</div>

</td>




</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Offical Email </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_office_email" value="<?=$emp_office_email?>" title="Enter employee office email id" style="height:23px; width:180px;"   required="" /></p></td>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Join Date </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" id="datepicker2" autocomplete="off"  name="emp_join_date" value="<?=$emp_join_date?>" title="Enter employee joining date"  style="height:23px; width:180px;"  required=""  /></p></td>



</tr>

<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Salary</p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_salary" value="<?=$emp_salary?>" id="emp_salary"  title="Enter employee Salary" style="height:23px; width:180px;"  required=""  /></p></td>


<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Upload Photo</p></td>
 
<td style="width:190px;">
<form name="frm_img" action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td style="border:none;"><input type="file" name="emp_photo" id="emp_photo" value="<?=$emp_photo?>"  /></td>
<?php /*?><td style="border:none;"><input type="submit" name="emp_photo_upload" value="Upload"  style="color:#000000;border-radius:4px;font-weight:700;" /></td>
<?php */?></tr>
</table>
</form>

</td>

</tr>

<tr><td colspan="6" style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">BANK DETAIL</td></tr>
<tr>
<td width="148"><p class="b blue p5px ml20px">Name(As in account) </p></td>

<td width="739"><p class="p5px ml10px"><input type="text" name="emp_bank_name" id="emp_bank_name" value="<?=$emp_bank_name?>" title="Enter employee name as in ac bcount" style="height:23px; width:180px;" required="" /></p></td>


<td width="148"><p class="b blue p5px ml20px">Bank Name </p></td>

<td width="739"><p class="p5px ml10px">
<input type="text" name="emp_bank" value="<?=$emp_bank?>" title="Enter employee bank name" style="height:23px; width:180px;"  /></p></td>


</tr>

<tr>

<td width="150" style="width:180px;"><p class="b ml20px blue p5px">A/c No. </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_ac_no" id="emp_ac_no" value="<?=$emp_ac_no?>" title="Enter employee bank a/c no" style="height:23px; width:180px;"  /></p></td>


<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Branch </p></td>
 
<td style="width:190px;"><p class="p5px ml10px"><input type="text" name="emp_bank_branch" id="emp_bank_branch" value="<?=$emp_bank_branch?>" title="Enter employee bank branch" style="height:23px; width:180px;" /></p></td>

</tr>
<td  style="width:180px;"><p class="b ml20px blue p5px">NEFT/RTGS Code </p></td>
 
<td style="width:190px;"><p class="p5px ml10px">
<input type="text" name="emp_bank_neft_rtgs_code" id="emp_bank_neft_rtgs_code" 
value="<?=$emp_bank_neft_rtgs_code?>" title="Enter employee bank NEFT/RTGS Code" style="height:23px; width:180px;"   /></p></td>


<td  style="width:180px;"><p class="b ml20px blue p5px">Upload Document</p></td>
 
 
 
<td style="width:190px;padding-left:20px;padding-bottom:10px;border:none;"><p class="p5px ml10px">


<table>
<tr>
<td style="border:none;">
<select  name="doc_title" id="doc_title" title="Choose employee document" style="width:183px;padding:3px;" >
<option>Select</option>
<option <?php if($doc_title=='High School Marksheet'){?> selected="selected" <?php }?> >High School Marksheet</option>
<option <?php if($doc_title=='Last Highest Qualification'){?> selected="selected" <?php }?> >Last Highest Qualification</option>
<option <?php if($doc_title=='PAN card'){?> selected="selected" <?php }?>>PAN card</option>
<option <?php if($doc_title=='Voter ID Card'){?> selected="selected" <?php }?>>Voter ID Card</option>
<option <?php if($doc_title=='Others'){?> selected="selected" <?php }?>>Others</option>
</select>
</td>
<td align="right" style="border:none">
<a href="javascript:void(0)" id="more" onclick="document.getElementById('extra_doc').style.display='block';document.getElementById('more').style.display='none'" style="color:#0066CC;font-weight:bold;margin-left:15px;text-decoration:underline" >More</a>
</td>
</tr>


<tr>
<td style="border:none;">

<input type="file" name="doc_url" id="doc_url" title="Upload supporting documents" style="height:23px; width:180px;"  /></p>

</td>

</tr>



</table>



</p>
</td>


</tr>

<tr>
<td colspan="4" >

<div id="extra_doc" style="display:none">

<table >

<tr>
<td style="width:165px;"><p class="b blue p5px ml20px">Upload Document 1 </p></td>

<td style="width:335px;padding:15px">

<table>
<tr>
<td style="border:none;">
<select  name="doc_title1" id="doc_title1" title="Choose employee document" style="width:183px;padding:3px;" >
<option>Select</option>
<option <?php if($doc_title1=='High School Marksheet'){?> selected="selected" <?php }?> >High School Marksheet</option>
<option <?php if($doc_title1=='Last Highest Qualification'){?> selected="selected" <?php }?> >Last Highest Qualification</option>
<option <?php if($doc_title1=='PAN card'){?> selected="selected" <?php }?>>PAN card</option>
<option <?php if($doc_title1=='Voter ID Card'){?> selected="selected" <?php }?>>Voter ID Card</option>
<option <?php if($doc_title1=='Others'){?> selected="selected" <?php }?>>Others</option>
</select>
</td>

</tr>


<tr>
<td style="border:none;">

<input type="file" name="doc_url1" id="doc_url1" title="Upload supporting documents" style="height:23px; width:180px;"  /></p>

</td>

</tr>



</table></td>


<td style="width:195px;"><p class="b blue p5px ml20px">Upload Document 2 </p></td>

<td style="width:335px;padding:15px">
<table>
<tr>
<td style="border:none;">
<select  name="doc_title2" id="doc_title2" title="Choose employee document" style="width:183px;padding:3px;" >
<option>Select</option>
<option <?php if($doc_title2=='High School Marksheet'){?> selected="selected" <?php }?> >High School Marksheet</option>
<option <?php if($doc_title2=='Last Highest Qualification'){?> selected="selected" <?php }?> >Last Highest Qualification</option>
<option <?php if($doc_title2=='PAN card'){?> selected="selected" <?php }?>>PAN card</option>
<option <?php if($doc_title2=='Voter ID Card'){?> selected="selected" <?php }?>>Voter ID Card</option>
<option <?php if($doc_title2=='Others'){?> selected="selected" <?php }?>>Others</option>
</select>
</td>
<td align="right" style="border:none">
<a href="javascript:void(0)" id="more" onclick="document.getElementById('extra_doc').style.display='none';document.getElementById('more').style.display='block'" style="color:#0066CC;font-weight:bold;margin-left:15px;text-decoration:underline" >Remove</a>
</td>

</tr>


<tr>
<td style="border:none;">

<input type="file" name="doc_url2" id="doc_url2" title="Upload supporting documents" style="height:23px; width:180px;"  />

</td>

</tr>



</table></p></td>


</tr>
</table></div>


</td>
</tr>

<tr>
<td colspan="4"  style="padding-top:10px;padding-bottom:10px;"><p class="p5px ac b">
<input type="submit" name="add_emp" title="Click here to add employee" value="Submit" class="btn33" style="width:100px;height:30px;font-size:13px;" />


<span class="ml10px"><input type="reset" value="Reset" title="Click here to clear" class="btn33" style="width:100px;height:30px;font-size:13px" /></span>

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
		
var content = '<table style="width:100%;" ><tr><td style="width:16%;"><p class="b ml20px blue p5px">Name</p></td><td  style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_name[]" id="" title="Enter employee reference" style="height:23px;width:180px;"/><select name="ref_relation[]" style="margin-left:20px;width:150px;height:30px;"><option value="0">CHOOSE RELATION</option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option><option>Others</option></select></p></td><td style="width:14%;" ><p class="b blue p5px ml20px">Mobile No </p></td><td style="width:35%;"><p class="p5px ml10px"><input type="text" name="ref_contact_no[]" id="" title="Enter employee reference contac bt no" style="height:23px;width:180px;"    />&nbsp;<input type="button"  style="font-weight:700;color:#666666;border:inset;border-radius:4px;" onClick="getmore(\'moreDiv\')" value="+"	 /><input type="button" style="font-weight:700;color:#666666;border:inset;border-radius:4px;"  onClick="getless(\'moreDiv\')" value="-"	 /></p></td></tr></table>';	
	
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

<script>
function show_desig(desig){
  if(desig=='Others'){
  document.getElementById('emp_desination_others').style.display='block'
  }else{
  document.getElementById('emp_desination_others').style.display='none'  
  }
}





var xmlhttp="";

if(window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();	
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



function fetch_emp(emp_dept){

   
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {		
		document.getElementById('show_emp').innerHTML=xmlhttp.responseText;
		setTimeout(10000);
    }
  }
xmlhttp.open("GET","call.php?emp_dept="+emp_dept,true);
xmlhttp.send();
	
	
}



</script>


<?php include 'footer.php'; ?>


</body>
</html>
