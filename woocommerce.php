<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * https://github.com/timber/timber/blob/master/docs/guides/woocommerce.md
 */

if (!defined("ABSPATH")) {
	exit();
} // Exit if accessed directly

get_header();

$context = Timber::context();
$context["post"] = new TimberPost();

if (is_singular("product")) {
	$context["post"] = Timber::get_post();
	$product = wc_get_product($context["post"]->ID);
	$context["product"] = $product;

	// Restore the context and loop back to the main query loop.
	wp_reset_postdata();

	Timber::render("woo/single-product.twig", $context);
} else {
	$posts = Timber::get_posts();
	$context["products"] = $posts;
	$context["title"] = get_the_title(get_option("woocommerce_shop_page_id"));

	if (is_product_category()) {
		$queried_object = get_queried_object();
		$term_id = $queried_object->term_id;
		$context["category"] = get_term($term_id, "product_cat");
		$context["title"] = single_term_title("", false);
	}

	Timber::render("woo/archive.twig", $context);
}

get_footer();
