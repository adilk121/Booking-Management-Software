<?

class midas_uploader {
	var $field = '';
	var $banned_exts = array('', 'php', 'php3', 'inc', 'exe', 'bat');
	var $arr_exts = array(
	'image' => array('jpg', 'jpeg', 'gif', 'png'), 
	'doc' => array('doc', 'xls', 'pdf', 'ppt', 'docx', 'xlsx', 'pptx')
	);
	var $has_error = false;
	var $display_name = 'file';
	var $error_code = '';
	var $error_message = '';

	var $file_name = '';
	var $field_name = '';
	var $dir = '';
	var $file_type = '';
	var $max_size = '';
	var $name_type = '';
	var $custom_name = '';

	function midas_uploader($arr_field, $display_name ,$dir, $file_type='', $max_size='', $name_type='random', $custom_name='') {
		// name_type original, random, postfix_random, custom
		if($arr_field['name']=='') {
			return false;
		}

		$this->field = $arr_field;
		$this->display_name = $display_name;
		$this->file_name = $this->field['name'];
		$this->field_name = $field_name;
		$this->dir = $dir;
		$this->file_type = $file_type;
		$this->max_size = $max_size;
		$this->name_type = $name_type;
		$this->custom_name = $custom_name;
		
		if(!is_dir($dir) && $dir !='.') {
			$this->set_error('DIR_NOT_EXISTS', 'The destination folder does not exists.');
			return;
		} else if(!LOCAL_MODE && !is_writable($dir)) {
			$this->set_error('DIR_NOT_WRITABLE', 'The destination folder is not writable.');
			return;
		}

		// error handling works for php version > 4.2
		if($this->field['error']){
			if($this->field['error']==UPLOAD_ERR_INI_SIZE || $this->field['error']==UPLOAD_ERR_FORM_SIZE ) {
				$this->set_error('INI_SIZE', 'File uploaded exceeds max file size limit');
			} else {
				$this->set_error('SYSTEM_ERROR', 'System error while uploading file. Error Code: '.$this->field['error'].'.');
			}
		}

		if($max_size!='' && $max_size!='0' ) {
			if($this->field['size']==0 || $this->field['size']> $max_size) {
				$this->set_error('SIZE_ERROR', $display_name.' should be less than '.file_size_format($max_size).'.');
				return;
			}
		}

		$pos = strrpos($this->field['name'],'.');
		$this->file_name_wo_ext = substr($this->field['name'], 0, $pos);
		$this->file_ext = strtolower(substr($this->field['name'], $pos+1));
		$this->check_ext($file_type);

	}

	function save() {
		if($this->field['name']=='') {
			return false;
		}
		if($this->has_error) {
			return false;
		}

		switch($this->name_type) {
			case 'original':
				$target_name = str_replace("\\'", "'", $this->field['name']);
				break;
			case 'random':
				$target_name = md5(microtime()).'.'.$this->file_ext;
				break;
			case 'postfix_random':
				$target_name = str_replace("\\'", "'", $this->file_name_wo_ext.'__'.md5(microtime()).'.'.$this->file_ext);
				break;
			case 'custom':
				if($this->custom_name=='') {
					$this->custom_name = str_replace("\\'", "'", $this->field['name']);
				}
				$target_name = $this->custom_name;
				break;
		}
		//echo "<br>$this->dir.'/'.$target_name:".$this->dir.'/'.$target_name;
		copy($this->field['tmp_name'], $this->dir.'/'.$target_name );
		move_uploaded_file($this->field['tmp_name'], $this->dir.'/'.$target_name );
		$this->saved_file_name = str_replace("'", "\\'",  $target_name);
		return $this->saved_file_name;
	}
	
	function check_ext($ext){
		//mime_content_type('php.gif')
		// if array is passed
		if(is_array($ext)) {
			if(!in_array($this->file_ext, $ext)) {
				$this->set_error('WRONG_TYPE', $display_name.' is not a valid file. Only '.implode($ext, ', ').' files are allowed.');
			}
		} else if($ext!='' && strpos(',', $ext)){
			$arr_ext = explode(',', $ext);
			if(!in_array($this->file_ext, $arr_ext)) {
				$this->set_error('WRONG_TYPE', $display_name.' is not a valid file. Only '.implode($arr_ext, ', ').' files are allowed.');
			}
		} else {
			$ext = strtolower($ext);
			// if type is passed as string the we check for predefined types
			// check for banned exts
			if($ext=='') {
				if(in_array($this->file_ext, $this->banned_exts)) {
					$this->set_error('WRONG_TYPE', $display_name.' is of a banned file type. Banned file types are '.implode($this->banned_exts, ', ') );
				} 
			} else {
				if(!in_array($this->file_ext, $this->arr_exts[$ext])) {
					$this->set_error('WRONG_TYPE', 'File uploaded is not a valid '.$ext.' file. Only '.implode($this->arr_exts[$ext], ', ').' files are allowed.');
				}
			}
		}
	}
	
	function set_error($error_code, $error_message) {
		$this->has_error = true;
		$this->error_code = $error_code;
		$this->error_message = $error_message;
	}

}
?>