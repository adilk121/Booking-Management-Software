<?php require_once("includes/dbsmain.inc.php");  ?>
<?php
$update_id=$_REQUEST['tariff_update_id'];

$date=date("Y/m/d");


$tariff_shipper_code=$_REQUEST['tariff_shipper_code'];
$tariff_type=$_REQUEST['tariff_type'];

$tariff_client_name=$_REQUEST['tariff_client_name'];
$tariff_service_tax=$_REQUEST['tariff_service_tax'];
$tariff_address=$_REQUEST['tariff_address'];
$tariff_trans_mode=$_REQUEST['tariff_trans_mode'];
$tariff_fov=$_REQUEST['tariff_fov'];
$tariff_min=$_REQUEST['tariff_min'];
$tariff_volumetric=$_REQUEST['tariff_volumetric'];
$tariff_basis_area_name=$_REQUEST['basis_area_name'];

$tariff_basis_zone=$_REQUEST['tariff_basis_zone'];
$tariff_basis_state=$_REQUEST['tariff_basis_state'];
$tariff_basis_city=$_REQUEST['tariff_basis_city'];

$tariff_basis_zone_bulk=$_REQUEST['tariff_basis_zone_bulk'];
$zone_bulk_additional_weight=$_REQUEST['zone_bulk_additional_weight'];
$zone_bulk_additional_charge=$_REQUEST['zone_bulk_additional_charge'];

$tariff_basis_state_bulk=$_REQUEST['tariff_basis_state_bulk'];
$state_bulk_additional_weight=$_REQUEST['state_bulk_additional_weight'];
$state_bulk_additional_charge=$_REQUEST['state_bulk_additional_charge'];

$tariff_basis_city_bulk=$_REQUEST['tariff_basis_city_bulk'];
$city_bulk_additional_weight=$_REQUEST['city_bulk_additional_weight'];
$city_bulk_additional_charge=$_REQUEST['city_bulk_additional_charge'];

$zone_sql_data="";
$state_sql_data="";
$city_sql_data="";
if($update_id=="")
{
$exist_shipper=db_scalar("select tariff_id from tbl_tariff where tariff_shipper_code='$tariff_shipper_code' ");
if($exist_shipper!="")
{
  $update_id=$exist_shipper;
}
}

if($tariff_basis_area_name=="Zone")
{
$zone_sql_data="
 ,tariff_basis_zone='$tariff_basis_zone',
zone_docket_charge='$zone_docket_charge',
zone_fuel_charge='$zone_fuel_charge',
zone_to_pay_charge='$zone_to_pay_charge',
zone_other_charge='$zone_other_charge',
zone_handling_charge='$zone_handling_charge',
zone_remarks='$zone_remarks',
tariff_basis_zone_bulk='$tariff_basis_zone_bulk',
zone_bulk_additional_weight='$zone_bulk_additional_weight',
zone_bulk_additional_charge='$zone_bulk_additional_charge'
";
}

        if($tariff_basis_area_name=="State")
        {
        $state_sql_data="
        ,tariff_basis_state='$tariff_basis_state',
        state_docket_charge='$state_docket_charge',
        state_fuel_charge='$state_fuel_charge',
        state_to_pay_charge='$state_to_pay_charge',
        state_other_charge='$state_other_charge',
        state_handling_charge='$state_handling_charge',
        state_additional_weight='$state_additional_weight',
        state_additional_charge='$state_additional_charge',
        state_remarks='$state_remarks',
tariff_basis_state_bulk='$tariff_basis_state_bulk',
state_bulk_additional_weight='$state_bulk_additional_weight',
state_bulk_additional_charge='$state_bulk_additional_charge'
        ";
        }
        
if($tariff_basis_area_name=="City")
{
$city_sql_data="
,tariff_basis_city='$tariff_basis_city',
city_docket_charge='$city_docket_charge',
city_fuel_charge='$city_fuel_charge',
city_to_pay_charge='$city_to_pay_charge',
city_other_charge='$city_other_charge',
city_handling_charge='$city_handling_charge',
city_additional_weight='$city_additional_weight',
city_additional_charge='$city_additional_charge',
city_remarks='$city_remarks',
tariff_basis_city_bulk='$tariff_basis_city_bulk',
city_bulk_additional_weight='$city_bulk_additional_weight',
city_bulk_additional_charge='$city_bulk_additional_charge'
";
}

/*if($update_id!="")
{
$trf_zone=db_scalar("select tariff_basis_zone from tbl_tariff where tariff_id='$update_id'");
$trf_state=db_scalar("select tariff_basis_state from tbl_tariff where tariff_id='$update_id'");
$trf_city=db_scalar("select tariff_basis_city from tbl_tariff where tariff_id='$update_id'");
}

if($trf_zone<=0 || $trf_zone=="")
{
$zone_docket_charge=0;
$zone_fuel_charge=0;
$zone_to_pay_charge=0;
$zone_other_charge=0;
$zone_handling_charge=0;
$zone_additional_weight=0;
$zone_additional_charge=0;
$zone_remarks="NULL";  
}else{

$zone_docket_charge=$_REQUEST['zone_docket_charge'];
$zone_fuel_charge=$_REQUEST['zone_fuel_charge'];
$zone_to_pay_charge=$_REQUEST['zone_to_pay_charge'];
$zone_other_charge=$_REQUEST['zone_other_charge'];
$zone_handling_charge=$_REQUEST['zone_handling_charge'];
$zone_additional_weight=$_REQUEST['zone_additional_weight'];
$zone_additional_charge=$_REQUEST['zone_additional_charge'];
$zone_remarks=$_REQUEST['zone_remarks'];
    if(empty($zone_docket_charge))
    {
        $zone_docket_charge=0;
    }
if(empty($zone_fuel_charge))
{
$zone_fuel_charge=0;
}
      if(empty($zone_to_pay_charge))
    {
        $zone_to_pay_charge=0;
    }
if(empty($zone_other_charge))
{
$zone_other_charge=0;
}
      if(empty($zone_handling_charge))
    {
        $zone_handling_charge=0;
    }
if(empty($zone_additional_weight))
{
$zone_additional_weight=0;
}
      if(empty($zone_additional_charge))
    {
        $zone_additional_charge=0;
    }
if(empty($zone_remarks))
{
$zone_remarks="NULL";
}

}


if($trf_state<=0 || $trf_state=="")
{
$state_docket_charge=0;
$state_fuel_charge=0;
$state_to_pay_charge=0;
$state_other_charge=0;
$state_handling_charge=0;
$state_additional_weight=0;
$state_additional_charge=0;
$state_remarks="NULL";   
}else{
$state_docket_charge=$_REQUEST['state_docket_charge'];
$state_fuel_charge=$_REQUEST['state_fuel_charge'];
$state_to_pay_charge=$_REQUEST['state_to_pay_charge'];
$state_other_charge=$_REQUEST['state_other_charge'];
$state_handling_charge=$_REQUEST['state_handling_charge'];
$state_additional_weight=$_REQUEST['state_additional_weight'];
$state_additional_charge=$_REQUEST['state_additional_charge'];
$state_remarks=$_REQUEST['state_remarks'];

 if(empty($state_docket_charge))
    {
        $state_docket_charge=0;
    }
if(empty($state_fuel_charge))
{
$state_fuel_charge=0;
}
      if(empty($state_to_pay_charge))
    {
        $state_to_pay_charge=0;
    }
if(empty($state_other_charge))
{
$state_other_charge=0;
}
      if(empty($state_handling_charge))
    {
        $state_handling_charge=0;
    }
if(empty($state_additional_weight))
{
$state_additional_weight=0;
}
      if(empty($state_additional_charge))
    {
        $state_additional_charge=0;
    }
if(empty($state_remarks))
{
$state_remarks="NULL";
}

}

if($trf_city<=0 || $trf_city=="")
{
$city_docket_charge=0;
$city_fuel_charge=0;
$city_to_pay_charge=0;
$city_other_charge=0;
$city_handling_charge=0;
$city_additional_weight=0;
$city_additional_charge=0;
$city_remarks="NULL";
}
else{
$city_docket_charge=$_REQUEST['city_docket_charge'];
$city_fuel_charge=$_REQUEST['city_fuel_charge'];
$city_to_pay_charge=$_REQUEST['city_to_pay_charge'];
$city_other_charge=$_REQUEST['city_other_charge'];
$city_handling_charge=$_REQUEST['city_handling_charge'];
$city_additional_weight=$_REQUEST['city_additional_weight'];
$city_additional_charge=$_REQUEST['city_additional_charge'];
$city_remarks=$_REQUEST['city_remarks'];

if(empty($city_docket_charge))
    {
        $city_docket_charge=0;
    }
if(empty($city_fuel_charge))
{
$city_fuel_charge=0;
}
      if(empty($city_to_pay_charge))
    {
        $city_to_pay_charge=0;
    }
if(empty($city_other_charge))
{
$city_other_charge=0;
}
      if(empty($city_handling_charge))
    {
        $city_handling_charge=0;
    }
if(empty($city_additional_weight))
{
$city_additional_weight=0;
}
      if(empty($city_additional_charge))
    {
        $city_additional_charge=0;
    }
if(empty($city_remarks))
{
$city_remarks="NULL";
}

}*/

$btn=$_REQUEST['tariff_submit'];
if($exist_shipper!="")
{
    $btn="Update";
}

if($tariff_basis_area_name=="Zone")
{
$zone_from=array();
$zone_to=array();
$zone_weight=array();
$zone_rate=array();
$zone_add_weight=array();
$zone_add_charge=array();
for($i=1; $i<=$tariff_basis_zone; $i++)
{
  $zone_from[]=$_REQUEST['zone_from_'.$i.''];  
   $zone_to[]=$_REQUEST['zone_to_'.$i.''];  
    $zone_weight[]=$_REQUEST['zone_weight_'.$i.''];  
     $zone_rate[]=$_REQUEST['zone_rate_'.$i.''];  
    $zone_add_weight[]=$_REQUEST['zone_add_weight_'.$i.''];  
     $zone_add_charge[]=$_REQUEST['zone_add_charge'.$i.''];  
}

$zone_bulk_from=array();
$zone_bulk_to=array();
$zone_bulk_weight=array();
$zone_bulk_rate=array();
for($i=1; $i<=$tariff_basis_zone_bulk; $i++)
{
  $zone_bulk_from[]=$_REQUEST['zone_bulk_from_'.$i.''];  
   $zone_bulk_to[]=$_REQUEST['zone_bulk_to_'.$i.''];  
    $zone_bulk_weight[]=$_REQUEST['zone_bulk_weight_'.$i.''];  
     $zone_bulk_rate[]=$_REQUEST['zone_bulk_rate_'.$i.''];  
}


}





if($tariff_basis_area_name=="State")
{
$state_from=array();
$state_to=array();
$state_weight=array();
$state_rate=array();
$state_add_weight=array();
$state_add_charge=array();

for($i=1; $i<=$tariff_basis_state; $i++)
{
  $state_from[]=$_REQUEST['state_from_'.$i.''];  
   $state_to[]=$_REQUEST['state_to_'.$i.''];  
    $state_weight[]=$_REQUEST['state_weight_'.$i.''];  
     $state_rate[]=$_REQUEST['state_rate_'.$i.''];  
     $state_add_weight[]=$_REQUEST['state_add_weight_'.$i.''];  
     $state_add_charge[]=$_REQUEST['state_add_charge_'.$i.''];  
     
}

$state_bulk_from=array();
$state_bulk_to=array();
$state_bulk_weight=array();
$state_bulk_rate=array();
for($i=1; $i<=$tariff_basis_state_bulk; $i++)
{
  $state_bulk_from[]=$_REQUEST['state_bulk_from_'.$i.''];  
   $state_bulk_to[]=$_REQUEST['state_bulk_to_'.$i.''];  
    $state_bulk_weight[]=$_REQUEST['state_bulk_weight_'.$i.''];  
     $state_bulk_rate[]=$_REQUEST['state_bulk_rate_'.$i.''];  
}
}



if($tariff_basis_area_name=="City")
{
$city_from=array();
$city_to=array();
$city_weight=array();
$city_rate=array();
$city_add_weight=array();
$city_add_charge=array();
for($i=1; $i<=$tariff_basis_city; $i++)
{
  $city_from[]=$_REQUEST['city_from_'.$i.''];  
   $city_to[]=$_REQUEST['city_to_'.$i.''];  
    $city_weight[]=$_REQUEST['city_weight_'.$i.''];  
     $city_rate[]=$_REQUEST['city_rate_'.$i.''];  
     $city_add_weight[]=$_REQUEST['city_add_weight_'.$i.''];  
     $city_add_charge[]=$_REQUEST['city_add_charge_'.$i.''];  
     
}

$city_bulk_from=array();
$city_bulk_to=array();
$city_bulk_weight=array();
$city_bulk_rate=array();
for($i=1; $i<=$tariff_basis_city_bulk; $i++)
{
  $city_bulk_from[]=$_REQUEST['city_bulk_from_'.$i.''];  
   $city_bulk_to[]=$_REQUEST['city_bulk_to_'.$i.''];  
    $city_bulk_weight[]=$_REQUEST['city_bulk_weight_'.$i.''];  
     $city_bulk_rate[]=$_REQUEST['city_bulk_rate_'.$i.''];  
}
}



/*
print_r($zone_from);
print_r($zone_to);
print_r($zone_weight);
print_r($zone_rate);
echo "<br>";*/




/*print_r($state_from);
print_r($state_to);
print_r($state_weight);
print_r($state_rate);


echo "<br>";*/




/*print_r($city_from);
print_r($city_to);
print_r($city_weight);
print_r($city_rate);
*/


/*

echo $tariff_shipper_code."<br>";
echo $tariff_client_name."<br>";
echo $tariff_service_tax."<br>";
echo $tariff_address."<br>";
echo $tariff_trans_mode."<br>";
echo $tariff_fov."<br>";
echo $tariff_min."<br>";
echo $tariff_volumetric."<br>";
echo $tariff_basis_zone."<br>";
echo $tariff_basis_state."<br>";
echo $tariff_basis_city."<br>";

echo $zone_docket_charge."<br>";
echo $zone_fuel_charge."<br>";
echo $zone_to_pay_charge."<br>";
echo $zone_other_charge."<br>";
echo $zone_handling_charge."<br>";
echo $zone_remarks."<br>";


echo $state_docket_charge."<br>";
echo $state_fuel_charge."<br>";
echo $state_to_pay_charge."<br>";
echo $state_other_charge."<br>";
echo $state_handling_charge."<br>";
echo $state_remarks."<br>";

echo $city_docket_charge."<br>";
echo $city_fuel_charge."<br>";
echo $city_to_pay_charge."<br>";
echo $city_other_charge."<br>";
echo $city_handling_charge."<br>";
echo $city_remarks."<br>";
*/

if($btn=="Save")
{


         $sql= db_query("insert into tbl_tariff set 
         tariff_shipper_code='$tariff_shipper_code',
         tariff_type='$tariff_type',
        tariff_client_name='$tariff_client_name',
        tariff_service_tax ='$tariff_service_tax',
        tariff_address='$tariff_address',
        tariff_trans_mode='$tariff_trans_mode',
        tariff_fov='$tariff_fov',
        tariff_min='$tariff_min',
        tariff_volumetric='$tariff_volumetric'
      
       
        

        
        
        $zone_sql_data
        
        $state_sql_data
        
         $city_sql_data
        
        ");
        
             if($sql)
             	{
             	 //   echo "Shipper Tariff Details Saved."; 
             	    $get_tariff_id=db_scalar("select max(tariff_id) from tbl_tariff where tariff_status='Active'");
             	  //  echo $get_tariff_id;



if($tariff_basis_area_name=="Zone")
{
for($i=0; $i<$tariff_basis_zone; $i++)
{
 $zone_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$get_tariff_id',
                tariff_from='$zone_from[$i]',
                tariff_to='$zone_to[$i]',
                weight_upto='$zone_weight[$i]',
                rate='$zone_rate[$i]',
                tariff_additional_weight='$zone_add_weight[$i]',
                tariff_additional_charge='$zone_add_charge[$i]',
                rate_type='Zone',
                rate_is_normal='Normal',
                rate_is_bulk='',
                rate_date='$date'");
                if($zone_sql)
                {
                  //  echo "Zone rates inserted";
                }else{
                    echo "Zone rates not inserted";
                }
}



for($i=0; $i<$tariff_basis_zone_bulk; $i++)
{
 $zone_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$get_tariff_id',
                tariff_from='$zone_bulk_from[$i]',
                tariff_to='$zone_bulk_to[$i]',
                weight_upto='$zone_bulk_weight[$i]',
                rate='$zone_bulk_rate[$i]',
                rate_type='Zone',
                rate_is_normal='',
                rate_is_bulk='Bulk',
                rate_date='$date'");
                if($zone_sql)
                {
                  //  echo "Zone rates inserted";
                }else{
                    echo "Zone rates not inserted";
                }
}
}

if($tariff_basis_area_name=="State")
{
for($i=0; $i<$tariff_basis_state; $i++)
{
 $state_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$get_tariff_id',
                tariff_from='$state_from[$i]',
                tariff_to='$state_to[$i]',
                weight_upto='$state_weight[$i]',
                rate='$state_rate[$i]',
                tariff_additional_weight='$state_add_weight[$i]',
                tariff_additional_charge='$state_add_charge[$i]',
                rate_type='State',
                rate_is_normal='Normal',
                rate_is_bulk='',
                rate_date='$date'");
                if($state_sql)
                {
                  //  echo "State rates inserted";
                }else{
                    echo "State rates not inserted";
                }
}

for($i=0; $i<$tariff_basis_state_bulk; $i++)
{
 $state_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$get_tariff_id',
                tariff_from='$state_bulk_from[$i]',
                tariff_to='$state_bulk_to[$i]',
                weight_upto='$state_bulk_weight[$i]',
                rate='$state_bulk_rate[$i]',
                rate_type='State',
                rate_is_normal='',
                rate_is_bulk='Bulk',
                rate_date='$date'");
                if($state_sql)
                {
                  //  echo "State rates inserted";
                }else{
                    echo "State rates not inserted";
                }
}

}

if($tariff_basis_area_name=="City")
{
for($i=0; $i<$tariff_basis_city; $i++)
{
 $city_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$get_tariff_id',
                tariff_from='$city_from[$i]',
                tariff_to='$city_to[$i]',
                weight_upto='$city_weight[$i]',
                rate='$city_rate[$i]',
                tariff_additional_weight='$city_add_weight[$i]',
                tariff_additional_charge='$city_add_charge[$i]',
                rate_type='City',
                rate_is_normal='Normal',
                rate_is_bulk='',
                rate_date='$date'");
                if($city_sql)
                {
                  //  echo "City rates inserted";
                }else{
                    echo "City rates not inserted";
                }
}

for($i=0; $i<$tariff_basis_city_bulk; $i++)
{
 $city_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$get_tariff_id',
                tariff_from='$city_bulk_from[$i]',
                tariff_to='$city_bulk_to[$i]',
                weight_upto='$city_bulk_weight[$i]',
                rate='$city_bulk_rate[$i]',
                rate_type='City',
                rate_is_normal='',
                rate_is_bulk='Bulk',
                rate_date='$date'");
                if($city_sql)
                {
                  //  echo "City rates inserted";
                }else{
                    echo "City rates not inserted";
                }
}
}
             	    
            $_SESSION["msg"]="Shipper Tariff Details Saved."; 	
               ?>

    <script>
        window.location.href="manage-shipper-tariff.php";
    </script>
    <?
             	}
             else
             	{echo"not";}


}else if($btn="Update")
{


$sql =db_query("update tbl_tariff set 
       tariff_shipper_code='$tariff_shipper_code',
       tariff_type='$tariff_type',
        tariff_client_name='$tariff_client_name',
        tariff_service_tax ='$tariff_service_tax',
        tariff_address='$tariff_address',
        tariff_trans_mode='$tariff_trans_mode',
        tariff_fov='$tariff_fov',
        tariff_min='$tariff_min',
        tariff_volumetric='$tariff_volumetric'
        
        
        
        
        
       $zone_sql_data
        
        $state_sql_data
        
        $city_sql_data
        
        where tariff_id='$update_id'    ");


  if($sql)
{
 //   echo "Shipper Tariff Updated."; 
   if($tariff_basis_area_name=="Zone")
{
   if($tariff_basis_zone=="")
   {
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='Zone' and rate_is_normal='Normal' and rate_is_bulk='' ");
     
   }else{
       
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='Zone' and rate_is_normal='Normal' and rate_is_bulk='' ");
       for($i=0; $i<$tariff_basis_zone; $i++)
{
 $zone_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$update_id',
                tariff_from='$zone_from[$i]',
                tariff_to='$zone_to[$i]',
                weight_upto='$zone_weight[$i]',
                rate='$zone_rate[$i]',
                tariff_additional_weight='$zone_add_weight[$i]',
                tariff_additional_charge='$zone_add_charge[$i]',
                rate_type='Zone',
                rate_is_normal='Normal',
                rate_is_bulk='',
                rate_date='$date'");
                if($zone_sql)
                {
                //    echo "Zone rates updated";
                }else{
                    echo "Zone rates not updated";
                }
}
   }

if($tariff_basis_zone_bulk=="")
{
db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='Zone' and rate_is_normal='' and rate_is_bulk='Bulk' ");
}else{
db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='Zone' and rate_is_normal='' and rate_is_bulk='Bulk' ");
for($ib=0; $ib<$tariff_basis_zone_bulk; $ib++)
{
$zone_sql=db_query("insert into tbl_tariff_rate set 
tariff_id='$update_id',
tariff_from='$zone_bulk_from[$ib]',
tariff_to='$zone_bulk_to[$ib]',
weight_upto='$zone_bulk_weight[$ib]',
rate='$zone_bulk_rate[$ib]',
rate_type='Zone',
rate_is_normal='',
rate_is_bulk='Bulk',
rate_date='$date'");
if($zone_sql)
{
//    echo "Zone rates updated";
}else{
echo "Zone rates not updated";
}
}
}
   
}
                   
if($tariff_basis_area_name=="State")
{
      if($tariff_basis_state=="")
   {
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='State' and rate_is_normal='Normal' and rate_is_bulk='' ");
     
   }else{
       
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='State' and rate_is_normal='Normal' and rate_is_bulk='' ");
for($i=0; $i<$tariff_basis_state; $i++)
{
 $state_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$update_id',
                tariff_from='$state_from[$i]',
                tariff_to='$state_to[$i]',
                weight_upto='$state_weight[$i]',
                rate='$state_rate[$i]',
                tariff_additional_weight='$state_add_weight[$i]',
                tariff_additional_charge='$state_add_charge[$i]',
                rate_type='State', 
                rate_is_normal='Normal',
                rate_is_bulk='',
                rate_date='$date'");
                if($state_sql)
                {
                 //   echo "State rates updated";
                }else{
                    echo "State rates not updated";
                }
}
   }
   
   
 if($tariff_basis_state_bulk=="")
   {
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='State' and rate_is_normal='' and rate_is_bulk='Bulk'");
     
   }else{
       
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='State' and rate_is_normal='' and rate_is_bulk='Bulk'");
for($i=0; $i<$tariff_basis_state_bulk; $i++)
{
 $state_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$update_id',
                tariff_from='$state_bulk_from[$i]',
                tariff_to='$state_bulk_to[$i]',
                weight_upto='$state_bulk_weight[$i]',
                rate='$state_bulk_rate[$i]',
                rate_type='State',
                rate_is_normal='',
                rate_is_bulk='Bulk',
                rate_date='$date'");
                if($state_sql)
                {
                 //   echo "State rates updated";
                }else{
                    echo "State rates not updated";
                }
}
   }
}
   
if($tariff_basis_area_name=="City")
{
     if($tariff_basis_city=="")
   {
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='City' and rate_is_normal='Normal' and rate_is_bulk='' ");
     
   }else{
       
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='City' and rate_is_normal='Normal' and rate_is_bulk=''");
for($i=0; $i<$tariff_basis_city; $i++)
{
 $city_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$update_id',
                tariff_from='$city_from[$i]',
                tariff_to='$city_to[$i]',
                weight_upto='$city_weight[$i]',
                rate='$city_rate[$i]',
                tariff_additional_weight='$city_add_weight[$i]',
                tariff_additional_charge='$city_add_charge[$i]',
                rate_type='City',
                rate_is_normal='Normal',
                rate_is_bulk='',
                rate_date='$date'");
                if($city_sql)
                {
                 //   echo "City rates updated";
                }else{
                    echo "City rates not updated";
                }
}
   }
   
     if($tariff_basis_city_bulk=="")
   {
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='City' and rate_is_normal='' and rate_is_bulk='Bulk'");
     
   }else{
       
        db_query("delete from tbl_tariff_rate where tariff_id='$update_id' and rate_type='City' and rate_is_normal='' and rate_is_bulk='Bulk'");
for($i=0; $i<$tariff_basis_city_bulk; $i++)
{
 $city_sql=db_query("insert into tbl_tariff_rate set 
                tariff_id='$update_id',
                tariff_from='$city_bulk_from[$i]',
                tariff_to='$city_bulk_to[$i]',
                weight_upto='$city_bulk_weight[$i]',
                rate='$city_bulk_rate[$i]',
                rate_type='City',
                rate_is_normal='',
                rate_is_bulk='Bulk',
                rate_date='$date'");
                if($city_sql)
                {
                 //   echo "City rates updated";
                }else{
                    echo "City rates not updated";
                }
}
   }
   
}
    
 if($exist_shipper!="")
{
 $_SESSION["msg"]="Shipper Tariff Details Saved."; 	
?>    <script>
        window.location.href="manage-shipper-tariff.php";
    </script>
<? 
}  else{ 
    
    $_SESSION["msg"]="Shipper Tariff Updated."; 
    ?>

    <script>
        window.location.href="manage-shipper-tariff.php?update_id=<?=$update_id?>&edit_type=<?=$tariff_basis_area_name?>";
    </script>
    <?}
}
else
{echo"not";}

}








?>