<?php
/**
 * Products shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_products' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'products/layouts/' . $atts[ 'layout' ] );
