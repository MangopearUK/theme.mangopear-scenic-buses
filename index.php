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
	 * @since   	2.0.0
	 */
	

	get_header();


	/**
	 * Output page title
	 *
	 * @see /themes/mangopear/functions/source/mangopear/mangopear.output.page-title.php
	 */
	
	mangopear_output_page_title($show_title = true, $show_breadcrumb = true, $title_content = 'Useful resources');
	
?>


	<main class="o-panel">
		<div class="o-container">
			<div class="o-grid">
				<div class="o-grid__item  u-three-quarters  u-portable--one-whole  c-resources__col--main">
					<div class="o-grid">
						<div class="o-grid__item  u-two-thirds  u-portable--one-whole  c-resources__col--main-first">
							<?php

								$full_articles = array(
									'post_type'			=> 'resources',
									'posts_per_page'	=> -1,
									'tax_query'			=> 	array(
																array(
																	'taxonomy' => 'resource__types',
																	'field'    => 'slug',
																	'terms'    => 'documented',
																),
															),
								);


								$resource__full_articles = new WP_Query($full_articles);
								if ($resource__full_articles->have_posts()) :
									$full_articles_count = 0;

							?>
									<div class="o-posts  o-posts--title-only">
										<ul class="o-posts__list  o-grid">
											<?php 
												
												while ($resource__full_articles->have_posts()) :
													$resource__full_articles->the_post();
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





						<div class="o-grid__item  u-one-third  u-portable--one-whole  c-resources__col--main-second">
							<?php

								$links_args = array(
									'post_type'			=> 'resources',
									'posts_per_page'	=> 10,
									'tax_query'			=> 	array(
																array(
																	'taxonomy' => 'resource__types',
																	'field'    => 'term_id',
																	'terms'    => 5,
																),
															 ),
								);


								$resource__links = new WP_Query($links_args);
								if ($resource__links->have_posts()) :

							?>
									<div class="c-resources__links  o-posts  o-posts--title-only">
										<h2 class="c-resource__links-title">Useful links:</h2>

								
										<ul class="o-posts__list">
											<?php while ($resource__links->have_posts()) : $resource__links->the_post(); ?>
												<li class="o-posts__item  has-overlay-link">
													<article class="o-post">
														<h3 class="o-post__title"><a href="<?php the_field('url'); ?>" target="_blank" class="o-post__title-link"><?php the_title(); ?></a></h3>
														<span class="o-post__from"><?php the_field('website_name'); ?></span>
														<?php if (get_field('read_time')) : ?><span class="o-post__read-time"><span class="u-hide">You can read this post in </span><?php the_field('read_time'); ?></span><?php endif; ?>
														<a href="<?php the_field('url'); ?>" target="_blank" class="o-post__overlay-link" title="<?php the_title(); ?>"></a>
													</article>
												</li>
											<?php endwhile; ?>
										</ul>


										<a href="/resource/type/links/" class="o-button  o-button--secondary">
											<span class="o-button__text">See all useful links</span>
											<svg class="o-button__icon--right  o-icon--chevron--right" viewBox="0 0 16 16" width="14" height="14">
												<path fill="currentColor" d="M.156 0l.125.125 7.906 7.875-8 8h5.625l6.594-6.594 1.438-1.406-1.438-1.406-6.563-6.594h-5.688z"></path>
											</svg>
										</a>
									</div><!-- /.c-resources__links -->
								<?php endif; ?>
							<?php wp_reset_query(); ?>
						</div><!-- /.o-grid__item -->
					</div><!-- /.o-grid -->
				</div><!-- /.o-grid__item -->





				<aside class="o-grid__item  u-one-quarter  u-portable--one-whole  c-resources__aside">
					<div class="c-resources__aside-inner">
						<section class="o-pod">
							<header class="o-pod__header  o-pod__header--padded">
								<h2 class="c-resource__links-title">Collections:</h2>
							</header>


							<div class="o-pod__content">
								<nav class="o-nav o-nav--collections">
									<h3 class="o-nav__title"><span class="o-nav__title-overflow">Development:</span></h3>
									<ul class="o-nav__list">
										<li class="o-nav__item"><a href="/resource/collections/css/" class="o-nav__link">CSS</a></li>
										<li class="o-nav__item"><a href="/resource/collections/html5/" class="o-nav__link">HTML5</a></li>
										<li class="o-nav__item"><a href="/resource/collections/wordpress/" class="o-nav__link">WordPress</a></li>
									</ul>


									<h3 class="o-nav__title"><span class="o-nav__title-overflow">Best practices:</span></h3>
									<ul class="o-nav__list">
										<li class="o-nav__item"><a href="/resource/collections/performance/" class="o-nav__link">Performance</a></li>
										<li class="o-nav__item"><a href="/resource/collections/standard-conventions/" class="o-nav__link">Standards</a></li>
									</ul>


									<h3 class="o-nav__title"><span class="o-nav__title-overflow">Content strategy:</span></h3>
									<ul class="o-nav__list">
										<li class="o-nav__item"><a href="/resource/collections/content/" class="o-nav__link">Content strategy</a></li>
									</ul>
								</nav>
							</div><!-- /.o-pod__content -->


							<footer class="o-pod__footer  o-pod__footer--padded">
								<p>
									<a href="/resource-collections/" class="o-button  o-button--secondary">
										<span class="o-button__text">View all collections</span>
										<svg class="o-button__icon--right  o-icon--chevron--right" viewBox="0 0 16 16" width="14" height="14">
											<path fill="currentColor" d="M.156 0l.125.125 7.906 7.875-8 8h5.625l6.594-6.594 1.438-1.406-1.438-1.406-6.563-6.594h-5.688z"></path>
										</svg>
									</a>
								</p>
							</footer>
						</section><!-- /.o-pod -->
					</div><!-- /.c-resources__aside-inner -->
				</aside>
			</div><!-- /.o-grid -->
		</div><!-- /.o-container -->
	</main><!-- /.o-panel -->





<?php get_footer(); ?>