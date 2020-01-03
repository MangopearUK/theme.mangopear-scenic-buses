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

	<a href="<?php echo get_site_url(); ?>" class="c-head-navigation__logo">
		<svg class="c-head-navigation__logo__icon  u-portable--hide" height="65" width="175" role="presentation"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#scenic-logo"/></svg>
		<svg class="c-head-navigation__logo__icon  u-desk--hide"     height="65" width="115"  role="presentation" style="margin-bottom: .2rem"><use xlink:href="<?php echo SCENIC_SPRITE; ?>#scenic-logo"/></svg>
		<span class="u-invisible">Scenic Great Britain</span>
	</a>