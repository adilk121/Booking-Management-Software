<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

 

 
// Get search term 
$searchTerm = $_GET['term']; 
 $skillData = array(); 
 $search_sql=db_query("SELECT * FROM tbl_city_master WHERE city_status = 'Active' and city_code LIKE '%$searchTerm%' order by CASE when city_code LIKE '$searchTerm%'
THEN 1 when city_code LIKE '%$searchTerm%' THEN 2 when city_code LIKE '%$searchTerm' THEN  3 END");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['city_id']; 
        $data['value'] = $row['city_code']; 
        array_push($skillData, $data); 
 }


 
// Return results as json encoded array 
echo json_encode($skillData); 
?>