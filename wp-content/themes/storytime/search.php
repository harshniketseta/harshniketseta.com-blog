<?php
/**
 * The template for displaying Search results.
 * @package Storytime
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<header class="page-header">
    <?php if ( have_posts() ) : ?>
    <h1 class="page-title">
        <?php printf( 
		/* translators: %s: Name of current post */
		esc_html__( 'Search Results for %s', 'storytime' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h1>
    <?php else : ?>
    <h1 class="page-title">
        <?php esc_html_e( 'Nothing Found', 'storytime' ); ?>
    </h1>
    <?php endif; ?>
</header><!-- .page-header -->

<div id="search-layout">


    <?php
		if ( have_posts() ) : ?>

    <div id="post-wrapper" class="post-wrapper">

        <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="post-content">
                <header class="entry-header">
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                </header>

                <div class="entry-content entry-excerpt clearfix">
                    <?php the_excerpt(); ?>
                </div>
            </div>

        </article>

        <?php endwhile; ?>

    </div>

    <?php
			storytime_blog_navigation();
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>


</div>

<?php
get_footer();
