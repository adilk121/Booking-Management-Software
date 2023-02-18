<? session_start();ob_start();
#<<<<<<<<<< Created BY Narendra Kumar on 30 July 2009 >>>>>>>>>>>>>>
#<<<<<<<<<<<<<<<<< Class For Database Connection >>>>>>>>>>>>>>>>>>>>>
class Myclass{
	var $host;
	var $user;
	var $pass;
	var $dbname;
	var $conn;
	var $persistent= false;
	var $basedir;
	var $baseurl;
	var $dynamic_image_dpath;
	var $dynamic_image_vpath;
	var $temp_image_dpath;
	var $temp_image_vpath;
	var $big_image_dpath;
	var $big_image_vpath;
	var $websiteName;
	var $currentDate;
	var $currentYear;
	#<<<<<<<<<<<<<<<<<<<<< Constructor to give values to the variables declared >>>>>>>>>>>>>>
	function Myclass(){
		if($_SERVER[HTTP_HOST]=="localhost"){#For Local
			$this->host="localhost";
			$this->user="root";
			$this->pass="";
			$this->dbname="crystal_data";
			$this->basedir=str_replace('\\','/',$_SERVER[DOCUMENT_ROOT].'/crystalmirage');
			$this->baseurl="http://".$_SERVER['HTTP_HOST']."/crystalmirage";
			$this->dynamic_image_dpath="$this->basedir/dynamic_image";
			$this->dynamic_image_vpath="$this->baseurl/dynamic_image";
			$this->websiteName="Crystal Mirage.net";
			$this->currentDate=date("Y-m-d");
			$this->currentYear=date("Y");
		}
		else{#For Online
			$this->host="localhost";
			$this->user="root";
			$this->pass="";
			$this->dbname="crystal_data";
			$this->basedir=str_replace('\\','/',$_SERVER[DOCUMENT_ROOT].'/crystalmirage');
			$this->baseurl="http://".$_SERVER['HTTP_HOST']."/crystalmirage";
			$this->dynamic_image_dpath="$this->basedir/dynamic_image";
			$this->dynamic_image_vpath="$this->baseurl/dynamic_image";
			$this->websiteName="Crystal Mirage.net";
			$this->currentDate=date("Y-m-d");
			$this->currentYear=date("Y");
		}
		if($this->persistent){
			$func = "mysql_pconnect";
		}
		else{
			$func = "mysql_connect";
		}
		$this->conn = $func($this->host, $this->user, $this->pass);
		if(!$this->conn){
			return false;
		}
		if (@!mysql_select_db($this->dbname, $this->conn)){
			return false;
		}
		return true;
	}
	#<<<<<<<<<<<<<<<<<<<<< Function For Page Title >>>>>>>>>>>>>>
	function pageTitle($title){
		return $title;
	}
}
#<<<<<<<<<<<<<<<<< End of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>
class Dbquery extends Myclass{
	var $forfun;
	var $num;
	var $dval;
	var $extension;
	var $timeStamp;
	var $imageName;
	var $parent;
	var $gotopage;
	var $num1;
	var $num2;
	var $num5;
	var $num51;
	var $pageno1;
	var $offset_1;
	var $offset;
	var $offset1;
	var $wcnt5;
	var $iv;
	var $s;
	var $i;
	var $key;
	var $value;
	var $value2;
	var $num_pages;
	var $qry_str;
	var $m;
	var $j;
	var $k;
	var $newUrl;
	var $startfrom;
	var $end;
	var $extn;
	#Below Image resize variables
	var $source_image_name;
	var $save_image;
	var $mainimage;
	var $mainwidth;
	var $mainheight;
	var $thumblewidth;
	var $thumbleheight;
	var $thumbleimage;
	var $temp_file;
	#<<<<<<<<<<<<<<<<< Function For Error in Executing Query >>>>>>>>>>>>>>>>>>
	function db_error($sql){
		?>
		<div style='font-family: tahoma; font-size: 11px; color: #333333'><br><?=mysql_error();?><br>
		<?
		if($_SERVER[HTTP_HOST]=="localhost"){
			?>
			<br>Query:<?=$sql;
		}
		?>
		</div>
		<?
	}
	#<<<<<<<<<<<<<<<<< End of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<<< Function For Execute Query >>>>>>>>>>>>>>>>>>
	function query($sql){
		$this->forfun=mysql_query($sql) or die($this->db_error($sql));
		return $this->forfun;
	}
	#<<<<<<<<<<<<<<<<< End of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<<< Function For Count Rows >>>>>>>>>>>>>>>>>>>>>>
	function NumRows($rID){
		return mysql_num_rows($rID);
	}
	#<<<<<<<<<<<<<<<<< End of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<<< Function For Fetch Record >>>>>>>>>>>>>>>>>>>>
	function FetchArray($rID){
		return mysql_fetch_array($rID);
	}
	#<<<<<<<<<<<<<<<<< End of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function To Check Valid File Name For Uploading >>>>>>>>>>>>>>>>>>
	function GetValidFileName($fname){
		$pattern="[?() \/&#\,\;\.$]";
		$valid_file=ereg_replace($pattern,"-",$fname);
		$valid_file=strtolower($valid_file);
		$valid_file=str_replace("--","-",$valid_file);
		$valid_file=str_replace("--","-",$valid_file);
		$valid_file=str_replace("--","-",$valid_file);
		return $valid_file;
	}
	#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function To Get File Name >>>>>>>>>>>>>>>>>>
	function getFileName($str){//Determines Ext Of the file
		$i = strrpos($str,".");
		if (!$i) { return $str; }
		$name = substr($str,0,$i);
		return $name;
	}
	#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function To Get Extension >>>>>>>>>>>>>>>>>>
	function getExtension($str){//Determines Ext Of the file
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function For Image Uploading >>>>>>>>>>>>>>>>>>
	function ImageUpload($sourcePath,$imgName,$destinationPath){
		$this->extension=$this->getExtension($imgName);
		if($this->extension=="mov" OR $this->extension=="mpg" OR $this->extension=="mpeg" OR $this->extension=="wmv" OR $this->extension=="aac" OR $this->extension=="dat" OR $this->extension=="MOV" OR $this->extension=="MPG" OR $this->extension=="MPEG" OR $this->extension=="WMV" OR $this->extension=="AAC" OR $this->extension=="DAT"){
			$this->timeStamp=time();
			$this->timeStamp=$this->timeStamp+1;
			$this->imageName=$this->timeStamp.".flv";
			$destinationPath="$destinationPath/$this->imageName";
			`/usr/local/bin/ffmpeg -i $sourcePath -ar 22050 -s 400x200 $destinationPath`; //Linux command to change movie file in .flv extn. Not work on local
			return $this->imageName;
		}
		elseif($this->extension=="mp3" OR $this->extension=="mp4" OR $this->extension=="wav" OR $this->extension=="wma" OR $this->extension=="asf" OR $this->extension=="avi" OR $this->extension=="MP3" OR $this->extension=="MP4" OR $this->extension=="WAV" OR $this->extension=="WMA" OR $this->extension=="ASF" OR $this->extension=="AVI"){
			$this->timeStamp=time();
			$this->timeStamp=$this->timeStamp+1;
			//$this->imageName=$this->timeStamp.".".$this->extension;
			$this->imageName=$this->timeStamp.".txt";
			$destinationPath="$destinationPath/$this->imageName";
			if(!copy($sourcePath,$destinationPath)){
				echo "sorry!! can't upload image this time. Please try again.";	
			}
			return $this->imageName;
		}
		else{
			$this->timeStamp=time();
			$this->timeStamp=$this->timeStamp+1;
			$this->imageName=$this->timeStamp.".".$this->extension;
			$destinationPath="$destinationPath/$this->imageName";
			if(!copy($sourcePath,$destinationPath)){
				echo "sorry!! can't upload image this time. Please try again.";
			}
			return $this->imageName;
		}
	}
	#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function For Multiple Image Uploading >>>>>>>>>>>>>>>>>>
	function multipleImageUpload($sourcePath,$imgName,$destinationPath,$id){
		$this->extension=$this->getExtension($imgName);
		if($this->extension=="mov" OR $this->extension=="mpg" OR $this->extension=="mpeg" OR $this->extension=="wmv" OR $this->extension=="aac" OR $this->extension=="dat" OR $this->extension=="MOV" OR $this->extension=="MPG" OR $this->extension=="MPEG" OR $this->extension=="WMV" OR $this->extension=="AAC" OR $this->extension=="DAT"){
			$this->timeStamp=time();
			$this->timeStamp=$this->timeStamp+$id;
			$this->imageName=$this->timeStamp.".flv";
			$destinationPath="$destinationPath/$this->imageName";
			`/usr/local/bin/ffmpeg -i $sourcePath -ar 22050 -s 400x200 $destinationPath`; //Linux command to change movie file in .flv extn. Not work on local
			return $this->imageName;
		}
		elseif($this->extension=="mp3" OR $this->extension=="mp4" OR $this->extension=="wav" OR $this->extension=="wma" OR $this->extension=="asf" OR $this->extension=="avi" OR $this->extension=="MP3" OR $this->extension=="MP4" OR $this->extension=="WAV" OR $this->extension=="WMA" OR $this->extension=="ASF" OR $this->extension=="AVI"){
			$this->timeStamp=time();
			$this->timeStamp=$this->timeStamp+$id;
			$this->imageName=$this->timeStamp.".txt";
			$destinationPath="$destinationPath/$this->imageName";
			if(!copy($sourcePath,$destinationPath)){
				echo "sorry!! can't upload image this time. Please try again.";	
			}
			return $this->imageName;
		}
		else{
			$this->timeStamp=time();
			$this->timeStamp=$this->timeStamp+$id;
			$this->imageName=$this->timeStamp.".".$this->extension;
			$destinationPath="$destinationPath/$this->imageName";
			if(!copy($sourcePath,$destinationPath)){
				echo "sorry!! can't upload image this time. Please try again.";	
			}
			return $this->imageName;
		}
	}
	#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function For Dynamic Image Cutting >>>>>>>>>>>>
	function image_resize($file_name,$width,$height){
		$this->source_image_name="$this->temp_image_dpath/$file_name";
		$this->save_image="$this->dynamic_image_dpath/$file_name";
		//$this->mainimage=imagecreatefromjpeg($this->source_image_name);
		
		$this->extn=explode(".",$file_name);
		if($this->extn[1]=="gif" or $this->extn[1]=="GIF"){
			$this->mainimage=imagecreatefromgif($this->source_image_name);
		}
		if($this->extn[1]=="png" or $this->extn[1]=="PNG"){
			$this->mainimage=imagecreatefrompng($this->source_image_name);
		}
		else{
			$this->mainimage=imagecreatefromjpeg($this->source_image_name);
		}
		$this->mainwidth=imagesx($this->mainimage);
		$this->mainheight=imagesy($this->mainimage);
		
		if($this->mainwidth<=$width and $this->mainheight<=$height){
			$this->thumbleheight=$this->mainheight;
			$this->thumblewidth=$this->mainwidth;	
		}
		else{
			if($this->mainheight>$height){
				$this->thumbleheight=$height;
				$this->thumblewidth=(($height/$this->mainheight)*$this->mainwidth);
			}
			else{
				$this->thumblewidth=$width;
				$this->thumbleheight=(($width/$this->mainwidth)*$this->mainheight);
			}
		}
		$this->thumbleimage=imagecreate($this->thumblewidth,$this->thumbleheight);
		$this->thumbleimage=@ImageCreateTrueColor($this->thumblewidth,$this->thumbleheight);
		$this->temp_file= imagecopyresized($this->thumbleimage,$this->mainimage,0,0,0,0,$this->thumblewidth,$this->thumbleheight,$this->mainwidth,$this->mainheight);
		//imagejpeg($this->thumbleimage,$this->save_image,100);
		
		if($this->extn[1]=="gif" or $this->extn[1]=="GIF"){
			imagegif($this->thumbleimage,$this->save_image,100);
		}
		if($this->extn[1]=="png" or $this->extn[1]=="PNG"){
			imagepng($this->thumbleimage,$this->save_image,100);
		}
		else{
			imagejpeg($this->thumbleimage,$this->save_image,100);
		}
		imagedestroy($this->thumbleimage);
		imagedestroy($this->mainimage);
		unlink($this->source_image_name);
	}
	function image_resize_big($file_name,$width,$height){
		$this->source_image_name="$this->big_image_dpath/$file_name";
		$this->save_image="$this->big_image_dpath/$file_name";
		$this->extn=explode(".",$file_name);
		if($this->extn[1]=="jpeg" or $this->extn[1]=="jpg" or $this->extn[1]=="JPEG" or $this->extn[1]=="JPG"){
			$this->mainimage=imagecreatefromjpeg($this->source_image_name);
		}
		if($this->extn[1]=="gif" or $this->extn[1]=="GIF"){
			$this->mainimage=imagecreatefromgif($this->source_image_name);
		}
		if($this->extn[1]=="png" or $this->extn[1]=="PNG"){
			$this->mainimage=imagecreatefrompng($this->source_image_name);
		}
		$this->mainwidth=imagesx($this->mainimage);
		$this->mainheight=imagesy($this->mainimage);
		if($this->mainwidth<=$width and $this->mainheight<=$height){
			$this->thumbleheight=$this->mainheight;
			$this->thumblewidth=$this->mainwidth;	
		}
		else{
			if($this->mainheight>$height){
				$this->thumbleheight=$height;
				$this->thumblewidth=(($height/$this->mainheight)*$this->mainwidth);
			}
			else{
				$this->thumblewidth=$width;
				$this->thumbleheight=(($width/$this->mainwidth)*$this->mainheight);
			}
		}
		$this->thumbleimage=imagecreate($this->thumblewidth,$this->thumbleheight);
		$this->thumbleimage=@ImageCreateTrueColor($this->thumblewidth,$this->thumbleheight);
		$this->my_temp_file= imagecopyresized($this->thumbleimage,$this->mainimage,0,0,0,0,$this->thumblewidth,$this->thumbleheight,$this->mainwidth,$this->mainheight);
		if($this->extn[1]=="jpeg" or $this->extn[1]=="jpg" or $this->extn[1]=="JPEG" or $this->extn[1]=="JPG"){
			imagejpeg($this->thumbleimage,$this->save_image,100);
		}
		if($this->extn[1]=="gif" or $this->extn[1]=="GIF"){
			imagegif($this->thumbleimage,$this->save_image,100);
		}
		if($this->extn[1]=="png" or $this->extn[1]=="PNG"){
			imagepng($this->thumbleimage,$this->save_image,100);
		}
		imagedestroy($this->thumbleimage);
		imagedestroy($this->mainimage);
		#unlink($this->source_image_name);
	}
	#<<<<<<<<<<<<<<<< End Of Code Block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function For Check Session >>>>>>>>>>>>>>>>>>>>
	function checkSession($sessionName,$url){
		if(!strlen($_SESSION[$sessionName])){
			header("Location:$url");
			exit;
		}
	}
	#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function For Paging >>>>>>>>>>>>>>>>>>>>>>>>>>>
	function table_offset($pageno,$num,$wcnt,$num3,$num31,$link2, $dispPages1){
		if (substr($link2,-1)!="?"){
			$link2 = "$link2&";
		}
		if (!strlen($pageno)){
			$pageno=1;
		}
		$this->num1 = ($num%$num3);
		$this->num2 = intval($num/$num3);
		if ($num1>0){
			$this->num2=$this->num2+1;
		}
		if($wcnt>=$num31){
			$this->num5 = ($wcnt%$num31);
			if ($num31>0){
				$this->num51 = intval($wcnt/$num31);
			}
			$this->num51=$this->num51+1;
			if(!strlen($pageno)){
				$this->pageno1 = ($wcnt%$num3);
				$pageno = intval($wcnt/$num3);
				if($pageno1>0){
					$pageno++;
				}
			}
		}
		$this->gotopage = "<table width=100% height='45' border=0 cellpadding=0 cellspacing=0 class=borderLight><tr><td align=left width=35% nowrap>&nbsp;&nbsp;";
		if(empty($this->offset)){
			$this->offset=1;
		}
		$this->offset_1  = $wcnt+$num3;
		if($this->offset_1 >  $num){
			$this->offset_1=$num;
		}
		if ($this->num2>=1){
			$this->gotopage .= "<b>Showing : ". ($wcnt+1) ." - ". $this->offset_1 ." of ".$num." &nbsp;&nbsp;Total $this->num2 Pages</b></td><td align=center>";
		}
		else{
			$this->gotopage .= "</font></td><td align=center width=65%>";
		}
		$this->gotopage .= "<table height='45' cellpadding=0 cellspacing=0 border=0 align='center'><tr><td width='10%' align='center'>\n";
		if ($wcnt>=$num31){
			$this->pageno1=(($this->num51-1)*$dispPages1);
			$this->offset1=(($this->num51-1)*$num31)-$num3;
			$this->gotopage .= "<a href=\"$link2"."offset=$this->offset1&pageno=$this->pageno1&parent=$this->parent\" class=\"floatLeft lite\"><img src='images/previous.gif' alt='Previous Page' width='69' height='17' border='0' class='borderLight floatLeft' /></a></td><td align=center>";
		}
		$this->offset1=0;
		if($num51<1){
			$this->wcnt5=0;
		}
		elseif ($num51==1){
			$this->wcnt5=0;
		}
		else{
			$this->wcnt5=($num51-1)*$dispPages1;
		}
		if($this->wcnt5==0){
			$this->offset1=0;
		}
		else{
			$this->offset1=$this->wcnt5*$num3;
		}
		for ($this->iv=$this->wcnt5+1;$this->iv<=$this->wcnt5+$dispPages1;$this->iv++){
			if ($pageno == $this->iv){
				$this->gotopage  .= "<a href=\"$link2"."offset=0&pageno=&parent=$this->parent\"  class=\"navBarTxt1\">$this->iv</a>\n";
			}
			else{
				$this->gotopage  .= "&nbsp;&nbsp;<a href=\"$link2"."offset=$this->offset1&pageno=$this->iv&parent=$this->parent\"  class=\"navBarTxt\">$this->iv</a> \n";
			}
			$this->offset1=$this->iv*$num3;
			if($num<=$this->offset1){
				break;
			}
		}
		$pageno=$this->wcnt5+$dispPages1+1;
		if($num>$this->offset1){
			$this->gotopage .= " &nbsp;</td><td width='10%'><a href=\"$link2"."offset=$this->offset1&pageno=$this->iv&parent=$this->parent\" class=\"floatRight lite\"><img src='images/next.gif' alt='Next Page' width='44' height='17' border='0'  class='borderLight floatRight' /></a>";
		}
		$this->gotopage .= "</td></tr></table></td></tr></table>\n";
		return ($this->gotopage);
	}
	#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	#<<<<<<<<<<<<<<<< Function For Paging >>>>>>>>>>>>>>>>>>>>>>>>>>>
	function front_end_Paging($pageno,$num,$wcnt,$num3,$num31,$link2, $dispPages1){
		if (substr($link2,-1)!="?"){
			$link2 = "$link2&";
		}
		if (!strlen($pageno)){
			$pageno=1;
		}
		$this->num1 = ($num%$num3);
		$this->num2 = intval($num/$num3);
		if ($num1>0){
			$this->num2=$this->num2+1;
		}
		if($wcnt>=$num31){
			$this->num5 = ($wcnt%$num31);
			if ($num31>0){
				$this->num51 = intval($wcnt/$num31);
			}
			$this->num51=$this->num51+1;
			if(!strlen($pageno)){
				$this->pageno1 = ($wcnt%$num3);
				$pageno = intval($wcnt/$num3);
				if($pageno1>0){
					$pageno++;
				}
			}
		}
		//$this->gotopage = '<table width="85%" align="center" cellpadding="2"  cellspacing="0" class="bg-strip-color1"><tr><td width="69" align="right">';
		if(empty($this->offset)){
			$this->offset=1;
		}
		$this->offset_1  = $wcnt+$num3;
		if($this->offset_1 >  $num){
			$this->offset_1=$num;
		}
		/*if ($this->num2>=1){
			$this->gotopage .= "<b>Showing : ". ($wcnt+1) ." - ". $this->offset_1 ." of ".$num." &nbsp;&nbsp;Total $this->num2 Pages</b></td><td align=center>";
		}
		else{
			$this->gotopage .= "</font></td><td align=center width='65%'>";
		}*/
		
		
		
		$this->gotopage .= '<div class="main_index">';
		if ($wcnt>=$num31){
			$this->pageno1=(($this->num51-1)*$dispPages1);
			$this->offset1=(($this->num51-1)*$num31)-$num3;
			$this->gotopage .= "<a href=\"$link2"."offset=$this->offset1&pageno=$this->pageno1\"><img src='images/previous.gif' alt='Previous Page' width='69' height='17' border='0' class='fr brdr2'/></a>";
		}
		//$this->gotopage .= '</td><td width="481" align="center">';
		$this->gotopage .= '<div class="index">';
		$this->offset1=0;
		if($num51<1){
			$this->wcnt5=0;
		}
		elseif ($num51==1){
			$this->wcnt5=0;
		}
		else{
			$this->wcnt5=($num51-1)*$dispPages1;
		}
		if($this->wcnt5==0){
			$this->offset1=0;
		}
		else{
			$this->offset1=$this->wcnt5*$num3;
		}
		for ($this->iv=$this->wcnt5+1;$this->iv<=$this->wcnt5+$dispPages1;$this->iv++){
			if ($pageno == $this->iv){
				$this->gotopage  .= "<a href=\"$link2"."offset=0&pageno=\" class='navBarTxt'>$this->iv</a>\n";
			}
			else{
				$this->gotopage  .= "<a href=\"$link2"."offset=$this->offset1&pageno=$this->iv\" class='navBarTxt'>$this->iv</a>\n";
			}
			$this->offset1=$this->iv*$num3;
			if($num<=$this->offset1){
				break;
			}
		}
		//$this->gotopage .= '</td><td width="44" align="right">';
		$pageno=$this->wcnt5+$dispPages1+1;
		if($num>$this->offset1){
			$this->gotopage .= "<a href=\"$link2"."offset=$this->offset1&pageno=$this->iv\"><img src='images/next.gif' alt='Next Page' width='44' height='17' border='0' class='fr brdr2' /></a></span>";
		}
		$this->gotopage .= "<br /></div></div>\n";
		return ($this->gotopage);
	}
}
#<<<<<<<<<<<<<<<< Shopping Class code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>	
class ShoppingCart {
	private $name;
	// Adds the ability to have a whole cart quantity instead of individual item quantities
	private $iscartquantity = false;
	private $cart_name='SiteCart';
	public function __construct(){
		// This will be the name of the SESSION variable
		$this->name = $cart_name;
		$this->iscartquantity = $iscartquantity;
		// Check and see if shopping cart already exists, if it doesn't, set the array to the variable
		if($_SESSION[$this->name] == null){
			$_SESSION[$this->name] = array();
		}
	} 
  	public function addItem($name, $quantity){
	  	try{
		  	if(!array_key_exists($name, $_SESSION[$this->name])){
			  	$_SESSION[$this->name][$name] = $quantity;
		  	}
		  	else{
			  	throw new Exception();
		  	} 
       	}
       	catch (Exception $e){
	       	return 0;
	    }
	}
	public function updateItem($name, $quantity){
		try{
			if(array_key_exists($name, $_SESSION[$this->name])){
				$_SESSION[$this->name][$name] = $quantity;
			}
			else{
				throw new Exception();
			}
		}
		catch (Exception $e){
			return 0;
		}
	}
	public function deleteItem($name){
		unset($_SESSION[$this->name][$name]);
	}
	public function clearCart(){
		$_SESSION[$this->name] ="";
	}
	public function getItemCount(){
		return count($_SESSION[$this->name]);
	}
	public function getCart(){
		return $_SESSION[$this->name];
	}
} 
#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>	
#<<<<<<<<<<<<<<<< Function For addslashes >>>>>>>>>>>>>>>>>>>>>>>>>>>
function ms_addslashes($var){//$_POST= ms_addslashes($_POST);
	return is_array($var) ? array_map('ms_addslashes', $var) : addslashes(trim($var));
}
#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#<<<<<<<<<<<<<<<< Function For stripslashes >>>>>>>>>>>>>>>>>>>>>>>>>>>
function ms_stripslashes($var){//$_POST= ms_stripslashes($_POST)
	return is_array($var) ? array_map('ms_stripslashes', $var) : stripslashes(trim($var));
}
#<<<<<<<<<<<<<<<< End Of code block >>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//Updating member Logged in Time
$conObj=new Myclass();
$dbObj=new Dbquery();
$rr=$dbObj->FetchArray($dbObj->query("select * from manage_admin where slno='1'"));
define('adminEmail',$rr[admin_email]);
//define('CURRENCY','$');
//###################Change member Status after expiry##############################
$date=date('Y-m-d');
$dbObj->query("update manage_member set member_status='N' where expiry_date < '$date' and member_status='Y'");
//-----------Code End here.
//###################Default Currency Setting Code##############################
if(!strlen($_SESSION['CURRENCYSIGN']) OR !strlen($_SESSION['CURRENCY'])){
	session_register('CURRENCYSIGN');
	session_register('CURRENCY');
	session_register('AgentDiscount');
	$cc=$dbObj->FetchArray($dbObj->query("select * from manage_currency where cost_id='1'"));
	$_SESSION['CURRENCYSIGN']=$cc['cost_sign'];
	$_SESSION['CURRENCY']=$cc['cost_price'];
	$rr11=$dbObj->FetchArray($dbObj->query("select * from manage_affilate_rate where text_id='1'"));
	$_SESSION['AgentDiscount']=$rr11[page_desc];
}
$OrderArr=array(10,25,50,75,100);
$del_array=array('Pending'=>'Pending','Dispatched'=>'Dispatched','Delivered'=>'Delivered');
//-----------Code End here.
?>