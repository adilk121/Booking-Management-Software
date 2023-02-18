<?php include("header-home.php")?>

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
	left: 565px;
	top:165px;
	margin: 26px 0px 0px 0px;
	width: 190px;
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
	font-weight:200;
	font-size:14px;
	width:150px;
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


  <tr>
    <td valign="top" width="20%" >
		<?php include("left-home.php")?>
    </td>
    <td valign="top" width="60%">
	<table cellpadding="0" cellspacing="0" border="0" width="96%" align="center" style="margin-top:2px;">
	<tr>
	<?php include("quote.php")?>
	</tr>
	
	
	</table>
	<form name="frm_sr" action="colleagues.php" enctype="multipart/form-data" method="post">
<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">Colleagues


<span style="margin-left:210px;width:255px;vertical-align:top"><span class="ml1px">

<input class="txt vam" name="keyword" id="keyword"  placeholder="Enter employee name/code to Search" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" style="height:20px;border:#E8E8E8 solid 1px;color:#000000;width:180px;vertical-align:top;font-size:14px" onkeyup="suggest(this.value);" onblur="fill(this.value);" >

<input type="hidden" id="keyword" value="" />


</span>
<span><input type="submit" value="Go" name="Search" class="bbnt3 vam"  style="height:25px;width:35px;font-size:12px;"/></span></span>


<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo Colleagues</span>
</p><div class="suggestionsBox" id="suggestions" style="display: none;color:#000000;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
</form>
	<hr / style="background-color:#999999; width:750px;">





<?php

if($keyword!=""){
$cond="and emp_name like '%$keyword%' ";
}


$sql="select * from tbl_emp inner join tbl_registration on emp_reg_id=reg_id where 1 and emp_status='WORKING' and reg_type='EMPLOYEE' and emp_reg_id!='$_SESSION[UID_EMS]' $cond";
$start = intval($_REQUEST['start']);
$pagesize = intval($pagesize)==0?$pagesize=6:$pagesize;
$order_by == '' ? $order_by = 'emp_code' : true;
$order_by2 == '' ? $order_by2 = 'asc' : true;									  

$sql .= " order by $order_by $order_by2 ";
$sql .= " limit $start, $pagesize ";

$pager = new midas_pager_sql($sql, $pagesize, $start);
if($pager->total_records) {
$data_new= db_query($sql);
}

	?>


<table style="margin-left:30px;">
<tr>

	
<?	
	$data=db_query($sql);
	$c=0;
	while($record=mysql_fetch_array($data)){
	$c++;
	?>
<td>	
	<div class="shedow"  style="width:300px; border:solid #CCCCCC thin;border-radius:5px;margin-top:15px;margin-left:30px;padding:10px;line-height:2.0em;color:#666666">
	
	<table style="margin-left:15px;width:300px;">
	<tr>
	<td>
	<?php 
	if(empty($record['emp_photo'])){
	?>
	<img src="images/noimage.jpg" height="100" width="90" style="float:left" />
	<?php }else{?>
	<img src="Employee_Documents/<?=$record['emp_photo']?>" height="100" width="90" style="float:left" />
	<?php }?>
	</td>

	<td valign="top">
	<div style="width:550px;vertical-align:top;margin-top:10px;margin-left:10px;">
	<?="<strong>Name :</strong> ".ucfirst($record['emp_name'])?></div>

	<div style="width:550px;vertical-align:top;margin-top:10px;margin-left:10px;">
	<?="<strong>Department :</strong> ".ucfirst($record['emp_dpt'])?></div>


	<div style="width:550px;vertical-align:top;margin-top:10px;margin-left:10px;">
	<a href="my-profile.php?emp_id=<?=$record['emp_id']?>" style="font-size:12px;color:#993300;font-weight:bold;text-decoration:underline">View More</a>
	</div>

	</td>
	</tr>
</table>
    
	 

		
	</div>
	</td>

<?php 

if($c%2==0){
echo "<tr></tr>";
}
	
       }
	  
     ?>
	</tr>
	</table>
<div style="font-size:10px"><?php $pager->show_pager(); ?>	</div>	
	</td>
    <td valign="top" width="20%" >
		<?php include("right-home.php")?>
	</td>
  </tr>
</table> 
<div style="background:#284c93;height:33px;" class="mt10px">
  <p style="padding:10px;color:#FFFFFF;text-align:right;" >Copyright Reseverd @ Web Key Network Pvt Ltd</p>
</div>
</body></html>