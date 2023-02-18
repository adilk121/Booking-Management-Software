<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
?>

<?php
if(isset($_REQUEST['change_status'])){

if($_REQUEST['curr_status']=='WORKING'){
$res=db_query("update tbl_emp set emp_status='$_REQUEST[emp_status]',emp_rejoin_date='$_REQUEST[empdate]' where emp_id='$_REQUEST[emp_id]'");
}else{
$res=db_query("update tbl_emp set emp_status='$_REQUEST[emp_status]',emp_res_date='$_REQUEST[empdate]' where emp_id='$_REQUEST[emp_id]'");
}
?>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>

<?php
}
?>

<p align="center" style="background-color:#284c93;color:#FFFFFF;font-size:15px;border-radius:5px;padding:3px;">CHANGE STATUS</p>

<?php if($res>0){?>
<script>
alert("Employee status is changed successfully.");

window.close();
 if (window.opener && !window.opener.closed){
       window.opener.location.reload();
   }
</script>
<!--<div align='center' style="color:#009900;font-size:16px;">Employee status is changed successfully.</div>
--><?php }?>

<?php if($res<=0){?>
<table align="center" style="margin-top:20px;">
<tr>
<td></td>
</tr>

<form action="">
<tr>
<td>Enter Date</td>
<td><input type="date" name="empdate" style="width:150px;border-radius:4px;" /></td>
<td><input type="submit" name="change_status" value="Submit" style="border-radius:4px;background-color:#284c93;color:#FFFFFF;border-color:#284c93" onclick="return confirm('Are you sure ?')" /></td>
</tr>

<input type="hidden" name="emp_id" value="<?=$_REQUEST['empid']?>" />
<input type="hidden" name="emp_status" value="<?=$_REQUEST['curr_status']?>" />

</form>

</table>
<?php }?>