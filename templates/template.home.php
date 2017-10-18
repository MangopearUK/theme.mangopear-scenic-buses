<?php

	/**
	 * Template name: Scenic > Home
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
	
?>


	<header class="c-home">
		<h1 class="c-home__title">
			<?php

				$blue_chars = array('W', 'e', 'l', 'c', 'o', 'm', 'e', ' ', 't', 'o', ' ', 'S', 'c', 'e', 'n', 'i', 'c', ' ', 'B', 'u', 's', 'e', 's');

				echo '<pre>';
					foreach ($blue_chars as $char) { echo '<span class="c-home__char  c-home__char--green">' . $char . '</span>'; }
				echo '</pre>';

			?>
		</h1>


		<p class="c-home__description">
			This exciting new website is still being built - so check back later please. It'll be full of the best bus and train routes in the United Kingdom.
		</p>


		<div class="c-home__actions">
			<a href="/blog/" class="o-button  o-button--circular  c-home__action">
				<span class="o-button__text">Read the blog</span>
				<svg class="o-button__icon" height="24" width="24" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow-right"/></svg>
			</a>
		</div><!-- /.c-home__actions -->
	</header><!-- /.c-home-panel -->





	<main class="o-panel">
		<div class="o-container">
			<p style="text-align: center; font-style: italic; font-weight: 300; font-size: 1.3em;">Seriously, this website is coming pretty soon.</p>
			<p style="text-align: center; font-style: italic; font-weight: 300; font-size: 1.3em;">Check back in about a month or so or follow <a href="https://twitter.com/MangopearUK/" target="_blank">@MangopearUK</a> on Twitter for more info.</p>
		</div><!-- /.o-container -->
	</main><!-- /.o-panel -->





<?php get_footer(); ?>