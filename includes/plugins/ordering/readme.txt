static function
midas_ordering::dropdown($table_name, $column_order, $cur_order, $column_id, $where_clause='')

usage:
<?=midas_ordering::dropdown('pages', 'page_display_order', $page_display_order, 'page_id','page_parent_id=0')?>