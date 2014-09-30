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
	
	$( "#menu-newsletter-footer" ).click(function() {
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
		
		$("a, h1, h2, h3, p").each(function () {
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
		
		$("p").each(function () {
			var borderbottom = $(this).css("border-bottom-color");
			if (borderbottom == "rgb(0, 0, 0)" || borderbottom == "rgb(58, 196, 187)") {
				$(this).css("border-bottom-color", $("#program-color").css("color"));
			}
		});
		
		
		$("article.profile > #profile-content > p:last-child").addClass('no-after');
		$("article.profile > #profile-content > p:last-child").append('<div style="display: inline-block; width: 10px; height: 10px; background-color: ' + $("#program-color").css("color") + '; margin-left: 5px;"></div>');
		
		$(".icon").hover(function() {
		  color = $(this).css("color");
		  $(this).css("color", $("#program-color").css("color"));
		  }, function() {
			$(this).css("color", color);
		});
		
		var highlightHTML = "<style>::selection{background-color:" + $("#program-color").css("color") +
						   " !important;}::-moz-selection{background-color:" + $("#program-color").css("color") + "!important;}</style>";
		$(highlightHTML).insertAfter("body *:last");

		
	}
	
	/* Expandable li/ul for program pages */
	
	$("li").click(function() {
		
		$("li > ol").click(function() {
			return;
		});
		
		if ($(this).find("> ol").length) {
			if (	$(this).find("> ol").is(':visible')) {
				$(this).removeClass('active');
				$(this).find("> ol").fadeOut();
			} else {
				$(this).find("> ol").fadeIn();
				$(this).addClass('active');
			}
		}
		
		$("main li > ul").click(function() {
			return;
		});
		
		if ($(this).find("> ul").length) {
			if (	$(this).find("> ul").is(':visible')) {
				$(this).removeClass('active');
				$(this).find("> ul").fadeOut();
			} else {
				$(this).find("> ul").fadeIn();
				$(this).addClass('active');
			}
		}
	});
	  
	/* Clamp.js for events in footer. */
	$('.clamp').each(function(index, element) {
		$clamp(element, { clamp: 2, useNativeClamp: false });
	});
	
	/* Mobile Menu */
	$("#mobile-menu").mmenu({
		header: {
			add: true,
			update: true,
			title: "Build Institute"
		}
	});
	
});