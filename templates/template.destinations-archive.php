<?php

	/**
	 * Template name: Scenic > Destinations archive
	 *
	 * @category 	Additional WordPress template files
	 * @package  	scenic-buses
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2019 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	1.0.0
	 * @since   	1.0.0
	 */
	

	get_header();
	
?>


	<main class="o-panel  o-panel--gutterless" id="main">
		<header class="c-title  c-title--routes">
			<div class="o-container">
				<h1 class="c-title__title">
					Destinations
				</h1>
			</div><!-- /.o-container -->


			<section class="c-title__search">
				<div class="o-container  o-container--optimise-readability">
					<form class="o-form  o-form--search" role="search" action="<?php bloginfo('url'); ?>">
						<input type="hidden" value="Search">

						<div class="o-form__field">
							<label class="o-form__label" for="s">Search by town, city or county</label>
							<input class="o-form__input" type="text" name="s" id="s" value="">
						</div><!-- /.c-form__field -->


						<div class="o-form__action">
							<button class="o-button  o-button--primary  o-form__button">
								<svg class="o-button__icon  o-button__icon--left" height="32" width="32" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#search"/></svg>
								<span class="o-button__text  u-palm--hide">Search</span>
							</button>
						</div>
					</form>
				</div><!-- /.o-container -->
			</section><!-- /.c-title__search -->
		</header>





		<div class="o-container  o-container--optimise-readability">
			<p>Content coming soon here.</p>
		</div>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>