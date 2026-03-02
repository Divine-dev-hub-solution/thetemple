<?php
/**
 * Events shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_events' ][ 'atts' ];
$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-blog') : 'maharatri-blog';

$event_details = get_post_meta( get_the_ID(), 'sigma_events_details', true );

$event_start_date = !empty($event_details['sigma_event_start_date']) ? $event_details['sigma_event_start_date'] : '';
$event_start_time = !empty($event_details['sigma_event_start_time']) ? $event_details['sigma_event_start_time'] : '';
$event_end_time = !empty($event_details['sigma_event_end_time']) ? $event_details['sigma_event_end_time'] : '';
$event_location_details = !empty($event_details['sigma_event_location']) ? $event_details['sigma_event_location'] : '';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-events sigma-events-style-1 sigma-events-wrapper'); ?>>
  <?php if(has_post_thumbnail()) { ?>
    <div class="sigma_post-thumb">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail($thumb_size); ?>
      </a>
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
    </div>
  <?php } ?>
    <div class="sigma_post-body">
      <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
      <?php if ($atts['post_excerpt']== 'true' && function_exists('maharatri_custom_excerpt')) {
          $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
          ?>
          <p><?php echo esc_html(maharatri_custom_excerpt($excerpt_length)) ?></p>
          <?php
      } ?>
      <?php if(($atts['show_events_time'] == 'true') || ($atts['show_events_locaton'] == 'true')) { ?>
        <div class="sigma_post-meta">
          <?php if(!empty($event_start_date) && $atts['show_events_time'] == 'true') {
            $event_timestamp = strtotime($event_start_date);
            $eventday = date('l', $event_timestamp);
            ?>
            <span> <i class="far fa-clock"></i> <?php echo esc_html($eventday . ' (' . $event_start_time . '-' . $event_end_time .')'); ?></span>
          <?php } ?>
          <?php if(!empty($event_location_details) && $atts['show_events_location'] == 'true') { ?>
            <span> <i class="far fa-map-marker-alt"></i> <?php echo esc_html($event_location_details); ?></span>
          <?php } ?>
        </div>
      <?php } ?>
        <div class="section-button d-flex align-items-center">
          <a href="<?php the_permalink(); ?>" class="sigma_btn-custom"><?php esc_html_e('Join Now', 'sigma-core'); ?> <i class="far fa-arrow-right"></i> </a>
        </div>
    </div>
</article>
