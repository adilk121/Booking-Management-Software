<?php 
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
ob_start();
$sql="select * from tbl_emp_ref where 1 and ref_emp_id='$_REQUEST[ref_edit_id]'";
$record_dis=mysql_fetch_array(db_query($sql));
?>


<link href="style.css" type="text/css" rel="stylesheet" />


<?php
if(isset($_REQUEST['add_ref'])){

$arr_ids=$_REQUEST['refids'];
$arr_names=$_REQUEST['ref_edit_name'];
$arr_contacts=$_REQUEST['ref_edit_contact_no'];

	if(is_array($_REQUEST['refids'])) {
	
	for($i=0;$i<=count($_REQUEST['refids']);$i++){
          $res=db_query("insert into  tbl_emp_ref set ref_name = '$arr_names[$i]',
		                                              ref_contact_no='$arr_contacts[$i]',
												      ref_emp_id='$_REQUEST[refempid]'"
												 );

			
	}
header("location:edit_ref.php");	
$_SESSION["msg"]="Added Successfully";
exit;
		
}
}

?>

<?php
if(isset($_REQUEST['edit_ref'])){

$arr_ids=$_REQUEST['refids'];
$arr_names=$_REQUEST['ref_edit_name'];
$arr_contacts=$_REQUEST['ref_edit_contact_no'];

	if(is_array($_REQUEST['refids'])) {
	
	for($i=0;$i<=count($_REQUEST['refids']);$i++){
          $res=db_query("update  tbl_emp_ref set ref_name = '$arr_names[$i]',
		                                         ref_contact_no='$arr_contacts[$i]' 
												 where ref_id='$arr_ids[$i]'"
												 );

			
	}
header("location:edit_ref.php?ref_edit_id=$_REQUEST[refempid]");	
$_SESSION["msg"]="Edited Successfully";
exit;
		
}
	
	
	
}
?>


<?php
if(!empty($_SESSION["msg"])){
?>
<div style="width:100%;color:#0066FF;font-size:18px;font-weight:700;margin-top:60px;" align="center">
<?php
echo $_SESSION["msg"];
unset($_SESSION["msg"]);
exit;
?>
</div>
<?php 
}
?>


<table border="0" cellpadding="0" cellspac bing="0" width="96%"  class="bdrAll mt20px  ml10px large">
<td colspan="6"  style="color:#666666;font-weight:700;padding:20px 0px 20px 20px;">EDIT REFERENCE DETAIL</td></tr>

<tr class="bg2 ac" >
<td width="20" class="b ac" >S.NO.</td>
<td width="148" style="width:180px;" ><p class="b ml20px blue p5px">Name</p></td>
<td width="148" colspan="2"><p class="b blue p5px ml20px">Mobile No </p></td>
</tr>



<?php
$c=0;
$sql="select * from tbl_emp_ref where 1 and ref_emp_id='$_REQUEST[ref_edit_id]'";
$data_ref=db_query($sql);
$i=0;
if(mysql_num_rows($data_ref)>0){
while($record_ref=mysql_fetch_array($data_ref)){
$c=1;
$i++;
?>



<form action="" name="frm_ref" enctype="multipart/form-data">
<tr class="ac">

<td ><?=$i?></td>
 
<td style="width:190px;"><p class="p5px ml10px">

<input type="text" name="ref_edit_name[]" value="<?=$record_ref['ref_name']?>" />

</p></td>


<td width="739" colspan="2"><p class="p5px ml10px">
<input type="text" name="ref_edit_contact_no[]" value="<?=$record_ref['ref_contact_no']?>" />

</p></td>

<input type="hidden" name="refids[]" value="<?=$record_ref['ref_id']?>" />
</tr>

<?php
}
}else{
?>
<tr class="ac">

<td >1</td>
 
<td style="width:190px;"><p class="p5px ml10px">

<input type="text" name="ref_edit_name[]" value="<?=$record_ref['ref_name']?>" />

</p></td>


<td width="739" colspan="2"><p class="p5px ml10px">
<input type="text" name="ref_edit_contact_no[]" value="<?=$record_ref['ref_contact_no']?>" />

</p></td>

<input type="hidden" name="refids[]" value="<?=$record_ref['ref_id']?>" />
</tr>
<?php
}
?>

<tr>
<td colspan="3" align="center">

<?php if($c==0){?>
<input type="hidden" name="refempid" value="<?=$_REQUEST['ref_edit_id']?>" />
<input type="submit" name="add_ref" value="ADD" style="border:inset;background-color:#CCCCCC;border-radius:4px;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px; color:#FFFFFF"  />
<?php }else{?>
<input type="hidden" name="refempid" value="<?=$record_ref['ref_emp_id']?>" />
<input type="submit" name="edit_ref" value="EDIT" style="border:inset;background-color:#CCCCCC;border-radius:4px;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px; color:#FFFFFF"  />
<?php }?>

</td>
</tr>
</form>




</table>