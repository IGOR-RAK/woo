
<?php

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate


/*
* Creating a function to create our CPT
*/
  
function custom_post_type() {
  
	// Set UI labels for Custom Post Type
			$labels = array(
					'name'                => _x( 'Movies', 'Post Type General Name', 'twentytwentyone' ),
					'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentytwentyone' ),
					'menu_name'           => __( 'Movies', 'twentytwentyone' ),
					'parent_item_colon'   => __( 'Parent Movie', 'twentytwentyone' ),
					'all_items'           => __( 'All Movies', 'twentytwentyone' ),
					'view_item'           => __( 'View Movie', 'twentytwentyone' ),
					'add_new_item'        => __( 'Add New Movie', 'twentytwentyone' ),
					'add_new'             => __( 'Add New', 'twentytwentyone' ),
					'edit_item'           => __( 'Edit Movie', 'twentytwentyone' ),
					'update_item'         => __( 'Update Movie', 'twentytwentyone' ),
					'search_items'        => __( 'Search Movie', 'twentytwentyone' ),
					'not_found'           => __( 'Not Found', 'twentytwentyone' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
			);
				
	// Set other options for Custom Post Type
				
			$args = array(
					'label'               => __( 'movies', 'twentytwentyone' ),
					'description'         => __( 'Movie news and reviews', 'twentytwentyone' ),
					'labels'              => $labels,
					// Features this CPT supports in Post Editor
					'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
					// You can associate this CPT with a taxonomy or custom taxonomy. 
					'taxonomies'          => array( 'genres' ),
					/* A hierarchical CPT is like Pages and can have
					* Parent and child items. A non-hierarchical CPT
					* is like Posts.
					*/
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 5,
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
					'show_in_rest' => true,
		
			);
				
			// Registering your Custom Post Type
			register_post_type( 'movies', $args );
		
	}
		
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
		
	add_action( 'init', 'custom_post_type', 0 );

	add_action( 'init', 'custom_post_type_func' );
function custom_post_type_func() {
    //posttypename = services
$labels = array(
'name' => _x( 'Services', 'services' ),
'singular_name' => _x( 'services', 'services' ),
'add_new' => _x( 'Add New', 'services' ),
'add_new_item' => _x( 'Add New services', 'services' ),
'edit_item' => _x( 'Edit services', 'services' ),
'new_item' => _x( 'New services', 'services' ),
'view_item' => _x( 'View services', 'services' ),
'search_items' => _x( 'Search services', 'services' ),
'not_found' => _x( 'No services found', 'services' ),
'not_found_in_trash' => _x( 'No services found in Trash', 'services' ),
'parent_item_colon' => _x( 'Parent services:', 'services' ),
'menu_name' => _x( 'Services', 'services' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => true,
'description' => 'Hi, this is my custom post type.',
'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
'taxonomies' => array( 'category', 'post_tag', 'page-category' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);
register_post_type( 'services', $args );
}





add_action( 'wp_enqueue_scripts', function () {	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstarp', get_template_directory_uri() . '/inc/bootstrap.min.js', array('jquery'), 'null', true );
	wp_enqueue_style( 'bootstrap_css',get_template_directory_uri() . '/inc/bootstrap.min.css' , array(), '5.2.2', 'all');
	wp_enqueue_style( 'style', get_stylesheet_uri(  ), array(), filemtime( get_template_directory(  ) . '/style.css'),'all');

} 
);

add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'woo_main_menu' => 'Woo Main Menu',
		'woo_movies_menu' => 'Woo Movies Menu',
	] );
} )



?>


