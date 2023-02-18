<?
$plugin_version = '0.1';
function get_fck_editor($control_name, $value='', $width='100%', $height='500', $toolbar_size='Default')
{
	if(!defined('WITHIN_FCK')) {
		require(dirname(__FILE__)."/fckeditor.php") ;
		define('WITHIN_FCK', '1');
	}
	
	$sBasePath = plugin_sub_path('fck2.6').'/';

	$oFCKeditor = new FCKeditor($control_name) ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $value;
	$oFCKeditor->Width		= $width;
	$oFCKeditor->Height		= $height;
	$oFCKeditor->ToolbarSet	= $toolbar_size;
	

	$oFCKeditor->Config['SkinPath'] = $sBasePath . 'editor/skins/silver/' ;

	$oFCKeditor->Config['UserFilesPath']	= SITE_SUB_PATH.'/uploaded_files/fck/';
	$oFCKeditor->Config['ImageBrowserURL']	= $sBasePath.'/midas_browser/file_chooser.php?main_dir=image&cur_dir=';
	$oFCKeditor->Config['LinkBrowserURL']	= $sBasePath.'/midas_browser/file_chooser.php?main_dir=&cur_dir=';
	$oFCKeditor->Config['FlashBrowserURL']	= $sBasePath.'/midas_browser/file_chooser.php?main_dir=flash&cur_dir=';

	//$oFCKeditor->Config['EditorAreaCSS']	= SITE_WS_PATH.'/css/css.css';
	//echo("<br>GetConfigFieldString:".$oFCKeditor->GetConfigFieldString());
	$oFCKeditor->Create() ;
}

function get_fck_editor_frontend($control_name, $value='', $width='100%', $height='500')
{
	if(!defined('WITHIN_FCK')) {
		require(dirname(__FILE__)."/fckeditor.php") ;
		define('WITHIN_FCK', '1');
	}
	
	$sBasePath = plugin_sub_path('fck2.6').'/';

	$oFCKeditor = new FCKeditor($control_name) ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $value;
	$oFCKeditor->Width		= $width;
	$oFCKeditor->Height		= $height;
	$oFCKeditor->ToolbarSet = 'Basic' ;

	$oFCKeditor->Config['SkinPath'] = $sBasePath . 'editor/skins/silver/' ;

	$oFCKeditor->Config['UserFilesPath']	= SITE_SUB_PATH.'/uploaded_files/fck/members/'.$_SESSION['sess_mem_id'].'/';
	$oFCKeditor->Config['ImageBrowserURL']	= $sBasePath.'/midas_browser/file_chooser.php?main_dir=image&cur_dir=';
	$oFCKeditor->Config['LinkBrowserURL']	= $sBasePath.'/midas_browser/file_chooser.php?main_dir=&cur_dir=';
	$oFCKeditor->Config['FlashBrowserURL']	= $sBasePath.'/midas_browser/file_chooser.php?main_dir=flash&cur_dir=';
	$oFCKeditor->Config['UserFilesAbsolutePath']	= UP_FILES_FS_PATH.'/fck/members/'.$_SESSION['sess_mem_id'];
	//$oFCKeditor->Config['EditorAreaCSS']	= SITE_WS_PATH.'/css/css.css';

	$oFCKeditor->Create() ;
}
?>