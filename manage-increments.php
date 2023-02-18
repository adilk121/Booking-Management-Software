<?php include('header.php'); ?>

<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>



<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#keyword').addClass('load');
			$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#keyword').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#keyword').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 700);
	}

</script>


<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#0000CC;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFFFF;
}
#country{
	padding:3px;
	border:1px #CCC solid;
	font-size:17px;
}
.suggestionsBox {
	position: absolute;
	left: 652px;
	top:140px;
	margin: 26px 0px 0px 0px;
	width: 385px;
	padding:0px;
	background-color: #EBEBEB;
	border-top: 3px solid #0099FF;
	color: #000033;
	z-index:902;
	border-radius:8px;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.uls{
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
	color:#333333;	
	font-weight:500;
	font-size:12px;
}

.lis {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
	color:#333333;	
	font-weight:500;
	font-size:12px;
}

.uls :hover {
    list-style:none;
	background-color: #0099FF;
	color:#000;
}
.lis:hover {
    list-style:none;
	background-color: #0099FF;
	color:#000;
}

uls {
     list-style:none;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(images/loader.gif);
background-position:right;
background-repeat:no-repeat;
}

.suggest {
	position:relative;
}

</style>


<script>
function find_emp(){
window.location="manage-employe.php?status=" + document.getElementById('st').value;
}
</script>



<script>

function find_msg(val){
window.location="manage-increments.php?status=" + val;
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
$arr_ids = $_REQUEST['arr_ids'];
	if(is_array($arr_ids)) {
		$str_ids = implode(',', $arr_ids); 
		if(isset($_REQUEST['Active'])) {
			db_query("update  tbl_emp_increment set emp_in_status = 'Active' where emp_in_id in ($str_ids)");
			} else if(isset($_REQUEST['Inctive']) ){
			db_query("update  tbl_emp_increment set emp_in_status = 'Inactive' where emp_in_id  in ($str_ids)");			
		} else if(isset($_REQUEST['delete']) ){
			db_query("delete from tbl_emp_increment where emp_in_id in ($str_ids)");

		} 
	}
	
?>  
  

  

<tr>
<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
<?php include('left-menu.php'); ?>
</td>

<form name="frm_sr" action="" enctype="multipart/form-data" method="post">
<td valign="top" width="83%">
<p class=" xlarge mt10px ml10px"><span class="b"><i class="fa fa-money" aria-hidden="true"></i>
 Manage Increments</span> &raquo; Working Employee




<span class="fr mr10px b black" style="font-size:12px;">
<select name="status" id="status" title="Choose to search by  status" class="sc vam" style="width:130px; height:30px;border:#E8E8E8 solid 1px;" 
onchange="find_msg(this.value)">
<option value="" selected="selected"> Choose One</option>
<option value="Active" >Active</option>
<option value="Inactive">Inactive</option>
<option value="">All</option>
</select>
</span>

<? if($_REQUEST['dept']!="" || $keyword!="" || $_REQUEST['status']!=""){?>
<a href="manage-increments.php" class="b blue fr" style="margin-right:80px;margin-top:10px;color:#000099;text-decoration:underline">Back</a>
<? }?>

<span >
<select name="dept" title="Choose to search by department" onchange="find_by_dept(this.value)" class="sc vam" style="width:150px; height:36px;border:#E8E8E8 solid 1px;color:#999999">
<option value="0">Select Department</option>
<option value="Marketing" <?php if($_REQUEST['dept']=='Marketing'){?> selected="selected"<?php }?> >Marketing</option>
<option value="Back Office" <?php if($_REQUEST['dept']=='Back Office'){?> selected="selected"<?php }?>>Back Office</option>
<option value="H.R." <?php if($_REQUEST['dept']=='H.R.'){?> selected="selected"<?php }?> >H.R.</option>
<option value="Accounts" <?php if($_REQUEST['dept']=='Accounts'){?> selected="selected"<?php }?> >Accounts</option>
<option value="Admin" <?php if($_REQUEST['dept']=='Admin'){?> selected="selected"<?php }?> >Admin</option>   
<option value="0">All</option>
</select>

</span><span class="ml1px">

<input class="txt vam" name="keyword" id="keyword"  placeholder="Enter employee name/ employee code to Search" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" style="height:30px;border:#E8E8E8 solid 1px;color:#000000;width:320px;" onkeyup="suggest(this.value);" onblur="fill(this.value);" >

</span>

<span><input type="submit" value="Search" name="Search" class="bbnt3 vam"  style="height:35px;"/></span>

<div class="suggestionsBox" id="suggestions" style="display: none;color:#000000;"><div class="suggestionList" id="suggestionsList"> &nbsp; </div></div>

</p>
<p class="bdr0 m5px mr30px"></p>
</form>
<?php

if(isset($_REQUEST['Search'])){

$cond="";


if(stripos($keyword,"WKN000") !== false){
$keyword=substr($keyword,6,strlen($keyword)-1);
$cond="and emp_in_emp_code='$keyword'";
}else{
$cond="and  emp_in_name like '%$keyword%'";
}



}


if(isset($_REQUEST['dept']) and $_REQUEST['dept']!="0"){
$cond="and emp_in_dept='$_REQUEST[dept]'";
}


if(!empty($_REQUEST['status'])){
$cond="and  emp_in_status ='$_REQUEST[status]' ";
}

$sql="select * from tbl_emp_increment where 1 $cond";

$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'emp_in_id' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;									  

$sql .= " order by $order_by $order_by2 ";
$sql .= " limit $start, $pagesize ";

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}
?>
	
<form action="" method="post" enctype="multipart/form-data">
	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	
	<td width="196"  ><p class="b p10px blue ac">SN.</p></td>
	<td width="196"  ><p class="b p10px blue ac">Employee Name</p></td>
	
	<td width="186" ><p class="b p10px blue ac">Employee Id</p></td>
	<td width="153" ><p class="b p10px blue ac">Current Salary</p></td>
	<td width="178" ><p class="b p10px blue ac">Incresed Amount</p></td>
	<td width="183" ><p class="b p10px blue ac">Incresed Salary</p></td>
	<td width="165" ><p class="b p10px blue ac">Increment Date</p></td>
	<td width="158" ><p class="b p10px blue ac">Applicable From</p></td>
	<td width="100" ><p class="b p10px blue ac">Status</p></td>
	<?php if(strstr($access,'reg_edit')){ ?><td width="62" ><p class="b p10px blue ac">Edit</p></td><? }?>
	<td width="40" ><p class="b p10px blue ac">	<input type="checkbox" name="checkbox" onclick="checkall(this.form)" /></p></td>

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
		
<tr>
<td width="3%" align="center"><?=$i?></td>
<td style="width:100px;"><p class=" p10px b u black ac" ><a class="pop1" href="emp_detail.php?dis_id=<?=db_scalar("select emp_id from tbl_emp where emp_reg_id='$record_emp[emp_in_reg_id]'")?>" title=""  >
<?=ucfirst($record_emp['emp_in_name'])?></a></p>	
</td>

<td style="width:100px;"><p class=" p10px black ac"><?=$record_emp['emp_in_emp_code']?></p></td>
<td style="width:100px;"><p class=" p10px black ac"><?=$record_emp['emp_in_old_sal']?></p></td>
<td style="width:100px;"><p class="p10px black ac"><?=$record_emp['emp_in_in_amnt']?></p></td>
<td style="width:100px;"><p class=" p10px black ac"><?=$record_emp['emp_in_new_sal']?></p></td>
<td style="width:100px;"><p class=" p10px black ac"><?=date("d-M-Y",strtotime($record_emp['emp_in_in_date']))?></p></td>
<td  style="width:30px;"><p class="b p10px blue ac"><?=date("d-M-Y",strtotime($record_emp['emp_in_in_app_date']))?></p></td>
<td  style="width:30px;"><p class="b p10px <? if($record_emp['emp_in_status']=='Active'){?>green<? }else{?>maroon<? }?> ac"><?=$record_emp['emp_in_status']?></p></td>
<?php if(strstr($access,'reg_edit')){ ?>
<td style="width:30px;"><p class=" p10px  ac"><a href="add-edit-increments.php?empid=<?=$record_emp['emp_in_id']?>"><img src="images/edit.gif" /></a></p></td>
<?php }?>
</p>

<td align="center"><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_emp['emp_in_id']?>"  />  
</td>


</tr>

<?php

}

}
?>



<tr>
<td colspan="12">
<p class="p10px fl">

<a href="add-edit-increments.php"><input type="button" value="ADD INCREMENT" style="width:180px; height:28px;font-weight:700;"/></a></p>

<p class="p10px fr">
<span style="margin-left:5px;">
<input type="submit" name="Active" value="ACTIVE" title="Click here to active" style="width:80px; height:28px;font-weight:700;" />
</span>
<span style="margin-left:5px;">
<input type="submit" name="Inctive" value="INACTIVE" title="Click here to inactive" style="width:80px; height:28px;font-weight:700;" />
</span>

<?php if(strstr($access,'reg_edit')){ ?>
<span style="margin-left:5px;">
<input type="submit" name="delete" value="DELETE" title="Click here to delete" onclick="return confirm('Are you sure ?')" style="width:80px; height:28px;font-weight:700;" />
</span>
<? }?>





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

<script>
function find_by_dept(str){
window.location="manage-increments.php?dept=" + str + "<?php if(!empty($_REQUEST['state'])){?>&state=<?=$_REQUEST['state']?><?php }?>";
}
</script>

<?php include('footer.php'); ?>
</body>
</html>