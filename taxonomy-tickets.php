<?php

	/**
	 * Core template: Index
	 *
	 * This template serves as the default for all views. Can easily be overwritten 
	 * by other templates. Typically this will be used for either the front page or 
	 * as the list of posts.
	 *
	 * @category 	Templates
	 * @package  	mangui
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2018 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	4.0.0
	 * @since   	1.0.0
	 */


	get_header();


	$term_obj = get_queried_object();
	$featured_image = get_field('image', $term_obj); 

?>


	<main class="o-main" id="main">
		<header class="c-title  c-title--routes">
			<div class="o-container">
				<h1 class="c-title__title">
					<strong><?php the_field('title', $term_obj); ?></strong>
					<span class="c-title__title__sub"> from <?php $operator = get_field('operator--brand-name', $term_obj); echo $operator->name; ?></span>
				</h1>


				<?php if (get_field('description', $term_obj)) : ?>
					<div class="o-container  c-title__intro">
						<?php if (get_field('best', $term_obj)) : ?>
							<h3 style="margin-bottom: 0;">
								Great for: <strong><?php the_field('best', $term_obj); ?></strong>
							</h3>
						<?php endif; ?>


						<?php the_field('description', $term_obj); ?>
					</div>
				<?php endif; ?>
			</div><!-- /.o-container -->
		</header>





		<section class="c-scenic-panel  c-scenic-panel--ticket-info">
			<div class="o-container">
				<div class="o-grid">
					<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
						<div class="c-ticket-prices">
							<header class="c-ticket-prices__header">
								<h2 class="c-ticket-prices__title">Ticket prices</h2>
							</header>


							<?php if (have_rows('prices', $term_obj)) : ?>
								<div class="c-ticket__table-wrap">
									<table class="c-ticket__table">
										<thead>
											<tr class="c-ticket__row  c-ticket__row--header">
												<th scope="col" class="c-ticket__cell  c-ticket__cell--title">Variant</th>
												<th scope="col" class="c-ticket__cell  c-ticket__cell--title">Price</th>
											</tr>
										</thead>


										<tbody>
											<?php while (have_rows('prices', $term_obj)) : the_row(); ?>
												<tr class="c-ticket__row">
													<th class="c-ticket__cell" scope="row">
														<?php the_sub_field('name'); ?>

														<?php if (get_sub_field('variant')) : ?>
															<span class="c-ticket__cell__note">
																<span class="u-hide"> - </span>
																<?php the_sub_field('variant'); ?>
															</span>
														<?php endif; ?>
													</th>

													<td class="c-ticket__cell"><?php the_sub_field('price'); ?></td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div><!-- /.c-ticket__table-wrap -->
							<?php endif; ?>
						</div><!-- /.c-ticket-prices -->
					</div><!-- /.o-grid__item -->



					<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
						<div class="c-ticket-prices">
							<header class="c-ticket-prices__header">
								<h2 class="c-ticket-prices__title">How to buy</h2>
							</header>


							<?php

								/**
								 * Loop through purchasing options
								 */
								
								$buying_options = get_field('where', $term_obj);
								if ($buying_options) :
									echo '<div class="c-ticket__where">';
										foreach ($buying_options as $option) :
											switch ($option) :
												case "cash" :
													$buy__icon = 'cash';
													$buy__text = 'Cash (on bus)';
													$details   = '<p>Cash payments can be taken onboard the bus.</p>';
													break;
												case "contactless" :
													$buy__icon = 'contactless';
													$buy__text = 'Contactless (on bus)';
													$details   = '<p>Pay with your contactless card, Google Pay or Apple Pay onboard the bus.</p>';
													break;
												case "app" :
													$buy__icon = 'app';
													$buy__text = 'On the app';
													$details   = (get_field('details--app', $term_obj)) ? $details = get_field('details--app', $term_obj) : '';
													break;
												case "smartcard" :
													$buy__icon = 'smartcard';
													$buy__text = 'Smartcard';
													$details   = (get_field('details--smartcard', $term_obj)) ? $details = get_field('details--smartcard', $term_obj) : '';
													break;
												case "ticket-office" :
													$buy__icon = 'office';
													$buy__text = 'Ticket office';
													$details   = (get_field('details--ticket-office', $term_obj)) ? $details = get_field('details--ticket-office', $term_obj) : '';
													break;
											endswitch; ?>


											<div class="o-accordion  js-accordion  c-ticket-how">
												<button class="o-accordion__action  js-accordion__action  o-button  o-button--primary" type="button" hidden>
													<svg class="o-button__icon  o-button__icon--left" height="24" width="24" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#<?php echo $buy__icon; ?>"/></svg>
													<span class="o-button__text"><?php echo $buy__text; ?></span>
													<svg class="o-button__icon  o-button__icon--right" height="24" width="24" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#add"/></svg>
												</button>


												<div class="o-accordion__panel  js-accordion__panel">
													<article class="o-accordion__content  js-accordion__content">
														<?php echo $details; ?>
													</article>
												</div><!-- /.o-accordion__panel -->
											</div><!-- /.o-accordion -->


										<?php endforeach;
									echo '</div>';
								endif;
							?>
						</div><!-- /.c-ticket-prices -->
					</div><!-- /.o-grid__item -->





					<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
						<?php if (have_rows('restrictions', $term_obj)) : ?>
							<div class="c-ticket-prices">
								<header class="c-ticket-prices__header">
									<h2 class="c-ticket-prices__title">Ticket restrictions</h2>
								</header>


								<?php while (have_rows('restrictions', $term_obj)) : the_row(); ?>
									<div class="o-accordion  js-accordion  c-ticket-how">
										<button class="o-accordion__action  js-accordion__action  o-button  o-button--primary" type="button" hidden>
											<span class="o-button__text"><?php echo get_the_title(get_sub_field('route')); ?></span>
											<svg class="o-button__icon  o-button__icon--right" height="24" width="24" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#add"/></svg>
										</button>


										<div class="o-accordion__panel  js-accordion__panel">
											<article class="o-accordion__content  js-accordion__content">
												<p><?php the_sub_field('information'); ?></p>
											</article>
										</div><!-- /.o-accordion__panel -->
									</div><!-- /.o-accordion -->
								<?php endwhile; ?>
							</div><!-- /.c-ticket-prices -->
						<?php endif; ?>
					</div><!-- /.o-grid__item -->
				</div><!-- /.o-grid -->
			</div><!-- /.o-container -->


		</section>





		<?php if (have_posts()) : ?>
			<div class="o-container">
				<h2>Routes you can use this ticket on:</h2>


				<div class="o-grid  o-grid--wide">
					<?php while (have_posts()) : the_post(); ?>
						<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
							<?php get_template_part('template-partials/article-listing-item'); ?>
						</div><!-- /.o-grid__item -->
					<?php endwhile; ?>
				</div><!-- /.o-grid -->


				<?php get_template_part('template-partials/pagination'); ?>
			</div><!-- /.o-container -->
		<?php endif; ?>





		<?php

			/**
			 * Show other tickets from this operator
			 */
			
			$operator_tickets = get_terms(
				array(
					'taxonomy'		=> 'tickets',
					'exclude'		=> $term_obj->term_id,
					'meta_query'	=> array(
						array(
							'key'		=> 'operator--brand-name',
							'value'		=> get_field('operator--brand-name', $term_obj),
							'compare'	=> 'LIKE'
						)
					)
				)
			);

		?>

			<?php if ($operator_tickets) : ?>
				<section class="c-scenic-panel  c-scenic-panel--tickets  c-scenic-panel--carousel">
					<header class="c-scenic-panel__header">
						<div class="o-container">
							<h2 class="c-scenic-panel__title">Other tickets from <?php echo $operator->name; ?></h2>
						</div><!-- /.o-container -->
					</header>


					<div class="o-container  u-clearfix  js-carousel--tickets">
						<?php foreach ($operator_tickets as $ticket) : ?>
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
										Adult tickets from <strong><?php the_field('prices--from', $ticket); ?></strong>
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


<?php get_footer(); ?>