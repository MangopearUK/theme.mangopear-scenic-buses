/**
 * Global JS for the website
 */

jQuery(document).ready(function($){

	/**
	 * CONTENTS
	 *
	 * [1]	Header of the website - images, snapping, revealing etc
	 * [2]	Mobile expand button for the top navigation
	 */
	

	/**
	 * [1]	Header of the website
	 *
	 * 		[a]	Get viewport width
	 * 		[b]	Define the height of the header graphic using our three ratios
	 * 		[c]	Set snap point based on height minus main nav bar
	 */
	
	$('.js-hildon-header').each(function(){
		var windowWidth = $(window).width(); // [a]

		if      (windowWidth < 501)  { var headerHeight = windowWidth / 2; } // [b]
		else if (windowWidth > 1449) { var headerHeight = windowWidth / 4; } // [b]
		else                         { var headerHeight = windowWidth / 3; } // [b]


		$('.js-header-image-placeholder').height(headerHeight);


		if (windowWidth > 1150) {
			var snapPoint = 0 - headerHeight + 63;

			$('.js-hildon-header').waypoint(function(){
				$(this).toggleClass('is-snapped');
			}, {offset: snapPoint});
		} // [c]
	});





	/**
	 * [2]	Mobile expand button for the top navigation
	 *
	 * 		[a]	On the row, add a class of hidden to hide it on devices with JS enabled
	 * 		[b]	We only want to turn on transitions after initial load
	 * 		
	 */

	$('.js-hildon-header__top-toggle').on('click', function(){
		if ($(this).hasClass('is-active')) {
			$(this).removeClass('is-active');
			$('.js-mobile-nav-container').removeClass('is-showing');
			$('.js-close-mobile-nav').removeClass('is-showing');
		} else {
			$(this).addClass('is-active');
			$('.js-mobile-nav-container').addClass('is-showing');
			$('.js-close-mobile-nav').addClass('is-showing');
		}
	});


	$('.js-close-mobile-nav').on('click', function(){
		$('.js-hildon-header__top-toggle').removeClass('is-active');
		$('.js-mobile-nav-container').removeClass('is-showing');
		$('.js-close-mobile-nav').removeClass('is-showing');
	});





	/**
	 * [3]	Notifications
	 *
	 * 		[a]	Functionality for the dismiss button
	 * 		[b]	Snap to top of screen
	 */
	
	$('.js-dismiss-notification').on('click', function(e){
		e.preventDefault();
		var toDismiss = $(this).data('to-dismiss');
		$('#' + toDismiss).addClass('is-hidden');
	});


	$('.js-snap-notification').each(function(){
		var thisWidth = $(this).width();
		$(this).find('.o-notification__container').css('width', thisWidth);
		
		$(window).resize(function(){
			var thisWidth = $('.js-snap-notification').width();
			$('.js-snap-notification').find('.o-notification__container').css('width', thisWidth);
		});


		$(this).waypoint(function(){
			$(this).toggleClass('is-snapped');
		}, {offset: 77});
	});







	/**
	 * [4]	Start order notification - snap to top of screen
	 */


	$('.js-notification--start-order').each(function(){
		$('#start-order').waypoint(function(){
			$('.js-notification--start-order').toggleClass('is-not-relevant');
		}, {offset: 75});
	});





	/**
	 * [5]	Re-initialise LazyLoadXT on resize
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
	 * [6]	Better "Save changes" message for basket page
	 *
	 * 		[a]	On page load, add hidden class to notification
	 * 		[b]	When a user makes a change, show the notification
	 * 			(even after it has been dismissed)
	 */
	
	$('.js-notification--save-changes').each(function(){
		$(this).addClass('is-hidden');									// [a]
	});


	$('.js-save-basket-input input').bind('change', function(event) {
		$('.js-notification--save-changes').removeClass('is-hidden');	// [b]
	});





	/**
	 * [7]	Make the main navigation focusable using keyboard
	 *
	 * 		[a]	When focussing into top level links, show the dropdown
	 * 		[b]	When focussing out of top level links, hide the dropdown
	 * 		[c]	When focussing into links within a dropdown, show that dropdown
	 * 		[d]	When focussing out of a link in a dropdown, close the dropdown
	 */
	
	$('.js-header__navigation .js-main-nav-top-level-link').on('focusin', function(){  $(this).parent().addClass('is-in-focus'); });			// [a]
	$('.js-header__navigation .js-main-nav-top-level-link').on('focusout', function(){ $(this).parent().removeClass('is-in-focus'); });			// [b]


	$('.js-header__navigation .js-nav--sub a').on('focusin', function(){  $(this).parent().parent().parent().addClass('is-in-focus'); });		// [c]
	$('.js-header__navigation .js-nav--sub a').on('focusout', function(){ $(this).parent().parent().parent().removeClass('is-in-focus'); });	// [d]


	$('.js-toggle-sub-nav').on('click', function(){
		var parentListItem = $(this).parent();

		if (parentListItem.hasClass('is-in-focus')) {
			$(parentListItem).removeClass('is-in-focus');
		} else {
			$('.js-header__navigation .o-nav__item').removeClass('is-in-focus');
			$(parentListItem).addClass('is-in-focus');
		}
	});


	$('.js-remove-focus').on('click', function(){
		$(this).parent('li').parent('ul').parent('li').removeClass('is-in-focus');
	});





	/**
	 * [8]	Contact department panel
	 *
	 * 		[a]	Get the dialog element (with the accessor method you want)
	 * 		[b]	Instanciate a new A11yDialog module
	 */

	$('#department-form-modal').each(function(){
		var formDialogEl = document.getElementById('department-form-modal'); // [a]
		var mainEl = $('main'); // [a]
		var formDialog = new A11yDialog(formDialogEl, mainEl); // [b]


		$('.js-show-department-form-modal').on('click', function(e){
			e.preventDefault();
			formDialog.show();
		});


		$('.o-form--department .frm_error_style').each(function(){
			// On form error, and page reloads, show form modal.
			formDialog.show();
		});
	});





	/**
	 * [9]	Resource Library AJAX call
	 */
	
	$('#resource-library-login-modal').each(function(){
		var loginDialogEl = document.getElementById('resource-library-login-modal');
		var mainEl        = document.getElementById('main-resource-library');
		var loginDialog   = new A11yDialog(loginDialogEl, mainEl);
		loginDialog.show();


		$('.js-library-login').on('click', function(){
			var library = $('#library-id').val();
			var email_address = $('#email-address').val();


			var data = {
				action: 'hildon_resource_library_validate_email',
				library: library,
				emailAddress: email_address
			};


			$.post(hildon_ajax.ajax_url, data, function(response) {
				if (response == 'true') {
					loginDialog.hide();
					$('.js-library-content').removeClass('u-hide');
					$('.js-resource-library-notification').removeClass('u-hide');
				} else {
					$('.js-resource-library-error').removeClass('u-hide');
				}
			});
		});
	});





	/**
	 * [10]	Help for Heroes: Donation counter banner
	 *
	 * 		Remove the animation class on page load to enable the CSS animations.
	 */
	
	$('.js-donation-counter').each(function(){
		setTimeout(function(){
			$('.js-donation-counter').removeClass('has-animation');
		}, 1000);
	});
	











	/**
	 * [1]	Toggle navigations on mobile and tablet devices
	 */
	
	$('.js-nav-toggle').click(function(){
		if ($('.js-header__navigation').hasClass('u-portable--hide')) {
			$('.js-hildon-header').addClass('is-open');
			$('.js-header__navigation').removeClass('u-portable--hide');
			$('.js-toggle-top-nav').removeClass('u-portable--hide');
			$('.js-toggle-phone-number').removeClass('u-portable--hide');
		} else {
			$('.js-hildon-header').removeClass('is-open');
			$('.js-header__navigation').addClass('u-portable--hide');
			$('.js-toggle-top-nav').addClass('u-portable--hide');
			$('.js-toggle-phone-number').addClass('u-portable--hide');
		}
	});





	/**
	 * [2]	Call the twitter feed in the footer of the website
	 */
	
	$('.js-tweetie').twittie({
		username: 	 'hildonltd', // Option to load tweets from another account.
		list: 		 null,
		hashtag: 	 null,
		count: 		 1, // Number of tweets you want to display.
		hideReplies: true, // Hide replies and only show your own tweets
		dateFormat:  '%b. %d, %Y', // date format
		template: 	 '<div class="c-twitter__tweet">{{tweet}} <div class="c-twitter__date">{{date}} &nbsp;|&nbsp; Follow <a href="https://twitter.com/HildonLtd" target="_blank">@HildonLtd</a> on Twitter</div></div>', // Format how you want to show your tweets. 
		apiPath : 	 '/wp-content/themes/hildon/resources/js/vendor/tweetie/tweet.php',
	});





	/**
	 * [3]	Testimonials carousel
	 */
	
	$('.js-carousel--testimonials').each(function(){
		setTimeout(function(){
			$('.js-carousel--testimonials').owlCarousel({
				items: 		1,
				nav: 		true,
				navText: 	['<svg fill="currentColor" height="48" viewBox="0 0 24 24" width="48"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>','<svg fill="currentColor" height="48" viewBox="0 0 24 24" width="48"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>'],
				slideSpeed: 500,
				autoHeight: true,
			});
		}, 500);
	});





	/**
	 * [4]	Our Products carousel
	 */
	
	$('.js-carousel--our-products').each(function(){
		setTimeout(function(){
			$('.js-carousel--our-products').owlCarousel({
				items: 		1,
				nav: 		true,
				navText: 	['<svg fill="currentColor" height="48" viewBox="0 0 24 24" width="48"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>','<svg fill="currentColor" height="48" viewBox="0 0 24 24" width="48"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>'],
				slideSpeed: 500,
				autoHeight: true,
			});
		}, 500);
	});





	/**
	 * [5]	Validate Keep the Cap to win codes
	 */
	
	$('#frm_form_12_container .frm_page_num_1').each(function(){
		$('.js-ktc-button-validate').prop('disabled', true);
		$('.js-ktc-button-validate .o-button__text').text('Validate your code before continuing');
		
		$('.o-form__field--keepthecap input[type="text"]').bind('keyup', function(){
			$value = $(this).val();
			
			if ($value.length == 10) {
				$.ajax({
					url: '/keepthecap/validate/?cap_code=' + $value,
					
					beforeSend:function(){
						// this is where we append a loading image
						$('.js-ktc__validate').text('Loading').removeClass('has-failed').removeClass('has-passed').addClass('is-loading');
					},
					
					success:function(data){
						if (data == 4) {
							$classToAdd = 'has-passed';
							$iconToAdd  = '<svg fill="#FFFFFF" height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>';
							$('.js-ktc-button-validate').prop('disabled', false);
							$('.js-ktc-button-validate .o-button__text').text('Enter cap into draw');
						} else {
							$classToAdd = 'has-failed';
							$iconToAdd  = '<svg fill="#FFFFFF" height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>';
						}


						if (data == 1)      { $textToShow = 'Sorry. There was an error and it was our fault. Please <a href="/contact/">contact Hildon</a> for assistance (reporting error code 1).'; }
						else if (data == 2) { $textToShow = 'Sorry. There was an error and it was our fault. Please <a href="/contact/">contact Hildon</a> for assistance (reporting error code 2).'; }
						else if (data == 3) { $textToShow = 'The cap code you entered is invalid. Please try again with a correct cap code.'; }
						else if (data == 4) { $textToShow = '<strong>Thank you for entering a valid code.</strong> You can now continue to the next step.'; }
						else if (data == 5) { $textToShow = 'The cap code you entered is invalid. Please try again with a correct cap code.'; }
						else if (data == 6) { $textToShow = 'The cap code you entered has expired. Please try again with a correct cap code.'; }
						else if (data == 7) { $textToShow = 'The cap code you entered has been deleted and is no longer valid. Please try again with a correct cap code.'; }
						else if (data == 8) { $textToShow = 'The cap code you entered has been reported as suspicious. Please contact Hildon if you feel this is wrong.'; }
						else if (data == 9) { $textToShow = 'Sorry. There was an error and it was our fault. Please <a href="/contact/">contact Hildon</a> for assistance (reporting error code 9).'; }
						else                { $textToShow = 'Sorry. There was an unknown error. Please try again shortly.'; }
						

						$('.js-ktc__validate').html('<span class="c-ktc__status-icon">' + $iconToAdd + '</span><span class="c-ktc__status-text">' + $textToShow + '</span>').removeClass('has-failed').removeClass('has-passed').removeClass('is-loading').addClass($classToAdd);
					},
					
					error:function(){
						// failed request; give feedback to user
						$('.js-ktc__validate').text('Sorry. Your code has failed. Please try again.').removeClass('is-loading').addClass('.has-failed');
					}
					});
			} else if ($value.length < 10) {
				$('.js-ktc__validate').html('<span class="c-ktc__status-icon"><svg fill="#FFFFFF" height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span><span class="c-ktc__status-text">Your coupon code is too short. It should be 10 characters long.</span>').addClass('has-failed');
			} else {
				$('.js-ktc__validate').html('<span class="c-ktc__status-icon"><svg fill="#FFFFFF" height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span><span class="c-ktc__status-text">Your coupon code is too long. It should be 10 characters long.</span>').addClass('has-failed');
			}
		});
	});





	/**
	 * [6]	Show a #KeepTheCap feed on the KTC campaign page
	 */
	
	$('.js-ktc-tweetie').twittie({
		username: 	 'hildonltd', // Option to load tweets from another account.
		list: 		 null,
	//	hashtag: 	 'KeepTheCapToWin',
		count: 		 10, // Number of tweets you want to display.
		hideReplies: true, // Hide replies and only show your own tweets
		dateFormat:  '%b. %d, %Y', // date format
		template: 	 '<div class="c-twitter__tweet">{{tweet}} <div class="c-twitter__date">{{date}}</div></div>', // Format how you want to show your tweets. 
		apiPath : 	 '/wp-content/themes/hildon/resources/js/vendor/tweetie/tweet.php',
	});





	/**
	 * [7]	Delivery timings form
	 *
	 * 		[a]	When click on form button
	 * 		[b]	Stop the button from submitting the form
	 * 		[c]	Get the input value (i.e. the postcode)
	 * 		[d]	Parse the postcode and get the message to show
	 * 		[e]	Show the message
	 * 		[f]	If the input is empty, show an error
	 */
	
	$('.js-postcode-lookup__button').bind('click', function(event){ // [a]
		event.preventDefault; // [b]
		$thisValue = $('.js-postcode-lookup').val(); // [c]

		if ($thisValue != "") {
			$deliveryMessage = hildonOutputDeliveryScheduleMessage($thisValue); // [d]
			$('.js-postcode-lookup__status').removeClass('has-failed').text($deliveryMessage); // [e]
		} else {
			$('.js-postcode-lookup__status').addClass('has-failed').text('Please enter a valid postcode.'); // [f]
		}
	});





	/**
	 * [8]	Increase/Decrease quantity fields
	 */
	
	$('.js-range__product-quantity__input').bind('keyup', function(event) {
		$newQuantity = $(this).val();

		$(this).parent().attr('data-quantity', $newQuantity);
		$(this).parent().next().attr('data-quantity', $newQuantity);
	});

	
	$('.js-buy-decrease-quantity').bind('click', function(event) {
		var $currentQuantity = $(this).parent().parent().attr('data-quantity');

		if ($currentQuantity > 1) {
			var $newQuantity = parseInt($currentQuantity) - 1;
			
			$(this).parent().parent().find('.js-range__product-quantity__input').val($newQuantity);	// .c-range__product-quantity
			$(this).parent().parent().attr('data-quantity', $newQuantity); 							// .c-range__product-quantity
			$(this).parent().parent().next().attr('data-quantity', $newQuantity); 					// .js-add-to-cart
		}
	});

	
	$('.js-buy-increase-quantity').bind('click', function(event) {
		var $currentQuantity = $(this).parent().parent().attr('data-quantity');
		var $newQuantity = parseInt($currentQuantity) + 1;

		$(this).parent().parent().find('.js-range__product-quantity__input').val($newQuantity);
		$(this).parent().parent().attr('data-quantity', $newQuantity); 							// .c-range__product-quantity
		$(this).parent().parent().next().attr('data-quantity', $newQuantity); 					// .js-add-to-cart
	});





	/**
	 * [10]	Our video modal
	 */
	
	$('.js-our-video').on('click', function(event){
		event.preventDefault();


		$('.js-modal--our-video')
			.removeClass('u-hide')
			.find('.js-modal__content')
				.append('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/UyfVPsmlkLo?rel=0" frameborder="0" allowfullscreen></iframe>');
	});


	$('.js-modal__background').on('click', function(){
		$(this).parent()
			.addClass('u-hide')
			.find('.js-modal__content iframe').remove();
	});

	$('.js-modal__close').on('click', function(){
		$(this).parent().parent()
			.addClass('u-hide')
			.find('.js-modal__content iframe').remove();
	});





	/**
	 * [11]	Validate refer a friend entries
	 */
	
	$('#frm_form_18_container input[type="email"]').bind('change', function(event) {
		var thisValue = $(this).val(); // Get input value
		var referEmails = []; var disabledCount = 0;

		$('#frm_form_18_container input[type="email"]').each(function(){
			var thisEmail = $(this).val(); // Looping through all fields, getting values
			referEmails.push(thisEmail); // Push to array
		});


		// Does this string match more than once?
		var matches = 0; for (var i = 0; i < referEmails.length; i++) {
			if (referEmails[i] === thisValue) { matches++; }
		}


		// If more than one match, display error message
		if (matches >= 2) {
			$(this).parent().append('<div class="o-form__message  o-form__message--error  js-appended-message">This appears to be a duplicate email address.</div>');
			$(this).attr('data-disabled', 1);
		} else {
			$(this).parent().find('.js-appended-message').remove();
			$(this).attr('data-disabled', 0);
		}


		$('#frm_form_18_container input[type="email"]').each(function(){
			var thisDisabled = $(this).attr('data-disabled');
			if (thisDisabled == true) { disabledCount++; }
		});


		// Disable submit button
		console.log(disabledCount);
		if (disabledCount >= 1) {
			$('#frm_form_18_container .o-button--submit').prop('disabled', true);
		} else {
			$('#frm_form_18_container .o-button--submit').prop('disabled', false);
		}
	});





	/**
	 * [12]	NSIF video modal
	 */
	
	$('.js-nsif-video').on('click', function(event){
		event.preventDefault();


		$('.js-modal--nsif-video')
			.removeClass('u-hide')
			.find('.js-modal__content')
				.append('<iframe src="https://player.vimeo.com/video/118025281?autoplay=1&color=822676&title=0&byline=0&portrait=0" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
	});


	$('.js-modal__background').on('click', function(){
		$(this).parent()
			.addClass('u-hide')
			.find('.js-modal__content iframe').remove();
	});

	$('.js-modal__close').on('click', function(){
		$(this).parent().parent()
			.addClass('u-hide')
			.find('.js-modal__content iframe').remove();
	});





	/**
	 * [13]	Salutation field on checkout, show other field
	 */
	
	$('#salutation_other_field').each(function(){
		$(this).hide();


		$('#salutation').on('change', function(){
			$thisValue = $(this).val();


			if ($thisValue == 'other') {
				console.log('Current value = ' + $thisValue)
				$('#salutation_other_field').show();
			} else {
				console.log('Current value = ' + $thisValue)
				$('#salutation_other_field').hide();
			}
		});
	});





	/**
	 * [14]	Smoothly scroll to anchors
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
	 * [15]	Feedback modal
	 */
	
	$('#feedback-dialog').each(function(){
		var mainEl = document.getElementById('top'); 		// [a]
		var feedbackDialogEl = document.getElementById('feedback-dialog'); 		// [a]
		var feedbackDialog = new A11yDialog(feedbackDialogEl, mainEl); 					// [b]


		$('.js-feedback-start').on('click', function(){
			$('.js-feedback-dialog').addClass('is-open');
			$('.o-form-field--feedback-1').addClass('is-visible');
		});


		var pagesCount = localStorage.getItem('hildon-feedback');

		if (pagesCount) {
			pagesCount++;
			localStorage.setItem('hildon-feedback', pagesCount);
			
			if (pagesCount == 2) {
				feedbackDialog.show();
				$('.js-feedback-dialog').removeClass('is-hidden');
			}
		} else {
			localStorage.setItem('hildon-feedback', 1);
		}


		$('.js-feedback-next-step').on('click', function(){
			var currentField = $('.js-feedback-dialog').find('.o-form__field.is-visible');

			if ($(currentField).hasClass('o-form-field--feedback-6')) { $('.js-feedback-dialog').addClass('is-on-last-field'); }
			$(currentField).removeClass('is-visible')
			setTimeout(function(){ $(currentField).next().addClass('is-visible'); }, 250);
		});


		$('.js-feedback-submit').on('click', function(){
			$('.o-form-field--feedback-7').removeClass('is-visible');
			$('.c-feedback .o-form__submit').addClass('is-hidden');
			$('.js-feedback-dialog').addClass('has-submitted');
		});
	});
	
});