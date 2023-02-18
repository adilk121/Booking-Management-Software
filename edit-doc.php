<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
?>
<link href="images/wkn.png" rel="shortcut icon" type="image/x-icon"/>
<title>EMS : Web Key Network (P) Ltd.</title>

<link href="style.css" type="text/css" rel="stylesheet" />


<?
if(isset($_REQUEST['Submit'])){


if($_FILES['doc_url']['name']){
$emp_doc=$_FILES['doc_url']['name'];
move_uploaded_file($_FILES['doc_url']['tmp_name'],"Employee_Documents/".$emp_doc);
}

 $sql="insert into  tbl_emp_doc set  doc_title='$doc_title',
                                     doc_url='$emp_doc',
							         doc_emp_id='$emp_id'";

$res=db_query($sql);
if($res>0){
?>
<script>
alert("Document is uploaded successfully.");

 if (window.opener && !window.opener.closed){
       window.opener.location.reload();
	   window.close();

   }
</script>
<?
}
}



if(isset($_REQUEST['Update'])){

if($_FILES['doc_url']['name']){
$emp_doc=$_FILES['doc_url']['name'];
move_uploaded_file($_FILES['doc_url']['tmp_name'],"Employee_Documents/".$emp_doc);
}else{
$emp_doc=db_scalar("select doc_url from tbl_emp_doc where 1 and doc_id='$doc_id'");
}

 $sql="update tbl_emp_doc set  doc_title='$doc_title',
                              doc_url='$emp_doc'
							  where doc_id='$doc_id'";

$res=db_query($sql);
if($res>0){
?>
<script>
alert("Document is updated successfully.");

 if (window.opener && !window.opener.closed){
       window.opener.location.reload();
	   window.close();

   }
</script>
<?
}

}



$sql="select * from tbl_emp_doc where 1 and doc_id='$_REQUEST[doc_id]'";
$data=db_query($sql);
$rec=mysql_fetch_array($data);
@extract($rec);
?>


<p style="font-size:14px;color:#333333;padding:5px;font-weight:bold" align="center"><? if($_REQUEST['emp_id']!=""){?>Upload<? }else{?> Edit<? }?> Document</p>

<form action="" method="post" enctype="multipart/form-data">
<table border="1" style="width:100%;font-size:14px;margin-top:5px;" cellpadding="6" >

<tr>
<td>Title</td>
<td>
<select  name="doc_title" id="doc_title" title="Choose employee document" style="width:183px;padding:3px;" >
<option>Select</option>
<option <?php if($doc_title=='High School Marksheet'){?> selected="selected" <?php }?> >High School Marksheet</option>
<option <?php if($doc_title=='Last Highest Qualification'){?> selected="selected" <?php }?> >Last Highest Qualification</option>
<option <?php if($doc_title=='PAN card'){?> selected="selected" <?php }?>>PAN card</option>
<option <?php if($doc_title=='Voter ID Card'){?> selected="selected" <?php }?>>Voter ID Card</option>
<option <?php if($doc_title=='Others'){?> selected="selected" <?php }?>>Others</option>
</select>
</td>
</tr>

<? if($_REQUEST['emp_id']==""){?>
<tr>
<td>Document</td>
<td><img src="Employee_Documents/<?=$doc_url?>" height="120" width="90" /></td>
</tr>
<? }?>


<tr>
<td>Upload</td>
<td><input type="file" name="doc_url"  /></td>
</tr>

<tr>
<td colspan="2" align="left">
<input type="submit" name="<? if($_REQUEST['emp_id']!=""){?>Submit<? }else{?>Update<? }?>" value="<? if($_REQUEST['emp_id']!=""){?>Submit<? }else{?>Update<? }?>" style="margin-top:5px;background-color:#1C4AEC;width:100px;color:#FFFFFF;height:25px;border:solid thin #333333;border-radius:5px;font-weight:bold;margin-left:100px" />
</td>
</tr>



</table>
</form>