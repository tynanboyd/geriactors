<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<!-- like what you see? tynanboyd.com -->
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="https://use.typekit.net/fel3wps.css">

		<meta property="og:title" content="<?php echo bloginfo('name'); ?>" />
		<meta property="og:site_name" content="<?php echo bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php echo bloginfo('description'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:locale" content="en_CA" />
		<meta property="og:image" content="<?php // the_field('open_graph_image', 'option'); ?>" />
		<meta property="og:image:width" content="558" />
		<meta property="og:image:height" content="558" />

		<!--
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/favicon-fire.ico" /> -->

		<meta name="twitter:title" content="<?php echo bloginfo('name'); ?>" />
		<meta name="twitter:description" content="<?php echo bloginfo('description'); ?>" />
		<meta name="twitter:card" content="<?php echo bloginfo('description'); ?>"" />
		<meta name="twitter:url" content="<?php echo bloginfo('uri'); ?>" />
		<meta name="twitter:site" content="<?php echo bloginfo('uri'); ?>" />
		<meta name="twitter:creator" content="GeriActors" />
		<meta name="twitter:image" content="<?php // the_field('open_graph_image', 'option'); ?>" />
		

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>


	<?php		  
	    $context = Timber::get_context();
	    Timber::render('page-templates/views/header.twig', $context);
	?>