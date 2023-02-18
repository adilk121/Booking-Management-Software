<?php include("header.php"); ?>

  
<tr>
    
	
	<td valign="top" width="17%" style="border-right: #284c93 solid 3px; height:505px;" >
	
	<?php include("left-menu.php"); ?>
	</td>
	
    <td valign="top" width="83%">

	<p style="font-size:24px;color:#0099FF;font-weight:bold;margin-top:10px;margin-left:30px;font-family:'Comic Sans MS';border-bottom:solid thin #333333;padding-bottom:5px;padding-left:5px;"><?=db_scalar("select emp_name from tbl_emp where 1 and emp_reg_id='$_REQUEST[doc_emp_id]'")?><span style="font-size:24px;color:#000000;font-weight:bold;margin-top:10px;">'s Documents</span></p>	



	
	
	<table border="0" align="center" style="width:90%;margin-left:100px;margin-top:10px;margin-bottom:10px;" cellpadding="1">

	
	
	
	<tr>
<?php
$sql="select * from tbl_emp_doc where 1 and doc_emp_id='$_REQUEST[doc_emp_id]'";
$data=db_query($sql);
$i=0;
while($rec_doc=mysql_fetch_array($data)){
$i++;

if($rec_doc['doc_url']!=""){
?>
<td align="left">
<p align="center" style="padding-bottom:10px;width:180px;font-weight:bold;padding-top:25px;"><?=$rec_doc['doc_title']?></p>
<a href="Employee_Documents/<?=$rec_doc['doc_url']?>" target="_blank"><img src="Employee_Documents/<?=$rec_doc['doc_url']?>" height="280" width="200" style="border:solid 2px #0066CC;border-radius:4px;"  /></a>
</td>	
<?php
if($i%3==0){
echo "<tr></tr>";
}

}

}
?>
	
	
	</tr>
	</table>
	
	
	
	
	
	
	
	
		
	
	
	</td>
  </tr>
</table>
<?php include("footer.php");?>


</body>
</html>