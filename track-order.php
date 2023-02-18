<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

?>
<html>
    <head>
        <title>
            Track Order
        </title>
        
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    </head>
    
    <body>
        
        
        
        <div class="container">
  <h2>AWB Number :- <?=$_POST['tracking_no']?></h2>
  <hr>
  
  <?php
  $count=0;
if(isset($_POST['track_btn']))
{
      $sql=db_query("select * from tbl_delivery where delivery_airway_bill_no='$_POST[tracking_no]' order by delivery_id desc limit 3 ");
      $count= mysql_num_rows($sql);
}

if($count>0)
{?>
  
   <div class="table-responsive">   
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="text-align:center;">From-To</th>
        <th>Delivery Branch</th>
        <th>Delivery Status</th>
        <th>Delivery Date/Time</th>
        <th>Receiver Name</th>
        <th>Forwarder</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
<?php while($res=mysql_fetch_array($sql)){ ?>   
      <tr>
        <td width="14%"><?=$res['delivery_shipper_from']?> - <?=$res['delivery_shipper_to']?></td>
        <td width="14%"><?=db_scalar("select delivery_city from tbl_package where airway_bill_no='$_POST[tracking_no]'");?></td>
        <td width="14%">
            <?php
            if($res['delivery_status']=="D")
            {
                echo "Delivered";
                if($res['delivery_pod']!=""){
                ?>
                <br>
                <a href="delivery_pod_images/<?=$res['delivery_pod']?>" target="_blank" style="font-weight:bold;">POD</a>
                <?}?>
                
                <?
            }else{
                echo "Undelivered<br>";
                echo "<b>Reason :</b> ".$res['delivery_reason'];
            }
            ?>
           
            
            </td>
        <td width="18%">
            <?php if($res['delivery_status']=="D"){?>
            <?=date("d-M-y",strtotime($res['delivery_date']))?><br><?=date("g:i a", strtotime($res['delivery_time']));?>
            <?}else{?>
           <b>Attempted On</b><br> <?=date("d-M-y",strtotime($res['delivery_attempt_date']))?> 
            <?}?>
            </td>
        <td width="14%"><?=ucwords($res['delivery_receiver_name'])?></td>
        <td width="10%"><?=ucwords(db_scalar("select user_name from tbl_parcel_user where 1 and type='Forwarder' and user_id='$res[forwarder_user_id]' "));?></td>
        <td width="16%"><?=ucwords($res['delivery_remarks'])?></td>
      </tr>
  <?}?>
    </tbody>
  </table>
</div>

<?}else{?>
<p>Record not found.</p>
<?}?>
</div>



    </body>
</html>



