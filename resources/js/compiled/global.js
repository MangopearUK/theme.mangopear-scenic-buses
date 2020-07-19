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
/**
 * [Component] Accordion
 *
 * Provides the JavaScript code to power the accordion component.
 *
 * @package     scenic-buses
 * @category    scripts
 * @version     4.0.0
 * @since       4.0.0
 * @author      Andi North <andi@mangopear.co.uk>
 * @link        https://mangopear.co.uk/
 * @license     GNU General Public License <http://opensource.org/licenses/gpl-license.php>
 */


/**
 * CHANGELOG
 *
 * @version 4.0.0
 *          Init file
 */


/**
 * CONTENTS
 *
 * [1]  Accordion
 */


/**
 * [1]  Accordion
 *
 *      @since 4.0.0
 */


jQuery(document).ready(function($){

	/**
	 * [1] Accordion
	 *
	 * 		[a]	On page load, find all accordions
	 * 		[b]	Find the action button for current accordion
	 * 		[c]	Set aria-expanded attr to false to close panel and trigger CSS styles
	 *
	 * 		[d]	When accordion action clicked
	 * 		[e]	Fetch current (open|close) state of accordion, save variable 
	 * 			with value that is the opposite of current state
	 * 		[f]	Change state of accordion to opposite state
	 */

	$('.js-accordion').each(function(){																// [a]
		var thisAction  = $(this).find('.js-accordion__action');									// [b]
		$(thisAction).removeAttr('hidden').attr('aria-expanded', 'false');							// [c]
	});																								// [a]


	$('.js-accordion__action').unbind().on('click', function(e){									// [d]
		var currentState = ($(this).attr('aria-expanded') === 'true') ? 'false' : 'true';			// [e]
		$(this).attr('aria-expanded', currentState);												// [f]
	});																								// [d]
});