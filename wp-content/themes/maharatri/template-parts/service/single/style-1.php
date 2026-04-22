<?php
/**
 * Template part for displaying service details layout 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
 $service_details = get_post_meta( get_the_ID(), 'sigma_service_details', true );
 $service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
 $service_cta_title = isset( $service_details['sigma_service_cta_title'] ) ? $service_details['sigma_service_cta_title'] : '';
 $service_cta_description = isset( $service_details['sigma_service_cta_description'] ) ? $service_details['sigma_service_cta_description'] : '';
?>
<div class="service-details">
  <article id="post-<?php the_ID(); ?>" <?php post_class('sigma-service-details'); ?>>
  	<div class="sigma-service-wrapper">
  		<?php if(has_post_thumbnail()){ ?>
  			<div class="post-thumbnail <?php if($service_details['sigma_service_cta_enable'] == 'true') { echo 'cta_enable'; } ?>">
  				<?php the_post_thumbnail(); ?>
          <?php if(isset($service_details['sigma_service_cta_enable']) && $service_details['sigma_service_cta_enable'] == 'true' )  { ?>
          <div class="cta-style-3">
              <div class="sigma_icon-block icon-block-7 secondary-bg">
                <?php if($service_icon) { ?>
                    <div class="icon"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                    <div class="icon-wrapper">
                        <div class="icon"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                      </div>
                  <?php } ?>
                  <div class="sigma_icon-block-content">
                    <?php if($service_cta_title || $service_cta_description) { ?>
                      <h5><?php echo esc_html($service_cta_title); ?></h5>
                      <p><?php echo esc_html($service_cta_description); ?></p>
                    <?php } ?>
                    <?php if ((isset($service_details['sigma_service_featured_title']) && $service_details['sigma_service_featured_title']) && (isset($service_details['sigma_service_features_total']) && $service_details['sigma_service_features_total'])) {
                        ?>
                        <div class="sigma_service-footer">
                            <ul>
                                <?php
                                for ($i = 0; $service_details['sigma_service_features_total'] > $i; $i++) {
                                    if (isset($service_details['sigma_service_featured_title'][$i])) { ?>
                                        <li><?php echo esc_attr($service_details['sigma_service_featured_title'][$i]); ?></li>
                                    <?php }
                                } ?>
                            </ul>
                        </div>
                    <?php } if(function_exists('sigmacore_posts_share') && maharatri_get_option('show_service_share') == true) {
                      sigmacore_posts_share();
                    }  ?>
                  </div>
              </div>
          </div>
        <?php } ?>
  			</div>
  		<?php } ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
  	</div>
  </article><!-- #post-<?php the_ID(); ?> -->
</div>
<?php
  // Pagination
  maharatri_single_post_pagination();

  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;
