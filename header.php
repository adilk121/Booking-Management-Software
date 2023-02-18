<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');
if(empty($_SESSION['UID_EMS'])){
header("location:index.php");
exit;
}

$month['January']= 1;
$month['February']= 2;
$month['March']= 3;
$month['April']= 4;
$month['May']= 5;
$month['June']= 6;
$month['July']= 7;
$month['Auguest']= 8;
$month['September']= 9;
$month['October']= 10;
$month['November']= 11;
$month['December']= 12;
?>

<?php
$CURR_date=date('Y-m-d');
$shipper_expired_sql=db_query("select * from tbl_shipper");
if(mysql_num_rows($shipper_expired_sql)>0)
{
    while($shipper_expired_res=mysql_fetch_array($shipper_expired_sql))
    {
     
        if($shipper_expired_res['contract_to_date']<$CURR_date)
        {
          db_query("update tbl_shipper set shipper_status='Inactive' where shipper_id='$shipper_expired_res[shipper_id]'");
        }

    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="images/wkn.png" rel="shortcut icon" type="image/x-icon"/>
<title>FLASH COURIERS & CARGO - Booking Management System (BMS)</title>
<link rel="stylesheet" type="text/css" href="Font-Awesome-4.7.0/css/font-awesome.css">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="style.css" type="text/css" rel="stylesheet" />
<link href="js/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
 input:not([type]), input[type="text"]
{
  text-transform: uppercase; 
}

select,option{
     text-transform: uppercase; 
}
</style>
</head>

<script type="text/javascript" src="jscolor/jscolor.js"></script>
<script type="text/javascript" src="js/jquiry.js"> </script>
<script type="text/javascript" src="js/script.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="ckeditor/sample.css">

<link href="style.css" type="text/css" rel="stylesheet" />




<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr>
<td colspan="2" style="background:#284c93;">

 <img src="http://www.flashcourierscargo.com/header_files/logo2.png" style="background-color:white;" id="header-logo" alt="FLASH COURIERS & CARGO" title="FLASH COURIERS & CARGO" /> 


<span id="lbl-ems-top">Booking Management System</span>



</td>
</tr>

  
  
  
  <tr>
  
  
    <td colspan="2" style="background:#284c93;border-top: solid #FFFFFF thin">
	<div class="hh white">
	<ul>
	<li ><a href="home.php"><i class="fa fa-bars"></i>&nbsp;Menus</a></li>   
<!--	<li ><a href="home-page.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>-->
	<!--<li><a href="my-profile.html">My Profile</a></li>-->
	<!--<li style="width:130px"><a href="guidlines.html"><i class="fa fa-book"></i>&nbsp;Guidelines</a></li>-->
<!--	<li><a href="salary.html">Salary</a></li>-->
	<!--<li style="width:160px"><a href="complaints.html"><i class="fa fa-commenting"></i>&nbsp;Complaints/Bugs</a></li>-->
	<!--<li><a href="increaments.html">Increaments</a></li>-->
	<!--<li><a href="company-news.html"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
News</a></li>-->
	<!--<li style="width:150px"><a href="hr-policies.html"><i class="fa fa-pencil" aria-hidden="true"></i>
HR Policies</a></li>-->
	<!--<li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>
Logout</a></li>-->
	
	</ul>
	
	
    
    
    <p class="mt5px fr mt10px"><span class="b">DAY :</span> <?=date("l")?> &nbsp; &nbsp;</p>
<p class="mt5px fr mt10px"><span class="b"><i class="fa fa-calendar" aria-hidden="true"></i>
 DATE :</span> <?=date("F-d-Y")?> &nbsp; &nbsp;</p>

<p class="mt5px fr mt10px"><span class="b"><i class="fa fa-user" aria-hidden="true"></i> User :</span> <?=ucfirst(db_scalar("select reg_uname from tbl_registration where reg_id='$_SESSION[UID_EMS]'"))?> &nbsp; &nbsp;</p>
    
    </div>
    
    
    
    
    </td>
  </tr>