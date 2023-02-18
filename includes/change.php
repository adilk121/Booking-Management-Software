<?
require_once("dbsmain.inc.php");
$query=str_replace("-"," ",$_REQUEST['query']);
if(!empty($query)){
mysql_query("$query");
}
?>
