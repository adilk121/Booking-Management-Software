<?php session_start();
$var=$_SESSION['SESS_USER'];
include_once("admin/db.php");
  	$sesion=session_id();
	$cat_id=$_GET['cat_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pure Shop</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="fancybox/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="Scripts/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	     $(".pop1").fancybox({
			'width'				: 670,
			'height'			: 520,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe'
		});	
		 
		  $(".pop2").fancybox({
			'width'				: 530,
			'height'			: 290,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe'
		});	
		  
		   $(".pop3").fancybox({
			'width'				: 520,
			'height'			: 295,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe'
		});
		   var myImageFlow = new ImageFlow();
			myImageFlow.init({ 
			'ImageFlowID'		: 'myImageFlow',
			'circular'			: true,
			'slider'			: false,
			'glideToStartID'	: false,
			'captions'			: false,
			'startAnimation'	: true, 
            'reflections'		: false, 
			'reflectionPNG'		: true,
			'slideshow'			: true,
            /*'reflectionP'		: 0.0 ,*/
			'aspectRatio'		: 2.5, 
            'imagesM'			: 0.9, 
			'slideshowAutoplay'	: true 
		});

	});
	$(function() {
	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:500,
		speed:1000
	});
});
</script>
</head>

<body>
<div class="main_div">
<p><img src="images/header.jpg" /></p><table class="mb5px" cellpadding="5" cellspacing="0" border="0" width="100%">
 <tr><td><p><img src="images/milky_goodness_img.gif" /></p></td><td align="right"><p><span style="padding-right:20px;" class=" b green"> 
<?php if(empty($_SESSION['SESS_USER']))
 {

 ?> <a href="registration.php">Registration</a>
<?
}
else
 {
 ?>
 <a href="my-account.php">My Account</a>
 <?
 }
 ?>
  &nbsp; | &nbsp;   <?php if(empty($_SESSION['SESS_USER']))
 {
 ?> <a href="login.php">Login</a>
 <?
 }
else
 {
 ?>
 <a href="logout.php">Logout</a>
 <?
 }
 ?></span><span class="pl5px"><img src="images/icon_cart.gif" / class="vam"></span>&nbsp; <span class="large b ffv">
 <?
$sele1="select * from temp_cart where sessionid='$sesion'";
			  $que1=mysql_db_query($dbname,$sele1);
			  $rowe1=mysql_num_rows($que1);			  
			  ?>
 
 <a href="trolley.php">Your Shopping Cart <?php echo "$rowe1";?> itmes</a></span></p></td></tr>
</table>

<table class="menu_link" cellpadding="0" cellspacing="0" border="0" width="100%">
 <tr align="center" height="50px" style="background:url(images/menu_bg.gif) repeat-x;">
 <td width="1"><img src="images/spacer.gif"  height="50" width="1"/></td>
 <td width="70"><a href="index.php" title="Home">Home</a></td>
 <?
$pay="select * from shopcat where hot='yes' and  parent=0";
 $exe11=mysql_query($pay);
 while($ro=mysql_fetch_array($exe11))
 {
 ?>
 <td width="123"><a href="subcat_product.php?cat_id=<?=$ro['spid'];?>&name=<?=$ro['cat'];?>">
   <? echo $ro['cat']?></a></td>
 
 <?
 }
 ?>
 <td width="95"><a href="gift-idea.php" title="Gift Idea's">Gift Idea's</a></td>
 <td width="58"><a href="shop.html" title="Shop">Shop</a></td>
 <td width="104"><a href="testimonials.php" title="Testimonials">Testimonials</a></td>
 <td width="120"><a href="our-soapy-story.php" title="Our soapy story">Our soapy story</a></td>
 <td width="107"><a href="retail-outlet.php" title="Retail Outlets">Retail Outlets</a></td> 
 <td width="110"><a href="wholesale-info.php" title="Wholesale info">Wholesale info</a></td>
 <td width="90"><a href="contact-us.php" title="Contact us">Contact us</a></td>
 </tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
 <tr><td valign="top">
  <div class="p10px">
    <p class="mb5px b xxlarge bdrBd">Testimonials</p>
	
	<p align="right"> <a href="tell_a_friend.php" class="pop2"><img src="images/Testimonials_Button.gif" /></a></p>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody> 
          
          <tr> 
            <td class="p5px" valign="top"><table style="margin: 10px 0px;" class="bordpink" border="0" cellspacing="3" width="100%">
                <tbody><tr>
                  <td style="padding: 5px;" class="b bg5 white" align="left" ><strong><img src="images/b3.gif" class="vam">  &nbsp; Client name here</strong></td>
                </tr>
                <tr>
                  <td style="padding: 5px;" align="left" class="bg1">
<p>Browse our Product Section and select a 
Product. Click to add it to your Shopping Cart. You can add more 
products from addon products option. View and Edit the Contents of your 
Cart at anytime. When you are satisfied with your order, Click 
'Continue' and fill up the order form. After you have filled the order 
form, click preview. After you have previewed your order click 
'Confirm'. You will then be redirected to the Payment page. If you make 
any inquiries about your order, please state your Order Number.</p>
</td>
                </tr>
              </tbody></table>
              
                            
              
              <table style="margin: 10px 0px;" class="bordpink" border="0" cellspacing="3" width="100%">
                <tbody><tr>
                  <td style="padding: 5px;" class="b bg5 white" align="left" ><strong><img src="images/b3.gif" class="vam m1px5px">Client name here</strong></td>
                </tr>
                <tr>
                  <td style="padding: 5px;" align="left" class="bg1">

 Yes you can order by telephone.<span style="">&nbsp; </span>Please call us +91-990-283-4433 or<span class="purplenormaltext">+1 (</span>832)369
 6768.Alternatively, you can email us at help@a2zflowers.com.We do not 
recommend that you send your payment details via email, as emails are 
not encrypted and could be intercepted.</p>
</td>
                </tr>
              </tbody></table>
              
                            
              
              <table style="margin: 10px 0px;" class="bordpink" border="0" cellspacing="3" width="100%">
                <tbody><tr>
                  <td style="padding: 5px;" class="b bg5 white" align="left" ><strong><img src="images/b3.gif" class="vam m1px5px">Client name here </strong></td>
                </tr>
                <tr>
                  <td style="padding: 5px;" align="left" class="bg1">
<p>The delivery is possible in all major towns and cities of India. For details, just click Delivery Cities.</p></td>
                </tr>
              </tbody></table>
              
                            
              
              <table style="margin: 10px 0px;" class="bordpink" border="0" cellspacing="3" width="100%">
                <tbody><tr>
                  <td style="padding: 5px;" class="b bg5 white" align="left"><strong><img src="images/b3.gif" class="vam m1px5px">Client name here</strong></td>
                </tr>
                <tr>
                  <td style="padding: 5px;" align="left" class="bg1">
<p>Yes, in most of the cities and towns the delivery is possible on holidays but there may be some exceptions.</p></td>
                </tr>
              </tbody></table>
              
                            
              
              <table style="margin: 10px 0px;" class="bordpink" border="0" cellspacing="3" width="100%">
                <tbody><tr>
                  <td style="padding: 5px;" class="b bg5 white" align="left"><strong><img src="images/b3.gif" class="vam m1px5px">Client name here </strong></td>
                </tr>
                <tr>
                  <td style="padding: 5px;" align="left" class="bg1">
<p><span style="font-size: 11pt; line-height: 115%; font-family: &quot;Calibri&quot;,&quot;sans-serif&quot;;">All
 orders placed before 4:00 p.m. IST can be delivered on the SAME DAY. 
Our select florists will design the arrangement and send it out for 
delivery.</span></p></td>
                </tr>
              </tbody></table>
              
                            
              
              <table style="margin: 10px 0px;" class="bordpink" border="0" cellspacing="3" width="100%">
                <tbody><tr>
                  <td style="padding: 5px;" class="b bg5 white" align="left"><strong><img src="images/b3.gif" class="vam m1px5px">Client name here</strong></td>
                </tr>
                <tr>
                  <td style="padding: 5px;" align="left" class="bg1">
<p><span style="font-size: 11pt; line-height: 115%;" calibri="" sans-serif="">If you have any concerns about changing your order information, you can contact us at:help@a2zflowers.com</span></p>
 

<p><span >&nbsp;&nbsp; </span>1. Chat with us on yahoo and MSN (between 10:00 a.m to 6:00 p.m IST) , our yahoo id is <span class="purplenormaltext">orders_a2z</span> and MSN id is orders_a2z@hotmail.com</p>
<p><span >&nbsp;&nbsp; </span>2. Email us at help@a2zflowers.com</p>
<p><span >&nbsp;&nbsp; </span>3. Call us at 080-23182746 or +91-990-283-4433</p>
<p><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Any changes in the order information can be made only if intimated at least 1 day prior to the delivery of the order.</p>
</td>
                </tr>
              </tbody></table>
              
                            
              
              <table style="margin: 10px 0px;" class="bordpink" border="0" cellspacing="3" width="100%">
                <tbody><tr>
                  <td style="padding: 5px;" class="b bg5 white" align="left"><strong><img src="images/b3.gif" class="vam m1px5px">Client name here</strong></td>
                </tr>
                <tr>
                  <td style="padding: 5px;" align="left" class="bg1">
<p>All customers are automatically sent a confirmation
 that we have received their order, as long as they have provided us 
with a valid email address. After the order has been delivered , within 
24 hours a delivery confirmation (with the name of the person who 
received the order) is emailed to all customers.</p></td>
                </tr>
              </tbody></table>
              
                            
              
              </td>
          </tr>
        </tbody></table>
   
   </div></td>
 
 <td width="250" valign="top">
 
 <p ><img src="images/what-we-offer.gif" /></p>
 <? include("left-nav.php")?>
 

 
 </td></tr>
</table>

<p class="bg5"><img src="images/spacer.gif" height="3" / ></p>
<div class="bg3 p10px">

<p class="p10px ac mb5px"><a href="#">An excellent skin rejuvenator</a>  |  <a href="#">Gently cleanses the skin</a>   |   <a href="#">Naturally exfoliates the skin</a>   |   <a href="#">A natural antioxidant</a>   |   <a href="#">A ph level close to our own skin</a>  |  <a href="#">Full of skin loving nutrients</a></p>

<p class="fr ">We accept : <img src="images/payment1.gif" / class="vam"> <img src="images/payment2.gif" / class="vam"> <img src="images/payment3.gif" / class="vam"></p>
<p class="p5px small">© Copyright 2011-2012 All right reserved by : Pure Scents<br />
Website Powered by: <a href="http://www.webkeyindia.Com/" target="_blank">WebKeyIndia.Com</a></p>

<p class="cr"></p>
</div>

</div>
</body>
</html>
