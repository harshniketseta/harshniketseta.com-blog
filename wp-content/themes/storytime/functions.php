<?php
/**
 * Theme functions main file
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Blogg only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'storytime_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 * Note that this function is hooked into the after_setup_theme hook, which runs before the init hook. 
	 * The init hook is too late for some features, such as indicating support for post thumbnails.
	 */
	function storytime_setup() {
		
		// Set the default content width.
		$GLOBALS['content_width'] = 1000;
		
		// Make theme available for translation.
		load_theme_textdomain( 'storytime', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Classic editor styles
		add_editor_style( array( 'assets/css/editor-style.css', storytime_fonts_url() ) );
		
		// Gutenberg align wide support
		add_theme_support( 'align-wide' );	

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1000, 600 ); 
		
		// Enable support for the blog large thumbnail crop
		if( esc_attr(get_theme_mod( 'storytime_crop_large_featured', false ) ) ) {
			add_image_size( 'storytime-large', 960, 575, true );
		}
		
		// Recent Posts widget thumbnail
		if( esc_attr(get_theme_mod( 'storytime_crop_recent', false ) ) ) {
		add_image_size( 'storytime-recent-thumbnail', 90, 120, true );
		}
		
		// Add excerpt support to pages
		add_post_type_support( 'page', 'excerpt' );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'storytime' ),
			'top-social'  => esc_html__( 'Top Social Icon Menu', 'storytime' ),
			'splash'  => esc_html__( 'Splash Menu', 'storytime' ),
			'footer'  => esc_html__( 'Footer Menu', 'storytime' ),
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'storytime_custom_background_args', array(
			'default-color' => 'f5f5f5',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'width'       => 200,
			'height'      => 80,
			'flex-width'  => true,
			'flex-height' => true,
		) );	
		
		// Add styles to post editor
		add_editor_style( array( 'editor-style.css', storytime_fonts_url() ) );		
	}
endif;

add_action( 'after_setup_theme', 'storytime_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function storytime_content_width() {
	$content_width = $GLOBALS['content_width'];
	// Check if the page has a sidebar.
	if ( is_active_sidebar( 'left-sidebar'  ) || is_active_sidebar( 'right-sidebar' ) || is_active_sidebar( 'blog-sidebar' ) ) {
		$content_width = 700;
	}	
  $GLOBALS['content_width'] = apply_filters( 'storytime_content_width', $content_width );
}
add_action( 'template_redirect', 'storytime_content_width', 0 );

/**
 * Enqueue admin scripts and styles
 */
function storytime_admin_scripts( $hook ) {
	if ( 'post.php' != $hook ) {
        return;
	}
	
/**
* Load editor fonts from Google
*/
wp_enqueue_style( 'storytime-admin-fonts', storytime_fonts_url(), array(), null );

}
add_action( 'admin_enqueue_scripts', 'storytime_admin_scripts', 5 );


/**
 * Register Google fonts
 * You can disable from the customizer if you want different fonts.
 * @return string Google fonts URL for the theme.
 */
	 
if ( ! function_exists( 'storytime_fonts_url' ) ) :

	function storytime_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by the Domine font, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Domine', 'storytime' ) ) {
			$fonts[] = 'Domine:400,700';
		}
		
		/* translators: If there are characters in your language that are not supported by the Raleway font, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Raleway', 'storytime' ) ) {
			$fonts[] = 'Raleway:400';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				), 'https://fonts.googleapis.com/css'
			);
		}

		return esc_url_raw( $fonts_url );
	}
endif;


// Add preconnect for Google Fonts.

function storytime_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'storytime-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}	
		return $urls;
}
add_filter( 'wp_resource_hints', 'storytime_resource_hints', 10, 2 );


// Enqueue scripts and styles.
function storytime_scripts() {
	
	// Enable or Disable Google default fonts
	if( esc_attr(get_theme_mod( 'storytime_default_google_fonts', true ) ) ) {
		wp_enqueue_style( 'storytime-fonts', storytime_fonts_url(), array(), null );
	}

	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap-reboot', get_theme_file_uri( '/assets/css/bootstrap-reboot.css' ), null, 'screen' );	
	
	// Theme CSS
	wp_enqueue_style( 'storytime-stylesheet', get_stylesheet_uri(), array(), null );
	
	// Theme scripts
	wp_enqueue_script( 'storytime-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array( 'jquery' ), null, true );
	// Main Menu
	wp_enqueue_script( 'storytime-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), null, true );	
		wp_localize_script( 'storytime-navigation', 'storytime_menu_title', storytime_get_svg( 'menu' ) . esc_html__( 'Menu', 'storytime' ) );
		
	// Skip Link
	wp_enqueue_script( 'storytime-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), null, true );
	
	// Comments script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'storytime_scripts' );


/**
 * Add pingback url on single posts
 */
function storytime_pingback_url() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'storytime_pingback_url' );


 /*--------------------------------------------------------
 Enqueue Gutenberg editor styles
 -------------------------------------------------------*/
function storytime_gutenberg_editor_styles() { 
	wp_enqueue_style( 'storytime-gutenberg-editor-styles', get_template_directory_uri() . '/assets/css/gutenberg-editor.css'); 
}
// only name the function and leave the enqueue as enqueue_block_editor_assets
add_action( 'enqueue_block_editor_assets', 'storytime_gutenberg_editor_styles' );

if ( ! function_exists( 'storytime_add_gutenberg_features' ) ) {
	function storytime_add_gutenberg_features() {
		
		/* Gutenberg Colour Palette */
		$accent_color = get_theme_mod( 'storytime_accent_colour' ) ? get_theme_mod( 'storytime_accent_colour' ) : '#c7b897';

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Accent', 'Name of the accent color in the Gutenberg palette', 'storytime' ),
				'slug' 	=> 'accent',
				'color' => esc_attr($accent_color),
			),
			array(
				'name' 	=> _x( 'Beige', 'Name of the beige color in the Gutenberg palette', 'storytime' ),
				'slug' 	=> 'beige',
				'color' => '#c7b897',
			),			
			array(
				'name' 	=> _x( 'Dark Grey', 'Name of the dark grey color in the Gutenberg palette', 'storytime' ),
				'slug' 	=> 'dark-grey',
				'color' => '#262626',
			),

			array(
				'name' 	=> _x( 'Grey', 'Name of the grey color in the Gutenberg palette', 'storytime' ),
				'slug' 	=> 'grey',
				'color' => '#9a9a9a',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'storytime' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );
		
		/* Gutenberg Font Sizes */

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'storytime' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'storytime' ),
				'size' 		=> 16,
				'slug' 		=> 'small'
			),
			array(
				'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'storytime' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the Gutenberg editor.', 'storytime' ),
				'size' 		=> 19,
				'slug' 		=> 'regular'
			),
			array(
				'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'storytime' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'storytime' ),
				'size' 		=> 24,
				'slug' 		=> 'large'
			),
			array(
				'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'storytime' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'storytime' ),
				'size' 		=> 32,
				'slug' 		=> 'larger'
			)
		) );		
	
		}
	add_action( 'after_setup_theme', 'storytime_add_gutenberg_features' );

}


// SVG Icons
require get_template_directory() . '/inc/icons.php';

// recent posts widget
require get_template_directory() . '/inc/recent-posts-widget.php';

// Include Template Functions.
require get_parent_theme_file_path( '/inc/custom-header.php' );
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/inline-styles.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/sidebars.php';

// CUSTOMIZER
require( get_template_directory() . '/inc/customizer/sanitize-functions.php' );
require( get_template_directory() . '/inc/customizer/controls/headline-control.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-basic.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-blog.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-thumbnails.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-colours.php' );
require( get_template_directory() . '/inc/customizer/controls/upgrade-control.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-pro-upgrade.php' );


// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
