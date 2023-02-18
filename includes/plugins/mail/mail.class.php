<?
require_once(dirname(__FILE__)."/phpmailer/class.phpmailer.php");

define('EMAIL_TPL_PATH', SITE_FS_PATH.'/includes/mail/templates');

class midas_mail {
	var $var_start_tag = '{';
	var $var_end_tag = '}';
	
	function midas_mail() {
		
	}
	
	function specific_options($mail) {
		$mail->SetLanguage('en', dirname(__FILE__).'/phpmailer/language/');
		$mail->IsMail();
		return $mail;
	}

	function simple_mail($to, $to_name, $from, $from_name, $subject, $message, $type='html', $reply_to='', $email_cc ='', 
$email_bcc='', $return_path='') {
		$mail = new PHPMailer();
		$mail = $this->specific_options($mail);
		$mail->From     = $from;
		$mail->FromName = $from_name;
		$mail->Subject = $subject;
		if(strtolower($type)=='html') {
			$mail->IsHTML =true;
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
		} else {
			$mail->IsHTML =false;
		}
		$mail->Body = $message;
		$mail->AddAddress($to, $to_name);
		//print_r($mail);
		if(!$mail->Send()) {
		  $this->error = $mail->ErrorInfo;
  		  return false;
		} else {
		  return true;
		}
	}
	
	function get_email_tpl($email_id) {
		$sql = "select * from tbl_emails where email_id='$email_id'";
		$result = db_query($sql);
		if ($line_raw = mysql_fetch_array($result)) {
			$message = file_get_contents(EMAIL_TPL_PATH.'/'.$line_raw['email_file']);
			$line_raw['message'] = $message;
			return $line_raw;
		} else {
			die("email template does not exists");
		}
	}

	// following function needs improvement. Perhaps break down in 2 functions.
	function replace_vars($add_query, $arr_vars) {
		if(is_array($arr_vars)) { 
			$arr_vars_keys = array_keys($arr_vars);
			foreach($arr_vars_keys as $key) {
				$arr_tmp[] = '/'.$this->var_start_tag.$key.$this->var_end_tag.'/im';
			}
			$arr_vars_keys = $arr_tmp;
			$arr_vars_values = array_values($arr_vars);
			$add_query = preg_replace($arr_vars_keys, $arr_vars_values, $add_query);
		}
		return $add_query;
	}

	function send_tpl($email_id, $arr_vars='', $to='', $to_name='', $from='', $from_name='') {
		$arr_email_tpl = $this->get_email_tpl($email_id);
		$subject = $this->replace_vars($arr_email_tpl['email_subject'], $arr_vars);
		$message = $this->replace_vars($arr_email_tpl['message'], $arr_vars);

		if($to=='') {
			$to = $arr_email_tpl['email_to'];
		}
		if($from=='') {
			$from = $arr_email_tpl['email_from'];
		}
		
		return $this->simple_mail($to, $to_name, $from, $from_name, $subject, $message, $arr_email_tpl['email_content_type'], $arr_email_tpl['reply_to'], $arr_email_tpl['email_cc'], $arr_email_tpl['email_bcc'], $arr_email_tpl['return_path']);
	}
	
	function send_tpl_array($arr_email_tpl, $arr_vars='', $to='', $to_name='', $from='', $from_name='') {
		if(!is_array($arr_email_tpl)) {
			die("function midas_mail::send_tpl_array(): first parameter should be an array");
		}
		$subject = $this->replace_vars($arr_email_tpl['email_subject'], $arr_vars);
		$message = $this->replace_vars($arr_email_tpl['message'], $arr_vars);

		if($to=='') {
			$to = $arr_email_tpl['email_to'];
		}
		if($from=='') {
			$from = $arr_email_tpl['email_from'];
		}
		
		return $this->simple_mail($to, $to_name, $from, $from_name, $subject, $message, $arr_email_tpl['email_content_type'], $arr_email_tpl['reply_to'], $arr_email_tpl['email_cc'], $arr_email_tpl['email_bcc'], $arr_email_tpl['return_path']);
	}
}
?>