<?php include('header.php'); ?>
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
<!-- TO SELECT MULTIPLE CHECKBOX -->

<script>
checked=false;
function checkall(frm1){
var aa= frm1;
if(checked == false){
checked = true
}
else{
checked = false
}
for (var i =0; i < aa.elements.length; i++){
aa.elements[i].checked = checked;
}
}
</script>


<?php
if(!empty($_REQUEST['val'])){
$arr_ids = $_REQUEST['arr_ids'];
	if(is_array($arr_ids)) {
		$str_ids = implode(',', $arr_ids); 
		if(isset($_REQUEST['delete']) ){
			db_query("delete from tbl_performer where per_id in ($str_ids)");
		}
	}
	
}
?>

<tr>
<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >

<?php include 'left-menu.php'; ?>
	
</td>

<td valign="top" width="83%">
<p class=" xlarge mt10px ml10px mb15px"><span class="b"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Manage Performers</span>
<span class="fr mr10px b black " style="font-size:12px;"><a href="add-edit-performers.php" ><input type="button" value="Add Performer" class="btn33" /></a></span>
</p>

<p class="bdr0 m5px mr30px"></p>
<form action="" method="post" enctype="multipart/form-data">	
<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">

<tr class="bg6">

<td width="9%" ><p class="b p10px blue ac">Month</p></td>
<td width="24%" ><p class="b p10px blue ac">Team Manager</p></td>
<td width="24%"><p class="b p10px blue ac">First Performers </p></td>
<td width="22%"><p class="b p10px blue ac">Second Performers</p></td>
<td width="21%" ><p class="b p10px blue ac">Third Performers</p></td>
<td width="9%" ><p class="b p10px blue ac">Edit</p></td>
<td  style="width:30px;"><p class="b p10px blue ac">


<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p>
</td>	
</tr>
	
	
<?php
$sql="select * from tbl_performer where 1 order by per_month desc ";
$data_per=db_query($sql);
if(mysql_num_rows($data_per)>0){
while($rec_per=mysql_fetch_array($data_per)){

$tl=mysql_fetch_array(db_query("select * from tbl_emp where 1 and emp_id='$rec_per[per_tl_name]'"));
$f=mysql_fetch_array(db_query("select * from tbl_emp where 1 and emp_id='$rec_per[per_name_f]'"));
$s=mysql_fetch_array(db_query("select * from tbl_emp where 1 and emp_id='$rec_per[per_name_s]'"));
$t=mysql_fetch_array(db_query("select * from tbl_emp where 1 and emp_id='$rec_per[per_name_t]'"));

?>	
	
	
	<tr >
	<td valign="middle" width="9%" >
	<p class="b p10px blue ac">
	<?php
	
	foreach($month as $key=>$m){
	if($m==$rec_per['per_month']){
    echo $key;
	}
	}
	?>
	</p></td>
	
	<td valign="top" width="24%" >
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="60%"><p class="p10px"><?=$tl['emp_name']?></p></td>
	<td width="40%"><p class="p10px">
	<? if(!empty($tl['emp_photo'])){?>
	<img src="Employee_Documents/<?=$tl['emp_photo']?>" height="50" width="50" />
	<? }else{?>
	<img src="images/noimage.jpg" height="50" width="50" />
	<? }?>
	</p></td>
	
	</tr>
	
	</table>	
	</td>
	
	<td valign="top" width="24%"><table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="64%"><p class="p10px"><?=$f['emp_name']?></p></td>
	<td width="36%"><p class="p10px">
	<? if(!empty($f['emp_photo'])){?>
	<img src="Employee_Documents/<?=$f['emp_photo']?>" height="50" width="50" />
	<? }else{?>
	<img src="images/noimage.jpg" height="50" width="50" />
	<? }?>
	</p></td>
	
	</tr>
	
	</table></td>
	<td valign="top" width="22%"><table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="67%"><p class="p10px"><?=$s['emp_name']?></p></td>
	<td width="33%"><p class="p10px">
		<? if(!empty($s['emp_photo'])){?>
	<img src="Employee_Documents/<?=$s['emp_photo']?>" height="50" width="50" />
	<? }else{?>
	<img src="images/noimage.jpg" height="50" width="50" />
	<? }?>

</p></td>
	
	</tr>
	
	</table></td>
	<td width="21%" ><table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="66%"><p class="p10px"><?=$t['emp_name']?></p></td>
	<td width="34%"><p class="p10px">
			<? if(!empty($t['emp_photo'])){?>
	<img src="Employee_Documents/<?=$t['emp_photo']?>" height="50" width="50" />
	<? }else{?>
	<img src="images/noimage.jpg" height="50" width="50" />
	<? }?>

</p></td>
	
	</tr>
	
	</table></td>
	
	

	<td valign="top" width="9%" ><p class="b p10px blue ac">
	<a href="add-edit-performers.php?perid=<?=$rec_per['per_id']?>"><img src="images/edit.gif" /></a></p></td>
	
	
<td valign="top" width="9%" ><p class="b p10px blue ac"><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$rec_per['per_id']?>"  /></p></td>	
	
	</tr>
	
<?php
}
}
?>	
	
	
	
	</form>
	
<tr>
<td colspan="7">
<?php if($access_level['reg_type']=='ADMIN'){ ?>

<input type="hidden" value="yes" name="val" />

<span style="margin-left:5px;">
<input type="submit" name="delete" value="Delete" title="Click here to delete" onclick="return confirm('Are you sure ?');" style="width:80px; height:28px;float:right;margin-right:15px;margin-top:5px;margin-bottom:5px;" />
</span>
<?php }?>
</td>
</tr>

</table>

</td>
</tr>
  

 
</table>


<?php include 'footer.php'; ?>
</body>
</html>
