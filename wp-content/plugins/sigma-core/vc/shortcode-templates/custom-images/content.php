<?php
/**
 * Custom images shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_custom_images' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'custom-images/styles/' . $atts[ 'style' ] );
