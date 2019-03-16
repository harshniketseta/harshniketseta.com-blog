<?php
/**
 * The header template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="top-search" class="clearfix">

        <div class="search-form-container">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php echo storytime_get_svg( 'search' ); // WPCS: XSS Ok.
	?>
                <input type="search" id="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'storytime' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'storytime' ); ?>" />
            </form>
        </div>
    </div>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">
            <?php esc_html_e( 'Skip to content', 'storytime' ); ?>
        </a>

        <div id="top-bar">
            <div id="social-menu-wrapper" class="clearfix">
                <?php if ( has_nav_menu( 'top-social' ) ) {
			// Display Social Icons Menu.
					get_template_part( 'template-parts/navigation/nav', 'top-social' );
			}
	?>
                <div class="search-icon-wrapper">
                    <?php echo storytime_get_svg( 'search' ); // WPCS: XSS Ok.
			?>
                </div>
            </div>
        </div>

        <?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>

        <div id="site-header">
            <div id="site-branding">
                <?php 
		if ( has_custom_logo() ) {
			the_custom_logo();
		}	
			if ( esc_attr(get_theme_mod( 'storytime_show_site_title', true ) ) ) {
				if ( is_front_page() ) { ?>
                <h1 id="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
                <?php
		} else {						
		?>
                <p id="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </p>
                <?php
				}
			}						
			$storytime_description = get_bloginfo( 'description', 'display' );
				if ( $storytime_description && esc_attr(get_theme_mod( 'storytime_show_site_description', true ) ) || is_customize_preview() )  { 
			?>
                <p id="site-description">
                    <?php echo $storytime_description; /* WPCS: xss ok. */ ?>
                </p>
                <?php 
			}				
		?>
            </div>
        </div>

        <?php get_template_part( 'template-parts/navigation/nav', 'primary' ); ?>

        <div id="content" class="site-content">
            <?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' ); ?>
            <main id="main" class="site-main wrap">
