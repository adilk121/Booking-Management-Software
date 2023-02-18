<?php 
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
?>
<?php
if(isset($_REQUEST['login'])){

$date=date("Y-m-d");

$uid=trim($_REQUEST['user_id']);
$pass=trim($_REQUEST['user_pass']);

$sql="select * from tbl_registration where reg_uname='$uid' and reg_pass='$pass' and reg_status='Active' ";
$data_login=db_query($sql);
if(mysql_num_rows($data_login)>0){


$record_login=mysql_fetch_array($data_login);

///////////////////////////////////  ATTENDANCE CODE ////////////////////////////////////////

$count_att=db_scalar("select att_id from tbl_emp_attendance where 1 and att_emp_reg_id='$record_login[reg_id]' and att_date='$date'");
if($count_att<=0){
$name=db_scalar("select emp_name from tbl_emp where 1 and emp_reg_id='$record_login[reg_id]'");
$sql="insert into tbl_emp_attendance set att_is_present='Yes',att_emp_reg_id='$record_login[reg_id]',att_emp_uname='$record_login[reg_uname]',att_emp_name='$name',att_date='$date',att_time=now()";
db_query($sql);
}

/////////////////////////////////////////////////////////////////////////////////////////////


$_SESSION['UID_EMS']=$record_login['reg_id'];
$_SESSION['U_ACCESS']=$record_login['reg_access'];
$_SESSION['U_TYPE']=$record_login['reg_type'];

	header("location:home.php");
				exit;
				

}
else{
$_SESSION["err_msg"]="Please login with valid detail.";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="images/wkn.png" rel="shortcut icon" type="image/x-icon"/>
<title>FLASH COURIERS & CARGO - BMS : Login  Booking Management System</title>
<link rel="stylesheet" type="text/css" href="Font-Awesome-4.7.0/css/font-awesome.css">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="style.css" type="text/css" rel="stylesheet" />

</head>
<style>
    .black_overlay{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: absolute;
        top: 25%;
        left: 25%;
        width: 40%;
        height: 35%;
        padding: 16px;
        border: 6px solid #284c93;
		border-radius:5px;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
	
.arif_shadow{;
box-shadow: 4px 0px 15px 4px #284c93;
-o-box-shadow: 4px 4px 15px #284c93;
-webkit-box-shadow: 4px 4px 15px #284c93;
-moz-box-shadow: 4px 4px 15px #284c93;
}

</style>
<body >
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<?php include("ems-header.php") ?>  
  <tr>
<td width="100%" >

<?php if(!empty($_SESSION["err_msg"])){?>
<div id="logErr" class="close-msg" >
    <div class="alert alert-danger text-center"> <a href="#" class="close" id="close-msg" data-dismiss="alert">&times;</a> <strong>Error !</strong> Invalid Login Id or Password. </div>
  </div>
<?php
unset($_SESSION["err_msg"]);
}
?>

<div class="well col-md-5 center col-md-offset-4" id="login-box">
                  <div class="alert alert-info text-center"> <strong><i class="fa fa-list"></i> Please login with your Username and Password.</strong> </div>
                  <form class="form-horizontal" action="" method="post" onsubmit="return loginValidate();">
        <fieldset>
                      <div class="input-group input-group-lg"> <span class="input-group-addon "><i class="fa fa-user text-success"></i></span>
            <input type="text" name="user_id" id="user_id" class="form-control" placeholder="Username" autocomplete="off">
          </div>
                      <div class="clearfix"></div>
                      <br>
                      <div class="input-group input-group-lg"> <span class="input-group-addon "><i class="fa fa-lock text-success"></i></span>
            <input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Password" autocomplete="off">
          </div>
          
          

                      <!--<div class="input-group input-group-lg pt15"> 
                      <input type="checkbox" name="rememberme" value="yes">
            Remeber me on this system
          </div>-->
          
          
          
          
          
          
                      <div class="clearfix"></div>
                      <p align="center">
            <button type="submit" class="btn btn-primary" name="login" style="margin-top:15px;"><i class="fa fa-sign-in"></i> Login<!-- to your account--></button>
          </p>
                    </fieldset>
      </form>
                </div>

      
      
      <div id="fade" class="black_overlay"></div></td>
  </tr>
</table>

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">
function loginValidate(){	
   function trim(str){				
	 return str.replace(/^\s*|\s*$/g,'');
	}	
var loginID=trim(document.getElementById('login_id').value);
if(loginID=='')
  {
	  alert("Enter your login id !");
	  document.getElementById('login_id').focus();
	  return false;
  }
if(trim(document.getElementById('password').value)==0){
	alert("Enter your password !");
	document.getElementById('password').focus();
	return false;
 }	
}
</script>

<script>
setTimeout(function() { $(".close-msg").slideUp("slow")}, 3000);
</script>
</body>
</html>