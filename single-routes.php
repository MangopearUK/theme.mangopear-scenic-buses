<?php

	/**
	 * Core template: Single template for "Routes" post type
	 *
	 * @category 	Additional WordPress template files
	 * @package  	scenic
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2017 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	3.0.0
	 * @link 		https://mangopear.co.uk/
	 * @since   	3.0.0
	 */
	

	get_header();


	/**
	 * Output page masthead
	 */
	
	scenic_output_masthead();
	
?>


	<main class="o-panel" id="main">
		<div class="o-container">
			<div class="o-grid">
				<div class="o-grid__item  u-three-quarters  u-portable--one-whole  c-resources__col--main">
					<?php the_content(); ?>
				</div><!-- /.o-grid__item -->
			</div><!-- /.o-grid -->
		</div><!-- /.o-container -->
	</main><!-- /.o-panel -->





<?php get_footer(); ?>