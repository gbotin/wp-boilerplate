<?php

if ( ! function_exists( 'setup' ) ) :

function setup() {
	load_theme_textdomain( 'template', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );

  set_post_thumbnail_size( 1200, 9999 );
}

endif;

add_action( 'after_setup_theme', 'setup' );

function register_menus() {
  register_nav_menus(
    array(
      'primary' => __('Principal', 'template'),
      'footer-top' => __('Haut de pied de page', 'template'),
      'footer-pos-1' => __('Pied de page - 1', 'template'),
      'footer-pos-2' => __('Pied de page - 2', 'template'),
      'footer-pos-3' => __('Pied de page - 3', 'template'),
      'footer-pos-4' => __('Pied de page - 4', 'template'),
    )
  );
}
add_action('init', 'register_menus');

// require get_template_directory() . '/inc/my-widget.php';
function register_widgets() {
	// register_widget('my_widget');

  register_sidebar(
    array(
      'id'            => 'sidebar',
      'name'          => __( 'Barre latérale', 'template' ),
      'description'   => __( 'Ajouter des widgets ici pour qu\'ils apparaîssent dans votre barre latérale.', 'template' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
    )
  );
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

require get_template_directory() . '/inc/paginator.php';
