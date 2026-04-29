<?php
/**
 * CTA shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_cta' ][ 'atts' ];
$cta_bg = isset($atts['background']) ? $atts['background'] : 'primary-bg';
$cta_img_align = isset($atts['img_align']) ? $atts['img_align'] : 'align-left';
$custom_form_shortcode = isset($atts['custom_shortcode']) ? $atts['custom_shortcode'] : '';
if(isset($atts['cta_bg_img'])){
	$image_data = wp_get_attachment_image_src( $atts[ 'cta_bg_img' ], 'full' );
  $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
}
?>
        <div class="sigma_cta <?php echo esc_attr($cta_bg .' '.$cta_img_align); ?>">
          <?php if(!empty($image_url)) { ?>
            <img class="d-none d-lg-block" src="<?php echo esc_url($image_url); ?>" alt="cta">
          <?php } ?>
            <div class="sigma_cta-content">
              <span><?php echo esc_html($atts['label']); ?></span>
              <?php if($custom_form_shortcode) {
                echo do_shortcode(html_entity_decode(vc_value_from_safe($custom_form_shortcode, true)));
                ?>
              <?php } else {
								if($atts['title']) { ?>
                <h4 class="text-white"><?php echo esc_html($atts['title']); ?></h4>
              <?php } } ?>
            </div>
          </div>
