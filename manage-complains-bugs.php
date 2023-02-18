<?php include('header.php'); ?>

<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>

<script>
function find_complain(val){
window.location="manage-complains-bugs.php?status=" + val;
}
</script>



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
			db_query("delete from tbl_complain where com_id in ($str_ids)");			
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
<select name="dept" id="st" title="Choose to search by employee status" class="sc vam" style="width:130px; height:30px;border:#E8E8E8 solid 1px;margin-bottom:20px;margin-top:10px;" 
onchange="find_complain(this.value)">
<option selected="selected"> Search Filter</option>
<option value="Read" >Read</option>
<option value="Unread">Unread</option>
<option value="ALL">All</option>
</select>
</span>


<p class=" xlarge mt10px ml10px"><span class="b"><i class="fa fa-commenting" aria-hidden="true"></i> Manage Complains</span>



</p>

<p class="bdr0 m5px mr30px" style="margin-top:20px;"></p>	

</form>
	
<form action="" method="post" enctype="multipart/form-data">
	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	
	<td style="width:3%;"  ><p class="b p10px blue ac">SN.</p></td>
	
	<td style="width:10%;" ><p class="b p10px blue ac">Snap Shot</p></td>
	<td style="width:17%;"><p class="b p10px blue ac">Employee Name / Code</p></td>
	<td style="width:17%;"><p class="b p10px blue ac">Department</p></td>
	<td style="width:25%;"><p class="b p10px blue ac">Subject</p></td>
	<td style="width:15%;"><p class="b p10px blue ac">Date / Status</p></td>
<!--	<td width="183" ><p class="b p10px blue ac">Reply Date / Status</p></td>-->
<!--	<td  ><p class="b p10px blue ac">Reply</p></td>-->
	<td style="width:5%;"><p class="b p10px blue ac">
<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p></td>

	</tr>

	
	
<?php

$cond="";

if(!empty($_REQUEST['status'])){

if($_REQUEST['status']=="ALL"){
$cond="";
}else{
$cond="and com_status='$_REQUEST[status]'";
}


}


$sql = "select  * from tbl_complain where 1 $cond ";
	
$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'com_id' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;									  

$sql .= " order by $order_by $order_by2 ";
$sql .= " limit $start, $pagesize ";

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}
?>

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
$j=0;
while($record_complain=mysql_fetch_array($data_new)){
$j++;
$line = ms_display_value($line_raw);
@extract($line);
?>


	
<tr>
<td  align="center"><?=$j?></td>
	<td width="100"  ><p class="b p5px blue ac">
	
<? if($record_complain['com_snap']!=""){?>	
<a href="Employee_Documents/<?=$record_complain['com_snap']?>" target="_blank"><img src="Employee_Documents/<?=$record_complain['com_snap']?>" height="50" width="60" />	</a>
<? }else{?>
<img src="images/noimage.jpg" height="100" width="140" />
<? }?>
	
	</p></td>

<td><p class=" p10px b  black ac u" ><a class="pop4" href="complain_detail.php?dis_id=<?=$record_complain['com_id']?>" title=""  >
<?=ucfirst(db_scalar("select emp_name from tbl_emp where 1 and emp_reg_id='$record_complain[com_emp_id]'"))?>

&nbsp;
[ 
<span style="text-decoration:none; color:#003366"><?="WKN000".db_scalar("select emp_code from tbl_emp where 1 and emp_reg_id='$record_complain[com_emp_id]'")?>
</span> ]

</a>
</p>	
</td>

<td><p class=" p10px black ac"> 

<?=$record_complain['com_dept_mapped_id']?>
</p></td>

<td><p class=" p10px black ac"> 

<?=$record_complain['com_sub']?>
</p></td>
<td align="center"><p class=" p10px black ac">
<?=date("d-M-y",strtotime($record_complain['com_date']))?>
&nbsp;&nbsp;
[ <span style="font-size:14px;font-weight:bold;color:<?php if($record_complain['com_status']=='Unread'){?>#990000<?php }else{?>green<?php }?>;">
<?=$record_complain['com_status']?>
</span> ]

</p></td>


<?php /*?><td><p class=" p10px  ac">
<a href="mailto:<?=db_scalar("select emp_office_email from tbl_emp where 1 and emp_id=$record_complain[com_emp_id]")?>"> <img src="images/reply.png" height="20" width="25" /></a></p></td>
<?php */?>
</p>
<td><p class="b p10px blue ac">

<input type="hidden" value="yes" name="val" />

<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_complain['com_id']?>"  />  



</p></td>


</tr>

<?php
}
}
?>





</form>			


<tr>
<td colspan="12">
<?php if($access_level['reg_type']=='ADMIN'){ ?>

<span style="margin-left:5px;float:right;margin-right:10px;margin-top:5px;margin-bottom:5px;">
<input type="submit" name="delete" value="Delete" title="Click here to delete" onclick="return confirm('Are you sure ?');" style="width:80px; height:28px;" />
</span>
<?php }?>
<br />

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