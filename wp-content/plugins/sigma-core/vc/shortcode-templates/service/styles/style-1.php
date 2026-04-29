<?php
/**
 * Service shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes, $post, $service_post;
$atts = $sigma_shortcodes[ 'sigma_service' ][ 'atts' ];
$service_details = get_post_meta( $post->ID, 'sigma_service_details', true );
$kb_service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
$thumb_size = function_exists('maharatri_get_thumb_size') ? maharatri_get_thumb_size('maharatri-blog') : 'maharatri-blog';
if($atts['layout'] == 'single'){
  $service_detail = get_post_meta( $service_post->ID, 'sigma_service_details', true );
  $service_icon = isset( $service_detail['kb_service_icon'] ) ? $service_detail['kb_service_icon'] : '';
  $service_id = $service_post->ID;
  ?>
  <a href="<?php the_permalink($service_post); ?>" class="sigma_service style-2">
    <?php if(has_post_thumbnail($service_id) && $atts['post_featured_image'] == true ) { ?>
      <div class="sigma_service-thumb">
        <?php echo get_the_post_thumbnail( $service_id, $thumb_size ); ?>

        <?php
        if ( $atts[ 'add_icon' ] == 'true' && $service_icon) { ?>
        <i class="<?php echo esc_attr($service_icon); ?>"></i>
      <?php } ?>
      </div>
    <?php } ?>
      <div class="sigma_service-body">
        <h5><?php echo $service_post->post_title; ?></h5>
        <?php
       if($atts['post_excerpt'] == 'true' && function_exists('maharatri_custom_excerpt')){
         $excerpt_length = isset($atts['post_excerpt_length']) && !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
         ?>
       <p><?php echo esc_html(maharatri_custom_excerpt($excerpt_length, $service_post->post_excerpt)) ?></p>
       <?php } ?>
      </div>
    </a>
<?php } else { ?>
      <a href="<?php echo esc_url( get_permalink() ); ?>" class="sigma_service style-2">
        <?php if(has_post_thumbnail() && $atts['post_featured_image'] == true ) { ?>
          <div class="sigma_service-thumb">
            <?php echo the_post_thumbnail( maharatri_get_thumb_size('maharatri-service') ); ?>
            <?php
            if ( $atts[ 'add_icon' ] == 'true' && $kb_service_icon) { ?>
            <i class="<?php echo esc_attr($kb_service_icon); ?>"></i>
          <?php } ?>
          </div>
        <?php } ?>
          <div class="sigma_service-body">
            <h5><?php the_title(); ?></h5>
            <?php
        		if($atts['post_excerpt'] == 'true' && function_exists('maharatri_custom_excerpt')){
        			$excerpt_length = isset($atts['post_excerpt_length']) && !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
        			?>
        		<p><?php echo esc_html(maharatri_custom_excerpt($excerpt_length)) ?></p>
        		<?php } ?>
          </div>
        </a>
<?php }
