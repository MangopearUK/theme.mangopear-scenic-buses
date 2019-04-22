<?php

	/**
	 * Template name: News & press lister
	 *
	 * This template serves as the default for all views. Can easily be overwritten 
	 * by other templates. Typically this will be used for either the front page or 
	 * as the list of posts.
	 *
	 * @category 	Templates
	 * @package  	scenic-buses
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2018 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	4.0.0
	 * @since   	1.0.0
	 */


	get_header();

?>


	<main class="o-main" id="main">
		<header class="c-title">
			<div class="o-container">
				<h1 class="c-title__title">
					<strong>News &amp; Press</strong>
				</h1>
			</div><!-- /.o-container -->
		</header>





		<?php

			/**
			 * Get latest articles
			 */

			$news_args = array(
				'post_type'			=> 'post',
				'posts_per_page'	=> 10,
			);


			$news_articles = new WP_Query($news_args);
			if ($news_articles->have_posts()) : ?>
				<div class="o-container">
					<div class="o-grid  o-grid--wide">
						<?php while ($news_articles->have_posts()) : $news_articles->the_post(); ?>
							<div class="o-grid__item  u-one-half  u-palm--one-whole">
								<?php get_template_part('template-partials/news-press-article-item'); ?>
							</div><!-- /.o-grid__item -->
						<?php endwhile; ?>
					</div><!-- /.o-grid -->


					<?php get_template_part('template-partials/pagination'); ?>
				</div><!-- /.o-container -->


			<?php else : ?>
				<div class="o-container  o-container--optimise-readability">
					<p style="text-align: center;">No results found, sorry.</p>
				</div><!-- /.o-container -->


			<?php endif; ?>
	</main><!-- /.o-panel -->


<?php get_footer(); ?>