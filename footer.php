	<?php

		/**
		 * Time to include some flexible panels, temporarily.
		 */
		
		if (have_rows('flexible-content')):
			while (have_rows('flexible-content')) : the_row();
				if (get_row_layout() == 'panel'):
					$panel_function = get_sub_field('id');

					if 		($panel_function == 'mangopear_panel_cta_default') 			: mangopear_panel_cta_default();
					elseif	($panel_function == 'mangopear_panel_cta_alternative') 		: mangopear_panel_cta_alternative();
					elseif 	($panel_function == 'mangopear_panel_portfolio') 			: mangopear_panel_portfolio($location = 'footer', $title = 'Our work');
					elseif 	($panel_function == 'mangopear_panel_availability') 		: mangopear_panel_availability();
					elseif 	($panel_function == 'mangopear_panel_testimonial_jeakins') 	: mangopear_panel_testimonial_jeakins();
					elseif 	($panel_function == 'mangopear_panel_testimonial_edge') 	: mangopear_panel_testimonial_edge();
					elseif 	($panel_function == 'testimonial_hildon_generic') 			: mangopear_panel_testimonial_hildon_generic();
					endif;


				elseif (get_row_layout() == 'portfolio'):
					mangopear_panel_portfolio(
						$location 		= 'footer', 
						$title 			= 'Our work',
						$parent_id 		= false,
						$portfolio_ids 	= get_sub_field('items')
					);

				endif;
			endwhile;
		
		else :
			mangopear_panel_cta_default(); // Default call to action panel

		endif;

	?>





		<footer class="o-panel  o-panel--main-footer">
			<div class="o-container">
				<div class="o-grid">
					<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
						<div class="o-content-slot  o-content-slot--footer">
							<a href="https://mangopear.co.uk/contact/" class="o-content-slot__block-link">
								<h2 class="u-hide">Get your free consultation</h2>
								<p class="u-hide">With a free consultation from Mangopear creative, we can work together to ensure your marketing tools are working for you.</p>
							</a>
						</div><!-- /.o-content-slot -->
					</div><!-- /.o-grid__item -->





					<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
						<div class="o-content-slot  o-content-slot--footer">
							<a href="https://mangopear.co.uk/contact/" class="o-content-slot__block-link">
								<h2 class="u-hide">Get your free consultation</h2>
								<p class="u-hide">With a free consultation from Mangopear creative, we can work together to ensure your marketing tools are working for you.</p>
							</a>
						</div><!-- /.o-content-slot -->
					</div><!-- /.o-grid__item -->





					<div class="o-grid__item  u-one-third  u-portable--one-whole">
						<div class="c-footer-column">
							<nav class="o-nav  o-nav--collections  o-nav--legal">
								<h3 class="o-nav__title"><span class="o-nav__title-overflow">Useful links:</span></h3>
								<ul class="o-nav__list">
									<li class="o-nav__item"><a href="https://mangopear.co.uk/what-we-do/" class="o-nav__link">What we do</a></li>
									<li class="o-nav__item"><a href="https://mangopear.co.uk/our-work/" class="o-nav__link">Our work</a></li>
									<li class="o-nav__item"><a href="https://mangopear.co.uk/about/" class="o-nav__link">About Mangopear</a></li>
									<li class="o-nav__item"><a href="https://coding.mangopear.co.uk/" class="o-nav__link">Useful resources</a></li>
									<li class="o-nav__item"><a href="https://witterings.mangopear.co.uk/" class="o-nav__link">Witterings from Mangopear</a></li>
									<li class="o-nav__item"><a href="https://mangopear.co.uk/writing/" class="o-nav__link">Press &amp; latest news</a></li>
								</ul>
							</nav>


							<nav class="o-nav  o-nav--collections  o-nav--legal">
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





		<?php

			/**
			 * Call the WordPress footer function
			 */
			
			wp_footer();

		?>





		<!-- Web font loading -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					families: ['Merriweather:400,400italic,700,700italic,300italic,300:latin']
				}
			});
		</script>





		<!-- Google Analytics tracking code -->
		<script async defer>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','/wp-content/themes/mangopear/resources/js/analytics.js','ga');

			ga('create', 'UA-45542791-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>