<?php
/**
 * Contact form shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_contact_form' ][ 'atts' ];
$contact_form_shortcode = isset($atts['contact_form_shortcode']) ? $atts['contact_form_shortcode'] : '';
?>
<div class="custom-form">
                <?php
                  if($contact_form_shortcode) {
                 echo do_shortcode(html_entity_decode(vc_value_from_safe($contact_form_shortcode, true)));
                } ?>
                <div class="row">
                  <div class="col-lg-6">
                    <?php if($atts['show_signup'] == 'true' ) { ?>
                    <div class="sigma_icon-block icon-block-8">
                      <div class="icon-wrapper">
                        <i class="fas fa-lock"></i>
                      </div>
                      <div class="sigma_icon-block-content">
                        <h6><?php esc_html_e('Already a Member?', 'sigma-core'); ?></h6>
                        <a href="<?php echo esc_url($atts['signup_link']); ?>" class="text-white"><?php esc_html_e('Sign In', 'sigma-core'); ?></a>
                      </div>
                    </div>
                  <?php } ?>
                  </div>

                  <div class="col-lg-6">
                    <?php if($atts['show_signup'] == 'true' ) { ?>
                    <div class="sigma_icon-block icon-block-8">
                      <div class="icon-wrapper">
                        <i class="fas fa-star"></i>
                      </div>
                      <div class="sigma_icon-block-content">
                        <div class="sigma_rating">
                          <?php
                          $x = 1;
                          while($x <= 5) {
                            if($x <= $atts['star_rating']) {
                            ?>
                            <i class="far fa-star active"></i>
                          <?php } else{ ?>
                            <i class="far fa-starr"></i>
                          <?php }
                            $x++;
                          }
                          ?>
                        </div>
                        <span class="text-white"><?php echo esc_html($atts['rating_title']); ?></span>
                      </div>
                    </div>
                  <?php } ?>
                  </div>

                </div>
              </div>
