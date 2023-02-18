<?php 

require_once("includes/dbsmain.inc.php");  // ADDING CONNECTION FILES
?>





<select name="per_name_s" id="per_name_s"     style="background:url(images/input_bg.gif) repeat-x; border:1px #CCCCCC solid; width:200px;height:25px;border-radius:4px;padding-top:5px;padding-bottom:5px;margin-top:5px;margin-bottom:5px;margin-left:5px;"  >
<option value="">--Select Performer --</option>
<?php		
$sql_emp_list=db_query("select * from tbl_emp where 1 and emp_desination='Executive' ");

if(mysql_num_rows($sql_emp_list)>0){
	$i=0;
	while($emp_recd=mysql_fetch_array($sql_emp_list)){
	@extract($emp_recd);
?>
<option value="<?=$emp_name?>"><?=$emp_name?></option>
<? 
	}
}?>
</select>

