<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

 

 
// Get search term 
$searchTerm = $_GET['term']; 
 $skillData = array(); 
 $search_sql=db_query("SELECT * FROM tbl_parcel_user WHERE user_status = 'Active' and user_code LIKE '%$searchTerm%' order by CASE when user_code LIKE '$searchTerm%'
THEN 1 when user_code LIKE '%$searchTerm%' THEN 2 when user_code LIKE '%$searchTerm' THEN  3 END");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['user_id']; 
        $data['value'] = $row['user_code']; 
        array_push($skillData, $data); 
 }

 
// Return results as json encoded array 
echo json_encode($skillData); 
?>