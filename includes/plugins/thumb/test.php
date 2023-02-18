<?
include('../../includes/dbsmain.inc.php');
?>
<img src="<?=midas_thumb::show_thumb(plugin_ws_path('thumb').'/Blue hill\'s picture.jpg', 200,130,'width_height')?>" />
<img src="<?=midas_thumb::show_thumb(dirname(__FILE__).'/Blue hill\'s picture.jpg', 200,130,'width')?>" />
<img src="<?=midas_thumb::show_thumb(dirname(__FILE__).'/Blue hill\'s picture.jpg', 200,130,'height')?>" />
<img src="<?=midas_thumb::show_thumb(dirname(__FILE__).'/Blue hill\'s picture.jpg', 200,120,'crop')?>" />
<img src="<?=midas_thumb::show_thumb(dirname(__FILE__).'/Blue hill\'s picture.jpg', 200,130,'distort')?>" />
<img src="<?=midas_thumb::show_thumb(dirname(__FILE__).'/Blue hill\'s picture.jpg', 1000,1000,'width')?>" />
<img src="<?=midas_thumb::show_thumb(dirname(__FILE__).'/Blue hill\'s picture.jpg', 1000,1000,'distort')?>" />