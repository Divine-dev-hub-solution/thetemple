<?php
/**
 * Widget API: WP_Widget_Recent_Philosophy class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Recent Philosophy widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Sigma_Widget_Recent_Philosophy extends WP_Widget {
	/**
	 * Sets up a new Recent Philosophy widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_sigma_recent_philosophy',
			'description'                 => __( 'Your site&#8217;s most recent philosophy.', 'sigma-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'sigma-recent-philosophy', __( 'Sigma Recent Philosophy', 'sigma-core' ), $widget_ops );
		$this->alt_option_name = 'widget_sigma_recent_philosophy';
	}
	/**
	 * Outputs the content for the current Recent Philosophy widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Philosophy widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Philosophy', 'sigma-core' );
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
    $show_btn  = isset( $instance['show_btn'] ) ? $instance['show_btn'] : false;
		/**
		 * Filters the arguments for the Recent Philosophy widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent philosophy.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query(
			apply_filters(
				'sigma_widget_philosophy_args',
				array(
          'post_type'           => 'philosophy',
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);
		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
		<ul>
			<?php foreach ( $r->posts as $recent_philosophy ) : ?>
				<?php
				$post_title   = get_the_title( $recent_philosophy->ID );
				$title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', 'sigma-core' );
				$aria_current = '';
				if ( get_queried_object_id() === $recent_philosophy->ID ) {
					$aria_current = ' aria-current="page"';
				}

        $philosophy_details = get_post_meta( $recent_philosophy->ID, 'sigma_philosophy_details', true );
        $philosophy_start_date = isset($philosophy_details['sigma_philosophy_start_date']) ? $philosophy_details['sigma_philosophy_start_date'] : '';
        $philosophy_start_time = isset($philosophy_details['sigma_philosophy_start_time']) ? $philosophy_details['sigma_philosophy_start_time'] : '';
				?>
        <li>
          <?php if(!empty($philosophy_start_date)) {
            $philosophy_datestamp = strtotime($philosophy_start_date);
            $philosophy_date = new DateTime();
            $philosophy_date->setTimestamp( $philosophy_datestamp );
          ?>
          <div class="philosophy-date">
            <span><?php echo esc_html($philosophy_date->format('d')); ?></span>
            <?php echo esc_html($philosophy_date->format('M\'y')); ?>
          </div>
        <?php } ?>
           <div class="philosophy-name">
             <h6><a href="<?php the_permalink( $recent_philosophy->ID ); ?>"><?php echo esc_html( $title ); ?></a></h6>
             <?php if(!empty($philosophy_start_date)) {
               $philosophy_timestamp = strtotime($philosophy_start_date);
               $philosophyday = date('l', $philosophy_timestamp);
               ?>
               <p> <i class="far fa-clock"></i> <?php echo esc_html($philosophyday . ' | ' . $philosophy_start_time); ?></p>
             <?php } ?>
           </div>
         </li>
			<?php endforeach; ?>
		</ul>
    <?php if($show_btn){ ?>
      <div class="text-center">
        <a href="<?php echo get_post_type_archive_link( 'philosophy' ); ?>" class="sigma_btn-custom mt-4"><?php esc_html_e('See All', 'sigma-core'); ?></a>
      </div>
		<?php }
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	/**
	 * Handles updating the settings for the current Recent Philosophy widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['title']      = sanitize_text_field( $new_instance['title'] );
		$instance['number']     = (int) $new_instance['number'];
    $instance['show_btn']  = isset( $new_instance['show_btn'] ) ? (bool) $new_instance['show_btn'] : false;
		return $instance;
	}
	/**
	 * Outputs the settings form for the Recent Philosophy widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    $show_btn  = isset( $instance['show_btn'] ) ? (bool) $instance['show_btn'] : false;
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'sigma-core' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of philosophy to show:', 'sigma-core' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
    <p><input class="checkbox" type="checkbox"<?php checked( $show_btn ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_btn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_btn' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_btn' ) ); ?>"><?php esc_html_e( 'Display View All Button?', 'sigma-core' ); ?></label></p>
		<?php
	}
}
