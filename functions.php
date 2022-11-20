
<?php

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
	] );
} )
?>