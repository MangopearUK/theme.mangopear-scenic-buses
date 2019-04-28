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
		<header class="c-title  c-title--routes">
			<div class="o-container">
				<h1 class="c-title__title">
					Scenic Great Britain
				</h1>


				<div class="o-container  c-title__intro">
					<p style="text-align: center;">
						Welcome to the home of Britain's most scenic bus services. <br>
						<strong>Find your next adventure!</strong>
					</p>
				</div>
			</div><!-- /.o-container -->


			<section class="c-title__search" style="margin: 0;">
				<div class="o-container  o-container--optimise-readability">
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
				</div><!-- /.o-container -->
			</section><!-- /.c-title__search -->
		</header>





		<?php

			$routes_args = array(
				'post_type'			=> 'routes',
				'posts_per_page'	=> -1
			);


			$routes = new WP_Query($routes_args);
			if ($routes->have_posts()) :

		?>


			<section class="c-scenic-panel  c-scenic-panel--routes  c-scenic-panel--carousel">
				<header class="c-scenic-panel__header">
					<div class="o-container">
						<h2 class="c-scenic-panel__title">Recently added routes</h2>
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