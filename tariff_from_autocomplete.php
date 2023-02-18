<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

 

 
// Get search term 
$searchTerm = $_GET['term']; 
 $skillData = array(); 
 
 
 $search_sql=db_query("SELECT * FROM tbl_zone WHERE zone_status = 'Active' and zone_name LIKE '%$searchTerm%' order by CASE when zone_name LIKE '$searchTerm%'
THEN 1 when zone_name LIKE '%$searchTerm%' THEN 2 when zone_name LIKE '%$searchTerm' THEN  3 END");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['zone_id']; 
        $data['value'] = $row['zone_name']; 
        array_push($skillData, $data); 
 }


 $search_sql=db_query("SELECT * FROM tbl_state_master WHERE state_status = 'Active' and state_name LIKE '%$searchTerm%' order by CASE when state_name LIKE '$searchTerm%'
THEN 1 when state_name LIKE '%$searchTerm%' THEN 2 when state_name LIKE '%$searchTerm' THEN  3 END");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['state_id']; 
        $data['value'] = $row['state_name']; 
        array_push($skillData, $data); 
 }
 
  $search_sql=db_query("SELECT * FROM tbl_city_master WHERE city_status = 'Active' and city_name LIKE '%$searchTerm%' order by CASE when city_name LIKE '$searchTerm%'
THEN 1 when city_name LIKE '%$searchTerm%' THEN 2 when city_name LIKE '%$searchTerm' THEN  3 END");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['city_id']; 
        $data['value'] = $row['city_name']; 
        array_push($skillData, $data); 
 }
 
// Return results as json encoded array 
echo json_encode($skillData); 
?>