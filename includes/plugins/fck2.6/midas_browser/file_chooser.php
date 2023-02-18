<?php
require_once("../../../dbsmain.inc.php");

$cur_dir = $_REQUEST['cur_dir'];

if($_SESSION['sess_mem_type']=='User') {
	$fck_files_path = '/uploaded_files/fck/members/'.$_SESSION['sess_mem_id']; 
	@mkdir(SITE_FS_PATH.$fck_files_path.'/'.$cur_dir);

	chdir(SITE_FS_PATH.$fck_files_path.$cur_dir);
} else {
	$fck_files_path = '/uploaded_files/fck';
	chdir(SITE_FS_PATH.$fck_files_path.'/'.$cur_dir);
}


if($_GET['view']!='') {
	$_SESSION['file_chooser_view'] = $_GET['view'];
}

$cwd = getcwd();

switch($_REQUEST['action']) {
	case 'upload_file':
		$uploader= new midas_uploader($_FILES['file'], 'File', $cwd, '', 2*1024*1024, 'original');
		if($uploader->has_error) {
			$msg = $uploader->error_message;
			break;
		} 
		$name = $uploader->save();
		$msg = 'File has been uploaded successfully';
		break;
	case 'make_dir':
		if($_REQUEST['new_dir']=='') {
			break;
		}
		mkdir($cwd.'/'.$_REQUEST['new_dir']);
		$msg = 'Folder has been created successfully';
		break;
	case 'del_file':
		if($_REQUEST['file']=='') {
			break;
		}
		unlink($cwd.'/'.$_REQUEST['file']);
		$msg = 'File has been deleted successfully';
		break;
	case 'del_dir':
		if($_REQUEST['file']=='') {
			break;
		}
		chdir($_REQUEST['file']);
		$num_files = count(glob('*'));
		chdir('..');
		if($num_files!=0) {
			$msg = 'Only empty folders can be deleted';;
			break;
		}
		rmdir($cwd.'/'.$_REQUEST['file']);
		$msg = 'Folder has been deleted successfully';
		
		break;
}
/*
if($cur_dir=='') {
	$cur_dir=SITE_SUB_PATH.$fck_files_path;
}
if(strpos(SITE_SUB_PATH.$fck_files_path)===false) {
	die("invalid call");
}
*/

if($keyword=='') {
	$keyword='*';
}
?>
<style>
* {
font-family:tahoma, Arial, Helvetica, sans-serif;
font-size:11px;
}
.style1 {font-weight: bold}
</style>
<script language="JavaScript">
<!--
function choose_file(filename, width, height, alt)
{
        // window.opener.SetUrl( filename, width, height, alt);
        window.opener.SetUrl( filename, width, height, alt ) ;
        window.close() ;
}
//-->
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
      &nbsp;Upload File:
      <input type="file" name="file" />
      <input name="cur_dir" type="hidden" id="cur_dir" value="<?=$cur_dir?>" />
      <input name="action" type="hidden" id="action" value="upload_file" />
      <input name="Go" type="submit" id="Go" value="Go" />
    </form></td>
    <?php /*?><td><form id="form2" name="form2" method="get" action="">
      &nbsp;Create Folder:
      <input name="new_dir" type="text" id="new_dir" />
      <input name="cur_dir" type="hidden" id="cur_dir" value="<?=$cur_dir?>" />
      <input name="action" type="hidden" id="action" value="make_dir" />
      <input name="Go" type="submit" id="Go" value="Go" />
    </form></td><?php */?>
  </tr>
  <tr>
    <?php /*?><td><form id="form1" name="form1" method="get" action="" >
      &nbsp;Search:
      <input name="keyword" type="text" id="keyword" value="<?=$keyword?>" />
      <input name="cur_dir" type="hidden" id="cur_dir" value="<?=$cur_dir?>" />
      <input name="action" type="hidden" id="action" value="search" />
      <input type="submit" name="Submit" value="Search" />
      (Case Sensitive)
    </form></td><?php */?>
    <td colspan="2">&nbsp;View: <a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>&amp;view=list">List</a> | <a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>&amp;view=thumbnails">Thumbnails</a> </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  
  <tr>
    <td><hr size="1" noshade="noshade" /></td>
  </tr>
  <tr>
    <td><strong>Current Directory:</strong> <a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=">Top</a>
      <?
	$tmp = str_replace(SITE_SUB_PATH.$fck_files_path,'',$cur_dir);
	$arr_dirs = explode('/', $cur_dir);
	$num_dirs = count($arr_dirs);
	//print_r($arr_dirs);
	$arr_dirs = array_filter($arr_dirs, 'blank_filter');
	$arr_dirs = array_values($arr_dirs);
	for ($i = 0; $i < count($arr_dirs); $i++) {
			$add_query_dirs .= '/'.$arr_dirs[$i];
			?>
/ <a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$add_query_dirs?>">
<?=$arr_dirs[$i]?>
</a>
<?
	}
	?></td>
  </tr>
</table>
<? if($msg!='') {?>
<div align="center" style="color: #FF0000">
  <?=$msg?>
</div>
<? }?>
<?
$arr = glob($keyword);
sort($arr);
if(count($arr)==0 ) {
?>
<div align="center" class="style1" style="color: #FF0000"> No files found </div>
<strong>
<?
} else{
	
		
			?>
</strong>
<div>
  <? if($_SESSION['file_chooser_view']=='list') {
	  ?>
  <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
    <?
	  foreach ( $arr as $filename) {  $bgcolor=='#f1f3f8'?$bgcolor='#f0f0f0':$bgcolor='#f1f3f8';?>
   
  <? if(is_dir($filename))  {?>
  <tr bgcolor="<?=$bgcolor?>">
    <td width="3%"><a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>/<?=$filename?>"><img src="folder_small.gif" alt="<?=$filename?>" border="0" /></a></td>
    <td width="68%"><a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>/<?=$filename?>">
      <?=$filename?>
    </a></td>
    <td width="11%">&nbsp;</td>
    <td width="9%" align="center"><a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>/<?=$filename?>">Open</a></td>
    <td width="9%" align="center"><a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>&amp;file=<?=$filename?>&amp;action=del_dir">Delete</a></td>
  </tr>
  <? } else {?>
  <tr bgcolor="<?=$bgcolor?>">
    <td><a href="javascript:void(choose_file('<?=SITE_WS_PATH.$fck_files_path.$cur_dir?>/<?=$filename?>'))"><img src="file_small.gif" alt="<?=$filename?>" border="0" /></a></td>
    <td width="68%"><a href="javascript:void(choose_file('<?=SITE_WS_PATH.$fck_files_path.$cur_dir?>/<?=$filename?>'))">
      <?=$filename?>
    </a></td>
    <td width="11%" align="center"><?=file_size_format(filesize($filename))?></td>
    <td width="9%" align="center"><a href="javascript:void(choose_file('<?=SITE_WS_PATH.$fck_files_path.$cur_dir?>/<?=$filename?>'))">Select</a> </td>
    <td width="9%" align="center"><a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>&amp;file=<?=$filename?>&amp;action=del_file">Delete</a></td>
  </tr>
  <? } } ?>
  </table>
  <?} else {  ?>
  <table border="0" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
    <tr >
      <? $i=0; foreach ( $arr as $filename) { $bgcolor=='#f1f3f8'?$bgcolor='#f0f0f0':$bgcolor='#f1f3f8';?>
      <? if($i%5==0) { echo '</tr><tr>';}$i++; if(is_dir($filename))  {?>
      <td width="125" height="125" align="center" bgcolor="<?=$bgcolor?>"><a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>/<?=$filename?>"><img src="folder_big.gif" alt="<?=$filename?>" width="40" height="39" border="0" /></a> <br />
          <?=$filename?>
          <br />
          <br />
        <a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>&amp;file=<?=$filename?>&amp;action=del_dir">Delete</a></td>
      <? } else {
	  	$ext = file_ext($filename);
		//echo("<br>ext:$ext");
		if($ext=='jpg' || $ext=='jpeg' || $ext=='jpe' || $ext=='gif' || $ext=='png') {
			$icon = midas_thumb::show_thumb(SITE_WS_PATH.$fck_files_path.'/'.$cur_dir.'/'.$filename, 100,100, 'width_height');
		} else {
			$icon = 'file_big.gif';
		}
		?>
      <td width="125" height="125" align="center" bgcolor="<?=$bgcolor?>"><a href="javascript:void(choose_file('<?=SITE_WS_PATH.$fck_files_path.$cur_dir?>/<?=$filename?>'))"><img src="http://www.ansh.com/uploaded_files/fck/<?=$filename?>" alt="<?=$filename?>" border="0"  height="100" width="100"/></a> <br />
          <?=$filename?>
          <br />
          <br />
        <a href="<?=$_SERVER['SCRIPT_PATH']?>?cur_dir=<?=$cur_dir?>&amp;file=<?=$filename?>&amp;action=del_file">Delete</a></td>
      <? }?>
      <? }?>
    </tr>
  </table>
  <? }?>
</div>
<? }?>
