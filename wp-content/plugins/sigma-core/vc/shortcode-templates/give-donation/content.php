<?php
/**
 * Donation shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_give_donation' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'give-donation/layouts/' . $atts[ 'layout' ] );
