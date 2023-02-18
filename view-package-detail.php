
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

<div class="jumbotron jumbotron-fluid" style="height: 5px;">
  <div class="container" style="position: relative; top:-30px;"> 
    <h1>Package Details</h1>  
   
    
  </div>
</div>

<div class="container">
	<table align="center">
<tr style="text-align: center; font-size: 20px; text-decoration: underline; color:blue;">
	<th>Shipper Details</th> 
	<th>Receiver Details</th>
</tr>
		<tr><td>

			<?php
			$dock=$_REQUEST['dock_no'];


$sql_ship=db_query("select * from tbl_shipper_details where docket_number='$dock' ");
 
$res_ship=mysql_fetch_array($sql_ship);
?>
<table border=0 cellpadding="10">
	<tr>
		<th>Shipper Name</th> <td>: <?=$res_ship['sh_name']?></td>
	</tr>
	<tr>
		<th>Shipper Mobile</th> <td>: <?=$res_ship['sh_mobile']?></td>
	</tr>
		<tr>
		<th>Shipper Email</th> <td>: <?=$res_ship['sh_email']?></td>
	</tr>
	<tr>
		<th>Shipper Address</th> <td>: <?=$res_ship['sh_street']?>, <?=$res_ship['sh_city']?>, <?=$res_ship['sh_distict']?>, <?=$res_ship['sh_state']?>, <?=$res_ship['sh_pin']?></td>


	</tr>
</table>
</td>  


<td>
<?php
$sql_rec=db_query("select * from tbl_receiver where docket_number='$dock' ");
 
$res_rec=mysql_fetch_array($sql_rec);
?>
<table border=0 cellpadding="10">
	<tr>
		<th>Receiver Name</th> <td>: <?=$res_rec['receiver_name']?></td>
	</tr>
	<tr>
		<th>Receiver Phone</th> <td>: <?=$res_rec['receiver_phone']?></td>
	</tr>
<?php   if($res_rec['receiver_address1']!="") {?>
		<tr>
		<th>Receiver Address</th> <td>: <?=$res_rec['receiver_address1']?></td>
	</tr>
<?}?>


<?php   if($res_rec['receiver_address2']!="") {?>
		<tr>
		<th>Receiver Address 2</th> <td>: <?=$res_rec['receiver_address2']?></td>
	</tr>
<?}?>
<?php
if($res_rec['receiver_remark']!="") {
?>
	<tr>
		<th>Receiver Remark</th> <td>: <?=$res_rec['receiver_remark']?></td>
	</tr>
<?}?>

</table>
</td></tr></table>
	<table >

<?php


$sql=db_query("select * from tbl_package where docket_number='$dock' ");

$res=mysql_fetch_array($sql);

?>

		<tr><th width=25%>Docket Number</th> <td> : <?=$res['docket_number']?> </td>  </tr>

		<tr>
<th>Shipment Type</th> <td> : <?=$res['shipment_type']?></td>
</tr>
		<tr>
<th>Amount</th> <td> : <?php if($res['cod_amount']!=""){ echo $res['cod_amount']; } else echo $res['dod_amount']; ?></td>
</tr>
	<tr>
<th>Risk</th> <td> : <?=$res['risk']?></td>
</tr>
	<tr>
<th>Transport Mode</th> <td> : <?=$res['transport_mode']?></td>
</tr>
	<tr>
<th>Packages</th> <td> : <?=$res['no_of_package']?></td>
</tr>

<tr>
<th>Actual Weight</th> <td> : <?=$res['actual_weight']?></td>
</tr>

<tr>
<th>Volumetric Weight</th> <td> : <?=$res['volumetric_weight']?></td>
</tr>

<tr>
<th>Chargeable Weight</th> <td> : <?=$res['chargeable_weight']?></td>
</tr>
</table>

<table border=1 cellpadding="10" align="center">
	<tr>
		<th>S. No.</th>
		<th>Weight (kg)</th>
		<th>Length (cm)</th>
		<th>Breadth (cm)</th>
		<th>Height (cm)</th>

	</tr>

<?php

$sql_weight=db_query("select * from tbl_package_details where docket_number='$dock' ");
$i = 0; 
while($res_weight=mysql_fetch_array($sql_weight))
{ ?>

<tr>
	<td><?php echo ++$i;?></td>
	<td><?=$res_weight['package_weight']?></td>
	<td><?=$res_weight['package_length']?></td>
	<td><?=$res_weight['package_breadth']?></td>
	<td><?=$res_weight['package_height']?></td>
</tr>

<?}?>

</table>

</div>

</body>
</html>
