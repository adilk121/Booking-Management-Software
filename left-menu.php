

<div style="margin-top:10px;margin-left:10px;">
<?php	
if(check_access("$_SESSION[U_ACCESS]","1")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>
<p  class="b black left-nav-links"><a href="manage-shipper.php" ><i class="fa fa-user-circle"></i> Manage Shipper </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>


<?php	
if(check_access("$_SESSION[U_ACCESS]","2")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>	
<p  class="b black left-nav-links"><a href="manage-shipper-tariff.php" ><i class="fa fa-user-circle"></i> Manage Shipper Tariff</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>




<?php	
if(check_access("$_SESSION[U_ACCESS]","3")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>

	<p  class="b black left-nav-links"><a href="manage-booking.php" ><i class="fa fa-user-circle"></i> Manage Booking </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	<?php }?>

<?php	
if(check_access("$_SESSION[U_ACCESS]","4")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>
	<p  class="b black left-nav-links"><a href="manage-user.php?type=Client" ><i class="fa fa-user-circle"></i> Manage User </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>


<?php	
if(check_access("$_SESSION[U_ACCESS]","5")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>

		<p  class="b black left-nav-links"><a href="manage-user.php?type=Forwarder" ><i class="fa fa-user-circle"></i> Manage Forwarder </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	<?php }?>




	
<?php	
if(check_access("$_SESSION[U_ACCESS]","6")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>	
   <p  class="b black left-nav-links"><a href="manage-zone-master.php" ><i class="fa fa-user-circle"></i> Manage Zone Master </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>

<?php	
if(check_access("$_SESSION[U_ACCESS]","7")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>
 <p  class="b black left-nav-links"><a href="manage-state-master.php" ><i class="fa fa-user-circle"></i> Manage State Master </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>

<?php	
if(check_access("$_SESSION[U_ACCESS]","8")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>
  <p  class="b black left-nav-links"><a href="manage-city-master.php" ><i class="fa fa-user-circle"></i> Manage City Master </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>

<?php	
if(check_access("$_SESSION[U_ACCESS]","9")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>
<p  class="b black left-nav-links"><a href="update-delivery-status.php" ><i class="fa fa-user-circle"></i> Update Delivery Status </a></p>
<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>


<?php	
if(check_access("$_SESSION[U_ACCESS]","10")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>
<p  class="b black left-nav-links"><a href="manage-reason.php" ><i class="fa fa-user-circle"></i> Manage Reasons </a></p>
<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>


<?php	
if(check_access("$_SESSION[U_ACCESS]","11")=='true' || $_SESSION['U_TYPE']=="ADMIN"){
?>
<p  class="b black left-nav-links"><a href="manage-sub-admin.php" ><i class="fa fa-users"></i> Manage Sub Admin </a></p>
<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
<?}?>


	
	<p  class="b black left-nav-links"><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>
 Logout</a></p>

	
	<?/*
		
	<?php if(strstr($access,'reg_manage_emp')){ ?>
	<p  class="b black left-nav-links"><a href="manage-employe.php" ><i class="fa fa-user-circle"></i> Manage Employees</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	<?php }?>
	
	<?php if(strstr($access,'reg_manage_news')){ ?>
	<p  class="b black left-nav-links"><a href="manage-news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Manage News</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
    <?php }?>

	<?php if(strstr($access,'reg_manage_performer')){ ?>
	<p  class="b black left-nav-links"><a href="manage-performers.php"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
 Manage Performers</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
    <?php }?>

	<?php if(strstr($access,'reg_manage_increment')){ ?>
	<p  class="b black left-nav-links"><a href="manage-increments.php"><i class="fa fa-money" aria-hidden="true"></i>
 Manage Increments </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
     <?php }?>


	<?php if(strstr($access,'reg_manage_complain_bugs')){ ?>
		<p  class="b black left-nav-links"><a href="manage-complains-bugs.php"><i class="fa fa-commenting" aria-hidden="true"></i>
 Manage Complaints/Bugs</a> </p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
   <?php }?>

   
	
   	<?php if(strstr($access,'reg_manage_guidelines')){ ?>
		<p  class="b black left-nav-links"><a href="manage-guidelines.php"><i class="fa fa-book" aria-hidden="true"></i>
 Manage Guidlines </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	<?php }?>
	
   	<?php if(strstr($access,'reg_manage_notice')){ ?>
	<p  class="b black left-nav-links"><a href="manage-notice.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>
 Manage Notice Board </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	
	<?php }?>
	
   	<?php if(strstr($access,'reg_manage_hr_policy')){ ?>
	<p  class="b black left-nav-links"><a href="manage-hr-policies.php"><i class="fa fa-pencil" aria-hidden="true"></i>
 Manage H R Policies</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	<?php }?>
	
   	<?php if(strstr($access,'reg_manage_offer')){ ?>
	<p  class="b black left-nav-links"><a href="manage-offers.php"><i class="fa fa-star" aria-hidden="true"></i>
 Manage Offers </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	<?php }?>
	
	<?php if(strstr($access,'reg_manage_quote')){ ?>
	<p  class="b black left-nav-links"><a href="manage-quotes.php"><i class="fa fa-quote-left" aria-hidden="true"></i>
 Manage Quote </a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
	<?php }?>



	<p  class="b black left-nav-links"><a href="manage-employe-attendance.php?ut=emp&day=<?=date("Y-m-d")?>&type=today"><i class="fa fa-calendar" aria-hidden="true"></i>
 Manage Attendance</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>


	


   	<?php if($access_level['reg_type']=='ADMIN'){ ?>
	<p  class="b black left-nav-links"><a href="manage-subuser.php"><i class="fa fa-users" aria-hidden="true"></i>
Manage Subusers</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
    <?php }?>
	
	

 	<?php if(strstr($access,'reg_get_excel')){ ?>
	<p  class="b black left-nav-links"><a href="backup.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
 Get Excel</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>
    <?php }?>

	<p  class="b black left-nav-links"><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>
 Logout</a></p>
	<p style="border-bottom:#284c93 solid 1px;margin-right:5px;margin-top:2px;margin-bottom:12px;"></p>

*/?>
</div>	
	</div>