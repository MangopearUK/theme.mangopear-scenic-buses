<?php

	/**
	 * [Partial] Logo
	 *
	 * @category 	Core WordPress template files
	 * @package  	mangopear-core
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2018 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	1.0.0
	 * @since   	1.0.0
	 */
	
?>

	<article class="c-article  c-article--route">
		<header class="c-article__header">
			<?php

				/**
				 * Decide which image to show
				 *
				 * If the listing image has been selected, use that, otherwise use 
				 * the featured image field.
				 *
				 * @since 1.0.0
				 */
				
				$article_image = (get_field('photo--listings')) ? get_field('photo--listings') : get_field('photo--featured');

			?>
			<img class="c-article__image" alt="<?php the_title(); ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $article_image['sizes']['blog-lister']; ?>">


			<h2 class="h3  c-article__title">
				<?php $route_name_number = (get_field('identifier') == 'brand') ? get_field('identifier--brand') : 'Route ' . get_field('identifier--number'); ?>

				<a href="<?php the_permalink(); ?>" class="c-article__title__link">
					<strong class="c-article__title__route"><?php echo $route_name_number; ?></strong>
					<span class="c-article__title__operator"> from <?php $operator = get_field('operator'); echo $operator->name; ?></span>
				</a>
			</h2>


			<?php if (get_field('copyright', $article_image['id'])) : ?>
				<span class="c-copyright-label  c-copyright-label--listing-image">
					<?php if (get_field('copyright__url', $article_image['id'])) : ?><a href="<?php the_field('copyright__url', $article_image['id']); ?>" target="_blank"><?php endif; ?>
						&copy; <?php the_field('copyright', $article_image['id']) ?>
					<?php if (get_field('copyright__url', $article_image['id'])) : ?></a><?php endif; ?>
				</span>
			<?php endif; ?>
		</header>


		<div class="c-article__content">
			<p class="c-route-description">
				<?php echo get_field('route-description--marketing'); ?>
			</p>


			<a href="<?php the_permalink(); ?>" class="o-button  o-button--secondary  c-article__link">
				<span class="o-button__text">View route</span>
				<svg class="o-button__icon  o-button__icon--right" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
			</a>
		</div>
	</article>