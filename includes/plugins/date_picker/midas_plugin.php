<?
define('DATE_PICKER_WS_PATH', SITE_SUB_PATH.'/'.PLUGINS_DIR.'/date_picker');

function date_picker_includes()
{
	if(!defined('JSCAL_INCLUDED')) {
		define('JSCAL_INCLUDED', true);
		ob_start();
		include(dirname(__FILE__).'/date_pick_files.inc.php');
		$date_picker = ob_get_contents();
		ob_end_clean();
	}
	return $date_picker ;
}

/*function get_date_picker($jscal_input_name, $jscal_def_date='', $validation = 'date|yyyy/mm/dd|-', $validation_msg = 'Date should be in yyyy-mm-dd format')
{
	$date_picker = date_picker_includes();
	ob_start();
	include(dirname(__FILE__).'/date_pick.inc.php');
	$date_picker .= ob_get_contents();
	ob_end_clean();
	return $date_picker;
}

function get_datetime_picker($jscal_input_name, $jscal_def_date='', $validation = 'date|yyyy/mm/dd|-', $validation_msg = 'Date should be in yyyy-mm-dd format')
{
	$date_picker = date_picker_includes();

	ob_start();
	include(dirname(__FILE__).'/datetime_pick.inc.php');
	$date_picker .= ob_get_contents();
	ob_end_clean();
	return $date_picker;
}

function mysql_to_date_picker($date)
{
	if(strlen($date)<10) {
		return '';
	}
	list($year, $month, $day) = explode('-', $date);
	return "$month/$day/$year";
}

function date_picker_to_mysql($date)
{
	if(strlen($date)<10) {
		return '';
	}
	list($month, $day, $year) = explode('/', $date);
	return "$year-$month-$day";
}

function mysql_to_datetime_picker($datetime)
{
	if(strlen($datetime)<10) {
		return '';
	}
	list($date, $time) = explode(' ', $datetime);
	list($year, $month, $day) = explode('-', $date);
	list($hour, $minute, $second) = explode(':', $time);
	return "$month/$day/$year $hour:$minute:$second";
}

function datetime_picker_to_mysql($datetime)
{
	if(strlen($datetime)<10) {
		return '';
	}
	list($date, $time) = explode(' ', $datetime);
	list($month, $day, $year) = explode('/', $date);
	list($hour, $minute, $second) = explode(':', $time);
	return "$year-$month-$day $hour:$minute:$second";
}
*/
function get_date_picker($jscal_input_name, $jscal_def_date='', $validation = 'date|yyyy/mm/dd|-', $validation_msg = 'Date should be in yyyy-mm-dd format'){
	?>
	<input type="text" name="<?=$jscal_input_name?>" id="<?=$jscal_input_name?>" value="<?=$jscal_def_date?>" readonly/><a href="javascript:NewCssCal('<?=$jscal_input_name?>','yyyymmdd','dropdown',false,24,false)"><img src="images/cal.gif" width="16" height="16" alt="Pick a date" border=0></a>
	<?
}
function get_datetime_picker($jscal_input_name, $jscal_def_date='', $validation = 'date|yyyy/mm/dd|-', $validation_msg = 'Date should be in yyyy-mm-dd format'){
	?>
	<input type="text" name="<?=$jscal_input_name?>" id="<?=$jscal_input_name?>" value="<?=$jscal_def_date?>" readonly/><a href="javascript:NewCssCal('<?=$jscal_input_name?>','yyyymmdd','dropdown',true,24,false)"><img src="images/cal.gif" width="16" height="16" alt="Pick a date" border=0></a>
	<?
}

?>