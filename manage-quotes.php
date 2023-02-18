<?php include('header.php'); ?>
<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>


<script>
function find_msg(val){
window.location="manage-quotes.php?status=" + val;
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
			db_query("update  tbl_quote set quote_status = 'Active' where quote_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Record(s) are activated";
		} else if(isset($_REQUEST['Inctive']) ){
			db_query("update  tbl_quote set quote_status = 'Inactive' where quote_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Record(s) are inactivated";
		} else if(isset($_REQUEST['delete']) ){
		
			db_query("delete from tbl_quote where quote_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Record(s) are deleted";

		} 
	}
	
}
?>

  
  

  

  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	
	<?php include('left-menu.php'); ?>
	
	</td>

<td valign="top" width="83%">
	
<p class="fr mr10px b black" style="font-size:12px;margin-top:10px;">
Search Filter :
<input type="radio" value="Active" name="status" id="status"  <? if($_REQUEST['status']=='Active'){?> checked="checked"<? }?>  onclick="find_msg(this.value)" style="margin-right:10px;font-weight:400;" />Active
<input type="radio" value="Inactive" name="status" id="status"  <? if($_REQUEST['status']=='Inactive'){?> checked="checked"<? }?>  onclick="find_msg(this.value)" />Inactive

<input type="radio" value="" name="status" id="status"  <? if($_REQUEST['status']==''){?> checked="checked"<? }?>  onclick="find_msg(this.value)" />All


</p>


<p class=" xlarge mt10px ml10px"><span class="b"><i class="fa fa-quote-left" aria-hidden="true"></i> Manage Quotes</span>
</p>

<p class="bdr0 m5px mr30px" style="margin-top:20px;"></p>		
	
	
	
<form name="frm" action="" method="post" enctype="multipart/form-data">
<div style="width:100%;color:#006600;font-size:14px;margin-top:5px;font-weight:bold" align="center">
<?php if(!empty($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>

</div>

<?php
$cond="";

if(!empty($_REQUEST['status'])){
$cond="and  quote_status ='$_REQUEST[status]' ";
}

$sql="select * from tbl_quote where 1 $cond";

$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'quote_id' : true;
$order_by2 == '' ? $order_by2 = '' : true;									  

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

	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
	<td width="37%"><p class="b p10px blue ac">Quote</p></td>

	<td width="20%"><p class="b p10px blue ac">Status</p></td>



	<td width="5%"><p class="b p10px  ac">Edit</p></td>


<td width="5%"><p class="b p10px blue ac">
<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p></td>


</tr>

	
	
<?php
$j=0;
while($record_quote=mysql_fetch_array($data_new)){
$j++;
$line = ms_display_value($line_raw);
@extract($line);
?>
	
	<tr>
	<td width="3%" align="center"><?=$j?></td>
	
	
	
<td style="width:100px;padding-left:10px;" valign="middle"><?=substr($record_quote['quote_msg'],0,40)?></td>

	
	

<td style="width:10px;" align="center">

<p class="p10px <?php if($record_quote['quote_status']=="Active"){?>green b <? }else{?>red b <?php }?> ac">

<?=$record_quote['quote_status']?> <?php /*?>&nbsp;&nbsp; <span style="color:#000000;">[<?=date("d-M-Y",strtotime($record_quote['quote_date']))?>]</span><?php */?>


</p>

</td>



<td style="width:30px;">
<p class=" p10px  ac"><a href="add-edit-quote.php?quote=<?=$record_quote['quote_id']?>"><img src="images/edit.gif" /></a></p>
</td>


<td  style="width:30px;"><p class="b p10px blue ac">

<input type="hidden" value="yes" name="val" />

<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_quote['quote_id']?>"  />  



</p></td>

</tr>

<?php
}
		}
	?>

<center>
<table border="1" width="1100">    
<tr>
<td colspan="12">
<p class="p10px fl"><a href="add-edit-quote.php"><input type="button" value="ADD QUOTE" style="width:180px; height:28px;font-weight:700;"/></a></p>

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
</table>
</center>

</form>			


	
	<tr>
	<td colspan="12">
	<p class="p10px fr">
	<?=$pagination?>


</p>  </td>
	</tr>
	</table>
	
	
	</td>
  </tr>
</table>


<?php include('footer.php'); ?>
</body>
</html>

 
    
	<div class="loader"></div>