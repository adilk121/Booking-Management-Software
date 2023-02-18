<?
require_once("../../../dbsmain.inc.php");
$query=$_REQUEST['query'];
db_query("$query");
?>