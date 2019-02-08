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
	</main><!-- /.o-panel -->


	<?php comments_template(); ?>
<?php get_footer(); ?>