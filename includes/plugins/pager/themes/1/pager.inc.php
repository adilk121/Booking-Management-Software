<?
//print_r($this);
if($this->records_per_page >= $this->total_records) {
	return '';
}
?>
<link href="<?=$this->css?>" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td  width="37%" align="center"><?
	$arr_numbered_links = $this->get_numbered_links();
	foreach($arr_numbered_links as $page_num => $link) {
		if($page_num==$this->current_page) {
			?>
      <span class="pager_current_page">
      <?=$page_num?>
      </span>
      <?
		} else{
			?>
      <a href="<?=$link?>" class="pager_link">
      <?=$page_num?>
      </a>
      <?
		}
	}
	?></td>
    <td  width="3%" align="center"><a href="<?=$this->first_page?>" class="pager_link">First</a></td>
    <td  width="28%" align="center" nowrap><? if($this->has_previous()) {?><a href="<?=$this->previous_page?>" class="pager_link">&laquo; Previous <?=$this->records_per_page?></a> <? }?></td>
	<td  width="14%" align="center" nowrap>
	<? if($this->has_next()) {?><a href="<?=$this->next_page?>" class="pager_link">Next <?
	if( ($this->start+ ($this->records_per_page*2)) >  $this->total_records){
		echo($this->total_records-($this->start+$this->records_per_page ));
	} else {
		echo ($this->records_per_page);
	}
	?> &raquo;</a> <? }?></td>
    <td  width="18%" align="center"><a href="<?=$this->last_page?>" class="pager_link">Last</a></td>
  </tr>
</table>
