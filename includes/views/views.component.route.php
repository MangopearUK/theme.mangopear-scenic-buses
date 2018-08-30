<?php

/**
 * [Scenic]	Output a route pod
 *
 * Outputs a route pod for use on the website.
 *
 * @category    filter
 * @package     scenic-buses
 * @author      Andi North <andi@mangopear.co.uk>
 * @copyright   2018 Mangopear Limited
 * @license     GNU General Public License <http://opensource.org/licenses/gpl-license.php>
 * @since       1.0.0
 * @version     1.0.0
 */


/**
 * CHANGELOG
 *
 * @version 1.0.0
 *          Init new component
 */


/**
 * CONTENTS
 *
 * [1]  Forbid direct loading of this file
 * [2]	Get global WooCommerce values
 */


/**
 * [1]	Forbid direct loading of this file
 */

if (! defined('ABSPATH')) { exit; }





/**
 * [3]	Define function
 *
 * 		[a]	Get global WooCommerce values
 */

if (! function_exists('scenic_pod__route')) :
	function scenic_pod__route($args = array()) {

		/**
		 * [b]	Set default values for params
		 */
		
		$defaults = array(
			'route-id'		=> false,
		);

		$args = wp_parse_args($args, $defaults);

?>


		<li class="o-flex__item  c-useful-link" <?php if (get_field('colour')) { echo 'style="color: ' . get_field('colour') . '"'; } ?>>
			<article class="o-posts__item  c-useful-link__wrap  has-overlay-link">
				<div class="o-post">
					<?php if (get_the_post_thumbnail_url(get_the_ID(), 'featured--medium')) : ?>
						<img class="o-post__image" 
							     alt="<?php the_title(); ?>" 
							     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
							     data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured--medium'); ?>">
					<?php endif; ?>


					<h3 class="o-post__title">
						<a href="<?php echo get_the_permalink(); ?>" class="o-post__title-link">
							<?php

								$identifier = get_field('identifier');
								$pod_title = ($identifier == 'brand') ? get_field('identifier--brand') : 'Route ' . get_field('identifier--number');

								echo $pod_title . '<span class="o-post__title__sub"> to: ' . get_field('route-description') . '</span>';

							?>
						</a>
					</h3>


					<?php if (get_field('excerpt')) : ?>
						<div class="o-post__excerpt">
							<?php the_field('excerpt'); ?>
						</div><!-- /.o-post__excerpt -->
					<?php endif; ?>


					<div class="o-post__foot">
						<?php if (get_field('opco')) : ?>
							<p class="o-post__foot-item  o-post__opco">
								<span class="o-post__foot-item__title">Operated by: </span>
								<strong><?php the_field('opco'); ?></strong>
							</p>
						<?php endif; ?>


						<?php if (get_field('days-of-operation')) : ?>
							<p class="o-post__foot-item  o-post__operating-days">
								<span class="o-post__foot-item__title">Runs: </span>
								<strong><?php the_field('days-of-operation'); ?></strong>
							</p>
						<?php endif; ?>
					</div><!-- /.o-post__foot -->
				</div>
			</article>
		</li>


	<?php } ?>
<?php endif; ?>