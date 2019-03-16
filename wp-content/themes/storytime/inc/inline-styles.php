<?php
/**
 * Add inline styles to the head area
 * @package Storytime
*/
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

 // Dynamic styles
function storytime_inline_styles($storytime_customizer_css) {
	

// BEGIN CUSTOM CSS	

// site identity group
	$storytime_sitetitle_colour = esc_attr(get_theme_mod( 'storytime_sitetitle_colour', '#262626' ) );	
	$storytime_tagline_colour = esc_attr(get_theme_mod( 'storytime_tagline_colour', '#444' ) );
	$storytime_customizer_css .="#site-title a,#site-title a:visited,#site-title a:hover { color: $storytime_sitetitle_colour;	}
		#site-description { color: $storytime_tagline_colour;	}	";
	
// Colours
$storytime_line_colour = esc_attr(get_theme_mod( 'storytime_line_colour', '#dedede' ) );
$storytime_image_border = esc_attr(get_theme_mod( 'storytime_image_border', '#d8d2c5' ) );
$storytime_image_hborder = esc_attr(get_theme_mod( 'storytime_image_hborder', '#c3b496' ) );

$storytime_splash_button = esc_attr(get_theme_mod( 'storytime_splash_button', '#262626' ) );
$storytime_splash_button_text = esc_attr(get_theme_mod( 'storytime_splash_button_text', '#fff' ) );
$storytime_splash_hbutton = esc_attr(get_theme_mod( 'storytime_splash_hbutton', '#c3b496' ) );
$storytime_splash_hbutton_text = esc_attr(get_theme_mod( 'storytime_splash_hbutton_text', '#fff' ) );

$storytime_first_colour = esc_attr(get_theme_mod( 'storytime_first_colour', '#c7b897' ) );
$storytime_second_colour = esc_attr(get_theme_mod( 'storytime_third_colour', '#262626' ) );
$storytime_third_colour = esc_attr(get_theme_mod( 'storytime_fourth_colour', '#9a9a9a' ) );
$storytime_customizer_css .="

.hentry .post-thumbnail a img,
.page .post-thumbnail img,
.single .post-thumbnail img,
#author-info .avatar,
#related-posts .wp-post-image,
#attachment-wrapper img,
.storytime-thumbnail img,
#banner-sidebar img,
.rp-social-icons-list a,
.rp-social-icons-list a:visited,
#comments .comment .avatar {border-color: $storytime_image_border;}


.rp-social-icons-list a:hover {background-color: $storytime_image_border;}
.rp-social-icons-list li .icon {fill: $storytime_image_border;}

.hentry .post-thumbnail a img:hover,
#related-posts .wp-post-image:hover {border-color: $storytime_image_border;}

#splash-menu .splash-button a,
#splash-menu .splash-button a:visited {background-color: $storytime_splash_button; color: $storytime_splash_button_text; }
#splash-menu .splash-button a:hover {background-color: $storytime_splash_hbutton; color: $storytime_splash_hbutton_text; }

#site-branding:after,
hr.page-title-line,
#respond input[type=\"text\"],
#respond textarea,
span.page-wrap,
.widget-title,
.tagcloud a,
#author-info,
input[type=\"text\"],
input[type=\"password\"],
input[type=\"date\"],
input[type=\"datetime\"],
input[type=\"datetime-local\"],
input[type=\"month\"],
input[type=\"week\"],
input[type=\"email\"],
input[type=\"number\"],
input[type=\"search\"],
input[type=\"tel\"],
input[type=\"time\"],
input[type=\"url\"],
input[type=\"color\"],
textarea,
select {border-color: $storytime_line_colour;}

.entry-title:after,
.storytime-author-name:after,
#blog-sidebar li:after {background-color: $storytime_line_colour;} 

::-moz-selection {background-color: $storytime_first_colour;} 
::selection {background-color: $storytime_first_colour;}

#breadcrumbs-wrapper,
#top-bar {border-color: $storytime_first_colour;}
.has-accent-color {color: $storytime_first_colour;}
table thead,
.has-accent-background-color,
#top-search {background-color: $storytime_first_colour;}
#top-bar .icon:hover {fill: $storytime_first_colour;}

#site-title a,
#site-title a:visited,
#site-title a:hover,
#post-categories a, 
#post-categories a:visited, 
#post-tags a,
#post-tags a:visited,
.attachment .gallery-post-caption,
h1, h2, h3, h4, h5, h6,
a:hover,
.wp-block-image figcaption,
figcaption,
.wp-block-image figcaption,
.has-dark-grey-color,
#comments a,
.main-navigation-toggle {color: $storytime_second_colour;}

#top-bar,
.has-dark-grey-background-color,
.button,
.button:visited,
button,
button:visited,
input[type=\"submit\"],
input[type=\"submit\"]:visited,
input[type=\"reset\"],
input[type=\"reset\"]:visited,
.attachment-button a,
.attachment-button a:visited,
#infinite-handle span {background-color: $storytime_second_colour;}

.main-navigation-toggle .icon,
#footer-social-icons .social-icons-menu li a .icon {fill: $storytime_second_colour;}

.post-details,
.post-details a, 
.post-details a:visited,
.related-post-date,
#page-intro,
.has-grey-color {color: $storytime_third_colour;}

.has-grey-background-color {-background-color: $storytime_third_colour;}";


// Dropcap
	$storytime_dropcap_colour = esc_attr(get_theme_mod( 'storytime_dropcap_colour', '#444' ) );			
	$storytime_customizer_css .="p.has-drop-cap:not(:focus):first-letter { color: $storytime_dropcap_colour;	} ";
		
		
// END CUSTOM CSS - Output all the styles
wp_add_inline_style( 'storytime-stylesheet', $storytime_customizer_css );
	
}
add_action( 'wp_enqueue_scripts', 'storytime_inline_styles' );
