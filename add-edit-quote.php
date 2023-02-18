<?php include('header.php'); ?>



<link rel="stylesheet" href="date/jquery-ui.css">

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



<tr>
	

<?php

if(!empty($_REQUEST['quote'])){
$sql="select * from tbl_quote where 1 and quote_id='$_REQUEST[quote]'";
$rec_quote=mysql_fetch_array(db_query($sql));
}


if(isset($_REQUEST['update'])){

$quote_date=date("Y-m-d",strtotime($quote_date));

$sql="update tbl_quote set	quote_msg='$quote_msg',								 
						    quote_status='$quote_status'								
						    where quote_id='$_REQUEST[quote]'
						   ";
								 
								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-quotes.php");
exit;
}

}



if(isset($_REQUEST['submit'])){

$quote_date=date("Y-m-d",strtotime($quote_date));

$sql="insert into tbl_quote set	 quote_msg='$quote_msg',								 
								 quote_status='$quote_status'								
								 ";
								
								 
								
								 
$res=db_query($sql);								 

if($res>0){
header("location:manage-quotes.php");
exit;
}

}

?>



<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
<?php include 'left-menu.php'; ?>
</td>

<td valign="top" width="83%">
<p class="b xlarge mt10px ml10px">Quote
<span class="fr mr10px b blue u" style="font-size:12px;"><a href="manage-quotes.php">Go Back</a></span>
</p>
<p class="bdr0 ml10px  m5px mr30px"></p>

<form action="" method="post" enctype="multipart/form-data">

<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center" class="mt20px bdrAll">
<tr>
<td width="27%"  height="40px" colspan="2" align="center" style="background-color:#284c93;color:#FFFFFF;font-size:14px;"><p class="p5px  ml10px b">Quote Detail</p></td>

</tr>







<?php /*?><tr>
<td width="27%"><p class="p5px  ml10px b"> Date</p></td>
<td width="71%"><p class="p5px ml35px"><input type="text" name="quote_date" id="datepicker1" autocomplete="off" style="height:25px; width:220px;" value="<?=$rec_quote['quote_date']?>"  /></p></td>
</tr>
<?php */?>




<tr>
<td width="36%"><p class="p5px ml10px b">Quote</p></td>
<td width="62%"><p class="p5px  ml35px">
<textarea class="" required name="quote_msg" id="quote_msg" rows="5" cols="40"><?=$rec_quote['quote_msg']?></textarea></p></td>
</tr>

<tr>
<td width="27%"><p class="p5px  ml10px b">Status</p></td>
<td width="71%" style="font-weight:bold"><p class="p5px ml35px">
<input type="radio" required name="quote_status" value="Active" <?php if($rec_quote['quote_status']=='Active'){?> checked="checked"<?php }?> />Active
<input type="radio" required name="quote_status" value="Inactive" <?php if($rec_quote['quote_status']=='Inactive'){?> checked="checked"<?php }?> />Inactive
</p></td>
</tr>


<tr>
<td colspan="3"><p class="ac p5px"><span class="ml10px">

<?php if(!empty($_REQUEST['quote'])){ ?>
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


<?php include 'footer.php'; ?>
</body>
</html>
