<?
include('../../dbsmain.inc.php');
if($_FILES) {
	$uploader = new midas_uploader($_FILES['photo'], 'test', 'image', 25*1024, 'custom', 'sdsf');
	$name = $uploader->save();
	if($uploader->has_error) {
		echo ':'.$uploader->error_code;
	}
}
?>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
  <input name="photo" type="file" id="photo" />
  <input type="submit" name="Submit" value="Submit" />
</form>
