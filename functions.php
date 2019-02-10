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
	 */

	function scenic_add_image_sizes() {
		add_image_size('larger-thumbnail', 300, 300, true);		// [a]
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