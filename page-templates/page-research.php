<?php

/* 
Template Name: Research
*/

get_header();

$context = Timber::context();
$context['post'] = new TimberPost();

$workshopArgs = array(
	'post_type' => 'event',
	'tax_query' => array(
		array(
			'taxonomy' => 'event-type',
			'field'    => 'slug',
			'terms'    => 'workshop',
		),
	),
);

$context['workshops'] = Timber::get_posts($workshopArgs);

Timber::render( 'page-templates/views/page-research.twig', $context );




get_footer();