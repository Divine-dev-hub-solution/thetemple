<?php
/**
 * Holis shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_holis' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'holis/layouts/' . $atts[ 'layout' ] );
