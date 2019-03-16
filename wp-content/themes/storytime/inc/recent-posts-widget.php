<?php
/**
 * Recent posts widget
 * Get recent posts and display in widget
 * @package Storytime
 */

/**
 * Recent posts class.
 */
class Storytime_Recent_Posts_Widget extends WP_Widget {
	/**
	 * Default widget options.
	 * @var array
	 */
	protected $defaults;

	/**
	 * Widget setup.
	 */ 
	public function __construct() {
		$this->defaults = array(
			'title'     => esc_html__( 'Storytime Recent Posts', 'storytime' ),
			'number'    => 3,
			'show_date' => true,
		);
		parent::__construct(
			'storytime_recent_posts',
			esc_html__( 'Storytime Recent Posts', 'storytime' ),
			array(
				'description' => esc_html__( 'A widget that displays your recent posts from all categories or a category with thumbnails.', 'storytime' ),
			)
		);
	}

	/**
	 * How to display the widget on the screen.
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		$query    = new WP_Query( array(
			'posts_per_page'      => absint( $instance['number'] ),
			'ignore_sticky_posts' => true,
		) );
		if ( ! $query->have_posts() ) {
			return;
		}

		echo $args['before_widget']; // WPCS: XSS OK.

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		if ( $title ) {
			echo $args['before_title'], $title, $args['after_title']; // WPCS: XSS OK.
		}
		?>
<ul class="storytime-recent-posts-widget clearfix">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <li class="storytime-item">

        <?php if ( has_post_thumbnail() ) : ?>
        <figure class="storytime-thumbnail">
            <a class="storytime-image-link" href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>">
                <?php the_post_thumbnail( 'storytime-recent-thumbnail' ); ?>
            </a>
        </figure>

        <?php else: ?>
        <figure class="storytime-thumbnail">
            <a class="storytime-image" href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image-recent-replacement.png" alt="<?php esc_attr_e( 'No Image', 'storytime');?>" />
            </a>
        </figure>

        <?php endif; ?>

        <div class="storytime-content">
            <h4 class="storytime-title">
                <a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php esc_attr( the_title_attribute() ); ?>">
                    <?php the_title(); ?></a>
            </h4>
            <div class="storytime-post-date">
                <?php echo get_the_date(); ?>
            </div>
        </div>

    </li>

    <?php endwhile; ?>
</ul>

<?php
		wp_reset_postdata();

		echo $args['after_widget']; // WPCS: XSS OK.
	}

	/**
	 * Update the widget settings.
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = absint( $new_instance['number'] );

		return $instance;
	}

	/**
	 * Widget form.
	 * @param array $instance Widget instance.
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults ); ?>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
        <?php esc_html_e( 'Title:', 'storytime' ); ?></label>
    <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
</p>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
        <?php esc_html_e( 'Number of posts to show:', 'storytime' ); ?></label>
    <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo absint( $instance['number'] ); ?>" size="3">
</p>
<?php
	}
}


	// Register recent posts widget
	register_widget( 'Storytime_Recent_Posts_Widget' );
