<?php
/**
 * Sample implementation of the Custom Header feature
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 * @package Storytime

 * Set up the WordPress core custom header feature.
 * @uses storytime_header_style()
 */
 
register_default_headers( array(
	'default-image' => array(
		'url'           => '%s/assets/images/splash.jpg',
		'thumbnail_url' => '%s/assets/images/splash-tn.jpg',
		'description'   => esc_html__( 'Default Header Image', 'storytime' ),
	),
) );

function storytime_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'storytime_custom_header_args', array(
		'header-text'           => false,
		'default-image'      => get_parent_theme_file_uri( '/assets/images/splash.jpg' ),
		'width'                  => 1600,
		'height'                 => 1000,
		'flex-width'            => true,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'storytime_custom_header_setup' );
