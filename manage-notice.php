<?php include('header.php'); ?>

<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>

<script>
function find_notice(val){
window.location="manage-notice.php?sv=" + val;
}

function find_notice_by(val){
window.location="manage-notice.php?svb=" + val;
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
			db_query("update  tbl_notice set notice_status = 'Active' where notice_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Records are activated";
		} else if(isset($_REQUEST['Inctive']) ){
			db_query("update  tbl_notice set notice_status = 'Inactive' where notice_id  in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Records are inactivated";
		} else if(isset($_REQUEST['delete']) ){
			db_query("delete from tbl_notice where notice_id in ($str_ids)");
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



<span class="fr mr10px b black" style="font-size:12px;">

<input type="radio" value="HR" name="by" id="by" <? if($_REQUEST['svb']=="HR"){?> checked="checked"<? }?> onclick="find_notice_by(this.value)" style="margin-right:10px;font-weight:400" />H.R.
<input type="radio" value="Director" name="by" id="by" <? if($_REQUEST['svb']=="Director"){?> checked="checked"<? }?> onclick="find_notice_by(this.value)" /><span style="margin-right:20px;" >Director</span>


<select name="dept" id="st" title="Choose to search by employee status" class="sc vam" style="width:130px; height:30px;border:#E8E8E8 solid 1px;margin-bottom:20px;margin-top:10px;" 
onchange="find_notice(this.value)">
<option selected="selected"> Search Filter</option>
<option value="Marketing" <? if($_REQUEST['sv']=="Marketing"){?> selected="selected"<? }?> >Marketing</option>
<option value="Back Office" <? if($_REQUEST['sv']=="Back Office"){?> selected="selected"<? }?> >Back Office</option>
<option value="HR" <? if($_REQUEST['sv']=="HR"){?> selected="selected"<? }?> >H.R.</option>
<option value="Accounts" <? if($_REQUEST['sv']=="Accounts"){?> selected="selected"<? }?> >Accounts</option>
<option value="Employee" <? if($_REQUEST['sv']=="Employee"){?> selected="selected"<? }?> >Employee</option>
<option value="" <? if($_REQUEST['sv']=="All"){?> selected="selected"<? }?> >All</option>
</select>
</span>


<span class="fr mr10px mt20px b black " style="font-size:14px;">Search By :</span>
<p class=" xlarge mt10px ml10px"><span class="b"><i class="fa fa-address-card-o" aria-hidden="true"></i> Manage Notice</span>



</p>

<p class="bdr0 m5px mr30px" style="margin-top:20px;"></p>	

</form>
	
<form action="" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" class="mt10px bdrAll">

	<tr class="bg6">
	
	<td width="30%"  ><p class="b p10px blue ac">Title</p></td>
	<td width="15%"  ><p class="b p10px blue ac">Notice By</p></td>
	
		<td width="20%"  ><p class="b p10px blue ac">Notice To</p></td>
	
	<td width="10%" ><p class="b p10px blue ac">Notice Date</p></td>
	<!--<td width="40%" ><p class="b p10px blue ac">Message</p></td>-->
	<td width="10%" ><p class="b p10px blue ac">Status</p></td>	
	<td width="5%" ><p class="b p10px blue ac">Edit</p></td>
	<td width="5%"><p class="b p10px blue ac">
<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p></td>
	</tr>

	
	
<?php

$cond="";

if(!empty($_REQUEST['sv'])){

if($_REQUEST['sv']=="Employee"){
$cond="where notice_to_id!='' ";
}else{
$cond="where notice_to='$_REQUEST[sv]' ";
}

}

if(!empty($_REQUEST['svb'])){

$cond="where notice_by ='$_REQUEST[svb]' ";


}


$sql="select * from tbl_notice  $cond";


$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'notice_id' : true;
$order_by2 == '' ? $order_by2 = '' : true;									  

$sql .= " order by $order_by $order_by2 ";
$sql .= " limit $start, $pagesize ";

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}
?>

<?php
if($pager->total_records==0) {?>
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
	
<tr class="<? if($record_emp['notice_msg_status']=="Unread" and $record_emp['notice_type']!="dept"){?> b<? }?>">
<td width="10%" align="left" class="pl20px">
<a class="pop4" style="color:#000099;text-decoration:underline" href="notice_detail.php?notice=<?=$record_emp['notice_id']?>"  >
<?=substr($record_emp['notice_title'],0,50)?>

</a>
</td>


<td width="10%" class="al pl15px" >
<?=$record_emp['notice_by']?>

</td>
<td width="10%" class="al pl15px" >
<?=$record_emp['notice_to']?>
	
</td>

<td style="width:100px;"><p class=" p10px b  black ac" >

<?=date("d-M-Y",strtotime($record_emp['notice_date']))?>
</a>
</p>	
</td>

<?php /*?><td style="width:100px;padding-left:10px"><p class="black al"> 

<?=substr($record_emp['notice_msg'],0,80)?> ....
</p></td>
<?php */?>

<td style="width:30px;"><p class=" p10px b ac <?php if($record_emp['notice_status']=='Inactive'){?>red<?php }else{?>green<?php }?>">

<?=$record_emp['notice_status']?>
</p></td>


<td style="width:30px;"><p class=" p10px  ac">
<a href="add-edit-notice.php?notice=<?=$record_emp['notice_id']?>"> <img src="images/edit.gif" height="20" width="20" /></a></p></td>


<td  style="width:30px;"><p class="b p10px blue ac">

<input type="hidden" value="yes" name="val" />

<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_emp['notice_id']?>"  />  



</p></td>

</p>


</tr>

<?php
}
$c++;
}
?>



<tr>
<td colspan="12">
<p class="p10px fl">

<a href="add-edit-notice.php"><input type="button" value="ADD NOTICE" style="width:180px; height:28px;font-weight:700;"/></a></p>

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