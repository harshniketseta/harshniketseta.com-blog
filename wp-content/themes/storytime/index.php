<?php
/**
 * The main content template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
get_header(); ?>


<?php
		// Header group
		if ( is_home() &&  esc_attr(get_theme_mod( 'storytime_show_blog_title', false ) ) )  {
			storytime_blog_title();
		}
		
		if ( is_archive() || is_search()) {
			echo '<header class="archive-header">';
				the_archive_title( '<h1 class="archive-title">', '</h1>' ); 
				the_archive_description( '<div class="archive-description">', '</div>' ); 
			echo '</header>';
		}
		
		// Blog Content
		if ( have_posts() ) :
			
			$storytime_blog_layout = get_theme_mod( 'storytime_blog_layout', 'default' );	
				switch ( esc_attr($storytime_blog_layout ) ) {
				
				case "large":
					// large blog
					echo '<div id="blog-layout"><div class="blog-summary">';
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						endwhile;
					echo '</div></div>';
				break;	
				
				default:
					// default blog
					echo '<div id="blog-layout"><div class="blog-summary">';
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						endwhile;
					echo '</div>';	
						get_sidebar(); 
					echo '</div>';
				}
		
			storytime_blog_navigation();		
			
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; 
		?>

<?php
get_footer();
