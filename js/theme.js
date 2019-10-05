if(!Modernizr.touch){ 
    $.stellar();
}
(function() {

	"use strict";

	var Core = {

		initialized: false,

		initialize: function() {

			if (this.initialized) return;
			this.initialized = true;

			this.build();

		},

		build: function() {
			
			$('body').bind('touchstart', function() {});
			
			// Scroll to Top Button.
			
			//$.scrollToTop();
			
			// dropdown menu
			this.dropdownhover();
			
			// Dropdown Menu
			$(document).on("click", ".dropdown .dropdown-menu", function(e) {
				e.stopPropagation()
			});
			
			// Owl Carousel
			
			//show login
			this.showLogin();
			
			// Owl Featured Carousel
			this.owlFeaCarousel();
			
			//Owl Blog Slide
			this.owlBlogSlide();
			
			// Tooltips
			$("a[data-toggle=tooltip]").tooltip();
			
			
			//Filter Price
			this.filterPrice();
			
			// Media Element
			this.mediaElement();
			
			// Animations
			this.animationonscroll();
			
			//reload
			this.proSlider();
			
		},

		dropdownhover: function(options) {
		
			/** Extra script for smoother navigation effect **/
			if ($(window).width() > 992) {
				$('.navbar-main-slide .navbar-nav > .dropdown').hover(function () {
					"use strict";
					$(this).addClass('open').find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
				}, function () {
					"use strict";
					var na = $(this);
					na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function () {
						na.removeClass('open');
					});
				});
			}
			
		},
		
		proSlider: function(options) {
			
			$('.quickview-wrapper').on('shown.bs.modal', function (e) { 
				proload.reloadSlider();
			})
			
			var proload = $('.bxslider').bxSlider({
				pagerCustom: '#bx-pager',
				controls: false,
				adaptiveHeight : 'true'
			});
		
		},

		owlCarousel: function(options) {
			
			//new listing
			var owl = $("#owl-main-demo");
			
			owl.owlCarousel({
				navigation : true,
				pagination: false,
				autoPlay : true,
				 singleItem : true,
			    transitionStyle : "fade",
				lazyEffect: "fade",
				navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			  });
	
			  //Select Transtion Type
			  $("#transitionType").change(function(){
				var newValue = $(this).val();
	
				//TransitionTypes is owlCarousel inner method.
				owl.data("owlCarousel").transitionTypes(newValue);
	
				//After change type go to next slide
				owl.trigger("owl.next");
			  });
			

		},

		owlSecondCarousel: function(options) {
			
			//new listing
			var owl = $("#owl-second-demo");
			
			owl.owlCarousel({
				navigation : true,
				pagination: false,
				singleItem : true,
				autoPlay : true,
				transitionStyle : "backSlide",
				navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			  });
	
			  //Select Transtion Type
			  $("#transitionType").change(function(){
				var newValue = $(this).val();
	
				//TransitionTypes is owlCarousel inner method.
				owl.data("owlCarousel").transitionTypes(newValue);
	
				//After change type go to next slide
				owl.trigger("owl.next");
			  });
			

		},

		owlThirdCarousel: function(options) {
			
			//new listing
			var owl = $("#owl-third-demo");
			
			owl.owlCarousel({
				navigation : true,
				pagination: false,
				singleItem : true,
				autoPlay : true,
				transitionStyle : "goDown",
				navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			  });
	
			  //Select Transtion Type
			  $("#transitionType").change(function(){
				var newValue = $(this).val();
	
				//TransitionTypes is owlCarousel inner method.
				owl.data("owlCarousel").transitionTypes(newValue);
	
				//After change type go to next slide
				owl.trigger("owl.next");
			  });
			

		},

		owlFeaCarousel: function(options) {
			
			//owl-featured-slide
			var owl = $("#owl-featured-slide");
			
	
			  //Select Transtion Type
			  $("#transitionType").change(function(){
				var newValue = $(this).val();
	
				//TransitionTypes is owlCarousel inner method.
				owl.data("owlCarousel").transitionTypes(newValue);
	
				//After change type go to next slide
				owl.trigger("owl.next");
			  });
			

		},

		owlBlogSlide: function(options) {
			
			//owl-featured-slide
			var owl = $("#owl-blog-slide");
			
	
			  //Select Transtion Type
			  $("#transitionType").change(function(){
				var newValue = $(this).val();
	
				//TransitionTypes is owlCarousel inner method.
				owl.data("owlCarousel").transitionTypes(newValue);
	
				//After change type go to next slide
				owl.trigger("owl.next");
			  });
			

		},
		
		owlProducts: function(options) {
			
			var owl = $("#owl-product-slide");
			owl.owlCarousel({
				navigation : true,
				pagination: false,
				items : 4,
				itemsCustom : false,
				itemsDesktop : [1199,4],
				itemsDesktopSmall : [991,3],
				itemsTablet: [768,3],
				itemsTabletSmall: [640,2],
				itemsMobile : [480,1],
				singleItem : false,
				itemsScaleUp : false,
				navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
				
			});
			
			// Custom Navigation Events
			$("#owl-product-slide .next").click(function(){
				owl.trigger('owl.next');
			})
			
			$("#owl-product-slide .prev").click(function(){
				owl.trigger('owl.prev');
			})
			

		},
		
		owlText: function(options) {
			
			//new listing
			var owl = $("#owl-text-slide");
			
			owl.owlCarousel({
				navigation : false,
				pagination : false,
				singleItem : true,
				autoPlay : true,
				transitionStyle : "fade"
			  });
	
			  //Select Transtion Type
			  $("#transitionType").change(function(){
				var newValue = $(this).val();
	
				//TransitionTypes is owlCarousel inner method.
				owl.data("owlCarousel").transitionTypes(newValue);
	
				//After change type go to next slide
				owl.trigger("owl.next");
			  });
			

		},
		
		showLogin: function(options) {
			
			$('.navbar-main .login > a').click(function() {
				var wrapper = $('.login-wrapper');
				
				if (wrapper.hasClass('open')) {
				  wrapper.removeClass('open');
				}
				else {
				  wrapper.addClass('open');
				}
			});
			
		},
		
		
		filterPrice: function() {
			
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 500,
				values: [ 0, 500 ],
				slide: function( event, ui ) {
			event = event;
					$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				}
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
				" - $" + $( "#slider-range" ).slider( "values", 1 ) );
			
		},
		
		animationonscroll: function() {},
		
		mediaElement: function(options) {

			if(typeof(mejs) == "undefined") {
				return false;
			}

			$("video:not(.manual)").each(function() {

				var el = $(this);

				var defaults = {
					defaultVideoWidth: 480,
					defaultVideoHeight: 270,
					videoWidth: -1,
					videoHeight: -1,
					audioWidth: 400,
					audioHeight: 30,
					startVolume: 0.8,
					loop: false,
					enableAutosize: true,
					features: ['playpause','progress','current','duration','tracks','volume','fullscreen'],
					alwaysShowControls: false,
					iPadUseNativeControls: false,
					iPhoneUseNativeControls: false,
					AndroidUseNativeControls: false,
					alwaysShowHours: false,
					showTimecodeFrameCount: false,
					framesPerSecond: 25,
					enableKeyboard: true,
					pauseOtherPlayers: true,
					keyActions: []
				}

				var config = $.extend({}, defaults, options, el.data("plugin-options"));

				el.mediaelementplayer(config);

			});

		}
		

	};

	Core.initialize();


})();