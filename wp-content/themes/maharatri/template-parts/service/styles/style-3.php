<?php
/**
 * Template part for displaying services style 3
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 global $post;
 $service_details = get_post_meta( $post->ID, 'sigma_service_details', true );
 $kb_service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-service service-style-3'); ?>>
      <a href="<?php echo esc_url(get_permalink()); ?>" class="sigma_service style-3">
              <?php
              if ($kb_service_icon) { ?>
                <div class="sigma_service-thumb">
                  <i class="<?php echo esc_attr($kb_service_icon); ?>"></i>
                </div>
              <?php } ?>
            <div class="sigma_service-body">
              <h5><?php the_title(); ?></h5>
          		<p><?php echo esc_html(maharatri_custom_excerpt(20)); ?></p>
            </div>
            <span class="btn-link"><?php esc_html_e('Learn More', 'maharatri'); ?> <i class="far fa-arrow-right"></i> </span>
          </a>
</article>
