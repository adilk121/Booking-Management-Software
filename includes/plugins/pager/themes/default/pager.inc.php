<?
//print_r($this);
if(!$this->needs_paging) {
	return '';
}
?>
<link href="<?=$this->css?>" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td  width="11%" align="center" style="padding-top:6px;"><a href="<?=$this->first_page?>" class="pager_link" style="color:#000000;font-weight:bold;font-size:14px;">First</a></td>
    <td  width="14%" align="center" style="padding-top:6px;" nowrap><? if($this->has_previous()) {?><a href="<?=$this->previous_page?>" class="pager_link" style="font-weight:bold;color:#333333;font-size:14px;" >&laquo; Previous <?=$this->records_per_page?></a> <? }?></td>
	<td align="center" style="padding-top:6px;"> <?
	$arr_numbered_links = $this->get_numbered_links();
	foreach($arr_numbered_links as $page_num => $link) {
		if($page_num==$this->current_page) {
			?> <span class="pager_current_page" style="font-size:20px;color:#0066FF;font-weight:bold"><?=$page_num?></span> <?
		} else{
			?> <a href="<?=$link?>" class="pager_link" style="color:#333333;font-weight:bold;font-size:13px;"><?=$page_num?></a> <?
		}
	}
	?></td>
    <td  width="13%" align="center" style="padding-top:6px;" nowrap>
	<? if($this->has_next()) {?><a href="<?=$this->next_page?>" class="pager_link" style="font-weight:bold;color:#333333;font-size:14px;" >Next <?
	if( ($this->start+ ($this->records_per_page*2)) >  $this->total_records){
		echo($this->total_records-($this->start+$this->records_per_page ));
	} else {
		echo ($this->records_per_page);
	}
	?> &raquo;</a> <? }?></td>
    <td  width="10%" align="center" style="padding-top:6px;" ><a href="<?=$this->last_page?>" class="pager_link" style="color:#000000;font-weight:bold;font-size:14px;">Last</a></td>
  </tr>
</table>