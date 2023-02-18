
<?php require_once("includes/dbsmain.inc.php");  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shipper Detail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron jumbotron-fluid" >
  <div class="container" style="height: 5px;"> 
    <h1>Shipper Details</h1>  
   
    
  </div>
</div>

<div class="container">
	<table>

<?php
$id=$_REQUEST['id'];


$sql=db_query("select * from tbl_shipper where shipper_id='$id' ");

$res=mysql_fetch_array($sql);

?>

		<tr><th width=25%>SHIPPER CODE</th> <td> : <?=$res['shipper_code']?> </td>  </tr>

		<tr>
<th>GST IN</th> <td> : <?=$res['shipper_gst']?></td>
</tr>
		<tr>
<th>NAME</th> <td> : <?=$res['shipper_name']?></td>
</tr>
	<tr>
<th>MOBILE</th> <td> : <?=$res['shipper_mobile']?></td>
</tr>
	<tr>
<th>EMAIL</th> <td> : <?=$res['shipper_email']?></td>
</tr>
	<tr>
<th>ADDRESS</th> <td> : <?=$res['shipper_street']?>, <?=$res['shipper_city']?>, <?=$res['shipper_distict']?>, <?=$res['shipper_state']?>, <?=$res['shipper_pin']?> </td>
</tr>

</table>

</div>

</body>
</html>
