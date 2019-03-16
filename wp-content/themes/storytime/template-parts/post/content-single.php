<?php
/**
 * Single post partial template.
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( false == esc_attr(get_theme_mod( 'storytime_show_single_image', false ) ) ) {
					storytime_post_thumbnail(); 
				}	
		?>
    <div class="post-content">

        <header class="entry-header post-entry-header">

            <?php  if (get_theme_mod( 'storytime_show_default_post_title_group', true ) ) {	
			
				the_title( '<h1 class="entry-title">', '</h1>' ); 			

				if ( false == esc_attr(get_theme_mod( 'storytime_show_single_meta', false ) ) ) {
					storytime_single_entry_meta();
				}
						
			} 
			?>

        </header>

        <div class="entry-content clearfix">
            <?php the_content(); 
            storytime_multipage_navigation();
            ?>

        </div>

        <footer class="entry-footer">

            <?php 
			
			if ( false == esc_attr(get_theme_mod( 'storytime_footer_categories', false ) ) ) {
				storytime_categories();
			}
			
			if ( false == esc_attr(get_theme_mod( 'storytime_footer_tags', false ) ) && has_tag() ) {
				echo '<p id="post-tags">', esc_html(storytime_entry_tags()), '</p>';
			}
			
			if ( false == esc_attr(get_theme_mod( 'storytime_display_author_bio', false ) ) ) {
				get_template_part( 'author-bio' ); 
			}		
			
			if ( false == esc_attr(get_theme_mod( 'storytime_post_navigation', false ) ) ) {
				storytime_post_navigation(); 
			}	

			?>

        </footer>

        <?php // If comments are open or we have at least one comment, load up the comment template.
			comments_template(); 
		?>

    </div>
</article>
