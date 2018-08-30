<?php

	/**
	 * Core template: Home page
	 *
	 * @category 	Additional WordPress template files
	 * @package  	mangopear
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
	
	scenic_output_masthead(
		array(
			'image'			=> get_field('masthead__image'),
			'title__style'	=> 'single',
			'title'			=> 'All routes',
			'title__sub'	=> '',
			'content'		=> 'Content to come here, soon!',
			'link__text'	=> 'Find your next adventure'
		)
	);
	
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


			<section class="c-resources-row  c-resources-row--links">
				<div class="o-container">
					<header class="c-resources-row__header">
						<h2 class="c-resources-row__title">All routes</h2>
					</header>


					<div class="c-resources__links  o-posts  o-posts--title-only">
						<ul class="o-flex  o-posts__list">
							<?php 
												
								while ($routes->have_posts()) :
									$routes->the_post();
									scenic_pod__route();
								endwhile;

							?>
						</ul>


						<a href="/routes/" class="o-button  o-button--secondary" style="margin-top: 40px;">
							<span class="o-button__text">View all routes</span>
							<svg class="o-button__icon--right  o-icon--chevron--right" viewBox="0 0 16 16" width="14" height="14">
								<path fill="currentColor" d="M.156 0l.125.125 7.906 7.875-8 8h5.625l6.594-6.594 1.438-1.406-1.438-1.406-6.563-6.594h-5.688z"></path>
							</svg>
						</a>
					</div><!-- /.c-resources__links -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>