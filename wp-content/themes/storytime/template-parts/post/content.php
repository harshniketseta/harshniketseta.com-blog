<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php $storytime_blog_layout = get_theme_mod( 'storytime_blog_layout', 'default' );	
		switch ( esc_attr($storytime_blog_layout ) ) {
		
		case "large":
			// large
			echo '<article id="post-', the_ID(), '"', esc_attr(post_class()), '>';
			if ( false == esc_attr(get_theme_mod( 'storytime_show_summary_image', false ) ) ) {
				storytime_post_thumbnail();
			}	
			echo '<div class="entry-content"><header class="entry-header">';
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2></header>' );
								
					// default summary or excerpt
					$storytime_blog_content = get_theme_mod( 'storytime_blog_content', 'excerpt' );
					if ( 'excerpt' === $storytime_blog_content ) {
						the_excerpt();				
					} else {				
						the_content( esc_html( get_theme_mod( 'storytime_read_more_text' ) ) );
					}	
                storytime_multipage_navigation();
			if ( false == esc_attr(get_theme_mod( 'storytime_show_summary_meta', false ) ) ) {
				storytime_entry_meta();
			}		
				
			echo '</div></article>';		
			break;	
			
		default:
			// default blog
			echo '<article id="post-', the_ID(), '"', esc_attr(post_class()), '>';
			if ( false == esc_attr(get_theme_mod( 'storytime_show_summary_image', false ) ) ) {
				storytime_post_thumbnail();
			}		
			echo '<div class="entry-content"><header class="entry-header">';
			
			if ( false == esc_attr(get_theme_mod( 'storytime_show_featured_label', false ) ) ) {
			storytime_sticky_entry_post();
			}
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2></header>' );						
				
				
					// default summary or excerpt
					$storytime_blog_content = get_theme_mod( 'storytime_blog_content', 'excerpt' );
					if ( 'excerpt' === $storytime_blog_content ) {
						the_excerpt();				
					} else {				
						the_content( sprintf(
						/* translators: %s: Name of current post */
						__( 'Continue Reading<span class="screen-reader-text"> "%s"</span>', 'storytime' ),
						get_the_title()
					) );
					}	
                
                storytime_multipage_navigation();
					
			if ( false == esc_attr(get_theme_mod( 'storytime_show_summary_meta', false ) ) ) {
				storytime_entry_meta();
			}

			echo '</div></article>';
		}
	?>
