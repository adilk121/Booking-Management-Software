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



<p class=" xlarge mt10px ml10px"><span class="b " style="font-size:12px"><i class="fa fa-list"></i> Manage Zone &raquo; <span style="color:#999999">
    <p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="manage-zone-master.php" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>

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
$zone_edit_id=$_REQUEST['zone_edit_id'];
$zone_query="";
if(isset($_REQUEST['zone_submit']))
{

    $zone_code=$_POST['zone_code'];
    
    $zone_name=$_POST['zone_name'];
    $mode_of_transshipment=$_POST['mode_of_transshipment'];
    
    
    if($zone_edit_id!=""){
      $zone_query="update tbl_zone set zone_code='$zone_code', zone_name='$zone_name' , mode_of_transshipment='$mode_of_transshipment' where zone_id='$zone_edit_id' ";  
    }else{
      $zone_query="insert into tbl_zone set zone_code='$zone_code', zone_name='$zone_name', mode_of_transshipment='$mode_of_transshipment' ";  
    }
    
   
    
    $zone_sql=db_query($zone_query);
    if($zone_sql)
    {
        if($zone_edit_id!="")
        {echo "<script>alert('Zone updated successfully !');
        </script>";   
        }
        else
        {echo "<script>alert('Zone added successfully !');
    
        </script>";}
    }
    
    
    
}


$zone_edit_data="";
if($zone_edit_id!="")
{
 
$zone_edit_sql=db_query("select * from tbl_zone where 1  and zone_id='$zone_edit_id' "); 
$zone_edit_data=mysql_fetch_array($zone_edit_sql);

}

?>


        	<form id="zone_form" name="form1" method="post" action="">
        	    <h3 style="color:red; font-weight:bold; text-align:center;"><?=$msg?></h3>
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">

<tr>
<td width="20"><p class="b blue p6px ml20px">Zone Code * </p></td> 
<td width="250"><p class="p5px ml10px">
<input type="text" name="zone_code" id="zone_code" value="<?=$zone_edit_data['zone_code']?>" style="height:23px; width:180px; text-transform: uppercase;" /></p></td>
 
</tr>
<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Zone Name * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
<input type="text" name="zone_name" id="zone_name" value="<?=$zone_edit_data['zone_name']?>" style="height:23px; width:180px; text-transform: uppercase;"  />
</p>
</td>
</tr>
<tr>
    <td width="150" style="width:180px;"><p class="b ml20px blue">Mode Of Transshipment * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
        <select style="height:23px; width:180px;" name="mode_of_transshipment" id="mode_of_transshipment">
            <option value="">Select Transshipment Mode</option>
            <option value="AIR" <?php if($zone_edit_data['mode_of_transshipment']=="AIR"){?>selected<?}?>>AIR</option>
            <option value="SURFACE" <?php if($zone_edit_data['mode_of_transshipment']=="SURFACE"){?>selected<?}?>>SURFACE</option>
            <option value="CARGO" <?php if($zone_edit_data['mode_of_transshipment']=="CARGO"){?>selected<?}?>>CARGO</option>
            <option value="TRAIN" <?php if($zone_edit_data['mode_of_transshipment']=="TRAIN"){?>selected<?}?>>TRAIN</option>
            <option value="OTHER" <?php if($zone_edit_data['mode_of_transshipment']=="OTHER"){?>selected<?}?>>OTHER</option>
   </select>
<!--<input type="text" name="mode_of_transshipment" id="mode_of_transshipment" value="<?=$zone_edit_data['mode_of_transshipment']?>" style="height:23px; width:180px;"  />
--></p>
</td>
    
    
    <td width="700"  style="border-top:none;">
<p style="box-sizing: border-box; padding:10px;">
<input type="submit" name="zone_submit" id="zone_submit"  style="padding:5px; font-weight:bold;">
</p>
</td>

</tr>




</table>
</form>
<script>
    $(document).ready(function(){
       
    
       $('#zone_code').change(function(){
        var zone_code=$('#zone_code').val();
     

        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{zone_code:zone_code, type:"ZONE"},
            success:function(data){
           
                if(data!=""){
                    
                      var con_value="";
                    con_value=confirm(" Zone Code is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="manage-zone-master.php?zone_edit_id="+data;
                    }else{
                    $('#zone_submit').attr("disabled","disabled");
                    $('#zone_submit').css({"cursor":"no-drop"});
                    }
                    
                    
                   /* alert("Zone Code is already exist !");
                    $('#zone_submit').attr("disabled","disabled");
                    $('#zone_submit').css({"cursor":"no-drop"});
                     document.getElementById('zone_code').focus();
                }else{
                    $('#zone_submit').attr("disabled",false);
                    $('#zone_submit').css({"cursor":"pointer"});*/
                }else if(data==""){
                    $('#zone_submit').attr("disabled",false);
                    $('#zone_submit').css({"cursor":"pointer"});
                    }
            }
        });
    });
    });
</script>

<script>



   $(document).ready(function(){
$("#zone_submit").click(function(){
    
var zone_code = $("#zone_code").val();
var zone_name = $("#zone_name").val();
var mode_of_transshipment = $("#mode_of_transshipment").val();




if(zone_code==''){		
alert("Enter Zone Code !");
document.getElementById('zone_code').focus();
return false;
}	

if(zone_name==''){		
alert("Enter Zone Name !");
document.getElementById('zone_name').focus();
return false;
}

if(mode_of_transshipment==''){		
alert("Enter Mode Of Transshipment !");
document.getElementById('mode_of_transshipment').focus();
return false;
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
$search_value=$_REQUEST['search_zone'];

if($search_value!="")
{
	$cond="and zone_code='$search_value' ";
}

}

?>

<br><br>
<form method="post" action="" >
    <center>
<input type="text"  id="search_zone" name="search_zone" placeholder="Enter Zone Code" style="text-transform: uppercase;"/>
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
<td style="width:100px;"><p class="b p10px blue ac">Zone Code</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Zone Name</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Mode Of Transshipment</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Zone Status</p></td>


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
			db_query("update tbl_zone set zone_status='Active' where zone_id in ($str_ids)");
			db_query("update tbl_state_city_master set city_status='Active' where zone_id in ($str_ids)");
			
		} else if(isset($_REQUEST['checkbox_deactivate'])) {
			db_query("update tbl_zone set zone_status='Inactive' where zone_id in ($str_ids)");
			db_query("update  tbl_state_city_master set city_status='Inactive' where zone_id in ($str_ids)");
			
		} else if(isset($_REQUEST['checkbox_delete'])) {
			db_query("delete from tbl_zone where zone_id in ($str_ids)");
			db_query("delete from tbl_state_city_master where zone_id in ($str_ids)");
			
		}


$zone_id=$_REQUEST['zone_delete_id'];
if($zone_id!="")
{
db_query("delete from tbl_zone where zone_id='$zone_id' ");
}

 $i = 0; 

$sql=db_query("select * from tbl_zone where 1 $cond order by zone_id");


while($res=mysql_fetch_array($sql))
{

	

?>
<tr>





		<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
<?php 
$st_clr="";
if($res['zone_status']=="Active")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>


		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase;"><?=$res['zone_code']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase;"><?=$res['zone_name']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase;"><?=$res['mode_of_transshipment']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase; font-weight:bold; color:<?=$st_clr?>"><?=$res['zone_status']?></p></td>
		
	<td style="width:100px;"><p class=" p10px  ac">
	<a href="manage-zone-master.php?zone_edit_id=<?=$res['zone_id']?>" style="color:blue; font-weight:bold; text-transform: uppercase;">
	    Edit</a></p></td>
	        	<td style="width:100px;"><p class=" p10px  ac">
	        	    <input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['zone_id']?>"></p></td>
	        	

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

 
    <td colspan="7" align="right">
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