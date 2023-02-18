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

<p class=" xlarge mt10px ml10px"><span class="b " style="font-size:12px"><i class="fa fa-list"></i> Manage City &raquo; <span style="color:#999999">
<p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="manage-city-master.php" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>

    <script>
$(function() {
    $("#city_code").autocomplete({
        source: "manage-city-autocomplete.php",
        
    });
});
</script>

   <p class="bdr0 m5px mr30px"></p>
    
    
    <!-----------------FORM START---------------------->


<?php
$msg="";
$edit_id=$_REQUEST['edit_id'];
$query="";
if(isset($_REQUEST['city_submit']))
{
$city_name=$_POST['city_name'];
$city_code=$_POST['city_code'];
$state_id=$_POST['select_state'];
$zone_id=$_POST['select_zone'];
 
/*$city_name=db_scalar("select city_name from all_cities where city_id='$city' ");
$zone_name=db_scalar("select zone_name from tbl_zone where zone_id='$zone' ");
*/

 
    
    if($edit_id!=""){
      $query="update tbl_city_master set city_code='$city_code', city_name='$city_name', state_id='$state_id', zone_id='$zone_id'  where city_id='$edit_id' ";  
    }else{
      $query="insert into tbl_city_master set city_code='$city_code', city_name='$city_name', state_id='$state_id', zone_id='$zone_id' ";  
    }
    
   
    
    $sql=db_query($query);
    if($sql)
    {
        if($edit_id!="")
        {echo "<script>alert('City updated successfully !');
        </script>";   
        }
        else
        {echo "<script>alert('City added successfully !');</script>";}
    }
    
    
    
}


$edit_data="";
if($edit_id!="")
{
$edit_sql=db_query("select * from tbl_city_master where 1 and city_id='$edit_id' "); 
$edit_data=mysql_fetch_array($edit_sql);
}

?>


        	<form id="zone_form" name="form1" method="post" action="">
        	    <h3 style="color:red; font-weight:bold; text-align:center;"><?=$msg?></h3>
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">



<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">City Code * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
        
<input type="text" name="city_code" id="city_code" value="<?=$edit_data['city_code']?>" class="p5px" style="width:180px; text-transform:uppercase;">
</p>
</td>



</tr>

<tr>
    <td width="150" style="width:180px;">
        <p class="b ml20px blue p5px">City Name* </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
        <input type="text" style="width:180px; text-transform:uppercase;" value="<?=$edit_data['city_name']?>" name="city_name" id="city_name" class="p5px">

    
    </p>
</td>

<td width="900"  style="border-top:none;">
<p style="box-sizing: border-box; padding:10px;">
<input type="submit" name="city_submit" id="city_submit"  style="padding:5px; font-weight:bold;">
</p>
</td>

    
</tr>



<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">State * </p></td> 
<td style="width:190px;">
<!--    <p class="p5px ml10px">
        
<input type="text" name="state_name" id="state_name" value="<?=$edit_data['state_name']?>" class="p5px" style="width:180px; text-transform:uppercase;">
    
    
    

</p>-->

    <p class="p5px ml10px" id="show_state">
    

  <select class="p5px" name="select_state" id="select_state" style="width:180px;" onchange="get_zone_by_state(this.value);">
        <option value="">Select State</option>
        <?php
        $sql_state=db_query("select * from tbl_state_master where 1 and state_status='Active' order by state_id");
        while($state_res=mysql_fetch_array($sql_state))
        {
       ?>
        <option style="text-transform:uppercase;" value="<?=$state_res['state_id']?>" <?php if($edit_data['state_id']==$state_res['state_id']){?>selected<?}?>><?=$state_res['state_name']?></option>
    <?}?>
    </select>    </p>
    
</td>
</tr>



<tr>
<td width="20"><p class="b blue p6px ml20px">Zone * </p></td> 
<td width="250">
    
    <p class="p5px ml10px" id="show_zone">
    

  <select class="p5px" name="select_zone" id="select_zone" style="width:180px;" <?/*onchange="selectCountryShip(this.value);"*/?>>
        <option value="">Select Zone</option>
        <?php
        $sql_zone=db_query("select * from tbl_zone where 1 and zone_status='Active' order by zone_id");
        while($zone_res=mysql_fetch_array($sql_zone))
        {
       ?>
        <option style="text-transform:uppercase;" value="<?=$zone_res['zone_id']?>" <?php if($edit_data['zone_id']==$zone_res['zone_id']){?>selected<?}?>><?=$zone_res['zone_name']?></option>
    <?}?>
    </select>    </p>
 
</tr>



</table>
</form>

<script>
    function get_zone_by_state(s_id)
    {
            $.ajax({
type: "POST",
url: "fetch_zone_in_manage_city_section.php",
data: {s_id:s_id},
cache: false,
success: function(result){

document.getElementById('show_zone').innerHTML=result;

}
});
    }
</script>

<?/*
<script>
    function selectCountryShip(zone_id)
{


    $.ajax({
type: "POST",
url: "ajax_state.php",
data: {zone_id:zone_id},
cache: false,
success: function(result){

document.getElementById('show_state').innerHTML=result;

}
});
}
    
</script>
*/?>


<script>
   $(document).ready(function(){
$("#city_submit").click(function(){
    
var select_zone = $("#select_zone").val();
var select_state = $("#select_state").val();
var city_code = $("#city_code").val();
var city_name = $("#city_name").val();


if(city_code==''){		
alert("Please Enter City Code !");
document.getElementById('city_code').focus();
return false;
}	

if(city_name==''){		
alert("Please Enter City Name !");
document.getElementById('city_name').focus();
return false;
}

if(select_state==''){		
alert("Please Select State !");
document.getElementById('select_state').focus();
return false;
}

if(select_zone==''){		
alert("Please Select Zone !");
document.getElementById('select_zone').focus();
return false;
}






});
});
    
</script>

<script>
    $(document).ready(function(){
 $('#city_code').change(function(){
        var city_code=$('#city_code').val();
     

        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{city_code:city_code, type:"CITY"},
            success:function(data){
           
                if(data!=""){
                     var con_value="";
                    con_value=confirm(" City Code is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="manage-city-master.php?edit_id="+data;
                    }else{
                    $('#city_submit').attr("disabled","disabled");
                    $('#city_submit').css({"cursor":"no-drop"});
                    }
                    
                /*    alert("City Code is already exist !");
                    $('#city_submit').attr("disabled","disabled");
                    $('#city_submit').css({"cursor":"no-drop"});
                    document.getElementById('city_code').focus();
                }else{
                    $('#city_submit').attr("disabled",false);
                    $('#city_submit').css({"cursor":"pointer"});*/
                }else if(data==""){
                    $('#city_submit').attr("disabled",false);
                    $('#city_submit').css({"cursor":"pointer"});
                    }
            }
        });
    });
    });
</script>

<script>
  /* $(document).ready(function(){
$("#city_name").change(function(){
var city_value = $("#city_name").val();

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "select-city-ajax.php",
data: {city_id:city_value},
cache: false,
success: function(result){
  //  alert(result);
   $('#select_state').val(result);

}
});

});

});
  */  
</script>
<br>
<!-----------------FORM END---------------------->



<p class="bdr0 m5px mr30px"></p>



<?php
$cond="";

if(isset($_REQUEST['submitForm']))
{
$search_value=$_REQUEST['search_city'];

if($search_value!="")
{
	$cond="and city_name='$search_value' ";
}

}

?>
<br>

<form method="post" action="">
    <center>
<input type="text"  id="search_city" name="search_city" placeholder="Enter City Name" style="text-transform:uppercase;"/>
<input type="submit" name="submitForm" value="Search">
</center>
</form>
<br>
<!--<a href="add-state-city.php" class="btn btn-default pull-right mr15px font-black"><i class="fa fa-plus"></i> Add State & City</a>
<br>
<br>-->

	  
	  


</p>
<p class="bdr0 m5px mr30px"></p>


	


	
	



	
<form action="" method="post" enctype="multipart/form-data" >
	<table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" class="mt10px bdrAll">
	<tr class="bg6">
	<td width="3%" align="center"><p class="b p10px blue ac">S.N.</p></td>
<td style="width:100px;"><p class="b p10px blue ac">City Code</p></td>

<td style="width:100px;"><p class="b p10px blue ac">City Name</p></td>

	<td style="width:9px;"><p class="b p10px blue ac">State Name</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Zone Name</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">City Status</p></td>


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
			db_query("update tbl_city_master set city_status='Active' where city_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_deactivate'])) {
			db_query("update tbl_city_master set city_status='Inactive' where city_id in ($str_ids)");
		} else if(isset($_REQUEST['checkbox_delete'])) {
			db_query("delete from tbl_city_master where city_id in ($str_ids)");
		}




 $i = 0; 

$sql=db_query("select * from tbl_city_master where 1 $cond order by city_id ");


while($res=mysql_fetch_array($sql))
{

	

?>
<tr>





		<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
<?php 
$st_clr="";
if($res['city_status']=="Active")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>

<td style="width:100px;"><p class=" p10px  ac" style=" text-transform:uppercase;"><?=$res['city_code']?></p></td>
		
		<td style="width:100px;"><p class=" p10px  ac" style=" text-transform:uppercase;"><?=$res['city_name']?></p></td>
		
		<td style="width:100px;"><p class=" p10px  ac" style=" text-transform:uppercase;"><?=db_scalar("select state_name from tbl_state_master where 1 and state_id='$res[state_id]'")?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style=" text-transform:uppercase;"><?=db_scalar("select zone_name from tbl_zone where 1 and zone_id='$res[zone_id]'")?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="font-weight:bold; text-transform:uppercase; color:<?=$st_clr?>"><?=$res['city_status']?></p></td>
		
	<td style="width:100px;"><p class=" p10px  ac">
	<a href="manage-city-master.php?edit_id=<?=$res['city_id']?>" style="color:blue; font-weight:bold; text-transform:uppercase;">
	    Edit</a></p></td>
	        	<td style="width:100px;"><p class=" p10px  ac">
	        	    <input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['city_id']?>"></p></td>
	        	

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