<?php

/**
 * [Scenic]	API Helpers
 *
 * These are helper functions for the plugin
 *
 * @category    api
 * @package     scenic
 * @author      Andi North <andi@mangopear.co.uk>
 * @copyright   2017 Mangopear Limited
 * @license     GNU General Public License <http://opensource.org/licenses/gpl-license.php>
 * @since       3.0.0
 * @version     3.0.0
 */


/**
 * CHANGELOG
 *
 * @version 3.0.0
 *          Init
 */


/**
 * CONTENTS
 *
 * [1]	scenic_get_setting
 * [2]	scenic_maybe_get
 * [3]	scenic_get_compatibility
 * [4]	scenic_update_setting
 * [5]	scenic_append_setting
 * [6]	scenic_has_done
 * [7]	scenic_get_path
 * [8]	scenic_get_dir
 * [9]	scenic_include
 * [10]	scenic_parse_args
 * [11]	scenic_parse_types
 * [12]	scenic_parse_type
 * [13]	scenic_get_view
 * [14]	scenic_is_author_viewing
 */


/**
 * [1]	scenic_get_setting
 *
 * 		[a]	Get vars
 * 		[b]	Find setting
 * 		[c]	Filter for third party customisation
 * 		[d]	Return
 */

function scenic_get_setting($name, $default = null) {
	$settings = scenic()->settings;									// [a]
	$setting = scenic_maybe_get($settings, $name, $default);			// [b]
	$setting = apply_filters("shwimmer/settings/{$name}", $setting);	// [c]
	return $setting;													// [d]
}





/**
 * [2]	scenic_maybe_get
 *
 * 		A function that will return a var if it exists in an array
 *
 * 		@since  1.1.0
 *
 * 		[a]	Get vars
 * 		[b]	Loop through keys
 * 		[c]	Return default if does not exist
 * 		[d]	Update $array
 * 		[e]	Return value
 */

function scenic_maybe_get($array, $key, $default = null) {
	$keys = explode('/', $key);						// [a]


	foreach ($keys as $k) :							// [b]
		if (! isset($array[$k])) return $default;	// [c]
		$array = $array[$k];						// [d]
	endforeach;


	return $array;									// [e]
}





/**
 * [3]	scenic_get_compatibility
 *
 * 		This function will return true or false for a given compatibility setting
 *
 * 		@since  1.1.0
 */

function scenic_get_compatibility($name) {
	return apply_filters("scenic/compatibility/{$name}", false);
}





/**
 * [4]	scenic_update_setting
 *
 * 		This function will update a value into the settings array found in the scenic object
 *
 * 		@since  1.1.0
 */

function scenic_update_setting($name, $value) {
	scenic()->settings[$name] = $value;
}





/**
 * [5]	scenic_append_setting
 *
 * 		This function will update a value into the settings array found in the scenic object
 *
 * 		@since  1.1.0
 *
 * 		[a]	Create array if needed
 * 		[b]	Append to array
 */

function scenic_append_setting($name, $value) {
	if (! isset(scenic()->settings[$name])) :		// [a]
		scenic()->settings[$name] = array();
	endif;
	
	
	scenic()->settings[$name][] = $value;		// [b]
}





/**
 * [6]	scenic_has_done
 *
 * 		This function will return true if this action has already been done
 *
 * 		@since  1.1.0
 *
 * 		[a]	Vars
 * 		[b]	Return true if already done
 * 		[c]	Update setting
 * 		[d]	Return value
 */

function scenic_has_done($name) {
	$setting = 'has_done_' . $name;						// [a]
	if (scenic_get_setting($setting)) return true;	// [b]
	scenic_update_setting($setting, true);			// [c]
	return false;										// [d]
}





/**
 * [7]	scenic_get_path
 *
 * 		This function will return the path to a file within the scenic plugin folder
 *
 * 		@since  1.1.0
 */

function scenic_get_path($path) {
	return scenic_get_setting('path') . $path;
}





/**
 * [8]	scenic_get_dir
 *
 * 		This function will return the url to a file within the scenic plugin folder
 *
 * 		@since  1.1.0
 */

function scenic_get_dir($path) {
	return scenic_get_setting('dir') . $path;
}





/**
 * [9]	scenic_include
 *
 * 		This function will return the url to a file within the scenic plugin folder
 *
 * 		@since  1.1.0
 */

function scenic_include($file) {
	$path = scenic_get_dir($file);
	if (file_exists($path)) include_once($path);
}





/**
 * [10]	scenic_parse_args
 *
 * 		This function will merge together 2 arrays and also convert any numeric values to ints
 *
 * 		@since  1.1.0
 *
 * 		[a]	$args may not be an array!
 * 		[b]	Parse args
 * 		[c]	Parse types
 * 		[d]	Return values
 */

function scenic_parse_args($args, $defaults = array()) {
	if (! is_array($args)) $args = array();		// [a]
	$args = wp_parse_args($args, $defaults);	// [b]
	$args = scenic_parse_types($args);		// [c]
	return $args;								// [d]
}





/**
 * [11]	scenic_parse_types
 *
 * 		This function will convert any numeric values to int and trim strings
 *
 * 		@since  1.1.0
 *
 * 		[a]	Some keys are restricted
 * 		[b]	Loop
 * 		[c]	Parse type if not restricted
 * 		[d]	Return values
 */

function scenic_parse_types($array) {
	$restricted = array(																		// [a]
		'label',
		'name',
		'value',
		'instructions',
		'nonce'
	);
	
	
	foreach( array_keys($array) as $k ) :														// [b]
		if (! in_array($k, $restricted, true)) $array[$k] = scenic_parse_type($array[$k]);	// [c]
	endforeach;
	

	return $array;																				// [d]
}





/**
 * [12]	scenic_parse_type
 *
 * 		@since  1.1.0
 *
 * 		[a]	Test for array
 * 		[b]	Bail early if not string
 * 		[c]	Trim
 * 		[d]	Numbers
 * 		[e]	Return values
 */

function scenic_parse_type($v) {
	if (is_array($v)) return scenic_parse_types($v);				// [a]
	if (! is_string($v)) return $v;									// [b]
	$v = trim($v);													// [c]
	if (is_numeric($v) && strval((int)$v) === $v) $v = intval($v);	// [d]
	return $v;														// [e]
}





/**
 * [13]	scenic_get_view
 *
 *		This function will load in a file from the 'admin/views' folder and allow variables to be passed through
 *
 * 		@since  1.1.0
 */

function scenic_get_view($view_name = '', $args = array()) {
	$path = scenic_get_path("admin/views/{$view_name}.php");	
	if (file_exists($path)) include($path);
}





/**
 * [14]	scenic_is_author_viewing
 *
 * 		Is the author of the post the user viewing the post?
 *
 * 		@since  1.3.0
 */

function scenic_is_author_viewing($user_id = '', $post_id = '') {
	$get_user_id = ($user_id) ? $user : get_current_user_id();
	$get_post_id = ($post_id) ? $post_id : get_the_ID();
	$author_uid  = get_post_field('post_author', $get_post_id);


	if ($get_user_id == $author_uid) :
		return true;
	else :
		return false;
	endif;
}

?>