<?php

	/**
	 * Template partial: Footer
	 *
	 * @category 	Templates
	 * @package  	mangopear-core
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2018 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	1.0.0
	 * @since   	1.0.0
	 */
	
?>


	<footer class="c-footer">
		<div class="o-container">
			<div class="o-grid">
				<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
					<div class="o-content-slot  o-content-slot--footer  o-content-slot--scenic-enrolment">
						<a href="https://scenicbuses.uk/enroll/" class="o-content-slot__block-link">
							<h2 class="u-hide">Are you an operator with a scenic bus route?</h2>
							<p class="u-hide">Get in touch with us and we'll add your route to the Scenic Great Britain website - for free!</p>
						</a>
					</div><!-- /.o-content-slot -->
				</div><!-- /.o-grid__item -->





				<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
					<div class="c-footer__contact">
						<svg class="c-head-navigation__logo__icon  c-footer__logo" height="65" width="175" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#scenic-logo"/></svg>


						<p class="c-footer__contact__item">
							<strong class="c-footer__contact__item-title">Email us at:</strong>
							<a href="mailto:say.hi@mangopear.co.uk">scenic@mangopear.co.uk</a>
						</p>


						<p class="c-footer__contact__item" style="margin-bottom: 0.5em;">
							<strong class="c-footer__contact__item-title">Connect with us:</strong>
						</p>


						<a href="https://www.twitter.com/ScenicBuses" class="o-button  o-button--secondary  c-footer__social-link" target="_blank">
							<svg class="o-button__icon  o-button__icon--left" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#twitter"/></svg>
							<span class="o-button__text">Twitter</span>
							<svg class="o-button__icon  o-button__icon--right" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
						</a>


						<a href="https://www.facebook.com/ScenicBuses" class="o-button  o-button--secondary  c-footer__social-link" target="_blank">
							<svg class="o-button__icon  o-button__icon--left" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#facebook"/></svg>
							<span class="o-button__text">Facebook</span>
							<svg class="o-button__icon  o-button__icon--right" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
						</a>


						<a href="https://www.instagram.com/ScenicBuses" class="o-button  o-button--secondary  c-footer__social-link" target="_blank">
							<svg class="o-button__icon  o-button__icon--left" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#instagram"/></svg>
							<span class="o-button__text">Instagram</span>
							<svg class="o-button__icon  o-button__icon--right" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
						</a>
					</div><!-- /.c-contact-details -->
				</div><!-- /.o-grid__item -->





				<div class="o-grid__item  u-one-third  u-portable--one-whole">
					<div class="c-footer-column">
						<nav class="o-nav  o-nav--legal">
							<h3 class="o-nav__title"><span class="o-nav__title-overflow">Useful links:</span></h3>
							<ul class="o-nav__list">
								<li class="o-nav__item"><a href="https://scenicbuses.uk/"              class="o-nav__link">Home</a></li>
								<li class="o-nav__item"><a href="https://scenicbuses.uk/routes/"       class="o-nav__link">Routes</a></li>
								<li class="o-nav__item"><a href="https://scenicbuses.uk/destinations/" class="o-nav__link">Destinations</a></li>
								<li class="o-nav__item"><a href="https://scenicbuses.uk/blog/"         class="o-nav__link">News &amp; Press</a></li>
								<li class="o-nav__item"><a href="https://scenicbuses.uk/help/"         class="o-nav__link">Help &amp; Support</a></li>
							</ul>


							<h3 class="o-nav__title"><span class="o-nav__title-overflow">Legal:</span></h3>
							<ul class="o-nav__list">
								<li class="o-nav__item"><a href="https://mangopear.co.uk/legal-stuff/terms-conditions/" class="o-nav__link">Terms &amp; conditions</a></li>
								<li class="o-nav__item"><a href="https://mangopear.co.uk/legal-stuff/privacy-policy/" class="o-nav__link">Privacy Policy</a></li>
								<li class="o-nav__item"><a href="https://mangopear.co.uk/legal-stuff/cookie-policy/" class="o-nav__link">Cookie Policy</a></li>
							</ul>
						</nav>


						<p class="c-copyright">&copy; Copyright <?php echo date('Y'); ?> to Mangopear Limited. <br>All rights reserved.</p>
					</div><!-- /.c-footer-column -->
				</div><!-- /.o-grid__item -->
			</div><!-- /.o-grid -->
		</div><!-- /.o-container -->
	</footer>





	<?php wp_footer(); ?>





	<!-- Web font loading -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['PT+Serif:400,400i,700,700i']
			}
		});
	</script>


</body>
</html>