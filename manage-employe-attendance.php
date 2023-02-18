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
window.location="manage-employe-attendance.php?state=" + st + "<?php if(!empty($_REQUEST['mnt'])){?>&mnt=<?=$_REQUEST['mnt']?><?php }?><?php if(!empty($_REQUEST['day'])){?>&day=<?=$_REQUEST['day']?><?php }?><?php if(!empty($_REQUEST['type'])){?>&type=<?=$_REQUEST['type']?><?php }?><?php if(!empty($_REQUEST['keyword'])){?>&keyword=<?=$_REQUEST['keyword']?><?php }?>"
}
</script>

<script>
function find_by_mnt(str){
window.location="manage-employe-attendance.php?mnt=" + str + "<?php if(!empty($_REQUEST['state'])){?>&state=<?=$_REQUEST['state']?><?php }?><?php if(!empty($_REQUEST['day'])){?>&day=<?=$_REQUEST['day']?><?php }?><?php if(!empty($_REQUEST['type'])){?>&type=<?=$_REQUEST['type']?><?php }?><?php if(!empty($_REQUEST['keyword'])){?>&keyword=<?=$_REQUEST['keyword']?><?php }?>"
}

function find_by_day(type){

			if(type=='yesterday'){
			window.location='manage-employe-attendance.php?day=<?=date("Y-m-d",strtotime("Yesterday"))?>&type='+type+ "<?php if(!empty($_REQUEST['state'])){?>&state=<?=$_REQUEST['state']?><?php }?>"
			}
			
			if(type=='today'){
			window.location='manage-employe-attendance.php?day=<?=date("Y-m-d",strtotime("Today"))?>&type='+type+ "<?php if(!empty($_REQUEST['state'])){?>&state=<?=$_REQUEST['state']?><?php }?>"
			}
			
			if(type=='all'){
			window.location='manage-employe-attendance.php?ut=emp&type=all<?php if(!empty($_REQUEST['state'])){?>&state=<?=$_REQUEST['state']?><?php }?>'
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

<?
if($_REQUEST['mnt']!=""){
$month=$_REQUEST['mnt'];
}else{
$month=date("m");
}


$date=date("Y-m-d");
?>


<?php
if(!empty($_REQUEST['val'])){
$arr_ids = $_REQUEST['arr_ids'];
	if(is_array($arr_ids)) {
		$str_ids = implode(',', $arr_ids); 
		if(isset($_REQUEST['mark_as_ontime'])) {		
			db_query("update  tbl_emp_attendance  set att_time='09:29:59' where att_id in ($str_ids)");
		} else if(isset($_REQUEST['mark_as_late']) ){
         	db_query("update  tbl_emp_attendance set att_time = '09:32:00' where att_id in ($str_ids)");
		} else if(isset($_REQUEST['delete']) ){
			db_query("delete from tbl_emp where emp_reg_id in ($str_ids)");
			db_query("delete from tbl_registration where reg_id in ($str_ids)");			
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

<p class=" xlarge mt10px ml10px"><span class="b " style="font-size:12px"><i class="fa fa-calendar" aria-hidden="true"></i> Manage Attendance &raquo; </span>



<span class="fr mr20px b black" style="font-size:12px;">

<select name="state" id="st" title="Choose to search by employee status" class="sc vam" style="width:130px; height:36px;border:#E8E8E8 solid 1px;color:#999999;margin-left:10px;" 
onchange="find_emp(this.value)">
<option selected="selected" value="0" > Select Status</option>
<option value="Late" <?php if($_REQUEST['state']=='Late'){?> selected="selected"<?php }?> >Late</option>
<option value="On Time" <?php if($_REQUEST['state']=='On Time'){?> selected="selected"<?php }?> >On Time</option>
<option value="ALL" <?php if($_REQUEST['state']=='ALL'){?> selected="selected"<?php }?> >All</option>
</select>
</span>

<span class="fr mr10px mt10px"><input type="radio" value="all" <? if($_REQUEST['type']=="all"){?> checked="checked"<? }?>  onclick="find_by_day('all')" />All</span>

<span class="fr mr10px mt10px"><input type="radio" value="yesterday" <? if($_REQUEST['type']=="yesterday"){?> checked="checked"<? }?> onclick="find_by_day('yesterday')"  />Yesterday</span>
<span class="fr mr10px mt10px"><input type="radio" value="today" <? if($_REQUEST['type']=="today"){?> checked="checked"<? }?>  onclick="find_by_day('today')" />Today</span>




<span >



<select name="month" title="Choose to search by month" onchange="find_by_mnt(this.value)" class="sc vam" style="width:150px; height:36px;border:#E8E8E8 solid 1px;color:#999999">
<option value="0">Select Month</option>

<option value="01" <?php if($month=='01'){?> selected="selected"<?php }?>>January</option>
<option value="02" <?php if($month=='02'){?> selected="selected"<?php }?>>Febuary</option>
<option value="03" <?php if($month=='03'){?> selected="selected"<?php }?>>March</option>
<option value="04" <?php if($month=='04'){?> selected="selected"<?php }?>>April</option>
<option value="05" <?php if($month=='05'){?> selected="selected"<?php }?>>May</option>
<option value="06" <?php if($month=='06'){?> selected="selected"<?php }?>>June</option>
<option value="07" <?php if($month=='07'){?> selected="selected"<?php }?>>July</option>
<option value="08" <?php if($month=='08'){?> selected="selected"<?php }?>>Augest</option>
<option value="09" <?php if($month=='09'){?> selected="selected"<?php }?>>September</option>
<option value="10" <?php if($month=='10'){?> selected="selected"<?php }?>>October</option>
<option value="11" <?php if($month=='11'){?> selected="selected"<?php }?>>November</option>
<option value="12" <?php if($month=='12'){?> selected="selected"<?php }?>>December</option>


</select>
</span><span class="ml1px">

<input class="txt vam" name="keyword" id="keyword" value="<?=$_REQUEST['keyword']?>"  placeholder="Enter employee name/code to Search" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" style="height:30px;border:#E8E8E8 solid 1px;color:#000000;" onkeyup="suggest(this.value);" onblur="fill(this.value);" >

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

if(!empty($_REQUEST['month'])){
$cond1="and MONTH(att_date)='$_REQUEST[month]'";
}


if(isset($_REQUEST['Search'])){

$cond2="and att_emp_name='$keyword'";

}


if(!empty($_REQUEST['type']) and $_REQUEST['type']=='all'){
$cond3="";
}else {
$cond3="and att_date='$_REQUEST[day]'";
}


if($_REQUEST['state']=="Late"){
$cond4="and att_time > '09:30:00' ";
}else if($_REQUEST['state']=="On Time"){
$cond4="and att_time <= '09:30:00' ";
}else{
$cond4="";
}





$sql="select * from tbl_emp_attendance where 1 and att_emp_name!='' and MONTH(att_date)='$month'  $cond1 $cond2 $cond3 $cond4";





$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'att_date' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;									  

$sql .= " order by $order_by $order_by2 ";

if(empty($cond3)){
$sql .= " limit $start, $pagesize ";
}

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}

?>



	

<? if($pager->total_records==0 and $_REQUEST['keyword']!="") {?>
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
	
	<td style="width:70px;"><p class="b p10px blue ac">Date</p></td>
	<td style="width:100px;"><p class="b p10px blue ac">Time</p></td>
	

	<td  style="width:30px;"><p class="b p10px blue ac">Status</p></td>
	
	
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
	<td style="width:100px;"> <p class=" p10px b black al" ><a class="pop1" href="emp_detail.php?dis_id=<?=db_scalar("select emp_id from tbl_emp where 1 and emp_reg_id='$record_emp[att_emp_reg_id]'")?>" title=""  >
	<?=ucfirst($record_emp['att_emp_name'])?>&nbsp;<img src="images/arr.png" height="13" width="13" style="vertical-align:middle" /></a></p>	
	
	
	
	
	</td>
	
	
	
	
	
	
	
	
	<td style="width:100px;"><p class=" p10px black ac"><?=date("d F Y",strtotime($record_emp['att_date']))?></p></td>
	<td style="width:100px;"><p class=" p10px black b large ac" style="color:<? if(strtotime($record_emp['att_time'])>strtotime("9:30:00")){ echo "red";}else{echo "#006600";}?>"><?=date("h:i:s a",strtotime($record_emp['att_time']))?></p></td>

	
	<td style="width:30px;"><p class=" p5px  ac b" style="color:<? if(strtotime($record_emp['att_time'])>strtotime("9:30:00")){ echo "red";}else{echo "#006600";}?>" >
	<? if(strtotime($record_emp['att_time'])>strtotime("9:30:00")){ echo "Late";}else{echo "On Time";}?></p>
		
	
	</td>
	


<?php if(strstr($access,'reg_edit')){ ?>
<td style="width:30px;"><p class=" p10px  ac">
<a  onclick="window.open('edit_att_time.php?att_id=<?=$record_emp['att_id']?>','Change Time','top=150,left=600,height=150,width=350')"><img src="images/edit.gif" /></a></p></td>
<?php }?>

<td  style="width:30px;"><p class="b p10px blue ac">

<input type="hidden" value="yes" name="val" />

<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_emp['att_id']?>"  />  



</p></td>

</tr>

<?php
		}
	?>


<tr>



<td colspan="10">
<p class="p10px fl  mt10px blue b ml10px mb10px " style="background-color:#FFFF33">
 Late : <span class="red b"><?=db_scalar("select count(att_id) from  tbl_emp_attendance where 1  and att_time > '09:30:00' and att_emp_name!='' and MONTH(att_date)='$month'  $cond1 $cond2 $cond3 ")?></span></span>
<span class="ml10px" >On Time : <span class="green b"><?=db_scalar("select count(att_id) from  tbl_emp_attendance where 1  and att_time <= '09:30:00' and att_emp_name!='' and MONTH(att_date)='$month'  $cond1 $cond2 $cond3 ")?></span></p>

<p class="p10px fr">




<span style="margin-left:5px;">
<input type="submit" name="mark_as_ontime" value="Mark As On Time" title="Click here to mark as on time" style="width:130px; height:28px;font-size:14px" />
</span>


<span style="margin-left:5px;">
<input type="submit" name="mark_as_late" value="Mark As Late" title="Click here to mark as late" style="width:120px; height:28px;font-size:14px" />
</span>






</p>  
</td><?php }?>
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