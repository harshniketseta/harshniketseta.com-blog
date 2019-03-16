<?php
/**
 * The footer template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
?>

</main><!-- #main -->
</div> <!-- .site-content -->
</div><!-- #page -->

<?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>

<footer id="site-footer">
    <div id="footer-content">

        <h5 id="footer-site-title">
            <?php bloginfo( 'name' ); ?>
        </h5>
		
        <?php get_template_part( 'template-parts/sidebars/sidebar', 'footer' ); ?>
        <?php get_template_part( 'template-parts/navigation/nav', 'footer' ); ?>

        <div id="footer-copyright">
            <?php esc_html_e('Copyright &copy;', 'storytime'); ?>
            <?php echo date_i18n( __( 'Y', 'storytime' ) ); // WPCS: XSS OK ?>
            <span id="copyright-name">
                <?php echo esc_html(get_theme_mod( 'storytime_copyright' )); ?></span>.
            <?php esc_html_e('All rights reserved.', 'storytime'); ?>
        </div>


        <?php // If you enable the privacy policy page
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			echo '<div id="privacy-link">';
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			echo '</div>';
		}
		?>

    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>
