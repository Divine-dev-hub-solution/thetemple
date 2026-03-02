<?php
/**
 * Volunteer shortcode template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;

$atts = $sigma_shortcodes[ 'sigma_volunteer' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'volunteer/layouts/' . $atts[ 'layout' ] );
