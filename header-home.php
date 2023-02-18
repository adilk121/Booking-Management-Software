<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
?>

<?php
if(empty($_SESSION['UID_EMS'])){
header("location:index.php");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="images/wkn.png" rel="shortcut icon" type="image/x-icon"/>
<title>Brighto : Employee Network System</title>
</head>
<link type="text/css" rel="stylesheet" href="leeds/template_homepage.css">
<link rel="stylesheet" type="text/css" href="Font-Awesome-4.7.0/css/font-awesome.css">
<link href="js/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/jquiry.js"> </script>
<script type="text/javascript" src="js/script.js"></script>
<link href="style.css" type="text/css" rel="stylesheet" />
<?php /*?><body oncontextmenu="return false;"  ondragstart="return false;" ondragenter="return false;" ondragover="return false;" ondrop="return false;" onselect="return false;" oncopy="return false" onselect="return false"  onbeforeprint="return false" onafterprint="return false" onselectstart="return false">
<?php */?>
<body>

<?php $regd_id=db_scalar("select emp_id from tbl_emp where 1 and emp_reg_id='$_SESSION[UID_EMS]'");?>	

<style>
ul li a:hover{
text-decoration:underline;
color:#990000;
background-color:#F5F5F5;
}
.arif_shadow{;
box-shadow: 0px 4px 17px 6px #000;
-o-box-shadow: 6px 6px 6px 17px #000;
-webkit-box-shadow:  7px 7px 18px  #000;
-moz-box-shadow: 6px 6px 6px 17px  #000;
}

</style>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
<td colspan="3" style="background:#284c93;padding-bottom:15px">
<p style="font-size:16px;padding-top:40px;float:right;margin-right:15px;font-style:italic"><span style="color:#000000;font-weight:bold;font-size:16px">Welcome</span>&nbsp;&nbsp; <span style="font-size:15px;color:#FFFFFF"><?=db_scalar("select emp_name from tbl_emp where emp_reg_id='$_SESSION[UID_EMS]'")?>&nbsp;<span style="color:#000000;font-weight:bold;">[</span>&nbsp;<span style="font-size:12px"><?=db_scalar("select reg_uname from tbl_registration where reg_id='$_SESSION[UID_EMS]'")?></span>&nbsp;<span style="color:#000000;font-weight:bold;">]</span></span></p>

<p class="mt20px ml10px" style="font-size:30px;font-weight:bold;color:#fff;"><a href="home-page.php" title="Brighto Employee Network" style="color:#FFFFFF;text-decoration:none;" ><img src="images/logo.png" /></a></p>


</td>
</tr>

<?
$empDpt=db_scalar("select emp_dpt from tbl_emp where 1 and emp_reg_id='$_SESSION[UID_EMS]'");


$id_user=db_scalar("select emp_id from tbl_emp where 1 and emp_reg_id='$_SESSION[UID_EMS]'");
$count_guide_unread=db_scalar("select count(guide_id) from  tbl_guideline where 1 and guide_to_id='$id_user' and guide_msg_status='Unread'  and guide_is_delete='No'");
$count_notice_unread=db_scalar("select count(notice_id) from  tbl_notice where 1 and notice_to_id='$id_user' and notice_msg_status='Unread'  and notice_is_delete='No'");
$count_offer_unread=db_scalar("select count(offer_id) from  tbl_offer where 1 and offer_to_id='$id_user' and offer_msg_status='Unread'  and offer_is_delete='No'");

$total=$count_guide_unread + $count_notice_unread + $count_offer_unread;

$empcode=db_scalar("select emp_code from tbl_emp where 1 and emp_reg_id='$_SESSION[UID_EMS]'");

$com_count=db_scalar("select count(com_id) from tbl_complain where 1 and com_dept_mapped_id='WKN000$empcode' and com_msg_status='Unread' and com_is_delete='No'");

$user_exist=db_scalar("select dept_id from tbl_dept where 1 and dept_maped_id='WKN000$empcode'");
?>


<style>

ul li {
  font:  12px;
  display: inline-block;
   position: relative;
  cursor: pointer;

	
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -ms-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
}
ul li ul {
  padding: 0;
  position: absolute;
  top: 34px;
  left: 0;
   -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  display: none;
  opacity: 0;
   visibility: hidden;
   
   
	
  -webkit-transiton: opacity 0.2s;
  -moz-transition: opacity 0.2s;
  -ms-transition: opacity 0.2s;
  -o-transition: opacity 0.2s;
  -transition: opacity 0.2s;
}
ul li ul li { 
  background: #284c93; 
  display: block; 
  color: #fff;
  padding:2px 0px 2px 0px;
  text-shadow: 0 -1px 0 #000;
  border-radius:5px;
  width:180px;
}
ul li ul li:hover { background: #FFFFFF;color:#000000;border: solid thin #284c93;text-decoration:none; }
ul li:hover ul {
  display: block;
  opacity: 1;
  visibility: visible;
  width:170px;
  z-index:1;
}
</style>

<tr>
    <td colspan="3" style="background:#284c93;border-top:#FFFFFF solid 1px;">
	
	<div class="hh white">
        <ul>
         <li ><a href="home.php" title="Go to home page" style="text-decoration:none;"><i class="fa fa-bars"></i> Menus</a></li>
          <li ><a href="home-page.php" title="Go to home page" style="text-decoration:none;"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="my-profile.php" title="Click here to see profile" style="text-decoration:none;"><i class="fa fa-user"></i> Profile</a></li>
          <li style="width:180px"><a href="guideline-board-member.php?pgid=mi&mty=in" style="text-decoration:none;"  >
		    <i class="fa fa-address-card"></i> My Section <? if($total>0){?><span style="color:#FFFF00;border:#FFFFFF solid thin;padding:1px 3px 1px 3px; border-radius:10px;font-size:12px;"><?=$total?></span><img src="images/gif_new.gif" height="17" width="27" style="border-radius:12px;vertical-align:middle" vspace="0" hspace="0"   /><? }?> </a>
			<ul >
      <li style="width:180px;text-align:left;"><a href="guideline-board-member.php?pgid=mi&mty=in" style="text-decoration:none;"> My Guidelines<span style="float:right; font-weight:bold;margin-right:30px;font-size:13px">(<?=$count_guide_unread?>)</span></a></li>
      <li style="width:180px;text-align:left;"><a href="notice-board-member.php?pgid=mi&mty=in" style="text-decoration:none;" >My Notices<span style="float:right; font-weight:bold;margin-right:30px;font-size:13px">(<?=$count_notice_unread?>)</span></a></li>
<li style="width:180px;text-align:left;"><a href="offer-board-member.php?pgid=mi&mty=in" style="text-decoration:none;">My Offers<span style="float:right; font-weight:bold;margin-right:30px;font-size:13px">(<?=$count_offer_unread?>)</span></a></li>

<? if($user_exist!=""){?>
<li style="width:180px;text-align:left;"><a href="complain-board-member.php?pgid=mi&mty=in" style="text-decoration:none;">My Complains<span style="float:right; font-weight:bold;margin-right:30px;font-size:13px">(<?=$com_count?>)</span></a></li>	  
<? }?>
	      </ul>
			
			</li>
<!--          <li><a href="salary.html">Salary</a></li>-->
          
		  
		  <li style="width:190px"><a href="employee-complain.php" title="Click here to submit your complain" style="text-decoration:none;" ><i class="fa fa-pencil"></i> Complaints/Bugs <? if($com_count>0){?><span style="color:#FFFF00;border:#FFFFFF solid thin;padding:1px 3px 1px 3px; border-radius:10px;font-size:12px;"><?=$com_count?></span><img src="images/gif_new.gif" height="17" width="27" style="border-radius:12px;vertical-align:middle" vspace="0" hspace="0"   /><? }?>
		  </a></li>
          <li style="width:130px"><a href="employee-increment.php" title="Click here to see incremnts" style="text-decoration:none;"><i class="fa fa-money"></i> Increaments</a></li>
          <li style="width:140px"><a href="colleagues.php" title="Click here to see your colleagues" style="text-decoration:none;"><i class="fa fa-users"></i> Colleagues</a></li>
          <li><a href="news-board.php" title="Click here to see company news" style="text-decoration:none;"><i class="fa fa-newspaper-o"></i> News</a></li>
          <li style="width:130px"><a href="hr-policies-board.php" title="Click here to see HR policies" style="text-decoration:none;" ><i class="fa fa-file-o"></i> HR Policies</a></li>
          <li style="width:155px"><a href="change-password.php" title="Click here to reset your password" style="text-decoration:none;" ><i class="fa fa-key"></i> Change&nbsp;Password</a></li>		  
          <li><a href="logout.php" style="text-decoration:none;" title="Click here to logout"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>	
		
      </div></td>
</tr>