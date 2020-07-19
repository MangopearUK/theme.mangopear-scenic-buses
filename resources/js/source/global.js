/**
 * Global JS for the website
 */

jQuery(document).ready(function($){

	/**
	 * CONTENTS
	 *
	 * [1]	Re-initialise LazyLoadXT on resize
	 * [2]	Smoothly scroll to anchors
	 * [3]	Tickets & route carousels
	 */


	/**
	 * [1]	Re-initialise LazyLoadXT on resize
	 */
	
	var resizeTimeout;

	$(window).resize(function(){
		resizeTimeout = setTimeout(function(){
			$(window).lazyLoadXT({
				checkDuplicates: false
			});

			clearTimeout(resizeTimeout);
		}, 250);
	});





	/**
	 * [2]	Smoothly scroll to anchors
	 */
	
	$('a[href*="#"]:not([href="#"]), .js-smooth-scroll').on('click', function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			

			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});





	/**
	 * [3]	Tickets & route carousels
	 *
	 * 		[a]	Set LazyLoadXT to load images outside of viewport
	 */
	
	$('.js-carousel--routes').owlCarousel({
		margin: 		12,
		navElement: 	'button',
		navText:        ['<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-core.svg#arrow--left"/></svg>',
		                 '<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-core.svg#arrow--right"/></svg>'],
		loop: 			false,
		nav: 			true,
		navRewind: 		false,
		autoHeight: 	true,
		responsiveClass:true,
		responsive : {
			  0 : { items: 1 },
			600 : { items: 2 },
			900 : { items: 3 }
		}
	});

	
	setTimeout(
		function() {
			$('.js-carousel--tickets').owlCarousel({
				margin: 		12,
				navElement: 	'button',
				navText:        ['<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-core.svg#arrow--left"/></svg>',
				                 '<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-core.svg#arrow--right"/></svg>'],
				loop: 			false,
				nav: 			true,
				navRewind: 		false,
				autoHeight: 	true,
				responsiveClass:true,
				responsive : {
					  0 : { items: 1 },
					600 : { items: 2 },
					900 : { items: 3 }
				}
			});
		},
		200
	);


	$.extend($.lazyLoadXT, {					// [a]
		edgeX:  200000,							// [a]
	});											// [a]
	
});