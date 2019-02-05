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
		<header class="c-title">
			<div class="o-container">
				<?php $route_name_number = (get_field('identifier') == 'brand') ? get_field('identifier--brand') : 'Route ' . get_field('identifier--number'); ?>

				<h1 class="c-title__title">
					<?php echo $route_name_number; ?>
					<span class="c-title__title__sub"> from <?php the_field('opco--short'); ?></span>
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


		<div class="o-container">
			<div class="o-container  o-container--optimise-readability">
				<?php
			
					if (have_posts()) : 
						while (have_posts()) : the_post();
							the_content();

						endwhile;

					else :
						echo '<h2>Sorry!</h2>';
						echo '<p style-"text-align: center;">Looks like there\'s no content to be found here.</p>';

					endif;

				?>
			</div><!-- /.o-container -->
		</div><!-- /.o-container -->
	</main><!-- /.o-panel -->


	<?php comments_template(); ?>
<?php get_footer(); ?>