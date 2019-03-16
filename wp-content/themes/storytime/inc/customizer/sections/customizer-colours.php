<?php
/**
 * Layout Settings
 *
 * Register Layout section, settings and controls for Theme Customizer
 *
 * @package Storytime
 */

/**
 * Adds all layout settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function storytime_customize_register_colour_settings( $wp_customize ) {

// Site Title Colour
 	$wp_customize->add_setting( 'storytime_sitetitle_colour', array(
		'default'        => '#262626',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_sitetitle_colour', array(
		'label'   => esc_html__( 'Site Title Colour', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_sitetitle_colour',
	) ) );	
	
// Site tagline Colour
 	$wp_customize->add_setting( 'storytime_tagline_colour', array(
		'default'        => '#444',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_tagline_colour', array(
		'label'   => esc_html__( 'Site Tagline  Colour', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_tagline_colour',
	) ) );	
	
// Accent Colour 
 	$wp_customize->add_setting( 'storytime_accent_colour', array(
		'default'        => '#c7b897',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_accent_colour', array(
		'label'   => esc_html__( 'Gutenberg Accent Colour', 'storytime' ),
		'description'   => esc_html__( 'This is your accent colour when using the Gutenberg editor.', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_accent_colour',
	) ) );		

// Primary Colour
 	$wp_customize->add_setting( 'storytime_first_colour', array(
		'default'        => '#c7b897',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_first_colour', array(
		'label'   => esc_html__( 'First Colour', 'storytime' ),
		'description'   => esc_html__( 'This is the beige colour.', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_first_colour',
	) ) );		

// Second Colour
 	$wp_customize->add_setting( 'storytime_third_colour', array(
		'default'        => '#262626',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_third_colour', array(
		'label'   => esc_html__( 'Third Colour', 'storytime' ),
		'description'   => esc_html__( 'This is a dark grey colour; used mostly for headings, titles, and buttons.', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_third_colour',
	) ) );		

// Third Colour
 	$wp_customize->add_setting( 'storytime_fourth_colour', array(
		'default'        => '#9a9a9a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_fourth_colour', array(
		'label'   => esc_html__( 'Fourth Colour', 'storytime' ),
		'description'   => esc_html__( 'This is a medium grey colour; used mostly for secondary text like meta post info.', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_fourth_colour',
	) ) );		

// border and line Colours
 	$wp_customize->add_setting( 'storytime_line_colour', array(
		'default'        => '#dedede',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_line_colour', array(
		'label'   => esc_html__( 'Border and Line  Colours', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_line_colour',
	) ) );	
	
// image borders
 	$wp_customize->add_setting( 'storytime_image_border', array(
		'default'        => '#d8d2c5',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_image_border', array(
		'label'   => esc_html__( 'Image Border', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_image_border',
	) ) );	

// image hover borders
 	$wp_customize->add_setting( 'storytime_image_hborder', array(
		'default'        => '#c3b496',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_image_hborder', array(
		'label'   => esc_html__( 'Image Hover Border', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_image_hborder',
	) ) );		
	
// Dropcap Colour
 	$wp_customize->add_setting( 'storytime_dropcap_colour', array(
		'default'        => '#444',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_dropcap_colour', array(
		'label'   => esc_html__( 'For the Gutenberg editor Drop Cap', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_dropcap_colour',
	) ) );		

	
// splash page button
 	$wp_customize->add_setting( 'storytime_splash_button', array(
		'default'        => '#262626',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_splash_button', array(
		'label'   => esc_html__( 'Splash Page Button', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_splash_button',
	) ) );		
	
// splash page button text
 	$wp_customize->add_setting( 'storytime_splash_button_text', array(
		'default'        => '#fff',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_splash_button_text', array(
		'label'   => esc_html__( 'Splash Page Button Text', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_splash_button_text',
	) ) );	

// splash page button hover
 	$wp_customize->add_setting( 'storytime_splash_hbutton', array(
		'default'        => '#c3b496',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_splash_hbutton', array(
		'label'   => esc_html__( 'Splash Page Button Text', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_splash_hbutton',
	) ) );	

// splash page button hover text
 	$wp_customize->add_setting( 'storytime_splash_hbutton_text', array(
		'default'        => '#fff',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytime_splash_hbutton_text', array(
		'label'   => esc_html__( 'Splash Page Button Hover Text', 'storytime' ),
		'section' => 'colors',
		'settings'   => 'storytime_splash_hbutton_text',
	) ) );	

	
}
add_action( 'customize_register', 'storytime_customize_register_colour_settings' );
