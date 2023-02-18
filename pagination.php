<?php

/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	$pagination = "";
	
if($lastpage > 1)
{	


if ($page > 1) 
$pagination.= " <a href=\"$targetpage?page=$prev\" > <span class=\"bbnt2\">< previous</span></a>";
else
$pagination.= "<span class=\"bbnt2\"> < previous</span>";	

//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"bbnt2\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\"><span class=\"bbnt2\">$counter</span></a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"bbnt2\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\"><span class=\"bbnt2\">$counter</span></a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\"><span class=\"bbnt2\">$lpm1</span></a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\"><span class=\"bbnt2\">$lastpage</span></a>";		
}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"$targetpage?page=1\"><span class=\"bbnt2\">1</span></a>";
$pagination.= "<a href=\"$targetpage?page=2\"><span class=\"bbnt2\">2</span></a>";
$pagination.= "...";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"bbnt2\"><span class=\"bbnt2\">$counter</span></span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\"><span class=\"bbnt2\">$counter</span></a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\"><span class=\"bbnt2\">$lpm1</span></a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\"><span class=\"bbnt2\">$lastpage</span></a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"$targetpage?page=1\"><span class=\"bbnt2\">1</span></a>";
$pagination.= "<a href=\"$targetpage?page=2\"><span class=\"bbnt2\">2</span></a>";
$pagination.= "...";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"bbnt2\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\"><span class=\"bbnt2\">$counter</span></a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"$targetpage?page=$next\" ><span class=\"bbnt2\">next ></span></a>";
else
$pagination.= "<span class=\"bbnt2\">next ></span>";

}

?>