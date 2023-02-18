<?php include('header.php'); ?>
<?/*
<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="fancybox/popup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="date/jquery-ui.css">
<script src="date/jquery-1.9.1.js"></script>
<script src="date/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
*/?>

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
<script>
    $(function() {
    $("#emp_code").autocomplete({
        source: "manage-user-search.php",
        
    });
});
</script>


<p class=" xlarge mt10px ml10px"><span class="b " style="font-size:12px"><i class="fa fa-list"></i> Manage User &raquo; <span style="color:#999999">
  <!--  <span style="color:black;"><i class="fa fa-refresh"></i>Refresh</span>-->
  <p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="manage-user.php?type=<?=$_REQUEST['type']?>" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>

    <p class="bdr0 m5px mr30px"></p>
    
    
    <!-----------------FORM START---------------------->

<?php

$edit_id=$_REQUEST['user_edit_id'];

$sql_con="";
$sql_where_con="";

if($edit_id!="")
{
$sql_con="update";    
$sql_where_con="where user_id='$edit_id'";
}else{
$sql_con="insert into";    
}

if(isset($_REQUEST['user_submit']))
{
    $user_type=$_REQUEST['user_type'];
    $type=$_REQUEST['type'];
    
    
    if($user_type=="Employee")
    {
    $user_code=$_REQUEST['emp_code'];
    
    $user_name=$_REQUEST['emp_name'];
    
    $user_contact=$_REQUEST['emp_contact'];
    $user_alt_contact=$_REQUEST['emp_alt_contact'];
    $user_mail=$_REQUEST['emp_mail'];
    $user_address="";
    



    $user_sql=db_query("$sql_con tbl_parcel_user set
    user_code='$user_code',
    user_name='$user_name',
    user_contact='$user_contact',
    user_alt_contact='$user_alt_contact',
    user_email='$user_mail',
    user_address='$user_address',
    type='$type',
    user_type='$user_type' $sql_where_con ");
    
    if($user_sql)
        {
              if($edit_id!="")
              {
        echo "<script>alert('User updated successfully !');
        window.location.href='manage-user.php?user_edit_id=$edit_id'&type=$_REQUEST[type];</script>";   }
        else
        {echo "<script>alert('User added successfully !');
        window.location.href='manage-user.php?type=$_REQUEST[type]';
        </script>";}
        
        }
    
   
    }
    
    if($user_type=="Branch")
    {
    $branch_code=$_REQUEST['branch_code'];
        
    $branch_name=$_REQUEST['branch_name'];
    
    $branch_contact=$_REQUEST['branch_contact'];
    $branch_alt_contact=$_REQUEST['branch_alt_contact'];
    $branch_mail=$_REQUEST['branch_mail'];
    $branch_address=$_REQUEST['branch_address'];
    



    $branch_sql=db_query("$sql_con tbl_parcel_user set
    user_code='$branch_code',
    user_name='$branch_name',
    user_contact='$branch_contact',
    user_alt_contact='$branch_alt_contact',
    user_email='$branch_mail',
    user_address='$branch_address',
    type='$type',
    user_type='$user_type' $sql_where_con ");
    
    if($branch_sql)
        {
              if($edit_id!="")
              {
        echo "<script>alert('Branch updated successfully !');
        </script>";   }
        else
        {echo "<script>alert('Branch added successfully !');
    
        </script>";}
        
        }
        
        
    
    }
  
  
    
    
    
}

?>



<?php

$edit_sql=db_query("select * from tbl_parcel_user where user_id='$edit_id' and type='$_REQUEST[type]' ");
$edit_res=mysql_fetch_array($edit_sql);



?>
        	<form id="zone_form" name="form1" method="post" action="">
        	    <h3 style="color:red; font-weight:bold; text-align:center;"><?=$msg?></h3>
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">
        	    <tr>
<td style="width:20%;"><!--<p class="b blue p6px ml20px">Type * </p>--></td> 

<td style="width:80%;">
<input type="hidden" name="type" id="type" value="<?=$_REQUEST['type']?>">
 <!--   <p class="p5px ml10px">
<input type="hidden" name="type" id="type" value="<?=$_REQUEST['type']?>">
<input type="radio" name="type" id="type" value="Client" checked <?php if($edit_res['type']=="Client"){?>checked<?}?>> Client 
<input type="radio" name="type" id="type" value="Forwarder" <?php if($edit_res['type']=="Forwarder"){?>checked<?}?>> Forwarder  
</p>
-->
</td>

</tr>

<tr>
<td style="width:20%;"><p class="b blue p6px ml20px">Select User Type * </p></td> 

<td style="width:80%;"><p class="p5px ml10px">

<input type="radio" name="user_type" id="user_type" onclick="changeUser();" checked <?php if($edit_res['user_type']=="Employee"){?>checked<?}?> value="Employee"> Employee 
<input type="radio" name="user_type" id="user_type" onclick="changeUser();" <?php if($edit_res['user_type']=="Branch"){?>checked<?}?> value="Branch"> Branch 
</p></td>




</tr>

<tr>
    <td colspan="2">
        <!-----------------------------------------User details form START ------------------------------------->
<table id="user_employee" style="display:<?php if($edit_res['user_type']=='Branch'){?>none<?}else{?>inline<?}?>; width:50%;">
<tr>
    <td>   

<tr>
<td width="220"><p class="b ml20px blue p5px">Employee Code * </p></td> 
<td width="250">
    <p class="p5px ml10px" >
<input type="text" name="emp_code"  id="emp_code" <?php if($edit_id!=""){?>readonly<?}?> style="height:23px; width:180px;"  value="<?=$edit_res['user_code'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Employee Name * </p></td> 
<td width="250">
    <p class="p5px ml10px" >
<input type="text" name="emp_name" id="emp_name"  style="height:23px; width:180px;"  value="<?=$edit_res['user_name'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Employee Contact * </p></td> 
<td width="250">
    <p class="p5px ml10px">
<input type="text" name="emp_contact" id="emp_contact" maxlength="10" style="height:23px; width:180px;"  value="<?=$edit_res['user_contact'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Employee Alternate Contact </p></td> 
<td width="250">
    <p class="p5px ml10px">
<input type="text" name="emp_alt_contact" id="emp_alt_contact" maxlength="10" style="height:23px; width:180px;"  value="<?=$edit_res['user_alt_contact'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Employee Email * </p></td> 
<td width="250">
    <p class="p5px ml10px">
<input type="text" name="emp_mail" id="emp_mail"  style="height:23px; width:180px;"  value="<?=$edit_res['user_email'];?>"/>
</p>
</td>
</tr>


</td>
</tr>
</table>

<!----------------------------------------User details form END ---------------------------------------->

        <!-----------------------------------------Branch details form START ------------------------------------->

<script>
    $(function() {
    $("#branch_code").autocomplete({
        source: "manage-user-search.php",
        
    });
});
</script>

<table id="user_branch"  style="width:50%; display:<?php if($edit_res['user_type']=='Branch'){?>inline<?}else{?>none<?}?>;">
<tr>
    <td>   
<tr>
<td width="220"><p class="b ml20px blue p5px">Branch Code * </p></td> 
<td width="250">
    <p class="p5px ml10px" >
<input type="text" name="branch_code" id="branch_code" <?php if($edit_id!=""){?>readonly<?}?> style="height:23px; width:180px;"  value="<?=$edit_res['user_code'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Branch Name * </p></td> 
<td width="250">
    <p class="p5px ml10px" >
<input type="text" name="branch_name"  id="branch_name"  style="height:23px; width:180px;"  value="<?=$edit_res['user_name'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Contact Number * </p></td> 
<td width="250">
    <p class="p5px ml10px">
<input type="text" name="branch_contact" id="branch_contact" maxlength="10" style="height:23px; width:180px;"  value="<?=$edit_res['user_contact'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Alternate Contact Number </p></td> 
<td width="250">
    <p class="p5px ml10px">
<input type="text" name="branch_alt_contact" id="branch_alt_contact" maxlength="10" style="height:23px; width:180px;"  value="<?=$edit_res['user_alt_contact'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Branch Email * </p></td> 
<td width="250">
    <p class="p5px ml10px">
<input type="text" name="branch_mail" id="branch_mail"  style="height:23px; width:180px;"  value="<?=$edit_res['user_email'];?>"/>
</p>
</td>
</tr>

<tr>
<td width="220"><p class="b ml20px blue p5px">Branch Address * </p></td> 
<td width="250">
    <p class="p5px ml10px">
<textarea cols="30" rows="5" name="branch_address"  id="branch_address"><?=$edit_res['user_address'];?>
</textarea>
</p>
</td>
</tr>

</td>
</tr>
</table>
 <!-----------------------------------------Branch details form END ------------------------------------->
</td></tr>


<tr>
    <td colspan="3" align="center">
     
       <input type="submit" name="user_submit" id="user_submit"  style="padding:5px; font-weight:bold;">
  
    </td>
</tr>


</table>
</form>


<script>
    
   $(document).ready(function(){
       $('#emp_code').change(function(){
        var emp_code=$('#emp_code').val();
       
        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{user_code:emp_code, type:"USER_CODE"},
            success:function(data){
           
                if(data!=""){
                       var con_value="";
                    con_value=confirm(" Code is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="manage-user.php?user_edit_id="+data+"&type=<?=$_REQUEST['type']?>";
                    }else{
                    $('#user_submit').attr("disabled","disabled");
                    $('#user_submit').css({"cursor":"no-drop"});
                    } 
                    
                  /*  alert("Code is already exist !");
                    $('#user_submit').attr("disabled","disabled");
                    $('#user_submit').css({"cursor":"no-drop"});
                }else{
                    $('#user_submit').attr("disabled",false);
                    $('#user_submit').css({"cursor":"pointer"});*/
                }else if(data=="")
                {
                      $('#user_submit').attr("disabled",false);
                    $('#user_submit').css({"cursor":"pointer"});
                }
                
            }
        });
    });
   });
   
   
   
   
    $(document).ready(function(){
       $('#branch_code').change(function(){
        var branch_code=$('#branch_code').val();
       
        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{user_code:branch_code, type:"USER_CODE"},
            success:function(data){
           
                if(data!=""){
                    
                    
                     var con_value="";
                    con_value=confirm(" Code is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="manage-user.php?user_edit_id="+data+"&type=<?=$_REQUEST['type']?>";
                    }else{
                    $('#user_submit').attr("disabled","disabled");
                    $('#user_submit').css({"cursor":"no-drop"});
                    } 
                    
                    
                   /* alert("Code is already exist !");
                    $('#user_submit').attr("disabled","disabled");
                    $('#user_submit').css({"cursor":"no-drop"});
                }else{
                    $('#user_submit').attr("disabled",false);
                    $('#user_submit').css({"cursor":"pointer"});*/
                }else if(data=="")
                {
                      $('#user_submit').attr("disabled",false);
                    $('#user_submit').css({"cursor":"pointer"});
                }
            }
        });
    });
   });
</script>


<script>


function changeUser() {

  var x = document.getElementById("user_type");



if(x.checked)
{
document.getElementById("user_employee").style.display = "inline";
document.getElementById("user_branch").style.display = "none";




}
else
{
    //branch_code
document.getElementById("user_employee").style.display = "none";
document.getElementById("user_branch").style.display = "inline";


}

}




   $(document).ready(function(){
$("#user_submit").click(function(){
    var user_type = document.getElementById("user_type");
if(user_type.checked)
{

    var emp_code = $("#emp_code").val();
    var emp_name = $("#emp_name").val();
    
    var emp_contact = $("#emp_contact").val();
    var emp_alt_contact = $("#emp_alt_contact").val();
    var emp_mail = $("#emp_mail").val();
    
          if(emp_code==''){		
alert("Enter Employee Code !");
document.getElementById('emp_code').focus();
return false;
}
      if(emp_name==''){		
alert("Enter Name !");
document.getElementById('emp_name').focus();
return false;
}	
if (!emp_name.match(/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/)){
alert("Please enter only alphabets !");
document.getElementById('emp_name').value='';
document.getElementById('emp_name').focus();
return false;
}
   
   
   
var mobno=document.getElementById('emp_contact').value;
if(document.getElementById('emp_contact').value==0){
	alert("Enter your mobile no.!");
	document.getElementById('emp_contact').focus();
	return false;
}
if(isNaN(document.getElementById('emp_contact').value)){
	alert("Mobile no. should be numeric !");
	document.getElementById('emp_contact').focus();
	return false;
}
if(mobno.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('emp_contact').focus();
	return false;
}
 
 
 var mobno1=document.getElementById('emp_alt_contact').value;
 if(mobno1!=""){
 if(isNaN(document.getElementById('emp_alt_contact').value)){
	alert("Mobile no. should be numeric !");
	document.getElementById('emp_alt_contact').focus();
	return false;
}
if(mobno1.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('emp_alt_contact').focus();
	return false;
}
 }
   
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(emp_mail=='')
  {
	  alert('Enter Email Id');
	  document.getElementById('emp_mail').focus();
	  return false;
  }else if(!emp_mail.match(mailformat)){
alert("You have entered an invalid email address!");
document.getElementById('emp_mail').focus();
return false;
}
    
    
}
else
{
    var branch_code = $("#branch_code").val();
    var branch_name = $("#branch_name").val();
    
    var branch_contact = $("#branch_contact").val();
    var branch_alt_contact = $("#branch_alt_contact").val();
    var branch_mail = $("#branch_mail").val();
    var branch_address = $("#branch_address").val();
    
      if(branch_code==''){		
alert("Enter Branch Code !");
document.getElementById('branch_code').focus();
return false;
}	

    
      if(branch_name==''){		
alert("Enter Branch Name !");
document.getElementById('branch_name').focus();
return false;
}	

   
   
   
var mobno=document.getElementById('branch_contact').value;
if(document.getElementById('branch_contact').value==0){
	alert("Enter your contact no.!");
	document.getElementById('branch_contact').focus();
	return false;
}
if(isNaN(document.getElementById('branch_contact').value)){
	alert("Contact no. should be numeric !");
	document.getElementById('branch_contact').focus();
	return false;
}
if(mobno.length < 10){
    alert("Contact no. should be 10 digit long !");
	document.getElementById('branch_contact').focus();
	return false;
}
 
 
 var mobno1=document.getElementById('branch_alt_contact').value;
 if(mobno1!=""){
 if(isNaN(document.getElementById('branch_alt_contact').value)){
	alert("Contact no. should be numeric !");
	document.getElementById('branch_alt_contact').focus();
	return false;
}
if(mobno1.length < 10){
    alert("Contact no. should be 10 digit long !");
	document.getElementById('branch_alt_contact').focus();
	return false;
}
 }
   
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(branch_mail=='')
  {
alert('Enter Email Id');
	  document.getElementById('branch_mail').focus();
	  return false;
  }else if(!branch_mail.match(mailformat)){
alert("You have entered an invalid email address!");
document.getElementById('branch_mail').focus();
return false;
}


      if(branch_address==''){		
alert("Enter Branch Address !");
document.getElementById('branch_address').focus();
return false;
}

    
}




});
});
    
</script>

<!-----------------FORM END---------------------->

<br>
<p class="bdr0 m5px mr30px"></p>





<?php
$cond="";

if(isset($_REQUEST['submitForm']))
{
$search_value=$_REQUEST['search_user'];

if($search_value!="")
{
	$cond="and user_name='$search_value' ";
}

}

?>


<br><br>
<form method="post" action="" >
    <center>
<input type="text"  id="search_user" name="search_user" placeholder="Enter User/Branch Name" style="width:200px;"/>
<input type="submit" name="submitForm" value="Search">
</center>
</form>

<!--<a href="add-zone.php" class="btn btn-default pull-right mr15px font-black"><i class="fa fa-plus"></i> Add Zone</a>
<br><br>-->
<br><br>

	  
	  


</p>
<p class="bdr0 m5px mr30px"></p>


	


	
	



	
<form action="" method="post" enctype="multipart/form-data" >
	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
<td style="width:100px;"><p class="b p10px blue ac">User Code</p></td>
<td style="width:100px;"><p class="b p10px blue ac">Type</p></td>

<td style="width:100px;"><p class="b p10px blue ac">Name</p></td>

	<td style="width:9px;"><p class="b p10px blue ac">Contact</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Alt Contact</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Email</p></td>
		<td style="width:9px;"><p class="b p10px blue ac">User Type</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Address</p></td>
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
			db_query("update tbl_parcel_user set user_status='Active' where type='$_REQUEST[type]' and user_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_deactivate'])) {
			db_query("update tbl_parcel_user set user_status='Inactive' where type='$_REQUEST[type]' and user_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_delete'])) {
			db_query("delete from tbl_parcel_user where type='$_REQUEST[type]' and user_id in ($str_ids)");
		}



 $i = 0; 

$sql=db_query("select * from tbl_parcel_user where 1 and type='$_REQUEST[type]' $cond order by user_id");
while($res=mysql_fetch_array($sql))
{

	

?>
<tr>



<?php 
$st_clr="";
if($res['user_status']=="Active")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>
<style>
    .upr_case{
        text-transform:uppercase;
            
        
    }
</style>
		<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>

<td style="width:100px;"><p class=" p10px upr_case ac"><?=$res['user_code']?></p></td>
<td style="width:100px;"><p class=" p10px upr_case ac"><?=$res['type']?></p></td>
		
		<td style="width:100px;"><p class=" p10px upr_case ac"><?=$res['user_name']?></p></td>
		
		<td style="width:100px;"><p class=" p10px upr_case ac"><?=$res['user_contact']?></p></td>
		<td style="width:100px;"><p class=" p10px upr_case ac"><?=$res['user_alt_contact']?></p></td>
		<td style="width:100px;"><p class=" p10px upr_case ac"><?=$res['user_email']?></p></td>
		<td style="width:100px;"><p class=" p10px upr_case ac" style="font-weight:bold;"><?=$res['user_type']?></p></td>
		<td style="width:100px;"><p class=" p10px upr_case ac"><?=$res['user_address']?></p></td>
		<td style="width:100px;"><p class=" p10px upr_case ac" style="color:<?=$st_clr?>; font-weight:bold;"><?=$res['user_status']?></p></td>
		
	
		

	<td style="width:100px;"><p class=" p10px upr_case ac">
	<a href="manage-user.php?user_edit_id=<?=$res['user_id']?>&type=<?=$_REQUEST['type']?>" style="color:blue; font-weight:bold;">
	    Edit</a></p></td>
	        	<td style="width:100px;"><p class=" p10px upr_case ac">
	        	    <input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['user_id']?>"></p></td>
	        	

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

 
    <td colspan="12" align="right">
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