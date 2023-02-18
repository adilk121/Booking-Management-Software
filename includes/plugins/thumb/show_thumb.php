<?php 
require_once("../../dbsmain.inc.php");
$path = stripslashes($path);
$cache_file = stripslashes($cache_file);
$width = intval($width);
$height = intval($height);

midas_thumb::make_thumb(absolute_to_fs($path), SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file, $width, $height, $ratio_type, $method);
header("location: ".fs_to_absolute(SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file));
?>