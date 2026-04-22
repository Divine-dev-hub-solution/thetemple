<?php
/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 global $post;
 $service_details = get_post_meta( $post->ID, 'sigma_service_details', true );
 $kb_service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-service service-style-1'); ?>>
  <a href="<?php echo esc_url( get_permalink() ); ?>" class="sigma_service style-2">
    <?php if(has_post_thumbnail()) { ?>
      <div class="sigma_service-thumb">
        <?php echo the_post_thumbnail( maharatri_get_thumb_size('maharatri-service') ); ?>
        <?php
        if ($kb_service_icon) { ?>
        <i class="<?php echo esc_attr($kb_service_icon); ?>"></i>
      <?php } ?>
      </div>
    <?php } ?>
      <div class="sigma_service-body">
        <h5><?php the_title(); ?></h5>
        <p><?php echo esc_html(maharatri_custom_excerpt(20)) ?></p>
      </div>
    </a>
</article>
