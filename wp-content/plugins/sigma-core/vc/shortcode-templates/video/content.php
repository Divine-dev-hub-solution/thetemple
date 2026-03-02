<?php
/**
 * Video shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_video' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'video/styles/' . $atts[ 'style' ] );
