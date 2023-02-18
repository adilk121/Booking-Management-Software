<? require_once("includes/dbsmain.inc.php"); ?>
<title> Change Time</title>

<?
if(isset($_REQUEST['change'])){
$sql="update  tbl_emp_attendance set att_time='$time' where 1 and att_id='$att_id'";
$res=db_query($sql);

if($res>0){
?>
<script>
alert("Time is updated successfully.");
window.opener.location.reload();
window.close();
</script>


<?
}
}
?>



<form action="" method="post" enctype="multipart/form-data">
<table align="center" style="margin-top:30px;">
<tr>
<td>
Enter Time
</td>

<td><input type="time" name="time" /></td>
</tr>

<tr>
<td colspan="2">
&nbsp;
</td>
</tr>

<tr>
<td>
&nbsp;
</td>

<td>
<input type="hidden" name="att_id" value="<?=$_REQUEST['att_id']?>" />
<input type="submit" name="change" value="Change" /></td>
</tr>

</table>
</form>