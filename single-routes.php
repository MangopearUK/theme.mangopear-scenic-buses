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


			<?php $features = get_field('details'); if ($features) : ?>
				<section class="c-route-features">
					<div class="o-container">
						<ul class="c-route-features__list">
							<?php

								/**
								 * Loop through features, outputting correct content and icon
								 */


								foreach ($features as $feature) :
								
								switch ($feature) :
									case "open-top"                  : $feature_icon = 'sun';                       $feature_label = 'Open top bus service';                              break;
									case "bikes"                     : $feature_icon = 'bikes';                     $feature_label = 'Bikes can be carried';                              break;
									case "commentary"                : $feature_icon = 'commentary';                $feature_label = 'Commentary available';                              break;
									case "commentary--international" : $feature_icon = 'commentary--international'; $feature_label = 'Multilingual commentary available';                 break;
									case "usb"                       : $feature_icon = 'usb';                       $feature_label = 'USB chargers on bus';                               break;
									case "wifi"                      : $feature_icon = 'wifi';                      $feature_label = 'Free WiFi';                                         break;
									case "tables"                    : $feature_icon = 'table';                     $feature_label = 'Tables to enjoy the journey with friends & family'; break;
									case "contactless"               : $feature_icon = 'contactless';               $feature_label = 'Contactless payments';                              break;
									case "waiting-rooms"             : $feature_icon = 'rooms';                     $feature_label = 'Waiting rooms available for passengers';            break;
									case "frequent"                  : $feature_icon = 'clock';                     $feature_label = 'Frequent service';                                  break;
									case "views--great"              : $feature_icon = 'view';                      $feature_label = 'Great views along the route';                       break;
									case "views--sea"                : $feature_icon = 'boat';                      $feature_label = 'Sea views en route';                                break;
									case "seaside"                   : $feature_icon = 'boat';                      $feature_label = 'Service runs to the seaside';                       break;
									case "all-year"                  : $feature_icon = 'calendar';                  $feature_label = 'Service runs all year';                             break;
									case "summer-only"               : $feature_icon = 'sun';                       $feature_label = 'Service only runs during the Summer';               break;
								endswitch;

							?>
								<li class="c-route-features__item">
									<svg class="c-route-features__item__icon" height="28" width="28" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE . '#' . $feature_icon; ?>"/></svg>
									<span class="c-route-features__item__label"><?php echo $feature_label; ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</section>
			<?php endif; ?>


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
						<svg class="o-button__icon  o-button__icon--right" height="32" width="32" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
					</a>
				<?php endif; ?>



				<?php if (get_field('map--url')) : ?>
					<a class="o-button  o-button--secondary" href="<?php the_field('map--url'); ?>" target="_blank">
						<svg class="o-button__icon  o-button__icon--left" height="32" width="32" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#map"/></svg>
						<span class="o-button__text">View route map</span>
						<svg class="o-button__icon  o-button__icon--right" height="32" width="32" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
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





		<section class="c-scenic-panel  c-route__description">
			<div class="o-container  o-container--optimise-readability">
				<header class="c-route__description__header">
					<h2 class="c-route__description__title">
						Serving 
						<strong class="c-route__description__title__embolden"><?php the_field('route-description'); ?></strong>
					</h2>


					<h3 class="c-route__description__frequency">This route runs <?php the_field('days-of-operation--detailed'); ?></h3>
				</header>


				<div class="c-route__description__body">
					<?php the_field('route-description--enhanced'); ?>
				</div>
			</div><!-- /.o-container -->
		</section><!-- /.c-scenic-panel -->





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
												<h3 class="c-article__title"><a href="<?php echo get_term_link($location_term); ?>" class="c-article__title__link"><?php echo $location_term->name; ?>&nbsp;&raquo;</a></h3>
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





		<?php $tickets = get_field('tickets'); if ($tickets) : ?>
			<section class="c-scenic-panel  c-scenic-panel--tickets  c-scenic-panel--carousel">
				<header class="c-scenic-panel__header">
					<div class="o-container">
						<h2 class="c-scenic-panel__title">Fares &amp; tickets</h2>
					</div><!-- /.o-container -->
				</header>


				<div class="o-container  u-clearfix  js-carousel--tickets">
					<?php foreach ($tickets as $ticket) : ?>
						<article class="c-ticket">
							<h3 class="c-ticket__title">
								<a href="<?php echo get_term_link($ticket, 'tickets'); ?>">
									<?php the_field('title', $ticket); ?>&nbsp;&raquo;
								</a>
							</h3>


							<?php if (get_field('best', $ticket)) : ?>
								<h4 class="c-ticket__great-for">
									<em>Great for</em> <strong><?php the_field('best', $ticket); ?></strong>
								</h4>
							<?php endif; ?>


							<?php if (get_field('description', $ticket)) : ?>
								<div class="o-post__excerpt  c-ticket__description">
									<?php the_field('description', $ticket); ?>
								</div><!-- /.o-post__excerpt -->
							<?php endif; ?>


							<?php if (get_field('prices--from', $ticket)) : ?>
								<div class="c-ticket__from-price">
									Prices from <strong><?php the_field('prices--from', $ticket); ?></strong>
								</div><!-- /.c-ticket__from-price -->
							<?php endif; ?>


							<a class="o-button  o-button--primary  c-ticket__action" href="<?php echo get_term_link($ticket, 'tickets'); ?>">
								<span class="o-button__text">View prices &amp; more</span>
								<svg class="o-button__icon  o-button__icon--right" height="26" width="26" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
							</a>
						</article>
					<?php endforeach; ?>
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>
	</main><!-- /.o-panel -->


	<?php comments_template(); ?>
<?php get_footer(); ?>