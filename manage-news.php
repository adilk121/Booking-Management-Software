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
function find_msg(val){
window.location="manage-news.php?status=" + val;
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
			db_query("update  tbl_news set news_status = 'Active' where news_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Record(s) are activated";
		} else if(isset($_REQUEST['Inctive']) ){
			db_query("update  tbl_news set news_status = 'Inactive' where news_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Record(s) are inactivated";
		} else if(isset($_REQUEST['delete']) ){
			db_query("delete from tbl_news where news_id in ($str_ids)");
			$c=mysql_affected_rows();
			$_SESSION['msg']="$c Record(s) are deleted";

		} 
	}
	
}
?>

<?php
if(!empty($_REQUEST['eid'])){
$sql="update tbl_emp set emp_status='$_REQUEST[new_status]' where emp_id='$_REQUEST[eid]'";
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

<td valign="top" width="83%">

		<p class="fr mr10px b black" style="font-size:12px;margin-top:10px;">
        

Search Filter :
<input type="radio" value="Active" name="status" id="status"  <? if($_REQUEST['status']=='Active'){?> checked="checked"<? }?>  onclick="find_msg(this.value)" style="margin-right:10px;font-weight:400;" />Active
<input type="radio" value="Inactive" name="status" id="status"  <? if($_REQUEST['status']=='Inactive'){?> checked="checked"<? }?>  onclick="find_msg(this.value)" />Inactive

<input type="radio" value="" name="status" id="status"  <? if($_REQUEST['status']==''){?> checked="checked"<? }?>  onclick="find_msg(this.value)" />All


<a href="add-edit-news.php"><input type="button" value="ADD NEWS" style="width:140px; height:28px;font-weight:700;margin-left:20px"/></a>
        


</p>


<p class=" xlarge mt10px ml10px"><span class="b"><i class="fa fa-newspaper-o"></i> Manage News</span>
</p>

<p class="bdr0 m5px mr30px" style="margin-top:20px;"></p>	
<?php

$cond="";

if(!empty($_REQUEST['status'])){
$cond="and  news_status ='$_REQUEST[status]' ";
}

$sql="select * from tbl_news where 1 $cond";

$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$order_by == '' ? $order_by = 'news_date' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;									  

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
<div class="col-sm-12" style="padding-top:20px;">


<span style="float:left;font-weight:bold;">
<? $pager->show_displaying()?>
</span>



<span style="float:right;font-weight:bold;">Records Per Page:
<?=pagesize_dropdown('pagesize', $pagesize);?></span>

</div>
	<br />

	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	
	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
	<td width="20%" ><p class="b p10px blue ac">News Title</p></td>
<!--	<td width="10%"><p class="b p10px blue ac">Images</p></td>	-->
	<!--<td width="37%"><p class="b p10px blue ac">News Detail</p></td>-->

	<td width="10%"><p class="b p10px blue ac">Status / Date</p></td>


	<?php if(strstr($access,'reg_edit')){ ?>
	<td width="5%"><p class="b p10px  ac">Edit</p></td>
	<?php }?>	

<td width="5%"><p class="b p10px blue ac">
<input type="checkbox" name="checkbox" onclick="checkall(this.form)" />
</p></td>


</tr>

	
<?php
$i=0;
while($record_news=mysql_fetch_array($data_new)){
$i++;
$line = ms_display_value($line_raw);
@extract($line);
?>


	
	<tr>
	<td width="3%" align="center" ><?=$i?></td>
	<td style="width:100px;padding-left:15px" align="left">
	<a class="pop4" href="news_detail.php?news=<?=$record_news['news_id']?>" style="color:#333333;font-size:12px;font-weight:bold;text-decoration:underline" >
	<?=substr($record_news['news_title'],0,50)?></a>	
	</td>
	
<?php /*?><td style="width:100px;"><p class=" p10px black ac vl"><img src="Employee_Documents/<?=$record_news['news_image']?>" height="90" width="80" /></p></td><?php */?>
	
	
	

<td style="width:10px;" align="center">

<p class="p10px <?php if($record_news['news_status']=="Active"){?>green b <? }else{?>red b <?php }?> ac">

<?=$record_news['news_status']?>

<span style="color:#333333">( <?=date("d-M-Y",strtotime($record_news['news_date']))?> )</span>

</p>
<p class="p10px black ac"></p>
</td>


<?php if(strstr($access,'reg_edit')){ ?>
<td style="width:30px;">
<p class=" p10px  ac"><a href="add-edit-news.php?news=<?=$record_news['news_id']?>"><img src="images/edit.gif" /></a></p>
</td>
<?php }?>

<td  style="width:30px;"><p class="b p10px blue ac">

<input type="hidden" value="yes" name="val" />

<input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$record_news['news_id']?>"  />  



</p></td>

</tr>

<?php
}
?>
<tr>
<td colspan="5">


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
<?php	
}
?>





</form>			


	
	<tr>
	<td colspan="12">
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


 
	




 
    
	<div class="loader"></div>