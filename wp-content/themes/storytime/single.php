<?php
/**
 * The single template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
get_header(); ?>



<div id="single-wrapper" class="container">
    <?php
	$storytime_single_layout = get_theme_mod( 'storytime_single_layout', 'single-right' );	
	
		switch ( esc_attr($storytime_single_layout ) ) {
			
		case "single-centered":
			// single centered no sidebar
			echo '<div id="single-layout">';
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', 'single' );			
						if( true == esc_attr(get_theme_mod( 'storytime_post_navigation' ) ) ) {
					}	
				endwhile;
			echo '</div>';		
			break;	
			
		default:
			// default	with sidebar
			echo '<div id="single-layout">';
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', 'single' );			
					if( true == esc_attr(get_theme_mod( 'storytime_post_navigation' ) ) ) {
					}	
					
				endwhile;
	
				get_sidebar(); 
			echo '</div>';	
		}	
		?>

</div>

<?php	
get_footer();
