<?php

get_header();

$context = Timber::get_context();
$context['post'] = new TimberPost();

$args = array(
	'post_type' => 'event',
);

$context['events'] = Timber::get_posts($args);

Timber::render( 'page-templates/views/single-event.twig', $context );

get_footer();