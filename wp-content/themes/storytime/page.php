<?php
/**
 * The default page template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
get_header(); ?>


<div id="page-content">

    <?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/page/content', 'page' );
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile; ?>

</div>

<?php
get_footer();
