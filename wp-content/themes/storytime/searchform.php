<?php
/**
 * This template displays the search form.
 * @package Storytime
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>



<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text">
            <?php echo esc_html_x( 'Search for:', 'label', 'storytime' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'storytime' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'storytime' ); ?>" />
    </label>
    <button type="submit" class="search-submit">
        <?php echo storytime_get_svg( 'search' ); // WPCS: XSS Ok. ?>
        <span class="screen-reader-text">
            <?php echo esc_html_x( 'Search', 'submit button', 'storytime' ); ?></span>
    </button>
</form>
