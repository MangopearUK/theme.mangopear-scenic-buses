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
	
});