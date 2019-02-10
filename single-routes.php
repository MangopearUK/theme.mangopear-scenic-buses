<?php

	/**
	 * Core template: Routes (single)
	 *
	 * @category 	Templates
	 * @package  	scenic-buses
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2019 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	4.0.0
	 * @since   	4.0.0
	 */


	get_header();

?>


	<main class="o-main" id="main">
		<header class="c-title  c-title--routes">
			<div class="o-container">
				<?php $route_name_number = (get_field('identifier') == 'brand') ? get_field('identifier--brand') : 'Route ' . get_field('identifier--number'); ?>

				<h1 class="c-title__title">
					<?php echo $route_name_number; ?>
					<span class="c-title__title__sub"> from <?php $operator = get_field('operator'); echo $operator->name; ?></span>
				</h1>


				<div class="o-container  c-title__intro">
					<?php the_field('route-description--marketing'); ?>
				</div>
			</div><!-- /.o-container -->


			<?php if (get_the_post_thumbnail_url(get_the_ID())) : ?>
				<img class="c-title__image" alt="<?php the_title(); ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
				     data-srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--s'); ?> 500w, <?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--m'); ?> 1000w, <?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--l'); ?> 1500w, <?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--xl'); ?>">
			<?php endif; ?>
		</header>





		<section class="c-scenic-panel  c-scenic-panel--links">
			<header class="c-scenic-panel__header">
				<div class="o-container">
					<h2 class="c-scenic-panel__title">Useful links</h2>
				</div><!-- /.o-container -->
			</header>


			<div class="o-container">
				<?php if (get_field('timetable--url')) : ?>
					<a class="o-button  o-button--secondary" href="<?php the_field('timetable--url'); ?>" target="_blank">
						<svg class="o-button__icon  o-button__icon--left" height="32" width="32" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#timetable"/></svg>
						<span class="o-button__text">View timetable</span>
					</a>
				<?php endif; ?>



				<?php if (get_field('map--url')) : ?>
					<a class="o-button  o-button--secondary" href="<?php the_field('map--url'); ?>" target="_blank">
						<svg class="o-button__icon  o-button__icon--left" height="32" width="32" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#map"/></svg>
						<span class="o-button__text">View route map</span>
					</a>
				<?php endif; ?>



				<?php if (get_field('url--operator')) : ?>
					<a class="o-button  o-button--secondary" href="<?php the_field('url--operator'); ?>" target="_blank">
						<span class="o-button__text">View operator's website</span>
						<svg class="o-button__icon  o-button__icon--right" height="32" width="32" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
					</a>
				<?php endif; ?>
			</div><!-- /.o-container -->
		</section>





		<?php if (have_rows('places')) : ?>
			<section class="c-scenic-panel  c-scenic-panel--places  c-places">
				<header class="c-scenic-panel__header">
					<div class="o-container">
						<h2 class="c-scenic-panel__title">Places to visit &amp; see along the route</h2>
					</div><!-- /.o-container -->
				</header>


				<div class="c-places__list">
					<div class="o-container">
						<div class="o-grid">
							<?php while (have_rows('places')) : the_row(); ?>
								<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
									<?php $place_type = get_sub_field('choice'); ?>


									<?php if ($place_type == 'load') : ?>
										<?php $location_term = get_term(get_sub_field('location'), 'route__locations'); ?>
										<?php $place_image = get_field('image', $location_term); ?>

										<article class="c-article  c-places__place">
											<header class="c-article__header">
												<img class="c-article__image" alt="<?php echo $location_term->name; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $place_image['sizes']['blog-lister']; ?>">
												<h3 class="c-article__title"><a href="<?php echo get_term_link($location_term); ?>" class="c-article__title__link"><?php echo $location_term->name; ?></a></h3>
											</header>

											<div class="c-article__content"><?php the_field('description', $location_term); ?></div>
										</article>


									<?php else : ?>
										<?php $place_image = get_sub_field('image'); ?>

										<article class="c-article  c-places__place">
											<header class="c-article__header">
												<img class="c-article__image" alt="<?php the_sub_field('title'); ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $place_image['sizes']['blog-lister']; ?>">
												<h3 class="c-article__title"><?php the_sub_field('title'); ?></h3>
											</header>

											<div class="c-article__content"><?php the_sub_field('description'); ?></div>
										</article>
									<?php endif; ?>
								</div><!-- /.o-grid__item -->
							<?php endwhile; ?>
						</div><!-- /.o-grid -->
					</div><!-- /.o-container -->
				</div><!-- /.c-places__list -->
			</section><!-- /.c-places -->
		<?php endif; ?>





		<?php $gallery = get_field('photo--gallery'); if ($gallery) : ?>
			<section class="c-scenic-panel  c-scenic-panel--gallery">
				<header class="c-scenic-panel__header">
					<div class="o-container">
						<h2 class="c-scenic-panel__title">Gallery</h2>
					</div><!-- /.o-container -->
				</header>


				<div class="o-container">
					<div class="c-gallery">
						<?php foreach ($gallery as $image) : ?>
							<figure class="c-gallery__item">
								<a href="<?php echo $image['url']; ?>" data-width="<?php echo $image['width']; ?>" data-height="<?php echo $image['height']; ?>" class="c-gallery__image-link">
									<img class="c-gallery__image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $image['sizes']['larger-thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
									<noscript><img class="c-gallery__image" src="<?php echo $image['sizes']['larger-thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"></noscript>
								</a>

								<figcaption class="wp-caption-text  c-route__gallery__caption  u-hide"><?php echo $image['caption']; ?></figcaption>
							</figure><!-- /.c-gallery__item -->
						<?php endforeach; ?>
					</div><!-- /.c-gallery -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>
	</main><!-- /.o-panel -->


	<?php comments_template(); ?>
<?php get_footer(); ?>