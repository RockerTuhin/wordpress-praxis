<?php
	/*
	Plugin Name: Praxis Helper
	Author: Tuhin
	Version: 1.0
	Description: Here you will find the addons of Praxis theme
	*/

	require dirname(__FILE__).'/addons/title_section.php';
	require dirname(__FILE__).'/addons/small_title_section.php';
	require dirname(__FILE__).'/addons/progressbar_section.php';
	require dirname(__FILE__).'/addons/team_section.php';
	require dirname(__FILE__).'/addons/testimonial_section.php';
	require dirname(__FILE__).'/addons/news_section.php';
	require dirname(__FILE__).'/addons/hours_works_section.php';
	require dirname(__FILE__).'/addons/happy_clients_section.php';
	require dirname(__FILE__).'/addons/home_first_section.php';
	require dirname(__FILE__).'/addons/works_section.php';
	require dirname(__FILE__).'/addons/service_section.php';
	require dirname(__FILE__).'/addons/instagram_feeds_section.php';
	require dirname(__FILE__).'/addons/instagram.php';












add_action( 'init', 'praxis_work_init' );
/**
 * Register a work post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function praxis_work_init() {
	$labels = array(
		'name'               => _x( 'Works', 'post type general name', 'praxis' ),
		'singular_name'      => _x( 'Work', 'post type singular name', 'praxis' ),
		'menu_name'          => _x( 'Works', 'admin menu', 'praxis' ),
		'name_admin_bar'     => _x( 'Work', 'add new on admin bar', 'praxis' ),
		'add_new'            => _x( 'Add New', 'work', 'praxis' ),
		'add_new_item'       => __( 'Add New Work', 'praxis' ),
		'new_item'           => __( 'New Work', 'praxis' ),
		'edit_item'          => __( 'Edit Work', 'praxis' ),
		'view_item'          => __( 'View Work', 'praxis' ),
		'all_items'          => __( 'All Works', 'praxis' ),
		'search_items'       => __( 'Search Works', 'praxis' ),
		'parent_item_colon'  => __( 'Parent Works:', 'praxis' ),
		'not_found'          => __( 'No books found.', 'praxis' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'praxis' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'praxis' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'work' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'work', $args );
}





// hook into the init action and call praxis_work_taxonomies when it fires
add_action( 'init', 'praxis_work_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "work"
function praxis_work_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'praxis' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'praxis' ),
		'search_items'      => __( 'Search Categories', 'praxis' ),
		'all_items'         => __( 'All Categories', 'praxis' ),
		'parent_item'       => __( 'Parent Category', 'praxis' ),
		'parent_item_colon' => __( 'Parent Category:', 'praxis' ),
		'edit_item'         => __( 'Edit Category', 'praxis' ),
		'update_item'       => __( 'Update Category', 'praxis' ),
		'add_new_item'      => __( 'Add New Category', 'praxis' ),
		'new_item_name'     => __( 'New Category Name', 'praxis' ),
		'choose_from_most_used'      => __( 'Choose from the most used categories', 'textdomain' ),
		'update_count_callback' => '_update_post_term_count',
		'menu_name'         => __( 'Category', 'praxis' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'work_category' ),
	);

	register_taxonomy( 'work_category', array( 'work' ), $args );



	// Add new taxonomy, NOT hierarchical (like tags)
	// $labels = array(
	// 	'name'                       => _x( 'Writers', 'taxonomy general name', 'textdomain' ),
	// 	'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'textdomain' ),
	// 	'search_items'               => __( 'Search Writers', 'textdomain' ),
	// 	'popular_items'              => __( 'Popular Writers', 'textdomain' ),
	// 	'all_items'                  => __( 'All Writers', 'textdomain' ),
	// 	'parent_item'                => null,
	// 	'parent_item_colon'          => null,
	// 	'edit_item'                  => __( 'Edit Writer', 'textdomain' ),
	// 	'update_item'                => __( 'Update Writer', 'textdomain' ),
	// 	'add_new_item'               => __( 'Add New Writer', 'textdomain' ),
	// 	'new_item_name'              => __( 'New Writer Name', 'textdomain' ),
	// 	'separate_items_with_commas' => __( 'Separate writers with commas', 'textdomain' ),
	// 	'add_or_remove_items'        => __( 'Add or remove writers', 'textdomain' ),
	// 	'choose_from_most_used'      => __( 'Choose from the most used writers', 'textdomain' ),
	// 	'not_found'                  => __( 'No writers found.', 'textdomain' ),
	// 	'menu_name'                  => __( 'Writers', 'textdomain' ),
	// );

	// $args = array(
	// 	'hierarchical'          => false,
	// 	'labels'                => $labels,
	// 	'show_ui'               => true,
	// 	'show_admin_column'     => true,
	// 	'update_count_callback' => '_update_post_term_count',
	// 	'query_var'             => true,
	// 	'rewrite'               => array( 'slug' => 'writer' ),
	// );

	// register_taxonomy( 'writer', 'book', $args );
}

?>