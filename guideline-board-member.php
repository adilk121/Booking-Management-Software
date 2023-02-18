<?php include("header-home.php")?>
  <tr>
    <td valign="top" width="20%" >
		<?php include("left-home.php")?>
    </td>
    <td valign="top" width="60%">
	<table cellpadding="0" cellspacing="0" border="0" width="96%" align="center" style="margin-top:2px;">
	<tr>
	<?php include("quote.php")?>
	</tr>
	
	
	</table>
	
	<style>
a:hover{
text-decoration:underline;
}

 .delbutton {
  background-image: url(images/dlt-all.jpg);
   width: 62px;
   height: 20px;
  text-indent: -999em;
  border: none;
  cursor:pointer;
   }
   
.amidelbttn {
  background-image: url(images/dlt-all.jpg);
   width: 62px;
   height: 20px;
  text-indent: -999em;
  border: none;
  cursor:pointer;
   }
   .amiunreadbttn {
  background-image: url(images/unread.png);
   width: 23px;
   height: 17px;
  text-indent: -999em;
  border: none;
  cursor:pointer;
   }
 .mtibttn {
  background-image: url(images/movetoinbox.png);
   width: 20px;
   height: 18px;
  text-indent: -999em;
  border: none;
  cursor:pointer;
   }
   
    .unreadbttn {
  background: url(images/Mail_email.png);
   width: 114px;
   height: 19px;
  text-indent: -999em;
  border: none;
  cursor:pointer;
   }
   .newreadbttn {
  background: url(images/message_opened.png);
   width: 99px;
   height: 22px;
  text-indent: -999em;
  border: none;
  cursor:pointer;
   }
   
}
</style>	

<p style="color:#333333;font-size:16px;font-weight:bold;margin-left:25px;margin-top:10px;">My Guidelines

<span style="color:#666666;font-size:12px;font-weight:bold;margin-right:25px;margin-top:10px;float:right"><a href="home-page.php" style="color:#999999">Home</a> &raquo My Guidelines</span>
</p>
	<hr / style="background-color:#999999; width:750px;">



    <?php
	if($_REQUEST['gid']!=""){
	
	$curr_state=db_scalar("select guide_is_imp from tbl_guideline where 1 and guide_id='$_REQUEST[gid]'");
	
	if($curr_state=="Yes"){
	db_query("update tbl_guideline set guide_is_imp='No' where 1 and guide_id='$_REQUEST[gid]'");	
	}else{
	db_query("update tbl_guideline set guide_is_imp='Yes' where 1 and guide_id='$_REQUEST[gid]'");	
	}
    

	
	
	header("location:guideline-board-member.php?pgid=mi&mty=$_REQUEST[mty]");
	exit;	
	}
	
	if(isset($_REQUEST['MakeUnread'])){
	db_query("update tbl_guideline set guide_msg_status='Unread' where 1 and guide_id='$_REQUEST[guideid]'");	
	header("location:guideline-board-member.php?pgid=mi&mty=in");
	exit;
	}
	
	if(isset($_REQUEST['DetailDelete'])){
	db_query("update tbl_guideline set guide_is_delete='Yes' where 1 and guide_id='$_REQUEST[guideid]'");	
	header("location:guideline-board-member.php?pgid=mi&mty=in");
	exit;
	}
	
	if(!empty($_REQUEST['rd_st'])){
	
	db_query("update tbl_guideline set guide_msg_status='Read' where 1 and guide_id='$_REQUEST[guideid]'");
	
	$sql="select * from  tbl_guideline where 1 and guide_id='$_REQUEST[guideid]'";
	$rec_guide=mysql_fetch_array(db_query($sql));	
	
	?>
<form action=""  method="post" >
<div> <a href="guideline-board-member.php?pgid=mi&mty=in">
            <div class="p5px fl ml10px" title="Back" style="color:#274F00"><img src="images/myback.png" class="vam ml15px" alt="" title="Back" />&nbsp;&nbsp;Back</div>
            </a>
            <div class="p5px fl ml10px" title="Delete" >
              <input type="submit" name="DetailDelete" value="" class="amidelbttn vam ml15px" title="Delete" />
            </div>
                        <div class="p5px fl ml10px" title="Click To Unread" >
              <input type="submit" name="MakeUnread" value="" class="amiunreadbttn vam ml15px" title="Click To Unread" />
              &nbsp;&nbsp;Mark as Unread</div>
                                    <p class="cb"></p>
            <p class="bd5 ml10px"></p>
          </div>

<input type="hidden" name="guide_id_h" value="<?=$_REQUEST['guideid']?>" />
</form>	
	
<div class="arif_shadow" style="width:92%;border:solid #CCCCCC thin;border-radius:5px;margin-top:25px;margin-left:25px;padding:10px;line-height:2.0em;color:#000000;background-color:#FBFBFB;height:auto">
	

	<span class="xlarge b"><?=$rec_guide['guide_title']?></span>
	<br />
<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191">	<?=date("d F Y",strtotime($rec_guide['guide_date']))?></span>

	<span class="i"><?=$rec_guide['guide_msg']?></span><?php /*?> ...<a href="guide-page.php?guide=<?=$rec_guide['guide_msg']?>" style="color:#FF9900">Read</a><?php */?>
	
	<span style="font-weight:bold;margin-top:5px;line-height:1.4em">
	<?=ucfirst(db_scalar("select reg_name  from tbl_registration where 1 and reg_id='$rec_guide[guide_from]'"))?>
	
</span>
<span style="font-weight:bold;line-height:1.4em;font-size:10px;font-family:Arial, Helvetica, sans-serif; color:#919191;float:left;"> <?=ucfirst($rec_guide['guide_from'])?>	
</span>
<br />


	</div>

<? }else{?>


	<?php
	$msg_ids="";
    if(is_array($arr_ids)){
    $msg_ids   =implode(",",$arr_ids);
    }
	$section="";

    //echo "select emp_id from tbl_emp where 1 and emp_reg_id='$_SESSION[UID_EMS]'";
	$id=db_scalar("select emp_id from tbl_emp where 1 and emp_reg_id='$_SESSION[UID_EMS]'");
	
	
	if(isset($_REQUEST['more'])){
	
	     if($_REQUEST['more']=="Read" || $_REQUEST['more']=="Unread"){
           
		   	$sql="update tbl_guideline set guide_msg_status='$_REQUEST[more]' where guide_id in ($msg_ids)";
	        db_query($sql);
			header("location:guideline-board-member.php?pgid=mi&mty=in");
			exit;
			}
			
		     if($_REQUEST['more']=="Yes" || $_REQUEST['more']=="No"){
           
		   	$sql="update tbl_guideline set guide_is_imp='$_REQUEST[more]' where guide_id in ($msg_ids)";
	        db_query($sql);
			header("location:guideline-board-member.php?pgid=mi&mty=in");
			exit;
			}	
			
	
	}
	
	if(isset($_REQUEST['MoveToInbox'])){
	$sql="update tbl_guideline set guide_is_delete='No' where guide_id in ($msg_ids)";
	db_query($sql);
	header("location:guideline-board-member.php?pgid=mi&mty=tr");
	exit;
	}
	
	
	if(isset($_REQUEST['MarkReadToUnread'])){
	$sql="update tbl_guideline set guide_msg_status='Unread' where guide_id in ($msg_ids)";
	db_query($sql);
	header("location:guideline-board-member.php?pgid=mi&mty=Read");
	exit;
	}
	
	
	if(isset($_REQUEST['MarkUnreadToRead'])){
	$sql="update tbl_guideline set guide_msg_status='Read' where guide_id in ($msg_ids)";
	db_query($sql);
	header("location:guideline-board-member.php?pgid=mi&mty=Unread");
	exit;
	}


	if(isset($_REQUEST['Delete'])){
		
		$flag=0;
		if($_REQUEST['mty']!="tr"){
		$sql="update tbl_guideline set guide_is_delete='Yes' where 1 and guide_id in ($msg_ids)";
		$flag=1;
		}else if($_REQUEST['mty']=="tr"){
		$sql="delete from tbl_guideline where 1 and guide_id in ($msg_ids)";
		$flag=2;
		}
		
		$res=db_query($sql);
		if($res>0){
		
		if($flag==1){
		$_SESSION['msg']="Enquiry has been moved to the Trash.";
		header("location:guideline-board-member.php?pgid=mi&mty=$_REQUEST[mty]");
		}else if($flag==2){
		$_SESSION['msg']="Enquiry(s) has been deleted successfully.";
		header("location:guideline-board-member.php?pgid=mi&mty=tr");
		}		
		exit;
		}
		
 }

	
	
	

	
   
   if($_REQUEST['mty']=='in'){
    $sql="select * from  tbl_guideline where 1 and guide_to_id='$id' and guide_is_delete='No'  order by guide_date desc";
	$section="Inbox";
	}
	
    if($_REQUEST['mty']=='tr'){
    $sql="select * from  tbl_guideline where 1 and guide_to_id='$id' and guide_is_delete='Yes' order by guide_date desc";
	$section="Trash";
	}
	
	if($_REQUEST['mty']=='Read'){
    $sql="select * from  tbl_guideline where 1 and guide_to_id='$id' and guide_msg_status='Read'  and guide_is_delete='No'   order by guide_date desc";
	$section="Read";
	}
	
	if($_REQUEST['mty']=='Unread'){
    $sql="select * from  tbl_guideline where 1 and guide_to_id='$id' and guide_msg_status='Unread'  and guide_is_delete='No'   order by guide_date desc";
	$section="Unread";
	}

	
	$data_guide=db_query($sql);
	$count_guide=mysql_num_rows($data_guide);
	?>


	
	
	<form action="" name="frm_guide" method="post" enctype="multipart/form-data" >
<div  class="mt5px p5px">
                <div style="color:#000000; font-size:12px; margin-left:210px; font-weight:bold;"> 
				<?php
				if(!empty($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
				}
				?>
				
				                        </div>
                <div class="mt10px bd5 p5px " style="background-color:#FFFFFF;"> <a href="guideline-board-member.php?pgid=mi&mty=in" title="Inbox" style="padding-top:6px; padding-bottom:10px; padding-right:5px;"  onmouseover="this.style.background='#E4E4E4'" onmouseout="this.style.background=''"><span class="vam ml15px"><img src="images/inbox.png" style="vertical-align:middle;"/></span><span class="ml5px vam large" style="color:#387100;">Inbox </span></a> 

<a href="guideline-board-member.php?pgid=mi&mty=tr" title="Trash" style="padding-top:6px; padding-bottom:10px; padding-left:5px; padding-right:5px;"  onmouseover="this.style.background='#E4E4E4'" onmouseout="this.style.background=''"><span class="vam ml15px"><img src="images/trash.png" style="vertical-align:middle;"/></span><span class="ml5px vam red large">Trash </span></a> 

<a href="guideline-board-member.php?pgid=mi&mty=Read" title="Read" style="padding-top:6px; padding-bottom:10px; padding-left:5px; padding-right:5px;"  onmouseover="this.style.background='#E4E4E4'" onmouseout="this.style.background=''"><span class="vam ml15px"><img src="images/Send_letter.png" style="vertical-align:middle;"/></span><span class="ml5px vam large" style="color:#004F75;">Read </span></a> 

<a href="guideline-board-member.php?pgid=mi&mty=Unread" title="Unread" style="padding-top:6px; padding-bottom:10px; padding-left:5px; padding-right:5px;"  onmouseover="this.style.background='#E4E4E4'" onmouseout="this.style.background=''"><span class="vam ml15px"><img src="images/unread.png" style="vertical-align:middle;"/></span><span class="ml5px vam large" style="color:#512800;">Unread </span></a>

<?php if($_REQUEST['mty']=='tr'){?>
<input   type="submit" name="MoveToInbox" class="vam mtibttn" style=" margin-left:5px;" onclick="return select_one()" />
<span class="ml5px vam large" style="color:#303030;">Move to Inbox </span>
<?php }?>

<?php if($_REQUEST['mty']=='Read'){?>
<input  name="MarkReadToUnread" type="submit" class="vam unreadbttn" style=" margin-left:5px;" onclick="return select_one()" />
<?php }?>

<?php if($_REQUEST['mty']=='Unread'){?>
<input  name="MarkUnreadToRead" type="submit" class="vam newreadbttn" style=" margin-left:5px;" onclick="return select_one()" />
<?php }?>


<?php if($_REQUEST['mty']=='in'){?>

									<a href="guideline-board-member.php?pgid=mi&mty=in"  id="refresh" style="padding-top:6px; padding-bottom:10px; padding-left:5px; padding-right:5px;"  onmouseover="this.style.background='#E4E4E4'" onmouseout="this.style.background=''"><span class="vam ml15px"><img src="images/refresh.png" style="vertical-align:middle;"/></span><span class="ml5px vam large" style="color:#00A429;">Refresh </span></a>
									
<?php }?>									

                                                                                          <span class="vam fr mr10px">
                                   
<select name="more" style="vertical-align:sub;border:solid thin #FFCC00;border-radius:5px;font-size:12px;font-family:'Comic Sans MS';background-color:#FFFFA6;width:60px;color:#666666" onchange="change_msg_status(this.value)">
<option value="0" >&nbsp;More</option>
<option value="Read">Mark as read</option>
<option value="Unread">Mark as unread</option>
<option value="Yes">Mark as important</option>
<option value="No">Mark as not important</option>
</select>								   
								   
								    <input  name="Delete" type="submit" class="vam delbutton" style=" margin-left:2px;" onclick="return select_one()" /><?php if($_REQUEST['mty']=='tr'){?> <span class="red">forever</span><? }?>
                                                      </span>
                  <p class="cb"></p>
                </div>
                <div >
                  <div class="mt5px  p5px bd5" style="background-color:#284c93;" >
                    <div class="ml10px fl" style="width:20px;">
                      <input name="check_all" type="checkbox" id="check_all" value="1" onclick="checkall(this.form)" />
                    </div>
                    <div class="b fl white ml20px large" style="width:120px;border-right:#FFFFFF solid 1px; height:20px;">From</div>
                    <div class="b fl white ml20px large" style="width:320px;border-right:#FFFFFF solid 1px; height:20px;" align="center">Title</div>
                    <div class="b fl white ml40px large" style="width:150px;" align="center">
                      Date
                    </div>
                    <p class="cb"></p>
                  </div>
				  
				  
<?
if($count_guide>0){
while($rec_guide=mysql_fetch_array($data_guide)){				  
?>                  
<div id="myDiv">                                    
<div style="padding-top:10px" class="bdrAll <?php if($rec_guide['guide_msg_status']=='Unread'){?> b<?php }?>" onmouseover="this.style.background='#f3edea'" onmouseout="this.style.background=''" >
<div class="ml15px fl " style="width:20px;"><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?=$rec_guide['guide_id']?>"  /></div>

<div class="fl ml10px" style="width:130px;font-size:11px;">

<div style="height:9px;width:16px;<? if($rec_guide['guide_is_imp']=='Yes'){?>background-color:#FFCC00<? }?>;border:#FF9900 solid thin;border-radius:0px 7px 7px 0px;float:left;margin-top:1px" onclick="change_on_click(<?=$rec_guide['guide_id']?>,'<?=$_REQUEST['mty']?>')" >&nbsp;</div>
<a href="guideline-board-member.php?pgid=mi&mty=in&guideid=<?=$rec_guide['guide_id']?>&rd_st=R" style="color:#333333;"><p style="margin-left:22px" ><?=ucfirst($rec_guide['guide_from'])?></p></div>
<div class="fl ml10px" style="width:340px;font-size:11px;"><p >
<?
if(!empty($rec_guide['guide_title'])){
echo substr($rec_guide['guide_title'],0,40);
if(strlen($rec_guide['guide_title'])>40){
echo "...";
}

}else{
echo "&nbsp;";
}
?></p></div>
<div class="fl ml10px" style="width:150px;font-size:11px;"><p style="padding-left:60px" ><?=date("d M Y",strtotime($rec_guide['guide_date']))?></p></div></a>
<p class="cb"></p>

<p class="bd90 ml10px mr10px mb2px"></p>
</div>

<? 
}
}else{
?>

<div class="red large ac mt10px bdrAll p10px"> There are no messages in your "<?=$section?>" folder </div>   
<? }?>


   

</div>
                  <p class="cb"></p>
                </div>
              </div>
</form>
	
	
<? }?>



		
	
	
	
	
	
	</td>
    <td valign="top" width="20%" >
		<?php include("right-home.php")?>
	</td>
  </tr>
</table> 
<div style="background:#284c93;height:33px;" class="mt10px">
  <p style="padding:10px;color:#FFFFFF;text-align:right;" >Copyright Reseverd @ Web Key Network Pvt Ltd</p>
</div>
<script type="text/javascript">
checked=false;
function checkall(frm1){
	var aa= frm1;
	if(checked == false){
		checked = true
	}else{
		checked = false
	}
	for (var i =0; i < aa.elements.length; i++){
		aa.elements[i].checked = checked;
	}
}
</script>

<script language="javascript" type="text/javascript">
function select_one()
{
var chks = document.getElementsByName('arr_ids[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one !");
return false;
}
}
</script>

<script>

function change_msg_status(state){
document.frm_guide.submit();
}


function change_on_click(gid,mty){
window.location="guideline-board-member.php?gid="+gid+"&mty="+mty
}
</script>

</body></html>