<?
//Code to validate email on server..
function check_email(){
	if((!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@([0-9a-z](-?[0-9a-z])*\.)+[a-z]{2}([zmuvtg]|fo|me)?$",$email))){
		$msg2 = "<li>Incorrect Your Email</li><br>\n";
	}
	return $msg2;
}
//Code to get the expected date by adding or deleting the expected days, months, year..
function AddEditDate($period, $option, $AddSub){
	if($AddSub=="Add"){
		if(trim($option)=="M"){
			$val = date('Y-m-d',mktime (0,0,0,date("m")+$period,date("d"),  date("Y")));
		}
		elseif(trim($option)=="D"){
			$val = date('Y-m-d',mktime (0,0,0,date("m"),date("d")+$period,  date("Y")));
		}
		elseif(trim($option)=="Y"){
			$val = date('Y-m-d',mktime (0,0,0,date("m"),date("d"),  date("Y")+$period));
		}
	}
	if($AddSub=="Sub"){
		if(trim($option)=="M"){
			$val = date('Y-m-d',mktime (0,0,0,date("m")-$period,date("d"),  date("Y")));
		}
		elseif(trim($option)=="D"){
			$val = date('Y-m-d',mktime (0,0,0,date("m"),date("d")-$period,  date("Y")));
		}
		elseif(trim($option)=="Y"){
			$val = date('Y-m-d',mktime (0,0,0,date("m"),date("d"),  date("Y")-$period));
		}
	}
	return $val;
}
//Function for htm paging
function htm_offset($url,$num2, $path2,$curr_page="") { //increasing page no. 
	global $baseurl;
	$gotopage .= "<table width=95% border=0 align=center cellpadding=1 cellspacing=2><tr>";
    $gotopage .= "<td align=center>";
	for ($iv=1;$iv<=$num2;$iv++) {
       if ($iv==1) {
	       if($url!=index){
		    	$url1="$url.html";   
		    }
		    $pgnm="$path2/$url1";
       }
       else {
	       $v=$iv-1;
           $pgnm="$path2/$url$v.html";
       }
       if($iv==$curr_page+1){
	       $gotopage  .= "<a href=\"$pgnm\" class=\"navBarTxt1\"><b>$iv</b></a>&nbsp;";
	    }
       else{
	      $gotopage  .= "<a href=\"$pgnm\" class=\"navBarTxt\">$iv</a>&nbsp;"; 
	    }	
    }
    $gotopage  .= "</td></tr></table>";
    return $gotopage;
}
//Function to write Javascript
function jscript_write(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	if(isset($_SESSION['SiteSession'])){
		$mem=explode("~",$_SESSION['SiteSession']);
	}
	if(isset($_SESSION['SiteSession'])){
		$mem=explode("~",$_SESSION['SiteSession']);
		 $qq=" and (prod_visible='$mem[3]' OR prod_visible='A')"; //After login Selected Product Display
	}
	else{
		$qq=" and (prod_visible='R' OR prod_visible='A')"; //Before login Selected Product Display	
	}
	$hdb=$dbObj->query("select * from manage_product where prod_status='Y' and isHot='Y' $qq  Order By prod_title");
      $HNum=$dbObj->NumRows($hdb);
      if($HNum>0){
		$str='data=['."\n";
		$i=1;
		while($hres=$dbObj->FetchArray($hdb)){
      	  $hres=ms_stripslashes($hres);
      	  $li=explode(",",$hres[categoryLinks]);
      	  if(strlen($hres[prod_image]) and $hres[prod_image]!="~~~"){
          	$imgarr=explode("~",$hres[prod_image]);
          	$image_name=$imgarr[0];
	  	  	$str .='["'.$dbObj->dynamic_image_vpath.'/'.$image_name.'","'.$hres[prod_title].'","pro-dtl.htm?cid='.$li[0].'&sid1='.$li[1].'&PID='.$hres[prod_id].'"]';
	  	  	if($i!=$HNum){
		  	  	$str .=',';
	  	  	}
	  	  	$str.="\n";
	  	  	$i++;
  	  	  }
        }
        $str.=']'."\n";
        $str.='imgPlaces=4 // number of images visible
				imgWidth=130 // width of the images
				imgHeight=91 // height of the images
				imgSpacer=20 // space between the images
				
				dir=0 // 0 = left, 1 = right
				
				newWindow=0 // 0 = Open a new window for links 0 = no  1 = yes
				
				// ********** End User Defining Area **********
				
				moz=document.getElementById&&!document.all
				
				step=1
				timer=""
				speed=50
				nextPic=0
				initPos=new Array()
				nowDivPos=new Array()
				
				function initHIS3(){
				
				for(var i=0;i<imgPlaces+1;i++){ // create image holders
				newImg=document.createElement("IMG")
				newImg.setAttribute("id","pic_"+i)
				newImg.setAttribute("src","")
				newImg.style.position="absolute"
				newImg.style.cursor="pointer"
				newImg.style.width=imgWidth+"px"
				newImg.style.height=imgHeight+"px"
				newImg.style.border=0
				newImg.alt=""
				newImg.i=i
				newImg.onclick=function(){his3Win(data[this.i][2])}
				document.getElementById("display_area").appendChild(newImg)
				}
				
				containerEL=document.getElementById("his3container")
				displayArea=document.getElementById("display_area")
				pic0=document.getElementById("pic_0")
				
				containerBorder=(document.compatMode=="CSS1Compat"?0:parseInt(containerEL.style.borderWidth)*2)
				containerWidth=(imgPlaces*imgWidth)+((imgPlaces-1)*imgSpacer)
				containerEL.style.width=containerWidth+(!moz?containerBorder:"")+"px"
				containerEL.style.height=imgHeight+(!moz?containerBorder:"")+"px"
				
				displayArea.style.width=containerWidth+"px"
				displayArea.style.clip="rect(0,"+(containerWidth+"px")+","+(imgHeight+"px")+",0)"
				displayArea.onmouseover=function(){stopHIS3()}
				displayArea.onmouseout=function(){scrollHIS3()}
				
				imgPos= -pic0.width
				
				for(var i=0;i<imgPlaces+1;i++){
				currentImage=document.getElementById("pic_"+i)
				
				if(dir==0){imgPos+=pic0.width+imgSpacer} // if left
				
				initPos[i]=imgPos
				if(dir==0){currentImage.style.left=initPos[i]+"px"} // if left
				
				if(dir==1){ // if right
				document.getElementById("pic_"+[(imgPlaces-i)]).style.left=initPos[i]+"px"
				imgPos+=pic0.width+imgSpacer
				}
				
				if(nextPic==data.length){nextPic=0}
				
				currentImage.src=data[nextPic][0]
				currentImage.alt=data[nextPic][1]
				currentImage.i=nextPic
				currentImage.onclick=function(){his3Win(data[this.i][2])}
				nextPic++
				}
				
				scrollHIS3()
				}
				
				timer=""
				function scrollHIS3(){
				clearTimeout(timer)
				for(var i=0;i<imgPlaces+1;i++){
				currentImage=document.getElementById("pic_"+i)
				
				nowDivPos[i]=parseInt(currentImage.style.left)
				
				if(dir==0){nowDivPos[i]-=step}
				if(dir==1){nowDivPos[i]+=step}
				
				if(dir==0&&nowDivPos[i]<= -(pic0.width+imgSpacer) || dir==1&&nowDivPos[i]>containerWidth){
				
				if(dir==0){currentImage.style.left=containerWidth+imgSpacer+"px"}
				if(dir==1){currentImage.style.left= -pic0.width-(imgSpacer*2)+"px"}
				
				if(nextPic>data.length-1){nextPic=0}
				
				currentImage.src=data[nextPic][0]
				currentImage.alt=data[nextPic][1]
				currentImage.i=nextPic
				currentImage.onclick=function(){his3Win(data[this.i][2])}
				
				nextPic++
				
				}
				else{
				currentImage.style.left=nowDivPos[i]+"px"
				}
				
				}
				timer=setTimeout("scrollHIS3()",speed)
				
				}
				
				function stopHIS3(){
				clearTimeout(timer)
				}
				
				function his3Win(loc){
				if(loc==""){return}
				if(newWindow==0){
				location=loc
				}
				else{
				//window.open(loc)
				newin=window.open(loc,\'win1\',\'left=430,top=340,width=300,height=300\') // use for specific size and positioned window
				newin.focus()
				}
				}';
        $fp=fopen("$dbObj->basedir/Scripts/scroller.js","w");
		fclose($fp);
		$fp=fopen("$dbObj->basedir/Scripts/scroller.js","w");
		fwrite($fp,$str);
		fclose($fp);
	}
}

//Function to write XML
function XML_write($Type,$id,$file_name){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	if($Type=="songlist"){
		$db=mysql_query("select * from manage_songlist where songlist_status='Y' and songlist_id='$id'");
		$Num=mysql_num_rows($db);
	}
	if($Type=="podcast"){
		$db=mysql_query("select * from manage_podcast where podcast_status='Y' and podcast_id='$id'");
		$Num=mysql_num_rows($db);
	}
	if($Num>0){
		$str='<?xml version="1.0" encoding="UTF-8"?>
				<playlist version="1" xmlns="http://xspf.org/ns/0/">
					<trackList>
						<track>';
		while($bres=mysql_fetch_array($db)){
			if($Type=="songlist"){
				$album=find_field("$bres[songlist_ablum_id]","manage_album","album_id","album_name");/*$slno,$tblname,$fieldname,$search_field*/
				if(!strlen($bres[songlist_artist_id])){
					$artist_image=find_field("$bres[songlist_id]","manage_songlist","songlist_id","songlist_otherartist_image");/*$slno,$tblname,$fieldname,$search_field*/
				}
				else{
					$artist_image=find_field("$bres[songlist_artist_id]","manage_artist","artist_id","artist_thumb_image");/*$slno,$tblname,$fieldname,$search_field*/	
				}
				if(strlen($artist_image)){
					$image_name=$dbObj->dynamic_image_vpath.'/'.$artist_image;	
				}
				else{
					$image_name=$dbObj->baseurl.'/images/no-image.jpg';
				}
				$str .='<title>'.$bres[songlist_title].'</title>
					<location>'.$image_name.'</location>
					<identifier>'.$bres[songlist_id].'</identifier>
					<creator>'.$album.'</creator>
					<annotation></annotation>
					<info>Album Name:'.$album.'</info>
					<image>'.$image_name.'</image>';
			
			}
			if($Type=="podcast"){
				$str .='<title>'.$bres[podcast_name].'</title>
					<location>'.$dbObj->dynamic_image_vpath.'/'.$bres[podcast_image].'</location>
					<identifier>'.$bres[playlist_id].'</identifier>
					<creator>'.$album.'</creator>
					<annotation></annotation>
					<info>'.$bres[podcast_desc].':duration:'.$bres[podcast_duration].'</info>
					<image>'.$image_name.'</image>';
			}
		}
		$str .='</trackList>
					</playlist>';
		$fp=fopen("$dbObj->basedir/Scripts/$file_name.xspf",'w');
		fwrite($fp,$str);
		fclose($fp);
	}
}
//Function to Redirect page through Javascript
function jscript_redirect($url){
	global $baseurl,$basedir,$img_path,$img_vpath,$admin_email;
	?>
	<script language="javascript" type="text/javascript">
		window.location.href='<?=$url;?>';
	</script>
	<?
}
//Function to genrate randam password
function randPass($len){
	$pw = ''; //intialize to be blank
	for($i=0;$i<$len;$i++){
		switch(rand(1,3)){
			case 1: $pw.=chr(rand(48,57));  break; //0-9
			case 2: $pw.=chr(rand(65,90));  break; //A-Z
			case 3: $pw.=chr(rand(97,122)); break; //a-z
		}
	}
	return $pw;
}
//Function to convert date in dd-mm-yyyy format
function show_date($d){//converts 2007-11-02 to 02-11-2007 to Show 
	if(strlen($d)){
		$exp=explode("-",$d);
		$day=$exp[2];
		$month=$exp[1];
		$year=$exp[0];
		$new_date="$day-$month-$year";
		return $new_date;
	}
}
//Function to convert date in yyyy-mm-dd format
function insert_date($d){//converts 02-11-2007 to 2007-11-02 to Insert
	if(strlen($d)){
		$exp=explode("-",$d);
		$day=$exp[0];
		$month=$exp[1];
		$year=$exp[2];
		$new_date="$year-$month-$day";
		return $new_date;
	}
}
//Function to change showing formate of date
function changedate($date){
	if($date != "0000-00-00 00:00:00"){
		$split_time=explode(" ",$date);
		$cdate=explode("-",$split_time[0]);
		$year=$cdate[0];
		$month=$cdate[1];
		$day=$cdate[2];
		$ctime=explode(":",$split_time[1]);
		$hours=$ctime[0];
		$minutes=$ctime[1];
		$second=$ctime[2];
		return date('d F, Y H:i:s', mktime($hours, $minutes, $second, $month, $day, $year)); 
	}
}
//Function to dynamic Image Resizing for Showing only
function image_view_small($id,$small_size,$big_size,$image_name,$path){
	if(strlen($image_name)){
		$size=@getimagesize("$path/$image_name");
		if($id=="big"){
			$width=$big_size;
			$height=$big_size;
			if($size[0] <= $width and $size[1]<= $height){
				$get_wd=$size[0];
				$get_hgt=$size[1];
			}
			else{
				if($size[0]>$width){
					$get_wd=$width;
					$get_hgt=($width/$size[0])*$size[1];
				}
				if($size[1]>$height){
					$get_hgt=$height;
					$get_wd=($height/$size[1])*$size[0];
				}
			}
		}
		if($id=="small"){
			$width=$small_size;
			$height=$small_size;
			if($size[0] <= $width and $size[1]<= $height){
				$get_wd=$size[0];
				$get_hgt=$size[1];
			}
			else{
				if($size[0]>$width){
					$get_wd=$width;
					$get_hgt=($width/$size[0])*$size[1];
				}
				if($size[1]>$height){
					$get_hgt=$height;
					$get_wd=($height/$size[1])*$size[0];
				}
			}
		}
		$set=$get_wd."^".$get_hgt;
		return $set;
	}
}
//Function to find Parent tree
$arr=array();
function parent_search($slno, $table_name, $name_field, $primery_field, $search_field,$link){ //for searching parent.
	global $Website_Name, $ob, $baseurl,$basedir,$curr_year,$curr_date_time,$image_dpath,$image_vpath;
	$db=mysql_fetch_array(mysql_query("select * from $table_name where $primery_field='$slno'"));
	echo mysql_error();
	if($db[$search_field]!=0){
		$arr[]=$db[$name_field]."~".$db[$search_field]."~".$db[$primery_field];
		$slno=$db[$search_field];
		parent_search($slno, $table_name, $name_field, $primery_field, $search_field,$link);
	}
	else{
		$slno=$db[$search_field];
		$arr[]=$db[$name_field]."~".$db[$search_field]."~".$db[$primery_field];
	}
	$arr1=array_reverse($arr);
	for($i=0;$i<count($arr1);$i++){
		$varr=explode("~", $arr1[$i]);
		if("$varr[0]" !=""){
			if($html=="Y"){
				$name=strtolower($db[$name_field]);
				$file_name=str_replace(" ","-",$name).".html";
				echo "&nbsp;<a href=\"$file_name\">$varr[0]</a>&nbsp;&gt;&gt;&nbsp;";
			}
			else{
				if(strlen($link)){
					$href=$link.$varr[2];
					echo "&nbsp;<a href=\"$href\"><strong>".stripslashes($varr[0])."</strong></a>&nbsp;&gt;&gt;&nbsp;";
				}
				else{
					echo "&nbsp;<strong>".stripslashes($varr[0])."</strong>&nbsp;&gt;&gt;&nbsp;";
				}
			}
		}
		else{
			echo "&nbsp;";
		}
	}
}
//Function to find the starting parent slno.
function parent_slno($slno, $table_name, $field_name1, $field_name2, $search_field){//for taking parent's slno..
	$db=mysql_fetch_array(mysql_query("select * from $table_name where $field_name1='$slno'"));
	echo mysql_error();
	if($db[$search_field]!="0"){
		$slno1=$db[$search_field];
		parent_slno($slno1, $table_name, $field_name1, $field_name2, $search_field);
	}
	else{
		$slno1 = $db[$field_name1];
	}
	return $slno1;
}
//Function to dynamically finding any value from any table.
function find_field($slno,$tblname,$fieldname,$search_field){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$res=$dbObj->FetchArray($dbObj->query("select $search_field from $tblname where $fieldname='$slno'"));
	if(strstr($search_field,",")){
		$v=explode(",",$search_field);
		for($i=0;$i<count($v);$i++){
			$str .=stripslashes(ucwords($res[$i]))." ";
		}
	}
	else{
		$str =stripslashes(ucwords($res[0]));
	}
	return $str;	
}
//Function to show movie
function view_video($mov1){
	global $baseurl, $img_vpath,$img_path;
	//$var='<OBJECT CLASSID="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" WIDTH="320" HEIGHT="256" CODEBASE="http://www.apple.com/qtactivex/qtplugin.cab"><PARAM name="SRC" VALUE="'.$img_vpath.'/'.$mov1.'" /><PARAM name="AUTOPLAY" VALUE="false" /><param NAME="type" VALUE="video/quicktime" /><PARAM name="CONTROLLER" VALUE="true" /><EMBED SRC="'.$img_vpath.'/'.$mov1.'" WIDTH="320" HEIGHT="256" AUTOPLAY="false" CONTROLLER="true" type="video/quicktime"PLUGINSPAGE="http://www.apple.com/quicktime/download/"></EMBED></OBJECT>';
	$var='<object width="560" height="413" classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" id="Adrian"><param name="Filename" value="'.$mov1.'"><param name="AutoStart" value="True"><param name="ShowControls" value="True"><param name="ShowStatusBar" value="False"><param name="ShowDisplay" value="False"><param name="AutoRewind" value="True"><embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/MediaPlayer/" width="560" height="413" src="'.$img_vpath.'/'.$mov1.'" filename="'.$mov1.'" autostart="True" showcontrols="True" showstatusbar="False" showdisplay="False" autorewind="True"> </embed></object>';
	return $var;
}
//Function to display Message
function show_msg($msg,$section){
	switch($msg){
		case 1:
			$text="$section Deleted Successfully..";
		break;
		case 2:
			$text="$section Activated Successfully..";
		break;
		case 3:
			$text="$section Deactivated Successfully..";
		break;
		case 4:
			$text="New $section Added Successfully..";
		break;
		
		case 5:
			$text="$section already exists..";
		break;
		case 6:
			$text="$section Detail Updated Successfully..";
		break;
		case 7:
			$text="Mail Send Successfully..";
		break;
		case 8:
			$text="Display Order Set Successfully.";
		break;
		case 9:
			$text="$section's New Membership is Activated Successfully.";
		break;
		case 10:
			$text="$section Saved Successfully.";
		break;
		case 11:
			$text="$section's Is Transfered in Unmailed Section";
		break;
		case 12:
			$text="Featured $section's Are set";
		break;
		case 13:
			$text="All $section's Are Unset. Please Set Again.";
		break;
		case 14:
			$text="You have Sub Categories under this category. First delete the sub category and then delete this one.";
		break;
		case 15:
			$text="Document File Not Uploaded Please Try Again!!";
		break;
		case 16:
			$text="Admin password has been changed successflly";
		break;
		case 17:
			$text="Invalid current password. Please Try Again!!";
		break;
		case 18:
			$text="Invalid Details!! ";
		break;
		case 19:
			$text="Saved as Archives";
		break;
		case 20:
			$text="An activation mail has been send to your email address. Please confirm your registration.";
		break;
		case 21:
			$text="$section Renewed Successfully.";
		break;
		case 22:
			$text="Thanks for sending Enquiry/Feedback to us. We will get back to you soon with details.";
		break;
		case 23:
			$text="Thanks for sending your interest in this classified. The Poster of the classified will get in touch with you soon.";
		break;
		case 24:
			$text="Thanks for visiting Our Website. See you soon.";
		break;
		case 25:
			$text="Request to Reactivate send Successfully..";
		break;
		case 26:
			$text="Detail Updated Successfully..";
		break;
		case 27:
			$text="Your Password has been sent to your email. Kindly check your email.";
		break;
		case 28:
			$text="Your details are submitted successfully. Banner will be visible after admin approval.";
		break;
		case 29:
			$text="You have subscribed successfully for newsletter Subscription.";
		break;
		case 30:
			$text="You have un-subscribed successfully for newsletter Subscription.";
		break;
		case 31:
			$text="You have already selected six as featured Ads. Please unset some of them first to set.";
		break;
		case 32:
			$text="You already have selected featured $section. Please unset some of them first to set.";
		break;
		case 33:
			$text="Please Enter the verify code same as in the image";
		break;
		case 34:
			$text="Your Membership has been activated now. Login and enjoy.";
		break;
		case 35:
			$text="Invalid user/ You have already activated your membership";
		break;
		case 36:
			$text="An activation mail has been sent at your email address. Please click the link to activate your membership and enjoy.<br><br> Your Discount Coupon Code is: ".$_SESSION[Discount_Coupon]." Please Use it while shopping to get huge Discounts.";
		break;
		case 37:
			$text="$section with this Email Id/Password already exists please change the email Id/Password and try again.";
		break;
		case 38:
			$text="Thanks for payment. We have received your payment. You will receive your order soon.";
		break;
		case 39:
			$text="Login Details updated. Please Login again.";
		break;
		case 40:
			$text="Please Enter Some $section";
		break;
		case 41:
			$text="Please Enter Banner Image. The image Dimension should be 610 x 118 px for Bottom Banner  and  181 x 302 px for Left Banner.";
		break;
		case 42:
			$text="Shifted to unmailed section.";
		break;
		case 43:
			$text="This section require Login Details. Please Login first and then click link to view.";
		break;
		case 44:
			$text="Please deposit a Check at your nearest bank branch and enjoy your membership options.";
		break;
		case 45:
			$text="You cannot choose Lower membership. Please Upgrade with higher membership only.";
		break;
		case 46:
			$text="This section is visible to paid members only. Please upgrade your membership from your my-folder section.";
		break;
		case 47:
			$text="$section is set as Hot $section";
		break;
		case 48:
			$text="All $section are Unset from Hot $section";
		break;
		case 49:
			$text="You have already selected four as Hot $section. Please unset some of Hot $section first to set.";
		break;
		case 50:
			$text="$section is set as New Arrival $section";
		break;
		case 51:
			$text="All $section are Unset from New Arrival $section";
		break;
	}
	?>
	<span class="red"><strong><?=$text;?></strong></span>
	<?
}
function PageContent($id,$cut=""){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	if(strlen($id)){
		$res24=$dbObj->FetchArray($dbObj->query("select page_desc from manage_static_content where text_id ='$id' and activestatus='Y'"));
	}
	if(strlen($cut)){
		$text=substr($res24[page_desc],0,$cut);
	}
	else{
		$text=$res24[page_desc];
	}
	return stripslashes($text);
}
function TextContent($id,$cut=""){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	if(strlen($id)){
		$res24=$dbObj->FetchArray($dbObj->query("select page_desc from manage_website_text where text_id ='$id' and activestatus='Y'"));
	}
	if(strlen($cut)){
		$text=substr($res24[page_desc],0,$cut);
	}
	else{
		$text=$res24[page_desc];
	}
	return stripslashes($text);
}
function TotalMiniSec($time){
	if(strlen($time)){
		$ex=explode(":",$time);
		if($ex[0]!="00"){
			$h=$ex[0] * 216000;   //60 * 60 * 60;	
		}
		if($ex[1]!="00"){
			$m=$ex[1] * 3600;   //60 * 60;	
		}
		if($ex[2]!="00"){
			$s=$ex[2];
		}	
	}
	$tot1=$h+$m+$s;
	return $tot1;
}
function datediff($date1,$date2){
	$first_date = strtotime($date1);
	$second_date = strtotime($date2);
	if($second_date >$first_date || $second_date ==$first_date){
		$offset = $second_date-$first_date;
		$y=intval($offset/60/60/24/365). "Years";
		$rem1=$offset%(2628000*12);
		$m=intval($rem1/60/60/24/30) . "Months";
		$rem=$offset%2628000;
		$d=intval($rem/60/60/24) . "Days";
		$rem2=$offset%(2628000/24);
		$h=intval($rem2/60/60) . "Hours";
		$rem3=$offset%(2628000/24/60);
		$mn=intval($rem3/60) . "Minutes";
		//	$rem3=$offset%(2628000/24/60/60);
		if($y=="0Years"){$y="";	}
		if($m=="0Months"){$m="";}
		if($d=="0Days"){$d="";}
		if($h=="0Hours"){$h="";}
		if($mn=="0Minutes"){$mn="";}
		//return $time=$y." ".$m." ".$d." ".$h." ".$mn;
		return $time=$h;
	}
	if($second_date < $first_date){
		$offset =$first_date-$second_date;
		$y=intval($offset/60/60/24/365). "Years";
		$rem1=$offset%(2628000*12);
		$m=intval($rem1/60/60/24/30) . "Months";
		$rem=$offset%2628000;
		$d=intval($rem/60/60/24) . "Days";
		$rem2=$offset%(2628000/24);
		$h=intval($rem2/60/60) . "Hours";
		$rem3=$offset%(2628000/24/60);
		$mn=intval($rem3/60) . "Minutes";
		//	$rem3=$offset%(2628000/24/60/60);
		if($y=="0Years"){$y="";	}
		if($m=="0Months"){$m="";}
		if($d=="0Days"){$d="";}
		if($h=="0Hours"){$h="";}
		if($mn=="0Minutes"){$mn="";}
		//return $time=$y." ".$m." ".$d." ".$h." ".$mn;
		return $time=$h;
	}
}
function TopBanner(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$db13=$dbObj->query("select * from manage_banner where active_status='Y' and banner_position='T' order by rand() limit 0,1");
	$Num13=$dbObj->NumRows($db13);
	if($Num13 >0){
		while($res13=$dbObj->FetchArray($db13)){
			$bn .='<a href="http://www.'.$res13[banner_url].'" target="_blank"><img src="'.$conObj->dynamic_image_vpath.'/'.$res13[banner_image].'" width="291" height="92" border="0" alt="" title="" /></a>';
		}
		echo $bn;
	}
}
function BottomBanner(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$db14=$dbObj->query("select * from manage_banner where active_status='Y' and banner_position='B' order by rand() limit 0,1");
	$Num14=$dbObj->NumRows($db14);
	if($Num14 >0){
		while($res14=$dbObj->FetchArray($db14)){
			$bn1 .='<a href="http://www.'.$res14[banner_url].'" target="_blank"><img src="'.$conObj->dynamic_image_vpath.'/'.$res14[banner_image].'" width="610" height="118" border="0" align="middle"  alt="" title=""/></a>';
		}
		echo $bn1;
	}
}
function RightBanner(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$db15=$dbObj->query("select * from manage_banner where active_status='Y' and banner_position='R' order by rand() limit 0,3");
	$Num15=$dbObj->NumRows($db15);
	if($Num15 >0){
		while($res15=$dbObj->FetchArray($db15)){
			$bn2 .='<a href="http://www.'.$res15[banner_url].'" target="_blank"><img src="'.$conObj->dynamic_image_vpath.'/'.$res15[banner_image].'" width="122" height="225" border="0"  alt="" title=""/></a><br/><br/>';
		}
		echo $bn2;
	}
}
function LeftBanner(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$db16=$dbObj->query("select * from manage_banner where active_status='Y' and banner_position='L' order by rand() limit 0,1");
	$Num16=$dbObj->NumRows($db16);
	if($Num16 >0){
		while($res16=$dbObj->FetchArray($db16)){
			$bn2 .='<a href="http://www.'.$res16[banner_url].'" target="_blank"><img src="'.$conObj->dynamic_image_vpath.'/'.$res16[banner_image].'" width="181" height="302" border="0"  alt="" title=""/></a><br/>';
		}
		echo $bn2;
	}
}
function RandomCoupan(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$date1=date('Y-m-d');
	$cdb=$dbObj->query("select discount_code from manage_discount where discount_status ='Y' and discount_for ='M' and discount_expiry >'$date1' order by discount_expiry");
	$cNum=$dbObj->NumRows($cdb);
	if($cNum>0){
		$i=0;
		while($re45=$dbObj->FetchArray($cdb)){
			$dis_arr[$i]=$re45[discount_code];
			$i++;
		}
		$count=count($dis_arr)-1;
		$va=rand(0,$count);
		return $dis_arr[$va];
	}
}
function DiscountPercentage($coupan_no){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$cdb=$dbObj->query("select discount_percentage from manage_discount where discount_code='$coupan_no'");
	$cNum=$dbObj->NumRows($cdb);
	if($cNum>0){
		$disres=$dbObj->FetchArray($cdb);
		return $disres[0];
	}
}
function AllMemberCoupan(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$date1=date('Y-m-d');
	$cdb=$dbObj->query("SELECT discount_code FROM manage_discount WHERE discount_status = 'Y' AND discount_for = 'A' AND discount_expiry >= CURDATE() ORDER BY discount_expiry");
	$cNum=$dbObj->NumRows($cdb);
	if($cNum>0){
		$cres=$dbObj->FetchArray($cdb);
		$all_code=$cres[discount_code];
		return $all_code;
	}
}

function NewsletterHeader(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$str='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Welcome to MoneyMouse.com</title>
			 
			<style type="text/css">
				.box-left-bg{background:url('.$dbObj->baseurl.'/images/box-lc.jpg) left repeat-y;}
				.box-right-bg{background:url('.$dbObj->baseurl.'/images/box-rc.jpg) right repeat-y;}
				.box-top-bg{background:url('.$dbObj->baseurl.'/images/box-tc.jpg) top repeat-x;}
				.box-bottom-bg{background:url('.$dbObj->baseurl.'/images/box-bc.jpg) bottom repeat-x;}
				.box-bg-color{background:#fefffa;}
				.green_heading{color:#2e6c00;font:bold 16px  "Trebuchet MS" Arial, Helvetica, sans-serif;}
				.style-sml{color:#000000;font:normal 11px Arial, Helvetica, sans-serif;}
				.bg-footer{background:#2e6b00 url('.$dbObj->baseurl.'/images/footer-img.jpg) repeat-x;color:#FFFFFF; padding:10px;font:normal 11px Arial, Helvetica, sans-serif;}
				.style1 {background: #2e6b00 url('.$dbObj->baseurl.'/images/footer-img.jpg) repeat-x; color: #FFFFFF; padding: 10px; font: normal 11px Arial, Helvetica, sans-serif; font-weight: bold;}
				.link3{color:#2e6c00; text-decoration:none;}
				.link3:hover{color:#000;}
				.button1 {background:#666666;font:bold 11px Arial, Helvetica, sans-serif;color: #FFFFFF;border:0px;padding:1px 3px;text-decoration:none;cursor:pointer;}
				.bg-strip-color{background-color:#f9fde8;}
				.border-bot{border-bottom:#e0e0e0 1px solid;}
			</style>
			</head>
			 
			<body style="margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			    <td><img src="'.$dbObj->baseurl.'/images/newsletter-head.jpg" alt="" width="766" height="172" /></td>
			  </tr>
			  
			  <tr>
			    <td><table width="100%" cellspacing="0" cellpadding="0">
			      
			      <tr>
			        <td width="10" class="box-left-bg">&nbsp;</td>
			        <td class="box-bg-color" style="padding:10px;">';
	return $str;			        
}
function NewsletterFooter(){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$sttr='</td>
	        <td width="10" class="box-right-bg">&nbsp;</td>
	      </tr>
	      <tr>
	        <td align="left" valign="bottom"><img src="'.$dbObj->baseurl.'/images/box-bl.jpg" alt="" width="10" height="10" /></td>
	        <td class="box-bottom-bg"></td>
	        <td align="right" valign="bottom"><img src="'.$dbObj->baseurl.'/images/box-br.jpg" alt="" width="10" height="10" /></td>
	      </tr>
	    </table></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	  </tr>
	  <tr>
	    <td class="style1">THANKS<BR />Money Mouse Team</td>
	  </tr>
	</table>
	</body>
	</html>';
	return $sttr;	
}
function qry_str($arr, $skip = ''){
	$s = "?";
	$i = 0;
	foreach($arr as	$key =>	$value)	{
		if ($key !=	$skip) {
			if (is_array($value)) {
				foreach($value as $value2) {
					if ($i == 0) {
						$s .= $key . '[]=' . $value2;
						$i = 1;
					} else {
						$s .= '&' .	$key . '[]=' . $value2;
					}
				}
			} else {
				if ($i == 0) {
					$s .= "$key=$value";
					$i = 1;
				} else {
					$s .= "&$key=$value";
				}
			}
		}
	}
	return $s;
}
function Calc_PerUnit_price($id){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$rr1=$dbObj->FetchArray($dbObj->query("select * from manage_product where prod_id='$id'"));
	if(isset($_SESSION[SiteSession])){
		$mem=explode("~",$_SESSION['SiteSession']);
		if($mem[3]=="W"){
			if($rr1[prod_min_price]>0){
				$per_cost=$rr1[prod_min_price];
			}
			else{
				$per_cost= $rr1[prod_price];		
			}
		}
		else{
			$per_cost= $rr1[prod_price];
		}
	}
	else{
		$per_cost= $rr1[prod_price];
	}
	return ($per_cost * $_SESSION['CURRENCY']);
}
function Calc_perUnit_Disc_price($id){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	if(isset($_SESSION[SiteSession])){
		$mem=explode("~",$_SESSION['SiteSession']);
	}
	$rr5=$dbObj->FetchArray($dbObj->query("select * from manage_product where prod_id='$id'"));
	if(isset($_SESSION[SiteSession])){
		$mem=explode("~",$_SESSION['SiteSession']);
		if($mem[3]=="W"){
			$unit_cost1=$rr5[prod_min_price];
		}
		else{
			$unit_cost1= $rr5[prod_price];
		}
	}
	else{
		$unit_cost1= $rr5[prod_price];
	}
	
	if($rr5[prod_discount_price]>0.00 and $mem[3]!="W"){
		$cc=($unit_cost1/100) * $rr5[prod_discount_price];
      	$dis_cost1= $unit_cost1 - $cc;
    }
    else{
	    $dis_cost1= $unit_cost1;
    }
    return ($dis_cost1 * $_SESSION['CURRENCY']);
}
function Calc_PerUnit_price_insert($id){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	$rr1=$dbObj->FetchArray($dbObj->query("select * from manage_product where prod_id='$id'"));
	if(isset($_SESSION[SiteSession])){
		$mem=explode("~",$_SESSION['SiteSession']);
		if($mem[3]=="W"){
			if($rr1[prod_min_price]>0){
				$per_cost=$rr1[prod_min_price];
			}
			else{
				$per_cost= $rr1[prod_price];	
			}
		}
		else{
			$per_cost= $rr1[prod_price];
		}
	}
	else{
		$per_cost= $rr1[prod_price];
	}
	return $per_cost;
}
function Calc_perUnit_Disc_price_insert($id){
	$conObj=new Myclass();
	$dbObj=new Dbquery();
	if(isset($_SESSION[SiteSession])){
		$mem=explode("~",$_SESSION['SiteSession']);
	}
	$rr5=$dbObj->FetchArray($dbObj->query("select * from manage_product where prod_id='$id'"));
	if(isset($_SESSION[SiteSession])){
		$mem=explode("~",$_SESSION['SiteSession']);
		if($mem[3]=="W"){
			$unit_cost1=$rr5[prod_min_price];
		}
		else{
			$unit_cost1= $rr5[prod_price];
		}
	}
	else{
		$unit_cost1= $rr5[prod_price];
	}
	
	if($rr5[prod_discount_price]>0.00 and $mem[3]!="W"){
		$cc=($unit_cost1/100) * $rr5[prod_discount_price];
      	$dis_cost1= $unit_cost1 - $cc;
    }
    else{
	    $dis_cost1= $unit_cost1;
    }
    return $dis_cost1;
}
?>