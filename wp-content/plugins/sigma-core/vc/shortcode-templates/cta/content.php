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

sigmacore_get_vc_shortcode_template( 'cta/styles/' . $atts[ 'style' ] );
