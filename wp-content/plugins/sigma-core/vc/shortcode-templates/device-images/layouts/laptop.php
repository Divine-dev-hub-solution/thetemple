<?php
/**
 * Device images shortcode laptop template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;

$atts = $sigma_shortcodes[ 'sigma_device_images' ][ 'atts' ];

?>

<div class="sigma-laptop-device-image-wrapper">
    <?php
    if ( $atts[ 'laptop_image' ] ) {
        $image_data = wp_get_attachment_image_src( $atts[ 'laptop_image' ], 'full' );
        $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
        if ( $image_url ) {
            ?>
             <div class="laptop">
                <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Laptop image', 'sigma-core' ) ?>">
            </div>
            <?php
        }
    } ?>
</div>