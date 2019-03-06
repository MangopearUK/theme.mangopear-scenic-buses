<?php

	/**
	 * Template name: Scenic > Home
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
	

	get_header();
	
?>


	<main class="o-panel  o-panel--gutterless" id="main">
		<?php

			$routes_args = array(
				'post_type'			=> 'routes',
				'posts_per_page'	=> -1
			);


			$routes = new WP_Query($routes_args);
			if ($routes->have_posts()) :

		?>


			<section class="c-scenic-panel  c-scenic-panel--tickets  c-scenic-panel--carousel">
				<header class="c-scenic-panel__header">
					<div class="o-container">
						<h2 class="c-scenic-panel__title">Routes</h2>
					</div><!-- /.o-container -->
				</header>


				<div class="o-container">
					<div class="u-clearfix  js-carousel--routes">
						<?php

							while ($routes->have_posts()) :
								$routes->the_post();
								get_template_part('template-partials/article-listing-item');
							endwhile;

						?>
					</div><!-- /.js-carousel--routes -->


					<div class="c-scenic-panel__action-wrap">
						<a class="o-button  o-button--primary  c-scenic-panel__action" href="/routes/">
							<span class="o-button__text">View all routes</span>
							<svg class="o-button__icon  o-button__icon--right" height="32" width="32" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
						</a>
					</div><!-- /.c-scenic-panel__action-wrap -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>