<?php include 'header.php'; ?>
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
<script>
  $(function() {
    $( "#datepicker1" ).datepicker();
	$( "#datepicker2" ).datepicker();
  });
  </script>

<script type="text/javascript" language="javascript" src="aj.js"></script>

<script>
function fill_val(ename,id,field,divName,ecode,dept,desination,sal){
//alert(desination);
document.getElementById(field).value=ename;	
document.getElementById("offer_to_emp_h").value=id;	
document.getElementById(divName).style.display='none';
}


function auto_sugg_emp(val,field,divName){
var v=document.getElementById(field).value;	
suggest_emp(v,field,divName);	
}
</script>

<tr>
	

<?php

if(!empty($_REQUEST['offer'])){
echo $sql="select * from tbl_offer where 1 and offer_id='$_REQUEST[offer]'";
$rec_offer=mysql_fetch_array(db_query($sql));
}


if(isset($_REQUEST['update'])){

$offer_to_emp_id="";
$offer_to_person="";

if($_REQUEST['offer_to']=='dept'){
$offer_to_person=$_REQUEST['offer_to_dpt'];
$offer_type="dept";
}else if($_REQUEST['offer_to']=='emp'){
$offer_to_person=$_REQUEST['offer_to_emp'];
$offer_type="emp";
}

if(empty($offer_to_emp_h)){
$offer_to_emp_id=$offer_to_emp_h2;
}else{
$offer_to_emp_id=$offer_to_emp_h;
}

$offer_date=date("Y-m-d",strtotime($offer_date));

     $sql="update tbl_offer set  offer_to='$offer_to_person',
								 offer_to_id='$offer_to_emp_id',
								 offer_date='$offer_date',
								 offer_type='$offer_type',
								 offer_desc='$offer_desc'
       						     where offer_id='$_REQUEST[offer]'
								 ";
								 
								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-offers.php");
exit;
}

}



if(isset($_REQUEST['submit'])){


$offer_to_person="";

if($_REQUEST['offer_to']=='dept'){
$offer_to_person=$_REQUEST['offer_to_dpt'];
$offer_type="dept";
}else if($_REQUEST['offer_to']=='emp'){
$offer_to_person=$_REQUEST['offer_to_emp'];
$offer_type="emp";
}

if(empty($offer_to_emp_h)){
$offer_to_emp_id=$offer_to_emp_h2;
}else{
$offer_to_emp_id=$offer_to_emp_h;
}

$offer_date=date("Y-m-d",strtotime($offer_date));

$sql="insert into tbl_offer set offer_to='$offer_to_person',
                                 offer_title='$offer_title',
								 offer_to_id='$offer_to_emp_id',
								 offer_type='$offer_type',								 
								 offer_date='$offer_date',
								 offer_desc='$offer_desc'
								
								 ";
								
								 
								
								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-offers.php");
exit;
}

}

?>
<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
<?php include 'left-menu.php'; ?>
</td>

<td valign="top" width="83%">
<p class="b xlarge mt10px ml10px">Offers
<span class="fr mr10px b blue u" style="font-size:12px;"><a href="manage-offers.php">Go Back</a></span>
</p>
<p class="bdr0 ml10px  m5px mr30px"></p>

<form action="" method="post" enctype="multipart/form-data">

<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center" class="mt20px bdrAll">
<tr>
<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Offer Detail</p></td>

</tr>




<tr>
<td width="27%"><p class="p5px  ml10px b">To</p></td>

<td width="71%"><p class="p5px ml10px">


<input type="radio" required name="offer_to" onclick="notcheck();" id="offer_to" <?php if(empty($rec_offer['offer_to_id'])){?> checked="checked" <?php }?> value="dept" />
<select name="offer_to_dpt" required id="offer_to_dpt"  title="Choose employee department" style="padding:4px; width:124px;"  >

<option <?php if($rec_offer['offer_to']=='Marketing'){?> selected="selected" <?php }?>>Marketing</option>
<option <?php if($rec_offer['offer_to']=='Back Office'){?> selected="selected" <?php }?> >Back Office</option>
<option <?php if($rec_offer['offer_to']=='HR'){?> selected="selected" <?php }?> value="HR">H.R.</option>
<option <?php if($rec_offer['offer_to']=='Accounts'){?> selected="selected" <?php }?> >Accounts</option>
</select>

<input type="radio" required name="offer_to" onclick="check();" id="offer_to" <?php if(!empty($rec_offer['offer_to_id'])){?> checked="checked" <?php }?> value="emp" />

<input type="text" name="offer_to_emp" id="offer_to_emp" style="height:20px; width:120px;text-align:center;" placeholder="Type a name"  autocomplete="off" onkeyup="auto_sugg_emp(this.value,'offer_to_emp','myDiv1');" 
value="<?php if(!empty($rec_offer['offer_to_id'])){echo $rec_offer['offer_to'];}?>" />

<div id="myDiv1" style="display:none;background-color:#FFFFFF;margin-left:8px;margin-top:0px;padding-top:0px;vertical-align:baseline;width:290px;height:70px;overflow:scroll;font-size:12px;color:#0000CC;font-weight:bold;" >
</div>

<input type="hidden" name="offer_to_emp_h" id="offer_to_emp_h" value="" />

<input type="hidden" name="offer_to_emp_h2" id="offer_to_emp_h2" value="<?=$rec_offer['offer_to_id']?>" />




</p></td>

</tr>


<tr>
<td width="27%"><p class="p5px  ml10px b"> Date</p></td>
<td width="71%"><p class="p5px ml35px"><input type="text" required name="offer_date" id="datepicker1" autocomplete="off" style="height:25px; width:220px;" value="<?=$rec_offer['offer_date']?>"  /></p></td>
</tr>


<tr>
<td width="27%"><p class="p5px  ml10px b"> Title</p></td>
<td width="71%"><p class="p5px ml35px"><input type="text" required name="offer_title" id="offer_title" style="height:25px; width:220px;" value="<?=$rec_offer['offer_title']?>"  /></p></td>
</tr>



<tr>
<td width="36%"><p class="p5px ml10px b">Message</p></td>
<td width="62%"><p class="p5px  ml35px">
<textarea class="ckeditor" name="offer_desc" id="offer_desc" required rows="5" cols="40"><?=$rec_offer['offer_desc']?></textarea></p></td>
</tr>


<tr>
<td colspan="3"><p class="ac p5px"><span class="ml10px">

<?php if(!empty($_REQUEST['offer'])){ ?>
<input type="submit" name="update" value="Update" class="btn33" />
<?php }else{?>
<input type="submit" name="submit" value="Submit" class="btn33" />
<?php }?>
</span>
<span class="ml10px"><input type="reset" name="reset" value="Reset" class="btn33" /></span>
</p></td>
</tr>
</table>

</form>

<p>&nbsp;</p>



</td>
</tr>
</table>

<script>
    function check(){
        document.getElementById("offer_to_emp").setAttribute("required", "required");
    }
      function notcheck(){
        document.getElementById("offer_to_emp").removeAttribute("required");
    }
</script>

<?php include 'footer.php'; ?>
</body>
</html>
