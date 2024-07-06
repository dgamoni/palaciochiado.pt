<?php 

function create_post_type() {

	register_post_type( 'restaurant',
		array(
			'labels' => array(
				'name' => __( 'Restaurants' ),
				'singular_name' => __( 'Restaurant' ),
				'add_new' => __( 'New Restaurant' ),
				'add_new_item' => 'Add New Restaurant',
				'edit_item'	=> 'Edit Restaurant'
			),
			'public' => true,
			'has_archive' => true,
			'query_var' => true,
			//'rewrite' => array('slug' => 'restaurantes'),
			'supports' => array('title', 'editor')
		)
	);

	register_post_type( 'bar',
		array(
			'labels' => array(
				'name' => __( 'Bars' ),
				'singular_name' => __( 'Bar' ),
				'add_new' => __( 'New Bar' ),
				'add_new_item' => 'Add New Bar',
				'edit_item'	=> 'Edit Bar'
			),
			'public' => true,
			'has_archive' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
			//'rewrite' => array('slug' => 'restaurantes'),
			'supports' => array('title', 'editor')
		)
	);

	register_post_type( 'event',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
				'add_new' => __( 'New Event' ),
				'add_new_item' => 'Add New Event',
				'edit_item'	=> 'Edit Event'
			),
			'public' => true,
			'has_archive' => true,
			'query_var' => true,
			'supports' => array('title', 'editor')
		)
	);

}	
add_action( 'init', 'create_post_type' );

function createCustomTaxonomies(){
	register_taxonomy(
		'venue_tag',
		array('restaurant', 'bar'),
		array(
			'labels'						=> array(
				'name'						=> 'Restaurant Tags',
				'singular_name' 	=> 'Restaurant Tag',
				'add_new' 				=> 'New Item',
				'add_new_item' 		=> 'Add New Item'),
			'sort'							=> true,
			'args' 							=> array( 'orderby' => 'term_order' ),
			'hierarchical'			=> false,
			'rewrite'           => array( 'slug' => 'restaurant' )
			)
	);
}
add_action( 'init', 'createCustomTaxonomies' );
?>