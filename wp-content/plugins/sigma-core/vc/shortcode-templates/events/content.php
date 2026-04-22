<?php
/**
 * Events shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_events' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'events/layouts/' . $atts[ 'layout' ] );
