<?php

	/**
	 * Template name: [Account] Routes: Edit route listing
	 *
	 * @category 	Additional WordPress template files
	 * @package  	mangopear
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2017 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	3.0.0
	 * @link 		https://mangopear.co.uk/
	 * @since   	2.0.0
	 */
	

	acf_form_head();
	get_header();
	
?>


	<main class="o-panel  o-panel--gutterless" id="main">
		<header class="c-title" style="border-bottom: 1px solid #DDD;">
			<div class="o-container">
				<h1 class="c-title__title">
					<?php the_title(); ?>
				</h1>
			</div><!-- /.o-container -->
		</header>


		<div class="o-container">
			<?php

				/**
				 * Show ACF form for editing
				 */
				
				$settings = array(
					'post_id'		=> $_GET['route-id'],
					'post_title'	=> true,
					'return'		=> '%post_url%',
				);


				if ($_GET['route-id']) :
					acf_form($settings);


				else :
					echo 'No form loaded';


				endif;

			?>
		</div><!-- /.o-container --->
	</main><!-- /.o-panel -->





<?php get_footer(); ?>