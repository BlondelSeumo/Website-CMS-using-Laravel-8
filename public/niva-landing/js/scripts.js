(function ($) {
	'use strict';

	var unero = unero || {};
	unero.init = function () {
			unero.$window = $(window),
			unero.$header = $('#site-header');
		
		this.stickyHeader();
		this.navMenu();
		this.featuresCarousel();

		$('#section-features').on('click', 'a', function(e) {
			e.preventDefault();
		});

	};

	unero.navMenu = function() {
		$('#site-navigation').stickyNavbar({
			sectionSelector: "scrollto",
			jqueryEffects: false,
			animateCSS: false,
			jqueryAnim: 'show'
		});
	};

	unero.featuresCarousel = function() {
		$('#section-homepages').find('.list-features').not('.slick-initialized').slick({
			slidesToShow  : 4,
			slidesToScroll: 1,
			arrows        : false,
			autoplay      : true,
			responsive    : [
				{
					breakpoint: 1200,
					settings  : {
						slidesToShow  : 3,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 767,
					settings  : {
						slidesToShow  : 1,
						slidesToScroll: 1
					}
				}
			]
		});
	};


	// Sticky Header
	unero.stickyHeader = function () {

		unero.$window.on('scroll', function () {
			var scrollTop = 5;

			if (unero.$window.scrollTop() > scrollTop) {
				unero.$header.addClass('minimized');
			} else {
				unero.$header.removeClass('minimized');
			}
		});


	};

	
	/**
	 * Document ready
	 */
	$(function () {
		unero.init();
	});

})(jQuery);