<?php

get_header();

$context = Timber::get_context();
$context['post'] = new TimberPost();

// past events
$pastEventArgs = array(
	'post_type' => 'event',	
	'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'event-status',
				'field'    => 'slug',
				'terms'    => 'past',
			),
		),
);

$context['past_events'] = Timber::get_posts($pastEventArgs);

Timber::render( 'page-templates/views/page.twig', $context );




get_footer();