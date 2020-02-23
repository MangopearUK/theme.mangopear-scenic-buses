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


	/**
	 * Fetch data for page title
	 */
	
	$featured_image = get_field('photo--featured');
	$featured_image_position = (get_field('photo--featured__position')) ? 'object-position: ' . get_field('photo--featured__position') : '';


	$route_name_number = (get_field('identifier') == 'brand') 
						     ? '<strong>' . get_field('identifier--brand') . '</strong>' 
						     : 'Route <strong>' . get_field('identifier--number') . '</strong>';
	$operator = get_field('operator');

?>


	<main class="o-main" id="main">
		<section class="c-route-title">
			<div class="o-container">
				<div class="o-grid  o-grid--wide">
					<div class="o-grid__item  c-route-title__grid-item--image">
						<?php if ($featured_image) : ?>
							<div class="c-route-title__image">
								<div class="c-route-title__image-wrap">
									<img class="c-route-title__image-asset" alt="<?php echo $featured_image['alt']; ?>" data-srcset="<?php echo $featured_image['sizes']['scenic-title--small']; ?> 400w, <?php echo $featured_image['sizes']['scenic-title--large']; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="<?php echo $featured_image_position; ?>">
								</div><!-- /.c-route-title__image-wrap -->
							</div><!-- /.c-route-title__image -->
						<?php endif; ?>
					</div><!-- /.o-grid__item -->





					<div class="o-grid__item  c-route-title__grid-item--content">
						<header class="c-route-title__header">
							<h1 class="c-route-title__title">
								<?php echo $route_name_number; ?>
								<?php if ($operator) : ?><span class="c-route-title__operator"> from <a href="<?php echo get_term_link($operator); ?>"><?php echo $operator->name; ?></a></span><?php endif; ?>
							</h1>


							<h2 class="c-route-title__destinations">
								<strong class="c-route-title__destinations-line--main"><?php the_field('route-description'); ?></strong>
								<span class="c-route-title__destinations-line--byline"><?php the_field('route-description__byline'); ?></span>
							</h2>
						</header><!-- /.c-route-title__content -->





						<div class="c-route-title__content">
							<p class="c-route-title__intro">
								<?php the_field('route-description--marketing'); ?>
							</p>





							<div class="u-clearfix  c-route-title__frequencies">
								<?php if (get_field('frequency')) : ?>
									<p class="c-route-title__frequency">
										<span class="c-route-title__frequency__up-to">Runs up to </span>
										<strong class="c-route-title__frequency__label"><?php the_field('frequency'); ?></strong>
									</p>
								<?php endif; ?>
							</div><!-- /.c-route-title__frequencies -->
						</div><!-- /.c-route-title__content -->
					</div><!-- /.o-grid__item -->
				</div><!-- /.o-grid -->
			</div><!-- /.o-container -->
		</section>





		<section class="c-scenic-panel  c-route__description">
			<div class="o-container  o-container--optimise-readability">
				<div class="c-route__description__body">
					<?php the_field('route-description--enhanced'); ?>
				</div>





				<div class="c-route__description__links">
					<h3 class="c-route__description__links__title">Timetables &amp; more:</h3>


					<?php if (get_field('timetable--url')) : ?>
						<a class="o-button  o-button--primary" href="<?php the_field('timetable--url'); ?>" target="_blank">
							<svg class="o-button__icon  o-button__icon--left  is-animated" height="28" width="28" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#timetable"/></svg>
							<span class="o-button__text">View timetable</span>
							<svg class="o-button__icon  o-button__icon--right" height="24" width="24" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
						</a>
					<?php endif; ?>


					<?php if (get_field('map--url')) : ?>
						<a class="o-button  o-button--primary" href="<?php the_field('map--url'); ?>" target="_blank">
							<svg class="o-button__icon  o-button__icon--left  is-animated" height="28" width="28" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#map"/></svg>
							<span class="o-button__text">View route map</span>
							<svg class="o-button__icon  o-button__icon--right" height="24" width="24" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
						</a>
					<?php endif; ?>


					<?php if (get_field('url--operator')) : ?>
						<p class="c-route__description__link  c-route__description__link--operator">
							<strong>For more information about this service <a href="<?php the_field('url--operator'); ?>" target="_blank">visit the <?php echo $operator->name; ?> website</a>.</strong>
						</p>
					<?php endif; ?>
				</div><!-- /.c-route__description__links -->


				<p class="c-route__description__disclaimer">
					We can't guarantee that all information on this website is 100% accurate. You <strong>must always</strong> check with the operator's website before travelling.
					We can't be held responsible for any costs incurred because of inaccurate or misleading information.
					For more information, please read our <a href="https://mangopear.co.uk/legal-stuff/terms-conditions/" target="_blank">terms and conditions</a>.
				</p>
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
										<?php $location_term =     get_term(get_sub_field('location'), 'route__locations'); ?>
										<?php $place_image =       (get_sub_field('image'))       ? get_sub_field('image')       : get_field('image', $location_term); ?>
										<?php $place_description = (get_sub_field('description')) ? get_sub_field('description') : get_field('description', $location_term); ?>

										<article class="c-article  c-places__place">
											<header class="c-article__header">
												<img class="c-article__image" alt="<?php echo $location_term->name; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $place_image['sizes']['blog-lister']; ?>">
												<h3 class="c-article__title"><a href="<?php echo get_term_link($location_term); ?>" class="c-article__title__link"><?php echo $location_term->name; ?>&nbsp;&raquo;</a></h3>


												<?php if (get_field('copyright', $place_image['id'])) : ?>
													<span class="c-copyright-label  c-copyright-label--listing-image">
														<?php if (get_field('copyright__url', $place_image['id'])) : ?><a href="<?php the_field('copyright__url', $place_image['id']); ?>" target="_blank"><?php endif; ?>
															&copy; <?php the_field('copyright', $place_image['id']) ?>
														<?php if (get_field('copyright__url', $place_image['id'])) : ?></a><?php endif; ?>
													</span>
												<?php endif; ?>
											</header>

											<div class="c-article__content"><?php echo $place_description; ?></div>
										</article>


									<?php else : ?>
										<?php $place_image = get_sub_field('image'); ?>

										<article class="c-article  c-places__place">
											<header class="c-article__header">
												<img class="c-article__image" alt="<?php the_sub_field('title'); ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $place_image['sizes']['blog-lister']; ?>">
												<h3 class="c-article__title"><?php the_sub_field('title'); ?></h3>


												<?php if (get_field('copyright', $place_image['id'])) : ?>
													<span class="c-copyright-label  c-copyright-label--listing-image">
														<?php if (get_field('copyright__url', $place_image['id'])) : ?><a href="<?php the_field('copyright__url', $place_image['id']); ?>" target="_blank"><?php endif; ?>
															&copy; <?php the_field('copyright', $place_image['id']) ?>
														<?php if (get_field('copyright__url', $place_image['id'])) : ?></a><?php endif; ?>
													</span>
												<?php endif; ?>
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
							<?php $caption   = ($image['caption']) ? $image['caption'] . '.' : ''; ?>
							<?php $copyright = (get_field('copyright', $image['id'])) ? ' &copy;&nbsp;' . get_field('copyright', $image['id']) . '.' : ''; ?>


							<figure class="c-gallery__item">
								<a href="<?php echo $image['url']; ?>" data-width="<?php echo $image['width']; ?>" data-height="<?php echo $image['height']; ?>" class="c-gallery__image-link" <?php if ($caption OR $copyright) { echo 'data-caption="' . $caption . $copyright . '"'; } ?>>
									<img class="c-gallery__image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $image['sizes']['larger-thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
									<noscript><img class="c-gallery__image" src="<?php echo $image['sizes']['larger-thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"></noscript>
								</a>

								<?php if ($caption OR $copyright) : ?>
									<figcaption class="wp-caption-text  c-route__gallery__caption  u-hide">
										<?php echo $caption; ?>
										<?php echo $copyright; ?>
									</figcaption>
								<?php endif; ?>
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


							<?php if (get_field('more-information', $ticket)) : ?>
								<div class="o-accordion  js-accordion  c-ticket-how  c-ticket-how--in-carousel">
									<button class="o-accordion__action  js-accordion__action  o-button  o-button--primary" type="button" hidden>
										<span class="o-button__text">More information</span>
										<svg class="o-button__icon  o-button__icon--right" height="24" width="24" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#add"/></svg>
									</button>


									<div class="o-accordion__panel  js-accordion__panel">
										<article class="o-accordion__content  js-accordion__content">
											<?php the_field('more-information', $ticket); ?>
										</article>
									</div><!-- /.o-accordion__panel -->
								</div><!-- /.o-accordion -->
							<?php endif; ?>


							<?php if (get_field('prices--from', $ticket)) : ?>
								<div class="c-ticket__from-price">
									Adult tickets from <strong><?php the_field('prices--from', $ticket); ?></strong>
								</div><!-- /.c-ticket__from-price -->
							<?php endif; ?>


							<a class="o-button  o-button--primary  c-ticket__action" href="<?php echo get_term_link($ticket, 'tickets'); ?>">
								<span class="o-button__text">View prices &amp; more</span>
								<svg class="o-button__icon  o-button__icon--right" height="26" width="26" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
							</a>


							<?php

								/**
								 * Search restrictions for current route
								 */
								
								foreach (get_field('restrictions', $ticket) as $restriction) :
									if ($restriction['route'] == get_the_ID()) :
										echo '<div class="c-ticket__restrictions">';
											echo '<p>' . $restriction['information'] . '</p>';
										echo '</div>';
									endif;
								endforeach;

							?>
						</article>
					<?php endforeach; ?>
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>
	</main><!-- /.o-panel -->


	<?php comments_template(); ?>
<?php get_footer(); ?>