<?php 
/**
 * Register theme sidebars
 * @package Storytime
*/
  
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function storytime_widgets_init() {
	
	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'storytime' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar for your blog and archives.', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'storytime' ),
		'id' => 'right-sidebar',
		'description' => esc_html__( 'Right sidebar for your pages.', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'storytime' ),
		'id' => 'left-sidebar',
		'description' => esc_html__( 'Left sidebar for your pages.', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	

	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'storytime' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'storytime' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For adding breadcrumb navigation if using a plugin, or you can add content here.', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'storytime' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'storytime' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'storytime' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'storytime' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'storytime' ),
		'id' => 'footer',
		'description' => esc_html__( 'Footer position', 'storytime' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );	
	
}
add_action( 'widgets_init', 'storytime_widgets_init' );
