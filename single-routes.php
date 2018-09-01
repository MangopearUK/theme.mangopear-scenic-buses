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


				<p class="c-route__header__operator">Operated by: <strong><?php the_field('opco'); ?></strong></p>
				<p class="c-route__header__days">Service operates: <strong><?php the_field('days-of-operation'); ?></strong></p>
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





		<?php comments_template(); ?>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>