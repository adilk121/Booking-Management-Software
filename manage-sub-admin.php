<?php include('header.php'); ?>
<!--<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


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


 <tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	
	
	<?php include('left-menu.php'); ?>
	
	</td>

	
<td valign="top" width="83%">



<p class=" xlarge mt10px ml10px"><span class="b " style="font-size:12px"><i class="fa fa-list"></i> Manage Sub Admin &raquo; <span style="color:#999999">
    <p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="manage-sub-admin.php" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>

    <p class="bdr0 m5px mr30px"></p>
    <script>
$(function() {
    $("#zone_code").autocomplete({
        source: "manage-zone-master-autocomplete.php",
        
    });
});
</script>
    
    <!-----------------FORM START---------------------->

<?php
$msg="";
$user_edit_id=$_REQUEST['user_edit_id'];
$user_query="";
if(isset($_REQUEST['sub_admin_submit']))
{

    $reg_uname=$_POST['reg_uname'];
    
    $reg_pass=$_POST['reg_pass'];

if(is_array($access)){ $acc_val=implode(",",$access); }

    
    if($user_edit_id!=""){
      $user_query="update tbl_registration set reg_uname='$reg_uname', reg_pass='$reg_pass', reg_access='$acc_val', reg_date=now(), reg_status='Active', reg_type='SUBADMIN' where reg_id='$user_edit_id' ";  
    }else{
      $user_query="insert into tbl_registration set reg_uname='$reg_uname', reg_pass='$reg_pass', reg_access='$acc_val', reg_date=now(), reg_status='Active', reg_type='SUBADMIN'  ";  
    }
    
   
    
    $user_sql=db_query($user_query);
    if($user_sql)
    {
        if($user_edit_id!="")
        {echo "<script>alert('Sub admin updated successfully !');
        window.location.href='manage-sub-admin.php';
        </script>";   
        }
        else
        {echo "<script>alert('Sub admin added successfully !');
    window.location.href='manage-sub-admin.php';
        </script>";}
    }
    
    
    
}


$user_edit_data="";
if($user_edit_id!="")
{
 
$user_edit_sql=db_query("select * from tbl_registration where 1  and reg_id='$user_edit_id' "); 
$user_edit_data=mysql_fetch_array($user_edit_sql);

}

?>


        	<form name="form1" method="post" action="" onsubmit="return select_one()">
        	    <h3 style="color:red; font-weight:bold; text-align:center;"><?=$msg?></h3>
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">

<tr>
<td width="20"><p class="b blue p6px ml20px">User Id * </p></td> 
<td width="250"><p class="p5px ml10px">
<input type="text" name="reg_uname" id="reg_uname"  style="height:23px; width:180px; text-transform: none;" value="<?=$user_edit_data['reg_uname']?>" /></p></td>
 
</tr>
<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Password * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
<input type="text" name="reg_pass" id="reg_pass" style="height:23px; width:180px; text-transform: none;" value="<?=$user_edit_data['reg_pass']?>" />
</p>
</td>
</tr>
<tr>
 
<td style="width:190px;" colspan=2>
    <p class=" ">
        <table width="100%">
            <tr>
                 <td> <p class="b ml20px blue p5px">Access * </p></td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="1" <?php if(check_access("$user_edit_data[reg_access]","1")=='true') { ?> checked="checked"<? } ?> > Manage Shipper </p> </td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="2" <?php if(check_access("$user_edit_data[reg_access]","2")=='true') { ?> checked="checked"<? } ?>> Manage Shipper Tariff </p> </td>
            </tr>
            
              <tr>
                 <td> <p class="b ml20px blue p5px"></p></td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="3" <?php if(check_access("$user_edit_data[reg_access]","3")=='true') { ?> checked="checked"<? } ?>> Manage Booking </p> </td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="4" <?php if(check_access("$user_edit_data[reg_access]","4")=='true') { ?> checked="checked"<? } ?>> Manage User </p> </td>
            </tr>
            
              <tr>
                 <td> <p class="b ml20px blue p5px"></p></td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="5" <?php if(check_access("$user_edit_data[reg_access]","5")=='true') { ?> checked="checked"<? } ?>> Manage Forwarder </p> </td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="6" <?php if(check_access("$user_edit_data[reg_access]","6")=='true') { ?> checked="checked"<? } ?>> Manage Zone Master </p> </td>
            </tr>
            
              <tr>
                 <td> <p class="b ml20px blue p5px"> </p></td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="7" <?php if(check_access("$user_edit_data[reg_access]","7")=='true') { ?> checked="checked"<? } ?>> Manage State Master </p> </td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="8" <?php if(check_access("$user_edit_data[reg_access]","8")=='true') { ?> checked="checked"<? } ?>> Manage City Master </p> </td>
            </tr>
            
             <tr>
                 <td> <p class="b ml20px blue p5px"> </p></td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="9" <?php if(check_access("$user_edit_data[reg_access]","9")=='true') { ?> checked="checked"<? } ?>> Update Delivery Status </p> </td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="10" <?php if(check_access("$user_edit_data[reg_access]","10")=='true') { ?> checked="checked"<? } ?>> Manage Reasons </p> </td>
            </tr>
            
             <tr>
                 <td> <p class="b ml20px blue p5px"> </p></td>
                <td>  <p class="b  blue p5px"><input type="checkbox" name="access[]" value="11" <?php if(check_access("$user_edit_data[reg_access]","11")=='true') { ?> checked="checked"<? } ?>> Manage Sub Admin </p> </td>
                <td>  <p class="b  blue p5px"></p> </td>
            </tr>
            
            
            
            
        </table>
        
 
  </p>
</td>
    
    
    <td width="700"  style="border-top:none;">
<p style="box-sizing: border-box; padding:10px;">
<input type="submit" name="sub_admin_submit" id="sub_admin_submit"  style="padding:5px; font-weight:bold;">
</p>
</td>

</tr>




</table>
</form>


<script language="javascript" type="text/javascript">
function select_one(){

if(document.getElementById('reg_uname').value==0){		
alert("Enter User Id !");
document.getElementById('reg_uname').focus();
return false;
}else if(document.getElementById('reg_pass').value==0){		
alert("Enter Password !");
document.getElementById('reg_pass').focus();
return false;
}else{

var chks = document.getElementsByName('access[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++){
if (chks[i].checked){
hasChecked = true;
break;
}else{
hasChecked = false;
}
}
if (hasChecked == false){
alert("Please select at least one access !");
return false;
}else{
return true;
}
}
}
</script>




<!-----------------FORM END---------------------->

<br>
<p class="bdr0 m5px mr30px"></p>





<?php
$cond="";

if(isset($_REQUEST['submitForm']))
{
$search_value=$_REQUEST['search_zone'];

if($search_value!="")
{
	$cond="and zone_code='$search_value' ";
}

}

?>

<!--<br><br>
<form method="post" action="" >
    <center>
<input type="text"  id="search_zone" name="search_zone" placeholder="Enter Zone Code" style="text-transform: uppercase;"/>
<input type="submit" name="submitForm" value="Search">
</center>
</form>-->

<!--<a href="add-zone.php" class="btn btn-default pull-right mr15px font-black"><i class="fa fa-plus"></i> Add Zone</a>
<br><br>-->

	  


</p>
<p class="bdr0 m5px mr30px"></p>


	


	
	



	
<form action="" method="post" enctype="multipart/form-data" >
	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
<td style="width:100px;"><p class="b p10px blue ac">User Id</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Password</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Access</p></td>
	
	<td style="width:9px;"><p class="b p10px blue ac">Add Date</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Status</p></td>


<td  style="width:30px;"><p class="b p10px blue ac">
Action
</p></td>
	<td style="width:9px;"><p class="b p10px blue ac"><input type="checkbox" name="all_check" id="all_check"></p></td>

</tr>

	 <?php

	 	$arr_ids = $_REQUEST['select_checkbox'];
	 	
	if(is_array($arr_ids)) {
		$str_ids = implode(',', $arr_ids); 
       }
            if(isset($_REQUEST['checkbox_activate'])) {
			db_query("update tbl_registration set reg_status='Active' where reg_id in ($str_ids)");

		} else if(isset($_REQUEST['checkbox_deactivate'])) {
			db_query("update tbl_registration set reg_status='Inactive' where reg_id in ($str_ids)");

		} else if(isset($_REQUEST['checkbox_delete'])) {
			db_query("delete from tbl_registration where reg_id in ($str_ids)");

		}


/*$reg_id=$_REQUEST['user_delete_id'];
if($reg_id!="")
{
db_query("delete from tbl_registration where reg_id='$reg_id' ");
}*/

 $i = 0; 

$sql=db_query("select * from tbl_registration where reg_type='SUBADMIN'  order by reg_id desc");


while($res=mysql_fetch_array($sql))
{
?>
<tr>





		<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
<?php 
$st_clr="";
if($res['reg_status']=="Active")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>


		<td style="width:100px;"><p class=" p10px  ac" ><?=$res['reg_uname']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" ><?=$res['reg_pass']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" >
		    <?php
							  $msg="";  
							  if(check_access("$res[reg_access]","1")=='true')
							  {  $msg.= "Manage Shipper,&nbsp;"; }
							  if(check_access("$res[reg_access]","2")=='true')
							  {  $msg.= "Manage Shipper Tariff,&nbsp;"; }
							  if(check_access("$res[reg_access]","3")=='true')
							  {  $msg.= "Manage Booking,&nbsp;"; }
							  if(check_access("$res[reg_access]","4")=='true')
							  {  $msg.= "Manage User,&nbsp;"; }
							  if(check_access("$res[reg_access]","5")=='true')
							  {  $msg.= "Manage Forwarder,&nbsp;"; }
							  if(check_access("$res[reg_access]","6")=='true')
							  {  $msg.= "Manage Zone Master,&nbsp;"; }
							  if(check_access("$res[reg_access]","7")=='true')
							  {  $msg.= "Manage State Master,&nbsp;"; }
							  if(check_access("$res[reg_access]","8")=='true')
							  {  $msg.= "Manage City Master,&nbsp;"; }
							  if(check_access("$res[reg_access]","9")=='true')
							  {  $msg.= "Update Delivery Status,&nbsp;"; }
							  if(check_access("$res[reg_access]","10")=='true')
							  {  $msg.= "Manage Reasons,&nbsp;"; }
							  if(check_access("$res[reg_access]","11")=='true')
							  {  $msg.= "Manage Sub Admin,&nbsp;"; }
							  
							   print "$msg";
								?>
		    
		    </p></td>
		
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase;"><?=date("d-M-Y", strtotime($res['reg_date']))?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase; font-weight:bold; color:<?=$st_clr?>"><?=$res['reg_status']?></p></td>
		
	<td style="width:100px;"><p class=" p10px  ac">
	<a href="manage-sub-admin.php?user_edit_id=<?=$res['reg_id']?>" style="color:blue; font-weight:bold; text-transform: uppercase;">
	    Edit</a></p></td>
	        	<td style="width:100px;"><p class=" p10px  ac">
	        	    <input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['reg_id']?>"></p></td>
	        	

</tr>

	
<?}?>
<tr>
    
    <style>
        .func_btn_style{
            outline:none;
            text-align:center;
            border-radius:5px; 
            font-weight:bold; 
            width: 80px; 
            height: 40px; 
            padding: 10px; 
            box-sizing: border-box;
        }
    </style>

 
    <td colspan="8" align="right">
        <input type="submit" class="func_btn_style" style="background-color:#4CAF50;" name="checkbox_activate" value="Activate" onClick="return select_chk()">
   <input type="submit" class="func_btn_style" style="background-color:#f44336;" name="checkbox_deactivate" value="Deactivate" onClick="return select_chk()">
  <input type="submit" class="func_btn_style" style="background-color:#008CBA;" name="checkbox_delete" value="Delete" onClick="return select_chk()">  
    </td>
  
</tr>
<script>
$(document).ready(function(){
        $('#all_check').click(function () {
            $(this).parents('tr:eq(1)').find('.ck_all').attr('checked', this.checked);
        });
});
</script>


<script language="javascript">
function select_chk(){
var chks = document.getElementsByName('select_checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++){
if (chks[i].checked){
  hasChecked = true;
  break;
  }
}
if (hasChecked == false){
alert("Please Select At Least One.");
return false;
}
}
</script> 


</form>			




</table>

	
	
	
	</td>
  </tr>
</table>

<?php include('footer.php'); ?>
</body>
</html>