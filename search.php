<?php
	
	/**
	 * Get the header code
	 */
	get_header();


	/**
	 * Output page title
	 *
	 * @see /themes/mangopear/functions/source/mangopear/mangopear.output.page-title.php
	 */
	
	mangopear_output_page_title($show_title = true, $show_breadcrumb = false, $title_content = 'Search results for: ' . $_GET['s']);

?>





	<main class="o-panel  o-panel--gutterless">
		<div class="o-container">
			<?php

				/**
				 * Return SearchWP AJAX results in a specified manner
				 *
				 * Search results are contained within a div.searchwp-live-search-results
				 * which you can style accordingly as you would any other element on your site
				 *
				 * Some base styles are output in wp_footer that do nothing but position the
				 * results container and apply a default transition, you can disable that by
				 * adding the following to your theme's functions.php:
				 *
				 * add_filter( 'searchwp_live_search_base_styles', '__return_false' );
				 *
				 * There is a separate stylesheet that is also enqueued that applies the default
				 * results theme (the visual styles) but you can disable that too by adding
				 * the following to your theme's functions.php:
				 *
				 * wp_dequeue_style( 'searchwp-live-search' );
				 *
				 * You can use ~/searchwp-live-search/assets/styles/style.css as a guide to customize
				 */
				

				/**
				 * If we have results returned, lets loop through them 
				 * and create some arrays from said data
				 *
				 * [1]	Set up defaults
				 * [2]	Loop through returned results
				 * [3]	
				 */
				

				/**
				 * [1]	Set up defaults
				 * 
				 * 		We need to set up some empty arrays that will be populated later with titles
				 * 		and posts that will be outputted even later!
				 *
				 * 		[a]	for populating later with data
				 * 		[b]	for portfolio and case studies that are returned in the results
				 * 		[c]	for resources that are returned in the results
				 * 		[d]	for posts that are neither portfolios or resources
				 * 		[e]	for pages that are children of "What we do"
				 * 		[f] for routes in Scenic
				 */
				
				$swp_query = new SWP_Query(
					array(
						's' 				=> $_GET['s'],		// search query
						'posts_per_page' 	=> -1,     			// posts per page
						'nopaging' 			=> true,			// disable paging?
					)
				);

				
				if (! empty($swp_query->posts)) :
					$post_data = array();			// [1][a]
					
					$posts__portfolio = array(
						'title'	=> 'Our work',
						'posts'	=> array(),
					);	// [1][b]
					
					$posts__resources = array(
						'title'	=> 'Useful resources',
						'posts'	=> array(),
					);	// [1][c]
					
					$posts__routes = array(
						'title'	=> 'Routes',
						'posts'	=> array(),
					);	// [1][f]
					
					$posts__other = array(
						'title'	=> 'Other results',
						'posts'	=> array(),
					);	// [1][d]
	
					$posts__services = array(
						'title'	=> 'What we do',
						'posts'	=> array(),
					);	// [1][e]





					echo '<p class="c-lede" style="margin: 31px 0 -26px;">Found <strong>' . $swp_query->found_posts . '</strong> results.</p>';





					/**
					 * [2]	Loop through returned results
					 * 
					 * 		We need to find out the post type for each post and set up 
					 * 		some data that will be looped through at a later stage.
					 *
					 * 		[a]	Find the post type for the returned result
					 * 		[b]	If the post is a portfolio item, set up the data
					 * 		[c]	Otherwise if the post is a resource, set up the data
					 * 			[i]		Get the type of resource (documented | links)
					 * 			[ii]	If the resource is a link, set the URL as a custom field otherwise use the default options
					 * 		[d]	If no other conditions are met, set up the data as another post
					 * 		[e]	Scenic Buses routes
					 */
					
					
				    foreach ($swp_query->posts as $post) : setup_postdata($post);
						$post_type = get_post_type();			// [2][a]
						$parent_id = $post->post_parent;


						if ($post_type == 'portfolio') :		// [2][b]
							$post_data = array(
								'title'	=> get_the_title(),
								'url'	=> get_permalink(),
							);

							array_push($posts__portfolio['posts'], $post_data);


						elseif ($post_type == 'resources') :	// [2][c]
							$get_resource_type = wp_get_post_terms($post->ID, 'resource__types'); 	// [2][c][i]
							$resource_url = ($get_resource_type[0]->slug == 'links') ? get_field('url') . '" target="_blank' : get_permalink(); // [2][c][ii]


							$post_data = array(
								'title'	=> get_the_title(),
								'url'	=> $resource_url,
							);


							array_push($posts__resources['posts'], $post_data);


						elseif ($post_type == 'routes') :		// [2][e]
							$post_data = get_the_ID();

							array_push($posts__routes['posts'], $post_data);


						elseif ($post_type == 'page' && $parent_id == 260 || $parent_id == 639  || $parent_id == 643 || $parent_id == 647) :	// [2][c]
							$post_data = array(
								'title'	=> get_the_title(),
								'url'	=> get_permalink(),
							);


							array_push($posts__services['posts'], $post_data);


						else :									// [2][d]
							$post_data = array(
								'title'	=> get_the_title(),
								'url'	=> get_permalink(),
							);

							array_push($posts__other['posts'], $post_data);


						endif;
					endforeach;





					/**
					 * [3]	Output our results
					 */
					
					$result__types = array();
					if ($posts__services['posts'] != array()) 	{ array_push($result__types, $posts__services); }
					if ($posts__portfolio['posts'] != array()) 	{ array_push($result__types, $posts__portfolio); }
					if ($posts__resources['posts'] != array()) 	{ array_push($result__types, $posts__resources); }
					if ($posts__other['posts'] != array()) 		{ array_push($result__types, $posts__other); }
					

					foreach ($result__types as $result__type) : ?>


						<nav class="o-nav  o-nav--collections  o-nav--search-results">
							<h3 class="o-nav__title">
								<span class="o-nav__title-overflow">
									<?php echo $result__type['title']; ?>
								</span>
							</h3>


							<ul class="o-nav__list">
								<?php foreach ($result__type['posts'] as $link) : ?>
									<li class="o-nav__item"><a href="<?php echo $link['url']; ?>" class="o-nav__link"><?php echo $link['title']; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</nav>
			<?php endforeach; wp_reset_postdata(); ?>
		</div><!-- /.o-container -->





			<?php

				if ($posts__routes['posts'] != array()) :
					$routes = new WP_Query(array('post_type' => 'routes', 'post__in' => $posts__routes['posts']));
					if ($routes->have_posts()) : ?>
						<section class="c-resources-row  c-resources-row--links">
							<div class="o-container">
								<header class="c-resources-row__header">
									<h2 class="c-resources-row__title">Routes</h2>
								</header>


								<div class="c-resources__links  o-posts  o-posts--title-only">
									<ul class="o-flex  o-posts__list">
										<?php 
															
											while ($routes->have_posts()) :
												$routes->the_post();
												scenic_pod__route();
											endwhile;

										?>
									</ul>
								</div><!-- /.c-resources__links -->
							</div><!-- /.o-container -->
						</section>
				<?php endif; wp_reset_postdata(); ?>
			<?php endif; ?>





			<?php else : ?>
				<p class="searchwp-live-search-no-results">
					<strong>Sorry!</strong>
					<br>
					We couldn't match any results to your search. Please try again with a different search query.
				</p>



			<?php endif; ?>





			<?php

				/**
				 * Let's get paginated
				 *
				 * [1]	Load up the global query var
				 * [2]	Create a ridiculously large number as a max for the  max number of posts
				 * [3]	Show the pagination
				 * [4]	Reset wp_query so that queries below work as expected
				 */

				/**
				 * [1]	Load up the global query var
				 */
			
				global $wp_query;


				/**
				 * [2]	Create a ridiculously large number as a max for the  max number of posts
				 */

				$big = 999999999;


				/**
				 * [3]	Show the pagination
				 */

				echo paginate_links( 
					array(
						'base'		=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'current'	=> max(1, get_query_var('paged')),
						'total'		=> $search_results->max_num_pages,
						'format'	=> '?page=%#%',
						'type'		=> 'list',
						'end_size'	=> 3
					)
				);


				/**
				 * [4]	Reset wp_query so that queries below work as expected
				 */

				wp_reset_query();

			?>
		</div><!-- /.o-container -->
	</main><!-- /.o-panel -->





	<?php get_footer(); ?>