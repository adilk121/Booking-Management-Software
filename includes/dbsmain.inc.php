<?
ini_set( "display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER['HTTP_HOST'] == "localhost") {
    define('LOCAL_MODE', true);
} else {
 	define('LOCAL_MODE', false);
}

// File system path
$tmp = dirname(__FILE__);
$tmp = str_replace('\\' ,'/',$tmp);
$tmp = substr($tmp, 0, strrpos($tmp, '/'));
define('SITE_FS_PATH', $tmp); 
// include all the library files needed here
require_once(SITE_FS_PATH."/includes/config.inc.php");
require_once(SITE_FS_PATH."/includes/funcs_lib.inc.php");
require_once(SITE_FS_PATH."/includes/funcs_cur.inc.php");
require(SITE_FS_PATH."/includes/arrays.inc.php");

session_start();
// 
$CURRENT_SUB_PATH = str_replace(SITE_FS_PATH, '/', dirname($_SERVER['PHP_SELF']));

$plugin_pos  = strpos($_SERVER['PHP_SELF'], '/'.PLUGINS_DIR.'/');
if($plugin_pos !== false) {
	$CURRENT_PLUGIN = substr($_SERVER['PHP_SELF'], $plugin_pos + strlen(PLUGINS_DIR)+2);
	$slash_pos = $plugin_pos  = strpos($CURRENT_PLUGIN, '/');
	$CURRENT_PLUGIN = substr($CURRENT_PLUGIN, 0, $slash_pos);
}
define('CURRENT_PLUGIN', $CURRENT_PLUGIN );

// Script start time used to test site performance
define('SCRIPT_START_TIME', getmicrotime());
//echo("<br>SCRIPT_START_TIME: ".SCRIPT_START_TIME);

// magic_quotes_gpc needs to be "on"
if(get_magic_quotes_gpc()==0) {
	$_GET		= ms_addslashes($_GET);
	$_POST		= ms_addslashes($_POST);
	$_COOKIE	= ms_addslashes($_COOKIE);
	@extract($_GET);
	@extract($_POST);
} else {
	$_GET		= ms_trim($_GET);
	$_POST		= ms_trim($_POST);
	$_COOKIE	= ms_trim($_COOKIE);
	import_request_variables('gp');
}


// magic_quotes_runtime needs to be "off"
if(get_magic_quotes_runtime()) {
	set_magic_quotes_runtime(0);
}

// load plugins
if ($handle = opendir(SITE_FS_PATH.'/'.PLUGINS_DIR)) { 
   while (false !== ($file = readdir($handle))) { 
       if ($file != "." && $file != "..") { 
		   $curr_dir = SITE_FS_PATH.'/'.PLUGINS_DIR.'/'.$file;
           if(is_dir($curr_dir)) {
			   if(file_exists($curr_dir.'/midas_plugin.php')) {
				   require_once($curr_dir.'/midas_plugin.php');
			   }
		   }
       } 
   } 
   closedir($handle); 
} 

$BASENAME = basename($_SERVER['PHP_SELF']);

// Protect admin pages
$PHP_SELF = $_SERVER['PHP_SELF'];
$admin_pos  = strpos($PHP_SELF, '/'.ADMIN_DIR.'/');
if($admin_pos !== false) {
	// Remove following comment to enable admin login check
	protect_admin_page();
}
//$AdminEmail=db_scalar("select admin_email from tbl_admin where admin_id='1'");
//$_SESSION['ADMIN_EMAIL']="$AdminEmail";

/*Updating members who have not signed out properly*/
$previous_datetime=date("Y-m-d H:i:s", mktime(date('H'),date('i'),date('s'),date('m'),date('d')-1,date('Y')));
//db_query("update ques_questions set user_online_status='No' where user_online_date <='$previous_datetime'");
define(ACCESS_ID,"303");
?>