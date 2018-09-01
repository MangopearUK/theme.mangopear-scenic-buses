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
		<article class="o-panel">
			<div class="o-container">
				<div class="o-grid">
					<div class="o-grid__item  u-three-quarters  u-portable--one-whole  c-resources__col--main">
						<?php the_content(); ?>
					</div><!-- /.o-grid__item -->
				</div><!-- /.o-grid -->
			</div><!-- /.o-container -->
		</article>





		<?php comments_template(); ?>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>