<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

 

 
// Get search term 
$searchTerm = $_GET['term']; 
 $skillData = array(); 
 $search_sql=db_query("SELECT * FROM tbl_zone WHERE zone_status = 'Active' and zone_code LIKE '%$searchTerm%' order by CASE when zone_code LIKE '$searchTerm%'
THEN 1 when zone_code LIKE '%$searchTerm%' THEN 2 when zone_code LIKE '%$searchTerm' THEN  3 END");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['zone_id']; 
        $data['value'] = $row['zone_code']; 
        array_push($skillData, $data); 
 }


 
// Return results as json encoded array 
echo json_encode($skillData); 
?>