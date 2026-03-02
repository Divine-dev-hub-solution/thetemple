<?php
/**
 * CTA shortcode template file 2.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_cta' ][ 'atts' ];
$list_link = vc_build_link( $atts['list_link'] );
$url = isset($list_link['url']) && !empty($list_link['url']) ? $list_link['url'] : '';
$cta_bg = isset($atts['background']) ? $atts['background'] : 'primary-bg';
$overlay = isset($atts['overlay']) ? $atts['overlay'] : 'primary-overlay';
$contact_form_shortcode = isset($atts['custom_shortcode_2']) ? $atts['custom_shortcode_2'] : '';
if(isset($atts['cta_bg_img'])){
	$image_data = wp_get_attachment_image_src( $atts[ 'cta_bg_img' ], 'full' );
  $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
}
if(isset($atts['cta_img'])){
	$image_data_2 = wp_get_attachment_image_src( $atts[ 'cta_img' ], 'full' );
  $image_url_2  = ( isset( $image_data_2[0] ) && $image_data_2[0] ) ? $image_data_2[0] : '';
}
?>
        <div class="sigma_cta <?php echo esc_attr($cta_bg); ?> <?php if($atts['enable_overlay']){ echo esc_attr($overlay); } ?>" <?php if($image_url) { ?> style="background-image: url(<?php echo esc_url($image_url); ?>)"<?php } ?>>
          <?php if($image_url_2) { ?>
          <img src="<?php echo esc_url($image_url_2); ?>" class="d-none d-sm-block" alt="cta-image" />
        <?php } ?>
          <div class="sigma_box-content">
                <div class="sigma_box-text">
                  <?php if($atts['title']) { ?>
                    <h5><?php echo esc_html($atts['title']); ?></h5>
                  <?php } if($atts['description']) { ?>
                    <p><?php echo esc_attr($atts['description']); ?></p>
                  <?php } ?>
                </div>
                <?php if($contact_form_shortcode) {
									echo do_shortcode(html_entity_decode(vc_value_from_safe($contact_form_shortcode, true)));
                } else {
                  if(!empty($url)) {
                ?>
                <a href="<?php echo esc_url($url); ?>" class="btn-link"><i class="far fa-arrow-right"></i></a>
              <?php } } ?>
              </div>
          </div>
