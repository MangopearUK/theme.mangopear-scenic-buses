<?php

	/**
	 * Core template: Home page
	 *
	 * @category 	Additional WordPress template files
	 * @package  	mangopear
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2017 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	3.0.0
	 * @link 		https://mangopear.co.uk/
	 * @since   	3.0.0
	 */
	

	get_header();


	/**
	 * Output page title
	 *
	 * @see /themes/mangopear/functions/source/mangopear/mangopear.output.page-title.php
	 */
	
	mangopear_output_page_title($show_title = true, $show_breadcrumb = true, $title_content = 'Bus &amp; train routes');
	
?>


	<main class="o-panel">
		<div class="o-container">
			<div class="o-grid">
				<div class="o-grid__item  u-three-quarters  u-portable--one-whole  c-resources__col--main">
					<div class="o-grid">
						<div class="o-grid__item  u-two-thirds  u-portable--one-whole  c-resources__col--main-first">
							<?php

								$routes_args = array(
									'post_type'			=> 'routes',
									'posts_per_page'	=> -1
								);


								$routes = new WP_Query($routes_args);
								if ($routes->have_posts()) :
									$full_articles_count = 0;

							?>
									<div class="o-posts  o-posts--title-only">
										<ul class="o-posts__list  o-grid">
											<?php 
												
												while ($routes->have_posts()) :
													$routes->the_post();
													$full_articles_count++;
													$full_articles_class = 	($full_articles_count == 1) ? 'o-post__item--first  u-one-whole' : 'u-one-half';
													$post_classes = 		($full_articles_count == 1) ? 'o-post--large' : 'o-post--medium';
													$featured_image = 		($full_articles_count == 1) ? get_the_post_thumbnail_url(get_the_ID(), 'featured--large') : get_the_post_thumbnail_url(get_the_ID(), 'featured--medium');
											
											?>
												
												<li class="o-grid__item  o-posts__item  has-overlay-link  <?php echo $full_articles_class; ?>  u-portable--one-whole">
													<article class="o-post  <?php echo $post_classes; ?>">
														<div class="c-post__image">
															<img class="c-portfolio__image-el" 
															     alt="<?php the_title(); ?>" 
															     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
															     data-src="<?php echo $featured_image; ?>">


															<noscript>
																<img class="c-portfolio__image-el" alt="<?php the_title(); ?>" src="<?php echo $featured_image; ?>">
															</noscript>
														</div><!-- /.c-portfolio__image -->
														

														<h3 class="o-post__title">
															<a href="<?php the_permalink(); ?>" class="o-post__title-link">
																<?php the_title(); ?>
															</a>
														</h3>
														

														<div class="o-post__excerpt">
															<?php the_excerpt(); ?>
														</div>
														

														<span class="o-post__from">
															<?php the_field('website_name'); ?>
														</span>
														

														<?php if (get_field('read_time')) : ?>
															<span class="o-post__read-time">
																<span class="u-hide">You can read this post in </span>
																<?php the_field('read_time'); ?>
															</span>
														<?php endif; ?>
														

														<a href="<?php the_permalink(); ?>" class="o-post__overlay-link" title="<?php the_title(); ?>"></a>
													</article>
												</li>
											<?php endwhile; ?>
										</ul>
									</div><!-- /.c-resources__links -->
								<?php endif; ?>
							<?php wp_reset_query(); ?>
						</div><!-- /.o-grid__item -->
					</div><!-- /.o-grid -->
				</div><!-- /.o-grid__item -->
			</div><!-- /.o-grid -->
		</div><!-- /.o-container -->
	</main><!-- /.o-panel -->





<?php get_footer(); ?>