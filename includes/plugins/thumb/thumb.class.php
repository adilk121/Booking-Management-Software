<?
class midas_thumb {
	function get_thumb_vars($imgPath, $newWidth, $newHeight, $ratio_type) {
		// options for ratio type = width|height|width_height|distort|crop
		$size = getimagesize($imgPath); 
		// break and return false if failed to read image infos
		if (!$size) {
			if ($verbose) {
				echo "Unable to read image info.";
			}
			return false;
		} 
		$curWidth = $size[0];
		$curHeight = $size[1];
		$fileType = $size[2];
		// width/height ratio
		$ratio =  $curWidth / $curHeight;
		$thumbRatio = $newWidth / $newHeight;
		$srcX = 0;
		$srcY = 0;
		$srcWidth = $curWidth;
		$srcHeight = $curHeight;
		if($ratio_type=='width_height' || $ratio_type=='height_width') {
			$tmpWidth = $newHeight * $ratio;
			if($tmpWidth > $newWidth) {
				$ratio_type='width';
			} else {
				$ratio_type='height';
			}
		}
		if($ratio_type=='width') {
			// If the dimensions for thumbnails are greater than original image do not enlarge
			if($newWidth > $curWidth) {
				$newWidth = $curWidth;
			}
			$newHeight = $newWidth / $ratio;
		} else if($ratio_type=='height') {
			// If the dimensions for thumbnails are greater than original image do not enlarge
			if($newHeight > $curHeight) {
				$newHeight = $curHeight;
			}
			$newWidth = $newHeight * $ratio;
		} else if($ratio_type=='crop') {
			if($ratio < $thumbRatio) {
				$srcHeight = round($curHeight*$ratio/$thumbRatio);
				$srcY = round(($curHeight-$srcHeight)/2);
			} else {
				$srcWidth = round($curWidth*$thumbRatio/$ratio);
				$srcX = round(($curWidth-$srcWidth)/2);
			}
		} else if($ratio_type=='distort') {
			/*
			// If the dimensions for thumbnails are greater than original image do not enlarge
			if($newWidth > $curWidth) {
				$newWidth = $curWidth;
			}
			if($newHeight > $curHeight) {
				$newHeight = $curHeight;
			}*/
		}
		$arr['ratio'] = $ratio;
		$arr['thumbRatio'] = $thumbRatio;
		$arr['curWidth'] = $curWidth;
		$arr['curHeight'] = $curHeight;
		$arr['newWidth'] = $newWidth;
		$arr['newHeight'] = $newHeight;
		$arr['srcWidth'] = $srcWidth;
		$arr['srcHeight'] = $srcHeight;
		$arr['srcX'] = $srcX;
		$arr['srcY'] = $srcY;
		$arr['fileType'] = $fileType;
		return $arr;
	}

	function make_thumb_imagemagick($imgPath, $destPath, $newWidth, $newHeight, $ratio_type = 'width', $quality = 80, $verbose = false)
	{ 
		$quality = 80;
		$arr_thumb_vars = midas_thumb::get_thumb_vars($imgPath, $newWidth, $newHeight, $ratio_type);
		//echo("<br>$imgPath, $destPath, $newWidth, $newHeight, $ratio_type, $quality");
		@extract($arr_thumb_vars);
		switch ($ratio_type) {
			case 'width':
				//$height = $newWidth* $arr_thumb_vars['curHeight']/ $arr_thumb_vars['curWidth'];
				$height = $newWidth* $arr_thumb_vars['newHeight']/ $arr_thumb_vars['newWidth'];
				$cmd ="convert -resize ".$newWidth.'x'."$height  -quality $quality \"$imgPath\" \"$destPath\" ";
				break;
			case 'height':
				//$width = $newHeight* $arr_thumb_vars['curWidth']/ $arr_thumb_vars['curHeight'];
				$width = $newHeight* $arr_thumb_vars['newHeight']/ $arr_thumb_vars['newHeight'];
				$cmd ="convert -resize $width".'x'.$newHeight." -quality $quality \"$imgPath\" \"$destPath\" ";
				break;
			case 'width_height':
				$cmd ="convert -resize ".$arr_thumb_vars['newWidth'].'x'.$arr_thumb_vars['newHeight']." -quality $quality \"$imgPath\" \"$destPath\" ";
				break;
			case 'distort':
				$cmd ="convert -resize !".$newWidth.'x'.$newHeight." -quality $quality \"$imgPath\" \"$destPath\" ";
				break;
			case 'crop':
				//-crop widthxheight{+-}x{+-}y{%}
				//print_r($arr_thumb_vars);
				if($arr_thumb_vars['srcX']==0) {
					$width = $arr_thumb_vars['newWidth'];
					$height = round($arr_thumb_vars['newWidth']/$arr_thumb_vars['ratio']);
					$x = 0;
					$y = ($arr_thumb_vars['srcY']*$height)/$arr_thumb_vars['curHeight'];
					///$y = ($arr_thumb_vars['srcY']*$height)/$arr_thumb_vars['newHeight'];
				} else {
					$height = $arr_thumb_vars['newHeight'];
					$width = round($arr_thumb_vars['newHeight']*$arr_thumb_vars['ratio']);
					$x = ($arr_thumb_vars['srcX']*$width)/$arr_thumb_vars['curWidth'] ;
					///$x = ($arr_thumb_vars['srcX']*$width)/$arr_thumb_vars['newWidth'] ;
					$y = 0;
				}
				$cmd ="convert -resize ".$width.'x'.$height." -crop ".$arr_thumb_vars['newWidth'].'x'.$arr_thumb_vars['newHeight']."+".$x."+".$y." -quality $quality \"$imgPath\" \"$destPath\" ";
			break;
		}
		system($cmd);
		//echo("<br>cmd:$cmd");
		//exit;
	}

	function make_thumb_gd($imgPath, $destPath, $newWidth, $newHeight, $ratio_type = 'width', $quality = 70, $verbose = false)
	{ 
		// options for ratio type = width|height|width_height|distort|crop

		$arr_thumb_vars = midas_thumb::get_thumb_vars($imgPath, $newWidth, $newHeight, $ratio_type);

		$curWidth = $arr_thumb_vars['curWidth'];
		$curHeight = $arr_thumb_vars['curHeight'];
		$newWidth = $arr_thumb_vars['newWidth'];
		$newHeight = $arr_thumb_vars['newHeight'];
		$srcWidth = $arr_thumb_vars['srcWidth'];
		$srcHeight = $arr_thumb_vars['srcHeight'];
		$srcX = $arr_thumb_vars['srcX'];
		$srcY = $arr_thumb_vars['srcY'];
		$fileType = $arr_thumb_vars['fileType'];

		// create image
		switch ($fileType) {
		case 1:
			if (function_exists("imagecreatefromgif")) {
				$originalImage = imagecreatefromgif($imgPath);
			} else {
				if ($verbose) {
					echo "GIF images are not support in this php installation.";
					return false;
				}
			} 
			$fileExt = 'gif';
			break;
		case 2: 
			$originalImage = imagecreatefromjpeg($imgPath);
			$fileExt = 'jpg';
			break;
		case 3: 
			$originalImage = imagecreatefrompng($imgPath);
			$fileExt = 'png';
			break;
		default:
			if ($verbose) {
				echo "Not a valid image type.";
			}
			return false;
		} 
		// create new image

		$resizedImage = imagecreatetruecolor($newWidth, $newHeight);
		//echo "$srcX, $srcY, $newWidth, $newHeight, $curWidth, $curHeight";
		//echo "<br>$srcX, $srcY, $newWidth, $newHeight, $srcWidth, $srcHeight<br>";
		imagecopyresampled($resizedImage, $originalImage, 0, 0, $srcX, $srcY, $newWidth, $newHeight, $srcWidth, $srcHeight);
		imageinterlace($resizedImage, 1);
		switch ($fileExt) {
			case 'gif':
				imagegif($resizedImage, $destPath, $quality);
				break;
			case 'jpg': 
				imagejpeg($resizedImage, $destPath, $quality);
				break;
			case 'png': 
				imagepng($resizedImage, $destPath, $quality);
				break;
		} 
		// return true if successfull
		return true;
	} 

	function make_thumb($imgPath, $destPath, $newWidth, $newHeight, $ratio_type = 'width', $method= 'imagemagick', $quality = 70, $verbose = false) {
		$newWidth = intval($newWidth);
		$newHeight = intval($newHeight);
		if($method== 'imagemagick' || $method== 'im' ) {
			midas_thumb::make_thumb_imagemagick($imgPath, $destPath, $newWidth, $newHeight, $ratio_type, $quality, $verbose);
		} else {
			midas_thumb::make_thumb_gd($imgPath, $destPath, $newWidth, $newHeight, $ratio_type, $quality, $verbose);
		}
		return $destPath;
	}

	function show_thumb($file_org, $width, $height, $ratio_type = 'width', $method= '', $mode='php')
	{
		$width = intval($width);
		$height = intval($height);
		// mode php|embedded
		if($method=='') {
			if(LOCAL_MODE) {
				$method = 'gd';
			} else {
				$method = 'imagemagick';
			}
		}
		$file_fs_path = str_replace("\\", '/', $file_org);
		$file_fs_path = str_replace(SITE_WS_PATH, SITE_FS_PATH, $file_fs_path);
		//$file_fs_path = str_replace(SITE_SUB_PATH, SITE_FS_PATH, $file_fs_path);

		$file_ext = file_ext($file_org);
		if($file_ext!='gif' && $file_ext!='jpg' && $file_ext!='jpeg' && $file_ext!='jpe' && $file_ext!='png' && ($method=='imagemagick' || $method=='im')) {
			$file_ext = 'jpg';
		}
		//$cache_file = $width."x".$height.'__'.$ratio_type.'__'.filemtime($file_fs_path).'__'.preg_replace('/[\#% ]/','@',$file_name);
		
		$file_name = str_replace(SITE_FS_PATH."/", "", $file_fs_path);
		$file_name = str_replace("/", "^", $file_name);
		$dot_pos = strrpos($file_name, '.');
		if($dot_pos !== false) {
			$file_name = substr($file_name, 0, $dot_pos);
		}
		$cache_file = $width."x".$height.'__'.$ratio_type.'__'.filemtime($file_fs_path).'__'.$file_name.".".$file_ext;
		//echo("<br>cache_file:$cache_file");
		// echo("<br>cache_file: $cache_file");
		if(!is_file(SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file)) {
			if($mode=='php') {
				return get_absolute_dir(__FILE__)."/show_thumb.php?path=".urlencode(fs_to_absolute($file_fs_path))."&cache_file=".urlencode($cache_file)."&width=".$width."&height=".$height."&ratio_type=".$ratio_type."&method=".$method;
			} else {
				midas_thumb::make_thumb($file_fs_path, SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file, $width, $height, $ratio_type, $method);
				return SITE_WS_PATH."/".THUMB_CACHE_DIR."/".urlencode($cache_file);
			}
		} else {
			return SITE_WS_PATH."/".THUMB_CACHE_DIR."/".urlencode($cache_file);
		}
	}
}
?>