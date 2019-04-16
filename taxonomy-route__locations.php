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
					<span class="h6  c-title__sub-title">Location</span><span class="u-hide"> - </span>
					<strong><?php single_cat_title(); ?></strong>
				</h1>


				<?php if (term_description()) : ?>
					<div class="o-container  c-title__intro">
						<?php echo term_description(); ?>
					</div>
				<?php endif; ?>
			</div><!-- /.o-container -->


			<?php if ($featured_image) : ?>
				<div class="c-title__image-wrap">
					<img class="c-title__image" alt="<?php echo $featured_image['alt']; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
					     data-srcset="<?php echo $featured_image['sizes']['title--s']; ?> 500w, <?php echo $featured_image['sizes']['title--m']; ?> 1000w, <?php echo $featured_image['sizes']['title--l']; ?> 1500w, <?php echo $featured_image['sizes']['title--xl']; ?>">
				</div>
			<?php else : ?>
				<div class="c-title__image-wrap">
					<img class="c-title__image" alt="<?php the_title(); ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
					     data-srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--s'); ?> 500w, <?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--m'); ?> 1000w, <?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--l'); ?> 1500w, <?php echo get_the_post_thumbnail_url(get_the_ID(), 'title--xl'); ?>">
				</div>
			<?php endif; ?>
		</header>





		<?php if (have_posts()) : ?>
			<div class="o-container">
				<h2>Routes serving this destination</h2>


				<div class="o-grid  o-grid--wide">
					<?php while (have_posts()) : the_post(); ?>
						<div class="o-grid__item  u-one-half  u-palm--one-whole">
							<?php get_template_part('template-partials/article-listing-item'); ?>
						</div><!-- /.o-grid__item -->
					<?php endwhile; ?>
				</div><!-- /.o-grid -->


				<?php get_template_part('template-partials/pagination'); ?>
			</div><!-- /.o-container -->
		<?php endif; ?>
	</main><!-- /.o-panel -->


<?php get_footer(); ?>