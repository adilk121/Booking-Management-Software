<?php require_once("includes/dbsmain.inc.php");  ?>


<?php

/*

  $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "booking_soft";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

if($conn)
	{//echo "Connected";
}*/
    // Check connection
  /*  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } */


          $name=$_POST['name'];
          $company_name=$_POST['company_name'];
          
          $code=$_POST['code'];
          $street=$_POST['street'];
          $city=$_POST['city'];
          
         /* $city=db_scalar("select city_name from tbl_state_city_master where  id='$city_id'");*/
          
          $distict=$_POST['distict'];
          $state=$_POST['state'];
          $email=$_POST['email'];
          $mobile=$_POST['mobile'];
          $pin=$_POST['pin'];
          $gst=$_POST['gst'];
          $gst_rate=$_POST['gst_rate'];
          
          $from_date=$_POST['from_date'];
          $to_date=$_POST['to_date'];
          $gst_applicable=$_POST['gst_applicable'];
          $btn=$_POST['sub'];





/*
echo $name;
echo $code;
echo $street;
echo $city;
echo $distict;
echo $state;
echo $email;
echo $mobile;
echo $pin;
echo $tin;*/

/*if($code=="")
{*/
    // Check connection
if($btn=="Save")
{


             $sql= db_query("INSERT INTO tbl_shipper(shipper_code,shipper_name,shipper_company_name, shipper_street,shipper_city, shipper_distict, shipper_state, shipper_email, shipper_mobile, shipper_pin, contract_from_date,contract_to_date, shipper_gst, shipper_gst_rate, shipper_gst_applicable, shipper_type,shipper_status)
              VALUES('".$code."','".$name."','".$company_name."','".$street."','".$city."','".$distict."','".$state."','".$email."','".$mobile."','".$pin."','".$from_date."','".$to_date."','".$gst."','".$gst_rate."','".$gst_applicable."', 'Client','Active')");

             if($sql)
             	{echo "Shipper Details Saved.";
/*}
session_start();
$_SESSION["code_session"]=$code;*/
         }
             else
             	{echo"not";}

 /*}
 else
 {
echo "Update Query";

 }*/
}
else if($btn="Update")
{
if($gst_applicable=="No"){
    db_query("update tbl_shipper set shipper_gst_applicable='No', shipper_gst='', shipper_gst_rate=''  where shipper_code = '$code' ");
}

if($gst_applicable=="Yes"){
     db_query("update tbl_shipper set shipper_gst_applicable='Yes', shipper_gst='$gst', shipper_gst_rate='$gst_rate'  where shipper_code = '$code' ");
}

$sql = "update tbl_shipper set        
        shipper_name='$name',
        shipper_company_name='$company_name',
        shipper_street='$street',
        shipper_city ='$city',
        shipper_distict = '$distict',   
        shipper_state='$state',
        shipper_email='$email',
        shipper_mobile='$mobile',
        shipper_pin='$pin',
        contract_from_date='$from_date',
        contract_to_date='$to_date',
        shipper_type='Client',
        shipper_status='Active'
    where shipper_code = '$code' ";

db_query($sql);
echo "Updated";

}

?>