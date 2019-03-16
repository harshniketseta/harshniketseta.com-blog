<?php
/**
 * Basic Settings
 *
 * Register Basic Settings section, settings and controls for Theme Customizer
 *
 * @package Storytime
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function storytime_customize_register_basic_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'storytime_section_basic', array(
		'title'    => esc_html__( 'Basic Settings', 'storytime' ),
		'priority' => 8,
		'panel' => 'storytime_options_panel',
	) );
	 
	// Add a copyright setting and control.
	$wp_customize->add_setting( 'storytime_copyright', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'storytime_copyright', array(
		'label'    => esc_html__( 'Copyright Name', 'storytime' ),
		'section'  => 'storytime_section_basic',
		'type'     => 'text',
	) );

	
	// Add Gallery Comments Headline.
	$wp_customize->add_control( new Storytime_Customize_Header_Control(
		$wp_customize, 'storytime_theme_options[basic_options]', array(
			'label' => esc_html__( 'WP Gallery Options', 'storytime' ),
			'section' => 'storytime_section_basic',
			'settings' => array(),
		)
	) );
	
	// Add Setting and Control for showing post date.
	$wp_customize->add_setting( 'storytime_attachment_comments', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'storytime_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'storytime_attachment_comments', array(
		'label'    => esc_html__( 'Enable Gallery View Comments', 'storytime' ),
		'section'  => 'storytime_section_basic',
		'type'     => 'checkbox',
	) );
	
	// Add Google Fonts Headline.
	$wp_customize->add_control( new Storytime_Customize_Header_Control(
		$wp_customize, 'storytime_google_fonts_option]', array(
			'label' => esc_html__( 'Default Google Fonts', 'storytime' ),
			'section' => 'storytime_section_basic',
			'settings' => array(),
		)
	) );

	// Enable Default Google Fonts
	$wp_customize->add_setting( 'storytime_default_google_fonts', array(
		'default'           => true,
		'description' => esc_html__( 'This theme has a couple Google Fonts included. If you choose to use a plugin for different fonts, you can disable them.', 'storytime' ),
		'sanitize_callback' => 'storytime_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'storytime_default_google_fonts', array(
		'label'    => esc_html__( 'Enable the Default Google Fonts', 'storytime' ),
		'section'  => 'storytime_section_basic',
		'type'     => 'checkbox',
	) );	
	
}
add_action( 'customize_register', 'storytime_customize_register_basic_settings' );
