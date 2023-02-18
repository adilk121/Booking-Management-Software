// JavaScript Document
$(document).ready(function() {
  $(".pop1").fancybox({'width' : 680,'height' : 275,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $(".pop2").fancybox({'width' : 700,'height' : 215,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $(".pop3").fancybox({'width' : 700,'height' : 230,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $(".pop4").fancybox({'width' : 690,'height' : 635,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $(".pop5").fancybox({'width' : 700,'height' : 295,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $(".pop6").fancybox({'width' : 700,'height' : 245,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $(".pop7").fancybox({'width' : 700,'height' : 260,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $(".pop8").fancybox({'width' : 700,'height' : 230,'autoScale' : false,'transitionIn': 'fade','transitionOut': 'fade','type' : 'iframe'});
  $("a[rel=dg_group]").fancybox({ 'titlePosition' : 'over', 'titleFormat' : function(title, currentArray, currentIndex, currentOpts) { return ''; }
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