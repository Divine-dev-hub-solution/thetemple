<?php
/**
 * Widget API: WP_Widget_Recent_Events class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Recent Events widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Sigma_Widget_Recent_Events extends WP_Widget {
	/**
	 * Sets up a new Recent Events widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_sigma_recent_events',
			'description'                 => __( 'Your site&#8217;s most recent events.', 'sigma-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'sigma-recent-events', __( 'Sigma Recent Events', 'sigma-core' ), $widget_ops );
		$this->alt_option_name = 'widget_sigma_recent_events';
	}
	/**
	 * Outputs the content for the current Recent Events widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Events widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Events', 'sigma-core' );
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
    $show_btn  = isset( $instance['show_btn'] ) ? $instance['show_btn'] : false;
		/**
		 * Filters the arguments for the Recent Events widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent events.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query(
			apply_filters(
				'sigma_widget_events_args',
				array(
          'post_type'           => 'events',
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
			<?php foreach ( $r->posts as $recent_events ) : ?>
				<?php
				$post_title   = get_the_title( $recent_events->ID );
				$title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', 'sigma-core' );
				$aria_current = '';
				if ( get_queried_object_id() === $recent_events->ID ) {
					$aria_current = ' aria-current="page"';
				}

        $event_details = get_post_meta( $recent_events->ID, 'sigma_events_details', true );
        $event_start_date = isset($event_details['sigma_event_start_date']) ? $event_details['sigma_event_start_date'] : '';
        $event_start_time = isset($event_details['sigma_event_start_time']) ? $event_details['sigma_event_start_time'] : '';
				?>
        <li>
          <?php if(!empty($event_start_date)) {
            $event_datestamp = strtotime($event_start_date);
            $event_date = new DateTime();
            $event_date->setTimestamp( $event_datestamp );
          ?>
          <div class="event-date">
            <span><?php echo esc_html($event_date->format('d')); ?></span>
            <?php echo esc_html($event_date->format('M\'y')); ?>
          </div>
        <?php } ?>
           <div class="event-name">
             <h6><a href="<?php the_permalink( $recent_events->ID ); ?>"><?php echo esc_html( $title ); ?></a></h6>
             <?php if(!empty($event_start_date)) {
               $event_timestamp = strtotime($event_start_date);
               $eventday = date('l', $event_timestamp);
               ?>
               <p> <i class="far fa-clock"></i> <?php echo esc_html($eventday . ' | ' . $event_start_time); ?></p>
             <?php } ?>
           </div>
         </li>
			<?php endforeach; ?>
		</ul>
    <?php if($show_btn){ ?>
      <div class="text-center">
        <a href="<?php echo get_post_type_archive_link( 'events' ); ?>" class="sigma_btn-custom mt-4"><?php esc_html_e('See All', 'sigma-core'); ?></a>
      </div>
		<?php }
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	/**
	 * Handles updating the settings for the current Recent Events widget instance.
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
	 * Outputs the settings form for the Recent Events widget.
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
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of events to show:', 'sigma-core' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
    <p><input class="checkbox" type="checkbox"<?php checked( $show_btn ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_btn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_btn' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_btn' ) ); ?>"><?php esc_html_e( 'Display View All Button?', 'sigma-core' ); ?></label></p>
		<?php
	}
}
