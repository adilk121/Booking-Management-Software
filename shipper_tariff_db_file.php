<?php require_once("includes/dbsmain.inc.php");  

          $tariff_shipper_code=$_POST['tariff_shipper_code'];
          $tariff_client_name=$_POST['tariff_client_name'];
          
        //  $shi_name=db_scalar("select shipper_name from tbl_shipper where shipper_code='$tariff_client_name' ");
          $tariff_service_tax=$_POST['tariff_service_tax'];
          $tariff_address=$_POST['tariff_address'];
          
          $tariff_basis_zone_rate=$_POST['tariff_basis_zone_rate'];
          $tariff_basis_state_rate=$_POST['tariff_basis_state_rate'];
          $tariff_basis_city_rate=$_POST['tariff_basis_city_rate'];
          $tariff_trans_mode=$_POST['tariff_trans_mode'];
          $tariff_fov=$_POST['tariff_fov'];
          $tariff_volumetric=$_POST['tariff_volumetric'];
          
          $tariff_from=$_POST['tariff_from'];
          $tariff_to=$_POST['tariff_to'];
          $tariff_weight=$_POST['tariff_weight'];
          $tariff_per_gram=$_POST['tariff_per_gram'];
          $tariff_docket_charge=$_POST['tariff_docket_charge'];
          $tariff_fuel_charge=$_POST['tariff_fuel_charge'];
          $tariff_to_pay_charge=$_POST['tariff_to_pay_charge'];
          $tariff_other_charge=$_POST['tariff_other_charge'];
          $tariff_handling_charge=$_POST['tariff_handling_charge'];
          $tariff_remarks=$_POST['tariff_remarks'];
          $btn=$_POST['tariff_submit'];
          $update_id=$_POST['update_id'];
          
          
          
         
    





    // Check connection
if($btn=="Save")
{


         $sql= db_query("insert into tbl_tariff set 
         tariff_shipper_code='$tariff_shipper_code',
        tariff_client_name='$tariff_client_name',
        tariff_address='$tariff_address',
        tariff_service_tax ='$tariff_service_tax',
        tariff_basis_zone_rate = '$tariff_basis_zone_rate',   
        tariff_basis_state_rate='$tariff_basis_state_rate',
        tariff_basis_city_rate='$tariff_basis_city_rate',
        tariff_trans_mode='$tariff_trans_mode',
        tariff_fov='$tariff_fov',
        tariff_volumetric='$tariff_volumetric',
        
        tariff_from='$tariff_from',
        tariff_to='$tariff_to',
        tariff_weight='$tariff_weight',
        tariff_per_gram='$tariff_per_gram',
        tariff_docket_charge='$tariff_docket_charge',
        tariff_fuel_charge='$tariff_fuel_charge',
        tariff_to_pay_charge='$tariff_to_pay_charge',
        tariff_other_charge='$tariff_other_charge',
        tariff_handling_charge='$tariff_handling_charge',
        tariff_remarks='$tariff_remarks'       ");
        
             if($sql)
             	{echo "Shipper Tariff Details Saved."; }
             else
             	{echo"not";}


}
else if($btn="Update")
{


$sql =db_query("update tbl_tariff set 
         tariff_shipper_code='$tariff_shipper_code',
        tariff_client_name='$tariff_client_name',
        tariff_address='$tariff_address',
        tariff_service_tax ='$tariff_service_tax',
        tariff_basis_zone_rate = '$tariff_basis_zone_rate',   
        tariff_basis_state_rate='$tariff_basis_state_rate',
        tariff_basis_city_rate='$tariff_basis_city_rate',
        tariff_trans_mode='$tariff_trans_mode',
        tariff_fov='$tariff_fov',
        tariff_volumetric='$tariff_volumetric',
        tariff_from='$tariff_from',
        tariff_to='$tariff_to',
        tariff_weight='$tariff_weight',
        tariff_per_gram='$tariff_per_gram',
        tariff_docket_charge='$tariff_docket_charge',
        tariff_fuel_charge='$tariff_fuel_charge',
        tariff_to_pay_charge='$tariff_to_pay_charge',
        tariff_other_charge='$tariff_other_charge',
        tariff_handling_charge='$tariff_handling_charge',
        tariff_remarks='$tariff_remarks'   where tariff_id='$update_id'    ");


  if($sql)
{echo "Shipper Tariff Updated."; }
else
{echo"not";}

}

?>