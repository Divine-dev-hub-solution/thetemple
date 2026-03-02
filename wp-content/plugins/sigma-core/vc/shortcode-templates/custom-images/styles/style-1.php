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
if($atts['style_1_img_3']) {
$image_data_3 = wp_get_attachment_image_src( $atts[ 'style_1_img_3' ], 'full' );
$image_url_3  = ( isset( $image_data_3[0] ) && $image_data_3[0] ) ? $image_data_3[0] : '';
}
$img_effect_class = $atts['show_3d_effect'] == true ? 'sigma_card-3d' : '';
?>
          <div class="img-group">
            <?php if($image_url_1) { ?>
              <div class="img-group-inner <?php echo esc_attr($img_effect_class); ?>">
                <img src="<?php echo esc_url( $image_url_1 ); ?>" alt="about">
                <span></span>
                <span></span>
              </div>
            <?php } if($image_url_3) { ?>
            <img src="<?php echo esc_url( $image_url_2 ); ?>" alt="about">
          <?php } if($image_url_3) { ?>
            <img src="<?php echo esc_url( $image_url_3 ); ?>" alt="about">
          <?php } ?>
          </div>
