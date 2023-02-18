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
		//$('#keyword_h').val(thisValue);		
		setTimeout("$('#suggestions').fadeOut();", 400);
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
	left: 575px;
	top:140px;
	margin: 26px 0px 0px 0px;
	width: 355px;
	padding:0px;
	background-color: #EBEBEB;
	border-top: 3px solid #0099FF;
	color: #000033;
	z-index:902;
	border-radius:8px;
	padding-left:3px;
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
	font-size:14px;
}

.lis {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
	color:#333333;	
	font-weight:500;
	font-size:14px;
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





.show_info{
    position: absolute;
	margin: 0px 10px 0px 0px;
	right:200px;
	width: 220px;
	height:100px;
	padding:5px;
	padding-top:15px;
	background-color: #CCCCCC;
	color: #FFFFFF;
	border:ridge;
	border-color:#FFFFFF;
	border-radius:5px;
	
}


</style>




<script>
function find_emp(st){
window.location="manage-employe.php?state=" + st + "<?php if(!empty($_REQUEST['dept'])){?>&dept=<?=$_REQUEST['dept']?><?php }?>";
}
</script>

<script>
function find_by_dept(str){
window.location="manage-employe.php?dept=" + str + "<?php if(!empty($_REQUEST['state'])){?>&state=<?=$_REQUEST['state']?><?php }?>";
}
</script>





<script>
function change_status(eid,v){
c=confirm("Are you sure ?");
if(c==true){
window.location="manage-employe.php?new_status=" + v +"&eid="+eid;
}
else{
window.location="manage-employe.php";
}
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
		if(isset($_REQUEST['Resign'])) {		
			db_query("update  tbl_emp set emp_status = 'Resign' where emp_reg_id in ($str_ids)");
		} else if(isset($_REQUEST['Working']) ){
         	db_query("update  tbl_emp set emp_status  = 'WORKING' where emp_reg_id in ($str_ids)");
		} else if(isset($_REQUEST['delete']) ){
			db_query("delete from tbl_emp where emp_reg_id in ($str_ids)");
			db_query("delete from tbl_registration where reg_id in ($str_ids)");			
		}
	}
	
}
?>

<?php
if(!empty($_REQUEST['eid'])){

if($_REQUEST['new_status']=='WORKING'){
$sql="update tbl_emp set emp_status='$_REQUEST[new_status]',emp_rejoin_date=now() where emp_id='$_REQUEST[eid]'";
}else{
$sql="update tbl_emp set emp_status='$_REQUEST[new_status]',emp_res_date=now() where emp_id='$_REQUEST[eid]'";
}

$res=db_query($sql);
if($res>0){
header("location:$_SERVER[HTTP_REFERER]");
}
}
?>
  
  

  

  <tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	
	
	<?php include('left-menu.php'); ?>
	
	</td>
<form name="frm_sr" action="" enctype="multipart/form-data" method="post">
<td valign="top" width="83%">

<p class=" xlarge mt10px ml10px"><span class="b " style="font-size:12px"><i class="fa fa-list"></i> Manage Employee &raquo; <span style="color:#999999"><? if(!empty($_REQUEST['state'])){?>
<?=ucfirst(strtolower($_REQUEST['state']))?><? }?> Employee</span></span>

<a href="add-employee.php" class="btn btn-default pull-right mr15px font-black"><i class="fa fa-plus"></i> Add Employee</a>

<span class="fr mr20px b black" style="font-size:12px;">

<select name="state" id="st" title="Choose to search by employee status" class="sc vam" style="width:130px; height:36px;border:#E8E8E8 solid 1px;color:#999999;margin-left:10px;" 
onchange="find_emp(this.value)">
<option selected="selected" value="0" > Select Status</option>
<option value="RESIGN" <?php if($_REQUEST['state']=='RESIGN'){?> selected="selected"<?php }?> >Resign</option>
<option value="WORKING" <?php if($_REQUEST['state']=='WORKING'){?> selected="selected"<?php }?> >Working</option>
<option value="ALL" <?php if($_REQUEST['state']=='ALL'){?> selected="selected"<?php }?> >All</option>
</select>
</span>

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

<input class="txt vam" name="keyword" id="keyword"  placeholder="Enter employee name/code to Search" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" style="height: 36px;border: #E8E8E8 solid 1px;color: #000000;width: 300px;" onkeyup="suggest(this.value);" onblur="fill(this.value);" >

<input type="hidden" id="keyword" value="" />


</span>
<span><input type="submit" value="Search" name="Search" class="bbnt3 vam"  style="height:34px;width:70px;font-size:12px"/></span>

<div class="suggestionsBox" id="suggestions" style="display: none;color:#000000;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>


</p>
<p class="bdr0 m5px mr30px"></p>

</form>
	
	
<?php

if(!empty($_REQUEST['dept'])){
$cond1="and emp_dpt='$_REQUEST[dept]'";
}


if(isset($_REQUEST['Search'])){

if(stripos($keyword,"WKN000") !== false){
$keyword=substr($keyword,6,strlen($keyword)-1);
$cond2="and emp_code='$keyword'";
}else{
$cond3="and emp_name like '%$keyword%'";
}

}


if(!empty($_REQUEST['state'])){

if($_REQUEST['state']=="ALL"){
$sql="select * from tbl_emp where 1  ";
}else{
$sql="select * from tbl_emp where 1 and emp_status='$_REQUEST[state]' $cond1 $cond2 $cond3";
}

}else{
$sql="select * from tbl_emp where 1 and emp_status='WORKING' $cond1 $cond2 $cond3  ";
}





$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'emp_code' : true;
$order_by2 == '' ? $order_by2 = '' : true;									  

$sql .= " order by $order_by $order_by2 ";

if(empty($cond3)){
$sql .= " limit $start, $pagesize ";
}

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

	
<form action="" method="post" enctype="multipart/form-data" >
	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
	<td  style="width:140px;"><p class="b p10px blue ac">Name</p></td>
	
	<td style="width:70px;"><p class="b p10px blue ac">Employee Code</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">Designation</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Department</p></td>
	<td  style="width:100px;"><p class="b p10px blue ac">User Name/Password</p></td>

	<td  style="width:30px;"><p class="b p10px blue ac">Status</p></td>
	<?php if(strstr($access,'reg_action')){ ?>
	<td  style="width:30px;"><p class="b p10px blue ac">Action</p></td>
	<?php }?>
	
	<?php if(strstr($access,'reg_edit')){ ?>
	<td  style="width:30px;"><p class="b p10px blue ac">Edit</p></td>
	<?php }?>	

<td  style="width:30px;"><p class="b p10px blue ac">
<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p></td>


</tr>

	


<?php
//$j=0;
//while($record_emp = mysql_fetch_array($result)){		
//$j++;
?>


<?php
$j=0;
while($record_emp=mysql_fetch_array($data_new)){
$j++;
$line = ms_display_value($line_raw);
@extract($line);
?>
	
	<tr >
	<td width="3%" align="center"><?=$j?></td>
	<td style="width:100px;"> <p class=" p10px b black al" ><a class="pop1" href="emp_detail.php?dis_id=<?=$record_emp['emp_id']?>" title=""  >
	<?=ucfirst($record_emp['emp_name'])?>&nbsp;<img src="images/arr.png" height="13" width="13" style="vertical-align:middle" /></a></p>	
	
	
	
	
	</td>
	
	
	
	
	
	
	
	
	<td style="width:100px;"><p class=" p10px black ac"><?="BI".$record_emp['emp_code']?></p></td>
	<td style="width:100px;"><p class=" p10px black ac"><?=$record_emp['emp_desination']?></p></td>
	<td style="width:100px;"><p class="p10px black ac"><?=$record_emp['emp_dpt']?></p></td>
	<td style="width:100px;"><p class=" p10px black ac">
	<?=db_scalar("select reg_uname from tbl_registration where 1 and reg_id='$record_emp[emp_reg_id]'")?>
	<br />
<span style="color:#993300;font-weight:bold">     <?=db_scalar("select reg_pass from tbl_registration where 1 and reg_id='$record_emp[emp_reg_id]'")?></span>
	</p></td>
	<td style="width:30px;"><p class=" p5px  ac b" style="color:<? if($record_emp['emp_status']=="RESIGN"){ echo "#990000";}else{echo "#006600";}?>" ><?=ucfirst(strtolower($record_emp['emp_status']))?></p>
	<p class="green ac">
	<?php
	if($_REQUEST['state']=="RESIGN"){
	echo date("d-M-Y",strtotime($record_emp['emp_res_date']));
	}else if($record_emp['emp_rejoin_date']!='0000-00-00'){
	echo date("d-M-Y",strtotime($record_emp['emp_rejoin_date']));
	}else{
	echo date("d-M-Y",strtotime($record_emp['emp_join_date']));
	}
	
	
	?>
	
	
	</p>	
	
	</td>
	

<?php if(strstr($access,'reg_action') ){?>
<td style="width:10px;" align="center">



<!--<div id='PopUp' style='display: none; position: absolute; left: 100px; top: 50px; border: solid black 1px; padding: 10px; background-color:#CCCCCC; text-align: justify; font-size: 12px; width: 135px;' onmouseout="document.getElementById('PopUp').style.display = 'none' ">
-->




<?php
$status=mysql_fetch_array(db_query("select emp_status from tbl_emp where emp_id='$record_emp[emp_id]'"));
if($status['emp_status']=='RESIGN' ){
?>

<input type="button" name="WORKING" style="background-color:#FFFFFF;border:#F4F4F4 1px outset;border-radius:5px;font-weight:700;color:#666666;width:70px;" onmouseover="this.style.background='#999999';this.style.color='#fff'" onmouseout="this.style.background='#FFFFFF';this.style.color='#666666'" value="Working" onclick="javascript:void window.open('resign-rejoin-emp.php?empid=<?=$record_emp['emp_id']?>&curr_status=WORKING','1408352108354','width=400,height=120,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=500,top=200');return false;"   />
<?php
}else{
?>
<input type="button" name="RESIGN" value="Resign" style="background-color:#FFFFFF;border:#F4F4F4 1px outset;border-radius:5px;font-weight:700;color:#666666;width:70px;" onmouseover="this.style.background='#999999';this.style.color='#fff'" onmouseout="this.style.background='#FFFFFF';this.style.color='#666666'"  onclick="javascript:void window.open('resign-rejoin-emp.php?empid=<?=$record_emp['emp_id']?>&curr_status=RESIGN','1408352108354','width=400,height=120,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=500,top=200');return false;"    />
<?php }?>

<?php /*?>change_status(<?=$record_emp['emp_id']?>,'RESIGN');<?php */?>

</p>



</td>
<?php }?>

<?php if(strstr($access,'reg_edit')){ ?>
<td style="width:30px;"><p class=" p10px  ac">
<a href="edit-employe.php?empid=<?=$record_emp['emp_reg_id']?>"><img src="images/edit.gif" /></a></p></td>
<?php }?>

<td  style="width:30px;"><p class="b p10px blue ac">

<input type="hidden" value="yes" name="val" />

<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_emp['emp_reg_id']?>"  />  



</p></td>

</tr>

<?php
		}
	?>


<tr>


<?php if(strstr($access,'reg_action') and $access_level['reg_type']=='ADMIN'){ ?>
<td colspan="10">
<p class="p10px fr">


<?php if($_REQUEST['status']=='ALL' || $_REQUEST['status']=='WORKING' || $_REQUEST['status']=="" ){ ?>



<span style="margin-left:5px;">
<input type="submit" name="Resign" value="Resign" title="Click here to make rasign" style="width:80px; height:28px;font-size:14px" />
</span>

<?php }?>


<?php if($_REQUEST['status']=='ALL' || $_REQUEST['status']=='RESIGN' ){ ?>

<span style="margin-left:5px;">
<input type="submit" name="Working" value="Working" title="Click here to make working" style="width:80px; height:28px;font-size:14px" />
</span>
<?php }?>


<?php if($access_level['reg_type']=='ADMIN'){ ?>

<span style="margin-left:5px;">
<input type="submit" name="delete" value="Delete" title="Click here to delete" onclick="return confirm('Are you sure ?');" style="width:80px; height:28px;font-size:14px" />
</span>
<?php }?>




</p>  
</td><?php }}?>
</tr>


</form>			




</table>
<?php $pager->show_pager(); ?>	
	
	
	
	
	</td>
  </tr>
</table>

<?php include('footer.php'); ?>
</body>
</html>