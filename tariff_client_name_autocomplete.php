<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

 

 
// Get search term 
$searchTerm = $_GET['term']; 
 $skillData = array(); 
 $search_sql=db_query("SELECT * FROM tbl_shipper WHERE shipper_status = 'Active' and shipper_name LIKE '%$searchTerm%' order by CASE when shipper_name LIKE '$searchTerm%'
THEN 1 when shipper_name LIKE '%$searchTerm%' THEN 2 when shipper_name LIKE '%$searchTerm' THEN  3 END");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['shipper_id']; 
        $data['value'] = $row['shipper_name']; 
        array_push($skillData, $data); 
 }


 
// Return results as json encoded array 
echo json_encode($skillData); 
?>