<?
class pager {
	var $total_records = 0;
	var $records_per_page = 25;
	var $template= 'paging_default.inc.php';
	var $qry_str= '';

	function pager($total_records, $records_per_page, $start='0', $template='paging_default.inc.php') {
		$this->total_records = $total_records;
		$this->records_per_page = $records_per_page;
		$this->template = $template;
		$this->start = $start;

		$this->page_name = $_SERVER['PHP_SELF'];
		$qry_str = $_SERVER['argv'][0];

		$tmp = $_GET;
		unset($tmp['start']);

		$this->qry_str = qry_str($tmp);
		$this->total_pages = ceil($this->total_records/$this->records_per_page);

	}

	function show()	{
		include($this->template);
	}
	
	function has_previous() {
		return $this->start != 0 ? true : false;
	}
	
	function has_next() {
		return $this->start + $this->records_per_page < $this->total_records):true:false;
	}

	function is_current_page($page_num) {
		 return ($this->records_per_page*($page_num))==$this->start):true:false;
	}

	function first_page() {
		return $this->page_name.$this->qry_str."&start=0";
	}
	
	function previous_page() {
		return $this->page_name.$this->qry_str."&start=".($this->start - $this->records_per_page);
	}
	
	function next_page() {
		return $this->page_name.$this->qry_str."&start=".($this->start + $this->records_per_page);
	}

	function last_page() {
		$mod = $reccnt % $pagesize;
		if ($mod == 0) {
			$mod = $pagesize;
		}
		return $this->page_name.$this->qry_str."&start=".($this->total_records-$mod);
	}


	function get_page_link($page_num) {
		return $this->page_name.$this->qry_str."&start=".$this->records_per_page*($page_num-1);
	}

	function get_numbered_links() {
		$j=$this->start/$this->records_per_page-5;
		if($j<0) {
			$j=0;
		}
		$k = $j+10;

		$num_pages=$this->total_pages();

		if($k>$num_pages)	{
			$k=$num_pages;
		}

		$j = floor($j);
		$arr_numbered_links = array();
		for($i=$j+1;$i<=$k;$i++) {
			$arr_numbered_links[$i] = get_page_link($i);
		}
	}
}
?>