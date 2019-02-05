<?php

/**
 * [Scenic Buses]	Core functionality
 *
 * This class contains the core scenic functionality - including requesting other
 * files to enhance basic WordPress
 *
 * @package     scenic-buses
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
 *          Init new class
 */


/**
 * CONTENTS
 *
 * [1]  Forbid direct loading of this file
 * [2]	Define class
 * [3]	Launch the whole plugin
 * [4]	Initialise
 */


/**
 * [1]	Forbid direct loading of this file
 */

if (! defined('ABSPATH')) { exit; }





/**
 * [2]	Define class
 *
 * 		[a]	Dummy constructor
 * 		[b]	Initialise
 * 		[c]	Init
 * 		[d]	Register post types
 * 		[e]	Register assets
 */

if (! class_exists('Scenic')) :
	class Scenic {


		/**
		 * [a]	Dummy constructor
		 *
		 * 		A dummy constructor to ensure Scenic is only initialised once.
		 *
		 * 		@since  1.3.0
		 */
		
		public function __construct() {
			// Do nothing!
		}





		/**
		 * [b]	Initialise
		 *
		 * 		The real constructor to initialise Scenic.
		 *
		 * 		@since  3.0.0
		 *
		 * 		[i] 	Define our settings
		 * 		[ii]	Register actions
		 * 		[iii]	Include helper functions
		 * 		[iv]	Include other components, views and functionality
		 */
		
		public function initialize() {

			/**
			 * [i] 	Define our settings
			 *
			 * 		[a]	Basic settings
			 * 		[b]	URLs
			 * 		[c]	Options
			 */
			
			$this->settings = array(
				'name'				=>	__('Scenic', 'scenic'),								// [a]
				'version'			=>	'3.0.0',											// [a]

				'path'				=>  get_stylesheet_directory(),							// [b]
				'dir'				=>  get_stylesheet_directory_uri(),						// [b]

				'show_admin'		=>	true,												// [c]
				'show_updates'		=> 	true,												// [c]
				'stripslashes'		=> 	false,												// [c]
				'local'				=> 	true,												// [c]
				'json'				=> 	true,												// [c]
				'save_json'			=> 	'',													// [c]
				'load_json'			=> 	array(),											// [c]
				'default_language'	=> 	'en-GB',											// [c]
				'current_language'	=> 	'en-GB',											// [c]
				'l10n'				=> 	false,												// [c]
				'l10n_textdomain'	=> 	'scenic'											// [c]
			);


			add_action('init', array($this, 'init'), 5);									// [ii]
			add_action('init', array($this, 'register_assets'), 5);							// [ii]


			include_once('includes.functions.scenic-helpers.php');							// [iii]


			include_once('views/views.masthead.php');										// [iv]
			include_once('views/views.component.route.php');								// [iv]
		}





		/**
		 * [c]	Init
		 *
		 * 		This function will run after all plugins and theme functions have been included.
		 *
		 * 		@since  3.0.0
		 *
		 * 		[i] 	Bail early if a plugin calls too early
		 * 		[ii]	Bail early if already init
		 * 		[iii]	Only run once
		 * 		[iv]	Redeclare directory
		 * 		[v]		Vars
		 * 		[vi]	Multilingual
		 * 		[vii]	Add action for third parties to hook in to
		 */
		
		public function init() {
			if (! did_action('plugins_loaded')) return;													// [i]
			if (scenic_get_setting('init')) return;														// [ii]


			scenic_update_setting('init', true);														// [iii]
			scenic_update_setting('dir', get_stylesheet_directory_uri());								// [iv]


			$major = intval(scenic_get_setting('version'));												// [v]


			load_textdomain('scenic', scenic_get_path( 'languages/scenic-' . get_locale() . '.mo' ));	// [vi]
			do_action('scenic/init');																	// [vii]
		}





		/**
		 * [e]	Register assets
		 *
		 * 		Includes to register our post types.
		 *
		 * 		@since  3.0.0
		 *
		 * 		[i] 	@var Get plugin version number
		 * 		[ii] 	@var Get language locale
		 * 		[iii] 	@var Get string for minified scripts
		 * 		[iv]	[script] Scenic core JS
		 * 		[v]		[styles] Scenic core CSS
		 * 		[vi]	[scripts] Scenic admin AJAX
		 */
		
		public function register_assets() {
			$version = scenic_get_setting('version');																							// [i]
			$language = get_locale();																											// [ii]
			$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';																		// [iii]


			if (! is_admin()) :
				wp_enqueue_script('scenic-js--global',  scenic_get_dir('/resources/js/compiled/global' . $min . '.js'), array('jquery'));		// [vi]
				wp_enqueue_script('scenic-js--plugins', scenic_get_dir('/resources/js/compiled/plugins' . $min . '.js'), array('jquery'));		// [vi]
				wp_localize_script('scenic-js--ajax', 'scenic_ajax', array('ajax_url' => admin_url('admin-ajax.php')));							// [vi]
			endif;
		}


	} // class definition





/**
 * [3]	Launch the whole plugin
 *
 * 		Returns the main instance of Scenic to prevent the use of globals.
 *
 * 		@since  3.0.0
 * 		@return Scenic
 */

function Scenic() {
	global $scenic;


	if (! isset($scenic)) :
		$scenic = new Scenic();
		$scenic->initialize();
	endif;


	return $scenic;
}





/**
 * [4]	Initialise
 */

Scenic();






endif; // class_exists