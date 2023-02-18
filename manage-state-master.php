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



<p class=" xlarge mt10px ml10px"><span class="b " style="font-size:12px"><i class="fa fa-list"></i> Manage State &raquo; <span style="color:#999999">
    <p style="text-align:right; margin-top:-20px; margin-right:10px; "><a href="manage-state-master.php" style="color:#284c93; font-weight:bold;"><i class="fa fa-refresh"></i> Refresh</a></p>

    <p class="bdr0 m5px mr30px"></p>
    <script>
$(function() {
    $("#state_code").autocomplete({
        source: "manage-state-autocomplete.php",
        
    });
});
</script>
    
    <!-----------------FORM START---------------------->

<?php
$msg="";
$state_edit_id=$_REQUEST['state_edit_id'];
$state_query="";
if(isset($_REQUEST['state_submit']))
{

    $state_code=$_POST['state_code'];
    
    $state_name=$_POST['state_name'];
    $zone_id=$_POST['zone_id'];
    
    
    if($state_edit_id!=""){
      $state_query="update tbl_state_master set state_code='$state_code', state_name='$state_name' , zone_id='$zone_id' where state_id='$state_edit_id' ";  
    }else{
      $state_query="insert into tbl_state_master set state_code='$state_code', state_name='$state_name', zone_id='$zone_id' ";  
    }
    
   
    
    $state_sql=db_query($state_query);
    if($state_sql)
    {
        if($state_edit_id!="")
        {echo "<script>alert('State updated successfully !');
        </script>";   
        }
        else
        {echo "<script>alert('State added successfully !');
    
        </script>";}
    }
    
    
    
}


$state_edit_data="";
if($state_edit_id!="")
{
 
$state_edit_sql=db_query("select * from tbl_state_master where 1  and state_id='$state_edit_id' "); 
$state_edit_data=mysql_fetch_array($state_edit_sql);

}

?>


        	<form id="zone_form" name="form1" method="post" action="">
        	    <h3 style="color:red; font-weight:bold; text-align:center;"><?=$msg?></h3>
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">

<tr>
<td width="20"><p class="b blue p6px ml20px">State Code * </p></td> 
<td width="250"><p class="p5px ml10px">
<input type="text" name="state_code" id="state_code" value="<?=$state_edit_data['state_code']?>" style="height:23px; width:180px; text-transform: uppercase;" />
</p>
</td>

</tr>
<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">State Name * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
<input type="text" name="state_name" id="state_name" value="<?=$state_edit_data['state_name']?>" style="height:23px; width:180px; text-transform: uppercase;"  />
</p>
</td>
</tr>
<tr>
    <td width="150" style="width:180px;"><p class="b ml20px blue p5px">Zone Name / Code* </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
        <select style="height:23px; width:180px;" name="zone_id" id="zone_id">
            <option value="">Select Zone</option>
            <?php
            $zone_sql=db_query("select * from tbl_zone where 1 and zone_status='Active'");
            while($zone_res=mysql_fetch_array($zone_sql))
            {
            ?>
           <option value="<?=$zone_res['zone_id']?>" style="text-transform:uppercase;" <?php if($state_edit_data['zone_id']==$zone_res['zone_id']){?> selected <?}?> ><?=$zone_res['zone_name']?> / <?=$zone_res['zone_code']?></option>
           <?}?>
   </select>
</p>
</td>

<td width="900"  style="border-top:none;">
<p style="box-sizing: border-box; padding:10px;">
<input type="submit" name="state_submit" id="state_submit"  style="padding:5px; font-weight:bold;">
</p>
</td> 

    
</tr>




</table>
</form>
<script>
    $(document).ready(function(){
       
    
       $('#state_code').change(function(){
        var state_code=$('#state_code').val();
     

        $.ajax({
            url:"check_duplicate.php",
            type:"POST",
            data:{state_code:state_code, type:"STATE"},
            success:function(data){
           
                if(data!=""){
                    
                    var con_value="";
                    con_value=confirm(" State Code is already exist !\n Would you like to modify ?");
                    
                    if(con_value==true)
                    {
                        
                        window.location.href="manage-state-master.php?state_edit_id="+data;
                    }else{
                    $('#state_submit').attr("disabled","disabled");
                    $('#state_submit').css({"cursor":"no-drop"});
                    }
                    
                 /*   alert("State Code is already exist !");
                    $('#state_submit').attr("disabled","disabled");
                    $('#state_submit').css({"cursor":"no-drop"});
                     document.getElementById('state_code').focus();
                }else{
                    $('#state_submit').attr("disabled",false);
                    $('#state_submit').css({"cursor":"pointer"});*/
                }else if(data==""){
                    $('#state_submit').attr("disabled",false);
                    $('#state_submit').css({"cursor":"pointer"});
                    }
            }
        });
    });
    });
</script>

<script>



   $(document).ready(function(){
$("#state_submit").click(function(){
    
var state_code = $("#state_code").val();
var state_name = $("#state_name").val();
var zone_id = $("#zone_id").val();




if(state_code==''){		
alert("Enter State Code !");
document.getElementById('state_code').focus();
return false;
}	

if(state_name==''){		
alert("Enter State Name !");
document.getElementById('state_name').focus();
return false;
}

if(zone_id==''){		
alert("Select Zone !");
document.getElementById('zone_id').focus();
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
$search_value=$_REQUEST['search_state'];

if($search_value!="")
{
	$cond="and state_code='$search_value' ";
}

}

?>

<br><br>
<form method="post" action="" >
    <center>
<input type="text"  id="search_state" name="search_state" placeholder="Enter State Code" style="text-transform: uppercase;"/>
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
<td style="width:100px;"><p class="b p10px blue ac">State Code</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">State Name</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">Zone Name</p></td>
	<td style="width:9px;"><p class="b p10px blue ac">State Status</p></td>


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
			db_query("update tbl_state_master set state_status='Active' where state_id in ($str_ids)");

		} else if(isset($_REQUEST['checkbox_deactivate'])) {
			db_query("update tbl_state_master set state_status='Inactive' where state_id in ($str_ids)");

		} else if(isset($_REQUEST['checkbox_delete'])) {
			db_query("delete from tbl_state_master where state_id in ($str_ids)");

		}


$state_id=$_REQUEST['state_delete_id'];
if($state_id!="")
{
db_query("delete from tbl_state_master where state_id='$state_id' ");
}

 $i = 0; 

$sql=db_query("select * from tbl_state_master where 1 $cond order by state_id");


while($res=mysql_fetch_array($sql))
{

	

?>
<tr>





		<td style="width:100px;"><p class=" p10px  ac"><?php echo ++$i;?> </p></td>
<?php 
$st_clr="";
if($res['state_status']=="Active")
{$st_clr="#4CAF50";}
else
{$st_clr="#f44336";}

?>


		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase;"><?=$res['state_code']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase;"><?=$res['state_name']?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase;"><?=db_scalar("select zone_name from tbl_zone where 1 and zone_id='$res[zone_id]'")?></p></td>
		<td style="width:100px;"><p class=" p10px  ac" style="text-transform: uppercase; font-weight:bold; color:<?=$st_clr?>"><?=$res['state_status']?></p></td>
		
	<td style="width:100px;"><p class=" p10px  ac">
	<a href="manage-state-master.php?state_edit_id=<?=$res['state_id']?>" style="color:blue; font-weight:bold; text-transform: uppercase;">
	    Edit</a></p></td>
	        	<td style="width:100px;"><p class=" p10px  ac">
	        	    <input type="checkbox" name="select_checkbox[]" id="select_checkbox[]" class="ck_all" value="<?=$res['state_id']?>"></p></td>
	        	

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