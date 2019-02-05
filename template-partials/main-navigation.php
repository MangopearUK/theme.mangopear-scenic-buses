<?php

	/**
	 * [Partial] Main navigation
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

	<div class="o-nav  o-nav--row">
		<ul class="o-nav__list">
			<li class="o-nav__item  o-nav__item--top-level  o-nav__item--this-site">
				<strong class="o-nav__text  o-nav__text--top-level">Scenic Buses:</strong>

				<ul class="o-nav__list  o-nav__list--second-level">
					<li class="o-nav__item"><a href="https://scenicbuses.uk/"              class="o-nav__link">Home</a></li>
					<li class="o-nav__item"><a href="https://scenicbuses.uk/routes/"       class="o-nav__link">Routes</a></li>
					<li class="o-nav__item"><a href="https://scenicbuses.uk/destinations/" class="o-nav__link">Destinations</a></li>
					<li class="o-nav__item"><a href="https://scenicbuses.uk/blog/"         class="o-nav__link">News &amp; Press</a></li>
					<li class="o-nav__item"><a href="https://scenicbuses.uk/help/"         class="o-nav__link">Help &amp; Support</a></li>
				</ul>
			</li>


			<li class="o-nav__item  o-nav__item--top-level" data-nav="also-from-us">
				<strong class="o-nav__text  o-nav__text--top-level">Also from us:</strong>

				<ul class="o-nav__list  o-nav__list--second-level">
					<li class="o-nav__item">
						<a href="https://mangopear.co.uk/" class="o-button  o-nav__link">
							<svg class="o-button__icon  o-button__icon--left" height="44" width="44" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#nav-icon--mangopear-creative"/></svg>
							<span class="o-button__text"><strong>Mangopear creative</strong> <span class="u-hide">- </span>visit our main website to see what we do.</span>
						</a>
					</li>


					<li class="o-nav__item">
						<a href="https://witterings.mangopear.co.uk/" class="o-button  o-nav__link">
							<svg class="o-button__icon  o-button__icon--left" height="44" width="44" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#nav-icon--witterings"/></svg>
							<span class="o-button__text"><strong>Witterings from Mangopear</strong> <span class="u-hide">- </span>our witterings about public transport.</span>
						</a>
					</li>


					<li class="o-nav__item">
						<a href="https://coding.mangopear.co.uk/" class="o-button  o-nav__link">
							<svg class="o-button__icon  o-button__icon--left" height="44" width="44" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#nav-icon--coding"/></svg>
							<span class="o-button__text"><strong>Coding from Mangopear</strong> <span class="u-hide">- </span>our blog about design &amp; web development.</span>
						</a>
					</li>


					<li class="o-nav__item">
						<a href="https://account.mangopear.co.uk/" class="o-button  o-nav__link">
							<svg class="o-button__icon  o-button__icon--left" height="44" width="44" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#nav-icon--account"/></svg>
							<span class="o-button__text"><strong>Your account</strong> <span class="u-hide">- </span>log in to view invoices &amp; your retainer.</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div><!-- /.o-nav -->