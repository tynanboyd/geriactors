<?php

get_header();

$context = Timber::get_context();
$context['post'] = new TimberPost();


//show upcoming performances
$eventArgs = array(
	'post_type' => 'event',	
	'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'event-status',
				'field'    => 'slug',
				'terms'    => 'upcoming',
			),
		),
);

$context['upcomingEvents'] = Timber::get_posts($eventArgs);

Timber::render( 'page-templates/views/front-page.twig', $context );

get_footer();

