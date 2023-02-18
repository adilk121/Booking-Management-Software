<?php include('header.php'); ?>

<script>
function find_msg(val){
window.location="manage-subuser.php?status=" + val;
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
else{checked = false}
for (var i =0; i < aa.elements.length; i++){
aa.elements[i].checked = checked;
}
}
</script>
 
 
<?php
if(!empty($_REQUEST['change_status'])){
$arr_ids = $_REQUEST['arr_ids'];
	if(is_array($arr_ids)) {
		$str_ids = implode(',', $arr_ids); 
		if(isset($_REQUEST['ACTIVE'])) {
			db_query("update  tbl_registration set reg_status = 'Active' where reg_id in ($str_ids)");
		} else if(isset($_REQUEST['INACTIVE']) ){
			db_query("update  tbl_registration set reg_status  = 'Inactive' where reg_id in ($str_ids)");
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


<p class=" xlarge mt10px ml10px"><span class="b"><i class="fa fa-users" aria-hidden="true"></i> Manage Subuser</span>
</p>

<p class="bdr0 m5px mr30px" style="margin-top:20px;"></p>



<?php

$cond="";

if(!empty($_REQUEST['status'])){
$cond="and  reg_status ='$_REQUEST[status]' ";
}


$sql="select * from tbl_registration where 1 and reg_type='SUBADMIN' $cond";

$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'reg_id' : true;
$order_by2 == '' ? $order_by2 = '' : true;									  

$sql .= " order by $order_by $order_by2 ";
$sql .= " limit $start, $pagesize ";

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}

?>
	
<form action="" method="post" enctype="multipart/form-data">
<div style="width:100%;color:#006600;font-size:14px;margin-top:5px;font-weight:bold" align="center">
<?php if(!empty($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>

</div>


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

	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">

	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">User Name / Password</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">Date</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">Status</p></td>
	<td  style="width:30px;"><p class="b p10px blue ac">Edit</p></td>
	<td  style="width:30px;"><p class="b p10px blue ac">
<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p></td>


</tr>

	
	

<?php
$i=0;
while($record_emp=mysql_fetch_array($data_new)){
$i++;
$line = ms_display_value($line_raw);
@extract($line);
?>
	
	<tr>
	<td width="3%" align="center" style="font-size:14px"><?=$i?></td>	
	<td style="width:100px;">
	<p class=" p10px b black al pl20px"><?=$record_emp['reg_uname']?>&nbsp;&nbsp;&nbsp;[  <span style="color:#006633"><?=$record_emp['reg_pass']?></span>   ]</p>

	</td>
	<td style="width:100px;"><p class=" p10px black ac"><?=date("d-M-Y",strtotime($record_emp['reg_date']))?></p></td>
	<td style="width:100px;">
	<?php if($record_emp['reg_status']=='Active'){?>
	<p class="p10px b green ac"><?=$record_emp['reg_status']?></p></td>
	<?php }else{?>
	<p class="p10px b red ac"><?=$record_emp['reg_status']?></p></td>
	<?php }?>	
<td style="width:30px;"><p class=" p10px  ac"><a href="add-subuser.php?subuser=<?=$record_emp['reg_id']?>"><img src="images/edit.gif" /></a></p></td>
<td  style="width:30px;"><p class="b p10px blue ac">
<input type="hidden" value="yes" name="val" />
<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_emp['reg_id']?>"  />  
</p></td>
</tr>

<?php } }	?>


<tr>
<td colspan="12">
<p class="p10px fl">
<a href="add-subuser.php"><input type="button" value="ADD NEW SUBUSER" style="width:180px; height:28px;font-weight:700;"/></a>

</p>

<p class="p10px fr">

<input type="hidden" value="yes" name="change_status" />

<span style="margin-left:5px;">
<input type="submit" name="ACTIVE" value="ACTIVE" title="Click here to activate" style="width:80px; height:28px;font-weight:700;" />
</span>



<span style="margin-left:5px;">
<input type="submit" name="INACTIVE" value="INACTIVE" title="Click here to inactive" style="width:80px; height:28px;font-weight:700;" />
</span>

</p>  
</td>
</tr>


</form>			


	
	<tr>
	<td colspan="7">
	<p class="p10px fr">
<?php $pager->show_pager(); ?>


</p>  </td>
	</tr>
	</table>
	
	
	
	
	
	</td>
  </tr>


</table>


<?php include('footer.php'); ?>
</body>
</html>


 
	




<div id="toPopup"> 
    	
        <div class="close"></div>
       	
		<div id="popup_content"> 
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Father's Name</p></td>
		<td ><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">Mahfooz Khan</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Mothre ' s Name</p></td>
		<td><p class="p5px blue">:</p></td>
		<td><p class="p5px blue ">Mahfooz Khan</p></td>
		
		</tr>
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Offical Mobile No</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">1234567890</p></td>
		
		</tr>
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Offical E-mail</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">mahfooz@tradekeyindia.com</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">A/c No</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">1234567890123456</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Bank Name</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">Axis Bank</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">PAN No.</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">123456789</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Permanent Adress</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">RZ 197 11nd Floor Main Nazafgarh Road Piller No 649 Uttam Nagar East Metro Station New Delhi 110059</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Resident Address</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">RZ 197 11nd Floor Main Nazafgarh Road Piller No 649 Uttam Nagar East Metro Station New Delhi 110059</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Reference Name</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">Mahfooz Khan</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Reference Mobile No</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">7895641230</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">Join Date</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">12/25/2013</p></td>
		
		</tr>
		
		<tr>
		<td nowrap="nowrap"><p class="p5px blue b">expperience</p></td>
		<td><p class="p5px blue ">:</p></td>
		<td><p class="p5px blue ">2 year</p></td>
		
		</tr>
		
</table>
		
		
           
        </div> 
    
    </div> 
    
	<div class="loader"></div>