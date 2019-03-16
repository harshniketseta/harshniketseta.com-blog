<?php
/**
 * Upgrade Control for the Customizer
 * @package Storytime
 */

 /**
 * Control type.
 * For Upsell content in the customizer
 */
if ( ! class_exists( 'Storytime_Customize_Static_Text_Control' ) ) {
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
		class Storytime_Customize_Static_Text_Control extends WP_Customize_Control {
		public $type = 'static-text';
		public function esc_html__construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		protected function render_content() {
			if ( ! empty( $this->label ) ) :
				?><span class="storytime-customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
			if ( ! empty( $this->description ) ) :
				?><div class="storytime-description storytime-customize-control-description"><?php

				if( is_array( $this->description ) ) {
					echo '<p>' . implode( '</p><p>', wp_kses_post( $this->description )) . '</p>';
					
				} else {
					echo wp_kses_post( $this->description );
				}
				?>
							
			<h1><?php esc_html_e('Storytime', 'storytime') ?></h1>
			<p><?php esc_html_e('Opt in for the pro version of Storytime and enjoy many additional features that will add more options. Here is a sample of some of the premium features with the Pro version of Storytime:','storytime'); ?></p>
			<p class="rp-discount"><?php esc_html_e('Get a $10 Discount with code: RPSAVE10', 'storytime') ?></p>
			<p class="rp-pro-title"><?php esc_html_e('Pro Features:', 'storytime') ?></p>
			<ul class="rp-pro-list">
				<li><?php esc_html_e('&bull; 5 Blog Styles', 'storytime')?></li>
				<li><?php esc_html_e('&bull; 10 Dynamic Sidebar Positions', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Add Multiple Splash Page Images', 'storytime')?></li>
				<li><?php esc_html_e('&bull; 3 Full Post Layouts', 'storytime')?></li>
				<li><?php esc_html_e('&bull; 5 Menu Locations', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Recent Posts Widget w/thumbnails', 'storytime')?></li>				
				<li><?php esc_html_e('&bull; An About Me Widget', 'storytime')?></li>
				<li><?php esc_html_e('&bull; A Social Links Widget', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Customize the Read More Button Text', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Custom Styled Archive Titles', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Custom Styled WordPress Login Page', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Add a Custom Blog Title with Introduction', 'storytime')?></li>
				<li><?php esc_html_e('&bull; We Made the Customizer Look Better', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Show or Hide the Featured Post Label', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Premium Support', 'storytime')?></li>
			</ul>
			
			<p><a class="rp-get-pro button" href="<?php echo esc_url('https://www.roughpixels.com/storytime/'); ?>" target="_blank"><?php esc_html_e( 'Get the Pro', 'storytime' ); ?></a></p>				
			<?php
			endif;
		}
	}
}