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
	
<td valign="top" width="83%"><p class="b xlarge mt10px ml10px"><i class="fa fa-truck"></i> Add Zone 
<a href="manage-zone-master.php" class="mr20px  fr " style="color:#0033CC;font-size:14px"><i class="fa fa-arrow-circle-left"></i> Go back</a>	</p>
<p class="bdr0 m5px mr30px"></p>


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
        window.location.href='add-zone.php';
        </script>";}
    }
    
    
    
}


$zone_edit_data="";
if($zone_edit_id!="")
{
 
$zone_edit_sql=db_query("select * from tbl_zone where 1 and zone_status='Active' and zone_id='$zone_edit_id' "); 
$zone_edit_data=mysql_fetch_array($zone_edit_sql);

}

?>


        	<form id="zone_form" name="form1" method="post" action="">
        	    <h3 style="color:red; font-weight:bold; text-align:center;"><?=$msg?></h3>
        	<table cellpadding="0" cellspac bing="0" width="99%"  class="bdrAll mt20px  ml10px">

<tr>
<td width="20"><p class="b blue p6px ml20px">Zone Code * </p></td> 
<td width="250"><p class="p5px ml10px">
<input type="text" name="zone_code" id="zone_code" value="<?=$zone_edit_data['zone_code']?>" style="height:23px; width:180px;" /></p></td>
<td width="900"  rowspan="3">
<p style="box-sizing: border-box; padding:10px;">
<input type="submit" name="zone_submit" id="zone_submit"  style="padding:5px; font-weight:bold;">
</p>
</td> 
</tr>
<tr>
<td width="150" style="width:180px;"><p class="b ml20px blue p5px">Zone Name * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
<input type="text" name="zone_name" id="zone_name" value="<?=$zone_edit_data['zone_name']?>" style="height:23px; width:180px;"  />
</p>
</td>
</tr>
<tr>
    <td width="150" style="width:180px;"><p class="b ml20px blue">Mode Of Transshipment * </p></td> 
<td style="width:190px;">
    <p class="p5px ml10px">
<input type="text" name="mode_of_transshipment" id="mode_of_transshipment" value="<?=$zone_edit_data['mode_of_transshipment']?>" style="height:23px; width:180px;"  />
</p>
</td>
    
</tr>




</table>
</form>
<br><br><br><br>

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



<?php include 'footer.php'; ?>


</body>
</html>