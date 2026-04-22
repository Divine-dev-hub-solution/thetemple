<?php
/**
 * Custom images shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_custom_images' ][ 'atts' ];
if($atts['style_1_img_1']) {
$image_data_1 = wp_get_attachment_image_src( $atts[ 'style_1_img_1' ], 'full' );
$image_url_1  = ( isset( $image_data_1[0] ) && $image_data_1[0] ) ? $image_data_1[0] : '';
}
if($atts['style_1_img_2']) {
$image_data_2 = wp_get_attachment_image_src( $atts[ 'style_1_img_2' ], 'full' );
$image_url_2  = ( isset( $image_data_2[0] ) && $image_data_2[0] ) ? $image_data_2[0] : '';
}
?>
          <div class="img-group-2">
            <?php if($image_url_1) { ?>
              <img src="<?php echo esc_url($image_url_1); ?>" alt="about">
            <?php } if($image_url_2) { ?>
              <img src="<?php echo esc_url($image_url_2); ?>" alt="about">
            <?php } ?>
          </div>
