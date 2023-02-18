
	$(document).ready(function() {
	     $(".pop1").fancybox({
			'width'				: 750,
			'height'			: 550,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe'
		});	
		 
		  $(".pop2").fancybox({
			'width'				: 550,
			'height'			: 260,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe'
		});	
		  
		   $(".pop3").fancybox({
			'width'				: 350,
			'height'			: 250,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe'
		});
		    $(".pop4").fancybox({
			'width'				: 450,
			'height'			: 500,
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
