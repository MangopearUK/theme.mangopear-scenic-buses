/**
 * Global JS for the website
 */

jQuery(document).ready(function($){

	/**
	 * CONTENTS
	 *
	 * [1]	Re-initialise LazyLoadXT on resize
	 * [2]	Smoothly scroll to anchors
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
	 * [3]	Turn route lists into carousels
	 */
	
	$('.js-carousel--routes').owlCarousel({
		margin: 		10,
		navElement: 	'button',
		navText:        ['<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-icons.svg#arrow-left"/></svg>',
		                 '<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-icons.svg#arrow-right"/></svg>'],
		responsiveClass:true,
		responsive:{
			0 : {
				items: 			1,
				nav: 			false,
				autoHeight: 	true
			},
			600:{
				items: 			2,
				nav: 			false,
				autoHeight: 	false
			},
			900:{
				items: 			3,
				nav: 			true,
				autoHeight: 	false
			}
		}
	});





	/**
	 * [4]	Routes > Places of interest carousel
	 */
	
	$('.js-carousel--tickets').owlCarousel({
		margin: 		10,
		navElement: 	'button',
		navText:        ['<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-icons.svg#arrow-left"/></svg>',
		                 '<svg class="o-icon" height="24" width="24" role="presentation"><use xlink:href="/sprites/mangopear-icons.svg#arrow-right"/></svg>'],
		responsiveClass:true,
		responsive:{
			0 : {
				items: 			1,
				nav: 			false,
				autoHeight: 	true
			},
			600:{
				items: 			2,
				nav: 			false,
				autoHeight: 	false
			},
			900:{
				items: 			3,
				nav: 			true,
				autoHeight: 	false
			}
		}
	});





	/**
	 * [5]	Routes > Single template > Fares & tickets > Tooltips
	 *
	 * 		@version 1.10.0
	 *
	 * 		[a]	Hook in to document events to close all tooltips...
	 * 		[b]	...but only if we're not clicking on a tooltip button...
	 * 		[c]	...close all tooltips
	 *
	 * 		[d]	To open a tooltip, must unbind owlCarousel event, then...
	 * 		[e]	Fetch current tooltip object
	 * 		[f]	If tooltip is open...
	 * 		[g]	...close it
	 * 		[h] If tooltip is not open...
	 * 		[i]	...close all tooltips...
	 * 		[j]	...open selected tooltip
	 */
	
	$(document).click(function(event) { 														// [a]
		if (! $(event.target).closest('.js-tickets__details__button').length) {					// [b]
			$('.js-tickets__details__reveal').removeClass('is-visible');						// [c]
		}        																				// [b]
	});																							// [a]


	$('.js-tickets__details__button').unbind("click").on('click', function(){					// [d]
		tooltip = $(this).next();																// [e]


		if (tooltip.hasClass('is-visible')) {													// [f]
			tooltip.removeClass('is-visible');													// [g]
		} else {																				// [h]
			$('.js-tickets__details__reveal').removeClass('is-visible');						// [i]
			tooltip.addClass('is-visible');														// [j]
		}																						// [f]
	});																							// [d]
	
});