<?php
/**
 * Device image shortcode template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;

$atts = $sigma_shortcodes[ 'sigma_device_images' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'device-images/layouts/' . $atts[ 'layout' ] );
