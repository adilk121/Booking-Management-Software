<?php include('header.php'); ?>

<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>

<script>

function find_msg(val){
window.location="manage-guidelines.php?status=" + val;
}
</script>


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
		if(isset($_REQUEST['Active'])) {
			db_query("update  tbl_guideline set guide_status = 'Active' where guide_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Records are activated";
		} else if(isset($_REQUEST['Inctive']) ){
			db_query("update  tbl_guideline set guide_status = 'Inactive' where guide_id  in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Records are inactivated";
		} else if(isset($_REQUEST['delete']) ){
			db_query("delete from tbl_guideline where guide_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Records are deleted";

		} 
	}
	
}
?>


  

<tr>
<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
<?php include('left-menu.php'); ?>
</td>

<form name="frm_sr" action="" enctype="multipart/form-data" method="post">
<td valign="top" width="83%">



<p class="fr mr10px b black" style="font-size:12px;margin-top:10px;">
Search Filter :
<input type="radio" value="Active" name="status" id="status"  <? if($_REQUEST['status']=='Active'){?> checked="checked"<? }?>  onclick="find_msg(this.value)" style="margin-right:10px;font-weight:400;" />Active
<input type="radio" value="Inactive" name="status" id="status"  <? if($_REQUEST['status']=='Inactive'){?> checked="checked"<? }?>  onclick="find_msg(this.value)" />Inactive

<input type="radio" value="" name="status" id="status"  <? if($_REQUEST['status']==''){?> checked="checked"<? }?>  onclick="find_msg(this.value)" />All


</p>


<p class=" xlarge mt10px ml10px"><span class="b"><i class="fa fa-book" aria-hidden="true"></i> Manage Guideline</span>



</p>

<p class="bdr0 m5px mr30px" style="margin-top:20px;"></p>	

</form>
	
<form action="" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">

<?php
$cond="";

if(!empty($_REQUEST['status'])){
$cond="and  guide_status ='$_REQUEST[status]' ";
}

$sql="select * from tbl_guideline where 1 $cond";

$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'guide_id' : true;
$order_by2 == '' ? $order_by2 = '' : true;									  

$sql .= " order by $order_by $order_by2 ";
$sql .= " limit $start, $pagesize ";

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}
?>


	<tr class="bg6">
	<td width="5%"  ><p class="b p10px blue ac">S.N.</p></td>
	<td width="20%"  ><p class="b p10px blue ac">Title</p></td>
	
	<td width="12%"  ><p class="b p10px blue ac">From</p></td>
	
		<td width="15%"  ><p class="b p10px blue ac">To</p></td>

<!--	<td width="20%" ><p class="b p10px blue ac">Message</p></td>-->
	<td width="10%" ><p class="b p10px blue ac">Date</p></td>	
	<td width="3%" ><p class="b p10px blue ac">Edit</p></td>	
	
	<td width="10%" ><p class="b p10px blue ac">Status</p></td>
	<td width="5%"><p class="b p10px blue ac">
<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p></td>
	</tr>

	
	

<? if($pager->total_records==0) {?>
<div class="msg" align="center" style="padding:10px;">Sorry, no records found.</div>
<? } else { ?>
<div style="padding-top:20px;">


<span style="float:left;font-weight:bold;">
<? $pager->show_displaying()?>
</span>



<span style="float:right;font-weight:bold;">Records Per Page:
<?=pagesize_dropdown('pagesize', $pagesize);?></span>

</div>


<?php
$i=0;
while($record_emp=mysql_fetch_array($data_new)){
$i++;
$line = ms_display_value($line_raw);
@extract($line);
?>
	
<tr class="<? if($record_emp['guide_msg_status']=="Unread" and $record_emp['guide_type']!="dept"){?> b<? }?>">
<td width="5%" align="center" style="font-size:14px">
<?=$i?>
</td>


<td width="10%"  style="padding-left:10px;" align="left">
<a class="pop4" style="color:#000099;text-decoration:underline" href="guide_detail.php?guide=<?=$record_emp['guide_id']?>"  >
<?=substr($record_emp['guide_title'],0,35)?> <? if(strlen($record_emp['guide_title'])>35){?>...<? }?>
</a>
</td>

<td  class="al pl10px  ">

<?=$record_emp['guide_from']?>


</td>

<td class="al pl10px  ">

<?=$record_emp['guide_to']?>
	
</td>

<?php /*?><td style="padding-left:5px;"><p class=" p10px pl20px b  black al "  >

<?=substr($record_emp['guide_msg'],0,40)?>
</a>
</p>	
</td>
<?php */?>
<td  align="center" ><p class=" p10px black ac	"> 

<?=date("d-M-Y",strtotime($record_emp['guide_date']))?>
</p></td>
<td><p class=" p10px  ac">
<a href="add-edit-guideline.php?guide=<?=$record_emp['guide_id']?>"> <img src="images/edit.gif" height="20" width="20" /></a></p></td>


<td ><p class=" p10px  ac <?php if($record_emp['guide_status']=='Inactive'){?>red<?php }else{?>green<?php }?>">

<?=$record_emp['guide_status']?>
</p></td>



<td><p class="b p10px blue ac">

<input type="hidden" value="yes" name="val" />

<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_emp['guide_id']?>"  />  



</p></td>

</p>


</tr>

<?php
$c++;
}
?>

<?php } ?>

<tr>
<td colspan="12">
<p class="p10px fl">

<a href="add-edit-guideline.php"><input type="button" value="ADD GUIDELINE" style="width:180px; height:28px;font-weight:700;"/></a></p>

<p class="p10px fr">
<span style="margin-left:5px;">
<input type="submit" name="Active" value="ACTIVE" title="Click here to active" style="width:80px; height:28px;font-weight:700;" />
</span>
<span style="margin-left:5px;">
<input type="submit" name="Inctive" value="INACTIVE" title="Click here to inactive" style="width:80px; height:28px;font-weight:700;" />
</span>

<span style="margin-left:5px;">
<input type="submit" name="delete" value="DELETE" title="Click here to delete" onclick="return confirm('Are you sure ?')" style="width:80px; height:28px;font-weight:700;" />
</span>





</p>  
</td>
</tr>


</form>			



<tr>
<td colspan="12">
<p class="p10px fr">
<?php $pager->show_pager(); ?>

</p>  
</td>
</tr>
</table>
	
	
	
	
	
	</td>
  </tr>
</table>


<?php include('footer.php'); ?>
</body>
</html>