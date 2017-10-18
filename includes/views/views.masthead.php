<?php

/**
 * [Scenic]	Output masthead markup
 *
 * This component is a simple output of the latest style of "Add to basket" setup.
 *
 * @category    filter
 * @package     hildon
 * @author      Andi North <andi@mangopear.co.uk>
 * @copyright   2017 Mangopear Limited
 * @license     GNU General Public License <http://opensource.org/licenses/gpl-license.php>
 * @since       3.0.0
 * @version     3.0.0
 */


/**
 * CHANGELOG
 *
 * @version 3.0.0
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

if (! function_exists('scenic_output_masthead')) :
	function scenic_output_masthead($args = array()) {

		/**
		 * [b]	Set default values for params
		 */
		
		$defaults = array(
			'image'			=> get_field('masthead__image'),
			'title__style'	=> get_field('masthead__title-style'),
			'title__line-1'	=> get_field('masthead__title'),
			'title__line-2'	=> get_field('masthead__title--line-2'),
			'content'		=> get_field('masthead__content'),
			'link__text'	=> get_field('masthead__link')
		);

		$args = wp_parse_args($args, $defaults);

?>


		<header class="o-panel  o-panel--gutterless  c-masthead">
			<div class="o-grid  o-grid--middle  o-grid--gutterless">
				<div class="o-grid__item  c-masthead__graphic">
					<img class="c-masthead__image" 
					     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
					     data-srcset="<?php echo $args['image']['sizes']['masthead--xxs']; ?>   350w, 
					                  <?php echo $args['image']['sizes']['masthead--xs']; ?>    520w, 
					                  <?php echo $args['image']['sizes']['masthead--s']; ?>    1050w, 
					                  <?php echo $args['image']['sizes']['masthead--m']; ?>    1350w, 
					                  <?php echo $args['image']['sizes']['masthead--l']; ?>    2083w, 
					                  <?php echo $args['image']['sizes']['masthead--xl']; ?>   2750w, 
					                  <?php echo $args['image']['sizes']['masthead--xxl']; ?>  3333w, 
					                  <?php echo $args['image']['sizes']['masthead--xxxl']; ?> 4166w" 
					    alt="">
				</div><!-- /.c-masthead__graphic -->


				<div class="o-grid__item  c-masthead__content">
					<div class="c-masthead__container">
						<h1 class="c-masthead__title">
							<?php if ($args['title__style'] == 'double') : ?>
								<span class="c-masthead__title-line--sub"><?php echo $args['title__line-1']; ?></span>
							<?php endif; ?>
							

							<span class="c-masthead__title-line--main"><?php echo $args['title__line-2']; ?></span>
						</h1>


						<div class="c-masthead__intro"><?php echo $args['content']; ?></div>


						<a href="#main" class="o-button  c-masthead__button">
							<span class="o-button__content"><?php the_field('masthead__link'); ?></span>
							<svg class="o-button__icon  o-button__icon--right" height="24" width="24" role="presentation"><use xlink:href="<?php echo HILDON_SPRITE; ?>#arrow-down"/></svg>
						</a>
					</div><!-- /.c-masthead__container -->
				</div><!-- /.c-masthead__content -->
			</div><!-- /.o-grid -->
		</header>


	<?php } ?>
<?php endif; ?>