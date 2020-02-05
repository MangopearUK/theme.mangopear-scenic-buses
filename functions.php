<?php

	/**
	 * Functions and filters that are specific to the Hildon WordPress theme.
	 *
	 * These functions and filters might be extended from functions, classes and filters found within
	 * /functions/functions.php
	 *
	 * @package  	mangopear
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2017 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	3.0.0
	 * @link 		https://mangopear.co.uk/
	 * @since   	3.0.0
	 */


	 /**
	 * Contents
	 *
	 * [1]	Include parent theme stylesheet and JS files
	 * [2]	Include theme includes
	 * [3]	Set the content width for the website
	 * [4]	Add class to the first paragraph of WYSIWYG
	 * [5]	Add image sizes
	 * [6]	Remove emoji support
	 * [8]	Custom menu function to use instead of nav_menu
	 * [9]	Register ACF options page
	 * [10]	Wrap tables in a class
	 * [11]	Remove height and width attrs from images
	 * [12]	Remove support for 4.4's responsive images.
	 * [13]	Add definition for our SVG sprite document
	 * [14]	Define search bar string
	 * [15]	Disable ACF styles on front end
	 * [16]	Calculate average rating for route, store as meta
	 * [17]	Output rating stars
	 */
	

	/**
	 * [1]	Include parent theme stylesheet and JS files
	 *
	 * 		@since 3.0.0
	 */
	
	add_action('wp_enqueue_scripts', 'mangopear_parent_enqueue', 1);

	function mangopear_parent_enqueue() {
		wp_enqueue_script('mangopear__parent--plugins', get_template_directory_uri() . '/resources/js/compiled/plugins.min.js', array('jquery')); 	// [a]
		wp_enqueue_script('mangopear__parent--scripts', get_template_directory_uri() . '/resources/js/compiled/global.min.js', array('jquery')); 	// [b]
		wp_enqueue_style( 'mangopear__parent--styles',  get_template_directory_uri() . '/resources/css/compiled/screen.css'); 						// [c]
	}





	/**
	 * [2]	Include theme includes
	 *
	 * 		@since 3.0.0
	 *
	 * 		[a]	Get theme include class
	 */
	
	require_once get_stylesheet_directory() . '/includes/class.scenic-buses.php'; 	// [a]





	/**
	 * [3]	Set the content width for the website
	 *
	 * 		The content width $var is used by WordPress (core) for defining the styling of oEmbed objects to
	 * 		ensure they do not overflow the width of the website. Additional styling required through CSS.
	 *
	 * 		@var int [Define the maximum width of the website, measured in pixels]
	 *
	 * 		@since 3.0.0
	 */

	if (!isset($content_width)) :
		$content_width = 950;
	endif;





	/**
	 * [4]	Add class to the first paragraph of WYSIWYG
	 *
	 * 		@since 3.0.0
	 */

	function scenic_content_first_p($content) {
		return preg_replace('/<p([^>]+)?>/', '<p$1 class="c-lede">', $content, 1);
	}

	add_filter('the_content', 'scenic_content_first_p');





	/**
	 * [5]	Add image sizes
	 *
	 * 		@since 3.0.0
	 *
	 * 		[a]	Larger thumbnails
	 * 		[b]	Scenic page titles
	 */

	function scenic_add_image_sizes() {
		add_image_size('larger-thumbnail', 300, 300, true);			// [a]

		add_image_size('scenic-title--large', 710, 600, true);		// [b]
		add_image_size('scenic-title--small', 400, 340, true);		// [b]
	}

	add_action('after_setup_theme', 'scenic_add_image_sizes');





	/**
	 * [6]	Remove emoji support
	 *
	 * 		@since 3.0.0
	 */

	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');





	/**
	 * [8]	Add ACF options page
	 *
	 * 		@since 3.0.0
	 */

	if (function_exists('acf_add_options_sub_page__scenic')) {
	    acf_add_options_sub_page__scenic(array(
	        'title' 	 => 'Scenic Buses theme options',
	        'parent'	 => 'themes.php',
	        'capability' => 'manage_options',
	    ));
	}





	/**
	 * [10]	Wrap tables in a class
	 *
	 * 		@since 3.0.0
	 */

	function scenic_content_table($content) {
		// Regex to find:
		$find__table = array(
			'/<table(.*)>/',
			'/<\/table>/',
		);
		
		$replace__table = array(
			'<div class="c-table-wrapper"><table$1>',
			'</table></div>',
		);

		return preg_replace($find__table, $replace__table, $content);  
	}

	add_filter('the_content', 'scenic_content_table');





	/**
	 * [12]	Remove support for 4.4's responsive images.
	 *
	 * 		This feature will be re-instated when performance improvements have 
	 * 		been made to the images, such as preloading and srcset throughout
	 * 		the entire website. But until this functionality becomes part of the 
	 * 		Hildon website, we need to disable support for it.
	 *
	 * 		@since 3.0.0
	 */
	
	add_filter('wp_get_attachment_image_attributes', function($attr) {
		if (isset($attr['sizes'])) unset($attr['sizes']);
		if (isset($attr['srcset'])) unset($attr['srcset']);
		return $attr;
	}, PHP_INT_MAX);

	
	add_filter('wp_calculate_image_sizes', '__return_false', PHP_INT_MAX);
	add_filter('wp_calculate_image_srcset', '__return_false', PHP_INT_MAX);
	remove_filter('the_content', 'wp_make_content_images_responsive');





	/**
	 * [13]	Add definition for our SVG sprite documents
	 *
	 * 		To avoid excess markup, we're now loading most SVG icons via a sprite
	 * 		sheet. Any complex icons (i.e. more than two colours) still need to be
	 * 		inlined.
	 *
	 * 		@since 3.0.0
	 *
	 * 		[a]	Global, generic, sprite
	 */
	
	define('SCENIC_SPRITE', get_site_url() . '/sprites/scenic-icons.svg');			// [a]





	/**
	 * [14]	Define search bar string
	 *
	 * 		@since  4.0.0
	 */
	
	define(SEARCH_BAR_STRING, 'Search routes or destinations');
	define(BROWSER_TAB_COLOUR, '#17912F');





	/**
	 * [15]	Disable ACF styles on front end
	 */
	
	add_action('wp_print_styles', 'my_deregister_styles', 100);


	function my_deregister_styles() {
		wp_deregister_style('acf');
		wp_deregister_style('acf-field-group');
		wp_deregister_style('acf-global');
		wp_deregister_style('acf-input');
	}





	/**
	 * [16]	Calculate average rating for route, store as meta
	 *
	 * 		@since 4.0.0
	 *
	 * 		[a]	Hook into comment creation action - this is the stage the acf 
	 * 			fields are populated (not wp_insert_comment)
	 * 		[b]	Hook into comment status change (i.e. if comment is trashed)
	 *
	 * 		[c]	Pull in vars from action [a]
	 * 		[d]	Turn comment_id into obj
	 * 		[e]	Hook into our bespoke function
	 *
	 * 		[f]	Pull in vars from action [b]
	 * 		[d]	Turn comment_id into obj
	 * 		[h]	Hook into our bespoke function
	 *
	 * 		[j]	Set empty array, to be populated later
	 * 		[k]	Get comments relating to post ID of route
	 * 		[l]	Loop through comments in [b]
	 * 		[m]	Get the rating values
	 * 		[n]	Push the rating value (int) to [a] array
	 * 		[o]	Filter review array to remove empty values
	 * 		[p]	Calculate review average
	 * 		[r]	Round average to two decimal places
	 * 		[s]	Delete previous post meta entry
	 * 		[t]	Save as post meta
	 */
	
	add_action('comment_post', 	        'scenic_update_rating_average_on_publish',       99, 3);			// [a]
	add_action('wp_set_comment_status', 'scenic_update_rating_average_on_status_change', 99, 2);			// [b]


	function scenic_update_rating_average_on_publish($comment_id, $comment_approved, $comment_data) {		// [c]
		$comment_obj = get_comment($comment_id);															// [d]
		scenic_calculate_rating($comment_obj);																// [e]
	}																										// [c]


	function scenic_update_rating_average_on_status_change($comment_id, $comment_status) {					// [f]
		$comment_obj = get_comment($comment_id);															// [g]
		scenic_calculate_rating($comment_obj);																// [h]
	}																										// [f]


	function scenic_calculate_rating($comment_obj) {														// [i]
		$route_id = $comment_obj->comment_post_ID;															// [j]
		$all_reviews = array();																				// [k]
		$post_reviews = get_comments(array('post_id' => $route_id));										// [l]


		foreach ($post_reviews as $review) {																// [m]
			$review_rating = get_field('comments__rating', $review);										// [n]
			$all_reviews[] = $review_rating['value'];														// [o]
		}																									// [m]


		$all_reviews = array_filter($all_reviews, function($x) { return $x !== ''; });						// [p]
		$average_rating = array_sum($all_reviews) / count($all_reviews);									// [q]
		$average_rating = number_format((float)$average_rating, 1, '.', '');								// [r]


		delete_post_meta($route_id, 'scenic_review_rating');												// [s]
		update_post_meta($route_id, 'scenic_review_rating', $average_rating);								// [t]
	}																										// [i]





	/**
	 * [17]	Output rating stars
	 *
	 * 		@since 4.0.0
	 *
	 * 		[a]	Get average rating post meta
	 * 		[b]	Round to whole number
	 * 		[c]	Output wrapper
	 * 		[d]	Loop through rating value (0-5) and output corresponding number of stars
	 * 		[e]	Output star svg element
	 */
	
	function scenic_output_rating_stars($route_id) {
		$rating = get_post_meta($route_id, 'scenic_review_rating', 1);																// [a]
		$rating_rounded = round($rating['value'], 0);																				// [b]


		echo '<span class="c-comment__title__stars" data-rating="' . $rating_rounded . '">';										// [c]

			for ($i = 1; $i <= $rating_rounded; $i++) :																				// [d]
				echo '<svg height="24" width="24" role="presentation"><use xlink:href="' . SCENIC_SPRITE . '#star"></use></svg>';	// [e]
			endfor;																													// [d]

		echo '</span>';																												// [c]
	}