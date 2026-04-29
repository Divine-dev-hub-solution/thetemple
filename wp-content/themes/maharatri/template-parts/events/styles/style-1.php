<?php
/**
 * Template part for displaying events style 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$thumb_size = maharatri_get_thumb_size('maharatri-blog');

$event_details = get_post_meta( get_the_ID(), 'sigma_events_details', true );

$event_start_date = maharatri_is_not_empty($event_details, 'sigma_event_start_date') ? $event_details['sigma_event_start_date'] : '';
$event_start_time = maharatri_is_not_empty($event_details, 'sigma_event_start_time') ? $event_details['sigma_event_start_time'] : '';
$event_end_time = maharatri_is_not_empty($event_details, 'sigma_event_end_time') ? $event_details['sigma_event_end_time'] : '';
$event_location_details = maharatri_is_not_empty($event_details, 'sigma_event_location') ? $event_details['sigma_event_location'] : '';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-events sigma-events-style-1 sigma-events-wrapper'); ?>>
      <?php if(has_post_thumbnail()) { ?>
        <div class="sigma_post-thumb">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail($thumb_size); ?>
          </a>
          <?php if(!empty($event_start_date) && maharatri_get_option('show_events_date') == true) {
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
          <?php if (maharatri_get_option('show_events_excerpt') == true) {
              $excerpt_length = !empty(maharatri_get_option('events_excerpt_length')) ? maharatri_get_option('events_excerpt_length') : 20;
              ?>
              <p><?php echo esc_html(maharatri_custom_excerpt($excerpt_length)) ?></p>
              <?php
          } ?>
          <?php if((maharatri_get_option('show_events_time') == true) || (maharatri_get_option('show_events_location') == true)) { ?>
            <div class="sigma_post-meta">
              <?php if(!empty($event_start_date) && maharatri_get_option('show_events_time') == true) {
                $event_timestamp = strtotime($event_start_date);
                $eventday = date('l', $event_timestamp);
                ?>
                <span> <i class="far fa-clock"></i> <?php echo esc_html($eventday . ' (' . $event_start_time . '-' . $event_end_time .')'); ?></span>
              <?php } ?>
              <?php if(!empty($event_location_details) && maharatri_get_option('show_events_location') == true) { ?>
                <span> <i class="far fa-map-marker-alt"></i> <?php echo esc_html($event_location_details); ?></span>
              <?php } ?>
            </div>
          <?php } ?>
            <div class="section-button d-flex align-items-center">
              <a href="<?php the_permalink(); ?>" class="sigma_btn-custom"><?php esc_html_e('Join Now', 'maharatri'); ?> <i class="far fa-arrow-right"></i> </a>
            </div>
        </div>
</article>
