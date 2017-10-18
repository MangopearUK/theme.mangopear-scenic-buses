<?php

	/**
	 * [Core template name]	Header (Partial)
	 *
	 * This is the core header file that is included in all of the WordPress 
	 * templates used throughout the theme. This file contains the HTML that
	 * makes up the top of every website page.php.
	 *
	 * You should note the `wp_header();` hook that plugins and WordPress core
	 * may use to add additional HTML and stylesheets and/or JavaScript 
	 * files to the website.
	 *
	 * Please note: You should enqueue stylesheets and JavaScript documents
	 * - DO NOT simply insert them at the bottom of this document.
	 *
	 * @category 	Core WordPress template files
	 * @package  	mangopear
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2015 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	1.0.0
	 * @since   	1.0.0
	 */
	

	/**
	 * Please note: The <!DOCTYPE HTML> element CAN NOT have any characters before it
	 * 				otherwise there will be styling issues with the rendered website.
	 */
	
?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>
		

		<!-- Make this site responsive, dude -->
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/favicon.ico">
		<link rel="apple-touch-icon"                  href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="57x57"    href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="72x72"    href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76"    href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114"  href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120"  href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144"  href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152"  href="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-152x152.png">
		<meta name="apple-mobile-web-app-title"      content="Mangopear creative - Design. Development. Consultancy.">
		<meta name="application-name"                content="Mangopear creative - Design. Development. Consultancy.">
		<meta name="msapplication-TileColor"         content="#129da9">
		<meta name="msapplication-TileImage"         content="<?php echo get_template_directory_uri(); ?>/resources/images/favicon/apple-touch-icon-144x144.png">
		<meta name="theme-color"                     content="#129da9">
		

		<?php wp_head(); ?>


		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({
				google_ad_client: "ca-pub-1323095336194826",
				enable_page_level_ads: true
			});
		</script>
	</head>





	<body <?php body_class(); ?>>
		<?php if (get_field('status', 'option')) : ?>
			<header class="c-header-notice  c-header-notice--<?php the_field('status__style', 'option'); ?>">
				<div class="o-container">
					<div class="c-header-notice__icon">
						<svg class="c-header-notice__icon-asset" height="24" width="24" role="presentation"><use xlink:href="<?php echo KENNECTIONS_SPRITE; ?>#warning"/></svg>
					</div><!-- /.c-header-notice__icon -->


					<div class="c-header-notice__content">
						<?php the_field('status__content', 'option'); ?>
					</div><!-- /.c-header-notice__content -->
				</div><!-- /.o-container -->
			</header>
		<?php endif; ?>





		<header class="c-main-header">
			<div class="o-container">
				<div class="o-grid">
					<div class="o-grid__item  u-one-quarter">
						<a href="<?php echo get_site_url(); ?>/" class="c-main-header__logo">
							Scenic Buses
						</a>
					</div><!-- /.o-grid__item -->


					<div class="o-grid__item  u-three-quarters">
						<nav class="o-nav  o-nav--row  c-main-header__nav">
							<ul class="o-nav__list">
								<li class="o-nav__item"><a href="/routes/" class="o-nav__link"><span class="o-nav__content">Routes</span></a></li>
								<li class="o-nav__item"><a href="/routes/location/" class="o-nav__link"><span class="o-nav__content">Destinations</span></a></li>
								<li class="o-nav__item"><a href="/blog/" class="o-nav__link"><span class="o-nav__content">News &amp; Blog</span></a></li>
								<li class="o-nav__item"><a href="/contact/" class="o-nav__link"><span class="o-nav__content">Contact Us</span></a></li>
							</ul>
						</nav>
					</div><!-- /.o-grid__item -->
				</div><!-- /.o-grid -->
			</div><!-- /.o-container -->
		</header>