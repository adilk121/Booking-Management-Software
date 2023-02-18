<?
class midas_ordering {
	function midas_ordering() {
		return true;
	}

	function dropdown($table_name, $column_order, $cur_order, $column_id, $where_clause='') {
		global $CACHE_ORDERING_DROPDOWNS;
		if($CACHE_ORDERING_DROPDOWNS[$table_name.$column_order.$column_id.$where_clause]!='') {
			$arr = $CACHE_ORDERING_DROPDOWNS[$table_name.$column_order.$column_id.$where_clause];
		} else{
			$sql = "select count(*) from $table_name ";
			if($where_clause!='') {
				$sql .= " where $where_clause ";
			}
			$count = db_scalar($sql );
			for($i=1; $i<=$count; $i++) {
				$arr[$i] = $i;
			}
			$CACHE_ORDERING_DROPDOWNS[$table_name.$column_order.$column_id.$where_clause] = $arr;
		}

		//$arr = range(1, $count );
		$dropdown = array_dropdown( $arr, $cur_order, 'change_order_'.$cur_order, 'onchange="location.href=\''.midas_ordering::get_link($table_name, $column_order, $column_id, $where_clause, $cur_order).'&target=\'+this.value"');
		return $dropdown;
	}
	
	function get_link($table_name, $column_order, $column_id, $where_clause, $source, $target='') {
		$link = get_absolute_dir(__FILE__).'/change_order.php?return_path='.urlencode($_SERVER['REQUEST_URI']).'&table_name='.$table_name.'&column_order='.$column_order.'&where_clause='.urlencode($where_clause).'&column_id='.$column_id.'&source='.$source;
		if($target!='') {
			$link = $link.'&target='.$target;
		}
		return $link;
	}

	function change_order($source, $target, $table_name, $column_order, $column_id, $where_clause='') {
		$move_by = $target-$source;
		if($move_by==0) {
			reorder_list($column_id, $table_name, $where_clause);
			return;
		}
		
		$source_id = db_scalar("select $column_id from $table_name where $column_order=$source ".($where_clause==''?'':" and $where_clause"));

		if($move_by>0) {
			$sql = " update	$table_name	set	$column_order=$column_order-1 where $column_order > $source and $column_order <= $target ";
		} else {
			$sql = " update	$table_name	set	$column_order=$column_order+1 where $column_order < $source and $column_order >= $target ";
		}

		if($where_clause!='') {
			$sql .= " and $where_clause ";
		}
		//echo("<br>sql:$sql");
		db_query($sql);

		$sql = " update	$table_name	set	$column_order=$target where $column_id= $source_id ".($where_clause==''?'':" and $where_clause");
		//echo("<br>sql:$sql");
		db_query($sql);
	}

	function reorder_list($column_order, $column_id, $table_name, $where_clause)
	{
		$sql = " select	$column_id,	$column_order from	$table_name	";
		if(trim($where_clause)!='') {
			$sql .= " where $where_clause ";
		}
		$sql .= " order by $column_order ";
		// echo	"<br>$sql<br>";
		$result	= db_query($sql);
		$i = 1;
		while ($line = mysql_fetch_array($result)) {
			$sql = " update	$table_name	set	$column_order='$i' where $column_id='$line[0]' ".($where_clause==''?'':" and $where_clause");
			// echo	"<br>$sql<br>";
			db_query($sql);
			$i++;
		}
	}
}
?>