<?php
/**
 * Template part for displaying events details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$event_details = get_post_meta( get_the_ID(), 'sigma_events_details', true );
$event_start_date = maharatri_is_not_empty($event_details, 'sigma_event_start_date') ? $event_details['sigma_event_start_date'] : '';
$event_start_time = maharatri_is_not_empty($event_details, 'sigma_event_start_time') ? $event_details['sigma_event_start_time'] : '';
$event_end_time = maharatri_is_not_empty($event_details, 'sigma_event_end_time') ? $event_details['sigma_event_end_time'] : '';
$event_location_details = maharatri_is_not_empty($event_details, 'sigma_event_location') ? $event_details['sigma_event_location'] : '';
$events_terms_cat = get_the_terms( get_the_ID(), 'events-category' );
$events_terms_tags = get_the_terms( get_the_ID(), 'events-tag' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sigma-events-details sigma-details-wrapper' ); ?>>
    <div class="entry-content">
      <div class="gallery-thumb">
        <?php if(has_post_thumbnail()) {
          the_post_thumbnail();
        } ?>
        <div class="sigma_event-timer">
          <?php if(!empty($event_start_date)) {
            $event_datestamp = strtotime($event_start_date . $event_start_time);
            $event_date = new DateTime();
            $event_date->setTimestamp( $event_datestamp );
          ?>
            <div class="sigma_event-date">
              <span><?php echo esc_html($event_date->format('d')); ?></span>
              <?php echo esc_html($event_date->format('M\'y')); ?>
            </div>
          <?php } ?>
          <div class="ss-countdown-time" data-time="<?php echo esc_attr($event_date->format('m/d/Y H:i')) ?>"></div>
        </div>
      </div>
      <div class="sigma_post-meta">
        <?php if(!empty($event_start_date)) {
          $event_timestamp = strtotime($event_start_date);
          $eventday = date('l', $event_timestamp);
          ?>
          <span> <i class="far fa-clock"></i> <?php echo esc_html($eventday . ' (' . $event_start_time . '-' . $event_end_time .')'); ?></span>
          <?php

          ?>
        <?php } ?>
        <?php if(!empty($event_location_details)) { ?>
          <span> <i class="far fa-map-marker-alt"></i> <?php echo esc_html($event_location_details); ?></span>
        <?php } ?>
      </div>
      <?php
        the_content();
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'maharatri'),
                'after' => '</div>',
            )
        );
      ?>
    </div>
    <!-- .entry-content -->
    <footer class="entry-footer event-detail-footer-meta">
      <?php
        if(!empty($events_terms_tags)) { ?>
          <div class="event-tags-meta">
            <h5><?php esc_html_e('Tags', 'maharatri'); ?></h5>
            <div class="tagcloud">
              <?php foreach ( $events_terms_tags as $get_term ) { ?>
                  <a href="<?php echo esc_url(get_term_link($get_term->slug, 'events-tag')); ?>"><?php echo esc_html($get_term->name); ?></a>
              <?php } ?>
            </div>
          </div>
      <?php } ?>
        <?php
        if (function_exists('sigmacore_posts_share')) {
            sigmacore_posts_share();
        }
        ?>
    </footer><!-- .entry-footer -->
    <?php
      maharatri_single_post_pagination();
      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
          comments_template();
      endif;
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
  // Pagination
  maharatri_single_post_pagination();
?>
