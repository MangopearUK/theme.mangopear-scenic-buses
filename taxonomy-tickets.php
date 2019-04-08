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
	</main><!-- /.o-panel -->


<?php get_footer(); ?>