<?php 
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
ob_start();
$sql="select * from tbl_emp where 1 and emp_id='$_REQUEST[dis_id]'";
$record_dis=mysql_fetch_array(db_query($sql));
?>

<link href="style.css" type="text/css" rel="stylesheet" />

<div class="col-sm-12" style="border:#284c93 thin solid;border-radius:5px;">
<table width="100%">
<tr><td class="small b" style="color:#FFFFFF;background-color:#284c93" align="center" colspan="3"><p>EMPLOYEE INFORMATION</p>
</td></tr>
<tr><td colspan="3" style="padding:5px;" >
<? if(empty($_REQUEST['large'])){?>
<a href="emp_detail.php?dis_id=<?=$_REQUEST['dis_id']?>&large=yes" style="float:left;font-size:11px;color:#000000;font-weight:bold;font-family:Georgia, 'Times New Roman', Times, serif;font-style:italic;margin-left:20px" target="_blank"><img src="images/view-new.png" height="15" width="17" style="vertical-align:middle"  />&nbsp;Large View</a>
<? }?>

</td></tr>
<tr>
<td width="30%">


<img src="<?php if(!empty($record_dis['emp_photo'])){echo "Employee_Documents/".$record_dis['emp_photo'];}else{ echo "images/noimage.jpg";}?>" height="130" width="110" style="padding:10px 10px 10px 15px;" />


</td>
<td width="70%" valign="top">

<table width="80%" style="font-size:12px;margin-top:10px" class="bdrAll2" >
<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Name
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_name']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Age
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_age']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Gender
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_gender']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Date Of Birth
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_dob']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Father Name
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_father_name']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Mother Name
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_mother_name']?>
</td>
</tr>



</table>




</td>


	

</tr>

<tr>
<td width="100%" colspan="3" align="left" style="">

<table width="95%" style="font-size:12px;margin-top:10px;margin-left:15px;" class="bdrAll2" >

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Blood Group
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_b_group']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Experience
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_exp']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Permanent Address
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_param_adrs']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Resident Address
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_res_adrs']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Personal Contact No.
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_personal_c_no']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Residence Contact No.
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_residence_c_no']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Email
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_personal_email']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
PAN No.
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_pan_no']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Emergency Contact No.
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_emergency_c_no']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Adhaar No.
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_adhaar_no']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Highest Qualification
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_qualification']?>
</td>
</tr>


</table>

</td>

</tr>


<tr><td class="small b"  colspan="3">&nbsp;</td></tr>
<tr><td class="small b" style="color:#FFFFFF;background-color:#284c93" align="center" colspan="3"><p>REFERENCE DETAIL</p></td></tr>
<tr>
<td width="100%" colspan="3" align="left" style="">

<table width="95%" style="font-size:12px;margin-top:10px;margin-left:15px;" class="bdrAll2" >

<tr style="background-color:#c7d7f7">
<td class="b" style="background-color:#c7d7f7;" width="10%" align="center" >
SR.N.
</td>

<td class="pl10px b" style="font-family: Tahoma, Arial, Verdana;" width="40%" align="center">
Name
</td>

<td class="pl10px b" style="font-family: Tahoma, Arial, Verdana;" width="25%" align="center">
Relation
</td>


<td class="b" style="background-color:#c7d7f7;" width="25%" align="center" >
Mobile No.
</td>

</tr>


<?php
$sql="select * from tbl_emp_ref where 1 and ref_emp_id='$record_dis[emp_reg_id]'";
$data_ref=db_query($sql);
$i=0;
while($record_ref=mysql_fetch_array($data_ref)){
$i++;
?>

<tr>
<td  width="10%" align="center" >
<?=$i?>
</td>

<td class="pl10px b" style="font-family: Tahoma, Arial, Verdana;" width="40%" align="center">
<?=$record_ref['ref_name']?>
</td>

<td class="pl10px " style="font-family: Tahoma, Arial, Verdana;" width="25%" align="center">
<?=$record_ref['ref_relation']?>
</td>


<td  width="25%" align="center" >
<?=$record_ref['ref_contact_no']?>
</td>

</tr>

<?php
}
?>

</table>

</td>

</tr>

<tr><td class="small b"  colspan="3">&nbsp;</td></tr>
<tr><td class="small b" style="color:#FFFFFF;background-color:#284c93" align="center" colspan="3"><p>OFFICIAL INFORMATION</p></td></tr>
<tr>
<td width="100%" colspan="3" align="left" style="">

<table width="95%" style="font-size:12px;margin-top:10px;margin-left:15px;" class="bdrAll2" >

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Employee Code
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?="WKN000".$record_dis['emp_code']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Department
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_dpt']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Designation 
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_desination']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Under
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_under']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Email
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_office_email']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Join Date
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_join_date']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Salary
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_salary']?>
</td>
</tr>



</table>

</td>

</tr>

<tr><td class="small b"  colspan="3">&nbsp;</td></tr>
<tr><td class="small b" style="color:#FFFFFF;background-color:#284c93" align="center" colspan="3"><p>BANK DETAIL</p></td></tr>
<tr>
<td width="100%" colspan="3" align="left" style="">

<table width="95%" style="font-size:12px;margin-top:10px;margin-left:15px;" class="bdrAll2" >

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Name(As in account)
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=ucfirst($record_dis['emp_bank_name'])?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Bank Name
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_bank']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
A/c No. 
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_ac_no']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Branch
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_bank_branch']?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
NEFT/RTGS Code
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=$record_dis['emp_bank_neft_rtgs_code']?>
</td>
</tr>


<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Uploaded Document <a href="view-doc.php?doc_emp_id=<?=$record_dis['emp_reg_id']?>" style="margin-left:20px;color:#003399" target="_blank">(Click to view)</a>
</td>
<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<ul style="list-style:decimal;">

<?php
$sql="select * from tbl_emp_doc where 1 and doc_emp_id='$record_dis[emp_reg_id]'";
$data=db_query($sql);
while($rec=mysql_fetch_array($data)){
?>
<li><span style="font-size:14px; "><?=$rec['doc_title']?></span></li>
<?php
}
?>
</ul>
</td>
</tr>




</table>

</td>

</tr>
<tr><td class="small b"  colspan="3">&nbsp;</td></tr>
<tr><td class="small b" style="color:#FFFFFF;background-color:#284c93" align="center" colspan="3"><p>Account Login Detail</p></td></tr>

<tr><td class="small b"  colspan="3">&nbsp;</td></tr>
<tr>
<td width="100%" colspan="3" align="left" style="">

<table width="95%" style="font-size:12px;margin-top:10px;margin-left:15px;" class="bdrAll2" >

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
User Name
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=db_scalar("select reg_uname from tbl_registration where reg_id='$record_dis[emp_reg_id]'")?>
</td>
</tr>

<tr>
<td class="b" style="background-color:#c7d7f7;padding:2px 20px 2px 20px" >
Password
</td>

<td class="pl10px" style="font-family: Tahoma, Arial, Verdana;">
<?=db_scalar("select reg_pass from tbl_registration where reg_id='$record_dis[emp_reg_id]'")?>
</td>
</tr>





</table>

</td>

</tr>

<tr><td class="small b"  colspan="3">&nbsp;</td></tr>

</table>





</div>





