<?
include("webClass.php");
$conObj=new Myclass();
$dbObj=new Dbquery();
if(strlen($id2) and $id3=="Checkbox"){
	$rr4=$dbObj->FetchArray($dbObj->query("select * from manage_category where catg_id='$id2'"));
	if($rr4[catg_visible]=="W"){
		$str='<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="227" align="right"><strong>Product Visibility</strong></td><td width="20"><strong>:</strong></td><td align="left"><strong class="red">Visible to Wholesaler Only</strong><input type="hidden" name="prod_visible" id="prod_visible" value="W"><input type="hidden" name="checkprod_visible" id="checkprod_visible" value="Y"><input type="hidden" name="checkprod_visible1" id="checkprod_visible1" value="Y">
					</td>
				</tr>
			  </table>';
	}
	elseif($rr4[catg_visible]=="AF"){
		$str='<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="227" align="right"><strong>Product Visibility</strong></td><td width="20"><strong>:</strong></td><td align="left"><strong class="red">Visible to Affilites only</strong><input type="hidden" name="prod_visible" id="prod_visible" value="AF"><input type="hidden" name="checkprod_visible" id="checkprod_visible" value="N"><input type="hidden" name="checkprod_visible1" id="checkprod_visible1" value="N">
					</td>
				</tr>
			  </table>';
	}
	elseif($rr4[catg_visible]=="R"){
		$str='<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="227" align="right"><strong>Product Visibility</strong></td><td width="20"><strong>:</strong></td><td align="left"><strong class="red">Visible to Retailers only </strong><input type="hidden" name="prod_visible" id="prod_visible" value="R"><input type="hidden" name="checkprod_visible" id="checkprod_visible" value="N"><input type="hidden" name="checkprod_visible1" id="checkprod_visible1" value="N">
					</td>
				</tr>
			  </table>';
	}
	elseif($rr4[catg_visible]=="A"){
		$str='<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="227" align="right"><strong>Product Visibility</strong></td><td width="20"><strong>:</strong></td><td align="left"><strong class="red">Visible to All Members </strong><input type="hidden" name="prod_visible" id="prod_visible" value="A"><input type="hidden" name="checkprod_visible" id="checkprod_visible" value="AF"><input type="hidden" name="checkprod_visible1" id="checkprod_visible1" value="AF">
					</td>
				</tr>
			  </table>';
	}
	echo $str;
}
?>