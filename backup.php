<?php
//create query to select as data from your table
		


mysql_connect("localhost","webkeyco_ems","IbOJ5FAVrwhp");

mysql_select_db("webkeyco_brighto_ems");

$str="emp_name,emp_age,emp_gender,emp_father_name,emp_mother_name,emp_dob,emp_b_group,emp_personal_c_no,emp_residence_c_no,emp_emergency_c_no,						emp_personal_email,emp_office_email,emp_desination,emp_dpt,emp_under,emp_bank_name,emp_bank,emp_ac_no,emp_bank_branch,emp_bank_neft_rtgs_code,emp_pan_no,emp_adhaar_no,emp_code,emp_salary,emp_param_adrs,emp_res_adrs,emp_join_date,emp_exp";

$select = "SELECT $str FROM tbl_emp";

//run mysql query and then count number of fields
$export = mysql_query( $select ) 
       or die ( "Sql error : " . mysql_error( ) );

$fields = mysql_num_fields ( $export );

for ( $i = 0; $i < $fields; $i++ ) {

$f_name=mysql_field_name( $export , $i );


if($f_name=="emp_name"){
$header .="Name". ",";
}
if($f_name=="emp_age"){
$header .="Age". ",";
}
if($f_name=="emp_gender"){
$header .="Gender". ",";
}
if($f_name=="emp_father_name"){
$header .="Father Name". ",";
}
if($f_name=="emp_mother_name"){
$header .="Mother Name". ",";
}
if($f_name=="emp_dob"){
$header .="Date Of Birth". ",";
}
if($f_name=="emp_b_group"){
$header .="Blood Group". ",";
}
if($f_name=="emp_personal_c_no"){
$header .="Personal Contact No.". ",";
}
if($f_name=="emp_residence_c_no"){
$header .="Residence Contact No.". ",";
}
if($f_name=="emp_emergency_c_no"){
$header .="Emergency Contact No.". ",";
}
if($f_name=="emp_personal_email"){
$header .="Personal Email". ",";
}
if($f_name=="emp_office_email"){
$header .="Official Email". ",";
}
if($f_name=="emp_desination"){
$header .="Desination". ",";
}
if($f_name=="emp_dpt"){
$header .="Department". ",";
}
if($f_name=="emp_under"){
$header .="Under". ",";
}
if($f_name=="emp_bank_name"){
$header .="Bank Name". ",";
}
if($f_name=="emp_bank"){
$header .="Bank". ",";
}
if($f_name=="emp_ac_no"){
$header .="A/C No". ",";
}
if($f_name=="emp_bank_branch"){
$header .="Bank Branch". ",";
}
if($f_name=="emp_bank_neft_rtgs_code"){
$header .="NEFT/RTGS Code". ",";
}
if($f_name=="emp_pan_no"){
$header .="PAN No". ",";
}
if($f_name=="emp_adhaar_no"){
$header .="Adhaar No". ",";
}
if($f_name=="emp_code"){
$header .="Employee Code". ",";
}
if($f_name=="emp_salary"){
$header .="Salary". ",";
}
if($f_name=="emp_param_adrs"){
$header .="Parmanent Address". ",";
}
if($f_name=="emp_res_adrs"){
$header .="Resident Address". ",";
}
if($f_name=="emp_join_date"){
$header .="Joining Date". ",";
}
if($f_name=="emp_exp"){
$header .="Work Experience". ",";
}


$f_name="";


//$header .= mysql_field_name( $export , $i ) . ",";


}


while( $row = mysql_fetch_row( $export ) ) {
	$line = '';
	//for each field in the row
	foreach( $row as $value ) {
		//if null, create blank field
		if ( ( !isset( $value ) ) || ( $value == "" ) ){
			$value = ",";
		}
		//else, assign field value to our data
		else {
		
			$value = str_replace( '"' , '""' , $value );
			$value = '"' . $value . '"' . ",";
				
		}
		//add this field value to our row
		$line .= $value;
	}
	//trim whitespace from each row
	$data .= trim( $line ) . "\n";
}
//remove all carriage returns from the data
$data = str_replace( "\r" , "" , $data );

$file_name="backup";
//create a file and send to browser for user to download
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$file_name.".csv");
print "$header\n$data";
exit;
?>