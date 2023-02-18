<?
include("webClass.php");
$conObj=new Myclass();
$dbObj=new Dbquery();
if(strlen($id2)){
	$Num1=$dbObj->NumRows($dbObj->query("select * from manage_member where member_userid='$id2'"));
	if($Num1>0){
		$str='<span  class="txt_content"><font color="red"><strong>User Name is Not Available</strong></font></span>';	
	}
	else{
		$str='<span  class="txt_content"><font color="green"><strong>User Name is Available</strong></font></span>';	
	}
	echo $str;
}
?>