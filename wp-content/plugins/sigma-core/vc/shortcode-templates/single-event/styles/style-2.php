<?php
/**
 * Single Event shortcode style 2 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_single_event' ][ 'atts' ];
$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-blog') : 'maharatri-blog';

$event_details = get_post_meta( get_the_ID(), 'sigma_events_details', true );

$event_start_date = !empty($event_details['sigma_event_start_date']) ? $event_details['sigma_event_start_date'] : '';
$event_start_time = !empty($event_details['sigma_event_start_time']) ? $event_details['sigma_event_start_time'] : '';
$event_end_time = !empty($event_details['sigma_event_end_time']) ? $event_details['sigma_event_end_time'] : '';
$event_location_details = !empty($event_details['sigma_event_location']) ? $event_details['sigma_event_location'] : '';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-events sigma-events-style-2 sigma-events-wrapper'); ?>>
	<?php if(has_post_thumbnail() && $atts['show_post_thumbnail'] == 'true') { ?>
    <div class="sigma_post-thumb">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail($thumb_size); ?>
      </a>
    </div>
  <?php } ?>
	<div class="sigma_box">
      <span class="subtitle"><?php esc_html_e('Next Event', 'sigma-core'); ?></span>
      <h4 class="title mb-0">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h4>
      <div class="sigma_event-info">
				<?php if(!empty($event_start_date) && $atts['show_events_date'] == 'true') {
					$event_datestamp = strtotime($event_start_date);
					$event_date = new DateTime();
					$event_date->setTimestamp( $event_datestamp );
				?>
				<div class="event-date-wrapper">
					<span><?php echo esc_html($event_date->format('d')); ?></span>
					<?php echo esc_html($event_date->format('M\'y')); ?>
				</div>
			<?php } ?>
				<?php if(($atts['show_events_time'] == 'true') || ($atts['show_events_locaton'] == 'true')) { ?>
          <ul class="sigma_event-descr m-0">
						<?php if(!empty($event_start_date) && $atts['show_events_time'] == 'true') {
							$event_timestamp = strtotime($event_start_date);
							$eventday = date('l', $event_timestamp);
							?>
							<li> <i class="far fa-clock"></i> <?php echo esc_html($eventday . ' (' . $event_start_time . '-' . $event_end_time .')'); ?></li>
						<?php } ?>
						<?php if(!empty($event_location_details) && $atts['show_events_location'] == 'true') { ?>
							<li> <i class="far fa-map-marker-alt"></i> <?php echo esc_html($event_location_details); ?></li>
						<?php } ?>
          </ul>
				<?php } ?>
      </div>
      <div class="section-button d-flex align-items-center">
          <a href="<?php the_permalink(); ?>" class="sigma_btn-custom secondary"><?php esc_html_e('Join Now', 'sigma-core'); ?> <i class="far fa-arrow-right"></i> </a>
      </div>
  </div>
</article>
