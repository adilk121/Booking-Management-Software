<?php 
ob_start();
require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
date_default_timezone_set('Asia/Kolkata');

 

 
// Get search term 
$searchTerm = $_GET['term']; 
 $skillData = array(); 
 $search_sql=db_query("SELECT * FROM tbl_parcel_user WHERE user_name LIKE '%".$searchTerm."%' AND user_status = 'Active' ORDER BY user_name ASC");
 while($row=mysql_fetch_array($search_sql))
 {
      $data['id'] = $row['user_id']; 
        $data['value'] = $row['user_name']; 
        array_push($skillData, $data); 
 }

 
// Return results as json encoded array 
echo json_encode($skillData); 
?>