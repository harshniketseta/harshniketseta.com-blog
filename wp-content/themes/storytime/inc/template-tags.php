<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Displays the date and author of a post summary
 */
if ( ! function_exists( 'storytime_entry_meta' ) ) :

	function storytime_entry_meta() {

		echo '<ul class="post-details">' ;	

			if ( false == esc_attr(get_theme_mod( 'storytime_show_summary_author', false ) ) ) {
				storytime_posted_by();
			}		
			if ( false == esc_attr(get_theme_mod( 'storytime_show_summary_date', false ) ) ) {
				storytime_posted_on();
			}					
			if ( false == esc_attr(get_theme_mod( 'storytime_show_summary_comments', false ) ) ) {
				storytime_comment_count();
			}	
			if ( false == esc_attr(get_theme_mod( 'storytime_show_edit', false ) ) ) {
				storytime_edit_link();
			}	

		echo '</ul>';
	}
endif;

/**
 * Displays the date and author of a full post
 */
if ( ! function_exists( 'storytime_single_entry_meta' ) ) :

	function storytime_single_entry_meta() {

		echo '<ul class="post-details">' ;	
		
			if ( false == esc_attr(get_theme_mod( 'storytime_show_single_author', false ) ) ) {
				storytime_posted_by();
			}		
			if ( false == esc_attr(get_theme_mod( 'storytime_show_single_date', false ) ) ) {
				storytime_posted_on();
			}					
			if ( false == esc_attr(get_theme_mod( 'storytime_show_single_comments', false ) ) ) {
				storytime_comment_count();
			}	
			if ( false == esc_attr(get_theme_mod( 'storytime_show_edit', false ) ) ) {
				storytime_edit_link();
			}
			
		echo '</ul>';
	}
endif;


if ( ! function_exists( 'storytime_posted_on' ) ) :
	// Returns the post date
	function storytime_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		
		$posted_on = sprintf(
			/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'storytime' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

		echo '<li class="posted-on meta-date">' . $posted_on . '</li>'; // WPCS: XSS OK.	
	}
endif;

if ( ! function_exists( 'storytime_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function storytime_posted_by() {
		printf(
			'<li class="byline"><span class="postauthor">%1$s </span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></li>',
			esc_html__( 'by', 'storytime' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'storytime_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function storytime_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="comments-link">';
			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'storytime' ), get_the_title() ) );

			echo '</li>';
		}
	}
endif;

if ( ! function_exists( 'storytime_edit_link' ) ) :
	function storytime_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text">%s</span>', 'storytime' ),
				get_the_title()
			),
			'<li class="edit-link">',
			'</li>'
		);
	}
	
endif;

if ( ! function_exists( 'storytime_sticky_entry_post' ) ) :
	// Returns the sticky label
	function storytime_sticky_entry_post() {         
				if ( is_sticky() && ! is_paged() ) { 
					echo '<div class="featured-label">', esc_html_e('Featured', 'storytime'), '</div>';
				}
	}
endif;

if ( ! function_exists( 'storytime_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function storytime_post_thumbnail() {
		
		if ( is_singular() ) :
			?>

<figure class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
</figure><!-- .post-thumbnail -->

<?php
		else :
			$post_thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' );
			?>

<figure class="post-thumbnail">

    <a class="wp-post-image-link" href="<?php the_permalink(); ?>" rel="bookmark">

        <?php 
				// Set the post thumbnail based on the blog layout and active cropped thumbnail setting
				$storytime_blog_layout = get_theme_mod( 'storytime_blog_layout', 'default' );	
				switch ( esc_attr($storytime_blog_layout ) ) {
								
				case "large":
					// large thumbnail
					the_post_thumbnail( 'storytime-large', array(
						'alt' => the_title_attribute(
							array( 'echo' => false )
						),
					)  	
				);	
				break;

				default:
					the_post_thumbnail( 'post-thumbnails', array(
						'alt' => the_title_attribute(
							array( 'echo' => false )
						),
					)  	
				);
				}
				?>
    </a>

</figure>

<?php
		endif; // End is_singular().
	}
endif;


// Get the full category list for a post
if ( ! function_exists( 'storytime_categories' ) ) :
function storytime_categories() {
	echo '<p id="post-categories">', esc_html_e( 'Categories: ', 'storytime' ) .  the_category(' &bull; ') .'</p>';
	}
endif;

/**
 * Displays the post tags on single post view
 */
if ( ! function_exists( 'storytime_entry_tags' ) ) :
	function storytime_entry_tags() {	 
	 echo get_the_tag_list( sprintf( // WPCS: XSS OK.
	 /* translators: %s: tag item */
	 '<span>%s: ', __( 'Tags: ', 'storytime' ) ), ' &bull; ', '</span>' );	
	}
endif;

/**
 * Custom comment output
 */
if ( !function_exists( 'storytime_comment' ) ) {

	function storytime_comment( $comment, $args, $depth ) {  ?>

<li <?php comment_class(); ?> id="comment-
    <?php comment_ID() ?>">
    <article class="clearfix media" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
        <?php echo get_avatar( $comment, 90 ); ?>
        <div class="media-body">
            <div class="comment-author">
                <p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
                    <cite class="fn" itemprop="name">
                        <?php comment_author_link(); ?></cite>
                    <time itemprop="commentTime" datetime="<?php comment_time( 'c' ); ?>">
                        <?php echo get_comment_date(); ?>
                    </time>
                </p>
            </div>

            <div class="comment-content" itemprop="commentText">
                <?php comment_text() ?>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p><em class="awaiting">
                        <?php esc_html_e( 'Your comment is awaiting moderation.', 'storytime' ) ?></em></p>
                <?php endif; ?>
            </div>
            <div class="comment-reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                <?php edit_comment_link( __( 'Edit', 'storytime'), ' &middot; ', '' ) ?>
            </div>
        </div>
    </article>
</li>

<?php }
}



/**
 * Displays pagination on the blog and archive pages
 */
if ( ! function_exists( 'storytime_blog_navigation' ) ) :

	function storytime_blog_navigation() {

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '<span class="nav-arrow">&laquo</span><span class="screen-reader-text">' . esc_html_x( 'Previous Posts', 'pagination', 'storytime' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Posts', 'pagination', 'storytime' ) . '</span><span class="nav-arrow">&raquo;</span>',
		) );
	}
endif;

/**
 * Displays Single Post Navigation
 */
if ( ! function_exists( 'storytime_post_navigation' ) ) :

	function storytime_post_navigation() {

			the_post_navigation( array(
				'prev_text' => '<span class="nav-link-text">' . esc_html_x( 'Previous Post', 'post navigation', 'storytime' ) . '</span><h5 class="nav-entry-title">%title</h5>',
				'next_text' => '<span class="nav-link-text">' . esc_html_x( 'Next Post', 'post navigation', 'storytime' ) . '</span><h5 class="nav-entry-title">%title</h5>',
			) );
	}
endif;

/**
 * Displays Multi-page Navigation
 */
if ( ! function_exists( 'storytime_multipage_navigation' ) ) :

	function storytime_multipage_navigation() {
		wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'storytime' ),
		'after'  => '</div>',
		'link_before' => '<span class="page-wrap">',
		'link_after' => '</span>',
		) ); 
	}
endif;
