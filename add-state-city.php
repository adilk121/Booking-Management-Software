<?php require_once("includes/dbsmain.inc.php");  ?>
<?php include('header.php'); ?>



<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/popup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="date/jquery-ui.css">
<script src="date/jquery-1.9.1.js"></script>
<script src="date/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<style>
    .btn33{
        background-color:white;
        border-radius:6px;
        outline:none;
        padding-top:5px;
        padding-bottom:5px;
        padding-left:15px;
        padding-right:15px;
    }
    .btn33:hover{
        background-color:#00aeef;
    }
</style>

  <tr>
    
	
<td valign="top" width="17%" style="border-right: #2E005B solid 3px; height:505px;" >	
<?php include('left-menu.php'); ?>
</td>
	
<td valign="top" width="83%"><p class="b xlarge mt10px ml10px"><i class="fa fa-truck"></i> Add State & City 
<a href="manage-state-city-master.php" class="mr20px  fr " style="color:#0033CC;font-size:14px"><i class="fa fa-arrow-circle-left"></i> Go back</a>	</p>
<p class="bdr0 m5px mr30px"></p>


<?php
$msg="";
$edit_id=$_REQUEST['edit_id'];
$query="";
if(isset($_REQUEST['state_city_submit']))
{
$city=$_POST['select_city'];
$state_name=$_POST['select_state'];
$zone=$_POST['select_zone'];
 
$city_name=db_scalar("select city_name from all_cities where city_id='$city' ");
$zone_name=db_scalar("select zone_name from tbl_zone where zone_id='$zone' ");


 
    
    if($edit_id!=""){
      $query="update tbl_state_city_master set city_name='$city_name', state_name='$state_name', zone_name='$zone_name' where id='$edit_id' ";  
    }else{
      $query="insert into tbl_state_city_master set city_name='$city_name', state_name='$state_name', zone_name='$zone_name' ";  
    }
    
   
    
    $sql=db_query($query);
    if($sql)
    {
        if($edit_id!="")
        {echo "<script>alert('Details updated successfully !');
        </script>";   
        }
        else
        {echo "<script>alert('Details added successfully !');</script>";}
    }
    
    
    
}


$edit_data="";
if($edit_id!="")
{
 
$edit_sql=db_query("select * from tbl_state_city_master where 1 and city_status='Active' and id='$edit_id' "); 
$edit_data=mysql_fetch_array($edit_sql);

}

?>


        	<form id="zone_form" name="form1" method="post" action="">
        	    <h3 style="color:red; font-weight:bold; text-align:center;"><?=$msg?></h3>
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">

<tr>
<td width="20"><p class="b blue p6px ml20px">City * </p></td> 
<td width="250"><p class="p5px ml10px">
    
  <select class="p5px" name="select_city" id="select_city" style="width:180px;">
        <option value="">Select City</option>
          <?php
        $sql_city=db_query("select * from all_cities where 1 order by city_id");
        while($city_res=mysql_fetch_array($sql_city))
        {
       ?>
        <option value="<?=$city_res['city_id']?>" <?php if($edit_data['city_name']==$city_res['city_name']){?>selected<?}?>><?=$city_res['city_name']?></option>
    <?}?>
    </select>
    
<td width="900"  rowspan="3">
<p style="box-sizing: border-box; padding:10px;">
<input type="submit" name="state_city_submit" id="state_city_submit"  style="padding:5px; font-weight:bold;">
</p>
</td> 
</tr>
<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">State * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
        
<input type="text" readonly name="select_state" id="select_state" value="<?=$edit_data['state_name']?>" class="p5px" style="width:180px;">
    
    
    

</p>
</td>
</tr>
<tr>
    <td width="150" style="width:180px;"><p class="b ml20px blue p5px">Zone * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
  <select class="p5px" name="select_zone" id="select_zone" style="width:180px;">
        <option value="">Select Zone</option>
        <?php
        $sql_zone=db_query("select * from tbl_zone where 1 and zone_status='Active' order by zone_id");
        while($zone_res=mysql_fetch_array($sql_zone))
        {
       ?>
        <option value="<?=$zone_res['zone_id']?>" <?php if($edit_data['zone_name']==$zone_res['zone_name']){?>selected<?}?>><?=$zone_res['zone_name']?></option>
    <?}?>
    </select>
    </p>
</td>
    
</tr>




</table>
</form>
<br><br><br><br>




<script>
   $(document).ready(function(){
$("#state_city_submit").click(function(){
    
var city = $("#select_city").val();
//var state = $("#select_state").val();
var zone = $("#select_zone").val();



if(city==''){		
alert("Please Select City !");
document.getElementById('select_city').focus();
return false;
}

/*if(state==''){		
alert("Please Select State !");
document.getElementById('select_state').focus();
return false;
}
*/

if(zone==''){		
alert("Please Select Zone !");
document.getElementById('select_zone').focus();
return false;
}	


});
});
    
</script>



<script>
   $(document).ready(function(){
$("#select_city").change(function(){
var city_value = $("#select_city").val();

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
    
</script>



<?php include 'footer.php'; ?>


</body>
</html>