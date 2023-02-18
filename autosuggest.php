<?php
include_once("includes/dbsmain.inc.php");
//$obj=new SQL();
//session_destroy();
?>


<?php

	if(isset($_POST['queryString'])) {
	
	$data_sugg=db_query("select emp_name  from tbl_emp where 1 and emp_name like '$_POST[queryString]%' LIMIT 10");
	
	if(mysql_num_rows($data_sugg)>0){
	echo '<ul class="uls" style="list-style:none;">';
	while($res=mysql_fetch_array($data_sugg)){
	
             			echo ' <li class="lis" onClick="fill(\''.addslashes($res['emp_name']).'\');" >'.$res['emp_name'].'</li>';
	         		}
				echo '</ul>';
					
							
				
								
				
	}//else{
//	echo '<div style="color:#FF0000;height:30px;width:300px;vertical-align:middle;padding-left:5px;font-size:14px;font-weight:500;padding-top:10px;text-align:center;">No Record Found.</div>';
//	}
	
	}			
	
	

?>

