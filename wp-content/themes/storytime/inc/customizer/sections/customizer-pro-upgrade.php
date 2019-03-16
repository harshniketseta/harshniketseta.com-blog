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
function storytime_customize_register_upgrade_settings( $wp_customize ) {

// SECTION - UPGRADE
    $wp_customize->add_section( 'storytime_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'storytime' ),
        'priority'    => 0
    ) );
	
		$wp_customize->add_setting( 'storytime_upgrade_pro', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new Storytime_Customize_Static_Text_Control( $wp_customize, 'storytime_upgrade_pro', array(
			'label'	=> esc_html__('Get The Pro Version:','storytime'),
			'section'	=> 'storytime_upgrade',
			'description' => array('')
		) ) );	
		
}
add_action( 'customize_register', 'storytime_customize_register_upgrade_settings' );