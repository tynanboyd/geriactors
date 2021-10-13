<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus([
	"main-nav" => esc_html__("Main Navigation", "foundationpress"),
	"footermenu" => esc_html__("Footer Navigation", "foundationpress"),
]);

/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if (!function_exists("foundationpress_main_nav")) {
	function foundationpress_main_nav()
	{
		wp_nav_menu([
			"container" => false,
			"theme_location" => "main-nav",
			"fallback_cb" => false,
		]);
	}
}

if (!function_exists("foundationpress_footer_nav")) {
	function foundationpress_footer_nav()
	{
		wp_nav_menu([
			"container" => false,
			"theme_location" => "footermenu",
			"fallback_cb" => false,
		]);
	}
}

add_filter("timber/context", "add_to_context");
function add_to_context($data)
{
	$data["menu"] = new TimberMenu("main-nav"); // This is where you can also send a WordPress menu slug
	$data["footermenu"] = new TimberMenu("footermenu"); // This is where you can also send a WordPress menu slug or ID
	return $data;
}

Timber::$dirname = ["page-templates/views", "views"];

/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
 */
if (!function_exists("foundationpress_add_menuclass")) {
	function foundationpress_add_menuclass($ulclass)
	{
		$find = ['/<a rel="button"/', '/<a title=".*?" rel="button"/'];
		$replace = [
			'<a rel="button" class="button"',
			'<a rel="button" class="button"',
		];

		return preg_replace($find, $replace, $ulclass, 1);
	}
	add_filter("wp_nav_menu", "foundationpress_add_menuclass");
}
