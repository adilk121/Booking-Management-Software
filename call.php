<?php require_once("includes/dbsmain.inc.php"); ?>




<?php
if(isset($_REQUEST['emp_dept'])){
$data=db_query("select emp_name from tbl_emp where 1 and emp_dpt='$_REQUEST[emp_dept]' and emp_status='WORKING' ");
?>
<select  name="emp_under" title="Choose employee TL" style="width:183px;padding:3px;"  required="" >
<option>Choose From <?=$_REQUEST['emp_dept']?></option>
<? 
if(mysql_num_rows($data)>0){
while($record=mysql_fetch_array($data)){?>
<option><?=$record['emp_name']?></option>
<? }
}else{?>
<option>None</option>
<? }?>
</select>



<?
}


if(isset($_REQUEST['q'])){



$data=db_query("select * from tbl_emp where 1 and emp_name like '$_REQUEST[q]%' ");
if(mysql_num_rows($data)>0){
echo "<ul id='sugg_list' style='list-style-type:none;display:block;'>";	
while($record=mysql_fetch_array($data)){
?>
<li onClick="fill_val('<?=$record['emp_name']?>' ,<?=$record['emp_id']?>,'<?=$_REQUEST['f']?>','<?=$_REQUEST['dn']?>')"><?=$record['emp_name']?> </li>

<?
}
}
}
?>
</ul>


<?php

if(isset($_REQUEST['emp_q'])){



$data=db_query("select * from tbl_emp where 1 and emp_name like '$_REQUEST[emp_q]%' ");
if(mysql_num_rows($data)>0){




echo "<ul id='sugg_list' style='list-style-type:none;display:block;'>";	
while($record=mysql_fetch_array($data)){
//echo $record['emp_name']."<br />".$record['emp_code']."<br />".$record['emp_dpt']."<br />".$record['emp_desination'];
?>
<li onClick="fill_val('<?=$record['emp_name']?>' ,<?=$record['emp_id']?>,'<?=$_REQUEST['f']?>','<?=$_REQUEST['dn']?>','<?=$record['emp_code']?>','<?=$record['emp_dpt']?>','<?=$record['emp_desination']?>',<?=$record['emp_salary']?>)" >
<?=$record['emp_name']?> &nbsp; &nbsp; <span style='color:#000000;font-weight:300;float:right;'>[ <?="WKN00".$record['emp_code']?> ] </span>
</li>

<?
}
}
}
?>
</ul>
