jQuery(document).ready(function($) {

	/* Select inputs for Search/Newsletter dropdown */

	$( "#menu-search" ).click(function() {
		setTimeout( function(){
			$("#s").focus();
		}, 25);
	});

	$( "#menu-newsletter" ).click(function() {
		setTimeout( function(){
			$("#mce-EMAIL").focus();
		}, 25);
	});
	
	/* Newsletter sucess replacement */
	
	$( "#mc-embedded-subscribe" ).click(function() {
		$("#newsletter-form").fadeOut(function() {
			$("#newsletter-sucess").fadeIn();
  		});
	});
	
		
	
	$("#header-slider").lightSlider({
		minSlide:1,
		maxSlide:1,
		mode:'fade',
		keyPress: true,
		auto: true,
		pause: 10000
	  });
	  
	/* Program accent color replacement */
	  
	if ($("#program-color").length) {
		
		var color;
		
		$("a, h2").each(function () {
			color = $(this).css("color");
			if (color == "rgb(58, 196, 187)") {
				$(this).css("color", $("#program-color").css("color"));
			}
		});
		
		$("p, ul, li, ol").each(function () {
			var borderleft = $(this).css("border-left-color");
			if (borderleft == "rgb(0, 0, 0)" || borderleft == "rgb(58, 196, 187)") {
				$(this).css("border-left-color", $("#program-color").css("color"));
			}
		});
		
		$(".icon").hover(function() {
		  color = $(this).css("color");
		  $(this).css("color", $("#program-color").css("color"));
		  }, function() {
			$(this).css("color", color);
		});
		
		var highlightHTML = "<style>::selection{background-color:" + $("#program-color").css("color") + " !important;}::-moz-selection{background-color:" + $("#program-color").css("color") + "!important;}</style>";
		
		$(highlightHTML).insertAfter("body *:last");

		
	}
	
	/* Expandable li/ul for program pages */
	
	$("li").click(function() {
		
		$("li > ol").click(function() {
			return false;
		});
		
		if (	$(this).find("ol").is(':visible')) {
			$(this).find("ol").fadeOut();
			$(this).removeClass('active');
		} else {
			$(this).find("ol").fadeIn();
			$(this).addClass('active');
		}
	});
	
	$("li").click(function() {
		
		$("main li > ul").click(function() {
			return false;
		});
		
		if (	$(this).find("ul").is(':visible')) {
			$(this).find("ul").fadeOut();
			$(this).removeClass('active');
		} else {
			$(this).find("ul").fadeIn();
			$(this).addClass('active');
		}
	});
	  
	  
	  	
	  
	
});