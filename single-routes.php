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
	
?>


	<header class="o-panel  o-panel--gutterless  c-masthead">
		<div class="o-grid  o-grid--middle  o-grid--gutterless">
			<div class="o-grid__item  c-masthead__graphic">
				<?php $header_image = get_field('photo--featured'); ?>
				<img class="c-masthead__image" 
				     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
				     data-srcset="<?php echo $header_image['sizes']['masthead--xxs']; ?>   350w, 
				                  <?php echo $header_image['sizes']['masthead--xs']; ?>    520w, 
				                  <?php echo $header_image['sizes']['masthead--s']; ?>    1050w, 
				                  <?php echo $header_image['sizes']['masthead--m']; ?>    1350w, 
				                  <?php echo $header_image['sizes']['masthead--l']; ?>    2083w, 
				                  <?php echo $header_image['sizes']['masthead--xl']; ?>   2750w, 
				                  <?php echo $header_image['sizes']['masthead--xxl']; ?>  3333w, 
				                  <?php echo $header_image['sizes']['masthead--xxxl']; ?> 4166w" 
				    alt="">
			</div><!-- /.c-masthead__graphic -->


			<div class="o-grid__item  c-masthead__content">
				<div class="c-masthead__container">
					<h1 class="c-masthead__title">
						<span class="c-masthead__title-line--main">
							<?php

								$identifier = get_field('identifier');
								$pod_title = ($identifier == 'brand') ? get_field('identifier--brand') : 'Route ' . get_field('identifier--number');
								echo $pod_title;

							?>
						</span>
					</h1>


					<div class="c-masthead__intro"><?php the_field('route-description--marketing'); ?></div>


					<a href="#main" class="o-button  c-masthead__button">
						<span class="o-button__content">View times &amp; more</span>
						<svg class="o-button__icon  o-button__icon--right" height="24" width="24" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow-down"/></svg>
					</a>
				</div><!-- /.c-masthead__container -->
			</div><!-- /.c-masthead__content -->
		</div><!-- /.o-grid -->
	</header>





	<main class="o-panel  o-panel--gutterless" id="main">
		<header class="c-route__header">
			<div class="o-container  o-container--optimise-readability">
				<h2 class="c-route__destinations-title">
					<span class="c-route__destinations-title__intro">serving </span>
					<?php the_field('route-description'); ?>
				</h2>


				<?php if (get_field('days-of-operation--detailed')) : ?>
					<p class="c-route__header__days">
						<strong><?php the_field('days-of-operation--detailed'); ?></strong>
					</p>
				<?php endif; ?>


				<?php if (get_field('opco')) : ?>
					<p class="c-route__header__operator">
						Operated by: 
						<strong><?php the_field('opco'); ?></strong>
					</p>
				<?php endif; ?>


				<div class="c-route__header__actions">
					<div class="c-route__header__actions-wrap">
						<?php if (get_field('timetable--url')) : ?>
							<a class="c-route__link  c-route__link--timetable" href="<?php the_field('timetable--url'); ?>" target="_blank">
								<svg class="o-button__icon  o-button__icon--left" height="32" width="32" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#timetable"/></svg>
								<span class="o-button__text">View timetable</span>
							</a>
						<?php endif; ?>


						<?php if (get_field('map--url')) : ?>
							<a class="c-route__link  c-route__link--map" href="<?php the_field('map--url'); ?>" target="_blank">
								<svg class="o-button__icon  o-button__icon--left" height="32" width="32" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#map"/></svg>
								<span class="o-button__text">View route map</span>
							</a>
						<?php endif; ?>
					</div><!-- /.c-route__header__actions-wrap -->


					<p class="c-route__header__actions__disclaimer">
						Please check with operator's website before travelling.
					</p>
				</div><!-- /.c-route__header__actions -->
			</div><!-- /.o-container -->
		</header>





		<?php if (have_rows('places')) : ?>
			<section class="c-resources-row  c-resources-row--links  c-resources-row--routes  c-resources-row--places">
				<div class="o-container">
					<header class="c-resources-row__header">
						<h2 class="c-resources-row__title">Attractions along the route</h2>
					</header>


					<div class="c-resources__links  o-posts  o-posts--title-only">
						<ul class="o-flex  o-posts__list  o-carousel--places  js-carousel--places">
							<?php while (have_rows('places')) : the_row(); ?>
								<li class="o-flex__item  c-useful-link">
									<article class="o-posts__item  c-useful-link__wrap  has-overlay-link">
										<div class="o-post">
											<?php $sub_image = get_sub_field('image'); ?>
											<?php if ($sub_image) : ?>
												<img class="o-post__image" 
													     alt="<?php the_sub_field('title'); ?>" 
													     src="<?php echo $sub_image['sizes']['masthead--xs'] ?>">
											<?php endif; ?>


											<h3 class="o-post__title">
												<?php the_sub_field('title'); ?>
												<span class="o-post__title__sub"><?php the_sub_field('sub_title'); ?></span>
											</h3>


											<?php if (get_sub_field('description')) : ?>
												<div class="o-post__excerpt">
													<?php the_sub_field('description'); ?>
												</div><!-- /.o-post__excerpt -->
											<?php endif; ?>
										</div>
									</article>
								</li>
							<?php endwhile; ?>
						</ul>
					</div><!-- /.c-resources__links -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>





		<?php $gallery = get_field('photo--gallery'); if ($gallery) : ?>
			<section class="c-route__gallery">
				<div class="o-container">
					<header class="c-resources-row__header">
						<h2 class="c-resources-row__title">Gallery</h2>
					</header>


					<div class="c-route__gallery__images">
						<?php foreach ($gallery as $image) : ?>
							<figure class="c-route__gallery__item">
								<a href="<?php echo $image['url']; ?>" data-width="<?php echo $image['width']; ?>" data-height="<?php echo $image['height']; ?>" class="c-route__gallery__image-link">
									<img class="c-route__gallery__image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
									<noscript><img class="c-route__gallery__image" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"></noscript>
								</a>

								<figcaption class="wp-caption-text  c-route__gallery__caption  u-hide"><?php echo $image['caption']; ?></figcaption>
							</figure><!-- /.c-route__gallery__item -->
						<?php endforeach; ?>
					</div><!-- /.c-route__gallery__images -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>





		<?php if (have_rows('tickets')) : ?>
			<section class="c-resources-row  c-resources-row--links  c-resources-row--routes  c-resources-row--places  c-resources-row--tickets">
				<div class="o-container">
					<header class="c-resources-row__header">
						<h2 class="c-resources-row__title">Fares &amp; tickets</h2>
					</header>


					<div class="c-resources__links  o-posts  o-posts--title-only">
						<ul class="o-flex  o-posts__list  o-carousel--places  js-carousel--places">
							<?php while (have_rows('tickets')) : the_row(); ?>
								<li class="o-flex__item  c-useful-link">
									<article class="o-posts__item  c-useful-link__wrap  has-overlay-link">
										<div class="o-post">
											<?php $sub_image = get_sub_field('image'); ?>
											<?php if ($sub_image) : ?>
												<img class="o-post__image" 
													     alt="<?php the_sub_field('title'); ?>" 
													     src="<?php echo $sub_image['sizes']['masthead--xs'] ?>">
											<?php endif; ?>


											<h3 class="o-post__title">
												<?php the_sub_field('title'); ?>

												<?php if (get_sub_field('best')) : ?>
													<span class="u-hide"> - </span>
													<span class="o-post__title__sub">Great for: <?php the_sub_field('best'); ?></span>
												<?php endif; ?>
											</h3>


											<?php if (get_sub_field('description')) : ?>
												<div class="o-post__excerpt">
													<?php the_sub_field('description'); ?>
												</div><!-- /.o-post__excerpt -->
											<?php endif; ?>


											<?php if (have_rows('prices')) : ?>
												<table class="c-tickets__table">
													<thead>
														<tr class="c-tickets__row  c-tickets__row--header">
															<th scope="col" class="c-tickets__cell  c-tickets__cell--title">Variant</th>
															<th scope="col" class="c-tickets__cell  c-tickets__cell--title">Price</th>
														</tr>
													</thead>


													<tbody>
														<?php while (have_rows('prices')) : the_row(); ?>
															<tr class="c-tickets__row">
																<th class="c-tickets__cell" scope="row">
																	<?php the_sub_field('name'); ?>

																	<?php if (get_sub_field('variant')) : ?>
																		<span class="c-ticket__cell__note">
																			<span class="u-hide"> - </span>
																			<?php the_sub_field('variant'); ?>
																		</span>
																	<?php endif; ?>
																</th>

																<td class="c-tickets__cell"><?php the_sub_field('price'); ?></td>
															</tr>
														<?php endwhile; ?>
													</tbody>
												</table>
											<?php endif; ?>


											<?php

												/**
												 * Loop through purchasing options
												 */
												
												$buying_options = get_sub_field('where');

												if ($buying_options) :
													echo '<div class="c-tickets__where">';
														echo '<h4 class="c-tickets__where__title">How to buy</h4>';

														echo '<ul class="c-tickets__icons">';
															foreach ($buying_options as $option) :
																switch ($option) :
																	case "cash" :
																		$buy__icon = 'cash';
																		$buy__text = 'Cash (on bus)';
																		$details   = '';
																		break;

																	case "contactless" :
																		$buy__icon = 'contactless';
																		$buy__text = 'Contactless (on bus)';
																		$details   = '';
																		break;

																	case "app" :
																		$buy__icon = 'app';
																		$buy__text = 'On the app';
																		$details   = (get_sub_field('details--app')) ? $details = get_sub_field('details--app') : '';
																		break;

																	case "smartcard" :
																		$buy__icon = 'smartcard';
																		$buy__text = 'Smartcard';
																		$details   = (get_sub_field('details--smartcard')) ? $details = get_sub_field('details--smartcard') : '';
																		break;

																	case "ticket-office" :
																		$buy__icon = 'office';
																		$buy__text = 'Ticket office';
																		$details   = (get_sub_field('details--ticket-office')) ? $details = get_sub_field('details--ticket-office') : '';
																		break;
																endswitch;


																echo 	'<li class="c-tickets__icon">' .
																			'<svg class="o-button__icon  o-button__icon--left" height="24" width="24" role="presentation"><use xlink:href="' . SCENIC_SPRITE . '#' . $buy__icon . '"/></svg>' .
																			'<span class="o-button__text">' . $buy__text . '</span>';

																			if ($details) {
																			   echo '<div class="c-tickets__details">' .
																						'<button class="c-tickets__details__button  js-tickets__details__button"><span class="c-tickets__details__button__icon">?</span><span class="u-hide"> Find out more</span></button>' .
																						'<div role="tooltip" class="c-tickets__details__button__tooltip  js-tickets__details__reveal">' . $details . '</div>' .
																					'</div>';
																			}
																echo	'</li>';
															endforeach;
														echo '</ul>';
													echo '</div>';
												endif;

											?>
										</div>
									</article>
								</li>
							<?php endwhile; ?>
						</ul>
					</div><!-- /.c-resources__links -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>





		<?php comments_template(); ?>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>