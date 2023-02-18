<?
require_once("../../dbsmain.inc.php");

/*
// test 1 send simple email where to address is from db.
$midas_mail = new midas_mail();
$arr_vars['name'] = 'testy';
$arr_vars['address'] = 'agdfs fsd';
$midas_mail->send_tpl(1, $arr_vars);
*/
// test 2 specify own to address
$midas_mail = new midas_mail();
$arr_vars['name'] = 'testy';
$arr_vars['address'] = 'agdfs fsd';
$midas_mail->send_tpl(1, $arr_vars, 'man2@localhost.com', 'Maninder Singh');


// test 3 send pl to multiple recipient
$midas_mail = new midas_mail();
$arr_email_tpl  = $midas_mail->get_email_tpl(1);
//print_r($arr_email_tpl);
for($i=2;$i<4;$i++) {
	$arr_vars['name'] = $i;
	$arr_vars['address'] = $i;

	$midas_mail->send_tpl_array($arr_email_tpl, $arr_vars, 'man'.$i.'@localhost.com');
}

?>