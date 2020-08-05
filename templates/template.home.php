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
		<header class="c-scenic-welcome">
			<div class="o-container  c-scenic-welcome__container">
				<div class="c-scenic-welcome__image-wrap">
					<img class="c-scenic-welcome__image" alt="" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/resources/images/home/welcome-to-scenic-buses--mobile.jpg 800w, <?php echo get_stylesheet_directory_uri(); ?>/resources/images/home/welcome-to-scenic-buses.jpg">
				</div><!-- /.c-scenic-welcome__image-wrap -->


				<div class="c-scenic-welcome__content">
					<h1 class="c-scenic-welcome__title"><em>Welcome to <br></em><strong>Scenic Buses</strong></h1>
					<p class="c-scenic-welcome__intro">Home to Britain's most scenic bus services. <br><strong>Find your next adventure.</strong></p>


					<form class="o-form  o-form--search" role="search" action="<?php bloginfo('url'); ?>">
						<input type="hidden" value="Search">

						<div class="o-form__field">
							<label class="o-form__label" for="s">Search for scenic bus routes</label>
							<input class="o-form__input" type="text" name="s" id="s" value="" placeholder="Search by town, city or county">
						</div><!-- /.c-form__field -->


						<div class="o-form__action">
							<button class="o-button  o-button--primary  o-form__button">
								<svg class="o-button__icon  o-button__icon--left" height="32" width="32" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#search"/></svg>
								<span class="o-button__text  u-palm--hide">Search</span>
							</button>
						</div>
					</form>
				</div><!-- /.c-scenic-welcome__content -->
			</div><!-- /.o-container -->
		</header><!-- /.c-scenic-welcome -->





		<?php if (have_rows('route-row', 'option')) : ?>
			<?php while (have_rows('route-row', 'option')) : the_row(); ?>
				<?php $term = (get_sub_field('type') == 'collection') ? get_sub_field('collection') : get_sub_field('location'); ?>


				<?php

					$routes_args = array(
						'post_type'			=>  'routes',
						'posts_per_page'	=>  6,
						'tax_query' 		=>  array(
													array(
														'taxonomy' => $term->taxonomy,
														'field'    => 'slug',
														'terms'    => $term->slug,
													),
												),
					);


					$routes = new WP_Query($routes_args);
					if ($routes->have_posts()) :

				?>


					<section class="c-scenic-panel  c-scenic-panel--routes  c-scenic-panel--carousel">
						<header class="c-scenic-panel__header">
							<div class="o-container">
								<h2 class="c-scenic-panel__title"><?php echo $term->name; ?></h2>
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
						</div><!-- /.o-container -->
					</section>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>