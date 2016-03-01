<?php

if ( ! function_exists( 'setup' ) ) :

function setup() {
	load_theme_textdomain( 'template', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
}

endif;

add_action( 'after_setup_theme', 'setup' );


function register_menus() {
  register_nav_menus(
    array(
        'navigation' => __('Navigation')
    )
  );
}
add_action('init', 'register_menus');


// require get_template_directory() . '/inc/my-widget.php';
function register_widgets() {
	// register_widget('my_widget');
}
add_action( 'widgets_init', 'register_widgets' );

function scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/dist/css/main.css', array() );
	wp_enqueue_script( 'application', get_template_directory_uri() . '/dist/js/application.js', array());
}
add_action( 'wp_enqueue_scripts', 'scripts' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

require get_template_directory() . '/inc/customizer.php';
