<?php
include_once("include/main.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cyber Gaming World</title>
<link rel="stylesheet" type="text/css" href="<?=SITE_MAIN_PATH?>css/styles.css" />
<script src="<?=SITE_MAIN_PATH?>Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet"  type="text/css" href="styles.css" />
<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />

<script type="text/javascript" src="fancybox/popup.js"></script>
</head>
<body class="main_bg">
<? include("header.php") ?>
<p><img src="<?=SITE_MAIN_PATH?>images/spacer.gif" height="10" alt="" /></p>
<div class="rightPanel">
<p style="margin-bottom:5px; margin-bottom:10px;"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/rightBnr.gif" /></a></p>
<p style="padding-bottom:10px;" align="center">
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','300','height','150','src','flash/300x150_latestgames','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','flash/300x150_latestgames' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="300" height="150">
     <param name="movie" value="flash/300x150_latestgames.swf" />
     <param name="quality" value="high" />
     <embed src="flash/300x150_latestgames.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="300" height="150"></embed>
   </object></noscript>
 </p>
  
   <div style="width:300px; margin-bottom:10px;">
    <p> <img src="<?=SITE_MAIN_PATH?>images/mpgTab.gif" /></p>
    
    <div style="background:url(<?=SITE_MAIN_PATH?>images/pg_bg.gif) repeat-x; border:1px solid #cbcbcb; padding-top:15px; padding-bottom:13px;" class="p10px">
      
      <div class="mpGame gray fr" style="margin-right:10px;">
       <p align="center" class="p2px"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/octopusGame.gif" /></a></p>
       <p class="fs11 ac"><a href="#">Octopus</a></p>
      </div>
      
      <div class="mpGame gray fr" style="margin-right:10px;">
       <p align="center" class="p2px"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/moneyChipsGame.gif" /></a></p>
       <p class="fs11 ac"><a href="#">Money chips</a></p>
      </div>
      
      <div class="mpGame gray" style="margin-left:10px;">
       <p align="center" class="p2px"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/luckyChanceGame.gif" /></a></p>
       <p class="fs11 ac"><a href="#">Lucky Chance</a></p>
      </div>
      
      <p><img src="images/spacer.gif" alt="" height="15" /></p>
       
       <div class="mpGame gray fr" style="margin-right:10px;">
       <p align="center" class="p2px"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/doom3game.gif" /></a></p>
       <p class="fs11 ac"><a href="#">Doom3</a></p>
      </div>
      
      <div class="mpGame gray fr" style="margin-right:10px;">
       <p align="center" class="p2px"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/legernda3game.gif" /></a></p>
       <p class="fs11 ac"><a href="#">Legenda3</a></p>
      </div>
      
      <div class="mpGame gray" style="margin-left:10px;">
       <p align="center" class="p2px"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/turningCardsGame.gif" /></a></p>
       <p class="fs11 ac"><a href="#">Turning Cards</a></p>
      </div>           
    </div>  
    </div>
   <p class="mr5px"><a href="#"><img src="<?=SITE_MAIN_PATH?>images/latestgamesImg/latestgamesbngImg.jpg" alt="" width="300"/></a></p>
 </div>   
 <div>
 <p class="ml10px"><img src="<?=SITE_MAIN_PATH?>images/latestgamesImg/featuredGameTab.gif" alt="" /></p> 
 <div style="padding:20px 10px 20px 10px; margin-bottom:10px; border:1px solid #e0c17b; width:545px;" class="ml10px"> 
 <table cellpadding="0" cellspacing="0" border="0" width="100%">
  <tr align="center">
<?php
$sel="select * from gallery_images_tbl where status='y' and feature='Feature' ORDER BY caption  LIMIT 0,3";
$exe=mysql_query($sel) or die("can't access");
while($data=mysql_fetch_array($exe))
{
?>
<td> 
<div >
<p align="center" class="img-opcity"><a href="play.php?game_id=<?=$data['slno']?>"><img src="uploaded_files/gallery_images/<?=$data['image']?>" title="<?=$data['caption']?>" width="171px" height="181px" alt="<?=$data['caption']?>" /></a></p>
</div>
</td>
<?
}
?>	
	</tr>
 </table>
 </div>
 <div style="padding:10px; margin-bottom:20px; border:1px solid #e0c17b; width:545px;" class="ml10px">


<div  style="border:1px solid #eee; ">
  <p style="background:url(<?=SITE_MAIN_PATH?>images/pagingbg.gif) repeat-x;" class="p5px b" align="right">
  <table width="80%" border="0" cellpadding="5">
  <tr>
 <?php
 $i=0;
 $sel="SELECT * FROM `article_tbl` WHERE `status`='Y'";
 $exe=mysql_query($sel) or die("can't access");
 while($data=mysql_fetch_array($exe))
 {
 $i++;
 ?> 
<td align="center"><a href="enviornment-audit.html" class="pop2"><img src="moneyChipsGame.gif" /></a></td>
<td align="center"><a href="enviornment-audit.html" class="pop3"><img src="octopusGame.gif" /></a></td>
<td align="center"><a href="enviornment-audit.html" class="pop1"><img src="turningCardsGame.gif" /></a></td>

 <? 
if($i%3==0)
{
echo "</tr><tr>";
$i=0;
}
}
?>
  </tr>
</table>
</p>
 </div> 
 </div>  
   </div>   
 <div class="cr"> <img src="<?=SITE_MAIN_PATH?>images/spacer.gif" height="10" alt="" /> </div>
<? include("footer.php")?>  
 </div>	
</body>
</html>
