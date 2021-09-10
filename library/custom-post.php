<?php
// Register Custom Post Type
function geri_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Event', 'text_domain' ),
		'archives'              => __( 'Event Archives', 'text_domain' ),
		'attributes'            => __( 'Event Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Event:', 'text_domain' ),
		'all_items'             => __( 'All Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Event', 'text_domain' ),
		'edit_item'             => __( 'Edit Event', 'text_domain' ),
		'update_item'           => __( 'Update Event', 'text_domain' ),
		'view_item'             => __( 'View Event', 'text_domain' ),
		'view_items'            => __( 'View Events', 'text_domain' ),
		'search_items'          => __( 'Search Event', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'Event', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'editor', 'thumbnail', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tickets-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'geri_custom_post_type', 0 );


// event taxonomy
add_action( 'init', 'create_event_taxonomies', 0 );

function create_event_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Event Types', 'textdomain' ),
		'all_items'         => __( 'All Event Types', 'textdomain' ),				
		'edit_item'         => __( 'Edit Event Type', 'textdomain' ),
		'update_item'       => __( 'Update Event Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Event Type', 'textdomain' ),
		'new_item_name'     => __( 'New Event Type', 'textdomain' ),
		'menu_name'         => __( 'Event Type', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-type' ),
	);

	register_taxonomy( 'event-type', array( 'event' ), $args );	
}

add_action( 'init', 'create_event_status', 0 );

function create_event_status() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Status', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Event Status', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Event Statuses', 'textdomain' ),
		'all_items'         => __( 'All Event Statuses', 'textdomain' ),				
		'edit_item'         => __( 'Edit Event Status', 'textdomain' ),
		'update_item'       => __( 'Update Event Status', 'textdomain' ),
		'add_new_item'      => __( 'Add New Event Status', 'textdomain' ),
		'new_item_name'     => __( 'New Event Status', 'textdomain' ),
		'menu_name'         => __( 'Event Status', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-status' ),
	);

	register_taxonomy( 'event-status', array( 'event' ), $args );	
}
?>