<?
require_once("../../dbsmain.inc.php");
//echo("<br>$source, $target, $table_name, $column_order, $column_id, $where_clause");
midas_ordering::change_order($source, $target, $table_name, $column_order, $column_id, $where_clause);
header("location: $return_path");
?>